<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duta Lite - Admin Login</title>
    <link rel="stylesheet" href="styles/style.css?v=1.4">
</head>

<?php
include 'header.php';
?>

<section>
    <form action="sv_login.php" method="post">
        <input type="text" placeholder="username" name="username">
        <input type="password" name="password" placeholder="password">
        <button type="submit">login</button>
    </form>
</section>