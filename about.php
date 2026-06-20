<?php 
include 'koneksi.php';

$sql_profile = "SELECT * FROM company_profile LIMIT 1";
$query_profile = mysqli_query($koneksi, $sql_profile);
$data_profile = mysqli_fetch_assoc($query_profile);

$sql_office = "SELECT * FROM head_office LIMIT 1";
$query_office = mysqli_query($koneksi, $sql_office);
$data_office = mysqli_fetch_assoc($query_office);

$sql_vision = "SELECT * FROM vision LIMIT 1";
$query_vision = mysqli_query($koneksi, $sql_vision);
$data_vision = mysqli_fetch_assoc($query_vision);

$sql_mission = "SELECT * FROM mission ORDER BY id_mission ASC";
$query_mission = mysqli_query($koneksi, $sql_mission);

$pesan_sukses = "";
$pesan_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    <link rel="stylesheet" href="styles/style.css?v=<?= time(); ?>">
</head>
<body>

<?php
include 'header.php';
?>

    <main class="content-container">
        <section class="about-section">
            <div class="about-text">
                <h1>About Us</h1>
                <h3>Profil Perusahaan</h3>
                <p>
                    <?= nl2br(htmlspecialchars($data_profile['description'] ?? 'Data profil perusahaan belum tersedia.')); ?>
                </p>
            </div>
            <div class="about-image">
                <img src="assets/about.jpeg" alt="Bata Ringan AAC">
            </div>
        </section>

        <div class="company-info-wrapper">
            <section class="head-office-card">
                <div class="card-icon">📍</div>
                <h2>Head Office</h2>
                <div class="office-details">
                    <p class="office-building"><?= htmlspecialchars($data_office['name'] ?? 'Nama Gedung / Kantor'); ?></p>
                    <p><?= nl2br(htmlspecialchars($data_office['location'] ?? 'Alamat kantor belum tersedia.')); ?></p>
                    <p class="office-country"><?= htmlspecialchars($data_office['country'] ?? 'Indonesia'); ?></p>
                </div>
            </section>

            <section class="visi-misi-card">
                <h2>Visi & Misi</h2>
                
                <div class="vision-box">
                    <h3>Visi</h3>
                    <p>
                        <?= nl2br(htmlspecialchars($data_vision['description'] ?? 'Data visi belum tersedia.')); ?>
                    </p>
                </div>

                <div class="mission-box">
                    <h3>Misi</h3>
                    <ul>
                        <?php 
                        if (mysqli_num_rows($query_mission) > 0) {
                            while($misi = mysqli_fetch_assoc($query_mission)) { 
                        ?>
                            <li><?= htmlspecialchars($misi['description']); ?></li>
                        <?php 
                            }
                        } else {
                            echo "<li>Data misi belum tersedia.</li>";
                        }
                        ?>
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

<?php
include 'footer.php';
?>

    <script src="js/form.js"></script>
</body>
</html>