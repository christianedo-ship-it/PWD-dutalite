<?php

include "../../security.php";
include "../../../koneksi.php";

$id = $_GET['id'] ?? '';

if ($id == '') {
    header("Location: index.php");
    exit;
}

$sql = "SELECT * FROM benefits WHERE id_benefits='$id'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Keunggulan</title>
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
                <h3>Edit Poin Keunggulan</h3>
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
                    <h2>Edit Keunggulan</h2>
                    <a href="index.php" class="btn btn-secondary">
                        ⬅ Kembali
                    </a>
                </div>

                <form method="POST" action="ubah.php" class="admin-form">

                    <input
                        type="hidden"
                        name="id_benefits"
                        value="<?= $data['id_benefits']; ?>"
                    >

                    <div class="form-group">
                        <label>Deskripsi Keunggulan (Maks. 50 Karakter)</label>

                        <input
                            type="text"
                            name="description"
                            class="form-control"
                            value="<?= htmlspecialchars($data['description']); ?>"
                            maxlength="50"
                            required
                        >
                    </div>

                    <div class="form-action">
                        <button type="submit" name="ubah" class="btn btn-primary">
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

                this.classList.toggle("active");

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