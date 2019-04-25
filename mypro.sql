-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2016 at 12:19 ص
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypro`
--

-- --------------------------------------------------------

--
-- Table structure for table `dep`
--

CREATE TABLE `dep` (
  `dephaveNO` int(11) NOT NULL,
  `dephaveNAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dep`
--

INSERT INTO `dep` (`dephaveNO`, `dephaveNAME`) VALUES
(1, 'radiology');

-- --------------------------------------------------------

--
-- Table structure for table `equip`
--

CREATE TABLE `equip` (
  `equipname` text,
  `equipserial` text NOT NULL,
  `model` text,
  `equiptype` text,
  `dephaveNO` text,
  `purprice` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equip`
--

INSERT INTO `equip` (`equipname`, `equipserial`, `model`, `equiptype`, `dephaveNO`, `purprice`) VALUES
('', '', '', '', '', ''),
('CT', '1', '', 'diag', '1', '155');

-- --------------------------------------------------------

--
-- Table structure for table `equipcalib`
--

CREATE TABLE `equipcalib` (
  `equipserial` text NOT NULL,
  `calibrator` text NOT NULL,
  `origin` char(5) NOT NULL,
  `calibdate` text NOT NULL,
  `nextcalibdate` text NOT NULL,
  `calibprice` int(11) DEFAULT NULL,
  `notation` text,
  `notation3` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipcalib`
--

INSERT INTO `equipcalib` (`equipserial`, `calibrator`, `origin`, `calibdate`, `nextcalibdate`, `calibprice`, `notation`, `notation3`) VALUES
('1', 'abdu', 'inner', '12/12/2016 06:05:00', '12/08/2016 06:05:00', 0, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipmaint`
--

CREATE TABLE `equipmaint` (
  `op.No.` int(11) NOT NULL,
  `equipserial` text NOT NULL,
  `maintainer` text NOT NULL,
  `origin` char(5) NOT NULL,
  `maintdate` text NOT NULL,
  `prodesc` text NOT NULL,
  `sparpar` text,
  `maintprice` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_reg_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'plz with sha1',
  `rank` int(11) NOT NULL DEFAULT '0',
  `user_full_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `reg_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_reg_name`, `password`, `rank`, `user_full_name`, `contact`, `reg_status`) VALUES
(1, 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 'abdu qnauy', 'abduqnauy@yahoo.com', 1),
(2, 'abdu', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 'abduqnauy', '01068281338', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipmaint`
--
ALTER TABLE `equipmaint`
  ADD KEY `op.No.` (`op.No.`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_reg_name` (`user_reg_name`),
  ADD UNIQUE KEY `user_reg_name_2` (`user_reg_name`),
  ADD UNIQUE KEY `user_reg_name_3` (`user_reg_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipmaint`
--
ALTER TABLE `equipmaint`
  MODIFY `op.No.` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
