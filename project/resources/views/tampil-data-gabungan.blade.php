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
                <div class="content-header">
                    <div id="flash-data-success" data-flash-success="{{ session('sukses') }}"></div>
                    <div id="flash-data-error" data-flash-error="{{ session('gagal') }}"></div>
                </div>
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
                                    <a href="{{ url('/') }}/gabungan/view/add"
                                        class="btn btn-block btn-default">Tambah</a>
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
                                    <th>
                                        <center>Action</center>
                                    </th>
                                </thead>
                                <tbody id="list-data">
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->no_induk }}</td>
                                            <td>{{ $item->nama_kategori }}</td>
                                            <td>{{ $item->nama_kamar }}</td>
                                            <td>
                                                <center>
                                                    <!-- Button modal edit -->
                                                    <button type="button" class="btn btn-warning update" data-toggle="modal"
                                                        data-target="#update_gabungan" data-id="{{ $item->id_gabungan }}">
                                                        Ubah
                                                    </button>
                                                    <a href="{{ url('/') }}/gabungan/{{ $item->id_gabungan }}" class="btn btn-danger">Hapus</a>
                                                </center>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Modal Update -->
                            <div class="modal fade" id="update_gabungan" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <form method="POST" action="" id="form-update">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    UBAH DATA GABUNGAN
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="no_induk">Nomor Induk</label>
                                                        <select name="no_induk" id="no_induk" class="form-control">
                                                            <option value="" >Pilih..</option>
                                                            @foreach($biodata as $item)
                                                            <option value="{{ $item->noinduk_santri }}" >{{ $item->noinduk_santri }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_induk">Nama Kategori</label>
                                                        <select name="nama_kategori" id="nama_kategori" class="form-control">
                                                            <option value="" >Pilih..</option>
                                                            @foreach($kategori as $item)
                                                            <option value="{{ $item->nama_kategori }}" >{{ $item->nama_kategori }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_induk">Nama Kamar</label>
                                                        <select name="nama_kamar" id="nama_kamar" class="form-control">
                                                            <option value="" >Pilih..</option>
                                                            @foreach($kamar as $item)
                                                            <option value="{{ $item->nama_kamar }}" >{{ $item->nama_kamar }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Keluar
                                                </button>
                                                <button type="submit" class="btn btn-success">
                                                    Simpan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js"
        integrity="sha512-mBSqtiBr4vcvTb6BCuIAgVx4uF3EVlVvJ2j+Z9USL0VwgL9liZ638rTANn5m1br7iupcjjg/LIl5cCYcNae7Yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/gabungan.js') }}"></script>
@endsection
