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
  `aadhar` varchar(255) NOT NULL,
  `address` varchar(256) NOT NULL,
  `emp_category` varchar(256) NOT NULL DEFAULT 'null',
  `emp_job_type` varchar(256) NOT NULL DEFAULT 'null',
  `no_positions` int(100) NOT NULL DEFAULT '0',
  `gender` varchar(256) DEFAULT 'null',
  `experience` varchar(255) NOT NULL DEFAULT '0',
  `salary_min` varchar(255) NOT NULL,
  `salary_max` varchar(255) NOT NULL,
  `date_of_registered` varchar(256) NOT NULL,
  `employer_status` varchar(256) NOT NULL DEFAULT 'Progress',
  `reached` varchar(256) NOT NULL DEFAULT 'Not Reached',
  `paid` varchar(256) NOT NULL DEFAULT 'Unpaid',
  `employee_comment` varchar(256) DEFAULT NULL,
  `read_record` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `name`, `designation`, `organization_type`, `organization_name`, `phone_number`, `email`, `aadhar`, `address`, `emp_category`, `emp_job_type`, `no_positions`, `gender`, `experience`, `salary_min`, `salary_max`, `date_of_registered`, `employer_status`, `reached`, `paid`, `employee_comment`, `read_record`) VALUES
(21, 'A', 'A', 'College', 'A', 2312312312, 'a@gmail.com', '123123321', '1A', 'College', 'Lecturers', 2, 'Female', '2Yrs', '14,999', '16,999', '14-10-2021', 'Progress', 'Not Reached', 'Unpaid', NULL, 1),
(22, 'Test2', 'Chairman', 'College', 'Narayana', 9090909090, 'abc@gmail.com', '', 'Narasaraopet', 'College', 'Sweepers', 4, 'Female', '3', '6,000', '8,000', '26-10-2021', 'Progress', 'Not Reached', 'Unpaid', '', 1),
(23, 'K Hanumantha Rao', 'Chairman', 'School', 'Oakland School', 9000523213, 'abc@gmail.com', '', 'narasaraopet', 'School', 'Sweepers', 3, 'Male', '3', '5,000', '6,000', '28-10-2021', 'Progress', 'Not Reached', 'Unpaid', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
