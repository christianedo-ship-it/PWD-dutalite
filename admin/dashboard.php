<?php
include "security.php";
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duta Lite - Admin Dashboard</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>Duta Lite</h2>
            <p>Panel Admin</p>
        </div>
        <ul class="nav-links">
            <li><a href="dashboard.php" class="active">📊 Dashboard</a></li>
            <li><a href="products/index.php">📦 Manajemen Produk</a></li>
            <li><a href="pesanan/index.php">📝 Manajemen Pesanan</a></li>
        </ul>
        <div class="sidebar-footer">
            <a href="logout.php" class="logout-btn">🚪 Logout</a>
        </div>
    </aside>

    <main class="main-content">
        <header class="top-header">
            <div class="header-left">
                <h3>Dashboard Overview</h3>
            </div>
            <div class="header-right">
                <span>Welcome, <strong><?= htmlspecialchars($username ?? 'Admin'); ?></strong></span>
            </div>
        </header>

        <div class="content-body">
            <div class="welcome-card">
                <h1>Selamat Datang, <?= htmlspecialchars($username ?? 'Admin'); ?>! 👋</h1>
                <p>Ini adalah halaman utama panel kontrol admin Duta Lite. Silakan gunakan menu di sebelah kiri untuk mengelola data website.</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Produk</h3>
                    <p>Kelola data bata ringan</p>
                    <a href="products/index.php" class="btn">Lihat Produk</a>
                </div>
                <div class="stat-card">
                    <h3>Pesanan</h3>
                    <p>Cek form pesanan / kontak</p>
                    <a href="pesanan/index.php" class="btn">Lihat Pesanan</a>
                </div>
            </div>
        </div>
    </main>

</body>
</html>