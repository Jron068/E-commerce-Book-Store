-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2025 at 12:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acc_credential`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`) VALUES
(1, 'aron@gmail.com', '1234'),
(2, 'dada@asda', 'dasda'),
(3, 'zaron@gmail.com', 'aron'),
(4, 'jack@gmail.com', 'aron');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `paymentMethod` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `number`, `address`, `paymentMethod`, `user_id`) VALUES
(1, 'Aron-John Castillo', 2147483647, 'adsadafaa', 'GCASH', NULL),
(2, 'Aron-John Castillo', 2147483647, 'adsadafaa', 'GCASH', NULL),
(3, 'Aron-John Castillo', 2147483647, 'adsadafaa', 'GCASH', 3),
(4, 'Aron-John Castillo', 2147483647, 'adsadafaa', 'GCASH', 3),
(5, 'Aron-John Castillo', 2147483647, 'adad', 'Cash on Delivery', 3),
(6, 'Aron-John Castillo', 2147483647, 'adsada', 'Cash on Delivery', 4);

-- --------------------------------------------------------

--
-- Table structure for table `productitem`
--

CREATE TABLE `productitem` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productitem`
--

INSERT INTO `productitem` (`id`, `name`, `price`, `image`) VALUES
(1, 'Sari-sari Stories', 150.00, 'book2.png'),
(2, 'Fearless Filipina II', 200.00, 'book3.png'),
(3, 'Lost You, Found Me', 400.00, 'book4.png'),
(4, 'The Finisher', 150.00, 'book5.png'),
(5, 'Laws of Motion & Attraction', 200.00, 'book6.png'),
(6, 'Holistically Fit', 350.00, 'book7.png'),
(7, 'Opening the Archipelago', 100.00, 'book8.png'),
(8, 'Words, Fate & Accident', 700.00, 'book1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_user` (`user_id`);

--
-- Indexes for table `productitem`
--
ALTER TABLE `productitem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `productitem`
--
ALTER TABLE `productitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_user` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
