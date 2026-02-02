# Pariwisata Kuliner 🍜

Sistem informasi pariwisata kuliner untuk menjelajahi kelezatan makanan khas daerah dan menemukan restoran terbaik.

## ✨ Fitur Utama

### 👤 Pengguna (Public)
- **Eksplorasi Kuliner**: Temukan berbagai makanan khas dari berbagai daerah.
- **Pencarian & Filter**: Cari kuliner atau restoran berdasarkan nama atau lokasi daerah.
- **Detail Restoran**: Lihat informasi lengkap restoran penyedia kuliner favorit.
- **Rating & Ulasan**: Lihat ulasan dari pengguna lain dan berikan rating (segera hadir).

### 👨‍💼 Administrator
- **Manajemen Kuliner**: Tambah, edit, dan hapus data kuliner.
- **Manajemen Restoran**: Kelola daftar restoran mitra.
- **Manajemen Daerah**: Kelola data wilayah asal kuliner.
- **Dashboard Feedback**: Pantau masukan dari pengguna.

## 🛠️ Teknologi yang Digunakan

- **Backend**: [Laravel 12.x](https://laravel.com)
- **Frontend**: Blade Templating, Vanilla CSS, Vite
- **Database**: MySQL / SQLite
- **Icons**: FontAwesome / Lucide (jika ada)

## 🚀 Cara Menjalankan Projek

### 📋 Prasyarat
- PHP >= 8.2
- Composer
- Node.js & NPM
- XAMPP / Laragon (untuk MySQL)

### 📥 Langkah-langkah Instalasi

1. **Clone repositori ini** (atau bagi anda yang sudah memiliki foldernya, buka terminal di folder tersebut).
   
2. **Install dependencies PHP**:
   ```bash
   composer install
   ```

3. **Install dependencies JavaScript**:
   ```bash
   npm install
   ```

4. **Konfigurasi Environment**:
   Salin file `.env.example` menjadi `.env` dan sesuaikan pengaturan database Anda.
   ```bash
   cp .env.example .env
   ```
   *Note: Pastikan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` sudah benar.*

5. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

6. **Migrasi Database**:
   ```bash
   php artisan migrate
   ```

7. **Jalankan Server**:
   ```bash
   # Terminal 1 (Laravel Server)
   php artisan serve

   # Terminal 2 (Vite Assets)
   npm run dev
   ```

8. **Akses di Browser**:
   Buka `http://localhost:8000`

---

Dibuat dengan ❤️ untuk pecinta kuliner Indonesia.
