<?php
require_once __DIR__ . '/../config/helpers.php';
requireLogin();
require_once __DIR__ . '/../config/database.php';

$userId = $_SESSION['user_id'];
$pageTitle = 'Tambah Data BPM';
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bpm = isset($_POST['bpm']) ? (int)$_POST['bpm'] : 0;

    // Validasi BPM
    if ($bpm < 30 || $bpm > 220) {
        $error = 'Nilai BPM harus antara 30 - 220.';
    } else {
        // Hitung status dan rekomendasi otomatis
        $status = classifyBPM($bpm);
        $rekomendasi = getRecommendation($status);
        $source = 'manual';

        $stmt = $conn->prepare("INSERT INTO heart_rate_data (user_id, bpm, status, rekomendasi, source) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iisss", $userId, $bpm, $status, $rekomendasi, $source);

        if ($stmt->execute()) {
            header("Location: /PulseClip/pages/dashboard.php");
            exit();
        } else {
            $error = 'Gagal menyimpan data. Silakan coba lagi.';
        }
        $stmt->close();
    }
}

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/sidebar.php';
?>

<!-- Topbar -->
<div class="topbar">
    <h2>➕ Tambah Data BPM</h2>
    <div class="topbar-right">
        <a href="/PulseClip/pages/dashboard.php" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
</div>

<div class="content-area">
    <div class="card form-card">
        <div class="card-header">
            <h3>Input Data BPM Manual</h3>
        </div>
        <div class="card-body">
            <?php if ($error): ?>
                <div class="alert alert-danger">⚠️ <?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <div class="alert alert-info">
                ℹ️ Pada Sprint 1, data BPM dimasukkan secara manual sebagai simulasi data sensor. Pada Sprint 2, data akan dikirim otomatis dari sensor ESP32 + MAX30102.
            </div>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="bpm">Nilai BPM (Beats Per Minute)</label>
                    <input type="number" id="bpm" name="bpm" min="30" max="220" placeholder="Contoh: 72" required value="<?php echo isset($bpm) ? $bpm : ''; ?>">
                </div>

                <div class="form-group">
                    <label>Status BPM</label>
                    <input type="text" value="Otomatis dihitung oleh sistem" disabled>
                </div>

                <div class="form-group">
                    <label>Rekomendasi</label>
                    <input type="text" value="Otomatis dibuat oleh sistem" disabled>
                </div>

                <div class="form-group">
                    <label>Source</label>
                    <input type="text" value="manual" disabled>
                </div>

                <button type="submit" class="btn btn-primary">💾 Simpan Data</button>
            </form>

            <!-- Klasifikasi Info -->
            <div style="margin-top: 24px; padding: 16px; background: var(--bg); border-radius: var(--radius-sm);">
                <p style="font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Klasifikasi BPM:</p>
                <p style="font-size: 0.85rem; color: var(--gray);">
                    <span class="badge badge-warning">⚠️ Rendah</span> &lt; 60 BPM &nbsp;|&nbsp;
                    <span class="badge badge-success">✅ Normal</span> 60–100 BPM &nbsp;|&nbsp;
                    <span class="badge badge-danger">🔴 Tinggi</span> &gt; 100 BPM
                </p>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
