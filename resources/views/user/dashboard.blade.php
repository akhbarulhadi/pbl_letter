@extends('layouts.main')

@section('isi')
<div class="container-fluid">
  <!-- Begin Page Content -->
  <h1 id="judul">Dashboard</h1><br>@if(session()->has('FormSuccess'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('FormSuccess') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if(session()->has('Success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('Success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
  <br><br>
  <div class="container-fluid">
    <!--card dashboard-->
    <div class="row">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Pengajuan Surat Survey</h5>
            <!--button modal-->
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#form-survey">
              <i class="fa fa-plus" id="logo-button" aria-hidden="true"></i>
            </button>
            <!-- Modal Survey -->
            <div class="modal fade" id="form-survey" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulir Pengajuan Surat Survey</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="/form_pengajuan" method="POST">
                      @csrf
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-6">
                            <p class="text-center"><b>Identitas:</b></p>
                            <div class="form-group">
                              <label for="nama">Nama Lengkap</label>
                              @auth
                              <input type="text" class="form-control" value="{{ Auth::user()->name }}" id="name" name="name" readonly>

                            </div>@else <input type="text" class="form-control" placeholder="NIM tidak terdeteksi, Silahkan Login Terlebih Dahulu!!" id="nim" name="nim" disabled>
                            @endauth
                            <div class="form-group">
                              <label for="nim">NIM</label>
                              @auth
                              <input type="text" class="form-control" value="{{ Auth::user()->nim }}" id="nim" name="nim" readonly>

                            </div>@else <input type="text" class="form-control" placeholder="NIM tidak terdeteksi, Silahkan Login Terlebih Dahulu!!" id="nim" name="nim" disabled>
                            @endauth
                            <div class="form-group">
                              @auth
                              <input type="hidden" class="form-control" value="{{ Auth::user()->user_id }}" id="user_id" name="user_id" readonly>

                            </div>@else <input type="text" class="form-control" placeholder="NIM tidak terdeteksi, Silahkan Login Terlebih Dahulu!!" id="nim" name="nim" disabled>
                            @endauth
                          </div>
                          <div class="col-md-6">
                            <p class="text-center"><b>Tujuan Surat:</b></p>
                            <div class="form-group">
                              <label for="ditujukan">Ditujukan Ke</label>
                              <input type="text" autocomplete="off" class="form-control" id="ditujukan" name="ditujukan" required>
                            </div>
                            <div class="form-group">
                              <label for="alamat">Alamat Lengkap</label>
                              <textarea class="form-control" autocomplete="off" id="alamat" name="alamat" required></textarea>
                            </div>
                            <div class="form-group">
                              <label for="matkul">Tugas Mata Kuliah</label>
                              <input type="text" autocomplete="off" class="form-control" id="tugas_matkul" name="tugas_matkul" required>
                            </div>
                            <div class="form-group">
                              <label for="keperluan">Keperluan</label>
                              <textarea class="form-control" autocomplete="off" id="keperluan" name="keperluan" required></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ajukan</button>
                  </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Pengajuan Surat Izin</h5>
            <!--modal button-->
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#form-surat-izin">
              <i class="fa fa-plus" id="logo-button" aria-hidden="true"></i>
            </button>
            <!-- Modal Izin -->
            <div class="modal fade" id="form-surat-izin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulir Pengajuan Surat Izin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="/perizinan.store" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="name">Nama Lengkap</label>
                              <input type="text" class="form-control" value="{{ Auth::user()->name }}" id="name" name="name" readonly>
                            </div>
                            <div class="form-group">
                              <label for="nim">NIM</label>
                              <input type="text" class="form-control" value="{{ Auth::user()->nim }}" id="nim" name="nim" readonly>
                            </div>
                            <div class="form-group">
                              <label for="kelas">Kelas</label>
                              <input type="text" class="form-control" value="{{ Auth::user()->kelas }}" id="kelas" name="kelas" readonly>
                            </div>
                            <div class="form-group">
                              <label for="nama_dosen">Nama Wali Dosen</label>
                              @auth
                              <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="{{ Auth::user()->nama_dosen }}" readonly>
                            </div>@endauth

                            <div class="form-group">
                              <label for="tanggal_mulai">Tanggal Mulai</label>
                              <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                            </div>
                            <div class="form-group">
                              <label for="tanggal_selesai">Tanggal Selesai</label>
                              <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="jenis_izin">Keperluan</label>
                              <select class="form-select" id="jenis_izin" name="jenis_izin" onchange="toggleInputText()" required>
                                <option value="">Pilih Izin</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Keluarga">Keluarga</option>
                                <option value="Kerja">Kerja</option>
                                <option value="lainnya">Lainnya</option>
                              </select>
                              <input type="text" class="form-control d-none" id="jenis_izin_lainnya" name="jenis_izin_lainnya" placeholder="Jenis Izin Lainnya">
                            </div>
                            <div class="form-group">
                              <label for="nama_ortu">Nama Orang Tua</label>
                              <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" required>
                            </div>
                            <div class="form-group">
                              <label for="nomor_hp_ortu">Nomor HP Orang Tua</label>
                              <input type="number" class="form-control" id="nomor_hp_ortu" name="nomor_hp_ortu" required>
                            </div>
                            <div class="form-group">
                              <label for="bukti_waldos">Upload Bukti Persetujuan Walidosen</label>
                              <input type="file" accept="image/png, image/jpg, img/jpeg" class="form-control-file" id="bukti_waldos" name="bukti_waldos" required>
                            </div>
                            <div class="form-group">
                              <label for="bukti_izin">Upload Surat Bukti Izin/Sakit/Kerja/DLL</label>
                              <input type="file" accept="image/png, image/jpg, img/jpeg" class="form-control-file" id="bukti_izin" name="bukti_izin" required>
                            </div>
                            <div class="form-group">
                              <label for="format_surat_izin">Upload Format Surat Izin</label><br>
                              <a href="https://drive.google.com/uc?export=download&id=1hd-ciWI-GU0cWPPEIgsTO9ZEKrsLCLQA">Download Format</a>
                              <input type="file" accept="application/pdf" class="form-control-file" id="format_surat_izin" name="format_surat_izin" required>
                            </div>
                          </div>
                        </div>
                      </div>

                  </div>
                  <div class="modal-footer">
                    <button id="btn-f" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" formaction="{{ route('perizinan.store') }}" class="btn btn-outline-primary">Ajukan</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection