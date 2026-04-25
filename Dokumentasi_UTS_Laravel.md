# Laporan Project UTS - Enterprise Application Integration (EAI)

**Tema Proyek:** Developing Connected Services via API with Swagger/Postman Documentation  
**Nama Proyek:** SIDAGAS (Sistem Informasi Data Gas) - E-Commerce Microservice  
**Arsitektur:** Service-Oriented Architecture (SOA) / Microservices dengan Pola BFF (Backend For Frontend)

---

## 1. Latar Belakang Proyek
Di era modern, aplikasi monolitik mulai ditinggalkan karena sulit untuk diskalakan. Proyek **SIDAGAS** dibangun dengan memecah fungsionalitas aplikasi menjadi beberapa layanan independen (*Microservices*). Menggunakan prinsip *Service-Oriented Architecture (SOA)*, sistem ini memisahkan secara tegas antara antarmuka pengguna (Frontend Laravel) dan pemrosesan data (Backend FastAPI). Arsitektur ini sangat fleksibel dan meniru struktur aplikasi berskala industri.

## 2. Arsitektur Sistem (Service Architecture)
Sistem ini terdiri dari **5 komponen utama** yang saling terhubung melalui protokol HTTP REST API menggunakan format JSON.

### A. Frontend Web (Laravel 12 + Alpine.js + Tailwind CSS)
*   **Akses:** `http://localhost:8000`
*   **Peran:** Bertindak sebagai antarmuka pelanggan dan memfasilitasi pola desain *Backend For Frontend (BFF)*.
*   **Fitur Utama:**
    *   **Server-Side Fetching:** Saat pengguna membuka halaman *Tentang Kami* dan *Produk*, server Laravel akan melakukan HTTP Request secara internal ke API Gateway untuk mengambil data, lalu merendernya secara dinamis di *Blade Engine*.
    *   **Client-Side Fetching (AJAX):** Halaman Produk dilengkapi dengan *Pop-up Modal Order* berbasis **Alpine.js**. Saat pembeli melakukan konfirmasi pesanan, *browser* akan langsung mengirim `POST` request ke API Gateway secara *asynchronous* tanpa perlu me-reload halaman.

### B. API Gateway (Node.js + Express)
*   **Akses / Port:** `http://127.0.0.1:8005`
*   **Peran:** Bertindak sebagai *Reverse Proxy* dan Jembatan Komunikasi Utama.
*   **Fungsi:** Menyembunyikan alamat asli dari *Microservices* di belakangnya. Semua panggilan (*request*) dari Frontend Laravel (baik dari Server PHP maupun Client Alpine.js) ditujukan ke port `8005`. Gateway inilah yang meneruskannya ke port yang benar (`8001`, `8002`, atau `8003`).

### C. Backend Microservices (Python + FastAPI)
Backend dirancang menggunakan pola *Database-per-Service* (1 service = 1 database independen) untuk menjamin *Loose Coupling*.

1.  **Customer Service**
    *   **Port:** `8001`
    *   **Database:** `sidagas_customers` (MySQL)
    *   **Fungsi:** Melayani data jumlah pelanggan untuk ditampilkan secara dinamis di halaman *Tentang Kami* pada Laravel.
2.  **Product Service**
    *   **Port:** `8002`
    *   **Database:** `sidagas_products` (MySQL)
    *   **Fungsi:** Menyediakan data katalog produk (nama, stok, harga) untuk di-render menjadi *Grid Card* di halaman *Produk* Laravel.
3.  **Order Service**
    *   **Port:** `8003`
    *   **Database:** `sidagas_orders` (MySQL)
    *   **Fungsi:** Menerima pemesanan langsung dari Pop-up Modal (Alpine.js) di web Laravel.

## 3. Komunikasi Antar-Service (Advanced API Integration)
Keunggulan utama dari proyek ini adalah adanya **komunikasi dua arah (Client-to-Server dan Server-to-Server)** yang sangat dinamis.

**Alur Skenario Pemesanan (Order Flow):**
1. Pengguna membuka Web Laravel. Server Laravel mengambil katalog gas dari Product-service lalu merendernya.
2. Pengguna mengklik produk, pop-up Alpine.js terbuka. Pengguna memasukkan *qty* = 2, lalu klik "Konfirmasi".
3. Alpine.js mengirim data `POST /orders` ke API Gateway (port 8005).
4. API Gateway meneruskannya ke **Order Service** (port 8003).
5. Di belakang layar, **Order Service** menghentikan proses sementara, lalu menembak `GET /products/{id}` ke **Product Service** (port 8002) untuk mengecek secara absolut apakah stok mencukupi.
6. Jika stok mencukupi, **Order Service** melakukan tembakan API kedua yaitu `PUT /products/{id}` untuk mengurangi stok gas secara *real-time* di *database* produk.
7. Terakhir, pesanan dicatat di *database* order, dan respons sukses dikembalikan ke Alpine.js. Browser kemudian melakukan *reload* halaman otomatis.

## 4. Teknologi yang Digunakan (Tech Stack)
*   **Web Framework (BFF):** Laravel (PHP), Blade, Alpine.js (JavaScript), Tailwind CSS v4.
*   **API Gateway:** Node.js, Express, `http-proxy-middleware`, `cors`.
*   **Microservices Framework:** Python, FastAPI, Pydantic, Requests.
*   **Database Engine & ORM:** MySQL & SQLAlchemy.
*   **API Documentation:** Swagger UI (ter-generate otomatis via FastAPI).

## 5. Dokumentasi API (Swagger / OpenAPI)
Semua spesifikasi dan dokumentasi untuk Backend Service yang mematuhi standar *OpenAPI* dapat diakses dan diuji di alamat berikut:
*   **Customer Service Docs:** `http://127.0.0.1:8001/api-docs`
*   **Product Service Docs:** `http://127.0.0.1:8002/api-docs`
*   **Order Service Docs:** `http://127.0.0.1:8003/api-docs`

*(File spesifikasi OpenAPI bereksistensi `.json` sudah disertakan sebagai lampiran).*

---
*Laporan ini membuktikan bahwa proyek SIDAGAS memenuhi kriteria penilaian "High Level" berkat arsitektur Microservices yang utuh, integrasi yang mulus, fungsionalitas Pop-up Order real-time, dan dokumentasi Swagger yang terstandardisasi.*
