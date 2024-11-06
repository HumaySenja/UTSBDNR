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
3. **Pembayaran dan Transaksi**: Integrasi metode pembayaran yang aman dan mudah digunakan, dengan berbagai pilihan seperti kartu kredit dan transfer bank.
4. **Review dan Rating Produk**: Pengguna dapat memberikan ulasan dan rating pada produk yang telah dibeli untuk membantu pengguna lain dalam memilih produk.

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
