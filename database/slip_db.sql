-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 06:52 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slip_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `position` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id_admin`, `username`, `password`, `name`, `position`) VALUES
(1, 'admin', 'admin', 'ผู้ดูแลระบบ', 'ผู้ดูแลระบบ');

-- --------------------------------------------------------

--
-- Table structure for table `kname`
--

CREATE TABLE `kname` (
  `kumnum_id` int(11) NOT NULL,
  `kumnum_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kname`
--

INSERT INTO `kname` (`kumnum_id`, `kumnum_name`) VALUES
(1, 'นาย'),
(2, 'นาง'),
(3, 'น.ส.');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` varchar(13) NOT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `pname` enum('นาย','นาง','นางสาว') DEFAULT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `txtoffice` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `pass`, `pname`, `fname`, `txtoffice`) VALUES
('123456789', '123456789', 'นาย', 'ทดสอบ', 'ทดสอบ'),
('1400900249352', '123456', 'นาย', 'ศรายุทธ นวะศรี', 'ไอที');

-- --------------------------------------------------------

--
-- Table structure for table `payslip`
--

CREATE TABLE `payslip` (
  `id` int(11) NOT NULL,
  `id_num` varchar(11) NOT NULL,
  `cid` varchar(13) NOT NULL,
  `name` varchar(300) NOT NULL,
  `salary` int(20) NOT NULL,
  `social` int(20) NOT NULL,
  `pks` int(20) NOT NULL,
  `borrow` int(20) NOT NULL,
  `bin` int(20) NOT NULL,
  `clean` int(20) NOT NULL,
  `cooperative` int(20) NOT NULL,
  `balance` int(20) NOT NULL,
  `remark` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `booking_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payslip`
--

INSERT INTO `payslip` (`id`, `id_num`, `cid`, `name`, `salary`, `social`, `pks`, `borrow`, `bin`, `clean`, `cooperative`, `balance`, `remark`, `date`, `booking_id`) VALUES
(3, 'a001', '1400900249352', 'sarayuth Navasri', 15000, 750, 10, 10, 10, 10, 10, 14200, '', '2022-04-11', '1555151'),
(4, 'a002', '123456789', 'test tset', 15000, 750, 10, 10, 10, 10, 10, 14200, '', '2022-04-11', '1555151');

-- --------------------------------------------------------

--
-- Table structure for table `save_time_login`
--

CREATE TABLE `save_time_login` (
  `id_save_time_login` int(11) NOT NULL,
  `time_login` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- Dumping data for table `save_time_login`
--

INSERT INTO `save_time_login` (`id_save_time_login`, `time_login`) VALUES
(1, '0000-00-00'),
(2, '0000-00-00'),
(3, '0000-00-00'),
(4, '0000-00-00'),
(5, '0000-00-00'),
(6, '0000-00-00'),
(7, '0000-00-00'),
(8, '0000-00-00'),
(9, '0000-00-00'),
(10, '0000-00-00'),
(11, '0000-00-00'),
(12, '0000-00-00'),
(13, '0000-00-00'),
(14, '0000-00-00'),
(15, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id_admin`) USING BTREE;

--
-- Indexes for table `kname`
--
ALTER TABLE `kname`
  ADD PRIMARY KEY (`kumnum_id`) USING BTREE;

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`) USING BTREE;

--
-- Indexes for table `payslip`
--
ALTER TABLE `payslip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `save_time_login`
--
ALTER TABLE `save_time_login`
  ADD PRIMARY KEY (`id_save_time_login`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payslip`
--
ALTER TABLE `payslip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `save_time_login`
--
ALTER TABLE `save_time_login`
  MODIFY `id_save_time_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
