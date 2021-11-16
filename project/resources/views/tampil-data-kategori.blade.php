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
                        <h4 class="title">Data Kategori</h4>
                      </div>
                      <div class="col-md-2">
                        <a href="{{ url('/') }}/kategori/view/add" class="btn btn-block btn-default">Tambah</a>
                      </div>
                    </div>
                  </div>
                  <div class="content table-responsive table-full-width" style="padding: 25px 30px 25px 30px">
                    <table class="table table-hover table-striped" id="table_id">
                      <thead>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Uang Makan</th>
                        <th>Uang Infaq</th>
                        <th>Uang Kesehatan</th>
                        <th>Uang Tabungan</th>
                        <th>Uang Tambahan</th>
                      </thead>
                      <tbody id="list-data">
                          @foreach($data as $item)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->nama_kategori }}</td>
                              <td>{{ $item->uang_makan }}</td>
                              <td>{{ $item->uang_infaq }}</td>
                              <td>{{ $item->uang_kesehatan }}</td>
                              <td>{{ $item->uang_tabungan }}</td>
                              <td>{{ $item->uang_tambahan }}</td>
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
