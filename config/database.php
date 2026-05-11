<?php
/**
 * PulseClip - Konfigurasi Database
 * Koneksi ke MySQL menggunakan MySQLi
 */

// Konfigurasi Database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'pulseclip_db');

// Buat koneksi
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal. Silakan periksa konfigurasi database Anda.");
}

// Set charset UTF-8
$conn->set_charset("utf8mb4");
