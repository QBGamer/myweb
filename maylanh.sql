-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 02:34 AM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `username` varchar(100) NOT NULL,
  `prd_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ctg_id` int(10) NOT NULL,
  `ctg_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prd_id` int(10) NOT NULL,
  `prd_name` varchar(100) NOT NULL,
  `prd_price` float NOT NULL,
  `prd_pricenew` float DEFAULT NULL,
  `prd_brand` varchar(100) NOT NULL,
  `prd_special` varchar(100) DEFAULT NULL,
  `prd_size` varchar(50) NOT NULL,
  `prd_floorsize` varchar(50) NOT NULL,
  `prd_color` varchar(20) NOT NULL,
  `prd_vol` int(10) NOT NULL,
  `prd_speedlvl` int(10) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `views` int(11) NOT NULL,
  `ctg_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prd_id`, `prd_name`, `prd_price`, `prd_pricenew`, `prd_brand`, `prd_special`, `prd_size`, `prd_floorsize`, `prd_color`, `prd_vol`, `prd_speedlvl`, `picture`, `views`, `ctg_id`) VALUES
(1, 'test', 1000, NULL, 'Sorry', NULL, '1', '1', '1', 1, 1, 'img1.png', 1, 1),
(2, 'qweqweqweqwe', 1, NULL, '1', NULL, '1', '1', '1', 1, 1, 'img.png', 1, 1);

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ctg_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
