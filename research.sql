-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2019 at 04:12 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `createdat` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `profilepic` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'default',
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `fname`, `lname`, `gender`, `birthday`, `createdat`, `profilepic`, `city`, `country`, `status`) VALUES
(1, 'admin@admin.com', '6ddfa14d875d38b8363c91ccd5d1d9176543039b', 'Admin', 'Sahab', 'Female', '2001-05-16', '2019-05-24 00:30:26.609000', 'admin@admin.com', 'Sheikhupura', 'Pakistan', 0),
(2, 'safi@safi.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'Safiullah', 'Khan', 'Male', '2021-04-05', '2019-05-25 18:40:54.629804', 'safi@safi.com', 'Sheikhupura', 'Pakistan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `factostd`
--

CREATE TABLE `factostd` (
  `id` int(11) NOT NULL,
  `facid` int(11) DEFAULT NULL,
  `stdid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `factostd`
--

INSERT INTO `factostd` (`id`, `facid`, `stdid`) VALUES
(1, 1, 13),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `createdat` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `profilepic` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'default',
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `education` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aboutme` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `institute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `password`, `email`, `fname`, `lname`, `birthday`, `gender`, `createdat`, `profilepic`, `city`, `country`, `education`, `aboutme`, `institute`, `status`) VALUES
(1, '7b14fa45392a0e9dda570b4eaf0e31ffe73e1e6e', 'atif.khattak@nu.edu.pk', 'Atif', 'Khattak', '1990-03-22', 'Male', '2019-05-25 11:27:32.865717', 'atif@nu.edu.pk', 'Peshawar', 'Pakistan', 'MSCS', 'I am Awesome', 'FAST CFD', 0),
(2, '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'watto@nu.edu.pk', 'Habibullah', 'Watto', '2020-10-05', 'Male', '2019-05-25 19:01:22.966832', 'default', 'Delhi', 'India', 'PHD', 'I am awesome', 'FAST', 0),
(5, 'e54cd5ebb11afa7d36e859e4208f184ad5789936', 'aftab.maroof@nu.edu.pk', 'Aftab', 'maroof', '1976-12-07', 'Male', '2019-05-25 19:06:54.341832', 'aftab.maroof@nu.edu.pk', 'Lahore', 'Pakistan', 'PHD CS', 'I am awesome', 'FAST CFD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `fromid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `status` int(100) DEFAULT NULL,
  `createdat` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `facid` int(11) DEFAULT NULL,
  `stdid` int(11) NOT NULL,
  `createdat` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`id`, `title`, `body`, `file`, `facid`, `stdid`, `createdat`, `status`) VALUES
(6, 'PHP BOOK', 'I&#39;m a www-lover, open-source-sorcerer, web-security-researcher, wordpress-freak & geek. I&#39;m fluent in C++, PHP, JS, HTML & CSS; currently learning Laravel', '13-guy-1.jpg', 1, 13, '2019-05-16 04:17:24.593328', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `createdat` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `profilepic` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'default',
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `degree` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `semester` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `semesteryear` year(4) NOT NULL,
  `institute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aboutme` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `email`, `password`, `fname`, `lname`, `gender`, `birthday`, `createdat`, `profilepic`, `city`, `country`, `degree`, `semester`, `semesteryear`, `institute`, `aboutme`, `status`) VALUES
(2, 'safi@safi.com', 'ae0df2e47e1d85d693e65c5129c9c53ff845c667', 'Safiullah', 'Khan Sahi', 'Male', '1985-12-10', '2019-05-25 10:04:00.662520', 'default', 'Sheikhupura', 'Pakistan', 'BSCS', 'Spring', 2017, 'FAST', 'I am gold Medalist', 0),
(13, 'emma@watson.edu.pk', '317bfa8911a49940b5e5f5f0649a69654e7bc0a4', 'Emma', 'Watson', 'Female', '1995-12-12', '2019-05-25 19:41:51.088919', 'emma@watson.edu.pk', 'London', 'UK', 'BSAA', 'Spring', 2019, 'LUMAS', 'Who Am I', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factostd`
--
ALTER TABLE `factostd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_id_exists` (`fromid`),
  ADD KEY `to_id_exists` (`toid`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `factostd`
--
ALTER TABLE `factostd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
