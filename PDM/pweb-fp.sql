-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2023 pada 17.35
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pweb-fp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `ID` int(11) NOT NULL,
  `Nama_Lengkap` varchar(255) DEFAULT NULL,
  `NIK` varchar(16) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`ID`, `Nama_Lengkap`, `NIK`, `Email`, `Password`, `Role`) VALUES
(1, 'admin', '1234379800000078', 'adminCPNS@email.com', '$2y$10$q0jInlPHzz6/XuTSG.5v/..Lx9VkK97p1s5qmDWVCuucRvK8ZM7nS', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `P_ID` int(11) NOT NULL,
  `JK` varchar(10) DEFAULT NULL,
  `Tlp` varchar(15) DEFAULT NULL,
  `TmptLahir` varchar(25) DEFAULT NULL,
  `TglLahir` date DEFAULT NULL,
  `Domisili` varchar(50) DEFAULT NULL,
  `PasFoto` varchar(255) NOT NULL,
  `PasKTP` varchar(255) NOT NULL,
  `FilePendukung` varchar(255) NOT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Nomor_Ujian` varchar(6) DEFAULT NULL,
  `Akun_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `Peserta_Akun` (`Akun_ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `Peserta_Akun` FOREIGN KEY (`Akun_ID`) REFERENCES `akun` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
