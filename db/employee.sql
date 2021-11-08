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
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(100) NOT NULL,
  `job_name` varchar(256) NOT NULL DEFAULT 'null',
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `father_name` varchar(256) NOT NULL DEFAULT 'null',
  `dob` varchar(255) NOT NULL,
  `gender` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone_number` bigint(100) NOT NULL,
  `aadhar` varchar(256) NOT NULL DEFAULT 'xxxx-xxxx-xxxx',
  `organization` varchar(256) DEFAULT 'null',
  `job_type` varchar(256) NOT NULL DEFAULT 'null',
  `job_exp` varchar(256) DEFAULT '0',
  `present_or_previous_company` varchar(256) NOT NULL DEFAULT '0',
  `present_salary` varchar(255) NOT NULL DEFAULT '0',
  `expected_salary` varchar(255) DEFAULT '0',
  `date_of_registered` varchar(256) NOT NULL,
  `employee_status` varchar(256) NOT NULL DEFAULT 'Progress',
  `reached` varchar(256) NOT NULL DEFAULT 'Not Reached',
  `paid` varchar(256) NOT NULL DEFAULT 'Unpaid',
  `employee_comment` varchar(256) DEFAULT NULL,
  `read_record` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `job_name`, `first_name`, `last_name`, `father_name`, `dob`, `gender`, `address`, `phone_number`, `aadhar`, `organization`, `job_type`, `job_exp`, `present_or_previous_company`, `present_salary`, `expected_salary`, `date_of_registered`, `employee_status`, `reached`, `paid`, `employee_comment`, `read_record`) VALUES
(50, 'B', 'B', 'B', 'B', '1990-12-31', 'Male', 'B', 2323234234, '3423423423', 'College', 'Lecturers', '2Yrs', 'BBB', '33,333', '66,666', '07-11-2021', 'Complete', 'Reached', 'Paid', 'done', 1),
(51, 'English Teacher', 'sample1', 'Sample ', 'Sample', '1982-06-09', 'Male', 'NRT', 8989898989, '', 'College', 'Lecturers', '5', 'Chaithanya', '22,000', '25,000', '26-10-2021', 'Progress', 'Not Reached', 'Unpaid', '', 1),
(52, 'Security', 'Rohan', 'Kumar', 'Rahul', '1991-12-12', 'Male', 'Hyderabad', 9697977978, '000', 'Hospital', 'Watchman', '2yrs', 'Test', '30,000', '50,000', '07-11-2021', 'Progress', 'Not Reached', 'Unpaid', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
