// no hp

function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : e.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
    return true;
}

// rupiah
var rupiah = document.getElementById('donasi');
rupiah.addEventListener('keyup', function () {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, 'Rp. ');
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
}

// hanya angka dan huruf
$(document).ready(function () {

    $('#name').keyup(function () {
        var $th = $(this);
        $th.val($th.val().replace(/[^a-zA-Z0-9 /,-. )(]/g, function (str) {
            alert('Kamu menulis " ' + str + ' ".\n\ dimohon huruf dan angka saja.');
            return '';
        }));
    });

    $('#floatingTextarea').keyup(function () {
        var $th = $(this);
        $th.val($th.val().replace(/[^a-zA-Z0-9 /,-.@_&={/?} )(]/g, function (str) {
            alert('Kamu menulis " ' + str + ' ".\n\ dimohon huruf dan angka saja.');
            return '';
        }));
    });

    $('#hp').keyup(function () {
        var $th = $(this);
        $th.val($th.val().replace(/[^0-9]/g, function (str) {
            alert('Kamu menulis " ' + str + ' ".\n\ dimohon angka saja.');
            return '';
        }));
    });
})

// validasi donasi
function validasi_donasi(form) {
    var minchar = 3;
    var minchar2 = 7;
    var minchar3 = 5;
    //membuat pattern inputan email

    //validasi dimulai
    if (form.nama.value.length <= minchar) {
        alert("Nama Terlalu Pendek!");
        form.nama.focus();
        return (false);
    }

    else if (form.hp.value.length <= minchar2) {
        alert("No HP Terlalu Pendek!");
        form.hp.focus();
        return (false);
    }

    else if (form.donasi.value.length <= minchar3) {
        alert("Donasi Minimal 10.000!");
        form.donasi.focus();
        return (false);
    }
}
