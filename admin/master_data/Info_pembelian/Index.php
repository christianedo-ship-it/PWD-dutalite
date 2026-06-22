<?php

include "../../security.php";
include "../../../koneksi.php";

$sql = "SELECT * FROM purchase_info LIMIT 1";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data - Info Pembelian</title>
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
                    <li><a href="../keunggulan/index.php">⭐ Keunggulan</a></li>
                    <li><a href="index.php" class="active">🛒 Info Pembelian</a></li>
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
                <h3>Master Data Info Pembelian</h3>
            </div>

            <div class="header-right">
                <span>
                    Welcome,
                    <strong><?= htmlspecialchars($username ?? 'Admin'); ?></strong>
                </span>
            </div>
        </header>

        <div class="content-body">

            <div class="form-container">

                <div class="form-header">
                    <h2>Informasi Pembelian</h2>
                </div>

                <form action="proses.php" method="POST" class="admin-form">

                    <div class="form-group">
                        <label>Panduan & Syarat Pembelian</label>

                        <textarea
                            name="description"
                            class="form-control"
                            rows="6"
                            placeholder="Masukkan syarat dan ketentuan pembelian di sini..."
                            required><?= htmlspecialchars($data['description'] ?? ''); ?></textarea>
                    </div>

                    <div class="form-action" style="margin-top: 30px;">
                        <button type="submit" name="update" class="btn btn-primary">
                            💾 Simpan Perubahan
                        </button>
                    </div>

                </form>

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