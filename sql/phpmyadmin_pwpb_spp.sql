-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2023 at 07:55 AM
-- Server version: 10.10.3-MariaDB
-- PHP Version: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwpb_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL,
  `diubah` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dibuat` timestamp NULL DEFAULT current_timestamp(),
  `dihapus` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`, `diubah`, `dibuat`, `dihapus`) VALUES
(14, 'XII', 'TKJ', '2023-02-17 02:56:12', '2023-02-17 02:56:12', '0'),
(15, 'XII', 'RPL', '2023-02-18 01:12:21', '2023-02-18 01:12:21', '0'),
(16, 'XII', 'MM', '2023-02-18 01:12:31', '2023-02-18 01:12:31', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` varchar(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(8) NOT NULL,
  `tahun_dibayar` varchar(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `diubah` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dibuat` timestamp NULL DEFAULT current_timestamp(),
  `dihapus` enum('0','1') NOT NULL DEFAULT '0',
  `sisa_pembayaran` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_level` int(11) NOT NULL,
  `diubah` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dibuat` timestamp NULL DEFAULT current_timestamp(),
  `dihapus` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama`, `id_level`, `diubah`, `dibuat`, `dihapus`, `status`) VALUES
(55, '1121', '$argon2i$v=19$m=65536,t=4,p=1$Vkd6c0JtNkl0MEQ1LmdyWg$9ZvwyllyeeXNI8cKgWe/gdQSqc2n5L0iKdSvls/MGPU', '1121', 2, '2023-02-13 05:20:39', '2023-02-12 05:04:16', '0', '1'),
(57, 'aeviterna', '$argon2i$v=19$m=65536,t=4,p=1$ZzdxTkx0MVVVSVBwNjBCWA$5T1GJmjpOSsPLi8UBopU49LWBmo+cqQ3d9aLHr2bA2E', 'aeviterna', 3, '2023-02-13 05:20:54', '2023-02-12 05:04:16', '0', '1'),
(58, 'aeviterna_joomla', '$argon2i$v=19$m=65536,t=4,p=1$MklYRzRJRW1ud20xZUkyMA$rgyCrs/9ZbkHjIz88lyAz17/PlRnJVFEr2jvmDgSaGM', 'aeviterna_joomla', 2, '2023-02-14 07:28:53', '2022-02-12 05:04:16', '0', '1'),
(60, 'mirae', '$argon2i$v=19$m=65536,t=4,p=1$dkk2YzN2NGVNaVpPSDlNOQ$C3MpCnLIwOCvspAfCwmS4fLm/RsCGiNAAzX6XHJ0h/c', 'mirae2', 2, '2023-02-16 03:19:49', '2020-02-14 03:17:14', '0', '0'),
(61, 'superadministrator', '$argon2i$v=19$m=65536,t=4,p=1$T2VaSTNhOFJwVnhXNFR5Lw$62tzQzoByZ5jxN4oOwpMeHLqJU1Vsdnxr/2rPHnAp6Y', 'superadministrator', 4, '2023-02-16 01:15:49', '2023-02-16 01:05:48', '0', '1'),
(62, 'petugas', '$argon2i$v=19$m=65536,t=4,p=1$UUJzM0l2RFVQV0lLSTh3MQ$Ef/ZFaHhWZEHIiB/kFDnWLLoc+xvaaJDOw+lr4WmHKs', 'petugas', 2, '2023-02-16 01:16:24', '2023-02-16 01:06:45', '0', '1'),
(63, 'administrator', '$argon2i$v=19$m=65536,t=4,p=1$WlM4VU13UVpSUWRWUW1sYw$+EzimY239Cszei7BXOmyatQ/fw98YzGbms7YQcnKsDg', 'administrator', 3, '2023-02-16 01:07:28', '2023-02-16 01:07:20', '0', '0'),
(64, 'root', '$argon2i$v=19$m=65536,t=4,p=1$S1kydEZKbWJYQnFzQXc4MA$qG99k4jSqHF9KyJWdCQJr8PhL0Lr2qMrfoBGeCwFjDU', 'root', 2, '2023-02-16 03:58:29', '2023-02-16 03:58:29', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(11) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `password` text NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `diubah` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dibuat` timestamp NULL DEFAULT current_timestamp(),
  `dihapus` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`, `password`, `id_level`, `diubah`, `dibuat`, `dihapus`) VALUES
('112', '112', 'Sagittarius Black', 14, 'England, United Kingdom', '08112', 8, '$argon2i$v=19$m=65536,t=4,p=1$VFBVWi9JZE9SWVFaSENQMQ$U/vIMv4UU4Xaio/HLKimBfhskjwhbd5SJBruXKC3L28', 1, '2023-02-17 02:56:57', '2023-02-17 02:56:57', '0');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `diubah` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dibuat` timestamp NULL DEFAULT current_timestamp(),
  `dihapus` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`, `diubah`, `dibuat`, `dihapus`) VALUES
(8, 2023, 1500000, '2023-02-17 02:56:26', '2023-02-17 02:56:26', '0'),
(9, 2023, 2000000, '2023-02-17 02:57:16', '2023-02-17 02:57:16', '0'),
(10, 2022, 500000, '2023-02-18 01:12:51', '2023-02-18 01:12:51', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `petugas_pk` (`username`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
