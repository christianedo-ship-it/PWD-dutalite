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
    <style>
        body{
            font-family: Arial;
            background:#f5f5f5;
        }

        .container{
            width:90%;
            margin:auto;
            margin-top:40px;
        }

        h1{
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }

        table th{
            background:black;
            color:white;
            padding:12px;
        }

        table td{
            padding:12px;
            border:1px solid #ddd;
        }

        tr:nth-child(even){
            background:#f9f9f9;
        }

        .hapus{
            background:red;
            color:white;
            padding:8px 12px;
            text-decoration:none;
            border-radius:5px;
        }


        .status-link {
            font-size: 12px;
            color: blue;
            text-decoration: none;
        }
        .status-link:hover {
            text-decoration: underline;
        }

        tr:hover {
            background-color: #f0f0f0;
        }
    </style>
<a href="../dashboard.php">Kembali ke Dashboard</a> |
<a href="tambah.php">Tambah Products</a>
<br><br>
<table border="1">
    <thead>
        <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Ukuran</th>
        <th>Harga</th>
        <th>Deskripsi</th>
        <th>Gambar</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
        while($result = mysqli_fetch_array($query)){
            $product_name = $result['product_name'];
            $product_size = $result['product_size'];
            $price = $result['price'];
            $description = $result['description'];
            $image = $result['image'];
            $id = $result['id'];
        ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $product_name ?></td>
            <td><?= $product_size ?></td>
            <td><?= $price ?></td>
            <td><?= $description ?></td>
            <td><?= $image ?></td>
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
