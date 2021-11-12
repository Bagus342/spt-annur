@extends('templates.template')

@section('content')
        <div class="content">
          <div class="container-fluid">
            <div class="row">
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
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#exampleModalLong">Tambah</button>

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                              </div>
                              <div class="modal-body">...</div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="content table-responsive table-full-width" style="padding: 25px 30px 25px 30px">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  @endsection
