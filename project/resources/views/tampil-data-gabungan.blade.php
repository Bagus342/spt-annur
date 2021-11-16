@extends('templates.template')

@section('content')
          <style>
            .dataTables_filter {
              float: left !important;
            }
          </style>
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-10"></div>
              <div class="col-md-2"></div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="header">
                    <div class="row">
                      <div class="col-md-10">
                        <h4 class="title">Data Gabungan</h4>
                      </div>
                      <div class="col-md-2">
                        <a href="{{ url('/') }}/gabungan/view/add" class="btn btn-block btn-default">Tambah</a>
                      </div>
                    </div>
                  </div>
                  <div class="content table-responsive table-full-width" style="padding: 25px 30px 25px 30px">
                    <table class="table table-hover table-striped" id="table_id">
                      <thead>
                        <th>No</th>
                        <th>No Induk</th>
                        <th>Nama Kategori</th>
                        <th>Nama Kamar</th>
                      </thead>
                      <tbody id="list-data">
                        @foreach($data as $item)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_induk }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>{{ $item->nama_kamar }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  @endsection
