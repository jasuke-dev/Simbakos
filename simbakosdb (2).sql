-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 07:05 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simbakosdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` enum('admin','pemilik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama_lengkap`, `email`, `username`, `password`, `no_telp`) VALUES
(1, 'ilham123', 'ilham@gmail.com', 'ilham', '$2y$10$xHTqM9Dq7BuJBlZ0gs02E.Tz.8zVJPhRIZQrCa4d3Cytt9zn5iqgG', 987654);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_telp` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `no_telp`, `email`, `username`, `password`, `foto`) VALUES
(1, 'Tono P', 987654, 'tono@gmail.com', 'tono', '14d2d4119982cd6c68a566e523cb16ae', 'pegawai.jpg'),
(9, 'sandra', 893598, 'tono@gmail.com', 'sandra', 'f40a37048732da05928c3d374549c832', 'pegawai4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `no_pemesanan` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `alamat_tujuan` varchar(255) DEFAULT NULL,
  `durasi` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `user_pegawai` varchar(20) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('wait','confirm','success','reject','submit') NOT NULL,
  `layanan` enum('sini','antar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`no_pemesanan`, `username`, `alamat`, `alamat_tujuan`, `durasi`, `waktu`, `user_pegawai`, `harga`, `foto`, `status`, `layanan`) VALUES
('ilhamanter201217025732', 'ilham', 'wisma tani', 'purbalingga', 2, '2020-12-17 00:00:00', 'tono', 60000, 'bubur ayam.jpg', 'confirm', 'antar'),
('ilhamanter201217031923', 'ilham', 'purwokerto', 'purbalingga', 1, '2020-12-17 02:24:00', NULL, 30000, 'bg-food.jpg', 'wait', 'antar'),
('ilhamanter201217032847', 'ilham', 'wisma tani', '', 2, '2020-12-17 01:33:00', NULL, 40000, 'bg-food.jpg', 'reject', 'antar'),
('ilhamanter201217032944', 'ilham', 'wisma tani', '', 1, '2020-12-17 09:32:00', NULL, 20000, '', 'wait', 'antar'),
('ilhamanter201217051026', 'ilham', 'purwokerto', 'karanglewas', 2, '2020-12-17 03:14:00', NULL, 60000, 'diana-parkhouse-5RY9GtjPXZM-unsplash.jpg', 'reject', 'antar'),
('ilhamsini201217033050', 'ilham', 'pasiraajf', '', 2, '2020-12-25 03:35:00', NULL, 40000, 'burger.jpg', 'wait', 'sini');

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Pegawai','Operator','Administrator','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id`, `username`, `nama_lengkap`, `password`, `level`) VALUES
(1, 'admin', 'Muhammad Hafid', '21232f297a57a5a743894a0e4a801fc3', 'Administrator'),
(2, 'operator', 'Muhammad Uwais', '4b583376b2767b923c3e1da60d10de59', 'Operator'),
(3, 'pegawai', 'Indrianti', '047aeeb234644b9e2d4138ed3bc7976a', 'Pegawai'),
(5, 'ilham', 'ilham Suryaneara', '$2y$10$0T.NICTlp3tMiY1B7NHjleeT5o7s/GbfxHrMGahMEWbh65IvnUfoG', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `UNIQUE` (`username`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`no_pemesanan`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
