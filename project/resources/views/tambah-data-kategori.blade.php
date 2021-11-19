@extends('templates.template')

@section('content')

        <style>
          input[type="file"]{
            display: none;
          }
        </style>

        <div class="content">
          <form method="POST" action="{{ url('/') }}/kategori">
            @csrf
            <div class="container-fluid">
              <div class="row">
                <div class="col">
                  <div class="card">
                    <div class="header">
                      <h3 class="title">Tambah Kategori</h3>
                    </div>
                    <div class="content">
                      @if (session('gagal') !== null)
                      <div class="form-group">
                          <div class="alert alert-danger" role="alert">
                              {{ session('gagal') }}
                          </div>
                      </div>
                  @endif
                        <div class="form-group">
                          <label>Nama Kategori</label>
                          <input type="text" name="nama_kategori" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Uang Makan</label>
                          <div class="input-group-prepend">
                              <input type="text" value="Rp. " onkeypress="return isNumber(event)" class="form-control uang_makan" placeholder="Uang Makan" name="uang_makan" required>
                          </div>
                          <span class="text-secondary"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Uang Infaq</label>
                            <div class="input-group-prepend">
                                <input type="text" value="Rp. " onkeypress="return isNumber(event)" class="form-control uang_infaq" placeholder="Uang Infaq" name="uang_infaq" required>
                            </div>
                            <span class="text-secondary"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Uang Kesehatan</label>
                            <div class="input-group-prepend">
                                <input type="text" value="Rp. " onkeypress="return isNumber(event)" class="form-control uang_kesehatan" placeholder="Uang Kesehatan" name="uang_kesehatan" required>
                            </div>
                            <span class="text-secondary"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Uang Tabungan</label>
                            <div class="input-group-prepend">
                                <input type="text" value="Rp. " onkeypress="return isNumber(event)" class="form-control uang_tabungan" placeholder="Uang Tabungan" name="uang_tabungan" required>
                            </div>
                            <span class="text-secondary"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Uang Tambahan</label>
                            <div class="input-group-prepend">
                                <input type="text" value="Rp. " onkeypress="return isNumber(event)" class="form-control uang_tambahan" placeholder="Uang Tambahan" name="uang_tambahan" required>
                            </div>
                            <span class="text-secondary"></span>
                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right">Tambah Data</button>
                        <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <script>
          function isNumber(evt) {
            var charCode = evt.which ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
            return true;
        }

        var uang_makan = document.querySelector('.uang_makan');
        uang_makan.addEventListener('keyup', function(e) {

            const val = this.value.split('Rp. ')
            val.length > 1 ? uang_makan.value = formatRupiah(val[1], 'Rp. ') : uang_makan.value = formatRupiah(this.value, 'Rp. ')
        });
        
        var uang_infaq = document.querySelector('.uang_infaq');
        uang_infaq.addEventListener('keyup', function(e) {

            const val = this.value.split('Rp. ')
            val.length > 1 ? uang_infaq.value = formatRupiah(val[1], 'Rp. ') : uang_infaq.value = formatRupiah(this.value, 'Rp. ')
        });

        var uang_kesehatan = document.querySelector('.uang_kesehatan');
        uang_kesehatan.addEventListener('keyup', function(e) {

            const val = this.value.split('Rp. ')
            val.length > 1 ? uang_kesehatan.value = formatRupiah(val[1], 'Rp. ') : uang_kesehatan.value = formatRupiah(this.value, 'Rp. ')
        });

        var uang_tabungan = document.querySelector('.uang_tabungan');
        uang_tabungan.addEventListener('keyup', function(e) {

            const val = this.value.split('Rp. ')
            val.length > 1 ? uang_tabungan.value = formatRupiah(val[1], 'Rp. ') : uang_tabungan.value = formatRupiah(this.value, 'Rp. ')
        });

        var uang_tambahan = document.querySelector('.uang_tambahan');
        uang_tambahan.addEventListener('keyup', function(e) {

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
        </script>
  @endsection
