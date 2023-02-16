-- MariaDB dump 10.19  Distrib 10.9.5-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: pwpb_spp
-- ------------------------------------------------------
-- Server version	10.9.5-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL,
  `diubah` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dibuat` timestamp NULL DEFAULT current_timestamp(),
  `dihapus` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES
(1,'XII','RPL',NULL,NULL,'0'),
(6,'XII','TKJ','2023-02-14 01:51:48','2023-02-14 01:51:48','0'),
(7,'XI','RPL','2023-02-14 01:51:48','2023-02-14 01:51:48','0'),
(8,'XI','TKJ','2023-02-14 01:51:48','2023-02-14 01:51:48','0'),
(9,'X','RPL','2023-02-14 01:51:48','2023-02-14 01:51:48','0'),
(10,'X','TKJ','2023-02-14 01:51:48','2023-02-14 01:51:48','0'),
(11,'XII','BDP','2023-02-14 02:08:02','2023-02-14 02:08:02','0');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_petugas` (`id_petugas`),
  KEY `nisn` (`nisn`),
  KEY `id_spp` (`id_spp`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`),
  CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_spp`) REFERENCES `siswa` (`id_spp`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` VALUES
(7,57,'112','2023-02-15','02','2023',2,600000,'2023-02-15 01:34:00','2023-02-15 01:34:00','0'),
(9,57,'112','2023-01-24','01','2023',2,700000,'2023-02-15 01:37:07','2023-02-15 01:37:07','0'),
(10,57,'9111','2023-02-16','02','2023',2,700000,'2023-02-15 23:49:23','2023-02-15 23:49:23','0'),
(11,57,'1121','2023-02-16','02','2023',1,400000,'2023-02-15 23:54:54','2023-02-15 23:54:54','0'),
(12,57,'9111','2023-03-23','03','2023',2,700000,'2023-02-16 00:50:58','2023-02-16 00:50:58','0');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `petugas`
--

DROP TABLE IF EXISTS `petugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_level` int(11) NOT NULL,
  `diubah` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dibuat` timestamp NULL DEFAULT current_timestamp(),
  `dihapus` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id_petugas`),
  UNIQUE KEY `petugas_pk` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `petugas`
--

LOCK TABLES `petugas` WRITE;
/*!40000 ALTER TABLE `petugas` DISABLE KEYS */;
INSERT INTO `petugas` VALUES
(55,'1121','$argon2i$v=19$m=65536,t=4,p=1$Vkd6c0JtNkl0MEQ1LmdyWg$9ZvwyllyeeXNI8cKgWe/gdQSqc2n5L0iKdSvls/MGPU','1121',2,'2023-02-13 05:20:39','2023-02-12 05:04:16','0','1'),
(57,'aeviterna','$argon2i$v=19$m=65536,t=4,p=1$ZzdxTkx0MVVVSVBwNjBCWA$5T1GJmjpOSsPLi8UBopU49LWBmo+cqQ3d9aLHr2bA2E','aeviterna',3,'2023-02-13 05:20:54','2023-02-12 05:04:16','0','1'),
(58,'aeviterna_joomla','$argon2i$v=19$m=65536,t=4,p=1$MklYRzRJRW1ud20xZUkyMA$rgyCrs/9ZbkHjIz88lyAz17/PlRnJVFEr2jvmDgSaGM','aeviterna_joomla',2,'2023-02-14 07:28:53','2022-02-12 05:04:16','0','1'),
(60,'mirae','$argon2i$v=19$m=65536,t=4,p=1$dkk2YzN2NGVNaVpPSDlNOQ$C3MpCnLIwOCvspAfCwmS4fLm/RsCGiNAAzX6XHJ0h/c','mirae2',2,'2023-02-16 03:19:49','2020-02-14 03:17:14','0','0'),
(61,'superadministrator','$argon2i$v=19$m=65536,t=4,p=1$T2VaSTNhOFJwVnhXNFR5Lw$62tzQzoByZ5jxN4oOwpMeHLqJU1Vsdnxr/2rPHnAp6Y','superadministrator',4,'2023-02-16 01:15:49','2023-02-16 01:05:48','0','1'),
(62,'petugas','$argon2i$v=19$m=65536,t=4,p=1$UUJzM0l2RFVQV0lLSTh3MQ$Ef/ZFaHhWZEHIiB/kFDnWLLoc+xvaaJDOw+lr4WmHKs','petugas',2,'2023-02-16 01:16:24','2023-02-16 01:06:45','0','1'),
(63,'administrator','$argon2i$v=19$m=65536,t=4,p=1$WlM4VU13UVpSUWRWUW1sYw$+EzimY239Cszei7BXOmyatQ/fw98YzGbms7YQcnKsDg','administrator',3,'2023-02-16 01:07:28','2023-02-16 01:07:20','0','0'),
(64,'root','$argon2i$v=19$m=65536,t=4,p=1$S1kydEZKbWJYQnFzQXc4MA$qG99k4jSqHF9KyJWdCQJr8PhL0Lr2qMrfoBGeCwFjDU','root',2,'2023-02-16 03:58:29','2023-02-16 03:58:29','0','0');
/*!40000 ALTER TABLE `petugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `dihapus` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`nisn`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_spp` (`id_spp`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES
('0060071580','006112','Harry James Potter',1,'Potter Ancestral Manor','08112112',2,'$argon2i$v=19$m=65536,t=4,p=1$THpEbnNHbWZqY25sL3pFYQ$Yw/S/tL3vyhlc8mLygjJ9Q1BfysTLHYXwFseHmZpz1E',1,'2023-02-16 03:49:34','2023-02-16 03:49:34','0'),
('112','112','aeviterna',11,'Alamat Rumah','1',2,'$argon2i$v=19$m=65536,t=4,p=1$UVJkb3RkalBoOGtZZ0JsRQ$QzMJas9LKVNS+bSASw3YKShxiOThdOjJtJyoPEm8B00',1,'2023-02-16 03:06:58','2023-02-12 05:05:19','0'),
('1121','11211','Julius Tristan',10,'Alamat Julius Tristan','1',1,'$argon2i$v=19$m=65536,t=4,p=1$LldjWkU5N0d1Y3dRNHFsLg$lqxcHikpZ7+EWWaOcRWbdnHbnT7Tm0mF/DzGR1Wtq+Y',1,'2023-02-16 03:18:49','2023-02-14 06:01:18','0'),
('18191012','121212121','Sagittarius Arcturus Black',6,'Grimmauld Place','018291821',1,'$argon2i$v=19$m=65536,t=4,p=1$L3VsWXg5S25KRkg4Nnd4Zg$KjgcqKuut8081CKwTZ+EqE49juEvvjOhTHM4LtCQBNM',1,'2023-02-16 03:53:46','2023-02-16 03:53:46','0'),
('2020112233','493825923','Daphne Greengrass',11,'Greengrass Manor','092918391',1,'$argon2i$v=19$m=65536,t=4,p=1$dmpRazJzRVJYSzNpaGVleQ$zJ0/+/4cZVAPMYwlXhMQPbb8gJcbt+l+H8XPraqC5kU',1,'2023-02-16 03:51:48','2023-02-16 03:51:48','0'),
('51985798135','424242','Antares Polaris Black',1,'Black Manor','08291821',1,'$argon2i$v=19$m=65536,t=4,p=1$ZW1ZNTNZM2tsbDNvSnZScQ$ESpLsGLBU5WfNayVXHzg/UroWFSpI2LVW8eBILwgoag',1,'2023-02-16 03:58:07','2023-02-16 03:58:07','0'),
('9111','123','Yehezkiel Dio',1,'Jl. Inpress V','08112',2,'$argon2i$v=19$m=65536,t=4,p=1$Z0ZzNFIyaEllMmo2S1p5Tg$Yio5RU7fK3OMmpkWBkwPibjdJ8I/6YiuD+0v1r92e2U',1,'2023-02-16 03:35:47','2023-02-14 06:17:31','0');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spp`
--

DROP TABLE IF EXISTS `spp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `diubah` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dibuat` timestamp NULL DEFAULT current_timestamp(),
  `dihapus` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_spp`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spp`
--

LOCK TABLES `spp` WRITE;
/*!40000 ALTER TABLE `spp` DISABLE KEYS */;
INSERT INTO `spp` VALUES
(1,2023,300000,'2023-02-12 05:04:57','2023-02-12 05:04:58','0'),
(2,2022,600000,'2023-02-14 02:08:51','2023-02-14 02:08:51','0');
/*!40000 ALTER TABLE `spp` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-16 12:12:15
