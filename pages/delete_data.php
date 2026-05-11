<?php
require_once __DIR__ . '/../config/helpers.php';
requireLogin();
require_once __DIR__ . '/../config/database.php';

$userId = $_SESSION['user_id'];

// Ambil ID data
$dataId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($dataId === 0) {
    header("Location: /PulseClip/pages/history.php");
    exit();
}

// Hapus data, pastikan hanya pemilik data yang bisa menghapus
$stmt = $conn->prepare("DELETE FROM heart_rate_data WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $dataId, $userId);
$stmt->execute();
$stmt->close();

header("Location: /PulseClip/pages/history.php?deleted=1");
exit();
