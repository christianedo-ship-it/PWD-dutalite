<?php
include "../security.php";
include "../../koneksi.php";
$sql = "select * from products";
$query = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Duta Lite Admin - Manajemen Products</title>
</head>
<a href="../dashboard.php">Kembali ke Dashboard</a> |
<a href="tambah.php">Tambah Products</a>
<br><br>
<table border="1">
    <thead>
        <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Ukuran</th>
        <th>Deskripsi</th>
        <th>Gambar</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
        while($result = mysqli_fetch_array($query)){
            $nama_produk = $result['nama_produk'];
            $ukuran = $result['ukuran'];
            $deskripsi = $result['deskripsi'];
            $gambar = $result['gambar'];
            $id = $result['id'];
        ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $nama_produk ?></td>
            <td><?= $ukuran ?></td>
            <td><?= $deskripsi ?></td>
            <td><?= $gambar ?></td>
            <td>
            <a href="edit.php?id=<?= $id; ?>">Edit</a> |
            <a href="hapus.php?id=<?= $id; ?>" onclick="return 
                confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>
