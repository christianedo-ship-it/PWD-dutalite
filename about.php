<?php 
include 'koneksi.php'; // Mengambil file koneksi

$pesan_sukses = "";
$pesan_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memastikan menggunakan $koneksi agar tidak memicu Undefined Variable
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $perusahaan = mysqli_real_escape_string($koneksi, $_POST['perusahaan']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);

    $query = "INSERT INTO kontak (nama, perusahaan, email, pesan) VALUES ('$nama', '$perusahaan', '$email', '$pesan')";

    if(mysqli_query($koneksi, $query)){
        $pesan_sukses = "Pesan berhasil dikirim!";
    } else {
        $pesan_error = "Gagal mengirim pesan: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duta Lite - About Us</title>
    <link rel="stylesheet" href="styles/styleabout.css">
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

    <main class="content-container">

        <section class="about-section">
            <div class="about-text">
                <h1>About Us</h1>
                <h3>Profil Perusahaan</h3>
                <p>
                    Kami menjalin kerja sama dengan Dutamix sebagai pelopor beton pertama di Kalimantan Barat.
                    Dengan pengalaman lebih dari 25 tahun dalam bidang produksi beton ready mix dan produk precast,
                    Dutamix memiliki kompetensi dan standar kualitas yang tinggi. Melalui kerja sama ini,
                    kami berkomitmen untuk mendukung kebutuhan proyek Anda dengan menyediakan produk dan layanan
                    terbaik secara profesional dan terpercaya.
                </p>
            </div>
            <div class="about-image">
                <img src="assets/heroimage.jpeg" alt="Bata Ringan AAC">
            </div>
        </section>

        <div class="company-info-wrapper">

            <section class="head-office-card">
                <div class="card-icon">📍</div>
                <h2>Head Office</h2>
                <div class="office-details">
                    <p class="office-building">Graha Kalindo</p>
                    <p>Jl. Sisingamangaraja No. 88 A-B</p>
                    <p>Pontianak, Kalimantan Barat</p>
                    <p class="office-country">Indonesia</p>
                </div>
            </section>

            <section class="visi-misi-card">
                <h2>Visi & Misi</h2>
                
                <div class="vision-box">
                    <h3>Visi</h3>
                    <p>Menjadi penyedia bata ringan terpercaya dengan kualitas terbaik dan pelayanan profesional.</p>
                </div>

                <div class="mission-box">
                    <h3>Misi</h3>
                    <ul>
                        <li>Menyediakan produk berkualitas tinggi.</li>
                        <li>Mengutamakan kepuasan pelanggan.</li>
                        <li>Mendukung pembangunan berkelanjutan.</li>
                        <li>Memberikan solusi konstruksi yang efisien.</li>
                    </ul>
                </div>
            </section>

        </div>

        <section id="contact-us" class="contact-section">
            <h2>Contact Us</h2>

            <?php if(!empty($pesan_sukses)): ?>
                <div style="color: green; font-weight: bold; margin-bottom: 15px; text-align: center;"><?php echo $pesan_sukses; ?></div>
            <?php endif; ?>
            <?php if(!empty($pesan_error)): ?>
                <div style="color: red; font-weight: bold; margin-bottom: 15px; text-align: center;"><?php echo $pesan_error; ?></div>
            <?php endif; ?>

            <form action="#" method="POST" onsubmit="return validasiForm()">

                <div class="form-row">
                    <div class="form-group">
                        <label for="nama">Nama Anda *</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukan nama anda" required>
                    </div>

                    <div class="form-group">
                        <label for="perusahaan">Nama Perusahaan (opsional)</label>
                        <input type="text" id="perusahaan" name="perusahaan" placeholder="PT/CV anda">
                    </div>
                </div>

                <div class="form-group full-width">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" placeholder="name@mail.com" required>
                </div>

                <div class="form-group full-width">
                    <label for="pesan">Message *</label>
                    <textarea id="pesan" name="pesan" placeholder="Masukkan pesan anda disini" required></textarea>
                </div>

                <button type="submit" class="submit-btn">Submit</button>

            </form>
        </section>

        <section class="nomor-kontak">
            <a href="https://wa.me/6281351249935" target="_blank" rel="noopener noreferrer">
                <img src="assets/kontakdiego.jpeg" alt="Info Lebih Lanjut Hubungi Mike Diego via WhatsApp">
            </a>
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
        <p class="copyright">
            &copy; 2026 Duta Lite. All rights reserved.
        </p>
    </footer>

    <script src="js/form.js"></script>
</body>
</html>