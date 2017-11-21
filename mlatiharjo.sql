-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 10:16 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlatiharjo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_username` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_foto` mediumblob NOT NULL,
  `admin_super` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_username`, `admin_password`, `admin_nama`, `admin_foto`, `admin_super`, `created_at`, `updated_at`) VALUES
('naruto', '$2y$10$ils8ZKUWJC2vOIw0LCv8ouyf4MNps7jQv0bo0tUrBbAR2F012mhr6', 'Uzumaki Naruto', 0x72696e616c32312e706e67, 'no', '2017-08-18 17:43:48', '2017-09-27 02:49:53'),
('rinal21', '$2y$10$ils8ZKUWJC2vOIw0LCv8ouyf4MNps7jQv0bo0tUrBbAR2F012mhr6', 'Syahrinal Muchtar', 0x72696e616c32312e706e67, 'yes', '2017-08-18 17:43:48', '2017-08-22 07:23:26'),
('saskeh', '$2y$10$pPGxZXqHRgwaI7pCsTXbdO2g8HDVP6E/FldNtRAPKfLJHMuKz.rgC', 'Uchiha', 0x7361736b65682e706e67, 'No', '2017-08-28 15:48:11', '2017-08-28 15:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_nama` varchar(20) DEFAULT NULL,
  `bank_norek` varchar(25) DEFAULT NULL,
  `bank_an` varchar(25) DEFAULT NULL,
  `bank_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_nama`, `bank_norek`, `bank_an`, `bank_foto`) VALUES
(2, 'Bukopin', '78905648', 'Supriyadi', 'Logo Bank Bukopin.png'),
(3, 'Mandiri', '47805048', 'Suryadi', 'Logo Bank mandiri.png'),
(4, 'BCA', '715078549', 'Sanjaya', 'bankbca.png'),
(5, 'BTN', '32131515', 'Sarifudin', 'BTN.png');

-- --------------------------------------------------------

--
-- Table structure for table `bukti`
--

DROP TABLE IF EXISTS `bukti`;
CREATE TABLE `bukti` (
  `bukti_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `bukti_foto` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti`
--

INSERT INTO `bukti` (`bukti_id`, `trans_id`, `bukti_foto`, `created_at`, `updated_at`) VALUES
(1, 1, 'mandiri01.jpg', '2017-08-26 01:48:16', '0000-00-00 00:00:00'),
(2, 50, '50.png', '2017-10-17 02:39:04', '2017-10-17 02:39:04'),
(3, 65, '65.png', '2017-10-17 03:23:13', '2017-10-17 03:23:13'),
(4, 66, '66.png', '2017-10-17 05:38:27', '2017-10-17 05:38:27'),
(5, 67, '67.png', '2017-11-14 01:13:23', '2017-11-14 01:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

DROP TABLE IF EXISTS `company_profile`;
CREATE TABLE `company_profile` (
  `profile_id` int(1) NOT NULL,
  `profile_nohp` varchar(50) DEFAULT NULL,
  `profile_alamat` varchar(100) DEFAULT NULL,
  `profile_email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`profile_id`, `profile_nohp`, `profile_alamat`, `profile_email`) VALUES
(1, '(021) 213 213 - Budi', 'DESA MLATIHARJO, KEC.GAJAH - KAB, DEMAK JAWA TENGAH -INDONESIA.', 'info@mlatiharjo.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_nama` varchar(20) DEFAULT NULL,
  `customer_email` varchar(50) DEFAULT NULL,
  `customer_password` varchar(120) NOT NULL,
  `customer_nohp` varchar(15) DEFAULT NULL,
  `customer_alamat` varchar(50) DEFAULT NULL,
  `customer_kecamatan` varchar(30) DEFAULT NULL,
  `customer_kelurahan` varchar(30) DEFAULT NULL,
  `customer_kota` varchar(20) DEFAULT NULL,
  `customer_kodepos` varchar(10) DEFAULT NULL,
  `customer_provinsi` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_nama`, `customer_email`, `customer_password`, `customer_nohp`, `customer_alamat`, `customer_kecamatan`, `customer_kelurahan`, `customer_kota`, `customer_kodepos`, `customer_provinsi`, `created_at`, `updated_at`) VALUES
(1, 'Andi', 'andi@email.com', '$2y$10$ykXGM3dT2qBaePA7BcAiKObE6v8hpBApOXCl0kBqR3m91QtMyGjK2', '0987654321', 'jln kebaikan setelah kejahatan', 'Pancoran Mas', 'Depok Jaya', 'Jakarta Selatan', '16475', 'DKI Jakarta', '2017-10-16 01:04:40', '2017-10-15 18:04:40'),
(2, 'Budi', 'budi@email.com', '$2a$06$iFvZaDOhNHw..W6jzNYTweSVT.eLQGJ7UseC181dTfS.D3j9rpLRy', '0987654321', 'jln kejahatan', 'Pancoran Mas', 'Depok Jaya', 'Depok', '16475', 'Jawa Barat', '2017-09-27 02:44:00', '2017-09-27 02:44:00'),
(4, 'Darto', 'darto@email.com', '$2a$06$iFvZaDOhNHw..W6jzNYTweSVT.eLQGJ7UseC181dTfS.D3j9rpLRy', '0987-6543-2124', 'jln Tobat', 'Pancoran Mas', 'Depok Jaya', 'Depok', '16475', 'Jawa Barat', '2017-09-27 02:44:03', '2017-09-27 02:44:03'),
(5, 'Charly', 'charly@email.com', '$2a$06$iFvZaDOhNHw..W6jzNYTweSVT.eLQGJ7UseC181dTfS.D3j9rpLRy', '0987-6543-2124', 'jln Tobat', 'Pancoran Mas', 'Depok Jaya', 'Depok', '16475', 'Jawa Barat', '2017-09-27 02:44:06', '2017-09-27 02:44:06'),
(6, 'Desta', 'desta@email.com', '$2a$06$iFvZaDOhNHw..W6jzNYTweSVT.eLQGJ7UseC181dTfS.D3j9rpLRy', '0987-6543-2124', 'jln Tobat', 'Pancoran Mas', 'Depok Jaya', 'Depok', '16475', 'Jawa Barat', '2017-09-27 03:02:35', '2017-09-27 03:02:35'),
(9, 'Michael Schumacker', 'mic@ymail.com', '$2y$10$Ams0yZ9LcR8IBoa1LGfIN./Q5djM50ZmEQRmsBfizbQtNcqNCBB5O', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-28 21:59:12', '2017-08-28 21:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

DROP TABLE IF EXISTS `kurir`;
CREATE TABLE `kurir` (
  `kurir_id` int(10) NOT NULL,
  `kurir_nama` varchar(25) NOT NULL,
  `kurir_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`kurir_id`, `kurir_nama`, `kurir_foto`) VALUES
(1, 'JNE', 'logoJNE.png'),
(2, 'TIKI', 'logoTIKI.png'),
(3, 'POS', 'logoPOS.png');

-- --------------------------------------------------------

--
-- Table structure for table `kurir_service`
--

DROP TABLE IF EXISTS `kurir_service`;
CREATE TABLE `kurir_service` (
  `kurir_id` int(10) DEFAULT NULL,
  `kurir_service_id` int(11) NOT NULL,
  `kurir_service_kode` varchar(20) DEFAULT NULL,
  `kurir_service_nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir_service`
--

INSERT INTO `kurir_service` (`kurir_id`, `kurir_service_id`, `kurir_service_kode`, `kurir_service_nama`) VALUES
(1, 1, 'OKE', 'Ongkos Kirim Ekonomis'),
(1, 2, 'REG', 'Layanan Reguler'),
(1, 3, 'YES', 'Yakin Esok Sampai'),
(2, 4, 'REG', 'REGULAR SERVICE'),
(2, 5, 'ONS', 'OVER NIGHT SERVICE'),
(3, 6, NULL, 'Paket Kilat Khusus'),
(3, 7, NULL, 'Express Next Day Barang'),
(3, 8, NULL, 'Paketpos Dangerous Goods'),
(3, 9, NULL, 'Paketpos Valuable Goods'),
(2, 10, 'TRC', 'TRUCKING SERVICE'),
(2, 11, 'ECO', 'ECONOMY SERVICE'),
(2, 12, 'SDS', 'SAMEDAY SERVICE'),
(2, 13, 'HDS', 'HOLIDAY SERVICE');

-- --------------------------------------------------------

--
-- Table structure for table `order_produk`
--

DROP TABLE IF EXISTS `order_produk`;
CREATE TABLE `order_produk` (
  `order_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `order_qty` int(2) DEFAULT NULL,
  `order_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_produk`
--

INSERT INTO `order_produk` (`order_id`, `trans_id`, `produk_id`, `order_qty`, `order_total`) VALUES
(1, 1, 2, 2, 360000),
(2, 1, 3, 1, 120000),
(3, 2, 4, 3, 435000),
(4, 2, 2, 1, 180000),
(5, 2, 3, 1, 120000),
(6, 3, 4, 1, 145000),
(43, 50, 3, 2, 240000),
(44, 50, 4, 1, 145000),
(45, 50, 2, 2, 360000),
(46, 51, 3, 2, 240000),
(47, 51, 4, 1, 145000),
(48, 51, 2, 2, 360000),
(49, 52, 3, 2, 240000),
(50, 52, 4, 1, 145000),
(51, 52, 2, 2, 360000),
(52, 53, 3, 2, 240000),
(53, 53, 4, 1, 145000),
(54, 53, 2, 2, 360000),
(55, 54, 3, 2, 240000),
(56, 54, 4, 1, 145000),
(57, 54, 2, 2, 360000),
(58, 55, 3, 2, 240000),
(59, 55, 4, 1, 145000),
(60, 55, 2, 2, 360000),
(61, 56, 3, 2, 240000),
(62, 56, 4, 1, 145000),
(63, 56, 2, 2, 360000),
(64, 57, 3, 2, 240000),
(65, 57, 4, 1, 145000),
(66, 57, 2, 2, 360000),
(67, 58, 3, 2, 240000),
(68, 58, 4, 1, 145000),
(69, 58, 2, 2, 360000),
(70, 59, 3, 2, 240000),
(71, 59, 4, 1, 145000),
(72, 59, 2, 2, 360000),
(73, 60, 3, 2, 240000),
(74, 60, 4, 1, 145000),
(75, 60, 2, 2, 360000),
(76, 61, 3, 2, 240000),
(77, 61, 4, 1, 145000),
(78, 61, 2, 2, 360000),
(79, 62, 3, 2, 240000),
(80, 62, 4, 1, 145000),
(81, 62, 2, 2, 360000),
(82, 63, 3, 2, 240000),
(83, 63, 4, 1, 145000),
(84, 63, 2, 2, 360000),
(85, 64, 3, 2, 240000),
(86, 64, 4, 1, 145000),
(87, 64, 2, 2, 360000),
(88, 65, 3, 2, 240000),
(89, 65, 4, 1, 145000),
(90, 65, 2, 2, 360000),
(91, 66, 3, 2, 240000),
(92, 66, 4, 2, 290000),
(93, 66, 2, 3, 540000),
(94, 67, 2, 1, 180000),
(95, 67, 3, 1, 120000),
(96, 67, 4, 1, 145000),
(97, 68, 4, 1, 145000),
(98, 68, 3, 2, 240000),
(99, 69, 4, 2, 290000),
(100, 69, 3, 2, 240000),
(101, 70, 4, 2, 290000),
(102, 70, 3, 2, 240000),
(103, 71, 4, 2, 290000),
(104, 71, 3, 2, 240000),
(105, 72, 3, 1, 120000),
(106, 72, 2, 1, 180000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `produk_nama` varchar(25) DEFAULT NULL,
  `produk_stok` int(10) DEFAULT NULL,
  `produk_harga` int(10) DEFAULT NULL,
  `produk_info` text,
  `produk_foto` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`, `produk_stok`, `produk_harga`, `produk_info`, `produk_foto`, `created_at`, `updated_at`) VALUES
(2, 'Beras Merah', 24, 180000, '<p>Warna Berasnya Merah Terang</p>', 'Beras Merah.png', '2017-08-18 01:44:51', '2017-11-18 16:33:22'),
(3, 'Beras Melati', 19, 120000, 'Beras Dengan Wangi Melati', 'Beras Melati.png', '2017-08-25 00:50:05', '2017-11-18 16:34:35'),
(4, 'Beras Hitam', 18, 145000, 'Beras Berwarna Hitam Pekat', 'Beras Hitam.png', '2017-08-25 00:51:01', '2017-11-18 16:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `trans_id` int(11) NOT NULL,
  `trans_kode` varchar(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `kurir_id` int(11) DEFAULT NULL,
  `kurir_service_id` int(11) DEFAULT NULL,
  `trans_ongkir` int(11) DEFAULT NULL,
  `trans_total` int(11) DEFAULT NULL,
  `trans_note` varchar(255) DEFAULT NULL,
  `trans_status_pembayaran` varchar(20) DEFAULT NULL,
  `trans_status_pengiriman` varchar(20) DEFAULT NULL,
  `trans_resi` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `trans_read` varchar(3) DEFAULT NULL,
  `trans_ulasan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`trans_id`, `trans_kode`, `customer_id`, `bank_id`, `kurir_id`, `kurir_service_id`, `trans_ongkir`, `trans_total`, `trans_note`, `trans_status_pembayaran`, `trans_status_pengiriman`, `trans_resi`, `created_at`, `updated_at`, `trans_read`, `trans_ulasan`) VALUES
(1, 'TR001', 2, 3, 1, NULL, 10000, 490000, NULL, 'Success', 'Delivered', '120335698', '2017-08-24 09:47:29', '2017-08-25 12:49:09', NULL, NULL),
(2, 'TR002', 1, 2, 3, NULL, 10000, 735000, NULL, 'Success', 'On Delivery', '120335698', '2017-08-24 09:47:29', '2017-08-28 22:22:54', NULL, NULL),
(3, 'TR003', 1, 3, 3, NULL, 10000, 145000, NULL, 'Canceled', 'Canceled', '120335698', '2017-08-24 09:47:29', '2017-08-28 22:23:01', NULL, NULL),
(35, 'TR1', 1, 4, 3, 6, 20200, 765200, 'test', 'Canceled', 'Canceled', NULL, '2017-10-01 00:07:32', '2017-10-14 22:40:17', NULL, NULL),
(50, 'TR926', 1, 4, 1, 2, 18000, 763000, 'catatan', 'Success', 'Delivered', '120335698', '2017-10-07 21:07:09', '2017-11-14 00:54:30', 'ula', 'ulasan'),
(51, 'TR685', 1, 4, 1, 2, 18000, 763000, 'catatan', 'Canceled', 'Canceled', NULL, '2017-10-09 13:23:49', '2017-10-13 06:25:20', NULL, NULL),
(52, 'TR790', 1, 2, 1, NULL, NULL, NULL, NULL, 'Canceled', 'Canceled', NULL, '2017-10-16 04:33:12', '2017-10-16 04:38:12', NULL, NULL),
(53, 'TR786', 1, 2, 1, NULL, NULL, NULL, NULL, 'Canceled', 'Canceled', NULL, '2017-10-16 04:35:45', '2017-10-16 04:40:46', NULL, NULL),
(54, 'TR867', 1, 2, 1, NULL, NULL, NULL, NULL, 'Canceled', 'Canceled', NULL, '2017-10-16 04:36:14', '2017-10-16 04:41:14', NULL, NULL),
(55, 'TR140', 1, 2, 1, NULL, NULL, NULL, NULL, 'Canceled', 'Canceled', NULL, '2017-10-16 04:36:55', '2017-10-16 04:41:55', NULL, NULL),
(56, 'TR270', 1, 2, 1, NULL, NULL, NULL, NULL, 'Canceled', 'Canceled', NULL, '2017-10-16 04:37:29', '2017-10-16 04:42:34', NULL, NULL),
(57, 'TR71', 1, 2, 1, NULL, NULL, NULL, NULL, 'Canceled', 'Canceled', NULL, '2017-10-16 04:37:58', '2017-10-16 05:05:26', NULL, NULL),
(58, 'TR438', 1, 2, 1, NULL, NULL, NULL, NULL, 'Canceled', 'Canceled', NULL, '2017-10-16 04:38:37', '2017-10-16 05:05:26', NULL, NULL),
(59, 'TR493', 1, 3, 1, 2, 18000, 763000, 'catatan', 'Canceled', 'Canceled', NULL, '2017-10-17 10:13:14', '2017-10-17 10:18:14', NULL, NULL),
(60, 'TR725', 1, 3, 1, 2, 18000, 763000, 'catatan', 'Canceled', 'Canceled', 'coba2', '2017-10-17 10:14:43', '2017-11-12 17:46:49', 'yes', NULL),
(61, 'TR946', 1, 3, 1, 2, 18000, 763000, 'catatan', 'Canceled', 'Canceled', NULL, '2017-10-17 10:16:37', '2017-10-17 10:21:38', NULL, NULL),
(62, 'TR971', 1, 3, 1, 2, 18000, 763000, 'catatan', 'Canceled', 'Canceled', NULL, '2017-10-17 10:18:48', '2017-10-17 10:23:49', NULL, NULL),
(63, 'TR181', 1, 3, 1, 2, 18000, 763000, 'catatan', 'Canceled', 'Canceled', NULL, '2017-10-17 10:20:22', '2017-10-17 12:31:04', NULL, NULL),
(64, 'TR85', 1, 3, 1, 2, 18000, 763000, 'catatan', 'Canceled', 'Canceled', NULL, '2017-10-17 10:21:07', '2017-10-17 12:31:04', NULL, NULL),
(65, 'TR628', 1, 3, 1, 2, 18000, 763000, 'catatan', 'Canceled', 'Canceled', NULL, '2017-10-17 10:22:26', '2017-10-17 12:31:04', NULL, NULL),
(66, 'TR189', 1, 4, 1, 2, 18000, 1088000, 'catatan', 'Canceled', 'Canceled', NULL, '2017-10-17 12:37:01', '2017-10-21 22:08:22', 'yes', NULL),
(67, 'TR307', 1, 2, 1, NULL, 36000, 553000, NULL, 'Success', 'Delivered', '742922922', '2017-11-14 08:07:07', '2017-11-14 01:18:58', 'yes', NULL),
(68, 'TR998', 1, 4, 3, 6, 17170, 402170, NULL, 'Canceled', 'Canceled', NULL, '2017-11-18 06:44:50', '2017-11-18 07:44:50', NULL, NULL),
(69, 'TR96', 1, 5, 1, NULL, 18000, 548000, NULL, 'Canceled', 'Canceled', NULL, '2017-11-18 06:52:22', '2017-11-18 07:52:22', NULL, NULL),
(70, 'TR833', 1, 3, 1, NULL, 36000, 641750, NULL, 'Canceled', 'Canceled', NULL, '2017-11-18 06:54:57', '2017-11-18 09:22:31', NULL, NULL),
(71, 'TR988', 1, 3, 1, NULL, 18000, 548988, NULL, 'Success', 'On Delivery', '133455667', '2017-11-18 07:11:08', '2017-11-18 16:34:35', NULL, NULL),
(72, 'TR828', 1, 4, 1, NULL, 36000, 336828, NULL, 'Success', 'Delivered', '1223523235', '2017-11-18 21:52:35', '2017-11-18 16:34:52', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_username`) USING BTREE;

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `bukti`
--
ALTER TABLE `bukti`
  ADD PRIMARY KEY (`bukti_id`),
  ADD KEY `buktiXtrans` (`trans_id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`kurir_id`),
  ADD UNIQUE KEY `kurir_nama` (`kurir_nama`);

--
-- Indexes for table `kurir_service`
--
ALTER TABLE `kurir_service`
  ADD PRIMARY KEY (`kurir_service_id`),
  ADD KEY `kurirXservice` (`kurir_id`);

--
-- Indexes for table `order_produk`
--
ALTER TABLE `order_produk`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orderXproduk` (`produk_id`),
  ADD KEY `orderXtrans` (`trans_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`trans_id`),
  ADD UNIQUE KEY `trans_kode_2` (`trans_kode`),
  ADD KEY `transXbank` (`bank_id`),
  ADD KEY `transXcustomer` (`customer_id`),
  ADD KEY `trans_kode` (`trans_kode`),
  ADD KEY `transXkurir` (`kurir_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bukti`
--
ALTER TABLE `bukti`
  MODIFY `bukti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `profile_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `kurir_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kurir_service`
--
ALTER TABLE `kurir_service`
  MODIFY `kurir_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `order_produk`
--
ALTER TABLE `order_produk`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bukti`
--
ALTER TABLE `bukti`
  ADD CONSTRAINT `buktiXtrans` FOREIGN KEY (`trans_id`) REFERENCES `transaksi` (`trans_id`) ON UPDATE CASCADE;

--
-- Constraints for table `kurir_service`
--
ALTER TABLE `kurir_service`
  ADD CONSTRAINT `kurirXservice` FOREIGN KEY (`kurir_id`) REFERENCES `kurir` (`kurir_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_produk`
--
ALTER TABLE `order_produk`
  ADD CONSTRAINT `orderXproduk` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orderXtrans` FOREIGN KEY (`trans_id`) REFERENCES `transaksi` (`trans_id`) ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transXbank` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`bank_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transXcustomer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transXkurir` FOREIGN KEY (`kurir_id`) REFERENCES `kurir` (`kurir_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
