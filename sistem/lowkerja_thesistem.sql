-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2020 at 10:07 AM
-- Server version: 5.7.32-log
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lowkerja_thesistem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `id_usergroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_pengguna`, `username`, `password`, `keterangan`, `id_usergroup`) VALUES
(1, 'Nadine', 'administrator', 'b3aca92c793ee0e9b1a9b0a5f5fc044e05140df3', '', 1),
(4, 'Admin', 'superadmin', '599a23d5ca482a7e70367dca94b9b429a46558e5', '', 2),
(5, 'Hanif', 'salesayam', '2eec1f8473ace77941377b33886925f90821b165', '', 3),
(6, 'Mey', 'salesmarketing', 'd8199283951837885d904290257e088daf4a79f7', '', 3),
(7, 'Ega', 'salesayam', '4b120938d4dac7a8e3608c0a70dade6fd8b78581', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_invoice`
--

CREATE TABLE `detail_invoice` (
  `kodeinvoice` varchar(30) NOT NULL,
  `institusi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `telepon` text NOT NULL,
  `paket` int(11) NOT NULL,
  `nominal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_invoice`
--

INSERT INTO `detail_invoice` (`kodeinvoice`, `institusi`, `kota`, `email`, `pembayaran`, `telepon`, `paket`, `nominal`) VALUES
('INV-HK-07-2020-0001', 'Zonakacamata.com', 'Surabaya', 'hrd@zonakacamata.com', 1, '081259708958', 2, 77000),
('INV-HK-07-2020-0002', 'PT. Metropolitan Utama', 'Semarang', '', 1, '0243516897', 1, 55000),
('INV-HK-07-2020-0003', 'PT. Vasujaya International trading', 'Jogja', 'istifransisca@gmail.com', 1, '087836279000', 3, 100000),
('INV-HK-07-2020-0004', 'EXTU', 'Jakarta', 'hrd.xtranus@gmail.com, hr.epicstore@gmail.com', 1, '0895653870288', 2, 80000),
('INV-HK-07-2020-0005', 'Lotus Mio', 'Yogyakarta', 'lotusmio@yahoo.co.id', 1, '0274419697, 087738115577', 3, 100000),
('INV-HK-07-2020-0006', 'PT. BP FInance', 'Jakarta', '', 1, '08117453899', 2, 80000),
('INV-HK-07-2020-0007', 'Pit Stop', 'Yogyakarta', '', 1, '087739114008', 2, 80000),
('INV-HK-07-2020-0008', 'PT. Finance Indo Group', 'Jakarta', 'mestikatambunan@gmail.com', 1, '085727756258', 1, 65000),
('INV-HK-07-2020-0009', 'PT. Rifan Financindo Semarang', 'Semarang', '', 3, '081225267580', 2, 80000),
('INV-HK-07-2020-0010', 'Beruang Hindia Internusa', 'Jakarta', '', 1, '081807807880', 2, 80000),
('INV-HK-07-2020-0011', 'PT. Bess Finance', 'Jakarta', 'diahanggun.pratiwi@gmail.com', 1, '08558687577', 1, 65000),
('INV-HK-07-2020-0012', 'PT. Valbury', 'Yogyakarta', 'valburyjogja56@gmail.com', 1, '081802620180', 2, 100000),
('INV-HK-07-2020-0013', 'PT. Anugerah Karya Abadi', 'Jakarta', 'rina@anugrahkaryaabadi.com', 1, '081288730810', 2, 80000),
('INV-HK-07-2020-0014', 'Yayasan Budi Mulia Dua', 'Yogyakarta', 'pendaftaranbmd@gmail.com', 1, '08562971404', 2, 80000),
('INV-HK-07-2020-0015', 'PT. MAF group', 'Jakarta', 'danuseptiono@gmail.com', 1, '081297331004', 2, 80000),
('INV-HK-07-2020-0016', 'PT. Rifan Finance Indonesia', 'Jakarta', '', 2, '081354522020', 3, 100000),
('INV-HK-07-2020-0017', 'PT. TNT Promotion', 'Jakarta', 'flyerscempaka@gmail.com', 1, '085881442945', 3, 100000),
('INV-HK-07-2020-0018', 'PT. Valbury Asia Future', 'Semarang', 'richoraya@gmail.com', 1, '082135775878', 3, 100000),
('INV-HK-07-2020-0019', 'PT. REPUBLIK INDONESIA FINANCE', 'Jakarta', 'rika.mboth@yahoo.co.id', 1, '089624041881', 2, 77000),
('INV-HK-07-2020-0020', 'PT. INFOMEDIA NUSANTARA', 'Semarang', 'eriek.pancawuri@infomedia.co.id', 2, '082123402800', 2, 77000),
('INV-HK-07-2020-0021', 'Ling-Lung Coffe & Eatery', 'Yogyakarta', 'linglungkopi@gmail.com', 1, '089670748585', 2, 100000),
('INV-HK-07-2020-0022', 'Honda Autoland', 'Jakarta', '', 1, '00000', 3, 100000),
('INV-HK-07-2020-0023', 'PT GOS Indoraya', 'Yogyakarta', 'goscontact.diy@gmail.com', 2, '0898 4090 008', 3, 100000),
('INV-HK-07-2020-0024', 'PT. Vasujaya International Trading', 'Yogyakarta', 'istifransisca@gmail.com', 1, '087836279000', 3, 100000),
('INV-HK-07-2020-0025', 'PT. FLIPTECH LENTERA INSPIRASI PERTIWI', 'Jakarta', 'rizaherzego@gmail.com', 1, '085697130923', 1, 65000),
('INV-HK-07-2020-0026', 'Honda Autoland Ciputat', 'Jakarta', 'yusup.ismail@yahoo.com', 1, '0821 2267 4110', 1, 65000),
('INV-HK-07-2020-0027', 'PT. EQUITY Trillium Surabaya', 'Surabaya', 'indrianyewf22@gmail.com', 1, '089678931408', 3, 100000),
('INV-HK-07-2020-0028', 'PT. EQUITYWORLD', 'Jakarta', 'ew.recruitment2019@gmail.com', 1, '085695378489', 3, 100000),
('INV-HK-07-2020-0029', 'As-Salam Celuler/Bakery dan Resto Rahmah', 'Yogyakarta', 'rositakumala008@gmail.com		', 2, '081802708335', 3, 100000),
('INV-HK-07-2020-0030', 'PT. RFB Indonesia', 'Jakarta', 'albertfrenz39@gmail.com', 1, '082112167050', 3, 80000),
('INV-HK-07-2020-0031', 'PT. Rifan Semarang', 'Semarang', 'Augustnikeee@gmail.com', 1, '081902070108', 3, 100000),
('INV-HK-07-2020-0032', 'PT. Rajawali Berdikari Indonesia', 'Yogyakarta', 'apsari.anindita@radikari.com', 1, '085727787259', 2, 80000),
('INV-HK-07-2020-0033', 'SMK Insan Medika', 'Jakarta', 'smkinsanmedika@yahoo.com', 2, '08111146799', 2, 80000),
('INV-HK-07-2020-0034', 'Pracico Inti Utama', 'Jakarta', '', 1, '00000', 2, 80000),
('INV-HK-07-2020-0035', 'PT. RFB News Semarang', 'Semarang', 'angelmustika2@gmail.com', 3, '089668545360', 2, 80000),
('INV-HK-07-2020-0036', 'PT. Automobil Jaya Abadi', 'Yogyakarta', 'oscar.novianus@gmail.com', 1, '081802684555', 3, 100000),
('INV-HK-07-2020-0037', 'DST Clinic', 'Yogyakarta', '', 1, '00000', 2, 100000),
('INV-HK-07-2020-0038', 'PT. RFB', 'Jakarta', 'okenegar11@gmail.com', 2, '00000', 2, 100000),
('INV-HK-07-2020-0039', 'Solid Group Cyber 2', 'Jakarta', '', 1, '00000', 2, 100000),
('INV-HK-07-2020-0040', 'PT. Vasujaya International trading', 'Yogyakarta', 'istifransisca@gmail.com', 1, '087836279000', 2, 100000),
('INV-HK-07-2020-0041', 'PT. Vasujaya International trading', 'Yogyakarta', 'istifransisca@gmail.com', 1, '087836279000', 2, 100000),
('INV-HK-07-2020-0042', 'Lukman Abadi', 'Jakarta', 'lookbylukmanabadi@gmail.com', 1, '082112356188', 3, 120000),
('INV-HK-07-2020-0043', 'PT. KP', 'Yogyakarta', '', 2, '085640472706', 3, 120000),
('INV-HK-07-2020-0044', 'PT. Solid KP', 'Yogyakarta', '', 1, '0895371505717', 3, 120000),
('INV-HK-07-2020-0045', 'Cipta Busana Indah', 'Jakarta', 'averinapurlinda@hotmail.com', 1, '081219482633', 3, 120000),
('INV-HK-07-2020-0046', 'GEMPIKOE', 'Surabaya', '', 1, '081999956566', 2, 100000),
('INV-HK-07-2020-0047', 'PT. Indonesian People Power', 'Semarang', 'puspa@ippconsulting.co.id', 1, '08175464222', 3, 120000),
('INV-HK-07-2020-0048', 'Yekti Salon', 'Surabaya', '', 1, '087759360618', 2, 100000),
('INV-HK-07-2020-0049', 'Kei Gril', 'Yogyakarta', '', 1, '00000', 2, 100000),
('INV-HK-07-2020-0050', 'Himels', 'Yogyakarta', '', 2, '08124287110', 2, 100000),
('INV-HK-07-2020-0051', 'Pondok Parador Homestay', 'Yogyakarta', '', 2, '00000', 3, 120000),
('INV-HK-07-2020-0052', 'Ms. Millah', 'Jakarta', '', 1, '0895364433007', 2, 100000),
('INV-HK-07-2020-0053', 'FINGERSPOT', 'Jakarta', 'hrdbcsjkt@gmail.com', 1, '00000', 2, 100000),
('INV-HK-07-2020-0054', 'PT. Valbury Asia Futures', 'Yogyakarta', 'vafrecruitmen@gmail.com', 1, '081328333349', 2, 100000),
('INV-HK-07-2020-0055', 'HAMURA AGENCY', 'Jakarta', 'elisabethangliny@gmail.com', 2, '00000', 2, 100000),
('INV-HK-07-2020-0056', 'HAMURA AGENCY', 'Jakarta', 'elisabethangliny@gmail.com', 2, '00000', 2, 100000),
('INV-HK-07-2020-0057', 'Polo Global', 'Surabaya', '', 1, '0816620636', 3, 120000),
('INV-HK-07-2020-0058', 'PT. Victory Futures', 'Malang', 'putrahp0203@gmail.com', 1, '081945908301', 3, 120000),
('INV-HK-07-2020-0059', 'PT. BP Finance', 'Jakarta', '', 1, '081296871780', 3, 120000),
('INV-HK-07-2020-0060', 'Mr. Endy Chand', 'Jakarta', '', 1, '087888673188', 2, 100000),
('INV-HK-07-2020-0061', 'PT. Intraco Kimia', 'Yogyakarta', 'intracodenpasar@gmail.com', 1, '087861751605', 2, 100000),
('INV-HK-07-2020-0062', 'Mayasmita', 'Semarang', '', 1, '08159932740', 2, 100000),
('INV-HK-07-2020-0063', 'PT. Vasujaya International trading', 'Yogyakarta', 'istifransisca@gmail.com', 1, '087836279000', 2, 100000),
('INV-HK-07-2020-0064', 'PT. Vasujaya International trading', 'Yogyakarta', 'istifransisca@gmail.com', 1, '087836279000', 2, 100000),
('INV-HK-07-2020-0065', 'PT. Rifan Semarang', 'Semarang', 'agussoulmett532@gmail.com', 3, '085728882701', 2, 100000),
('INV-HK-07-2020-0066', 'PT. Cahaya Banteng Mas', 'Semarang', 'michaelsetyono@yahoo.com', 1, '0816668468', 3, 120000),
('INV-HK-07-2020-0067', 'LBB Prof. Bobs', 'Jakarta', '', 2, '083893981108', 2, 100000),
('INV-HK-07-2020-0068', 'TNT PROMOTION', 'Jakarta', '', 1, '087871474435', 3, 120000),
('INV-HK-07-2020-0069', 'PT. Ruang Raya Indonesia', 'Jakarta', '', 2, '081224212240', 2, 100000),
('INV-HK-07-2020-0070', 'PT. Ruang Raya Indonesia', 'Jakarta', '', 2, '081224212240', 2, 100000),
('INV-HK-07-2020-0071', 'Misykahijab', 'Yogyakarta', '', 1, '085602068915', 3, 120000),
('INV-HK-07-2020-0072', 'Twin\'s Mart & Resto', 'Yogyakarta', '', 3, '081332011345', 3, 120000),
('INV-HK-07-2020-0073', 'OSA', 'Jakarta', '', 1, '082120424874', 1, 50000),
('INV-HK-07-2020-0074', 'KPSG', 'Semarang', 'semarang@kpsg.com', 1, '081931615571', 2, 100000),
('INV-HK-07-2020-0075', 'Eagle laundry', 'Yogyakarta', '', 3, '082136356127', 1, 80000),
('INV-HK-07-2020-0076', 'PT. Rifan Group Semarang', 'Semarang', 'onny.shelvia08@gmail.com', 1, '00000', 2, 100000),
('INV-HK-07-2020-0077', 'PT. Mega Group', 'Jakarta', '', 1, '081809566608', 3, 120000),
('INV-HK-07-2020-0078', 'Halakita Coffee', 'Semarang', 'halakita.coffee@yahoo.com', 1, '00000', 2, 77000),
('INV-HK-07-2020-0079', 'PT. Rifan Financindo Berjangka', 'Semarang', 'rifansmg19@gmail.com', 1, '081325305597', 1, 55000),
('INV-HK-07-2020-0080', 'Westown View', 'Surabaya', 'redmaroon@live.com', 1, '00000', 2, 77000),
('INV-HK-07-2020-0081', 'PT RFB Yogyakarta', 'Yogyakarta', '', 2, '081382125604', 3, 99000),
('INV-HK-07-2020-0082', 'Kontak Perkasa Futures', 'Yogyakarta', '', 1, '00000', 3, 100000),
('INV-HK-07-2020-0083', 'PT. Transporindo Agung Sejahtera', 'Manado', '', 1, '00000', 2, 77000),
('INV-HK-07-2020-0084', 'Unlimited Group', 'Surabaya', 'dhesi_cupluk@yahoo.com', 1, '00000', 2, 77000),
('INV-HK-07-2020-0085', 'PT. Biru Semesta Abadi', 'Manado', '', 1, '085100363168', 1, 55000),
('INV-HK-07-2020-0086', 'PT. REPUBLIK INDONESIA FINANCE', 'Surabaya', 'sinarmaslandsurabaya@yahoo.com', 1, '081358569997', 2, 77000),
('INV-HK-07-2020-0087', 'PT. RIFAN FINANCINDO SEMARANG', 'Semarang', 'fransiscanatasha8@gmail.com', 1, '08822732488', 1, 55000),
('INV-HK-07-2020-0088', 'PT. Edaro Rahadyan Sakti', 'Yogyakarta', '', 1, '087706093635', 1, 60000),
('INV-HK-07-2020-0089', 'VISIONE', 'Semarang', 'hrd@visione-system.com', 1, '00000', 3, 120000),
('INV-HK-07-2020-0090', 'PT. Fireworks Indonesia', 'Jakarta', '', 1, '085719309090', 2, 77000),
('INV-HK-07-2020-0091', 'Yomie\'s Rice x Yogurt', 'Jakarta', 'hr.agungpanganlestari@gmail.com', 1, '00000', 1, 55000),
('INV-HK-07-2020-0092', 'PT.Orindo Alam Ayu', 'Jakarta', '', 1, '082125890252', 1, 55000),
('INV-HK-07-2020-0093', 'Ayam Dimadu', 'Yogyakarta', '', 1, '08980457115', 2, 77000),
('INV-HK-07-2020-0094', 'New Emilia Malioboro Hotel', 'Yogyakarta', '', 1, '083171438962', 2, 100000),
('INV-HK-07-2020-0095', 'Roti\'O', 'Yogyakarta', '', 1, '081229863928', 3, 99000),
('INV-HK-07-2020-0096', 'Mego Yudhistira', '', '', 1, '08563196665', 2, 82000),
('INV-HK-07-2020-0097', 'Berkat Lancar Sejahtera', '', '', 1, '081384971898', 2, 77000),
('INV-HK-07-2020-0098', 'PT. Infinity Plus Solution', '', '', 1, '081252852211', 1, 55000),
('INV-HK-07-2020-0099', 'PT. Rifan Semarang', 'Semarang', '', 1, '081947644620', 3, 100000),
('INV-HK-07-2020-0100', 'Rifan Financindo Berjangka', 'Semarang', '', 1, '081229907068', 1, 55000),
('INV-HK-07-2020-0101', 'PT. Berjaya Sally Ceria', 'Yogyakarta', '', 1, '082260864913', 2, 77000),
('INV-HK-07-2020-0102', 'Excelsior Group Indonesia', '', '', 2, '081219241342', 2, 77000),
('INV-HK-07-2020-0103', 'PT. Solid Grup Kontak Perkasa', 'Yogyakarta', '', 1, '081326484975', 1, 55000),
('INV-HK-07-2020-0104', 'Pawon Ningrat', 'Yogyakarta', '', 1, '082234077717', 2, 77000),
('INV-HK-07-2020-0105', 'DST Clinic', 'Yogyakarta', '', 1, '082225508031', 2, 77000),
('INV-HK-07-2020-0106', 'Osborn ND', 'Surabaya', '', 1, '085732219487', 1, 55000),
('INV-HK-07-2020-0107', 'RayWhite', 'Surabaya', '', 1, '085336969400', 3, 99000),
('INV-HK-07-2020-0108', 'RF Berjangka', 'Semarang', '', 1, '08952777281', 3, 100000),
('INV-HK-07-2020-0109', 'Mego Yudhistira', 'Surabaya', '', 2, '08563196665', 1, 55000),
('INV-HK-07-2020-0110', 'PT. Rinindo Yogyakarta', 'Yogyakarta', '', 2, '08871651115', 2, 77000),
('INV-HK-07-2020-0111', 'Pawon Ningrat', 'Yogyakarta', '', 1, '082234077717', 2, 77000),
('INV-HK-07-2020-0112', 'PT. Mega Group', 'Jakarta', '', 1, '081809566608', 3, 120000),
('INV-HK-07-2020-0113', 'Princess Beautiful Studio', 'Surabaya', '', 1, '081231999934', 3, 99000),
('INV-HK-07-2020-0114', 'PT. Indonesian People Power', 'Semarang', 'rac@ippconsulting.co.id', 1, '00000', 3, 99000),
('INV-HK-07-2020-0115', 'PT. Midtou', 'Jakarta', '', 1, '081298711996', 2, 77000),
('INV-HK-07-2020-0116', 'Arfa Barbershop', 'Yogyakarta', '', 1, '00000', 3, 99000),
('INV-HK-07-2020-0117', 'Pawon Ningrat', 'Yogyakarta', '', 1, '082234077717', 3, 99000),
('INV-HK-07-2020-0118', 'RayWhite', 'Surabaya', '', 1, '085336969400', 3, 99000),
('INV-HK-07-2020-0119', 'PT. Republic Indonesia Finance', '', 'surabayarfb@gmail.com', 1, '00000', 2, 77000),
('INV-HK-07-2020-0120', 'Masyarakat Tanpa Riba', 'Jakarta', '', 1, '081383368290', 3, 99000),
('INV-HK-07-2020-0121', 'Flaurent Salon', 'Yogyakarta', '', 1, '087718871884', 3, 99000),
('INV-HK-07-2020-0122', 'PT. Victory Futures Cab. Malang', 'Malang', 'putrahp0203@gmail.com', 1, '081945908301', 3, 99000),
('INV-HK-07-2020-0123', 'Bpk Rico', 'Jakarta', '', 1, '082311431118', 3, 99000),
('INV-HK-07-2020-0124', 'PT. KP Press Jakarta', 'Jakarta', '', 1, '081286160754', 3, 99000),
('INV-HK-07-2020-0125', 'Yomie\'s Rice x Yogurt', 'Jakarta', '', 1, '0895335423963', 2, 77000),
('INV-HK-07-2020-0126', 'PT. Asia Fireworks', 'Jakarta', 'hr.indo@asiafireworks.com', 1, '00000', 3, 99000),
('INV-HK-07-2020-0127', 'Excelsior Group', 'Jakarta', 'semsetiado@gmail.com', 2, '00000', 2, 77000),
('INV-HK-07-2020-0128', 'Captain Barbershop', 'Jakarta', 'felymetta@gmail.com', 1, '081380034898', 3, 99000),
('INV-HK-07-2020-0129', 'PT. EW Artha Group Surabaya', 'Surabaya', '', 2, '08563196665', 1, 55000),
('INV-HK-07-2020-0130', 'Solid Group', 'Yogyakarta', '', 2, '081226831392', 3, 99000),
('INV-HK-07-2020-0131', 'PT. Vasujaya International Trading', 'Yogyakarta', 'Istifransisca@gmail.com', 1, '087836279000', 3, 100000),
('INV-HK-07-2020-0132', 'PT. Vasujaya International Trading', 'Yogyakarta', 'Istifransisca@gmail.com', 1, '087836279000', 3, 100000),
('INV-HK-07-2020-0133', 'KP Futures', 'Yogyakarta', '', 1, '081567623260', 3, 99000),
('INV-HK-07-2020-0134', 'Djoyo Kitchen', 'Yogyakarta', '', 1, '08156868550', 3, 77000),
('INV-HK-07-2020-0135', 'Kudo Toys', 'Surabaya', '', 1, '081398576646', 3, 99000),
('INV-HK-07-2020-0136', 'CV. Extu Trans Nusantara', 'Jakarta', 'CV. Extu Trans Nusantara', 1, '00000', 3, 99000),
('INV-HK-07-2020-0137', 'Burjo Borneo', 'Yogyakarta', 'rita_dwi2004@yahoo.com', 1, '08121584282', 2, 77000),
('INV-HK-07-2020-0138', 'Ayasha Hijab', 'Yogyakarta', 'hrdayasha@gmail.com', 1, '085743809662', 3, 99000),
('INV-HK-07-2020-0139', 'Beauty Cabin', 'Jakarta', 'hello.beautycabin@gmail.com', 1, '00000', 2, 77000),
('INV-HK-07-2020-0140', 'Artha Graha Group', 'Surabaya', '', 1, '0818502061', 2, 77000),
('INV-HK-07-2020-0141', 'PT. Solid Gold Berjangka Semarang', 'Semarang', '', 1, '081226752271', 2, 77000),
('INV-HK-07-2020-0142', 'Rifan Financindo Berjangka', 'Semarang', 'shelvi.rfb.semarang@gmail.com', 1, '00000', 2, 77000),
('INV-HK-07-2020-0143', 'PT. Orindo Alam Ayu', 'Jakarta', 'umilmahmudah@gmail.com', 1, '00000', 1, 55000),
('INV-HK-07-2020-0144', 'Master Clean n Fresh Laundry', 'Yogyakarta', 'patrisiaardiana.bw@gmail.com', 3, '00000', 2, 77000),
('INV-HK-07-2020-0145', 'PT. RFB', 'Jakarta', '', 1, '081221715733', 3, 99000),
('INV-HK-07-2020-0146', 'PT. Sean Gessainko', 'Jakarta', '', 1, '089516646766', 3, 100000),
('INV-HK-07-2020-0147', 'RayWhite', 'Surabaya', '', 1, '85336969400', 3, 99000),
('INV-HK-07-2020-0148', 'PT. EW Artha Group', 'Surabaya', '', 2, '08563196665', 1, 55000),
('INV-HK-07-2020-0149', 'Amanta Studio Grup', 'Semarang', '', 1, '081325992096', 3, 100000),
('INV-HK-07-2020-0150', 'Tridaya Dimensi Indonesia', 'Yogyakarta', 'tridaya_jogja@gmail.com', 1, '00000', 1, 55000),
('INV-HK-07-2020-0151', 'Havanna', 'Surabaya', '', 1, '081230161168', 2, 77000),
('INV-HK-07-2020-0152', 'Solid Group', 'Jakarta', '', 1, '085925331862', 3, 99000),
('INV-HK-07-2020-0153', 'PT. Valbury Asia Futures', 'Semarang', '', 1, '082135775878', 2, 77000),
('INV-HK-07-2020-0154', 'PT. Best Priority Financial', 'Jakarta', '', 1, '081310607050', 3, 99000),
('INV-HK-07-2020-0155', 'Precious Management', 'Jakarta', '', 1, '085256460833', 3, 99000),
('INV-HK-07-2020-0156', 'Unlimited Group', 'Surabaya', '', 1, '082143346355', 3, 99000),
('INV-HK-07-2020-0157', 'PT. Equity Surabaya', 'Surabaya', '', 1, '081249208772', 2, 77000),
('INV-HK-07-2020-0158', 'PT. Rifan Financindo', 'Jakarta', '', 2, '081770430470', 2, 77000),
('INV-HK-07-2020-0159', 'Social Media Management & Marketing Service', 'Surabaya', 'superteam@mesocialmanagement.com', 1, '00000', 2, 77000),
('INV-HK-07-2020-0160', 'PT. Equity Grup', 'Surabaya', 'hrd.equitygrup@gmail.com', 2, '00000', 3, 99000),
('INV-HK-07-2020-0161', 'PT. Terminal Bangunan Gian Nusantara', 'Yogyakarta', 'hr.terminalbangunan@gmail.com', 1, '00000', 3, 99000),
('INV-HK-07-2020-0162', 'PT. Rifan Financindo Semarang', 'Semarang', '', 2, '081947644620', 3, 100000),
('INV-HK-07-2020-0163', 'PT. EW Surabaya', 'Surabaya', '', 2, '08563196665', 1, 55000),
('INV-HK-07-2020-0164', 'Asri Andarini', 'Jakarta', '', 1, '081296871780', 3, 120000),
('INV-HK-07-2020-0165', 'Danu', 'Jakarta', '', 1, '081319006211', 3, 100000),
('INV-HK-07-2020-0166', 'MC Mart', 'Yogyakarta', 'evriananur26aini@gmail.com', 1, '00000', 3, 100000),
('INV-HK-07-2020-0167', 'Moreau Cafe', 'Jakarta', '', 1, '081219985168', 3, 99000),
('INV-HK-07-2020-0168', 'Ropang OTW', 'Jakarta', '', 1, '081380034898', 3, 99000),
('INV-HK-07-2020-0169', 'Kontak Perkasa Jogja', 'Yogyakarta', 'sitisholehah04@gmail.com', 2, '00000', 2, 77000),
('INV-HK-07-2020-0170', 'PT. Indonesian People Power', 'Jakarta', '', 1, '089667546913', 3, 99000),
('INV-HK-07-2020-0171', 'Oriental Massage', 'Yogyakarta', 'orientalsoba@gmail.com', 1, '00000', 3, 99000),
('INV-HK-07-2020-0172', 'Wood Concept', 'Semarang', 'marketing@flooringkayu.com', 1, '00000', 3, 99000),
('INV-HK-07-2020-0173', 'Funcrowds', 'Jakarta', '', 1, '08113053999', 2, 77000),
('INV-HK-07-2020-0174', 'Grand Vilia Hotel & Restaurant', 'ambon', 'hrddept@grandvilia.com', 3, '081243297837', 2, 77000),
('INV-HK-07-2020-0175', 'PT. KP Group', 'Yogyakarta', 'yanuarmanalif@gmail.com', 1, '00000', 3, 99000),
('INV-HK-07-2020-0176', 'Solid Group', 'Jakarta', '', 1, '00000', 3, 99000),
('INV-HK-07-2020-0177', 'PT KARYAPUTERA SURYAGEMILANG (KPSG)', 'Semarang', 'semarang@kpsg.com', 1, '08113230054', 2, 100000),
('INV-HK-07-2020-0178', 'Dua Warna Pratama', 'Yogyakarta', 'duawarnapratama.interiordesign@gmail.com', 2, '00000', 3, 99000),
('INV-HK-07-2020-0179', 'ALITJUIARTAWAN', '', 'alitjuliartawan@gmail.com', 2, '00000', 1, 55000),
('INV-HK-07-2020-0180', 'PT. Best Company Group', 'Jakarta', '', 1, '082292670045', 3, 99000),
('INV-HK-07-2020-0181', 'Grab Kios', 'Balikpapan', 'kartika.ayufitriani@ptdika.com', 1, '00000', 2, 77000),
('INV-HK-07-2020-0182', 'PT. Rifan Surabaya', 'Surabaya', '', 1, '081938494290', 3, 99000),
('INV-HK-07-2020-0183', 'PT. Best Finance Management ', 'Jakarta', '', 1, '081288781984', 3, 99000),
('INV-HK-07-2020-0184', 'PT. Equityworld', 'Jakarta', '', 1, '085925331862', 3, 100000),
('INV-HK-07-2020-0185', 'Ozone Card Laundry', 'Surabaya', '', 1, '08123580690', 2, 77000),
('INV-HK-07-2020-0186', 'PT. Mighty Contact', 'Jakarta', '', 1, '082247506046', 3, 99000),
('INV-HK-07-2020-0187', 'Onde Onde 73', 'Surabaya', '', 1, '082232439993', 2, 77000),
('INV-HK-07-2020-0188', 'UD. Wahyu Mulyo', 'Yogyakarta', '', 1, '0811292395', 3, 99000),
('INV-HK-07-2020-0189', 'PT. EW Surabaya', 'Surabaya', '', 1, '088235775911', 2, 77000),
('INV-HK-07-2020-0190', 'Homedecorindo', 'Semarang', 'acct1@homedecorindo.co.id', 2, '085726999362', 1, 55000),
('INV-HK-07-2020-0191', 'Halo Bisnis', 'Jakarta', 'michaelsetyono@yahoo.com', 1, '0816668468', 1, 55000),
('INV-HK-07-2020-0192', 'PT. Republik Indonesia Finance', 'Jakarta', 'adhityapratama20@gmail.com ', 1, '085810926328', 2, 77000),
('INV-HK-07-2020-0193', 'PT. Terminal Bangunan Gian Nusantara', 'Yogyakarta', 'hr.terminalbangunan@gmail.com', 1, '085743144276', 3, 99000),
('INV-HK-07-2020-0194', 'PT. Financindo', 'Jakarta', 'uchierna85@gmail.com', 1, '081383875155', 3, 99000),
('INV-HK-07-2020-0195', 'PT. Financindo', 'Jakarta', 'uchierna85@gmail.com', 1, '081383875155', 3, 99000),
('INV-HK-07-2020-0196', 'PT. EWF Cyber 2 Tower', 'Jakarta', 'ewfcbr06@gmail.com', 1, '0895364657013', 2, 77000),
('INV-HK-07-2020-0197', 'PT. Rifan', 'Semarang', 'recruitment.rifansmg@gmail.com', 2, '085971793618', 1, 55000),
('INV-HK-07-2020-0198', 'PT. GKP Yogyakarta', 'Yogyakarta', '', 1, '081567623260', 1, 55000),
('INV-HK-07-2020-0199', 'PT. Riscon Victory', 'Jakarta', 'ishlahi.nasiya@risconreality.com', 1, '087880480950', 1, 55000),
('INV-HK-07-2020-0200', 'PT. EWorld Jaya Group', 'Surabaya', 'hrd.eworldjaya1@yahoo.com', 1, '085731680700', 2, 77000),
('INV-HK-07-2020-0201', 'PT. RFB', 'Surabaya', 'alvino9919@gmail.com', 1, '81314589836', 3, 99000),
('INV-HK-07-2020-0202', 'PT. Rifan Financindo Semarang', 'Semarang', 'rfbinfoloker@gmail.com', 1, '00000', 2, 77000),
('INV-HK-07-2020-0203', 'PT. Mighty Contact', 'Jakarta', 'jagatjiwa07@gmail.com', 1, '082247506046', 3, 99000),
('INV-HK-07-2020-0204', 'PT. RFB Group Surabaya', 'Surabaya', 'hrdsmlpsurabayasurabaya@gmail.com', 1, '082245155014', 3, 99000),
('INV-HK-07-2020-0205', 'Ayam Dimadu', 'Yogyakarta', 'hrd.ayamdimaduyk@gmail.com', 2, '00000', 3, 99000),
('INV-HK-07-2020-0206', 'EW Group', 'Surabaya', 'pue_flow@yahoo.com', 2, '08563196665', 1, 55000),
('INV-HK-07-2020-0207', 'PT. EW Surabaya', 'Surabaya', 'engelhardkatiho160689@gmail.com', 1, '081330351872', 3, 99000),
('INV-HK-07-2020-0208', 'PT. Equityworld Surabaya', 'Surabaya', 'caecil0369@gmail.com', 1, '081334611569', 3, 99000),
('INV-HK-07-2020-0209', 'PT. Alif Group Syariah', 'Yogyakarta', 'athayasyariah@gmail.com', 1, '081229406880', 2, 77000),
('INV-HK-07-2020-0210', 'PT. Muara Artha Persada', 'Yogyakarta', 'hrd@ahlik3umum.co.id', 2, '087799444096', 1, 55000),
('INV-HK-07-2020-0211', 'Ray White Citraland', 'Surabaya', 'raywhitecitralandjobs@gmail.com', 1, '085331126884', 3, 99000),
('INV-HK-07-2020-0212', 'PT. Maxco Panin Group', 'Jakarta', 'chory.maxcopaningroup@gmail.com', 1, '082213223220', 1, 55000),
('INV-HK-07-2020-0213', 'CV. Bintang Abadi', 'Surabaya', 'cvbintangabadi5@gmail.com', 1, '085974306884', 1, 55000),
('INV-HK-07-2020-0214', 'Ritz Hair Studio', 'Yogyakarta', 'yurikedevina@gmail.com', 1, '081312868080', 2, 77000),
('INV-HK-07-2020-0215', 'PT. RFB YOGYAKARTA', 'Jogja', 'hrdptrfbyogyakarta@gmail.com', 1, '085601049165', 3, 99000),
('INV-HK-07-2020-0216', 'EWF SURABAYA GROUP', 'Surabaya', 'teamrekrutmwnt@gmail.com', 1, '089678881509', 2, 77000),
('INV-HK-07-2020-0217', 'PT. GRAHA EMPORIUM PRIMANTARA', 'Pontianak', 'grahaemporiumpontianak@gmail.com', 1, '08125656988', 3, 99000),
('INV-HK-07-2020-0218', 'PT. FINANCINDO', 'Jakarta', 'uchierna85@gmail.com', 1, '081383875155', 3, 99000),
('INV-HK-07-2020-0219', 'Mie Kepang Jayakarta', 'Yogyakarta', 'hr.kepang.jayakarta@gmail.com', 1, '085729363035', 3, 99000),
('INV-HK-07-2020-0220', 'Roppongi Papa', 'Jakarta', 'hestyatmaja@gmail.com', 1, '08119280207', 1, 55000),
('INV-HK-07-2020-0221', 'Ka-Po (Kafe Pojok)', 'Surabaya', 'kappkafepojok@gmail.com', 1, '0811343268', 1, 55000),
('INV-HK-07-2020-0222', 'Pusat Zakat', 'Yogyakarta', 'pusatzakat@gmail.com', 2, '08997724607', 3, 99000),
('INV-HK-07-2020-0223', 'Oriflame', 'Jakarta', 'mayasmitasekartadji@gmail.com', 1, '08159932740', 2, 77000),
('INV-HK-07-2020-0224', 'Unlimited Group', 'Surabaya', 'dhesi_cupluk@yahoo.com', 1, '082143346355', 3, 99000),
('INV-HK-07-2020-0225', 'PT. RFB Surabaya', 'Surabaya', 'hrdrifantrainingcenter@gmail.com', 1, '087851381139', 3, 99000),
('INV-HK-07-2020-0226', 'PT. Republik Indonesia', 'Surabaya', 'hrdsby96@gmail.com', 1, '081284807078', 2, 77000),
('INV-HK-07-2020-0227', 'PT. Solid Gold Berjangka Semarang', 'Semarang', 'kuncoro.sg@gmail.com', 1, '081298482014', 2, 77000),
('INV-HK-07-2020-0228', 'PT. INTERNATIONAL BUSINESS FUTURES', 'Semarang', 'richoraya@gmail.com', 1, '082135775878', 2, 77000),
('INV-HK-08-2020-0229', 'Oriflame', 'Jogja', 'fdiajeng@yahoo.com', 1, '08566687891', 2, 77000),
('INV-HK-08-2020-0230', 'PT. BPF Group Company', 'Jakarta', 'riri.forbusiness@gmail.com', 1, '085922282229', 2, 57000),
('INV-HK-08-2020-0231', 'PT. Rifan Financindo Yogyakarta', 'Jogja', 'rfbyk2020@gmail.com', 1, '081246479716', 1, 55000),
('INV-HK-08-2020-0232', 'PT. Republic Indonesia Finance', 'Jakarta', '', 2, '081354522020', 2, 57000),
('INV-HK-08-2020-0233', 'Modifico', 'Semarang', 'modifico.id@gmail.com', 1, '082259005966', 1, 35000),
('INV-HK-08-2020-0234', 'PT. Indosukses', 'Jakarta', 'natalie.indosukses@gmail.com', 1, '081311480433', 4, 205000),
('INV-HK-08-2020-0235', 'PT. INFOMEDIA NUSANTARA', 'Semarang', 'eriek.pancawuri@infomedia.co.id', 1, '082123402800', 2, 57000),
('INV-HK-08-2020-0236', 'PT. Ghanimi Patra Boga Jakarta', 'Jakarta', 'gpb.jkt@gmail.com', 1, '082172951106', 1, 35000),
('INV-HK-08-2020-0237', 'Istana Sepatu', 'Pontianak', 'harry.louuuw999@gmail.com', 1, '082255338842', 1, 35000),
('INV-HK-08-2020-0238', 'PT. Karina Adhie Nugraha', 'Semarang', 'officer.karina@yahoo.com', 1, '081806150066', 1, 35000),
('INV-HK-08-2020-0239', 'PT. RF KILL SURABAYA', 'Surabaya', 'hrrecruitment@rfgroup.id', 1, '087722888584', 3, 99000),
('INV-HK-08-2020-0240', 'PT. Equityworld Praxis', 'Surabaya', 'hrd.ewfsby2@gmail.com', 2, '087852902538', 3, 79000),
('INV-HK-08-2020-0241', 'PT. Republik Indonesia Finance', 'Surabaya', 'personaliasby1@gmail.com', 1, '082143262182', 3, 79000),
('INV-HK-08-2020-0242', 'PT. Financindo', 'Jakarta', 'uchierna85@gmail.com', 1, '081383875155', 3, 99000),
('INV-HK-08-2020-0243', 'PT. Metropolitan Utama', 'Semarang', '', 1, '0243516897', 1, 35000),
('INV-HK-08-2020-0244', 'PT. RFB Jogja', 'Jogja', 'rfb.hrd@gmail.com', 1, '087877360425', 3, 99000),
('INV-HK-08-2020-0245', 'RFB Group Semarang', 'Semarang', 'rizkikurniadiputra@rocketmail.com', 2, '081947644620', 1, 35000),
('INV-HK-09-2020-0246', 'PT. Equityworld Futures', 'Semarang', 'yohan_markinc@yahoo.co.id', 2, '08114355252', 3, 79000),
('INV-HK-09-2020-0247', 'CV. Rayani Eka Cipta', 'Semarang', 'pramujipjd@ymail.com', 2, '081225257729', 2, 57000),
('INV-HK-09-2020-0248', 'PT. Rifan Financindo Berjangka Yogyakarta', 'Jogja', 'riffanyogyakarta.hrd@gmail.com', 1, '082278116341', 3, 79000),
('INV-HK-09-2020-0249', 'Inniglow', 'Malang', 'inniglowsurabaya@gmail.com', 1, '085101707071', 1, 35000),
('INV-HK-09-2020-0250', 'New Central Bisnis', 'Surabaya', 'gunawangun066@gmail.com', 1, '082244853395', 2, 57000),
('INV-HK-09-2020-0251', 'Pusat Kajian Kesehatan Anak (PKKA-PRO) Fak. Kedokt', 'Jogja', 'profkkmkugm@gmail.com', 2, '08159777441', 1, 35000),
('INV-HK-09-2020-0252', 'PT. Financindo', 'Jakarta', '', 1, '081775162771', 3, 99000),
('INV-HK-09-2020-0253', 'PT. RF Group', 'Surabaya', 'sby.rf.recruitment013@gmail.com', 1, '081330038992', 3, 79000),
('INV-HK-09-2020-0254', 'Rajagucccibgd', 'Surabaya', 'rajaguccibgd@gmail.com', 1, '087722888584', 3, 79000),
('INV-HK-09-2020-0255', 'PT. RFB Group', 'Surabaya', 'career_path@rfindonesia.com', 1, '087853133993', 2, 57000),
('INV-HK-09-2020-0256', 'PT. Republik Indonesia', 'Surabaya', 'recruitmentsurabaya9@gmail.com', 2, '081334553793', 1, 35000),
('INV-HK-09-2020-0257', 'PT. Metropolitan Utama', 'Semarang', '', 1, '0243516897', 1, 35000),
('INV-HK-09-2020-0258', 'PT. Rifan Financindo', 'Jogja', 'rifanfinancindoyk.hrd@gmail.com', 1, '082136097543', 2, 57000),
('INV-HK-09-2020-0259', 'PT. Ide Jualan', 'Jogja', 'office@idejualan.id', 3, '0895423491171', 3, 79000),
('INV-HK-09-2020-0260', 'PT. Republik Indonesia Finance Branch Surabaya', 'Surabaya', 'recruitmenrfsurabaya@gmail.com', 1, '088226191189', 1, 35000),
('INV-HK-09-2020-0261', 'PT. Rifan Semarang', 'Semarang', 'risaalaksanasari@gmail.com', 1, '0895337689208', 3, 79000),
('INV-HK-09-2020-0262', 'Jobforcareer', 'Surabaya', 'info.jobforcareer@gmail.com', 1, '081218916489', 2, 57000),
('INV-HK-09-2020-0263', 'Eagleofficial', 'Semarang', '', 1, '082319140002', 1, 37000),
('INV-HK-09-2020-0264', 'Tunas Toyota', 'Jakarta', 'mustofa.tunastoyota@gmail.com', 1, '08129004221', 2, 57000),
('INV-HK-09-2020-0265', 'SG. The City Center', 'Jakarta', 'ajiernas19@gmail.com', 2, '088290425857', 3, 79000),
('INV-HK-09-2020-0266', 'Ray White Citraland', 'Surabaya', 'raywhitecitralandjobs@gmail.com', 1, '085157233925', 3, 79000),
('INV-HK-10-2020-0267', 'PT. Equityworld Praxis', 'Surabaya', 'hrd.ewfsby2@gmail.com', 1, '081252383919', 1, 35000),
('INV-HK-11-2020-0268', 'Salon Anis', 'Semarang', 'anggiadwin@gmail.com', 2, '082135380551', 1, 35000),
('INV-HK-11-2020-0269', 'PT. Rifan Financindo', 'Semarang', 'rekrutmen.rfbsmg@gmail.com', 1, '087832777481', 3, 79000),
('INV-HK-11-2020-0270', 'PT. Rifan  Financindo Berjangka Yogyakarta', 'Jogja', 'hrd.rfinjogja@gmail.com', 1, '085774459137', 2, 57000);

-- --------------------------------------------------------

--
-- Table structure for table `d_fakturdaging`
--

CREATE TABLE `d_fakturdaging` (
  `faktur` varchar(255) NOT NULL,
  `items` varchar(255) NOT NULL,
  `jumlah` double(10,2) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_fakturdaging`
--

INSERT INTO `d_fakturdaging` (`faktur`, `items`, `jumlah`, `harga`, `subtotal`) VALUES
('INV-EST-10-2020-0001', 'Slice / shortplate', 1.00, 100000, 100000),
('INV-EST-10-2020-0002', 'Shortplate ', 8.90, 101000, 898900);

-- --------------------------------------------------------

--
-- Table structure for table `fakturdaging`
--

CREATE TABLE `fakturdaging` (
  `faktur` varchar(255) NOT NULL,
  `tanggal_jual` date NOT NULL,
  `outlet` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pemilik` varchar(255) NOT NULL,
  `telepon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakturdaging`
--

INSERT INTO `fakturdaging` (`faktur`, `tanggal_jual`, `outlet`, `alamat`, `pemilik`, `telepon`) VALUES
('INV-EST-10-2020-0001', '2020-10-01', 'Argha', 'Malioboro ', 'Argha', '0895366115044'),
('INV-EST-10-2020-0002', '2020-10-06', 'Steak Addict', 'Jl. Wahid Hasyim ', 'A', '121212');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `kodeinvoice` varchar(30) NOT NULL,
  `pelanggan` varchar(50) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`kodeinvoice`, `pelanggan`, `tanggal`) VALUES
('INV-HK-07-2020-0001', 'Fero Riama', '2020-07-07'),
('INV-HK-07-2020-0002', 'Malem Manullang', '2020-07-07'),
('INV-HK-07-2020-0003', 'Isti Fransisca', '2019-06-20'),
('INV-HK-07-2020-0004', 'EXTU', '2019-06-22'),
('INV-HK-07-2020-0005', 'Lotus Mio', '2019-06-22'),
('INV-HK-07-2020-0006', 'BP Finnance', '2019-06-22'),
('INV-HK-07-2020-0007', 'Pit Stop', '2019-06-24'),
('INV-HK-07-2020-0008', 'Mestika Renata Tambunan', '2019-06-24'),
('INV-HK-07-2020-0009', 'R. Yudho Adi Putro', '2019-06-24'),
('INV-HK-07-2020-0010', 'William', '2019-06-24'),
('INV-HK-07-2020-0011', 'Diah Anggun Pratiwi', '2019-06-25'),
('INV-HK-07-2020-0012', 'Rifka Meilanda', '2019-06-25'),
('INV-HK-07-2020-0013', 'Rina', '2019-06-25'),
('INV-HK-07-2020-0014', 'Hanoum Ilmawati', '2019-06-25'),
('INV-HK-07-2020-0015', 'Danuh Septiono', '2019-06-25'),
('INV-HK-07-2020-0016', 'Lumilia', '2019-06-25'),
('INV-HK-07-2020-0017', 'Vanesia Syera', '2019-06-26'),
('INV-HK-07-2020-0018', 'Richo Raya', '2019-06-26'),
('INV-HK-07-2020-0019', 'Rika', '2020-07-13'),
('INV-HK-07-2020-0020', 'PT. INFOMEDIA NUSANTARA', '2020-07-15'),
('INV-HK-07-2020-0021', 'Sara', '2019-06-26'),
('INV-HK-07-2020-0022', 'Daniel', '2019-06-27'),
('INV-HK-07-2020-0023', 'Setian D.A', '2019-07-01'),
('INV-HK-07-2020-0024', 'Isti Wahyuni', '2019-07-01'),
('INV-HK-07-2020-0025', 'Riza Hergezo', '2019-07-01'),
('INV-HK-07-2020-0026', 'Yusup', '2019-07-02'),
('INV-HK-07-2020-0027', 'PT. EQUITY Trillium Surabaya', '2019-07-04'),
('INV-HK-07-2020-0028', 'PT. EQUITYWORLD', '2019-07-04'),
('INV-HK-07-2020-0029', 'As-Salam Celuler/Bakery dan Resto Rahmah', '2019-07-04'),
('INV-HK-07-2020-0030', 'Albert', '2019-07-05'),
('INV-HK-07-2020-0031', 'Nikee', '2019-07-07'),
('INV-HK-07-2020-0032', 'Agnes', '2019-07-08'),
('INV-HK-07-2020-0033', 'Ahmad ruhyat', '2019-07-09'),
('INV-HK-07-2020-0034', 'Pracico Inti Utama', '2019-07-10'),
('INV-HK-07-2020-0035', 'Angel', '2019-07-11'),
('INV-HK-07-2020-0036', 'Oscar Novianus', '2019-07-15'),
('INV-HK-07-2020-0037', 'Denny', '2019-07-16'),
('INV-HK-07-2020-0038', 'Polikarpus', '2019-07-22'),
('INV-HK-07-2020-0039', 'Solid Group Cyber 2', '2019-07-23'),
('INV-HK-07-2020-0040', 'Isti Wahyuni', '2019-07-23'),
('INV-HK-07-2020-0041', 'Isti Wahyuni', '2019-07-23'),
('INV-HK-07-2020-0042', 'Lukman Abadi', '2019-07-23'),
('INV-HK-07-2020-0043', 'PT. KP', '2019-07-27'),
('INV-HK-07-2020-0044', 'PT. Solid KP', '2019-07-29'),
('INV-HK-07-2020-0045', 'Averina', '2019-07-31'),
('INV-HK-07-2020-0046', 'Andy', '2019-08-01'),
('INV-HK-07-2020-0047', 'Dwi Puspasari', '2019-08-01'),
('INV-HK-07-2020-0048', 'Yekti Salon', '2019-08-03'),
('INV-HK-07-2020-0049', 'Kei Gril', '2019-08-03'),
('INV-HK-07-2020-0050', 'Himels', '2019-08-03'),
('INV-HK-07-2020-0051', 'Pondok Parador Homestay', '2019-08-06'),
('INV-HK-07-2020-0052', 'Ms. Millah', '2019-08-15'),
('INV-HK-07-2020-0053', 'FINGERSPOT', '2019-08-16'),
('INV-HK-07-2020-0054', 'PT. Valbury Asia Futures', '2019-08-16'),
('INV-HK-07-2020-0055', 'Elisabeth Angliny', '2019-08-20'),
('INV-HK-07-2020-0056', 'Elisabeth Angliny', '2019-08-20'),
('INV-HK-07-2020-0057', 'Polo Global', '2019-08-21'),
('INV-HK-07-2020-0058', 'PT. Victory Futures', '2019-08-22'),
('INV-HK-07-2020-0059', 'PT. BP Finance', '2019-08-22'),
('INV-HK-07-2020-0060', 'Mr. Endy Chand', '2019-08-23'),
('INV-HK-07-2020-0061', 'PT. Intraco Kimia', '2019-08-26'),
('INV-HK-07-2020-0062', 'Mayasmita', '2019-08-27'),
('INV-HK-07-2020-0063', 'Isti Wahyuni', '2019-08-28'),
('INV-HK-07-2020-0064', 'Isti Wahyuni', '2019-08-28'),
('INV-HK-07-2020-0065', 'Slamet Agus', '2019-08-28'),
('INV-HK-07-2020-0066', 'PT. Cahaya Banteng Mas', '2019-08-29'),
('INV-HK-07-2020-0067', 'Nurohman', '2019-08-30'),
('INV-HK-07-2020-0068', 'Putri', '2019-09-01'),
('INV-HK-07-2020-0069', 'Yorin', '2019-09-02'),
('INV-HK-07-2020-0070', 'Yorin', '2019-09-02'),
('INV-HK-07-2020-0071', 'Ibu Aan', '2019-09-02'),
('INV-HK-07-2020-0072', 'Twin\'s Mart & Resto', '2019-09-03'),
('INV-HK-07-2020-0073', 'OSA', '2019-09-05'),
('INV-HK-07-2020-0074', 'KPSG', '2019-09-06'),
('INV-HK-07-2020-0075', 'Eagle laundry', '2019-09-06'),
('INV-HK-07-2020-0076', 'PT. Rifan Group Semarang', '2019-09-07'),
('INV-HK-07-2020-0077', 'PT. Mega Group', '2019-09-10'),
('INV-HK-07-2020-0078', 'Halakita Coffee', '2019-09-12'),
('INV-HK-07-2020-0079', 'PT. Rifan Financindo Berjangka', '2019-09-13'),
('INV-HK-07-2020-0080', 'Westown View', '2019-09-13'),
('INV-HK-07-2020-0081', 'PT RFB Yogyakarta', '2019-09-13'),
('INV-HK-07-2020-0082', 'Kontak Perkasa Futures', '2019-09-15'),
('INV-HK-07-2020-0083', 'PT. Transporindo Agung Sejahtera', '2019-09-16'),
('INV-HK-07-2020-0084', 'Unlimited Group', '2019-09-17'),
('INV-HK-07-2020-0085', 'Bennydiharjo', '2020-07-17'),
('INV-HK-07-2020-0086', 'Adikusuma', '2020-07-21'),
('INV-HK-07-2020-0087', 'Fransisca Natasha', '2020-07-21'),
('INV-HK-07-2020-0088', 'PT. Edaro Rahadyan Sakti', '2019-09-17'),
('INV-HK-07-2020-0089', 'VISIONE', '2019-09-17'),
('INV-HK-07-2020-0090', 'PT. Fireworks Indonesia', '2019-09-18'),
('INV-HK-07-2020-0091', 'Yomie\'s Rice x Yogurt', '2019-09-18'),
('INV-HK-07-2020-0092', 'PT.Orindo Alam Ayu', '2019-09-18'),
('INV-HK-07-2020-0093', 'Ayam Dimadu', '2019-09-19'),
('INV-HK-07-2020-0094', 'New Emilia Malioboro Hotel', '2019-09-20'),
('INV-HK-07-2020-0095', 'Roti\'O', '2019-09-20'),
('INV-HK-07-2020-0096', 'Mego Yudhistira', '2019-09-20'),
('INV-HK-07-2020-0097', 'Berkat Lancar Sejahtera', '2019-09-21'),
('INV-HK-07-2020-0098', 'PT. Infinity Plus Solution', '2019-09-21'),
('INV-HK-07-2020-0099', 'PT. Rifan Semarang', '2019-09-21'),
('INV-HK-07-2020-0100', 'Rifan Financindo Berjangka', '2019-09-21'),
('INV-HK-07-2020-0101', 'PT. Berjaya Sally Ceria', '2019-09-23'),
('INV-HK-07-2020-0102', 'Excelsior Group Indonesia', '2019-09-24'),
('INV-HK-07-2020-0103', 'PT. Solid Grup Kontak Perkasa', '2019-09-24'),
('INV-HK-07-2020-0104', 'Pawon Ningrat', '2019-09-25'),
('INV-HK-07-2020-0105', 'DST Clinic', '2019-09-28'),
('INV-HK-07-2020-0106', 'Osborn ND', '2019-10-01'),
('INV-HK-07-2020-0107', 'RayWhite', '2019-10-01'),
('INV-HK-07-2020-0108', 'RF Berjangka', '2019-10-03'),
('INV-HK-07-2020-0109', 'Mego Yudhistira', '2019-10-10'),
('INV-HK-07-2020-0110', 'PT. Rinindo Yogyakarta', '2019-10-10'),
('INV-HK-07-2020-0111', 'Pawon Ningrat', '2019-10-10'),
('INV-HK-07-2020-0112', 'PT. Mega Group', '2019-10-11'),
('INV-HK-07-2020-0113', 'Princess Beautiful Studio', '2019-10-11'),
('INV-HK-07-2020-0114', 'PT. Indonesian People Power', '2019-10-11'),
('INV-HK-07-2020-0115', 'PT. Midtou', '2019-10-15'),
('INV-HK-07-2020-0116', 'Arfa Barbershop', '2019-10-16'),
('INV-HK-07-2020-0117', 'Pawon Ningrat', '2019-10-17'),
('INV-HK-07-2020-0118', 'RayWhite', '2019-10-21'),
('INV-HK-07-2020-0119', 'PT. Republic Indonesia Finance', '2019-10-21'),
('INV-HK-07-2020-0120', 'Masyarakat Tanpa Riba', '2019-10-24'),
('INV-HK-07-2020-0121', 'Flaurent Salon', '2019-10-24'),
('INV-HK-07-2020-0122', 'PT. Victory Futures Cab. Malang', '2019-10-28'),
('INV-HK-07-2020-0123', 'Bpk Rico', '2019-10-29'),
('INV-HK-07-2020-0124', 'PT. KP Press Jakarta', '2019-10-29'),
('INV-HK-07-2020-0125', 'Yomie\'s Rice x Yogurt', '2019-10-30'),
('INV-HK-07-2020-0126', 'PT. Asia Fireworks', '2019-10-30'),
('INV-HK-07-2020-0127', 'Excelsior Group', '2019-10-02'),
('INV-HK-07-2020-0128', 'Captain Barbershop', '2019-11-05'),
('INV-HK-07-2020-0129', 'PT. EW Artha Group Surabaya', '2019-11-05'),
('INV-HK-07-2020-0130', 'Solid Group', '2019-11-05'),
('INV-HK-07-2020-0131', 'PT. Vasujaya International Trading', '2019-11-05'),
('INV-HK-07-2020-0132', 'PT. Vasujaya International Trading', '2019-11-05'),
('INV-HK-07-2020-0133', 'KP Futures', '2019-11-05'),
('INV-HK-07-2020-0134', 'Djoyo Kitchen', '2019-11-05'),
('INV-HK-07-2020-0135', 'Kudo Toys', '2019-11-06'),
('INV-HK-07-2020-0136', 'CV. Extu Trans Nusantara', '2019-11-06'),
('INV-HK-07-2020-0137', 'Burjo Borneo', '2019-11-06'),
('INV-HK-07-2020-0138', 'Ayasha Hijab', '2019-11-06'),
('INV-HK-07-2020-0139', 'Beauty Cabin', '2019-11-07'),
('INV-HK-07-2020-0140', 'Artha Graha Group', '2019-11-08'),
('INV-HK-07-2020-0141', 'PT. Solid Gold Berjangka Semarang', '2019-11-08'),
('INV-HK-07-2020-0142', 'Rifan Financindo Berjangka', '2019-11-08'),
('INV-HK-07-2020-0143', 'PT. Orindo Alam Ayu', '2019-11-10'),
('INV-HK-07-2020-0144', 'Master Clean n Fresh Laundry', '2019-11-10'),
('INV-HK-07-2020-0145', 'PT. RFB', '2019-11-11'),
('INV-HK-07-2020-0146', 'PT. Sean Gessainko', '2019-11-11'),
('INV-HK-07-2020-0147', 'RayWhite', '2019-11-11'),
('INV-HK-07-2020-0148', 'PT. EW Artha Group', '2019-11-11'),
('INV-HK-07-2020-0149', 'Amanta Studio Grup', '2019-11-12'),
('INV-HK-07-2020-0150', 'Tridaya Dimensi Indonesia', '2019-11-13'),
('INV-HK-07-2020-0151', 'Havanna', '2019-11-13'),
('INV-HK-07-2020-0152', 'Solid Group', '2019-11-13'),
('INV-HK-07-2020-0153', 'PT. Valbury Asia Futures', '2019-11-13'),
('INV-HK-07-2020-0154', 'PT. Best Priority Financial', '2019-11-13'),
('INV-HK-07-2020-0155', 'Precious Management', '2019-11-13'),
('INV-HK-07-2020-0156', 'Unlimited Group', '2019-11-14'),
('INV-HK-07-2020-0157', 'PT. Equity Surabaya', '2019-11-14'),
('INV-HK-07-2020-0158', 'PT. Rifan Financindo', '2019-11-14'),
('INV-HK-07-2020-0159', 'Social Media Management & Marketing Service', '2019-11-15'),
('INV-HK-07-2020-0160', 'PT. Equity Grup', '2019-11-15'),
('INV-HK-07-2020-0161', 'PT. Terminal Bangunan Gian Nusantara', '2019-11-16'),
('INV-HK-07-2020-0162', 'PT. Rifan Financindo Semarang', '2019-11-17'),
('INV-HK-07-2020-0163', 'PT. EW Surabaya', '2019-11-19'),
('INV-HK-07-2020-0164', 'Asri Andarini', '2019-11-19'),
('INV-HK-07-2020-0165', 'Danu', '2019-11-19'),
('INV-HK-07-2020-0166', 'MC Mart', '2019-11-20'),
('INV-HK-07-2020-0167', 'Moreau Cafe', '2019-11-20'),
('INV-HK-07-2020-0168', 'Ropang OTW', '2019-11-20'),
('INV-HK-07-2020-0169', 'Kontak Perkasa Jogja', '2019-11-20'),
('INV-HK-07-2020-0170', 'PT. Indonesian People Power', '2019-11-20'),
('INV-HK-07-2020-0171', 'Oriental Massage', '2019-11-20'),
('INV-HK-07-2020-0172', 'Wood Concept', '2019-11-21'),
('INV-HK-07-2020-0173', 'Funcrowds', '2019-11-21'),
('INV-HK-07-2020-0174', 'Grand Vilia Hotel & Restaurant', '2019-11-25'),
('INV-HK-07-2020-0175', 'PT. KP Group', '2019-11-26'),
('INV-HK-07-2020-0176', 'Solid Group', '2019-11-26'),
('INV-HK-07-2020-0177', 'PT KARYAPUTERA SURYAGEMILANG (KPSG)', '2019-11-27'),
('INV-HK-07-2020-0178', 'Dua Warna Pratama', '2019-11-28'),
('INV-HK-07-2020-0179', 'ALITJUIARTAWAN', '2019-11-28'),
('INV-HK-07-2020-0180', 'PT. Best Company Group', '2019-11-30'),
('INV-HK-07-2020-0181', 'Grab Kios', '2019-11-30'),
('INV-HK-07-2020-0182', 'PT. Rifan Surabaya', '2020-01-02'),
('INV-HK-07-2020-0183', 'PT. Best Finance Management ', '2020-01-02'),
('INV-HK-07-2020-0184', 'PT. Equityworld', '2020-01-03'),
('INV-HK-07-2020-0185', 'Ozone Card Laundry', '2020-01-03'),
('INV-HK-07-2020-0186', 'PT. Mighty Contact', '2020-01-03'),
('INV-HK-07-2020-0187', 'Onde Onde 73', '2020-01-03'),
('INV-HK-07-2020-0188', 'UD. Wahyu Mulyo', '2020-01-06'),
('INV-HK-07-2020-0189', 'PT. EW Surabaya', '2020-01-07'),
('INV-HK-07-2020-0190', 'Homedecorindo', '2020-01-09'),
('INV-HK-07-2020-0191', 'Halo Bisnis', '2020-01-09'),
('INV-HK-07-2020-0192', 'PT. Republik Indonesia Finance', '2020-01-09'),
('INV-HK-07-2020-0193', 'PT. Terminal Bangunan Gian Nusantara', '2020-01-10'),
('INV-HK-07-2020-0194', 'PT. Financindo', '2020-01-10'),
('INV-HK-07-2020-0195', 'PT. Financindo', '2020-01-10'),
('INV-HK-07-2020-0196', 'PT. EWF Cyber 2 Tower', '2020-01-10'),
('INV-HK-07-2020-0197', 'PT. Rifan', '2020-01-10'),
('INV-HK-07-2020-0198', 'PT. GKP Yogyakarta', '2020-01-10'),
('INV-HK-07-2020-0199', 'PT. Riscon Victory', '2020-01-10'),
('INV-HK-07-2020-0200', 'PT. EWorld Jaya Group', '2020-01-11'),
('INV-HK-07-2020-0201', 'PT. RFB', '2020-01-11'),
('INV-HK-07-2020-0202', 'PT. Rifan Financindo Semarang', '2020-01-12'),
('INV-HK-07-2020-0203', 'PT. Mighty Contact', '2020-01-12'),
('INV-HK-07-2020-0204', 'PT. RFB Group Surabaya', '2020-01-13'),
('INV-HK-07-2020-0205', 'Ayam Dimadu', '2020-01-13'),
('INV-HK-07-2020-0206', 'EW Group', '2020-01-13'),
('INV-HK-07-2020-0207', 'PT. EW Surabaya', '2020-01-14'),
('INV-HK-07-2020-0208', 'PT. Equityworld Surabaya', '2020-01-14'),
('INV-HK-07-2020-0209', 'PT. Alif Group Syariah', '2020-01-15'),
('INV-HK-07-2020-0210', 'PT. Muara Artha Persada', '2020-01-16'),
('INV-HK-07-2020-0211', 'Ray White Citraland', '2020-01-16'),
('INV-HK-07-2020-0212', 'PT. Maxco Panin Group', '2020-01-17'),
('INV-HK-07-2020-0213', 'CV. Bintang Abadi', '2020-01-17'),
('INV-HK-07-2020-0214', 'Ritz Hair Studio', '2020-01-18'),
('INV-HK-07-2020-0215', 'Lingga', '2020-07-24'),
('INV-HK-07-2020-0216', 'Vira Hardja', '2020-07-24'),
('INV-HK-07-2020-0217', 'Andre', '2020-07-24'),
('INV-HK-07-2020-0218', 'Uci Erna Sari', '2020-07-26'),
('INV-HK-07-2020-0219', 'Mie Kepang Jayakarta', '2020-01-18'),
('INV-HK-07-2020-0220', 'Roppongi Papa', '2020-01-19'),
('INV-HK-07-2020-0221', 'Ka-Po (Kafe Pojok)', '2020-01-19'),
('INV-HK-07-2020-0222', 'Pusat Zakat', '2020-01-21'),
('INV-HK-07-2020-0223', 'Oriflame', '2020-01-21'),
('INV-HK-07-2020-0224', 'Unlimited Group', '2020-01-21'),
('INV-HK-07-2020-0225', 'PT. RFB Surabaya', '2020-01-22'),
('INV-HK-07-2020-0226', 'PT. Republik Indonesia', '2020-01-23'),
('INV-HK-07-2020-0227', 'PT. Solid Gold Berjangka Semarang', '2020-01-23'),
('INV-HK-07-2020-0228', 'Richo Raya', '2020-07-29'),
('INV-HK-08-2020-0229', 'Diajeng Ayu Eka Fadilah', '2020-08-02'),
('INV-HK-08-2020-0230', 'Amadea Prita Rizky', '2020-08-05'),
('INV-HK-08-2020-0231', 'PT. Rifan Financindo Yogyakarta', '2020-08-06'),
('INV-HK-08-2020-0232', 'Lulu', '2020-08-06'),
('INV-HK-08-2020-0233', 'Bob', '2020-08-08'),
('INV-HK-08-2020-0234', 'Chory Siauw', '2020-08-11'),
('INV-HK-08-2020-0235', 'Erick Pancawuri', '2020-08-12'),
('INV-HK-08-2020-0236', 'Nurhasanah Oktavianty', '2020-08-13'),
('INV-HK-08-2020-0237', 'Harry Fitri Wijaya', '2020-08-13'),
('INV-HK-08-2020-0238', 'Karina Olivia', '2020-08-13'),
('INV-HK-08-2020-0239', 'Apricilya', '2020-08-13'),
('INV-HK-08-2020-0240', 'Bayu Permana', '2020-08-14'),
('INV-HK-08-2020-0241', 'Andini Auryn', '2020-08-22'),
('INV-HK-08-2020-0242', 'Uci Erna Sari', '2020-08-25'),
('INV-HK-08-2020-0243', 'Malem Manullang', '2020-08-26'),
('INV-HK-08-2020-0244', 'Ary', '2020-08-27'),
('INV-HK-08-2020-0245', 'Rizki Kurniadi Putra', '2020-08-29'),
('INV-HK-09-2020-0246', 'Yohan Syah Nasution', '2020-09-05'),
('INV-HK-09-2020-0247', 'Pramuji', '2020-09-06'),
('INV-HK-09-2020-0248', 'Destri Rizky Andani', '2020-09-07'),
('INV-HK-09-2020-0249', 'Eli', '2020-09-10'),
('INV-HK-09-2020-0250', 'Belinda', '2020-09-11'),
('INV-HK-09-2020-0251', 'Jonathan Hasian Haposan', '2020-09-11'),
('INV-HK-09-2020-0252', 'Uci Erna Sari', '2020-09-13'),
('INV-HK-09-2020-0253', 'Femela Asa', '2020-09-14'),
('INV-HK-09-2020-0254', 'Emy Ling', '2020-09-14'),
('INV-HK-09-2020-0255', 'Mery Jelita', '2020-09-15'),
('INV-HK-09-2020-0256', 'Mumu', '2020-09-15'),
('INV-HK-09-2020-0257', 'Malem Manullang', '2020-09-15'),
('INV-HK-09-2020-0258', 'Ali Reza Firdaus Siregar', '2020-09-15'),
('INV-HK-09-2020-0259', 'Nisrinaqoidah', '2020-09-17'),
('INV-HK-09-2020-0260', 'Vanda Christa', '2020-09-19'),
('INV-HK-09-2020-0261', 'Riza Laksanasari', '2020-09-19'),
('INV-HK-09-2020-0262', 'Cecil Mikha', '2020-09-23'),
('INV-HK-09-2020-0263', 'Febri Liem', '2020-09-24'),
('INV-HK-09-2020-0264', 'Mustofa', '2020-09-25'),
('INV-HK-09-2020-0265', 'Al Fajhi Ernas', '2020-09-29'),
('INV-HK-09-2020-0266', 'Hana', '2020-09-29'),
('INV-HK-10-2020-0267', 'Tika', '2020-09-30'),
('INV-HK-11-2020-0268', 'Anggia Dwi', '2020-10-04'),
('INV-HK-11-2020-0269', 'Ai Clara S', '2020-10-05'),
('INV-HK-11-2020-0270', 'Dinda', '2020-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `tanggal_invoice` date NOT NULL,
  `kode_invoice` varchar(100) NOT NULL,
  `pelanggan` varchar(100) NOT NULL,
  `institusi` varchar(1000) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` text NOT NULL,
  `ttl` date NOT NULL,
  `pembayaran` tinyint(11) NOT NULL,
  `nominal` decimal(10,0) NOT NULL,
  `paket` tinyint(4) NOT NULL,
  `postweb` int(11) NOT NULL,
  `postig` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `catatan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `tanggal_invoice`, `kode_invoice`, `pelanggan`, `institusi`, `kota`, `email`, `telepon`, `ttl`, `pembayaran`, `nominal`, `paket`, `postweb`, `postig`, `status`, `catatan`) VALUES
(1, '2020-07-07', 'INV-HK-07-2020-0001', 'Fero Riama', 'Zonakacamata.com', 'Surabaya', 'hrd@zonakacamata.com', '081259708958', '1984-09-14', 1, 77000, 2, 1, 1, 2, ''),
(2, '2020-07-07', 'INV-HK-07-2020-0002', 'Malem Manullang', 'PT. Metropolitan Utama', 'Semarang', '', '0243516897', '0000-00-00', 1, 55000, 1, 1, 1, 2, ''),
(3, '2019-06-20', 'INV-HK-07-2020-0003', 'Isti Fransisca', 'PT. Vasujaya International trading', 'Jogja', 'istifransisca@gmail.com', '087836279000', '0000-00-00', 1, 100000, 3, 1, 1, 2, ''),
(4, '2019-06-22', 'INV-HK-07-2020-0004', 'EXTU', 'EXTU', 'Jakarta', 'hrd.xtranus@gmail.com, hr.epicstore@gmail.com', '0895653870288', '2021-01-14', 1, 80000, 2, 1, 1, 2, ''),
(5, '2019-06-22', 'INV-HK-07-2020-0005', 'Lotus Mio', 'Lotus Mio', 'Yogyakarta', 'lotusmio@yahoo.co.id', '0274419697, 087738115577', '0000-00-00', 1, 100000, 3, 1, 1, 2, ''),
(6, '2019-06-22', 'INV-HK-07-2020-0006', 'BP Finnance', 'PT. BP FInance', 'Jakarta', '', '08117453899', '0000-00-00', 1, 80000, 2, 1, 1, 2, ''),
(7, '2019-06-24', 'INV-HK-07-2020-0007', 'Pit Stop', 'Pit Stop', 'Yogyakarta', '', '087739114008', '2020-07-14', 1, 80000, 2, 1, 1, 2, ''),
(8, '2019-06-24', 'INV-HK-07-2020-0008', 'Mestika Renata Tambunan', 'PT. Finance Indo Group', 'Jakarta', 'mestikatambunan@gmail.com', '085727756258', '0000-00-00', 1, 65000, 1, 1, 1, 2, ''),
(9, '2019-06-24', 'INV-HK-07-2020-0009', 'R. Yudho Adi Putro', 'PT. Rifan Financindo Semarang', 'Semarang', '', '081225267580', '0000-00-00', 3, 80000, 2, 1, 1, 2, ''),
(10, '2019-06-24', 'INV-HK-07-2020-0010', 'William', 'Beruang Hindia Internusa', 'Jakarta', '', '081807807880', '0000-00-00', 1, 80000, 2, 1, 1, 2, ''),
(11, '2019-06-25', 'INV-HK-07-2020-0011', 'Diah Anggun Pratiwi', 'PT. Bess Finance', 'Jakarta', 'diahanggun.pratiwi@gmail.com', '08558687577', '0000-00-00', 1, 65000, 1, 1, 1, 2, ''),
(12, '2019-06-25', 'INV-HK-07-2020-0012', 'Rifka Meilanda', 'PT. Valbury', 'Yogyakarta', 'valburyjogja56@gmail.com', '081802620180', '0000-00-00', 1, 100000, 2, 1, 1, 2, ''),
(13, '2019-06-25', 'INV-HK-07-2020-0013', 'Rina', 'PT. Anugerah Karya Abadi', 'Jakarta', 'rina@anugrahkaryaabadi.com', '081288730810', '0000-00-00', 1, 80000, 2, 1, 1, 2, ''),
(14, '2019-06-25', 'INV-HK-07-2020-0014', 'Hanoum Ilmawati', 'Yayasan Budi Mulia Dua', 'Yogyakarta', 'pendaftaranbmd@gmail.com', '08562971404', '0000-00-00', 1, 80000, 2, 1, 1, 2, ''),
(15, '2019-06-25', 'INV-HK-07-2020-0015', 'Danuh Septiono', 'PT. MAF group', 'Jakarta', 'danuseptiono@gmail.com', '081297331004', '0000-00-00', 1, 80000, 2, 1, 1, 2, ''),
(16, '2019-06-25', 'INV-HK-07-2020-0016', 'Lumilia', 'PT. Rifan Finance Indonesia', 'Jakarta', '', '081354522020', '0000-00-00', 2, 100000, 3, 1, 1, 2, ''),
(17, '2019-06-26', 'INV-HK-07-2020-0017', 'Vanesia Syera', 'PT. TNT Promotion', 'Jakarta', 'flyerscempaka@gmail.com', '085881442945', '0000-00-00', 1, 100000, 3, 1, 1, 2, ''),
(18, '2019-06-26', 'INV-HK-07-2020-0018', 'Richo Raya', 'PT. Valbury Asia Future', 'Semarang', 'richoraya@gmail.com', '082135775878', '0000-00-00', 1, 100000, 3, 1, 1, 2, ''),
(19, '2020-07-13', 'INV-HK-07-2020-0019', 'Rika', 'PT. REPUBLIK INDONESIA FINANCE', 'Jakarta', 'rika.mboth@yahoo.co.id', '089624041881', '0000-00-00', 1, 77000, 2, 1, 1, 2, ''),
(20, '2020-07-15', 'INV-HK-07-2020-0020', 'PT. INFOMEDIA NUSANTARA', 'PT. INFOMEDIA NUSANTARA', 'Semarang', 'eriek.pancawuri@infomedia.co.id', '082123402800', '1994-02-24', 2, 77000, 2, 1, 1, 2, ''),
(21, '2019-06-26', 'INV-HK-07-2020-0021', 'Sara', 'Ling-Lung Coffe & Eatery', 'Yogyakarta', 'linglungkopi@gmail.com', '089670748585', '0000-00-00', 1, 100000, 2, 1, 1, 2, ''),
(22, '2019-06-27', 'INV-HK-07-2020-0022', 'Daniel', 'Honda Autoland', 'Jakarta', '', '00000', '0000-00-00', 1, 100000, 3, 1, 4, 2, ''),
(23, '2019-07-01', 'INV-HK-07-2020-0023', 'Setian D.A', 'PT GOS Indoraya', 'Yogyakarta', 'goscontact.diy@gmail.com', '0898 4090 008', '0000-00-00', 2, 100000, 3, 1, 4, 2, ''),
(24, '2019-07-01', 'INV-HK-07-2020-0024', 'Isti Wahyuni', 'PT. Vasujaya International Trading', 'Yogyakarta', 'istifransisca@gmail.com', '087836279000', '0000-00-00', 1, 100000, 3, 1, 4, 2, ''),
(25, '2019-07-01', 'INV-HK-07-2020-0025', 'Riza Hergezo', 'PT. FLIPTECH LENTERA INSPIRASI PERTIWI', 'Jakarta', 'rizaherzego@gmail.com', '085697130923', '0000-00-00', 1, 65000, 1, 1, 2, 2, ''),
(26, '2019-07-02', 'INV-HK-07-2020-0026', 'Yusup', 'Honda Autoland Ciputat', 'Jakarta', 'yusup.ismail@yahoo.com', '0821 2267 4110', '0000-00-00', 1, 65000, 1, 1, 2, 2, ''),
(27, '2019-07-04', 'INV-HK-07-2020-0027', 'PT. EQUITY Trillium Surabaya', 'PT. EQUITY Trillium Surabaya', 'Surabaya', 'indrianyewf22@gmail.com', '089678931408', '0000-00-00', 1, 100000, 3, 1, 4, 2, ''),
(28, '2019-07-04', 'INV-HK-07-2020-0028', 'PT. EQUITYWORLD', 'PT. EQUITYWORLD', 'Jakarta', 'ew.recruitment2019@gmail.com', '085695378489', '0000-00-00', 1, 100000, 3, 1, 4, 2, ''),
(29, '2019-07-04', 'INV-HK-07-2020-0029', 'As-Salam Celuler/Bakery dan Resto Rahmah', 'As-Salam Celuler/Bakery dan Resto Rahmah', 'Yogyakarta', 'rositakumala008@gmail.com		', '081802708335', '0000-00-00', 2, 100000, 3, 1, 4, 2, ''),
(30, '2019-07-05', 'INV-HK-07-2020-0030', 'Albert', 'PT. RFB Indonesia', 'Jakarta', 'albertfrenz39@gmail.com', '082112167050', '0000-00-00', 1, 80000, 3, 1, 4, 2, ''),
(31, '2019-07-07', 'INV-HK-07-2020-0031', 'Nikee', 'PT. Rifan Semarang', 'Semarang', 'Augustnikeee@gmail.com', '081902070108', '0000-00-00', 1, 100000, 3, 1, 4, 2, ''),
(32, '2019-07-08', 'INV-HK-07-2020-0032', 'Agnes', 'PT. Rajawali Berdikari Indonesia', 'Yogyakarta', 'apsari.anindita@radikari.com', '085727787259', '0000-00-00', 1, 80000, 2, 1, 3, 2, ''),
(33, '2019-07-09', 'INV-HK-07-2020-0033', 'Ahmad ruhyat', 'SMK Insan Medika', 'Jakarta', 'smkinsanmedika@yahoo.com', '08111146799', '0000-00-00', 2, 80000, 2, 1, 3, 2, ''),
(34, '2019-07-10', 'INV-HK-07-2020-0034', 'Pracico Inti Utama', 'Pracico Inti Utama', 'Jakarta', '', '00000', '0000-00-00', 1, 80000, 2, 1, 3, 2, ''),
(35, '2019-07-11', 'INV-HK-07-2020-0035', 'Angel', 'PT. RFB News Semarang', 'Semarang', 'angelmustika2@gmail.com', '089668545360', '0000-00-00', 3, 80000, 2, 1, 3, 2, ''),
(36, '2019-07-15', 'INV-HK-07-2020-0036', 'Oscar Novianus', 'PT. Automobil Jaya Abadi', 'Yogyakarta', 'oscar.novianus@gmail.com', '081802684555', '0000-00-00', 1, 100000, 3, 1, 4, 2, ''),
(37, '2019-07-16', 'INV-HK-07-2020-0037', 'Denny', 'DST Clinic', 'Yogyakarta', '', '00000', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(38, '2019-07-22', 'INV-HK-07-2020-0038', 'Polikarpus', 'PT. RFB', 'Jakarta', 'okenegar11@gmail.com', '00000', '0000-00-00', 2, 100000, 2, 1, 3, 2, ''),
(39, '2019-07-23', 'INV-HK-07-2020-0039', 'Solid Group Cyber 2', 'Solid Group Cyber 2', 'Jakarta', '', '00000', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(40, '2019-07-23', 'INV-HK-07-2020-0040', 'Isti Wahyuni', 'PT. Vasujaya International trading', 'Yogyakarta', 'istifransisca@gmail.com', '087836279000', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(41, '2019-07-23', 'INV-HK-07-2020-0041', 'Isti Wahyuni', 'PT. Vasujaya International trading', 'Yogyakarta', 'istifransisca@gmail.com', '087836279000', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(42, '2019-07-23', 'INV-HK-07-2020-0042', 'Lukman Abadi', 'Lukman Abadi', 'Jakarta', 'lookbylukmanabadi@gmail.com', '082112356188', '0000-00-00', 1, 120000, 3, 1, 4, 2, ''),
(43, '2019-07-27', 'INV-HK-07-2020-0043', 'PT. KP', 'PT. KP', 'Yogyakarta', '', '085640472706', '0000-00-00', 2, 120000, 3, 1, 4, 2, ''),
(44, '2019-07-29', 'INV-HK-07-2020-0044', 'PT. Solid KP', 'PT. Solid KP', 'Yogyakarta', '', '0895371505717', '0000-00-00', 1, 120000, 3, 1, 4, 2, ''),
(45, '2019-07-31', 'INV-HK-07-2020-0045', 'Averina', 'Cipta Busana Indah', 'Jakarta', 'averinapurlinda@hotmail.com', '081219482633', '0000-00-00', 1, 120000, 3, 1, 4, 2, ''),
(46, '2019-08-01', 'INV-HK-07-2020-0046', 'Andy', 'GEMPIKOE', 'Surabaya', '', '081999956566', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(47, '2019-08-01', 'INV-HK-07-2020-0047', 'Dwi Puspasari', 'PT. Indonesian People Power', 'Semarang', 'puspa@ippconsulting.co.id', '08175464222', '0000-00-00', 1, 120000, 3, 1, 4, 2, ''),
(48, '2019-08-03', 'INV-HK-07-2020-0048', 'Yekti Salon', 'Yekti Salon', 'Surabaya', '', '087759360618', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(49, '2019-08-03', 'INV-HK-07-2020-0049', 'Kei Gril', 'Kei Gril', 'Yogyakarta', '', '00000', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(50, '2019-08-03', 'INV-HK-07-2020-0050', 'Himels', 'Himels', 'Yogyakarta', '', '08124287110', '0000-00-00', 2, 100000, 2, 1, 3, 2, ''),
(51, '2019-08-06', 'INV-HK-07-2020-0051', 'Pondok Parador Homestay', 'Pondok Parador Homestay', 'Yogyakarta', '', '00000', '0000-00-00', 2, 120000, 3, 1, 4, 2, ''),
(52, '2019-08-15', 'INV-HK-07-2020-0052', 'Ms. Millah', 'Ms. Millah', 'Jakarta', '', '0895364433007', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(53, '2019-08-16', 'INV-HK-07-2020-0053', 'FINGERSPOT', 'FINGERSPOT', 'Jakarta', 'hrdbcsjkt@gmail.com', '00000', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(54, '2019-08-16', 'INV-HK-07-2020-0054', 'PT. Valbury Asia Futures', 'PT. Valbury Asia Futures', 'Yogyakarta', 'vafrecruitmen@gmail.com', '081328333349', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(55, '2019-08-20', 'INV-HK-07-2020-0055', 'Elisabeth Angliny', 'HAMURA AGENCY', 'Jakarta', 'elisabethangliny@gmail.com', '00000', '0000-00-00', 2, 100000, 2, 1, 3, 2, ''),
(56, '2019-08-20', 'INV-HK-07-2020-0056', 'Elisabeth Angliny', 'HAMURA AGENCY', 'Jakarta', 'elisabethangliny@gmail.com', '00000', '0000-00-00', 2, 100000, 2, 1, 3, 2, ''),
(57, '2019-08-21', 'INV-HK-07-2020-0057', 'Polo Global', 'Polo Global', 'Surabaya', '', '0816620636', '0000-00-00', 1, 120000, 3, 1, 4, 2, ''),
(58, '2019-08-22', 'INV-HK-07-2020-0058', 'PT. Victory Futures', 'PT. Victory Futures', 'Malang', 'putrahp0203@gmail.com', '081945908301', '0000-00-00', 1, 120000, 3, 1, 4, 2, ''),
(59, '2019-08-22', 'INV-HK-07-2020-0059', 'PT. BP Finance', 'PT. BP Finance', 'Jakarta', '', '081296871780', '0000-00-00', 1, 120000, 3, 1, 4, 2, ''),
(60, '2019-08-23', 'INV-HK-07-2020-0060', 'Mr. Endy Chand', 'Mr. Endy Chand', 'Jakarta', '', '087888673188', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(61, '2019-08-26', 'INV-HK-07-2020-0061', 'PT. Intraco Kimia', 'PT. Intraco Kimia', 'Yogyakarta', 'intracodenpasar@gmail.com', '087861751605', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(62, '2019-08-27', 'INV-HK-07-2020-0062', 'Mayasmita', 'Mayasmita', 'Semarang', '', '08159932740', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(63, '2019-08-28', 'INV-HK-07-2020-0063', 'Isti Wahyuni', 'PT. Vasujaya International trading', 'Yogyakarta', 'istifransisca@gmail.com', '087836279000', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(64, '2019-08-28', 'INV-HK-07-2020-0064', 'Isti Wahyuni', 'PT. Vasujaya International trading', 'Yogyakarta', 'istifransisca@gmail.com', '087836279000', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(65, '2019-08-28', 'INV-HK-07-2020-0065', 'Slamet Agus', 'PT. Rifan Semarang', 'Semarang', 'agussoulmett532@gmail.com', '085728882701', '0000-00-00', 3, 100000, 2, 1, 3, 2, ''),
(66, '2019-08-29', 'INV-HK-07-2020-0066', 'PT. Cahaya Banteng Mas', 'PT. Cahaya Banteng Mas', 'Semarang', 'michaelsetyono@yahoo.com', '0816668468', '0000-00-00', 1, 120000, 3, 1, 4, 2, ''),
(67, '2019-08-30', 'INV-HK-07-2020-0067', 'Nurohman', 'LBB Prof. Bobs', 'Jakarta', '', '083893981108', '0000-00-00', 2, 100000, 2, 1, 3, 2, ''),
(68, '2019-09-01', 'INV-HK-07-2020-0068', 'Putri', 'TNT PROMOTION', 'Jakarta', '', '087871474435', '0000-00-00', 1, 120000, 3, 1, 4, 2, ''),
(69, '2019-09-02', 'INV-HK-07-2020-0069', 'Yorin', 'PT. Ruang Raya Indonesia', 'Jakarta', '', '081224212240', '0000-00-00', 2, 100000, 2, 1, 3, 2, ''),
(70, '2019-09-02', 'INV-HK-07-2020-0070', 'Yorin', 'PT. Ruang Raya Indonesia', 'Jakarta', '', '081224212240', '0000-00-00', 2, 100000, 2, 1, 3, 2, ''),
(71, '2019-09-02', 'INV-HK-07-2020-0071', 'Ibu Aan', 'Misykahijab', 'Yogyakarta', '', '085602068915', '0000-00-00', 1, 120000, 3, 1, 4, 2, ''),
(72, '2019-09-03', 'INV-HK-07-2020-0072', 'Twin\'s Mart & Resto', 'Twin\'s Mart & Resto', 'Yogyakarta', '', '081332011345', '0000-00-00', 3, 120000, 3, 1, 4, 2, ''),
(73, '2019-09-05', 'INV-HK-07-2020-0073', 'OSA', 'OSA', 'Jakarta', '', '082120424874', '0000-00-00', 1, 50000, 1, 1, 2, 2, ''),
(74, '2019-09-06', 'INV-HK-07-2020-0074', 'KPSG', 'KPSG', 'Semarang', 'semarang@kpsg.com', '081931615571', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(75, '2019-09-06', 'INV-HK-07-2020-0075', 'Eagle laundry', 'Eagle laundry', 'Yogyakarta', '', '082136356127', '0000-00-00', 3, 80000, 1, 1, 2, 2, ''),
(76, '2019-09-07', 'INV-HK-07-2020-0076', 'PT. Rifan Group Semarang', 'PT. Rifan Group Semarang', 'Semarang', 'onny.shelvia08@gmail.com', '00000', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(77, '2019-09-10', 'INV-HK-07-2020-0077', 'PT. Mega Group', 'PT. Mega Group', 'Jakarta', '', '081809566608', '0000-00-00', 1, 120000, 3, 1, 4, 2, ''),
(78, '2019-09-12', 'INV-HK-07-2020-0078', 'Halakita Coffee', 'Halakita Coffee', 'Semarang', 'halakita.coffee@yahoo.com', '00000', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(79, '2019-09-13', 'INV-HK-07-2020-0079', 'PT. Rifan Financindo Berjangka', 'PT. Rifan Financindo Berjangka', 'Semarang', 'rifansmg19@gmail.com', '081325305597', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(80, '2019-09-13', 'INV-HK-07-2020-0080', 'Westown View', 'Westown View', 'Surabaya', 'redmaroon@live.com', '00000', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(81, '2019-09-13', 'INV-HK-07-2020-0081', 'PT RFB Yogyakarta', 'PT RFB Yogyakarta', 'Yogyakarta', '', '081382125604', '0000-00-00', 2, 99000, 3, 1, 4, 2, ''),
(82, '2019-09-15', 'INV-HK-07-2020-0082', 'Kontak Perkasa Futures', 'Kontak Perkasa Futures', 'Yogyakarta', '', '00000', '0000-00-00', 1, 100000, 3, 1, 4, 2, ''),
(83, '2019-09-16', 'INV-HK-07-2020-0083', 'PT. Transporindo Agung Sejahtera', 'PT. Transporindo Agung Sejahtera', 'Manado', '', '00000', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(84, '2019-09-17', 'INV-HK-07-2020-0084', 'Unlimited Group', 'Unlimited Group', 'Surabaya', 'dhesi_cupluk@yahoo.com', '00000', '0000-00-00', 1, 77000, 2, 1, 1, 2, ''),
(85, '2020-07-17', 'INV-HK-07-2020-0085', 'Bennydiharjo', 'PT. Biru Semesta Abadi', 'Manado', '', '085100363168', '1983-05-13', 1, 55000, 1, 1, 2, 2, ''),
(86, '2020-07-21', 'INV-HK-07-2020-0086', 'Adikusuma', 'PT. REPUBLIK INDONESIA FINANCE', 'Surabaya', 'sinarmaslandsurabaya@yahoo.com', '081358569997', '1989-06-14', 1, 77000, 2, 1, 3, 2, ''),
(87, '2020-07-21', 'INV-HK-07-2020-0087', 'Fransisca Natasha', 'PT. RIFAN FINANCINDO SEMARANG', 'Semarang', 'fransiscanatasha8@gmail.com', '08822732488', '1995-11-17', 1, 55000, 1, 1, 2, 2, ''),
(88, '2019-09-17', 'INV-HK-07-2020-0088', 'PT. Edaro Rahadyan Sakti', 'PT. Edaro Rahadyan Sakti', 'Yogyakarta', '', '087706093635', '0000-00-00', 1, 60000, 1, 1, 2, 2, ''),
(89, '2019-09-17', 'INV-HK-07-2020-0089', 'VISIONE', 'VISIONE', 'Semarang', 'hrd@visione-system.com', '00000', '0000-00-00', 1, 120000, 3, 1, 4, 2, ''),
(90, '2019-09-18', 'INV-HK-07-2020-0090', 'PT. Fireworks Indonesia', 'PT. Fireworks Indonesia', 'Jakarta', '', '085719309090', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(91, '2019-09-18', 'INV-HK-07-2020-0091', 'Yomie\'s Rice x Yogurt', 'Yomie\'s Rice x Yogurt', 'Jakarta', 'hr.agungpanganlestari@gmail.com', '00000', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(92, '2019-09-18', 'INV-HK-07-2020-0092', 'PT.Orindo Alam Ayu', 'PT.Orindo Alam Ayu', 'Jakarta', '', '082125890252', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(93, '2019-09-19', 'INV-HK-07-2020-0093', 'Ayam Dimadu', 'Ayam Dimadu', 'Yogyakarta', '', '08980457115', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(94, '2019-09-20', 'INV-HK-07-2020-0094', 'New Emilia Malioboro Hotel', 'New Emilia Malioboro Hotel', 'Yogyakarta', '', '083171438962', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(95, '2019-09-20', 'INV-HK-07-2020-0095', 'Roti\'O', 'Roti\'O', 'Yogyakarta', '', '081229863928', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(96, '2019-09-20', 'INV-HK-07-2020-0096', 'Mego Yudhistira', 'Mego Yudhistira', '', '', '08563196665', '0000-00-00', 1, 82000, 2, 1, 3, 2, ''),
(97, '2019-09-21', 'INV-HK-07-2020-0097', 'Berkat Lancar Sejahtera', 'Berkat Lancar Sejahtera', '', '', '081384971898', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(98, '2019-09-21', 'INV-HK-07-2020-0098', 'PT. Infinity Plus Solution', 'PT. Infinity Plus Solution', '', '', '081252852211', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(99, '2019-09-21', 'INV-HK-07-2020-0099', 'PT. Rifan Semarang', 'PT. Rifan Semarang', 'Semarang', '', '081947644620', '0000-00-00', 1, 100000, 3, 1, 4, 2, ''),
(100, '2019-09-21', 'INV-HK-07-2020-0100', 'Rifan Financindo Berjangka', 'Rifan Financindo Berjangka', 'Semarang', '', '081229907068', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(101, '2019-09-23', 'INV-HK-07-2020-0101', 'PT. Berjaya Sally Ceria', 'PT. Berjaya Sally Ceria', 'Yogyakarta', '', '082260864913', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(102, '2019-09-24', 'INV-HK-07-2020-0102', 'Excelsior Group Indonesia', 'Excelsior Group Indonesia', '', '', '081219241342', '0000-00-00', 2, 77000, 2, 1, 3, 2, ''),
(103, '2019-09-24', 'INV-HK-07-2020-0103', 'PT. Solid Grup Kontak Perkasa', 'PT. Solid Grup Kontak Perkasa', 'Yogyakarta', '', '081326484975', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(104, '2019-09-25', 'INV-HK-07-2020-0104', 'Pawon Ningrat', 'Pawon Ningrat', 'Yogyakarta', '', '082234077717', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(105, '2019-09-28', 'INV-HK-07-2020-0105', 'DST Clinic', 'DST Clinic', 'Yogyakarta', '', '082225508031', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(106, '2019-10-01', 'INV-HK-07-2020-0106', 'Osborn ND', 'Osborn ND', 'Surabaya', '', '085732219487', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(107, '2019-10-01', 'INV-HK-07-2020-0107', 'RayWhite', 'RayWhite', 'Surabaya', '', '085336969400', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(108, '2019-10-03', 'INV-HK-07-2020-0108', 'RF Berjangka', 'RF Berjangka', 'Semarang', '', '08952777281', '0000-00-00', 1, 100000, 3, 1, 4, 2, ''),
(109, '2019-10-10', 'INV-HK-07-2020-0109', 'Mego Yudhistira', 'Mego Yudhistira', 'Surabaya', '', '08563196665', '0000-00-00', 2, 55000, 1, 1, 2, 2, ''),
(110, '2019-10-10', 'INV-HK-07-2020-0110', 'PT. Rinindo Yogyakarta', 'PT. Rinindo Yogyakarta', 'Yogyakarta', '', '08871651115', '0000-00-00', 2, 77000, 2, 1, 3, 2, ''),
(111, '2019-10-10', 'INV-HK-07-2020-0111', 'Pawon Ningrat', 'Pawon Ningrat', 'Yogyakarta', '', '082234077717', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(112, '2019-10-11', 'INV-HK-07-2020-0112', 'PT. Mega Group', 'PT. Mega Group', 'Jakarta', '', '081809566608', '0000-00-00', 1, 120000, 3, 1, 4, 2, ''),
(113, '2019-10-11', 'INV-HK-07-2020-0113', 'Princess Beautiful Studio', 'Princess Beautiful Studio', 'Surabaya', '', '081231999934', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(114, '2019-10-11', 'INV-HK-07-2020-0114', 'PT. Indonesian People Power', 'PT. Indonesian People Power', 'Semarang', 'rac@ippconsulting.co.id', '00000', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(115, '2019-10-15', 'INV-HK-07-2020-0115', 'PT. Midtou', 'PT. Midtou', 'Jakarta', '', '081298711996', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(116, '2019-10-16', 'INV-HK-07-2020-0116', 'Arfa Barbershop', 'Arfa Barbershop', 'Yogyakarta', '', '00000', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(117, '2019-10-17', 'INV-HK-07-2020-0117', 'Pawon Ningrat', 'Pawon Ningrat', 'Yogyakarta', '', '082234077717', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(118, '2019-10-21', 'INV-HK-07-2020-0118', 'RayWhite', 'RayWhite', 'Surabaya', '', '085336969400', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(119, '2019-10-21', 'INV-HK-07-2020-0119', 'PT. Republic Indonesia Finance', 'PT. Republic Indonesia Finance', '', 'surabayarfb@gmail.com', '00000', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(120, '2019-10-24', 'INV-HK-07-2020-0120', 'Masyarakat Tanpa Riba', 'Masyarakat Tanpa Riba', 'Jakarta', '', '081383368290', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(121, '2019-10-24', 'INV-HK-07-2020-0121', 'Flaurent Salon', 'Flaurent Salon', 'Yogyakarta', '', '087718871884', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(122, '2019-10-28', 'INV-HK-07-2020-0122', 'PT. Victory Futures Cab. Malang', 'PT. Victory Futures Cab. Malang', 'Malang', 'putrahp0203@gmail.com', '081945908301', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(123, '2019-10-29', 'INV-HK-07-2020-0123', 'Bpk Rico', 'Bpk Rico', 'Jakarta', '', '082311431118', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(124, '2019-10-29', 'INV-HK-07-2020-0124', 'PT. KP Press Jakarta', 'PT. KP Press Jakarta', 'Jakarta', '', '081286160754', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(125, '2019-10-30', 'INV-HK-07-2020-0125', 'Yomie\'s Rice x Yogurt', 'Yomie\'s Rice x Yogurt', 'Jakarta', '', '0895335423963', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(126, '2019-10-30', 'INV-HK-07-2020-0126', 'PT. Asia Fireworks', 'PT. Asia Fireworks', 'Jakarta', 'hr.indo@asiafireworks.com', '00000', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(127, '2019-10-02', 'INV-HK-07-2020-0127', 'Excelsior Group', 'Excelsior Group', 'Jakarta', 'semsetiado@gmail.com', '00000', '0000-00-00', 2, 77000, 2, 1, 3, 2, ''),
(128, '2019-11-05', 'INV-HK-07-2020-0128', 'Captain Barbershop', 'Captain Barbershop', 'Jakarta', 'felymetta@gmail.com', '081380034898', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(129, '2019-11-05', 'INV-HK-07-2020-0129', 'PT. EW Artha Group Surabaya', 'PT. EW Artha Group Surabaya', 'Surabaya', '', '08563196665', '0000-00-00', 2, 55000, 1, 1, 2, 2, ''),
(130, '2019-11-05', 'INV-HK-07-2020-0130', 'Solid Group', 'Solid Group', 'Yogyakarta', '', '081226831392', '0000-00-00', 2, 99000, 3, 1, 4, 2, ''),
(131, '2019-11-05', 'INV-HK-07-2020-0131', 'PT. Vasujaya International Trading', 'PT. Vasujaya International Trading', 'Yogyakarta', 'Istifransisca@gmail.com', '087836279000', '0000-00-00', 1, 100000, 3, 1, 4, 2, ''),
(132, '2019-11-05', 'INV-HK-07-2020-0132', 'PT. Vasujaya International Trading', 'PT. Vasujaya International Trading', 'Yogyakarta', 'Istifransisca@gmail.com', '087836279000', '0000-00-00', 1, 100000, 3, 1, 4, 2, ''),
(133, '2019-11-05', 'INV-HK-07-2020-0133', 'KP Futures', 'KP Futures', 'Yogyakarta', '', '081567623260', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(134, '2019-11-05', 'INV-HK-07-2020-0134', 'Djoyo Kitchen', 'Djoyo Kitchen', 'Yogyakarta', '', '08156868550', '0000-00-00', 1, 77000, 3, 1, 4, 2, ''),
(135, '2019-11-06', 'INV-HK-07-2020-0135', 'Kudo Toys', 'Kudo Toys', 'Surabaya', '', '081398576646', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(136, '2019-11-06', 'INV-HK-07-2020-0136', 'CV. Extu Trans Nusantara', 'CV. Extu Trans Nusantara', 'Jakarta', 'CV. Extu Trans Nusantara', '00000', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(137, '2019-11-06', 'INV-HK-07-2020-0137', 'Burjo Borneo', 'Burjo Borneo', 'Yogyakarta', 'rita_dwi2004@yahoo.com', '08121584282', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(138, '2019-11-06', 'INV-HK-07-2020-0138', 'Ayasha Hijab', 'Ayasha Hijab', 'Yogyakarta', 'hrdayasha@gmail.com', '085743809662', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(139, '2019-11-07', 'INV-HK-07-2020-0139', 'Beauty Cabin', 'Beauty Cabin', 'Jakarta', 'hello.beautycabin@gmail.com', '00000', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(140, '2019-11-08', 'INV-HK-07-2020-0140', 'Artha Graha Group', 'Artha Graha Group', 'Surabaya', '', '0818502061', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(141, '2019-11-08', 'INV-HK-07-2020-0141', 'PT. Solid Gold Berjangka Semarang', 'PT. Solid Gold Berjangka Semarang', 'Semarang', '', '081226752271', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(142, '2019-11-08', 'INV-HK-07-2020-0142', 'Rifan Financindo Berjangka', 'Rifan Financindo Berjangka', 'Semarang', 'shelvi.rfb.semarang@gmail.com', '00000', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(143, '2019-11-10', 'INV-HK-07-2020-0143', 'PT. Orindo Alam Ayu', 'PT. Orindo Alam Ayu', 'Jakarta', 'umilmahmudah@gmail.com', '00000', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(144, '2019-11-10', 'INV-HK-07-2020-0144', 'Master Clean n Fresh Laundry', 'Master Clean n Fresh Laundry', 'Yogyakarta', 'patrisiaardiana.bw@gmail.com', '00000', '0000-00-00', 3, 77000, 2, 1, 3, 2, ''),
(145, '2019-11-11', 'INV-HK-07-2020-0145', 'PT. RFB', 'PT. RFB', 'Jakarta', '', '081221715733', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(146, '2019-11-11', 'INV-HK-07-2020-0146', 'PT. Sean Gessainko', 'PT. Sean Gessainko', 'Jakarta', '', '089516646766', '0000-00-00', 1, 100000, 3, 1, 4, 2, ''),
(147, '2019-11-11', 'INV-HK-07-2020-0147', 'RayWhite', 'RayWhite', 'Surabaya', '', '85336969400', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(148, '2019-11-11', 'INV-HK-07-2020-0148', 'PT. EW Artha Group', 'PT. EW Artha Group', 'Surabaya', '', '08563196665', '0000-00-00', 2, 55000, 1, 1, 2, 2, ''),
(149, '2019-11-12', 'INV-HK-07-2020-0149', 'Amanta Studio Grup', 'Amanta Studio Grup', 'Semarang', '', '081325992096', '0000-00-00', 1, 100000, 3, 1, 4, 2, ''),
(150, '2019-11-13', 'INV-HK-07-2020-0150', 'Tridaya Dimensi Indonesia', 'Tridaya Dimensi Indonesia', 'Yogyakarta', 'tridaya_jogja@gmail.com', '00000', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(151, '2019-11-13', 'INV-HK-07-2020-0151', 'Havanna', 'Havanna', 'Surabaya', '', '081230161168', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(152, '2019-11-13', 'INV-HK-07-2020-0152', 'Solid Group', 'Solid Group', 'Jakarta', '', '085925331862', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(153, '2019-11-13', 'INV-HK-07-2020-0153', 'PT. Valbury Asia Futures', 'PT. Valbury Asia Futures', 'Semarang', '', '082135775878', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(154, '2019-11-13', 'INV-HK-07-2020-0154', 'PT. Best Priority Financial', 'PT. Best Priority Financial', 'Jakarta', '', '081310607050', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(155, '2019-11-13', 'INV-HK-07-2020-0155', 'Precious Management', 'Precious Management', 'Jakarta', '', '085256460833', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(156, '2019-11-14', 'INV-HK-07-2020-0156', 'Unlimited Group', 'Unlimited Group', 'Surabaya', '', '082143346355', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(157, '2019-11-14', 'INV-HK-07-2020-0157', 'PT. Equity Surabaya', 'PT. Equity Surabaya', 'Surabaya', '', '081249208772', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(158, '2019-11-14', 'INV-HK-07-2020-0158', 'PT. Rifan Financindo', 'PT. Rifan Financindo', 'Jakarta', '', '081770430470', '0000-00-00', 2, 77000, 2, 1, 3, 2, ''),
(159, '2019-11-15', 'INV-HK-07-2020-0159', 'Social Media Management & Marketing Service', 'Social Media Management & Marketing Service', 'Surabaya', 'superteam@mesocialmanagement.com', '00000', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(160, '2019-11-15', 'INV-HK-07-2020-0160', 'PT. Equity Grup', 'PT. Equity Grup', 'Surabaya', 'hrd.equitygrup@gmail.com', '00000', '0000-00-00', 2, 99000, 3, 1, 4, 2, ''),
(161, '2019-11-16', 'INV-HK-07-2020-0161', 'PT. Terminal Bangunan Gian Nusantara', 'PT. Terminal Bangunan Gian Nusantara', 'Yogyakarta', 'hr.terminalbangunan@gmail.com', '00000', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(162, '2019-11-17', 'INV-HK-07-2020-0162', 'PT. Rifan Financindo Semarang', 'PT. Rifan Financindo Semarang', 'Semarang', '', '081947644620', '0000-00-00', 2, 100000, 3, 1, 4, 2, ''),
(163, '2019-11-19', 'INV-HK-07-2020-0163', 'PT. EW Surabaya', 'PT. EW Surabaya', 'Surabaya', '', '08563196665', '0000-00-00', 2, 55000, 1, 1, 2, 2, ''),
(164, '2019-11-19', 'INV-HK-07-2020-0164', 'Asri Andarini', 'Asri Andarini', 'Jakarta', '', '081296871780', '0000-00-00', 1, 120000, 3, 1, 4, 2, ''),
(165, '2019-11-19', 'INV-HK-07-2020-0165', 'Danu', 'Danu', 'Jakarta', '', '081319006211', '0000-00-00', 1, 100000, 3, 1, 4, 2, ''),
(166, '2019-11-20', 'INV-HK-07-2020-0166', 'MC Mart', 'MC Mart', 'Yogyakarta', 'evriananur26aini@gmail.com', '00000', '0000-00-00', 1, 100000, 3, 1, 4, 2, ''),
(167, '2019-11-20', 'INV-HK-07-2020-0167', 'Moreau Cafe', 'Moreau Cafe', 'Jakarta', '', '081219985168', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(168, '2019-11-20', 'INV-HK-07-2020-0168', 'Ropang OTW', 'Ropang OTW', 'Jakarta', '', '081380034898', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(169, '2019-11-20', 'INV-HK-07-2020-0169', 'Kontak Perkasa Jogja', 'Kontak Perkasa Jogja', 'Yogyakarta', 'sitisholehah04@gmail.com', '00000', '0000-00-00', 2, 77000, 2, 1, 3, 2, ''),
(170, '2019-11-20', 'INV-HK-07-2020-0170', 'PT. Indonesian People Power', 'PT. Indonesian People Power', 'Jakarta', '', '089667546913', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(171, '2019-11-20', 'INV-HK-07-2020-0171', 'Oriental Massage', 'Oriental Massage', 'Yogyakarta', 'orientalsoba@gmail.com', '00000', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(172, '2019-11-21', 'INV-HK-07-2020-0172', 'Wood Concept', 'Wood Concept', 'Semarang', 'marketing@flooringkayu.com', '00000', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(173, '2019-11-21', 'INV-HK-07-2020-0173', 'Funcrowds', 'Funcrowds', 'Jakarta', '', '08113053999', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(174, '2019-11-25', 'INV-HK-07-2020-0174', 'Grand Vilia Hotel & Restaurant', 'Grand Vilia Hotel & Restaurant', 'ambon', 'hrddept@grandvilia.com', '081243297837', '0000-00-00', 3, 77000, 2, 1, 3, 2, ''),
(175, '2019-11-26', 'INV-HK-07-2020-0175', 'PT. KP Group', 'PT. KP Group', 'Yogyakarta', 'yanuarmanalif@gmail.com', '00000', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(176, '2019-11-26', 'INV-HK-07-2020-0176', 'Solid Group', 'Solid Group', 'Jakarta', '', '00000', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(177, '2019-11-27', 'INV-HK-07-2020-0177', 'PT KARYAPUTERA SURYAGEMILANG (KPSG)', 'PT KARYAPUTERA SURYAGEMILANG (KPSG)', 'Semarang', 'semarang@kpsg.com', '08113230054', '0000-00-00', 1, 100000, 2, 1, 3, 2, ''),
(178, '2019-11-28', 'INV-HK-07-2020-0178', 'Dua Warna Pratama', 'Dua Warna Pratama', 'Yogyakarta', 'duawarnapratama.interiordesign@gmail.com', '00000', '0000-00-00', 2, 99000, 3, 1, 4, 2, ''),
(179, '2019-11-28', 'INV-HK-07-2020-0179', 'ALITJUIARTAWAN', 'ALITJUIARTAWAN', '', 'alitjuliartawan@gmail.com', '00000', '0000-00-00', 2, 55000, 1, 1, 2, 2, ''),
(180, '2019-11-30', 'INV-HK-07-2020-0180', 'PT. Best Company Group', 'PT. Best Company Group', 'Jakarta', '', '082292670045', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(181, '2019-11-30', 'INV-HK-07-2020-0181', 'Grab Kios', 'Grab Kios', 'Balikpapan', 'kartika.ayufitriani@ptdika.com', '00000', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(182, '2020-01-02', 'INV-HK-07-2020-0182', 'PT. Rifan Surabaya', 'PT. Rifan Surabaya', 'Surabaya', '', '081938494290', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(183, '2020-01-02', 'INV-HK-07-2020-0183', 'PT. Best Finance Management ', 'PT. Best Finance Management ', 'Jakarta', '', '081288781984', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(184, '2020-01-03', 'INV-HK-07-2020-0184', 'PT. Equityworld', 'PT. Equityworld', 'Jakarta', '', '085925331862', '0000-00-00', 1, 100000, 3, 1, 4, 2, ''),
(185, '2020-01-03', 'INV-HK-07-2020-0185', 'Ozone Card Laundry', 'Ozone Card Laundry', 'Surabaya', '', '08123580690', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(186, '2020-01-03', 'INV-HK-07-2020-0186', 'PT. Mighty Contact', 'PT. Mighty Contact', 'Jakarta', '', '082247506046', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(187, '2020-01-03', 'INV-HK-07-2020-0187', 'Onde Onde 73', 'Onde Onde 73', 'Surabaya', '', '082232439993', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(188, '2020-01-06', 'INV-HK-07-2020-0188', 'UD. Wahyu Mulyo', 'UD. Wahyu Mulyo', 'Yogyakarta', '', '0811292395', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(189, '2020-01-07', 'INV-HK-07-2020-0189', 'PT. EW Surabaya', 'PT. EW Surabaya', 'Surabaya', '', '088235775911', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(190, '2020-01-09', 'INV-HK-07-2020-0190', 'Homedecorindo', 'Homedecorindo', 'Semarang', 'acct1@homedecorindo.co.id', '085726999362', '0000-00-00', 2, 55000, 1, 1, 2, 2, ''),
(191, '2020-01-09', 'INV-HK-07-2020-0191', 'Halo Bisnis', 'Halo Bisnis', 'Jakarta', 'michaelsetyono@yahoo.com', '0816668468', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(192, '2020-01-09', 'INV-HK-07-2020-0192', 'PT. Republik Indonesia Finance', 'PT. Republik Indonesia Finance', 'Jakarta', 'adhityapratama20@gmail.com ', '085810926328', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(193, '2020-01-10', 'INV-HK-07-2020-0193', 'PT. Terminal Bangunan Gian Nusantara', 'PT. Terminal Bangunan Gian Nusantara', 'Yogyakarta', 'hr.terminalbangunan@gmail.com', '085743144276', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(194, '2020-01-10', 'INV-HK-07-2020-0194', 'PT. Financindo', 'PT. Financindo', 'Jakarta', 'uchierna85@gmail.com', '081383875155', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(195, '2020-01-10', 'INV-HK-07-2020-0195', 'PT. Financindo', 'PT. Financindo', 'Jakarta', 'uchierna85@gmail.com', '081383875155', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(196, '2020-01-10', 'INV-HK-07-2020-0196', 'PT. EWF Cyber 2 Tower', 'PT. EWF Cyber 2 Tower', 'Jakarta', 'ewfcbr06@gmail.com', '0895364657013', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(197, '2020-01-10', 'INV-HK-07-2020-0197', 'PT. Rifan', 'PT. Rifan', 'Semarang', 'recruitment.rifansmg@gmail.com', '085971793618', '0000-00-00', 2, 55000, 1, 1, 2, 2, ''),
(198, '2020-01-10', 'INV-HK-07-2020-0198', 'PT. GKP Yogyakarta', 'PT. GKP Yogyakarta', 'Yogyakarta', '', '081567623260', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(199, '2020-01-10', 'INV-HK-07-2020-0199', 'PT. Riscon Victory', 'PT. Riscon Victory', 'Jakarta', 'ishlahi.nasiya@risconreality.com', '087880480950', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(200, '2020-01-11', 'INV-HK-07-2020-0200', 'PT. EWorld Jaya Group', 'PT. EWorld Jaya Group', 'Surabaya', 'hrd.eworldjaya1@yahoo.com', '085731680700', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(201, '2020-01-11', 'INV-HK-07-2020-0201', 'PT. RFB', 'PT. RFB', 'Surabaya', 'alvino9919@gmail.com', '81314589836', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(202, '2020-01-12', 'INV-HK-07-2020-0202', 'PT. Rifan Financindo Semarang', 'PT. Rifan Financindo Semarang', 'Semarang', 'rfbinfoloker@gmail.com', '00000', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(203, '2020-01-12', 'INV-HK-07-2020-0203', 'PT. Mighty Contact', 'PT. Mighty Contact', 'Jakarta', 'jagatjiwa07@gmail.com', '082247506046', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(204, '2020-01-13', 'INV-HK-07-2020-0204', 'PT. RFB Group Surabaya', 'PT. RFB Group Surabaya', 'Surabaya', 'hrdsmlpsurabayasurabaya@gmail.com', '082245155014', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(205, '2020-01-13', 'INV-HK-07-2020-0205', 'Ayam Dimadu', 'Ayam Dimadu', 'Yogyakarta', 'hrd.ayamdimaduyk@gmail.com', '00000', '0000-00-00', 2, 99000, 3, 1, 4, 2, ''),
(206, '2020-01-13', 'INV-HK-07-2020-0206', 'EW Group', 'EW Group', 'Surabaya', 'pue_flow@yahoo.com', '08563196665', '0000-00-00', 2, 55000, 1, 1, 2, 2, ''),
(207, '2020-01-14', 'INV-HK-07-2020-0207', 'PT. EW Surabaya', 'PT. EW Surabaya', 'Surabaya', 'engelhardkatiho160689@gmail.com', '081330351872', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(208, '2020-01-14', 'INV-HK-07-2020-0208', 'PT. Equityworld Surabaya', 'PT. Equityworld Surabaya', 'Surabaya', 'caecil0369@gmail.com', '081334611569', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(209, '2020-01-15', 'INV-HK-07-2020-0209', 'PT. Alif Group Syariah', 'PT. Alif Group Syariah', 'Yogyakarta', 'athayasyariah@gmail.com', '081229406880', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(210, '2020-01-16', 'INV-HK-07-2020-0210', 'PT. Muara Artha Persada', 'PT. Muara Artha Persada', 'Yogyakarta', 'hrd@ahlik3umum.co.id', '087799444096', '0000-00-00', 2, 55000, 1, 1, 2, 2, ''),
(211, '2020-01-16', 'INV-HK-07-2020-0211', 'Ray White Citraland', 'Ray White Citraland', 'Surabaya', 'raywhitecitralandjobs@gmail.com', '085331126884', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(212, '2020-01-17', 'INV-HK-07-2020-0212', 'PT. Maxco Panin Group', 'PT. Maxco Panin Group', 'Jakarta', 'chory.maxcopaningroup@gmail.com', '082213223220', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(213, '2020-01-17', 'INV-HK-07-2020-0213', 'CV. Bintang Abadi', 'CV. Bintang Abadi', 'Surabaya', 'cvbintangabadi5@gmail.com', '085974306884', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(214, '2020-01-18', 'INV-HK-07-2020-0214', 'Ritz Hair Studio', 'Ritz Hair Studio', 'Yogyakarta', 'yurikedevina@gmail.com', '081312868080', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(215, '2020-07-24', 'INV-HK-07-2020-0215', 'Lingga', 'PT. RFB YOGYAKARTA', 'Jogja', 'hrdptrfbyogyakarta@gmail.com', '085601049165', '0000-00-00', 1, 99000, 3, 1, 1, 2, ''),
(216, '2020-07-24', 'INV-HK-07-2020-0216', 'Vira Hardja', 'EWF SURABAYA GROUP', 'Surabaya', 'teamrekrutmwnt@gmail.com', '089678881509', '1997-05-24', 1, 77000, 2, 1, 1, 2, ''),
(217, '2020-07-24', 'INV-HK-07-2020-0217', 'Andre', 'PT. GRAHA EMPORIUM PRIMANTARA', 'Pontianak', 'grahaemporiumpontianak@gmail.com', '08125656988', '0000-00-00', 1, 99000, 3, 1, 1, 2, ''),
(218, '2020-07-26', 'INV-HK-07-2020-0218', 'Uci Erna Sari', 'PT. FINANCINDO', 'Jakarta', 'uchierna85@gmail.com', '081383875155', '1985-06-04', 1, 99000, 3, 1, 1, 2, ''),
(219, '2020-01-18', 'INV-HK-07-2020-0219', 'Mie Kepang Jayakarta', 'Mie Kepang Jayakarta', 'Yogyakarta', 'hr.kepang.jayakarta@gmail.com', '085729363035', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(220, '2020-01-19', 'INV-HK-07-2020-0220', 'Roppongi Papa', 'Roppongi Papa', 'Jakarta', 'hestyatmaja@gmail.com', '08119280207', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(221, '2020-01-19', 'INV-HK-07-2020-0221', 'Ka-Po (Kafe Pojok)', 'Ka-Po (Kafe Pojok)', 'Surabaya', 'kappkafepojok@gmail.com', '0811343268', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(222, '2020-01-21', 'INV-HK-07-2020-0222', 'Pusat Zakat', 'Pusat Zakat', 'Yogyakarta', 'pusatzakat@gmail.com', '08997724607', '0000-00-00', 2, 99000, 3, 1, 4, 2, ''),
(223, '2020-01-21', 'INV-HK-07-2020-0223', 'Oriflame', 'Oriflame', 'Jakarta', 'mayasmitasekartadji@gmail.com', '08159932740', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(224, '2020-01-21', 'INV-HK-07-2020-0224', 'Unlimited Group', 'Unlimited Group', 'Surabaya', 'dhesi_cupluk@yahoo.com', '082143346355', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(225, '2020-01-22', 'INV-HK-07-2020-0225', 'PT. RFB Surabaya', 'PT. RFB Surabaya', 'Surabaya', 'hrdrifantrainingcenter@gmail.com', '087851381139', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(226, '2020-01-23', 'INV-HK-07-2020-0226', 'PT. Republik Indonesia', 'PT. Republik Indonesia', 'Surabaya', 'hrdsby96@gmail.com', '081284807078', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(227, '2020-01-23', 'INV-HK-07-2020-0227', 'PT. Solid Gold Berjangka Semarang', 'PT. Solid Gold Berjangka Semarang', 'Semarang', 'kuncoro.sg@gmail.com', '081298482014', '0000-00-00', 1, 77000, 2, 1, 3, 2, ''),
(228, '2020-07-29', 'INV-HK-07-2020-0228', 'Richo Raya', 'PT. INTERNATIONAL BUSINESS FUTURES', 'Semarang', 'richoraya@gmail.com', '082135775878', '1989-03-23', 1, 77000, 2, 1, 1, 2, ''),
(229, '2020-08-02', 'INV-HK-08-2020-0229', 'Diajeng Ayu Eka Fadilah', 'Oriflame', 'Jogja', 'fdiajeng@yahoo.com', '08566687891', '1991-08-13', 1, 77000, 2, 1, 1, 2, ''),
(230, '2020-08-05', 'INV-HK-08-2020-0230', 'Amadea Prita Rizky', 'PT. BPF Group Company', 'Jakarta', 'riri.forbusiness@gmail.com', '085922282229', '1998-10-09', 1, 57000, 2, 1, 3, 2, ''),
(231, '2020-08-06', 'INV-HK-08-2020-0231', 'PT. Rifan Financindo Yogyakarta', 'PT. Rifan Financindo Yogyakarta', 'Jogja', 'rfbyk2020@gmail.com', '081246479716', '0000-00-00', 1, 55000, 1, 1, 2, 2, ''),
(232, '2020-08-06', 'INV-HK-08-2020-0232', 'Lulu', 'PT. Republic Indonesia Finance', 'Jakarta', '', '081354522020', '1997-07-23', 2, 57000, 2, 1, 3, 2, ''),
(233, '2020-08-08', 'INV-HK-08-2020-0233', 'Bob', 'Modifico', 'Semarang', 'modifico.id@gmail.com', '082259005966', '0000-00-00', 1, 35000, 1, 1, 2, 2, ''),
(234, '2020-08-11', 'INV-HK-08-2020-0234', 'Chory Siauw', 'PT. Indosukses', 'Jakarta', 'natalie.indosukses@gmail.com', '081311480433', '1991-12-31', 1, 205000, 4, 1, 12, 2, ''),
(235, '2020-08-12', 'INV-HK-08-2020-0235', 'Erick Pancawuri', 'PT. INFOMEDIA NUSANTARA', 'Semarang', 'eriek.pancawuri@infomedia.co.id', '082123402800', '1994-02-24', 1, 57000, 2, 1, 3, 2, ''),
(236, '2020-08-13', 'INV-HK-08-2020-0236', 'Nurhasanah Oktavianty', 'PT. Ghanimi Patra Boga Jakarta', 'Jakarta', 'gpb.jkt@gmail.com', '082172951106', '1996-10-29', 1, 35000, 1, 1, 2, 2, ''),
(237, '2020-08-13', 'INV-HK-08-2020-0237', 'Harry Fitri Wijaya', 'Istana Sepatu', 'Pontianak', 'harry.louuuw999@gmail.com', '082255338842', '1999-03-31', 1, 35000, 1, 1, 2, 2, ''),
(238, '2020-08-13', 'INV-HK-08-2020-0238', 'Karina Olivia', 'PT. Karina Adhie Nugraha', 'Semarang', 'officer.karina@yahoo.com', '081806150066', '0000-00-00', 1, 35000, 1, 1, 2, 2, ''),
(239, '2020-08-13', 'INV-HK-08-2020-0239', 'Apricilya', 'PT. RF KILL SURABAYA', 'Surabaya', 'hrrecruitment@rfgroup.id', '087722888584', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(240, '2020-08-14', 'INV-HK-08-2020-0240', 'Bayu Permana', 'PT. Equityworld Praxis', 'Surabaya', 'hrd.ewfsby2@gmail.com', '087852902538', '0000-00-00', 2, 79000, 3, 1, 4, 2, ''),
(241, '2020-08-22', 'INV-HK-08-2020-0241', 'Andini Auryn', 'PT. Republik Indonesia Finance', 'Surabaya', 'personaliasby1@gmail.com', '082143262182', '0000-00-00', 1, 79000, 3, 1, 4, 2, ''),
(242, '2020-08-25', 'INV-HK-08-2020-0242', 'Uci Erna Sari', 'PT. Financindo', 'Jakarta', 'uchierna85@gmail.com', '081383875155', '0000-00-00', 1, 99000, 3, 1, 4, 2, ''),
(243, '2020-08-26', 'INV-HK-08-2020-0243', 'Malem Manullang', 'PT. Metropolitan Utama', 'Semarang', '', '0243516897', '0000-00-00', 1, 35000, 1, 1, 2, 2, ''),
(244, '2020-08-27', 'INV-HK-08-2020-0244', 'Ary', 'PT. RFB Jogja', 'Jogja', 'rfb.hrd@gmail.com', '087877360425', '1991-08-31', 1, 99000, 3, 1, 4, 2, ''),
(245, '2020-08-29', 'INV-HK-08-2020-0245', 'Rizki Kurniadi Putra', 'RFB Group Semarang', 'Semarang', 'rizkikurniadiputra@rocketmail.com', '081947644620', '0000-00-00', 2, 35000, 1, 1, 2, 2, ''),
(246, '2020-09-05', 'INV-HK-09-2020-0246', 'Yohan Syah Nasution', 'PT. Equityworld Futures', 'Semarang', 'yohan_markinc@yahoo.co.id', '08114355252', '1986-08-21', 2, 79000, 3, 1, 4, 2, ''),
(247, '2020-09-06', 'INV-HK-09-2020-0247', 'Pramuji', 'CV. Rayani Eka Cipta', 'Semarang', 'pramujipjd@ymail.com', '081225257729', '1981-12-20', 2, 57000, 2, 1, 3, 2, ''),
(248, '2020-09-07', 'INV-HK-09-2020-0248', 'Destri Rizky Andani', 'PT. Rifan Financindo Berjangka Yogyakarta', 'Jogja', 'riffanyogyakarta.hrd@gmail.com', '082278116341', '1995-12-26', 1, 79000, 3, 1, 2, 1, ''),
(249, '2020-09-10', 'INV-HK-09-2020-0249', 'Eli', 'Inniglow', 'Malang', 'inniglowsurabaya@gmail.com', '085101707071', '1986-05-16', 1, 35000, 1, 1, 2, 2, ''),
(250, '2020-09-11', 'INV-HK-09-2020-0250', 'Belinda', 'New Central Bisnis', 'Surabaya', 'gunawangun066@gmail.com', '082244853395', '1994-10-10', 1, 57000, 2, 1, 2, 1, ''),
(251, '2020-09-11', 'INV-HK-09-2020-0251', 'Jonathan Hasian Haposan', 'Pusat Kajian Kesehatan Anak (PKKA-PRO) Fak. Kedokteran, Kes. Masyarakat, dan Keperawatan, Universitas Gadjah Mada', 'Jogja', 'profkkmkugm@gmail.com', '08159777441', '1991-07-25', 2, 35000, 1, 1, 2, 2, ''),
(252, '2020-09-13', 'INV-HK-09-2020-0252', 'Uci Erna Sari', 'PT. Financindo', 'Jakarta', '', '081775162771', '1985-06-04', 1, 99000, 3, 1, 1, 1, ''),
(253, '2020-09-14', 'INV-HK-09-2020-0253', 'Femela Asa', 'PT. RF Group', 'Surabaya', 'sby.rf.recruitment013@gmail.com', '081330038992', '1993-03-01', 1, 79000, 3, 1, 1, 1, ''),
(254, '2020-09-14', 'INV-HK-09-2020-0254', 'Emy Ling', 'Rajagucccibgd', 'Surabaya', 'rajaguccibgd@gmail.com', '087722888584', '1994-04-10', 1, 79000, 3, 0, 0, 0, ''),
(255, '2020-09-15', 'INV-HK-09-2020-0255', 'Mery Jelita', 'PT. RFB Group', 'Surabaya', 'career_path@rfindonesia.com', '087853133993', '1980-06-01', 1, 57000, 2, 0, 0, 0, ''),
(256, '2020-09-15', 'INV-HK-09-2020-0256', 'Mumu', 'PT. Republik Indonesia', 'Surabaya', 'recruitmentsurabaya9@gmail.com', '081334553793', '1994-08-03', 2, 35000, 1, 0, 0, 0, ''),
(257, '2020-09-15', 'INV-HK-09-2020-0257', 'Malem Manullang', 'PT. Metropolitan Utama', 'Semarang', '', '0243516897', '0000-00-00', 1, 35000, 1, 0, 0, 0, ''),
(258, '2020-09-15', 'INV-HK-09-2020-0258', 'Ali Reza Firdaus Siregar', 'PT. Rifan Financindo', 'Jogja', 'rifanfinancindoyk.hrd@gmail.com', '082136097543', '1998-12-04', 1, 57000, 2, 0, 0, 0, ''),
(259, '2020-09-17', 'INV-HK-09-2020-0259', 'Nisrinaqoidah', 'PT. Ide Jualan', 'Jogja', 'office@idejualan.id', '0895423491171', '0000-00-00', 3, 79000, 3, 0, 0, 0, ''),
(260, '2020-09-19', 'INV-HK-09-2020-0260', 'Vanda Christa', 'PT. Republik Indonesia Finance Branch Surabaya', 'Surabaya', 'recruitmenrfsurabaya@gmail.com', '088226191189', '1991-07-31', 1, 35000, 1, 0, 0, 0, ''),
(261, '2020-09-19', 'INV-HK-09-2020-0261', 'Riza Laksanasari', 'PT. Rifan Semarang', 'Semarang', 'risaalaksanasari@gmail.com', '0895337689208', '1995-01-29', 1, 79000, 3, 0, 0, 0, ''),
(262, '2020-09-23', 'INV-HK-09-2020-0262', 'Cecil Mikha', 'Jobforcareer', 'Surabaya', 'info.jobforcareer@gmail.com', '081218916489', '0000-00-00', 1, 57000, 2, 0, 0, 0, ''),
(263, '2020-09-24', 'INV-HK-09-2020-0263', 'Febri Liem', 'Eagleofficial', 'Semarang', '', '082319140002', '0000-00-00', 1, 37000, 1, 0, 0, 0, ''),
(264, '2020-09-25', 'INV-HK-09-2020-0264', 'Mustofa', 'Tunas Toyota', 'Jakarta', 'mustofa.tunastoyota@gmail.com', '08129004221', '1975-05-10', 1, 57000, 2, 0, 0, 0, ''),
(265, '2020-09-29', 'INV-HK-09-2020-0265', 'Al Fajhi Ernas', 'SG. The City Center', 'Jakarta', 'ajiernas19@gmail.com', '088290425857', '0000-00-00', 2, 79000, 3, 1, 1, 0, ''),
(266, '2020-09-29', 'INV-HK-09-2020-0266', 'Hana', 'Ray White Citraland', 'Surabaya', 'raywhitecitralandjobs@gmail.com', '085157233925', '1995-09-25', 1, 79000, 3, 0, 0, 0, ''),
(267, '2020-09-30', 'INV-HK-10-2020-0267', 'Tika', 'PT. Equityworld Praxis', 'Surabaya', 'hrd.ewfsby2@gmail.com', '081252383919', '1998-06-11', 1, 35000, 1, 0, 0, 0, ''),
(268, '2020-10-04', 'INV-HK-11-2020-0268', 'Anggia Dwi', 'Salon Anis', 'Semarang', 'anggiadwin@gmail.com', '082135380551', '1995-11-07', 2, 35000, 1, 0, 0, 0, ''),
(269, '2020-10-05', 'INV-HK-11-2020-0269', 'Ai Clara S', 'PT. Rifan Financindo', 'Semarang', 'rekrutmen.rfbsmg@gmail.com', '087832777481', '1996-05-08', 1, 79000, 3, 0, 0, 0, ''),
(270, '2020-10-15', 'INV-HK-11-2020-0270', 'Dinda', 'PT. Rifan  Financindo Berjangka Yogyakarta', 'Jogja', 'hrd.rfinjogja@gmail.com', '085774459137', '2001-11-11', 1, 57000, 2, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pemilik` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `area` varchar(50) NOT NULL,
  `kontak` text NOT NULL,
  `penanggungjawab` varchar(255) NOT NULL,
  `tanggal_kunjungan` date DEFAULT NULL,
  `kebutuhan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `nama`, `pemilik`, `alamat`, `area`, `kontak`, `penanggungjawab`, `tanggal_kunjungan`, `kebutuhan`, `keterangan`) VALUES
(1, 'Koki Joni', 'Joni', 'Jl. Seturan Raya Jl E1 No.6, Kledokan, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', 'Utara', '8097823190723', 'Joni', '2020-08-10', 'BLD TK', 'temporarily close'),
(2, 'chick & pan', 'bu mega', 'Gg. Mangga, Pandeyan, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55161', 'Kota', '0857 4702 1069', 'bu mega', '2020-08-10', 'sayap potong 3 isi 12 - 13', 'follow up di info ketika stock habis\r\nmasih pakai supplier lama kalo tertarik di kontak'),
(3, 'j kitchen', 'mas angga', 'Ruko Nirwana no. 2, Jl. Lembah UGM, Karang Gayam, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', 'Utara', '082131290456', 'mas angga', '2020-08-10', 'sayap potong 3 isi normal', 'follow up lagi nanti di kontak'),
(4, 'hore steak', 'mas angga', 'Jl. Cenderawasih No.32b, Mrican, Demangan, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', 'Kota', '081806958567', 'mas angga', '2020-08-10', 'fillet dada slice 50 gram & 100 gram', 'follow up lagi utk pengajuan di pusat '),
(5, 'Unlimited Cafe', 'mas naro', 'Jl. Sukun, Jaranan, Banguntapan, Kec. Banguntapan, Bantul, Daerah Istimewa Yogyakarta 55198', 'Timur', '081246932493', 'mas guntur', '2020-08-10', 'sayap & fillet dada', 'follow up lagi PL sudah diterima purchasing '),
(6, 'Kiwae', 'Andri', 'Jl. Agro No.3-4, Kocoran, Caturtunggal, Kec. Depok\r\n', 'Utara', '087738992386', 'Andri', '2020-08-12', 'dada , paha atas ukuran 8\r\nsayap \r\ndada potongan diamond / segitiga\r\nsayap potongan dollar', 'followup lagi'),
(7, 'ayam geprek bu tini', 'bu tini', 'Jl. Beo, Papringan, Caturtunggal, Kec. Depok, Kabupaten Sleman', 'Utara', '082135204640', 'bu tini', '2020-08-12', 'karkas', 'followup ulang'),
(8, 'LUK cafe', 'mas arif', 'Jl. Cendrawasih No.358B, Pringwulung, Condongcatur, Kec. Depok, Kabupaten Sleman', 'Utara', '081222330056', 'mas arif', '2020-08-12', 'fillet dada', 'kitchen baru close setelah open nanti dikabarin lagi'),
(9, 'rumah makan bu ti', 'pak paidu', 'Jl. Nologaten, Tempel, Caturtunggal, Kec. Depok, Kabupaten Sleman', 'Utara', '082220522414', 'pak paidu', '2020-08-12', 'dada , paha atas , sayap', 'masih memakai supplier lama harus di followup lagi'),
(10, 'Nasihat', 'mas fauzi', 'asdasd', 'Utara', '082325395380', 'mas fauzi', '2020-08-13', 'ayam ukuran 6', 'masih dirundingkan dengan tmn2nya nanti followup lagi');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE `usergroup` (
  `id_usergroup` int(21) NOT NULL,
  `usergroup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`id_usergroup`, `usergroup`) VALUES
(1, 'Administrator'),
(2, 'Admin'),
(3, 'Sales'),
(4, 'Anggota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_usergroup` (`id_usergroup`);

--
-- Indexes for table `detail_invoice`
--
ALTER TABLE `detail_invoice`
  ADD KEY `kode_transaksi` (`kodeinvoice`);

--
-- Indexes for table `fakturdaging`
--
ALTER TABLE `fakturdaging`
  ADD PRIMARY KEY (`faktur`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`kodeinvoice`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`id_usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `id_usergroup` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
