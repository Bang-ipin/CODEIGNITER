-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2017 at 07:03 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('689639315c8ab78f483de7334d92b8c111f3fc55', '::1', 1501990718, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313939303532313b6c6f676765645f696e7c623a313b69645f757365727c733a313a2234223b757365726e616d657c733a31323a22746f6b6f72696e67726f6164223b6e616d615f70656e6767756e617c733a343a22496e6469223b7573657267726f75707c733a31323a22546f6b6f52696e67726f6164223b),
('b7426522af955a8391cdb61be13eb0b1d5f761f4', '::1', 1501990843, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313939303834333b6c6f676765645f696e7c623a313b69645f757365727c733a313a2234223b757365726e616d657c733a31323a22746f6b6f72696e67726f6164223b6e616d615f70656e6767756e617c733a343a22496e6469223b7573657267726f75707c733a31323a22546f6b6f52696e67726f6164223b),
('11dabeec33627980eb9ac3a988e7b98be6852716', '::1', 1501991655, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313939313437373b6c6f676765645f696e7c623a313b69645f757365727c733a313a2234223b757365726e616d657c733a31323a22746f6b6f72696e67726f6164223b6e616d615f70656e6767756e617c733a343a22496e6469223b7573657267726f75707c733a31323a22546f6b6f52696e67726f6164223b),
('daef7245f0c27ebde3f02001bc6b078dbe8b75af', '::1', 1501992101, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313939313830383b6c6f676765645f696e7c623a313b69645f757365727c733a313a2234223b757365726e616d657c733a31323a22746f6b6f72696e67726f6164223b6e616d615f70656e6767756e617c733a343a22496e6469223b7573657267726f75707c733a31323a22546f6b6f52696e67726f6164223b),
('5d12733898f501d8e06249b154572fabc59ab4fc', '::1', 1501992402, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313939323131363b6c6f676765645f696e7c623a313b69645f757365727c733a313a2234223b757365726e616d657c733a31323a22746f6b6f72696e67726f6164223b6e616d615f70656e6767756e617c733a343a22496e6469223b7573657267726f75707c733a31323a22546f6b6f52696e67726f6164223b),
('66446dc37557f64601d97fefb4eb3ddd86899337', '::1', 1501992871, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313939323434343b6c6f676765645f696e7c623a313b69645f757365727c733a313a2234223b757365726e616d657c733a31323a22746f6b6f72696e67726f6164223b6e616d615f70656e6767756e617c733a343a22496e6469223b7573657267726f75707c733a31323a22546f6b6f52696e67726f6164223b),
('251a503f9a98004e13f5ab1ebc538f65c3d24761', '::1', 1501992897, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313939323838333b6c6f676765645f696e7c623a313b69645f757365727c733a313a2234223b757365726e616d657c733a31323a22746f6b6f72696e67726f6164223b6e616d615f70656e6767756e617c733a343a22496e6469223b7573657267726f75707c733a31323a22546f6b6f52696e67726f6164223b),
('38b8809a88c67f426707106098192ce8c5278db0', '::1', 1501993252, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313939333235323b6c6f676765645f696e7c623a313b69645f757365727c733a313a2234223b757365726e616d657c733a31323a22746f6b6f72696e67726f6164223b6e616d615f70656e6767756e617c733a343a22496e6469223b7573657267726f75707c733a31323a22546f6b6f52696e67726f6164223b),
('2c250b2260626ac54bfa107ef3b67d80818be1d6', '::1', 1501994148, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313939333838343b6c6f676765645f696e7c623a313b69645f757365727c733a313a2234223b757365726e616d657c733a31323a22746f6b6f72696e67726f6164223b6e616d615f70656e6767756e617c733a343a22496e6469223b7573657267726f75707c733a31323a22546f6b6f52696e67726f6164223b74676c5f6177616c7c733a31303a22323031372d30382d3036223b74676c5f616b6869727c733a31303a22323031372d30382d3036223b),
('7efa60211b2eefadcb78abdf62c4877ee25135a5', '::1', 1501994526, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313939343237353b6c6f676765645f696e7c623a313b69645f757365727c733a313a2234223b757365726e616d657c733a31323a22746f6b6f72696e67726f6164223b6e616d615f70656e6767756e617c733a343a22496e6469223b7573657267726f75707c733a31323a22546f6b6f52696e67726f6164223b74676c5f6177616c7c733a31303a22323031372d30382d3036223b74676c5f616b6869727c733a31303a22323031372d30382d3036223b),
('82f8467b89f6852676894ca81fe6bcb73bfc80d3', '::1', 1501995722, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530313939353433313b6c6f676765645f696e7c623a313b69645f757365727c733a313a2234223b757365726e616d657c733a31323a22746f6b6f72696e67726f6164223b6e616d615f70656e6767756e617c733a343a22496e6469223b7573657267726f75707c733a31323a22546f6b6f52696e67726f6164223b74676c5f6177616c7c733a31303a22323031372d30382d3036223b74676c5f616b6869727c733a31303a22323031372d30382d3036223b);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `kode_transaksi` varchar(20) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_beli` decimal(10,0) DEFAULT NULL,
  `harga_jual` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`kode_transaksi`, `kode_barang`, `nama_barang`, `jumlah`, `satuan`, `harga_beli`, `harga_jual`, `total`) VALUES
('TRM-00001', 'BAR-0001', 'Lavender A', 16, 'Pcs', '90000', NULL, '1440000'),
('TRM-00001', 'BAR-0007', 'Elegan', 4, 'Pcs', '90000', NULL, '360000'),
('TRK-00002', 'BAR-0002', 'Lily A', 10, 'Pcs', NULL, '95000', '950000'),
('TRK-00002', 'BAR-0003', 'Bogenvile A', 10, 'Pcs', NULL, '95000', '950000'),
('TRM-00003', 'BAR-0019', 'Strowberry', 3, 'Pcs', '70000', NULL, '210000'),
('TRK-00004', 'BAR-0015', 'Jasmine', 1, 'Pcs', NULL, '75000', '75000'),
('TRK-00004', 'BAR-0019', 'Strowberry', 5, 'Pcs', NULL, '75000', '375000'),
('TRM-00005', 'BAR-0004', 'Blue Oase', 1, 'Pcs', '90000', NULL, '90000'),
('TRM-00006', 'BAR-0004', 'Blue Oase', 8, 'Pcs', '90000', NULL, '720000'),
('TRK-00007', 'BAR-0005', 'Buble Gum', 1, 'Pcs', NULL, '95000', '95000'),
('TRK-00007', 'BAR-0012', 'Aqua Fresh', 1, 'Pcs', NULL, '75000', '75000'),
('TRM-00008', 'BAR-0001', 'Lavender A', 10, 'Pcs', '90000', NULL, '900000'),
('TRM-00008', 'BAR-0002', 'Lily A', 30, 'Pcs', '90000', NULL, '2700000'),
('TRM-00008', 'BAR-0003', 'Bogenvile A', 30, 'Pcs', '90000', NULL, '2700000'),
('TRM-00008', 'BAR-0004', 'Blue Oase', 1, 'Pcs', '90000', NULL, '90000'),
('TRM-00008', 'BAR-0005', 'Buble Gum', 11, 'Pcs', '90000', NULL, '990000'),
('TRK-00009', 'BAR-0032', 'Silikon poles', 6, 'Pcs', NULL, '20000', '120000'),
('TRK-00009', 'BAR-0031', 'Shampo Motor', 10, 'Pcs', NULL, '25000', '250000'),
('TRK-00009', 'BAR-0030', 'Detergen W', 10, 'Pcs', NULL, '40000', '400000'),
('TRK-00010', 'BAR-0029', 'Lavender C', 10, 'Pcs', NULL, '75000', '750000'),
('TRK-00010', 'BAR-0028', 'Bogenvile C', 10, 'Pcs', NULL, '75000', '750000'),
('TRK-00010', 'BAR-0027', 'Lily C', 4, 'Pcs', NULL, '75000', '300000'),
('TRK-00010', 'BAR-0026', 'Bogenvile B', 4, 'Pcs', NULL, '85000', '340000'),
('TRK-00010', 'BAR-0025', 'Lavender B', 4, 'Pcs', NULL, '85000', '340000'),
('TRM-00011', 'BAR-0032', 'Silikon poles', 10, 'Pcs', '18000', NULL, '180000'),
('TRM-00012', 'BAR-0011', 'Florista', 4, 'Pcs', '90000', NULL, '360000'),
('TRM-00012', 'BAR-0012', 'Aqua Fresh', 6, 'Pcs', '70000', NULL, '420000'),
('TRM-00012', 'BAR-0015', 'Jasmine', 2, 'Pcs', '70000', NULL, '140000'),
('TRM-00012', 'BAR-0019', 'Strowberry', 6, 'Pcs', '70000', NULL, '420000'),
('TRM-00013', 'BAR-0026', 'Bogenvile B', 2, 'Pcs', '80000', NULL, '160000'),
('TRM-00013', 'BAR-0025', 'Lavender B', 2, 'Pcs', '80000', NULL, '160000'),
('TRM-00013', 'BAR-0024', 'Fantasi C', 2, 'Pcs', '70000', NULL, '140000'),
('TRM-00014', 'BAR-0004', 'Blue Oase', 1, 'Pcs', '90000', NULL, '90000'),
('TRM-00014', 'BAR-0002', 'Lily A', 1, 'Pcs', '90000', NULL, '90000'),
('TRK-00015', 'BAR-0002', 'Lily A', 6, 'Pcs', NULL, '95000', '570000'),
('TRK-00015', 'BAR-0001', 'Lavender A', 6, 'Pcs', NULL, '95000', '570000'),
('TRK-00015', 'BAR-0003', 'Bogenvile A', 6, 'Pcs', NULL, '95000', '570000');

-- --------------------------------------------------------

--
-- Table structure for table `dt_trans1`
--

CREATE TABLE IF NOT EXISTS `dt_trans1` (
  `kode_transaksi` varchar(20) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_beli` decimal(10,0) DEFAULT NULL,
  `harga_jual` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_trans1`
--

INSERT INTO `dt_trans1` (`kode_transaksi`, `kode_barang`, `nama_barang`, `jumlah`, `satuan`, `harga_beli`, `harga_jual`, `total`) VALUES
('JL-00001', 'BAR-0004', 'Blue Oase', 2, 'Pcs', NULL, '95000', '190000'),
('JL-00001', 'BAR-0005', 'Buble Gum', 1, 'Pcs', NULL, '95000', '95000'),
('BL-00002', 'BAR-0002', 'Lily A', 5, 'Pcs', '90000', NULL, '450000'),
('BL-00002', 'BAR-0005', 'Buble Gum', 5, 'Pcs', '90000', NULL, '450000'),
('BL-00003', 'BAR-0032', 'Silikon poles', 5, 'Pcs', '18000', NULL, '90000'),
('BL-00003', 'BAR-0031', 'Shampo Motor', 5, 'Pcs', '20000', NULL, '100000'),
('BL-00003', 'BAR-0030', 'Detergen W', 5, 'Pcs', '35000', NULL, '175000'),
('BL-00003', 'BAR-0029', 'Lavender C', 5, 'Pcs', '70000', NULL, '350000'),
('BL-00004', 'BAR-0005', 'Buble Gum', 1, 'Pcs', '90000', NULL, '90000'),
('BL-00004', 'BAR-0004', 'Blue Oase', 7, 'Pcs', '90000', NULL, '630000'),
('JL-00005', 'BAR-0004', 'Blue Oase', 5, 'Pcs', NULL, '95000', '475000'),
('JL-00005', 'BAR-0001', 'Lavender A', 5, 'Pcs', NULL, '95000', '475000'),
('JL-00005', 'BAR-0002', 'Lily A', 5, 'Pcs', NULL, '95000', '475000'),
('JL-00005', 'BAR-0003', 'Bogenvile A', 5, 'Pcs', NULL, '95000', '475000'),
('BL-00006', 'BAR-0002', 'Lily A', 10, 'Pcs', '90000', NULL, '900000'),
('BL-00006', 'BAR-0001', 'Lavender A', 10, 'Pcs', '90000', NULL, '900000'),
('BL-00006', 'BAR-0003', 'Bogenvile A', 10, 'Pcs', '90000', NULL, '900000'),
('BL-00006', 'BAR-0004', 'Blue Oase', 10, 'Pcs', '90000', NULL, '900000'),
('BL-00006', 'BAR-0005', 'Buble Gum', 10, 'Pcs', '90000', NULL, '900000'),
('BL-00007', 'BAR-0006', 'Violet', 10, 'Pcs', '90000', NULL, '900000'),
('BL-00007', 'BAR-0007', 'Elegan', 10, 'Pcs', '90000', NULL, '900000'),
('BL-00007', 'BAR-0008', 'Fantasi A', 10, 'Pcs', '90000', NULL, '900000'),
('BL-00007', 'BAR-0009', 'Vinolia', 10, 'Pcs', '90000', NULL, '900000'),
('BL-00007', 'BAR-0010', 'Green Tea', 10, 'Pcs', '90000', NULL, '900000'),
('BL-00007', 'BAR-0011', 'Florista', 10, 'Pcs', '90000', NULL, '900000'),
('BL-00007', 'BAR-0012', 'Aqua Fresh', 10, 'Pcs', '70000', NULL, '700000'),
('BL-00008', 'BAR-0013', 'Baby Soap', 10, 'Pcs', '70000', NULL, '700000'),
('BL-00008', 'BAR-0014', 'Blossom', 10, 'Pcs', '70000', NULL, '700000'),
('BL-00008', 'BAR-0015', 'Jasmine', 10, 'Pcs', '70000', NULL, '700000'),
('BL-00008', 'BAR-0016', 'Snapy', 10, 'Pcs', '70000', NULL, '700000'),
('BL-00008', 'BAR-0017', 'Ocean Fresh', 10, 'Pcs', '70000', NULL, '700000'),
('BL-00008', 'BAR-0018', 'Jessica', 10, 'Pcs', '70000', NULL, '700000'),
('BL-00008', 'BAR-0019', 'Strowberry', 10, 'Pcs', '70000', NULL, '700000'),
('BL-00008', 'BAR-0020', 'Lemon', 10, 'Pcs', '70000', NULL, '700000'),
('JL-00009', 'BAR-0002', 'Lily A', 10, 'Pcs', NULL, '95000', '950000'),
('JL-00009', 'BAR-0001', 'Lavender A', 5, 'Pcs', NULL, '95000', '475000'),
('JL-00009', 'BAR-0005', 'Buble Gum', 5, 'Pcs', NULL, '95000', '475000');

-- --------------------------------------------------------

--
-- Table structure for table `dt_trans2`
--

CREATE TABLE IF NOT EXISTS `dt_trans2` (
  `kode_transaksi` varchar(20) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_beli` decimal(10,0) DEFAULT NULL,
  `harga_jual` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_trans2`
--

INSERT INTO `dt_trans2` (`kode_transaksi`, `kode_barang`, `nama_barang`, `jumlah`, `satuan`, `harga_beli`, `harga_jual`, `total`) VALUES
('BL-00001', 'BAR-0001', 'Lavender A', 5, 'Pcs', '90000', NULL, '450000'),
('BL-00001', 'BAR-0002', 'Lily A', 5, 'Pcs', '90000', NULL, '450000'),
('BL-00001', 'BAR-0003', 'Bogenvile A', 5, 'Pcs', '90000', NULL, '450000'),
('BL-00002', 'BAR-0001', 'Lavender A', 7, 'Pcs', '90000', NULL, '630000'),
('BL-00003', 'BAR-0004', 'Blue Oase', 4, 'Pcs', '90000', NULL, '360000'),
('JL-00004', 'BAR-0001', 'Lavender A', 7, 'Pcs', NULL, '95000', '665000'),
('JL-00004', 'BAR-0002', 'Lily A', 7, 'Pcs', NULL, '95000', '665000'),
('JL-00004', 'BAR-0003', 'Bogenvile A', 5, 'Pcs', NULL, '95000', '475000'),
('JL-00005', 'BAR-0003', 'Bogenvile A', 5, 'Pcs', NULL, '95000', '475000');

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE IF NOT EXISTS `master_barang` (
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `kode_kategori` varchar(50) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `harga_beli` decimal(20,0) NOT NULL,
  `harga_jual` decimal(20,0) NOT NULL,
  `stock_awal` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `gambar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_barang`
--

INSERT INTO `master_barang` (`kode_barang`, `nama_barang`, `kode_kategori`, `id_jenis`, `harga_beli`, `harga_jual`, `stock_awal`, `id_satuan`, `gambar`) VALUES
('BAR-0001', 'Lavender A', 'PR001', 3, '90000', '95000', 24, 1, 'IMG-87f4.jpg'),
('BAR-0002', 'Lily A', 'PR001', 3, '90000', '95000', 25, 1, 'IMG-eb76.jpg'),
('BAR-0003', 'Bogenvile A', 'PR001', 3, '90000', '95000', 24, 1, 'IMG-de56.jpg'),
('BAR-0004', 'Blue Oase', 'PR001', 3, '90000', '95000', 31, 1, 'IMG-9568.jpg'),
('BAR-0005', 'Buble Gum', 'PR001', 3, '90000', '95000', 30, 1, 'IMG-f9d3.jpg'),
('BAR-0006', 'Violet', 'PR001', 3, '90000', '95000', 15, 1, 'IMG-f29e.jpg'),
('BAR-0007', 'Elegan', 'PR001', 3, '90000', '95000', 17, 1, 'IMG-0043.jpg'),
('BAR-0008', 'Fantasi A', 'PR001', 3, '90000', '95000', 20, 1, 'IMG-ce46.jpg'),
('BAR-0009', 'Vinolia', 'PR001', 3, '90000', '95000', 0, 1, 'IMG-c4eb.jpg'),
('BAR-0010', 'Green Tea', 'PR001', 3, '90000', '95000', 21, 1, 'IMG-2368.jpg'),
('BAR-0011', 'Florista', 'PR001', 3, '90000', '95000', 20, 1, 'IMG-79e0.jpg'),
('BAR-0012', 'Aqua Fresh', 'PR001', 1, '70000', '75000', 20, 1, 'IMG-c55c.jpg'),
('BAR-0013', 'Baby Soap', 'PR001', 1, '70000', '75000', 33, 1, 'IMG-2aa5.jpg'),
('BAR-0014', 'Blossom', 'PR001', 1, '70000', '75000', 20, 1, 'IMG-5cfc.jpg'),
('BAR-0015', 'Jasmine', 'PR001', 1, '70000', '75000', 20, 1, 'IMG-e33b.jpg'),
('BAR-0016', 'Snapy', 'PR001', 1, '70000', '75000', 25, 1, 'IMG-4168.jpg'),
('BAR-0017', 'Ocean Fresh', 'PR001', 1, '70000', '75000', 41, 1, 'IMG-bf81.jpg'),
('BAR-0018', 'Jessica', 'PR001', 1, '70000', '75000', 20, 1, 'IMG-2661.jpg'),
('BAR-0019', 'Strowberry', 'PR001', 1, '70000', '75000', 10, 1, 'IMG-edb4.jpg'),
('BAR-0020', 'Lemon', 'PR001', 1, '70000', '75000', 7, 1, 'IMG-5b52.jpg'),
('BAR-0021', 'Apel', 'PR001', 1, '70000', '75000', 22, 1, 'IMG-1b38.jpg'),
('BAR-0022', 'Lumintu', 'PR001', 1, '70000', '75000', 6, 1, 'IMG-75f4.jpg'),
('BAR-0023', 'Lily B', 'PR001', 2, '80000', '85000', 15, 1, 'IMG-d2e3.jpg'),
('BAR-0024', 'Fantasi C', 'PR001', 1, '70000', '75000', 22, 1, 'IMG-d059.jpg'),
('BAR-0025', 'Lavender B', 'PR001', 1, '80000', '85000', 18, 1, 'IMG-a68c.jpg'),
('BAR-0026', 'Bogenvile B', 'PR001', 1, '80000', '85000', 20, 1, 'IMG-d165.jpg'),
('BAR-0027', 'Lily C', 'PR001', 1, '70000', '75000', 20, 1, 'IMG-6aab.jpg'),
('BAR-0028', 'Bogenvile C', 'PR001', 1, '70000', '75000', 10, 1, 'IMG-8337.jpg'),
('BAR-0029', 'Lavender C', 'PR001', 1, '70000', '75000', 20, 1, 'IMG-133b.jpg'),
('BAR-0030', 'Detergen W', 'DT001', 2, '35000', '40000', 20, 1, 'IMG-3c34.jpg'),
('BAR-0031', 'Shampo Motor', 'NP001', 1, '20000', '25000', 20, 1, 'IMG-5c17.jpg'),
('BAR-0032', 'Silikon poles', 'NP001', 1, '18000', '20000', 20, 1, 'IMG-8d29.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `master_jenisbarang`
--

CREATE TABLE IF NOT EXISTS `master_jenisbarang` (
  `id_jenis` int(11) NOT NULL,
  `jenis_barang` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_jenisbarang`
--

INSERT INTO `master_jenisbarang` (`id_jenis`, `jenis_barang`) VALUES
(1, 'Standar'),
(2, 'Premium'),
(3, 'Exclusive');

-- --------------------------------------------------------

--
-- Table structure for table `master_kategori`
--

CREATE TABLE IF NOT EXISTS `master_kategori` (
  `kode_kategori` varchar(50) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_kategori`
--

INSERT INTO `master_kategori` (`kode_kategori`, `kategori`) VALUES
('BB001', 'Bahan Baku'),
('BP001', 'Bibit Parfume'),
('DT001', 'Detergen'),
('ND001', 'Anti Noda'),
('NP001', 'Non-Parfume'),
('PR001', 'Parfum');

-- --------------------------------------------------------

--
-- Table structure for table `master_supplier`
--

CREATE TABLE IF NOT EXISTS `master_supplier` (
  `kode_supplier` varchar(50) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `telepon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_supplier`
--

INSERT INTO `master_supplier` (`kode_supplier`, `nama_supplier`, `alamat_supplier`, `telepon`) VALUES
('SP-0001', 'PT. Dwi Karya Chemindo Abadi', 'Yogyakarta', '08654323456'),
('SP-0002', 'Javas Aroma Chemical', 'Yogyakarta', '08512346789'),
('SP-0003', 'CV. Satria Maju Abadi', 'Ds.Godegan Tamantirto Kasihan Bantul', '085745879052');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telepon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `telepon`) VALUES
('PL-0001', 'Mas Iyan', 'Manding, Bantul', '081234567'),
('PL-0002', 'Pak Gatot', 'Mrisi Tirtonirnolo Kasihan Ban', '08555667'),
('PL-0003', 'Ibu Ayi', 'Patang Puluhan', '99789700'),
('PL-0004', 'Ghofur', 'Minggiran', '90809830'),
('PL-0005', 'Noname', 'Noname', 'tidak didefinisikan');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Pcs'),
(2, 'Kg'),
(4, 'Ltr');

-- --------------------------------------------------------

--
-- Table structure for table `stok_toko1`
--

CREATE TABLE IF NOT EXISTS `stok_toko1` (
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `kode_kategori` varchar(20) NOT NULL,
  `id_jenis` int(10) NOT NULL,
  `harga_beli` decimal(20,0) NOT NULL,
  `harga_jual` decimal(20,0) NOT NULL,
  `stok` int(10) NOT NULL,
  `id_satuan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_toko1`
--

INSERT INTO `stok_toko1` (`kode_barang`, `nama_barang`, `kode_kategori`, `id_jenis`, `harga_beli`, `harga_jual`, `stok`, `id_satuan`) VALUES
('BAR-0001', 'Lavender A', 'PR001', 3, '90000', '95000', 20, 1),
('BAR-0002', 'Lily A', 'PR001', 3, '90000', '95000', 20, 1),
('BAR-0003', 'Bogenvile A', 'PR001', 3, '90000', '95000', 20, 1),
('BAR-0004', 'Blue Oase', 'PR001', 3, '90000', '95000', 25, 1),
('BAR-0005', 'Buble Gum', 'PR001', 3, '90000', '95000', 25, 1),
('BAR-0006', 'Violet', 'PR001', 3, '90000', '95000', 20, 1),
('BAR-0007', 'Elegan', 'PR001', 3, '90000', '95000', 20, 1),
('BAR-0008', 'Fantasi A', 'PR001', 3, '90000', '95000', 20, 1),
('BAR-0009', 'Vinolia', 'PR001', 3, '90000', '95000', 16, 1),
('BAR-0010', 'Green Tea', 'PR001', 3, '90000', '95000', 20, 1),
('BAR-0011', 'Florista', 'PR001', 3, '90000', '95000', 20, 1),
('BAR-0012', 'Aqua Fresh', 'PR001', 1, '70000', '75000', 20, 1),
('BAR-0013', 'Baby Soap', 'PR001', 1, '70000', '75000', 20, 1),
('BAR-0014', 'Blossom', 'PR001', 1, '70000', '75000', 20, 1),
('BAR-0015', 'Jasmine', 'PR001', 1, '70000', '75000', 20, 1),
('BAR-0016', 'Snapy', 'PR001', 1, '70000', '75000', 20, 1),
('BAR-0017', 'Ocean Fresh', 'PR001', 1, '70000', '75000', 20, 1),
('BAR-0018', 'Jessica', 'PR001', 1, '70000', '75000', 10, 1),
('BAR-0019', 'Strowberry', 'PR001', 1, '70000', '75000', 20, 1),
('BAR-0020', 'Lemon', 'PR001', 1, '70000', '75000', 20, 1),
('BAR-0021', 'Apel', 'PR001', 1, '70000', '75000', 10, 1),
('BAR-0022', 'Lumintu', 'PR001', 1, '70000', '75000', 10, 1),
('BAR-0023', 'Lily B', 'PR001', 2, '80000', '85000', 20, 1),
('BAR-0024', 'Fantasi C', 'PR001', 1, '70000', '75000', 10, 1),
('BAR-0025', 'Lavender B', 'PR001', 1, '80000', '85000', 10, 1),
('BAR-0026', 'Bogenvile B', 'PR001', 1, '80000', '85000', 10, 1),
('BAR-0027', 'Lily C', 'PR001', 1, '70000', '75000', 10, 1),
('BAR-0028', 'Bogenvile C', 'PR001', 1, '70000', '75000', 10, 1),
('BAR-0029', 'Lavender C', 'PR001', 1, '70000', '75000', 15, 1),
('BAR-0030', 'Detergen W', 'DT001', 2, '35000', '40000', 15, 1),
('BAR-0031', 'Shampo Motor', 'NP001', 1, '20000', '25000', 15, 1),
('BAR-0032', 'Silikon poles', 'NP001', 1, '18000', '20000', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stok_toko2`
--

CREATE TABLE IF NOT EXISTS `stok_toko2` (
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `kode_kategori` varchar(20) NOT NULL,
  `id_jenis` int(10) NOT NULL,
  `harga_beli` decimal(10,0) NOT NULL,
  `harga_jual` decimal(10,0) NOT NULL,
  `stok` int(10) NOT NULL,
  `id_satuan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_toko2`
--

INSERT INTO `stok_toko2` (`kode_barang`, `nama_barang`, `kode_kategori`, `id_jenis`, `harga_beli`, `harga_jual`, `stok`, `id_satuan`) VALUES
('BAR-0001', 'Lavender A', 'PR001', 3, '90000', '95000', 20, 1),
('BAR-0002', 'Lily A', 'PR001', 3, '90000', '95000', 13, 1),
('BAR-0003', 'Bogenvile A', 'PR001', 3, '90000', '95000', 10, 1),
('BAR-0004', 'Blue Oase', 'PR001', 3, '90000', '95000', 40, 1),
('BAR-0005', 'Buble Gum', 'PR001', 3, '90000', '95000', 26, 1),
('BAR-0006', 'Violet', 'PR001', 3, '90000', '95000', 23, 1),
('BAR-0007', 'Elegan', 'PR001', 3, '90000', '95000', 20, 1),
('BAR-0008', 'Fantasi A', 'PR001', 3, '90000', '95000', 20, 1),
('BAR-0009', 'Vinolia', 'PR001', 3, '90000', '95000', 0, 1),
('BAR-0010', 'Green Tea', 'PR001', 3, '90000', '95000', 20, 1),
('BAR-0011', 'Florista', 'PR001', 3, '90000', '95000', 20, 1),
('BAR-0012', 'Aqua Fresh', 'PR001', 1, '70000', '75000', 20, 1),
('BAR-0013', 'Baby Soap', 'PR001', 1, '70000', '75000', 20, 1),
('BAR-0014', 'Blossom', 'PR001', 1, '70000', '75000', 20, 1),
('BAR-0015', 'Jasmine', 'PR001', 1, '70000', '75000', 0, 1),
('BAR-0016', 'Snapy', 'PR001', 1, '70000', '75000', 0, 1),
('BAR-0017', 'Ocean Fresh', 'PR001', 1, '70000', '75000', 0, 1),
('BAR-0018', 'Jessica', 'PR001', 1, '70000', '75000', 0, 1),
('BAR-0019', 'Strowberry', 'PR001', 1, '70000', '75000', 0, 1),
('BAR-0020', 'Lemon', 'PR001', 1, '70000', '75000', 0, 1),
('BAR-0021', 'Apel', 'PR001', 1, '70000', '75000', 0, 1),
('BAR-0022', 'Lumintu', 'PR001', 1, '70000', '75000', 0, 1),
('BAR-0023', 'Lily B', 'PR001', 2, '80000', '85000', 0, 1),
('BAR-0024', 'Fantasi C', 'PR001', 1, '70000', '75000', 0, 1),
('BAR-0025', 'Lavender B', 'PR001', 1, '80000', '85000', 0, 1),
('BAR-0026', 'Bogenvile B', 'PR001', 1, '80000', '85000', 0, 1),
('BAR-0027', 'Lily C', 'PR001', 1, '70000', '75000', 0, 1),
('BAR-0028', 'Bogenvile C', 'PR001', 1, '70000', '75000', 0, 1),
('BAR-0029', 'Lavender C', 'PR001', 1, '70000', '75000', 0, 1),
('BAR-0030', 'Detergen W', 'DT001', 2, '35000', '40000', 0, 1),
('BAR-0031', 'Shampo Motor', 'NP001', 1, '20000', '25000', 0, 1),
('BAR-0032', 'Silikon poles', 'NP001', 1, '18000', '20000', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE IF NOT EXISTS `toko` (
  `id_toko` int(10) NOT NULL,
  `nama_toko` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telepon` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat`, `telepon`) VALUES
(1, 'Toko Mundu', 'jl. Perumnas depok sleman', '0888765983'),
(2, 'Toko Ringroad', 'jl.ringroad selatan tamantirto', '085747886622');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `kode_transaksi` varchar(20) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `kode_supplier` varchar(50) DEFAULT NULL,
  `id_toko` varchar(20) DEFAULT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `status_pergerakan` char(1) NOT NULL COMMENT 'pergerakan barang masuk = 1 atau keluar = 2',
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `tanggal_transaksi`, `kode_supplier`, `id_toko`, `total_harga`, `status_pergerakan`, `username`) VALUES
('TRK-00002', '2017-07-27', NULL, '2', '1900000', '2', 'Ari'),
('TRK-00004', '2017-07-27', NULL, '1', '450000', '2', 'Ari'),
('TRK-00007', '2017-07-29', NULL, '1', '170000', '2', 'Ari'),
('TRK-00009', '2017-07-31', NULL, '2', '770000', '2', 'Ari'),
('TRK-00010', '2017-07-31', NULL, '1', '2480000', '2', 'Ari'),
('TRK-00015', '2017-08-04', NULL, '1', '1710000', '2', 'Ari'),
('TRM-00001', '2017-07-27', 'SP-0003', NULL, '1800000', '1', 'Ari'),
('TRM-00003', '2017-07-27', 'SP-0002', NULL, '210000', '1', 'Ari'),
('TRM-00005', '2017-07-29', 'SP-0002', NULL, '90000', '1', 'Ari'),
('TRM-00006', '2017-07-29', 'SP-0003', NULL, '720000', '1', 'Ari'),
('TRM-00008', '2017-07-31', 'SP-0003', NULL, '7380000', '1', 'Ari'),
('TRM-00011', '2017-08-01', 'SP-0003', NULL, '180000', '1', 'Ari'),
('TRM-00012', '2017-08-04', 'SP-0003', NULL, '1340000', '1', 'Ari'),
('TRM-00013', '2017-08-04', 'SP-0003', NULL, '460000', '1', 'Ari'),
('TRM-00014', '2017-08-04', 'SP-0002', NULL, '180000', '1', 'Ari');

-- --------------------------------------------------------

--
-- Table structure for table `trans_toko1`
--

CREATE TABLE IF NOT EXISTS `trans_toko1` (
  `kode_transaksi` varchar(10) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `kode_supplier` varchar(20) DEFAULT NULL,
  `id_pelanggan` varchar(20) DEFAULT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'status pembelian=1 atau penjualan =2',
  `penerima` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_toko1`
--

INSERT INTO `trans_toko1` (`kode_transaksi`, `tanggal_transaksi`, `kode_supplier`, `id_pelanggan`, `total_harga`, `status`, `penerima`) VALUES
('BL-00002', '2017-08-05', 'SP-0003', NULL, '900000', '1', 'Gulam'),
('BL-00003', '2017-08-05', 'SP-0003', NULL, '715000', '1', 'Gulam'),
('BL-00004', '2017-08-05', 'SP-0003', NULL, '720000', '1', 'Gulam'),
('BL-00006', '2017-08-05', 'SP-0003', NULL, '4500000', '1', 'Gulam'),
('BL-00007', '2017-08-06', 'SP-0003', NULL, '6100000', '1', 'Gulam'),
('BL-00008', '2017-08-06', 'SP-0003', NULL, '5600000', '1', 'Gulam'),
('JL-00001', '2017-08-05', NULL, 'PL-0001', '285000', '2', 'Gulam'),
('JL-00005', '2017-08-05', NULL, 'PL-0005', '1900000', '2', 'Gulam'),
('JL-00009', '2017-08-05', NULL, 'PL-0002', '1900000', '2', 'Gulam');

-- --------------------------------------------------------

--
-- Table structure for table `trans_toko2`
--

CREATE TABLE IF NOT EXISTS `trans_toko2` (
  `kode_transaksi` varchar(20) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `kode_supplier` varchar(20) DEFAULT NULL,
  `id_pelanggan` varchar(20) DEFAULT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'status pembelian=1 atau penjualan =2',
  `penerima` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_toko2`
--

INSERT INTO `trans_toko2` (`kode_transaksi`, `tanggal_transaksi`, `kode_supplier`, `id_pelanggan`, `total_harga`, `status`, `penerima`) VALUES
('BL-00001', '2017-08-06', 'SP-0003', NULL, '1350000', '1', 'Indi'),
('BL-00002', '2017-08-06', 'SP-0002', NULL, '630000', '1', 'Indi'),
('BL-00003', '2017-08-06', 'SP-0003', NULL, '360000', '1', 'Indi'),
('JL-00004', '2017-08-06', NULL, 'PL-0005', '1805000', '2', 'Indi'),
('JL-00005', '2017-08-06', NULL, 'PL-0002', '475000', '2', 'Indi');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
  `id_usergroup` int(21) NOT NULL,
  `usergroup` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`id_usergroup`, `usergroup`) VALUES
(1, 'Administrator'),
(2, 'TokoRingroad'),
(3, 'Gudang'),
(4, 'Pimpinan'),
(5, 'TokoMundu');

-- --------------------------------------------------------

--
-- Table structure for table `user_akses`
--

CREATE TABLE IF NOT EXISTS `user_akses` (
  `id_user` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `id_usergroup` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_akses`
--

INSERT INTO `user_akses` (`id_user`, `username`, `password`, `email`, `nama_pengguna`, `status`, `id_usergroup`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'adminsatria@gmail.com', 'Ervin Santoso', 'aktif', 1),
(2, 'gudang', '202446dd1d6028084426867365b0c7a1', 'gudangsatria@gmail.com', 'Ari', 'aktif', 3),
(3, 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'satriamajuabadi@gmail.com', 'Dwi', 'aktif', 4),
(4, 'tokoringroad', '71d8ebdc2d653e94c2870e6be00d8467', 'tokosatria1@gmail.com', 'Indi', 'aktif', 2),
(5, 'tokomundu', '9149b58181b054b5393344e7f0d0efcc', 'tokosatria2@gmail.com', 'Gulam', 'aktif', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `timestamp` (`timestamp`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `dt_trans1`
--
ALTER TABLE `dt_trans1`
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `dt_trans2`
--
ALTER TABLE `dt_trans2`
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`kode_barang`), ADD KEY `kode_kategori` (`kode_kategori`), ADD KEY `id_jenis` (`id_jenis`), ADD KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `master_jenisbarang`
--
ALTER TABLE `master_jenisbarang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `master_kategori`
--
ALTER TABLE `master_kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `master_supplier`
--
ALTER TABLE `master_supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `stok_toko1`
--
ALTER TABLE `stok_toko1`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `stok_toko2`
--
ALTER TABLE `stok_toko2`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `trans_toko1`
--
ALTER TABLE `trans_toko1`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `trans_toko2`
--
ALTER TABLE `trans_toko2`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`id_usergroup`);

--
-- Indexes for table `user_akses`
--
ALTER TABLE `user_akses`
  ADD PRIMARY KEY (`id_user`), ADD KEY `id_usergroup` (`id_usergroup`), ADD KEY `id_usergroup_2` (`id_usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_jenisbarang`
--
ALTER TABLE `master_jenisbarang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `id_usergroup` int(21) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_akses`
--
ALTER TABLE `user_akses`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_barang`
--
ALTER TABLE `master_barang`
ADD CONSTRAINT `master_barang_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `master_kategori` (`kode_kategori`),
ADD CONSTRAINT `master_barang_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `master_jenisbarang` (`id_jenis`),
ADD CONSTRAINT `master_barang_ibfk_3` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`);

--
-- Constraints for table `user_akses`
--
ALTER TABLE `user_akses`
ADD CONSTRAINT `user_akses_ibfk_1` FOREIGN KEY (`id_usergroup`) REFERENCES `usergroup` (`id_usergroup`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
