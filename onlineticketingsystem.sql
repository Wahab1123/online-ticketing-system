-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 04:55 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineticketingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(255) NOT NULL,
  `uid` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` bigint(255) NOT NULL,
  `userid` bigint(255) NOT NULL,
  `idate` date NOT NULL,
  `category` varchar(25) NOT NULL,
  `complaint_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `detail` text NOT NULL,
  `route` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `userid`, `idate`, `category`, `complaint_date`, `detail`, `route`) VALUES
(1, 2, '2023-02-10', 'fair', '2023-02-09 20:59:11.123208', 'nothing', 'mirpur'),
(5, 2, '2023-02-11', 'fair', '2023-02-11 11:09:49.265096', 'hdcjhvjhfdfyuyud', 'nakyal'),
(6, 2, '2023-02-11', 'seat', '2023-02-12 13:58:40.720889', 'checking the form working', 'nakyal'),
(7, 2, '2023-02-12', 'seat', '2023-02-13 02:09:50.701993', 'checking in the morning', 'nakyal'),
(8, 2, '2023-02-13', 'seat', '2023-02-13 05:36:48.356850', 'could not get into vehicle', 'nakyal'),
(9, 2, '2023-02-13', 'fair', '2023-02-13 05:40:40.567726', 'tayyaba jamil', 'nakyal'),
(10, 6, '2023-02-14', 'fair', '2023-02-14 04:48:17.899496', 'something', 'mirpur');

-- --------------------------------------------------------

--
-- Table structure for table `routemanager`
--

CREATE TABLE `routemanager` (
  `id` bigint(50) NOT NULL,
  `userid` bigint(50) NOT NULL,
  `source` varchar(25) NOT NULL,
  `destination` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `routemanagers`
--

CREATE TABLE `routemanagers` (
  `id` bigint(255) NOT NULL,
  `uid` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seatbook`
--

CREATE TABLE `seatbook` (
  `id` bigint(255) NOT NULL,
  `userid` bigint(255) NOT NULL,
  `source` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `dtime` time(6) NOT NULL,
  `ddate` date NOT NULL DEFAULT current_timestamp(),
  `seatno` bigint(2) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seatbook`
--

INSERT INTO `seatbook` (`id`, `userid`, `source`, `destination`, `dtime`, `ddate`, `seatno`, `status`) VALUES
(1, 5, 'kotli', 'Nakyal', '11:00:00.000000', '2023-02-13', 0, 'Confirmed'),
(2, 5, 'kotli', 'Nakyal', '11:30:00.000000', '2023-02-13', 0, 'Confirmed'),
(3, 6, 'kotli', 'Mirpur', '09:00:00.000000', '2023-02-14', 0, 'Pending'),
(4, 5, 'kotli', 'Nakyal', '12:30:00.000000', '2023-02-14', 0, 'Confirmed'),
(5, 5, 'kotli', 'Mirpur', '08:30:00.000000', '2023-02-26', 0, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(255) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `phonno` bigint(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(10) NOT NULL,
  `source` varchar(25) NOT NULL,
  `destination` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `phonno`, `email`, `username`, `password`, `type`, `source`, `destination`) VALUES
(1, 'abdulwahab', 3408491588, 'khuiratta1122@gmail.com', 'abdulwahab', '1234', 'admin', '', ''),
(2, 'Atifraza', 3245874854, 'atifraza@gmail.com', 'atifraza', '1234', 'passenger', '', ''),
(3, 'atifrza', 2158795488, 'bkjcbibvcyu@gmail.com', 'atifraza', '1234', 'manager', 'kotli', 'Dadyal'),
(4, 'Khalid Kareem', 2315156655, 'bkjcbibvcyu@gmail.com', 'khalidkareem', '1234', 'manager', 'kotli', 'nakyal'),
(5, 'Abdul Wahab', 3408491588, 'khuiratta1122@gmail.com', 'wahab', '1234', 'passenger', '', ''),
(6, 'tayyaba jamil', 3125782729, 'bkjcbibvcyu@gmail.com', 'tayyabajamil', '1234', 'passenger', '', ''),
(7, 'hamza sagheer', 3125782729, 'atifraza@gmail.com', 'hamzasagheer', '1234', 'manager', 'Kotli', 'mirpur'),
(8, 'ali', 0, 'khuiratta1122@gmail.com', 'ali', '1234', 'manager', 'kotli', 'rawalakot');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(255) NOT NULL,
  `vehicle_no` varchar(10) NOT NULL,
  `phnno` bigint(11) NOT NULL,
  `source` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `dtime` time(6) NOT NULL,
  `service` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicle_no`, `phnno`, `source`, `destination`, `dtime`, `service`) VALUES
(1, 'ABC415', 3408491588, 'kotli', 'Mirpur', '14:34:00.000000', ''),
(2, 'DE415', 3125782729, 'Kotli', 'rawalpindi', '11:30:00.000000', ''),
(3, 'abc515', 3245879541, 'kotli', 'nakyal', '06:00:00.000000', ''),
(4, 'ABC415', 3125782729, 'Kotli', 'Nakyal', '06:30:00.000000', ''),
(5, 'ABC415', 3125782729, 'Kotli', 'nakyal', '07:00:00.000000', ''),
(6, 'ABC415', 3125782729, 'Kotli', 'Nakyal', '07:30:00.000000', ''),
(7, 'DE415', 3125782729, 'Kotli', 'Nakyal', '07:30:00.000000', ''),
(8, 'DE415', 3125782729, 'Kotli', 'Nakyal', '08:00:00.000000', ''),
(9, 'DE415', 3125782729, 'Kotli', 'Nakyal', '08:30:00.000000', ''),
(10, 'ABC415', 3125782729, 'Kotli', 'Nakyal', '09:00:00.000000', ''),
(11, 'DE415', 3125782729, 'Kotli', 'Nakyal', '09:30:00.000000', ''),
(12, 'ABC415', 3125782729, 'Kotli', 'Nakyal', '10:00:00.000000', ''),
(13, 'DE415', 3125782729, 'Kotli', 'Nakyal', '10:30:00.000000', ''),
(14, 'ABC415', 3125782729, 'Kotli', 'Nakyal', '11:00:00.000000', ''),
(15, 'ABC415', 3408491588, 'Kotli', 'Nakyal', '11:30:00.000000', ''),
(16, 'ABC415', 3408491588, 'Kotli', 'Nakyal', '12:00:00.000000', ''),
(17, 'DE415', 3125782729, 'Kotli', 'Mirpur', '10:00:00.000000', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `routemanager`
--
ALTER TABLE `routemanager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routemanagers`
--
ALTER TABLE `routemanagers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seatbook`
--
ALTER TABLE `seatbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `routemanager`
--
ALTER TABLE `routemanager`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routemanagers`
--
ALTER TABLE `routemanagers`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seatbook`
--
ALTER TABLE `seatbook`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
