-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 11:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `foto` text NOT NULL,
  `judulBuku` varchar(100) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahunterbit` year(4) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `foto`, `judulBuku`, `deskripsi`, `pengarang`, `penerbit`, `tahunterbit`, `status`) VALUES
(39, 'b1.jpg', 'MACHINE LEARNING FOR ABSOLUTE BEGINNERS: A PLAIN ENGLISH INTRODUCTION', 'Sesuai dengan judulnya, buku machine learning ini sangat cocok untuk Anda yang benar-benar pemula dalam mempelajari bidang ini, bahkan bagi yang tidak memiliki background matematika dan coding sekali pun. Seluruh konsep dijabarkan dengan sangat jelas sehingga mudah untuk dipahami.', 'Oliver Theobald', 'Scatterplot Press', 2017, 'Tersedia'),
(40, 'b2.jpg', 'DEEP LEARNING', 'Buku ini dianggap sebagai sangat ramah pemula karena ditulis oleh tiga ahli lapangan yang memperkenalkan berbagai topik tentang deep learning sekaligus aspek-aspek terkait machine learning. ', ' Ian Goodfellow, Yoshua Bengio, dan Aaron Courvill', 'MIT Press', 2016, 'Dipinjam'),
(41, 'b3.jpg', 'MACHINE LEARNING (IN PYTHON AND R) FOR DUMMIES', 'Semua buku machine learning dari seri “Dummies” begitu terkenal karena ramah bagi pemula. Buku ini mencakup konsep dan teori pengantar ML beserta alat dan bahasa pemrograman yang direkomendasikan.', 'John Paul Mueller dan Luca Massaron', 'For Dummies ', 2021, 'Dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `NIM` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` longtext NOT NULL,
  `statusmhs` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `NIM`, `nama`, `prodi`, `jk`, `username`, `password`, `alamat`, `statusmhs`) VALUES
(13, '20101106025', 'Ida Bagus Dharma Nala', 'Sistem Informasi', 'Pria', 'Dharma Nala', '202cb962ac59075b964b07152d234b70', 'Jl. Parigi 7 No.77, Malalayang Satu, Kec. Malalayang, Kota Manado, Sulawesi Utara', 'Tidak Meminjam'),
(15, '20101106021', 'Kevin Ngantung', 'Kedokteran', 'Pria', 'Kevin', '202cb962ac59075b964b07152d234b70', 'Tataaran', 'Sedang Meminjam'),
(16, '20101106058', 'Rendi Devano', 'Peternakan', 'Pria', 'Devano', '202cb962ac59075b964b07152d234b70', 'Bengkol', 'Sedang Meminjam');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjam` int(11) NOT NULL,
  `id_mhs` varchar(11) NOT NULL,
  `id_buku` varchar(11) DEFAULT NULL,
  `NIM` varchar(50) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `denda` varchar(100) DEFAULT NULL,
  `statuspjm` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjam`, `id_mhs`, `id_buku`, `NIM`, `tgl_pinjam`, `deadline`, `tgl_kembali`, `denda`, `statuspjm`) VALUES
(42, '13', '39', '20101106025', '2023-04-11', '2023-04-18', '2023-04-25', '7000', 'Dikembalikan'),
(43, '15', '40', '20101106021', '2023-04-19', '2023-04-25', '0000-00-00', '', 'Belum Dikembalikan'),
(44, '16', '41', '20101106058', '2023-04-25', '2023-04-30', '0000-00-00', '', 'Belum Dikembalikan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`) USING BTREE;

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD UNIQUE KEY `id_mhs` (`NIM`),
  ADD UNIQUE KEY `id_mhs_2` (`id_mhs`),
  ADD UNIQUE KEY `id_buku_2` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
