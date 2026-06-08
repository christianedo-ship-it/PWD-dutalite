document.addEventListener("DOMContentLoaded", function() {
    const selectUkuran = document.getElementById("selectUkuran");
    const calcJumlahBata = document.getElementById("calcJumlahBata");
    const hasilVolumeOtomatis = document.getElementById("hasilVolumeOtomatis");
    const finalVolume = document.getElementById("finalVolume");
            
    const buyerName = document.getElementById("buyerName");
    const buyerCompany = document.getElementById("buyerCompany");
    const buyerEmail = document.getElementById("buyerEmail");
    const btnWhatsApp = document.getElementById("btnWhatsApp");

    function hitungVolumeOtomatis() {
        const nilaiUkuran = parseFloat(selectUkuran.value);
        const jumlahBata = parseInt(calcJumlahBata.value);

        if (!isNaN(nilaiUkuran) && nilaiUkuran > 0 && !isNaN(jumlahBata) && jumlahBata > 0) {
            const totalVolume = jumlahBata * nilaiUkuran;
            hasilVolumeOtomatis.innerText = totalVolume.toFixed(3).replace('.', ',');
            finalVolume.value = totalVolume.toFixed(2);
        } else {
            hasilVolumeOtomatis.innerText = "—";
        }
    }

            selectUkuran.addEventListener("change", hitungVolumeOtomatis);
            calcJumlahBata.addEventListener("input", hitungVolumeOtomatis);

            
            btnWhatsApp.addEventListener("click", function() {
              
                if (!buyerName.value.trim()) {
                    alert("Silakan masukkan Nama Anda terlebih dahulu.");
                    buyerName.focus();
                    return;
                }
                if (!buyerEmail.value.trim()) {
                    alert("Silakan masukkan Email Anda terlebih dahulu.");
                    buyerEmail.focus();
                    return;
                }
                if (!finalVolume.value || parseFloat(finalVolume.value) <= 0) {
                    alert("Silakan tentukan jumlah volume kubik yang ingin dipesan.");
                    finalVolume.focus();
                    return;
                }

   
                const selectedOption = selectUkuran.options[selectUkuran.selectedIndex];
                const namaUkuran = selectedOption.value !== "0" ? selectedOption.getAttribute("data-nama") : "Belum ditentukan";


                const nama = buyerName.value.trim();
                const perusahaan = buyerCompany.value.trim() ? buyerCompany.value.trim() : "-";
                const email = buyerEmail.value.trim();
                const volumeFix = finalVolume.value;

  
                const nomorWA = "6281351249935";

  
                const teksPesan = `Halo Duta Lite, saya ingin menghubungi Anda. Nama: ${nama} Perusahaan: ${perusahaan} Email: ${email} Pesan: Saya ingin memesan Bata Ringan AAC ukuran ${namaUkuran} dengan total volume ${volumeFix} Kubik.`;

                const urlWhatsApp = `https://api.whatsapp.com/send?phone=${nomorWA}&text=${encodeURIComponent(teksPesan)}`;

                window.open(urlWhatsApp, '_blank');
            });
        });