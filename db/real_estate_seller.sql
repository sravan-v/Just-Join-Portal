-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2021 at 10:10 AM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `just_join`
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
  `aadhar` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `property_type_others` varchar(255) NOT NULL,
  `property_details` varchar(255) NOT NULL,
  `property_value` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `property_address` varchar(255) NOT NULL,
  `submit_date` varchar(255) NOT NULL,
  `documents_clear` varchar(255) NOT NULL,
  `employee_status` varchar(255) NOT NULL DEFAULT 'Progress',
  `reached` varchar(255) NOT NULL DEFAULT 'Not Reached',
  `paid` varchar(255) NOT NULL DEFAULT 'Unpaid',
  `employee_comment` varchar(255) DEFAULT NULL,
  `read_record` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `real_estate_seller`
--

INSERT INTO `real_estate_seller` (`id`, `fname`, `lname`, `phone_number`, `aadhar`, `address`, `property_type`, `property_type_others`, `property_details`, `property_value`, `image_name`, `property_address`, `submit_date`, `documents_clear`, `employee_status`, `reached`, `paid`, `employee_comment`, `read_record`) VALUES
(6, 'CCC', 'CCC', '3423423423', '1231231', 'CCC', 'land', '', 'CCCC', '34,343', '668940067', 'CCCC', '22-10-2021', 'yes', 'Progress', 'Not Reached', 'Unpaid', NULL, 0),
(7, 'Seller1', '', '7878787878', '876512346789', 'Narasaraopet', 'house', '', '5 cent', '50,000,000', '1484369531', 'Kakathiyanagar, Narasaraopet', '26-10-2021', 'yes', 'Progress', 'Not Reached', 'Unpaid', NULL, 0);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
