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
                        <h4 class="title">Biodata Santri</h4>
                      </div>
                      <div class="col-md-2">
                        <a href="{{ url('/') }}/biodata/view/add" class="btn btn-block btn-default">Tambah</a>
                      </div>
                    </div>
                  </div>
                  <div class="content table-responsive table-full-width" style="padding: 25px 30px 25px 30px">
                    <table class="table table-hover table-striped" id="table_id">
                      <thead>
                        <th>ID</th>
                        <th>No Induk</th>
                        <th>Nama</th>
                        <th>Tempat Santri</th>
                        <th>Tanggal Santri</th>
                        <th>Foto</th>
                        <th>Wali</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Tanggal Masuk</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>001</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>12/12/2012</td>
                          <td>contoh</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>1</td>
                          <td>contoh</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>001</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>contoh</td>
                          <td>contoh</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>1</td>
                          <td>contoh</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>001</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>contoh</td>
                          <td>contoh</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>1</td>
                          <td>contoh</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>001</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>contoh</td>
                          <td>contoh</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>1</td>
                          <td>contoh</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>001</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>contoh</td>
                          <td>contoh</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>1</td>
                          <td>contoh</td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>001</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>contoh</td>
                          <td>contoh</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>1</td>
                          <td>contoh</td>
                        </tr>
                        <tr>
                          <td>7</td>
                          <td>001</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>contoh</td>
                          <td>contoh</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>1</td>
                          <td>contoh</td>
                        </tr>
                        <tr>
                          <td>8</td>
                          <td>001</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>contoh</td>
                          <td>contoh</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>1</td>
                          <td>contoh</td>
                        </tr>
                        <tr>
                          <td>9</td>
                          <td>001</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>contoh</td>
                          <td>contoh</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>1</td>
                          <td>contoh</td>
                        </tr>
                        <tr>
                          <td>10</td>
                          <td>001</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>contoh</td>
                          <td>contoh</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>1</td>
                          <td>contoh</td>
                        </tr>
                        <tr>
                          <td>11</td>
                          <td>001</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>contoh</td>
                          <td>contoh</td>
                          <td>Bagus</td>
                          <td>Malang</td>
                          <td>1</td>
                          <td>contoh</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  @endsection
