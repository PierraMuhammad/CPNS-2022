<?php
session_start();
if(isset($_SESSION["login"])){
  header("Location: index_afterlogin.php");
  exit;
}
require 'function.php';

if(isset($_POST["login"])){
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = Login($email, $password);
  // $result = mysqli_fetch_assoc($result);
  // var_dump($result);die;
  if($result[0]){
    $_SESSION["login"] = true;
    $_SESSION["email"] = $email;

    if($result[1] === 'admin'){
      header("Location: index_admin.php");
    }
    else{
      header("Location: index_afterlogin.php");
    }
    exit;
  }

  $error = true;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CPNS KKP - Log in</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/login.css?v=<?php echo time(); ?>">
  </head>
  <body>
    <?php if(isset($error)): ?>
      <script>
        alert("email dan password tidak sesuai");
      </script>
      <!-- <p>username atau password salah</p>       -->
    <?php endif; ?>
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
      <img src="../img/Jumbotron1.png" alt="">
      <div class="carousel-caption img-login-div">
        <h1 class="mt-3 mb-3 text-primary">Log in Peserta</h1>
        <form action="" method="POST">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="testing@gmail.com"><br>
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" name="email" placeholder="********"><br>
            <button type="submit" name="login" class="btn btn-primary button">Login</button>
            <p class="mt-4">Apakah anda belum memilik akun? <a href="./signup.php">Klik disini</a></p>
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