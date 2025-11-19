# Sistem Manajemen Klinik VetWell

Sistem manajemen klinik hewan yang komprehensif dibangun dengan Laravel 11, dilengkapi dengan penjadwalan janji temu, manajemen hewan peliharaan, rekam medis, dan RESTful API terintegrasi.

## Daftar Isi

- [Gambaran Umum](#gambaran-umum)
- [Fitur](#fitur)
- [Stack Teknologi](#stack-teknologi)
- [Kebutuhan Sistem](#kebutuhan-sistem)
- [Instalasi](#instalasi)
- [Konfigurasi](#konfigurasi)
- [Dokumentasi API](#dokumentasi-api)
- [Skema Database](#skema-database)
- [Penggunaan](#penggunaan)
- [Testing](#testing)
- [Kontribusi](#kontribusi)
- [Lisensi](#lisensi)

## Gambaran Umum

VetWell adalah sistem manajemen klinik berbasis web modern yang dirancang khusus untuk praktik veteriner. Sistem ini menyederhanakan operasional harian dengan menyediakan tools komprehensif untuk mengelola janji temu, rekam pasien, billing, dan riwayat medis. Sistem ini mencakup antarmuka web dan endpoint RESTful API untuk integrasi seamless dengan aplikasi pihak ketiga.

## Fitur

### Portal Klien
- Registrasi dan autentikasi pengguna
- Manajemen profil hewan peliharaan dengan upload foto
- Booking dan penjadwalan janji temu
- Pelacakan status janji temu secara real-time
- Melihat riwayat medis
- Proses pembayaran online
- Dashboard dengan overview aktivitas

### Portal Dokter
- Manajemen dan konfirmasi janji temu
- Pembuatan dan update rekam medis
- Penambahan layanan selama konsultasi
- Catatan dokter dan resep
- Pembuatan transaksi setelah janji temu selesai
- Dashboard statistik dan analitik

### RESTful API
- Autentikasi berbasis token menggunakan Laravel Sanctum
- Operasi CRUD untuk hewan peliharaan, janji temu, dan layanan
- Pengecekan ketersediaan janji temu secara real-time
- Proses pembayaran transaksi
- Error handling dan validasi komprehensif
- Format respons JSON dengan struktur standar

### Fitur Administratif
- Manajemen pengguna (klien, dokter, admin)
- Manajemen layanan dan harga
- Pelacakan inventori
- Manajemen transaksi dan billing
- Arsip rekam medis

## Stack Teknologi

- **Framework**: Laravel 11.x
- **Versi PHP**: 8.2+
- **Frontend**: Blade Templates, Tailwind CSS, Alpine.js
- **Database**: MySQL/MariaDB
- **Autentikasi**: Laravel Sanctum (API), Laravel Breeze (Web)
- **Build Tool**: Vite
- **Package Manager**: Composer, NPM

## Kebutuhan Sistem

- PHP >= 8.2
- Composer >= 2.0
- Node.js >= 18.x
- MySQL >= 8.0 atau MariaDB >= 10.3
- NPM >= 9.x
- Apache/Nginx web server

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/par3L/vetWell.git
cd vetwell-clinic
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Konfigurasi Environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Setup Database

Konfigurasi kredensial database Anda di `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vetwell_db
DB_USERNAME=username_anda
DB_PASSWORD=password_anda
```

Jalankan migrasi dan seeder:

```bash
php artisan migrate
php artisan db:seed
```

### 5. Build Assets

```bash
npm run build
```

Untuk development:

```bash
npm run dev
```

### 6. Jalankan Development Server

```bash
php artisan serve
```

Akses aplikasi di `http://localhost:8000`

## Konfigurasi

### Konfigurasi API

Set base URL untuk endpoint API di `.env`:

```env
BASE_ENV=http://localhost:8000
```

### Konfigurasi Storage

Buat symbolic link untuk public storage:

```bash
php artisan storage:link
```

### Konfigurasi Queue (Opsional)

Untuk background job processing:

```bash
php artisan queue:work
```

### Autentikasi

Dapatkan API token dengan mengirim POST request ke `/api/login`:

```bash
POST /api/login
Content-Type: application/json

{
  "email": "user@example.com",
  "password": "password"
}
```

### Endpoint yang Tersedia

- **Autentikasi**: `/api/login`
- **Hewan Peliharaan**: `/api/pets`, `/api/pets/create`, `/api/pets/edit/{id}`, `/api/pets/delete/{id}`
- **Janji Temu**: `/api/appointments`, `/api/appointments/create`, `/api/appointments/edit/{id}`, `/api/appointments/cancel/{id}`
- **Layanan**: `/api/services`
- **Dokter**: `/api/doctors`
- **Transaksi**: `/api/transactions/pay/{id}`

Untuk contoh request/response detail, lihat `POSTMAN_GUIDE.md`.

## Skema Database

Aplikasi menggunakan skema database komprehensif dengan tabel utama berikut:

- `users` - Akun pengguna (klien, dokter, admin)
- `clients` - Informasi profil klien
- `doctors` - Profil dokter dan spesialisasi
- `pets` - Profil hewan peliharaan terhubung ke klien
- `services` - Layanan medis yang tersedia
- `appointments` - Janji temu yang dijadwalkan
- `medical_records` - Riwayat medis pasien
- `transactions` - Record billing dan pembayaran
- `transaction_details` - Item detail untuk transaksi
- `items` - Manajemen inventori

Untuk detail skema lengkap, lihat `database-structure.puml`.

## Penggunaan

### Untuk Klien

1. Registrasi akun di `/register`
2. Tambahkan hewan peliharaan Anda via bagian manajemen pet
3. Book janji temu melalui form booking
4. Lacak status janji temu di dashboard
5. Lihat rekam medis dan riwayat transaksi
6. Proses pembayaran untuk kunjungan yang telah selesai

### Untuk Dokter

1. Login dengan kredensial dokter
2. Lihat dan kelola janji temu yang ditugaskan
3. Konfirmasi janji temu yang pending
4. Tambahkan catatan medis dan layanan tambahan selama konsultasi
5. Selesaikan janji temu untuk generate invoice
6. Review riwayat pasien dan rekam medis

### Untuk Administrator

1. Akses panel admin dengan kredensial admin
2. Kelola pengguna, dokter, dan layanan
3. Monitor statistik seluruh sistem
4. Handle billing dan transaksi
5. Generate laporan dan analitik

## Testing

Jalankan test suite:

```bash
php artisan test
```

Jalankan test suite spesifik:

```bash
php artisan test --testsuite=Feature
php artisan test --testsuite=Unit
```

## Struktur Project

```
vetwell-clinic/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── API/
│   │       │   └── ApiController.php
│   │       ├── DashboardController.php
│   │       ├── DoctorDashboardController.php
│   │       └── PetController.php
│   └── Models/
│       ├── User.php
│       ├── Pet.php
│       ├── Appointment.php
│       ├── Transaction.php
│       └── ...
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php
│   └── api.php
├── public/
├── tests/
└── README.md
```

## Kontribusi

Kontribusi sangat diterima! Silakan ikuti panduan berikut:

1. Fork repository
2. Buat feature branch (`git checkout -b feature/FiturBaru`)
3. Commit perubahan Anda (`git commit -m 'Menambahkan fitur baru'`)
4. Push ke branch (`git push origin feature/FiturBaru`)
5. Buat Pull Request

Pastikan kode Anda mengikuti standar coding dan menyertakan test yang sesuai.

## Keamanan

Jika Anda menemukan vulnerability keamanan, silakan email tim development segera. Jangan membuat issue publik untuk masalah keamanan.

## Lisensi

Project ini dilisensikan di bawah MIT License. Lihat file LICENSE untuk detail.

## Acknowledgments

- Dibangun dengan [Laravel](https://laravel.com)
- Styling dengan [Tailwind CSS](https://tailwindcss.com)
- Autentikasi API menggunakan [Laravel Sanctum](https://laravel.com/docs/sanctum)

## Support

Untuk pertanyaan silakan buat issue di repository GitHub.

---

**Versi**: 1.3.0  
**Terakhir Diupdate**: November 2025  
**Maintained By**: Development Team (saya sendiri)
