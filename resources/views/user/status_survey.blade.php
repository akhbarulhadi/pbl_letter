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
                                                        @if(session('SurveySuccess'))
    <div class="alert alert-success">
        {{ session('SurveySuccess') }}
    </div>
@endif
@if(session('SurveyHapus'))
    <div class="alert alert-danger">
        {{ session('SurveyHapus') }}
    </div>
@endif
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
                                                              @foreach ($survey as $index => $data1)
                                                              @if ($data1->status != 'Disetujui' && $data1->status != 'Ditolak')
                                                                <tr style="text-align: center;">
                                                                  <th>{{ $data1->id }}</th>
                                                                  <td>{{ $data1->ditujukan}}</td>
                                                                  <td>{{ $data1->alamat}}</td>
                                                                  <td>{{ $data1->tugas_matkul}}</td>
                                                                  <!-- button modal -->
                                                                  <td><button id="btn-f" type="button" class="btn btn-outline-primary btn-detail" data-bs-toggle="modal" data-bs-target="#detail-survey" data-id="{{ $data1->id }}">Detail</button></td>
                                                                  @if ($data1->status != 'Disetujui' && $data1->status != 'Ditolak' && $data1->status != 'Sedang Diproses')
                                                                  <td>
                                                                  <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                  <form action="{{ route('survey.destroy', $data1->id) }}" method="POST" style="display: inline;">
                                                                  @method('DELETE')
                                                                  @csrf
                                                                  <button id="btn-f" type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data tersebut?')">Del</button>
                                                                  </form> &nbsp;
                                                                  <form>
                                                                  <button id="btn-f" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-survey-{{ $data1->id }}" data-id="{{ $data1->id }}">Edit</button>
                                                                  </form>
                                                                </div>
                                                                  </td>
                                                                  @else <td>
                                                                  <p></p>
                                                                  </td>
                                                                  @endif
                                                                  <td style="background-color: #D3D3D3; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5); <?php echo ($data1->status == 'Sedang Diproses') ? 'color: blue; font-weight: bold;' : (($data1->status == 'Disetujui') ? 'color: blue; font-weight: bold;' : (($data1->status == 'Ditolak') ? 'color: red; font-weight: bold;' : 'color: yellow; font-weight: bold;')); ?>">{{ $data1->status}}</td>
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
                                                                                  <label for="name">Nama Lengkap</label>
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
                                                                                  <input type="text" class="form-control" id="keperluan" name="keperluan" disabled>
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


                                                               <!-- Modal Edit -->
                                                               @foreach ($survey as $index => $data_edit)
<div class="modal fade" id="edit-survey-{{ $data_edit->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Pengajuan Survey</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('survey.update', $data_edit->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-center"><b>Identitas:</b></p>
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim" value="{{ Auth::user()->nim}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="text-center"><b>Tujuan Surat:</b></p>
                                <div class="form-group">
                                    <label for="ditujukan">Ditujukan Ke</label>
                                    <input type="text" class="form-control" id="ditujukan" name="ditujukan" value="{{ $data_edit->ditujukan}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data_edit->alamat}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="tugas_matkul">Tugas Mata Kuliah</label>
                                    <input type="text" class="form-control" id="tugas_matkul" name="tugas_matkul" value="{{ $data_edit->tugas_matkul}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="keperluan">Keperluan</label>
                                    <input type="text" class="form-control" id="keperluan" name="keperluan" value="{{ $data_edit->keperluan}}" required>
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
@endforeach

                                           <script>
  document.addEventListener('DOMContentLoaded', function () {
    // Event listener for the Detail button
    const detailButtons = document.getElementsByClassName('btn-detail');
    Array.from(detailButtons).forEach(function (button) {
      button.addEventListener('click', function () {
        const surveyId = this.getAttribute('data-id');

        // Make an AJAX request to fetch the data
        fetch(`/data/detail/${surveyId}`)
          .then(response => response.json())
          .then(data => {
            // Update the modal content with the retrieved data
            document.getElementById('name').value = data.name;
            document.getElementById('nim').value = data.nim;
            document.getElementById('ditujukan').value = data.ditujukan;
            document.getElementById('alamat').value = data.alamat;
            document.getElementById('tugas_matkul').value = data.tugas_matkul;
            document.getElementById('keperluan').value = data.keperluan;
          })
          .catch(error => console.log(error));
      });
    });
  });
</script>

@endsection
