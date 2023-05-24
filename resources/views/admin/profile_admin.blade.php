@extends('layouts.main_admin')
@section('isi_admin')
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
                                                    <label for="nik">NIK:</label>
                                                    @auth
                                                    <input type="text" class="form-control" id="nim" placeholder="{{ Auth::user()->nim }}" name="nik" onkeypress="return hanyaAngka(event)" required>
                                                    @else <input type="text" class="form-control" id="nim" placeholder="NIK tidak terdeteksi! Silahkan Login!!" name="nim" onkeypress="return hanyaAngka(event)" required>
                                                  </div>
                                                  @endauth
                                                  <div class="form-group">
                                                    <label for="nama">Nama Lengkap:</label>
                                                    @auth
                                                    <input type="text" class="form-control" id="nama" placeholder="{{ Auth::user()->name }}" name="nama" required>
                                                    @else <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap tidak terdeteksi! Silahkan Login!!" name="nama" required>
                                                  </div>
                                                  @endauth
                                                  <div class="form-group">
                                                    <label for="email">Email:</label>
                                                    @auth
                                                    <input type="email" class="form-control" id="email" placeholder="{{ Auth::user()->email }}" name="email" required>
                                                    @else <input type="email" class="form-control" id="email" placeholder="Email tidak terdeteksi! Silahkan Login!!" name="email" required>
                                                  </div>
                                                  @endauth
                                                  <div class="form-group">
                                                    <label for="hp">Nomor HP:</label>
                                                    @auth
                                                    <input type="text" class="form-control" id="hp" placeholder="{{ Auth::user()->nomor_hp }}" name="hp" onkeypress="return hanyaAngka(event)" required>
                                                    @else <input type="text" class="form-control" id="hp" placeholder="Nomor HP tidak terdeteksi! Silahkan Login!!" name="hp" onkeypress="return hanyaAngka(event)" required>
                                                  </div>
                                                  @endauth
                                                  </br>
                                                  <button id="btn-f" type="submit" class="btn btn-outline-primary">Ubah</button>
                                                  <hr>
                                                </form>
                                                <form>
                                                  <h2>Ubah Password</h2>
                                                  <div class="form-group">
                                                    <label for="password_lama">Password Lama:</label>
                                                    <input type="password" class="form-control" id="password_lama" placeholder="" name="password_lama" required>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="password_baru">Password Baru:</label>
                                                    <input type="password" class="form-control" id="password_baru" placeholder="Masukkan Password Baru" name="password_baru" required>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="konfirmasi_password_baru">Konfirmasi Password Baru:</label>
                                                    <input type="password" class="form-control" id="konfirmasi_password_baru" placeholder="Konfirmasi Password Baru" name="konfirmasi_password_baru" required>
                                                  </div>
                                                  <button id="btn-f" type="submit" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ubah</button>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
@endsection