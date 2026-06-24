# 10522028-Laravel

## Deskripsi Project

Project ini merupakan aplikasi web berbasis Laravel yang dibuat sebagai latihan dan pengembangan sistem informasi. Aplikasi ini dikembangkan untuk membantu proses pengelolaan data pada sistem rumah makan, khususnya dalam pengelolaan menu, kategori, dan data pendukung lainnya.

Project ini menggunakan framework Laravel karena memiliki struktur yang rapi, mendukung konsep MVC, serta memudahkan proses pembuatan fitur CRUD. Dengan adanya sistem ini, proses pengelolaan data dapat dilakukan secara lebih terstruktur dibandingkan pencatatan manual.

## Identitas

Nama: Akhfa Shidqie Muttaqien
NIM: 10522028
Program Studi: Sistem Informasi
Project: Laravel Web Application

## Teknologi yang Digunakan

* Laravel
* PHP
* MySQL
* Blade Template
* HTML
* CSS
* JavaScript
* XAMPP
* Git dan GitHub

## Fitur Utama

Beberapa fitur yang terdapat dalam project ini antara lain:

1. Manajemen kategori
2. Manajemen menu
3. Tambah data menu
4. Edit data menu
5. Hapus data menu
6. Menampilkan daftar data
7. Pengelolaan data berbasis database

## Struktur Folder Penting

Berikut beberapa folder penting dalam project Laravel ini:

```text
app/
```

Berisi file utama aplikasi, seperti model dan controller.

```text
database/
```

Berisi file migration, seeder, dan konfigurasi database.

```text
resources/views/
```

Berisi file tampilan aplikasi yang menggunakan Blade Template.

```text
routes/web.php
```

Berisi pengaturan route atau alamat halaman web.

```text
public/
```

Berisi file publik seperti gambar, CSS, dan JavaScript.

## Cara Menjalankan Project

1. Clone repository dari GitHub:

```bash
git clone https://github.com/shidqie/10522028-Laravel.git
```

2. Masuk ke folder project:

```bash
cd 10522028-Laravel
```

3. Install dependency Laravel:

```bash
composer install
```

4. Salin file environment:

```bash
cp .env.example .env
```

5. Generate application key:

```bash
php artisan key:generate
```

6. Atur konfigurasi database pada file `.env`:

```env
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

7. Jalankan migration:

```bash
php artisan migrate
```

8. Jalankan server Laravel:

```bash
php artisan serve
```

9. Buka aplikasi melalui browser:

```text
http://127.0.0.1:8000
```

## Catatan Pengembangan

Project ini masih dapat dikembangkan lebih lanjut, khususnya pada bagian tampilan, validasi data, manajemen user, dan fitur laporan. Pengembangan selanjutnya dapat menambahkan sistem login, hak akses pengguna, dashboard admin, serta laporan transaksi agar aplikasi menjadi lebih lengkap.

## Tujuan Project

Tujuan dari project ini adalah untuk memahami proses pembuatan aplikasi web menggunakan Laravel, mulai dari pembuatan database, routing, controller, model, view, hingga proses upload project ke GitHub. Selain itu, project ini juga menjadi latihan dalam menerapkan konsep CRUD pada sistem informasi berbasis web.

## Status Project

Project ini masih dalam tahap pengembangan dan dapat diperbarui sesuai kebutuhan pembelajaran maupun kebutuhan sistem yang akan dibuat.
