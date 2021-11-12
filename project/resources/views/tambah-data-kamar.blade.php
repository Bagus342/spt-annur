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
                      <form>
                        @csrf
                        <div class="form-group">
                          <label>Nama Santri</label>
                          <input type="text" name="nama_santri" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label>No Induk</label>
                          <input type="number" name="no_induk" class="form-control" placeholder="" required/>
                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right">Tambah Santri</button>
                        <div class="clearfix"></div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>
  @endsection
