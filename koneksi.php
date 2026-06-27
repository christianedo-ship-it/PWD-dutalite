<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "dutalite";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Yahh, koneksi ke database gagal: " . mysqli_connect_error());
}

header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");
?>