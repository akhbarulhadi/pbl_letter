<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets_home/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets_home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets_home/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets_home/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets_home/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets_home/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets_home/css/style.css" rel="stylesheet">

  <!-- logo di tab web-->
  <link rel="icon" type="image/png" href="img/LetteR2.png">

  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);


.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4a4e58;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #206bfb;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #206bfb;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <a class="logo"><img src="assets_home/img/LetteR2.png" alt="" class="img-fluid rounded-circle"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Dashboard</a></li>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Information</a></li>
          <li><a class="nav-link scrollto " href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
  
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>LetteR</h1>
          <h2>Permintaan Surat Menyurat</h2>
          <div class="d-flex">
            <!-- Button trigger modal -->
            <a type="button" title="Or Press Alt+s" class="btn-get-started scrollto" accesskey="s" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Sign In
            </a>

            <!-- modal login -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="form">
                      <form class="register-form" action="/register" method="POST">
                        @csrf
                          <input type="number" name="nim" class="form-control rounded-top @error('nim') is-invalid @enderror" 
                          id="nim" placeholder="NIM" onkeypress="return hanyaAngka(event)" required value="{{ old('nim') }}"/>
                          @error('nim')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                          <input type="text" name="name" id="name"placeholder="Nama Lengkap" required value="{{ old('name') }}"/>
                          <input type="text" name="prodi" id="prodi" placeholder="Program Studi" required value="{{ old('prodi') }}"/>
                          <input type="text" name="kelas" id="kelas" placeholder="Kelas" required value="{{ old('kelas') }}"/>
                          <input type="text" name="nama_dosen" id="nama_dosen" placeholder="Wali Dosen" required value="{{ old('nama_dosen') }}"/>
                          <input type="number" name="nomor_hp" id="nomor_hp" placeholder="Nomor HP" onkeypress="return hanyaAngka(event)" required value="{{ old('nomor_hp') }}"/>
                          <input type="email" name="email" id="email" placeholder="Email" required value="{{ old('email') }}"/>
                          <input type="password" name="password" id="password" placeholder="Password" required/>

                          <button type="submit">create</button>
                          <p class="message">Already registered? <a href="#">Sign In</a></p>
                        </form>
                        <form class="login-form" action="/login" method="POST">
                          @csrf
                          <input type="email" name="email" placeholder="Email" id="email" required/>
                          <input type="password" name="password" placeholder="Password" id="password" required/>
                          <button name="submit" type="submit">login</button>
                          <p class="message">Not registered? <a href="#">Create an account</a></p>
                        </form>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets_home/img/envelope.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-laptop"></i></div>
              <h4 class="title"><a href="">Pengajuan Survey</a></h4>
              <p class="description">Detail</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-card-checklist"></i></div>
              <h4 class="title"><a href="">Pengajuan Surat izin</a></h4>
              <p class="description">Detail</p>
            </div>
          </div>
          
        </div>

      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="assets_home/img/write7.jpg" width="500" height="300" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Information</h3>
            <p>
              Aplikasi permintaan surat menyurat (LetteR) adalah sebuah aplikasi yang bertujuan untuk memudahkan mahasiswa dalam mengajukan permintaan pembuatan surat menyurat kepada pihak yang berwenang (Tata Usaha). Dalam aplikasi ini, pengguna dapat mengisi formulir permintaan surat menyurat secara online dan mengirimkannya kepada pihak yang dituju.
            </p>
            <p>
              Keuntungan menggunakan aplikasi permintaan surat menyurat (LetteR) adalah memudahkan mahasiswa dalam mengajukan permintaan tanpa harus datang ke kantor Tata Usaha. Selain itu, aplikasi ini juga dapat mempercepat proses pembuatan surat menyurat dan mengurangi kesalahan pengisian data yang mungkin terjadi.
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row">
          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">

              <div class="email" onclick="copyEmail()">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p id="copy-email">letter@gmail.com</p>
              </div>
              <div class="phone" onclick="copyCall()">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p id="copy-call">+62 812 4789 1234</p>
              </div>
              <div class="address" onclick="copyLocation()">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p id="copy-location">Batam Centre, Jl. Ahmad Yani, Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29461</p>
              </div>
              <iframe src="https://maps.google.com/maps?q=Politeknik+Negeri+Batam,+Jalan+Ahmad+Yani,+Teluk+Tering,+Kota+Batam,+Kepulauan+Riau,+Indonesia&t=&z=10&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

  <!-- Vendor JS Files -->
  <script src="assets_home/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets_home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets_home/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets_home/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets_home/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets_home/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets_home/js/main.js"></script>
<script>
  function copyEmail() {
  // Mendapatkan teks yang ada di dalam div
  var text = document.getElementById("copy-email").innerText;

  // Membuat sebuah textarea sementara
  var temp = document.createElement("textarea");
  temp.value = text;

  // Menambahkan textarea ke dalam dokumen
  document.body.appendChild(temp);

  // Memilih teks di dalam textarea
  temp.select();

  // Menyalin teks yang sudah dipilih
  document.execCommand("copy");

  // Menghapus textarea sementara
  document.body.removeChild(temp);

  // Menampilkan pesan bahwa teks berhasil disalin
  alert("Teks berhasil disalin: " + text);
}

function copyCall() {
  // Mendapatkan teks yang ada di dalam div
  var text = document.getElementById("copy-call").innerText;

  // Membuat sebuah textarea sementara
  var temp = document.createElement("textarea");
  temp.value = text;

  // Menambahkan textarea ke dalam dokumen
  document.body.appendChild(temp);

  // Memilih teks di dalam textarea
  temp.select();

  // Menyalin teks yang sudah dipilih
  document.execCommand("copy");

  // Menghapus textarea sementara
  document.body.removeChild(temp);

  // Menampilkan pesan bahwa teks berhasil disalin
  alert("Teks berhasil disalin: " + text);
}

function copyLocation() {
  // Mendapatkan teks yang ada di dalam div
  var text = document.getElementById("copy-location").innerText;

  // Membuat sebuah textarea sementara
  var temp = document.createElement("textarea");
  temp.value = text;

  // Menambahkan textarea ke dalam dokumen
  document.body.appendChild(temp);

  // Memilih teks di dalam textarea
  temp.select();

  // Menyalin teks yang sudah dipilih
  document.execCommand("copy");

  // Menghapus textarea sementara
  document.body.removeChild(temp);

  // Menampilkan pesan bahwa teks berhasil disalin
  alert("Teks berhasil disalin: " + text);
}
</script>
<script>
    $('.message a').click(function(){
      $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
  </script>

<script>
  function hanyaAngka(event) {
  var angka = (event.which) ? event.which : event.keyCode;
  if (angka > 31 && (angka < 48 || angka > 57)) {
    return false;
  }
  return true;
}
</script>

<script>
  var password = document.getElementById("password");
  var konfirmasi_password = document.getElementById("konfirmasi_password");
function validatePassword(){
  if(password.value != konfirmasi_password.value) {
    konfirmasi_password.setCustomValidity("Password tidak sesuai");
  } else {
    konfirmasi_password.setCustomValidity('');
  }
}
password.onchange = validatePassword;
konfirmasi_password.onkeyup = validatePassword;
</script>

</body>

</html>