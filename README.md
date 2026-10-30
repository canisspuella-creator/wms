# Sistem Gudang Kita - Warehouse Management System

Aplikasi web manajemen inventaris gudang berbasis Laravel 12 dan MySQL.
Dibuat untuk UAS WAD04 - Web Application Development.

## Fitur
- Autentikasi: registrasi, login, logout (session, CSRF, validasi server-side)
- Role-based access: **admin** dan **staff**
- CRUD Kategori dan Supplier (admin)
- CRUD Produk dengan pencarian nama/SKU (admin; staff hanya melihat)
- Transaksi stok barang masuk/keluar, dengan validasi stok dan pembaruan stok atomik (admin dan staff)
- Dashboard ringkasan: total produk, stok menipis, total transaksi

## Teknologi
Laravel 12, PHP 8.2+, MySQL, Blade, Bootstrap 5

## Instalasi Lokal
1. `git clone https://github.com/USERNAME/wms.git`
2. `cd wms`
3. `composer install`
4. `copy .env.example .env` (Windows) atau `cp .env.example .env`
5. `php artisan key:generate`
6. Buat database MySQL kosong bernama `wms_db`, lalu sesuaikan `DB_USERNAME` dan `DB_PASSWORD` di `.env`
7. `php artisan migrate --seed`
8. `php artisan serve`, lalu buka http://127.0.0.1:8000

Alternatif tanpa migrasi: impor file `database/wms_db.sql` ke MySQL.

## Akun Demo
| Role  | Email              | Password     |
|-------|--------------------|--------------|
| Admin | huluaja@gmail.com  | belajarwad   |
| Staff | staff@gmail.com    | staffwad123  |

Akun ini hanya untuk keperluan penilaian.

## Hak Akses
| Fitur               | Admin | Staff |
|---------------------|-------|-------|
| Dashboard           | Ya    | Ya    |
| Lihat produk        | Ya    | Ya    |
| Kelola produk       | Ya    | Tidak |
| Kelola kategori     | Ya    | Tidak |
| Kelola supplier     | Ya    | Tidak |
| Catat transaksi stok| Ya    | Ya    |