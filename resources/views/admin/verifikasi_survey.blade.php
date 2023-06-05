@extends('layouts.main_admin')

@section('isi_admin')                        
                        <div class="container-fluid">   
                            <!-- Begin Page Content -->
                            <h1 id="judul">Verifikasi Pengajuan<a href="{{ route('verifikasi_survey') }}"> Survey /</a><a href="{{ route('verifikasi_izin') }}"> Izin</a></h1>
                            <br>
                        </div>
                                            <div class="container">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Verifikasi Pengajuan Survey</h5> 
                                                        @if (session('success'))
                                                        <div class="alert alert-success">
                                                        {{ session('success') }}
                                                        </div>
                                                        @endif 
                                                        <form action="" method="GET">
                                                        <div class="input-group mb-3">
                                                        <input type="search" name="search" class="form-control" placeholder="Cari data..." value="{{ old('search') }}">
                                                        <button class="btn btn-primary" type="submit">Cari</button>
                                                        </div>
                                                        </form>                                                      
                                                        <div class="table-responsive">
                                                            <table class="table table-hover datatab">
                                                              <thead class="table-secondary">
                                                                <tr style="text-align: center;">
                                                                  <th scope="col">No</th>
                                                                  <th scope="col">NIM</th>
                                                                  <th scope="col">Ditujukan Ke</th>
                                                                  <th scope="col">Tugas Mata Kuliah</th>
                                                                  <th scope="col">Detail</th>
                                                                  <th scope="col">Aksi</th>
                                                                  <th scope="col">Status</th>
                                                                </tr>
                                                              </thead>
                                                              @foreach ($survey_ad as $index => $data_ad)
                                                              <tbody>
                                                                <tr style="text-align: center;">
                                                                  <th>{{ $index+1 }}</th>
                                                                  <th hidden>{{ $data_ad->id }}</th>
                                                                  <td>{{ $data_ad->nim}}</td>
                                                                  <td>{{ $data_ad->ditujukan}}</td>
                                                                  <td>{{ $data_ad->tugas_matkul}}</td>
                                                                  <!-- button modal -->
                                                                  <td>
                                                                    <button id="btn-f" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detail-survey">Detail</button></td>
                                                                  <td>
                                                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                    <form action="{{ route('formpengajuan.rejected', $data_ad->id) }}" method="POST" style="display: inline;">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger">Tolak</button>
                                                                    </form>
                                                                    <form action="{{ route('formpengajuan.approved', $data_ad->id) }}" method="POST" style="display: inline;">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-success">Terima</button>
                                                                    </form>
                                                                    </div>
                                                                  </td>
                                                                  <td style="background-color: #D3D3D3; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5); color: <?php echo ($data_ad->status == 'Disetujui') ? 'blue; font-weight: bold;' : (($data_ad->status == 'Ditolak') ? 'red; font-weight: bold;' : 'yellow; font-weight: bold;'); ?>">{{ $data_ad->status}}</td>
                                                                </tr>
                                                              </tbody>
                                                              @endforeach
                                                            </table>

                                                            <!-- Modal detail -->
                                                            <div class="modal fade" id="detail-survey" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Pengajuan Survey</h1>
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
@endsection