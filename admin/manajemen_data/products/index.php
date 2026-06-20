<<?php
include "../../security.php";
include "../../../koneksi.php";

$sql = "SELECT * FROM products ORDER BY id ASC";
$query = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duta Lite Admin - Manajemen Produk</title>
    <link rel="stylesheet" href="../../styles/style.css?v=<?= time(); ?>">
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>Duta Lite</h2>
            <p>Panel Admin</p>
        </div>
        
        <ul class="nav-links">
            <li><a href="../../dashboard.php">📊 Dashboard</a></li>
            
            <li>
                <a href="javascript:void(0)" class="dropdown-btn">📁 Master Data <span class="arrow">▼</span></a>
                <ul class="dropdown-container">
                    <li><a href="master_data/profil_lokasi.php">🏢 Profil & Lokasi</a></li>
                    <li><a href="master_data/visi_misi.php">🎯 Visi & Misi</a></li>
                    <li><a href="master_data/keunggulan.php">⭐ Keunggulan</a></li>
                    <li><a href="master_data/purchase_info.php">🛒 Info Pembelian</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0)" class="dropdown-btn active">🗄️ Manajemen Data <span class="arrow rotate">▼</span></a>
                <ul class="dropdown-container show">
                    <li><a href="index.php" class="active">📦 Produk</a></li>
                    <li><a href="../pesanan/index.php">📝 Pesanan</a></li>
                </ul>
            </li>
        </ul>

        <div class="sidebar-footer">
            <a href="../../logout.php" class="logout-btn">🚪 Logout</a>
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
                            <td><strong><?= htmlspecialchars($product_name) ?></strong></td>
                            <td><?= htmlspecialchars($product_size) ?></td>
                            <td>Rp <?= number_format((float)$price, 0, ',', '.') ?></td>
                            <td><?= htmlspecialchars($description) ?></td>
                            <td><?= htmlspecialchars($image) ?></td>
                            <td class="action-buttons">
                                <a href="edit.php?id=<?= $id; ?>" class="btn-sm btn-edit">Edit</a>
                                <a href="hapus.php?id=<?= $id; ?>" class="btn-sm btn-delete" onclick="return confirm('Yakin ingin menghapus ukuran <?= htmlspecialchars($product_size) ?>?')">Hapus</a>
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