@extends('layouts.main')

@section('isi')
<div class="container-fluid">
    <!-- Begin Page Content -->
    <h1 id="judul">Formulir Pengajuan<a href="{{ route('form_survey') }}"> Survey /</a><a href="{{ route('form_izin') }}"> Izin</a></h1>
    <br>
</div>
<div class="container">
    <!--card form izin-->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Formulir Pengajuan Izin</h5>
            @if(session()->has('Success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('Success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="/perizinan.store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div>
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
                                    <input type="hidden" class="form-control" value="{{ Auth::user()->id_mahasiswa }}" id="id_mahasiswa" name="id_mahasiswa" readonly>

                                </div>@else <input type="text" class="form-control" placeholder="NIM tidak terdeteksi, Silahkan Login Terlebih Dahulu!!" id="nim" name="nim" disabled>
                                @endauth
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->kelas }}" id="kelas" name="kelas" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_dosen">Nama Wali Dosen</label>
                                <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="{{ Auth::user()->nama_dosen }}" readonly>
                            </div>
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
                                <label for="jenis_izin">Jenis Izin</label>
                                <select class="form-select" id="jenis_izin1" name="jenis_izin" onchange="toggleInputText()" required>
                                    <option value="">Pilih Jenis Izin</option>
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
                                <a href="https://drive.google.com/uc?export=download&id=1hd-ciWI-GU0cWPPEIgsTO9ZEKrsLCLQA">Download Format Surat Izin</a></br>
                                <label for="format_surat_izin">Upload Format Surat Izin</label><br>
                                <input type="file" accept="application/pdf" class="form-control-file" id="format_surat_izin" name="format_surat_izin" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" formaction="{{ route('perizinan.store') }}" class="btn btn-outline-primary">Ajukan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection