-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 12:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `i_id` int(11) NOT NULL,
  `u_id` int(10) NOT NULL,
  `iname` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` int(20) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`i_id`, `u_id`, `iname`, `category`, `price`, `image`, `time`) VALUES
(10, 15, 'Chicken Biriyani', 'Non Veg', 210, '20052902435615.gif', '2020-05-29'),
(11, 15, 'Somasa', 'Veg', 40, '20052902443315.jpg', '2020-05-29'),
(12, 13, 'Chicken Chowmin', 'Non Veg', 130, '20052902530713.jpg', '2020-05-29'),
(13, 13, 'Veg Chowmin', 'Veg', 100, '20052902535413.jpg', '2020-05-29'),
(14, 18, 'Crispy Chicken', 'Non Veg', 200, '20052902590218.jpg', '2020-05-29'),
(15, 18, 'Nashville chicken', 'Non Veg', 450, '20052903000018.jpg', '2020-05-29'),
(16, 14, 'Ilish Paturi', 'Non Veg', 340, '20052903025814.jpg', '2020-05-29'),
(17, 14, 'Matar Panner', 'Veg', 230, '20052903035614.jpg', '2020-05-29'),
(18, 15, 'Veg Pokora', 'Veg', 70, '20052905085815.jpg', '2020-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `orderhead`
--

CREATE TABLE `orderhead` (
  `oh_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `grand_total` int(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderhead`
--

INSERT INTO `orderhead` (`oh_id`, `customer_id`, `grand_total`, `date`) VALUES
(1, 16, 160, '2020-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `oh_id` int(10) NOT NULL,
  `restaurant_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `subtotal` int(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `oh_id`, `restaurant_id`, `item_id`, `quantity`, `subtotal`, `date`) VALUES
(1, 1, 15, 11, 4, 160, '2020-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(20) NOT NULL,
  `choice` varchar(20) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `authorization` int(5) NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `email`, `mobile`, `choice`, `password`, `authorization`, `time`) VALUES
(13, 'Taiwah Restaurant', 'taiwah@gmail.com', 12345678, NULL, '29c4c6b74f5c9ce23068fe7825e48069', 1, '2020-05-29'),
(14, 'Bhojohori Manna', 'bhojohori@gmail.com', 12345679, NULL, 'c7412a1192177e9c7fbe253b06d253d5', 1, '2020-05-29'),
(15, 'Dhaba by Amber', 'dhaba@gmail.com', 12345680, NULL, 'b5a9b559d7dfe71fa9ca4e138d71e965', 1, '2020-05-29'),
(16, 'Sagar Banik', 'sagarbanik11@gmail.com', 2147483647, NULL, '41ed44e3038dbeee7d2ffaa7f51d8a4b', 2, '2020-05-29'),
(17, 'Sumit Banik', 'sumitbanik@gmail.com', 12345681, NULL, '7225ff71e8821b24fd72b4c8fda95b9a', 2, '2020-05-29'),
(18, 'KFC', 'kfc@gmail.com', 12345684, NULL, 'c3e39bf9f009b801037846853bfa9f2c', 1, '2020-05-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`i_id`),
  ADD KEY `u_id` (`u_id`) USING BTREE;

--
-- Indexes for table `orderhead`
--
ALTER TABLE `orderhead`
  ADD PRIMARY KEY (`oh_id`),
  ADD KEY `customer_id` (`customer_id`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `oh_id` (`oh_id`) USING BTREE,
  ADD KEY `item_id` (`item_id`) USING BTREE,
  ADD KEY `restaurant_id` (`restaurant_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orderhead`
--
ALTER TABLE `orderhead`
  MODIFY `oh_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `orderhead`
--
ALTER TABLE `orderhead`
  ADD CONSTRAINT `orderhead_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`oh_id`) REFERENCES `orderhead` (`oh_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `items` (`i_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
