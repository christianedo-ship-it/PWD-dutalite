<?php 
include 'koneksi.php';
$sql_location = "SELECT * FROM location LIMIT 1";
$query_location = mysqli_query($koneksi, $sql_location);
$data_location = mysqli_fetch_assoc($query_location);

$sql_benefits = "SELECT * FROM benefits ORDER BY id_benefits ASC";
$query_benefits = mysqli_query($koneksi, $sql_benefits);

$sql_purchase = "SELECT * FROM purchase_info LIMIT 1";
$query_purchase = mysqli_query($koneksi, $sql_purchase);
$data_purchase = mysqli_fetch_assoc($query_purchase);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duta Lite - Bata Ringan AAC</title>
    <link rel="stylesheet" href="styles/style.css?v=<?= time(); ?>">
</head>
<body>

<?php
include 'header.php';
?>

<main>
    <div class="hero-section">
        <h1 class="hero-stock-text">
            <span class="hero-brand">Duta Lite</span>
            <span class="hero-sub">Bata Ringan AAC</span>
        </h1>
    </div>

    <div class="content-container">
        
        <section id="lokasi">
            <h2>Lokasi</h2>
            <p><?= nl2br(htmlspecialchars($data_location['description'] ?? 'Data lokasi belum tersedia.')); ?></p>
           
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3792.4001243506154!2d109.37452817472334!3d-0.09487199990418584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d5a764248c2bf%3A0xe658046b5ace82e9!2sDuta%20Mix!5e1!3m2!1sen!2sid!4v1779939548490!5m2!1sen!2sid"
                allowfullscreen=""
                loading="lazy"
                cellspacing="0"
                style="border:0;"
                referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </section>

        <section id="keunggulan">
            <h2>Keunggulan</h2>
            <div class="keunggulan-container">
                <?php 
                if (mysqli_num_rows($query_benefits) > 0) {
                    while($benefit = mysqli_fetch_assoc($query_benefits)) { 
                ?>
                    <div class="keunggulan-box">
                        <span class="keunggulan-text"><?= htmlspecialchars($benefit['description']); ?></span>
                    </div>
                <?php 
                    }
                } else {
                    echo "<p style='color: #7f8c8d; width: 100%; text-align: center;'>Data keunggulan belum ditambahkan.</p>";
                }
                ?>
            </div>
        </section>

        <section id="pembelian">
            <h2>Pembelian</h2>
            <p><?= nl2br(htmlspecialchars($data_purchase['description'] ?? 'Data informasi pembelian belum tersedia.')); ?></p>
        </section>

    </div>

    <section class="calculator-section" id="kalkulator">
        <div class="content-container">
            <h2 class="calc-main-title">Kalkulator Volume Batu Bata</h2>
            <div class="calc-wrapper">
                <div class="calc-inputs">
                    <div class="input-group">
                        <label for="jumlahBata">Jumlah Batu Bata</label>
                        <input type="number" id="jumlahBata" placeholder="0" min="0">
                        <span class="input-hint">Masukkan jumlah batu bata yang ingin dibeli</span>
                    </div>
                    <div class="input-group">
                        <label for="ukuranBata">Ukuran batu bata</label>
                        <select id="ukuranBata">
                            <option value="0" disabled selected>Pilih ukuran batu bata</option>
                            <option value="0.009">7,5 x 60 x 20 cm</option>
                            <option value="0.012">10 x 60 x 20 cm</option>
                            <option value="0.015">12,5 x 60 x 20 cm</option>
                            <option value="0.018">15 x 60 x 20 cm</option>
                        </select>
                        <span class="input-hint">Pilih ukuran batu bata yang mau dibeli</span>
                    </div>
                </div>
                <div class="calc-result-card">
                    <h3>Total Volume Batu Bata</h3>
                    <div class="calc-output" id="hasilVolume">—</div>
                    <p>Jumlah volume batu bata yang ingin dibeli dalam kubik</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include 'footer.php';
?>

    <script src="js/kalkulator.js"></script>
</body>
</html>