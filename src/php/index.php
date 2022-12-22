<?php
session_start();
if(isset($_SESSION["login"])){
  header("Location: index_afterlogin.php");
  exit;
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CPNS KKP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/jumbotron.css?v=<?php echo time(); ?>">
    <style>
        
    </style>
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
          <ul class="navbar-nav ps-5">
            <li class="nav-item">
              <a class="nav-link text-light fw-light" aria-current="page" href="#">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light fw-light" href="#">Jadwal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light fw-light" href="#">Persyaratan</a>
            </li>
          </ul>
        </div>
        <div class="">
          <a href="./login.php"><button type="button" class="btn btn-success btn-login">Log in</button></a>
          <a href="./signup.php"><button type="button" class="btn btn-danger btn-signup">Sign up</button></a>
        </div>
      </div>
    </nav>
    <!-- Navbar-regular Akhir -->

    <!-- Jumbotron -->
    <div class="container ms-0 ps-0">
      <img src="../img/Jumbotron1.png" alt="" style="width: 1396px; height: 605px; object-fit: cover;">
      <h1 class="carousel-caption img-caption">Selamat Datang di Portal<br>Pendaftaran Ujian Pegawai<br>Negeri Sipil</h1>
      <h3 class="carousel-caption img-text">Kementrian Kelautan dan Perikanan<br>Daerah Provinsi Jawa Timur</h3>
      <div class="carousel-caption img-btn"><a href="./login.php"><button type="button" class="btn btn-primary">Klik disini</button></a></div>
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