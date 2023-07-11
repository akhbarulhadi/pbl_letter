@extends('layouts.main_admin')

@section('isi_admin')
`<div class="container-fluid">
    <!-- Begin Page Content -->
    <h1 id="judul">Verifikasi Pengajuan<a href="{{ route('verifikasi_survey') }}"> Survey /</a><a href="{{ route('verifikasi_izin') }}"> Izin</a></h1>
    <br>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Verifikasi Pengajuan Izin</h5>
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
            <div class="table-responsive">
                <table class="table table-hover datatab">
                    <thead class="table-secondary">
                        <tr style="text-align: center;">
                            <th scope="col">ID Surat Izin</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Jenis Perizinan</th>
                            <th scope="col">Tanggal mulai</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Aksi</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($izin as $index => $data_izin)
                        @if ($data_izin->status != 'Disetujui' && $data_izin->status != 'Ditolak')
                        <tr tr style="text-align: center;">
                            <th scope="row">{{ $data_izin->id_surat_izin }}</th>
                            <td>{{ $data_izin->nim }}</td>
                            <td>{{ $data_izin->jenis_izin }}</td>
                            <td>{{ $data_izin->tanggal_selesai }}</td>
                            <!-- button modal -->
                            <td>
                                <form action="{{ route('formperizinan.inprogress', $data_izin->id_surat_izin) }}" method="POST" style="display: inline;">
                                    @csrf

                                    <button id="btn-f" type="submit" class="btn btn-outline-primary">Detail</button>
                                </form>
                                <button id="btn-f" type="button" class="btn btn-outline-primary btn-detail" style="display: none;" data-bs-toggle="modal" data-bs-target="#detail-surat-izin-{{ $data_izin->id_surat_izin }}" data-id="{{ $data_izin->id_surat_izin }}" data-status="{{ $data_izin->status }}">Detail</button>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <form action="{{ route('formperizinan.rejected', $data_izin->id_surat_izin) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Tolak</button>
                                    </form> &nbsp;
                                    <form action="{{ route('formperizinan.approved', $data_izin->id_surat_izin) }}" method="POST" style="display: inline;">
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


            <!-- Modal detail -->
            @foreach ($izin as $index => $detail_izin)
            <div class="modal fade" id="detail-surat-izin-{{ $detail_izin->id_surat_izin }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Pengajuan Surat Izin</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        @if (session('success2'))
                        <div class="alert alert-success">
                            {{ session('success2') }}
                        </div>
                        @endif
                        <div class="modal-body">
                            <form>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $detail_izin->name }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="nim">NIM</label>
                                                <input type="text" class="form-control" id="nim" name="nim" value="{{ $detail_izin->nim }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="kelas">Kelas</label>
                                                <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $detail_izin->kelas }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis_izin">Jenis Izin</label>
                                                <input type="text" class="form-control" id="jenis_izin" name="jenis_izin" value="{{ $detail_izin->jenis_izin }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $detail_izin->tanggal_mulai }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ $detail_izin->tanggal_selesai }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_dosen">Nama Wali Dosen</label>
                                                <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="{{ $detail_izin->nama_dosen }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_ortu">Nama Orang Tua</label>
                                                <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" value="{{ $detail_izin->nama_ortu }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="nomor_hp_ortu">Nomor HP Orang Tua</label>
                                                <input type="text" class="form-control" id="nomor_hp_ortu" name="nomor_hp_ortu" value="{{ $detail_izin->nomor_hp_ortu }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="bukti_waldos">Bukti Persetujuan Walidosen</label>
                                                <img class="img-fluid" id="bukti_waldos" src="{{ asset('storage/' . $detail_izin->bukti_waldos) }}" alt="Bukti Waldos">
                                                <a href="{{ asset('storage/' . $detail_izin->bukti_waldos) }}" target="_blank" class="btn btn-light">Preview File</a>
                                                <a href="{{ asset('storage/' . $detail_izin->bukti_waldos) }}" download target="_blank" class="btn btn-light">Download File</a>
                                            </div>
                                            <div class="form-group">
                                                <label for="bukti_izin">Surat Bukti Izin/Sakit/Kerja/DLL</label>
                                                <img class="img-fluid" id="bukti_izin" src="{{ asset('storage/' . $detail_izin->bukti_izin) }}" alt="Bukti Izin">
                                                <a href="{{ asset('storage/' . $detail_izin->bukti_izin) }}" target="_blank" class="btn btn-light">Preview File</a>
                                                <a href="{{ asset('storage/' . $detail_izin->bukti_izin) }}" download target="_blank" class="btn btn-light">Download File</a>
                                            </div>
                                            <div class="form-group">
                                                <label for="format_surat_izin">Format Surat Izin</label><br>
                                                <iframe id="format_surat_izin" src="{{ asset('storage/' . $detail_izin->format_surat_izin) }}" width="100%" height="500px"></iframe>
                                                <a href="{{ asset('storage/' . $detail_izin->format_surat_izin) }}" target="_blank" class="btn btn-light">Preview File</a>
                                                <a href="{{ asset('storage/' . $detail_izin->format_surat_izin) }}" download target="_blank" class="btn btn-light">Download File</a>
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
            @endforeach
            
            </div>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Ambil semua tombol detail
                    var detailButtons = document.querySelectorAll(".btn-detail");

                    // Tambahkan event listener ke setiap tombol detail
                    detailButtons.forEach(function(button) {
                        button.addEventListener("click", function() {
                            var id = button.getAttribute("data-id");
                            var status = button.getAttribute("data-status");

                            // Ambil data dari API atau sumber data lainnya
                            fetch("/data/detail/ad/" + id)
                                .then(function(response) {
                                    return response.json();
                                })
                                .then(function(data) {
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
                                    bukti_waldos.src = "{{ asset('storage/') }}/" + encodeURIComponent(data.bukti_waldos);
                                    bukti_izin.src = "{{ asset('storage/') }}/" + encodeURIComponent(data.bukti_izin);
                                    format_surat_izin.src = "{{ asset('storage/') }}/" + encodeURIComponent(data.format_surat_izin);

                                    var detailModal = document.getElementById("detail-surat-izin");
                                    var bootstrapModal = bootstrap.Modal.getInstance(detailModal);
                                    bootstrapModal.show();

                                })
                                .catch(function(error) {
                                    console.log(error);
                                });
                        });
                        var modalId = "{{ session('modalId') }}";
                        if (modalId && button.getAttribute("data-id") === modalId) {
                            // Klik tombol detail secara otomatis
                            button.click();
                        }
                    });
                });
            </script>
            <script>
                function previewImage(imageId) {
                    var image = document.getElementById(imageId);
                    var imageUrl = image.getAttribute('src');
                    var newWindow = window.open("", "_blank");
                    newWindow.document.write("<img src='" + imageUrl + "' alt='Preview Image' style=' max-width: 100%; display:block; height: auto; margin-left: auto; margin-right: auto;'>");
                }
            </script>
            @endsection