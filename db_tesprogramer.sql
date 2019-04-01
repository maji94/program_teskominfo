-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2019 at 12:00 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tesprogramer`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id` int(11) NOT NULL,
  `nip` varchar(19) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jenis_ket` enum('cuti','pendidikan','dinas') NOT NULL,
  `sub_jenis` varchar(30) NOT NULL,
  `nomor` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`id`, `nip`, `tgl_mulai`, `tgl_selesai`, `jenis_ket`, `sub_jenis`, `nomor`, `keterangan`, `waktu`) VALUES
(3, '123456789012345678', '2019-04-01', '2019-04-01', 'cuti', 'cuti', 'nomor', '', '2019-04-01'),
(4, '123456789012345678', '2019-04-01', '2019-04-01', 'cuti', 'cuti', 'nomor', '', '2019-04-01'),
(5, '123456789012345678', '2019-04-01', '2019-04-01', 'cuti', 'cuti', 'nomor', '', '2019-04-01'),
(6, '123456789012345678', '2019-04-01', '2019-04-01', 'cuti', 'cuti', 'nomor', '', '2019-04-01'),
(9, '123456789012345678', '2019-04-01', '2019-04-01', 'cuti', 'cuti', 'nomor', '', '2019-04-01'),
(10, '123456789012345678', '2019-04-01', '2019-04-01', 'cuti', 'cuti', 'nomor', '', '2019-04-01'),
(11, '123456789012345678', '2019-04-01', '2019-04-01', 'cuti', 'cuti', 'nomor', '', '2019-04-01'),
(12, '123456789012345678', '2019-04-01', '2019-04-01', 'cuti', 'cuti', 'nomor', '', '2019-04-01'),
(13, '123456789012345678', '2019-04-01', '2019-04-01', 'cuti', 'cuti', 'nomor', '', '2019-04-01'),
(14, '123456789012345678', '2019-04-01', '2019-04-01', 'cuti', 'cuti', 'nomor', '', '2019-04-01'),
(15, '123456789012345678', '2019-04-01', '2019-04-01', 'cuti', 'cuti', 'nomor', '', '2019-04-01'),
(16, '123456789012345678', '2019-04-01', '2019-04-01', 'cuti', 'cuti', 'nomor', '', '2019-04-01'),
(20, '123984718901237481', '2019-04-01', '2019-04-01', 'dinas', 'Dinas Dalam Daerah', '01', '', '2019-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(19) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id`, `nama`, `nip`, `keterangan`) VALUES
(1, 'suparmaji', '123456789012345678', ''),
(2, 'renza', '123984718901237481', ''),
(3, 'rio', '647382910364758329', ''),
(4, 'deta', '233647748901236784', ''),
(5, 'deni', '338749987401237864', ''),
(6, 'yura', '887678765412378656', ''),
(7, 'agum', '123789738263748190', ''),
(8, 'putra', '123748293409857489', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('admin','pegawai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, '123456789012345678', '202cb962ac59075b964b07152d234b70', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
