-- ============================================
-- PulseClip Database Schema
-- Sistem Monitoring Detak Jantung Berbasis Web dan IoT
-- Sprint 1: Fondasi Web dengan Data Dummy
-- ============================================

CREATE DATABASE IF NOT EXISTS pulseclip_db;
USE pulseclip_db;

-- ============================================
-- Tabel Users
-- ============================================
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Tabel Heart Rate Data
-- ============================================
CREATE TABLE IF NOT EXISTS heart_rate_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    bpm INT NOT NULL,
    status VARCHAR(20) NOT NULL,
    rekomendasi TEXT NOT NULL,
    source VARCHAR(20) DEFAULT 'manual',
    recorded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Tabel Notifications (Opsional - untuk Sprint 2)
-- ============================================
CREATE TABLE IF NOT EXISTS notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    type VARCHAR(20) DEFAULT 'info',
    is_read TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Data Dummy: User
-- Password: password123 (hashed with password_hash)
-- ============================================
INSERT INTO users (nama_lengkap, email, password) VALUES
('Admin PulseClip', 'admin@pulseclip.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
('Budi Santoso', 'budi@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- ============================================
-- Data Dummy: Heart Rate Data untuk user id=1
-- ============================================
INSERT INTO heart_rate_data (user_id, bpm, status, rekomendasi, source, recorded_at) VALUES
(1, 72, 'Normal', 'Detak jantung berada dalam rentang normal. Tetap jaga pola hidup sehat dan lakukan pemantauan secara berkala.', 'manual', '2026-05-07 08:00:00'),
(1, 85, 'Normal', 'Detak jantung berada dalam rentang normal. Tetap jaga pola hidup sehat dan lakukan pemantauan secara berkala.', 'manual', '2026-05-07 08:30:00'),
(1, 55, 'Rendah', 'Detak jantung berada di bawah rentang normal. Pastikan sensor terpasang dengan benar, lakukan pengukuran ulang, dan segera konsultasikan ke tenaga kesehatan jika disertai keluhan.', 'manual', '2026-05-07 09:00:00'),
(1, 110, 'Tinggi', 'Detak jantung berada di atas rentang normal. Istirahat sejenak, hindari aktivitas berat, dan konsultasikan ke tenaga kesehatan jika kondisi berlanjut.', 'manual', '2026-05-07 09:30:00'),
(1, 78, 'Normal', 'Detak jantung berada dalam rentang normal. Tetap jaga pola hidup sehat dan lakukan pemantauan secara berkala.', 'manual', '2026-05-07 10:00:00'),
(1, 92, 'Normal', 'Detak jantung berada dalam rentang normal. Tetap jaga pola hidup sehat dan lakukan pemantauan secara berkala.', 'manual', '2026-05-07 10:30:00'),
(1, 65, 'Normal', 'Detak jantung berada dalam rentang normal. Tetap jaga pola hidup sehat dan lakukan pemantauan secara berkala.', 'manual', '2026-05-07 11:00:00'),
(1, 105, 'Tinggi', 'Detak jantung berada di atas rentang normal. Istirahat sejenak, hindari aktivitas berat, dan konsultasikan ke tenaga kesehatan jika kondisi berlanjut.', 'manual', '2026-05-07 11:30:00'),
(1, 70, 'Normal', 'Detak jantung berada dalam rentang normal. Tetap jaga pola hidup sehat dan lakukan pemantauan secara berkala.', 'manual', '2026-05-07 12:00:00'),
(1, 48, 'Rendah', 'Detak jantung berada di bawah rentang normal. Pastikan sensor terpasang dengan benar, lakukan pengukuran ulang, dan segera konsultasikan ke tenaga kesehatan jika disertai keluhan.', 'manual', '2026-05-07 12:30:00');

-- Data Dummy: Heart Rate Data untuk user id=2
INSERT INTO heart_rate_data (user_id, bpm, status, rekomendasi, source, recorded_at) VALUES
(2, 80, 'Normal', 'Detak jantung berada dalam rentang normal. Tetap jaga pola hidup sehat dan lakukan pemantauan secara berkala.', 'manual', '2026-05-07 08:00:00'),
(2, 58, 'Rendah', 'Detak jantung berada di bawah rentang normal. Pastikan sensor terpasang dengan benar, lakukan pengukuran ulang, dan segera konsultasikan ke tenaga kesehatan jika disertai keluhan.', 'manual', '2026-05-07 09:00:00'),
(2, 95, 'Normal', 'Detak jantung berada dalam rentang normal. Tetap jaga pola hidup sehat dan lakukan pemantauan secara berkala.', 'manual', '2026-05-07 10:00:00'),
(2, 120, 'Tinggi', 'Detak jantung berada di atas rentang normal. Istirahat sejenak, hindari aktivitas berat, dan konsultasikan ke tenaga kesehatan jika kondisi berlanjut.', 'manual', '2026-05-07 11:00:00'),
(2, 75, 'Normal', 'Detak jantung berada dalam rentang normal. Tetap jaga pola hidup sehat dan lakukan pemantauan secara berkala.', 'manual', '2026-05-07 12:00:00');
