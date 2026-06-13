# Panduan Instalasi - aplikasi-blog (Laravel)

## Prasyarat
- PHP >= 8.1
- Composer
- XAMPP (MySQL + Apache)
- Node.js (opsional)

---

## Langkah 1: Buat Project Laravel Baru

Buka Command Prompt / PowerShell, jalankan:

```bash
cd C:\xampp\htdocs
composer create-project laravel/laravel aplikasi-blog
cd aplikasi-blog
```

---

## Langkah 2: Salin File dari Folder Ini

Salin **semua folder dan file** dari arsip ini ke dalam folder `C:\xampp\htdocs\aplikasi-blog\`,
**timpa** file yang sudah ada.

Struktur file yang perlu disalin:

```
app/Http/Controllers/     ← semua Controller
app/Models/               ← Artikel.php, Penulis.php, KategoriArtikel.php
config/auth.php           ← konfigurasi autentikasi
resources/views/          ← semua View Blade
routes/web.php            ← definisi Route
.env                      ← konfigurasi environment
database/db_blog_laravel.sql ← struktur + data database
storage/app/public/foto/default.png
storage/app/public/gambar/   ← gambar contoh
```

---

## Langkah 3: Import Database

1. Buka **phpMyAdmin** (`http://localhost/phpmyadmin`)
2. Klik **Import**
3. Pilih file `database/db_blog_laravel.sql`
4. Klik **Go**

---

## Langkah 4: Konfigurasi .env

Buka file `.env`, pastikan bagian database sudah sesuai:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_blog
DB_USERNAME=root
DB_PASSWORD=
```

Jika password MySQL kamu berbeda, sesuaikan `DB_PASSWORD`.

---

## Langkah 5: Generate App Key

```bash
php artisan key:generate
```

---

## Langkah 6: Buat Symbolic Link Storage

```bash
php artisan storage:link
```

---

## Langkah 7: Jalankan Server

```bash
php artisan serve
```

Buka browser: `http://localhost:8000`

---

## Akun Login Default

| Username | Password  |
|----------|-----------|
| budi     | password  |
| wati     | password  |

> **Catatan:** Hash password di database menggunakan string `password` sebagai password default.
> Setelah login, segera ganti password melalui menu Kelola Penulis → Edit.

---

## Struktur Folder Penting

```
aplikasi-blog/
├── app/
│   ├── Http/Controllers/
│   │   ├── LoginController.php
│   │   ├── DashboardController.php
│   │   ├── ArtikelController.php
│   │   ├── PenulisController.php
│   │   └── KategoriArtikelController.php
│   └── Models/
│       ├── Artikel.php
│       ├── Penulis.php
│       └── KategoriArtikel.php
├── config/
│   └── auth.php
├── resources/views/
│   ├── layouts/app.blade.php
│   ├── login/index.blade.php
│   ├── dashboard/index.blade.php
│   ├── artikel/         (index, create, edit)
│   ├── penulis/         (index, create, edit)
│   └── kategori/        (index, create, edit)
├── routes/web.php
├── storage/app/public/
│   ├── foto/            ← foto profil penulis
│   └── gambar/          ← gambar artikel
└── .env
```

---

## Troubleshooting

**Error: Class "App\Models\Penulis" not found**
```bash
composer dump-autoload
```

**Error: SQLSTATE - tabel tidak ditemukan**
Pastikan database `db_blog` sudah diimport dan `.env` sudah benar.

**Gambar tidak tampil**
Pastikan `php artisan storage:link` sudah dijalankan.

**Error 419 (CSRF token mismatch)**
Jalankan `php artisan config:clear && php artisan cache:clear`
