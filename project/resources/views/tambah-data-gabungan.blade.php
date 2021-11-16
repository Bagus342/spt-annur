@extends('templates.template')

@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="header">
              <h3 class="title">Tambah User</h3>
            </div>
            <div class="content">
              <form action="{{ url('/') }}/user" method="POST">
                <div class="form-group">
                  <label>No Induk</label>
                  <input type="text" name="nama_induk" class="form-control" placeholder="" required />
                </div>
                <div class="form-group">
                  <label>Id Kategori</label>
                  <input type="number" name="id_kategori" class="form-control" placeholder="" required />
                </div>
                <div class="form-group">
                  <label>Id Kamar</label>
                  <input type="number" name="id_kamar" class="form-control" placeholder="" required />
                </div>
                <button type="submit" class="btn btn-info btn-fill pull-right">Tambah Gabungan</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
