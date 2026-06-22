<?php
include "../../security.php";
include "../../../koneksi.php";

if (isset($_POST['ubah_misi'])) {
    $id = $_POST['id_mission'];
    $description = mysqli_real_escape_string($koneksi, trim($_POST['description']));

    if ($description == '') {
        echo "<script>alert('Deskripsi misi tidak boleh kosong!'); window.location='edit_misi.php?id=$id';</script>";
        exit;
    }

    $sql = "UPDATE mission SET description='$description' WHERE id_mission='$id'";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        echo "<script>alert('Poin Misi berhasil diubah!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah misi!'); window.location='edit_misi.php?id=$id';</script>";
    }
} else {
    header("Location: index.php");
    exit;
}
?>
