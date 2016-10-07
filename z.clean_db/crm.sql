-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Agu 2016 pada 05.50
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

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbcontact`
--

CREATE TABLE `dbcontact` (
  `pId_contact` tinyint(3) UNSIGNED NOT NULL,
  `iId_customer` tinyint(3) UNSIGNED NOT NULL,
  `sName_contact` varchar(100) NOT NULL,
  `iPosition` int(2) NOT NULL,
  `sPhone_number` varchar(10) NOT NULL,
  `sPhone_number2` varchar(10) DEFAULT NULL,
  `sPhone_number3` varchar(10) DEFAULT NULL,
  `sEmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbcustomer`
--

CREATE TABLE `dbcustomer` (
  `pId_customer` int(2) NOT NULL,
  `sName_company` varchar(100) NOT NULL,
  `sAdress_company` varchar(100) NOT NULL,
  `sPhone_number` varchar(20) NOT NULL,
  `iKnow_jne` int(2) NOT NULL,
  `iId_sales` int(2) NOT NULL,
  `sJne_cust_id` varchar(45) NOT NULL,
  `sCcrf` varchar(45) DEFAULT NULL,
  `iStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbfile_meeting`
--

CREATE TABLE `dbfile_meeting` (
  `pId_file` tinyint(3) UNSIGNED NOT NULL,
  `iId_meeting` tinyint(3) UNSIGNED NOT NULL,
  `sName_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbopportunity`
--

CREATE TABLE `dbopportunity` (
  `pId_opportunity` tinyint(4) NOT NULL,
  `sOpportunity_name` varchar(100) NOT NULL,
  `iId_customer` tinyint(4) NOT NULL,
  `dForecast_running` date NOT NULL,
  `sInformation` varchar(50) DEFAULT NULL,
  `sContact` varchar(10) NOT NULL,
  `iStatus` varchar(5) NOT NULL,
  `dForecast_amount` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbsales`
--

CREATE TABLE `dbsales` (
  `pId_sales` int(2) NOT NULL,
  `sNIK` varchar(4) NOT NULL,
  `sName_sales` varchar(10) NOT NULL,
  `sPhone_number` varchar(15) NOT NULL,
  `sUsername` varchar(15) NOT NULL,
  `sPassword` varchar(20) NOT NULL,
  `sFoto` varchar(100) NOT NULL,
  `iRole` tinyint(3) UNSIGNED DEFAULT NULL,
  `dRegister` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbsales`
--

INSERT INTO `dbsales` (`pId_sales`, `sNIK`, `sName_sales`, `sPhone_number`, `sUsername`, `sPassword`, `sFoto`, `iRole`, `dRegister`) VALUES
(1, '8724', 'Edi', '08393919', 'edi', '12345', 'download.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbschedule`
--

CREATE TABLE `dbschedule` (
  `pId_schedule` tinyint(4) NOT NULL,
  `iId_opportunity` tinyint(4) NOT NULL,
  `dMeeting` date NOT NULL,
  `sPerson` varchar(255) NOT NULL,
  `sLocation` varchar(100) DEFAULT NULL,
  `sSubject` varchar(25) DEFAULT NULL,
  `sNoted` varchar(100) DEFAULT NULL,
  `iStatus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('TGR/C/0000');

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
(1, 'Prospecting'),
(2, 'Existing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbtostat_opportunity`
--

CREATE TABLE `dbtostat_opportunity` (
  `pStatus_opp` tinyint(4) NOT NULL,
  `sStatus_opp` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dbtostat_opportunity`
--

INSERT INTO `dbtostat_opportunity` (`pStatus_opp`, `sStatus_opp`) VALUES
(1, 'Success'),
(2, 'On Progres'),
(3, 'Failed');

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
(2, 'Close');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbcontact`
--
ALTER TABLE `dbcontact`
  ADD PRIMARY KEY (`pId_contact`);

--
-- Indexes for table `dbcustomer`
--
ALTER TABLE `dbcustomer`
  ADD PRIMARY KEY (`pId_customer`),
  ADD UNIQUE KEY `sJne_cust_id` (`sJne_cust_id`),
  ADD UNIQUE KEY `sCcrf` (`sCcrf`);

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
-- Indexes for table `dbopportunity`
--
ALTER TABLE `dbopportunity`
  ADD PRIMARY KEY (`pId_opportunity`);

--
-- Indexes for table `dbsales`
--
ALTER TABLE `dbsales`
  ADD PRIMARY KEY (`pId_sales`);

--
-- Indexes for table `dbschedule`
--
ALTER TABLE `dbschedule`
  ADD PRIMARY KEY (`pId_schedule`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbcontact`
--
ALTER TABLE `dbcontact`
  MODIFY `pId_contact` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dbcustomer`
--
ALTER TABLE `dbcustomer`
  MODIFY `pId_customer` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dbfile_meeting`
--
ALTER TABLE `dbfile_meeting`
  MODIFY `pId_file` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dbmeeting`
--
ALTER TABLE `dbmeeting`
  MODIFY `pId_meeting` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dbopportunity`
--
ALTER TABLE `dbopportunity`
  MODIFY `pId_opportunity` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dbsales`
--
ALTER TABLE `dbsales`
  MODIFY `pId_sales` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dbschedule`
--
ALTER TABLE `dbschedule`
  MODIFY `pId_schedule` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dbtoknow`
--
ALTER TABLE `dbtoknow`
  MODIFY `pKnow_jne` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dbtostat_customer`
--
ALTER TABLE `dbtostat_customer`
  MODIFY `pStatus` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dbtostat_opportunity`
--
ALTER TABLE `dbtostat_opportunity`
  MODIFY `pStatus_opp` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dbtostat_schedule`
--
ALTER TABLE `dbtostat_schedule`
  MODIFY `pId_status` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
