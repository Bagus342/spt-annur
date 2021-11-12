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
                      <form>
                        @csrf
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="nama_user" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" name="username" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="pasword" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group">
                          <label for="level">Level</label>
                          <select name="cars" id="cars" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="pengurus">Pengurus</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Masuk</label>
                            <input type="date" name="tgl_masuk" class="form-control" placeholder="" required/>
                          </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right">Tambah Santri</button>
                        <div class="clearfix"></div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>
  @endsection
