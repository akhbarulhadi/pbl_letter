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
                                                        <h5 class="card-title">Status Pengajuan Survey</h5>
                                                        <div class="table-responsive">
                                                            <table class="table table-hover datatab">
                                                              @foreach ($survei as $form1)
                                                              <thead class="table-secondary">
                                                                <tr>
                                                                  <th scope="col">No</th>
                                                                  <th scope="col">Ditujukan Ke</th>
                                                                  <th scope="col">Alamat</th>
                                                                  <th scope="col">Tugas Mata Kuliah</th>
                                                                  <th scope="col">Detail</th>
                                                                  <th scope="col">Aksi</th>
                                                                  <th scope="col">Status</th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                                <tr>
                                                                  <th scope="row">1</th>
                                                                  <td>{{ $form1->ditujukan}}</td>
                                                                  <td>Alamat</td>
                                                                  <td>Matkul 1</td>
                                                                  <!-- button modal -->
                                                                  <td><button id="btn-f" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detail-survey">Detail</button></td>
                                                                  <td>
                                                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                      <button id="btn-f" type="button" class="btn btn-danger">Del</button>
                                                                      <button id="btn-f" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-survey">Edit</button>
                                                                    </div>
                                                                  </td>
                                                                  <td>Sedang Diajukan</td>
                                                                </tr>
                                                                @endforeach
                                                                <tr>
                                                                  <th scope="row">2</th>
                                                                  <td>Contoh 2</td>
                                                                  <td>Alamat</td>
                                                                  <td>Matkul</td>
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
                                                                <div class="modal fade" id="detail-survey" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Pengajuan Survey</h1>
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
                                                                                  <input type="text" class="form-control" id="ditujukan" name="ditujukan"disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                  <label for="alamat">Alamat Lengkap</label>
                                                                                  <input type="text" class="form-control" id="alamat" name="alamat" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                  <label for="matkul">Tugas Mata Kuliah</label>
                                                                                  <input type="text" class="form-control" id="matkul" name="matkul" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                  <label for="keperluan">Keperluan</label>
                                                                                  <textarea class="form-control" id="keperluan" name="keperluan" disabled></textarea>
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
                                                                <div class="modal fade" id="edit-survey" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Pengajuan Survey</h1>
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