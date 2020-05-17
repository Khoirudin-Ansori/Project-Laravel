@extends('layouts.app')
@push('cssdttb')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@nedpush
@section('content')
  <div class="card mt-5">
    <div class="card-header text-center">
      Daftar Transaksi 
    </div>
    <div class="card-body">
      {{ csrf_field() }}
      <br>
      <table id="datatable" class="table table-bordered table-hover table-striped tblind">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nomor Pesanan</th>
            <th>Nama Mobil</th>
            <th>Harga</th>
            <th>Jumlah Beli</th>
            <th>Total</th>
            <th>Pembeli</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; ?>
          @foreach($detail as $p)
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $p->nomor_pesanan }}</td>
              <td>{{ $p->nama_mobil }}</td>
              <td>{{ $p->harga_mobil }}</td>
              <td>{{ $p->jumlah_beli }}</td>
              <td>{{ $p->subtotal }}</td>
              <td>{{ $p->pembeli }}</td>
            </tr>
            <?php $no++ ?>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
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

