@extends('layouts.main')

@section('isi')
                        <div class="container-fluid">   
                            <!-- Begin Page Content -->
                            <h1 id="judul">Status Pengajuan<a href="{{ route('status_survey') }}"> Survey /</a><a href="{{ route('status_izin') }}"> Izin</a></h1>    
                            <br>
                        </div>
                                            <div class="container">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Status Pengajuan Izin</h5>
                                                        <div class="table-responsive">
                                                            <table class="table table-hover datatab">
                                                              <thead class="table-secondary">
                                                                <tr>
                                                                  <th scope="col">No</th>
                                                                  <th scope="col">Jenis Perizinan</th>
                                                                  <th scope="col">Tanggal mulai</th>
                                                                  <th scope="col">Tanggal Selesai</th>
                                                                  <th scope="col">Detail</th>
                                                                  <th scope="col">Aksi</th>
                                                                  <th scope="col">Status</th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                                <tr>
                                                                  <th scope="row">1</th>
                                                                  <td>Lembur</td>
                                                                  <td>11-12-2023</td>
                                                                  <td>12-12-2023</td>
                                                                  <!-- button modal -->
                                                                  <td><button id="btn-f" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detail-surat-izin">Detail</button></td>
                                                                  <td>
                                                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                      <button id="btn-f" type="button" class="btn btn-danger">Del</button>
                                                                      <button id="btn-f" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-surat-izin">Edit</button>
                                                                    </div>
                                                                  </td>
                                                                  <td>Sedang Diajukan</td>
                                                                </tr>
                                                                <tr>
                                                                  <th scope="row">2</th>
                                                                  <td>Sakit</td>
                                                                  <td>15-12-2023</td>
                                                                  <td>16-12-2023</td>
                                                                  <td><button id="btn-f" class="btn btn-outline-primary">Detail</button></td>
                                                                  <td>
                                                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                      <button id="btn-f" type="button" class="btn btn-danger">Del</button>
                                                                      <button id="btn-f" type="button" class="btn btn-warning">Edit</button>
                                                                    </div>
                                                                  </td>
                                                                  <td class="text-warning">Sedang Diproses</td>
                                                                </tr>
                                                              </tbody>
                                                            </table>
                                                        </div>


                                                                <!-- Modal detail -->
                                                                <div class="modal fade" id="detail-surat-izin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                   <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                                     <div class="modal-content">
                                                                       <div class="modal-header">
                                                                         <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Pengajuan Surat Izin</h1>
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
                                                                                              <input type="text" class="form-control" id="jenis_izin" name="jenis_izin" disabled>
                                                                                          </div>
                                                                                          <div class="form-group">
                                                                                                      <label for="tanggal_mulai">Tanggal Mulai</label>
                                                                                                      <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" disabled>
                                                                                          </div>
                                                                                          <div class="form-group">
                                                                                            <label for="tanggal_selesai">Tanggal Selesai</label>
                                                                                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" disabled>
                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="col-md-6">
                                                                                          <div class="form-group">
                                                                                              <label for="nama_wali_dosen">Nama Wali Dosen</label>
                                                                                              <input type="text" class="form-control" id="nama_wali_dosen" name="nama_wali_dosen" disabled>
                                                                                          </div>
                                                                                          <div class="form-group">
                                                                                              <label for="nama_orang_tua">Nama Orang Tua</label>
                                                                                              <input type="text" class="form-control" id="nama_orang_tua" name="nama_orang_tua" disabled>
                                                                                          </div>
                                                                                          <div class="form-group">
                                                                                              <label for="no_hp_orang_tua">Nomor HP Orang Tua</label>
                                                                                              <input type="text" class="form-control" id="no_hp_orang_tua" name="no_hp_orang_tua" disabled>
                                                                                          </div>
                                                                                          <div class="form-group">
                                                                                                <label for="bukti_persetujuan">Bukti Persetujuan Walidosen</label>
                                                                                                <button id="btn-f" class="btn btn-light">Download File</button>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="bukti_izin">Surat Bukti Izin/Sakit/Kerja/DLL</label>
                                                                                                <button id="btn-f" class="btn btn-light">Download File</button>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="surat-izin">Format Surat Izin</label><br>
                                                                                                <button id="btn-f" class="btn btn-light">Download File</button>
                                                                                            </div>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </form>
                                                                       </div>
                                                                       <div class="modal-footer">
                                                                         <button id="btn-f" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                       </div>
                                                                     </div>
                                                                   </div>
                                                               </div> 

                                                                <!-- Modal Edit -->
                                                                <div class="modal fade" id="edit-surat-izin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                   <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                                     <div class="modal-content">
                                                                       <div class="modal-header">
                                                                         <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Pengajuan Surat Izin</h1>
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
                                                                                                    <label for="bukti_persetujuan">Edit Bukti Persetujuan Walidosen</label>
                                                                                                    <input type="file" class="form-control-file" id="bukti-persetujuan" name="bukti-persetujuan" required>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label for="bukti_izin">Edit Surat Bukti Izin/Sakit/Kerja/DLL</label>
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
                                                                          
                                                                       </div>
                                                                                    <div class="modal-footer">
                                                                                      <button id="btn-f" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                      <button id="btn-f" type="submit" class="btn btn-primary">Ubah</button>
                                                                                    </div>
                                                                                </form>
                                                                     </div>
                                                                   </div>
                                                               </div>
                                                     </div>
                                                </div>
                                            </div>
                                           
@endsection