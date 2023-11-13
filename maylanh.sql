-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 11:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maylanh`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bil_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `prd_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(10) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Panasonic'),
(2, 'LG'),
(3, 'SAMSUNG');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `prd_id` int(10) NOT NULL,
  `num` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `username`, `prd_id`, `num`) VALUES
(3, 'user', 2, 1),
(7, 'user', 4, 1),
(8, 'user', 1, 1),
(21, 'admin', 3, 5),
(22, 'admin', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prd_id` int(10) NOT NULL,
  `prd_name` varchar(100) NOT NULL,
  `prd_price` decimal(50,0) NOT NULL,
  `prd_pricenew` float DEFAULT NULL,
  `prd_special` varchar(100) DEFAULT NULL,
  `prd_size` varchar(50) NOT NULL,
  `prd_inverter` varchar(10) NOT NULL DEFAULT 'Không',
  `prd_color` varchar(20) NOT NULL,
  `prd_vol` int(10) NOT NULL,
  `prd_speedlvl` int(10) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `brand_id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prd_id`, `prd_name`, `prd_price`, `prd_pricenew`, `prd_special`, `prd_size`, `prd_inverter`, `prd_color`, `prd_vol`, `prd_speedlvl`, `picture`, `views`, `brand_id`, `type_id`) VALUES
(1, 'Máy lạnh ngon 1', 10000000, NULL, NULL, '100x100', 'Có', 'light', 300, 3, 'ml.jpg', 6, 1, 3),
(2, 'Máy lạnh 2', 12000000, NULL, NULL, '100x100', 'Không', 'light', 300, 3, 'ml.jpg', 227, 1, 2),
(3, 'Máy lạnh ngon 3', 100000000, NULL, NULL, '100x100', 'Không', 'light', 300, 3, 'ml.jpg', 19, 2, 3),
(4, 'Máy lạnh 4', 100000000, NULL, NULL, '100x100', 'Không', 'red', 220, 24, 'ml.jpg', 121, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(10) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'Treo tường'),
(2, 'Tủ đứng'),
(3, 'Âm trần');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phonenumber` varchar(10) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `permission` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `phonenumber`, `mail`, `address`, `permission`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '', b'1'),
('user', '25d55ad283aa400af464c76d713c07ad', '1234567890', 'user@user.com', 'Ở đâu đó không biết', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bil_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
