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
                            <form method="POST" action="{{ url('/') }}/gabungan">
                                @csrf
                                @if (session('gagal') !== null)
                                <div class="form-group">
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('gagal') }}
                                    </div>
                                </div>
                            @endif
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
                                    <label for="kategori">Nama Kategori</label>
                                    <select name="nama_kategori" id="kategori" class="form-control">
                                        <option value="" >Pilih..</option>
                                        @foreach($kategori as $item)
                                            <option value="{{ $item->nama_kategori }}" >{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label for="kamar">Nama Kamar</label>
                                    <select name="nama_kamar" id="kamar" class="form-control">
                                        <option value="">Pilih...</option>
                                        @foreach($kamar as $item)
                                            <option value="{{ $item->nama_kamar }}">{{ $item->nama_kamar }}</option>
                                        @endforeach
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
