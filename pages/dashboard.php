<?php
require_once __DIR__ . '/../config/helpers.php';
requireLogin();
require_once __DIR__ . '/../config/database.php';

$userId = $_SESSION['user_id'];
$pageTitle = 'Dashboard';

// Data BPM terbaru
$stmt = $conn->prepare("SELECT * FROM heart_rate_data WHERE user_id = ? ORDER BY recorded_at DESC LIMIT 1");
$stmt->bind_param("i", $userId);
$stmt->execute();
$latestData = $stmt->get_result()->fetch_assoc();
$stmt->close();

// Total data monitoring
$stmt = $conn->prepare("SELECT COUNT(*) as total FROM heart_rate_data WHERE user_id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$totalData = $stmt->get_result()->fetch_assoc()['total'];
$stmt->close();

// 5 data terbaru untuk tabel
$stmt = $conn->prepare("SELECT * FROM heart_rate_data WHERE user_id = ? ORDER BY recorded_at DESC LIMIT 5");
$stmt->bind_param("i", $userId);
$stmt->execute();
$recentData = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Data untuk grafik (20 data terakhir, diurutkan ASC untuk timeline)
$stmt = $conn->prepare("SELECT bpm, recorded_at FROM heart_rate_data WHERE user_id = ? ORDER BY recorded_at DESC LIMIT 20");
$stmt->bind_param("i", $userId);
$stmt->execute();
$chartDataRaw = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

$chartData = array_reverse($chartDataRaw);
$chartLabels = [];
$chartValues = [];
foreach ($chartData as $row) {
    $chartLabels[] = date('d/m H:i', strtotime($row['recorded_at']));
    $chartValues[] = (int)$row['bpm'];
}

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/sidebar.php';
?>

<!-- Topbar -->
<div class="topbar">
    <h2>📊 Dashboard</h2>
    <div class="topbar-right">
        <span class="topbar-date"><?php echo date('l, d F Y'); ?></span>
    </div>
</div>

<div class="content-area">

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card card-bpm">
            <div class="stat-icon">💓</div>
            <div class="stat-label">BPM Terbaru</div>
            <div class="stat-value"><?php echo $latestData ? $latestData['bpm'] : '—'; ?></div>
        </div>

        <div class="stat-card card-status">
            <div class="stat-icon">🩺</div>
            <div class="stat-label">Status Terbaru</div>
            <div class="stat-value">
                <?php if ($latestData): ?>
                    <span class="badge <?php echo getStatusBadgeClass($latestData['status']); ?>">
                        <?php echo getStatusIcon($latestData['status']) . ' ' . htmlspecialchars($latestData['status']); ?>
                    </span>
                <?php else: ?>
                    —
                <?php endif; ?>
            </div>
        </div>

        <div class="stat-card card-time">
            <div class="stat-icon">🕐</div>
            <div class="stat-label">Pengukuran Terakhir</div>
            <div class="stat-value" style="font-size:1rem;">
                <?php echo $latestData ? formatWaktu($latestData['recorded_at']) : '—'; ?>
            </div>
        </div>

        <div class="stat-card card-total">
            <div class="stat-icon">📋</div>
            <div class="stat-label">Total Data</div>
            <div class="stat-value"><?php echo $totalData; ?></div>
        </div>
    </div>

    <!-- Chart -->
    <div class="card">
        <div class="card-header">
            <h3>📈 Grafik BPM</h3>
            <a href="/PulseClip/pages/add_data.php" class="btn btn-primary btn-sm">+ Tambah Data</a>
        </div>
        <div class="card-body">
            <?php if (count($chartValues) > 0): ?>
                <div class="chart-container">
                    <canvas id="bpmChart"></canvas>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-icon">📊</div>
                    <h3>Belum Ada Data</h3>
                    <p>Tambahkan data BPM pertama Anda untuk melihat grafik.</p>
                    <a href="/PulseClip/pages/add_data.php" class="btn btn-primary btn-sm">+ Tambah Data BPM</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Data Table -->
    <div class="card">
        <div class="card-header">
            <h3>🕐 5 Data Terbaru</h3>
            <a href="/PulseClip/pages/history.php" class="btn btn-secondary btn-sm">Lihat Semua →</a>
        </div>
        <div class="card-body" style="padding: 0;">
            <?php if (count($recentData) > 0): ?>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>BPM</th>
                                <th>Status</th>
                                <th>Source</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recentData as $row): ?>
                            <tr>
                                <td><span class="bpm-value"><?php echo htmlspecialchars($row['bpm']); ?></span></td>
                                <td>
                                    <span class="badge <?php echo getStatusBadgeClass($row['status']); ?>">
                                        <?php echo getStatusIcon($row['status']) . ' ' . htmlspecialchars($row['status']); ?>
                                    </span>
                                </td>
                                <td><span class="badge badge-info"><?php echo htmlspecialchars($row['source']); ?></span></td>
                                <td><?php echo formatWaktu($row['recorded_at']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-icon">📋</div>
                    <h3>Belum Ada Data</h3>
                    <p>Data monitoring BPM belum tersedia. Silakan tambahkan data untuk memulai monitoring.</p>
                    <a href="/PulseClip/pages/add_data.php" class="btn btn-primary btn-sm">+ Tambah Data BPM</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Disclaimer -->
    <div class="alert alert-warning" style="margin-top: 8px;">
        ⚠️ <strong>Disclaimer:</strong> PulseClip adalah sistem monitoring untuk tujuan edukasi dan pemantauan awal. Bukan alat diagnosis medis. Konsultasikan kondisi Anda ke tenaga medis profesional.
    </div>
</div>

<?php if (count($chartValues) > 0): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const labels = <?php echo json_encode($chartLabels); ?>;
    const data = <?php echo json_encode($chartValues); ?>;
    initBPMChart(labels, data);
});
</script>
<?php endif; ?>

<?php include __DIR__ . '/../includes/footer.php'; ?>
