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
    <link rel="stylesheet" href="styles/style.css?v=<?= time(); ?>"> 
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>Duta Lite</h2>
            <p>Panel Admin</p>
        </div>

        <ul class="nav-links">
            <li><a href="dashboard.php" class="active">📊 Dashboard</a></li>

            <li>
                <a href="javascript:void(0)" class="dropdown-btn">📁 Master Data <span class="arrow">▼</span></a>
                <ul class="dropdown-container">
                    <li><a href="master_data/profil_lokasi/index.php">🏢 Profil & Lokasi</a></li>
                    <li><a href="master_data/visi_misi/index.php">🎯 Visi & Misi</a></li>
                    <li><a href="master_data/keunggulan/index.php">⭐ Keunggulan</a></li>
                    <li><a href="master_data/info_pembelian/index.php">🛒 Info Pembelian</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0)" class="dropdown-btn">🗄️ Manajemen Data <span class="arrow">▼</span></a>
                <ul class="dropdown-container">
                    <li><a href="manajemen_data/products/index.php">📦 Produk</a></li>
                    <li><a href="manajemen_data/pesanan/index.php">📝 Pesanan</a></li>
                </ul>
            </li>
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
                <p>Ini adalah halaman utama panel kontrol admin Duta Lite. Silakan gunakan menu di sebelah kiri atau menu cepat di bawah untuk mengelola data website.</p>
            </div>

            <h2 style="margin-bottom: 15px; color: #2c3e50; font-size: 1.4rem;">📁 Master Data</h2>
            <div class="stats-grid" style="margin-bottom: 40px;">
                <div class="stat-card">
                    <h3>Profil & Lokasi</h3>
                    <p>Kelola profil, lokasi cabang & head office</p>
                    <a href="master_data/profil_lokasi/index.php" class="btn">Lihat Data</a>
                </div>
                <div class="stat-card">
                    <h3>Visi & Misi</h3>
                    <p>Kelola visi dan misi</p>
                    <a href="master_data/visi_misi/index.php" class="btn">Lihat Data</a>
                </div>
                <div class="stat-card">
                    <h3>Keunggulan</h3>
                    <p>Kelola daftar poin keunggulan</p>
                    <a href="master_data/keunggulan/index.php" class="btn">Lihat Data</a>
                </div>
                <div class="stat-card">
                    <h3>Info Pembelian</h3>
                    <p>Kelola syarat pembelian</p>
                    <a href="master_data/purchase_info/index.php" class="btn">Lihat Data</a>
                </div>
            </div>

            <h2 style="margin-bottom: 15px; color: #2c3e50; font-size: 1.4rem;">🗄️ Manajemen Data</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Produk</h3>
                    <p>Kelola data bata ringan</p>
                    <a href="manajemen_data/products/index.php" class="btn">Lihat Produk</a>
                </div>
                <div class="stat-card">
                    <h3>Pesanan</h3>
                    <p>Cek form pesanan / kontak masuk</p>
                    <a href="manajemen_data/pesanan/index.php" class="btn">Lihat Pesanan</a>
                </div>
            </div>

        </div>
    </main>

    <script>
        var dropdowns = document.getElementsByClassName("dropdown-btn");
        for (var i = 0; i < dropdowns.length; i++) {
            dropdowns[i].addEventListener("click", function() {
                var dropdownContent = this.nextElementSibling;
                var arrow = this.querySelector(".arrow");

                if (dropdownContent.classList.contains("show")) {
                    dropdownContent.classList.remove("show");
                    arrow.classList.remove("rotate");
                } else {
                    dropdownContent.classList.add("show");
                    arrow.classList.add("rotate");
                }
            });
        }
    </script>
</body>
</html>