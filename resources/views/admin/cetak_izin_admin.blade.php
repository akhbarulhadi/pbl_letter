@extends('layouts.main_cetak')

@section('cetak')
<div class="form-group"></br>
  <p class="text-dark text-center"><b>Laporan Data Izin</b></p>
  <div class="table-responsive">
    <table class="table table-bordered text-dark" align="center" style="width: 95%;">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">NIM</th>
          <th scope="col">NAMA</th>
          <th scope="col">Kelas</th>
          <th scope="col">Jenis Izin</th>
          <th scope="col">Tanggal Mulai</th>
          <th scope="col">Tanggal Selesai</th>
          <th scope="col">Wali Dosen</th>
          <th scope="col">Orang Tua</th>
          <th scope="col">No HP Ortu</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data2 as $index => $item)
        @if ($item->status != 'Sedang Diajukan' && $item->status != 'Sedang Diproses')
        <tr>
          <th scope="row">{{ $index + 1 }}</th>
          <td>{{ $item->nim }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->kelas }}</td>
          <td>{{ $item->jenis_izin }}</td>
          <td>{{ $item->tanggal_mulai }}</td>
          <td>{{ $item->tanggal_selesai }}</td>
          <td>{{ $item->nama_dosen }}</td>
          <td>{{ $item->nama_ortu }}</td>
          <td>{{ $item->nomor_hp_ortu }}</td>
          <td>{{ $item->status }}</td>
        </tr>
        @endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection