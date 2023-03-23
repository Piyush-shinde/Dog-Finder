-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 12:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcart`
--

CREATE TABLE `addcart` (
  `cart_id` int(11) NOT NULL,
  `pet_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `cat_id` int(11) NOT NULL,
  `catname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`cat_id`, `catname`) VALUES
(1, 'rabbit'),
(2, 'dog'),
(3, 'cat'),
(4, 'parrot');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL,
  `feed_img` varchar(100) NOT NULL,
  `feed_desc` varchar(300) NOT NULL,
  `pet_id` int(20) NOT NULL,
  `rating` int(1) NOT NULL,
  `feed_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_reply`
--

CREATE TABLE `feedback_reply` (
  `reply_id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL,
  `feedback_id` int(30) NOT NULL,
  `reply_desc` varchar(1000) NOT NULL,
  `reply_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newuser`
--

CREATE TABLE `newuser` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(35) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `user_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newuser`
--

INSERT INTO `newuser` (`id`, `username`, `password`, `phoneno`, `address`, `email`, `city`, `pincode`, `user_img`) VALUES
(1, 'user', 'user', '9876543210', 'india', 'example@gmail.com', 'india', '605005', 'beagle dog1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_placed`
--

CREATE TABLE `order_placed` (
  `order_id` int(11) NOT NULL,
  `pet_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `user_id` int(20) NOT NULL,
  `order_cancel` int(20) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_placed`
--

INSERT INTO `order_placed` (`order_id`, `pet_id`, `qty`, `user_id`, `order_cancel`, `order_date`) VALUES
(15, 6, 5, 1, 0, '2020-07-12 10:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `petdetails`
--

CREATE TABLE `petdetails` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `pet_type` varchar(50) NOT NULL,
  `pet_color` varchar(20) NOT NULL,
  `pet_rate` varchar(10) NOT NULL,
  `pet_keywords` varchar(200) NOT NULL,
  `pet_features1` varchar(50) NOT NULL,
  `pet_features2` varchar(50) NOT NULL,
  `pet_img1` varchar(50) NOT NULL,
  `pet_img2` varchar(50) NOT NULL,
  `pet_img3` varchar(50) NOT NULL,
  `pet_img4` varchar(50) NOT NULL,
  `pet_foods` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petdetails`
--

INSERT INTO `petdetails` (`pet_id`, `pet_name`, `pet_type`, `pet_color`, `pet_rate`, `pet_keywords`, `pet_features1`, `pet_features2`, `pet_img1`, `pet_img2`, `pet_img3`, `pet_img4`, `pet_foods`) VALUES
(6, 'two face_ toned cat', 'rabbit', 'black and white', '2000', 'cate', 'darker brown paws, ears, sometimes face and bright', 'cream-colored body', 'cat3.jpg', 'cat4.jpg', 'two-tone-cat.jpg', 'cat3.jpg', 'milk,rice etc'),
(9, 'fancy rabbit', 'rabbit', 'white', '1500', 'rabbit', 'cute ear', 'looking nice ', 'lionhead rabbit.jpg', 'Angora-Rabbit-Photo.jpg', '5-popular-bunnies-netherlands-dwarf-511074055.jpg', 'gaint rabbit.jpg', 'Basil, Bokchoy,Carrot etc'),
(10, 'alaska', 'rabbit', 'black', '1000', 'rabbit,muyal', 'black and white', 'dark brown', '5-popular-bunnies-netherlands-dwarf-511074055.jpg', 'Angora-Rabbit-Photo.jpg', 'lionhead rabbit.jpg', 'fancy rabbit.jpg', 'dark leafy greens, various squashes, carrots etc'),
(11, 'parrot Green', 'bird', 'green', '500', 'parrot,kili,keeli,kile', 'colorfull', 'dark red nose', 'indian parrots_.jpg', 'parrot1.jpg', 'parrot2.jpg', 'parrot.jpg', 'vegetables etc'),
(12, 'love bird', 'bird', 'blue mixing', '1500', 'parrot,kili,keeli,kile', 'colorfull', 'nice ear', 'love3.jpg', 'love bird.jpg', 'love4.jpg', 'love4.jpg', 'vegetables etc'),
(13, 'bengal dog', 'dog', 'black and white', '1500', 'dog,nai', 'colorfull', 'looking nice ', 'beagle dog1.jpg', 'dog2.jpg', 'dog3.jpg', 'dog3.jpg', 'pedigiry'),
(14, 'pixabay', 'rabbit', 'brown', '500', 'rabbit,muyal', 'colorfull', 'looking nice ', 'pixabay2.jpg', 'pixabay2.jpg', 'pixabay1rab.jpg', 'pixabay4.jpg', 'vegetables etc'),
(20, 'lusy', 'dog', 'black with brown', '2500', 'dog,nai', 'soft hair', 'looking nice ', 'lucy dog.jpg', 'l2.jpg', 'l3.jpg', 'l4.jpg', 'pedigiry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcart`
--
ALTER TABLE `addcart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `feedback_reply`
--
ALTER TABLE `feedback_reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `newuser`
--
ALTER TABLE `newuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_placed`
--
ALTER TABLE `order_placed`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `petdetails`
--
ALTER TABLE `petdetails`
  ADD PRIMARY KEY (`pet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcart`
--
ALTER TABLE `addcart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback_reply`
--
ALTER TABLE `feedback_reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `newuser`
--
ALTER TABLE `newuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_placed`
--
ALTER TABLE `order_placed`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `petdetails`
--
ALTER TABLE `petdetails`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
