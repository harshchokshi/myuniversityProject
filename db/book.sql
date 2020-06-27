-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2017 at 10:11 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--



CREATE TABLE `buyer` (
  `buyer_id` int(10) NOT NULL,
  `buyer_name` varchar(400) NOT NULL,
  `buyer_email` varchar(500) NOT NULL,
  `buyer_phone` int(100) NOT NULL,
  `buyer_image` varchar(500) NOT NULL,
  `buyer_password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyer_id`, `buyer_name`, `buyer_email`, `buyer_phone`, `buyer_image`, `buyer_password`) VALUES
(3, 'Chintan Buyer', 'buyer@gmail.com', 2147483647, 'buyer1.jpg', '794aad24cbd58461011ed9094b7fa212');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `item_type` varchar(500) NOT NULL,
  `item_name` varchar(500) NOT NULL,
  `item_image` varchar(500) NOT NULL,
  `item_file` varchar(500) NOT NULL,
  `item_desc` text NOT NULL,
  `item_price` int(100) NOT NULL,
  `item_sell_type` varchar(200) NOT NULL,
  `item_sold` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `seller_id`, `item_type`, `item_name`, `item_image`, `item_file`, `item_desc`, `item_price`, `item_sell_type`, `item_sold`) VALUES
(7, 6, 'Document', 'Java Assignment', 'bookchintan2.jpg', 'ITECH2100 Prog2 - Major Assign -  Sem2 2017.pdf', 'THis is java asisgnment', 10, 'Multi-Sell', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_feedback`
--

CREATE TABLE `item_feedback` (
  `feedback_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `buyer_id` int(10) NOT NULL,
  `feedback_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_feedback`
--

INSERT INTO `item_feedback` (`feedback_id`, `item_id`, `seller_id`, `buyer_id`, `feedback_text`) VALUES
(1, 7, 0, 3, 'Excellent assignment i found');

-- --------------------------------------------------------

--
-- Table structure for table `item_sell`
--

CREATE TABLE `item_sell` (
  `sell_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `buyer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_sell`
--

INSERT INTO `item_sell` (`sell_id`, `item_id`, `buyer_id`) VALUES
(18, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(10) NOT NULL,
  `seller_name` varchar(400) NOT NULL,
  `seller_email` varchar(500) NOT NULL,
  `seller_phone` int(100) NOT NULL,
  `seller_image` varchar(500) NOT NULL,
  `seller_password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `seller_name`, `seller_email`, `seller_phone`, `seller_image`, `seller_password`) VALUES
(6, 'Chintan Seller', 'seller@gmail.com', 2147483647, 'seller1.jpg', '64c9ac2bb5fe46c3ac32844bb97be6bc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyer_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `item_feedback`
--
ALTER TABLE `item_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `item_sell`
--
ALTER TABLE `item_sell`
  ADD PRIMARY KEY (`sell_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `buyer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `item_feedback`
--
ALTER TABLE `item_feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `item_sell`
--
ALTER TABLE `item_sell`
  MODIFY `sell_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
