<?php
session_start();
require 'function.php';

$email = $_SESSION["email"];
$result = getProfile($email);
// var_dump($result);die;

// Require composer autoload
$dir = dirname(__DIR__, 2);
echo $dir;
require $dir . ('/vendor/autoload.php');
// Create an instance of the class:

$mpdf = new \Mpdf\Mpdf();
// $mpdf->showImageErrors = true;

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Ujian</title>
</head>
<body>
    <div>
        <h1 align="center">Kartu Peserta Ujian CPNS 2022</h1>
        <p align="center">Formasi Lulusan Terbaik</p>
    </div>
    <hr>
    <img src="../img/'. $result["PasFoto"] .'" width="300" height="400">
    <h2>Nomor Ujian: '.$result["Nomor_Ujian"].'</h2>
    <table>
        <tr>
            <td>NIK</td>
            <td><p>: '. $result["NIK"] .'</td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td><p>: '. $result["Nama_Lengkap"] .'</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><p>: '. $result["JK"] .'</td>
        </tr>
        <tr>
            <td>Email</td>
            <td><p>: '. $result["Email"] .'</td>
        </tr>
        <tr>
            <td>No. Telepon</td>
            <td>: '. $result["Tlp"] .'</td>
        </tr>
        <tr>
            <td>No. Telepon</td>
            <td>: '. $result["Tlp"] .'</td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>: '. $result["TmptLahir"] .', '.$result["TglLahir"].'</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>: Layak Mengikuti Ujian</td>
        </tr>
    </table>
</body>
</html>';

// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
?>