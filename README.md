# PulseClip 💓

## Sistem Monitoring Detak Jantung Berbasis Web dan IoT

PulseClip adalah sistem monitoring detak jantung (BPM) berbasis web yang dikembangkan sebagai project mata kuliah **Pemrograman Web untuk Aplikasi Medis**. Sistem ini dirancang untuk memantau, mencatat, dan menganalisis data detak jantung pengguna secara real-time melalui dashboard web yang interaktif.

> ⚠️ **Disclaimer:** PulseClip adalah sistem monitoring untuk tujuan edukasi dan pemantauan awal. Bukan alat diagnosis medis.

---

## 📋 Fitur Sprint 1

| No | Fitur | Status |
|----|-------|--------|
| 1 | Landing page informatif | ✅ |
| 2 | Registrasi & Login (authentication) | ✅ |
| 3 | Dashboard monitoring BPM | ✅ |
| 4 | Grafik BPM interaktif (Chart.js) | ✅ |
| 5 | CRUD data monitoring BPM | ✅ |
| 6 | Klasifikasi BPM otomatis | ✅ |
| 7 | Rekomendasi berdasarkan status BPM | ✅ |
| 8 | Riwayat data lengkap | ✅ |
| 9 | Halaman edukasi kesehatan jantung | ✅ |
| 10 | Responsive design | ✅ |

### Klasifikasi BPM:
- **Rendah (Bradikardia):** < 60 BPM
- **Normal:** 60–100 BPM  
- **Tinggi (Takikardia):** > 100 BPM

---

## 🛠️ Tech Stack

- PHP Native
- MySQL
- HTML5, CSS3, JavaScript
- Chart.js (grafik BPM)
- Font: Inter (Google Fonts)

---

## ⚙️ Cara Menjalankan Project

### 1. Prasyarat
- [XAMPP](https://www.apachefriends.org/) terinstall (Apache + MySQL)
- Web browser modern (Chrome, Firefox, Edge)

### 2. Clone / Copy Project
Letakkan folder `PulseClip` di dalam direktori `htdocs` XAMPP:
```
C:\xampp\htdocs\PulseClip\
```

### 3. Import Database
1. Jalankan XAMPP, aktifkan **Apache** dan **MySQL**
2. Buka **phpMyAdmin** di browser: `http://localhost/phpmyadmin`
3. Klik tab **Import**
4. Pilih file `database/schema.sql`
5. Klik **Go** untuk mengeksekusi
6. Database `pulseclip_db` akan otomatis terbuat beserta tabel dan data dummy

### 4. Konfigurasi Database
Edit file `config/database.php` jika pengaturan MySQL Anda berbeda:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');        // Sesuaikan password MySQL Anda
define('DB_NAME', 'pulseclip_db');
```

### 5. Jalankan Project
Buka browser dan akses:
```
http://localhost/PulseClip/
```

---

## 🔐 Akun Dummy untuk Login

| Nama | Email | Password |
|------|-------|----------|
| Admin PulseClip | admin@pulseclip.com | password123 |
| Budi Santoso | budi@example.com | password123 |

---

## 📁 Struktur Folder

```
PulseClip/
│── config/
│   ├── database.php       # Konfigurasi koneksi database
│   └── helpers.php        # Fungsi helper (classifyBPM, getRecommendation)
│
│── assets/
│   ├── css/
│   │   └── style.css      # Stylesheet utama
│   └── js/
│       └── chart.js       # Konfigurasi Chart.js
│
│── includes/
│   ├── header.php         # Header HTML & meta tags
│   ├── sidebar.php        # Sidebar navigasi
│   └── footer.php         # Footer & scripts
│
│── pages/
│   ├── dashboard.php      # Dashboard utama
│   ├── history.php        # Riwayat data BPM
│   ├── add_data.php       # Form tambah data BPM
│   ├── edit_data.php      # Form edit data BPM
│   ├── delete_data.php    # Handler hapus data
│   └── education.php      # Halaman edukasi kesehatan
│
│── auth/
│   ├── login.php          # Halaman login
│   ├── register.php       # Halaman registrasi
│   └── logout.php         # Handler logout
│
│── database/
│   └── schema.sql         # SQL schema & data dummy
│
│── index.php              # Landing page
│── README.md              # Dokumentasi project
```

---

## 🔒 Keamanan

- Password di-hash menggunakan `password_hash()` dan diverifikasi dengan `password_verify()`
- Proteksi halaman menggunakan PHP Session
- Prepared statement (MySQLi) untuk mencegah SQL injection
- Validasi input BPM (30–220 BPM)
- Escape output menggunakan `htmlspecialchars()`
- Ownership check: user hanya bisa mengelola datanya sendiri

---

## 🚀 Rencana Sprint 2

| No | Fitur |
|----|-------|
| 1 | Integrasi ESP32 sebagai mikrokontroler |
| 2 | Sensor MAX30102 (pulse oximeter klip jari) |
| 3 | Pengiriman data BPM real-time via WiFi |
| 4 | API endpoint untuk menerima data dari ESP32 |
| 5 | Notifikasi alert jika BPM abnormal |
| 6 | Real-time update dashboard (auto-refresh / WebSocket) |
| 7 | Export data ke CSV/PDF |

---

## 👥 Tim Pengembang

Project Mata Kuliah: **Pemrograman Web untuk Aplikasi Medis**

---

*© 2026 PulseClip — Sistem Monitoring Detak Jantung Berbasis Web dan IoT*
# PulseClip
