<?php
require_once __DIR__ . '/../config/helpers.php';
requireLogin();
require_once __DIR__ . '/../config/database.php';

$userId = $_SESSION['user_id'];
$pageTitle = 'Riwayat Data';

// Ambil semua data milik user, urut terbaru
$stmt = $conn->prepare("SELECT * FROM heart_rate_data WHERE user_id = ? ORDER BY recorded_at DESC");
$stmt->bind_param("i", $userId);
$stmt->execute();
$allData = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/sidebar.php';
?>

<!-- Topbar -->
<div class="topbar">
    <h2>📋 Riwayat Data BPM</h2>
    <div class="topbar-right">
        <a href="/PulseClip/pages/add_data.php" class="btn btn-primary btn-sm">+ Tambah Data</a>
    </div>
</div>

<div class="content-area">

    <?php if (isset($_GET['deleted'])): ?>
        <div class="alert alert-success">✅ Data berhasil dihapus.</div>
    <?php endif; ?>

    <?php if (isset($_GET['updated'])): ?>
        <div class="alert alert-success">✅ Data berhasil diperbarui.</div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <h3>Semua Data Monitoring</h3>
            <span class="badge badge-info"><?php echo count($allData); ?> data</span>
        </div>
        <div class="card-body" style="padding: 0;">
            <?php if (count($allData) > 0): ?>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>BPM</th>
                                <th>Status</th>
                                <th>Rekomendasi</th>
                                <th>Source</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($allData as $row): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><span class="bpm-value"><?php echo htmlspecialchars($row['bpm']); ?></span></td>
                                <td>
                                    <span class="badge <?php echo getStatusBadgeClass($row['status']); ?>">
                                        <?php echo getStatusIcon($row['status']) . ' ' . htmlspecialchars($row['status']); ?>
                                    </span>
                                </td>
                                <td style="max-width: 250px; font-size: 0.85rem; color: var(--gray);">
                                    <?php echo htmlspecialchars($row['rekomendasi']); ?>
                                </td>
                                <td><span class="badge badge-info"><?php echo htmlspecialchars($row['source']); ?></span></td>
                                <td style="white-space: nowrap;"><?php echo formatWaktu($row['recorded_at']); ?></td>
                                <td style="white-space: nowrap;">
                                    <a href="/PulseClip/pages/edit_data.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
                                    <a href="/PulseClip/pages/delete_data.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️ Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-icon">📋</div>
                    <h3>Belum Ada Data</h3>
                    <p>Anda belum memiliki data monitoring BPM. Mulai tambahkan data untuk memantau detak jantung Anda.</p>
                    <a href="/PulseClip/pages/add_data.php" class="btn btn-primary btn-sm">+ Tambah Data BPM</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
