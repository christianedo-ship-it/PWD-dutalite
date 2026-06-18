<?php

include "../../koneksi.php";

$sql = "SELECT orders.*, products.product_name
FROM orders
JOIN products
ON orders.product_id = products.id
ORDER BY orders.id DESC";

$query = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duta Lite - Management Pesanan</title>
    <a href="../dashboard.php">Kembali ke Dashboard</a> |

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


        .status-link {
    font-size: 12px;
    color: blue;
    text-decoration: none;
}
.status-link:hover {
    text-decoration: underline;
}

tr:hover {
    background-color: #f0f0f0;
}

    </style>

</head>
<body>

<div class="container">

    <h1>Management Pesanan</h1>

    <table>

  <tr>
    <th>No</th>
    <th>Produk</th>
    <th>Ukuran</th>
    <th>Jumlah</th>
    <th>Pemesan</th>
    <th>Toko</th>
    <th>Email</th>
    <th>Pesanan</th>
    <th>Tanggal</th>    
    <th>Status</th> 
    <th>Aksi</th>
</tr>

        <?php

        $no = 1;

        while($result = mysqli_fetch_array($query)){

        ?>

        <tr>

            <td><?= $no++ ?></td>

            <td><?= $result['product_name'] ?></td>

            <td><?= $result['size'] ?></td>

            <td><?= $result['product_quantity'] ?></td>

            <td><?= $result['customer_name'] ?></td>

            <td><?= $result['company_name'] ?></td>

            <td><?= $result['email'] ?></td>

            <td><?= $result['order_quantity'] ?> Kubik</td>

            <td><?= $result['created_at'] ?></td>

              <td>
    <?php
    $color = "black";
    if ($result['status'] == 'diproses') $color = "orange";
    elseif ($result['status'] == 'selesai') $color = "green";
    elseif ($result['status'] == 'dibatalkan') $color = "red";
    ?>
    
    <strong style="color: <?= $color ?>;"><?= ucfirst($result['status']) ?></strong>
    
    <div style="margin-top: 5px; font-size: 0.85em;">
        <a href="status.php?id=<?= $result['id'] ?>&status=pending">Pending</a> |
        <a href="status.php?id=<?= $result['id'] ?>&status=diproses">Proses</a> |
        <a href="status.php?id=<?= $result['id'] ?>&status=selesai">Selesai</a> |
        <a href="status.php?id=<?= $result['id'] ?>&status=dibatalkan">Batal</a>
    </div>
</td>
                </td>

               <td>
                <a class="hapus" href="hapus.php?id=<?= $result['id'] ?>" onclick="return confirm('Yakin ingin hapus data?')">Hapus</a>
            </td>
        </tr>

         <td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>
