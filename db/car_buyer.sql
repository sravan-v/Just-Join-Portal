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
-- Table structure for table `car_buyer`
--

CREATE TABLE `car_buyer` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `aadhar` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `kilometers` varchar(255) NOT NULL,
  `purchase_year` varchar(255) NOT NULL,
  `submit_date` varchar(255) NOT NULL,
  `min_price` varchar(255) NOT NULL,
  `max_price` varchar(255) NOT NULL,
  `employee_status` varchar(255) NOT NULL DEFAULT 'Progress',
  `reached` varchar(255) NOT NULL DEFAULT 'Not Reached',
  `paid` varchar(255) NOT NULL DEFAULT 'Unpaid',
  `employee_comment` varchar(255) DEFAULT NULL,
  `read_record` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_buyer`
--

INSERT INTO `car_buyer` (`id`, `fname`, `lname`, `phone_number`, `aadhar`, `model`, `fuel_type`, `kilometers`, `purchase_year`, `submit_date`, `min_price`, `max_price`, `employee_status`, `reached`, `paid`, `employee_comment`, `read_record`) VALUES
(57, 'FF', 'FF', '2342342342', '64835435', 'F', 'electric', '423423', '1 Year Old', '', '3,423,423', '234,234,234', 'Progress', 'Not Reached', 'Unpaid', NULL, 0),
(58, 'Test', 'Test', '8989898989', '', 'DUKE', 'petrol', '34,245', '3 Years Old', '', '4,545,454', '787,878', 'Progress', 'Not Reached', 'Unpaid', NULL, 0),
(59, 'Car Buyer1', 'CarBuyer', '9898989898', '', 'Mahindra', 'diesel', '30,000', '2 Years Old', '', '300,000', '350,000', 'Progress', 'Not Reached', 'Unpaid', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_buyer`
--
ALTER TABLE `car_buyer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_buyer`
--
ALTER TABLE `car_buyer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
