-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2016 at 01:36 م
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_reg_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'plz with sha1',
  `rank` int(11) NOT NULL DEFAULT '0',
  `user_full_name` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `reg_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_reg_name`, `password`, `rank`, `user_full_name`, `e_mail`, `reg_status`) VALUES
(1, 'abdu', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 'abduqnauy', 'abdu@yahoo.com', 1),
(2, 'ali', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 'alihamdy', 'ali@yahoo.com', 0),
(3, 'mido', 'b3c0730cf3f50613e40561e67c871fdb92820cf9', 0, 'midomagdy', 'mido@yahoo.com', 0),
(4, 'fayez', 'b3c0730cf3f50613e40561e67c871fdb92820cf9', 0, 'fayezali', 'fayez@yahoo.com', 0);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
