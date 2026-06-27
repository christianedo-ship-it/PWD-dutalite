<?php

include "../../security.php";
include "../../../koneksi.php";

$id = $_GET['id'] ?? '';

if ($id != '') {

    $sql = "DELETE FROM benefits WHERE id_benefits='$id'";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        echo "<script>
                alert('Poin keunggulan berhasil dihapus!');
                window.location='index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data!');
                window.location='index.php';
              </script>";
    }

} else {

    header("Location: index.php");

}

exit;

?>