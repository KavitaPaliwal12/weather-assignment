-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 05:30 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weather`
--

-- --------------------------------------------------------

--
-- Table structure for table `weather-report`
--

CREATE TABLE `weather-report` (
  `id` int(11) NOT NULL,
  `City` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `temp` varchar(100) NOT NULL,
  `feels_like` varchar(100) NOT NULL,
  `temp_min` varchar(100) NOT NULL,
  `temp_max` varchar(100) NOT NULL,
  `pressure` varchar(100) NOT NULL,
  `humidity` varchar(100) NOT NULL,
  `visibility` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weather-report`
--

INSERT INTO `weather-report` (`id`, `City`, `description`, `temp`, `feels_like`, `temp_min`, `temp_max`, `pressure`, `humidity`, `visibility`, `created_at`, `updated_at`) VALUES
(1, 'Delhi', 'mist', '302.21', '308.97', '302.21', '302.21', '1005', '84', '3500', '2022-08-24 09:09:20', '2022-08-24 09:09:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `weather-report`
--
ALTER TABLE `weather-report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `weather-report`
--
ALTER TABLE `weather-report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
