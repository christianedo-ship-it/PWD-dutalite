<?php

include "../../koneksi.php";

$sql = "SELECT purchases.*, products.nama_produk
FROM purchases
JOIN products
ON purchases.product_id = products.id
ORDER BY purchases.id DESC";

$query = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Purchases</title>

    <style>

        body{
            font-family: Arial;
            background:#f5f5f5;
        }

        .container{
            width:90%;
            margin:auto;
            margin-top:40px;
        }

        h1{
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }

        table th{
            background:black;
            color:white;
            padding:12px;
        }

        table td{
            padding:12px;
            border:1px solid #ddd;
        }

        tr:nth-child(even){
            background:#f9f9f9;
        }

        .hapus{
            background:red;
            color:white;
            padding:8px 12px;
            text-decoration:none;
            border-radius:5px;
        }

    </style>

</head>
<body>

<div class="container">

    <h1>Management Purchases</h1>

    <table>

        <tr>

            <th>No</th>
            <th>Produk</th>
            <th>Ukuran Bata</th>
            <th>Jumlah Bata</th>
            <th>Nama Pemesan</th>
            <th>Nama Toko</th>
            <th>Email</th>
            <th>Jumlah Pesanan</th>
            <th>Tanggal</th>
            <th>Aksi</th>

        </tr>

        <?php

        $no = 1;

        while($result = mysqli_fetch_array($query)){

        ?>

        <tr>

            <td><?= $no++ ?></td>

            <td><?= $result['nama_produk'] ?></td>

            <td><?= $result['ukuran_bata'] ?></td>

            <td><?= $result['jumlah_bata'] ?></td>

            <td><?= $result['nama_pemesan'] ?></td>

            <td><?= $result['nama_toko'] ?></td>

            <td><?= $result['email'] ?></td>

            <td><?= $result['jumlah_pesanan'] ?> Kubik</td>

            <td><?= $result['created_at'] ?></td>

            <td>

                <a
                    class="hapus"
                    href="hapus.php?id=<?= $result['id'] ?>"
                    onclick="return confirm('Yakin ingin hapus data?')"
                >
                    Hapus
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>
