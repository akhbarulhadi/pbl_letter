@extends('layouts.main_admin')

@section('isi_admin')
                        <div class="container-fluid"> 
                            <!-- Begin Page Content -->
                            <h1 id="judul">History Pengajuan<a href="{{ route('history_survey_admin') }}"> Survey /</a><a href="{{ route('history_izin_admin') }}"> Izin</a></h1>    
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
                                                                  <th scope="col">Id Surat Survey</th>
                                                                  <th scope="col">NIM</th>
                                                                  <th scope="col">Ditujukan Ke</th>
                                                                  <th scope="col">Tugas Mata Kuliah</th>
                                                                  <th scope="col">Detail</th>
                                                                  <th scope="col">Status</th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                              @foreach ($history_ad as $index => $data_ad)
                                                              @if($data_ad['status'] != 'Sedang Diproses' && $data_ad['status'] != 'Sedang Diajukan')
                                                                <tr style="text-align: center;">
                                                                  <th>{{ $data_ad->id }}</th>
                                                                  <td>{{ $data_ad->nim}}</td>
                                                                  <td>{{ $data_ad->ditujukan}}</td>
                                                                  <td>{{ $data_ad->tugas_matkul}}</td>
                                                                  <!-- button modal -->
                                                                  <td><button id="btn-f" type="button" class="btn btn-outline-primary btn-detail" data-bs-toggle="modal" data-bs-target="#detail-survey" data-id="{{ $data_ad->id }}">Detail</button></td>
                                                                  <td style="background-color: #D3D3D3; text-shadow: 0px 0px 1px rgba(0, 0, 0, 5); color: <?php echo ($data_ad->status == 'Disetujui') ? '#00FF00; font-weight: bold;' : (($data_ad->status == 'Ditolak') ? 'red; font-weight: bold;' : 'yellow; font-weight: bold;'); ?>">{{ $data_ad->status}}</td>
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
                                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Pengajuan</h1>
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
                                                                                  <input type="text" class="form-control" id="name" name="name" disabled>
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
                                                                                  <label for="tugas_matkul">Tugas Mata Kuliah</label>
                                                                                  <input type="text" class="form-control" id="tugas_matkul" name="tugas_matkul" disabled>
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
                        var name = document.getElementById("name");
                        var nim = document.getElementById("nim");
                        var ditujukan = document.getElementById("ditujukan");
                        var alamat = document.getElementById("alamat");
                        var tugas_matkul = document.getElementById("tugas_matkul");
                        var keperluan = document.getElementById("keperluan");

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