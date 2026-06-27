<?php

include "../../security.php";
include "../../../koneksi.php";

if (isset($_POST['ubah'])) {

    $id = $_POST['id_benefits'];

    $description = mysqli_real_escape_string(
        $koneksi,
        trim($_POST['description'])
    );

    if ($description != '') {

        $sql = "UPDATE benefits
                SET description = '$description'
                WHERE id_benefits = '$id'";

        $query = mysqli_query($koneksi, $sql);

        if ($query) {

            echo "<script>
                    alert('Poin Keunggulan berhasil diubah!');
                    window.location='index.php';
                  </script>";

        } else {

            echo "<script>
                    alert('Data gagal diubah!');
                    window.location='edit.php?id=$id';
                  </script>";

        }

    } else {

        echo "<script>
                alert('Deskripsi keunggulan tidak boleh kosong!');
                window.location='edit.php?id=$id';
              </script>";
    }

} else {

    header('Location: index.php');
    exit;

}

?>