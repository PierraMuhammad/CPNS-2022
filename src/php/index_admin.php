<?php
session_start();
require 'function.php';

$email = $_SESSION["email"];
// var_dump($email);die;
if(security_admin($email)){
    echo "<script>alert('Selamat datang admin')</script>";
}
else{
    $pesan = "<script>alert('bukan admin')</script>";
    header("Location: ./logout.php?Message={$pesan}");
}

$i = 1;

$result = AllVerification();
// var_dump(mysqli_fetch_assoc($result));die;

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
    <link rel="stylesheet" href="../style/reguler.css">
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
          <ul class="navbar-nav ms-2 ps-2">
            <li class="nav-item">
              <a class="nav-link text-light" aria-current="page" href="#">Semua verifikasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">Sudah Verifikasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">Belum Verifikasi</a>
            </li>
          </ul>
        </div>
        <div class="me-4">
            <button><a href="logout.php">Logout</a></button>
        </div>
      </div>
    </nav>
    <!-- Navbar-regular Akhir -->

    <!-- Jumbotron -->
    <div class="container ms-0 ps-0 body-part">
      <table cellpadding="10">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Tanggal Lahir</th>
            <th>PasFoto</th>
            <th>Foto KTP</th>
            <th>File Pendukung</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) :?>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $row["Nama_Lengkap"]?></td>
                <td><?php echo $row["NIK"]?></td>
                <td><?php echo $row["JK"]?></td>
                <td><?php echo $row["TmptLahir"].', '.$row["TglLahir"]?></td>
                <td><a href="../img/<?php echo $row["PasFoto"]?>" download=PasFoto.jpg>PasFoto</a></td>
                <td><a href="../img/<?php echo $row["FotoKTP"]?>" download=FotoKTP.jpg>Foto KTP</a></td>
                <td><a href="../img/<?php echo $row["Berkas"]?>" download=Berkas.jpg>Berkas</a></td>
                <td><?php echo $row["Status"]?></td>
                <td>
                    <a href="./verifikasi.php?id=<?php echo $row['P_ID']?>">Verifikasi</a> | <a href="./reject.php?id=<?php echo $row['P_ID']?>">Tolak</a>
                </td>
            </tr>
        <?php endwhile;?>
      </table>
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