@extends('templates.template')

@section('content')
        <div class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col">
                  <div class="card">
                    <div class="header">
                      <h3 class="title">Tambah Kamar</h3>
                    </div>
                    <div class="content">
                      <form action="{{ url('/') }}/kamar" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Nama Kamar</label>
                          <input type="text" name="nama_kamar" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label>Kepala Kamar</label>
                          <input type="number" name="kepala_kamar" class="form-control" placeholder="" required/>
                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right">Tambah Data</button>
                        <div class="clearfix"></div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>
  @endsection
