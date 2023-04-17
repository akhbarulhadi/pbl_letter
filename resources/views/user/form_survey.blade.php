@extends('layouts.main')

@section('isi')
                        <div class="container-fluid">   
                            <!-- Begin Page Content -->
                            <h1 id="judul">Formulir Pengajuan<a href="{{ route('form_survey') }}"> Survey /</a><a href="{{ route('form_izin') }}"> Izin</a></h1>
                            <br>
                        </div>
                            <div class="container">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Formulir Pengajuan Survey</h5>
                                                    <form>
                                                      <div class="container-fluid">
                                                        <div class="row">
                                                          <div class="col-md-6">
                                                            <p class="text-center"><b>Identitas:</b></p>
                                                            <div class="form-group">
                                                              <label for="nama">Nama Lengkap</label>
                                                              <input type="text" class="form-control" id="nama" name="nama" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="nim">NIM</label>
                                                              <input type="text" class="form-control" id="nim" name="nim" disabled>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <p class="text-center"><b>Tujuan Surat:</b></p>
                                                            <div class="form-group">
                                                              <label for="ditujukan">Ditujukan Ke</label>
                                                              <input type="text" class="form-control" id="ditujukan" name="ditujukan" required>
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="alamat">Alamat Lengkap</label>
                                                              <input type="text" class="form-control" id="alamat" name="alamat" required>
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="matkul">Tugas Mata Kuliah</label>
                                                              <input type="text" class="form-control" id="matkul" name="matkul" required>
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="keperluan">Keperluan</label>
                                                              <textarea class="form-control" id="keperluan" name="keperluan" required></textarea>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="text-center">
                                                        <button id="btn-f" type="submit" class="btn btn-outline-primary">Ajukan</button>
                                                      </div>
                                                    </form>
                                    </div>
                                </div>
                            </div>                 
@endsection