-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 05:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transportation`
--

-- --------------------------------------------------------

--
-- Table structure for table `dtrain`
--

CREATE TABLE `dtrain` (
  `id` int(11) NOT NULL,
  `trainttatus` varchar(60) NOT NULL,
  `trainlatitude` double NOT NULL,
  `trainlongitude` double NOT NULL,
  `traincode` varchar(60) NOT NULL,
  `traindate` varchar(60) NOT NULL,
  `publicmessage` varchar(150) NOT NULL,
  `direction` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dtrain`
--

INSERT INTO `dtrain` (`id`, `trainttatus`, `trainlatitude`, `trainlongitude`, `traincode`, `traindate`, `publicmessage`, `direction`) VALUES
(0, 'R', 53.2043, -6.10046, 'E187', '22 Apr 2020', 'E187\n22:50 - Malahide to Greystones (0 mins late)\nArrived Bray next stop Greystones', 'Southbound'),
(0, 'R', 53.2991, -6.16512, 'E297', '22 Apr 2020', 'E297\n23:20 - Howth to Bray (0 mins late)\nArrived Seapoint next stop Salthill and Monkstown', 'Southbound'),
(0, 'R', 53.3099, -6.19498, 'E772', '22 Apr 2020', 'E772\n23:35 - Bray to Dublin Connolly (2 mins late)\nArrived Booterstown next stop Sydney Parade', 'Northbound'),
(0, 'R', 53.3704, -6.50598, 'D938', '22 Apr 2020', 'D938\n23:20 - Dublin Pearse to Maynooth (2 mins late)\nDeparted Leixlip (Louisa Bridge) next stop Maynooth', 'Northbound'),
(0, 'R', 53.3786, -6.19131, 'E773', '22 Apr 2020', 'E773\n23:50 - Malahide to Dublin Connolly (0 mins late)\nArrived Harmonstown next stop Killester', 'Southbound'),
(0, 'R', 53.392, -6.11448, 'E992', '22 Apr 2020', 'E992\n23:00 - Bray to Howth (2 mins late)\nDeparted Sutton next stop Howth', 'Northbound'),
(0, 'T', 53.163, -6.90802, 'D221', '22 Apr 2020', 'D221\n23:10 - Dublin Heuston to Kildare(3 mins late)\nTERMINATED Kildare at 23:57', 'To Kildare');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
