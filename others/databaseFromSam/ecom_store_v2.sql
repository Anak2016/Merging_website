-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2018 at 04:51 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.21

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `p_size`) VALUES
(18, '127.0.0.1', 3, 'X-Large');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Men', 'Test Category for MEN'),
(2, 'Women', 'Test Category for WOMEN'),
(3, 'Kids', 'Test Category for Kids'),
(4, 'Others', 'Test Category for Others');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_firstname` varchar(255) NOT NULL,
  `customer_lastname` varchar(255) NOT NULL,
  `customer_username` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_state` varchar(100) NOT NULL,
  `customer_country` varchar(100) NOT NULL,
  `customer_zipcode` varchar(100) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_firstname`, `customer_lastname`, `customer_username`, `customer_email`, `customer_pass`, `customer_address`, `customer_city`, `customer_state`, `customer_country`, `customer_zipcode`, `customer_phone`, `customer_image`, `customer_ip`, `join_date`) VALUES
(2, 'Panupong', 'Wongsupa', 'solexskub', 'panupong.wong@gmail.com', '$2y$10$ORIX8YXbFCJRRzNUbq8qj.CglI3zheHmMvaNqF55t1mncY2LTGeXC', '21906 LAKE FOREST CIR, APT 204', 'Boca Raton', 'FL', 'US', '33433', '5612735088', '', '127.0.0.1', '2018-10-16 06:29:32'),
(7, 'VINAITHON', 'INTAVICHIAN', 'solexskub90', 'asfgdgdfgdfgdf@gmail.com', '$2y$10$eCYke7IJP2MtpWFV4F8G/.bxfNNuBhvf/7SbLIpcT/CoDqxZ4PXIy', '18/14 SUKHUMVIT 68 SIKHUMVIT RD.,', 'BANGNA', 'BANGKOK', 'TH', '10260', '909789962', 'Koala.jpg', '127.0.0.1', '2018-10-14 00:34:50'),
(9, 'Panupong', 'Wongsupa', 'solexskub90@gmail.com', 'panupong.wong@gmail.co', '$2y$10$JmyL8dF93qEARelsvZEPl.8sGkV6p41Q3.NDzKjDMbYzj80lYDwT6', '21906 LAKE FOREST CIR, APT 204', 'Boca Raton', 'FL', 'à¸ªà¸«à¸£à¸±à¸à¸­à¹€à¸¡à¸£à¸´à¸à¸²', '33433', '5612735088', '125461.jpg', '127.0.0.1', '2018-10-16 06:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

DROP TABLE IF EXISTS `customer_orders`;
CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 2, 90, 254961276, 3, 'Large', '2018-10-16 05:31:03', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `item_rating`
--

DROP TABLE IF EXISTS `item_rating`;
CREATE TABLE `item_rating` (
  `ratingId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ratingNumber` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime NOT NULL,
  `modified_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Block, 0 =Unblock',
  `user_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

DROP TABLE IF EXISTS `pending_orders`;
CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(1, 2, 254961276, '18', 3, 'Large', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` float NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`) VALUES
(1, 2, 1, '2018-10-12 20:35:41', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(2, 3, 1, '2018-10-12 20:24:59', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(3, 2, 2, '2018-10-12 16:49:39', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(4, 4, 2, '2018-10-12 20:24:49', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(5, 2, 3, '2018-10-12 20:36:00', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(6, 5, 2, '2018-10-12 20:24:54', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(7, 2, 2, '2018-10-12 16:49:39', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(8, 4, 2, '2018-10-12 20:40:57', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(9, 2, 2, '2018-10-12 16:49:39', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(10, 2, 3, '2018-10-13 15:58:28', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(11, 2, 2, '2018-10-12 16:49:39', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(12, 2, 2, '2018-10-12 16:49:39', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(13, 2, 2, '2018-10-12 16:49:39', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(14, 2, 2, '2018-10-12 16:49:39', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(15, 2, 2, '2018-10-12 16:49:39', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(16, 2, 2, '2018-10-12 16:49:39', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(17, 2, 2, '2018-10-12 16:49:39', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk'),
(18, 2, 2, '2018-10-12 16:49:39', 'test upload 1 product', '1212.jpg', '54545.jpg', '22323.jpg', 30, '<p>rtretert<strong>ertret</strong></p>', 'tes,no,opk');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Accessories', 'This is the test description for Accessories Category'),
(2, 'Shoes', 'Test description for Shoes'),
(3, 'Clothes', 'Test description for Clothes'),
(4, 'Coats', 'Test for Coat'),
(5, 'Pants', 'Test for Pants');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'slide number 1', 'slideimage1.jpg'),
(2, 'slide number 2', 'slideimage2.jpg'),
(3, 'slide number 3', 'slideimage3.jpg'),
(4, 'slide number 4', 'slideimage4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `item_rating`
--
ALTER TABLE `item_rating`
  ADD PRIMARY KEY (`ratingId`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_rating`
--
ALTER TABLE `item_rating`
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
