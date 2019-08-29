-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 29, 2019 at 11:35 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_motor`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_motor` varchar(255) NOT NULL,
  `merk_motor` varchar(255) NOT NULL,
  `harga_motor` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_motor`, `merk_motor`, `harga_motor`) VALUES
(13, 'Vario', 'Honda', 8000000),
(15, 'Supra Z', 'Honda', 18000000),
(21, 'Mio', 'Yamaha', 17000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbAuth`
--

CREATE TABLE `tbAuth` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbAuth`
--

INSERT INTO `tbAuth` (`id`, `nama`, `email`, `password`) VALUES
(5, 'dwi', 'dwi@aa.ll', '$2y$10$GpORTP6YmEJdDG0GnbI8IOTSUPTqyyCQai5Lhp5S947HDdI/lxeK.'),
(21, 'abim', 'abim@qodr.com', '$2y$10$kfUo7cTozvx1weIp7Yy5p.S6iLCQtxV67ItSYeraB.qE.sQLhpUz6'),
(23, 'ugik', 'ugik@gmail.com', '$2y$10$/mX.hUCTvoBys4VpIZXlfuYy3NXZJAm6oguWpR8VI9wAuoY4LMroG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_motor` (`nama_motor`);

--
-- Indexes for table `tbAuth`
--
ALTER TABLE `tbAuth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbAuth`
--
ALTER TABLE `tbAuth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
