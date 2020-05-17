@extends('layouts.app')

@section('content')
<!-- <div class="panel-header panel-header-lg">
  </div> -->
  <div class="card mt-5">
    <div class="card-header text-center">
      Make an Order 
    </div>
    <div class="card-body">
      <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id_users" id="id_users" class="form-control" readonly="" value="{{ Auth::user()->id }}">
        <table>
          <tr>
            <td class="head-label mb-1"><center><label>ID Transaksi</label> </center></td>
            <td>
              <input type="text" name="nomor_pesanan" id="nomor_pesanan" class="form-control head-form mb-1" readonly value="{{ $trcode }}">
            </td>
          </tr>
          <tr>
            <td ><center><label>Nama Mobil</label></center></td>
            <td ><center><label>Harga</label></center></td>    
          </tr>
          <tr>
            <td>
              <select class="form-control body-form" id="id_mobil" name="id_mobil" data-dependent="harga">
                <option value="">Pilih Mobil</option>
                @foreach ($list_mobil as $produk)
                  <option value="{{ $produk->id }}" harga="{{ $produk->harga_mobil }}" status="{{ $produk->status }}">
                    {{ $produk->nama_mobil }} 
                  </option>
                @endforeach
              </select>
            </td>
            <td>
              <input type="text" name="harga" id="harga" class="form-control body-form disable" readonly>
            </td>
          </tr>
          <tr>
            <td><center><label>Jumlah</label></center></td>
            <td><center><label>total</label></center></td>
            <td></td>
          </tr>
          <tr>
            <td>
              <input type="number" name="jumlah" id="jumlah" class="form-control body-form" autocomplete="off" onkeyup="subttl()">
            </td>
            <td>
              <input type="number" name="total" id="total" class="form-control body-form disable" readonly>
            </td>
          </tr>
          <tr>
            <td><center><label for="bayar">Dibayar</label></center></td>
            <td><center><label for="kembali">Kembalian</label></center></td>
          </tr>
          <tr>
            <td><input type="number" name="bayar" id="bayar" class="form-control body-form" onkeyup="byr()" required="required"></td>
            <td><input type="number" name="kembali" id="kembali" class="form-control body-form" readonly required="required"></td>
          </tr>
          <tr>
            <td><center><label for="pembeli">Nama Pembeli</label></center></td>
          </tr>
          <tr>
            <td><input type="text" name="pembeli" id="pembeli" class="form-control body-form" required=""></td>
            <td><input type="submit" name="submit" id="submit" value="Submit" class="form-control body-form"></td>
          </tr>
        </table>
        <br>           
      </form> 
    </div>
  </div>
@endsection

@push('js')

<script type="text/javascript">
$('#jumlah').prop('readonly', true);
  $(document).ready(function() {
    $(document).on('change', '#id_mobil', function() {
      var id =  $(this).val();
      var harga = $("#id_mobil option:selected").attr("harga");
      var status = $("#id_mobil option:selected").attr("status");
      $('#jumlah').prop('readonly', false);
      $('#harga').val(harga);
      // if ( status == 'aktif') {
      //   $('#jumlah').prop('readonly', false);
      //   $('#harga').val(harga);
      // } else {
      //   $('#harga').val('Barang Tidak aktif');
      // };
    });
  });
</script>

<script type="text/javascript">
  function subttl(){
    hrg = $('#harga').val();
    jml = $('#jumlah').val();
    tot = hrg * jml;
    $('#total').val(tot);
  };
</script>
</script>
<script type="text/javascript">
  $('#total_harga').val(tot);
  function byr(){
    b = $('#bayar').val();
    tb = $('#total').val();
    kmbl = b-tb;
    $('#kembali').val(kmbl);
  }
</script>

<script type="text/javascript">
  function rupiah1($angka){
  $hasil_rupiah = "Rp " . number_format($angka, 0, ".", ".");
  return $hasil_rupiah;
}
</script>
<!-- <script type="text/javascript">
  function tambahkan() {
    $.ajaxSetup({
      headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type : "POST",
      url : "{{ route('simpan_detail')}}",
      dataType : "JSON",
      data : {
        nomor_pesanan:$('#nomor_pesanan').val(),
        id_mobil : $('#id_mobil').val(),
        jumlah_beli:$('#jumlah').val(),
        subtotal:$('#total').val()
        "_token": "{{ csrf_token() }}"
      },
      success:function(data){
        alert("Data Berhasil Ditambahkan");
        window.location.reload();
        // $('#tabel_detail').load("/order#tabel_detail");
      },
      error: function(data) {
        alert("Isikan Data Dengan Benar !");
      }
    });
  }
</script> -->

@endpush
