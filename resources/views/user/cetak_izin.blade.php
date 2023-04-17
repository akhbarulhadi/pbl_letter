@extends('layouts.main_cetak')
@section('cetak')
<div class="form-group">
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
                        <th scope="col">Tanggal selesai</th>
                        <th scope="col">Wali Dosen</th>
                        <th scope="col">Orang Tua</th>
                        <th scope="col">No HP Ortu</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>4342211023</td>
                          <td>Mahasiswa 1</td>
                          <td>Kelas 1</td>
                          <td>Lembur</td>
                          <td>11-12-2023</td>
                          <td>12-12-2023</td>
                          <td>Dosen 1</td>
                          <td>Ortu 1</td>
                          <td>Contoh 1</td>
                        </tr>
                    </tbody>
                </table>
        </div>

</div>
@endsection