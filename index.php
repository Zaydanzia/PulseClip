<?php
session_start();
// Jika sudah login, langsung ke dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: /PulseClip/pages/dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PulseClip - Sistem Monitoring Detak Jantung Berbasis Web dan IoT. Pantau detak jantung Anda secara real-time.">
    <title>PulseClip - Sistem Monitoring Detak Jantung</title>
    <link rel="stylesheet" href="/PulseClip/assets/css/style.css">
</head>
<body>

<!-- Navigation -->
<nav class="landing-nav">
    <div class="logo">
        <span class="heartbeat">❤️</span> Pulse<span>Clip</span>
    </div>
    <div class="nav-btns">
        <a href="/PulseClip/auth/login.php" class="btn btn-outline btn-sm">Login</a>
        <a href="/PulseClip/auth/register.php" class="btn btn-primary btn-sm">Register</a>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <div class="hero-badge">
            <span class="heartbeat">💓</span> Monitoring Detak Jantung Real-Time
        </div>
        <h1>Pantau Detak Jantung Anda dengan <span style="background: linear-gradient(135deg, #0891b2, #14b8a6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">PulseClip</span></h1>
        <p>Sistem monitoring detak jantung berbasis web dan IoT. Dapatkan data BPM secara real-time, analisis kondisi jantung, dan rekomendasi kesehatan langsung di dashboard Anda.</p>
        <div class="hero-btns">
            <a href="/PulseClip/auth/register.php" class="btn btn-primary">Mulai Sekarang →</a>
            <a href="/PulseClip/auth/login.php" class="btn btn-outline">Sudah Punya Akun</a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section" id="fitur">
    <h2>Fitur Utama</h2>
    <p class="section-sub">Semua yang Anda butuhkan untuk monitoring detak jantung</p>

    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">💓</div>
            <h3>Monitoring BPM</h3>
            <p>Pantau detak jantung (BPM) Anda secara real-time. Data ditampilkan langsung di dashboard dengan informasi yang mudah dipahami.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">📈</div>
            <h3>Grafik Detak Jantung</h3>
            <p>Visualisasi data BPM dalam bentuk grafik interaktif menggunakan Chart.js. Lihat tren dan pola detak jantung Anda.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">📋</div>
            <h3>Riwayat Data</h3>
            <p>Simpan dan akses seluruh riwayat pengukuran detak jantung Anda. Data tersimpan aman dan bisa diakses kapan saja.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🩺</div>
            <h3>Status Kondisi</h3>
            <p>Klasifikasi otomatis status detak jantung: Normal, Rendah (Bradikardia), atau Tinggi (Takikardia) beserta rekomendasi.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">📚</div>
            <h3>Edukasi Kesehatan</h3>
            <p>Pelajari tentang detak jantung, faktor yang mempengaruhinya, dan cara menjaga kesehatan jantung Anda.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🔌</div>
            <h3>Integrasi IoT</h3>
            <p>Siap untuk integrasi dengan ESP32 dan sensor MAX30102. Arsitektur sistem sudah dirancang untuk menerima data sensor secara langsung.</p>
        </div>
    </div>
</section>

<!-- Disclaimer -->
<section class="disclaimer-section">
    <div class="disclaimer-box">
        <h3>⚠️ Disclaimer</h3>
        <p>PulseClip adalah sistem monitoring detak jantung untuk tujuan edukasi dan pemantauan awal. Sistem ini <strong>bukan alat diagnosis medis</strong>. Selalu konsultasikan kondisi kesehatan Anda kepada tenaga medis profesional.</p>
    </div>
</section>

<!-- Footer -->
<footer class="landing-footer">
    <p>&copy; 2026 PulseClip — Sistem Monitoring Detak Jantung Berbasis Web dan IoT. Project Mata Kuliah Pemrograman Web untuk Aplikasi Medis.</p>
</footer>

</body>
</html>
