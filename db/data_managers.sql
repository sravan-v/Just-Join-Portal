-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2021 at 07:25 AM
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
(15, 'madhuri@gmail.com', '$2y$10$Mzu03MHg2jireK5LiUu7fOUlVRkfIQtmM5Ev5JqR/RT5L6tXnwvGm', '0'),
(16, 'kalpana@gmail.com', '$2y$10$rqI4uPC9B4qDJR/ukz2T7eD9StEJs.iaJxN9/X8SgW1zi4LAMYeKy', '0'),
(17, 'sravan@gmail.com', '$2y$10$0r6IzKLQSD9oXGmBcyU29ezDDAbpunKfLFsJH869p3KmAPxTjTPLa', '1'),
(18, 'ramana@gmail.com', '$2y$10$UPweVMNJWQ9/MJBmCjI5Eushx1flu/cBY/e/HPWGxON.FUbTFx1hK', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_managers`
--
ALTER TABLE `data_managers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_managers`
--
ALTER TABLE `data_managers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
