<?php

include "koneksi.php";

if(isset($_POST['kirim'])){

    $product_id = $_POST['product_id'];
    $jumlah_bata = $_POST['jumlah_bata'];

    $nama_pemesan = $_POST['nama_pemesan'];
    $nama_toko = $_POST['nama_toko'];
    $email = $_POST['email'];

    $jumlah_pesanan = $_POST['jumlah_pesanan'];

    $product = mysqli_query(
        $koneksi,
        "SELECT * FROM products WHERE id='$product_id'"
    );

    $data = mysqli_fetch_array($product);

    $ukuran_bata = $data['ukuran'];

    $sql = "INSERT INTO purchases
    (
        product_id,
        ukuran_bata,
        jumlah_bata,
        nama_pemesan,
        nama_toko,
        email,
        jumlah_pesanan
    )

    VALUES
    (
        '$product_id',
        '$ukuran_bata',
        '$jumlah_bata',
        '$nama_pemesan',
        '$nama_toko',
        '$email',
        '$jumlah_pesanan'
    )";

    $query = mysqli_query($koneksi, $sql);

    if($query){

        $nomorWA = "6281351249935";

        $pesan =
        "Halo Duta Lite,%0A%0A".
        "Nama: $nama_pemesan %0A".
        "Perusahaan: $nama_toko %0A".
        "Email: $email %0A".
        "Ukuran Bata: $ukuran_bata %0A".
        "Jumlah Bata: $jumlah_bata pcs %0A".
        "Jumlah Pesanan: $jumlah_pesanan Kubik";

        $urlWhatsApp =
        "https://api.whatsapp.com/send?phone=$nomorWA&text=$pesan";

        header("Location: $urlWhatsApp");
        exit;

    }else{

        echo "
        <script>
            alert('Pesanan gagal');
            window.location='products.php';
        </script>
        ";

    }

}

?>
