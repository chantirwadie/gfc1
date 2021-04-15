-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 11:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion1`
--

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `id` int(100) NOT NULL,
  `classe` varchar(100) NOT NULL,
  `filiere` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`id`, `classe`, `filiere`) VALUES
(14, '2020', '2ite'),
(38, '2021', '2ite'),
(40, '2021', 'ge2'),
(41, '2021', '2ite'),
(43, '2022', '2ite'),
(44, '2021', 'isic'),
(45, '2022', '2ite'),
(46, '2023', '2ite'),
(47, '2021', 'gi');

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `id` int(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`id`, `code`, `libelle`) VALUES
(54, '1135', 'isic'),
(56, '1135', '2ite'),
(58, '4779', 'ge2'),
(64, '220', 'gi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
