# Aplikasi Blog - Sistem Manajemen Konten (CMS)

Nama: Sofwan Hakim S.

NIM: 240605110181

Mata Kuliah: Pemrograman Web B

Dosen: A'la Syauqi M.Kom.

---

## Deskripsi Aplikasi

Aplikasi Blog adalah sistem manajemen konten (CMS) berbasis web yang dibangun menggunakan framework Laravel. Aplikasi ini memiliki dua bagian utama yaitu halaman administrator untuk mengelola konten dan halaman publik untuk pengunjung umum.

Halaman administrator hanya dapat diakses oleh penulis yang sudah login dan menyediakan fitur pengelolaan artikel, penulis, dan kategori artikel. Halaman publik dapat diakses oleh siapa saja tanpa perlu login dan menampilkan artikel-artikel yang telah dipublikasikan beserta fitur penyaringan berdasarkan kategori.

---

## Fitur Aplikasi

### Halaman Administrator (CMS)
- Login dan register akun penulis
- Kelola artikel: tambah, edit, hapus artikel beserta gambar
- Kelola penulis: tambah, edit, hapus data penulis
- Kelola kategori artikel: tambah, edit, hapus kategori

### Halaman Pengunjung
- Halaman utama menampilkan lima artikel terbaru
- Widget kategori artikel di bagian samping
- Filter artikel berdasarkan kategori
- Halaman detail artikel dengan isi lengkap
- Widget artikel terkait dari kategori yang sama

---

## Teknologi yang Digunakan

- PHP 8.3
- Laravel 13
- MySQL
- Bootstrap 5
- Blade Template Engine

---

## Langkah-langkah Menjalankan Aplikasi

### Prasyarat
Pastikan perangkat sudah terinstall:
- PHP >= 8.1
- Composer
- MySQL
- Laragon atau XAMPP

### Instalasi

1. Clone repositori ini (https://github.com/sofwan521/aplikasi-blog-240605110181.git)
2. Masuk ke folder project (cd aplikasi-blog-240605110181)
3. Install dependencies (composer install)
4. Salin file konfigurasi environment (cp .env.example .env)
5. Generate application key (php artisan key:generate)
6. Buat database baru bernama `db_blog` di phpMyAdmin, kemudian import file SQL yang tersedia
7. Sesuaikan konfigurasi database di file `.env`
(DB_DATABASE=db_blog

DB_USERNAME=root

DB_PASSWORD=)
8. Buat symbolic link untuk storage (php artisan storage:link)
9. Jalankan server (php artisan serve)
10. Buka aplikasi di browser (http://127.0.0.1:8000)
### Akun Default

| Username | Password |
|----------|----------|
| budi | password |
| wati | password |

## Link Video Demonstrasi
https://youtu.be/qr_5PEnIz5c
