@extends('templates.template')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="header">
                            <h3 class="title">Tambah User</h3>
                        </div>
                        <div class="content">
                            <form action="{{ url('/') }}/user" method="POST">
                                @csrf
                                @if (session('gagal') !== null)
                                    <div class="form-group">
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('gagal') }}
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>Nama User</label>
                                    <input type="text" name="nama_user" class="form-control" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <select name="level" id="level" class="form-control">
                                        <option value="" default>Pilih...</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Pengurus</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Masuk</label>
                                    <input type="text" id="tgl" name="tgl_masuk" class="form-control" placeholder=""
                                        required />
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Tambah User</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Datepicker --}}
    <script type="text/javascript">
        $(function() {
            $('#tgl').datetimepicker({
                format: 'DD/MM/YYYY',
            });
        });
    </script>
@endsection
