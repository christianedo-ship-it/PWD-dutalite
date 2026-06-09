<?php
include "../security.php";
require "../../koneksi.php";

if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $nama_produk = trim($_POST['nama_produk']);
    $ukuran = trim($_POST['ukuran']);
    $harga = trim($_POST['harga']);
    $deskripsi = trim($_POST['deskripsi']);
    $gambar = trim($_POST['gambar']);

    if ($nama_produk == '' || $ukuran == '' || $harga == '' || $deskripsi == '' || $gambar == '') {
        echo "Semua field wajib diisi dengan benar.";
        exit;
    }

    $sql = "update products set nama_produk='$nama_produk', ukuran='$ukuran', harga='$harga', deskripsi='$deskripsi', gambar='$gambar' where id='$id'";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diubah.";
    }
} else {
    header("Location: index.php");
    exit;
}