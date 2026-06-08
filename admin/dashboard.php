<?php
include "security.php";
include "../koneksi.php";

echo "welcome, ".$username;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duta Lite - Admin Dashboard</title>
</head>
<br>
<a href="products/index.php">manajemen produk</a>
<br>
<a href="forms/index.php">manajemen form</a>
<br>
<a href="logout.php">logout</a>
