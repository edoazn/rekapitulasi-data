# Rekapitulasi Data

Website rekapitulasi data menggunakan Laravel dan Filament.

## Deskripsi

Proyek ini adalah aplikasi web untuk melakukan rekapitulasi data dengan framework Laravel sebagai backend dan Filament sebagai admin panel. Cocok digunakan untuk kebutuhan pencatatan, pelaporan, atau manajemen data secara efisien.

## Fitur

- Manajemen data dinamis
- Dashboard interaktif dengan Filament
- Autentikasi dan otorisasi pengguna
- CRUD data dengan interface modern
- Export dan import data
- Pencarian dan filter data
- Responsive design

## Teknologi yang Digunakan

- **Laravel** (PHP)
- **Filament Admin Panel**
- **Blade** (template engine Laravel)
- **JavaScript**
- **CSS**

## Prasyarat

Sebelum menginstal aplikasi ini, pastikan sistem Anda memenuhi persyaratan berikut:

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL/MariaDB
- Git

## Instalasi

1. Clone repository:

   ```bash
   git clone https://github.com/edoazn/rekapitulasi-data.git
   cd rekapitulasi-data
   ```

2. Install dependency PHP via Composer:

   ```bash
   composer install
   ```

3. Install dependency frontend:

   ```bash
   npm install
   npm run build
   ```

4. Copy file .env dan atur konfigurasi database:

   ```bash
   cp .env.example .env
   ```

5. Generate key aplikasi:

   ```bash
   php artisan key:generate
   ```

6. Migrasi database:

   ```bash
   php artisan migrate
   ```

7. Jalankan server lokal:

   ```bash
   php artisan serve
   ```

8. Akses aplikasi di [http://localhost:8000](http://localhost:8000)

## Penggunaan

1. Login ke sistem menggunakan kredensial yang telah dibuat
2. Akses panel admin Filament di `/admin`
3. Mulai mengelola data melalui menu yang tersedia

## Struktur Direktori

```
rekapitulasi-data/
├── app/                # Logic aplikasi
├── config/            # File konfigurasi
├── database/          # Migrasi dan seeders
├── public/            # Asset publik
├── resources/         # Views dan asset frontend
├── routes/            # Definisi route
└── tests/             # Unit dan feature tests
```

## Pemeliharaan

- Jalankan perintah berikut untuk update dependensi:
  ```bash
  composer update
  npm update
  ```
- Backup database secara berkala
- Pastikan selalu menggunakan versi PHP dan Laravel yang didukung

## Kontribusi

1. Fork repository
2. Buat branch fitur baru (`git checkout -b fitur-baru`)
3. Commit perubahan (`git commit -m 'Menambahkan fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat Pull Request

## Lisensi

[MIT License](LICENSE)

## Informasi Kontak

Untuk pertanyaan dan dukungan, silakan hubungi:
- GitHub: [@edoazn](https://github.com/edoazn)

## Update Terakhir

2025-06-08

---

&copy; 2025 Dikembangkan oleh [edoazn](https://github.com/edoazn)
