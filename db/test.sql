-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2021 at 05:45 PM
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
-- Table structure for table `car_buyer`
--

CREATE TABLE `car_buyer` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone_number` bigint(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `kilometers` bigint(255) NOT NULL,
  `purchase_year` date NOT NULL,
  `submit_date` date NOT NULL,
  `min_price` bigint(255) NOT NULL,
  `max_price` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_buyer`
--

INSERT INTO `car_buyer` (`id`, `fname`, `lname`, `phone_number`, `model`, `fuel_type`, `kilometers`, `purchase_year`, `submit_date`, `min_price`, `max_price`) VALUES
(1, 'Nagesh', 'Kumar', 9099889898, 'Audi', 'petrol', 8989, '2021-08-09', '2021-06-08', 234234, 234234),
(2, 'sdf', 'sdf', 3453453453, '', '', 0, '0000-00-00', '2021-08-01', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `car_seller`
--

CREATE TABLE `car_seller` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone_number` bigint(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `kilometers` bigint(255) NOT NULL,
  `purchase_year` date NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_details` varchar(255) NOT NULL,
  `min_price` bigint(255) NOT NULL,
  `max_price` bigint(255) NOT NULL,
  `issues` varchar(255) NOT NULL,
  `submit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_seller`
--

INSERT INTO `car_seller` (`id`, `fname`, `lname`, `phone_number`, `model`, `fuel_type`, `kilometers`, `purchase_year`, `owner_name`, `owner_details`, `min_price`, `max_price`, `issues`, `submit_date`) VALUES
(2, 'CC', 'CC', 4234234234, 'CC', 'diesel', 54555, '2021-07-29', 'CC', 'CC', 544545, 342323423, 'yes', '2021-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `data_managers`
--

CREATE TABLE `data_managers` (
  `id` int(100) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_managers`
--

INSERT INTO `data_managers` (`id`, `username`, `password`, `role`) VALUES
(11, 'nagesh@gmail.com', '$2y$10$BnlwEwLIVyXO8vBWz7eWFOvYj8E4mJCeklC6bYiC0xLdKyTlnXxBW', '1'),
(19, 'sravan@gmail.com', '$2y$10$4ucHFj9CDTPG1RwaN5lZRuebKHPARDN1.R6UMsXwVS3UWITXcq8R.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(100) NOT NULL,
  `job_name` varchar(256) NOT NULL DEFAULT 'null',
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `father_name` varchar(256) NOT NULL DEFAULT 'null',
  `dob` date NOT NULL,
  `gender` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone_number` bigint(100) NOT NULL,
  `aadhar` varchar(256) NOT NULL DEFAULT 'xxxx-xxxx-xxxx',
  `organization` varchar(256) DEFAULT 'null',
  `job_type` varchar(256) NOT NULL DEFAULT 'null',
  `job_exp` varchar(256) DEFAULT '0',
  `present_or_previous_company` varchar(256) NOT NULL DEFAULT '0',
  `present_salary` bigint(100) NOT NULL DEFAULT 0,
  `expected_salary` bigint(100) DEFAULT 0,
  `date_of_registered` varchar(256) NOT NULL,
  `employee_status` varchar(256) NOT NULL DEFAULT 'Active',
  `reached` varchar(256) NOT NULL DEFAULT 'Not Reached',
  `paid` varchar(256) NOT NULL DEFAULT 'Unpaid',
  `employee_comment` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `job_name`, `first_name`, `last_name`, `father_name`, `dob`, `gender`, `address`, `phone_number`, `aadhar`, `organization`, `job_type`, `job_exp`, `present_or_previous_company`, `present_salary`, `expected_salary`, `date_of_registered`, `employee_status`, `reached`, `paid`, `employee_comment`) VALUES
(45, 'Manager', 'Tom', 'Jerry', 'Joseph', '2021-04-03', 'Male', 'Delhi, India', 8989898989, '', 'School', '', 'Choose...', '0', 0, 0, '03-04-2021', 'Active', 'Not Reached', 'Unpaid', 'Out of coverage area. Will reach out again in next 4hrs.'),
(46, 'Teacher 2', 'Lakshmi 2', 'A 2', 'Govindareddy 2', '2021-06-24', 'Male', 'abcd 2', 9898989882, '576787889982', 'School', 'Accountants', '0', 'oakland 2', 140002, 1600002, '25-06-2021', 'Active', 'Reached', 'Paid', '22');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int(100) NOT NULL,
  `name` varchar(256) NOT NULL,
  `designation` varchar(256) NOT NULL DEFAULT 'null',
  `organization_type` varchar(256) NOT NULL DEFAULT 'null',
  `organization_name` varchar(256) NOT NULL DEFAULT 'null',
  `phone_number` bigint(100) NOT NULL,
  `email` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `emp_category` varchar(256) NOT NULL DEFAULT 'null',
  `emp_job_type` varchar(256) NOT NULL DEFAULT 'null',
  `no_positions` int(100) NOT NULL DEFAULT 0,
  `gender` varchar(256) DEFAULT 'null',
  `experience` int(100) NOT NULL DEFAULT 0,
  `salary_min` bigint(100) NOT NULL,
  `salary_max` bigint(100) NOT NULL,
  `date_of_registered` varchar(256) NOT NULL,
  `employer_status` varchar(256) NOT NULL DEFAULT 'Active',
  `reached` varchar(256) NOT NULL DEFAULT 'Not Reached',
  `paid` varchar(256) NOT NULL DEFAULT 'Unpaid',
  `employee_comment` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `name`, `designation`, `organization_type`, `organization_name`, `phone_number`, `email`, `address`, `emp_category`, `emp_job_type`, `no_positions`, `gender`, `experience`, `salary_min`, `salary_max`, `date_of_registered`, `employer_status`, `reached`, `paid`, `employee_comment`) VALUES
(19, 'John', 'Manager', 'Malls', 'Big Bazar', 9898989899, 'john@gmail.com', 'Gujarath, India', 'Malls', 'Assistant Managers', 0, 'null', 0, 0, 0, '03-04-2021', 'In Active', 'Reached', 'Unpaid', 'He will come to the office next week.');

-- --------------------------------------------------------

--
-- Table structure for table `real_estate_buyer`
--

CREATE TABLE `real_estate_buyer` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `property_type_others` varchar(255) NOT NULL DEFAULT '-',
  `property_value` varchar(255) NOT NULL,
  `phone_number` bigint(255) NOT NULL,
  `buyer_address` varchar(255) NOT NULL,
  `submit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `real_estate_buyer`
--

INSERT INTO `real_estate_buyer` (`id`, `fname`, `sname`, `property_type`, `property_type_others`, `property_value`, `phone_number`, `buyer_address`, `submit_date`) VALUES
(1, 'John', 'Triper', 'land', '', '2000000', 8989898989, 'Hyderabad', '2021-08-01'),
(2, 'Test', 'Test', 'others', 'Testing Others', '7000000', 9999999999, 'Andhra Pradesh', '2021-08-01'),
(3, 'Miner', 'Mold', 'agriculture', '', '676777', 7787878787, 'India', '2021-08-01'),
(4, 'Final', 'Final', 'house', '', '343434', 4234234234, 'Teesttt', '2021-07-31'),
(5, '', '', '', '', '', 0, '', '2021-08-13'),
(6, '', '', '', '', '', 0, '', '2021-08-14');

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
  `property_address` text NOT NULL,
  `submit_date` date NOT NULL,
  `documents_clear` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `real_estate_seller`
--

INSERT INTO `real_estate_seller` (`id`, `fname`, `lname`, `phone_number`, `property_type`, `property_type_others`, `property_length`, `property_unit`, `property_unit_others`, `property_value`, `property_address`, `submit_date`, `documents_clear`) VALUES
(3, 'asd', 'aweqwe', '2342342342', 'others_type', 'ewdwer', 343, 'others_unit', 'sdfsdf', 432423, 'qweqwe', '2021-07-31', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_buyer`
--
ALTER TABLE `car_buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_seller`
--
ALTER TABLE `car_seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_managers`
--
ALTER TABLE `data_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `real_estate_buyer`
--
ALTER TABLE `real_estate_buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `real_estate_seller`
--
ALTER TABLE `real_estate_seller`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_buyer`
--
ALTER TABLE `car_buyer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_seller`
--
ALTER TABLE `car_seller`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_managers`
--
ALTER TABLE `data_managers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `real_estate_buyer`
--
ALTER TABLE `real_estate_buyer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `real_estate_seller`
--
ALTER TABLE `real_estate_seller`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
