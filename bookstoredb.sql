-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2024 at 05:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `allgenre`
--

CREATE TABLE `allgenre` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `author` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `price` int(20) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allgenre`
--

INSERT INTO `allgenre` (`id`, `name`, `author`, `date`, `price`, `genre`, `img`) VALUES
(2, 'Lord of the Ring', 'someguy', '1990', 25000, 'fantasy', '47AA615E-FFB7-4CC3-B126-257A3EEE3F5B_1_201_a.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `messagelist`
--

CREATE TABLE `messagelist` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messagelist`
--

INSERT INTO `messagelist` (`id`, `name`, `email`, `phone`, `message`) VALUES
(2, 'Bluga', 'bluga@gmail.com', '0912345678', 'Do you guys have Marvel new Comic?'),
(3, 'Khine Kyaw', 'kkk@gmail.com', '098213123123', 'Do you have laste Topik korea exam book?');

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `customer` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `quantity` int(20) NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`id`, `name`, `customer`, `address`, `phone`, `quantity`, `total`) VALUES
(39, '3 Idiots', 'Donald Duck', 'Yangon', '09123423', 1, '24000'),
(42, 'Spider Man', 'Kyaw Gyi', 'Mandalay', '0912322323', 1, '12000'),
(43, '3 Idiots', 'Saw Yu wai', 'Taungyi', '098213123123', 1, '24000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allgenre`
--
ALTER TABLE `allgenre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messagelist`
--
ALTER TABLE `messagelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allgenre`
--
ALTER TABLE `allgenre`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messagelist`
--
ALTER TABLE `messagelist`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
