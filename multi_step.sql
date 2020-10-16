-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2020 at 09:42 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports-kanvan`
--

-- --------------------------------------------------------

--
-- Table structure for table `multi_step`
--

CREATE TABLE `multi_step` (
  `id` int(4) NOT NULL,
  `name` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `phone number` bigint(12) NOT NULL,
  `dob` date NOT NULL,
  `age` smallint(5) NOT NULL,
  `height` int(2) NOT NULL,
  `weight` int(3) NOT NULL,
  `Address` varchar(10) NOT NULL,
  `Email Id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multi_step`
--

INSERT INTO `multi_step` (`id`, `name`, `date`, `phone number`, `dob`, `age`, `height`, `weight`, `Address`, `Email Id`) VALUES
(1, '', '0000-00-00', 0, '0000-00-00', 0, 0, 0, '', ''),
(2, '', '0000-00-00', 0, '0000-00-00', 0, 0, 0, '', ''),
(3, '', '0000-00-00', 0, '2020-10-13', 34, 56, 0, '', ''),
(4, '', '0000-00-00', 0, '0000-00-00', 0, 0, 0, '', ''),
(5, '', '0000-00-00', 0, '2020-10-13', 34, 56, 0, '', ''),
(6, '', '0000-00-00', 0, '2020-10-13', 34, 56, 0, '', ''),
(7, '', '0000-00-00', 0, '2020-10-13', 455, 89, 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `multi_step`
--
ALTER TABLE `multi_step`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `multi_step`
--
ALTER TABLE `multi_step`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
