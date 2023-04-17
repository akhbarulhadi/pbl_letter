@extends('layouts.main')

@section('isi')
                        <div class="container-fluid">   
                            <!-- Begin Page Content -->
                            <h1 id="judul">Profile</h1>
                            <br>
                        </div>
                            <div class="container">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <div class="container">
                                                <h2>Informasi Akun</h2>
                                                <form>
                                                  <div class="form-group">
                                                    <label for="nim">NIM:</label>
                                                    <input type="text" class="form-control" id="nim" placeholder="" name="nim" disabled>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="nama">Nama Lengkap:</label>
                                                    <input type="text" class="form-control" id="nama" placeholder="" name="nama" disabled>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="prodi">Program Studi:</label>
                                                    <input type="text" class="form-control" id="prodi" placeholder="" name="prodi" disabled>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="kelas">Kelas:</label>
                                                    <input type="text" class="form-control" id="kelas" placeholder="" name="kelas" disabled>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="dosen">Wali Dosen:</label>
                                                    <input type="text" class="form-control" id="dosen" placeholder="" name="dosen" disabled>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="email">Email:</label>
                                                    <input type="email" class="form-control" id="email" placeholder="" name="email">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="hp">Nomor HP:</label>
                                                    <input type="text" class="form-control" id="hp" placeholder="" name="hp">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="alamat">Alamat:</label>
                                                    <textarea class="form-control" id="alamat" placeholder="" name="alamat"></textarea>
                                                  </div>
                                                  <button id="btn-f" type="submit" class="btn btn-outline-primary">Ubah</button>
                                                  <hr>
                                                </form>
                                                <form>
                                                  <h2>Ubah Password</h2>
                                                  <div class="form-group">
                                                    <label for="password_lama">Password Lama:</label>
                                                    <input type="password" class="form-control" id="password_lama" placeholder="" name="password_lama">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="password_baru">Password Baru:</label>
                                                    <input type="password" class="form-control" id="password_baru" placeholder="Masukkan Password Baru" name="password_baru">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="konfirmasi_password_baru">Konfirmasi Password Baru:</label>
                                                    <input type="password" class="form-control" id="konfirmasi_password_baru" placeholder="Konfirmasi Password Baru" name="konfirmasi_password_baru">
                                                  </div>
                                                  <button id="btn-f" type="submit" class="btn btn-outline-primary">Ubah</button>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
@endsection