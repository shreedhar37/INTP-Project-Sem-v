-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2020 at 05:17 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15504604_letscipher`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` char(30) NOT NULL,
  `aname` varchar(32) NOT NULL,
  `aemail` varchar(32) NOT NULL,
  `apass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `aname`, `aemail`, `apass`) VALUES
('Shreedhar Chavan', 'notorious', 'meshree4@gmail.com', '21433ccf3b3f00ef5d6c7275c76a61c7');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`) VALUES
('123', 'ok@easy.com', '202cb962ac59075b964b07152d234b70'),
('Abc', 'abc@gmail.com', '202cb962ac59075b964b07152d234b70'),
('abhi', 'dalviabhi7045@gmail.com', '8371f69bdcc49cb926f09c9f4a061082'),
('Blackout', 'xyz@gmail.com', '202cb962ac59075b964b07152d234b70'),
('blackout123', 'marathehimpr18it@student.mes.ac.in', 'ea7778ae43155e47210ef43add658862'),
('Girish', 'girishdange@gmail.com', '1a1dc91c907325c69271ddf0c944bc72'),
('manas', 'manas@gmail.com', '1a1dc91c907325c69271ddf0c944bc72'),
('Owaiz', 'owaizkhan@gmail.com', '92ef9c52777f019e36b23701e1c4c03b'),
('ritsz', 'ritika.rk200@gmail.com', '8f6c259c74ee3939838318927e050075'),
('sasa', 'sasa@gmail.com', '4762b7c4015e1e1c0d6aca6790837efb'),
('script_kiddie', 'meshree4@gmail.com', '1a1dc91c907325c69271ddf0c944bc72');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aname`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
