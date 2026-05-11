<?php
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
$userName = isset($_SESSION['nama_lengkap']) ? $_SESSION['nama_lengkap'] : 'User';
$userEmail = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$initials = '';
$words = explode(' ', $userName);
foreach ($words as $w) {
    $initials .= strtoupper(mb_substr($w, 0, 1));
}
$initials = substr($initials, 0, 2);
?>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">
        <h1>Pulse<span>Clip</span></h1>
        <p>Heart Rate Monitoring</p>
    </div>

    <nav class="sidebar-nav">
        <a href="/PulseClip/pages/dashboard.php" class="<?php echo $currentPage === 'dashboard' ? 'active' : ''; ?>">
            <span class="nav-icon">📊</span> Dashboard
        </a>
        <a href="/PulseClip/pages/history.php" class="<?php echo $currentPage === 'history' ? 'active' : ''; ?>">
            <span class="nav-icon">📋</span> Riwayat Data
        </a>
        <a href="/PulseClip/pages/add_data.php" class="<?php echo $currentPage === 'add_data' ? 'active' : ''; ?>">
            <span class="nav-icon">➕</span> Tambah Data
        </a>
        <a href="/PulseClip/pages/education.php" class="<?php echo $currentPage === 'education' ? 'active' : ''; ?>">
            <span class="nav-icon">📚</span> Edukasi
        </a>
        <a href="/PulseClip/auth/logout.php">
            <span class="nav-icon">🚪</span> Logout
        </a>
    </nav>

    <div class="sidebar-user">
        <div class="user-avatar"><?php echo $initials; ?></div>
        <div class="user-info">
            <div class="user-name"><?php echo htmlspecialchars($userName); ?></div>
            <div class="user-email"><?php echo htmlspecialchars($userEmail); ?></div>
        </div>
    </div>
</aside>

<!-- Main Content -->
<div class="main-content">
