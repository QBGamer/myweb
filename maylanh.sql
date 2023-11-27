-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 06:28 PM
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
  `date` datetime NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `total` float NOT NULL,
  `stats` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bil_id`, `date`, `username`, `phone`, `mail`, `address`, `total`, `stats`) VALUES
(11, '2023-11-26 13:46:43', 'user', '1234567890', 'binh@gmail.com', 'ABCDEF', 108000000000, 0),
(12, '2023-11-26 13:49:24', 'user', '1234567890', 'binh@gmail.com', 'ABCDEF', 109200000000, 1),
(13, '2023-11-26 14:53:01', 'admin', '', '', '', 130000000000, 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `item_bill`
--

CREATE TABLE `item_bill` (
  `bill_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_bill`
--

INSERT INTO `item_bill` (`bill_id`, `item_id`, `num`) VALUES
(11, 2, 10),
(12, 2, 10),
(12, 3, 12),
(13, 3, 4),
(13, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prd_id` int(10) NOT NULL,
  `prd_name` varchar(100) NOT NULL,
  `prd_price` decimal(50,0) NOT NULL,
  `prd_pricenew` float DEFAULT NULL,
  `prd_size` varchar(50) NOT NULL,
  `prd_inverter` varchar(10) NOT NULL DEFAULT 'Không',
  `prd_color` varchar(20) NOT NULL,
  `prd_vol` int(10) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `brand_id` int(10) DEFAULT NULL,
  `type_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prd_id`, `prd_name`, `prd_price`, `prd_pricenew`, `prd_size`, `prd_inverter`, `prd_color`, `prd_vol`, `picture`, `views`, `brand_id`, `type_id`) VALUES
(1, 'Máy Lạnh LG V10API1', 11000000, 12, '100x100', 'Có', 'light', 300, '27112023181123.png', 6, 2, 1),
(2, 'Máy lạnh LG V10WIN', 12200000, NULL, '100x100', 'Không', 'light', 220, '27112023180845.png', 323, 1, 1),
(3, 'Máy lạnh LG V10WIN', 9590000, NULL, '100x100', 'Không', 'light', 300, '27112023181014.png', 33, 2, 2),
(4, 'Máy lạnh LG RAS-H10C4KCVG-V', 9000000, 5, '100x100', 'Có', 'red', 220, '27112023180416.png', 126, 1, 1),
(7, 'Máy Lạnh Âm Trần Samsung AC035TN1DKC/EA', 25000000, NULL, '200x200', 'Không', 'Trắng', 220, '27112023181832.png', 117, 1, 1),
(17, 'Máy Lạnh Âm Trần Panasonic HP S-3448PU3H', 50000000, 15, '500x500', 'Có', 'Trắng', 220, '27112023181214.png', 2, 1, 3);

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
('admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, b'1'),
('user', '25d55ad283aa400af464c76d713c07ad', '1234567890', 'binh@gmail.com', 'ABCDEF', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bil_id`),
  ADD KEY `FK_BILL_User` (`username`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `FK_user` (`username`),
  ADD KEY `FK_Cart_Prd` (`prd_id`);

--
-- Indexes for table `item_bill`
--
ALTER TABLE `item_bill`
  ADD KEY `FK_BILL_BILL` (`bill_id`),
  ADD KEY `FK_PRD` (`item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`),
  ADD KEY `FK_brand` (`brand_id`),
  ADD KEY `FK_type` (`type_id`);

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
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bil_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `FK_BILL_User` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_Cart_Prd` FOREIGN KEY (`prd_id`) REFERENCES `product` (`prd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_bill`
--
ALTER TABLE `item_bill`
  ADD CONSTRAINT `FK_BILL_BILL` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bil_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PRD` FOREIGN KEY (`item_id`) REFERENCES `product` (`prd_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_type` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
