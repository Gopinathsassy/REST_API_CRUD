-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2023 at 01:57 PM
-- Server version: 10.3.38-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbainruy_testapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_master`
--

CREATE TABLE `customer_master` (
  `id` int(10) NOT NULL,
  `customer_code` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_master`
--

INSERT INTO `customer_master` (`id`, `customer_code`, `customer_name`, `address`) VALUES
(1, 'C001', 'Customer 1', 'Address of customer 1'),
(2, 'C002', 'Customer 2', 'Address of customer 2');

-- --------------------------------------------------------

--
-- Table structure for table `dummy`
--

CREATE TABLE `dummy` (
  `id` int(50) NOT NULL,
  `test1` varchar(50) NOT NULL,
  `test2` varchar(50) NOT NULL,
  `test3` varchar(50) NOT NULL,
  `test4` varchar(50) NOT NULL,
  `test5` varchar(50) NOT NULL,
  `test6` varchar(50) NOT NULL,
  `test7` varchar(50) NOT NULL,
  `test8` varchar(50) NOT NULL,
  `test9` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dummy`
--

INSERT INTO `dummy` (`id`, `test1`, `test2`, `test3`, `test4`, `test5`, `test6`, `test7`, `test8`, `test9`) VALUES
(1, '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(2, '2', '2', '2', '2', '2', '2', '2', '2', '2'),
(6, '1', '2', '3', '4', '5', '6', '7', '8', '9'),
(7, 'w1', 'w2w', 'w3', 'w3', 'w2w', '1', 'w2', 'w2', 'we'),
(8, '9', '8', '7', '6', '5', '4', '3', '2', '1'),
(9, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'),
(11, '1', '2', '3', '4', '5', '6', '7', '8', '9'),
(12, 'l', 'k', 'j', 'h', 'g', 'f', 'd', 's', 'a'),
(18, '', '', '', '', '', '', '', '', ''),
(17, '200', '200', '200', '200', '200', '200', '200', '200', '200');

-- --------------------------------------------------------

--
-- Table structure for table `explist`
--

CREATE TABLE `explist` (
  `id` int(25) NOT NULL,
  `name` varchar(200) NOT NULL,
  `exp_not` varchar(500) NOT NULL,
  `amount` int(50) NOT NULL,
  `exp_date` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `groupid` int(200) NOT NULL,
  `add1` varchar(200) NOT NULL,
  `add2` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `explist`
--

INSERT INTO `explist` (`id`, `name`, `exp_not`, `amount`, `exp_date`, `date`, `time`, `groupid`, `add1`, `add2`) VALUES
(1, 'vijay', 'test', 500, '06-12-2022', '06-12-2022', '10:00:00', 1022, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `groupid`
--

CREATE TABLE `groupid` (
  `id` int(25) NOT NULL,
  `groupid` int(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `groupid`
--

INSERT INTO `groupid` (`id`, `groupid`) VALUES
(1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `Groups`
--

CREATE TABLE `Groups` (
  `id` int(25) NOT NULL,
  `groupid` int(25) NOT NULL,
  `groupname` varchar(200) NOT NULL,
  `admin` varchar(200) NOT NULL,
  `add1` varchar(200) NOT NULL,
  `add2` varchar(200) NOT NULL,
  `add3` varchar(200) NOT NULL,
  `add4` varchar(200) NOT NULL,
  `add5` varchar(200) NOT NULL,
  `add6` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Groups`
--

INSERT INTO `Groups` (`id`, `groupid`, `groupname`, `admin`, `add1`, `add2`, `add3`, `add4`, `add5`, `add6`) VALUES
(1, 100202, 'Test', 'Vijay', '123', '123', '123', '132', '45', '6789');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` int(20) NOT NULL,
  `groupid` int(20) NOT NULL,
  `groupname` varchar(500) NOT NULL,
  `mem_name` varchar(200) NOT NULL,
  `mobile_num` varchar(20) NOT NULL,
  `type` varchar(200) NOT NULL,
  `add1` varchar(200) NOT NULL,
  `add2` varchar(200) NOT NULL,
  `add3` varchar(200) NOT NULL,
  `add4` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`id`, `groupid`, `groupname`, `mem_name`, `mobile_num`, `type`, `add1`, `add2`, `add3`, `add4`) VALUES
(1, 100202, 'test grp', 'vijay', '9092594326', 'test', 'test', '123', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `inbound_body`
--

CREATE TABLE `inbound_body` (
  `id` int(10) NOT NULL,
  `GRnum` varchar(200) NOT NULL,
  `matcode` varchar(200) NOT NULL,
  `matdesc` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `uom` varchar(10) NOT NULL,
  `scan_date` varchar(200) NOT NULL,
  `scan_time` varchar(200) NOT NULL,
  `serail_no` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inbound_body`
--

INSERT INTO `inbound_body` (`id`, `GRnum`, `matcode`, `matdesc`, `quantity`, `uom`, `scan_date`, `scan_time`, `serail_no`) VALUES
(3, 'gr002', 'mat-coo1', 'paper', '100', 'KG', '09-09-2022', '11:47', 'P-002'),
(2, 'gr001', 'mat-coo1', 'paper', '50', 'KG', '09-09-2022', '11:47', 'P-001'),
(4, 'gr003', 'mat-coo1', 'paper', '100', '', '09-09-2022', '11:47', 'P-003');

-- --------------------------------------------------------

--
-- Table structure for table `inbound_head`
--

CREATE TABLE `inbound_head` (
  `id` int(10) NOT NULL,
  `GRnum` varchar(200) NOT NULL,
  `vendor` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `no_of_item` varchar(200) NOT NULL,
  `note1` varchar(200) NOT NULL,
  `note2` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inbound_head`
--

INSERT INTO `inbound_head` (`id`, `GRnum`, `vendor`, `date`, `no_of_item`, `note1`, `note2`) VALUES
(1, 'GR1', 'V001', '07-09-2022', '2', '', ''),
(2, 'GR2', 'V001', '06-09-2022', '1', '', ''),
(3, 'GR3', 'V002', '07-09-2022', '2', '', ''),
(4, 'GR4', 'V002', '07-09-2022', '2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `material_master`
--

CREATE TABLE `material_master` (
  `id` int(10) NOT NULL,
  `MatCode` varchar(200) NOT NULL,
  `MatDesc` varchar(250) NOT NULL,
  `Uom` varchar(200) NOT NULL,
  `note1` varchar(200) NOT NULL,
  `note2` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `material_master`
--

INSERT INTO `material_master` (`id`, `MatCode`, `MatDesc`, `Uom`, `note1`, `note2`) VALUES
(1, 'M001', 'Material 1', 'KG', '', ''),
(2, 'M002', 'Material 2', 'EA', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `material_stock`
--

CREATE TABLE `material_stock` (
  `id` int(10) NOT NULL,
  `mat_code` varchar(200) NOT NULL,
  `mat_desc` varchar(200) NOT NULL,
  `curr_stock` varchar(200) NOT NULL,
  `uom` varchar(200) NOT NULL,
  `note1` varchar(200) NOT NULL,
  `note2` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `material_stock`
--

INSERT INTO `material_stock` (`id`, `mat_code`, `mat_desc`, `curr_stock`, `uom`, `note1`, `note2`) VALUES
(1, 'M001', 'Material 1', '80', 'KG', '', ''),
(2, 'M002', 'Material 2', '10', 'KG', '', ''),
(3, 'M003', 'Material 3', '0', 'KG', '', ''),
(4, 'M004', 'Material 4', '0', 'KG', '', ''),
(5, 'M005', 'Material 5', '0', 'KG', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `outbound_body`
--

CREATE TABLE `outbound_body` (
  `id` int(10) NOT NULL,
  `delnum` varchar(200) NOT NULL,
  `matcode` varchar(200) NOT NULL,
  `matdesc` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `uom` varchar(10) NOT NULL,
  `scan_date` varchar(200) NOT NULL,
  `scan_time` varchar(200) NOT NULL,
  `serail_no` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `outbound_body`
--

INSERT INTO `outbound_body` (`id`, `delnum`, `matcode`, `matdesc`, `quantity`, `uom`, `scan_date`, `scan_time`, `serail_no`) VALUES
(3, 'Del-2', 'M002', 'Material 2', '10', '', '09-09-2022', '15:30:51', 'C002'),
(2, 'Del-1', 'M001', 'Material 1', '3', 'KG', '08-09-2022', '15:30:51', 'C001');

-- --------------------------------------------------------

--
-- Table structure for table `outbound_head`
--

CREATE TABLE `outbound_head` (
  `id` int(10) NOT NULL,
  `delnum` varchar(200) NOT NULL,
  `customer` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `no_of_item` varchar(200) NOT NULL,
  `note1` varchar(200) NOT NULL,
  `note2` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `outbound_head`
--

INSERT INTO `outbound_head` (`id`, `delnum`, `customer`, `date`, `no_of_item`, `note1`, `note2`) VALUES
(1, 'D001', 'C001', '05-09-2022', '2', '', ''),
(2, 'D002', 'C002', '06-09-2022', '2', '', ''),
(3, 'D005', 'C002', '06-09-2022', '2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(25) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone_num` varchar(13) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mail_id` varchar(200) NOT NULL,
  `image` varchar(500) NOT NULL,
  `add1` varchar(200) NOT NULL,
  `add2` varchar(250) NOT NULL,
  `add3` varchar(200) NOT NULL,
  `add4` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `name`, `phone_num`, `password`, `mail_id`, `image`, `add1`, `add2`, `add3`, `add4`) VALUES
(1, 'vijay', '123', '123', '132', '132', '23', '546', '89', '2546');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_master`
--

CREATE TABLE `vendor_master` (
  `id` int(10) NOT NULL,
  `vendor_code` varchar(200) NOT NULL,
  `vendor_name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vendor_master`
--

INSERT INTO `vendor_master` (`id`, `vendor_code`, `vendor_name`, `address`) VALUES
(1, 'V001', 'Vendor 1', 'Address of vendor 1'),
(2, 'V002', 'Vendor  2', 'Address of vendor 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_master`
--
ALTER TABLE `customer_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dummy`
--
ALTER TABLE `dummy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `explist`
--
ALTER TABLE `explist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupid`
--
ALTER TABLE `groupid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Groups`
--
ALTER TABLE `Groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbound_body`
--
ALTER TABLE `inbound_body`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbound_head`
--
ALTER TABLE `inbound_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_master`
--
ALTER TABLE `material_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_stock`
--
ALTER TABLE `material_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outbound_body`
--
ALTER TABLE `outbound_body`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outbound_head`
--
ALTER TABLE `outbound_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_master`
--
ALTER TABLE `vendor_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_master`
--
ALTER TABLE `customer_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dummy`
--
ALTER TABLE `dummy`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `explist`
--
ALTER TABLE `explist`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groupid`
--
ALTER TABLE `groupid`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Groups`
--
ALTER TABLE `Groups`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inbound_body`
--
ALTER TABLE `inbound_body`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inbound_head`
--
ALTER TABLE `inbound_head`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material_master`
--
ALTER TABLE `material_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `material_stock`
--
ALTER TABLE `material_stock`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `outbound_body`
--
ALTER TABLE `outbound_body`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `outbound_head`
--
ALTER TABLE `outbound_head`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor_master`
--
ALTER TABLE `vendor_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
