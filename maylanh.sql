-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 04:40 PM
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
  `brand-id` int(10) NOT NULL,
  `brand-name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand-id`, `brand-name`) VALUES
(1, 'Panasonic'),
(2, 'LG'),
(3, 'SAMSUNG');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `username` varchar(100) NOT NULL,
  `prd_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `prd_floorsize` varchar(50) NOT NULL,
  `prd_color` varchar(20) NOT NULL,
  `prd_vol` int(10) NOT NULL,
  `prd_speedlvl` int(10) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `brand_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prd_id`, `prd_name`, `prd_price`, `prd_pricenew`, `prd_special`, `prd_size`, `prd_floorsize`, `prd_color`, `prd_vol`, `prd_speedlvl`, `picture`, `views`, `brand_id`) VALUES
(3, 'Máy lạnh 1', 10000000, NULL, NULL, '100x100', '100x100', 'light', 300, 3, 'ml.jpg', 5, 1),
(4, 'Máy lạnh 2', 12000000, NULL, NULL, '100x100', '100x100', 'light', 300, 3, 'ml.jpg', 220, 1),
(5, 'Máy lạnh 3', 100000000, NULL, NULL, '100x100', '100x100', 'light', 300, 3, 'ml.jpg', 0, 1),
(6, 'Máy lạnh 4', 100000000, NULL, NULL, '100x100', '100x100', 'red', 220, 24, 'ml.jpg', 120, 2);

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
  `phonenumber` int(10) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `permission` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `phonenumber`, `mail`, `address`, `permission`) VALUES
('admin', 'admin', NULL, NULL, NULL, b'1'),
('user', '123456', 123456789, 'user@gmail.com', 'Vĩnh Long', NULL);

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
  ADD PRIMARY KEY (`brand-id`);

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
  MODIFY `brand-id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
