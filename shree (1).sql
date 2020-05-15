-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 13, 2020 at 06:41 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shree`
--

-- --------------------------------------------------------

--
-- Table structure for table `fabric_challan`
--

DROP TABLE IF EXISTS `fabric_challan`;
CREATE TABLE IF NOT EXISTS `fabric_challan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(64) DEFAULT NULL,
  `challan_from` varchar(9) NOT NULL,
  `challan_to` varchar(9) NOT NULL,
  `challan_no` varchar(64) NOT NULL,
  `challan_date` datetime NOT NULL,
  `unit` int(11) NOT NULL,
  `fabric_type` varchar(64) NOT NULL,
  `total_quantity` int(4) DEFAULT NULL,
  `total_pcs` int(4) DEFAULT NULL,
  `total_amount` double(10,2) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fabric_challan`
--

INSERT INTO `fabric_challan` (`id`, `created`, `created_by`, `challan_from`, `challan_to`, `challan_no`, `challan_date`, `unit`, `fabric_type`, `total_quantity`, `total_pcs`, `total_amount`, `last_update`, `deleted`) VALUES
(8, '0000-00-00 00:00:00', '1', '9', '10', 'SNLP1', '2020-05-11 00:00:00', 1, 'THAN', 82, 2, 164000.00, '2020-05-11 13:00:51', 0),
(10, '2020-05-11 18:45:08', '1', '10', '9', 'SNW2', '2020-05-11 00:00:00', 2, 'SAREE', 2, 2, 220.00, '2020-05-11 13:15:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fabric_stock_received`
--

DROP TABLE IF EXISTS `fabric_stock_received`;
CREATE TABLE IF NOT EXISTS `fabric_stock_received` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fabric_challan_id` int(11) NOT NULL,
  `parent_barcode` varchar(24) NOT NULL COMMENT 'parent_barcode ( ''p'' + $id )',
  `parent` varchar(11) DEFAULT NULL COMMENT 'parent _barcode From $this Table ',
  `fabric_id` varchar(11) DEFAULT NULL,
  `fabric_type` varchar(24) DEFAULT NULL,
  `hsn` varchar(64) NOT NULL,
  `stock_quantity` double(6,2) NOT NULL DEFAULT '0.00',
  `current_stock` double(6,2) NOT NULL,
  `stock_unit` varchar(6) DEFAULT NULL,
  `challan_no` varchar(64) NOT NULL,
  `unit_id` varchar(11) NOT NULL COMMENT 'Unit Id From Unit Table',
  `color_name` varchar(24) DEFAULT NULL,
  `ad_no` varchar(32) DEFAULT NULL,
  `purchase_code` varchar(12) DEFAULT NULL,
  `purchase_rate` int(11) DEFAULT NULL,
  `total_value` double(8,2) NOT NULL,
  `tc` double(2,2) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `parent_barcode` (`parent_barcode`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fabric_stock_received`
--

INSERT INTO `fabric_stock_received` (`id`, `fabric_challan_id`, `parent_barcode`, `parent`, `fabric_id`, `fabric_type`, `hsn`, `stock_quantity`, `current_stock`, `stock_unit`, `challan_no`, `unit_id`, `color_name`, `ad_no`, `purchase_code`, `purchase_rate`, `total_value`, `tc`, `created_date`, `last_update`, `deleted`) VALUES
(19, 8, 'P1', NULL, '27', 'THAN', '55/5008', 32.00, 0.00, '1', '', '', 'GREEN', '130', 'ABC', 2000, 64000.00, NULL, NULL, '2020-05-11 13:00:51', 0),
(20, 8, 'P2', NULL, '20', 'THAN', '55/5007', 50.00, 0.00, '1', '', '', 'GREEN', '130', 'ABC', 2000, 100000.00, NULL, NULL, '2020-05-11 13:00:51', 0),
(22, 10, 'P3', NULL, '29', 'SAREE', '55/5008', 1.00, 0.00, '2', '', '', '25', '133', 'FDRS', 120, 120.00, NULL, NULL, '2020-05-11 13:15:08', 0),
(23, 10, 'P4', NULL, '27', 'SAREE', '55/107', 1.00, 0.00, '2', '', '', '25', '133', 'FDRS', 100, 100.00, NULL, NULL, '2020-05-11 13:15:09', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
