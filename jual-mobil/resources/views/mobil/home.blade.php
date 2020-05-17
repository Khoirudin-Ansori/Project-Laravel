@extends('layouts.app')

@section('content')
    <div class="card mt-5">
        @if(session('sukses'))
            <div class="alert alert-success" role="alert">
                {{session('sukses')}}
            </div>
        @endif
  
        <div class="card-header text-center">
                Dashboard   
        </div>
        <div class="card-body">
                
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data Mobil
                </button> | 

                @if ($errors->has('file'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('file') }}</strong>
                    </span>
                @endif
                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                    IMPORT EXCEL
                </button>
 
        <!-- Import Excel -->
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="/mobil/import_excel" enctype="multipart/form-data">
                            <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                </div>
                                <div class="modal-body">
         
                                    {{ csrf_field() }}
         
                                    <label>Pilih file excel</label>
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>
         
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br/>
                <br/>
                <table id="datatable" class="table table-bordered table-hover table-striped tblind">
                    <thead>
                        <tr>
                            <th>Nama Mobil</th>
                            <th>Merk Mobil</th>
                            <th>Warna Mobil</th>
                            <th>Harga Mobil</th>
                            <th>Tahun Mobil</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_mobil as $p)  
                            <tr>
                                <td>{{  $p->nama_mobil }}</td>
                                <td>{{  $p->merk->merk_mobil}}</td>
                                <td>{{  $p->warna_mobil }}</td>
                                <td>{{  $p->harga_mobil }}</td>
                                <td>{{  $p->tahun_mobil }}</td>
                                <td>
                                    <a href="/mobilnew/detail/{{ $p->id}}" class="btn btn-success detail">Detail</a>
                                    <a href="/mobilnew/edit/{{ $p->id }}" type="button" class="btn btn-warning">Edit</a>
                                    <a href="/mobilnew/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>
        </div>
<!-- Modal Add -->
    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mobil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="" >
                    <form action="/mobilnew/create" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Mobil</label>
                            <input name="nama_mobil" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Mobil">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Merk Mobil</label>
                            <select class="form-control" id="merk_mobil" name="merk-mobil">
                               @foreach($merk_mobil as $mb)
                               <option value="{{$mb->id}}">{{$mb->merk_mobil}}</option>
                               @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Warna Mobil</label>
                            <input name="warna_mobil" type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Warna Mobil">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga Mobil</label>
                            <input name="harga_mobil" type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Harga Mobil">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tahun Mobil</label> 
                            <input name="tahun_mobil" type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Tahun Mobil">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
