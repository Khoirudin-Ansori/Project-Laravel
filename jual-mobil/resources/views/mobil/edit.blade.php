@extends('layouts.app')

@section('content')
    <div class="card mt-5">
        @if(session('sukses'))
            <div class="alert alert-success" role="alert">
                {{session('sukses')}}
            </div>
        @endif
        <div class="card-body">
            <form action="/mobil/{{$mobil->id}}/update" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Mobil</label>
                    <input name="nama_mobil" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Mobil" value="{{$mobil->nama_mobil}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Merk Mobil</label>
                    <input name="merk_mobil" type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Merk Mobil" value="{{$mobil->merk_mobil}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Warna Mobil</label>
                    <input name="warna_mobil" type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Warna Mobil" value="{{$mobil->warna_mobil}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Harga Mobil</label>
                    <input name="harga_mobil" type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Harga Mobil" value="{{$mobil->harga_mobil}}">
                </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Tahun Mobil</label> 
                    <input name="tahun_mobil" type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Tahun Mobil" value="{{$mobil->tahun_mobil}}">
                </div>
                <button type="submit" class="btn btn btn-warning">Update</button>
            </form>        
        </div>
     </div>
@endsection('content')
