<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"/>

    <!--mdb-->      
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">

    <!--logo tab-->
    <link rel="icon" type="image/png" href="img/LetteR2.png">

<style>
body{
  background-image: url("img/poltek.jpg");
  background-size: cover;
}

.card{
  background-color: white;
  opacity: 0.9;
  border-radius: 20px;
  width: 800px;
  height: 500px;
  font-size: 20px;
}
@media screen and (max-width: 859px) {
.card {
  width: 600px;
  height: 500px;
  font-size: 15px;
}
}
@media screen and (max-width: 659px) {
.card {
  width: 500px;
  height: 500px;
  font-size: 10px;
}
}
@media screen and (max-width: 544px) {
.card {
  width: 400px;
  height: 500px;
}
}
@media screen and (max-width: 442px) {
.card {
  width: 280px;
  height: 500px;
}
}
.container {
  display: flex;
  align-items: center;
  justify-content: center;
}
.header {
  font-size: 25px;
}
@media screen and (max-width: 659px) {
.header {
  font-size: 20px;
}
}
@media screen and (max-width: 442px) {
.header {
  font-size: 15px;
}
}

  

</style>
</head>
<body>
<div class="container mt-5">
  <div class="row">
    <div class="col">
      <div class="card col-md-12">
        <div class="card-body">
         <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#login-mahasiswa" role="tab"
              aria-controls="pills-login" aria-selected="true">MAHASISWA</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#login-admin" role="tab"
              aria-controls="pills-register" aria-selected="false">ADMIN</a>
          </li>
        </ul><br>
        <!-- Pills navs -->

        <!-- Pills content -->
          <div class="tab-content">
              <div class="tab-pane fade show active" id="login-mahasiswa" role="tabpanel" aria-labelledby="tab-login">
                <form>
                  <div class="text-center mb-3">
                    <p class="header">LOGIN MAHASISWA</p><br>
                  </div>
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" id="loginName" class="form-control" />
                    <label class="form-label" for="loginName">Email or username</label>
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" id="loginPassword" class="form-control" />
                    <label class="form-label" for="loginPassword">Password</label>
                  </div>

                  <!-- 2 column grid layout -->
                  <div class="row mb-4">
                    <div class="col-md-6 d-flex justify-content-center">
                      <!-- Checkbox -->
                      <div class="form-check mb-3 mb-md-0">
                        <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                        <label class="form-check-label" for="loginCheck"> Remember me </label>
                      </div>
                    </div>
                  </div>
                    <!-- Submit button -->
                    <a class="btn btn-primary btn-block mb-4">Sign in</a>
                </form>
            </div>
            <div class="tab-pane fade" id="login-admin" role="tabpanel" aria-labelledby="tab-register">
              <form>
                <div class="text-center mb-3">
                  <p class="header">LOGIN ADMIN</p><br>
                </div>
                 <!-- Email input -->
                 <div class="form-outline mb-4">
                    <input type="email" name="email" id="loginName" class="form-control" required value="{{ old('email') }}"/>
                    <label class="form-label" for="loginName">Email or username</label>
                  </div>
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" id="loginPassword" class="form-control" />
                    <label class="form-label" for="loginPassword">Password</label>
                  </div>
                  <!-- 2 column grid layout -->
                  <div class="row mb-4">
                    <div class="col-md-6 d-flex justify-content-center">
                      <!-- Checkbox -->
                      <div class="form-check mb-3 mb-md-0">
                        <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                        <label class="form-check-label" for="loginCheck"> Remember me </label>
                      </div>
                    </div>
                  </div>
                  <!-- Submit button -->
                  <a href="{{ route('dashboard_admin') }}" class="btn btn-primary btn-block mb-4">Sign in</a>
              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Pills content -->   
    
<script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
        <!-- load bootstrap scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
