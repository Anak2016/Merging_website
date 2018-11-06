-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2018 at 07:38 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `shipping_types`
--

CREATE TABLE `shipping_types` (
  `type_id` int(10) NOT NULL,
  `type_name` text NOT NULL,
  `type_default` text NOT NULL,
  `type_local` text NOT NULL,
  `type_order` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_types`
--

INSERT INTO `shipping_types` (`type_id`, `type_name`, `type_default`, `type_local`, `type_order`) VALUES
(1, 'Next Day (Order placed before 5 pm) ', 'yes', 'yes', 1),
(3, 'Standard 3-5 Days', 'no', 'yes', 2),
(4, 'Economy 5-7 Days', 'no', 'yes', 3),
(5, 'Express International', 'yes', 'no', 1),
(6, 'Standard International', 'no', 'no', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shipping_types`
--
ALTER TABLE `shipping_types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shipping_types`
--
ALTER TABLE `shipping_types`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
