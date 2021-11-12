@extends('templates.template')

@section('content')
        <div class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8">
                  <div class="card">
                    <div class="header">
                      <h3 class="title">Tambah Santri</h3>
                    </div>
                    <div class="content">
                      <form>
                        <div class="form-group">
                          <label>Nama Santri</label>
                          <input type="text" class="form-control" placeholder="" />
                        </div>
                        <div class="form-group">
                          <label>No Induk</label>
                          <input type="number" class="form-control" placeholder="" />
                        </div>
                        <div class="form-group">
                          <label>Tempat Santri</label>
                          <input type="text" class="form-control" placeholder="" />
                        </div>
                        <div class="form-group">
                          <label>Tanggal Santri</label>
                          <input type="date" class="form-control" placeholder="" />
                        </div>
                        <div class="form-group">
                          <label>Wali Santri</label>
                          <input type="text" class="form-control" placeholder="" />
                        </div>
                        <div class="form-group">
                          <label>Alamat Santri</label>
                          <input type="text" class="form-control" placeholder="" />
                        </div>
                        <div class="form-group">
                          <label>Status</label>
                          <input type="text" class="form-control" placeholder="" />
                        </div>
                        <div class="form-group">
                          <label>Tanggal Masuk</label>
                          <input type="date" class="form-control" placeholder="" />
                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right">Tambah Santri</button>
                        <div class="clearfix"></div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card card-user">
                    <div class="image">
                      <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..." />
                    </div>
                    <div class="content">
                      <div class="author">
                        <a href="#">
                          <img class="avatar border-gray" src="{{asset('img/default.png')}}" alt="..." />
  
                          <div class="title">
                            <button class="btn btn-block">Tambah foto</button>
                          </div>
                        </a>
                      </div>
                    </div>
                    <hr />
                  </div>
                </div>
              </div>
            </div>

        </div>
  @endsection
