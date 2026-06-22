<?php

include "../../security.php";
include "../../../koneksi.php";

if (isset($_POST['simpan'])) {

    $description = mysqli_real_escape_string(
        $koneksi,
        trim($_POST['description'])
    );

    if ($description != '') {

        $sql = "INSERT INTO benefits (description)
                VALUES ('$description')";

        $query = mysqli_query($koneksi, $sql);

        if ($query) {

            echo "<script>
                    alert('Poin Keunggulan berhasil ditambahkan!');
                    window.location='index.php';
                  </script>";

        } else {

            echo "<script>
                    alert('Gagal menambahkan data!');
                    window.location='tambah.php';
                  </script>";

        }

    } else {

        echo "<script>
                alert('Deskripsi keunggulan tidak boleh kosong!');
                window.location='tambah.php';
              </script>";

    }

} else {

    header('Location: index.php');
    exit;

}

?>