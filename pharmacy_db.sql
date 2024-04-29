-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 11:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_p`
--

CREATE TABLE `admin_p` (
  `id` int(20) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_p`
--

INSERT INTO `admin_p` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `INVENTORYID` int(11) NOT NULL,
  `MEDICINEID` int(11) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL,
  `LOCATION` varchar(255) DEFAULT NULL,
  `EXPIRYDATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `MEDICINEID` int(11) NOT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `DISEASE` varchar(255) DEFAULT NULL,
  `PRICE` decimal(10,2) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL,
  `LOCATION` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`MEDICINEID`, `NAME`, `DISEASE`, `PRICE`, `QUANTITY`, `LOCATION`) VALUES
(5, 'Biogesic', 'multi-tambal', 5.00, 100, 'B-1'),
(10, 'Neozep', 'Cough', 6.00, 200, 'N-1'),
(11, 'Citirezen', 'Katol2', 10.00, 200, 'A-1'),
(12, 'Bioflu', 'Cough', 5.00, 200, 'B-1'),
(13, 'Pasetamol', 'Labad sa Ulo', 9.00, 200, 'C-1'),
(14, 'saridon', 'labad sa ulo', 7.00, 9, 'B-1'),
(15, 'AC-NEX FORTE', 'cough-cold', 15.00, 10, 'F-1'),
(17, 'ASFRENON', 'cough-cold ', 175.00, 46, 'F-1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_p`
--
ALTER TABLE `admin_p`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`INVENTORYID`),
  ADD KEY `MEDICINEID` (`MEDICINEID`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`MEDICINEID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_p`
--
ALTER TABLE `admin_p`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `MEDICINEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`MEDICINEID`) REFERENCES `medicine` (`MEDICINEID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
