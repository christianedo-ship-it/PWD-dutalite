<?php
include "../../security.php";
include "../../../koneksi.php";

if (isset($_POST['simpan_visi'])) {
    $description = mysqli_real_escape_string($koneksi, trim($_POST['description']));

    $sql = "UPDATE vision SET description='$description' WHERE id_vision=1";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        echo "<script>alert('Data Visi berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui Visi!'); window.location='index.php';</script>";
    }
} else {
    header("Location: index.php");
    exit;
}
?>
