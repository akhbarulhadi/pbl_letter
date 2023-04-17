@extends('layouts.main')

@section('isi')
    <div class="container-fluid">   
        <!-- Begin Page Content -->
        <h1 id="judul">Dashboard</h1><br><br><br>
                       <div class="container-fluid">
                           <!--card dashboard-->
                           <div class="row">
                               <div class="col-sm-6 mb-3 mb-sm-0">
                                 <div class="card">
                                   <div class="card-body">
                                     <h5 class="card-title">Pengajuan Survey</h5>
                                     <p class="card-text">Detail</p>
                                       <!--button modal-->
                                       <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#form-survey">
                                           <i class="fa fa-plus" id="logo-button" aria-hidden="true"></i>
                                       </button>
                                           <!-- Modal Survey -->
                                            <div class="modal fade" id="form-survey" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulir Pengajuan Survey</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                              <div class="modal-body">
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
                                                                
                                                              </div>
                                                                      <div class="modal-footer">
                                                                        <button id="btn-f" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button id="btn-f" type="submit" class="btn btn-primary">Ajukan</button>
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
                                     <p class="card-text">Detail</p>
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
                                                                              </div><br>
                                                                              <div class="form-group">
                                                                                  <label for="bukti_izin">Upload Surat Bukti Izin/Sakit/Kerja/DLL</label>
                                                                                  <input type="file" class="form-control-file" id="bukti-izin" name="bukti-izin" required>
                                                                              </div><br>
                                                                              <div class="form-group">
                                                                                  <label for="bukti_persetujuan">Upload Format Surat Izin</label><br>
                                                                                  <a href="#">Download Format</a>
                                                                                  <input type="file" class="form-control-file" id="format-izin" name="format-izin" required>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              
                                                          </div>
                                                                    <div class="modal-footer">
                                                                      <button id="btn-f" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                      <button id="btn-f" type="submit" class="btn btn-primary">Ajukan</button>
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

