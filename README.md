# Sangkuriang Mart

Sangkuriang Mart adalah aplikasi marketplace yang menjual buah dan sayur segar, menghubungkan petani lokal dengan konsumen secara langsung. Aplikasi ini menggunakan MongoDB sebagai database utama, sedangkan backend dikembangkan menggunakan PHP dengan framework Laravel.

---

## Anggota Kelompok

| Nama                          | NIM    |
| ----------------------------- | ------ |
| Nabil Hanif Achmaddiredja     | 2205905 |
| Setyawan Humay Senja          | 2203874 |
| Muhammad Furqon Al-Haqqi      | 2207207 |
| Muhammad Fahreza Fauzan       | 2204509 |
| Themy Sabri Syuhada           | 2203903 |

---

## Deskripsi Aplikasi

### Fitur Utama

1. **Produk Segar**: Pengguna dapat memilih berbagai buah dan sayur segar, dilengkapi dengan deskripsi produk, harga, dan gambar.
2. **Keranjang Belanja**: Fitur ini memungkinkan pengguna menambahkan produk ke keranjang dan menghitung total belanja sebelum melakukan checkout.
3. **Pembayaran dan Transaksi**: Integrasi metode pembayaran yang aman dan mudah digunakan.

### Teknologi yang Digunakan

- **Database**: Menggunakan MongoDB untuk penyimpanan data yang cepat dan fleksibel. 
- **Backend**: PHP dengan framework Laravel. 

### Struktur Database

**Collection Utama:**
- `Products`: Menyimpan informasi produk seperti nama, kategori, harga, stok, deskripsi, gambar, dan ulasan pengguna.
- `Users`: Menyimpan data pengguna, termasuk informasi alamat dan nomor telepon.
- `Cart`: Menyimpan data keranjang belanja, mencatat produk yang ditambahkan oleh pengguna.
- `Transactions`: Menyimpan informasi transaksi, termasuk jumlah total, metode pembayaran, status, dan waktu pembayaran.

---

## Instalasi dan Konfigurasi

### Persyaratan

- PHP 8.2 atau lebih tinggi
- Composer
- MongoDB
- Laravel Framework

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/HumaySenja/UTSBDNR.git
   cd UTSBDNR
2. **Install Dependensi**
   ```bash
   composer install
3. **Konfigurasi Environment**
   Buat file .env yang berisikan: 
   ```bash
   APP_NAME=Laravel
   APP_ENV=local
   APP_KEY=base64:oEa3eR7Kv4XrZJCyClog1ZjNuSv9xoKNcoOzNy3KQFs=
   APP_DEBUG=true
   APP_TIMEZONE=UTC
   APP_URL=http://localhost

   APP_LOCALE=en
   APP_FALLBACK_LOCALE=en
   APP_FAKER_LOCALE=en_US

   APP_MAINTENANCE_DRIVER=file
   # APP_MAINTENANCE_STORE=database

   PHP_CLI_SERVER_WORKERS=4

   BCRYPT_ROUNDS=12

   LOG_CHANNEL=stack
   LOG_STACK=single
   LOG_DEPRECATIONS_CHANNEL=null
   LOG_LEVEL=debug

   DB_CONNECTION=mongodb
   DB_HOST=127.0.0.1
   DB_PORT=27017
   DB_DATABASE=sangkuriang_mart
   DB_USERNAME=
   DB_PASSWORD=

   SESSION_DRIVER=database
   SESSION_LIFETIME=120
   SESSION_ENCRYPT=false
   SESSION_PATH=/
   SESSION_DOMAIN=null

   BROADCAST_CONNECTION=log
   FILESYSTEM_DISK=local
   QUEUE_CONNECTION=database

   CACHE_STORE=database
   CACHE_PREFIX=

   MEMCACHED_HOST=127.0.0.1

   REDIS_CLIENT=phpredis
   REDIS_HOST=127.0.0.1
   REDIS_PASSWORD=null
   REDIS_PORT=6379

   MAIL_MAILER=log
   MAIL_HOST=127.0.0.1
   MAIL_PORT=2525
   MAIL_USERNAME=null
   MAIL_PASSWORD=null
   MAIL_ENCRYPTION=null
   MAIL_FROM_ADDRESS="hello@example.com"
   MAIL_FROM_NAME="${APP_NAME}"

   AWS_ACCESS_KEY_ID=
   AWS_SECRET_ACCESS_KEY=
   AWS_DEFAULT_REGION=us-east-1
   AWS_BUCKET=
   AWS_USE_PATH_STYLE_ENDPOINT=false

   VITE_APP_NAME="${APP_NAME}"
4. **Jalankan Aplikasi**
   ```bash
   php artisan serve