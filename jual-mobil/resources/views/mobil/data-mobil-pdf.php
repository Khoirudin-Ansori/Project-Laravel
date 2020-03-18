<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>

	<div class="container">
		<center>
			<h4>Membuat Laporan PDF Data Mobil</h4>
			<h5><a target="/home" ></a></h5>
		</center>
		<br/>
		<table  class="table table-bordered table-hover table-striped tblind">
            <thead>
                <tr>
                    <th>Nama Mobil</th>
                    <th>Merk Mobile</th>
                    <th>Warna Mobile</th>
                    <th>Harga Mobil</th>
                    <th>Tahun Mobil</th>
                    <th style="width: 200px">Aksi</th>
                 </tr>
            </thead>
                    <tbody>
                        @foreach(@mobilpdf as $p)
                            <tr>
                                <td>{{  $p->nama_mobil }}</td>
                                <td>{{  $p->merk_mobil }}</td>
                                <td>{{  $p->warna_mobil }}</td>
                                <td>{{  $p->harga_mobil }}</td>
                                <td>{{  $p->tahun_mobil }}</td>
                                <td>
                                    <a href="/detail/{{ $p->id}}" class="btn btn-success detail">Detail</a>
                                    <a href="/mobil/edit/{{ $p->id }}" type="button" class="btn btn-warning">Edit</a>
                                    <a href="/mobil/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

	</div>

</body>
</html>