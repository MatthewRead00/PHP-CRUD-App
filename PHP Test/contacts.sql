-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 10:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contacts`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `lName` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `image`, `fName`, `lName`, `email`, `phone`) VALUES
(1, '29244228_1814965001868756_6669445351768751570_nsddssdds.jpg', 'Matthew', 'Read', 'MattRead2016@outlook.com', '123'),
(3, '29244228_1814965001868756_6669445351768751570_nsddssdds.jpg', 'Matthew', 'Matthews', 'MattRead2016@outlook.com', '9023042892'),
(6, '29244228_1814965001868756_6669445351768751570_nsddssdds.jpg', 'Matthew', 'Read', 'MattRead2016@outlook.com', '9023042892'),
(8, '29244228_1814965001868756_6669445351768751570_nsddssdds.jpg', 'Matthew', 'Read', 'MattRead2016@outlook.com', '5830221'),
(10, '29244228_1814965001868756_6669445351768751570_nsddssdds.jpg', 'Matthew', 'Read', 'MattRead2016@outlook.com', '9023042892'),
(11, '29244228_1814965001868756_6669445351768751570_nsddssdds.jpg', 'Matthew', 'Read', 'MattRead2016@outlook.com', '5830221'),
(13, '29244228_1814965001868756_6669445351768751570_nsddssdds.jpg', 'Matthew', 'Read', 'MattRead2016@outlook.com', '5830221'),
(15, 'l60Hf.png', 'Matthew', 'Read', 'MattRead2016@outlook.com', '5830221'),
(17, 'l60Hf.png', 'John', 'Doe', 'JohnDoe@hotmail.com', '1234567890'),
(18, '29244228_1814965001868756_6669445351768751570_nsddssdds.jpg', 'Matthew', 'Read', 'MattRead2016@outlook.com', '5830221'),
(19, '29244228_1814965001868756_6669445351768751570_nsddssdds.jpg', 'Matthew', 'Read', 'MattRead2016@outlook.com', '5830221'),
(20, '29244228_1814965001868756_6669445351768751570_nsddssdds.jpg', 'Matthew', 'Read', 'MattRead2016@outlook.com', '9023042892'),
(21, 'l60Hf.png', 'John', 'Doe', 'JohnDoe@hotmail.com', '1234567890'),
(22, '29244228_1814965001868756_6669445351768751570_nsddssdds.jpg', 'Matthew', 'Read', 'MattRead2016@outlook.com', '1234567890'),
(26, '29244228_1814965001868756_6669445351768751570_nsddssdds.jpg', 'Matthew', 'Read', 'MattRead2016@outlook.com', '1234567890'),
(27, '29244228_1814965001868756_6669445351768751570_nsddssdds.jpg', 'Matthew', 'Read', 'MattRead2016@outlook.com', '9023042892'),
(29, '29244228_1814965001868756_6669445351768751570_nsddssdds.jpg', 'Matthew', 'Read', 'MattRead2016@outlook.com', '1234567890'),
(30, 'l60Hf.png', 'John', 'Doe', 'JohnDoe@hotmail.com', '1234567890'),
(33, '29244228_1814965001868756_6669445351768751570_nsddssdds.jpg', 'Matthew', 'Read', 'MattRead2016@outlook.com', '9023042892'),
(34, '29244228_1814965001868756_6669445351768751570_nsddssdds.jpg', 'Matthew', 'Read', 'MattRead2016@outlook.com', '9023042892');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
