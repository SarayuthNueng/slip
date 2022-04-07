-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 11:51 AM
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
  `pname` varchar(20) DEFAULT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `txtoffice` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `pass`, `pname`, `fname`, `txtoffice`) VALUES
('123456789', '123456789', 'นาย', 'ทดสอบ', 'ทดสอบ');

-- --------------------------------------------------------

--
-- Table structure for table `payslip`
--

CREATE TABLE `payslip` (
  `id_num` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `no` varchar(20) DEFAULT '',
  `title` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id` varchar(13) DEFAULT NULL,
  `bank_id` varchar(50) DEFAULT NULL,
  `office` int(11) DEFAULT NULL,
  `txtoffice` varchar(200) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `assur_dd` int(11) DEFAULT NULL,
  `saving` int(11) DEFAULT NULL,
  `kid` int(11) DEFAULT NULL,
  `gpf` int(11) DEFAULT NULL,
  `pfund` int(11) DEFAULT NULL,
  `soc` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `payslip`
--

INSERT INTO `payslip` (`id_num`, `date`, `no`, `title`, `name`, `id`, `bank_id`, `office`, `txtoffice`, `salary`, `tax`, `assur_dd`, `saving`, `kid`, `gpf`, `pfund`, `soc`, `total`) VALUES
(1, '2019-07-25', 'ก0001', 'นาย', 'ทดสอบ ทดสอบ', '123456789', '416-0-000000', 110, 'IT', 0, 0, 0, 0, 0, 0, 0, 0, 5100),
(2, '2021-03-26', 'ก0001', 'นาย', 'ทดสอบ ทดสอบ', '123456789', '416-0-000000', 110, 'IT', 0, 0, 0, 0, 0, 0, 0, 0, 5100);

-- --------------------------------------------------------

--
-- Table structure for table `payslip2`
--

CREATE TABLE `payslip2` (
  `id` int(11) NOT NULL,
  `id_num` varchar(11) NOT NULL,
  `cid` varchar(13) NOT NULL,
  `name` varchar(300) NOT NULL,
  `saraly` int(20) NOT NULL,
  `social` int(20) NOT NULL,
  `pks` int(20) NOT NULL,
  `borrow` int(20) NOT NULL,
  `bin` int(20) NOT NULL,
  `clean` int(20) NOT NULL,
  `cooperative` int(20) NOT NULL,
  `balance` int(20) NOT NULL,
  `remark` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payslip2`
--

INSERT INTO `payslip2` (`id`, `id_num`, `cid`, `name`, `saraly`, `social`, `pks`, `borrow`, `bin`, `clean`, `cooperative`, `balance`, `remark`) VALUES
(1, '1', '1400900249352', 'ศรายุทธ นวะศรี', 15000, 750, 10, 10, 10, 10, 10, 14200, ''),
(2, '2', '1469900266972', 'นรากร ศิริกุล', 16000, 700, 20, 20, 20, 20, 20, 13000, '');

-- --------------------------------------------------------

--
-- Table structure for table `save_time_login`
--

CREATE TABLE `save_time_login` (
  `id_save_time_login` int(11) NOT NULL,
  `time_login` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

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
  ADD PRIMARY KEY (`id_num`) USING BTREE;

--
-- Indexes for table `payslip2`
--
ALTER TABLE `payslip2`
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
  MODIFY `id_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payslip2`
--
ALTER TABLE `payslip2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `save_time_login`
--
ALTER TABLE `save_time_login`
  MODIFY `id_save_time_login` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
