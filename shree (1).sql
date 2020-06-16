-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2020 at 12:56 PM
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
-- Stand-in structure for view `fabric_stock_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `fabric_stock_view`;
CREATE TABLE IF NOT EXISTS `fabric_stock_view` (
`fsr_id` int(11)
,`parent_barcode` varchar(24)
,`parent` varchar(11)
,`fabric_type` varchar(24)
,`hsn` varchar(64)
,`stock_quantity` double(6,2)
,`current_stock` double(6,2)
,`stock_unit` varchar(6)
,`challan_no` varchar(64)
,`unit_id` varchar(11)
,`color_name` varchar(24)
,`ad_no` varchar(32)
,`purchase_code` varchar(12)
,`purchase_rate` int(11)
,`total_value` double(8,2)
,`tc` double(5,2)
,`challan_type` enum('recieve','return','tc')
,`created_date` date
,`fabricName` varchar(20)
,`challan_from` varchar(20)
,`challan_to` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `fabric_stock_view`
--
DROP TABLE IF EXISTS `fabric_stock_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`rectclub`@`localhost` SQL SECURITY DEFINER VIEW `fabric_stock_view`  AS  select `fabric_stock_received`.`fsr_id` AS `fsr_id`,`fabric_stock_received`.`parent_barcode` AS `parent_barcode`,`fabric_stock_received`.`parent` AS `parent`,`fabric_stock_received`.`fabric_type` AS `fabric_type`,`fabric_stock_received`.`hsn` AS `hsn`,`fabric_stock_received`.`stock_quantity` AS `stock_quantity`,`fabric_stock_received`.`current_stock` AS `current_stock`,`fabric_stock_received`.`stock_unit` AS `stock_unit`,`fabric_stock_received`.`challan_no` AS `challan_no`,`fabric_stock_received`.`unit_id` AS `unit_id`,`fabric_stock_received`.`color_name` AS `color_name`,`fabric_stock_received`.`ad_no` AS `ad_no`,`fabric_stock_received`.`purchase_code` AS `purchase_code`,`fabric_stock_received`.`purchase_rate` AS `purchase_rate`,`fabric_stock_received`.`total_value` AS `total_value`,`fabric_stock_received`.`tc` AS `tc`,`fabric_stock_received`.`challan_type` AS `challan_type`,`fabric_stock_received`.`created_date` AS `created_date`,`fabric`.`fabricName` AS `fabricName`,`sb1`.`subDeptName` AS `challan_from`,`sb2`.`subDeptName` AS `challan_to` from ((((`fabric_stock_received` join `fabric` on((`fabric`.`id` = `fabric_stock_received`.`fabric_id`))) join `fabric_challan` `fc` on((`fc`.`challan_no` = `fabric_stock_received`.`challan_no`))) join `sub_department` `sb1` on((`sb1`.`id` = `fc`.`challan_from`))) join `sub_department` `sb2` on((`sb2`.`id` = `fc`.`challan_from`))) where (`fabric_stock_received`.`isStock` = 1) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
