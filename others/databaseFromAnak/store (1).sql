-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2018 at 07:36 PM
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
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asdfasdf', 'asdfasdf', '2018-09-19 04:00:00', '2018-09-04 04:00:00', NULL),
(9, 'asdf asdf fdsad', 'asdf-asdf-fdsa', '2018-10-02 02:09:24', '2018-10-03 11:32:35', '2018-10-03 11:32:35'),
(10, 'Clothing', 'clothing', '2018-10-02 02:28:50', '2018-10-03 06:47:23', '2018-10-03 06:47:23'),
(11, 'testing', 'testing', '2018-10-02 04:33:15', '2018-10-03 06:47:22', '2018-10-03 06:47:22'),
(19, 'bug fixed', 'bug-fixed', '2018-10-02 12:24:34', '2018-10-03 09:29:54', '2018-10-03 09:29:54'),
(20, 'okay thanks', 'okay-thanks', '2018-10-02 12:28:14', '2018-10-03 06:47:18', '2018-10-03 06:47:18'),
(21, 'you funny', 'you-funny', '2018-10-02 12:29:55', '2018-10-03 06:46:18', '2018-10-03 06:46:18'),
(22, 'lol', 'lol', '2018-10-02 12:30:16', '2018-10-03 06:45:33', '2018-10-03 06:45:33'),
(23, 'sdf', 'sdf', '2018-10-03 07:16:29', '2018-10-03 09:41:19', '2018-10-03 09:41:19'),
(24, 'producd', 'produc', '2018-10-03 07:17:19', '2018-10-03 09:29:50', '2018-10-03 09:29:50'),
(25, 'aaa', 'aaa', '2018-10-03 07:17:49', '2018-10-03 07:29:40', NULL),
(26, 'fasdf', 'fasdf', '2018-10-03 09:49:12', '2018-10-03 09:49:12', NULL),
(27, 'ternggggg', 'tern', '2018-10-03 09:53:20', '2018-10-05 01:20:24', NULL),
(28, 'add one moredd', 'add-one-more', '2018-10-03 11:32:54', '2018-10-05 01:22:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '5BBFE53F14AC1', '2018-10-12 06:05:19', '2018-10-16 01:48:46', '2018-10-16 01:48:46'),
(4, 1, '5BBFF5A011569', '2018-09-13 07:15:12', '2018-10-12 07:15:12', NULL),
(7, 1, '5BBFF621AEC55', '2018-11-07 08:17:21', '2018-10-16 01:49:20', '2018-10-16 01:49:20'),
(10, 1, '5BBFF659DD238', '2018-12-11 08:18:17', '2018-10-12 07:18:17', NULL),
(13, 1, '5BBFF6E05A206', '2018-12-12 08:20:32', '2018-10-12 07:20:32', NULL),
(15, 1, '5BC00BB791A21', '2019-01-09 09:49:27', '2018-10-12 08:49:27', NULL),
(16, 3, '5BC0D259E1B4B', '2018-10-12 22:56:58', '2018-10-12 22:56:58', NULL),
(17, 3, '5BC1B72CD9EC9', '2018-10-13 15:13:17', '2018-10-13 15:13:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `user_id`, `product_id`, `unit_price`, `quantity`, `total`, `status`, `order_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 500, 1, 500, 'Pending', '5BBFE53F14AC1', '2018-10-12 06:05:19', '2018-10-12 06:05:19', NULL),
(2, 1, 8, 400, 1, 400, 'Pending', '5BBFE53F14AC1', '2018-10-12 06:05:19', '2018-10-12 06:05:19', NULL),
(3, 1, 9, 483, 1, 483, 'Pending', '5BBFE53F14AC1', '2018-09-12 06:05:19', '2018-10-12 06:05:19', NULL),
(4, 1, 8, 400, 3, 1, 'Pending', '5BBFF5A011569', '2018-09-13 07:15:12', '2018-10-12 07:15:12', NULL),
(5, 1, 9, 483, 1, 483, 'Pending', '5BBFF5A011569', '2018-09-20 07:15:12', '2018-10-12 07:15:12', NULL),
(6, 1, 1, 50, 1, 50, 'Pending', '5BBFF5A011569', '2018-11-15 08:15:12', '2018-10-12 07:15:12', NULL),
(7, 1, 8, 400, 3, 1, 'Pending', '5BBFF621AEC55', '2018-11-07 08:17:21', '2018-10-12 07:17:21', NULL),
(8, 1, 9, 483, 1, 483, 'Pending', '5BBFF621AEC55', '2018-11-14 08:17:21', '2018-10-12 07:17:21', NULL),
(9, 1, 1, 50, 1, 50, 'Pending', '5BBFF621AEC55', '2018-11-14 08:17:22', '2018-10-12 07:17:22', NULL),
(10, 1, 8, 400, 3, 1, 'Pending', '5BBFF659DD238', '2018-12-11 08:18:17', '2018-10-12 07:18:17', NULL),
(11, 1, 9, 483, 1, 483, 'Pending', '5BBFF659DD238', '2018-12-04 08:18:18', '2018-10-12 07:18:18', NULL),
(12, 1, 1, 50, 1, 50, 'Pending', '5BBFF659DD238', '2018-12-24 08:18:18', '2018-10-12 07:18:18', NULL),
(13, 1, 9, 483, 3, 1, 'Pending', '5BBFF6E05A206', '2018-12-12 08:20:32', '2018-10-12 07:20:32', NULL),
(14, 1, 2, 500, 2, 1, 'Pending', '5BBFF6E05A206', '2019-01-16 08:20:32', '2018-10-12 07:20:32', NULL),
(15, 1, 1, 50, 5, 250, 'Pending', '5BC00BB791A21', '2019-01-09 09:49:27', '2018-10-12 08:49:27', NULL),
(16, 3, 0, 0, 0, 0, '', '5BC0D259E1B4B', '2018-10-12 22:56:57', '2018-10-12 22:56:57', NULL),
(17, 3, 0, 0, 0, 0, '', '5BC1B72CD9EC9', '2018-10-13 15:13:16', '2018-10-13 15:13:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `order_no`, `amount`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '5BBFE53F14AC1', 138300, 'succeeded', '2018-10-12 06:05:19', '2018-10-12 06:05:19', NULL),
(2, 1, '5BBFF5A011569', 173300, 'succeeded', '2018-11-02 07:15:12', '2018-10-12 07:15:12', NULL),
(3, 1, '5BBFF621AEC55', 173300, 'succeeded', '2018-07-12 07:17:22', '2018-10-12 07:17:22', NULL),
(4, 1, '5BBFF659DD238', 173300, 'succeeded', '2019-01-02 08:18:18', '2018-10-12 07:18:18', NULL),
(5, 1, '5BBFF6E05A206', 244900, 'succeeded', '2018-10-12 07:20:32', '2018-10-12 07:20:32', NULL),
(6, 1, '5BC00BB791A21', 25000, 'succeeded', '2018-09-13 08:49:27', '2018-10-12 08:49:27', NULL),
(7, 3, '5BC0D259E1B4B', 241500, 'succeeded', '2018-10-12 22:56:58', '2018-10-12 22:56:58', NULL),
(8, 3, '5BC1B72CD9EC9', 50000, 'succeeded', '2018-10-13 15:13:17', '2018-10-13 15:13:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(6) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `category_id`, `quantity`, `sub_category_id`, `image_path`, `featured`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tyler', 50, 'hello', 26, 2, 26, 'images\\uploads\\products\\\\elon-musk-quote-27a47ce8776bb38d058b26dede081dc1.jpg', 0, '2018-10-05 10:51:31', '2018-10-12 08:49:27', NULL),
(2, 'tyler one two', 500, 'hello hhellooo', 26, 5, 26, 'images\\uploads\\products\\\\win_20171204_23_51_18_pro-2cdfd13ba59b2f32a7bc7d8b2796638c.jpg', 0, '2018-10-05 10:51:59', '2018-10-13 15:35:03', NULL),
(6, 'new item ', 30, 'new item', 26, 12, 26, 'images\\uploads\\products\\elon-musk-quote-5a9a5b6e636635a91127a8c953ff0c42.jpg', 0, '2018-10-07 17:57:35', '2018-10-07 18:00:21', NULL),
(7, 'this is the longest product name you will ever see in your life', 50000, 'this is descripttion of the longest product name', 28, 11, 34, 'images\\uploads\\products\\overview_dl-39eb3f1d3d835a6b714cc879a2f69fc3.png', 0, '2018-10-08 11:59:11', '2018-10-08 11:59:11', NULL),
(8, 'lets add more item ', 400, 'OKAY THANKS', 27, 0, 35, 'images\\uploads\\products\\tree-8bd077d31cd9abab8f12d072313c2d89.PNG', 1, '2018-10-08 12:00:25', '2018-10-12 07:18:17', NULL),
(9, 'another item ', 483, 'this is added to see if similar items are displayed properly', 27, 31, 34, 'images\\uploads\\products\\\\error_c9-0edeecec53a2e0e1f0ebcced646fc2cc.PNG', 1, '2018-10-09 04:00:00', '2018-10-12 22:56:58', NULL),
(10, 'an Item', 123, 'an item\'s detail', 26, 29, 26, 'images\\uploads\\products\\vgi-day-b00526d969d152e1fb953a2789390a43.PNG', 0, '2018-10-13 15:32:38', '2018-10-13 15:32:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Anak Wannaphaschiayong', 'anak-wannaphaschiayong', 28, '2018-10-04 00:35:46', '2018-10-05 01:23:00', '2018-10-05 01:23:00'),
(11, 'sad', 'sad', 28, '2018-10-04 02:47:05', '2018-10-05 01:23:01', '2018-10-05 01:23:01'),
(22, 'omg', 'omg', 28, '2018-10-04 10:03:35', '2018-10-05 01:23:01', '2018-10-05 01:23:01'),
(23, 'lmaooo', 'lmao', 28, '2018-10-04 10:03:57', '2018-10-05 01:23:01', '2018-10-05 01:23:01'),
(24, 'heheXD', 'hehexd', 28, '2018-10-04 10:04:34', '2018-10-05 01:23:01', '2018-10-05 01:23:01'),
(25, 'works edit', 'works', 28, '2018-10-04 10:06:22', '2018-10-05 01:23:01', NULL),
(26, 'delete this', 'delete-this', 26, '2018-10-05 01:11:47', '2018-10-05 01:11:52', NULL),
(34, 'this one', 'this-one', 28, '2018-10-05 01:18:52', '2018-10-13 15:37:24', NULL),
(35, 'this one too', 'this-one-too', 27, '2018-10-05 01:19:02', '2018-10-05 01:20:25', NULL),
(36, 'what about this one', 'what-about-this-one', 26, '2018-10-05 01:19:12', '2018-10-07 17:53:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `address`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'store', 'Anak Wannaphaschaiyong', 'terngoodod@yahoo.com', '$2y$10$cdEpiuzL49ca7prLhvHgpOlaA.R3ST9XIMj5pyDGpYvTMYcMBcTdO', 'store', 'user', '2018-10-11 11:47:42', '2018-10-11 04:00:00', NULL),
(2, 'you tell me', 'Your name', 'terngoodod@gmail.com', '$2y$10$m6VaULojDKCQJdHBwIg9NefzM0Cv5Izp4R.Li8KCGUHWBo0Gr/vGm', 'store', 'user', '2018-10-11 11:49:15', '2018-10-14 11:23:12', '2018-10-14 11:23:12'),
(3, 'terngoodod', 'Admin name', 'awannaphasch2016@fau.edu', '$2y$10$P3TVPJi2GNAIAu7Ikq6tTOHCMQtL1m81NE41SofuV83j0YWqAuwBS', 'terngoodod', 'admin', '2018-10-12 11:24:00', '2018-10-14 11:07:25', NULL),
(4, 'sammy', 'Samsung', 'samkup@fau.edu', '$2y$10$xZ7d94RreiaCg/jWwqvhie3gfmJaFCOG06KO2UhKjW9kuIYFprR/q', 'sammy', 'user', '2018-10-14 11:28:24', '2018-10-14 11:28:24', NULL),
(5, 'Billy', 'Bill XOX', 'BilloheheXD@yahoo.com', '$2y$10$LvH7oYZLeHJ4Jzmzh26ZnedHcCvwMOP0I9FBzXhOVAxdFZQoagbiG', 'some place around fau', 'user', '2018-10-14 12:03:25', '2018-10-21 00:21:12', NULL),
(6, 'terngterng', 'RdouleK', 'terng1234@gmail.com', '$2y$10$NgA0b74Sq2Hf3h1mNN252.onESMF4oAgqnVSa/FJ8RTtW7nODLTSa', 'XXXXXXXXXXXXXXXXXXX', 'user', '2018-10-14 12:34:25', '2018-10-14 12:35:22', '2018-10-14 12:35:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
