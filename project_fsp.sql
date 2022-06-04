-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 09:55 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_fsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `nomor` int(11) NOT NULL,
  `iduser` varchar(100) NOT NULL,
  `is_click` tinyint(4) NOT NULL,
  `role` varchar(100) NOT NULL,
  `turn` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`nomor`, `iduser`, `is_click`, `role`, `turn`) VALUES
(1, 'augie', 0, 'X', 1),
(2, 'budi', 0, 'O', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tic_tac_toe`
--

CREATE TABLE `tic_tac_toe` (
  `id` int(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tic_tac_toe`
--

INSERT INTO `tic_tac_toe` (`id`, `role`) VALUES
(11, 'X'),
(12, 'O'),
(22, 'X'),
(31, 'O'),
(21, 'X'),
(32, 'O'),
(23, 'X'),
(33, 'O');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
