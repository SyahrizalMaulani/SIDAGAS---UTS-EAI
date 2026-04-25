from fastapi import FastAPI, HTTPException, Depends
from sqlalchemy import create_engine, Column, Integer, Float
from sqlalchemy.orm import declarative_base, sessionmaker, Session
from pydantic import BaseModel
import requests

app = FastAPI(
    title="Order Service API", 
    description="""
    API Untuk Mengelola Data Order yang terdiri dari endpoitn :
    1. GET /orders
    2. POST /orders
    3. DELETE /orders/{order_id}

    Dibuat oleh :
    Nama    : Syahrizal Maulani
    NIM     : 102022400226
    Kelas   : SI4804
    """,
    docs_url="/api-docs")

# Database Setup
DATABASE_URL = "mysql+pymysql://root:@localhost/sidagas_orders"
engine = create_engine(DATABASE_URL)
SessionLocal = sessionmaker(autocommit=False, autoflush=False, bind=engine)
Base = declarative_base()

PRODUCT_SERVICE_URL = "http://127.0.0.1:8002"

# Model SQLAlchemy
class Order(Base):
    __tablename__ = "orders"
    id = Column(Integer, primary_key=True, index=True)
    product_id = Column(Integer)
    qty = Column(Integer)
    total_price = Column(Float)

Base.metadata.create_all(bind=engine)

# Pydantic Schemas
class OrderCreate(BaseModel):
    product_id: int
    qty: int

def get_db():
    db = SessionLocal()
    try:
        yield db
    finally:
        db.close()

@app.get("/orders", tags=["Order"])
def read_orders(db: Session = Depends(get_db)):
    return db.query(Order).all()

@app.post("/orders", tags=["Order"])
def create_order(order: OrderCreate, db: Session = Depends(get_db)):
    # 1. Panggil Product Service untuk cek harga dan stok
    try:
        prod_response = requests.get(f"{PRODUCT_SERVICE_URL}/products/{order.product_id}")
    except Exception as e:
        raise HTTPException(status_code=500, detail=f"Gagal menghubungi Product Service (Server down/Error): {str(e)}")
        
    if prod_response.status_code != 200:
        raise HTTPException(status_code=400, detail=f"Produk dengan ID {order.product_id} tidak ditemukan. Pastikan ID tersebut ada di database Product!")
        
    product_data = prod_response.json()

    if product_data["stock"] < order.qty:
        raise HTTPException(status_code=400, detail="Stok tidak mencukupi")

    total = product_data["price"] * order.qty

    # 2. Kurangi stok di Product Service (Inter-service Communication PUT)
    new_stock = product_data["stock"] - order.qty
    try:
        update_response = requests.put(
            f"{PRODUCT_SERVICE_URL}/products/{order.product_id}",
            json={"stock": new_stock}
        )
        if update_response.status_code != 200:
            raise HTTPException(status_code=500, detail="Gagal mengupdate stok di Product Service")
    except Exception as e:
        raise HTTPException(status_code=500, detail=f"Error saat mengupdate stok: {str(e)}")

    # 3. Simpan order ke database
    db_order = Order(product_id=order.product_id, qty=order.qty, total_price=total)
    db.add(db_order)
    db.commit()
    db.refresh(db_order)
    
    return db_order

@app.delete("/orders/{order_id}", tags=["Order"])
def delete_order(order_id: int, db: Session = Depends(get_db)):
    db_order = db.query(Order).filter(Order.id == order_id).first()
    if not db_order:
        raise HTTPException(status_code=404, detail="Order not found")
        
    # Kembalikan stok saat order dibatalkan (Bonus feature High Level)
    try:
        prod_response = requests.get(f"{PRODUCT_SERVICE_URL}/products/{db_order.product_id}")
        if prod_response.status_code == 200:
            product_data = prod_response.json()
            new_stock = product_data["stock"] + db_order.qty
            requests.put(
                f"{PRODUCT_SERVICE_URL}/products/{db_order.product_id}",
                json={"stock": new_stock}
            )
    except:
        pass # Ignore errors if product service is down during refund
        
    db.delete(db_order)
    db.commit()
    return {"message": "Order deleted and stock refunded successfully"}