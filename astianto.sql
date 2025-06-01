-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 09:03 AM
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
-- Database: `astianto`
--

-- --------------------------------------------------------

--
-- Table structure for table `opini`
--

CREATE TABLE `opini` (
  `No` int(15) NOT NULL,
  `opini` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `No_kegiatan` varchar(50) NOT NULL,
  `Nama_kegiatan` varchar(255) NOT NULL,
  `Tanggal` varchar(255) NOT NULL,
  `Bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`No_kegiatan`, `Nama_kegiatan`, `Tanggal`, `Bukti`) VALUES
('1', 'Webinar Nasional Public Speaking', 'Februari 2025', 'IMG-20250212-WA0002.jpg'),
('2', 'Kegiatan IT Camp', 'Desember 2024', 'DANNY AHMAD YUSUF (1)_page-0001.jpg'),
('3', 'Kegiatan International Lecture', 'September 2024', 'Sertifikat International Lecture Danny Ahmad Yusuf (1)_page-0001.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `opini`
--
ALTER TABLE `opini`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`No_kegiatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `opini`
--
ALTER TABLE `opini`
  MODIFY `No` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
