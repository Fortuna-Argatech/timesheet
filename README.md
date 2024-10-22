# Timesheet Management System
Sistem manajemen timesheet ini memungkinkan sinkronisasi data dari API eksternal, menyimpan log waktu, dan mengelola informasi karyawan secara efisien menggunakan Laravel. Aplikasi ini mendukung CRUD timesheet dengan notifikasi dan validasi menggunakan AJAX dan SweetAlert2.

## Daftar Isi
1. [Fitur](#fitur)
2. [Prasyarat](#prasyarat)
3. [Instalasi](#instalasi)
4. [Penggunaan](#penggunaan)
4. [Stack](#stack)
8. [Lisensi](#lisensi)

## Fitur
- View dan Delete **Timesheet**.
- Edit dan Delete **Time Logs**.
- Create, Read, Update, Delete **Activity Type**
- View dan Update **Employee** (Baru)
- **Sinkronisasi API** dengan sistem ERP eksternal.
- **Validasi input** dengan masing-masing Request.
- **AJAX** untuk operasi tanpa reload halaman.

## Prasyarat
- PHP 8.1 atau lebih tinggi
- Composer 2.x
- PostgreSQL
- Node.js dan NPM
- Laravel 11.x

## Instalasi

 1. Clone Repository:
 ```
 git clone https://github.com/username/timesheet-management.git
 ```
 
 2. Install dependencies:
 ```
 composer install npm
 install && npm run build
 ```
 
 3. Setup environment variables: Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi:
 ```
 cp .env.example .env
 ```
 
 4. Generate application key:
 ```
 php artisan key:generate
 ```
 
 5. Buat Database dengan nama `timesheet_db` lalu Migrasi:
 ```
 php artisan migrate
 ```
 
 6. Jalankan Website:
 ```
 php artisan serve
 ```

## Penggunaan

 - **Sinkronisasi timesheet:**
 Buka halaman Timesheet pada sidebar setelah itu pilih timesheet pada dropdown dari API ERP untuk disimpan ke database.
 - **Update dan Delete TimeLog:**
 Edit Activitiy Type, From Time atau To Time dan Hapus Time Log.
 - **Create, Read, Update dan Delete Activity Type:**
 Setiap aksi bisa dilakukan pada activity type
 - **Notifikasi**
 Setiap aksi akan menampilkan pesan konfirmasi atau kesalahan menggunakan SweetAlert2.

## Stack
<div style="display: flex; align-items: center; gap: 1rem;">
    <img src="https://github.com/user-attachments/assets/b2186acf-1e12-430a-90b0-658a13b86229" width="40" height="40">
    <img src="https://github.com/user-attachments/assets/6fb55d4e-6e04-4f42-8748-9cca116adfd3" width="40" height="40">
</div>

## Lisensi
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
