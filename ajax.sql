-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 04:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `manusia`
--

CREATE TABLE `manusia` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `alamat` varchar(150) NOT NULL,
  `photo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manusia`
--

INSERT INTO `manusia` (`id`, `nama`, `alamat`, `photo`) VALUES
(37, 'Ronaldo 7', 'Portugal', '1733975265_487af708b8cf7c1a4a6f.jpg'),
(38, 'Buffon', 'Italy', '1733978928_c60949d378e6d8bd0185.jpg'),
(39, 'Neymar Jr', 'Brazil', '1733975316_4a5dbdf72c1d4fa4569d.jpg'),
(41, 'Ronaldo 9', 'Italy', '1733980354_962520ec1c2c164263b3.jpg'),
(42, 'Ronaldo 7sd', 'mandailing', '1733980371_c709300acbfd9a88337f.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manusia`
--
ALTER TABLE `manusia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manusia`
--
ALTER TABLE `manusia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
