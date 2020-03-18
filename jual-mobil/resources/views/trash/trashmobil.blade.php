@extends('layouts.app')
@section('content')
	<div class="card mt-5">
        @if(session('sukses'))
            <div class="alert alert-success" role="alert">
                {{session('sukses')}}
            </div>
        @endif
            <div class="card-header text-center">
                Trash
            </div>
            <div class="card-body">
                <a href="/mobil/restoreall" class="btn btn-success btn-sm">Kembalikan Semua</a>
                <!-- |
                <a href="/guru/hapus_permanen_semua">Hapus Permanen Semua</a> -->
                <br/>
                <br/>
 
                <table id="datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Mobil</th>
                            <th>Merk Mobil</th>
                            <th>Warna Mobil</th>
                            <th>Harga_Mobil</th>
                            <th>Tahun Mobil</th>
                            <th>OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mobil as $m)
                        <tr>
                            <td>{{  $m->nama_mobil }}</td>
                            <td>{{  $m->merk_mobil }}</td>
                            <td>{{  $m->warna_mobil }}</td>
                            <td>{{  $m->harga_mobil }}</td>
                            <td>{{  $m->tahun_mobil }}</td>

                            <td>
                                <a href="/mobil/restore/{{ $m->id }}" class="btn btn-success btn-sm">Restore</a>
                                <!-- <a href="/guru/hapus_permanen/{{ $m->id }}" class="btn btn-danger btn-sm">Hapus Permanen</a> -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection('content')