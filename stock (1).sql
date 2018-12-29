-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2018 at 03:19 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `loc_id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `locations` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loc_id`, `country`, `locations`) VALUES
(2, 'UK', 'a:2:{s:0:\"\";O:8:\"stdClass\":1:{s:6:\"street\";s:4:\"new1\";}i:0;a:1:{s:6:\"street\";s:96:\"Passport & Visa Office,Ground Floor,Embassy of Ireland,114A Cromwell Road,London SW7 4ES,England\";}}'),
(3, 'Australia', 'a:3:{i:0;a:1:{s:6:\"street\";s:5:\"first\";}i:1;a:1:{s:6:\"street\";s:6:\"second\";}i:2;a:1:{s:6:\"street\";s:6:\"threee\";}}'),
(8, 'New', 'a:2:{i:0;O:8:\"stdClass\":1:{s:6:\"street\";s:9:\" address1\";}i:1;O:8:\"stdClass\":1:{s:6:\"street\";s:6:\"new555\";}}'),
(9, 'Peru', 'a:2:{i:0;O:8:\"stdClass\":1:{s:6:\"street\";s:8:\"address1\";}i:1;O:8:\"stdClass\":1:{s:6:\"street\";s:9:\"address2h\";}}'),
(10, 'Africa', 'a:2:{i:0;O:8:\"stdClass\":1:{s:6:\"street\";s:5:\"loca1\";}i:1;O:8:\"stdClass\":1:{s:6:\"street\";s:4:\"loc2\";}}'),
(11, 'Sydney', 'a:2:{i:0;O:8:\"stdClass\":1:{s:6:\"street\";s:8:\"address1\";}i:1;O:8:\"stdClass\":1:{s:6:\"street\";s:10:\"addresss22\";}}'),
(12, 'south africa', 'a:1:{i:0;O:8:\"stdClass\":1:{s:6:\"street\";s:3:\"asf\";}}'),
(13, 'Ireland', 'a:1:{i:0;O:8:\"stdClass\":1:{s:6:\"street\";s:5:\"first\";}}'),
(14, 'ABC', 'a:2:{i:0;O:8:\"stdClass\":1:{s:6:\"street\";s:27:\"asdgdf dfhfgn,assdhdf,adsgx\";}i:1;a:1:{s:6:\"street\";s:101:\"Passport & Visa Office, Ground Floor, Embassy of Ireland, 114A Cromwell Road, London SW7 4ES, England\";}}');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `date`, `user`, `content`) VALUES
(1, '2018-12-07', 'ranjit', 'sAFSDXFXVC C X'),
(2, '2018-12-19', 'sCZ', 'xzc '),
(3, '2018-12-03', 'dsgcb', 'dfhb'),
(4, '2018-12-18', 'dfg', 'rdfgbv'),
(5, '2018-12-26', 'sedfgc', 'dfgvb'),
(6, '2018-12-19', 'dfgb', 'dfgbv');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `form_type` varchar(255) NOT NULL,
  `quntity_box` int(11) NOT NULL,
  `quntity_forms` int(11) NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `date`, `user_id`, `country_id`, `form_type`, `quntity_box`, `quntity_forms`, `location`) VALUES
(1, '2018-12-21', 2, 3, '0', 100, 40000, 'first'),
(2, '2018-12-21', 2, 3, 'aps2e', 100, 40000, 'first'),
(3, '2018-12-21', 2, 3, 'aps2e', 100, 40000, 'first'),
(4, '2018-12-21', 2, 3, 'aps2g', 100, 40000, 'first'),
(5, '2018-12-21', 2, 3, 'aps2e', 100, 40000, 'first');

-- --------------------------------------------------------

--
-- Table structure for table `stock_level`
--

CREATE TABLE `stock_level` (
  `stock_id` int(11) NOT NULL,
  `stock_name` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_level`
--

INSERT INTO `stock_level` (`stock_id`, `stock_name`, `quantity`) VALUES
(1, 'APS1E', 5007),
(2, 'APS1G', 1000),
(3, 'APS2E', 5000),
(4, 'APS2G', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `role`, `password`) VALUES
(2, 'shra', 'user', '123456'),
(3, 'admin', 'admin', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `stock_level`
--
ALTER TABLE `stock_level`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stock_level`
--
ALTER TABLE `stock_level`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
