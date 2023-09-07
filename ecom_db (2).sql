-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2023 at 12:17 PM
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
-- Database: `ecom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products_table`
--
-- Error reading structure for table ecom_db.products_table: #1932 - Table &#039;ecom_db.products_table&#039; doesn&#039;t exist in engine
-- Error reading data for table ecom_db.products_table: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `ecom_db`.`products_table`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `last_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `posted_by` varchar(255) NOT NULL,
  `posted_by_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`id`, `product_name`, `category`, `description`, `price`, `image`, `last_updated`, `posted_by`, `posted_by_name`) VALUES
(56, 'VIVO', 'Home Essentials', 'Urgent Sale  Full condition zero scretch 100% original mobile og charger bill box available 6/128', 10000, '45846Vivo.webp', '2023-09-06 00:13:16', 'd@gmail.in', 'Dishil'),
(58, 'All types of mobile phones ', 'Mobile', 'All types of mobile phones available in stock contact +91987654321 to get more details about products', 100000, '63655mobiles.jpg', '2023-09-06 19:49:50', 'parth123@gmail.com', 'Parthh'),
(59, 'Vase', 'Home Essentials', 'Porcelain glass vase with artificial roses ', 500, '2706416940110775583449235618158799303 (1).jpg', '2023-09-06 20:08:57', 'shaikh56742@gmail.com', 'MUBASHIR SHAIKH'),
(60, 'Wave Fitness watch', 'Others', 'This is a premium waterproof sports watch ', 3500, '1472016940179054335594759564800380000.jpg', '2023-09-07 00:06:36', 'p@gm.in', 'Dummy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `user_pp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `user_pp`) VALUES
(2, 'MUBASHIR SHAIKH', 'shaikh56742@gmail.com', '123', 7208618752, '34138IMG_20220910_001309-removebg-preview.png'),
(3, 'Parthh', 'parth123@gmail.com', '123', 90080070, '6926616940096986384975297588156052000.jpg'),
(5, 'Dishil', 'd@gmail.in', '123', 987654321, '41867EduBytes.png'),
(7, 'Dummy', 'p@gm.in', '123', 90040050, '86853IMG_20210723_213922_368.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
