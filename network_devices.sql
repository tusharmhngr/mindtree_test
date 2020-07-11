-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 02:59 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `network_devices`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_token`
--

CREATE TABLE `api_token` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `router`
--

CREATE TABLE `router` (
  `id` int(11) NOT NULL,
  `sapid` varchar(100) DEFAULT NULL,
  `hostname` varchar(100) DEFAULT NULL,
  `ip_address` varchar(16) DEFAULT NULL,
  `mac_address` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_from` varchar(7) NOT NULL DEFAULT 'web',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `router`
--

INSERT INTO `router` (`id`, `sapid`, `hostname`, `ip_address`, `mac_address`, `is_active`, `created_from`, `created_at`, `modified_at`) VALUES
(1, '20dhjdhdjqqqqqqqqqq', 'HGL_YTEJ_HHESSEqqqqqqqqqqqqqqq', '123.21.34.21', '00:00:00:a1:2b:cc', 1, 'web', '2020-07-10 20:21:25', '2020-07-10 20:21:25'),
(2, '45hqqrrrrrrrrrrrrrrrqqqqqqqq', 'wwwwww_dhdhdshs_wqwwwqwqwqw', '10.231.43.198', '00:00:00:a1:2b:dd', 1, 'web', '2020-07-10 20:21:25', '2020-07-10 20:21:25'),
(6, 'wwwwwwwututututututu', 'eeeeeeeedjdjdjdjdjdjdjdqsqsqsqsqsqsqsqsqq', '10.21.22.32', '1F-35-82-F5-B1-EE', 1, 'console', '2020-07-11 15:52:02', '2020-07-11 15:52:02'),
(7, 'wewgwegewgwegewgwgwrgewwegrwgw', 'DEFSFSFDSFDSFDSFDSFDSFDSFDSFDSFDS', '10.127.81.23', '70-6A-AE-13-43-0B', 1, 'web', '2020-07-11 17:01:46', '2020-07-11 17:01:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_token`
--
ALTER TABLE `api_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `router`
--
ALTER TABLE `router`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_token`
--
ALTER TABLE `api_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `router`
--
ALTER TABLE `router`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
