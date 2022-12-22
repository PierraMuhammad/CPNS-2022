<?php
session_start();
require 'function.php';

$result = $_REQUEST["id"];
// var_dump($result);die;
if(reject($result)){
    $pesan = "<script>alert('peserta terverifikasi')</script>";
    header("Location: index_admin.php?Message={$pesan}");
    exit;
}
else{
    $pesan = "<script>alert('gagal verifikasi')</script>";
    header("Location: index_admin.php?Message={$pesan}");
    exit; 
}
?>