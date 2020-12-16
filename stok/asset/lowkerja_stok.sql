-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Jan 2020 pada 09.43
-- Versi server: 5.7.29-log
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lowkerja_stok`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) NOT NULL,
  `blokir` enum('Y','N') NOT NULL DEFAULT 'N',
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`username`, `password`, `nama_lengkap`, `level`, `blokir`, `foto`) VALUES
('administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'administrator', '01', 'N', 'avatar.jpg'),
('hadisewuayam', 'e426608e833c528b1a73a4759ca61639', 'HSA', '02', 'N', 'avatar1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` char(15) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` char(10) NOT NULL,
  `stok_awal` float(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `satuan`, `stok_awal`) VALUES
('BAR0001', 'KARKAS 1-1.3 KG', 'PCS', 0.0),
('BAR0002', 'KARKAS 1.4 - 1.7 KG', 'PCS', 0.0),
('BAR0003', 'KARKAS 1.7 - 2.2 KG', 'PCS', 0.0),
('BAR0004', 'DADA UTUH', 'PCS', 0.0),
('BAR0005', 'SAYAP DOLLAR', 'PCS', 0.0),
('BAR0006', 'SAYAP BIASA', 'PCS', 0.0),
('BAR0007', 'PAHA SAMBUNG', 'PCS', 0.0),
('BAR0008', 'PAHA ATAS', 'PCS', 0.0),
('BAR0009', 'PAHA BAWAH', 'PCS', 0.0),
('BAR0010', 'BONELESS DADA KULIT', 'PCS', 0.0),
('BAR0011', 'BONELESS DADA TANPA KULIT', 'PCS', 0.0),
('BAR0012', 'BERUTU ', 'PCS', 0.0),
('BAR0014', 'DADA SAMBUNG', 'PCS', 0.0),
('BAR0015', 'DAGING', 'PCS', 0.0),
('BAR0016', 'BONELESS PAHA KULIT', 'PCS', 0.0),
('BAR0017', 'BONELESS PAHA TANPA KULIT', 'PCS', 0.0),
('BAR0018', 'KULIT', 'PCS', 0.0),
('BAR0019', 'TULANG DADA', 'PCS', 0.0),
('BAR0020', 'TULANG PAHA', 'PCS', 0.0),
('BAR0021', 'TULANG KERING ', 'PCS', 0.0),
('BAR0022', 'CAMPUR (DAGING SAYAP DADA)', 'PCS', 0.0),
('BAR0023', 'USUS', 'PCS', 0.0),
('BAR0024', 'KEPALA', 'PCS', 0.0),
('BAR0025', 'CEKER', 'PCS', 0.0),
('BAR0026', 'ATI', 'PCS', 0.0),
('BAR0027', 'TETELAN LEMAK', 'PCS', 0.0),
('BAR0028', 'TETELAN DAGING', 'PCS', 0.0),
('BAR0029', 'AYAM UTUH (1.5)', 'PCS', 0.0),
('BAR0030', 'DADA CACAH', 'PCS', 0.0),
('BAR0031', 'DADA POTONG', 'KG', 0.0),
('BAR0032', 'DAGING CACAH JELEK', 'KG', 0.0),
('BAR0033', 'KEPALA+CEKER', 'KG', 0.0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1e6d01ad4c63f7ece533185fff5a810e', '103.65.212.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', 1576730407, ''),
('6e1ada055051ebd725657d4c42845db6', '103.65.212.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', 1576730372, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"logged_in\";s:13:\"aingLoginYeuh\";s:8:\"username\";s:13:\"administrator\";s:12:\"nama_lengkap\";s:13:\"administrator\";s:4:\"foto\";s:10:\"avatar.jpg\";s:5:\"level\";s:2:\"01\";}'),
('b3a1a5ee4b85750e2d69b1b46f00d9e8', '103.65.212.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 1576730338, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"logged_in\";s:13:\"aingLoginYeuh\";s:8:\"username\";s:13:\"administrator\";s:12:\"nama_lengkap\";s:13:\"administrator\";s:4:\"foto\";s:10:\"avatar.jpg\";s:5:\"level\";s:2:\"01\";}'),
('d408afb7ec9e761782df2144bfff445e', '103.65.212.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', 1576730407, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_beli`
--

CREATE TABLE `d_beli` (
  `idbeli` smallint(6) NOT NULL,
  `kodebeli` char(15) NOT NULL,
  `kode_barang` char(15) NOT NULL,
  `jmlbeli` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `d_beli`
--

INSERT INTO `d_beli` (`idbeli`, `kodebeli`, `kode_barang`, `jmlbeli`) VALUES
(1, 'BL00001', 'BAR0018', 0.6),
(2, 'BL00001', 'BAR0009', 1.2),
(3, 'BL00001', 'BAR0028', 24.3),
(4, 'BL00001', 'BAR0004', 3.6),
(5, 'BL00001', 'BAR0001', 49.7),
(6, 'BL00001', 'BAR0030', 0.5),
(7, 'BL00001', 'BAR0006', 5.4),
(8, 'BL00001', 'BAR0019', 26.8),
(9, 'BL00001', 'BAR0024', 1.8),
(10, 'BL00001', 'BAR0025', 1.8),
(11, 'BL00001', 'BAR0020', 19.6),
(12, 'BL00001', 'BAR0026', 0.8),
(13, 'BL00001', 'BAR0027', 1.0),
(14, 'BL00001', 'BAR0022', 0.7),
(15, 'BL00002', 'BAR0001', 44.8),
(16, 'BL00002', 'BAR0004', 8.2),
(17, 'BL00002', 'BAR0018', 10.4),
(18, 'BL00002', 'BAR0009', 2.4),
(21, 'BL00002', 'BAR0016', 4.0),
(22, 'BL00002', 'BAR0006', 1.8),
(23, 'BL00002', 'BAR0020', 1.7),
(24, 'BL00002', 'BAR0010', 0.3),
(25, 'BL00002', 'BAR0033', 6.5),
(26, 'BL00001', 'BAR0032', 10.6),
(27, 'BL00001', 'BAR0033', 13.1),
(28, 'BL00003', 'BAR0001', 52.0),
(29, 'BL00003', 'BAR0011', 2.0),
(30, 'BL00003', 'BAR0016', 15.0),
(31, 'BL00003', 'BAR0007', 40.0),
(32, 'BL00003', 'BAR0010', 5.0),
(33, 'BL00003', 'BAR0018', 10.1),
(34, 'BL00003', 'BAR0033', 6.5),
(35, 'BL00003', 'BAR0019', 0.7),
(36, 'BL00004', 'BAR0026', 1.0),
(37, 'BL00004', 'BAR0023', 1.0),
(38, 'BL00004', 'BAR0001', 25.8),
(39, 'BL00004', 'BAR0010', 2.0),
(40, 'BL00004', 'BAR0004', 6.9),
(41, 'BL00004', 'BAR0006', 1.4),
(42, 'BL00004', 'BAR0008', 2.2),
(43, 'BL00004', 'BAR0005', 1.0),
(44, 'BL00004', 'BAR0031', 1.9),
(45, 'BL00004', 'BAR0018', 10.0),
(46, 'BL00004', 'BAR0016', 7.0),
(47, 'BL00004', 'BAR0009', 1.2),
(48, 'BL00004', 'BAR0007', 6.6),
(49, 'BL00004', 'BAR0012', 0.3),
(50, 'BL00004', 'BAR0025', 2.4),
(51, 'BL00004', 'BAR0024', 4.4),
(52, 'BL00004', 'BAR0019', 2.3),
(53, 'BL00005', 'BAR0001', 55.3),
(54, 'BL00005', 'BAR0004', 1.2),
(55, 'BL00005', 'BAR0010', 3.9),
(56, 'BL00005', 'BAR0018', 11.0),
(57, 'BL00005', 'BAR0025', 5.9),
(58, 'BL00005', 'BAR0024', 12.0),
(59, 'BL00005', 'BAR0020', 4.0),
(60, 'BL00005', 'BAR0019', 1.5),
(61, 'BL00005', 'BAR0016', 9.7),
(62, 'BL00005', 'BAR0009', 1.2),
(63, 'BL00006', 'BAR0001', 32.3),
(64, 'BL00006', 'BAR0010', 4.0),
(65, 'BL00006', 'BAR0016', 5.0),
(66, 'BL00006', 'BAR0018', 10.5),
(67, 'BL00006', 'BAR0017', 5.1),
(68, 'BL00006', 'BAR0024', 0.8),
(69, 'BL00006', 'BAR0009', 0.3),
(70, 'BL00006', 'BAR0019', 2.9),
(71, 'BL00006', 'BAR0006', 2.5),
(72, 'BL00006', 'BAR0012', 0.4),
(73, 'BL00007', 'BAR0001', 36.8),
(74, 'BL00007', 'BAR0009', 3.5),
(75, 'BL00007', 'BAR0031', 5.3),
(76, 'BL00007', 'BAR0008', 5.0),
(77, 'BL00007', 'BAR0006', 3.1),
(79, 'BL00007', 'BAR0033', 8.0),
(80, 'BL00007', 'BAR0004', 5.9),
(81, 'BL00007', 'BAR0012', 0.9),
(82, 'BL00007', 'BAR0030', 0.3),
(83, 'BL00008', 'BAR0008', 12.5),
(84, 'BL00008', 'BAR0001', 27.3),
(85, 'BL00008', 'BAR0004', 7.1),
(86, 'BL00008', 'BAR0010', 3.3),
(87, 'BL00008', 'BAR0025', 2.1),
(88, 'BL00008', 'BAR0024', 4.5),
(89, 'BL00008', 'BAR0006', 1.7),
(90, 'BL00008', 'BAR0019', 1.0),
(91, 'BL00008', 'BAR0009', 4.3),
(92, 'BL00008', 'BAR0030', 1.4),
(93, 'BL00008', 'BAR0012', 0.5),
(94, 'BL00008', 'BAR0005', 1.0),
(95, 'BL00008', 'BAR0016', 9.0),
(96, 'BL00009', 'BAR0008', 5.6),
(97, 'BL00009', 'BAR0001', 50.5),
(98, 'BL00009', 'BAR0007', 15.0),
(99, 'BL00009', 'BAR0010', 11.8),
(100, 'BL00009', 'BAR0025', 0.1),
(101, 'BL00009', 'BAR0017', 7.0),
(102, 'BL00009', 'BAR0011', 5.0),
(103, 'BL00009', 'BAR0018', 9.5),
(104, 'BL00009', 'BAR0016', 7.0),
(105, 'BL00009', 'BAR0004', 1.5),
(106, 'BL00009', 'BAR0009', 2.8),
(107, 'BL00009', 'BAR0019', 2.9),
(108, 'BL00009', 'BAR0006', 2.3),
(109, 'BL00009', 'BAR0012', 0.2),
(110, 'BL00010', 'BAR0004', 2.0),
(111, 'BL00010', 'BAR0031', 2.1),
(112, 'BL00010', 'BAR0006', 3.7),
(113, 'BL00010', 'BAR0001', 60.2),
(114, 'BL00010', 'BAR0016', 3.9),
(115, 'BL00010', 'BAR0018', 10.0),
(116, 'BL00010', 'BAR0020', 1.7),
(117, 'BL00010', 'BAR0007', 1.6),
(118, 'BL00010', 'BAR0012', 0.1),
(119, 'BL00011', 'BAR0033', 9.0),
(120, 'BL00011', 'BAR0002', 62.8),
(121, 'BL00011', 'BAR0011', 14.8),
(122, 'BL00011', 'BAR0026', 1.0),
(123, 'BL00011', 'BAR0024', 1.0),
(124, 'BL00011', 'BAR0023', 1.0),
(125, 'BL00011', 'BAR0016', 3.9),
(126, 'BL00011', 'BAR0007', 22.0),
(127, 'BL00011', 'BAR0010', 4.6),
(128, 'BL00011', 'BAR0006', 7.7),
(129, 'BL00011', 'BAR0018', 11.6),
(130, 'BL00011', 'BAR0019', 6.0),
(131, 'BL00011', 'BAR0030', 0.8),
(132, 'BL00012', 'BAR0016', 3.1),
(133, 'BL00012', 'BAR0004', 11.1),
(134, 'BL00012', 'BAR0031', 3.3),
(135, 'BL00012', 'BAR0006', 3.1),
(136, 'BL00012', 'BAR0033', 10.0),
(137, 'BL00012', 'BAR0025', 0.6),
(138, 'BL00012', 'BAR0030', 0.9),
(139, 'BL00012', 'BAR0020', 0.3),
(140, 'BL00012', 'BAR0001', 78.9),
(141, 'BL00012', 'BAR0007', 10.0),
(142, 'BL00013', 'BAR0016', 5.1),
(143, 'BL00013', 'BAR0004', 18.1),
(144, 'BL00013', 'BAR0010', 4.9),
(145, 'BL00013', 'BAR0001', 58.5),
(146, 'BL00013', 'BAR0007', 6.4),
(147, 'BL00013', 'BAR0033', 7.0),
(148, 'BL00013', 'BAR0017', 10.0),
(149, 'BL00013', 'BAR0006', 9.2),
(150, 'BL00013', 'BAR0019', 1.6),
(151, 'BL00013', 'BAR0020', 4.9),
(152, 'BL00013', 'BAR0024', 2.1),
(153, 'BL00013', 'BAR0025', 1.9),
(154, 'BL00013', 'BAR0018', 1.6),
(155, 'BL00014', 'BAR0017', 6.9),
(156, 'BL00014', 'BAR0016', 5.1),
(157, 'BL00014', 'BAR0001', 59.1),
(158, 'BL00014', 'BAR0011', 5.0),
(159, 'BL00014', 'BAR0004', 14.0),
(160, 'BL00014', 'BAR0025', 5.5),
(161, 'BL00014', 'BAR0030', 5.9),
(162, 'BL00014', 'BAR0019', 3.2),
(163, 'BL00014', 'BAR0024', 8.8),
(164, 'BL00014', 'BAR0020', 5.0),
(165, 'BL00014', 'BAR0006', 5.2),
(166, 'BL00014', 'BAR0018', 1.4),
(167, 'BL00015', 'BAR0025', 6.8),
(168, 'BL00015', 'BAR0001', 105.5),
(169, 'BL00015', 'BAR0016', 9.9),
(170, 'BL00015', 'BAR0006', 10.3),
(171, 'BL00015', 'BAR0004', 32.3),
(172, 'BL00015', 'BAR0007', 20.0),
(173, 'BL00015', 'BAR0010', 4.9),
(174, 'BL00015', 'BAR0018', 10.2),
(175, 'BL00015', 'BAR0024', 10.8),
(176, 'BL00015', 'BAR0020', 4.3),
(177, 'BL00015', 'BAR0019', 1.3),
(179, 'BL00016', 'BAR0001', 61.9),
(180, 'BL00016', 'BAR0016', 5.9),
(181, 'BL00016', 'BAR0010', 4.0),
(182, 'BL00016', 'BAR0006', 3.4),
(183, 'BL00016', 'BAR0009', 1.0),
(185, 'BL00016', 'BAR0019', 7.0),
(186, 'BL00016', 'BAR0007', 2.6),
(187, 'BL00016', 'BAR0008', 1.5),
(188, 'BL00016', 'BAR0020', 2.7),
(189, 'BL00016', 'BAR0018', 1.9),
(190, 'BL00016', 'BAR0011', 16.8),
(191, 'BL00017', 'BAR0001', 52.7),
(192, 'BL00017', 'BAR0010', 2.8),
(193, 'BL00017', 'BAR0006', 2.8),
(194, 'BL00017', 'BAR0016', 4.0),
(195, 'BL00017', 'BAR0008', 1.2),
(196, 'BL00017', 'BAR0004', 3.9),
(197, 'BL00017', 'BAR0020', 2.2),
(198, 'BL00017', 'BAR0019', 0.8),
(199, 'BL00017', 'BAR0009', 0.9),
(200, 'BL00018', 'BAR0001', 55.2),
(201, 'BL00018', 'BAR0004', 18.9),
(202, 'BL00018', 'BAR0010', 11.3),
(203, 'BL00018', 'BAR0016', 6.0),
(204, 'BL00018', 'BAR0007', 50.6),
(205, 'BL00018', 'BAR0019', 2.7),
(206, 'BL00018', 'BAR0006', 1.7),
(207, 'BL00018', 'BAR0020', 4.1),
(208, 'BL00018', 'BAR0024', 1.2),
(209, 'BL00019', 'BAR0001', 83.0),
(210, 'BL00019', 'BAR0010', 5.5),
(211, 'BL00019', 'BAR0006', 4.0),
(212, 'BL00019', 'BAR0011', 7.0),
(213, 'BL00019', 'BAR0016', 3.5),
(215, 'BL00019', 'BAR0019', 3.4),
(216, 'BL00019', 'BAR0007', 10.0),
(217, 'BL00019', 'BAR0018', 1.2),
(218, 'BL00019', 'BAR0020', 0.2),
(219, 'BL00020', 'BAR0008', 3.0),
(220, 'BL00020', 'BAR0006', 5.0),
(221, 'BL00020', 'BAR0016', 10.7),
(222, 'BL00020', 'BAR0001', 44.2),
(223, 'BL00020', 'BAR0004', 19.5),
(224, 'BL00020', 'BAR0020', 4.2),
(225, 'BL00020', 'BAR0009', 1.9),
(226, 'BL00021', 'BAR0001', 113.0),
(227, 'BL00021', 'BAR0010', 0.3),
(228, 'BL00021', 'BAR0011', 9.0),
(229, 'BL00021', 'BAR0016', 3.9),
(230, 'BL00021', 'BAR0009', 0.1),
(231, 'BL00021', 'BAR0006', 2.0),
(232, 'BL00021', 'BAR0019', 4.0),
(233, 'BL00021', 'BAR0007', 1.5),
(234, 'BL00021', 'BAR0020', 1.7),
(235, 'BL00021', 'BAR0018', 0.8),
(236, 'BL00022', 'BAR0001', 61.1),
(237, 'BL00022', 'BAR0010', 3.0),
(238, 'BL00022', 'BAR0011', 15.0),
(239, 'BL00022', 'BAR0017', 7.0),
(240, 'BL00022', 'BAR0007', 21.9),
(241, 'BL00022', 'BAR0006', 5.7),
(242, 'BL00022', 'BAR0019', 6.4),
(243, 'BL00022', 'BAR0004', 0.6),
(244, 'BL00022', 'BAR0018', 1.7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_jual`
--

CREATE TABLE `d_jual` (
  `idjual` smallint(6) NOT NULL,
  `kodejual` char(15) NOT NULL,
  `kode_barang` char(15) NOT NULL,
  `jmljual` double(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `d_jual`
--

INSERT INTO `d_jual` (`idjual`, `kodejual`, `kode_barang`, `jmljual`) VALUES
(1, 'JL00001', 'BAR0001', 67.4),
(2, 'JL00001', 'BAR0004', 5.0),
(3, 'JL00001', 'BAR0018', 10.4),
(4, 'JL00001', 'BAR0009', 5.0),
(5, 'JL00001', 'BAR0016', 4.0),
(6, 'JL00001', 'BAR0010', 0.3),
(7, 'JL00001', 'BAR0033', 17.1),
(8, 'JL00001', 'BAR0019', 2.7),
(9, 'JL00001', 'BAR0025', 3.5),
(10, 'JL00001', 'BAR0024', 5.5),
(11, 'JL00002', 'BAR0001', 67.5),
(12, 'JL00002', 'BAR0011', 2.0),
(13, 'JL00002', 'BAR0004', 6.8),
(14, 'JL00002', 'BAR0016', 15.0),
(15, 'JL00002', 'BAR0007', 40.0),
(16, 'JL00002', 'BAR0010', 5.0),
(17, 'JL00002', 'BAR0018', 10.0),
(18, 'JL00002', 'BAR0033', 6.5),
(19, 'JL00002', 'BAR0020', 1.0),
(20, 'JL00003', 'BAR0026', 1.0),
(21, 'JL00003', 'BAR0023', 1.0),
(22, 'JL00003', 'BAR0001', 33.4),
(23, 'JL00003', 'BAR0010', 2.0),
(24, 'JL00003', 'BAR0004', 6.3),
(25, 'JL00003', 'BAR0006', 8.1),
(26, 'JL00003', 'BAR0008', 2.2),
(27, 'JL00003', 'BAR0005', 1.0),
(28, 'JL00003', 'BAR0031', 1.9),
(29, 'JL00003', 'BAR0018', 10.0),
(30, 'JL00003', 'BAR0016', 7.0),
(31, 'JL00004', 'BAR0001', 59.2),
(33, 'JL00004', 'BAR0004', 1.7),
(34, 'JL00004', 'BAR0010', 3.8),
(35, 'JL00004', 'BAR0018', 11.0),
(36, 'JL00004', 'BAR0025', 4.5),
(37, 'JL00004', 'BAR0024', 12.0),
(38, 'JL00004', 'BAR0020', 4.0),
(39, 'JL00004', 'BAR0019', 1.5),
(40, 'JL00004', 'BAR0016', 9.7),
(41, 'JL00004', 'BAR0006', 0.5),
(42, 'JL00004', 'BAR0007', 6.6),
(43, 'JL00005', 'BAR0001', 31.1),
(44, 'JL00005', 'BAR0010', 4.1),
(45, 'JL00005', 'BAR0016', 5.0),
(46, 'JL00005', 'BAR0018', 10.0),
(47, 'JL00005', 'BAR0017', 5.1),
(48, 'JL00005', 'BAR0024', 0.8),
(49, 'JL00005', 'BAR0009', 0.3),
(50, 'JL00006', 'BAR0001', 33.3),
(51, 'JL00006', 'BAR0009', 3.5),
(52, 'JL00006', 'BAR0031', 5.3),
(53, 'JL00006', 'BAR0008', 5.0),
(54, 'JL00006', 'BAR0006', 1.0),
(55, 'JL00006', 'BAR0033', 8.0),
(56, 'JL00006', 'BAR0032', 10.6),
(57, 'JL00006', 'BAR0019', 1.8),
(58, 'JL00006', 'BAR0028', 6.9),
(59, 'JL00007', 'BAR0008', 12.5),
(60, 'JL00007', 'BAR0001', 32.1),
(61, 'JL00007', 'BAR0004', 13.0),
(62, 'JL00007', 'BAR0010', 3.3),
(63, 'JL00007', 'BAR0025', 3.5),
(64, 'JL00007', 'BAR0024', 3.0),
(65, 'JL00007', 'BAR0020', 2.1),
(66, 'JL00007', 'BAR0009', 4.1),
(67, 'JL00007', 'BAR0033', 2.5),
(68, 'JL00007', 'BAR0005', 1.0),
(69, 'JL00007', 'BAR0016', 9.0),
(70, 'JL00008', 'BAR0008', 5.6),
(71, 'JL00008', 'BAR0001', 50.5),
(72, 'JL00008', 'BAR0007', 15.0),
(73, 'JL00008', 'BAR0010', 11.8),
(74, 'JL00008', 'BAR0025', 0.1),
(75, 'JL00008', 'BAR0017', 7.0),
(76, 'JL00008', 'BAR0011', 5.0),
(77, 'JL00008', 'BAR0018', 9.5),
(78, 'JL00008', 'BAR0016', 7.0),
(79, 'JL00009', 'BAR0004', 2.0),
(80, 'JL00009', 'BAR0031', 2.1),
(81, 'JL00009', 'BAR0006', 1.9),
(82, 'JL00009', 'BAR0001', 60.1),
(83, 'JL00009', 'BAR0019', 1.0),
(84, 'JL00009', 'BAR0016', 3.8),
(85, 'JL00009', 'BAR0018', 10.0),
(86, 'JL00009', 'BAR0020', 0.7),
(87, 'JL00009', 'BAR0024', 0.5),
(88, 'JL00010', 'BAR0033', 9.0),
(89, 'JL00010', 'BAR0002', 62.8),
(90, 'JL00010', 'BAR0011', 14.8),
(91, 'JL00010', 'BAR0026', 1.0),
(92, 'JL00010', 'BAR0024', 1.0),
(93, 'JL00010', 'BAR0023', 1.0),
(94, 'JL00010', 'BAR0016', 4.0),
(95, 'JL00010', 'BAR0007', 23.6),
(96, 'JL00010', 'BAR0010', 4.5),
(97, 'JL00010', 'BAR0006', 6.1),
(98, 'JL00010', 'BAR0018', 10.0),
(99, 'JL00010', 'BAR0030', 3.0),
(100, 'JL00011', 'BAR0016', 3.0),
(101, 'JL00011', 'BAR0004', 4.9),
(102, 'JL00011', 'BAR0031', 3.2),
(103, 'JL00011', 'BAR0018', 2.6),
(104, 'JL00011', 'BAR0006', 11.7),
(105, 'JL00011', 'BAR0033', 10.0),
(106, 'JL00011', 'BAR0030', 0.8),
(107, 'JL00011', 'BAR0009', 2.8),
(108, 'JL00011', 'BAR0024', 1.0),
(109, 'JL00011', 'BAR0001', 78.9),
(110, 'JL00011', 'BAR0007', 10.0),
(111, 'JL00012', 'BAR0001', 58.5),
(112, 'JL00012', 'BAR0016', 5.1),
(113, 'JL00012', 'BAR0004', 6.0),
(114, 'JL00012', 'BAR0010', 5.0),
(115, 'JL00012', 'BAR0007', 6.3),
(116, 'JL00012', 'BAR0033', 7.0),
(118, 'JL00012', 'BAR0006', 2.7),
(119, 'JL00012', 'BAR0017', 10.0),
(120, 'JL00013', 'BAR0017', 6.8),
(121, 'JL00013', 'BAR0016', 5.2),
(122, 'JL00013', 'BAR0001', 59.2),
(123, 'JL00013', 'BAR0011', 5.0),
(124, 'JL00013', 'BAR0004', 6.6),
(125, 'JL00013', 'BAR0025', 3.3),
(126, 'JL00013', 'BAR0030', 5.0),
(127, 'JL00013', 'BAR0019', 1.3),
(128, 'JL00014', 'BAR0025', 4.0),
(129, 'JL00014', 'BAR0001', 94.8),
(130, 'JL00014', 'BAR0016', 9.9),
(131, 'JL00014', 'BAR0006', 7.0),
(132, 'JL00014', 'BAR0004', 25.8),
(133, 'JL00014', 'BAR0007', 20.0),
(134, 'JL00014', 'BAR0010', 4.9),
(135, 'JL00014', 'BAR0018', 10.2),
(136, 'JL00014', 'BAR0024', 4.2),
(137, 'JL00015', 'BAR0001', 45.8),
(138, 'JL00015', 'BAR0010', 4.0),
(139, 'JL00015', 'BAR0006', 13.1),
(140, 'JL00015', 'BAR0009', 1.0),
(141, 'JL00015', 'BAR0011', 16.8),
(142, 'JL00015', 'BAR0016', 5.8),
(143, 'JL00015', 'BAR0004', 12.3),
(144, 'JL00016', 'BAR0001', 51.2),
(145, 'JL00016', 'BAR0010', 2.7),
(146, 'JL00016', 'BAR0006', 7.9),
(147, 'JL00016', 'BAR0016', 4.0),
(148, 'JL00016', 'BAR0008', 2.0),
(149, 'JL00016', 'BAR0007', 2.7),
(150, 'JL00016', 'BAR0024', 1.0),
(151, 'JL00017', 'BAR0001', 53.5),
(152, 'JL00017', 'BAR0004', 18.6),
(153, 'JL00017', 'BAR0010', 11.0),
(154, 'JL00017', 'BAR0016', 6.0),
(155, 'JL00017', 'BAR0007', 50.0),
(156, 'JL00017', 'BAR0024', 14.0),
(157, 'JL00017', 'BAR0025', 1.0),
(158, 'JL00004', 'BAR0009', 1.2),
(159, 'JL00017', 'BAR0006', 1.0),
(160, 'JL00018', 'BAR0001', 89.1),
(161, 'JL00018', 'BAR0010', 4.0),
(162, 'JL00018', 'BAR0006', 6.0),
(163, 'JL00018', 'BAR0011', 7.0),
(164, 'JL00018', 'BAR0016', 3.1),
(165, 'JL00018', 'BAR0004', 22.5),
(167, 'JL00018', 'BAR0007', 0.6),
(168, 'JL00018', 'BAR0008', 0.6),
(169, 'JL00018', 'BAR0009', 0.9),
(170, 'JL00018', 'BAR0030', 0.9),
(171, 'JL00019', 'BAR0018', 5.4),
(172, 'JL00019', 'BAR0008', 3.1),
(173, 'JL00019', 'BAR0006', 5.5),
(174, 'JL00019', 'BAR0016', 11.2),
(175, 'JL00019', 'BAR0007', 10.0),
(176, 'JL00020', 'BAR0001', 98.8),
(177, 'JL00020', 'BAR0010', 2.1),
(178, 'JL00020', 'BAR0011', 9.0),
(179, 'JL00020', 'BAR0016', 3.0),
(180, 'JL00020', 'BAR0009', 2.0),
(181, 'JL00020', 'BAR0006', 2.0),
(182, 'JL00020', 'BAR0004', 3.8),
(183, 'JL00021', 'BAR0010', 3.0),
(184, 'JL00021', 'BAR0011', 14.9),
(185, 'JL00021', 'BAR0001', 80.2),
(186, 'JL00021', 'BAR0017', 7.0),
(187, 'JL00021', 'BAR0007', 20.0),
(188, 'JL00021', 'BAR0020', 2.8),
(189, 'JL00018', 'BAR0025', 7.0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `h_beli`
--

CREATE TABLE `h_beli` (
  `kodebeli` char(15) NOT NULL,
  `tglbeli` date NOT NULL,
  `kode_supplier` char(5) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `h_beli`
--

INSERT INTO `h_beli` (`kodebeli`, `tglbeli`, `kode_supplier`, `username`) VALUES
('BL00001', '2019-11-26', '', 'administrator'),
('BL00002', '2019-11-27', '', 'administrator'),
('BL00003', '2019-11-28', '', 'administrator'),
('BL00004', '2019-11-29', '', 'administrator'),
('BL00005', '2019-11-30', '', 'administrator'),
('BL00006', '2019-12-01', '', 'administrator'),
('BL00007', '2019-12-02', '', 'administrator'),
('BL00008', '2019-12-03', '', 'administrator'),
('BL00009', '2019-12-04', '', 'administrator'),
('BL00010', '2019-12-05', '', 'administrator'),
('BL00011', '2019-12-06', '', 'administrator'),
('BL00012', '2019-12-07', '', 'administrator'),
('BL00013', '2019-12-08', '', 'administrator'),
('BL00014', '2019-12-09', '', 'administrator'),
('BL00015', '2019-12-10', '', 'administrator'),
('BL00016', '2019-12-11', '', 'administrator'),
('BL00017', '2019-12-12', '', 'administrator'),
('BL00018', '2019-12-13', '', 'administrator'),
('BL00019', '2019-12-14', '', 'administrator'),
('BL00020', '2019-12-15', '', 'administrator'),
('BL00021', '2019-12-16', '', 'administrator'),
('BL00022', '2019-12-17', '', 'administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `h_jual`
--

CREATE TABLE `h_jual` (
  `kodejual` char(15) NOT NULL,
  `tgljual` date NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `h_jual`
--

INSERT INTO `h_jual` (`kodejual`, `tgljual`, `username`) VALUES
('JL00001', '2019-11-27', 'administrator'),
('JL00002', '2019-11-28', 'administrator'),
('JL00003', '2019-11-29', 'administrator'),
('JL00004', '2019-11-30', 'administrator'),
('JL00005', '2019-12-01', 'administrator'),
('JL00006', '2019-12-02', 'administrator'),
('JL00007', '2019-12-03', 'administrator'),
('JL00008', '2019-12-04', 'administrator'),
('JL00009', '2019-12-05', 'administrator'),
('JL00010', '2019-12-06', 'administrator'),
('JL00011', '2019-12-07', 'administrator'),
('JL00012', '2019-12-08', 'administrator'),
('JL00013', '2019-12-09', 'administrator'),
('JL00014', '2019-12-10', 'administrator'),
('JL00015', '2019-12-11', 'administrator'),
('JL00016', '2019-12-12', 'administrator'),
('JL00017', '2019-12-13', 'administrator'),
('JL00018', '2019-12-14', 'administrator'),
('JL00019', '2019-12-15', 'administrator'),
('JL00020', '2019-12-16', 'administrator'),
('JL00021', '2019-12-17', 'administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` char(2) NOT NULL,
  `level` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
('01', 'Super Admin'),
('02', 'Admin'),
('03', 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(50) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `telepon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indeks untuk tabel `d_beli`
--
ALTER TABLE `d_beli`
  ADD PRIMARY KEY (`idbeli`),
  ADD KEY `kodebeli` (`kodebeli`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indeks untuk tabel `d_jual`
--
ALTER TABLE `d_jual`
  ADD PRIMARY KEY (`idjual`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kodejual` (`kodejual`);

--
-- Indeks untuk tabel `h_beli`
--
ALTER TABLE `h_beli`
  ADD PRIMARY KEY (`kodebeli`),
  ADD KEY `kode_supplier` (`kode_supplier`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `h_jual`
--
ALTER TABLE `h_jual`
  ADD PRIMARY KEY (`kodejual`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `d_beli`
--
ALTER TABLE `d_beli`
  MODIFY `idbeli` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT untuk tabel `d_jual`
--
ALTER TABLE `d_jual`
  MODIFY `idjual` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `d_beli`
--
ALTER TABLE `d_beli`
  ADD CONSTRAINT `d_beli_ibfk_1` FOREIGN KEY (`kodebeli`) REFERENCES `h_beli` (`kodebeli`),
  ADD CONSTRAINT `d_beli_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
