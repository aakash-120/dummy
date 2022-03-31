-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Mar 31, 2022 at 01:37 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

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
-- Table structure for table `alloweds`
--

CREATE TABLE `alloweds` (
  `id` int NOT NULL,
  `controllerAction` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alloweds`
--

INSERT INTO `alloweds` (`id`, `controllerAction`) VALUES
(1, '{\"role\": \"4\", \"submit\": \"Submit\", \"OrderController_add\": \"1\", \"IndexController_index\": \"1\", \"OrderController_index\": \"1\", \"OrderController_addtodb\": \"1\"}');

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `controller_id` int NOT NULL,
  `controller` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`controller_id`, `controller`) VALUES
(1, 'mycomponents'),
(2, 'index'),
(3, 'order'),
(4, 'product'),
(5, 'secure'),
(6, 'setting'),
(7, 'product update');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `zipcode`, `product`, `quantity`) VALUES
(1, 'bag', 'bag', 'bag', 'bag', 'bag'),
(2, 'aakash', 'lko', '201013', '2', '5'),
(3, 'bdf', 'bfd', 'berf', '4', 'bfde'),
(4, 'ashutosh', 'lko', '201013', '3', '10'),
(5, 'akshita', 'cdesw', '100', '3', 'cdas'),
(6, 'simran', 'gzb', '100', '4', '10'),
(7, 'mm', 'mm', '50', '11', 'mm');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `tags`, `price`, `stock`) VALUES
(1, 'chips', 'description', 'trending', 'price', 'stock'),
(2, 'cookies', 'description', 'trending', 'price', 'stock'),
(3, 'maggie', 'qq', 'trending', 'q', 'q'),
(4, 'tang', 'P', 'trending', 'P', 'P'),
(5, 'cold dricks', 'b', 'trending', 'b', 'b'),
(6, 'tea', 'l', 'old', 'l', 'l'),
(8, '4', '4', 'fresh piece', '4', '4'),
(9, 'ravinder vip', 'hiuman', 'vip', '2', '2'),
(10, 'fan', 'fan', 'trending', '100', '500'),
(11, 'dswa', 'vdesw', 'vwes', 'vwdes', 'vweds'),
(12, 'yyyy', 'yyy', 'yyyy', '100', '100'),
(13, 'xxxxx', 'xxxxx', 'xxxx', '100', '100'),
(14, 'vvv', 'vv', 'vv', '100', '100');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'users'),
(3, 'guest'),
(4, 'ravinder');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `Title_Optimization` varchar(100) NOT NULL,
  `Default_price` varchar(100) NOT NULL,
  `Default_Stock` varchar(100) NOT NULL,
  `Default_Zipcode` varchar(100) NOT NULL,
  `ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`Title_Optimization`, `Default_price`, `Default_Stock`, `Default_Zipcode`, `ID`) VALUES
('with_tags', '50', '50', '50', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alloweds`
--
ALTER TABLE `alloweds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`controller_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alloweds`
--
ALTER TABLE `alloweds`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `controller_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
