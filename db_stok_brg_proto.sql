-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 06:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stok_brg_proto`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `info` text NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `id_kategori`, `gambar`, `info`, `stok`) VALUES
(19, 'dika', 11, 'IMG_20230131_194333_411.jpg', 'asdasdasas', 30),
(23, 'sapu', 11, 'Screenshot (5).png', 'asavvvvvvvvxxx', 6),
(24, 'das', 11, 'Screenshot (4).png', 'addasda', 44),
(25, 'idil', 11, '', 'asdasdda', 24);

-- --------------------------------------------------------

--
-- Table structure for table `brg_klr`
--

CREATE TABLE `brg_klr` (
  `id_klr` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `stok_klr` int(11) NOT NULL,
  `penguna` varchar(50) NOT NULL,
  `id_brg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brg_klr`
--

INSERT INTO `brg_klr` (`id_klr`, `tanggal`, `stok_klr`, `penguna`, `id_brg`) VALUES
(1, '2023-03-26', 21, 'admin', 19),
(2, '2023-03-26', 3, 'admin', 19);

-- --------------------------------------------------------

--
-- Table structure for table `brg_msk`
--

CREATE TABLE `brg_msk` (
  `id_msk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `stok_msk` int(11) NOT NULL,
  `penguna` varchar(50) NOT NULL,
  `id_brg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brg_msk`
--

INSERT INTO `brg_msk` (`id_msk`, `tanggal`, `stok_msk`, `penguna`, `id_brg`) VALUES
(7, '2023-03-26', 32, 'admin', 19),
(8, '2023-03-26', 21, 'admin', 23),
(9, '2023-03-26', 3, 'admin', 24),
(10, '2023-03-02', 43, 'admin', 24),
(11, '2023-03-01', 3, 'admin', 23),
(12, '2023-03-26', 2, 'admin', 23);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(11, 'makanan');

-- --------------------------------------------------------

--
-- Table structure for table `penguna`
--

CREATE TABLE `penguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penguna`
--

INSERT INTO `penguna` (`id`, `nama`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `brg_klr`
--
ALTER TABLE `brg_klr`
  ADD PRIMARY KEY (`id_klr`),
  ADD KEY `id_brg` (`id_brg`);

--
-- Indexes for table `brg_msk`
--
ALTER TABLE `brg_msk`
  ADD PRIMARY KEY (`id_msk`),
  ADD KEY `id_brg` (`id_brg`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `penguna`
--
ALTER TABLE `penguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `brg_klr`
--
ALTER TABLE `brg_klr`
  MODIFY `id_klr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brg_msk`
--
ALTER TABLE `brg_msk`
  MODIFY `id_msk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penguna`
--
ALTER TABLE `penguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `brg_klr`
--
ALTER TABLE `brg_klr`
  ADD CONSTRAINT `brg_klr_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `barang` (`id`);

--
-- Constraints for table `brg_msk`
--
ALTER TABLE `brg_msk`
  ADD CONSTRAINT `brg_msk_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
