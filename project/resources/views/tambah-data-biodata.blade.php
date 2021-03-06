@extends('templates.template')

@section('content')

    <style>
        input[type="file"] {}

    </style>

    <div class="content">
        <form method="POST" action="{{ url('/') }}/biodata" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="header">
                                <h3 class="title">Tambah Santri</h3>
                            </div>
                            <div class="content">
                                @if (session('gagal') !== null)
                                    <div class="form-group">
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('gagal') }}
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>Nama Santri</label>
                                    <input type="text" name="nama_santri" class="form-control" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label>No Induk</label>
                                    <input type="text" name="no_induk" class="form-control" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label>Tempat Santri</label>
                                    <input type="text" name="tempat_santri" class="form-control" placeholder=""
                                        required />
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="text" id="tgl" name="tanggal_santri" class="form-control" placeholder=""
                                        required />
                                </div>
                                <div class="form-group">
                                    <label>Wali Santri</label>
                                    <input type="text" name="wali_santri" class="form-control" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label>Alamat Santri</label>
                                    <input type="text" name="alamat_santri" class="form-control" placeholder=""
                                        required />
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Masuk</label>
                                    <input type="text" id="tgl1" name="tanggal_masuk" class="form-control" placeholder=""
                                        required />
                                </div>
                                <div class="form-group">
                                    <label for="foto" class="">Foto Santri</label>
                                    <input type="file" name="image" id="image" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label><br>
                                    <input type="radio" id="status1" name="status" value="1" required>
                                    <label for="status1">Aktif</label><br>
                                    <input type="radio" id="status0" name="status" value="0" required>
                                    <label for="status0">Tidak Aktif</label>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Tambah Data</button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

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
