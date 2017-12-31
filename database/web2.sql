-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2017 at 05:05 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web2`
--
CREATE DATABASE IF NOT EXISTS `web2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `web2`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_by` varchar(30) NOT NULL,
  `update_by` varchar(30) NOT NULL,
  `tempo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `email`, `status`, `create_at`, `update_at`, `create_by`, `update_by`, `tempo`) VALUES
(1, 'admin', 'admin123', 'budi', '', 'admin', '2017-12-30 14:44:01', '0000-00-00 00:00:00', '', '', 0),
(2, 'petugas', 'petugas123', 'budi 2', '', 'petugas', '2017-12-31 15:12:43', '0000-00-00 00:00:00', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `akta`
--

CREATE TABLE `akta` (
  `nik` int(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempatL` varchar(30) NOT NULL,
  `tanggalL` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `goldarah` varchar(3) DEFAULT NULL,
  `alamat` varchar(30) NOT NULL,
  `rtrw` varchar(10) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `kec` varchar(30) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `status_p` varchar(20) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `pendidikan` varchar(30) DEFAULT NULL,
  `tempo` int(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_by` varchar(30) NOT NULL,
  `update_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akta`
--

INSERT INTO `akta` (`nik`, `nama`, `tempatL`, `tanggalL`, `gender`, `goldarah`, `alamat`, `rtrw`, `desa`, `kec`, `agama`, `status_p`, `pekerjaan`, `nama_ayah`, `nama_ibu`, `pendidikan`, `tempo`, `create_at`, `update_at`, `create_by`, `update_by`) VALUES
(1, 'adawokdo', 'akowdkwoak', '1997-12-12', 'Perempuan', 'B', 'awkdjawjd', 'jalwdjali', 'aljdlawijd', 'ljwlkdja', 'Budha', 'Sudah Kawin', 'alwjdlaij', 'ldalkwjd', 'lkwdjalkwj', 'ljdalwjda', 0, '2017-12-29 05:55:37', '2017-12-29 05:55:37', '', 'admin'),
(2, 'aodoawkdo', 'okdoakdoak', '1997-12-12', 'Laki-Laki', 'A', 'alwdkaokd', 'dakwodka', 'odakowkd', 'odkaowkd', 'Islam', 'Belum Kawin', 'oawkdoa', 'dkaowkdo', 'odkawokdao', 'oakdowakd', 0, '2017-12-29 06:41:42', '0000-00-00 00:00:00', '', ''),
(4, 'aodkoawkd', 'dawdapwokd', '1997-12-12', 'Perempuan', 'B', 'akjdawljdl', 'lkdjalkwdj', 'ljalkwdjalkwj', 'ljlkajwlkdj', 'Islam', 'Belum Kawin', 'alkjdlawkjdklj', 'ljdlkawjlkdjwakl', 'ljdalkwjdkla', 'ljlkawjdlkwaj', 1, '2017-12-29 06:42:34', '0000-00-00 00:00:00', '', ''),
(5, 'makdmawkm', 'lakmdalkmdla', '2000-03-13', 'Perempuan', 'O', 'jlandalwjdl', 'alkndalkwn', 'klndalknw', 'ndalknwd', 'Islam', 'Belum Kawin', 'lkajndlak', 'ljdlakjwl', 'ldjljdalkj', 'ajdlkajd', 0, '2017-12-29 06:26:53', '0000-00-00 00:00:00', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_kk`
--

CREATE TABLE `anggota_kk` (
  `id` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `nik_anggota` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_by` varchar(30) NOT NULL,
  `update_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_kk`
--

INSERT INTO `anggota_kk` (`id`, `id_kk`, `nik_anggota`, `status`, `create_at`, `update_at`, `create_by`, `update_by`) VALUES
(4, 3, 2, 'Anak ke 1', '2017-12-29 13:35:43', '0000-00-00 00:00:00', 'admin', ''),
(6, 3, 5, 'Anak ke 2', '2017-12-29 13:38:09', '0000-00-00 00:00:00', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `foto_ktp`
--

CREATE TABLE `foto_ktp` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kartu_k`
--

CREATE TABLE `kartu_k` (
  `id_kk` int(11) NOT NULL,
  `no_kk` int(30) NOT NULL,
  `nik_kepala` int(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `rtrw` varchar(30) NOT NULL,
  `kelu` varchar(30) NOT NULL,
  `keca` varchar(30) NOT NULL,
  `kabu` varchar(30) NOT NULL,
  `tempo` int(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_by` varchar(30) NOT NULL,
  `update_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kartu_k`
--

INSERT INTO `kartu_k` (`id_kk`, `no_kk`, `nik_kepala`, `alamat`, `rtrw`, `kelu`, `keca`, `kabu`, `tempo`, `create_at`, `update_at`, `create_by`, `update_by`) VALUES
(3, 13123, 1, 'adojawdjakljaa', 'ljdlakjdlkawjl', 'jlkadjdlkjaw', 'lkjdlkajdlkwa', 'ajdlakjdlkawj', 0, '2017-12-28 13:53:27', '2017-12-28 13:53:27', 'admin', 'admin'),
(6, 131414, 2, 'lkajdlkawjd', 'ldlkajdlakj', 'lkjdalkwdjalk', 'lkajdlkajwd', 'lkdjalkjdwa', 0, '2017-12-31 10:06:50', '0000-00-00 00:00:00', 'admin', ''),
(7, 14512, 5, 'malkmdalkwm', 'ldkamlwkdm', 'lkdmalkwmd', 'lmdalkmwd', 'ldkmalkwmd', 0, '2017-12-31 13:21:41', '0000-00-00 00:00:00', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `ktp`
--

CREATE TABLE `ktp` (
  `id` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_by` varchar(30) NOT NULL,
  `update_by` varchar(30) NOT NULL,
  `tempo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ktp`
--

INSERT INTO `ktp` (`id`, `nik`, `gambar`, `create_at`, `update_at`, `create_by`, `update_by`, `tempo`) VALUES
(1, 1, '491876.jpg', '2017-12-31 08:08:04', '2017-12-31 08:08:04', 'admin', 'admin', 0),
(5, 5, '672588.jpg', '2017-12-31 14:56:20', '0000-00-00 00:00:00', 'petugas', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktivitas` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `username`, `create_at`, `aktivitas`) VALUES
(1, 'admin', '2017-12-31 13:21:41', 'menambah data akta baru dengan no kk 14512'),
(2, 'petugas', '2017-12-31 14:56:20', 'menambah data ktp dengan nik 5'),
(3, 'admin', '2017-12-31 15:02:34', 'menghapus user dengan id 2'),
(4, 'admin', '2017-12-31 15:03:30', 'mengembalikan user dengan id 2'),
(5, 'admin', '2017-12-31 15:12:18', 'menghapus user dengan id 2'),
(6, 'admin', '2017-12-31 15:12:44', 'mengembalikan user dengan id 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `akta`
--
ALTER TABLE `akta`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `anggota_kk`
--
ALTER TABLE `anggota_kk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik_anggota` (`nik_anggota`);

--
-- Indexes for table `foto_ktp`
--
ALTER TABLE `foto_ktp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kartu_k`
--
ALTER TABLE `kartu_k`
  ADD PRIMARY KEY (`id_kk`),
  ADD UNIQUE KEY `no_kk` (`no_kk`);

--
-- Indexes for table `ktp`
--
ALTER TABLE `ktp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `akta`
--
ALTER TABLE `akta`
  MODIFY `nik` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `anggota_kk`
--
ALTER TABLE `anggota_kk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `foto_ktp`
--
ALTER TABLE `foto_ktp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kartu_k`
--
ALTER TABLE `kartu_k`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ktp`
--
ALTER TABLE `ktp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
