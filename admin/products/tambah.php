<?php
include "../security.php";
include "../../koneksi.php";

if (isset($_POST['simpan'])) {
    $nama_produk = trim($_POST['nama_produk']);
    $ukuran = trim($_POST['ukuran']);
    $deskripsi = trim($_POST['deskripsi']);
    $gambar = trim($_POST['gambar']);

    if ($nama_produk == '' || $ukuran == '' || $deskripsi == '' || $gambar == '') {
        $error = "Semua field wajib diisi dengan benar.";
    } else {
        $sql = "insert into products (nama_produk, ukuran, deskripsi, gambar) values('$nama_produk', '$ukuran', '$deskripsi', '$gambar')";
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