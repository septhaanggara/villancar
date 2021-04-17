-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2019 at 02:56 PM
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
-- Database: `villancar`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(128) NOT NULL,
  `no` int(15) NOT NULL,
  `role_id` int(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `no`, `role_id`, `is_active`, `date_created`) VALUES
(5, '123@123.com', '$2y$10$RVtVq4LQZ7fnbnVg7Ssv2ezjdi9z9NvyY.k.VTIlxVWc/k1H30t6e', 'sam2', 0, 2, 1, 1572815657),
(6, 'admin@gmail.com', '$2y$10$dUYbSKrs1iSxNGtLPu3W8.xB3f.jV.bynItLVU69m5aQ0fovVbKnK', 'admin', 0, 1, 1, 1572815734),
(7, 'test@test.t', '$2y$10$bfLMPpl0qGOfqbIBdNj6neVNbjH.Wp46YUf.bG8eIMLywoIsNhxnm', 'test', 123, 2, 1, 1572815938);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(128) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `villa`
--

CREATE TABLE `villa` (
  `villa_id` int(64) NOT NULL,
  `nama_villa` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `harga` int(255) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'default.jpg',
  `no` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `villa`
--

INSERT INTO `villa` (`villa_id`, `nama_villa`, `alamat`, `deskripsi`, `harga`, `image`, `no`) VALUES
(7, 'ini ganti', '12', '12', 12, '.jpg', ''),
(11, 'paling bnr', 'jl test', '123', 2, '.jpg', ''),
(14, '1222222', '2', '2222', 2, '.png', ''),
(17, 'no nih', 'Bandung', '123', 1231, '5dc4da87dea3f.jpg', '5dc4da87dea3f'),
(18, 'yuuu', '123hugyg', 'bugyhyhyh', 0, 'default.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `villa`
--
ALTER TABLE `villa`
  ADD PRIMARY KEY (`villa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(128) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `villa`
--
ALTER TABLE `villa`
  MODIFY `villa_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
