<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "dutalite";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Yahh, koneksi ke database gagal: " . mysqli_connect_error());
}

ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_samesite', 'Strict');
?>