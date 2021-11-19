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
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Tanggal Masuk</th>
                                    <th>
                                        <center>Action</center>
                                    </th>
                                </thead>
                                <tbody id="list-data">
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_user }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->level === 1 ? 'Admin' : 'Pengurus' }}</td>
                                            <td>{{ formatTanggal($item->tanggal_masuk) }}</td>
                                            <td>
                                                <center>
                                                    <!-- Button modal edit -->
                                                    <button type="button" class="btn btn-warning update" data-toggle="modal"
                                                        data-target="#update_user" data-id="{{ $item->id_user }}">
                                                        Ubah
                                                    </button>
                                                    @if(session('user_id') === $item->id_user)
                                                    <button type="button" class="btn btn-danger" disabled>
                                                        Hapus
                                                    </button> 
                                                    @else
                                                        <a href="{{ url('/') }}/user/{{ $item->id_user }}" class="btn btn-danger">Hapus</a>
                                                    @endif
                                                </center>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Modal Update -->
                            <div class="modal fade" id="update_user" tabindex="-1" role="dialog"
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
                                                        <label>Nama User</label>
                                                        <input type="text" name="nama_user" class="form-control"
                                                            placeholder="" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" name="username" class="form-control"
                                                            placeholder="" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="password" class="form-control"
                                                            placeholder="" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Level</label>
                                                        <select name="level" id="level" class="form-control">
                                                            <option value="" default>Pilih...</option>
                                                            <option value="1">Admin</option>
                                                            <option value="2">Pengurus</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Masuk</label>
                                                        <input type="text" id="tgl" name="tgl_masuk" class="form-control"
                                                            placeholder="" required />
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js"
                integrity="sha512-mBSqtiBr4vcvTb6BCuIAgVx4uF3EVlVvJ2j+Z9USL0VwgL9liZ638rTANn5m1br7iupcjjg/LIl5cCYcNae7Yg=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('js/user.js') }}"></script>

        {{-- Datepicker --}}
        <script type="text/javascript">
            $(function() {
                $('#tgl').datetimepicker({
                    format: 'DD-MM-YYYY',
                });
            });
        </script>
    @endsection
