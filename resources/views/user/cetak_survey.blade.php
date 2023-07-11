<!DOCTYPE html>
<html>

<head>
	<title>Surat Survey</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			font-size: 14px;
			line-height: 1.5;
		}

		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			border: 1px solid #ccc;
		}

		.header {
			text-align: center;
			margin-bottom: 20px;
		}

		.sender-info {
			margin-bottom: 30px;
		}

		.sender-info p {
			margin: 0;
			padding: 0;
			line-height: 1.5;
		}

		.signature {
			text-align: right;
			margin-top: 40px;
		}

		.signature p {
			margin: 0;
			padding: 0;
			line-height: 1.5;
		}

		.informasi {
			overflow: hidden;
		}

		.tanggal {
			float: right;
			text-align: justify;
		}

		.nomor {
			float: left;
			text-align: justify;
		}
	</style>
</head>

<body>
	@foreach ($cetak_survey as $index => $data1)
	<div class="container">
		<div class="header">
			<h1>Surat Pengantar Survey</h1>
		</div>
		<div class="informasi">
			<p class="tanggal">Batam, {{ $data1->created_at }}</p>
			<p class="nomor">No : <b>{{ $data1->id_surat_survei }}</b><br>Perihal : Permohonan Survey</p>
		</div>
		<p>Kepada Yth.<br><b>{{ $data1->ditujukan }}</b>,</p>
		<p>Alamat Penerima : <b>{{ $data1->alamat }}</b></p>
		<p>Tugas Mata Kuliah : <b>{{ $data1->tugas_matkul }}</b></p>
		<p>Keperluan :</br>
			{{ $data1->keperluan }}
		</p>

		<div class="sender-info">
			<p>Hormat kami,</p>
			<p>{{ $data1->name }}</p>
			<p>({{ $data1->nim }})</p>
		</div>

		<div class="signature">
			<p>Ttd,</p>
			<p>Supardianto</p>
		</div>
	</div>
	@endforeach
</body>

</html>