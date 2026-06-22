<?php
include "../../security.php";
include "../../../koneksi.php";

$id = $_GET['id'] ?? '';
$status = $_GET['status'] ?? '';
$admin_name = $_SESSION['username'] ?? 'Sistem';

if ($id != '' && $status != '') {
    $sql = "UPDATE orders SET status='$status', updated_by='$admin_name' WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Gagal mengubah status pesanan!'); window.location='index.php';</script>";
    }
} else {
    header("Location: index.php");
    exit;
}
?>