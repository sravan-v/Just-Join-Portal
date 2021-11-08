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
-- Table structure for table `car_seller`
--

CREATE TABLE `car_seller` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `aadhar` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `kilometers` varchar(255) NOT NULL,
  `purchase_year` varchar(255) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `max_price` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `issues` varchar(255) NOT NULL,
  `submit_date` varchar(255) NOT NULL,
  `employee_status` varchar(255) NOT NULL DEFAULT 'Progress',
  `reached` varchar(255) NOT NULL DEFAULT 'Not Reached',
  `paid` varchar(255) NOT NULL DEFAULT 'Unpaid',
  `employee_comment` varchar(255) DEFAULT NULL,
  `read_record` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_seller`
--

INSERT INTO `car_seller` (`id`, `fname`, `lname`, `phone_number`, `aadhar`, `address`, `model`, `fuel_type`, `kilometers`, `purchase_year`, `vehicle_number`, `max_price`, `image_name`, `issues`, `submit_date`, `employee_status`, `reached`, `paid`, `employee_comment`, `read_record`) VALUES
(3, 'AA', 'AA', '1231231231', '23234', 'AAAA', 'AA', 'petrol', '3,232', '2323', 'AAAAA', '23,423', '150872327', 'no', '22-10-2021', 'Progress', 'Not Reached', 'Unpaid', NULL, 0),
(4, 'car Seller1', '', '3456565678', '890845672345', 'Ravipadu', 'Maruthi', 'petrol', '40,000', '2018', 'AP16k 4567', '300,000', '73328082', 'null', '26-10-2021', 'Progress', 'Not Reached', 'Unpaid', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_seller`
--
ALTER TABLE `car_seller`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_seller`
--
ALTER TABLE `car_seller`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
