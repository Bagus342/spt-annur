@extends('templates.template')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="header">
                            <h3 class="title">Tambah Gabungan</h3>
                        </div>
                        <div class="content">
                            <form action="{{ url('/') }}/user" method="POST">
                                <div class="form-group">
                                    <label>No Induk</label>
                                    <input type="text" name="nama_induk" class="form-control" placeholder="" required />
                                </div>
                                <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <select name="id_kategori" id="kategori" class="form-control">
                                        <option value="Rendi">Rendi</option>
                                        <option value="Bagus">Bagus</option>
                                        <option value="Faisal">Faisal</option>
                                        <option value="Dio">Dio</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Kamar</label>
                                    <select name="id_kamar" id="kamar" class="form-control">
                                        <option value="1">A001</option>
                                        <option value="2">A002</option>
                                        <option value="3">A003</option>
                                        <option value="4">A004</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Tambah Gabungan</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
