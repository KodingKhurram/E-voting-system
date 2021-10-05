-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 12:08 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `canid` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `party` varchar(50) NOT NULL,
  `eid` varchar(25) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `votes` text NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`canid`, `name`, `party`, `eid`, `photo`, `logo`, `votes`) VALUES
('EVSC455027', 'dfgfd', 'rere', 'EVSE286339', '', '', '0'),
('EVSC691496', 'rithwik', 'pubg', 'EVSE969548', '', '', '1'),
('EVSC928110', 'Mohammed khurram', 'CSGO', 'EVSE969548', '', '', '2'),
('EVSC956476', 'fdsfsd', 'dsfe', 'EVSE286339', '', '', '0'),
('EVSC982426', 'coco', 'chicken dinner', 'EVSE286339', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `elec_id` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`elec_id`, `name`, `date`, `image`) VALUES
('EVSE286339', 'MLA eleciton', '2019-11-27', ''),
('EVSE32126', 'King kong election', '2019-12-02', 'images.png'),
('EVSE969548', 'Steam gaming', '2019-11-25', '');

-- --------------------------------------------------------

--
-- Table structure for table `nominee`
--

CREATE TABLE `nominee` (
  `cid` varchar(25) NOT NULL,
  `name` text NOT NULL,
  `password` varchar(15) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `party` varchar(25) NOT NULL,
  `logo` varchar(25) NOT NULL,
  `ename` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nominee`
--

INSERT INTO `nominee` (`cid`, `name`, `password`, `photo`, `party`, `logo`, `ename`) VALUES
('EVSC455027', 'dfgfd', 'ddddd', '', 'rere', '', 'EVSE286339'),
('EVSC928110', 'Mohammed khurram', 'khurram7', '', 'CSGO', '', 'EVSE969548'),
('EVSC956476', 'fdsfsd', 'sf', '', 'dsfe', '', 'EVSE286339'),
('EVSC982426', 'coco', 'coco', '', 'chicken dinner', '', 'EVSE286339');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `name` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `vid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`name`, `password`, `phone`, `mail`, `vid`) VALUES
('Mohammed khurram', 'khurram7', '8861177176', 'khurram@gmail.com', 'EVSU118591');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `vid` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `eid` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`canid`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`elec_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `nominee`
--
ALTER TABLE `nominee`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`phone`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
