-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2019 at 03:47 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `south_shores`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audit`
--

CREATE TABLE `tbl_audit` (
  `audit_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_generated` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_audit`
--

INSERT INTO `tbl_audit` (`audit_id`, `content`, `date_generated`, `user_id`) VALUES
(2, 'has logged in', '2019-03-04 05:03:20', 3),
(3, 'has logged in', '2019-03-04 05:03:06', 3),
(4, 'has logged in', '2019-03-05 12:03:20', 3),
(5, 'has logged in', '2019-03-11 10:03:50', 3),
(6, 'has logged in', '2019-03-11 10:03:54', 3),
(7, 'added PESCADOR ISLAND-MOALBOAL HOPPING PACKAGE package', '2019-03-11 11:03:56', 3),
(8, 'Administrator has logged in', '2019-03-24 12:03:25', 3),
(9, ' added Test package', '2019-03-24 12:03:01', 3),
(10, 'has logged in', '2019-03-24 01:03:49', 3),
(11, ' added Test package', '2019-03-24 02:03:20', 3),
(12, ' added test package', '2019-03-24 03:03:02', 3),
(13, 'has logged in', '2019-03-27 11:03:02', 3),
(14, 'test has logged in', '2019-03-28 12:03:35', 4),
(15, 'has logged in', '2019-03-28 01:03:07', 3),
(16, 'has logged in', '2019-04-01 08:04:42', 3),
(17, ' Completed Transaction #TT5C9B9EE55F5B5', '2019-04-01 09:04:34', 3),
(19, ' Added payment, Amount PHP12912.50 on Transaction #TT5C9B9EE55F5B5', '2019-04-01 09:04:19', 3),
(20, ' Completed Transaction #MS5C982B016AA1A', '2019-04-01 09:04:26', 3),
(21, ' Added payment, Amount PHP500 on Transaction #TT5C9B9EE55F5B5', '2019-04-01 09:04:42', 3),
(22, 'Administrator has logged in', '2019-04-01 11:04:02', 3),
(23, ' Added payment, Amount PHP12,412.50 on Transaction #TT5C9B9EE55F5B5', '2019-04-01 11:04:06', 3),
(24, ' Added payment, Amount PHP12,412.50 on Transaction #TT5C9B9EE55F5B5', '2019-04-01 11:04:56', 3),
(25, ' Added payment, Amount PHP12400.50 on Transaction #TT5C9B9EE55F5B5', '2019-04-01 11:04:38', 3),
(26, ' Added payment, Amount PHP12412.50 on Transaction #TT5C9B9EE55F5B5', '2019-04-01 11:04:06', 3),
(27, 'test has logged in', '2019-04-01 11:04:04', 4),
(28, ' Completed Transaction #MS5C982B016AA1A', '2019-04-01 11:04:03', 4),
(29, 'Administrator has logged in', '2019-04-07 03:04:45', 3),
(30, 'test has logged in', '2019-04-07 06:04:33', 7),
(31, 'test has logged in', '2019-04-07 06:04:16', 7),
(32, 'Administrator has logged in', '2019-04-07 06:04:13', 3),
(33, 'test1 has logged in', '2019-04-07 06:04:42', 8),
(34, 'Administrator has logged in', '2019-04-07 06:04:54', 3),
(35, 'test has logged in', '2019-04-07 06:04:43', 7),
(36, 'test1 has logged in', '2019-04-07 06:04:22', 8),
(37, 'test has logged in', '2019-04-07 06:04:08', 7),
(38, 'Administrator has logged in', '2019-04-07 06:04:17', 3),
(39, 'Administrator has logged in', '2019-04-07 07:04:03', 3),
(40, 'Administrator has logged in', '2019-04-07 07:04:36', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_inclusions` text NOT NULL,
  `package_complementary` varchar(255) NOT NULL,
  `package_intinerary` text NOT NULL,
  `excess_payment` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`package_id`, `package_name`, `package_inclusions`, `package_complementary`, `package_intinerary`, `excess_payment`, `status`, `added_by`) VALUES
(3, 'WHALE SHARKS SWIMMING + TUMALOG FALLS', '<p>\r\n\r\nPrivate Tour<br>Private Air-conditioned Vehicle<br>Local driver guide<br>Site Facilitator<br>Venue Entrance Fee<br>Lunch w/ drinks<br>Light Breakfast in Oslob<br>Fees for Whale sharks swimming<br>Boat ride, complete swimming gear, life vest and snorkel.<br>Boatman/guide to Whaleshark<br>Pick-Up/Drop-Off to your Hotel\r\n\r\n<br></p>', 'Bath Towel\r\nBottled Water', '<p>\r\n\r\n04:00am-Pick up in your Hotel<br>07:00am- Breakfast in Oslob<br>07:30am-Whaleshark Swimming<br>11:00am- Cool Down at Tumalog Falls<br>11:30PM- Lunch<br>01:30pm- Wash-Up<br>02:00pm- Travel back to Cebu City<br>03:30pm- Arrived and Drop you off in your Hotel in Cebu or Mactan.<br>This is just an estimated time.\r\n\r\n<br></p>', 1, 1, 3),
(4, 'CANYONEERING ACTIVITIES + KAWASAN FALLS PACKAGE', '<p>\r\n\r\nPrivate Tour<br>Private Air-conditioned vehicle<br>With Driver Guide<br>With Canyoneering Fee<br>Lunch w/ drinks<br>With Kawasan Entrance Fee<br>Motorbike Ride Fee<br>With Complete Safety Gear (helmet, life vest, rubber shoes and etc.)<br>With professional Canyoneering Guide<br>Pick-Up/Drop-Off to your Hotel\r\n\r\n<br></p>', 'Bath Towel\r\nDistilled Bottled Water', '<p>\r\n\r\n06:00am-Pick up in your Hotel (Mactan or Cebu City)<br>08:00am- Canyoneering Registration and Safety Orientation/Change safety gear<br>08:30am- Motorbike ride going to Starting Point<br>09:45am-Canyoneering Activities<br>12:30pm- Kawasan Falls Swimming<br>01:00Pm Lunch<br>02:00pm-Wash Up<br>02:30pm-Travel back to Cebu City<br>04:00-Arrived &amp; drop off in your hotel in Cebu City<br>This is just an estimated time\r\n\r\n<br></p>', 0, 1, 3),
(5, 'PESCADOR ISLAND-MOALBOAL HOPPING PACKAGE', '<p>\r\n\r\nPrivate Tour<br>Private Air condition Vehicle<br>Local driver Guide<br>Lunch w/ drinks<br>Pescador Island Tourism Fee<br>Private Boat<br>Guide men, snorkel and lifevest<br>Pescador Island<br>Turtle Hunting<br>Million Sardines Run<br>Dolphin Watching (Weather dependent)<br>Pick-Up/Drop-Off to your Hotel\r\n\r\n<br></p>', 'Distilled bottled water\r\nBath Towel', '<p>\r\n\r\n06:00am-Pick up in your Hotel<br>08:30am- Arrive in Moalboal Tourism Office<br>09:00am- Pescador Island<br>10:00am- Turtle Hunting<br>11:00am- Million Sardines<br>12:30pm- Back to Basdiot Wharf/ Wash up<br>01:00m- Lunch<br>02:20pm-Travel back to Cebu City<br>04:30-Arrived in your hotel at Cebu City<br>This is just an estimated.\r\n\r\n<br></p>', 1, 1, 3),
(8, 'test', '<p>test<br></p>', 'test', '<p>test<br></p>', 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `added_by` int(11) DEFAULT '0',
  `date_paid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `reservation_id`, `amount_paid`, `added_by`, `date_paid`) VALUES
(1, 6, '13912.50', 0, '2019/03/27'),
(2, 6, '1000', 0, '2019/03/27'),
(6, 7, '10920.00', 0, '2019/03/27'),
(9, 6, '500', 3, '2019/04/01'),
(14, 8, '13912.50', 0, '2019/04/07'),
(16, 10, '10000', 0, '2019/04/07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_type`
--

CREATE TABLE `tbl_payment_type` (
  `id` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment_type`
--

INSERT INTO `tbl_payment_type` (`id`, `payment_type`) VALUES
(1, 'BDO'),
(3, 'Western Union');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `trans_date` varchar(100) NOT NULL,
  `package_id` int(11) NOT NULL,
  `paid_amount` varchar(100) NOT NULL,
  `lead_guest_name` varchar(255) NOT NULL,
  `number_of_people` int(11) NOT NULL,
  `number_of_filipino` int(11) DEFAULT '0',
  `pickup_address` varchar(255) NOT NULL,
  `tour_date` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `special_request` text NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_gateway` varchar(255) NOT NULL,
  `payment_status` int(11) DEFAULT '0',
  `site` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`id`, `transaction_id`, `trans_date`, `package_id`, `paid_amount`, `lead_guest_name`, `number_of_people`, `number_of_filipino`, `pickup_address`, `tour_date`, `email_address`, `phone_number`, `special_request`, `payment_type`, `payment_gateway`, `payment_status`, `site`, `status`) VALUES
(6, 'TT5C9B9EE55F5B5', '2019/03/27', 3, '27825', 'test test', 10, 0, 'test', '03/28/2019', 'test@gmail.com', '0999', 'test test test', 1, 'paypal', 0, 1, 0),
(7, 'MS5C982B016AA1A', '2019/03/27', 4, '10920.00', 'Mary Stone', 2, 0, 'J Park Island Resort and Waterpark', '03/29/2019', 'mcstone414@hotmail.com', '2515450707', '-', 2, 'paypal', 0, 1, 1),
(8, 'TT5CA9E2AF03D41', '2019/04/07', 3, '27825', 'test test', 10, 0, 'test', '04/07/2019', 'test@gmail.com', '0933', 'test', 1, 'paypal', 0, 1, 0),
(10, '21321312', '2019/04/07', 3, '20000', 'test test', 10, 0, 'test', '04/09/2019', 'test@gmail.com', '04342432', 'yrdy', 1, 'BDO', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sites`
--

CREATE TABLE `tbl_sites` (
  `site_id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sites`
--

INSERT INTO `tbl_sites` (`site_id`, `site_name`, `site_url`) VALUES
(1, 'South Shore', 'southshoretours.com'),
(4, 'Affordable', 'afforadble.php');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_package`
--

CREATE TABLE `tbl_sub_package` (
  `id` int(11) NOT NULL,
  `fk_package_id` int(11) NOT NULL,
  `price` varchar(255) DEFAULT '0',
  `per_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_package`
--

INSERT INTO `tbl_sub_package` (`id`, `fk_package_id`, `price`, `per_person`) VALUES
(4, 3, '8,100', 1),
(5, 3, '4,750', 2),
(6, 3, '3,650', 3),
(7, 3, '3,500', 4),
(8, 3, '3,050', 5),
(9, 3, '2,500', 6),
(10, 3, '2,365', 7),
(11, 3, '2,250', 8),
(12, 3, '2,220', 9),
(13, 3, '2,150', 10),
(14, 3, '2,050', 11),
(15, 3, '2,000', 12),
(16, 3, '1,950', 13),
(17, 3, '1,900', 14),
(18, 3, '1,880', 15),
(19, 4, '8,500', 1),
(20, 4, '5,200', 2),
(21, 4, '4,100', 3),
(22, 4, '3,350', 4),
(23, 4, '3,300', 5),
(24, 4, '3,050', 6),
(25, 4, '2,850', 7),
(26, 4, '2,800', 8),
(27, 4, '2,750', 9),
(28, 4, '2,700', 10),
(29, 4, '2,600', 11),
(30, 4, '2,550', 12),
(31, 4, '2,500', 13),
(32, 4, '2,450', 14),
(33, 4, '2,400', 15),
(34, 5, '10,000', 1),
(35, 5, '5,300', 2),
(36, 5, '3,750', 3),
(37, 5, '2,950', 4),
(38, 5, '2,580', 5),
(39, 5, '2,250', 6),
(40, 5, '2,100', 7),
(41, 5, '1,900', 8),
(42, 5, '1,820', 9),
(43, 5, '1,700', 10),
(44, 5, '1,600', 11),
(45, 5, '1,550', 12),
(46, 5, '1,450', 13),
(47, 5, '1,390', 14),
(48, 5, '1,300', 15),
(80, 8, '123234', 1),
(81, 8, '123231231', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `site_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `fullname`, `password`, `site_id`, `user_type`, `user_status`) VALUES
(3, 'administrator', 'Administrator', '$2y$10$RmKQPxNkuCeFxUtStOCsjuiPHXelMfiufrHjpwzxG82DeXOpVmlh2', 0, 0, 1),
(7, 'test', 'test', '$2y$10$QeUNwtgWEa8mY0tD3KyGdetr2y0QmOfLHljkPGpCZLkr5uG2TXmN2', 1, 1, 1),
(8, 'test1', 'test1', '$2y$10$YjxEHh.xDAnfqadWEJ.XVO9yBT5qSZWI9RNiiB2VVnwJzLdt3OvyW', 4, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_audit`
--
ALTER TABLE `tbl_audit`
  ADD PRIMARY KEY (`audit_id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment_type`
--
ALTER TABLE `tbl_payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sites`
--
ALTER TABLE `tbl_sites`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `tbl_sub_package`
--
ALTER TABLE `tbl_sub_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_audit`
--
ALTER TABLE `tbl_audit`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_payment_type`
--
ALTER TABLE `tbl_payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_sites`
--
ALTER TABLE `tbl_sites`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_sub_package`
--
ALTER TABLE `tbl_sub_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
