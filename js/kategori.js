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
                        res.data.uang_makan;
                    document.querySelector('input[name=uang_infaq]').value =
                        res.data.uang_infaq;
                    document.querySelector('input[name=uang_kesehatan]').value =
                        res.data.uang_kesehatan;
                    document.querySelector('input[name=uang_tabungan]').value =
                        res.data.uang_tabungan;
                    document.querySelector('input[name=uang_tambahan]').value =
                        res.data.uang_tambahan;
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