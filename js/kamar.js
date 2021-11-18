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
                .setAttribute('action', URL + '/kamar/' + id);

            fetch(`${URL}/kamar/json/getKamar/${id}`)
                .then(res => res.json())
                .then(res => {
                    document.querySelector('input[name=nama_kamar]').value =
                        res.data.nama_kamar;
                    document.querySelector('input[name=kepala_kamar]').value =
                        res.data.nama_kepala_kamar;

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