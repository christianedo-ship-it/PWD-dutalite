<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>

    <style>

        body{
            font-family: Arial;
            background:#f5f5f5;
        }

        .container{
            width:80%;
            margin:auto;
            margin-top:40px;
        }

        .box{
            background:white;
            padding:25px;
            border-radius:10px;
            margin-bottom:20px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        input, select{
            width:100%;
            padding:10px;
            margin-top:8px;
            margin-bottom:20px;
        }

        button{
            background:black;
            color:white;
            padding:12px 20px;
            border:none;
            border-radius:5px;
            cursor:pointer;
        }

        h1{
            text-align:center;
        }

    </style>

</head>
<body>

<div class="container">

    <h1>Form Pemesanan Bata Ringan</h1>

    <form method="POST" action="sv_pembelian.php">

        <div class="box">

            <h3>Pilih Ukuran Bata Ringan</h3>

            <label>Ukuran yang tersedia</label>

            <select name="product_id" required>

                <option value="">-- Pilih Ukuran Bata --</option>

                <?php

                $sql = "SELECT * FROM products";
                $query = mysqli_query($conn, $sql);

                while($result = mysqli_fetch_array($query)){

                    $id = $result['id'];
                    $nama_produk = $result['nama_produk'];
                    $ukuran = $result['ukuran'];
                    $harga = $result['harga'];

                ?>

                <option value="<?= $id ?>">

                    <?= $nama_produk ?>
                    -
                    <?= $ukuran ?>
                    -
                    Rp<?= number_format($harga,0,',','.') ?>

                </option>

                <?php } ?>

            </select>

        </div>

        <div class="box">

            <h3>Kalkulator Pembantu</h3>

            <label>Jumlah Bata Bata (Pcs)</label>

            <input
                type="number"
                name="jumlah_bata"
                placeholder="Contoh: 1000"
                required
            >

        </div>

        <div class="box">

            <h3>Data Pemesan</h3>

            <label>Nama Anda</label>

            <input
                type="text"
                name="nama_pemesan"
                placeholder="Masukkan nama"
                required
            >

            <label>Nama Toko</label>

            <input
                type="text"
                name="nama_toko"
                placeholder="Nama toko / perusahaan"
            >

            <label>Email</label>

            <input
                type="email"
                name="email"
                placeholder="alamat@gmail.com"
                required
            >

            <label>Jumlah Pesanan (Kubik)</label>

            <input
                type="number"
                step="0.01"
                name="jumlah_pesanan"
                placeholder="0.00"
                required
            >

            <button type="submit" name="beli">
                Kirim Pesanan
            </button>

        </div>

    </form>

</div>

</body>
</html>

