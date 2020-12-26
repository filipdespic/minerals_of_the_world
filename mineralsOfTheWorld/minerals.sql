-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2020 at 12:45 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minerals`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `mineral_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `username`, `content`, `mineral_id`) VALUES
(1, 'gagi', 'coment 1', 3),
(2, 'despic', 'extra sve super', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mineral`
--

CREATE TABLE `mineral` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mineral`
--

INSERT INTO `mineral` (`id`, `username`, `title`, `locality`, `price`, `img`) VALUES
(1, 'nenad', 'Malachite', 'Star of Congo, DRC', 90, 'https://m.media-amazon.com/images/S/aplus-seller-content-images-us-east-1/ATVPDKIKX0DER/A3DMYIN9K0RYXC/B06XCDH5W9/NQ2m8OyeSG2u._UX800_TTW__.jpg'),
(2, 'filip', 'Baryte', 'Turt mine, Romania', 120, 'https://www.turkishminerals.org/wp-content/uploads/2020/04/NATURAL-STEATITE-TALC.png'),
(3, 'nenad', 'Native copper', 'Itauz mine, Kazahstan', 210, 'https://upload.wikimedia.org/wikipedia/commons/d/d7/Native_Copper_%28mineral%29.jpg'),
(4, 'nenad', 'Orpiment ', 'La Libertad, Peru', 45, 'https://geologyscience.com/wp-content/uploads/2018/05/Orpiment-Mineral-1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mineral`
--
ALTER TABLE `mineral`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mineral`
--
ALTER TABLE `mineral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
