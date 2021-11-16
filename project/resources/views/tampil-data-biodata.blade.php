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
<<<<<<< HEAD
                <div class="col-md-10"></div>
                <div class="col-md-2"></div>
=======
              <div class="content-header">
                <div id="flash-data-success" data-flash-success="{{ session('sukses') }}"></div>
                <div id="flash-data-error" data-flash-error="{{ session('error') }}"></div>
            </div>
              <div class="col-md-10"></div>
              <div class="col-md-2"></div>
>>>>>>> 5074466 (try biodata)
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
                                    <a href="{{ url('/') }}/biodata/view/add"
                                        class="btn btn-block btn-default">Tambah</a>
                                </div>
                            </div>
                        </div>
                        <div class="content table-responsive table-full-width" style="padding: 25px 30px 25px 30px">
                            <table class="table table-hover table-striped" id="table_id">
                                <thead>
                                    <th>No</th>
                                    <th>No Induk</th>
                                    <th>Nama</th>
                                    <th>Tempat Santri</th>
                                    <th>Tanggal Santri</th>
                                    <th>Wali</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="list-data">
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->noinduk_santri }}</td>
                                            <td>{{ $item->nama_santri }}</td>
                                            <td>{{ $item->tempat_santri }}</td>
                                            <td>{{ $item->tanggal_santri }}</td>
                                            <td>{{ $item->wali_santri }}</td>
                                            <td>{{ $item->alamat_santri }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->tanggal_masuk }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModalLong">
                                                    Detail
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalLong" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLongTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Detail
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card card-user">
                                                                    <div class="content">
                                                                        <div class="author">
                                                                            <a href="#">
                                                                                <img class="avatar border-gray"
                                                                                    src="{{ asset('img/default.png') }}"
                                                                                    alt="..." />

                                                                                <h3 class="title">
                                                                                    Mike Andrew <br>
                                                                                    <small> <b>No induk : 0001</b> </small>
                                                                                </h3>
                                                                            </a>
                                                                        </div>
                                                                        <div class="description row mt-5">
                                                                            <div class="col-md-6">
                                                                                <p>
                                                                                    <br>
                                                                                    Tempat Santri : Malang <br>
                                                                                    Tanggal Santri : 17-19-2021 <br>
                                                                                    Wali : Simoya Silokop <br>
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <br>
                                                                                Alamat : Jl. Patimura Rt. 003/025 No. 123
                                                                                Malang<br>
                                                                                Status : Aktif<br>
                                                                                Tanggal Masuk : 09-11-2021
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                    Keluar
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
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
