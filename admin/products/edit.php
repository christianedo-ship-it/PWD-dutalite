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
<html>
<head>
    <title>Duta Lite Admin - Edit Products</title>
</head>
<body>

<h1>Edit Products</h1>

<a href="index.php">Kembali</a>
<br><br>
<form method="POST" action="ubah.php">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">

    <label>Nama Produk</label><br>
    <input type="text" name="nama_produk" value="<?= htmlspecialchars($data['nama_produk']); ?>">
    <br><br>

    <label>Ukuran</label><br>
    <input type="text" name="ukuran" value="<?= htmlspecialchars($data['ukuran']); ?>">
    <br><br>

    <label>Harga</label><br>
    <input type="text" name="harga" value="<?= htmlspecialchars($data['harga']); ?>">
    <br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi" rows="5" cols="40"><?= htmlspecialchars($data['deskripsi']); ?></textarea>
    <br><br>

    <label>Gambar</label><br>
    <input type="text" name="gambar" value="<?= htmlspecialchars($data['gambar']); ?>">
    <br><br>

    <button type="submit" name="ubah">Ubah</button>
</form>

</body>
</html>
