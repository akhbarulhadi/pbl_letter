@extends('layouts.main')

@section('isi')
<div class="container-fluid">
  <!-- Begin Page Content -->
  <h1 id="judul">Profile</h1>
  <br>
</div>
<div class="card-body">
  @if (session('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
  @endif
  <div class="container">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <div class="container">
          <h2>Informasi Akun</h2>
          <form action="{{ route('update.profile') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="nim">NIM:</label>
              @auth
              <input type="text" class="form-control" id="nim" value="{{ Auth::user()->nim }}" name="nim" readonly>
              @else
              <input type="text" class="form-control" id="nim" placeholder="NIM tidak terdeteksi! Silahkan Login!!" name="nim" disabled>
            </div>
            @endauth
            <div class="form-group">
              <label for="name">Nama Lengkap:</label>
              @auth
              <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" name="name" readonly>
              @else
              <input type="text" class="form-control" id="name" placeholder="Nama tidak terdeteksi! Silahkan Login!!" name="name" disabled>
            </div>
            @endauth
            <div class="form-group">
              <label for="prodi">Program Studi:</label>
              @auth
              <input type="text" class="form-control" id="prodi" value="{{ Auth::user()->prodi }}" name="prodi" readonly>
              @else
              <input type="text" class="form-control" id="prodi" placeholder="Prodi tidak terdeteksi! Silahkan Login!!" name="prodi" disabled>
            </div>
            @endauth
            <div class="form-group">
              <label for="kelas">Kelas:</label>
              @auth
              <input type="text" class="form-control" id="kelas" value="{{ Auth::user()->kelas }}" name="kelas" readonly>
              @else
              <input type="text" class="form-control" id="kelas" placeholder="Kelas tidak terdeteksi! Silahkan Login!!" name="kelas" disabled>
            </div>
            @endauth
            <div class="form-group">
              <label for="nama_dosen">Wali Dosen:</label>
              @auth
              <input type="text" class="form-control" id="nama_dosen" value="{{ Auth::user()->nama_dosen }}" name="nama_dosen" readonly>
              @else
              <input type="text" class="form-control" id="nama_dosen" placeholder="Wali Dosen tidak terdeteksi! Silahkan Login!!" name="nama_dosen" disabled>
            </div>
            @endauth
            <div class="form-group">
              <label for="email">Email:</label>
              @auth
              <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" name="email" readonly>
              @else
              <input type="email" class="form-control" id="email" placeholder="Email tidak terdeteksi! Silahkan Login!!" name="email" required>
            </div>
            @endauth
            <div class="form-group">
              <label for="nomor_hp">Nomor HP:</label>
              @auth
              <input type="text" class="form-control" id="nomor_hp" value="{{ Auth::user()->nomor_hp }}" name="nomor_hp" onkeypress="return hanyaAngka(event)" required>
              @else
              <input type="text" class="form-control" id="nomor_hp" placeholder="Nomor HP tidak terdeteksi! Silahkan Login!!" name="nomor_hp" onkeypress="return hanyaAngka(event)" required>
            </div>
            @endauth
            <div class="form-group">
              <label for="alamat">Alamat:</label>
              @auth
              <input type="text" class="form-control" id="alamat" value="{{ Auth::user()->alamat }}" name="alamat" required>
              @else
              <input type="text" class="form-control" id="alamat" placeholder="Nomor HP tidak terdeteksi! Silahkan Login!!" name="alamat" required>
            </div>
            @endauth
            <button id="btn-f" type="submit" class="btn btn-outline-primary">Ubah</button>
            <hr>
          </form>

          </br>
          <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <h2>{{ __('Ubah Password') }}
        </div>
        </h2>
        <div class="form-group">
          <label for="current_password">Password Lama:</label>
          <input type="password" class="form-control" id="current_password" placeholder="Masukkan Password Lama" name="current_password" required>
        </div>
        <div class="form-group">
          <label for="new_password">Password Baru:</label>
          <input type="password" class="form-control" id="new_password" placeholder="Masukkan Password Baru" name="new_password" required>
        </div>
        <div class="form-group">
          <label for="new_password_confirmation">Konfirmasi Password Baru:</label>
          <input type="password" class="form-control" id="new_password_confirmation" placeholder="Konfirmasi Password Baru" name="new_password_confirmation" required>
        </div>
        <button id="btn-f" type="submit" class="btn btn-outline-primary">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection