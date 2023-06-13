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
                                                              @foreach ($izin as $index => $data_izin)
                                                                <tr>
                                                                  <th scope="row">{{ $data_izin->id }}</th>
                                                                  <td>{{ $data_izin->jenis_izin }}</td>
                                                                  <td>{{ $data_izin->bukti_waldos }}</td>
                                                                  <td>{{ $data_izin->tanggal_mulai }}</td>
                                                                  <td>{{ $data_izin->tanggal_selesai }}</td>
                                                                  <!-- button modal -->
                                                                  <td><button type="button" class="btn btn-outline-primary btn-detail" data-bs-toggle="modal" data-bs-target="#detail-surat-izin" data-id="{{ $data_izin->id }}">Detail</button></td>
                                                                  <td>
                                                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                      <button type="button" class="btn btn-danger">Del</button>
                                                                      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-surat-izin">Edit</button>
                                                                    </div>
                                                                  </td>
                                                                  <td>Sedang Diajukan</td>
                                                                </tr>
                                                                @endforeach
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
                                                                                              <label for="name">Nama Lengkap</label>
                                                                                              <input type="text" class="form-control" id="name" name="name" disabled>
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
                                                                                              <input type="text" class="form-control" id="jenis_izin" name="jenis_izin" disabled value="{{ $data_izin->jenis_izin }}">
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
                                                                                              <label for="nama_dosen">Nama Wali Dosen</label>
                                                                                              <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" disabled>
                                                                                          </div>
                                                                                          <div class="form-group">
                                                                                              <label for="nama_ortu">Nama Orang Tua</label>
                                                                                              <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" disabled>
                                                                                          </div>
                                                                                          <div class="form-group">
                                                                                              <label for="nomor_hp_ortu">Nomor HP Orang Tua</label>
                                                                                              <input type="text" class="form-control" id="nomor_hp_ortu" name="nomor_hp_ortu" disabled>
                                                                                          </div>
                                                                                          <div class="form-group">
    <label for="bukti_waldos">Bukti Persetujuan Walidosen</label>
    <img id="bukti_waldos" src="{{ asset('storage/' . $data_izin->bukti_waldos) }}" alt="Bukti Waldos">
    <a href="{{ asset('storage/' . $data_izin->bukti_waldos) }}" target="_blank" class="btn btn-light">Preview File</a>
    <a href="{{ asset('storage/' . $data_izin->bukti_waldos) }}" target="_blank" class="btn btn-light">Download File</a>
</div>
                                                                                            <div class="form-group">
                                                                                               <label for="bukti_izin">Surat Bukti Izin/Sakit/Kerja/DLL</label>
                                                                                               <img class="img-fluid" src="{{ asset('storage/' . $data_izin->bukti_izin) }}" alt="Bukti Izin">
                                                                                               <a href="{{ asset('storage/' . $data_izin->bukti_izin) }}" target="_blank" class="btn btn-light">Preview File</a> 
                                                                                               <a href="{{ asset('storage/' . $data_izin->bukti_izin) }}" target="_blank" class="btn btn-light">Download File</a>
                                                                                               </div>
                                                                                            <div class="form-group">
                                                                                                <label for="format_surat_izin">Format Surat Izin</label><br>
                                                                                                <img class="img-fluid" src="{{ asset('storage/' . $data_izin->format_surat_izin) }}" alt="Format Surat Izin">
                                                                                               <a href="{{ asset('storage/' . $data_izin->format_surat_izin) }}" target="_blank" class="btn btn-light">Preview File</a> 
                                                                                               <a href="{{ asset('storage/' . $data_izin->format_surat_izin) }}" target="_blank" class="btn btn-light">Download File</a>
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
                                                                                                    <label for="nama_waldos">Nama Wali Dosen</label>
                                                                                                    <input type="text" class="form-control" id="nama_waldos" name="nama_waldos" required>
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
                    var kelas = document.getElementById("kelas");
                    var jenis_izin = document.getElementById("jenis_izin");
                    var tanggal_mulai = document.getElementById("tanggal_mulai");
                    var tanggal_selesai = document.getElementById("tanggal_selesai");
                    var nama_dosen = document.getElementById("nama_dosen");
                    var nama_ortu = document.getElementById("nama_ortu");
                    var nomor_hp_ortu = document.getElementById("nomor_hp_ortu");
                    var bukti_waldos = document.getElementById("bukti_waldos");
                    var bukti_izin = document.getElementById("bukti_izin");
                    var format_surat_izin = document.getElementById("format_surat_izin");

                    name.value = data.name;
                    nim.value = data.nim;
                    kelas.value = data.kelas;
                    jenis_izin.value = data.jenis_izin;
                    tanggal_mulai.value = data.tanggal_mulai;
                    tanggal_selesai.value = data.tanggal_selesai;
                    nama_dosen.value = data.nama_dosen;
                    nama_ortu.value = data.nama_ortu;
                    nomor_hp_ortu.value = data.nomor_hp_ortu;
                    bukti_waldos.src = "{{ asset('storage/images/') }}" + encodeURIComponent(data.bukti_waldos);
                    bukti_izin.src = data.bukti_izin;
                    format_surat_izin.src = data.format_surat_izin;
                  
                    var detailModal = document.getElementById("detail-surat-izin");
                    var bootstrapModal = bootstrap.Modal.getInstance(detailModal);
                    bootstrapModal.show();
                
                  })
                .catch(function (error) {
                    console.log(error);
                });
        });
    });
});
</script>
                                           
@endsection
