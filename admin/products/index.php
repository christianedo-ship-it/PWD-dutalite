<?php
include "../security.php";
include "../../koneksi.php";

$sql = "SELECT * FROM products ORDER BY id ASC";
$query = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duta Lite Admin - Manajemen Produk</title>
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
            <li><a href="index.php" class="active">📦 Manajemen Produk</a></li>
            <li><a href="../pesanan/index.php">📝 Manajemen Pesanan</a></li>
        </ul>
        <div class="sidebar-footer">
            <a href="../logout.php" class="logout-btn">🚪 Logout</a>
        </div>
    </aside>

    <main class="main-content">
        <header class="top-header">
            <div class="header-left">
                <h3>Manajemen Produk</h3>
            </div>
            <div class="header-right">
                <span>Welcome, <strong><?= htmlspecialchars($username ?? 'Admin'); ?></strong></span>
            </div>
        </header>

        <div class="content-body">
            
            <div class="table-header-action">
                <h2>Daftar Produk (Bata Ringan)</h2>
                <a href="tambah.php" class="btn btn-primary">+ Tambah Produk</a>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">Nama Produk</th>
                            <th width="15%">Ukuran</th>
                            <th width="15%">Harga</th>
                            <th width="30%">Deskripsi</th>
                            <th width="10%">Gambar</th>
                            <th width="10%" style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            while($result = mysqli_fetch_array($query)){
                                $product_name = $result['product_name'];
                                $product_size = $result['product_size'];
                                $price        = $result['price'];
                                $description  = $result['description'];
                                $image        = $result['image'];
                                $id           = $result['id'];
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= htmlspecialchars($product_name) ?></td>
                            <td><?= htmlspecialchars($product_size) ?></td>
                            <td>Rp <?= number_format((float)$price, 0, ',', '.') ?></td>
                            <td><?= htmlspecialchars($description) ?></td>
                            <td><?= htmlspecialchars($image) ?></td>
                            <td class="action-buttons">
                                <a href="edit.php?id=<?= $id; ?>" class="btn-sm btn-edit">Edit</a>
                                <a href="hapus.php?id=<?= $id; ?>" class="btn-sm btn-delete" onclick="return confirm('Yakin ingin menghapus ukuran <?= $ukuran ?>?')">Hapus</a>
                            </td>
                        </tr>
                        <?php
                            $no++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

</body>
</html>