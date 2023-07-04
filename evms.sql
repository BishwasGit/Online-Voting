-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 07:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` int(150) NOT NULL,
  `gender` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `mobile`, `password`, `address`, `age`, `gender`, `photo`, `status`, `votes`, `role`) VALUES
(6, 'Arun Subedi', 9860915161, '$argon2i$v=19$m=65536,t=4,p=1$b0t2NUlqWFZlYXFBSjVsVQ$fiEFpDgjzffpLQIwmSZ0R+xAbPloRPosXNDNRRWFPmI', 'Nakkhu', 22, 'M', 'arun.jpg', 0, 0, 0),
(8, 'BHUWAN SHRESTHA', 9861388522, '$argon2i$v=19$m=65536,t=4,p=1$N2ZlYjBmNTdzWVNOazBDaw$XHhD0AbEfbWEyeIPjI4OdyHxtvkoRcgmQo3kTAlMkdQ', 'KATHMANDU, CHANDRAGIRI', 21, 'M', 'balen.jpg', 0, 0, 0),
(0, 'Bishwas', 9869133344, 'password', 'kalimati', 25, 'Male', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` bigint(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `est` bigint(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `votes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `name`, `mobile`, `pass`, `est`, `photo`, `votes`) VALUES
(1, 'Nepali Congress', 9861388522, '123456', 1950, 'congress.png', 0),
(2, 'UML', 9841409751, '123456', 1970, 'CPN.png', 1),
(3, 'Rastriya Swatantra Party', 9861388522, '123456', 2013, 'ghanti.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pre`
--

CREATE TABLE `pre` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pre`
--

INSERT INTO `pre` (`id`, `name`, `email`) VALUES
(3, 'BHUWAN SHRESTHA', 'remonstha01@gmail.com'),
(4, 'Arun Subedi', 'subedi.arun.5@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `mobile`, `password`, `address`, `age`, `gender`, `email`, `photo`, `status`, `votes`, `role`) VALUES
(2, 'bishwas', 9869133344, 'password', 'kalimati', NULL, NULL, '', '0', 0, 0, 0),
(8, 'John Doe', 9803488071, '12345678', 'kalimati', 22, 'M', 'john@gmail.com', 'WallpaperDog-5529037.png', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
