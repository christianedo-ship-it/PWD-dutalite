<?php
include "../../security.php";
include "../../../koneksi.php";

if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $product_name = trim($_POST['product_name']);
    $product_size = trim($_POST['product_size']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);
    $gambar_lama = isset($_POST['gambar_lama']) ? trim($_POST['gambar_lama']) : '';
    $image_to_save = $gambar_lama;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];
        
        $allowed_extensions = array("jpg", "jpeg", "png", "gif", "webp");
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed_extensions)) {
            if ($file_size <= 2000000) { 
                $new_file_name = str_replace(' ', '_', $product_name) . "_" . time() . "." . $file_extension;
                $upload_path = "../../../assets/" . $new_file_name;

                if (move_uploaded_file($file_tmp, $upload_path)) {
                    $image_to_save = $new_file_name;
                    $path_gambar_lama = "../../../assets/" . $gambar_lama;
                    if (file_exists($path_gambar_lama) && $gambar_lama != "") {
                        unlink($path_gambar_lama);
                    }
                } else {
                    echo "<script>alert('Gagal mengupload gambar baru!'); window.location='edit.php?id=$id';</script>";
                    exit;
                }
            } else {
                echo "<script>alert('Ukuran gambar terlalu besar! Maksimal 2MB.'); window.location='edit.php?id=$id';</script>";
                exit;
            }
        } else {
            echo "<script>alert('Format gambar tidak didukung!'); window.location='edit.php?id=$id';</script>";
            exit;
        }
    }

    if ($product_name == '' || $product_size == '' || $price == '' || $description == '' || $image_to_save == '') {
        echo "<script>alert('Semua field wajib diisi dengan benar.'); window.location='edit.php?id=$id';</script>";
        exit;
    }

    $sql = "UPDATE products SET product_name='$product_name', product_size='$product_size', price='$price', description='$description', image='$image_to_save' WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Data gagal diubah.'); window.location='edit.php?id=$id';</script>";
    }
} else {
    header("Location: index.php");
    exit;
}
?>