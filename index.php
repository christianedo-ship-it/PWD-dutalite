<?php 
include 'koneksi.php'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duta Lite - Bata Ringan AAC</title>
    <link rel="stylesheet" href="styles/stylehome.css?v=1.4">
</head>
<body>

    <header>
        <a href="index.php" class="logo-text">Duta Lite</a>
        <div class="header-right">
            <nav>
                <ul>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="products.php">PRODUCTS</a></li>
                </ul>
            </nav>
            <a href="about.php#contact-us" class="contact-btn">CONTACT</a>
        </div>
    </header>

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
                <p>Dapat melayani di area Pontianak, Mempawah, Sui Duri, Singkawang, dan Pemangkat. Untuk lokasi kantornya yang
                    di Pontianak berada di Jl. Arteri Supadio, Raya River, Pontianak, Kubu Raya Regency, West Kalimantan 78391.
                    Kemudian untuk di Singkawang berada di depan Pasir Panjang, Jl. Raya Sedau, Sedau, Kec. Singkawang Sel.,
                    Kota Singkawang, Kalimantan Barat.</p>
               
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
                    <div class="keunggulan-box">
                        <span class="keunggulan-text">Kualitas yang tidak diragukan</span>
                    </div>
                    <div class="keunggulan-box">
                        <span class="keunggulan-text">Pelayanan pembelian cepat</span>
                    </div>
                    <div class="keunggulan-box">
                        <span class="keunggulan-text">Harga terjangkau</span>
                    </div>
                </div>
            </section>

            <section id="pembelian">
                <h2>Pembelian</h2>
                <p>Layanan pengantaran hanya berlaku untuk pemesanan minimal 5 kubik. Apabila pemesanan kurang dari 5 kubik,
                    pelanggan dapat melakukan pengambilan langsung di lokasi perusahaan yang telah ditentukan.</p>
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

    <footer>
        <a href="index.php" class="footer-logo-text">Duta Lite</a>
        <nav>
            <ul class="footer-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
        <p class="copyright">© 2026 Duta Lite. All rights reserved.</p>
    </footer>

    <script src="js/kalkulator.js"></script>
</body>
</html>