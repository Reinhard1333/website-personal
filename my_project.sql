-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2025 at 05:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `jurusan`) VALUES
('k01', 'danny ahmad yusuf', 'bojonegoro', 'Teknik informatika'),
('k02', 'suheri prasetyo', 'tuban', 'Teknik informatika'),
('k03', 'ahmad sholeh', 'tuban', 'teknik informatika'),
('k04', 'mohammad nur hadi kholis', 'tuban', 'teknik informatika'),
('k05', 'night rever', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mk`
--

CREATE TABLE `tb_mk` (
  `kode_mk` varchar(255) NOT NULL,
  `nama_mk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mk`
--

INSERT INTO `tb_mk` (`kode_mk`, `nama_mk`) VALUES
('d01', 'pengantar teknik informatika'),
('d02', 'kalkulus'),
('d03', 'matematika distrik'),
('d04', 'basis data'),
('d05', 'struktur data');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `nim` varchar(255) NOT NULL,
  `kode_mk` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`nim`, `kode_mk`, `nilai`) VALUES
('k01', 'd01', '95'),
('k02', 'd04', '89'),
('k03', 'd02', '90'),
('k04', 'd03', '85'),
('k05', 'd05', '93');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_mk`
--
ALTER TABLE `tb_mk`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
