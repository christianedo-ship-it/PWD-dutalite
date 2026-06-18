<?php
include "../security.php";
include "../../koneksi.php";

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

                <form method="POST" action="ubah.php" class="admin-form">
                    
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">

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
                        <label>Nama File Gambar</label>
                        <input type="text" name="image" class="form-control" value="<?= htmlspecialchars($data['image']); ?>" required>
                    </div>

                    <div class="form-action">
                        <button type="submit" name="ubah" class="btn btn-primary">💾 Simpan Perubahan</button>
                    </div>
                </form>
            </div>

        </div>
    </main>

</body>
</html>