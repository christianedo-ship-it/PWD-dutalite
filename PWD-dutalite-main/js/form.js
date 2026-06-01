function validasiForm() {
    var nama = document.getElementById("nama").value;
    var perusahaan = document.getElementById("perusahaan").value;
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

    var nomorWA = "6281351249935"; 

    var teksWA = "Halo Duta Lite, saya ingin menghubungi Anda.%0A%0A";
    teksWA += "Nama: " + nama + "%0A";

    if (perusahaan != "") {
        teksWA += "Perusahaan: " + perusahaan + "%0A";
    }
    
    teksWA += "Email: " + email + "%0A";
    teksWA += "Pesan: " + pesan;

    var linkWA = "https://wa.me/" + nomorWA + "?text=" + teksWA;

    window.open(linkWA, "_blank");

    document.getElementById("nama").value = "";
    document.getElementById("perusahaan").value = "";
    document.getElementById("email").value = "";
    document.getElementById("pesan").value = "";

    return false; 
}