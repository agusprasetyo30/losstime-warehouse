-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2019 at 10:16 AM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.26-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `id` int(11) NOT NULL,
  `nama_line` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`id`, `nama_line`) VALUES
(1, '1C'),
(2, '2A'),
(3, '2A (PRADO)'),
(6, 'TC'),
(7, 'JP 04'),
(8, '2C'),
(9, 'TC SBS'),
(10, '3B'),
(11, '4A'),
(12, '4B'),
(13, '5B'),
(14, '5C'),
(15, '6C'),
(16, '7C'),
(17, '9A'),
(18, '10A'),
(19, '10C'),
(20, 'JP 03'),
(21, '11C'),
(22, '12B'),
(23, '13C'),
(24, '15A'),
(25, '15C'),
(26, '17C'),
(27, '18B'),
(28, '19A'),
(29, '19C'),
(30, '20B'),
(31, '23B'),
(32, '24B'),
(33, '25B'),
(34, '27B');

-- --------------------------------------------------------

--
-- Table structure for table `losstime`
--

CREATE TABLE `losstime` (
  `id` int(11) NOT NULL,
  `line` varchar(20) NOT NULL,
  `shift` enum('PAGI','MALAM') NOT NULL,
  `jam_kerja` int(1) NOT NULL,
  `masalah` text NOT NULL,
  `jml_losstime` int(3) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `masalah_line`
--

CREATE TABLE `masalah_line` (
  `id` int(11) NOT NULL,
  `kode_masalah` varchar(10) NOT NULL,
  `masalah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masalah_line`
--

INSERT INTO `masalah_line` (`id`, `kode_masalah`, `masalah`) VALUES
(1, '9A', 'PART TERCAMPUR'),
(2, '9B', 'SALAH SUPPLY DARI WAREHOUSE'),
(3, '9C', 'TUNGGU MATERIAL DARI WAREHOUSE'),
(4, '9D', 'TUNGGU TERMINAL'),
(5, '9E', 'TUNGGU TUBE/COT/VO DARI WAREHOUSE'),
(6, '9F', 'TUNGGU WIRE');

-- --------------------------------------------------------

--
-- Table structure for table `running_text`
--

CREATE TABLE `running_text` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `running_text`
--

INSERT INTO `running_text` (`id`, `text`) VALUES
(1, 'Ini adalah contoh running text yang dinputkan, ini bersifat sementara dan dapat diubah dan dihapus'),
(2, 'Ini adalah contoh running text yang dinputkan, ini bersifat sementara dan dapat diubah dan dihapus (COPY)'),
(3, 'Ini adalah contoh running text yang dinputkan, ini bersifat sementara dan dapat diubah dan dihapus (COPY)(COPY)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('AKTIF','NON AKTIF') NOT NULL DEFAULT 'AKTIF',
  `akses` enum('ADMIN','OPERATOR') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `id_karyawan`, `password`, `status`, `akses`, `created_at`) VALUES
(1, 'Agus Prasetyo', '800832', '$2y$10$KSi1gb5OtBJI5hABpMjleeAAkUTUActBioTamJfDp1pHIH.rEWKt6', 'AKTIF', 'ADMIN', '2020-01-15 03:25:49'),
(2, 'OPERATOR', '800000', '$2y$10$/Dd3kJ0pLT6HWSKV38yGDuFdOZDKSXeVbFmR7rimuc3HNF0aDWgjm', 'AKTIF', 'OPERATOR', '2020-01-29 01:05:43'),
(3, 'ADMIN 1', '800123', '$2y$10$fpKEBBw5SCCeOKhr/TpOeunSK2xGGMohU0ENAzbWXanG0BeSsGZbW', 'AKTIF', 'ADMIN', '2020-01-29 01:09:58'),
(4, 'User Nonaktif', '878787', '$2y$10$eRC1OVD9ipRN5E3UDgxfteqYz8LAOjW6xEAYa.gwa6rfYFM29ftna', 'NON AKTIF', 'ADMIN', '2020-01-29 01:10:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `losstime`
--
ALTER TABLE `losstime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masalah_line`
--
ALTER TABLE `masalah_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `running_text`
--
ALTER TABLE `running_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `losstime`
--
ALTER TABLE `losstime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `masalah_line`
--
ALTER TABLE `masalah_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `running_text`
--
ALTER TABLE `running_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
