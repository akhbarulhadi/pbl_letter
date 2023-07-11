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
            <label for="nik">NIP:</label>
            @auth('admin')
            <input type="text" class="form-control" id="nip" value="{{ Auth::guard('admin')->user()->nip }}" name="nip" onkeypress="return hanyaAngka(event)" required readonly>
            @else <input type="text" class="form-control" id="nim" value="NIK tidak terdeteksi! Silahkan Login!!" name="nim" onkeypress="return hanyaAngka(event)" required readonly>
          </div>
          @endauth
          </br>
          <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            @auth('admin')
            <input type="text" class="form-control" id="nama" value="{{ Auth::guard('admin')->user()->name }}" name="nama" required readonly>
            @else <input type="text" class="form-control" id="nama" value="Nama Lengkap tidak terdeteksi! Silahkan Login!!" name="nama" required readonly>
          </div>
          @endauth
          </br>
          <div class="form-group">
            <label for="email">Email:</label>
            @auth('admin')
            <input type="email" class="form-control" id="email" value="{{ Auth::guard('admin')->user()->email }}" name="email" required readonly>
            @else <input type="email" class="form-control" id="email" value="Email tidak terdeteksi! Silahkan Login!!" name="email" required readonly>
          </div>
          @endauth
          </br>
          <div class="form-group">
            <label for="hp">Nomor HP:</label>
            @auth('admin')
            <input type="text" class="form-control" id="hp" value="{{ Auth::guard('admin')->user()->phone_number}}" name="hp" onkeypress="return hanyaAngka(event)" required readonly>
            @else <input type="text" class="form-control" id="hp" value="Nomor HP tidak terdeteksi! Silahkan Login!!" name="hp" onkeypress="return hanyaAngka(event)" required readonly>
          </div>
          @endauth
          </br>
          </br>
          <hr>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
@endsection