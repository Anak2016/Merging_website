-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2018 at 11:46 PM
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
-- Database: `sam_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `desc`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asdfasdf', 'asdfasdf', '', '2018-09-19 04:00:00', '2018-09-04 04:00:00', NULL),
(9, 'asdf asdf fdsad', 'asdf-asdf-fdsa', '', '2018-10-02 02:09:24', '2018-10-03 11:32:35', '2018-10-03 11:32:35'),
(10, 'Clothing', 'clothing', '', '2018-10-02 02:28:50', '2018-10-03 06:47:23', '2018-10-03 06:47:23'),
(11, 'testing', 'testing', '', '2018-10-02 04:33:15', '2018-10-03 06:47:22', '2018-10-03 06:47:22'),
(19, 'bug fixed', 'bug-fixed', '', '2018-10-02 12:24:34', '2018-10-03 09:29:54', '2018-10-03 09:29:54'),
(20, 'okay thanks', 'okay-thanks', '', '2018-10-02 12:28:14', '2018-10-03 06:47:18', '2018-10-03 06:47:18'),
(21, 'you funny', 'you-funny', '', '2018-10-02 12:29:55', '2018-10-03 06:46:18', '2018-10-03 06:46:18'),
(22, 'lol', 'lol', '', '2018-10-02 12:30:16', '2018-10-03 06:45:33', '2018-10-03 06:45:33'),
(23, 'sdf', 'sdf', '', '2018-10-03 07:16:29', '2018-10-03 09:41:19', '2018-10-03 09:41:19'),
(24, 'producd', 'produc', '', '2018-10-03 07:17:19', '2018-10-03 09:29:50', '2018-10-03 09:29:50'),
(25, 'aaa', 'aaa', '', '2018-10-03 07:17:49', '2018-10-03 07:29:40', NULL),
(26, 'fasdf', 'fasdf', '', '2018-10-03 09:49:12', '2018-10-03 09:49:12', NULL),
(27, 'ternggggg', 'tern', '', '2018-10-03 09:53:20', '2018-10-05 01:20:24', NULL),
(28, 'add one moredd', 'add-one-more', '', '2018-10-03 11:32:54', '2018-10-05 01:22:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'SS', 'South Sudan'),
(203, 'ES', 'Spain'),
(204, 'LK', 'Sri Lanka'),
(205, 'SH', 'St. Helena'),
(206, 'PM', 'St. Pierre and Miquelon'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard and Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syrian Arab Republic'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania, United Republic of'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad and Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks and Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States minor outlying islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (U.S.)'),
(241, 'WF', 'Wallis and Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `item_ratings`
--

CREATE TABLE `item_ratings` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_number` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Block, 0 =Unblock',
  `user_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_ratings`
--

INSERT INTO `item_ratings` (`id`, `product_id`, `user_id`, `rating_number`, `title`, `comments`, `status`, `user_ip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'test ', 'test comment', 1, '', NULL, NULL, NULL),
(2, 2, 1, 3, 'test 1', 'comment test 1', 1, '', NULL, NULL, NULL),
(3, 6, 1, 4, 'test 3', 'comment test 3', 1, '', NULL, NULL, NULL),
(4, 7, 1, 5, 'test 4 ', 'comment test 4', 1, '', NULL, NULL, NULL),
(5, 8, 1, 2, 'test 5', 'comment test 5', 1, '', NULL, NULL, NULL),
(6, 6, 1, 5, 'test 6', 'comment test 6', 1, '', NULL, NULL, NULL),
(7, 6, 2, 2, 'test 7', 'comment test 7', 1, '', NULL, NULL, NULL),
(8, 6, 1, 1, 'adfhadfh', 'adadnadnan', 1, '', '2018-10-29 01:08:14', '2018-10-29 01:08:14', NULL),
(9, 6, 1, 5, 'just a comment', 'thailand only', 1, '', '2018-10-29 01:09:06', '2018-10-29 01:09:06', NULL),
(10, 6, 3, 4, 'ashah', 'hehe I love this', 1, '', '2018-10-30 11:20:53', '2018-10-30 11:20:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(10) NOT NULL,
  `zone_id` int(10) NOT NULL,
  `location_code` text NOT NULL,
  `location_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `zone_id`, `location_code`, `location_type`) VALUES
(22, 3, '217', 'country'),
(23, 3, '11260', 'postcode'),
(25, 3, '11430\r', 'postcode'),
(26, 3, '22222', 'postcode');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image_path` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `product_id`, `title`, `image_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'test2334rt5yuu', '/sam_public/images/uploads/products/22323.jpg', NULL, NULL, NULL),
(2, 2, 'Amir Khan', '/sam_public/images/uploads/products/54545.jpg', NULL, NULL, NULL),
(3, 6, 'Omri Liba', '/sam_public/images/demo_logo_original.png', NULL, NULL, NULL),
(4, 7, 'Joy Peng', '/sam_public/images/logo.png', NULL, NULL, NULL),
(5, 8, 'Kane Bender', '/sam_public/images/logo_light.png', NULL, NULL, NULL),
(6, 9, 'Akshay ', '/sam_public/images/customer_images/Tulips.jpg', NULL, NULL, NULL);

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
(4, 1, '5BBFF5A011569', '2018-09-13 07:15:12', '2018-10-12 07:15:12', '2018-10-16 04:00:00'),
(7, 1, '5BBFF621AEC55', '2018-11-07 08:17:21', '2018-10-16 01:49:20', NULL),
(10, 1, '5BBFF659DD238', '2018-12-11 08:18:17', '2018-10-12 07:18:17', NULL),
(13, 1, '5BBFF6E05A206', '2018-12-12 08:20:32', '2018-10-12 07:20:32', NULL),
(15, 1, '5BC00BB791A21', '2019-01-09 09:49:27', '2018-10-12 08:49:27', NULL),
(16, 3, '5BC0D259E1B4B', '2018-10-12 22:56:58', '2018-10-12 22:56:58', NULL),
(17, 3, '5BC1B72CD9EC9', '2018-10-13 15:13:17', '2018-10-13 15:13:17', NULL),
(18, 1, '5BD27ABB554E7', '2018-10-26 08:23:55', '2018-10-26 08:23:55', NULL),
(19, 1, '5BD27AFFDAA6F', '2018-10-26 08:25:03', '2018-10-26 08:25:03', NULL),
(20, 1, '5BD27B234ADF9', '2018-10-26 08:25:39', '2018-10-26 08:25:39', NULL),
(21, 1, '5BD27BDB4C711', '2018-10-26 08:28:44', '2018-10-26 08:28:44', NULL),
(22, 3, '5BD27C59BEA1F', '2018-10-26 08:30:50', '2018-10-26 08:30:50', NULL),
(23, 3, '5BD28608DCF45', '2018-10-26 09:12:09', '2018-10-26 09:12:09', NULL),
(24, 3, '5BD286A442593', '2018-10-26 09:14:44', '2018-10-26 09:14:44', NULL),
(25, 3, '5BD286D91E66B', '2018-10-26 09:15:37', '2018-10-26 09:15:37', NULL),
(26, 3, '5BD287A004B6B', '2018-10-26 09:18:56', '2018-10-26 09:18:56', NULL),
(27, 3, '5BD287EFDDDCB', '2018-10-26 09:20:16', '2018-10-26 09:20:16', NULL),
(28, 3, '5BD2884A4BAE6', '2018-10-26 09:21:46', '2018-10-26 09:21:46', NULL),
(29, 3, '5BD288EFE06DF', '2018-10-26 09:24:32', '2018-10-26 09:24:32', NULL),
(30, 3, '5BD2895B1F7C6', '2018-10-26 09:26:20', '2018-10-26 09:26:20', NULL),
(31, 3, '5BD28C772D392', '2018-10-26 09:39:35', '2018-10-26 09:39:35', NULL),
(32, 3, '5BD28D8D3D144', '2018-10-26 09:44:13', '2018-10-26 09:44:13', NULL),
(33, 3, '5BD28F1206960', '2018-10-26 09:50:42', '2018-10-26 09:50:42', NULL),
(34, 3, '5BD28F74B5163', '2018-10-26 09:52:20', '2018-10-26 09:52:20', NULL),
(35, 3, '5BD29121A7967', '2018-10-26 09:59:29', '2018-10-26 09:59:29', NULL),
(36, 3, '5BD292B55CB55', '2018-10-26 10:06:13', '2018-10-26 10:06:13', NULL),
(37, 3, '5BD2940B3CE1C', '2018-10-26 10:11:55', '2018-10-26 10:11:55', NULL),
(38, 3, '5BD294A519BE5', '2018-10-26 10:14:29', '2018-10-26 10:14:29', NULL),
(39, 3, '5BD2957E08E1A', '2018-10-26 10:18:06', '2018-10-26 10:18:06', NULL),
(40, 3, '5BD296027448C', '2018-10-26 10:20:18', '2018-10-26 10:20:18', NULL),
(41, 3, '5BD2979E04E72', '2018-10-26 10:27:10', '2018-10-26 10:27:10', NULL),
(42, 3, '5BD297E58F336', '2018-10-26 10:28:21', '2018-10-26 10:28:21', NULL),
(43, 3, '5BD29C43229A4', '2018-10-26 10:46:59', '2018-10-26 10:46:59', NULL),
(44, 3, '5BD29E5DED9FA', '2018-10-26 10:55:58', '2018-10-26 10:55:58', NULL),
(45, 3, '5BD29EC068229', '2018-10-26 10:57:36', '2018-10-26 10:57:36', NULL),
(46, 3, '5BD29F1874E66', '2018-10-26 10:59:04', '2018-10-26 10:59:04', NULL),
(47, 3, '5BD29F72E0C85', '2018-10-26 11:00:36', '2018-10-26 11:00:36', NULL),
(48, 3, '5BD29F930791E', '2018-10-26 11:01:07', '2018-10-26 11:01:07', NULL),
(49, 3, '5BD29FEA88847', '2018-10-26 11:02:34', '2018-10-26 11:02:34', NULL),
(50, 3, '5BD2A27144FF0', '2018-10-26 11:13:21', '2018-10-26 11:13:21', NULL),
(51, 3, '5BD2A2F7600DF', '2018-10-26 11:15:36', '2018-10-26 11:15:36', NULL),
(52, 3, '5BD2A4A4A2B9D', '2018-10-26 11:22:44', '2018-10-26 11:22:44', NULL),
(53, 3, '5BD2A5BE2A8FF', '2018-10-26 11:27:26', '2018-10-26 11:27:26', NULL),
(54, 3, '5BD2A6B9BFF7A', '2018-10-26 11:31:38', '2018-10-26 11:31:38', NULL),
(55, 3, '5BD349B9E082D', '2018-10-26 23:07:06', '2018-10-26 23:07:06', NULL),
(56, 3, '5BD35C316DF26', '2018-10-27 00:25:54', '2018-10-27 00:25:54', NULL),
(57, 3, '5BD8886727AFF', '2018-10-30 21:35:53', '2018-10-30 21:35:53', NULL),
(58, 3, '5BD8CD53284EA', '2018-10-31 02:29:55', '2018-10-31 02:29:55', NULL),
(59, 3, '5BD8CFD12C25E', '2018-10-31 02:40:33', '2018-10-31 02:40:33', NULL),
(60, 3, '5BD8D3AE25D25', '2018-10-31 02:57:02', '2018-10-31 02:57:02', NULL),
(61, 3, '5BD8D40645EED', '2018-10-31 02:58:30', '2018-10-31 02:58:30', NULL),
(62, 3, '5BD8D56A92246', '2018-10-31 03:04:26', '2018-10-31 03:04:26', NULL),
(63, 3, '5BD8D5AC17C50', '2018-10-31 03:05:32', '2018-10-31 03:05:32', NULL),
(64, 3, '5BD8DA5CEB8B0', '2018-10-31 03:25:33', '2018-10-31 03:25:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `shipping_id` int(255) NOT NULL,
  `zone_id` int(255) NOT NULL,
  `location_id` int(11) NOT NULL,
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

INSERT INTO `order_details` (`id`, `user_id`, `product_id`, `shipping_id`, `zone_id`, `location_id`, `unit_price`, `quantity`, `total`, `status`, `order_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 1, 0, 0, 500, 1, 500, 'Pending', '5BBFE53F14AC1', '2018-10-12 06:05:19', '2018-10-12 06:05:19', NULL),
(2, 1, 8, 1, 0, 0, 400, 1, 400, 'Pending', '5BBFE53F14AC1', '2018-10-12 06:05:19', '2018-10-12 06:05:19', NULL),
(3, 1, 9, 1, 0, 0, 483, 1, 483, 'Pending', '5BBFE53F14AC1', '2018-09-12 06:05:19', '2018-10-12 06:05:19', NULL),
(4, 1, 8, 1, 0, 0, 400, 3, 1, 'Pending', '5BBFF5A011569', '2018-09-13 07:15:12', '2018-10-12 07:15:12', NULL),
(5, 1, 9, 2, 0, 0, 483, 1, 483, 'Pending', '5BBFF5A011569', '2018-09-20 07:15:12', '2018-10-12 07:15:12', NULL),
(6, 1, 1, 2, 0, 0, 50, 1, 50, 'Pending', '5BBFF5A011569', '2018-11-15 08:15:12', '2018-10-12 07:15:12', NULL),
(7, 1, 8, 2, 0, 0, 400, 3, 1, 'Pending', '5BBFF621AEC55', '2018-11-07 08:17:21', '2018-10-12 07:17:21', NULL),
(8, 1, 9, 2, 0, 0, 483, 1, 483, 'Pending', '5BBFF621AEC55', '2018-11-14 08:17:21', '2018-10-12 07:17:21', NULL),
(9, 1, 1, 4, 0, 0, 50, 1, 50, 'Pending', '5BBFF621AEC55', '2018-11-14 08:17:22', '2018-10-12 07:17:22', NULL),
(10, 1, 8, 4, 0, 0, 400, 3, 1, 'Pending', '5BBFF659DD238', '2018-12-11 08:18:17', '2018-10-12 07:18:17', NULL),
(11, 1, 9, 4, 0, 0, 483, 1, 483, 'Pending', '5BBFF659DD238', '2018-12-04 08:18:18', '2018-10-12 07:18:18', NULL),
(12, 1, 1, 4, 0, 0, 50, 1, 50, 'Pending', '5BBFF659DD238', '2018-12-24 08:18:18', '2018-10-12 07:18:18', NULL),
(13, 1, 9, 4, 0, 0, 483, 3, 1, 'Pending', '5BBFF6E05A206', '2018-12-12 08:20:32', '2018-10-12 07:20:32', NULL),
(14, 1, 2, 5, 0, 0, 500, 2, 1, 'Pending', '5BBFF6E05A206', '2019-01-16 08:20:32', '2018-10-12 07:20:32', NULL),
(15, 1, 1, 5, 0, 0, 50, 5, 250, 'Pending', '5BC00BB791A21', '2019-01-09 09:49:27', '2018-10-12 08:49:27', NULL),
(16, 3, 0, 5, 0, 0, 0, 0, 0, '', '5BC0D259E1B4B', '2018-10-12 22:56:57', '2018-10-12 22:56:57', NULL),
(17, 3, 0, 5, 0, 0, 0, 0, 0, '', '5BC1B72CD9EC9', '2018-10-13 15:13:16', '2018-10-13 15:13:16', NULL),
(18, 1, 0, 5, 0, 0, 0, 0, 0, '', '5BD27ABB554E7', '2018-10-26 08:23:55', '2018-10-26 08:23:55', NULL),
(19, 1, 0, 6, 0, 0, 0, 0, 0, '', '5BD27ABB554E7', '2018-10-26 08:23:55', '2018-10-26 08:23:55', NULL),
(20, 1, 0, 6, 0, 0, 0, 0, 0, '', '5BD27BDB4C711', '2018-10-26 08:28:44', '2018-10-26 08:28:44', NULL),
(21, 3, 0, 6, 0, 0, 0, 0, 0, '', '5BD27C59BEA1F', '2018-10-26 08:30:49', '2018-10-26 08:30:49', NULL),
(22, 3, 0, 6, 0, 0, 0, 0, 0, '', '5BD28608DCF45', '2018-10-26 09:12:08', '2018-10-26 09:12:08', NULL),
(23, 3, 0, 6, 0, 0, 0, 0, 0, '', '5BD28608DCF45', '2018-10-26 09:12:09', '2018-10-26 09:12:09', NULL),
(24, 3, 0, 6, 0, 0, 0, 0, 0, '', '5BD286A442593', '2018-10-26 09:14:44', '2018-10-26 09:14:44', NULL),
(25, 3, 0, 6, 0, 0, 0, 0, 0, '', '5BD286A442593', '2018-10-26 09:14:44', '2018-10-26 09:14:44', NULL),
(26, 3, 0, 0, 0, 0, 0, 0, 0, '', '5BD287A004B6B', '2018-10-26 09:18:56', '2018-10-26 09:18:56', NULL),
(27, 3, 0, 0, 0, 0, 0, 0, 0, '', '5BD287EFDDDCB', '2018-10-26 09:20:15', '2018-10-26 09:20:15', NULL),
(28, 3, 0, 0, 0, 0, 0, 0, 0, '', '5BD2884A4BAE6', '2018-10-26 09:21:46', '2018-10-26 09:21:46', NULL),
(29, 3, 0, 0, 0, 0, 0, 0, 0, '', '5BD288EFE06DF', '2018-10-26 09:24:31', '2018-10-26 09:24:31', NULL),
(30, 3, 0, 0, 0, 0, 0, 0, 0, '', '5BD2895B1F7C6', '2018-10-26 09:26:19', '2018-10-26 09:26:19', NULL),
(31, 3, 7, 0, 0, 0, 0, 1, 50, 'Pending', '5BD28C772D392', '2018-10-26 09:39:35', '2018-10-26 09:39:35', NULL),
(32, 3, 7, 0, 0, 0, 0, 1, 50, 'Pending', '5BD28D8D3D144', '2018-10-26 09:44:13', '2018-10-26 09:44:13', NULL),
(33, 3, 7, 0, 0, 0, 0, 1, 50, 'Pending', '5BD28F1206960', '2018-10-26 09:50:42', '2018-10-26 09:50:42', NULL),
(34, 3, 7, 0, 0, 0, 0, 1, 50, 'Pending', '5BD28F74B5163', '2018-10-26 09:52:20', '2018-10-26 09:52:20', NULL),
(35, 3, 7, 0, 0, 0, 0, 1, 50, 'Pending', '5BD29121A7967', '2018-10-26 09:59:29', '2018-10-26 09:59:29', NULL),
(36, 3, 1, 0, 0, 0, 0, 1, 50, 'Pending', '5BD292B55CB55', '2018-10-26 10:06:13', '2018-10-26 10:06:13', NULL),
(37, 3, 7, 0, 0, 0, 0, 2, 100, 'Pending', '5BD2940B3CE1C', '2018-10-26 10:11:55', '2018-10-26 10:11:55', NULL),
(38, 3, 6, 0, 0, 0, 0, 1, 30, 'Pending', '5BD294A519BE5', '2018-10-26 10:14:29', '2018-10-26 10:14:29', NULL),
(39, 3, 7, 0, 0, 0, 0, 1, 50, 'Pending', '5BD294A519BE5', '2018-10-26 10:14:29', '2018-10-26 10:14:29', NULL),
(40, 3, 7, 0, 0, 0, 0, 2, 100, 'Pending', '5BD2957E08E1A', '2018-10-26 10:18:06', '2018-10-26 10:18:06', NULL),
(41, 3, 6, 0, 0, 0, 0, 2, 60, 'Pending', '5BD296027448C', '2018-10-26 10:20:18', '2018-10-26 10:20:18', NULL),
(42, 3, 2, 0, 0, 0, 0, 1, 500, 'Pending', '5BD2979E04E72', '2018-10-26 10:27:10', '2018-10-26 10:27:10', NULL),
(43, 3, 6, 0, 0, 0, 0, 1, 30, 'Pending', '5BD297E58F336', '2018-10-26 10:28:21', '2018-10-26 10:28:21', NULL),
(44, 3, 6, 0, 0, 0, 0, 1, 30, 'Pending', '5BD29C43229A4', '2018-10-26 10:46:59', '2018-10-26 10:46:59', NULL),
(45, 3, 6, 0, 0, 0, 0, 1, 30, 'Pending', '5BD29D65F0069', '2018-10-26 10:51:50', '2018-10-26 10:51:50', NULL),
(46, 3, 6, 0, 0, 0, 0, 1, 30, 'Pending', '5BD29DE8A7D31', '2018-10-26 10:54:00', '2018-10-26 10:54:00', NULL),
(47, 3, 6, 0, 0, 0, 0, 1, 30, 'Pending', '5BD29E5DED9FA', '2018-10-26 10:55:57', '2018-10-26 10:55:57', NULL),
(48, 3, 9, 0, 0, 0, 0, 1, 483, 'Pending', '5BD29E5DED9FA', '2018-10-26 10:55:58', '2018-10-26 10:55:58', NULL),
(49, 3, 1, 0, 0, 0, 0, 3, 150, 'Pending', '5BD29E5DED9FA', '2018-10-26 10:55:58', '2018-10-26 10:55:58', NULL),
(50, 3, 6, 0, 0, 0, 0, 1, 30, '', '', '2018-10-26 10:57:36', '2018-10-26 10:57:36', NULL),
(51, 3, 2, 0, 0, 0, 0, 2, 1, '', '', '2018-10-26 10:59:04', '2018-10-26 10:59:04', NULL),
(52, 3, 1, 0, 0, 0, 0, 2, 100, '', '', '2018-10-26 11:00:34', '2018-10-26 11:00:34', NULL),
(53, 3, 2, 0, 0, 0, 0, 2, 1, '', '', '2018-10-26 11:01:07', '2018-10-26 11:01:07', NULL),
(54, 3, 6, 0, 0, 0, 0, 6, 180, 'Pending', '5BD29FEA88847', '2018-10-26 11:02:34', '2018-10-26 11:02:34', NULL),
(55, 3, 6, 0, 0, 0, 0, 2, 60, 'Pending', '5BD2A27144FF0', '2018-10-26 11:13:21', '2018-10-26 11:13:21', NULL),
(56, 3, 1, 0, 0, 0, 0, 1, 50, 'Pending', '5BD2A2F7600DF', '2018-10-26 11:15:35', '2018-10-26 11:15:35', NULL),
(57, 3, 6, 0, 0, 0, 0, 2, 60, 'Pending', '5BD2A4A4A2B9D', '2018-10-26 11:22:44', '2018-10-26 11:22:44', NULL),
(58, 3, 2, 0, 0, 0, 0, 2, 1, 'Pending', '5BD2A5BE2A8FF', '2018-10-26 11:27:26', '2018-10-26 11:27:26', NULL),
(59, 3, 6, 0, 0, 0, 0, 2, 60, 'Pending', '5BD2A6B9BFF7A', '2018-10-26 11:31:37', '2018-10-26 11:31:37', NULL),
(60, 3, 6, 0, 0, 0, 0, 2, 60, 'Pending', '5BD349B9E082D', '2018-10-26 23:07:05', '2018-10-26 23:07:05', NULL),
(61, 3, 7, 0, 0, 0, 0, 1, 50, 'Pending', '5BD349B9E082D', '2018-10-26 23:07:06', '2018-10-26 23:07:06', NULL),
(62, 3, 7, 0, 0, 0, 0, 3, 150, 'Pending', '5BD35C316DF26', '2018-10-27 00:25:53', '2018-10-27 00:25:53', NULL),
(63, 3, 6, 0, 0, 0, 0, 2, 60, 'Pending', '5BD8886727AFF', '2018-10-30 21:35:51', '2018-10-30 21:35:51', NULL),
(64, 3, 7, 0, 0, 0, 0, 1, 50, 'Pending', '5BD8886727AFF', '2018-10-30 21:35:53', '2018-10-30 21:35:53', NULL),
(65, 3, 6, 0, 0, 0, 0, 1, 30, 'Pending', '5BD8CD53284EA', '2018-10-31 02:29:55', '2018-10-31 02:29:55', NULL),
(66, 3, 6, 0, 0, 0, 0, 1, 30, 'Pending', '5BD8CFD12C25E', '2018-10-31 02:40:33', '2018-10-31 02:40:33', NULL),
(67, 3, 6, 0, 0, 0, 0, 1, 30, 'Pending', '5BD8D3AE25D25', '2018-10-31 02:57:02', '2018-10-31 02:57:02', NULL),
(68, 3, 6, 0, 0, 0, 0, 1, 30, 'Pending', '5BD8D40645EED', '2018-10-31 02:58:30', '2018-10-31 02:58:30', NULL),
(69, 3, 7, 0, 0, 0, 0, 1, 50, 'Pending', '5BD8D40645EED', '2018-10-31 02:58:30', '2018-10-31 02:58:30', NULL),
(70, 3, 7, 0, 0, 0, 0, 2, 100, 'Pending', '5BD8D56A92246', '2018-10-31 03:04:26', '2018-10-31 03:04:26', NULL),
(71, 3, 6, 0, 0, 0, 0, 1, 30, 'Pending', '5BD8D5AC17C50', '2018-10-31 03:05:32', '2018-10-31 03:05:32', NULL),
(72, 3, 7, 0, 0, 0, 0, 1, 50, 'Pending', '5BD8D5AC17C50', '2018-10-31 03:05:32', '2018-10-31 03:05:32', NULL),
(73, 3, 6, 0, 0, 0, 0, 3, 90, 'Pending', '5BD8DA5CEB8B0', '2018-10-31 03:25:32', '2018-10-31 03:25:32', NULL);

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
(8, 3, '5BC1B72CD9EC9', 50000, 'succeeded', '2018-10-13 15:13:17', '2018-10-13 15:13:17', NULL),
(9, 1, '5BD27ABB554E7', 101600, 'succeeded', '2018-10-26 08:23:56', '2018-10-26 08:23:56', NULL),
(10, 1, '5BD27AFFDAA6F', 101600, 'succeeded', '2018-10-26 08:25:04', '2018-10-26 08:25:04', NULL),
(11, 1, '5BD27B234ADF9', 101600, 'succeeded', '2018-10-26 08:25:40', '2018-10-26 08:25:40', NULL),
(12, 1, '5BD27BDB4C711', 25000000, 'succeeded', '2018-10-26 08:28:44', '2018-10-26 08:28:44', NULL),
(13, 3, '5BD27C59BEA1F', 12000, 'succeeded', '2018-10-26 08:30:50', '2018-10-26 08:30:50', NULL),
(14, 3, '5BD28C772D392', 5000000, 'succeeded', '2018-10-26 09:39:35', '2018-10-26 09:39:35', NULL),
(15, 3, '5BD28D8D3D144', 5000000, 'succeeded', '2018-10-26 09:44:13', '2018-10-26 09:44:13', NULL),
(16, 3, '5BD28F1206960', 5000000, 'succeeded', '2018-10-26 09:50:42', '2018-10-26 09:50:42', NULL),
(17, 3, '5BD28F74B5163', 5000000, 'succeeded', '2018-10-26 09:52:20', '2018-10-26 09:52:20', NULL),
(18, 3, '5BD29121A7967', 5000000, 'succeeded', '2018-10-26 09:59:29', '2018-10-26 09:59:29', NULL),
(19, 3, '5BD292B55CB55', 5000, 'succeeded', '2018-10-26 10:06:13', '2018-10-26 10:06:13', NULL),
(20, 3, '5BD2940B3CE1C', 10000000, 'succeeded', '2018-10-26 10:11:55', '2018-10-26 10:11:55', NULL),
(21, 3, '5BD294A519BE5', 5003000, 'succeeded', '2018-10-26 10:14:29', '2018-10-26 10:14:29', NULL),
(22, 3, '5BD2957E08E1A', 10000000, 'succeeded', '2018-10-26 10:18:06', '2018-10-26 10:18:06', NULL),
(23, 3, '5BD296027448C', 6000, 'succeeded', '2018-10-26 10:20:18', '2018-10-26 10:20:18', NULL),
(24, 3, '5BD2979E04E72', 50000, 'succeeded', '2018-10-26 10:27:10', '2018-10-26 10:27:10', NULL),
(25, 3, '5BD297E58F336', 3000, 'succeeded', '2018-10-26 10:28:21', '2018-10-26 10:28:21', NULL),
(26, 3, '5BD29C43229A4', 3000, 'succeeded', '2018-10-26 10:46:59', '2018-10-26 10:46:59', NULL),
(27, 3, '5BD29E5DED9FA', 51300, 'succeeded', '2018-10-26 10:55:59', '2018-10-26 10:55:59', NULL),
(28, 3, '5BD29EC068229', 3000, 'succeeded', '2018-10-26 10:57:36', '2018-10-26 10:57:36', NULL),
(29, 3, '5BD29F1874E66', 100000, 'succeeded', '2018-10-26 10:59:04', '2018-10-26 10:59:04', NULL),
(30, 3, '5BD29F72E0C85', 10000, 'succeeded', '2018-10-26 11:00:36', '2018-10-26 11:00:36', NULL),
(31, 3, '5BD29F930791E', 100000, 'succeeded', '2018-10-26 11:01:07', '2018-10-26 11:01:07', NULL),
(32, 3, '5BD29FEA88847', 18000, 'succeeded', '2018-10-26 11:02:34', '2018-10-26 11:02:34', NULL),
(33, 3, '5BD2A27144FF0', 6000, 'succeeded', '2018-10-26 11:13:21', '2018-10-26 11:13:21', NULL),
(34, 3, '5BD2A2F7600DF', 5000, 'succeeded', '2018-10-26 11:15:36', '2018-10-26 11:15:36', NULL),
(35, 3, '5BD2A4A4A2B9D', 6000, 'succeeded', '2018-10-26 11:22:44', '2018-10-26 11:22:44', NULL),
(36, 3, '5BD2A5BE2A8FF', 100000, 'succeeded', '2018-10-26 11:27:26', '2018-10-26 11:27:26', NULL),
(37, 3, '5BD2A6B9BFF7A', 6000, 'succeeded', '2018-10-26 11:31:38', '2018-10-26 11:31:38', NULL),
(38, 3, '5BD349B9E082D', 5006000, 'succeeded', '2018-10-26 23:07:06', '2018-10-26 23:07:06', NULL),
(39, 3, '5BD35C316DF26', 15000000, 'succeeded', '2018-10-27 00:25:54', '2018-10-27 00:25:54', NULL),
(40, 3, '5BD8886727AFF', 5006000, 'succeeded', '2018-10-30 21:35:53', '2018-10-30 21:35:53', NULL),
(41, 3, '5BD8CD53284EA', 3000, 'succeeded', '2018-10-31 02:29:56', '2018-10-31 02:29:56', NULL),
(42, 3, '5BD8CFD12C25E', 3000, 'succeeded', '2018-10-31 02:40:33', '2018-10-31 02:40:33', NULL),
(43, 3, '5BD8D3AE25D25', 3000, 'succeeded', '2018-10-31 02:57:02', '2018-10-31 02:57:02', NULL),
(44, 3, '5BD8D40645EED', 5003000, 'succeeded', '2018-10-31 02:58:30', '2018-10-31 02:58:30', NULL),
(45, 3, '5BD8D56A92246', 10000000, 'succeeded', '2018-10-31 03:04:26', '2018-10-31 03:04:26', NULL),
(46, 3, '5BD8D5AC17C50', 5003000, 'succeeded', '2018-10-31 03:05:32', '2018-10-31 03:05:32', NULL),
(47, 3, '5BD8DA5CEB8B0', 9000, 'succeeded', '2018-10-31 03:25:33', '2018-10-31 03:25:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `sale_price` float NOT NULL DEFAULT '0',
  `desc` text NOT NULL,
  `weight` float NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `quantity` int(6) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `image_path2` text NOT NULL,
  `image_path1` text NOT NULL,
  `image_path3` text NOT NULL,
  `label` tinyint(4) NOT NULL,
  `deal` tinyint(4) NOT NULL,
  `popular` tinyint(11) NOT NULL,
  `country_id` int(100) NOT NULL,
  `keywords` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sale_price`, `desc`, `weight`, `category_id`, `manufacturer_id`, `quantity`, `sub_category_id`, `image_path2`, `image_path1`, `image_path3`, `label`, `deal`, `popular`, `country_id`, `keywords`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tyler', 50, 45, 'hello', 0, 26, 1, 0, 26, '', '/sam_public/images/uploads/products/22323.jpg', '', 1, 0, 1, 0, '', '2018-10-05 10:51:31', '2018-10-26 11:15:35', NULL),
(2, 'tyler one two', 500, 400, 'hello hhellooo', 0, 26, 2, 0, 26, '', '/sam_public/images/uploads/products/22323.jpg', '', 1, 0, 1, 0, '', '2018-10-05 10:51:59', '2018-10-26 11:27:26', NULL),
(6, 'new item ', 30, 5, 'new item', 0, 26, 3, 467, 26, '', '/sam_public/images/uploads/products/22323.jpg', '', 1, 1, 1, 0, '', '2018-10-07 17:57:35', '2018-10-31 03:25:33', NULL),
(7, 'this is the longest product name you will ever see in your life', 50000, 43720, 'this is descripttion of the longest product name', 0, 28, 4, 486, 34, '', '/sam_public/images/uploads/products/22323.jpg', '', 1, 0, 1, 0, '', '2018-10-08 11:59:11', '2018-10-31 03:05:32', NULL),
(8, 'lets add more item ', 400, 320, 'OKAY THANKS', 0, 27, 5, 0, 35, '', '/sam_public/images/uploads/products/54545.jpg', '', 1, 1, 1, 0, '', '2018-10-08 12:00:25', '2018-10-12 07:18:17', NULL),
(9, 'another item ', 483, 0, 'this is added to see if similar items are displayed properly', 0, 27, 6, 28, 34, '', '/sam_public/images/uploads/products/54545.jpg', '', 0, 1, 0, 0, '', '2018-10-09 04:00:00', '2018-10-26 10:55:58', NULL),
(10, 'an Item', 123, 0, 'an item\'s detail', 0, 26, 6, 29, 26, '', '/sam_public/images/uploads/products/54545.jpg', '', 0, 0, 0, 0, '', '2018-10-13 15:32:38', '2018-10-13 15:32:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `type_default` text NOT NULL,
  `local` text NOT NULL,
  `order` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `name`, `type_default`, `local`, `order`) VALUES
(1, 'Next Day (Order placed before 5 pm) ', 'yes', 'yes', 1),
(3, 'Standard 3-5 Days', 'no', 'yes', 2),
(4, 'Economy 5-7 Days', 'no', 'yes', 3),
(5, 'Express International', 'yes', 'no', 1),
(6, 'Standard International', 'no', 'no', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `image_path`) VALUES
(1, 'slide number 1', 'images\\slide_images\\slideimage1.jpg'),
(2, 'slide number 2', 'images\\slide_images\\slideimage2.jpg'),
(3, 'slide number 3', 'images\\slide_images\\slideimage3.jpg'),
(4, 'slide number 4', 'images\\slide_images\\slideimage4.jpg');

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
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image_path` text NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `firstname`, `lastname`, `email`, `password`, `role`, `address`, `city`, `state`, `country`, `zipcode`, `phone`, `image_path`, `ip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'store', 'Anak Wannaphaschaiyong', '', '', 'terngoodod@yahoo.com', '$2y$10$cdEpiuzL49ca7prLhvHgpOlaA.R3ST9XIMj5pyDGpYvTMYcMBcTdO', 'user', '', NULL, '', '', '', '', '/sam_public/images/customer_images/demo_user.png', '', '2018-10-11 11:47:42', '2018-10-11 04:00:00', NULL),
(2, 'you tell me', 'Your name', '', '', 'terngoodod@gmail.com', '$2y$10$m6VaULojDKCQJdHBwIg9NefzM0Cv5Izp4R.Li8KCGUHWBo0Gr/vGm', 'user', '', NULL, '', '', '', '', '/sam_public/images/customer_images/demo_user.png', '', '2018-10-11 11:49:15', '2018-10-14 11:23:12', NULL),
(3, 'terngoodod', 'Admin name', 'Admin', 'name', 'awannaphasch2016@fau.edu', '$2y$10$P3TVPJi2GNAIAu7Ikq6tTOHCMQtL1m81NE41SofuV83j0YWqAuwBS', 'admin', 'this is my address kup', 'Boca Raton', 'FL', 'USA', '33486', '5614138708', '/sam_public/images/customer_images/demo_user.png', '', '2018-10-12 11:24:00', '2018-10-14 11:07:25', NULL),
(4, 'sammy', 'Samsung', '', '', 'samkup@fau.edu', '$2y$10$xZ7d94RreiaCg/jWwqvhie3gfmJaFCOG06KO2UhKjW9kuIYFprR/q', 'user', '', NULL, '', '', '', '', '/sam_public/images/customer_images/demo_user.png', '', '2018-10-14 11:28:24', '2018-10-14 11:28:24', NULL),
(5, 'Billy', 'Bill XOX', '', '', 'BilloheheXD@yahoo.com', '$2y$10$LvH7oYZLeHJ4Jzmzh26ZnedHcCvwMOP0I9FBzXhOVAxdFZQoagbiG', 'user', '', NULL, '', '', '', '', '/sam_public/images/customer_images/demo_user.png', '', '2018-10-14 12:03:25', '2018-10-14 12:03:25', NULL),
(6, 'terngterng', 'RdouleK', '', '', 'terng1234@gmail.com', '$2y$10$NgA0b74Sq2Hf3h1mNN252.onESMF4oAgqnVSa/FJ8RTtW7nODLTSa', 'user', '', NULL, '', '', '', '', '/sam_public/images/customer_images/demo_user.png', '', '2018-10-14 12:34:25', '2018-10-14 12:35:22', '2018-10-14 12:35:22'),
(8, 'testtest', '', '', '', 'testtest@gmail.com', '$2y$10$ceKLyt18.PBQP2MQZNHlau5W1aaYV9b4vFu8wG8pMEAK20V1/qow6', 'user', 'testtest', 'testtest', 'testtest', 'testtest', '33486', '5614138708', '', '', '2018-10-25 04:50:45', '2018-10-25 04:57:16', '2018-10-25 04:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `zone_order` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `name`, `zone_order`) VALUES
(3, 'SEA ZONE', 1);

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
-- Indexes for table `item_ratings`
--
ALTER TABLE `item_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `item_ratings`
--
ALTER TABLE `item_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
