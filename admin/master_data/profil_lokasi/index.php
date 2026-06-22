<?php
include "../../security.php";
include "../../../koneksi.php";

$data_company = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM company_profile WHERE id_profile=1"));
$data_office = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM head_office WHERE id_headoffice=1"));
$data_location = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM location WHERE id_location=1"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Master Data - Profil & Lokasi</title>
    <link rel="stylesheet" href="../../styles/style.css?v=<?= time(); ?>">
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>Duta Lite</h2>
            <p>Panel Admin</p>
        </div>
        
        <ul class="nav-links">
            <li><a href="../../dashboard.php">📊 Dashboard</a></li>
            
            <li>
                <a href="javascript:void(0)" class="dropdown-btn active">📁 Master Data <span class="arrow rotate">▼</span></a>
                <ul class="dropdown-container show">
                    <li><a href="index.php" class="active">🏢 Profil & Lokasi</a></li>
                    <li><a href="../visi_misi/index.php">🎯 Visi & Misi</a></li>
                    <li><a href="../keunggulan/index.php">⭐ Keunggulan</a></li>
                    <li><a href="../info_pembelian/index.php">🛒 Info Pembelian</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0)" class="dropdown-btn">🗄️ Manajemen Data <span class="arrow">▼</span></a>
                <ul class="dropdown-container">
                    <li><a href="../../manajemen_data/products/index.php">📦 Produk</a></li>
                    <li><a href="../../manajemen_data/pesanan/index.php">📝 Pesanan</a></li>
                </ul>
            </li>
        </ul>

        <div class="sidebar-footer">
            <a href="../../logout.php" class="logout-btn">🚪 Logout</a>
        </div>
    </aside>

    <main class="main-content">
        <header class="top-header">
            <div class="header-left">
                <h3>Master Data Profil & Lokasi</h3>
            </div>
            <div class="header-right">
                <span>Welcome, <strong><?= htmlspecialchars($username ?? 'Admin'); ?></strong></span>
            </div>
        </header>
        
        <div class="content-body">
            
            <div class="form-container">
                <div class="form-header">
                    <h2>Profil Perusahaan & Lokasi</h2>
                </div>

                <form action="proses.php" method="POST" class="admin-form">
                    
                    <h3 style="margin: 20px 0 15px; color: #1b365d; border-bottom: 2px solid #f1f5f9; padding-bottom: 10px;">🏢 Profil Perusahaan</h3>
                    <div class="form-group">
                        <label>Deskripsi Profil</label>
                        <textarea name="description" class="form-control" rows="5" required><?= htmlspecialchars($data_company['description'] ?? ''); ?></textarea>
                    </div>

                    <h3 style="margin: 30px 0 15px; color: #1b365d; border-bottom: 2px solid #f1f5f9; padding-bottom: 10px;">📍 Head Office</h3>
                    <div class="form-group">
                        <label>Nama Gedung</label>
                        <input type="text" name="ho_name" class="form-control" value="<?= htmlspecialchars($data_office['name'] ?? ''); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea name="ho_location" class="form-control" rows="3" required><?= htmlspecialchars($data_office['location'] ?? ''); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Negara</label>
                        <input type="text" name="ho_country" class="form-control" value="<?= htmlspecialchars($data_office['country'] ?? ''); ?>" required>
                    </div>

                    <h3 style="margin: 30px 0 15px; color: #1b365d; border-bottom: 2px solid #f1f5f9; padding-bottom: 10px;">🗺️ Lokasi Cabang / Pelayanan</h3>
                    <div class="form-group">
                        <label>Deskripsi Lokasi</label>
                        <textarea name="loc_description" class="form-control" rows="4" required><?= htmlspecialchars($data_location['description'] ?? ''); ?></textarea>
                    </div>

                    <div class="form-action" style="margin-top: 40px;">
                        <button type="submit" name="update" class="btn btn-primary">💾 Simpan Perubahan</button>
                    </div>
                </form>
            </div>

        </div>
    </main>

    <script>
        var dropdowns = document.getElementsByClassName("dropdown-btn");
        for (var i = 0; i < dropdowns.length; i++) {
            dropdowns[i].addEventListener("click", function() {
                var dropdownContent = this.nextElementSibling;
                var arrow = this.querySelector(".arrow");
                
                if (dropdownContent.classList.contains("show")) {
                    dropdownContent.classList.remove("show");
                    arrow.classList.remove("rotate");
                } else {
                    dropdownContent.classList.add("show");
                    arrow.classList.add("rotate");
                }
            });
        }
    </script>
</body>
</html>