-- --------------------------------------------------------
-- Host:                         11.11.11.10
-- Server version:               5.7.30-0ubuntu0.18.04.1-log - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for monitoring
DROP DATABASE IF EXISTS `monitoring`;
CREATE DATABASE IF NOT EXISTS `monitoring` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `monitoring`;

-- Dumping structure for table monitoring.m_jabatan
DROP TABLE IF EXISTS `m_jabatan`;
CREATE TABLE IF NOT EXISTS `m_jabatan` (
  `idJabatan` int(3) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idJabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table monitoring.m_jabatan: ~8 rows (approximately)
/*!40000 ALTER TABLE `m_jabatan` DISABLE KEYS */;
REPLACE INTO `m_jabatan` (`idJabatan`, `jabatan`) VALUES
	(1, 'Direktur UT Purwokerto'),
	(2, 'KasubagTU'),
	(3, 'Koordinator BBLBA'),
	(4, 'Koordinator Registrasi dan Ujian'),
	(5, 'Staff'),
	(8, 'Staf Registrasi'),
	(9, 'Staf BBLBA'),
	(10, 'Staf TU');
/*!40000 ALTER TABLE `m_jabatan` ENABLE KEYS */;

-- Dumping structure for table monitoring.m_level
DROP TABLE IF EXISTS `m_level`;
CREATE TABLE IF NOT EXISTS `m_level` (
  `idLevel` int(3) NOT NULL AUTO_INCREMENT,
  `level` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idLevel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table monitoring.m_level: ~2 rows (approximately)
/*!40000 ALTER TABLE `m_level` DISABLE KEYS */;
REPLACE INTO `m_level` (`idLevel`, `level`) VALUES
	(1, 'Admin'),
	(2, 'Pemonitor');
/*!40000 ALTER TABLE `m_level` ENABLE KEYS */;

-- Dumping structure for table monitoring.m_menu
DROP TABLE IF EXISTS `m_menu`;
CREATE TABLE IF NOT EXISTS `m_menu` (
  `idMenu` int(3) NOT NULL AUTO_INCREMENT,
  `menu` varchar(50) DEFAULT NULL,
  `idLevel` int(3) DEFAULT NULL,
  PRIMARY KEY (`idMenu`),
  KEY `i_menu_m_menu` (`menu`),
  KEY `i_idLevel_m_menu` (`idLevel`),
  CONSTRAINT `fk_idLevel_m_menu` FOREIGN KEY (`idLevel`) REFERENCES `m_level` (`idLevel`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table monitoring.m_menu: ~8 rows (approximately)
/*!40000 ALTER TABLE `m_menu` DISABLE KEYS */;
REPLACE INTO `m_menu` (`idMenu`, `menu`, `idLevel`) VALUES
	(1, 'Dashboard', 1),
	(2, 'Dashboard', 2),
	(3, 'Jabatan', 1),
	(4, 'Level', 1),
	(5, 'Pegawai', 1),
	(6, 'Pokjar', 1),
	(7, 'Jadwal', 1),
	(8, 'LaporanMonitoring', 2),
	(9, 'Monitoring', 2),
	(10, 'Tutor', 1),
	(11, 'Report', 1);
/*!40000 ALTER TABLE `m_menu` ENABLE KEYS */;

-- Dumping structure for table monitoring.m_pokjar
DROP TABLE IF EXISTS `m_pokjar`;
CREATE TABLE IF NOT EXISTS `m_pokjar` (
  `idPokjar` int(3) NOT NULL AUTO_INCREMENT,
  `pokjar` varchar(100) DEFAULT NULL,
  `nip` varchar(26) DEFAULT NULL,
  `namaPengurus` varchar(50) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` tinytext,
  `kabupaten` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idPokjar`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table monitoring.m_pokjar: ~9 rows (approximately)
/*!40000 ALTER TABLE `m_pokjar` DISABLE KEYS */;
REPLACE INTO `m_pokjar` (`idPokjar`, `pokjar`, `nip`, `namaPengurus`, `telp`, `alamat`, `kabupaten`) VALUES
	(1, 'mbuh', '78956465', 'ra ngerti', '085726068296', 'Kalibagor', 'banyumas'),
	(2, 'SMP Muh 3 Purwokerto', '', 'Wahyu Nugroho', '085227722522', 'Purwokerto', 'Banyumas'),
	(3, 'Purwokerto Utara', '', 'Endang', '087777777777', 'Purwokerto', 'Banyumas'),
	(4, 'PKBM Handayani', '', 'Farid Fasol', '085227366247', 'Rakit', 'Banjarnegara'),
	(5, 'Cilacap Tengah 2', '', 'Nasiman', '085647949555', 'cilacap', 'cilacap'),
	(6, 'Cipari', '', 'Mahtup ', '081327537433', 'cipari', 'cilacap'),
	(7, 'Cilacap Tengah', '', 'Tri Yuningsih', '085878692556', 'cilacap', 'cilacap'),
	(8, ' Kroya ', '', 'Mulyono', '085200399335', 'Kroya', 'Cilacap'),
	(9, 'Tunas Mekar Karangpucung', '', 'Ratih Muniroh', '081548819775', 'Karangpucung', 'Cilacap'),
	(10, 'MUHAMMADIYAH BREBES', '4100050', 'KASNO', '000', 'Brebes', 'BREBES'),
	(11, 'SMP N 3 KEBUMEN', '4100039', 'DARMONO', '081548866928', 'KEBUMEN', 'KEBUMEN');
/*!40000 ALTER TABLE `m_pokjar` ENABLE KEYS */;

-- Dumping structure for table monitoring.m_tutor
DROP TABLE IF EXISTS `m_tutor`;
CREATE TABLE IF NOT EXISTS `m_tutor` (
  `idTutor` int(3) NOT NULL AUTO_INCREMENT,
  `nip` varchar(26) DEFAULT NULL,
  `gelar_d` varchar(6) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `gelar_b` varchar(10) DEFAULT NULL,
  `alamat` tinytext,
  `telp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idTutor`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table monitoring.m_tutor: ~14 rows (approximately)
/*!40000 ALTER TABLE `m_tutor` DISABLE KEYS */;
REPLACE INTO `m_tutor` (`idTutor`, `nip`, `gelar_d`, `nama`, `gelar_b`, `alamat`, `telp`) VALUES
	(1, '111', 'Dr.', 'Bagus Sudrajat', 'M.Kom', 'rawalo rt 02/05, rawalo, banyumas', '085726068296'),
	(2, '234', '', 'nani', 'Amd.Kom', 'pwt', '00000'),
	(3, '196002071986031015', '', 'Iman Kridarso', ', M.Si', 'Jl. Cendana III No. 02 Brebes', '08156697018'),
	(4, '195801241986031016', 'Drs', 'Supriyanto', '', 'n sutejo 36 B Purwokerto', '082138763903'),
	(5, '197906132011012004', '', 'Nur Aeni', 'M.Kom', 'jl. samiaji desa kersana ', '085869698522'),
	(6, '196009061980121001', 'DRS', 'SUYATNO', '', 'SMP N 01 PATIMUAN KABUPATEN CILACAP', '081327200123'),
	(7, '197504302007012007', '', 'Siti Lutfiyah, S.Pd., M.Pd', ' S.Pd., M.', 'Jl. Dr. Setiabudi no.17 Brebes', '082313926271'),
	(8, '196104071987021001', 'DRS', 'DARMANTO SAHAT SATYAWAN,', ' M.Kes,M.S', 'JL SOKAJATI NO 121 KELURAHAN BANTARSOKA PURWOKERTO BARAT', '08159259378'),
	(9, '131660662', '', 'TENANG HARYANTO ', 'SH,MH', 'BANJARNEGARA', '0'),
	(10, '196901011990031014', '', 'Abdul Syukur', 'S.IP., M.M', 'Jl. Sugiyana RT.04 RW.04 Dukuhmadu Kec. Lebaksiu Kab. Tegal', '08179587836'),
	(11, '197504302007012007', '', 'Siti Lutfiyah, ', 'S.Pd., M.P', 'Jl. Dr. Setiabudi no.17 Brebes', '082313926271'),
	(12, '00', 'Dr ', 'irene kartika eka wijayanti', ', S.P., M.', 'perum shapire recidence', '081288501097'),
	(13, '197504302007012007', '', 'Siti Lutfiyah,', ' S.Pd., M.', 'Jl. Dr. Setiabudi no.17 Brebes', '082313926271'),
	(14, '41003498', '', 'Karina Odia julialevi,', 'SE,M.Si,Ak', 'Jl.Pahlawan V No.11 RT 2 RW 3 Kel.Tanjung Purwokerto Selatan', '085727419128'),
	(15, '195407121973032002', '', 'MARGARETHA SRI SUKARTI, ', 'M.PD', 'jl. sokajaya 58, sokanegara, purwokerto', '081327196300');
/*!40000 ALTER TABLE `m_tutor` ENABLE KEYS */;

-- Dumping structure for table monitoring.m_usr
DROP TABLE IF EXISTS `m_usr`;
CREATE TABLE IF NOT EXISTS `m_usr` (
  `nip` varchar(26) NOT NULL,
  `idJabatan` int(3) DEFAULT NULL,
  `gelar_d` varchar(6) DEFAULT '',
  `nama` varchar(50) DEFAULT NULL,
  `gelar_b` varchar(10) DEFAULT NULL,
  `alamat` tinytext,
  `pswd` varchar(60) DEFAULT NULL,
  `idLevel` int(3) DEFAULT NULL,
  PRIMARY KEY (`nip`),
  KEY `i_idJabatan_m_usr` (`idJabatan`),
  KEY `i_idLevel_m_usr` (`idLevel`),
  KEY `i_nama_m_usr` (`nama`),
  CONSTRAINT `fk_idJabatan_m_usr` FOREIGN KEY (`idJabatan`) REFERENCES `m_jabatan` (`idJabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_idLevel_m_usr` FOREIGN KEY (`idLevel`) REFERENCES `m_level` (`idLevel`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table monitoring.m_usr: ~30 rows (approximately)
/*!40000 ALTER TABLE `m_usr` DISABLE KEYS */;
REPLACE INTO `m_usr` (`nip`, `idJabatan`, `gelar_d`, `nama`, `gelar_b`, `alamat`, `pswd`, `idLevel`) VALUES
	('12', 4, '', 'Chayatul Farikhoh', 'M.Kom', 'farikah', 'ZmFyaWthaDA3', 1),
	('123456', 9, '', 'Winantyo Trisnandi', 'S.KL', 'penatusan', 'MTIzNDU2', 2),
	('196001141988032002', 3, 'Dra.', 'Sri Weningsih', 'M.Si', 'Purwokerto', 'MTIzNDU2', 2),
	('196002061988031001', 1, 'Dr.', 'Adi Suryanto', 'M.Pd', 'Yogyakarta', 'MTIzNDU2', 2),
	('196309221988031002', 5, 'Drs', 'Supriyono', 'M.Pd', 'kebumen', 'MTIzNDU=', 2),
	('196403061987032002', 5, '', 'Harwatiningsih', '', 'Purwokerto', 'MTIzNDU=', 2),
	('196405071989031003', 2, '', 'Anto Widiatmoko', 'SE', 'Purwokerto', 'MTIzNDU=', 2),
	('196410061989031002', 5, '', 'Tokhid Munandar', '', 'Puwokerto', 'MTIzNDU=', 2),
	('196504282005011001', 1, '', 'Endro Sugiyo', '', 'Puwokerto', 'MTIzNDU=', 2),
	('196806262003121001', 5, '', 'Pariyun', 'S.H', 'wonosobo', 'MTIzNDU=', 2),
	('197109042005011002', 1, '', 'parlan', '', 'kebumen', 'MTIzNDU=', 2),
	('197109222001121001', 5, '', 'Saifrudin', 'S.Kom', 'Purwokerto', 'MTIzNDU=', 2),
	('197306142005011001', 5, '', 'Darso', '', 'Purwokerto', 'MTIzNDU=', 2),
	('197308022005012001', 5, '', 'Agustina', '', 'purbalingga', 'MTIzNDU=', 2),
	('197310272003121001', 5, '', 'Hendy Yudoko', 'S.P.', 'Purwokerto', 'MTIzNDU=', 2),
	('197407202005012001', 5, '', 'Violina Widyani', '', 'purbalingga', 'MTIzNDU=', 2),
	('197512302003122001', 5, '', 'Setyowati', 'S.H', 'Purbalingga', 'MTIzNDU=', 2),
	('197902192006041001', 5, '', 'Adi Setyawan', 'S.E', 'Purwokerto', 'MTIzNDU=', 2),
	('198001282005011001', 4, '', 'Ismiantoro Azis S', 'S.Kom', 'Purwokerto', 'MTIzNDU=', 2),
	('1988 ', 10, '', 'Arif Sidik Tunggal Saputra ', 'A.Md', 'Gumelem kulon', 'MTIzNDU=', 1),
	('198809032016TKT0406', 5, '', 'Arif Sidik Tunggal Saputra', 'A.Md', 'Banjarnegara', 'MTIzNDU=', 2),
	('198909242015BLU025', 5, '', 'Aknoro Septi Oktanon', 'A.Md.', 'Purwokerto', 'MTIzNDU=', 2),
	('198912202016TKT0408', 5, '', 'Dina Khatulistyawati', 'S.I.Kom', 'Purwokerto', 'MTIzNDU=', 2),
	('199105122019032023', 9, '', 'Rani Darojah', 'S.Pd.,M.Pd', 'banjarnegara', 'MTIzNDU2', 2),
	('199209062018TKT1030', 5, '', 'Risqi Dias Kurniawan', 'S.kom', 'Purwokerto', 'MTIzNDU=', 2),
	('199301062016TKT0407', 5, '', 'Shinta Devi', 'S.I.Kom', 'wonosobo', 'MTIzNDU=', 2),
	('199301152018TKT1028', 5, '', 'Ovi Shoviana', 'S.E', 'Sokaraja', 'MTIzNDU=', 2),
	('199308072018TKT1029', 1, '', 'Wika Sevi Oktanin', 'S.Pd', 'Sokaraja', 'MTIzNDU=', 2),
	('199311172020TKT1263', 5, '', 'Ilham Jauhari', 'S.Kom', 'Purwokerto', 'MTIzNDU=', 2),
	('20202', 5, '', 'Aaa', 'S. Kom', 'Purwokerto', 'MTIzNDU=', 2);
/*!40000 ALTER TABLE `m_usr` ENABLE KEYS */;

-- Dumping structure for table monitoring.t_bukti
DROP TABLE IF EXISTS `t_bukti`;
CREATE TABLE IF NOT EXISTS `t_bukti` (
  `idJadwal` int(3) NOT NULL,
  `sppd` text,
  `bap` text,
  `st` text,
  PRIMARY KEY (`idJadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table monitoring.t_bukti: ~2 rows (approximately)
/*!40000 ALTER TABLE `t_bukti` DISABLE KEYS */;
REPLACE INTO `t_bukti` (`idJadwal`, `sppd`, `bap`, `st`) VALUES
	(1, 'sppd_1.pdf', 'bap_1.pdf', 'st_1.pdf'),
	(17, 'sppd_17.JPG', 'bap_17.JPG', NULL);
/*!40000 ALTER TABLE `t_bukti` ENABLE KEYS */;

-- Dumping structure for table monitoring.t_jadwal
DROP TABLE IF EXISTS `t_jadwal`;
CREATE TABLE IF NOT EXISTS `t_jadwal` (
  `idJadwal` int(3) NOT NULL AUTO_INCREMENT,
  `tglInput` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `masa` char(6) DEFAULT NULL,
  `idPokjar` int(3) DEFAULT NULL,
  `hariLaksana` varchar(15) DEFAULT NULL,
  `tglLaksana` date DEFAULT NULL,
  `nipPj` char(26) DEFAULT NULL,
  `nipPemonitor` char(26) DEFAULT NULL,
  PRIMARY KEY (`idJadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Dumping data for table monitoring.t_jadwal: ~19 rows (approximately)
/*!40000 ALTER TABLE `t_jadwal` DISABLE KEYS */;
REPLACE INTO `t_jadwal` (`idJadwal`, `tglInput`, `masa`, `idPokjar`, `hariLaksana`, `tglLaksana`, `nipPj`, `nipPemonitor`) VALUES
	(1, '2020-01-28 18:39:49', '2019-2', 1, 'Rabu', '2020-02-04', '12345', '12345'),
	(2, '2020-01-29 08:32:46', '20201', 2, 'Senin', '2020-02-02', '196001141988032002', '12345'),
	(3, '2020-02-13 10:20:10', '20201', 5, 'Minggu', '2020-02-15', '196001141988032002', '12345'),
	(4, '2020-03-11 20:14:31', '2019-2', 5, 'Kamis', '2020-03-25', '196001141988032002', '196405071989031003'),
	(5, '2020-03-11 20:15:43', '2019-2', 5, 'Kamis', '2020-03-25', '196001141988032002', '196405071989031003'),
	(6, '2020-03-11 20:17:11', '2020-1', 2, 'Selasa', '2020-03-11', '196002061988031001', '196405071989031003'),
	(7, '2020-03-11 20:18:10', '2020-1', 2, 'Selasa', '2020-03-11', '196002061988031001', '196405071989031003'),
	(8, '2020-03-11 20:18:41', '2020-1', 2, 'Selasa', '2020-03-11', '196002061988031001', '196405071989031003'),
	(9, '2020-03-11 20:27:39', '2020-1', 6, 'Rabu', '2020-03-13', '196002061988031001', '198001282005011001'),
	(10, '2020-03-11 20:29:45', '2020-1', 6, 'Rabu', '2020-03-13', '196002061988031001', '198001282005011001'),
	(11, '2020-03-11 20:30:16', '2020-1', 6, 'Rabu', '2020-03-13', '196002061988031001', '198001282005011001'),
	(12, '2020-03-11 20:30:50', '2020-1', 6, 'Rabu', '2020-03-13', '196002061988031001', '198001282005011001'),
	(13, '2020-03-16 14:24:08', '20201', 2, 'Senin', '2020-03-21', '196002061988031001', '12345'),
	(15, '2020-07-03 00:12:48', '20202', 2, 'Sabtu', '2020-07-05', '196001141988032002', '198001282005011001'),
	(16, '2020-07-08 21:41:40', '20202', 4, 'Sabtu', '2020-07-11', '196001141988032002', '20202'),
	(17, '2020-07-10 19:31:51', '20201', 10, 'Sabtu', '2020-07-11', '196001141988032002', '197310272003121001'),
	(18, '2020-07-10 19:45:41', '20202', 2, 'Sabtu', '2020-07-11', '196001141988032002', '198909242015BLU025'),
	(19, '2020-07-24 14:32:53', '20202', 2, 'Jumat', '2020-07-24', '196001141988032002', '123456'),
	(20, '2020-07-24 14:52:14', '20202', 2, 'Sabtu', '2020-07-24', '196001141988032002', '199105122019032023');
/*!40000 ALTER TABLE `t_jadwal` ENABLE KEYS */;

-- Dumping structure for table monitoring.t_laporanMonitoring
DROP TABLE IF EXISTS `t_laporanMonitoring`;
CREATE TABLE IF NOT EXISTS `t_laporanMonitoring` (
  `idJadwal` int(3) NOT NULL,
  `uraian` int(1) DEFAULT '0',
  `program` int(1) DEFAULT '0',
  `tglBerangkat` date DEFAULT NULL,
  `jmlHari` varchar(15) DEFAULT NULL,
  `uraianHasil` text,
  PRIMARY KEY (`idJadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table monitoring.t_laporanMonitoring: ~7 rows (approximately)
/*!40000 ALTER TABLE `t_laporanMonitoring` DISABLE KEYS */;
REPLACE INTO `t_laporanMonitoring` (`idJadwal`, `uraian`, `program`, `tglBerangkat`, `jmlHari`, `uraianHasil`) VALUES
	(1, 2, 0, '2020-07-01', '3 (Tiga)', '1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n2. Curabitur faucibus velit vitae turpis rutrum viverra.\r\n3. Sed iaculis nisl sit amet diam egestas, quis convallis felis lobortis.\r\n4. Aliquam ac dolor bibendum, scelerisque nisl in, aliquet ju'),
	(2, 0, 0, '2020-02-02', '1', 'berjalan dengan baik\r\n'),
	(3, 0, 0, '2020-02-15', '1', 'bagus dan tertib'),
	(13, 1, 0, '2020-03-15', '1', 'bagus sekali'),
	(16, 0, 0, '2020-07-11', '1', 'Oke'),
	(17, 1, 1, '2020-07-11', '1', 'BAIK KOK'),
	(20, 0, 0, '2020-07-24', '1', 'ok');
/*!40000 ALTER TABLE `t_laporanMonitoring` ENABLE KEYS */;

-- Dumping structure for table monitoring.t_laporanMonitoring2
DROP TABLE IF EXISTS `t_laporanMonitoring2`;
CREATE TABLE IF NOT EXISTS `t_laporanMonitoring2` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `idJadwal` int(3) DEFAULT NULL,
  `nipTutor` varchar(26) DEFAULT NULL,
  `rat` int(1) DEFAULT '0',
  `cat` int(1) DEFAULT '0',
  `st` int(1) DEFAULT '0',
  `pengesahan` int(1) DEFAULT '0',
  `kisi` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table monitoring.t_laporanMonitoring2: ~11 rows (approximately)
/*!40000 ALTER TABLE `t_laporanMonitoring2` DISABLE KEYS */;
REPLACE INTO `t_laporanMonitoring2` (`id`, `idJadwal`, `nipTutor`, `rat`, `cat`, `st`, `pengesahan`, `kisi`) VALUES
	(1, 1, '234', 1, 0, 1, 0, 1),
	(2, 1, '111', 1, 1, 0, 1, 0),
	(4, 16, '111', 1, 1, 1, 1, 0),
	(5, 16, '234', 1, 1, 1, 1, 0),
	(6, 13, '111', 1, 1, 1, 1, 1),
	(7, 17, '111', 1, 1, 1, 1, 1),
	(8, 17, '197504302007012007', 1, 1, 1, 1, 1),
	(9, 17, '197504302007012007', 0, 0, 0, 0, 0),
	(10, 17, '197504302007012007', 0, 0, 0, 0, 0),
	(11, 20, '197906132011012004', 1, 1, 1, 1, 1),
	(12, 20, '195801241986031016', 1, 1, 1, 1, 1);
/*!40000 ALTER TABLE `t_laporanMonitoring2` ENABLE KEYS */;

-- Dumping structure for table monitoring.t_monitoring
DROP TABLE IF EXISTS `t_monitoring`;
CREATE TABLE IF NOT EXISTS `t_monitoring` (
  `idJadwal` int(3) NOT NULL,
  `seleksi` tinytext,
  `persyaratan` tinytext,
  `kondisi` tinytext,
  `disposisi` text,
  PRIMARY KEY (`idJadwal`),
  CONSTRAINT `fk_idJadwal_monit` FOREIGN KEY (`idJadwal`) REFERENCES `t_jadwal` (`idJadwal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table monitoring.t_monitoring: ~6 rows (approximately)
/*!40000 ALTER TABLE `t_monitoring` DISABLE KEYS */;
REPLACE INTO `t_monitoring` (`idJadwal`, `seleksi`, `persyaratan`, `kondisi`, `disposisi`) VALUES
	(1, 'Angkutan Umum#Jarak akses mahasiswa#Ukuran meja/kursi#Toilet#Penerangan#Penerangan#Ventilasi#Kebisingan#Jumlah Ruang#Biaya Sewa#Penginapan PJTU', 'Ada#Relatif sama#Standar#Ada#Min jendela besar#ada lampu/listrik#Min jendela besar#Tenang/Tidak Bising#-#-#-', 'Ada#Terjangkau#Layak#Layak#Baik#Menyala#Baik#Bising#Cukup#Ada#Ada', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
	(2, 'Angkutan Umum#Jarak akses mahasiswa#Ukuran meja/kursi#Toilet#Penerangan#Penerangan#Ventilasi#Kebisingan#Jumlah Ruang#Biaya Sewa#Penginapan PJTU', 'Ada#Relatif sama#Standar#Ada#Min jendela besar#ada lampu/listrik#Min jendela besar#Tenang/Tidak Bising#-#-#-', 'Ada#Terjangkau#Layak#Layak#Baik#Menyala#Baik#Tidak#Cukup#Ada#Ada', 'Berjalan dengan lancar'),
	(3, 'Angkutan Umum#Jarak akses mahasiswa#Ukuran meja/kursi#Toilet#Penerangan#Penerangan#Ventilasi#Kebisingan#Jumlah Ruang#Biaya Sewa#Penginapan PJTU', 'Ada#Relatif sama#Standar#Ada#Min jendela besar#ada lampu/listrik#Min jendela besar#Tenang/Tidak Bising#-#-#-', 'Ada#Terjangkau#Layak#Layak#Baik#Menyala#Baik#Tidak#Cukup#Ada#Ada', 'Berjalan dengan baik'),
	(13, 'Angkutan Umum#Jarak akses mahasiswa#Ukuran meja/kursi#Toilet#Penerangan#Penerangan#Ventilasi#Kebisingan#Jumlah Ruang#Biaya Sewa#Penginapan PJTU', 'Ada#Relatif sama#Standar#Ada#Min jendela besar#ada lampu/listrik#Min jendela besar#Tenang/Tidak Bising#-#-#-', 'Ada#Terjangkau#Layak#Layak#Baik#Menyala#Baik#Bising#Cukup#Ada#Ada', 'tak tau saya mau diisi apaan dah'),
	(16, 'Angkutan Umum#Jarak akses mahasiswa#Ukuran meja/kursi#Toilet#Penerangan#Penerangan#Ventilasi#Kebisingan#Jumlah Ruang#Biaya Sewa#Penginapan PJTU', 'Ada#Relatif sama#Standar#Ada#Min jendela besar#ada lampu/listrik#Min jendela besar#Tenang/Tidak Bising#-#-#-', 'Ada#Terjangkau#Layak#Layak#Baik#Menyala#Baik#Bising#Cukup#Ada#Ada', 'Okebanget'),
	(17, 'Angkutan Umum#Jarak akses mahasiswa#Ukuran meja/kursi#Toilet#Penerangan#Penerangan#Ventilasi#Kebisingan#Jumlah Ruang#Biaya Sewa#Penginapan PJTU', 'Ada#Relatif sama#Standar#Ada#Min jendela besar#ada lampu/listrik#Min jendela besar#Tenang/Tidak Bising#-#-#-', 'Ada#Terjangkau#Layak#Layak#Baik#Menyala#Baik#Tidak#Cukup#Ada#Ada', 'BAIK KOK'),
	(20, 'Angkutan Umum#Jarak akses mahasiswa#Ukuran meja/kursi#Toilet#Penerangan#Penerangan#Ventilasi#Kebisingan#Jumlah Ruang#Biaya Sewa#Penginapan PJTU', 'Ada#Relatif sama#Standar#Ada#Min jendela besar#ada lampu/listrik#Min jendela besar#Tenang/Tidak Bising#-#-#-', 'Ada#Terjangkau#Layak#Layak#Baik#Menyala#Baik#Bising#Cukup#Ada#Ada', 'baik');
/*!40000 ALTER TABLE `t_monitoring` ENABLE KEYS */;

-- Dumping structure for table monitoring.t_monitoring2
DROP TABLE IF EXISTS `t_monitoring2`;
CREATE TABLE IF NOT EXISTS `t_monitoring2` (
  `idJadwal` int(3) NOT NULL,
  `kegiatan` int(1) DEFAULT '0',
  `jmlKelas` varchar(10) NOT NULL,
  `tmpt` int(1) DEFAULT '0',
  `tmpt1` int(1) DEFAULT '0',
  `kelas` int(1) DEFAULT '0',
  `kelas1` int(1) DEFAULT '0',
  `alat` int(1) DEFAULT '0',
  `alat1` int(1) DEFAULT '0',
  `bahan` int(1) DEFAULT '0',
  `bahan1` int(1) DEFAULT '0',
  `jadwal` int(1) DEFAULT '0',
  `jadwal1` int(1) DEFAULT '0',
  `tepatWkt` int(1) DEFAULT '0',
  `tepatWkt1` int(1) DEFAULT '0',
  `sTugas` int(1) DEFAULT '0',
  `sTugas1` int(1) DEFAULT '0',
  `rat` int(1) DEFAULT '0',
  `rat1` int(1) DEFAULT '0',
  `catatan` int(1) DEFAULT '0',
  `catatan1` int(1) DEFAULT '0',
  `jmlMhs` int(1) DEFAULT '0',
  `jmlMhs1` int(1) DEFAULT '0',
  PRIMARY KEY (`idJadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table monitoring.t_monitoring2: ~6 rows (approximately)
/*!40000 ALTER TABLE `t_monitoring2` DISABLE KEYS */;
REPLACE INTO `t_monitoring2` (`idJadwal`, `kegiatan`, `jmlKelas`, `tmpt`, `tmpt1`, `kelas`, `kelas1`, `alat`, `alat1`, `bahan`, `bahan1`, `jadwal`, `jadwal1`, `tepatWkt`, `tepatWkt1`, `sTugas`, `sTugas1`, `rat`, `rat1`, `catatan`, `catatan1`, `jmlMhs`, `jmlMhs1`) VALUES
	(1, 2, '1 (SATU)', 1, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 1),
	(2, 0, '3', 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
	(3, 0, '2', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
	(13, 1, '2 (Dua)', 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0),
	(16, 0, '2', 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
	(17, 0, '2', 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
	(20, 0, '2', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);
/*!40000 ALTER TABLE `t_monitoring2` ENABLE KEYS */;

-- Dumping structure for table monitoring.t_tutor_jadwal
DROP TABLE IF EXISTS `t_tutor_jadwal`;
CREATE TABLE IF NOT EXISTS `t_tutor_jadwal` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `idJadwal` int(3) NOT NULL,
  `nipTutor` varchar(26) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- Dumping data for table monitoring.t_tutor_jadwal: ~22 rows (approximately)
/*!40000 ALTER TABLE `t_tutor_jadwal` DISABLE KEYS */;
REPLACE INTO `t_tutor_jadwal` (`id`, `idJadwal`, `nipTutor`) VALUES
	(1, 12, '111'),
	(2, 12, '234'),
	(3, 12, '111'),
	(4, 12, '234'),
	(5, 13, '111'),
	(15, 1, '234'),
	(16, 1, '111'),
	(19, 14, '111'),
	(20, 15, '111'),
	(23, 16, '111'),
	(24, 16, '234'),
	(25, 2, '111'),
	(26, 3, '234'),
	(27, 9, '111'),
	(28, 17, '111'),
	(29, 17, '197504302007012007'),
	(30, 18, '197906132011012004'),
	(31, 18, '41003498'),
	(32, 19, '196009061980121001'),
	(33, 19, '234'),
	(34, 20, '197906132011012004'),
	(35, 20, '195801241986031016');
/*!40000 ALTER TABLE `t_tutor_jadwal` ENABLE KEYS */;

-- Dumping structure for view monitoring.v_jadwal
DROP VIEW IF EXISTS `v_jadwal`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_jadwal` (
	`idJadwal` INT(3) NOT NULL,
	`tglInput` TIMESTAMP NULL,
	`masa` CHAR(6) NULL COLLATE 'utf8_general_ci',
	`idPokjar` INT(3) NULL,
	`hariLaksana` VARCHAR(15) NULL COLLATE 'utf8_general_ci',
	`tglLaksana` DATE NULL,
	`nipPj` CHAR(26) NULL COLLATE 'utf8_general_ci',
	`nipPm` CHAR(26) NULL COLLATE 'utf8_general_ci',
	`pokjar` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`nipPengurus` VARCHAR(26) NULL COLLATE 'utf8_general_ci',
	`namaPengurus` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`alamat` TINYTEXT NULL COLLATE 'utf8_general_ci',
	`kabupaten` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`gelar_d_pj` VARCHAR(6) NULL COLLATE 'utf8_general_ci',
	`nama_pj` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`gelar_b_pj` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`gelar_d_pm` VARCHAR(6) NULL COLLATE 'utf8_general_ci',
	`nama_pm` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`gelar_b_pm` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`jab_pj` VARCHAR(255) NULL COLLATE 'utf8_general_ci',
	`jab_pm` VARCHAR(255) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view monitoring.v_jadwal
DROP VIEW IF EXISTS `v_jadwal`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_jadwal`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_jadwal` AS select `t_jadwal`.`idJadwal` AS `idJadwal`,`t_jadwal`.`tglInput` AS `tglInput`,`t_jadwal`.`masa` AS `masa`,`t_jadwal`.`idPokjar` AS `idPokjar`,`t_jadwal`.`hariLaksana` AS `hariLaksana`,`t_jadwal`.`tglLaksana` AS `tglLaksana`,`t_jadwal`.`nipPj` AS `nipPj`,`t_jadwal`.`nipPemonitor` AS `nipPm`,`m_pokjar`.`pokjar` AS `pokjar`,`m_pokjar`.`nip` AS `nipPengurus`,`m_pokjar`.`namaPengurus` AS `namaPengurus`,`m_pokjar`.`alamat` AS `alamat`,`m_pokjar`.`kabupaten` AS `kabupaten`,`m_usr_pj`.`gelar_d` AS `gelar_d_pj`,`m_usr_pj`.`nama` AS `nama_pj`,`m_usr_pj`.`gelar_b` AS `gelar_b_pj`,`m_usr_pemonitor`.`gelar_d` AS `gelar_d_pm`,`m_usr_pemonitor`.`nama` AS `nama_pm`,`m_usr_pemonitor`.`gelar_b` AS `gelar_b_pm`,`m_jabatan_pj`.`jabatan` AS `jab_pj`,`m_jabatan_pm`.`jabatan` AS `jab_pm` from (((((`t_jadwal` join `m_pokjar` on((`t_jadwal`.`idPokjar` = `m_pokjar`.`idPokjar`))) join `m_usr` `m_usr_pj` on((convert(`t_jadwal`.`nipPj` using utf8) = `m_usr_pj`.`nip`))) join `m_usr` `m_usr_pemonitor` on((convert(`t_jadwal`.`nipPemonitor` using utf8) = `m_usr_pemonitor`.`nip`))) join `m_jabatan` `m_jabatan_pj` on((`m_usr_pj`.`idJabatan` = `m_jabatan_pj`.`idJabatan`))) join `m_jabatan` `m_jabatan_pm` on((`m_usr_pemonitor`.`idJabatan` = `m_jabatan_pm`.`idJabatan`)));

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
