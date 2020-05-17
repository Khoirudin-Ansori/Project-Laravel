@extends('layouts.app')
@push('cssdttb')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

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
                        TAMBAH DATA MOBIL
                </button> | 

                <!-- @if ($errors->has('file'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('file') }}</strong>
                    </span>
                @endif
 
        {{-- notifikasi sukses --}}
                @if ($sukses = Session::get('sukses'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $sukses }}</strong>
                    </div>
                @endif -->
 
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importExcel">
                    IMPORT EXCEL
                </button> |
                <a href="{{ route('downloadasexcel')}}" type="button" class="btn btn-primary"> DOWNLOAD AS EXCEL </a> |
                <a href="mobil/downlaodaspdf" type="button" class="btn btn-primary"> DOWNLOAD AS PDF </a>
 
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
                            <th>No.</th>
                            <th>Nama Mobil</th>
                            <th>Merk Mobil</th>
                            <th>Warna Mobil</th>
                            <th>Harga Mobil</th>
                            <th>Tahun Mobil</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($data_mobil as $p)  
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{  $p->nama_mobil }}</td>
                                <td>{{  $p->merk_mobil }}</td>
                                <td>{{  $p->warna_mobil }}</td>
                                <td>{{  $p->harga_mobil }}</td>
                                <td>{{  $p->tahun_mobil }}</td>
                                <td>
                                    <a href="/mobil/detail/{{ $p->id}}" class="btn btn-success detail">Detail</a>
                                    <a href="/mobil/edit/{{ $p->id }}" type="button" class="btn btn-warning">Edit</a>
                                    <a href="/mobil/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php $no++ ?>
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
                    <form action="/mobil/create" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Mobil</label>
                            <input name="nama_mobil" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Mobil" required="required">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Merk Mobil</label>
                            <input name="merk_mobil" type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Merk Mobil" required="required">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Warna Mobil</label>
                            <input name="warna_mobil" type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Warna Mobil" required="required">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga Mobil</label>
                            <input name="harga_mobil" type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Harga Mobil" required="required">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tahun Mobil</label> 
                            <input name="tahun_mobil" type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Tahun Mobil" required="required">
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
@push('dttb')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
 
  $(document).ready(function () {

    var table = $('#datatable').DataTable();

    table.on('click', '.detail', function () {

      $tr = $(this).closest('tr');
      if ($($tr).hasClass('child')) {
        $tr = $tr.prev('.parent');
      }

      var data = table.row($tr).data();
      console.log(data);

      $('#nama_mobil').val(data[0]);
      $('#merk_mobil').val(data[1]);
      $('#warna_mobil').val(data[2]);
      $('#kode_suplier').val(data[3]);
      $('#harga_mobil').val(data[4]);
      $('#tahun_mobil').val(data[5]);

      $('#EditModal').modal('show');

    })

  })




</script>
@endpush