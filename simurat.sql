-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2017 at 09:13 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simurat`
--

-- --------------------------------------------------------

--
-- Table structure for table `fax_keluar`
--

CREATE TABLE IF NOT EXISTS `fax_keluar` (
`ID_FK` int(15) NOT NULL,
  `Tgl_Surat` date NOT NULL,
  `No_Surat` varchar(100) NOT NULL,
  `Tujuan_Surat` varchar(250) NOT NULL,
  `Perihal` varchar(250) NOT NULL,
  `Disposisi_GM` varchar(250) NOT NULL,
  `Keterangan` varchar(250) NOT NULL,
  `Upload` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `fax_masuk`
--

CREATE TABLE IF NOT EXISTS `fax_masuk` (
`ID_FM` int(15) NOT NULL,
  `Tgl_Agenda` date NOT NULL,
  `No_Surat` varchar(100) NOT NULL,
  `Tgl_Surat` date NOT NULL,
  `Asal_Surat` varchar(100) NOT NULL,
  `Perihal` varchar(250) NOT NULL,
  `Disposisi_GM` varchar(250) NOT NULL,
  `Tujuan` varchar(250) NOT NULL,
  `Upload` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `KodeLogin` varchar(15) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`KodeLogin`, `Username`, `Password`) VALUES
('USR101', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE IF NOT EXISTS `surat_keluar` (
`ID_SK` int(15) NOT NULL,
  `Tgl_Surat` date NOT NULL,
  `No_Surat` varchar(100) NOT NULL,
  `Tujuan_Surat` varchar(250) NOT NULL,
  `Perihal` varchar(250) NOT NULL,
  `Disposisi_GM` varchar(250) NOT NULL,
  `Keterangan` varchar(250) NOT NULL,
  `Upload` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE IF NOT EXISTS `surat_masuk` (
`ID_SM` int(15) NOT NULL,
  `Tgl_Agenda` date NOT NULL,
  `No_Surat` varchar(100) NOT NULL,
  `Tgl_Surat` date NOT NULL,
  `Asal_Surat` varchar(100) NOT NULL,
  `Perihal` varchar(250) NOT NULL,
  `Disposisi_GM` varchar(250) NOT NULL,
  `Tujuan` varchar(250) NOT NULL,
  `Upload` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fax_keluar`
--
ALTER TABLE `fax_keluar`
 ADD PRIMARY KEY (`ID_FK`);

--
-- Indexes for table `fax_masuk`
--
ALTER TABLE `fax_masuk`
 ADD PRIMARY KEY (`ID_FM`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`KodeLogin`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
 ADD PRIMARY KEY (`ID_SK`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
 ADD PRIMARY KEY (`ID_SM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fax_keluar`
--
ALTER TABLE `fax_keluar`
MODIFY `ID_FK` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fax_masuk`
--
ALTER TABLE `fax_masuk`
MODIFY `ID_FM` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
MODIFY `ID_SK` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
MODIFY `ID_SM` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
