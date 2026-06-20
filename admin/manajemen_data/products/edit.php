<?php
include "../../security.php";
include "../../../koneksi.php";

$id = $_GET['id'] ?? '';

if ($id == '') {
    header("Location: index.php");
    exit;
}

$sql = "select * from products where id='$id'";
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
    <title>Duta Lite Admin - Edit Products</title>
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
                    <li><a href="master_data/profil_lokasi/index.php">🏢 Profil & Lokasi</a></li>
                    <li><a href="master_data/visi_misi/index.php">🎯 Visi & Misi</a></li>
                    <li><a href="master_data/keunggulan/index.php">⭐ Keunggulan</a></li>
                    <li><a href="master_data/info_pembelian/index.php">🛒 Info Pembelian</a></li>
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
                <h3>Edit Produk</h3>
            </div>
            <div class="header-right">
                <span>Welcome, <strong><?= htmlspecialchars($username ?? 'Admin'); ?></strong></span>
            </div>
        </header>

        <div class="content-body">
            
            <div class="form-container">
                <div class="form-header">
                    <h2>Form Edit Produk</h2>
                    <a href="index.php" class="btn btn-secondary">⬅ Kembali</a>
                </div>

                <form method="POST" action="ubah.php" class="admin-form" enctype="multipart/form-data">
                    
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <input type="hidden" name="gambar_lama" value="<?= htmlspecialchars($data['image']); ?>">

                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="product_name" class="form-control" value="<?= htmlspecialchars($data['product_name']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Ukuran</label>
                        <input type="text" name="product_size" class="form-control" value="<?= htmlspecialchars($data['product_size']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input type="number" name="price" class="form-control" value="<?= htmlspecialchars($data['price']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi / Volume</label>
                        <textarea name="description" class="form-control" rows="5" required><?= htmlspecialchars($data['description']); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Gambar Saat Ini</label><br>
                        <?php if($data['image'] != ""): ?>
                            <img src="../../../assets/<?= htmlspecialchars($data['image']); ?>" alt="Gambar Produk" style="max-width: 150px; border-radius: 8px; border: 1px solid #cbd5e0; margin-bottom: 10px;">
                        <?php else: ?>
                            <p style="color: #7f8c8d; font-size: 0.9rem;">Belum ada gambar</p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label>Ganti Gambar Baru (Opsional)</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <small style="color: #7f8c8d; display: block; margin-top: 5px;">*Biarkan kosong jika tidak ingin mengubah gambar.</small>
                    </div>

                    <div class="form-action">
                        <button type="submit" name="ubah" class="btn btn-primary">💾 Simpan Perubahan</button>
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