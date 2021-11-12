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
                        <h4 class="title">Data User</h4>
                      </div>
                      <div class="col-md-2">
                        <a href="{{ url('/') }}/user/view/add" class="btn btn-block btn-default">Tambah</a>
                      </div>
                    </div>
                  </div>
                  <div class="content table-responsive table-full-width" style="padding: 25px 30px 25px 30px">
                    <table class="table table-hover table-striped" id="table_id">
                      <thead>
                        <th>ID</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Tanggal Masuk</th>
                      </thead>
                      <tbody>
                          <tr>
                              <td>1</td>
                              <td>Dio</td>
                              <td>Dio</td>
                              <td>babu</td>
                              <td>1-1-1999</td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td>Bagus</td>
                              <td>Bagus</td>
                              <td>admin</td>
                              <td>1-1-1999</td>
                          </tr>
                          <tr>
                              <td>1</td>
                              <td>Rendi</td>
                              <td>Rendi</td>
                              <td>admin</td>
                              <td>1-1-1999</td>
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
