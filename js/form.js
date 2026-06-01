function validasiForm() {
    var nama = document.getElementById("nama").value;
    var email = document.getElementById("email").value;
    var pesan = document.getElementById("pesan").value;

    if (nama == "") {
        alert("Nama tidak boleh kosong!");
        return false;
    }

    if (email == "") {
        alert("Email tidak boleh kosong!");
        return false;
    }

    if (pesan == "") {
        alert("Pesan tidak boleh kosong!");
        return false;
    }

    alert("Terima kasih! Pesan anda berhasil dikirim.");
    return true;
}