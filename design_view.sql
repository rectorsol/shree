-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2020 at 01:02 PM
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
-- Structure for view `design_view`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `design_view`  AS  select `design`.`id` AS `id`,`design`.`designName` AS `designName`,`design`.`designSeries` AS `designSeries`,`erc`.`desCode` AS `desCode`,`erc`.`rate` AS `rate`,`design`.`stitch` AS `stitch`,`design`.`dye` AS `dye`,`design`.`matching` AS `matching`,`src`.`sale_rate` AS `sale_rate`,`design`.`htCattingRate` AS `htCattingRate`,`design`.`designPic` AS `designPic`,`design`.`fabricName` AS `fabricName`,`design`.`barCode` AS `barCode`,`design`.`designOn` AS `designOn` from ((`design` left join `erc` on(`design`.`designName` = `erc`.`desName`)) left join `src` on(`src`.`fabName` = `design`.`fabricName` and `src`.`fabCode` = `erc`.`desCode`)) order by `design`.`id` desc ;

--
-- VIEW  `design_view`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
