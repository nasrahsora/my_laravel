<!DOCTYPE html>
<html>
<head>
	<title>Cetak Data Pegawai</title>
</head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<style>
		table.static{
			position: relative;
			border: 1px solid #543535;
		}

	</style>
<body>
	<div class="form-group">
		<p align="center"><b>Laporan Data Pegawai</b></p>
		<table class="static" align="center" rules="all" border="1" style="width: 95%;">
			<tr>
			  <td>No</td>
              <td>Nama</td>
              <td>Jabatan</td>
              <td>Alamat</td>
              <td>Tgl Lahir</td>
			</tr>


            @foreach ($dtCetakPegawai as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->nama}}</td>
              <td>{{$item->jabatan->jabatan}}</td>
              <td>{{$item->alamat}}</td>
              <td>{{date('d-m-Y', strtotime($item->tgllhr)) }}</td>
          	</tr>
            @endforeach

		</table>
	</div>

	<script type="text/javascript"> window.print(); </script>
</body>
</html>