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
                                                    <label for="nik">NIK</label>
                                                    <input type="text" class="form-control" id="nik" placeholder="" name="nik" onkeypress="return hanyaAngka(event)" required>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="nama">Nama Lengkap:</label>
                                                    <input type="text" class="form-control" id="nama" placeholder="" name="nama" required>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="email">Email:</label>
                                                    <input type="email" class="form-control" id="email" placeholder="" name="email" required>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="hp">Nomor HP:</label>
                                                    <input type="text" class="form-control" id="hp" placeholder="" name="hp" onkeypress="return hanyaAngka(event)" required>
                                                  </div>
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