<img width="450" height="228" alt="logo2" src="https://github.com/user-attachments/assets/13bb5436-b105-4459-ba1b-7240d176cdd1" />

# Sistem Manajemen Klinik VetWell

sistem manajemen klinik hewan yang komprehensif dibangun dengan laravel 11, dilengkapi dengan penjadwalan janji temu, manajemen hewan peliharaan, rekam medis, manajemen profil pengguna, dan restful api terintegrasi.

## Daftar Isi

- [gambaran umum](#gambaran-umum)
- [fitur](#fitur)
- [stack teknologi](#stack-teknologi)
- [kebutuhan sistem](#kebutuhan-sistem)
- [instalasi](#instalasi)
- [konfigurasi](#konfigurasi)
- [dokumentasi api](#dokumentasi-api)
- [skema database](#skema-database)
- [penggunaan](#penggunaan)
- [testing](#testing)
- [kontribusi](#kontribusi)
- [lisensi](#lisensi)

## Gambaran Umum

vetwell adalah sistem manajemen klinik berbasis web modern yang dirancang khusus untuk praktik veteriner. sistem ini menyederhanakan operasional harian dengan menyediakan tools komprehensif untuk mengelola janji temu, rekam pasien, billing, dan riwayat medis. sistem ini mencakup antarmuka web dan endpoint restful api untuk integrasi seamless dengan aplikasi pihak ketiga.

## Fitur

### Portal Klien
- registrasi dan autentikasi pengguna
- manajemen profil dengan upload foto (user-photos)
- edit profil (nama, email, telepon)
- ganti password dengan validasi
- manajemen profil hewan peliharaan dengan upload foto (pet-photos)
- booking dan penjadwalan janji temu dengan pilihan dokter dan layanan
- pelacakan status janji temu secara real-time (pending, confirmed, completed, cancelled)
- pembatalan janji temu yang masih pending
- melihat riwayat medis
- proses pembayaran untuk transaksi
- dashboard dengan overview statistik (total pets, appointments, transactions)
- tampilan foto profil di navbar dan sidebar

### Portal Dokter
- registrasi dokter dengan upload foto profil (doc-photos)
- autentikasi terpisah untuk dokter
- manajemen profil dokter (foto, nama, email, telepon, spesialisasi, posisi)
- ganti password dengan validasi
- dashboard dengan statistik appointment (pending, confirmed, completed)
- manajemen dan konfirmasi janji temu
- pembuatan dan update rekam medis
- penambahan layanan dan item selama konsultasi
- catatan dokter dan diagnosis
- pembuatan transaksi otomatis setelah janji temu selesai
- tampilan foto profil di navbar dan sidebar
- kontrol visibilitas di halaman team (show_in_team toggle)

### Portal Admin
- dashboard dengan statistik lengkap (total users, pets, appointments, revenue)
- manajemen dokter (crud dengan upload foto ke doc-photos)
- toggle status show_in_team untuk menampilkan dokter di halaman team
- manajemen staff dengan upload foto (staff-photos)
- manajemen layanan dan harga (crud services)
- manajemen transaksi dan billing
- monitoring seluruh sistem

### Restful API
- autentikasi berbasis token menggunakan laravel sanctum
- endpoint pets (list, create, edit, delete)
- endpoint appointments (list, create, edit, cancel)
- endpoint services (list)
- endpoint doctors (list)
- endpoint transactions (pay)
- error handling dan validasi komprehensif
- format respons json dengan struktur standar

### Fitur Tambahan
- sistem role-based access control (admin, dokter, klien)
- upload foto dengan storage laravel di storage/app/public
- folder terorganisir: doc-photos, pet-photos, user-photos, staff-photos
- symbolic link storage ke public/storage
- validasi upload file (image, max size)
- preview foto sebelum upload dengan javascript
- fallback ke inisial nama jika tidak ada foto
- relationship eloquent yang kompleks antar model

## TechStack

- **framework**: laravel 11.x
- **versi php**: 8.2+
- **frontend**: blade templates, tailwind css, alpine.js
- **database**: mysql/mariadb
- **autentikasi**: laravel sanctum (api), authentication (web)
- **storage**: laravel storage dengan symbolic link
- **build tool**: vite
- **package manager**: composer, npm
- **testing**: phpunit dengan refreshdatabase

## Kebutuhan Sistem

- php >= 8.2
- composer >= 2.0
- node.js >= 18.x
- mysql >= 8.0 atau mariadb >= 10.3
- npm >= 9.x
- apache/nginx web server

## Instalasi

### 1. Clone repository

```bash
git clone https://github.com/par3L/vetWell.git
cd vetwell-clinic
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Konfigurasi environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Setup database

konfigurasi kredensial database anda di `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vetwell_db
DB_USERNAME=username_anda
DB_PASSWORD=password_anda
```

jalankan migrasi dan seeder:

```bash
php artisan migrate
php artisan db:seed
```

### 5. Setup storage

buat symbolic link untuk public storage:

```bash
php artisan storage:link
```

### 6. Build assets

```bash
npm run build
```

untuk development:

```bash
npm run dev
```

### 7. Jalankan development server

```bash
php artisan serve
```

akses aplikasi di `http://localhost:8000`

## konfigurasi

### Konfigurasi API

set base url untuk endpoint api di `.env`:

```env
BASE_ENV=http://localhost:8000
```

### Konfigurasi Storage

symbolic link sudah dibuat pada step instalasi. folder storage yang digunakan:
- `storage/app/public/doc-photos` - foto profil dokter
- `storage/app/public/pet-photos` - foto hewan peliharaan
- `storage/app/public/user-photos` - foto profil user klien
- `storage/app/public/staff-photos` - foto staff

## Dokumentasi API

### Autentikasi

dapatkan api token dengan mengirim post request ke `/api/login`:

```bash
POST /api/login
Content-Type: application/json

{
  "email": "user@example.com",
  "password": "password"
}

Response:
{
  "success": true,
  "message": "login berhasil",
  "data": {
    "user": {...},
    "token": "1|abc123..."
  }
}
```

gunakan token di header untuk request berikutnya:
```
Authorization: Bearer {token}
```

### Endpoint yang Tersedia

#### Pets
- `GET /api/pets` - list semua pets user
- `POST /api/pets/create` - buat pet baru (multipart/form-data untuk foto)
- `POST /api/pets/edit/{id}` - update pet
- `POST /api/pets/delete/{id}` - hapus pet

#### Appointments
- `GET /api/appointments` - list appointments user
- `POST /api/appointments/create` - buat appointment baru
- `POST /api/appointments/edit/{id}` - update appointment
- `POST /api/appointments/cancel/{id}` - cancel appointment

#### Services
- `GET /api/services` - list semua layanan tersedia

#### Doctors
- `GET /api/doctors` - list semua dokter

#### Transactions
- `POST /api/transactions/pay/{id}` - bayar transaksi

semua endpoint kecuali login memerlukan authentication token.

## Penggunaan

### Untuk Klien

1. registrasi akun di `/register` (role otomatis menjadi klien)
2. login dan akses dashboard di `/dashboard`
3. lengkapi profil di menu profile (upload foto, edit nama/email/telepon, ganti password)
4. tambahkan hewan peliharaan via "kelola hewan peliharaan" dengan upload foto
5. book janji temu melalui "buat janji temu"
   - pilih hewan peliharaan
   - pilih layanan (bisa multiple)
   - pilih dokter
   - tentukan tanggal dan waktu
6. lacak status janji temu di "riwayat janji temu"
   - pending: menunggu konfirmasi dokter
   - confirmed: dokter sudah konfirmasi
   - completed: sudah selesai, transaksi dibuat
   - cancelled: dibatalkan
7. batalkan appointment yang masih pending
8. lihat dan bayar transaksi di menu transaksi
9. foto profil akan tampil di navbar dan sidebar

### Untuk Dokter

1. registrasi dokter di `/dokter/register` dengan upload foto profil
2. login dan akses dashboard dokter di `/doctor`
3. lihat dashboard dengan statistik appointment
4. kelola profil di menu profile
   - upload/ganti foto profil (disimpan di storage/doc-photos)
   - edit nama, email, telepon, spesialisasi, posisi
   - ganti password
5. lihat daftar appointment di "manajemen janji temu"
6. konfirmasi appointment yang pending
7. selesaikan appointment yang confirmed
   - sistem otomatis membuat transaksi
   - bisa tambahkan catatan medis
8. foto profil tampil di navbar dan sidebar
9. jika show_in_team aktif, muncul di halaman team publik

### Untuk Administrator

1. login dengan akun admin di `/login`
2. akses panel admin dengan statistik lengkap
3. kelola dokter di menu "kelola tim"
   - tambah/edit/hapus dokter
   - upload foto profil dokter
   - toggle show_in_team untuk visibilitas di halaman team
4. kelola staff dengan upload foto
5. kelola layanan
   - tambah/edit/hapus layanan
   - set nama, deskripsi, harga
6. monitor transaksi dan appointment
7. lihat statistik: total users, pets, appointments, revenue

## Struktur project

```
vetwell-clinic/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── API/
│   │   │   │   └── ApiController.php       # api endpoints
│   │   │   ├── AdminController.php         # admin management
│   │   │   ├── AuthController.php          # user authentication
│   │   │   ├── DashboardController.php     # user dashboard & profile
│   │   │   ├── DoctorAuthController.php    # doctor registration
│   │   │   ├── DoctorDashboardController.php # doctor dashboard & profile
│   │   │   ├── PetController.php           # pet crud
│   │   │   └── PublicController.php        # public pages
│   │   └── Middleware/
│   └── Models/
│       ├── User.php                        # user model dengan role
│       ├── Doctor.php                      # doctor profile
│       ├── Pet.php                         # pet model
│       ├── Appointment.php                 # appointment model
│       ├── Service.php                     # service model
│       ├── Transaction.php                 # transaction model
│       └── TransactionDetail.php           # transaction detail
├── database/
│   ├── migrations/                         # database schema
│   ├── seeders/
│   │   ├── DatabaseSeeder.php              # main seeder
│   │   ├── AdminSeeder.php                 # admin account
│   │   ├── DoctorSeeder.php                # sample doctors
│   │   ├── ServiceSeeder.php               # default services
│   │   └── TestUserSeeder.php              # test users
│   └── factories/
│       └── UserFactory.php                 # factory untuk testing
├── resources/
│   ├── views/
│   │   ├── dashboard/
│   │   │   ├── profile.blade.php           # user profile page
│   │   │   ├── pets/                       # pet views
│   │   │   └── layout.blade.php            # user layout
│   │   ├── doctor/
│   │   │   ├── profile.blade.php           # doctor profile page
│   │   │   └── layout.blade.php            # doctor layout
│   │   ├── admin/                          # admin views
│   │   ├── components/
│   │   │   └── navbar.blade.php            # navbar dengan foto
│   │   └── auth/                           # auth pages
│   ├── css/
│   │   └── app.css                         # tailwind styles
│   └── js/
│       └── app.js                          # javascript
├── routes/
│   ├── web.php                             # web routes
│   └── api.php                             # api routes
├── storage/
│   └── app/
│       └── public/                         # storage folder
│           ├── doc-photos/                 # doctor photos
│           ├── pet-photos/                 # pet photos
│           ├── user-photos/                # user photos
│           └── staff-photos/               # staff photos
├── public/
│   ├── storage/                            # symbolic link ke storage
│   └── build/                              # compiled assets
├── .env.example                            # environment template
├── composer.json                           # php dependencies
├── package.json                            # node dependencies
├── tailwind.config.js                      # tailwind configuration
├── vite.config.js                          # vite configuration
└── README.md                               # dokumentasi ini
```

## Kontribusi

kontribusi sangat diterima. silakan ikuti panduan berikut:

1. fork repository
2. buat feature branch (`git checkout -b feat/<fitur-baru>`)
3. commit perubahan anda (`git commit -m 'menambahkan fitur baru'`)
4. push ke branch (`git push origin feat/<fitur-baru>`)
5. buat pull request

## Acknowledgments

- dibangun dengan [laravel](https://laravel.com)
- styling dengan [tailwind css](https://tailwindcss.com)
- interaktivitas dengan [alpine.js](https://alpinejs.dev)
- autentikasi api menggunakan [laravel sanctum](https://laravel.com/docs/sanctum)

## Support

untuk pertanyaan silakan buat issue di repository github atau hubungi development team.

## Changelog

### Version 2.0.0 (november 2025)
- added comprehensive profile management untuk user dan dokter
- added photo upload untuk profile (doc-photos, user-photos)
- added photo display di navbar dan sidebar
- fixed toggle show_in_team untuk doctor management
- fixed image upload untuk staff
- reorganized storage structure (doc-photos, pet-photos, user-photos, staff-photos)
- added comprehensive unit testing (38 tests)
- improved authentication dengan role validation
- added password change functionality dengan current password validation

### Version 1.3.0 (november 2025)
- initial release dengan fitur dasar
- appointment booking system
- pet management
- medical records
- transaction management
- restful api

---

**versi**: 2.0.0  
**terakhir diupdate**: 20 November 2025  
**maintained by**: development team

**developer**: farell (@par3L)  
**repository**: [github.com/par3L/vetWell](https://github.com/par3L/vetWell)
