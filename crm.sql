-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Sep 2016 pada 15.59
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

DELIMITER $$
--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `func_ncustid` () RETURNS VARCHAR(10) CHARSET latin1 BEGIN
	declare sRes varchar(10);
	SELECT LPAD(MAX(RIGHT (`sJne_cust_id`,3)) + 1, 4,'0') into sRes
	FROM
	`crm`.`dbsysseting`;
	
	return concat('TGR/C/',sRes);
	    END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `luasp` (`sisi` INT) RETURNS INT(11) BEGIN
	return sisi*sisi;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbadmin`
--

CREATE TABLE `dbadmin` (
  `pId_admin` tinyint(3) UNSIGNED NOT NULL,
  `sName` varchar(50) NOT NULL,
  `sPosition` varchar(20) NOT NULL,
  `sUsername` varchar(20) NOT NULL,
  `sPassword` varchar(20) NOT NULL,
  `sFoto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbadmin`
--

INSERT INTO `dbadmin` (`pId_admin`, `sName`, `sPosition`, `sUsername`, `sPassword`, `sFoto`) VALUES
(1, 'Administrator', 'Manager', 'admin', '12345', 'a.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbcontact`
--

CREATE TABLE `dbcontact` (
  `pId_contact` tinyint(3) UNSIGNED NOT NULL,
  `iId_customer` tinyint(3) UNSIGNED NOT NULL,
  `sName_contact` varchar(100) DEFAULT NULL,
  `iGender` tinyint(2) UNSIGNED DEFAULT NULL,
  `iPosition` int(2) DEFAULT NULL,
  `sPhone_number` varchar(10) DEFAULT NULL,
  `sPhone_number2` varchar(10) DEFAULT NULL,
  `sPhone_number3` varchar(10) DEFAULT NULL,
  `sEmail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbcontact`
--

INSERT INTO `dbcontact` (`pId_contact`, `iId_customer`, `sName_contact`, `iGender`, `iPosition`, `sPhone_number`, `sPhone_number2`, `sPhone_number3`, `sEmail`) VALUES
(1, 1, 'Jarwo', 1, 3, '0938388', '', '', 'jarwo@yahoo.com'),
(2, 3, 'Indra', 1, 3, '7987897', '', '', 'indra@yahoo.com'),
(3, 2, 'Wisnu', 1, 4, '897897', '', '', 'wisnu@gmail.com'),
(4, 3, 'Wahyu', 1, 2, '982980908', '09890808', '', 'jarwo@yahoo.com'),
(5, 4, 'Azis', 1, 1, '0830898', '09890808', '', 'azis@gmail.com'),
(6, 2, 'Mila', 2, 2, '0817672617', '09890808', 'b456hsj', 'mila@yuu.com'),
(7, 7, 'Bambang', 1, 3, '0878674536', '0898129191', '', 'wisnu@gmail.com'),
(8, 7, 'Loly', 2, 4, '087651516', '0897652424', '', 'indra@yahoo.com'),
(9, 8, 'Yuli', 2, 4, '0812828282', '0876787676', '', 'titaaprilia30@yahoo.co.id'),
(10, 9, 'Lusi', 2, 4, '0817672617', '', '', 'lusi@gmail.com'),
(11, 10, 'Eko', 1, 1, '0817672617', '', '', 'eko@gmail.com'),
(12, 10, 'Guruh', 1, 1, '0817672617', '', '', 'guruh@gmail.com'),
(13, 10, 'Hafidz', 1, 1, '0817672617', '', '', 'hafidz@gmail.com'),
(14, 9, 'Anwar', 1, 4, '0817672617', NULL, '', 'wisnu@gmail.com'),
(15, 9, 'Wisnu', 1, 3, '0817672617', '', '', 'wisnu@gmail.com'),
(16, 9, 'Joni', 1, 0, '7987897', '', '', ''),
(17, 11, 'Bambang', 1, 3, '0830898637', '', '', 'bambang@gmail.com'),
(18, 11, 'Dessy', 2, 4, '0817672617', '', '', 'dessy@gmail.com'),
(19, 11, 'Yummy', 2, 3, '0817672617', '0898129191', '', 'yummy@gmail.com'),
(20, 12, 'Ridwan', 1, 5, '0817672617', '', '', 'wisnu@gmail.com'),
(21, 12, 'Yuni', 2, 4, '0817672617', '', '', 'indra@yahoo.com'),
(22, 10, 'Aryo', 1, 3, '', '', '', ''),
(23, 10, 'Andi', 1, 0, '', '', '', ''),
(24, 10, 'Wisnu', 1, 0, '', '', '', ''),
(25, 13, 'Iwan', 1, 5, '0817672617', '', '', 'iwan@yahoo.com'),
(26, 9, 'Sari', 2, 4, '0817672617', '', '', ''),
(27, 14, 'Suparman', 1, 3, '0817672617', '', '', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbcustomer`
--

CREATE TABLE `dbcustomer` (
  `pId_customer` int(2) NOT NULL,
  `sName_company` varchar(100) NOT NULL,
  `sIndustry` varchar(50) NOT NULL,
  `sAdress_company` varchar(100) NOT NULL,
  `sPhone_number` varchar(20) NOT NULL,
  `iKnow_jne` int(2) NOT NULL,
  `iId_sales` int(2) NOT NULL,
  `sJne_cust_id` varchar(45) NOT NULL,
  `sNotes` mediumtext,
  `iStatus` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbcustomer`
--

INSERT INTO `dbcustomer` (`pId_customer`, `sName_company`, `sIndustry`, `sAdress_company`, `sPhone_number`, `iKnow_jne`, `iId_sales`, `sJne_cust_id`, `sNotes`, `iStatus`) VALUES
(1, 'PT ABC', 'Electronic', 'Jalan Mawar', '0830898', 2, 2, '800200563', NULL, 3),
(2, 'PT Panasonic', 'Electronic', 'Jalan Mawar Delima', '7987897', 1, 2, '97889798', NULL, 1),
(3, 'PT Wika', 'Constructor', 'Komp Pegadungan', '478079', 1, 2, 'TGR/C/0002', NULL, 1),
(4, 'PT AZET SURYA', 'Sparepart', 'Jalan Mangga 8 ', '7987897', 1, 2, 'TGR/C/0005', NULL, 1),
(7, 'PT Walcomm', 'Electronic', 'Jalan Sisingamaraja', '7987897', 1, 1, '87899879875', NULL, 2),
(8, 'PT Yuasa', 'Accu', 'Cikokol', '0822781818', 2, 2, 'TGR/C/0009', NULL, 1),
(9, 'PT. DUPALINDO  PERKASA', 'FURNITURE', 'Jalan Sisingamaraja', '021/75678901', 1, 2, 'TGR/C/0010', NULL, 1),
(10, 'PT Kecap ABC', 'Perkecapan', 'Jalan pahlawan seribu block H', '021/75678901', 1, 2, 'TGR/C/0011', '989389', 1),
(11, 'PT Angular', 'Software House', 'Jalan Mawar Delima', '7987897', 1, 2, 'TGR/C/0012', '', 1),
(12, 'PT Djarum', 'Rokok', 'Jalan Mawar', '7987897', 1, 1, 'TGR/C/0013', '', 1),
(13, 'PT Jaya Abadi', 'Alat Berat', 'Jalan Mawar Delima', '7987897', 1, 1, '67181819', '', 2),
(14, 'PT Walcomm', 'Modem', 'Jalan jalan', '7987897', 2, 2, 'TGR/C/0014', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbfile_meeting`
--

CREATE TABLE `dbfile_meeting` (
  `pId_file` tinyint(3) UNSIGNED NOT NULL,
  `iId_meeting` tinyint(3) UNSIGNED NOT NULL,
  `sFile_name` varchar(100) DEFAULT NULL,
  `sToken` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbfile_meeting`
--

INSERT INTO `dbfile_meeting` (`pId_file`, `iId_meeting`, `sFile_name`, `sToken`) VALUES
(8, 11, 'Aryani_Fitriana.jpg', '0.4321912391781093');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbmeeting`
--

CREATE TABLE `dbmeeting` (
  `pId_meeting` tinyint(4) NOT NULL,
  `iId_schedule` tinyint(4) UNSIGNED NOT NULL,
  `iId_opportunity` tinyint(3) UNSIGNED DEFAULT NULL,
  `sSubject` varchar(30) NOT NULL,
  `tStart` time NOT NULL,
  `tEnd` time NOT NULL,
  `dMeeting` date NOT NULL,
  `sLocation` varchar(50) NOT NULL,
  `sPerson` varchar(255) NOT NULL,
  `sNotes` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbmeeting`
--

INSERT INTO `dbmeeting` (`pId_meeting`, `iId_schedule`, `iId_opportunity`, `sSubject`, `tStart`, `tEnd`, `dMeeting`, `sLocation`, `sPerson`, `sNotes`) VALUES
(15, 10, 10, 'Pengajuan penawaran', '02:00:00', '05:00:00', '2016-09-08', 'Kantor Client', '', '<p>ok</p>'),
(16, 13, 15, 'Pengajuan penawaran', '09:30:00', '01:30:00', '2016-09-19', 'Kantor Client', '', '<p>Penawaran deal.</p>'),
(20, 14, 17, 'Pengajuan penawaran', '01:15:00', '05:15:00', '2016-09-24', 'Kantor Client', '', '<p>Done. Penawaran diterima</p>'),
(21, 7, 9, 'Pengajuan penawaran', '08:00:00', '02:00:00', '2016-09-28', 'MH Thamrin', '', '<p>1. Ada deal perjanjian pengiriman</p>'),
(22, 16, 15, 'Pembahasan MOU', '02:30:00', '05:30:00', '2016-09-27', 'Agricola', '', '<p>Kesepakatan tercapai, MOU disetujui</p>'),
(23, 17, 15, 'Pembahasan Operasional', '11:30:00', '04:30:00', '2016-10-05', 'Sumarecon', '', '<p>Done. MOU telah disepakati tinggal dikirimkan</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbmeeting_detail_person`
--

CREATE TABLE `dbmeeting_detail_person` (
  `pId_detail` tinyint(3) UNSIGNED NOT NULL,
  `iId_meeting` tinyint(3) UNSIGNED NOT NULL,
  `iId_contact` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbmeeting_detail_person`
--

INSERT INTO `dbmeeting_detail_person` (`pId_detail`, `iId_meeting`, `iId_contact`) VALUES
(1, 15, 11),
(2, 15, 12),
(3, 15, 13),
(4, 16, 17),
(5, 16, 18),
(6, 16, 19),
(11, 19, 20),
(12, 19, 21),
(13, 20, 20),
(14, 20, 21),
(15, 21, 16),
(16, 21, 26),
(17, 22, 17),
(18, 22, 18),
(19, 22, 19),
(20, 23, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbopportunity`
--

CREATE TABLE `dbopportunity` (
  `pId_opportunity` tinyint(4) NOT NULL,
  `sOpportunity_name` varchar(100) NOT NULL,
  `iId_customer` tinyint(4) NOT NULL,
  `dForecast_running` date NOT NULL,
  `sInformation` mediumtext,
  `iContact` tinyint(3) UNSIGNED NOT NULL,
  `iStatus` varchar(5) NOT NULL,
  `dForecast_amount` decimal(20,0) NOT NULL,
  `iService_type` tinyint(3) UNSIGNED NOT NULL,
  `iProduct_type` tinyint(3) UNSIGNED NOT NULL,
  `sCompetitor` varchar(50) NOT NULL,
  `dUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbopportunity`
--

INSERT INTO `dbopportunity` (`pId_opportunity`, `sOpportunity_name`, `iId_customer`, `dForecast_running`, `sInformation`, `iContact`, `iStatus`, `dForecast_amount`, `iService_type`, `iProduct_type`, `sCompetitor`, `dUpdated`) VALUES
(1, 'Pengiriman Kecap', 1, '2016-09-03', '', 1, '2', '800000', 1, 1, 'Tiki', '0000-00-00 00:00:00'),
(2, 'Pengiriman Besi', 3, '2016-12-23', '<p>Project pertama kita nii jfashjfhkjhfdkjshk hjkhskjahfkjsdhfkjh jkhkjsfhfjkhfkhsd khksfhkjsdhfksdjh hfkshfkjshfksdh kjfhskfhskdfhskjdhfksdh jkfhkdshfsjkdfhksjdfhkjs fhkjdshfjkdsdhfkhfskjhfkjsfhjksdhfksdhfkshfs</p>', 4, '1', '50000000', 1, 2, 'Wahana', '0000-00-00 00:00:00'),
(3, 'Pengiriman Tivi', 2, '2016-12-01', '<p>Project pertama&nbsp;</p>', 6, '1', '50000000', 3, 2, 'Wahana', '0000-00-00 00:00:00'),
(4, 'Pengiriman', 3, '2016-10-15', '<p>tesss</p>', 2, '3', '800000000', 1, 1, 'Wahana', '0000-00-00 00:00:00'),
(5, 'Pengiriman Sparepart', 4, '2016-11-01', '<p>Harus bisa dilakukan secara hati-hati dan tenang</p>', 5, '1', '70000000', 3, 1, 'Tiki', '0000-00-00 00:00:00'),
(6, 'Pengiriman Elektornik', 7, '2016-10-01', '<p>Hubungi ibu loli segera</p>', 7, '3', '9000000', 2, 2, 'Tiki', '2016-09-04 00:00:00'),
(7, 'Pengiriman Aki', 8, '2016-10-17', '<p>Pengiriman harus segera di rapatkan</p>', 9, '1', '9000000', 2, 2, 'Tiki', '0000-00-00 00:00:00'),
(8, 'Pengiriman Saos', 1, '2016-10-01', '<p>Saos dikemas hati-hati</p>', 1, '1', '8000000', 2, 2, 'Tiki', '2016-09-05 00:00:00'),
(9, 'Pengiriman kursi', 9, '2016-10-01', '<p>PERUSAHAAN BARU PENGIRIMAN MASIH SEDIKIT DAN MASIH DI REVIEW<br></p>', 10, '1', '9000000', 2, 2, 'Tiki', '2016-09-05 00:00:00'),
(10, 'Pengiriman Kecap', 10, '2016-09-15', '<p>Pengiriman kecap seluruh indonesia</p>', 11, '3', '130000000', 2, 2, 'Fed Ex', '2016-09-22 00:00:00'),
(11, 'Pengiriman SaosTomat', 10, '2016-09-30', '<p>Pengiriman saos tomat ke surabaya menggunakan container besar</p>', 12, '1', '150000000', 1, 2, 'Pandu Log', '2016-09-05 00:00:00'),
(15, 'Pengiriman License', 11, '2016-11-01', 'Oke minggu depan sudah mulai pengiriman package', 17, '3', '70000000', 2, 1, 'Wahana', '2016-09-27 00:00:00'),
(16, 'Pengiriman Komputer', 11, '2016-10-06', '<p>Project cepat</p>', 17, '2', '100000000', 2, 2, 'Tiki', '2016-09-16 00:00:00'),
(17, 'Pengiriman Tembakau', 12, '2016-10-10', '<p>Hubungi bpk ridwan</p>', 20, '1', '800000000', 2, 2, 'Wahana', '2016-09-21 00:00:00'),
(18, 'Pengiriman Mesin', 13, '2016-10-10', '<p>Hubungi Bpk Iwan</p>', 25, '1', '50000000', 2, 2, 'Wahana', '2016-09-23 00:00:00'),
(19, 'Pengirman modem', 14, '2016-11-01', '<p>CALL  BACK MS. RINA<br></p>', 27, '1', '200000000', 2, 2, 'RPX', '2016-09-23 00:00:00'),
(20, 'Pengiriman document', 11, '2016-10-01', 'Go!!', 18, '2', '40000000', 2, 1, 'Tiki', '2016-09-27 11:47:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbopp_detail`
--

CREATE TABLE `dbopp_detail` (
  `pId` tinyint(3) UNSIGNED NOT NULL,
  `iId_opp` tinyint(3) UNSIGNED NOT NULL,
  `iStatus` tinyint(3) UNSIGNED NOT NULL,
  `sInfo` mediumtext NOT NULL,
  `dUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbopp_detail`
--

INSERT INTO `dbopp_detail` (`pId`, `iId_opp`, `iStatus`, `sInfo`, `dUpdated`) VALUES
(1, 15, 1, '<p>Contact terus bpk.bambang</p>', '2016-09-16 00:00:00'),
(2, 16, 2, '<p>Project cepat</p>', '2016-09-16 00:00:00'),
(3, 15, 2, '<p>Menuju deal</p>', '2016-09-16 00:00:00'),
(4, 17, 1, '<p>Hubungi bpk ridwan</p>', '2016-09-21 00:00:00'),
(5, 10, 3, '<p>Pengiriman kecap seluruh indonesia</p>', '2016-09-22 00:00:00'),
(6, 18, 1, '<p>Hubungi Bpk Iwan</p>', '2016-09-23 00:00:00'),
(7, 19, 1, '<p>CALL  BACK MS. RINA<br></p>', '2016-09-23 00:00:00'),
(8, 15, 3, 'Oke minggu depan sudah mulai pengiriman package', '2016-09-27 00:00:00'),
(9, 20, 1, 'telpon terus', '2016-09-26 21:33:16'),
(10, 20, 2, 'Go!!', '2016-09-27 21:47:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbschedule`
--

CREATE TABLE `dbschedule` (
  `pId_schedule` tinyint(4) NOT NULL,
  `iId_opportunity` tinyint(4) NOT NULL,
  `dMeeting` date NOT NULL,
  `sLocation` varchar(100) DEFAULT NULL,
  `sSubject` varchar(25) DEFAULT NULL,
  `sNoted` varchar(100) DEFAULT NULL,
  `iStatus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbschedule`
--

INSERT INTO `dbschedule` (`pId_schedule`, `iId_opportunity`, `dMeeting`, `sLocation`, `sSubject`, `sNoted`, `iStatus`) VALUES
(1, 1, '2016-09-02', 'jkjhfdskj', 'jhkfhkj', '<p>jhdskjsadjk</p>', '2'),
(2, 5, '2016-09-22', 'Kantor Client', 'Pengajuan penawaran', 'Bawa data lebih lengkap', '2'),
(3, 3, '2016-10-01', 'Kantor Client', 'Pegiriman price list', '<p>Meeting didamping manager sales</p>', '2'),
(4, 6, '2016-10-12', 'Kantor Client', 'Pengajuan penawaran', '<p>Pertemuan ditemani manager sales</p>', '2'),
(5, 6, '2016-09-28', 'Kantor Client', 'Pembahasan MOU', 'Meeting berikutnya harus dimulai jam 07.00 (lebih pagi)', '2'),
(6, 7, '2016-09-07', 'Kantor Client', 'Pengajuan Penawaran', '<p>Pertemuan pertama</p>', '2'),
(7, 9, '2016-09-28', 'Kantor Client', 'Pengajuan penawaran', '<p>Meeting didampingi manager sales</p>', '2'),
(8, 10, '2016-09-06', 'ITC', 'Mengetahui Bisnis Proses', '<p>Besok membawa document penawaran, company profile untuk presentasi</p>', '2'),
(9, 11, '2016-09-08', 'Sumarecon', 'Penawaran pengiriman', 'Pertemuan berikutnya harus bawa data harga', '2'),
(10, 10, '2016-09-08', 'Kantor Client', 'Pengajuan penawaran', '<p>ok</p>', '2'),
(11, 11, '2016-09-26', 'Sumarecon', 'Pegiriman price list', '<p>Jangan lupa membawa data lengkap</p>', '3'),
(12, 5, '2016-10-22', 'Sumarecon', 'Pembahasan MOU', '<p>Take more document</p>', '1'),
(13, 15, '2016-09-19', 'Kantor Client', 'Pengajuan penawaran', '<p>Pertemuan dilakukan tertutup</p>', '2'),
(14, 17, '2016-09-24', 'Kantor Client', 'Pengajuan penawaran', '<p>Penawaran pertama</p>', '2'),
(15, 19, '2016-10-04', 'Ciputat', 'Pengajuan penawaran', '<p>Bawa company profile</p>', '3'),
(16, 15, '2016-09-27', 'Agricola', 'Pembahasan MOU', '<p>Pembahasan MOU akan dilakukan dalam waktu cepat</p>', '2'),
(17, 15, '2016-10-05', 'Sumarecon', 'Pembahasan Operasional', '<p>Pembahasan sekaligus terkait masalah pengiriman</p>', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbschedule_re`
--

CREATE TABLE `dbschedule_re` (
  `pId` tinyint(3) UNSIGNED NOT NULL,
  `iId_schedule` tinyint(3) UNSIGNED DEFAULT NULL,
  `iId_opportunity` tinyint(3) UNSIGNED DEFAULT NULL,
  `dReschedule_meet` date DEFAULT NULL,
  `dCanceled_meet` date DEFAULT NULL,
  `sReason` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbschedule_re`
--

INSERT INTO `dbschedule_re` (`pId`, `iId_schedule`, `iId_opportunity`, `dReschedule_meet`, `dCanceled_meet`, `sReason`) VALUES
(1, 11, 11, '2016-09-22', '2016-09-20', '<p>Client sakit</p>'),
(2, 11, 11, '2016-10-01', '2016-09-20', '<p>Masih sakit</p>'),
(3, 11, 11, '2016-09-03', '2016-09-21', '<p>Ada kenadala dari jauh hari</p>'),
(4, 14, 17, '2016-09-24', '2016-09-21', '<p>Bpk ridwan sakit</p>'),
(5, 7, 9, '2016-09-28', '2016-09-23', '<p>Client sakit</p>'),
(6, 15, 19, '2016-10-04', '2016-09-23', '<p>Direktur keluar negeri.</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbsysseting`
--

CREATE TABLE `dbsysseting` (
  `sJne_cust_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbsysseting`
--

INSERT INTO `dbsysseting` (`sJne_cust_id`) VALUES
('TGR/C/0014');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbtogender`
--

CREATE TABLE `dbtogender` (
  `pGender` tinyint(3) UNSIGNED NOT NULL,
  `sGender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbtogender`
--

INSERT INTO `dbtogender` (`pGender`, `sGender`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbtoknow`
--

CREATE TABLE `dbtoknow` (
  `pKnow_jne` tinyint(4) NOT NULL,
  `sKnow` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbtoknow`
--

INSERT INTO `dbtoknow` (`pKnow_jne`, `sKnow`) VALUES
(1, 'Forum'),
(2, 'Blog'),
(3, 'Video');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbtoposition`
--

CREATE TABLE `dbtoposition` (
  `pPosition` int(2) NOT NULL,
  `sName_position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbtoposition`
--

INSERT INTO `dbtoposition` (`pPosition`, `sName_position`) VALUES
(1, 'Direktur'),
(2, 'General Manager'),
(3, 'Manager'),
(4, 'Secretary'),
(5, 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbtoproduct_opp`
--

CREATE TABLE `dbtoproduct_opp` (
  `pProduct` tinyint(3) UNSIGNED NOT NULL,
  `sProduct` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbtoproduct_opp`
--

INSERT INTO `dbtoproduct_opp` (`pProduct`, `sProduct`) VALUES
(1, 'Document'),
(2, 'Package');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbtoservice_opp`
--

CREATE TABLE `dbtoservice_opp` (
  `pService` tinyint(3) UNSIGNED NOT NULL,
  `sService` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbtoservice_opp`
--

INSERT INTO `dbtoservice_opp` (`pService`, `sService`) VALUES
(1, 'Logistic'),
(2, 'Express'),
(3, 'Trucking'),
(4, 'Warehouse'),
(5, 'Intenational');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbtostat_customer`
--

CREATE TABLE `dbtostat_customer` (
  `pStatus` tinyint(4) NOT NULL,
  `sStatus` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbtostat_customer`
--

INSERT INTO `dbtostat_customer` (`pStatus`, `sStatus`) VALUES
(1, 'NEW BUSINESS'),
(2, 'UPSELLING'),
(3, 'CROSSSELLING');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbtostat_opportunity`
--

CREATE TABLE `dbtostat_opportunity` (
  `pStatus_opp` tinyint(4) NOT NULL,
  `sStatus_opp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbtostat_opportunity`
--

INSERT INTO `dbtostat_opportunity` (`pStatus_opp`, `sStatus_opp`) VALUES
(1, 'Pre-Call Intelligence\r\n'),
(2, 'Needs Assessment'),
(3, 'Developing Actions\r\n'),
(4, 'Obtaining Commitment\r\n'),
(5, 'Account Development\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbtostat_schedule`
--

CREATE TABLE `dbtostat_schedule` (
  `pId_status` tinyint(4) NOT NULL,
  `sStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbtostat_schedule`
--

INSERT INTO `dbtostat_schedule` (`pId_status`, `sStatus`) VALUES
(1, 'Open'),
(2, 'Close'),
(3, 'Reschedule');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbuser`
--

CREATE TABLE `dbuser` (
  `pId_sales` int(2) NOT NULL,
  `sNIK` varchar(4) NOT NULL,
  `sName_sales` varchar(10) NOT NULL,
  `iGender` tinyint(3) UNSIGNED NOT NULL,
  `sPosition` varchar(20) NOT NULL,
  `sPhone_number` varchar(15) NOT NULL,
  `sUsername` varchar(15) NOT NULL,
  `sPassword` varchar(255) NOT NULL,
  `sFoto` varchar(100) NOT NULL,
  `iRole` tinyint(3) UNSIGNED DEFAULT NULL,
  `dRegister` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbuser`
--

INSERT INTO `dbuser` (`pId_sales`, `sNIK`, `sName_sales`, `iGender`, `sPosition`, `sPhone_number`, `sUsername`, `sPassword`, `sFoto`, `iRole`, `dRegister`) VALUES
(1, '8724', 'Edi', 1, 'Sales', '08393919', 'edi', '827ccb0eea8a706c4c34a16891f84e7b', 'download.jpg', 3, '2016-08-26'),
(2, '7897', 'Dinda', 2, 'Sales', '897897', 'dd', '827ccb0eea8a706c4c34a16891f84e7b', 'download2.jpg', 3, '2016-08-31'),
(3, '6790', 'Admin', 2, 'SPV', '08778972627', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'A.png', 2, '2016-09-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbadmin`
--
ALTER TABLE `dbadmin`
  ADD PRIMARY KEY (`pId_admin`);

--
-- Indexes for table `dbcontact`
--
ALTER TABLE `dbcontact`
  ADD PRIMARY KEY (`pId_contact`);

--
-- Indexes for table `dbcustomer`
--
ALTER TABLE `dbcustomer`
  ADD PRIMARY KEY (`pId_customer`);

--
-- Indexes for table `dbfile_meeting`
--
ALTER TABLE `dbfile_meeting`
  ADD PRIMARY KEY (`pId_file`);

--
-- Indexes for table `dbmeeting`
--
ALTER TABLE `dbmeeting`
  ADD PRIMARY KEY (`pId_meeting`);

--
-- Indexes for table `dbmeeting_detail_person`
--
ALTER TABLE `dbmeeting_detail_person`
  ADD PRIMARY KEY (`pId_detail`);

--
-- Indexes for table `dbopportunity`
--
ALTER TABLE `dbopportunity`
  ADD PRIMARY KEY (`pId_opportunity`);

--
-- Indexes for table `dbopp_detail`
--
ALTER TABLE `dbopp_detail`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `dbschedule`
--
ALTER TABLE `dbschedule`
  ADD PRIMARY KEY (`pId_schedule`);

--
-- Indexes for table `dbschedule_re`
--
ALTER TABLE `dbschedule_re`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `dbtogender`
--
ALTER TABLE `dbtogender`
  ADD PRIMARY KEY (`pGender`);

--
-- Indexes for table `dbtoknow`
--
ALTER TABLE `dbtoknow`
  ADD PRIMARY KEY (`pKnow_jne`);

--
-- Indexes for table `dbtoposition`
--
ALTER TABLE `dbtoposition`
  ADD PRIMARY KEY (`pPosition`);

--
-- Indexes for table `dbtoproduct_opp`
--
ALTER TABLE `dbtoproduct_opp`
  ADD PRIMARY KEY (`pProduct`);

--
-- Indexes for table `dbtoservice_opp`
--
ALTER TABLE `dbtoservice_opp`
  ADD PRIMARY KEY (`pService`);

--
-- Indexes for table `dbtostat_customer`
--
ALTER TABLE `dbtostat_customer`
  ADD PRIMARY KEY (`pStatus`);

--
-- Indexes for table `dbtostat_opportunity`
--
ALTER TABLE `dbtostat_opportunity`
  ADD PRIMARY KEY (`pStatus_opp`);

--
-- Indexes for table `dbtostat_schedule`
--
ALTER TABLE `dbtostat_schedule`
  ADD PRIMARY KEY (`pId_status`);

--
-- Indexes for table `dbuser`
--
ALTER TABLE `dbuser`
  ADD PRIMARY KEY (`pId_sales`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbcontact`
--
ALTER TABLE `dbcontact`
  MODIFY `pId_contact` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `dbcustomer`
--
ALTER TABLE `dbcustomer`
  MODIFY `pId_customer` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `dbfile_meeting`
--
ALTER TABLE `dbfile_meeting`
  MODIFY `pId_file` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dbmeeting`
--
ALTER TABLE `dbmeeting`
  MODIFY `pId_meeting` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `dbmeeting_detail_person`
--
ALTER TABLE `dbmeeting_detail_person`
  MODIFY `pId_detail` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `dbopportunity`
--
ALTER TABLE `dbopportunity`
  MODIFY `pId_opportunity` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `dbopp_detail`
--
ALTER TABLE `dbopp_detail`
  MODIFY `pId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dbschedule`
--
ALTER TABLE `dbschedule`
  MODIFY `pId_schedule` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `dbschedule_re`
--
ALTER TABLE `dbschedule_re`
  MODIFY `pId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dbtoknow`
--
ALTER TABLE `dbtoknow`
  MODIFY `pKnow_jne` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dbtoproduct_opp`
--
ALTER TABLE `dbtoproduct_opp`
  MODIFY `pProduct` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dbtostat_customer`
--
ALTER TABLE `dbtostat_customer`
  MODIFY `pStatus` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dbtostat_opportunity`
--
ALTER TABLE `dbtostat_opportunity`
  MODIFY `pStatus_opp` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dbtostat_schedule`
--
ALTER TABLE `dbtostat_schedule`
  MODIFY `pId_status` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dbuser`
--
ALTER TABLE `dbuser`
  MODIFY `pId_sales` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
