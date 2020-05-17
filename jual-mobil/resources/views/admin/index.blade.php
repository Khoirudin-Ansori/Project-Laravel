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
        	<div class="" role="alert"></div>
        <div class="card-header text-center">
                Daftar Admin 
        </div>
        <div class="card-body">
        		Anda Masuk Sebagai {{ Auth::user()->name }} 
                
                <a href="" type="button" class="" data-toggle="modal" data-target="#exampleModal">
                        Change Password?
                </a>
                <br/>
                <br/>
                <table id="datatable" class="table table-bordered table-hover table-striped tblind">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                           <!--  <th style="width: 200px">Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admin as $p)  
                            <tr>
                                <td>{{  $p->name }}</td>
                                <td>{{  $p->email }}</td>
                                <td>{{  $p->password }}</td>
                                <!-- <td>
                                    <a href="#" class="btn btn-success detail">Detail</a>
                                    <a href="/mobil/{{ $p->id }}" type="button" class="btn btn-warning">Edit</a>
                                    <a href="/hapus/{{ $p->ktp }}" class="btn btn-danger">Hapus</a>
                                </td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
<!-- Modal cange pass -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('updatepassword')}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                            <label for="current_password" >Current Password</label>
                            <input name="current_password" id="current_password" type="text" class="form-control">
                            <span class="help-block">{{ $errors->first('current_password')}}</span>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">New Password</label>
                            <input name="password" id="password" type="text" class="form-control">
                            <span class="help-block">{{ $errors->first('password')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Re Write New Password</label>
                            <input name="password_confirmation" id="password_confirmation" type="text" class="form-control" >
                            <span class="help-block">{{ $errors->first('password_confirmation')}}</span>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form>
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
    })

  })




</script>
@endpush