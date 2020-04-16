-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2020 at 01:07 PM
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
-- Structure for view `order_flow_chart`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`mcfojotc`@`localhost` SQL SECURITY DEFINER VIEW `order_flow_chart`  AS  select `order_table`.`order_date` AS `order_date`,`order_table`.`order_number` AS `order_number`,count(`order_product`.`order_id`) AS `total`,(select count(`order_product`.`id`) from `order_product` where `order_product`.`order_id` = `order_table`.`order_id` and `order_product`.`status` = 'INPROCESS') AS `inprocess`,(select count(`order_product`.`id`) from `order_product` where `order_product`.`order_id` = `order_table`.`order_id` and `order_product`.`status` = 'PENDING') AS `pending`,(select count(`order_product`.`id`) from `order_product` where `order_product`.`order_id` = `order_table`.`order_id` and `order_product`.`status` = 'CANCEL') AS `cancel` from (`order_table` join `order_product` on(`order_table`.`order_id` = `order_product`.`order_id`)) group by `order_table`.`order_id` order by `order_table`.`order_date` desc ;

--
-- VIEW  `order_flow_chart`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
