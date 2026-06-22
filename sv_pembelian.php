<?php
include "koneksi.php";

if(isset($_POST['kirim'])){

    $product_id = $_POST['product_id'] ?? '';
    $product_quantity = isset($_POST['product_quantity']) ? floatval($_POST['product_quantity']) : 0;
    $order_quantity = isset($_POST['order_quantity']) ? floatval($_POST['order_quantity']) : 0;
    $customer_name = mysqli_real_escape_string($koneksi, trim($_POST['customer_name'] ?? ''));
    $email = mysqli_real_escape_string($koneksi, trim($_POST['email'] ?? ''));
    $company_name = mysqli_real_escape_string($koneksi, trim($_POST['company_name'] ?? ''));
    if ($company_name == '') {
        $company_name = '-';
    }

    if ($customer_name == '') {
        echo "<script>alert('Nama pemesan wajib diisi!'); window.history.back();</script>";
        exit;
    }
    if ($email == '') {
        echo "<script>alert('Email wajib diisi!'); window.history.back();</script>";
        exit;
    }
    if ($product_quantity <= 0 || $order_quantity <= 0) {
        echo "<script>alert('Jumlah pesanan tidak boleh 0. Pastikan Anda sudah mengisi kalkulator volume!'); window.history.back();</script>";
        exit;
    }

    $product = mysqli_query($koneksi, "SELECT * FROM products WHERE id='$product_id'");
    $data = mysqli_fetch_array($product);
    $size = $data['product_size'] ?? '';

    $sql = "INSERT INTO orders
    (
        product_id,
        size,
        product_quantity,
        customer_name,
        company_name,
        email,
        order_quantity
    )
    VALUES
    (
        '$product_id',
        '$size',
        '$product_quantity',
        '$customer_name',
        '$company_name',
        '$email',
        '$order_quantity'
    )";

    $query = mysqli_query($koneksi, $sql);

    if($query){

        $nomorWA = "6281351249935";

        $pesan =
        "Halo Duta Lite,%0A%0A".
        "Nama: $customer_name %0A".
        "Perusahaan: $company_name %0A".
        "Email: $email %0A".
        "Ukuran Bata: $size %0A".
        "Jumlah Bata: $product_quantity pcs %0A".
        "Jumlah Pesanan: $order_quantity Kubik";

        $urlWhatsApp = "https://api.whatsapp.com/send?phone=$nomorWA&text=$pesan";

        header("Location: $urlWhatsApp");
        exit;

    } else {
        echo "
        <script>
            alert('Pesanan gagal disimpan ke database. Error: " . mysqli_error($koneksi) . "');
            window.history.back();
        </script>
        ";
    }
}
?>