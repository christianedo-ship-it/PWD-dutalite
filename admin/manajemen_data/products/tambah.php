<?php
include "../../security.php";
include "../../../koneksi.php";

if (isset($_POST['simpan'])) {
    $product_name = trim($_POST['product_name']);
    $product_size = trim($_POST['product_size']);
    $description = trim($_POST['description']);
    $image = trim($_POST['image']);
    $price = trim($_POST['price']);

    if ($product_name == '' || $product_size == '' || $description == '' || $image == '' || $price == '') {
        $error = "Semua field wajib diisi dengan benar.";
    } else {
        $sql = "insert into products (product_name, product_size, description, image, price) values('$product_name', '$product_size', '$description', '$image', '$price')";
        $query = mysqli_query($koneksi, $sql);

        if ($query) {
            header("Location: index.php");
            exit;
        } else {
            $error = "Data gagal disimpan.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duta Lite Admin - Tambah Products</title>
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
                    <li><a href="../../master_data/head_office.php">🏢 Head Office</a></li>
                    <li><a href="../../master_data/keunggulan.php">⭐ Keunggulan</a></li>
                    <li><a href="../../master_data/visi_misi.php">🎯 Visi & Misi</a></li>
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
                <h3>Tambah Produk Baru</h3>
            </div>
            <div class="header-right">
                <span>Welcome, <strong><?= htmlspecialchars($username ?? 'Admin'); ?></strong></span>
            </div>
        </header>

        <div class="content-body">
            
            <div class="form-container">
                <div class="form-header">
                    <h2>Form Input Produk</h2>
                    <a href="index.php" class="btn btn-secondary">⬅ Kembali</a>
                </div>

                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger">
                        ⚠ <?= $error; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" class="admin-form">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="product_name" class="form-control" placeholder="Contoh: Bata Ringan AAC" required>
                    </div>

                    <div class="form-group">
                        <label>Ukuran</label>
                        <input type="text" name="product_size" class="form-control" placeholder="Contoh: 10 x 60 x 20 cm" required>
                    </div>

                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input type="number" name="price" class="form-control" placeholder="Contoh: 850000" required>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi / Volume</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Masukkan deskripsi..." required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Nama File Gambar</label>
                        <input type="text" name="image" class="form-control" placeholder="Contoh: 1.jpeg" required>
                    </div>

                    <div class="form-action">
                        <button type="submit" name="simpan" class="btn btn-primary">💾 Simpan Data</button>
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