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
      <h5 class="card-title">History Pengajuan Izin</h5>
      <div class="table-responsive">
        <table class="table table-hover datatab">
          <thead class="table-secondary">
            <tr style="text-align: center;">
              <th scope="col">ID Surat Izin</th>
              <th scope="col">Jenis Perizinan</th>
              <th scope="col">Tanggal mulai</th>
              <th scope="col">Tanggal Selesai</th>
              <th scope="col">Detail</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($history_ad as $index => $history_izin)
            @if($history_izin['status'] != 'Sedang Diproses' && $history_izin['status'] != 'Sedang Diajukan')
            <tr style="text-align: center;">
              <th scope="row">{{ $history_izin->id_surat_izin }}</th>
              <td>{{ $history_izin->jenis_izin }}</td>
              <td>{{ $history_izin->tanggal_mulai }}</td>
              <td>{{ $history_izin->tanggal_selesai }}</td>
              <!-- button modal -->
              <td><button id="btn-f" type="button" class="btn btn-outline-primary btn-detail" data-bs-toggle="modal" data-bs-target="#detail-surat-izin-{{ $history_izin->id_surat_izin }}" data-id="{{ $history_izin->id_surat_izin }}">Detail</button></td>
              <td style=" color: <?php echo ($history_izin->status == 'Disetujui') ? '#00FF00; font-weight: bold;' : (($history_izin->status == 'Ditolak') ? 'red; font-weight: bold;' : 'yellow; font-weight: bold;'); ?>">{{ $history_izin->status}}</td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>


      <!-- Modal detail -->
      @foreach ($history_ad as $index => $detail_izin)
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
      </div>
      @endforeach

    </div>
  </div>
</div>



@endsection