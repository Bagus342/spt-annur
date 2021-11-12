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
                        <h4 class="title">Data Kamar</h4>
                      </div>
                      <div class="col-md-2">
                        <a href="{{ url('/') }}/kamar/view/add" class="btn btn-block btn-default">Tambah</a>
                      </div>
                    </div>
                  </div>
                  <div class="content table-responsive table-full-width" style="padding: 25px 30px 25px 30px">
                    <table class="table table-hover table-striped" id="table_id">
                      <thead>
                        <th>ID</th>
                        <th>Nama Kamar</th>
                        <th>Nama Kepala Kamar</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>a</td>
                          <td>Rendi</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>b</td>
                          <td>Bagusi</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>c</td>
                          <td>Faisal</td>
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
