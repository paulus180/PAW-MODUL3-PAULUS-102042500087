# PAW-MODUL3-PAULUS-102042500087

## Sistem Peminjaman Buku Perpustakaan

Aplikasi berbasis web yang dikembangkan menggunakan Laravel untuk mengelola data buku, anggota perpustakaan, serta transaksi peminjaman dan pengembalian buku.

### Fitur
- Login admin
- Pengelolaan data buku (CRUD)
- Pengelolaan data anggota (CRUD)
- Transaksi peminjaman buku
- Pengembalian buku
- Pengelolaan stok buku

### Teknologi
- PHP
- Laravel
- MySQL
- Blade
- Bootstrap

### Persyaratan
- PHP
- Composer
- MySQL
- Laragon atau server lokal sejenis

### Instalasi
1. Clone repository.
2. Jalankan `composer install`.
3. Salin `.env.example` menjadi `.env`.
4. Buat database MySQL dan sesuaikan konfigurasi database pada `.env`.
5. Jalankan `php artisan key:generate`.
6. Jalankan `php artisan migrate --seed`.
7. Jalankan `php artisan serve`.
8. Buka alamat lokal yang ditampilkan oleh Laravel di browser.

### Catatan
Sesuaikan konfigurasi database sebelum menjalankan migration dan seeder.