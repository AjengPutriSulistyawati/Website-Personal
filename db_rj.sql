-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 09:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rj`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `id_bayar` bigint(20) NOT NULL,
  `nominal_uang` bigint(20) NOT NULL,
  `total_bayar` bigint(20) NOT NULL,
  `waktu_bayar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bayar`
--

INSERT INTO `tb_bayar` (`id_bayar`, `nominal_uang`, `total_bayar`, `waktu_bayar`) VALUES
(2308231512572, 170000, 168601, '2023-08-23 09:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_produk`
--

CREATE TABLE `tb_daftar_produk` (
  `id` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `kategori` int(11) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_daftar_produk`
--

INSERT INTO `tb_daftar_produk` (`id`, `foto`, `nama_produk`, `keterangan`, `kategori`, `harga`) VALUES
(11, '85102-stiker.jpeg', 'Stiker', 'Banner dengan standing papan kayu, lebih kokoh untuk pemakaian outdoor', 17, '1'),
(12, '20349-roll banner.jpeg', 'Roll Banner', 'Banner dengan standing roll stainless, lebih cocok untuk pemakaian indoor yang tidak terpapar cuaca dan angin', 8, '1'),
(13, '97157-xy banner.jpeg', 'x/y banner', 'Banner dengan standing rangka x stainless, lebih cocok untuk pemakaian indoor', 9, '1'),
(14, '66659-sablon cup.jpeg', 'sablon cup12oz datar 300pcs', 'sablon cup 300pcs satu warna untuk branding usaha', 16, '168600'),
(15, '10977-sablon cup.jpeg', 'sablon cup16 oz datar 500pcs', 'sablon cup datar 16oz 500pcs satu warna untuk branding usaha', 16, '256000'),
(16, '85715-sablon cup.jpeg', 'sablon cup12 oz datar 500pcs', 'sablon cup datar 12oz 500pcs satu warna untuk branding usaha', 16, '256000'),
(17, '72958-sablon cup.jpeg', 'sablon cup12 oz datar 1000pcs', 'sablon cup datar 12oz 1000pcs satu warna untuk branding usaha', 16, '450000'),
(18, '84974-sablon cup.jpeg', 'sablon cup16oz datar 300pcs', 'sablon cup datar 16oz 300pcs satu warna untuk branding usaha', 16, '168600'),
(19, '54606-sablon cup.jpeg', 'sablon cup 16 oz datar 1000pcs', 'sablon cup datar 16 oz 1000pcs satu warna untuk branding usaha', 16, '450000'),
(20, '39345-sablon cup.jpeg', 'sablon cup 18oz datar 300pcs', 'sablon cup datar 18oz 300pcs satu warna untuk branding usaha', 16, '180000'),
(21, '19017-sablon cup.jpeg', 'sablon cup 18oz datar 500pcs', 'sablon cup datar 18oz 500pcs satu warna untuk branding usaha ', 16, '287500'),
(22, '69242-sablon cup.jpeg', 'sablon cup 18oz datar 1000pcs', 'sablon cup datar 18oz 1000pcs satu warna untuk branding usaha', 16, '555000'),
(23, '49231-sablon cup.jpeg', 'sablon cup 22oz datar 300pcs', 'sablon cup datar 22oz 300pcs satu warna untuk branding usaha', 16, '210000'),
(24, '86100-sablon cup.jpeg', 'sablon cup 22oz datar 500pcs', 'sablon cup datar 22oz 500pcs satu warna untuk branding usaha', 16, '325000'),
(25, '69435-sablon cup.jpeg', 'sablon cup 22oz datar 1000pcs', 'sablon cup datar 22oz 1000pcs satu warna untuk branding usaha', 16, '620000'),
(26, '31365-sablon cup.jpeg', 'sablon cup 12oz oval 300pcs', 'sablon cup oval 12oz 300pcs satu warna untuk branding usaha', 16, '177000'),
(27, '35101-sablon cup.jpeg', 'sablon cup 12oz oval 500pcs', 'sablon cup oval 12oz 500pcs satu warna untuk branding usaha', 16, '280000'),
(28, '80019-sablon cup.jpeg', 'sablon cup 12oz oval 1000pcs', 'sablon cup oval 12oz 1000pcs satu warna untuk branding usaha', 16, '510000'),
(29, '51934-sablon cup.jpeg', 'sablon cup 14oz oval 300pcs', 'sablon cup oval 14oz 300pcs satu warna untuk branding usaha', 16, '192000'),
(30, '95015-sablon cup.jpeg', 'sablon cup 14oz oval 500pcs', 'sablon cup oval 14oz 500pcs satu warna untuk branding usaha', 16, '295000'),
(31, '11022-sablon cup.jpeg', 'sablon cup 14oz oval 1000pcs', 'sablon cup oval 14oz 1000pcs satu warna untuk branding usaha', 16, '550000'),
(32, '39796-sablon cup.jpeg', 'sablon cup 16oz oval 300pcs', 'sablon cup oval 16oz 300pcs satu warna untuk branding usaha', 16, '195000'),
(33, '62928-sablon cup.jpeg', 'sablon cup 16oz oval 500pcs', 'sablon cup oval 16oz 500pcs satu warna untuk branding usaha', 16, '295000'),
(34, '83755-sablon cup.jpeg', 'sablon cup 16oz oval 1000pcs', 'sablon cup oval 16oz 1000pcs satu warna untuk branding usaha', 16, '540000'),
(35, '63551-sablon cup.jpeg', 'sablon cup 18oz oval 300pcs', 'sablon cup oval 18oz 300pcs satu warna untuk branding usaha', 16, '192000'),
(36, '57010-sablon cup.jpeg', 'sablon cup 18oz oval 500pcs', 'sablon cup oval 18oz 500pcs satu warna untuk branding usaha', 16, '295000'),
(37, '47283-sablon cup.jpeg', 'sablon cup 18oz oval 1000pcs', 'sablon cup oval 18oz 1000pcs satu warna untuk branding usaha', 16, '550000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_produk`
--

CREATE TABLE `tb_kategori_produk` (
  `id_kat_produk` int(11) NOT NULL,
  `jenis_produk` int(11) NOT NULL,
  `kategori_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori_produk`
--

INSERT INTO `tb_kategori_produk` (`id_kat_produk`, `jenis_produk`, `kategori_produk`) VALUES
(7, 1, 'A Banner / Papan Segitiga Banner'),
(8, 1, 'Roll Banner'),
(9, 1, 'X/y Banner'),
(13, 3, 'Menu Lamninating'),
(14, 4, 'Kartu Nama / Voucher'),
(16, 5, 'Sablon Cup'),
(17, 2, 'Stiker Ritrama,Vynil &amp; Mirror'),
(18, 6, 'Brosur'),
(19, 7, 'MMT, Spanduk &amp; Baliho');

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_order`
--

CREATE TABLE `tb_list_order` (
  `id_list_order` int(11) NOT NULL,
  `produk` int(11) NOT NULL,
  `kode_order` bigint(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `catatan` varchar(500) NOT NULL,
  `status` varchar(11) NOT NULL,
  `panjang` double NOT NULL,
  `lebar` double NOT NULL,
  `dimensi` double NOT NULL,
  `design` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_list_order`
--

INSERT INTO `tb_list_order` (`id_list_order`, `produk`, `kode_order`, `jumlah`, `catatan`, `status`, `panjang`, `lebar`, `dimensi`, `design`) VALUES
(94, 11, 2308231512572, 1, '1', '2', 0, 0, 1, ''),
(95, 14, 2308231512572, 1, '1', '2', 0, 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` bigint(20) NOT NULL,
  `pelanggan` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `customer` int(11) NOT NULL,
  `waktu_pemesanan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `pelanggan`, `address`, `customer`, `waktu_pemesanan`, `hp`) VALUES
(2308231512572, 'a', 'a', 2, '2023-08-23 09:42:25', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` int(1) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `alamat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
(1, 'pimpinanrj', 'pimpinanrj@gmail.com', '89ccfac87d8d06db06bf3211cb2d69ed', 1, '123456789011', 'pim'),
(2, 'adminrj', 'adminrj@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '123456789011', 'adm'),
(3, 'customerrj', 'customerrj@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '123456789011', 'cus'),
(24, 'produksirj', 'produksirj@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 4, '0888', 'solo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tb_daftar_produk`
--
ALTER TABLE `tb_daftar_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `tb_kategori_produk`
--
ALTER TABLE `tb_kategori_produk`
  ADD PRIMARY KEY (`id_kat_produk`);

--
-- Indexes for table `tb_list_order`
--
ALTER TABLE `tb_list_order`
  ADD PRIMARY KEY (`id_list_order`),
  ADD KEY `produk` (`produk`,`kode_order`),
  ADD KEY `order` (`kode_order`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `customer` (`customer`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_daftar_produk`
--
ALTER TABLE `tb_daftar_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_kategori_produk`
--
ALTER TABLE `tb_kategori_produk`
  MODIFY `id_kat_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_list_order`
--
ALTER TABLE `tb_list_order`
  MODIFY `id_list_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_daftar_produk`
--
ALTER TABLE `tb_daftar_produk`
  ADD CONSTRAINT `tb_daftar_produk_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori_produk` (`id_kat_produk`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_list_order`
--
ALTER TABLE `tb_list_order`
  ADD CONSTRAINT `tb_list_order_ibfk_2` FOREIGN KEY (`produk`) REFERENCES `tb_daftar_produk` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_list_order_ibfk_3` FOREIGN KEY (`kode_order`) REFERENCES `tb_order` (`id_order`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `tb_user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
