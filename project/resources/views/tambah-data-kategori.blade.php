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
                        <div class="form-group">
                          <label>Nama Kategori</label>
                          <input type="text" name="nama_kategori" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label>Uang Makan</label>
                          <input type="text" name="uang_makan" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label>Uang Infaq</label>
                          <input type="text" name="uang_kesehatan" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label>Uang Kesehatan</label>
                          <input type="text" name="uang_kesehatan" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label>Uang Tabungan</label>
                          <input type="text" name="uang_tabungan" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label>Uang Tambahan</label>
                          <input type="text" name="uang_tambahan" class="form-control" placeholder="" required/>
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
  @endsection
