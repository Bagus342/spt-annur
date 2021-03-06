@extends('templates.template')

@section('content')
    <style>
        .dataTables_filter {
            float: left !important;
        }

        .tabel table tr td {
            border-top: none;
            font-size: 20px;
            word-wrap: break-word;
            /* All browsers since IE 5.5+ */
            overflow-wrap: break-word;
            /* Renamed property in CSS3 draft spec */
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
                                    <th>
                                        <center>Action</center>
                                    </th>
                                </thead>
                                <tbody id="list-data">
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->noinduk_santri }}</td>
                                            <td>{{ $item->nama_santri }}</td>
                                            <td>{{ $item->tempat_santri }}</td>
                                            <td>{{ formatTanggal($item->tanggal_santri) }}</td>
                                            <td>{{ $item->wali_santri }}</td>
                                            <td>{{ $item->alamat_santri }}</td>
                                            <td>{{ $item->status === 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                                            <td>{{ formatTanggal($item->tanggal_masuk) }}</td>
                                            <td>
                                                <center>
                                                    <button type="button" class="btn btn-primary detail" data-toggle="modal"
                                                        data-target="#detail_user" data-id="{{ $item->id_biodata }}">
                                                        Detail
                                                    </button>
                                                    <button type="button" class="btn btn-warning update" data-toggle="modal"
                                                        data-target="#update_user" data-id="{{ $item->id_biodata }}">
                                                        Ubah
                                                    </button>
                                                    <!-- Button modal detail -->
                                                    <?php if (count($gabungan) === 0) : ?>
                                                        <a href="{{ url('/') }}/biodata/{{ $item->id_biodata }}" class="btn btn-danger">Hapus</a>
                                                    <?php else : ?>
                                                    @foreach($gabungan as $filter)
                                                        @if($filter->no_induk === $item->noinduk_santri)
                                                        <button type="button" class="btn btn-danger" disabled>
                                                        Hapus
                                                    </button>
                                                        @else
                                                        <a href="{{ url('/') }}/biodata/{{ $item->id_biodata }}" class="btn btn-danger">Hapus</a>
                                                        @endif
                                                    @endforeach
                                                    <?php endif ?>
                                                </center>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Modal Detail -->
                            <div class="modal fade" id="detail_user" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="width: 120rem">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                DETAIL
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card card-user">
                                                <div id="detail" class="content">
                                                    <div class="author">
                                                        <a href="#">
                                                            <img class="avatar border-gray"
                                                                src="{{ asset('img/default.png') }}" alt="..." />

                                                            <h3 class="title">
                                                                Mike Andrew <br>
                                                                <small> <b>No induk : 0001</b> </small>
                                                            </h3>
                                                        </a>
                                                    </div>
                                                    <div class="description row mt-5 tabel">
                                                        <div class="col-md-6">
                                                            <table class="table">
                                                                <tr>
                                                                    <td style="width: 40%">Tempat Santri</td>
                                                                    <td>:</td>
                                                                    <td>Malang</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tanggal Santri</td>
                                                                    <td>:</td>
                                                                    <td>17-19-2021</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Wali</td>
                                                                    <td>:</td>
                                                                    <td>Simoya Silokop</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Alamat</td>
                                                                    <td>:</td>
                                                                    <td>Jl. Patimura Rt. 003/025 No. 123</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Status</td>
                                                                    <td>:</td>
                                                                    <td>Aktif</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tanggal Masuk</td>
                                                                    <td>:</td>
                                                                    <td>09-11-2021</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Keluar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Update -->
                            <div class="modal fade" id="update_user" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="" id="form-update" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    UBAH DATA SANTRI
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama Santri</label>
                                                    <input type="text" name="nama_santri" class="form-control"
                                                        placeholder="" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>No Induk</label>
                                                    <input type="text" name="no_induk" class="form-control" placeholder=""
                                                        required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Tempat Santri</label>
                                                    <input type="text" name="tempat_santri" class="form-control"
                                                        placeholder="" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Lahir</label>
                                                    <input type="text" id="tgl" name="tanggal_santri" class="form-control"
                                                        placeholder="" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Wali Santri</label>
                                                    <input type="text" name="wali_santri" class="form-control"
                                                        placeholder="" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat Santri</label>
                                                    <input type="text" name="alamat_santri" class="form-control"
                                                        placeholder="" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Masuk</label>
                                                    <input type="text" id="tgl1" name="tanggal_masuk" class="form-control"
                                                        placeholder="" required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="image" class="">Foto Santri</label>
                                                    <input type="hidden" name="oldImage">
                                                    <input type="file" name="image" id="image" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label><br />
                                                    <input type="radio" id="status1" name="status" value="1" required />
                                                    <label for="status1">Aktif</label><br />
                                                    <input type="radio" id="status0" name="status" value="0" required />
                                                    <label for="status0">Tidak Aktif</label>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js"
        integrity="sha512-mBSqtiBr4vcvTb6BCuIAgVx4uF3EVlVvJ2j+Z9USL0VwgL9liZ638rTANn5m1br7iupcjjg/LIl5cCYcNae7Yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('/js/biodata.js') }}"></script>

    {{-- Datepicker --}}
    <script type="text/javascript">
        $(function() {
            $('#tgl').datetimepicker({
                format: 'DD-MM-YYYY',
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#tgl1').datetimepicker({
                format: 'DD-MM-YYYY'
            });
        });
    </script>
@endsection
