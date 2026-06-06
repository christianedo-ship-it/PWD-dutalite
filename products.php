<?php 
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duta Lite - Products</title>
    <link rel="stylesheet" href="styles/style.css?v=1.3">
</head>
<body>

<?php
include 'header.php';
?>

    <main>
        <section class="products-hero">
            <h1>PRODUCTS</h1>
            <p>Pilihan Ukuran Produk</p>
        </section>

        <section class="product-list-container">
            <?php
            $query = "SELECT * FROM products ORDER BY id ASC";
            $hasil = mysqli_query($koneksi, $query);
            $no = 0; 

            while($baris = mysqli_fetch_assoc($hasil)) {
                $class_reverse = ($no % 2 == 1) ? ' reverse' : '';
                
                echo '<div class="product-row' . $class_reverse . '">';
                echo '    <div class="product-text">';
                echo '        <h2>' . htmlspecialchars($baris['ukuran']) . '</h2>';
                echo '        <p class="product-desc">Volume ' . htmlspecialchars($baris['deskripsi']) . '</p>';
                echo '    </div>';
                echo '    <div class="product-img">';
                echo '        <img src="assets/' . htmlspecialchars($baris['gambar']) . '" alt="Bata ' . htmlspecialchars($baris['nama_produk']) . '">';
                echo '    </div>';
                echo '</div>';

                $no++;
            }
            ?>
        </section>

        <section class="order-selection-section" id="pemesanan">
            <div class="order-container">
                <h2 class="section-title">Form Pemesanan Bata Ringan</h2>
                <p class="section-subtitle">Ikuti langkah di bawah ini untuk menghitung dan mengirim pesanan langsung ke WhatsApp kami</p>

                <div class="order-flow-wrapper">
                    
                    <div class="order-inputs-side">
                        
                        <div class="step-card">
                            <div class="step-number">1</div>
                            <h3>Pilih Ukuran Bata Ringan</h3>
                            <div class="input-group">
                                <label for="selectUkuran">Ukuran yang Tersedia</label>
                                <select id="selectUkuran" class="form-control">
                                    <option value="0" disabled selected>-- Pilih Ukuran Bata --</option>
                                    <option value="0.009" data-nama="7,5 x 60 x 20 cm">7,5 x 60 x 20 cm</option>
                                    <option value="0.012" data-nama="10 x 60 x 20 cm">10 x 60 x 20 cm</option>
                                    <option value="0.015" data-nama="12,5 x 60 x 20 cm">12,5 x 60 x 20 cm</option>
                                    <option value="0.018" data-nama="15 x 60 x 20 cm">15 x 60 x 20 cm</option>
                                </select>
                                <span class="input-hint">Pilih tipe ukuran yang ingin Anda pesan</span>
                            </div>
                        </div>

                        <div class="step-card">
                            <div class="step-number">2</div>
                            <h3>Kalkulator Pembantu (Opsional)</h3>
                            <p class="step-desc">Masukkan jumlah keping/pcs untuk mengetahui total volume kubik secara otomatis.</p>
                            <div class="input-group">
                                <label for="calcJumlahBata">Jumlah Batu Bata (Pcs)</label>
                                <input type="number" id="calcJumlahBata" class="form-control" placeholder="Contoh: 1000" min="0">
                                <span class="input-hint">Isi jika Anda ingin menghitung konversi ke kubik</span>
                            </div>
                        </div>

                    </div>

                    <div class="order-results-side">
                        
                        <div class="step-card result-card-highlight">
                            <div class="step-number">3</div>
                            <h3>Data Pemesan & Total Kebutuhan</h3>
                            
                            <div class="identity-fields">
                                <div class="input-group small-group">
                                    <label for="buyerName">Nama Anda</label>
                                    <input type="text" id="buyerName" class="form-control" placeholder="Masukkan nama" required>
                                </div>
                                <div class="input-group small-group">
                                    <label for="buyerCompany">Perusahaan (Opsional)</label>
                                    <input type="text" id="buyerCompany" class="form-control" placeholder="Nama toko / perusahaan">
                                </div>
                                <div class="input-group small-group">
                                    <label for="buyerEmail">Email</label>
                                    <input type="email" id="buyerEmail" class="form-control" placeholder="alamat@gmail.com" required>
                                </div>
                            </div>

                            <div class="volume-display-box">
                                <span class="volume-label">Hasil Hitung Kalkulator:</span>
                                <div class="calc-output-val" id="hasilVolumeOtomatis">—</div>
                                <span class="volume-unit">M³ (Kubik)</span>
                            </div>

                            <div class="input-group final-input-group">
                                <label for="finalVolume">Jumlah Fix yang Dipesan (Kubik)</label>
                                <input type="number" id="finalVolume" class="form-control final-input" placeholder="0.00" step="0.01" min="0">
                                <span class="input-hint">Bisa diedit manual jika tidak memakai kalkulator.</span>
                            </div>

                            <button type="button" id="btnWhatsApp" class="checkout-btn">Kirim Pesanan ke WhatsApp</button>
                        </div>

                    </div>

                </div>
            </div>
        </section>

    </main>

<?php
include 'footer.php';
?>

    <script src="js/pemesanan.js"></script>
</body>
</html>