-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2020 at 12:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checkaccess`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch_detail`
--

CREATE TABLE `branch_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `sort_name` varchar(15) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `remark` varchar(20) DEFAULT NULL,
  `address` text NOT NULL,
  `category` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_detail`
--

INSERT INTO `branch_detail` (`id`, `name`, `sort_name`, `phone_no`, `email`, `remark`, `address`, `category`) VALUES
(9, 'PUSPANJALI SAREES PVT LTD  UNIT 1', 'PSPL 1', 5422370583, '', '', ' A-6 CHANDPUR INDUSTRIAL STATE                                                                                 ', ''),
(10, 'SHREE NIKETAN SAREE (GODOWN 1)', 'SNS (GODOWN1)', 5422370583, 'psplvns@hotmail.com', '787', 'A-6 INDUSTRIAL ESTATE CHANDPUR MAHESHPUR UP                                                         ', 'Godown Office(GO)'),
(11, 'SHREE NIKETAN BANGALORE', 'SNB', 0, '', '', 'BALGALORE                                                    ', 'BRANCH OFFICE'),
(12, 'SHREE NIKETAN CREATION', 'SNC', 8953475183, 'artisinghh11@gmail.com', '12', 'KOLKATA WEST BANGAL                                                          ', 'BRANCH OFFICE'),
(16, 'PUSHPANJALI SAREES PVT. LTD.  UNIT 2', 'PSPL 2', 0, '', '', 'CHANDPUR INDUSTRIAL STATE', ''),
(17, 'SHRI NIKETAN SAREES PVT. LTD.(HO)', 'SNS(HO)', 5422451999, 'shreeniketansarees@gmail.com', '', 'B 20/1-J-1\r\nBHELUPUR\r\nVARANASI \r\nPHON N0- 05422451999, 05422452999', 'HEAD OFFICE');

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE `customer_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `under_branch` varchar(25) DEFAULT NULL,
  `address` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`id`, `name`, `phone_no`, `email`, `under_branch`, `address`) VALUES
(3, 'VANDANA NS', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'mumbai neapensea road                                                                                                   '),
(4, 'VANDANA GK', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'MUMBAI GHAT KOOPER                                                               '),
(6, 'VANDANA KHAR', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'MUMBAI KHAR                                                         '),
(7, 'MILAN ', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'MUMBAI NEAPENSEA ROAD                             '),
(9, 'RAI SON\'S', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'DELHI                                                                           '),
(10, 'ANOROOP MATCHING CENTER', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'AHEMDABAD'),
(11, 'MEENA BAZAAR', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'DELHI'),
(12, 'VIJAY ASSOCIATES', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'BANGLORE'),
(13, 'VIJAY LAKSHMI SILK & SAREE', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'BANGLORE'),
(14, 'MYSORE SAREE UDHYOG', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'BANGLORE'),
(15, 'NEELKAMAL ', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'INDORE'),
(16, 'THE KASHI FABRIC', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'INDORE'),
(17, 'X FASHION', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'SURAT'),
(18, 'SONAL', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'BANGLORE'),
(19, 'ANGADI', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'BANGLORE'),
(20, 'SUMANGAL', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'VARANASI'),
(21, 'HANDLOOM EMPORIUM', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'MUMBAI'),
(22, 'HANDLOOM COTTAGE ', 0, '', 'SHRI NIKETAN SAREES PVT. ', 'KOLKATA');

-- --------------------------------------------------------

--
-- Table structure for table `data_category`
--

CREATE TABLE `data_category` (
  `id` int(11) NOT NULL,
  `dataCategory` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_category`
--

INSERT INTO `data_category` (`id`, `dataCategory`) VALUES
(3, 'ORDER'),
(4, 'STOCK');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `deptName` varchar(20) NOT NULL,
  `userId` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone_no` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `deptName`, `userId`, `email`, `phone_no`) VALUES
(6, 'PRODUCTION(EMB)', 'EMB', '', 0),
(7, 'FINISHING', 'FINISH', 'shreeniketanapparels', 0),
(8, 'PROCESSING', 'PROCESS', '', 0),
(9, 'DYEING', 'DYE', '', 0),
(10, 'THREAD CUTTING', 'TH-CUTTING', '', 0),
(11, 'CHECKING', 'CHECKING', '', 0),
(13, 'PLAIN GODOWN', 'Super', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `id` int(11) NOT NULL,
  `designName` varchar(20) DEFAULT NULL,
  `designSeries` varchar(50) DEFAULT NULL,
  `designCode` varchar(10) DEFAULT NULL,
  `rate` varchar(128) DEFAULT NULL,
  `stitch` text DEFAULT NULL,
  `dye` varchar(20) DEFAULT NULL,
  `matching` varchar(225) DEFAULT NULL,
  `saleRate` int(5) DEFAULT NULL,
  `htCattingRate` int(10) DEFAULT NULL,
  `designPic` varchar(128) DEFAULT NULL,
  `fabricName` varchar(64) DEFAULT NULL,
  `barCode` varchar(20) DEFAULT NULL,
  `designOn` varchar(30) DEFAULT NULL,
  `details_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`id`, `designName`, `designSeries`, `designCode`, `rate`, `stitch`, `dye`, `matching`, `saleRate`, `htCattingRate`, `designPic`, `fabricName`, `barCode`, `designOn`, `details_status`) VALUES
(62, 'PT 10015', '0', 'C', '325', '31882', 'NATURAL', '43001 SGS, GOLD JARI', 370, 10, 'IMG_20181110_150831.jpg', '107 B-2', 'D1', 'THAN', 0),
(70, 'PT 10014', '0', 'C', '200', '17581', 'NATURAL', '43001 SGS, GOLD JARI', 370, 5, NULL, '107 B-2', 'D2', 'THAN', 1),
(71, 'PT 10013', '0', 'C', '200', '21333', 'NATURAL', 'GOLD JARI', 370, 10, NULL, '107 B-2', 'D3', 'THAN', 1),
(72, 'PT 10012', '0', NULL, NULL, '12717', 'NATURAL', '43001 SGS , SILVER SEQUINES', 370, 10, NULL, '107 B-2', 'D4', 'THAN', 1),
(73, 'PT 10011', 'A', 'C', NULL, '20234', 'NATURAL', 'GOLD JARI', 370, 10, NULL, '107 B-2', 'D5', 'THAN', 1),
(74, 'PT 10011', 'B', 'C', NULL, '20234', 'NATURAL', '43001 SGS ', 370, 10, NULL, '107 B-2', 'D6', 'THAN', 1),
(75, 'PT 10010', '0', NULL, NULL, '53345', 'NATURAL', 'SILVER JARI , GOLD JARI', 370, 5, NULL, '107 B-2', 'D7', 'THAN', 1),
(76, 'PT 10009', '0', 'C', '200', '11066', 'NATURAL', '43001 SGS, GOLD JARI', 370, 10, NULL, '107 B-2', 'D8', 'THAN', 1),
(77, 'PT 10008', '0', 'C', '200', '16401', 'NATURAL', '43001 SGS ', 370, 10, NULL, '107 B-2', 'D9', 'THAN', 1),
(79, 'PT 10007', '0', 'G', '400', '20000', 'NATURAL', '43001 SGS , SILVER SEQUINES', 37000, 5, NULL, '107 B-2', 'D10', 'THAN', 1),
(80, 'PT 10006', '0', 'D', '800', '41000', 'NATURAL', '43001 SGS, GOLD JARI', 370, 10, NULL, '107 B-2', 'D10', 'THAN', 1),
(81, 'PT 10005', '0', 'C', '200', '11641', 'NATURAL', '43001 SGS, GOLD JARI', 370, 10, NULL, '107 B-2', 'D10', 'THAN', 1),
(82, 'PT 10004', '0', NULL, '400', '72000', 'NATURAL', 'GOLD JARI', 370, 5, NULL, '107 B-2', 'D10', 'THAN', 1),
(83, 'PT 10003', '0', 'C', '200', '19730', 'NATURAL', '43001 SGS ', 370, 10, NULL, '107 B-2', 'D10', 'THAN', 1),
(84, 'PT 10002', '0', 'C', '200', '19647', 'NATURAL', '43001 SGS , SILVER SEQUINES', 370, 10, NULL, '107 B-2', 'D10', 'THAN', 1),
(85, 'PT 10001', '0', 'C', '200', '14450', 'NATURAL', '43001 SGS ', 370, 10, NULL, '107 B-2', 'D10', 'THAN', 1),
(86, 'PT 1', '0', NULL, NULL, '', '', '', NULL, 15, NULL, '311', 'D10', 'SAREE', 1),
(87, 'PT 2', '0', NULL, NULL, '', '', '', NULL, 15, NULL, '311', 'D10', 'SAREE', 1),
(88, 'PT 3', '0', NULL, NULL, '', '', '', NULL, 15, NULL, '311', 'D10', 'SAREE', 1),
(89, 'PT 4', '0', NULL, NULL, '', '', '', NULL, 15, NULL, '311', 'D10', 'SAREE', 1),
(90, 'PT 5', '0', NULL, NULL, '', '', '', NULL, 15, NULL, '311', 'D10', 'SAREE', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `design_view`
-- (See below for the actual view)
--
CREATE TABLE `design_view` (
`id` int(11)
,`designName` varchar(20)
,`designSeries` varchar(50)
,`desCode` varchar(255)
,`rate` varchar(62)
,`stitch` text
,`dye` varchar(20)
,`matching` varchar(225)
,`sale_rate` double
,`htCattingRate` int(10)
,`designPic` varchar(128)
,`fabricName` varchar(64)
,`barCode` varchar(20)
,`designOn` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `emb`
--

CREATE TABLE `emb` (
  `id` int(11) NOT NULL,
  `designName` varchar(128) DEFAULT NULL,
  `workerName` varchar(128) DEFAULT NULL,
  `rate` varchar(62) DEFAULT NULL,
  `created_date` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emb`
--

INSERT INTO `emb` (`id`, `designName`, `workerName`, `rate`, `created_date`) VALUES
(1, 'PT 10015', 'PUSPANJALI SAREE PVT. LTD', '72', '2020-04-02 13:41:38'),
(10, 'PT 10015', 'S.S EMBROIDERY', '82', '2020-04-02 13:42:14'),
(9, 'PT 10015', 'SHREE NIKETAN APPARELS LI', '102', '2020-04-02 13:40:12'),
(12, 'PT 10005', 'TAMANA', '12', '2020-04-10 07:50:22'),
(11, 'PT 10015', 'SRISHTI CREATION', '72', '2020-04-02 13:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `erc`
--

CREATE TABLE `erc` (
  `id` int(11) NOT NULL,
  `desName` varchar(255) NOT NULL,
  `desCode` varchar(255) NOT NULL,
  `rate` varchar(62) NOT NULL,
  `created_at` varchar(62) DEFAULT NULL,
  `updated_at` varchar(62) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erc`
--

INSERT INTO `erc` (`id`, `desName`, `desCode`, `rate`, `created_at`, `updated_at`) VALUES
(22, 'PT 10006', 'D', '800', '2020-04-02 08:56:08', '2020-04-02 08:56:08'),
(23, 'PT 10007', 'G', '400', '2020-04-02 08:55:40', '2020-04-02 08:55:40'),
(31, 'PT 10011', 'C', '1500', '2020-04-02 08:48:48', '2020-04-02 08:48:48'),
(30, 'PT 10010', 'H', '550', '2020-04-02 08:49:58', '2020-04-02 08:49:58'),
(29, 'PT 10009', 'C', '200', '2020-04-02 08:52:50', '2020-04-02 08:52:50'),
(28, 'PT 10008', 'C', '200', '2020-04-02 08:54:28', '2020-04-02 08:54:28'),
(32, 'PT 10012', 'C', '200', '2020-04-02 08:48:25', '2020-04-02 08:48:25'),
(33, 'PT 10015', 'D', '325', '2020-04-02 08:44:27', '2020-04-02 08:44:27'),
(34, 'PT 10014', 'C', '200', '2020-04-02 08:44:59', '2020-04-02 08:44:59'),
(35, 'PT 10013', 'C', '200', '2020-04-02 08:46:23', '2020-04-02 08:46:23'),
(36, 'PT 10005', 'C', '200', '2020-04-02 08:57:22', '2020-04-02 08:57:22'),
(37, 'PT 10004', 'C', '400', '2020-04-02 08:58:24', '2020-04-02 08:58:24'),
(38, 'PT 10003', 'C', '200', '2020-04-02 08:59:02', '2020-04-02 08:59:02'),
(39, 'PT 10002', 'C', '200', '2020-04-02 08:59:37', '2020-04-02 08:59:37'),
(40, 'PT 10001', 'C', '200', '2020-04-02 09:00:00', '2020-04-02 09:00:00'),
(41, 'PT 1', '', '', '2020-04-03 17:34:28', '2020-04-03 17:34:28'),
(42, 'NULL', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fabric`
--

CREATE TABLE `fabric` (
  `id` int(11) NOT NULL,
  `fabricName` varchar(20) DEFAULT NULL,
  `fabHsnCode` varchar(10) DEFAULT NULL,
  `fabricType` varchar(10) DEFAULT NULL,
  `fabricCode` varchar(10) DEFAULT NULL,
  `purchase` varchar(128) DEFAULT NULL,
  `Code` varchar(128) DEFAULT NULL,
  `sale_rate` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fabric`
--

INSERT INTO `fabric` (`id`, `fabricName`, `fabHsnCode`, `fabricType`, `fabricCode`, `purchase`, `Code`, `sale_rate`) VALUES
(3, '101/02', '56/5208', 'THAN', '56', '4356', 'AY', '5000'),
(6, '315', '15/5007/', 'SAREE', '15', '56', 'G', '3006'),
(8, '111/02', '54/5007', 'THAN', '54', '120', 'MM', '140.'),
(15, '131/05', '55/5007/', 'THAN', '55', '115', '', '1000'),
(16, '107 B-2', '56/5208', 'THAN', '56', '115', 'H', '37000'),
(17, '131/07', '55/5007/', 'THAN', '55', NULL, NULL, NULL),
(18, '131/05 PRT', '55/5007/', 'THAN', '55', NULL, NULL, NULL),
(19, '101/02 PRT', '56/5208', 'THAN', '56', '290', NULL, NULL),
(20, '111/04', '54/5007', 'THAN', '54', NULL, NULL, NULL),
(21, '111/04 PRT', '54/5007', 'THAN', '54', NULL, NULL, NULL),
(22, '111/04 T', '54/5007', 'THAN', '54', NULL, NULL, NULL),
(23, '111/08', '54/5007', 'THAN', '54', NULL, NULL, NULL),
(24, '111/02 PRT', '54/5007', 'THAN', '54', NULL, NULL, NULL),
(25, '311', '11/5007', 'SAREE', '11', NULL, NULL, NULL),
(26, '312', '12/5007', 'SAREE', '12', NULL, NULL, NULL),
(27, '313', '13/5007', 'SAREE', '13', NULL, NULL, NULL),
(28, '314', '14/5007', 'SAREE', '14', NULL, NULL, NULL),
(29, '316', '16/5208', 'SAREE', '16', NULL, NULL, NULL),
(30, '331', '31/5007', 'SUIT', '31', NULL, NULL, NULL),
(31, '332', '32/5007', 'SUIT', '32', NULL, NULL, NULL),
(32, '333', '33/5007', 'SUIT', '33', NULL, NULL, NULL),
(33, '334', '55/5007/', 'SUIT', '34', NULL, NULL, NULL),
(34, '335', '35/5007', 'SUIT', '35', NULL, NULL, NULL),
(35, '336', '36/5208', 'SUIT', '36', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fda_table`
--

CREATE TABLE `fda_table` (
  `id` int(11) NOT NULL,
  `fabric_name` varchar(64) NOT NULL,
  `fabric_type` varchar(62) DEFAULT NULL,
  `design_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `asign_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fda_table`
--

INSERT INTO `fda_table` (`id`, `fabric_name`, `fabric_type`, `design_id`, `status`, `deleted`, `asign_date`) VALUES
(75, '315', 'SAREE', 65, 1, 0, '2020-04-03 18:14:04'),
(76, '111/02', 'SUIT', 64, 1, 0, '2020-04-03 18:53:56'),
(77, '315', 'SAREE', 70, 1, 0, '2020-04-03 18:55:25'),
(80, '131/05', 'cotton', 68, 1, 0, '2020-04-03 19:09:47'),
(81, '101/02', 'THAN', 62, 1, 0, '2020-04-03 20:37:53'),
(82, '101/02', 'THAN', 63, 1, 0, '2020-04-03 20:37:53'),
(83, '101/02', 'THAN', 70, 1, 0, '2020-04-05 01:28:41'),
(84, '101/02', 'THAN', 71, 1, 0, '2020-04-05 01:28:41'),
(85, '101/02', 'THAN', 72, 1, 0, '2020-04-05 01:28:41'),
(86, '101/02', 'THAN', 73, 1, 0, '2020-04-05 01:28:41'),
(87, '101/02', 'THAN', 74, 1, 0, '2020-04-05 01:28:41'),
(88, '111/02 PRT', 'THAN', 75, 1, 0, '2020-04-05 01:29:21'),
(89, '111/02 PRT', 'THAN', 76, 1, 0, '2020-04-05 01:29:21'),
(90, '111/02 PRT', 'THAN', 77, 1, 0, '2020-04-05 01:29:21'),
(91, '111/02 PRT', 'THAN', 79, 1, 0, '2020-04-05 01:29:21'),
(92, '111/02 PRT', 'THAN', 80, 1, 0, '2020-04-05 01:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `hsn`
--

CREATE TABLE `hsn` (
  `id` int(11) NOT NULL,
  `hsn_code` varchar(10) NOT NULL,
  `unit` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hsn`
--

INSERT INTO `hsn` (`id`, `hsn_code`, `unit`) VALUES
(3, '55/5007/', 'MTR'),
(9, '51/5007', 'MTR'),
(10, '52/5007', 'MTR'),
(11, '53/5007', 'MTR'),
(12, '54/5007', 'MTR'),
(13, '56/5208', 'MTR'),
(14, '31/5007', 'PCS'),
(15, '32/5007', 'PCS'),
(16, '33/5007', 'PCS'),
(17, '34/5007', 'PCS'),
(18, '35/5007', 'PCS'),
(19, '36/5208', 'PCS'),
(20, '11/5007', 'PCS'),
(21, '12/5007', 'PCS'),
(22, '13/5007', 'PCS'),
(23, '14/5007', 'PCS'),
(24, '15/5007', 'PCS'),
(25, '16/5208', 'PCS');

-- --------------------------------------------------------

--
-- Table structure for table `jobtypeconstant`
--

CREATE TABLE `jobtypeconstant` (
  `id` int(11) NOT NULL,
  `unit` varchar(32) DEFAULT NULL,
  `jobId` int(11) NOT NULL,
  `job` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobtypeconstant`
--

INSERT INTO `jobtypeconstant` (`id`, `unit`, `jobId`, `job`, `rate`) VALUES
(49, '2', 109, 'DUPATTA', 10),
(42, '1', 109, 'THAN(D)', 12),
(38, '1', 106, 'Tub dye', 10),
(39, '2', 106, 'Jigar dye', 15),
(43, '1', 109, 'THAN(S)', 6),
(47, '2', 109, 'SHIIRT(FULL)', 10),
(46, '2', 109, 'SAREE(HALF)', 8),
(45, '2', 109, 'SAREE(FILL)', 15),
(44, '1', 109, 'THAN(M)', 8),
(48, '2', 109, 'SHIRT(HALF)', 5);

-- --------------------------------------------------------

--
-- Table structure for table `jobtypepercent`
--

CREATE TABLE `jobtypepercent` (
  `id` int(11) NOT NULL,
  `symbol` enum('+','-') NOT NULL,
  `jobId` int(11) NOT NULL,
  `job` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_work_party`
--

CREATE TABLE `job_work_party` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `phone_no` bigint(10) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `deptName` varchar(20) NOT NULL,
  `subDeptName` varchar(20) NOT NULL,
  `job_work_type` varchar(62) DEFAULT NULL,
  `address` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_work_party`
--

INSERT INTO `job_work_party` (`id`, `name`, `phone_no`, `gst`, `deptName`, `subDeptName`, `job_work_type`, `address`) VALUES
(5, 'S.S EMBROIDERY', 9838532613, 'URD', 'PRODUCTION(EMB)', 'S.S EMB', 'EMB work', 'MADANPURA \r\nVARANASI'),
(6, 'MD ANAS', 7985262380, 'URD', 'DYEING', 'MD ANAS', 'Dye', 'CHHOTI PATIYA \r\nVARANASI'),
(12, 'SRISHTI CREATION', 0, '09AEKPK0003K1ZP', 'PRODUCTION(EMB)', 'S.C CREATION ', 'EMB work', 'PLOT NO- E-70 INDUSTRIAL AREA \r\nRAMNAGAR PHASE -2 \r\nUTTAR PRADESH'),
(13, 'RAMESH DUBEY', 9839203007, 'URD', 'PRODUCTION(EMB)', 'S.C CREATION ', 'EMB work', 'PLOT NO-E-70 INDUSTRIAL ESTATE\r\nRAMNAGAR PHASE -2'),
(14, 'SHUBHKAMANA REAL TECH LLP', 5422373444, '09AADHFS5595G1ZH', 'PRODUCTION(EMB)', 'subDept', 'EMB work', 'B1, B2, E1, E2 INDUSTRIAL SATATE\r\nMAHESHPUR CHANDPUR\r\nVARANASI 221106\r'),
(15, 'SHREE NIKETAN APPARELS LI', 5412297166, '09AAGCS5678D1Z0', 'PRODUCTION(EMB)', 'SNA CHANDAULI', 'EMB work', 'PLOT NO- B-25, INDUSTRIAL AREA\r\nRAMNAGAR PHASE-2\r\nCHANDAULI 232101'),
(16, 'PUSPANJALI SAREE PVT. LTD', 0, '09AACCP6623R2ZQ', 'PRODUCTION(EMB)', 'PSPL CHANDAULI', 'EMB work', 'PLOT N0- B-23 INDUSTRIAL AREA \r\nRAMNAGAR PHASE -2 CHANDAULI\r\n232101'),
(17, 'TAMANA', 0, 'URD', 'DYEING', 'TAMANNA', 'Dye', 'BHELUPUR ');

-- --------------------------------------------------------

--
-- Table structure for table `job_work_type`
--

CREATE TABLE `job_work_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_work_type`
--

INSERT INTO `job_work_type` (`id`, `type`, `created`, `deleted`) VALUES
(107, 'EMB work', '2020-04-05 03:40:29', 0),
(108, 'RAFFU WORK', '2020-04-05 03:40:29', 0),
(109, 'THREAD CUTTING', '2020-04-05 03:40:29', 0),
(110, 'LATKAN', '2020-04-05 03:40:29', 0),
(117, 'AA', '2020-04-05 10:35:31', 0),
(116, 'AA', '2020-04-05 04:22:52', 0),
(115, 'A1', '2020-04-05 04:07:46', 0),
(114, 'B', '2020-04-05 03:48:54', 0),
(113, 'A', '2020-04-05 03:47:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mamber_types`
--

CREATE TABLE `mamber_types` (
  `id` int(6) NOT NULL,
  `label` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mamber_types`
--

INSERT INTO `mamber_types` (`id`, `label`, `code`) VALUES
(201, 'student', '5050');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_confige`
--

CREATE TABLE `mobile_confige` (
  `id` int(11) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `code` varchar(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_confige`
--

INSERT INTO `mobile_confige` (`id`, `mobile`, `code`, `created_date`) VALUES
(1, '3629478234', '100129', '2019-10-31 11:31:23'),
(2, '34853578', '271673', '2019-10-31 13:18:33'),
(3, '348535783343', '213976', '2019-10-31 13:19:57'),
(4, '348535894564', '364008', '2019-10-31 13:35:16'),
(5, '79485764958', '577181', '2019-10-31 13:36:04'),
(6, '563456546', '482803', '2019-10-31 13:42:52'),
(7, '456567567', '813035', '2019-10-31 13:45:44'),
(8, '345567567', '938461', '2019-10-31 13:52:56'),
(9, '790345123', '821797', '2019-11-01 07:19:14'),
(10, '4785847678', '539590', '2019-11-01 08:55:35'),
(11, '45656765435', '339006', '2019-11-01 10:11:41'),
(12, '790500439111', '312892', '2019-11-05 10:17:59'),
(13, '45656768', '263324', '2019-11-05 12:45:20'),
(14, '767879823544', '788582', '2019-11-05 15:35:25'),
(15, '356567678', '753026', '2019-11-05 16:31:40'),
(16, '356567678676', '379955', '2019-11-05 16:38:23'),
(17, '9935775544', '544824', '2019-11-05 17:03:06'),
(18, 'hdfhdhd', '643913', '2019-11-06 08:39:19'),
(19, '75767', '761815', '2019-11-06 08:39:45'),
(20, '999999999', '669080', '2019-11-06 15:43:09'),
(21, '7007605810', '283851', '2019-11-11 10:04:21'),
(22, '87766666686', '384429', '2019-11-11 10:05:23'),
(23, '423423423423', '366908', '2019-11-19 09:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(6) NOT NULL,
  `customer_order_id` int(8) NOT NULL,
  `product_id` int(8) NOT NULL,
  `price` int(7) NOT NULL,
  `order_date` date NOT NULL,
  `status` text NOT NULL,
  `quantity` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_order_id`, `product_id`, `price`, `order_date`, `status`, `quantity`) VALUES
(2, 23, 4, 10500, '2020-01-28', 'Processing', 3),
(3, 24, 6, 8200, '2020-01-28', 'Completed', 2),
(4, 25, 7, 8700, '2020-01-28', 'pending', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_flow_chart`
-- (See below for the actual view)
--
CREATE TABLE `order_flow_chart` (
`order_date` date
,`order_number` varchar(20)
,`total` bigint(21)
,`inprocess` bigint(21)
,`pending` bigint(21)
,`cancel` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `product_order_id` varchar(64) NOT NULL,
  `order_id` varchar(32) NOT NULL,
  `series_number` varchar(20) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `priority` varchar(50) NOT NULL,
  `order_barcode` varchar(30) NOT NULL,
  `remark` varchar(20) NOT NULL,
  `design_code` varchar(50) NOT NULL,
  `fabric_name` varchar(30) NOT NULL,
  `hsn` varchar(30) NOT NULL,
  `design_name` varchar(30) NOT NULL,
  `stitch` varchar(30) NOT NULL,
  `dye` varchar(30) NOT NULL,
  `matching` varchar(30) NOT NULL,
  `status` enum('PENDING','CANCEL','INPROCESS','DONE') NOT NULL DEFAULT 'PENDING',
  `last_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `product_order_id`, `order_id`, `series_number`, `unit`, `quantity`, `priority`, `order_barcode`, `remark`, `design_code`, `fabric_name`, `hsn`, `design_name`, `stitch`, `dye`, `matching`, `status`, `last_update`, `deleted`) VALUES
(2, 'O2', '58', '2', 'ddffg', 98, 'dfggdfg', '123', 'df', 'dsdf', '12231', 'ery', 'sdas', 'gdf', '', 'dfghgfhgh', 'INPROCESS', '2020-04-07 12:00:11', 0),
(3, 'O3', '58', '1', '', 0, '', '', '', '', '', '', '', '', '', '', 'CANCEL', '2020-04-07 12:00:11', 0),
(5, 'O4', '62', '1', '', 0, '', '', '', '', '', '', '', '', '', '', 'PENDING', '2020-04-07 12:00:11', 0),
(6, 'O6', '62', '1', 'kj', 0, 'kj', 'kj', 'kjkj', 'kjk', 'jk', 'kj', 'kj', 'jkj', 'kj', 'kj', 'PENDING', '2020-04-07 12:00:11', 0),
(7, 'O7', '63', '1', '123', 123, '123', '123', '123', '123', '12345', '123', '123', '123', '123', '123', 'PENDING', '2020-04-11 09:53:12', 0),
(8, 'O8', '63', '2', '234', 4345, '345', '234', '234', '234', 'qwe', 'qwe', 'qw', '234', '234', '23', 'PENDING', '2020-04-11 09:53:12', 0),
(9, 'O9', '63', '3', '45', 345, '345', '345', '345', '345', '345', '345', '345', '345', '3', '345', 'PENDING', '2020-04-11 09:53:12', 0),
(10, 'O10', '63', '4', 'tet', 0, 'et', 'ert', 'ert', 'ert', 'etert', 'ert', 'ert', 'ert', 'ert', 'er', 'PENDING', '2020-04-11 09:53:12', 0),
(11, 'O11', '63', '1', '', 0, '', '', '', '', '', '', '', '', '', '', 'PENDING', '2020-04-11 09:53:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `old_order_number` varchar(20) DEFAULT NULL,
  `customer_name` varchar(30) NOT NULL,
  `data_category` varchar(32) NOT NULL,
  `session` varchar(32) NOT NULL,
  `order_type` varchar(20) NOT NULL,
  `order_date` date NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('NEW','DONE','CANCEL','IN-PROCESS') NOT NULL DEFAULT 'NEW'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `order_number`, `old_order_number`, `customer_name`, `data_category`, `session`, `order_type`, `order_date`, `deleted`, `updated_at`, `status`) VALUES
(54, 'ORD10084', NULL, 'Chanadrkanta', '3', '20', '2', '2020-04-05', 0, '2020-04-05 19:15:44', 'NEW'),
(55, '', NULL, '', '3', '20', '1', '2020-04-06', 0, '2020-04-06 08:34:22', 'NEW'),
(56, 'ORD100002', NULL, 'Hello world', '3', '15', '1', '2020-04-06', 0, '2020-04-06 08:46:15', 'NEW'),
(58, 'ORD10085', NULL, 'Hello WORLD', '3', '20', '1', '2020-04-06', 0, '2020-04-06 09:01:01', 'NEW'),
(59, 'ORD10086', NULL, 'PRM', '3', '20', '2', '2020-04-06', 0, '2020-04-06 09:03:23', 'NEW'),
(62, 'ORD10087', NULL, 'JHkajs', '3', '20', '2', '2020-04-06', 0, '2020-04-06 09:04:55', 'NEW'),
(63, 'ORD10088', NULL, 'Hanuman', '4', '15', '1', '2020-04-11', 0, '2020-04-11 09:53:12', 'NEW');

-- --------------------------------------------------------

--
-- Table structure for table `order_tb`
--

CREATE TABLE `order_tb` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `obc` varchar(50) DEFAULT NULL,
  `serial_number` varchar(50) DEFAULT NULL,
  `fabric_name` varchar(50) DEFAULT NULL,
  `hsn` varchar(50) DEFAULT NULL,
  `order_number` varchar(50) DEFAULT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `dbc` varchar(50) DEFAULT NULL,
  `design_name` varchar(50) DEFAULT NULL,
  `design_code` varchar(50) DEFAULT NULL,
  `stitch` varchar(50) DEFAULT NULL,
  `dye` varchar(50) DEFAULT NULL,
  `matching` varchar(50) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `quantity` varchar(20) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `order_barcode` varchar(50) DEFAULT NULL,
  `priority` enum('high','low') DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  `order_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_tb`
--

INSERT INTO `order_tb` (`id`, `parent_id`, `obc`, `serial_number`, `fabric_name`, `hsn`, `order_number`, `customer_name`, `dbc`, `design_name`, `design_code`, `stitch`, `dye`, `matching`, `remark`, `quantity`, `unit`, `order_barcode`, `priority`, `created_at`, `update_at`, `order_type`) VALUES
(1, NULL, '4', '1234', '101/02', '1005', '1001', 'arti', '12334', 'TH 11', '1234', '154789', '24', '120, 115LND', '10', '2', '3000', '2345', 'low', '2020-02-10', '2020-02-10', 'FRESH');

-- --------------------------------------------------------

--
-- Table structure for table `order_type`
--

CREATE TABLE `order_type` (
  `id` int(11) NOT NULL,
  `orderType` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_type`
--

INSERT INTO `order_type` (`id`, `orderType`) VALUES
(1, 'FRESH'),
(2, 'PRM');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `description` tinytext DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`, `deleted`) VALUES
(1, 'edit', 'Edit', 'Edit Permissions', 1, '2020-04-09 12:47:34', '2020-04-09 12:17:34', NULL, 0),
(2, 'add', 'Add', 'add permissions', 1, '2020-04-09 12:52:14', '2020-04-09 12:22:14', NULL, 0),
(3, 'delete', 'Delete', 'Delete Permissions', 1, '2020-04-09 12:58:25', '2020-04-09 12:28:25', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permission_roles`
--

CREATE TABLE `permission_roles` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission_roles`
--

INSERT INTO `permission_roles` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(4, 1),
(4, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `display_name` varchar(30) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`, `deleted`) VALUES
(1, 'admin', 'admin', 'admin', 1, NULL, NULL, NULL, 0),
(2, 'manager', 'Manager', 'Hello World', 1, '2020-04-09 12:33:26', NULL, NULL, 0),
(4, 'master', 'Master', 'Access Master', 1, '2020-04-09 12:54:35', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE `roles_users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `financial_year` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `financial_year`) VALUES
(15, '2019-20'),
(20, '2020-21'),
(21, '2021-22');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'SHREE ERP'),
(2, 'system_title', 'ERP');

-- --------------------------------------------------------

--
-- Table structure for table `src`
--

CREATE TABLE `src` (
  `id` int(11) NOT NULL,
  `fabName` varchar(255) NOT NULL,
  `purchase` double NOT NULL,
  `fabCode` varchar(255) NOT NULL,
  `sale_rate` double NOT NULL,
  `created_at` varchar(62) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `src`
--

INSERT INTO `src` (`id`, `fabName`, `purchase`, `fabCode`, `sale_rate`, `created_at`, `updated_at`) VALUES
(14, '101/02', 145, 'AY', 789, '2020-03-27 14:11:56', '2020-03-27 14:11:56'),
(19, '101/02', 145, 'AS', 0, '2020-03-27 13:47:20', '2020-03-27 13:47:20'),
(20, '107 B-2', 115, 'H', 395, '2020-04-02 13:34:23', '2020-04-02 13:34:23'),
(21, '101/02 PRT', 290, '', 0, '2020-04-02 09:13:00', '2020-04-02 09:13:00'),
(22, '111/02', 0, '', 0, '2020-04-02 09:14:47', '2020-04-02 09:14:47'),
(23, '111/04', 0, '', 0, '2020-04-02 09:14:59', '2020-04-02 09:14:59'),
(24, '111/04 PRT', 0, '', 0, '2020-04-02 09:15:07', '2020-04-02 09:15:07'),
(18, '131/05', 355, 'AY', 0, '2020-03-27 13:46:43', '2020-03-27 13:46:43'),
(17, '131/05', 355, '', 1000, '2020-04-02 09:41:25', '2020-04-02 09:41:25'),
(25, '111/04 T', 0, '', 0, '2020-04-02 09:15:18', '2020-04-02 09:15:18'),
(26, '111/02 PRT', 0, '', 0, '2020-04-02 09:15:29', '2020-04-02 09:15:29'),
(27, '111/08', 0, '', 0, '2020-04-02 09:15:37', '2020-04-02 09:15:37'),
(28, '107 B-2', 115, 'C', 265, '2020-04-02 13:17:28', '2020-04-02 13:17:28'),
(29, '131/07', 0, '', 0, '2020-04-02 09:18:39', '2020-04-02 09:18:39'),
(30, '131/05 PRT', 0, '', 0, '2020-04-02 09:18:49', '2020-04-02 09:18:49'),
(31, '311', 0, '', 0, '2020-04-02 09:20:04', '2020-04-02 09:20:04'),
(32, '312', 0, '', 0, '2020-04-02 09:20:26', '2020-04-02 09:20:26'),
(33, '313', 0, '', 0, '2020-04-02 09:20:31', '2020-04-02 09:20:31'),
(34, '314', 0, '', 0, '2020-04-02 09:20:38', '2020-04-02 09:20:38'),
(35, '315', 0, '', 0, '2020-04-02 09:20:47', '2020-04-02 09:20:47'),
(36, '316', 0, '', 0, '2020-04-02 09:21:03', '2020-04-02 09:21:03'),
(37, '107 B-2', 115, 'D', 290, '2020-04-02 13:25:44', '2020-04-02 13:25:44'),
(38, '107 B-2', 115, 'G', 37000, '2020-04-05 03:21:35', '2020-04-05 03:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `sub_department`
--

CREATE TABLE `sub_department` (
  `id` int(11) NOT NULL,
  `deptName` varchar(20) NOT NULL,
  `subDeptName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_department`
--

INSERT INTO `sub_department` (`id`, `deptName`, `subDeptName`) VALUES
(8, 'Dept 1', 'S.S EMB'),
(9, 'Dept 1', 'S.C CREATION '),
(10, 'Dept 1', 'RAMESH DUBEY'),
(11, 'Dept 1', 'SHUBHKAMANA'),
(12, 'Dept 1', 'SNA CHANDAULI'),
(13, 'Dept 1', 'PSPL CHANDAULI'),
(14, 'Dept 4', 'MD ANAS'),
(15, 'Dept 4', 'TAMANNA');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `unitName` varchar(15) NOT NULL,
  `unitSymbol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `unitName`, `unitSymbol`) VALUES
(1, 'METER', 'MTR'),
(2, 'PICES', 'PCS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `code` varchar(6) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `code`, `status`, `description`, `created_at`, `updated_at`, `deleted_at`, `deleted`) VALUES
(1, 'admin', 'admin', '$2y$10$ZMQOPfEVLtMrp51j9i3JBeKeOrOXEbvK/XZ2NYx48QqdM766dJBB.', '', 1, NULL, '2020-04-09 18:30:00', NULL, NULL, 0),
(2, 'Master', 'master', '$2y$10$t8vYSFETpE5m0qFDmNBBAeWH5aulWcOZmZ87JKBxg2geJwxsGnboG', NULL, 1, NULL, '2020-04-10 08:29:01', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure for view `design_view`
--
DROP TABLE IF EXISTS `design_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `design_view`  AS  select `design`.`id` AS `id`,`design`.`designName` AS `designName`,`design`.`designSeries` AS `designSeries`,`erc`.`desCode` AS `desCode`,`erc`.`rate` AS `rate`,`design`.`stitch` AS `stitch`,`design`.`dye` AS `dye`,`design`.`matching` AS `matching`,`src`.`sale_rate` AS `sale_rate`,`design`.`htCattingRate` AS `htCattingRate`,`design`.`designPic` AS `designPic`,`design`.`fabricName` AS `fabricName`,`design`.`barCode` AS `barCode`,`design`.`designOn` AS `designOn` from ((`design` left join `erc` on(`design`.`designName` = `erc`.`desName`)) left join `src` on(`src`.`fabName` = `design`.`fabricName` and `src`.`fabCode` = `erc`.`desCode`)) order by `design`.`id` desc ;

-- --------------------------------------------------------

--
-- Structure for view `order_flow_chart`
--
DROP TABLE IF EXISTS `order_flow_chart`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_flow_chart`  AS  select `order_table`.`order_date` AS `order_date`,`order_table`.`order_number` AS `order_number`,count(`order_product`.`order_id`) AS `total`,(select count(`order_product`.`id`) from `order_product` where `order_product`.`order_id` = `order_table`.`order_id` and `order_product`.`status` = 'INPROCESS') AS `inprocess`,(select count(`order_product`.`id`) from `order_product` where `order_product`.`order_id` = `order_table`.`order_id` and `order_product`.`status` = 'PENDING') AS `pending`,(select count(`order_product`.`id`) from `order_product` where `order_product`.`order_id` = `order_table`.`order_id` and `order_product`.`status` = 'CANCEL') AS `cancel` from (`order_table` join `order_product` on(`order_table`.`order_id` = `order_product`.`order_id`)) group by `order_table`.`order_id` order by `order_table`.`order_date` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch_detail`
--
ALTER TABLE `branch_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_category`
--
ALTER TABLE `data_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emb`
--
ALTER TABLE `emb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erc`
--
ALTER TABLE `erc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabric`
--
ALTER TABLE `fabric`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fda_table`
--
ALTER TABLE `fda_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hsn`
--
ALTER TABLE `hsn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobtypeconstant`
--
ALTER TABLE `jobtypeconstant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobtypepercent`
--
ALTER TABLE `jobtypepercent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_work_party`
--
ALTER TABLE `job_work_party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_work_type`
--
ALTER TABLE `job_work_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mamber_types`
--
ALTER TABLE `mamber_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_confige`
--
ALTER TABLE `mobile_confige`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_order_id` (`product_order_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_number` (`order_number`);

--
-- Indexes for table `order_type`
--
ALTER TABLE `order_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD PRIMARY KEY (`role_id`,`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_user_roles_role_Name` (`name`);

--
-- Indexes for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `src`
--
ALTER TABLE `src`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_department`
--
ALTER TABLE `sub_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch_detail`
--
ALTER TABLE `branch_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `data_category`
--
ALTER TABLE `data_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `emb`
--
ALTER TABLE `emb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `erc`
--
ALTER TABLE `erc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `fabric`
--
ALTER TABLE `fabric`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `fda_table`
--
ALTER TABLE `fda_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `hsn`
--
ALTER TABLE `hsn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `jobtypeconstant`
--
ALTER TABLE `jobtypeconstant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `jobtypepercent`
--
ALTER TABLE `jobtypepercent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_work_party`
--
ALTER TABLE `job_work_party`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `job_work_type`
--
ALTER TABLE `job_work_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `mamber_types`
--
ALTER TABLE `mamber_types`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `mobile_confige`
--
ALTER TABLE `mobile_confige`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `order_type`
--
ALTER TABLE `order_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `src`
--
ALTER TABLE `src`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sub_department`
--
ALTER TABLE `sub_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
