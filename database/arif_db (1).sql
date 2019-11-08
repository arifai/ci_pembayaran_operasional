-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 03:58 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arif_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_santri`
--

CREATE TABLE `data_santri` (
  `id` int(5) NOT NULL,
  `no_absen` int(5) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `parents_name` varchar(128) NOT NULL,
  `phone_num` bigint(13) NOT NULL,
  `address` varchar(128) NOT NULL,
  `class` varchar(128) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_santri`
--

INSERT INTO `data_santri` (`id`, `no_absen`, `full_name`, `parents_name`, `phone_num`, `address`, `class`, `ts`) VALUES
(2, 2, 'Sudirham', 'Wak Doyok', 876665233, 'Jl. Jimbrana, Bali', 'VIII', '2019-11-07 16:12:53'),
(3, 3, 'Harun Sungkar', 'Adi Nugroho', 897736221277, 'Jl. Melati KM. 09', 'VI', '2019-11-01 06:44:26'),
(10, 1, 'Ahmad Akbar', 'Paijo', 833456720, 'Gondang', 'VII', '2019-11-07 16:20:22'),
(11, 4, 'Sukron Fadilah', 'Suyono', 87644329, 'Grabag', 'XVI', '2019-11-07 10:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id` int(5) NOT NULL,
  `pos` varchar(128) NOT NULL,
  `payment_name` varchar(128) NOT NULL,
  `type` varchar(128) NOT NULL,
  `pay_rate` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id`, `pos`, `payment_name`, `type`, `pay_rate`, `date`) VALUES
(1, 'Gedung', 'Pembayaran Gedung', 'Bulanan', 100000, '2019-10-01'),
(2, 'Daftar Ulang', 'Pendaftaran Ulang', 'Bebas', 100000, '2019-10-22'),
(3, 'Pendaftaran', 'Pendaftaran', 'Bebas', 1000000, '2020-06-26'),
(4, 'SPP', 'SPP', 'Bebas', 250000, '2019-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(5) NOT NULL,
  `no_absen` int(5) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `class` varchar(128) NOT NULL,
  `payment_name_id` int(5) NOT NULL,
  `pay_rate` double NOT NULL,
  `payment_status_id` int(5) NOT NULL,
  `ts` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `no_absen`, `full_name`, `class`, `payment_name_id`, `pay_rate`, `payment_status_id`, `ts`) VALUES
(4, 1, 'Ahmad Akbar', 'VII', 1, 100000, 1, '2019-11-07'),
(5, 1, 'Ahmad Akbar', 'VII', 4, 250000, 1, '2019-11-07'),
(6, 3, 'Harun Sungkar', 'VI', 4, 250000, 2, '2019-11-07'),
(7, 4, 'Sukron Fadilah', 'XVI', 2, 100000, 3, '2019-11-07'),
(8, 3, 'Harun Sungkar', 'VI', 4, 250000, 2, '2019-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `id` int(5) NOT NULL,
  `payment_status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`id`, `payment_status`) VALUES
(1, 'Pending'),
(2, 'Terbayar'),
(3, 'Gagal'),
(4, 'Belum ada');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `image`, `ts`) VALUES
(1, 'Admin', 'admin@mail.net', '$2y$10$7dZv05VNU6o0JLM5lj/.yegJGhq3wjKBgaa8muFJZKGQyKbLLdIBi', 'default.jpg', '2019-10-21 23:48:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_santri`
--
ALTER TABLE `data_santri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_santri`
--
ALTER TABLE `data_santri`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
