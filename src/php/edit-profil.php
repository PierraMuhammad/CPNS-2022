<?php
    session_start();
    require 'function.php';
    $email = $_SESSION["email"];

    $result = Profile2($email);
    if(isset($_POST["submit"])){
        // var_dump($_POST);die;
        if(update($email, $_POST) > 0){
            
        }
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
    <link rel="stylesheet" href="./style/jumbotron.css">
  </head>
  <body>
    <!-- Navbar-regular Awal -->
    <nav class="navbar navbar-expand-lg bg-primary">
      <div class="container-fluid">
        <div class="ps-5 col-7">
          <a class="navbar-brand text-light fw-bold" href="./index.php">CPNS KKP</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="">
          <ul class="navbar-nav ms-4 ps-4">
            <li class="nav-item">
              <a class="nav-link text-light" aria-current="page" href="#">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">Jadwal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">Persyaratan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="./pendaftaran.php">Pendaftaran</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">Cek Hasil</a>
            </li>
          </ul>
        </div>
        <div class="me-4">
            <a href="./profil.php">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 20 20" height="36px" viewBox="0 0 20 20" width="36px" fill="#FFFFFF"><g><rect fill="none" height="20" width="20"/></g><g><g><path d="M10 5.5c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zm0 4.5c-.83 0-1.5-.67-1.5-1.5S9.17 7 10 7s1.5.67 1.5 1.5S10.83 10 10 10z"/><path d="M10 2c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm0 14.5c-1.49 0-2.86-.51-3.96-1.36C7.19 14.42 8.55 14 10 14s2.81.42 3.96 1.14c-1.1.85-2.47 1.36-3.96 1.36zm5.07-2.44c-1.44-.99-3.19-1.56-5.07-1.56s-3.62.58-5.07 1.56C4.04 12.95 3.5 11.54 3.5 10c0-3.58 2.92-6.5 6.5-6.5s6.5 2.92 6.5 6.5c0 1.54-.54 2.95-1.43 4.06z"/></g></g></svg>
            </a>
        </div>
      </div>
    </nav>
    <!-- Navbar-regular Akhir -->

    <!-- body awal -->
    <div class="container-fluid">
        <div class="container mt-4 pt-3 mb-5 pb-5">
            <h1 class="text-primary text-center mb-5">Pengisian Data Pendaftaran Peserta Calon Pegawai Negeri Sipil Kementerian Kelautan dan Perikanan</h1>
            <div class="row justify-content-center">
                <div class="ms-5 ps-5 me-5 pe-5 col-8">
                    <form action="" method="post" class="ms-5 ps-5 me-5 pe-5" enctype="multipart/form-data">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" value="<?php echo $result["Nama_Lengkap"]?>" id="nama" name="nama" class="form-control mb-3" placeholder="Reza Rahadian">

                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="<?php echo $result["Email"]?>" id="email" name="email" class="form-control mb-3" placeholder="testing@gmail.com">
                        
                        <label for="telepon" class="form-label">No. Telepon</label>
                        <input type="tel" value="<?php echo $result["Tlp"]?>" id="telepon" name="telepon" class="form-control mb-3" placeholder="08xx-xxxx-xxxx">
                        
                        <label for="JK" class="form-label">Jenis Kelamin</label>
                        <select name="JK" name="JK" value="<?php echo $result["JK"]?>" id="JK" class="form-select mb-3" aria-label="Default select example">
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        
                        <label for="tmpt" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tmpt" value="<?php echo $result["TmptLahir"]?>" id="tmpt" class="form-control mb-3" placeholder="Malang">
                        
                        <label for="date" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="date" value="<?php echo $result["TglLahir"]?>" id="date" class="form-control mb-3">
                        
                        <label for="domisili" class="form-label">Domisili</label>
                        <input type="text" name="domisili" value="<?php echo $result["Domisili"]?>" id="domisili" class="form-control mb-3" placeholder="Surabaya">
                        
                        <label for="nik" class="form-label">nik</label>
                        <input type="text" name="nik" value="<?php echo $result["NIK"]?>" id="nik" class="form-control mb-3" placeholder="nik">

                        <button type="submit" name="submit" class="btn btn-primary button mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- body akhir -->

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