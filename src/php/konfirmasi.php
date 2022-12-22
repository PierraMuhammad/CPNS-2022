<?php
session_start();
require 'function.php';

$email = $_SESSION["email"];

if(confirm($email) > 0){
    $pesan = "<script>alert('Konfirmasi Informasi telah dilakukan')</script>";
    header("Location:./profil.php?Message={$pesan}");
}
else{
    die("Gagal menyimpan perubahan...");
}
?>