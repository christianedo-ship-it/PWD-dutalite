<?php
include "security.php";
include "../koneksi.php";


$query_produk = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM products");
$total_produk = mysqli_fetch_assoc($query_produk)['total'];

$query_pesanan = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM orders");
$total_pesanan = mysqli_fetch_assoc($query_pesanan)['total'];

$query_pending = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM orders WHERE status='pending'");
$total_pending = mysqli_fetch_assoc($query_pending)['total'];

$query_selesai = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM orders WHERE status='selesai'");
$total_selesai = mysqli_fetch_assoc($query_selesai)['total'];

$sql_recent_orders = "SELECT orders.*, products.product_name 
                      FROM orders 
                      JOIN products ON orders.product_id = products.id 
                      ORDER BY orders.created_at DESC LIMIT 5";
$query_recent = mysqli_query($koneksi, $sql_recent_orders);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duta Lite - Admin Dashboard</title>
    <link rel="stylesheet" href="styles/style.css?v=<?= time(); ?>"> 
    <style>
        .kpi-number {
            font-size: 3rem;
            font-weight: 800;
            color: #1b365d;
            margin: 10px 0;
        }
        .kpi-card {
            text-align: center;
            padding: 25px 20px;
        }
        .text-danger { color: #e74c3c; }
        .text-success { color: #2ecc71; }
    </style>
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
                    <li><a href="master_data/purchase_info/index.php">🛒 Info Pembelian</a></li>
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
            
            <div class="welcome-card" style="margin-bottom: 30px;">
                <h1>Selamat Datang, <?= htmlspecialchars($username ?? 'Admin'); ?>! 👋</h1>
                <p>Berikut adalah ringkasan data dan aktivitas terbaru di sistem Duta Lite saat ini.</p>
            </div>

            <h2 style="margin-bottom: 15px; color: #2c3e50; font-size: 1.4rem;">📈 Ringkasan Data</h2>
            <div class="stats-grid" style="margin-bottom: 40px; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
                
                <div class="stat-card kpi-card">
                    <h3 style="color: #7f8c8d; font-size: 1.1rem;">Total Produk</h3>
                    <div class="kpi-number"><?= $total_produk; ?></div>
                    <p style="font-size: 0.9rem;">Varian Bata Ringan</p>
                </div>

                <div class="stat-card kpi-card">
                    <h3 style="color: #7f8c8d; font-size: 1.1rem;">Total Pesanan Masuk</h3>
                    <div class="kpi-number"><?= $total_pesanan; ?></div>
                    <p style="font-size: 0.9rem;">Sejak sistem berjalan</p>
                </div>

                <div class="stat-card kpi-card" style="border-bottom: 4px solid #e74c3c;">
                    <h3 style="color: #7f8c8d; font-size: 1.1rem;">Menunggu Proses</h3>
                    <div class="kpi-number text-danger"><?= $total_pending; ?></div>
                    <p style="font-size: 0.9rem;">Status: Pending</p>
                </div>

                <div class="stat-card kpi-card" style="border-bottom: 4px solid #2ecc71;">
                    <h3 style="color: #7f8c8d; font-size: 1.1rem;">Pesanan Selesai</h3>
                    <div class="kpi-number text-success"><?= $total_selesai; ?></div>
                    <p style="font-size: 0.9rem;">Berhasil dikirim</p>
                </div>

            </div>

            <div class="form-container" style="padding: 25px;">
                <div class="table-header-action" style="margin-bottom: 20px; border-bottom: 2px solid #f1f5f9; padding-bottom: 15px;">
                    <h2 style="color: #1b365d;">🕒 Pesanan Terbaru</h2>
                    <a href="manajemen_data/pesanan/index.php" class="btn btn-secondary">Lihat Semua Pesanan ➡</a>
                </div>

                <div class="table-container table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Tanggal Masuk</th>
                                <th>Pemesan</th>
                                <th>Produk</th>
                                <th>Total Volume</th>
                                <th style="text-align: center;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($query_recent) > 0): ?>
                                <?php while($row = mysqli_fetch_assoc($query_recent)): ?>
                                <tr>
                                    <td style="white-space: nowrap;"><?= htmlspecialchars($row['created_at']) ?></td>
                                    <td><strong><?= htmlspecialchars($row['customer_name']) ?></strong></td>
                                    <td><?= htmlspecialchars($row['product_name']) ?></td>
                                    <td><?= htmlspecialchars($row['order_quantity']) ?> M³</td>
                                    <td style="text-align: center;">
                                        <?php
                                            $status_class = "badge-pending"; // Default
                                            if ($row['status'] == 'diproses') $status_class = "badge-proses";
                                            elseif ($row['status'] == 'selesai') $status_class = "badge-selesai";
                                            elseif ($row['status'] == 'dibatalkan') $status_class = "badge-batal";
                                        ?>
                                        <span class="badge <?= $status_class ?>"><?= ucfirst($row['status']) ?></span>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" style="text-align: center; color: #7f8c8d; padding: 20px;">Belum ada data pesanan yang masuk.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
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