-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 06:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_status`) VALUES
(1, 'Gap', 2),
(2, 'Forever 21', 2),
(3, 'Gap', 2),
(4, 'Forever 21', 2),
(5, 'Adidas', 2),
(6, 'Gap', 2),
(7, 'Forever 21', 2),
(8, 'Adidas', 2),
(9, 'Gap', 2),
(10, 'Forever 21', 2),
(11, 'Adidas', 1),
(12, 'Gap', 1),
(13, 'Forever 21', 1),
(14, 'puma', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_status`) VALUES
(1, 'Music Instruments', 1),
(2, 'Books', 1),
(3, 'Cassetes', 1),
(4, 'Sport', 2),
(5, 'Casual', 2),
(6, 'Sport wear', 2),
(7, 'Casual wear', 2),
(8, 'Sports ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `order_id` int(100) NOT NULL,
  `fullname` text NOT NULL,
  `phone` bigint(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `paymode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`order_id`, `fullname`, `phone`, `address`, `paymode`) VALUES
(22, 'ra', 87586, 'fut', 'COD'),
(23, 'chetan', 1234, 'qwerty', 'COD'),
(24, 'hfdrd', 32342, 'dfsgfdgb', 'COD'),
(25, 'qssr', 98755687, 'fdfgdtr', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `active`, `status`) VALUES
(1, 'Piano-1', 'images/p1.jpg', 1, 1, '19', '1500', 2, 2),
(2, 'Book-1', 'images/book.jfif', 2, 2, '9', '1200', 2, 2),
(3, 'Cassete-1', 'images/cassete.png', 5, 3, '18', '1200', 2, 2),
(4, 'Piano-2', 'images/p1.jpg', 6, 1, '29', '1000', 2, 2),
(5, 'Book-2', 'images/book.jfif', 8, 2, '17', '1200', 2, 2),
(6, 'Cassete-2', 'images/cassete.png', 9, 3, '29', '1200', 2, 2),
(7, 'Piano-3', 'images/p1.jpg', 11, 1, '28', '1200', 1, 1),
(8, 'Book-3', 'images/book.jfif', 12, 2, '9', '1200', 1, 1),
(9, 'Cassete-3', 'images/cassete.png', 13, 3, '2', '800', 1, 1),
(10, 'Piano-4', 'images/p1.jpg', 1, 1, '1', '900', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(90) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`) VALUES
(1, 'email', 'admin@example.com', '$2y$10$oIfzUsVUCJfCJPCaLJPQ7.KqEKII/1MIRHT4joOOOTrmxxoa0oreG', 1122112211),
(14, 'test', 'test@email.com', '$2y$10$xRYLUga7ezMWZXJqiPnrjOkpqi5amdbxoH77RwuFFPyvM1TRPSXaq', 2147483647),
(15, 'test-1', 'test1@email.com', '$2y$10$RhbRsDppVrKBz/2/k96CLeK2rGPfVCUFEZzXb.wBbyw1GVaT02hxK', 2147483647),
(16, 'cheta', 'test@email.com', '$2y$10$4CPmOnZ9IvuFCKHMVx5hsuKx.CbXZXjUKBHm2jyhPkjs0aKIFLlbS', 111111),
(17, 'admin', 'admin@email.com', '$2y$10$WczsAuao18XH.nafjzA1iu.1Wb9sXf3PoopQMkAktoBnIQEAwNE1e', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(100) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `itemname`, `price`, `qty`) VALUES
(20, 'Cassete-1', 1200, 1),
(21, 'Cassete-1', 1200, 1),
(21, 'Piano-2', 1000, 2),
(22, 'Piano-1', 1500, 1),
(23, 'Piano-2', 1000, 1),
(23, 'Piano=3', 1200, 2),
(24, 'Piano-1', 1500, 1),
(25, 'Piano-1', 1500, 2),
(25, 'Piano-2', 1000, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
