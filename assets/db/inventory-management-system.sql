
-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 12:42 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory-management-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand` varchar(40) NOT NULL,
  `active` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand`, `active`, `status`) VALUES
(1, 'SONY', 1, 1),
(2, 'Yong Nuo', 1, 1),
(3, 'BENRO', 1, 2),
(4, 'EXCELL', 1, 1),
(5, 'RODE', 1, 1),
(6, 'SHURE', 1, 1),
(7, 'TELIKOU', 1, 1),
(8, 'TP-Link ', 1, 1),
(9, 'EZCAP', 1, 1),
(10, '-', 1, 2),
(11, 'ELGATO', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(40) NOT NULL,
  `active` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `active`, `status`) VALUES
(1, 'Kamera', 1, 1),
(2, 'Lighting', 1, 1),
(3, 'Tripod', 1, 1),
(4, 'Green Screen', 1, 1),
(5, 'Microphone', 1, 2),
(6, 'Microphone', 1, 1),
(7, 'Switch', 1, 1),
(8, 'Video Capture Card', 1, 1),
(9, 'Furniture', 1, 2),
(10, 'Tas Mobile Studio', 1, 1),
(11, 'Teleprompter', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `link_admin` text NOT NULL,
  `link_user` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

-- INSERT INTO `feedback` (`id`, `deskripsi`, `link_admin`, `link_user`, `status`) VALUES
-- (1, 'Test 123', 'https://www.google.co.id/', 'https://www.bing.co.id/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` varchar(20) NOT NULL,
  `produk_id` varchar(15) NOT NULL,
  `banyak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

-- INSERT INTO `order_detail` (`id`, `produk_id`, `banyak`) VALUES
-- ('250522000001', 'ABCD', 1),
-- ('250522000001', 'ABC', 2),
-- ('080622000002', 'ABCD', 1),
-- ('080622000002', '8M3D8', 2),
-- ('080622000002', 'TLPMT', 3),
-- ('240622000001', '8M3D8', 1),
-- ('240622000001', 'DZADQ', 2),
-- ('240622001002', 'DZADQ', 1),
-- ('240622001002', 'DZADQ', 2),
-- ('220624001003', 'ABC', 4),
-- ('220624001003', 'GRNSC', 2),
-- ('220802001004', 'DZADQ', 1),
-- ('220802001004', 'QGUZR', 2),
-- ('220802001004', 'VCCELGATO', 1),
-- ('010223002001', '8M3D8', 1),
-- ('010223002001', 'SNA6000', 1),
-- ('010223002001', 'VCCEZCAP', 1),
-- ('010223002002', 'DZADQ', 1),
-- ('010223002002', 'GRNSC', 3),
-- ('010223002002', 'QGUZR', 2),
-- ('010223002003', 'MSHURE', 5),
-- ('010223002003', 'GBTPLINK', 4),
-- ('010223002003', 'OUUUA', 1),
-- ('010223002004', 'DZADQ', 1),
-- ('010223002004', 'ABCD', 2),
-- ('010223002004', 'VCCELGATO', 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `id` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `tgl_peminjaman` varchar(10) NOT NULL,
  `tgl_pengembalian` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `nde` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_master`
--

-- INSERT INTO `order_master` (`id`, `username`, `tgl_peminjaman`, `tgl_pengembalian`, `nama`, `nip`, `unit`, `nde`, `status`) VALUES
-- ('010223002001', 'user', '06-02-2023', '11-02-2023', 'Adi', '1234567890', 'LAK', '4980d13b77e63cbe68e34429eb3872c9.pdf', 1),
-- ('010223002002', 'user', '07-02-2023', '11-02-2023', 'Budi', '23456789', 'FIK', 'fd47f315c0ef0a7b76d0403f5ae1864c.pdf', 1),
-- ('010223002003', 'user', '13-02-2023', '17-02-2023', 'Cici', '987645612', 'FEB', '27e1515c0541da0100e60f73b5284334.pdf', 1),
-- ('010223002004', 'user', '01-05-2023', '06-05-2023', 'Dedi', '895465123', 'FIT', 'aa44486461e6aa77655bf24ab90f928d.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` varchar(15) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `stock` int(100) NOT NULL,
  `aktif` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `brand_id`, `kategori_id`, `stock`, `aktif`, `status`, `foto`) VALUES
('8M3D8', 'YN-300 + Charger', 2, 2, 28, 2, 1, '35e325f478fba8e3563c6c739da705e4.jpg'),
('ABC', 'SONY NSR NX-100', 1, 1, 14, 1, 1, 'b5b2e9a4b3d236c3121d0eec02386087.jpg'),
('ABCD', 'Boom Mic RODE', 5, 6, 6, 1, 1, '0b7409158980d139ba9d875566b22cd9.jpg'),
('BO1', 'Test', 1, 1, 2, 1, 2, '744f4a2d5f6f397e79bef2ba2ea4eda2.jpg'),
('DZADQ', 'YN-600 + Charger', 1, 1, 6, 1, 1, '3ec1a088a2aa35764304c78c02dd1782.jpg'),
('GBTPLINK', 'Gigabit TP-Link', 8, 7, 1, 1, 1, '4e368d93ab7310d11e9bb6b60acec5f2.jpg'),
('GRNSC', 'Green Screen', 10, 4, 14, 1, 1, 'df9c9cbb21a7e526f81059938daeb856.jpg'),
('MSHURE', 'Wireless Mic SHURE', 6, 6, 14, 1, 1, 'ac718af05a48ba99c845061fbb6f9ce7.jpg'),
('OUUUA', 'Stand Green Screen', 10, 4, 14, 1, 1, 'fd8f65765c360016d5a7c309a9d7a2ee.jpg'),
('QGUZR', 'BENRO Tripod Kamera', 3, 3, 7, 1, 1, 'e5de0af84d36fb7230f5e6550ee4ef5c.jpg'),
('SBMRODE', 'Stand Boom Mic RODE', 5, 6, 14, 1, 1, 'f4fe5a1b91a794c3cec9fcd8498e983c.jpg'),
('SNA6000', 'SONY A6000', 1, 1, 2, 1, 1, 'c3ec64b557ed434610df06632a94e566.jpg'),
('TLPMT', 'Teleprompter TELIKOU ', 7, 11, 7, 1, 1, '62c41bafe34854f663459f41d3500feb.jpg'),
('VCCELGATO', 'ELGATO HD60S', 1, 8, 2, 1, 1, 'de53131d4e11d895c33b80b46691272a.jpg'),
('VCCEZCAP', 'EZCAP HD60', 9, 8, 1, 1, 1, 'ff35b8dcac11844d0d5eae20a54ba556.jpg'),
('ZMJST', 'EXCELL Tripod Lighting', 4, 3, 28, 1, 1, '7621b6a843ab934cda244bc68cab4f96.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `email`, `password`, `level`) VALUES
(1, 'admin', 'Admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 3),
(2, 'user', 'Dummy Acc', 'user1@gmail.com', '25d55ad283aa400af464c76d713c07ad', 2),
(3, 'dummy', 'dummy admin', 'admin@dummy.com', '25d55ad283aa400af464c76d713c07ad', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `fk_order` (`id`),
  ADD KEY `fk_produk` (`produk_id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_brand` (`brand_id`),
  ADD KEY `fk_kategori` (`kategori_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_produk` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_brand` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;