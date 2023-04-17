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
                            <form>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama" name="nama" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="nim">NIM</label>
                                                <input type="text" class="form-control" id="nim" name="nim" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="kelas">Kelas</label>
                                                <input type="text" class="form-control" id="kelas" name="kelas" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis_izin">Jenis Izin</label>
                                                <select class="form-select" id="jenis_izin1" name="jenis_izin" onchange="toggleInputText()" required>
                                                    <option value="">Pilih Jenis Izin</option>
                                                    <option value="sakit">Sakit</option>
                                                    <option value="keluarga">Keluarga</option>
                                                    <option value="lainnya">Lainnya</option>
                                                </select>
                                                    <input type="text" class="form-control d-none" id="jenis_izin_lainnya" name="jenis_izin_lainnya" placeholder="Jenis Izin Lainnya" required>
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
                                                <label for="nama_wali_dosen">Nama Wali Dosen</label>
                                                <input type="text" class="form-control" id="nama_wali_dosen" name="nama_wali_dosen" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_orang_tua">Nama Orang Tua</label>
                                                <input type="text" class="form-control" id="nama_orang_tua" name="nama_orang_tua" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="no_hp_orang_tua">Nomor HP Orang Tua</label>
                                                <input type="text" class="form-control" id="no_hp_orang_tua" name="no_hp_orang_tua" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="bukti_persetujuan">Upload Bukti Persetujuan Walidosen</label>
                                                <input type="file" class="form-control-file" id="bukti-persetujuan" name="bukti-persetujuan" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="bukti_izin">Upload Surat Bukti Izin/Sakit/Kerja/DLL</label>
                                                <input type="file" class="form-control-file" id="bukti-izin" name="bukti-izin" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="bukti_persetujuan">Upload Format Surat Izin</label><br>
                                                <a href="#">Download Format</a>
                                                <input type="file" class="form-control-file" id="format-izin" name="format-izin" required>
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

    