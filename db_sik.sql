-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2019 at 03:26 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` varchar(6) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `satuan`, `harga`) VALUES
('BR1', 'Kertas', 'lembar', 1000),
('BR2', 'Beton', 'ton', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` varchar(6) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `nama_customer`, `alamat`, `telepon`) VALUES
('C001', 'Yahuya', '<p>Malang</p>\r\n', '081333495201'),
('C002', 'Mardiana', '1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pembelian`
--

CREATE TABLE `tbl_detail_pembelian` (
  `id_transaksi` varchar(12) NOT NULL,
  `id_barang` varchar(6) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_pembelian`
--

INSERT INTO `tbl_detail_pembelian` (`id_transaksi`, `id_barang`, `harga_barang`, `jumlah`) VALUES
('SO0319000001', 'BR1', 1000, 1),
('SO0319000001', 'BR2', 500000, 1),
('SO0319000002', 'BR1', 1000, 2),
('SO0319000003', 'BR2', 500000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_transaksi` varchar(12) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `tgl_produksi` date NOT NULL,
  `tgl_selesai_produksi` date NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `id_customer` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_transaksi`, `tgl_transaksi`, `tgl_produksi`, `tgl_selesai_produksi`, `tgl_pengiriman`, `id_customer`) VALUES
('SO0319000001', '2019-03-05', '0000-00-00', '0000-00-00', '0000-00-00', 'C002'),
('SO0319000002', '2019-03-05', '0000-00-00', '0000-00-00', '0000-00-00', 'C002'),
('SO0319000003', '2019-03-05', '2019-03-06', '2019-03-07', '2019-03-08', 'C001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tbl_detail_pembelian`
--
ALTER TABLE `tbl_detail_pembelian`
  ADD KEY `fk_id_barang_order` (`id_barang`),
  ADD KEY `fk_id_transaksi_order` (`id_transaksi`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_id_customer` (`id_customer`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detail_pembelian`
--
ALTER TABLE `tbl_detail_pembelian`
  ADD CONSTRAINT `fk_id_barang_order` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_transaksi_order` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_pembelian` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD CONSTRAINT `fk_id_customer` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
