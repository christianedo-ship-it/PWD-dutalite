<?php

include "../../security.php";
include "../../../koneksi.php";

if (isset($_POST['update'])) {

    $description = mysqli_real_escape_string(
        $koneksi,
        trim($_POST['description'])
    );

    $sql = "UPDATE purchase_info
            SET description = '$description'";

    $query = mysqli_query($koneksi, $sql);

    if ($query) {

        echo "<script>
                alert('Informasi Pembelian berhasil diperbarui!');
                window.location='index.php';
              </script>";

    } else {

        echo "<script>
                alert('Gagal memperbarui data!');
                window.location='index.php';
              </script>";

    }

} else {

    header('Location: index.php');
    exit;

}

?>