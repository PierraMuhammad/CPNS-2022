<?php
require 'function.php';

if(isset($_POST["register"])){

  if(Registrasi($_POST) > 0){
    echo "<script>
           alert('user baru berhasil ditambahkan')
          </script>";
  }
  else{
    echo mysqli_error($db);
  }
};
?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CPNS KKP - Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/signup.css?v=<?php echo time(); ?>">
  </head>
  <body>
    <!-- Navbar-regular Awal -->
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <div class="ps-5 col-8">
                <a class="navbar-brand text-light fw-bold" href="./index.php">CPNS KKP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="">
                <a href="./login.php"><button type="button" class="btn btn-success ">Log in</button></a>
                <a href="./signup.php"><button type="button" class="btn btn-danger ">Sign up</button></a>
            </div>
        </div>
    </nav>
    <!-- Navbar-regular Akhir -->

    <!-- Jumbotron -->
    <div class="container ms-0 ps-0">
      <img src="../img/Jumbotron1.png" alt="" style="width: 1381px; height: 700px; object-fit: cover;">
      <div class="carousel-caption img-login-div">
        <h1 class="mt-3 mb-3">Registrasi Akun</h1>
        <form action="" method="post">
            <label for="username" class="form-label">Nama Lengkap</label><br>
            <input type="text" id="username" name="username" class="form-control" placeholder="Kunto Aji"><br>
            <label for="nik" class="form-label">NIK</label><br>
            <input type="text" id="nik" class="form-control" name="nik" placeholder="xxxxxxxxxxxxxxxx"><br>
            <label for="email" class="form-label">Email</label><br>
            <input type="email" id="email" class="form-control" name="email" placeholder="testing@gmail.com"><br>
            <label for="password" class="form-label">Password</label><br>
            <input type="password" id="password" class="form-control" name="password" placeholder="********"><br>
            <label for="repassword" class="form-label">Re-enter Password</label><br>
            <input type="password" id="repassword" class="form-control" name="repassword" placeholder="********"><br>
            <button type="submit" class="btn btn-primary button" name="register">Sign in</button>
            <p class="mt-2 mb-5 pb-5">Apakah anda sudah memilik akun? <a href="./login.html">klik disini</a></p>
        </form>
      </div>
    </div>
    <!-- Jumbotron Akhir-->

    <!-- Footer Awal -->
    <div class="container-fluid bg-dark text-light">
      <p class="mb-0">Create By &#169; Pierra</p>
    </div>
    <!-- Footer Akhir -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>