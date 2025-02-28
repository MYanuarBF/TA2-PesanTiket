# Sistem Pemesanan Tiket

Sistem pemesanan tiket sederhana menggunakan Laravel.

## Persyaratan Sistem

- PHP >= 8.1
- Composer
- MySQL/MariaDB

## Langkah Instalasi

1. Clone repository ini
```bash
git clone [url-repository]
cd [nama-folder-project]
```

2. Install dependensi PHP
```bash
composer install
```

3. Salin file .env.example menjadi .env
```bash
cp .env.example .env
```

4. Generate application key
```bash
php artisan key:generate
```

5. Konfigurasi database di file .env
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=password_database
```

6. Jalankan migrasi database
```bash
php artisan migrate
```

7. Setup role super_admin pada user yang tersedia 
```bash
php artisan shield:super-admin --user
```

8. Jalankan server development
```bash
php artisan serve
```

Aplikasi sekarang dapat diakses di `http://localhost:8000`

## Fitur Utama

- Pemesanan tiket
- Manajemen harga tiket
- Login
- Register
- Email Verification
- Role Management
etc

## Library used
- Filament
- Filament Shield
- Bootstrap 5 - Framework CSS
