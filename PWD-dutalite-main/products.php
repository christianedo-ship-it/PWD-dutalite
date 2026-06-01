<?php
include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Duta Lite</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            margin:0;
            background:#f5f5f5;
        }

        header{
            background:#fff;
            padding:20px 50px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        nav ul{
            list-style:none;
            display:flex;
            gap:20px;
        }

        nav a{
            text-decoration:none;
            color:black;
            font-weight:bold;
        }

        .container{
            width:90%;
            max-width:1200px;
            margin:auto;
            padding:40px 0;
        }

        h1{
            text-align:center;
            margin-bottom:40px;
        }

        .products{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:25px;
        }

        .card{
            background:white;
            border-radius:12px;
            overflow:hidden;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        .card img{
            width:100%;
            height:220px;
            object-fit:cover;
        }

        .card-body{
            padding:20px;
        }

        .card h3{
            margin:0;
        }

        .ukuran{
            color:#666;
            margin-top:8px;
        }

        .harga{
            color:#e67e22;
            font-size:22px;
            font-weight:bold;
            margin:15px 0;
        }

        footer{
            text-align:center;
            padding:20px;
            background:#fff;
            margin-top:50px;
        }
    </style>
</head>
<body>

<header>
    <h2>Duta Lite</h2>

    <nav>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="products.php">PRODUCTS</a></li>
            <li><a href="about.php">ABOUT</a></li>
        </ul>
    </nav>
</header>

<div class="container">

    <h1>Produk Bata Ringan Duta Lite</h1>

    <div class="products">

        <?php while($data = mysqli_fetch_assoc($query)) { ?>

            <div class="card">

                <img src="<?php echo $data['gambar']; ?>">

                <div class="card-body">

                    <h3><?php echo $data['nama_product']; ?></h3>

                    <p class="ukuran">
                        Ukuran:
                        <?php echo $data['ukuran']; ?>
                    </p>

                    <p>
                        <?php echo $data['deskripsi']; ?>
                    </p>

                    <div class="harga">
                        Rp <?php echo number_format($data['harga'],0,',','.'); ?>
                    </div>

                </div>

            </div>

        <?php } ?>

    </div>

</div>

<footer>
    <p>&copy; 2026 Duta Lite</p>
</footer>

</body>
</html>