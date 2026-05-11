<?php
/**
 * PulseClip - Helper Functions
 * Fungsi-fungsi bantuan untuk klasifikasi BPM dan rekomendasi
 */

/**
 * Klasifikasi BPM
 * @param int $bpm Nilai detak jantung per menit
 * @return string Status: Rendah, Normal, atau Tinggi
 */
function classifyBPM($bpm) {
    if ($bpm < 60) {
        return "Rendah";
    } elseif ($bpm >= 60 && $bpm <= 100) {
        return "Normal";
    } else {
        return "Tinggi";
    }
}

/**
 * Mendapatkan rekomendasi berdasarkan status BPM
 * @param string $status Status BPM: Rendah, Normal, atau Tinggi
 * @return string Rekomendasi kesehatan
 */
function getRecommendation($status) {
    switch ($status) {
        case "Rendah":
            return "Detak jantung berada di bawah rentang normal. Pastikan sensor terpasang dengan benar, lakukan pengukuran ulang, dan segera konsultasikan ke tenaga kesehatan jika disertai keluhan.";
        case "Normal":
            return "Detak jantung berada dalam rentang normal. Tetap jaga pola hidup sehat dan lakukan pemantauan secara berkala.";
        case "Tinggi":
            return "Detak jantung berada di atas rentang normal. Istirahat sejenak, hindari aktivitas berat, dan konsultasikan ke tenaga kesehatan jika kondisi berlanjut.";
        default:
            return "Status tidak dikenali. Silakan lakukan pengukuran ulang.";
    }
}

/**
 * Mendapatkan warna badge berdasarkan status BPM
 * @param string $status Status BPM
 * @return string CSS class untuk badge
 */
function getStatusBadgeClass($status) {
    switch ($status) {
        case "Rendah":
            return "badge-warning";
        case "Normal":
            return "badge-success";
        case "Tinggi":
            return "badge-danger";
        default:
            return "badge-secondary";
    }
}

/**
 * Mendapatkan ikon berdasarkan status BPM
 * @param string $status Status BPM
 * @return string Emoji ikon
 */
function getStatusIcon($status) {
    switch ($status) {
        case "Rendah":
            return "⚠️";
        case "Normal":
            return "✅";
        case "Tinggi":
            return "🔴";
        default:
            return "❓";
    }
}

/**
 * Format waktu ke format Indonesia
 * @param string $datetime Datetime string
 * @return string Formatted datetime
 */
function formatWaktu($datetime) {
    return date('d M Y, H:i', strtotime($datetime));
}

/**
 * Proteksi halaman - cek apakah user sudah login
 */
function requireLogin() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['user_id'])) {
        header("Location: /PulseClip/auth/login.php");
        exit();
    }
}
