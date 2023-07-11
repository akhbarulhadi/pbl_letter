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

            @if (session('EditSuccess'))
            <div class="alert alert-success">
                {{ session('EditSuccess') }}
            </div>
            @endif
            @if (session('IzinSuccess'))
            <div class="alert alert-success">
                {{ session('IzinSuccess') }}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover datatab">
                    <thead class="table-secondary">
                        <tr style="text-align: center;">
                            <th scope="col">ID Surat Izin</th>
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
                        @if ($data_izin->status != 'Disetujui' && $data_izin->status != 'Ditolak')
                        <tr style="text-align: center;">
                            <th>{{ $data_izin->id_surat_izin }}</th>
                            <td>{{ $data_izin->jenis_izin }}</td>
                            <td>{{ $data_izin->tanggal_mulai }}</td>
                            <td>{{ $data_izin->tanggal_selesai }}</td>
                            <!-- button modal -->
                            <td><button type="button" class="btn btn-outline-primary btn-detail" data-bs-toggle="modal" data-bs-target="#detail-surat-izin-{{ $data_izin->id_surat_izin }}" data-id="{{ $data_izin->id_surat_izin }}">Detail</button></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    @if ($data_izin->status != 'Disetujui' && $data_izin->status != 'Ditolak' && $data_izin->status != 'Sedang Diproses')
                                    <form action="{{ route('data.destroy', $data_izin->id_surat_izin) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data tersebut?')">Del</button>
                                    </form> &nbsp;
                                    <form>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-surat-izin-{{ $data_izin->id_surat_izin }}" data-id="{{ $data_izin->id_surat_izin }}">Edit</button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                            <td style="background-color: #D3D3D3; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5); <?php echo ($data_izin->status == 'Sedang Diproses') ? 'color: blue; font-weight: bold;' : (($data_izin->status == 'Disetujui') ? 'color: #7CFC00; font-weight: bold;' : (($data_izin->status == 'Ditolak') ? 'color: red; font-weight: bold;' : 'color: yellow; font-weight: bold;')); ?>">{{ $data_izin->status}}</td>
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
            </div> @endforeach




            <!-- Modal Edit -->
            @foreach ($izin as $index => $detail_edit)
            <div class="modal fade" id="edit-surat-izin-{{ $detail_edit->id_surat_izin }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Pengajuan Surat Izin</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('surat-izin.update', $detail_edit->id_surat_izin) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                @auth
                                                <input type="hidden" class="form-control" value="{{ Auth::user()->id_mahasiswa }}" id="id_mahasiswa" name="id_mahasiswa" readonly>

                                                @else <input type="text" class="form-control" placeholder="NIM tidak terdeteksi, Silahkan Login Terlebih Dahulu!!" id="nim" name="nim" disabled>
                                                @endauth
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nim">NIM</label>
                                                <input type="text" class="form-control" id="nim" name="nim" value="{{ Auth::user()->nim}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="kelas">Kelas</label>
                                                <input type="text" class="form-control" id="kelas" name="kelas" value="{{ Auth::user()->kelas}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_dosen">Nama Wali Dosen</label>
                                                <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="{{ Auth::user()->nama_dosen}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $detail_edit->tanggal_mulai }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ $detail_edit->tanggal_selesai }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jenis_izin">Jenis Izin</label>
                                                <select class="form-select" id="jenis_izin1" name="jenis_izin" onchange="toggleInputText()" required>
                                                    <option value="">Pilih Jenis Izin</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Keluarga">Keluarga</option>
                                                    <option value="Kerja">Kerja</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                                <input type="text" class="form-control d-none" id="jenis_izin_lainnya" name="jenis_izin_lainnya" placeholder="Jenis Izin Lainnya">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_ortu">Nama Orang Tua</label>
                                                <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" value="{{ $detail_edit->nama_ortu }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nomor_hp_ortu">Nomor HP Orang Tua</label>
                                                <input type="number" class="form-control" id="nomor_hp_ortu" name="nomor_hp_ortu" value="{{ $detail_edit->nomor_hp_ortu }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="bukti_waldos">Edit Bukti Persetujuan Walidosen</label>
                                                <input type="file" accept="image/png, image/jpg, img/jpeg" class="form-control-file" id="bukti_waldos" name="bukti_waldos">
                                            </div>
                                            <div class="form-group">
                                                <label for="bukti_izin">Edit Surat Bukti Izin/Sakit/Kerja/DLL</label>
                                                <input type="file" accept="image/png, image/jpg, img/jpeg" class="form-control-file" id="bukti_izin" name="bukti_izin">
                                            </div>
                                            <div class="form-group">
                                                <label for="format_surat_izin">Upload Format Surat Izin</label><br>
                                                <a href="https://drive.google.com/uc?export=download&id=1hd-ciWI-GU0cWPPEIgsTO9ZEKrsLCLQA">Download Format</a>
                                                <input type="file" accept="application/pdf" class="form-control-file" id="format_surat_izin" name="format_surat_izin">
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
            @endforeach
        </div>
    </div>
</div>



@endsection