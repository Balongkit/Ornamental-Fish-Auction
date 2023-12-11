-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 05:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`) VALUES
(14),
(15),
(16),
(17),
(18),
(46);

-- --------------------------------------------------------

--
-- Table structure for table `page2`
--

CREATE TABLE `page2` (
  `items_id` varchar(50) NOT NULL,
  `pic` text NOT NULL,
  `discript` varchar(100) NOT NULL,
  `start_bid` int(255) NOT NULL,
  `increm_bid` int(255) NOT NULL,
  `bo` int(255) NOT NULL,
  `time` int(255) NOT NULL,
  `bid_amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page2`
--

INSERT INTO `page2` (`items_id`, `pic`, `discript`, `start_bid`, `increm_bid`, `bo`, `time`, `bid_amount`) VALUES
('', '', '', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `page11`
--

CREATE TABLE `page11` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bday` varchar(255) NOT NULL,
  `bmonth` varchar(255) NOT NULL,
  `byear` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `balance` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page11`
--

INSERT INTO `page11` (`id`, `firstname`, `lastname`, `account`, `password`, `bday`, `bmonth`, `byear`, `gender`, `balance`) VALUES
(8, 'Winchel', 'Balongkit', 'ilykyou22@gmail.com', '123456', '2', '12', '1993', 'male', 0),
(9, 'larry', 'caberty', 'larry@gmail.com', '1234', '3', '10', '1999', 'male', 0),
(10, 'Hazel Noreen', 'Origines', 'ohazelnoreen@gmail.com', '1234', '6', '4', '1999', 'female', 0),
(11, 'Clyne', 'Patindol', 'clyne@gmail.com', 'clyne', '2', '12', '1993', 'female', 0);

-- --------------------------------------------------------

--
-- Table structure for table `page22`
--

CREATE TABLE `page22` (
  `items_id` varchar(255) NOT NULL,
  `fishtype` varchar(255) NOT NULL,
  `fishvar` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `descript` varchar(255) NOT NULL,
  `starting_bid` int(255) NOT NULL,
  `increm_bid` int(255) NOT NULL,
  `bo` int(255) NOT NULL,
  `time` time(6) NOT NULL,
  `bid_amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page22`
--

INSERT INTO `page22` (`items_id`, `fishtype`, `fishvar`, `pic`, `descript`, `starting_bid`, `increm_bid`, `bo`, `time`, `bid_amount`) VALUES
('', 'goldfish', 'Veiltail', 'chaos_spawn_1.png', 'ako ang pinaka gwapo na isda', 20, 5, 200, '00:00:00.000000', 0),
('', 'koi', 'Asagi', 'chaos_spawn_4.png', 'ako ang pinaka gwapo nakoi.', 25, 2, 500, '00:00:00.000000', 0),
('', 'betta', 'Veiltail', 'chaos_spawn_5.png', 'edqweqweqw', 25, 3, 200, '00:00:00.000000', 0),
('', 'goldfish', 'Lionhead', 'chaos_spawn_1.png', 'sdasdas', 24, 2, 255, '00:00:00.000000', 0),
('', 'goldfish', '', 'chaos_spawn_1.png', 'sdasdas', 24, 2, 255, '00:00:00.000000', 0),
('', 'goldfish', '', 'chaos_spawn_1.png', 'sdasdas', 24, 2, 255, '22:23:00.000000', 0),
('', 'goldfish', '', 'chaos_spawn_1.png', 'sdasdas', 24, 2, 255, '02:25:00.000000', 0),
('', 'goldfish', '', 'chaos_spawn_1.png', 'sdasdas', 24, 2, 255, '22:30:00.000000', 0),
('', 'koi', 'Benigoi', 'chaos_spawn_1.png', 'sdasdas', 24, 2, 255, '20:30:00.000000', 0),
('', 'guppy', 'Red', '', 'sdasdas', 24, 2, 255, '08:30:00.000000', 0),
('', 'goldfish', 'Ryukin', '3cf230ac-95ee-4859-bc1f-24f2da3f7b96_Intro_to_Sprite_Anims_cover.png', 'eqweqwe', 24, 1, 2222, '01:24:00.000000', 0),
('', 'guppy', 'Yellow', 'chaos_spawn_4.png', 'weqqweqw', 24, 2, 2000, '01:00:00.000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `fishvar` varchar(255) NOT NULL,
  `descript` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `increm_bid` int(255) NOT NULL,
  `bo` int(255) NOT NULL,
  `time` time(6) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `fishvar`, `descript`, `price`, `increm_bid`, `bo`, `time`, `discount`, `product_image`) VALUES
(44, 'Goldfish', 'Oranda', '0', 50, 5, 1000, '01:01:00.000000', 0, 'uploads/Oranda Goldfish Desktop Wallpaper.jpg'),
(45, 'Goldfish', 'Redcap', 'an red cup goldfish breeder si', 20, 1, 500, '02:00:00.000000', 0, 'uploads/Oranda-Goldfish-Definitive-Care-Guide-Color-Varieties-Size-Lifespan-and-More...-Banner.webp'),
(46, 'Goldfish', 'Telescope', 'a breeder size butterfly teles', 20, 1, 500, '22:00:00.000000', 0, 'uploads/R.jfif'),
(47, 'Betta', 'Halfmoon', 'Beautiful Betta - Fancy HalfMo', 50, 5, 1500, '01:00:00.000000', 0, 'uploads/9984aa425602e425c85ff2bab7e991d2.jpg'),
(48, 'Betta', 'Veiltail', 'SuperRed Betta so beautiful. ', 50, 10, 1500, '14:11:00.000000', 0, 'uploads/b9c999cd5ee53e275f74d27e9a6f2a32-700.jpg'),
(49, 'Betta', 'HMPK', 'Betta Fish Afira: Betta HMPK S', 50, 10, 1500, '22:00:00.000000', 0, 'uploads/R (1).jfif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `page11`
--
ALTER TABLE `page11`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `page11`
--
ALTER TABLE `page11`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
