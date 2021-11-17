const URL = document.getElementById('url').value;
const TOKEN = document.getElementById('token').value;

function displayD() {
  const dt = document.getElementsByClassName('detail');

  for (let i = 0; i < dt.length; i++) {
    dt[i].addEventListener('click', function () {
      const ID = this.getAttribute('data-id');
      fetch(URL + '/detail/biodata?id=' + ID)
        .then((res) => res.json())
        .then((res) => {
          document.getElementById('detail').innerHTML = detail(res.data);
        });
    });
  }
}

displayD();

const detail = (res) => {
  return /* html */ `
        <div class="author">
            <a href="${'img/' + res.foto_santri}">
                <img class="avatar border-gray"
                    src="${'img/' + res.foto_santri}"
                    alt="..." />

                <h3 class="title">
                    ${res.nama_santri} <br>
                    <small> <b>No induk : ${res.noinduk_santri}</b> </small>
                </h3>
            </a>
        </div>
        <div class="description row mt-5">
            <div class="col-md-6">
                <p>
                    <br>
                    Tempat Santri : ${res.tempat_santri} <br>
                    Tanggal Santri : ${res.tanggal_santri} <br>
                    Wali Santri : ${res.wali_santri} <br>
                </p>
            </div>
            <div class="col-md-6">
                <br>
                Alamat : ${res.alamat_santri}<br>
                Status : ${res.status === 1 ? 'Aktif' : 'Tidak Aktif'}<br>
                Tanggal Masuk : ${res.tanggal_masuk}
            </div>
        </div>
    `;
};

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
