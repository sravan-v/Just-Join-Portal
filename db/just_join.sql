-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 01:39 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `real_estate_seller`
--

CREATE TABLE `real_estate_seller` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `property_type_others` varchar(255) NOT NULL,
  `property_length` bigint(255) NOT NULL,
  `property_unit` varchar(255) NOT NULL,
  `property_unit_others` varchar(255) NOT NULL,
  `property_value` bigint(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `property_address` text NOT NULL,
  `submit_date` date NOT NULL,
  `documents_clear` varchar(255) NOT NULL,
  `employee_status` varchar(255) NOT NULL DEFAULT 'Progress',
  `reached` varchar(255) NOT NULL DEFAULT 'Not Reached',
  `paid` varchar(255) NOT NULL DEFAULT 'Unpaid',
  `employee_comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `real_estate_seller`
--
ALTER TABLE `real_estate_seller`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `real_estate_seller`
--
ALTER TABLE `real_estate_seller`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
