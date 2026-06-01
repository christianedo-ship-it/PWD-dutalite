<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "dutalite";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Yahh, koneksi ke database gagal: " . mysqli_connect_error());
}
?>