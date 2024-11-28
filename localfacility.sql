-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 04:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `localfacility`
--

-- --------------------------------------------------------

--
-- Table structure for table `general_data`
--

CREATE TABLE `general_data` (
  `priority_id` int(11) NOT NULL,
  `reservedby` varchar(255) NOT NULL,
  `facility_id` varchar(255) NOT NULL,
  `timeframe` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='general data';

--
-- Dumping data for table `general_data`
--

INSERT INTO `general_data` (`priority_id`, `reservedby`, `facility_id`, `timeframe`, `event`) VALUES
(0, 'ezez', 'FAC1', '2024-11-09T13:29', 'ez'),
(1, 'mes2313123', 'FAC1', '2024-11-28T11:34', 'Somehting2'),
(2, 'mes2313123', 'FAC1', '2024-11-28T11:34', 'Somehting23'),
(3, 'blck', 'FAC2', '3213-12-23T14:32', '1q3113123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `general_data`
--
ALTER TABLE `general_data`
  ADD PRIMARY KEY (`priority_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
