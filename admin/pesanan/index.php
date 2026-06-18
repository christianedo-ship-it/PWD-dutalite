<?php
include "../security.php"; 
include "../../koneksi.php";

$sql = "SELECT orders.*, products.product_name
FROM orders
JOIN products
ON orders.product_id = products.id
ORDER BY orders.id DESC";

$query = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duta Lite Admin - Manajemen Pesanan</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>Duta Lite</h2>
            <p>Panel Admin</p>
        </div>
        <ul class="nav-links">
            <li><a href="../dashboard.php">📊 Dashboard</a></li>
            <li><a href="../products/index.php">📦 Manajemen Produk</a></li>
            <li><a href="index.php" class="active">📝 Manajemen Pesanan</a></li>
        </ul>
        <div class="sidebar-footer">
            <a href="../logout.php" class="logout-btn">🚪 Logout</a>
        </div>
    </aside>

    <main class="main-content">
        <header class="top-header">
            <div class="header-left">
                <h3>Manajemen Pesanan Masuk</h3>
            </div>
            <div class="header-right">
                <span>Welcome, <strong><?= htmlspecialchars($username ?? 'Admin'); ?></strong></span>
            </div>
        </header>

        <div class="content-body">
            
            <div class="table-header-action">
                <h2>Daftar Form Pesanan & Kontak</h2>
            </div>

            <div class="table-container table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Ukuran</th>
                            <th>Jumlah (Pcs)</th>
                            <th>Pemesan</th>
                            <th>Toko/Perusahaan</th>
                            <th>Email</th>
                            <th>Total Volume</th>
                            <th>Tanggal Masuk</th>    
                            <th>Status</th> 
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            while($result = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><strong><?= htmlspecialchars($result['product_name']) ?></strong></td>
                            <td><?= htmlspecialchars($result['size']) ?></td>
                            <td><?= htmlspecialchars($result['product_quantity']) ?></td>
                            <td><?= htmlspecialchars($result['customer_name']) ?></td>
                            <td><?= htmlspecialchars($result['company_name'] ?: '-') ?></td>
                            <td><?= htmlspecialchars($result['email']) ?></td>
                            <td><strong><?= htmlspecialchars($result['order_quantity']) ?> M³</strong></td>
                            <td style="white-space: nowrap;"><?= htmlspecialchars($result['created_at']) ?></td>
                            
                            <td style="text-align: center;">
                                <?php
                                    $status_class = "badge-pending"; // default
                                    if ($result['status'] == 'diproses') $status_class = "badge-proses";
                                    elseif ($result['status'] == 'selesai') $status_class = "badge-selesai";
                                    elseif ($result['status'] == 'dibatalkan') $status_class = "badge-batal";
                                ?>
                                <span class="badge <?= $status_class ?>"><?= ucfirst($result['status']) ?></span>
                                
                                <div class="status-links">
                                    <a href="status.php?id=<?= $result['id'] ?>&status=pending">Pending</a> |
                                    <a href="status.php?id=<?= $result['id'] ?>&status=diproses">Proses</a> |
                                    <a href="status.php?id=<?= $result['id'] ?>&status=selesai">Selesai</a> |
                                    <a href="status.php?id=<?= $result['id'] ?>&status=dibatalkan">Batal</a>
                                </div>
                            </td>

                            <td class="action-buttons">
                                <a href="hapus.php?id=<?= $result['id'] ?>" class="btn-sm btn-delete" onclick="return confirm('Yakin ingin hapus pesanan dari <?= $result['customer_name'] ?>?')">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

</body>
</html>