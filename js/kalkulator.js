document.addEventListener('DOMContentLoaded', function() {
    const inputJumlah = document.getElementById('jumlahBata');
    const selectUkuran = document.getElementById('ukuranBata');
    const displayHasil = document.getElementById('hasilVolume');

    function hitungVolume() {
        let jumlah = parseFloat(inputJumlah.value);
        let ukuran = parseFloat(selectUkuran.value);

        if (!isNaN(jumlah) && !isNaN(ukuran) && ukuran !== 0) {
            let total = jumlah * ukuran;
            displayHasil.textContent = total.toFixed(3).replace('.', ',');
        } else {
            displayHasil.textContent = '—';
        }
    }

    inputJumlah.addEventListener('input', hitungVolume);
    selectUkuran.addEventListener('change', hitungVolume);
});