@extends('layouts.main_cetak')

@section('cetak')
<div class="form-group"></br>
  <p class="text-dark text-center"><b>Laporan Data Survey</b></p>
  <div class="table-responsive">
    <table class="table table-bordered text-dark" align="center" style="width: 95%;">
      <thead>
        <tr style="text-align: center;">
          <th scope="col">No</th>
          <th scope="col">NIM</th>
          <th scope="col">NAMA</th>
          <th scope="col">Ditujukan Ke</th>
          <th scope="col">Tugas Mata Kuliah</th>
          <th scope="col">ALAMAT</th>
          <th scope="col">Keperluan</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $index => $item)
        @if ($item->status != 'Sedang Diajukan' && $item->status != 'Sedang Diproses')
        <tr style="text-align: center;">
          <th scope="row">{{ $index + 1 }}</th>
          <td>{{ $item->nim }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->ditujukan }}</td>
          <td>{{ $item->tugas_matkul }}</td>
          <td>{{ $item->alamat }}</td>
          <td>{{ $item->keperluan }}</td>
          <td>{{ $item->status }}</td>
        </tr>
        @endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection