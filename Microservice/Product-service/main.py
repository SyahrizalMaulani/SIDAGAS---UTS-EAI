from fastapi import FastAPI, HTTPException, Depends
from sqlalchemy import create_engine, Column, Integer, String, Float
from sqlalchemy.orm import declarative_base, sessionmaker, Session
from pydantic import BaseModel

app = FastAPI(
    title="Product Service API", 
    description="""
    API Untuk Mengelola Data Produk yang terdiri dari endpoitn :
    1. GET /products
    2. GET /products/{product_id}
    3. POST /products
    4. PUT /products/{product_id}
    5. DELETE /products/{product_id}

    Dibuat oleh :
    Nama    : Syahrizal Maulani
    NIM     : 102022400226
    Kelas   : SI4804
    """,
    docs_url="/api-docs")

# Database Setup
DATABASE_URL = "mysql+pymysql://root:@localhost/sidagas_products"
engine = create_engine(DATABASE_URL)
SessionLocal = sessionmaker(autocommit=False, autoflush=False, bind=engine)
Base = declarative_base()

# Model SQLAlchemy
class Product(Base):
    __tablename__ = "products"
    id = Column(Integer, primary_key=True, index=True)
    name = Column(String(100), index=True)
    price = Column(Float)
    stock = Column(Integer)

Base.metadata.create_all(bind=engine)

# Pydantic Schemas
class ProductCreate(BaseModel):
    name: str
    price: float
    stock: int

class ProductUpdate(BaseModel):
    name: str = None
    price: float = None
    stock: int = None

def get_db():
    db = SessionLocal()
    try:
        yield db
    finally:
        db.close()


#ENDPOINT CRUD UNTUK DATA PRODUK
#endpoint untuk mengambil semua data product
@app.get("/products", tags=["Product"])
def read_products(db: Session = Depends(get_db)):
    return db.query(Product).all()

#endpoint untuk mengambil data product berdasarkan id
@app.get("/products/{product_id}", tags=["Product"])
def read_product(product_id: int, db: Session = Depends(get_db)):
    product = db.query(Product).filter(Product.id == product_id).first()
    if not product:
        raise HTTPException(status_code=404, detail="Product not found")
    return product

#endpoint untuk membuat data produk baru
@app.post("/products", tags=["Product"])
def create_product(product: ProductCreate, db: Session = Depends(get_db)):
    db_product = Product(**product.dict())
    db.add(db_product)
    db.commit()
    db.refresh(db_product)
    return db_product

#endpoint untuk mengupdate data product berdasarkan id
@app.put("/products/{product_id}", tags=["Product"])
def update_product(product_id: int, product: ProductUpdate, db: Session = Depends(get_db)):
    db_product = db.query(Product).filter(Product.id == product_id).first()
    if not db_product:
        raise HTTPException(status_code=404, detail="Product not found")
    
    update_data = product.dict(exclude_unset=True)
    for key, value in update_data.items():
        setattr(db_product, key, value)
        
    db.commit()
    db.refresh(db_product)
    return db_product

#endpoint untuk menghapus data product berdasarkan id
@app.delete("/products/{product_id}", tags=["Product"])
def delete_product(product_id: int, db: Session = Depends(get_db)):
    db_product = db.query(Product).filter(Product.id == product_id).first()
    if not db_product:
        raise HTTPException(status_code=404, detail="Product not found")
    db.delete(db_product)
    db.commit()
    return {"message": "Product deleted successfully"}