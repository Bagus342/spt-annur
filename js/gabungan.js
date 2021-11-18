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
                .setAttribute('action', URL + '/gabungan/' + id);

            fetch(`${URL}/gabungan/json/getGabungan/${id}`)
                .then(res => res.json())
                .then(res => {
                    document.querySelector('select[name=no_induk]').value =
                        res.data.no_induk;
                    document.querySelector('select[name=nama_kategori]').value =
                        res.data.nama_kategori;
                    document.querySelector('select[name=nama_kamar]').value =
                        res.data.nama_kamar;
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