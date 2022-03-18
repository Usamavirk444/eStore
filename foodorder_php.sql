-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2022 at 04:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodorder_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_admin`
--

CREATE TABLE `food_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_admin`
--

INSERT INTO `food_admin` (`admin_id`, `full_name`, `username`, `password`) VALUES
(1, 'usama', 'admin', 'admin'),
(2, 'admin1', 'admin1', 'admin1'),
(3, 'admin2', 'admin2', 'admin22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_title` varchar(100) NOT NULL,
  `tbl_img` varchar(255) NOT NULL,
  `tbl_featured` varchar(10) NOT NULL,
  `tbl_active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_title`, `tbl_img`, `tbl_featured`, `tbl_active`) VALUES
(2, 'Pizza', '53110049.png', 'Yes', 'Yes'),
(3, 'burger', 'a.jpg', 'Yes', 'Yes'),
(4, 'sandwich', '54714340.jpg', 'Yes', 'Yes'),
(5, 'burger 2', 'flat-design-concept.jpg', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `food_id` int(10) UNSIGNED NOT NULL,
  `food_title` varchar(150) NOT NULL,
  `food_des` text NOT NULL,
  `food_price` decimal(10,2) NOT NULL,
  `food_img` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`food_id`, `food_title`, `food_des`, `food_price`, `food_img`, `category_id`, `featured`, `active`) VALUES
(2, 'Smoky Burger', 'Made with Italian Sauce, Chicken and organice vegetables', '499.00', 'menu-burger.jpg', 3, 'Yes', 'Yes'),
(3, 'Food Title', 'Made with Italian Sauce, Chicken and organice vegetables', '999.00', 'menu-pizza.jpg', 2, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_food` varchar(150) NOT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_food`, `order_price`, `order_qty`, `order_total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Food Title', '999.00', 3, '2997.00', '2022-02-13 12:38:11', 'Delivered', 'Usama', '03110098776', 'admin@gmail.com', 'sheikhupura street no 1'),
(3, 'Smoky Burger', '499.00', 2, '998.00', '2022-02-13 04:24:54', 'Ordered', 'Rehan', '03436100000', 'mrehan308jb@gmail.com', 'gojra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_admin`
--
ALTER TABLE `food_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_admin`
--
ALTER TABLE `food_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `food_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
