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
                .setAttribute('action', URL + '/user/' + id);

            fetch(`${URL}/user/json/getUser/${id}`)
                .then(res => res.json())
                .then(res => {
                    const tgl_masuk = res.data.tanggal_masuk.split('-');
                    document.querySelector('input[name=nama_user]').value =
                        res.data.nama_user;
                    document.querySelector('input[name=username]').value =
                        res.data.username;
                    document.querySelector('input[name=password]').value =
                        res.data.text;
                    document.querySelector('select[name=level]').value =
                        res.data.level;
                    document.querySelector('input[name=tgl_masuk]').value =
                        `${tgl_masuk[2]}-${tgl_masuk[1]}-${tgl_masuk[0]}`
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