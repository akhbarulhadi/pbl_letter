@extends('layouts.main')

@section('isi')
                        <div class="container-fluid">
                            <!-- Begin Page Content -->
                            <h1 id="judul">History Pengajuan<a href="{{ route('history_survey') }}"> Survey /</a><a href="{{ route('history_izin') }}"> Izin</a></h1>    
                            <br>
                        </div>
                                           <div class="container">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">History Pengajuan Survey</h5>
                                                        <div class="table-responsive">
                                                            <table class="table table-hover datatab">
                                                              <thead class="table-secondary">
                                                                <tr style="text-align: center;">
                                                                  <th scope="col">No</th>
                                                                  <th scope="col">Ditujukan Ke</th>
                                                                  <th scope="col">Alamat</th>
                                                                  <th scope="col">Tugas Mata Kuliah</th>
                                                                  <th scope="col">Detail</th>
                                                                  <th scope="col">Status</th>
                                                                  <th scope="col">Cetak</th>
                                                                </tr>
                                                              </thead>
                                                              @foreach ($history as $index => $data1)
                                                              <tbody>
                                                              <?php if($data1['status'] != 'Sedang Diproses' && $data1['status'] != 'Sedang Diajukan'): ?>
                                                              <tr style="text-align: center;">
                                                                  <th>{{ $index+1 }}</th>
                                                                  <th hidden>{{ $data1->id }}</th>
                                                                  <td>{{ $data1->ditujukan}}</td>
                                                                  <td>{{ $data1->alamat}}</td>
                                                                  <td>{{ $data1->tugas_matkul}}</td>
                                                                  <!-- button modal -->
                                                                  <td><button id="btn-f" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detail-survey">Detail</button></td>
                                                                  <td style=" color: <?php echo ($data1->status == 'Disetujui') ? '#00FF00; font-weight: bold;' : (($data1->status == 'Ditolak') ? 'red; font-weight: bold;' : 'yellow; font-weight: bold;'); ?>">{{ $data1->status}}</td>
                                                                  <td>
                                                                  <?php if($data1['status'] != 'Ditolak'):?>  
                                                                  <a href="{{ route('cetak_survey') }}" target="_blank" id="btn-f" class="btn btn-outline-success">Cetak</a></td>
                                                                  <?php endif; ?>
                                                                  <?php if($data1['status'] != 'Disetujui'):?> 
                                                                  <p>Tidak Tersedia</p> 
                                                                </tr>
                                                                <?php endif; ?>
                                                                <?php endif; ?>
                                                              </tbody>
                                                              @endforeach
                                                            </table>
                                                        </div>


                                                                <!-- Modal detail -->
                                                                <div class="modal fade" id="detail-survey" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail</h1>
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
                                                                                  <input type="text" class="form-control" id="ditujukan" name="ditujukan" disabled>
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
                                                     </div>
                                                </div>
                                           </div>
                                           
@endsection