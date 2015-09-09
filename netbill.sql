-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2015 at 01:31 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `netbill`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_login`
--

CREATE TABLE IF NOT EXISTS `t_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `level` enum('admin','operator') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_login`
--

INSERT INTO `t_login` (`id`, `username`, `password`, `nama_lengkap`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Iwan M Setiawan', 'admin'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Operator', 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `t_paket`
--

CREATE TABLE IF NOT EXISTS `t_paket` (
  `id_paket` varchar(3) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `harga` varchar(7) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_paket`
--

INSERT INTO `t_paket` (`id_paket`, `nama`, `harga`) VALUES
('P01', '1 Mbps', '100000'),
('P02', '512 Kbps', '75000');

-- --------------------------------------------------------

--
-- Table structure for table `t_pelanggan`
--

CREATE TABLE IF NOT EXISTS `t_pelanggan` (
  `id_pelanggan` varchar(25) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  `id_paket` varchar(3) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pelanggan`
--

INSERT INTO `t_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `email`, `id_paket`) VALUES
('SN01', 'Iwan', 'Handapherang', '0852', 'iwan@emailku.com', 'P01'),
('SN02', 'Afika Aliyah', 'Kalapajajar', '0812', 'afika@email.com', 'P01'),
('SN03', 'User', 'Ciamis', '082', 'email@email.com', 'P01'),
('SN04', 'Coba', 'Handapherang, Ciamis', '0812345', 'coba@emai.com', 'P02');

-- --------------------------------------------------------

--
-- Table structure for table `t_setting`
--

CREATE TABLE IF NOT EXISTS `t_setting` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `pemilik` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t_setting`
--

INSERT INTO `t_setting` (`id`, `nama`, `alamat`, `pemilik`, `logo`) VALUES
(1, 'Surday RT RW Net', 'Perum Surung Dayung Blok B No.168 Handapherang  - Ciamis', 'Iwan Setiawan', 'logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE IF NOT EXISTS `t_transaksi` (
  `id_transaksi` varchar(30) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `nominal` int(7) NOT NULL,
  `bukti` varchar(50) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `tgl_validasi` date NOT NULL,
  `status` enum('pending','lunas') NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_transaksi`
--

INSERT INTO `t_transaksi` (`id_transaksi`, `id_pelanggan`, `nominal`, `bukti`, `tgl_bayar`, `tgl_validasi`, `status`) VALUES
('INV001', 'SN02', 100000, '', '2015-08-01', '2015-08-02', 'lunas'),
('INV004', 'SN02', 50000, '', '2015-08-19', '2015-08-28', 'lunas'),
('INV005', 'SN03', 75000, '', '2015-08-05', '0000-00-00', 'pending'),
('INV006', 'SN03', 50000, '', '2015-08-08', '0000-00-00', 'pending'),
('INV007', 'SN03', 50000, '', '2015-08-28', '2015-08-21', 'lunas'),
('INV008', 'SN03', 50000, '', '2015-08-21', '0000-00-00', 'pending'),
('INV011', 'SN03', 75, '', '2015-08-30', '0000-00-00', 'pending'),
('INV012', 'SN03', 75, '', '2015-08-28', '0000-00-00', 'pending'),
('INV013', 'SN03', 75000, '', '2015-08-24', '0000-00-00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `id_pelanggan` varchar(25) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` enum('admin','pelanggan') NOT NULL,
  UNIQUE KEY `id_pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_pelanggan`, `username`, `password`, `level`) VALUES
('SN01', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('SN02', 'afika', 'd94ac5196f76d7562f5f9fd7ab478484', 'pelanggan'),
('SN03', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'pelanggan');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `t_user_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `t_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
