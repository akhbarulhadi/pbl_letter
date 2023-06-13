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
                                                        @foreach ($survey as $index => $data1)
                                                              @if ($data1->status != 'Disetujui' && $data1->status != 'Ditolak')
                                                        <div class="table-responsive">
                                                            <table class="table table-hover datatab">
                                                              <thead class="table-secondary">
                                                                <tr style="text-align: center;">
                                                                  <th scope="col">Id Surat Survey</th>
                                                                  <th scope="col">Ditujukan Ke</th>
                                                                  <th scope="col">Alamat</th>
                                                                  <th scope="col">Tugas Mata Kuliah</th>
                                                                  <th scope="col">Detail</th>
                                                                  <th scope="col">Aksi</th>
                                                                  <th scope="col">Status</th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                              
                                                                <tr style="text-align: center;">
                                                                  <th>{{ $data1->id }}</th>
                                                                  <td>{{ $data1->ditujukan}}</td>
                                                                  <td>{{ $data1->alamat}}</td>
                                                                  <td>{{ $data1->tugas_matkul}}</td>
                                                                  <!-- button modal -->
                                                                  <td><button id="btn-f" type="button" class="btn btn-outline-primary btn-detail" data-bs-toggle="modal" data-bs-target="#detail-survey" data-id="{{ $data1->id }}">Detail</button></td>
                                                                  <td>
                                                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                      <button id="btn-f" type="button" class="btn btn-danger">Del</button>
                                                                      <button id="btn-f" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-survey">Edit</button>
                                                                    </div>
                                                                  </td>
                                                                  <td style="background-color: #D3D3D3; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5); color: <?php echo ($data1->status == 'Disetujui') ? 'blue; font-weight: bold;' : (($data1->status == 'Ditolak') ? 'red; font-weight: bold;' : 'yellow; font-weight: bold;' ); ?>">{{ $data1->status}}</td>
                                                                </tr>
                                                                
                                                                @endif
                                                                @endforeach
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
                                                                      <div class="modal-body" id="detailContainer">
                                                                      <div class="modal-body" id="detailContainer">
                                                                        <form>
                                                                          <div class="container-fluid">
                                                                            <div class="row">
                                                                              <div class="col-md-6">
                                                                                <p class="text-center"><b>Identitas:</b></p>
                                                                                <div class="form-group">
                                                                                  <label for="nama">Nama Lengkap</label>
                                                                                  <input type="text" class="form-control" id="name" name="name" value="{{ $data1->name }}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                  <label for="nim">NIM</label>
                                                                                  <input type="text" class="form-control" id="nim" name="nim" value="{{ $data1->nim }}" disabled>
                                                                                </div>
                                                                              </div>
                                                                              <div class="col-md-6">
                                                                                <p class="text-center"><b>Tujuan Surat:</b></p>
                                                                                <div class="form-group">
                                                                                  <label for="ditujukan">Ditujukan Ke</label>
                                                                                  <input type="text" class="form-control" id="ditujukan" name="ditujukan" value="{{ $data1->ditujukan }}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                  <label for="alamat">Alamat Lengkap</label>
                                                                                  <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data1->alamat }}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                  <label for="matkul">Tugas Mata Kuliah</label>
                                                                                  <input type="text" class="form-control" id="tugas_matkul" name="tugas_matkul" value="{{ $data1->tugas_matkul }}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                  <label for="keperluan">Keperluan</label>
                                                                                  <input class="form-control" id="keperluan" name="keperluan" value="{{ $data1->keperluan }}" disabled>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                          </div>
                                                                        </form>
                                                                      </div>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                        <button id="btn-f" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                                @endforeach
                                                                @if ($survey->isEmpty())
                                                                    <p>Tidak ada data</p>
                                                                @endif

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
                                                                                  <label for="name">Nama Lengkap</label>
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
                                           <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ambil semua tombol detail
        var detailButtons = document.querySelectorAll(".btn-detail");

        // Tambahkan event listener ke setiap tombol detail
        detailButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                var id = button.getAttribute("data-id");

                // Ambil data dari API atau sumber data lainnya
                fetch("/data/detail/" + id)
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (data) {
                        // Tampilkan data dalam modal
                        var id = document.getElementById("id");
                        var user_id = document.getElementById("user_id");
                        var name = document.getElementById("name");
                        var nim = document.getElementById("nim");
                        var ditujukan = document.getElementById("ditujukan");
                        var alamat = document.getElementById("alamat");
                        var tugas_matkul = document.getElementById("tugas_matkul");
                        var keperluan = document.getElementById("keperluan");

                        id.value = data.id;
                        user_id.value = data.user_id;
                        name.value = data.name;
                        nim.value = data.nim;
                        ditujukan.value = data.ditujukan;
                        alamat.value = data.alamat;
                        tugas_matkul.value = data.tugas_matkul;
                        keperluan.value = data.keperluan;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });
        });
    });
</script>
@endsection
