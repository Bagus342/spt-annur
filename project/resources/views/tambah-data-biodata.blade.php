@extends('templates.template')

@section('content')

        <style>
          input[type="file"]{
          }
        </style>

        <div class="content">
          <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
              <div class="row">
                <div class="col">
                  <div class="card">
                    <div class="header">
                      <h3 class="title">Tambah Santri</h3>
                    </div>
                    <div class="content">
                        <div class="form-group">
                          <label>Nama Santri</label>
                          <input type="text" name="nama_santri" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label>No Induk</label>
                          <input type="number" name="no_induk" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label>Tempat Santri</label>
                          <input type="text" name="tempat_santri" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label>Tanggal Lahir</label>
                          <input type="date" name="tanggal_santri" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label>Wali Santri</label>
                          <input type="text" name="wali_santri" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label>Alamat Santri</label>
                          <input type="text" name="alamat_santri" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label>Tanggal Masuk</label>
                          <input type="date" name="tanggal_masuk" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label>Status</label><br>
                          <input type="radio" id="status1" name="status" value="1">
                          <label for="status1">Aktif</label><br>
                          <input type="radio" id="status0" name="status" value="0">
                          <label for="status0">Tidak Aktif</label>
                        </div>
                        <div class="form-group">
                              <label for="foto" class="">Foto Santri</label>
                              <input type="file" name="foto" id="foto" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right">Tambah Santri</button>
                        <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
  @endsection
