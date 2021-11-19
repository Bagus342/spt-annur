const URL = document.getElementById('url').value;
const TOKEN = document.getElementById('token').value;

function getUpdate() {
    const elementUpdate = document.getElementsByClassName('update')
    for (let i = 0; i < elementUpdate.length; i++) {
        elementUpdate[i].addEventListener('click', function () {
            const id = elementUpdate[i].getAttribute('data-id');
            console.log(id)
            document
                .getElementById('form-update')
                .setAttribute('action', URL + '/kategori/' + id);

            fetch(`${URL}/kategori/json/getKategori/${id}`)
                .then(res => res.json())
                .then(res => {
                    document.querySelector('input[name=nama_kategori]').value =
                        res.data.nama_kategori;
                    document.querySelector('input[name=uang_makan]').value =
                        formatRupiah(
                            res.data.uang_makan.toString(),
                            'Rp. '
                        );
                    document.querySelector('input[name=uang_infaq]').value =
                        formatRupiah(
                            res.data.uang_infaq.toString(),
                            'Rp. '
                        );
                    document.querySelector('input[name=uang_kesehatan]').value =
                        formatRupiah(
                            res.data.uang_kesehatan.toString(),
                            'Rp. '
                        );
                    document.querySelector('input[name=uang_tabungan]').value =
                        formatRupiah(
                            res.data.uang_tabungan.toString(),
                            'Rp. '
                        );
                    document.querySelector('input[name=uang_tambahan]').value =
                        formatRupiah(
                            res.data.uang_tambahan.toString(),
                            'Rp. '
                        );
                });
        });
    }
}

getUpdate();

const flash = document.querySelector('#flash-data-success');

const alert = Swal.mixin({
    toast: true,
    position: 'top-end',
    icon: 'success',
    showConfirmButton: false,
    timer: 1500,
});

if (flash.getAttribute('data-flash-success') !== '') {
    alert.fire({
        icon: 'success',
        title: `${flash.getAttribute('data-flash-success')}`,
    });
}

const errorflash = document.querySelector('#flash-data-error');

const alerterror = Swal.mixin({
    toast: true,
    position: 'top-end',
    icon: 'error',
    showConfirmButton: false,
    timer: 1500,
});

if (errorflash.getAttribute('data-flash-error') !== '') {
    alerterror.fire({
        icon: 'error',
        title: `${errorflash.getAttribute('data-flash-error')}`,
    });
}

var uang_makan = document.querySelector('.uang_makan');
uang_makan.addEventListener('keyup', function (e) {

    const val = this.value.split('Rp. ')
    val.length > 1 ? uang_makan.value = formatRupiah(val[1], 'Rp. ') : uang_makan.value = formatRupiah(this.value, 'Rp. ')
});

var uang_infaq = document.querySelector('.uang_infaq');
uang_infaq.addEventListener('keyup', function (e) {

    const val = this.value.split('Rp. ')
    val.length > 1 ? uang_infaq.value = formatRupiah(val[1], 'Rp. ') : uang_infaq.value = formatRupiah(this.value, 'Rp. ')
});

var uang_kesehatan = document.querySelector('.uang_kesehatan');
uang_kesehatan.addEventListener('keyup', function (e) {

    const val = this.value.split('Rp. ')
    val.length > 1 ? uang_kesehatan.value = formatRupiah(val[1], 'Rp. ') : uang_kesehatan.value = formatRupiah(this.value, 'Rp. ')
});

var uang_tabungan = document.querySelector('.uang_tabungan');
uang_tabungan.addEventListener('keyup', function (e) {

    const val = this.value.split('Rp. ')
    val.length > 1 ? uang_tabungan.value = formatRupiah(val[1], 'Rp. ') : uang_tabungan.value = formatRupiah(this.value, 'Rp. ')
});

var uang_tambahan = document.querySelector('.uang_tambahan');
uang_tambahan.addEventListener('keyup', function (e) {

    const val = this.value.split('Rp. ')
    val.length > 1 ? uang_tambahan.value = formatRupiah(val[1], 'Rp. ') : uang_tambahan.value = formatRupiah(this.value, 'Rp. ')
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
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}