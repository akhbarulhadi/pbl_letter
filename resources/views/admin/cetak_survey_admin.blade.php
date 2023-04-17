@extends('layouts.main_cetak')
@section('cetak')
<div class="form-group">
        <p class="text-dark text-center"><b>Laporan Data Survey</b></p>
        <div class="table-responsive">
                <table class="table table-bordered text-dark" align="center" style="width: 95%;">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">Ditujukan Ke</th>
                        <th scope="col">Tugas Mata Kuliah</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">Keperluan</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>4342211023</td>
                          <td>Mahasiswa 1</td>
                          <td>Contoh 1</td>
                          <td>Matkul 1</td>
                          <td>Alamat 1</td>
                          <td>Contoh 1</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>4342211021</td>
                          <td>Mahasiswa 2</td>
                          <td>Contoh 2</td>
                          <td>Matkul 2</td>
                          <td>Alamat 2</td>
                          <td>Contoh 2</td>
                        </tr>
                    </tbody>
                </table>
        </div>

</div>
@endsection