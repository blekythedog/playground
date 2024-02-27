-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 09:03 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playground`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id` int(25) NOT NULL,
  `id_transaksi` double NOT NULL,
  `bayar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id`, `id_transaksi`, `bayar`) VALUES
(1, 0, 20000),
(2, 5, 150000),
(3, 6, 20000),
(4, 7, 25000),
(5, 9, 90000),
(6, 10, 40000),
(7, 13, 40000),
(8, 14, 50000),
(9, 15, 50000),
(10, 16, 78900),
(11, 18, 90000),
(12, 19, 90000),
(13, 20, 56000),
(14, 20, 56000);

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id` int(50) NOT NULL,
  `id_pengunjung` int(25) NOT NULL,
  `id_wahana` int(25) NOT NULL,
  `jam` int(25) NOT NULL,
  `status` int(25) NOT NULL,
  `inputBy` varchar(255) NOT NULL,
  `inputDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id`, `id_pengunjung`, `id_wahana`, `jam`, `status`, `inputBy`, `inputDate`) VALUES
(2, 1, 1, 2, 1, '1', '2024-02-26 10:29:47'),
(8, 1, 1, 1, 1, '1', '2024-02-26 12:26:48'),
(9, 1, 1, 1, 2, '1', '2024-02-26 12:26:48'),
(11, 3, 3, 2, 1, '1', '2024-02-26 20:21:50'),
(14, 1, 2, 2, 2, '1', '2024-02-26 20:26:54'),
(15, 3, 3, 2, 2, '1', '2024-02-26 21:29:36'),
(16, 4, 3, 2, 2, '1', '2024-02-26 21:32:48'),
(17, 0, 3, 1, 1, '1', '2024-02-26 21:36:48'),
(18, 4, 3, 2, 2, '1', '2024-02-26 21:36:53'),
(19, 4, 4, 2, 2, '1', '2024-02-27 01:09:13'),
(20, 4, 2, 2, 2, '1', '2024-02-27 01:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(4) NOT NULL,
  `pengunjung` varchar(50) NOT NULL,
  `nama_ortu` varchar(50) NOT NULL,
  `alamat_ortu` varchar(50) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `id_daftar` int(4) NOT NULL,
  `id_wahana` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `pengunjung`, `nama_ortu`, `alamat_ortu`, `no_hp`, `id_daftar`, `id_wahana`) VALUES
(3, 'isyalam', 'huitam', 'jalan soekarno hatta', 987654, 0, 0),
(4, 'holllllllla', '8----------------------------D', 'ererer', 223456, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_daftar` int(25) NOT NULL,
  `notrans` varchar(50) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'toto', 'f71dbe52628a3f83a77ab494817525c6', 2);

-- --------------------------------------------------------

--
-- Table structure for table `wahana`
--

CREATE TABLE `wahana` (
  `id_wahana` int(11) NOT NULL,
  `namawahana` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wahana`
--

INSERT INTO `wahana` (`id_wahana`, `namawahana`) VALUES
(1, 'Rola kosta'),
(2, 'bacok orang\r\n'),
(3, 'haunted house\r\n'),
(4, 'welcome to mobile legend\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wahana`
--
ALTER TABLE `wahana`
  ADD PRIMARY KEY (`id_wahana`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wahana`
--
ALTER TABLE `wahana`
  MODIFY `id_wahana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
