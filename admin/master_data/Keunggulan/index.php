<?php

include "../../security.php";
include "../../../koneksi.php";

$sql = "SELECT * FROM benefits ORDER BY id_benefits ASC";
$query = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data - Keunggulan</title>
    <link rel="stylesheet" href="../../styles/style.css?v=<?= time(); ?>">
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>Duta Lite</h2>
            <p>Panel Admin</p>
        </div>

        <ul class="nav-links">
            <li>
                <a href="../../dashboard.php">📊 Dashboard</a>
            </li>

            <li>
                <a href="javascript:void(0)" class="dropdown-btn active">
                    📁 Master Data
                    <span class="arrow rotate">▼</span>
                </a>

                <ul class="dropdown-container show">
                    <li><a href="../profil_lokasi/index.php">🏢 Profil & Lokasi</a></li>
                    <li><a href="../visi_misi/index.php">🎯 Visi & Misi</a></li>
                    <li><a href="index.php" class="active">⭐ Keunggulan</a></li>
                    <li><a href="../info_pembelian/index.php">🛒 Info Pembelian</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0)" class="dropdown-btn">
                    🗄️ Manajemen Data
                    <span class="arrow">▼</span>
                </a>

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
                <h3>Master Data Keunggulan</h3>
            </div>

            <div class="header-right">
                <span>
                    Welcome,
                    <strong><?= htmlspecialchars($username ?? 'Admin'); ?></strong>
                </span>
            </div>
        </header>

        <div class="content-body">

            <div class="form-container" style="padding: 25px;">

                <div class="table-header-action" style="margin-bottom: 20px; border-bottom: 2px solid #f1f5f9; padding-bottom: 15px;">
                    <h2>Daftar Poin Keunggulan</h2>
                    <a href="tambah.php" class="btn btn-primary">
                        + Tambah Keunggulan
                    </a>
                </div>

                <div class="table-container">
                    <table>

                        <thead>
                            <tr>
                                <th width="8%" style="text-align:center;">No</th>
                                <th width="72%">Deskripsi Keunggulan</th>
                                <th width="20%" style="text-align:center;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            $no = 1;

                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_array($query)) {
                            ?>

                                <tr>
                                    <td style="text-align:center;">
                                        <?= $no++ ?>
                                    </td>

                                    <td>
                                        <strong>
                                            <?= htmlspecialchars($row['description']) ?>
                                        </strong>
                                    </td>

                                    <td class="action-buttons" style="text-align:center;">
                                        <a href="edit.php?id=<?= $row['id_benefits'] ?>" class="btn-sm btn-edit">
                                            Edit
                                        </a>

                                        <a href="hapus.php?id=<?= $row['id_benefits'] ?>"
                                           class="btn-sm btn-delete"
                                           onclick="return confirm('Yakin ingin menghapus poin keunggulan ini?')">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>

                            <?php
                                }
                            } else {
                            ?>

                                <tr>
                                    <td colspan="3" style="text-align:center; color:#7f8c8d; padding:20px;">
                                        Belum ada data keunggulan. Silakan klik tombol Tambah Keunggulan.
                                    </td>
                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>
                </div>

            </div>

        </div>

    </main>

    <script>
        var dropdowns = document.getElementsByClassName("dropdown-btn");

        for (var i = 0; i < dropdowns.length; i++) {

            dropdowns[i].addEventListener("click", function () {

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