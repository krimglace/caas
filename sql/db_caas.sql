-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 06:05 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_caas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_template`
--

CREATE TABLE `admin_template` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cardname_templates`
--

CREATE TABLE `cardname_templates` (
  `no_card` int(11) NOT NULL,
  `jenis_kartu` varchar(100) NOT NULL,
  `admin_kartu` varchar(100) NOT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cv_templates`
--

CREATE TABLE `cv_templates` (
  `no_cv` int(11) NOT NULL,
  `jenis_cv` varchar(100) NOT NULL,
  `admin_cv` varchar(100) NOT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `no_pemesanan` int(11) NOT NULL,
  `jenis_pesanan` varchar(100) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_templates`
--

CREATE TABLE `portfolio_templates` (
  `no_portfolio` int(11) NOT NULL,
  `jenis_portofolio` varchar(100) NOT NULL,
  `admin_portofolio` varchar(100) NOT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `nama`, `jenis_kelamin`, `no_telepon`, `alamat`, `gambar`, `id_admin`) VALUES
(1, 'shiota03', 'mhdrafli.mr@gmail.com', 'manambin', '', '', '', '', 'images/logoUPI.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_template`
--
ALTER TABLE `admin_template`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `cardname_templates`
--
ALTER TABLE `cardname_templates`
  ADD PRIMARY KEY (`no_card`),
  ADD UNIQUE KEY `id_admin` (`id_admin`);

--
-- Indexes for table `cv_templates`
--
ALTER TABLE `cv_templates`
  ADD PRIMARY KEY (`no_cv`),
  ADD UNIQUE KEY `id_admin` (`id_admin`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`no_pemesanan`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `portfolio_templates`
--
ALTER TABLE `portfolio_templates`
  ADD PRIMARY KEY (`no_portfolio`),
  ADD UNIQUE KEY `id_admin` (`id_admin`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_template`
--
ALTER TABLE `admin_template`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cardname_templates`
--
ALTER TABLE `cardname_templates`
  MODIFY `no_card` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cv_templates`
--
ALTER TABLE `cv_templates`
  MODIFY `no_cv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `no_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio_templates`
--
ALTER TABLE `portfolio_templates`
  MODIFY `no_portfolio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cardname_templates`
--
ALTER TABLE `cardname_templates`
  ADD CONSTRAINT `cardname_templates_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin_template` (`id_admin`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `cv_templates`
--
ALTER TABLE `cv_templates`
  ADD CONSTRAINT `cv_templates_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin_template` (`id_admin`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `portfolio_templates`
--
ALTER TABLE `portfolio_templates`
  ADD CONSTRAINT `portfolio_templates_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin_template` (`id_admin`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin_template` (`id_admin`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
