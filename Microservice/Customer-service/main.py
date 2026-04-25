from fastapi import FastAPI, HTTPException, Depends
from sqlalchemy import create_engine, Column, Integer, String
from sqlalchemy.orm import declarative_base, sessionmaker, Session
from pydantic import BaseModel

app = FastAPI(
    title="Customer Service API", 
    description="""
    API Untuk Mengelola Data Customer yang terdiri dari endpoitn :
    1. GET /customers
    2. GET /customers/{customer_id}
    3. POST /customers
    4. PUT /customers/{customer_id}
    5. DELETE /customers/{customer_id}

    Dibuat oleh :
    Nama    : Syahrizal Maulani
    NIM     : 102022400226
    Kelas   : SI4804
    """,
    docs_url="/api-docs")

# Database Setup
DATABASE_URL = "mysql+pymysql://root:@localhost/sidagas_customers"
engine = create_engine(DATABASE_URL)
SessionLocal = sessionmaker(autocommit=False, autoflush=False, bind=engine)
Base = declarative_base()

# Model SQLAlchemy
class Customer(Base):
    __tablename__ = "customers"
    id = Column(Integer, primary_key=True, index=True)
    name = Column(String(100), index=True)
    phone = Column(String(20))

Base.metadata.create_all(bind=engine)

# Pydantic Schemas
class CustomerCreate(BaseModel):
    name: str
    phone: str

class CustomerUpdate(BaseModel):
    name: str = None
    phone: str = None

def get_db():
    db = SessionLocal()
    try:
        yield db
    finally:
        db.close()

#mengambil semua data customers
@app.get("/customers", tags=["Customer"])
def read_customers(db: Session = Depends(get_db)):
    return db.query(Customer).all()

#mengambil data customer berdasarkan id
@app.get("/customers/{customer_id}", tags=["Customer"])
def read_customer(customer_id: int, db: Session = Depends(get_db)):
    customer = db.query(Customer).filter(Customer.id == customer_id).first()
    if not customer:
        raise HTTPException(status_code=404, detail="Customer not found")
    return customer

#membuat data customer baru
@app.post("/customers", tags=["Customer"])
def create_customer(customer: CustomerCreate, db: Session = Depends(get_db)):
    db_customer = Customer(name=customer.name, phone=customer.phone)
    db.add(db_customer)
    db.commit()
    db.refresh(db_customer)
    return db_customer

#mengupdate data customer dengan data baru berdasarkan id
@app.put("/customers/{customer_id}", tags=["Customer"])
def update_customer(customer_id: int, customer: CustomerUpdate, db: Session = Depends(get_db)):
    db_customer = db.query(Customer).filter(Customer.id == customer_id).first()
    if not db_customer:
        raise HTTPException(status_code=404, detail="Customer not found")
    if customer.name: db_customer.name = customer.name
    if customer.phone: db_customer.phone = customer.phone
    db.commit()
    db.refresh(db_customer)
    return db_customer

#menghapus data customer berdasarkan id
@app.delete("/customers/{customer_id}", tags=["Customer"])
def delete_customer(customer_id: int, db: Session = Depends(get_db)):
    db_customer = db.query(Customer).filter(Customer.id == customer_id).first()
    if not db_customer:
        raise HTTPException(status_code=404, detail="Customer not found")
    db.delete(db_customer)
    db.commit()
    return {"message": "Customer deleted successfully"}