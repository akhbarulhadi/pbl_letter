@extends('layouts.main_admin')

@section('isi_admin')
<div class="container-fluid">
  <!-- Begin Page Content -->
  <h1 id="judul">Dashboard</h1><br><br><br>
  <div class="container-fluid">
    <!--card dashboard-->
    <div class="row">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Verifikasi Survey</h5>
            <p class="card-text">Detail</p>
            <!--button modal-->
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#verifikasi-survey">
              <i class="fa fa-eye" id="logo-button" aria-hidden="true"></i>
            </button>
            <!-- Modal Survey -->
            <div class="modal fade" id="verifikasi-survey" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Verifikasi Pengajuan Survey</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  @if (session('success'))
                  <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
                  @endif
                  @if (session('error'))
                  <div class="alert alert-danger">
                    {{ session('error') }}
                  </div>
                  @endif
                  <div class="modal-body">
                    <div class="table-responsive">
                      <table class="table table-hover datatab">
                        <thead class="table-secondary">
                          <tr style="text-align: center;">
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
                          @foreach ($survey_ad as $index_ad => $data_ad)
                          @if ($data_ad->status != 'Disetujui' && $data_ad->status != 'Ditolak')
                          <tr style="text-align: center;">
                            <th>{{ $data_ad->id }}</th>
                            <td>{{ $data_ad->ditujukan }}</td>
                            <td>{{ $data_ad->alamat }}</td>
                            <td>{{ $data_ad->tugas_matkul }}</td>
                            <!-- button modal -->
                            <td>
                              <form action="{{ route('formpengajuan.inprogress', $data_ad->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button id="btn-f" type="submit" class="btn btn-outline-primary">Detail</button>
                              </form>
                              <button id="btn-f" type="button" class="btn btn-outline-primary btn-detail" style="display: none;" data-bs-toggle="modal" data-bs-target="#detail-survey" data-id="{{ $data_ad->id }}" data-status="{{ $data_ad->status }}">Detail</button>
                            </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <form action="{{ route('formpengajuan.rejected', $data_ad->id) }}" method="POST" style="display: inline;">
                                  @csrf
                                  <button type="submit" class="btn btn-danger">Tolak</button>
                                </form> &nbsp;
                                <form action="{{ route('formpengajuan.approved', $data_ad->id) }}" method="POST" style="display: inline;">
                                  @csrf
                                  <button type="submit" class="btn btn-success">Terima</button>
                                </form>
                              </div>
                            </td>
                            <td style="background-color: #D3D3D3; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5); <?php echo ($data_ad->status == 'Sedang Diproses') ? 'color: blue; font-weight: bold;' : (($data_ad->status == 'Disetujui') ? 'color: blue; font-weight: bold;' : (($data_ad->status == 'Ditolak') ? 'color: red; font-weight: bold;' : 'color: yellow; font-weight: bold;')); ?>">{{ $data_ad->status}}</td>
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>



                  </div>
                  <div class="modal-footer">
                    <button id="btn-f" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal detail -->
            <div class="modal fade" id="detail-survey" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#verifikasi-survey">Kembali</buuton>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Verifikasi Surat Izin</h5>
            <p class="card-text">Detail</p>
            <!--button modal-->
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#verifikasi-izin">
              <i class="fa fa-eye" id="logo-button" aria-hidden="true"></i>
            </button>
            <!-- Modal Izin -->
            <div class="modal fade" id="verifikasi-izin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Verifikasi Pengajuan Izin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="table-responsive">
                      <table class="table table-hover datatab">
                        <thead class="table-secondary">
                          <tr style="text-align: center;">
                            <th scope="col">No</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Jenis Perizinan</th>
                            <th scope="col">Tanggal mulai</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Aksi</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($survey_ad as $index => $data_izin)
                          @if ($data_izin->status != 'Disetujui' && $data_izin->status != 'Ditolak')
                          <tr style="text-align: center;">
                            <th scope="row">{{ $data_izin->id }}</th>
                            <td>{{ $data_izin->jenis_izin }}</td>
                            <td>{{ $data_izin->tanggal_mulai }}</td>
                            <td>{{ $data_izin->tanggal_selesai }}</td>
                            <!-- button modal -->
                            <td>
                              <form action="{{ route('formperizinan.inprogress', $data_izin->id) }}" method="POST" style="display: inline;">
                                @csrf

                                <button id="btn-f" type="submit" class="btn btn-outline-primary">Detail</button>
                              </form>
                              <button id="btn-f" type="button" class="btn btn-outline-primary btn-detail" style="display: none;" data-bs-toggle="modal" data-bs-target="#detail-surat-izin-{{ $data_izin->id }}" data-id="{{ $data_izin->id }}" data-status="{{ $data_izin->status }}">Detail</button>
                            </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <form action="{{ route('formperizinan.rejected', $data_izin->id) }}" method="POST" style="display: inline;">
                                  @csrf
                                  <button type="submit" class="btn btn-danger">Tolak</button>
                                </form> &nbsp;
                                <form action="{{ route('formperizinan.approved', $data_izin->id) }}" method="POST" style="display: inline;">
                                  @csrf
                                  <button type="submit" class="btn btn-success">Terima</button>
                                </form>
                              </div>
                            </td>
                            <td style="background-color: #D3D3D3; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5); <?php echo ($data_izin->status == 'Sedang Diproses') ? 'color: blue; font-weight: bold;' : (($data_izin->status == 'Disetujui') ? 'color: blue; font-weight: bold;' : (($data_izin->status == 'Ditolak') ? 'color: red; font-weight: bold;' : 'color: yellow; font-weight: bold;')); ?>">{{$data_izin->status}}</td>
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button id="btn-f" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal detail -->
            <div class="modal fade" id="detail-surat-izin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#verifikasi-izin">Kembali</buuton>
                  </div>
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