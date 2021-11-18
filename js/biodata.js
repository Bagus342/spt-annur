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
          document.querySelector('input[name=nama_santri]').value =
            res.data.nama_santri;
          document.querySelector('input[name=no_induk]').value =
            res.data.noinduk_santri;
          document.querySelector('input[name=tempat_santri]').value =
            res.data.tempat_santri;
          document.querySelector('input[name=tanggal_santri]').value =
            res.data.tanggal_santri;
          document.querySelector('input[name=wali_santri]').value =
            res.data.wali_santri;
          document.querySelector('input[name=alamat_santri]').value =
            res.data.alamat_santri;
          document.querySelector('input[name=tanggal_masuk]').value =
            res.data.tanggal_masuk;
          document.querySelector('input[name=oldImage]').value =
            'img/' + res.data.foto_santri;
          console.log(document.querySelector('input[name=oldImage]').value)
          $('input[name="status"][value="' + res.data.status + '"]').prop('checked', true);
        });
    });
  }
}

getUpdate();

function deleteD() {
  const dt = document.getElementsByClassName('delete');

  for (let i = 0; i < dt.length; i++) {
    dt[i].addEventListener('click', function () {
      const ID = this.getAttribute('data-id');
      fetch(URL + '/biodata/' + ID)
        .then((res) => res.json())
        .then((res) => {
          document.getElementById('list-data').innerHTML = parseDelete(res)
        })
    });
  }
}

deleteD();

const parseDelete = data => {
  let html = '';
  let no = 1;
  data.data.map(res => {
    html += displayDelete(res, no++);
  });
  return html;
};

const displayDelete = (res, no) => {
  return /* html */ `
  <tr>
      <td>${no}</td>
      <td>${res.noinduk_santri}</td>
      <td>${res.nama_santri}</td>
      <td>${res.tempat_santri}</td>
      <td>${res.tanggal_santri}</td>
      <td>${res.wali_santri}</td>
      <td>${res.alamat_santri}</td>
      <td>${res.status === 1 ? 'Aktif' : 'Tidak Aktif'}</td>
      <td>${res.tanggal_masuk}</td>
      <td>
          <center>
      <!-- Button modal detail -->
      <button type="button" class="btn btn-primary detail" data-toggle="modal"
          data-target="#detail_user" data-id="${res.id_biodata}">
            Detail
      </button>
      <!-- Button modal edit -->
      <button type="button" class="btn btn-warning update" data-toggle="modal"
          data-target="#update_user" data-id="${res.id_biodata}">
            Ubah
      </button>
      <button type="button" class="btn btn-danger delete"
          data-id="${res.id_biodata}">
            Hapus
      </button>
          </center>
      </td>
  </tr >
  `
}

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
  < div class="author" >
    <a href="${'img/' + res.foto_santri}">
      <img class="avatar border-gray"
        src="${'img/' + res.foto_santri}" alt="..." />

      <h3 class="title">
        ${res.nama_santri} <br>
        <small> <b>No induk: ${res.noinduk_santri}</b> </small>
      </h3>
    </a>
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
          <td>${res.tanggal_santri}</td>
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
          <td>Alamat</td>
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
          <td>${res.tanggal_masuk}</td>
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
