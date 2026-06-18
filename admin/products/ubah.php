<?php
include "../security.php";
require "../../koneksi.php";

if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $product_name = trim($_POST['product_name']);
    $product_size = trim($_POST['product_size']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);
    $image = trim($_POST['image']);

    if ($product_name == '' || $product_size == '' || $price == '' || $description == '' || $image == '') {
        echo "Semua field wajib diisi dengan benar.";
        exit;
    }

    $sql = "update products set product_name='$product_name', product_size='$product_size', price='$price', description='$description', image='$image' where id='$id'";
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