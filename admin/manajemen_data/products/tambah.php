<?php
include "../../security.php";
include "../../../koneksi.php";

if (isset($_POST['simpan'])) {
    $product_name = trim($_POST['product_name']);
    $product_size = trim($_POST['product_size']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $image = ""; 

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];

        $allowed_extensions = array("jpg", "jpeg", "png");
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed_extensions)) {
            if ($file_size <= 2000000) { 
                $new_file_name = str_replace(' ', '_', $product_name) . "_" . time() . "." . $file_extension;
                $upload_path = "../../../assets/" . $new_file_name;

                if (move_uploaded_file($file_tmp, $upload_path)) {
                    $image = $new_file_name;
                } else {
                    $error = "Gagal mengupload gambar ke folder assets.";
                }
            } else {
                $error = "Ukuran gambar terlalu besar! Maksimal 2MB.";
            }
        } else {
            $error = "Format file tidak didukung! Gunakan JPG, JPEG, PNG, atau WEBP.";
        }
    } else {
        $error = "Gambar produk wajib diupload.";
    }

    if (!isset($error)) {
        if ($product_name == '' || $product_size == '' || $description == '' || $image == '' || $price == '') {
            $error = "Semua field wajib diisi dengan benar.";
        } else {
            $sql = "INSERT INTO products (product_name, product_size, description, image, price) VALUES('$product_name', '$product_size', '$description', '$image', '$price')";
            $query = mysqli_query($koneksi, $sql);

            if ($query) {
                header("Location: index.php");
                exit;
            } else {
                $error = "Data gagal disimpan ke database.";
            }
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
                    <li><a href="../../master_data/profil_lokasi/index.php">🏢 Profil & Lokasi</a></li>
                    <li><a href="../../master_data/visi_misi/index.php">🎯 Visi & Misi</a></li>
                    <li><a href="../../master_data/keunggulan/index.php">⭐ Keunggulan</a></li>
                    <li><a href="../../master_data/info_pembelian/index.php">🛒 Info Pembelian</a></li>
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

                <form method="POST" class="admin-form" enctype="multipart/form-data">
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
                        <label>Upload Gambar Produk</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                        <small style="color: #7f8c8d; display: block; margin-top: 5px;">*Format: JPG, PNG, JPEG. Maks ukuran: 2MB</small>
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