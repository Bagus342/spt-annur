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
        .setAttribute('action', URL + '/biodata/' + id);

      fetch(`${URL}/biodata/json/getBiodata/${id}`)
        .then(res => res.json())
        .then(res => {
          const tgl_lahir = res.data.tanggal_santri.split('-')
          const tgl_masuk = res.data.tanggal_masuk.split('-')
          document.querySelector('input[name=nama_santri]').value =
            res.data.nama_santri;
          document.querySelector('input[name=no_induk]').value =
            res.data.noinduk_santri;
          document.querySelector('input[name=tempat_santri]').value =
            res.data.tempat_santri;
          document.querySelector('input[name=tanggal_santri]').value =
            `${tgl_lahir[2]}-${tgl_lahir[1]}-${tgl_lahir[0]}`
          document.querySelector('input[name=wali_santri]').value =
            res.data.wali_santri;
          document.querySelector('input[name=alamat_santri]').value =
            res.data.alamat_santri;
          document.querySelector('input[name=tanggal_masuk]').value =
            `${tgl_masuk[2]}-${tgl_masuk[1]}-${tgl_masuk[0]}`
          document.querySelector('input[name=oldImage]').value =
            res.data.foto_santri;
          console.log(document.querySelector('input[name=oldImage]').value)
          $('input[name="status"][value="' + res.data.status + '"]').prop('checked', true);
        });
    });
  }
}

getUpdate();

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
  const tgl_lahir = res.tanggal_santri.split('-')
  const tgl_masuk = res.tanggal_masuk.split('-')
  return /* html */ `
  <div class="author" >
    <a href="${'img/' + res.foto_santri}">
      <img class="avatar border-gray"
        src="${'img/' + res.foto_santri}" alt="..." />
    </a>
      <h3 class="title">
        ${res.nama_santri} <br>
        <small> <b>No induk: ${res.noinduk_santri}</b> </small>
      </h3>
</div >
  <div class="description row mt-5 tabel">
    <div class="col-md-6">
      <table class="table">
        <tr>
          <td style="width: 40%">Tempat Santri</td>
          <td>:</td>
          <td>${res.tempat_santri}</td>
        </tr>
        <tr>
          <td>Tanggal Lahir</td>
          <td>:</td>
          <td>${`${tgl_lahir[2]}-${tgl_lahir[1]}-${tgl_lahir[0]}`}</td>
        </tr>
        <tr>
          <td>Wali Santri</td>
          <td>:</td>
          <td>${res.wali_santri}</td>
        </tr>
      </table>
    </div>
    <div class="col-md-6">
      <table class="table">
        <tr>
          <td>Alamat Santri</td>
          <td>:</td>
          <td>${res.alamat_santri}</td>
        </tr>
        <tr>
          <td>Status</td>
          <td>:</td>
          <td>${res.status === 1 ? 'Aktif' : 'Tidak Aktif'}</td>
        </tr>
        <tr>
          <td>Tanggal Masuk</td>
          <td>:</td>
          <td>${`${tgl_masuk[2]}-${tgl_masuk[1]}-${tgl_masuk[0]}`}</td>
        </tr>
      </table>
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
    title: `${flash.getAttribute('data-flash-success')} `,
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
    title: `${errorflash.getAttribute('data-flash-error')} `,
  });
}
