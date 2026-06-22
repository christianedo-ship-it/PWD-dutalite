<?php
include "../../security.php";
include "../../../koneksi.php";

$sql_vision = "SELECT * FROM vision WHERE id_vision = 1";
$query_vision = mysqli_query($koneksi, $sql_vision);
$data_vision = mysqli_fetch_assoc($query_vision);

$sql_mission = "SELECT * FROM mission ORDER BY id_mission ASC";
$query_mission = mysqli_query($koneksi, $sql_mission);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data - Visi & Misi</title>
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
                <a href="javascript:void(0)" class="dropdown-btn active">📁 Master Data <span class="arrow rotate">▼</span></a>
                <ul class="dropdown-container show">
                    <li><a href="../profil_lokasi/index.php">🏢 Profil & Lokasi</a></li>
                    <li><a href="index.php" class="active">🎯 Visi & Misi</a></li>
                    <li><a href="../keunggulan/index.php">⭐ Keunggulan</a></li>
                    <li><a href="../purchase_info/index.php">🛒 Info Pembelian</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0)" class="dropdown-btn">🗄️ Manajemen Data <span class="arrow">▼</span></a>
                <ul class="dropdown-container">
                    <li><a href="../../manajemen_data/products/index.php">📦 Produk</a></li>
                    <li><a href="../../manajemen_data/pesanan/index.php">📝 Pesanan</a></li>
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
                <h3>Manajemen Visi & Misi</h3>
            </div>
            <div class="header-right">
                <span>Welcome, <strong><?= htmlspecialchars($username ?? 'Admin'); ?></strong></span>
            </div>
        </header>

        <div class="content-body">
            
            <div class="form-container" style="margin-bottom: 40px;">
                <div class="form-header">
                    <h2>Teks Visi Perusahaan</h2>
                </div>
                
                <form method="POST" action="ubah_visi.php" class="admin-form">
                    <div class="form-group">
                        <label>Visi Utama</label>
                        <textarea name="description" class="form-control" rows="3" required><?= htmlspecialchars($data_vision['description'] ?? ''); ?></textarea>
                    </div>
                    <div class="form-action">
                        <button type="submit" name="simpan_visi" class="btn btn-primary">💾 Update Visi</button>
                    </div>
                </form>
            </div>

            <div class="table-header-action">
                <h2>Daftar Misi Perusahaan</h2>
                </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="80%">Deskripsi Misi</th>
                            <th width="15%" style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            if (mysqli_num_rows($query_mission) > 0) {
                                while($misi = mysqli_fetch_array($query_mission)){
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= nl2br(htmlspecialchars($misi['description'])) ?></td>
                            <td class="action-buttons" style="text-align: center;">
                                <a href="edit_misi.php?id=<?= $misi['id_mission'] ?>" class="btn-sm btn-edit">Edit Misi</a>
                            </td>
                        </tr>
                        <?php 
                                }
                            } else {
                        ?>
                            <tr>
                                <td colspan="3" style="text-align: center; color: #7f8c8d;">Belum ada data misi. Silakan insert manual di database pertama kali.</td>
                            </tr>
                        <?php } ?>
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
