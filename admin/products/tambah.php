<?php
include "../security.php";
include "../../koneksi.php";

if (isset($_POST['simpan'])) {
    $product_name = trim($_POST['nama_produk']);
    $product_size = trim($_POST['ukuran']);
    $description = trim($_POST['deskripsi']);
    $image = trim($_POST['gambar']);
    $price = trim($_POST['harga']);

    if ($product_name == '' || $product_size == '' || $description == '' || $image == '' || $price == '') {
        $error = "Semua field wajib diisi dengan benar.";
    } else {
        $sql = "insert into products (product_name, product_size, description, image, price) values('$nama_produk', '$ukuran', '$deskripsi', '$gambar', '$harga')";
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
<html>
<head>
    <title>Duta Lite Admin - Tambah Products</title>
</head>
<body>

<h1>Tambah Products</h1>

<a href="index.php">Kembali</a>

<br><br>

<?php if (isset($error)) : ?>
    <p style="color:red;"><?= $error; ?></p>
<?php endif; ?>

<form method="POST">
    <label>Nama Produk</label><br>
    <input type="text" name="nama_produk">
    <br><br>

    <label>Ukuran</label><br>
    <input type="text" name="ukuran">
    <br><br>

    <label>Harga</label><br> 
    <input type="text" name="harga">
    <br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi" rows="5" cols="40"></textarea>
    <br><br>

    <label>Gambar</label><br>
    <input type="text" name="gambar">
    <br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

</body>
</html>