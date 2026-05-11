<?php
require_once __DIR__ . '/../config/helpers.php';
requireLogin();
require_once __DIR__ . '/../config/database.php';

$userId = $_SESSION['user_id'];
$pageTitle = 'Edit Data BPM';
$error = '';

// Ambil ID data
$dataId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($dataId === 0) {
    header("Location: /PulseClip/pages/history.php");
    exit();
}

// Ambil data, pastikan milik user yang login
$stmt = $conn->prepare("SELECT * FROM heart_rate_data WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $dataId, $userId);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$data) {
    header("Location: /PulseClip/pages/history.php");
    exit();
}

// Proses update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bpm = isset($_POST['bpm']) ? (int)$_POST['bpm'] : 0;

    if ($bpm < 30 || $bpm > 220) {
        $error = 'Nilai BPM harus antara 30 - 220.';
    } else {
        // Hitung ulang status dan rekomendasi
        $status = classifyBPM($bpm);
        $rekomendasi = getRecommendation($status);

        $stmt = $conn->prepare("UPDATE heart_rate_data SET bpm = ?, status = ?, rekomendasi = ? WHERE id = ? AND user_id = ?");
        $stmt->bind_param("issii", $bpm, $status, $rekomendasi, $dataId, $userId);

        if ($stmt->execute()) {
            header("Location: /PulseClip/pages/history.php?updated=1");
            exit();
        } else {
            $error = 'Gagal memperbarui data. Silakan coba lagi.';
        }
        $stmt->close();
    }
}

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/sidebar.php';
?>

<!-- Topbar -->
<div class="topbar">
    <h2>✏️ Edit Data BPM</h2>
    <div class="topbar-right">
        <a href="/PulseClip/pages/history.php" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
</div>

<div class="content-area">
    <div class="card form-card">
        <div class="card-header">
            <h3>Edit Data #<?php echo $dataId; ?></h3>
        </div>
        <div class="card-body">
            <?php if ($error): ?>
                <div class="alert alert-danger">⚠️ <?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="bpm">Nilai BPM (Beats Per Minute)</label>
                    <input type="number" id="bpm" name="bpm" min="30" max="220" required value="<?php echo htmlspecialchars($data['bpm']); ?>">
                </div>

                <div class="form-group">
                    <label>Status Saat Ini</label>
                    <input type="text" value="<?php echo htmlspecialchars($data['status']); ?>" disabled>
                </div>

                <div class="form-group">
                    <label>Rekomendasi Saat Ini</label>
                    <input type="text" value="<?php echo htmlspecialchars($data['rekomendasi']); ?>" disabled>
                </div>

                <div class="form-group">
                    <label>Waktu Pengukuran</label>
                    <input type="text" value="<?php echo formatWaktu($data['recorded_at']); ?>" disabled>
                </div>

                <div class="alert alert-info" style="margin-bottom: 16px;">
                    ℹ️ Status dan rekomendasi akan otomatis dihitung ulang setelah BPM diperbarui.
                </div>

                <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
                <a href="/PulseClip/pages/history.php" class="btn btn-secondary" style="margin-left: 8px;">Batal</a>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
