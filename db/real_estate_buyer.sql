-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2021 at 10:09 AM
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
-- Table structure for table `real_estate_buyer`
--

CREATE TABLE `real_estate_buyer` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `aadhar` varchar(255) NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `property_type_others` varchar(255) NOT NULL DEFAULT '-',
  `property_value` varchar(255) NOT NULL,
  `phone_number` bigint(255) NOT NULL,
  `buyer_address` varchar(255) NOT NULL,
  `submit_date` varchar(255) NOT NULL,
  `employee_status` varchar(255) NOT NULL DEFAULT 'Progress',
  `reached` varchar(255) NOT NULL DEFAULT '	Not Reached',
  `paid` varchar(255) NOT NULL DEFAULT 'Unpaid',
  `employee_comment` varchar(255) DEFAULT NULL,
  `read_record` int(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `real_estate_buyer`
--

INSERT INTO `real_estate_buyer` (`id`, `fname`, `sname`, `aadhar`, `property_type`, `property_type_others`, `property_value`, `phone_number`, `buyer_address`, `submit_date`, `employee_status`, `reached`, `paid`, `employee_comment`, `read_record`) VALUES
(9, 'C', 'C', '8776876986', 'house', '', '33,333', 2342342342, 'CC', '14-10-2021', 'Progress', '	Not Reached', 'Unpaid', NULL, 0),
(10, 'D', 'D', '765875', 'land', '', '334,343', 2342342342, '', '', 'Complete', 'Reached', 'Paid', 'done', 1),
(11, 'Buyer1', '', '', 'land', '', '5,000,000', 7867676789, 'Narasaraopet', '26-10-2021', 'Progress', '	Not Reached', 'Unpaid', NULL, 1),
(12, 'Bhadra', 'A', '', 'house', '', '4,000,000', 9898987898, 'Narasaraopet', '02-11-2021', 'Progress', '	Not Reached', 'Unpaid', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `real_estate_buyer`
--
ALTER TABLE `real_estate_buyer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `real_estate_buyer`
--
ALTER TABLE `real_estate_buyer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
