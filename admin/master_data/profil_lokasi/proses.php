<?php
include "../../security.php";
include "../../../koneksi.php";

if (isset($_POST['update'])) {
    $desc = mysqli_real_escape_string($koneksi, $_POST['description']);
    $ho_name = mysqli_real_escape_string($koneksi, $_POST['ho_name']);
    $ho_loc = mysqli_real_escape_string($koneksi, $_POST['ho_location']);
    $ho_country = mysqli_real_escape_string($koneksi, $_POST['ho_country']);
    $loc_desc = mysqli_real_escape_string($koneksi, $_POST['loc_description']);

    mysqli_query($koneksi, "UPDATE company_profile SET description='$desc' WHERE id_profile=1");
    mysqli_query($koneksi, "UPDATE head_office SET name='$ho_name', location='$ho_loc', country='$ho_country' WHERE id_headoffice=1");
    mysqli_query($koneksi, "UPDATE location SET description='$loc_desc' WHERE id_location=1");

    echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
}
?>