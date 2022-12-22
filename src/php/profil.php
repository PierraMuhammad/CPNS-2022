<?php
session_start();
require 'function.php';

$email = $_SESSION["email"];

if(Profile2($email) == NULL){
  $pesan = "Lakukan Pendaftaran terlebih dahulu";
  header("Location: pendaftaran.php?Message={$pesan}");
  exit;
}

$result = getProfile($email);
// var_dump($result);die;
if(!$result){
  echo mysqli_error($db);
}
else{
  // var_dump($result);die;
  $nama = $result["Nama_Lengkap"];
  $NIK = $result["NIK"];
  $JK = $result["JK"];
  echo "<script>
  alert('Selamat data $nama')
  </script>";
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
    <link rel="stylesheet" href="../style/jumbotron.css">
    <link rel="stylesheet" href="../style/box.css?v=<?php echo time(); ?>">
  </head>
  <body>
    <!-- Navbar-regular Awal -->
    <nav class="navbar navbar-expand-lg bg-primary">
      <div class="container-fluid">
        <div class="ps-5 col-7">
          <a class="navbar-brand text-light fw-bold" href="./index_afterlogin.php">CPNS KKP</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="">
          <ul class="navbar-nav ms-4 ps-4">
            <li class="nav-item">
              <a class="nav-link text-light" aria-current="page" href="">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">Jadwal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">Persyaratan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="pendaftaran.php">Pendaftaran</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">Cek Hasil</a>
            </li>
          </ul>
        </div>
        <div class="me-4">
            <a href="profil.php">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 20 20" height="36px" viewBox="0 0 20 20" width="36px" fill="#FFFFFF"><g><rect fill="none" height="20" width="20"/></g><g><g><path d="M10 5.5c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zm0 4.5c-.83 0-1.5-.67-1.5-1.5S9.17 7 10 7s1.5.67 1.5 1.5S10.83 10 10 10z"/><path d="M10 2c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm0 14.5c-1.49 0-2.86-.51-3.96-1.36C7.19 14.42 8.55 14 10 14s2.81.42 3.96 1.14c-1.1.85-2.47 1.36-3.96 1.36zm5.07-2.44c-1.44-.99-3.19-1.56-5.07-1.56s-3.62.58-5.07 1.56C4.04 12.95 3.5 11.54 3.5 10c0-3.58 2.92-6.5 6.5-6.5s6.5 2.92 6.5 6.5c0 1.54-.54 2.95-1.43 4.06z"/></g></g></svg>
            </a>
        </div>
      </div>
    </nav>
    <!-- Navbar-regular Akhir -->

    <!-- Jumbotron -->
    <div class="container ms-0 ps-0">
      <img src="../img/Jumbotron1.png" alt="" style="width: 1396px; height: 605px; object-fit: cover;">
      <div class="container carousel-caption box d-flex">
        <div class="col-3 con-img">
          <h3>Halo <?php print_r($result["Nama_Lengkap"])?></h3>
          <img src="../img/<?php echo $result["PasFoto"]?>" class="box-img" alt="">
          <button class="mt-4 btn btn-primary"><a class="text-light text-decoration-none" href="#">Cetak Kerta Ujian</a></button>
        </div>
        <div class="mt-5 text-start">
          <tr>
            <td>NIK</td>
            <td>
              <?php if($result["NIK"] != NULL) : ?>
                :<?php echo $result["NIK"]?>
              <?php else :?>
                :<?php echo "Belum Diisi"?>
              <?php endif;?>
            </td>
          </tr>
          <br>
          <br>
          <td>
            <tr>Nama</tr>
            <tr>: <?php echo$result["Nama_Lengkap"]?></tr>
          </td>
          <br>
          <br>
          <td>
            <tr>Jenis Kelamin</tr>
            <tr>: <?php if($NIK != NULL) : ?>
                :<?php echo $NIK?>
              <?php else :?>
                :<?php echo "Belum Diisi"?>
              <?php endif;?></tr>
          </td>
          <br>
          <br>
          <td>
            <tr>Email</tr>
            <tr>: <?php echo$email?></tr>
          </td>
          <br>
          <br>
          <td>
            <tr>No. Telepon</tr>
            <tr>: <?php echo$result["Tlp"]?></tr>
          </td>
          <br>
          <br>
          <tr>
            <td>Tempat tanggal lahir</td>
            <td>: <?php echo$result["TmptLahir"].", ".$result["TglLahir"]?></td>
          </tr>
          <br>
          <br>
          <tr>
            <td>Status: </td>
            <td>: <?php echo$result['Status']?></td>
          </tr>
          <br>
          <br>
          <td>
            <button class="btn btn-primary"><a class="text-light text-decoration-none" href="../img/<?php echo$result["PasFoto"]?>" download=PasFoto.jpg>PasFoto</a></button>
            <button class="btn btn-primary"><a class="text-light text-decoration-none" href="../img/<?php echo$result["FotoKTP"]?>" download=FotoKTP.jpg>FotoKTP</a></button>
            <button class="btn btn-primary"><a class="text-light text-decoration-none" href="../img/<?php echo$result["Berkas"]?>" download=Berkas.PDF>PasFoto</a></button>
          </td>
          <br>
          <br>
          <td>
            <button class="btn btn-primary"><a class="text-light text-decoration-none" href="./edit-profil.php">Ubah</a></button>
            <button class="btn btn-success"><a class="text-light text-decoration-none" href="./konfirmasi.php">Konfirmasi</a></button>
            <button class="btn btn-danger"><a class="text-light text-decoration-none" href="./hapus.php">Hapus</a></button>
          </td>
          <br>
          <br>
        </div>
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