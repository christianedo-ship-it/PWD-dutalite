<?php
include "../security.php";
include "../../koneksi.php";

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];


    $valid_status = ['pending', 'diproses', 'selesai', 'dibatalkan'];
    
    if (in_array($status, $valid_status)) {
        $sql = "UPDATE pesanan SET status = '$status' WHERE id = '$id'";
        mysqli_query($koneksi, $sql);
    }
}

header("Location: index.php");
exit;
?>