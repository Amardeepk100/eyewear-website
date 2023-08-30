-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 04:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frames`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`email`, `password`) VALUES
('amardeep1@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_ids` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `product_quantities` varchar(255) DEFAULT NULL,
  `payment_status` tinyint(1) DEFAULT NULL,
  `delivery_status` varchar(255) DEFAULT 'Order Received',
  `order_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_ids`, `customer_id`, `product_quantities`, `payment_status`, `delivery_status`, `order_date_time`, `total_amount`) VALUES
(19, '30', 'amardeep2@gmail.com', '3', 1, 'Order Completed', '2023-06-13 19:33:36', 4897),
(20, '39', 'amardeep2@gmail.com', '2', 1, 'Order Out For Delivery', '2023-06-14 14:08:21', 3100),
(21, '28,29', 'amardeep2@gmail.com', '1,2', 1, 'Order Received', '2023-06-14 15:02:12', 7598),
(22, '27', 'amardeep1@gmail.com', '1', 1, 'Order Completed', '2023-07-16 15:16:03', 4300),
(23, '29,34,35', 'amardeep1@gmail.com', '2,2,2', 1, 'Order Received', '2023-08-25 19:22:49', 8694);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `model_no` varchar(25) NOT NULL,
  `product_type` varchar(25) NOT NULL,
  `product_color` varchar(25) NOT NULL,
  `product_price` int(20) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `frame_type` varchar(25) NOT NULL,
  `frame_shape` varchar(25) NOT NULL,
  `material` varchar(25) NOT NULL,
  `image_paths` text NOT NULL,
  `product_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `brand`, `model_no`, `product_type`, `product_color`, `product_price`, `gender`, `frame_type`, `frame_shape`, `material`, `image_paths`, `product_description`) VALUES
(27, 'John Jacobs', 'JJ S12956', 'Sunglasses', '#00ff00', 4200, 'Male', 'Full Rim', 'Rectangle', 'Italian Acetate', 'downhere/JJ S12956#00ff00/JJ S12956#00ff001.jpg,downhere/JJ S12956#00ff00/JJ S12956#00ff002.jpg,downhere/JJ S12956#00ff00/JJ S12956#00ff003.jpg', 'desc1'),
(28, 'John Jacobs', 'JJ S12956', 'Sunglasses', '#964b00', 4200, 'Male', 'Full Rim', 'Rectangle', 'Italian Acetate', 'downhere/JJ S12956#964b00/JJ S12956#964b001.jpg,downhere/JJ S12956#964b00/JJ S12956#964b002.jpg,downhere/JJ S12956#964b00/JJ S12956#964b003.jpg', 'desc2'),
(29, 'Vincent Chase Polarized', 'VC S14505', 'Sunglasses', '#0000ff', 1599, 'Male', 'Full Rim', 'Round', 'Stainless Steel', 'downhere/VC S14505#0000ff/VC S14505#0000ff1.jpg,downhere/VC S14505#0000ff/VC S14505#0000ff2.jpg,downhere/VC S14505#0000ff/VC S14505#0000ff3.jpg', ''),
(30, 'Vincent Chase', 'VC S15497', 'Sunglasses', '#00ff00', 1599, 'Male', 'Rimless', 'Square', 'Stainless Steel', 'downhere/VC S15497#00ff00/VC S15497#00ff001.jpg,downhere/VC S15497#00ff00/VC S15497#00ff002.jpg,downhere/VC S15497#00ff00/VC S15497#00ff003.jpg', ''),
(31, 'Vincent Chase Polarized', 'VC S14677', 'Sunglasses', '#00ff00', 1599, 'Female', 'Full Rim', 'Cat Eye', 'Polycarbonate', 'downhere/VC S14677#00ff00/VC S14677#00ff001.jpg,downhere/VC S14677#00ff00/VC S14677#00ff002.jpg,downhere/VC S14677#00ff00/VC S14677#00ff003.jpg', ''),
(32, 'Vincent Chase Polarized', 'VC S14677', 'Sunglasses', '#964b00', 1599, 'Female', 'Full Rim', 'Cat Eye', 'Polycarbonate', 'downhere/VC S14677#964b00/VC S14677#964b001.jpg,downhere/VC S14677#964b00/VC S14677#964b002.jpg,downhere/VC S14677#964b00/VC S14677#964b003.jpg', ''),
(33, 'Vincent Chase Polarized', 'VC S14677', 'Sunglasses', '#000001', 1599, 'Female', 'Full Rim', 'Cat Eye', 'Polycarbonate', 'downhere/VC S14677#000001/VC S14677#0000011.jpg,downhere/VC S14677#000001/VC S14677#0000012.jpg,downhere/VC S14677#000001/VC S14677#0000013.jpg', ''),
(34, 'Vincent Chase Polarized', 'VC S11167', 'Sunglasses', '#0000ff', 1299, 'Male', 'Full Rim', 'Wayfarer', 'Polycarbonate', 'downhere/VC S11167#0000ff/VC S11167#0000ff1.jpg,downhere/VC S11167#0000ff/VC S11167#0000ff2.jpg,downhere/VC S11167#0000ff/VC S11167#0000ff3.jpg', ''),
(35, 'Vincent Chase Polarized', 'VC S11167', 'Sunglasses', '#a0a0f0', 1299, 'Male', 'Full Rim', 'Wayfarer', 'Polycarbonate', 'downhere/VC S11167#a0a0f0/VC S11167#a0a0f01.jpg,downhere/VC S11167#a0a0f0/VC S11167#a0a0f02.jpg,downhere/VC S11167#a0a0f0/VC S11167#a0a0f03.jpg', ''),
(36, 'Vincent Chase Polarized', 'VC S11167', 'Sunglasses', '#00ff00', 1299, 'Male', 'Full Rim', 'Wayfarer', 'Open this select Material', 'downhere/VC S11167#00ff00/VC S11167#00ff001.jpg,downhere/VC S11167#00ff00/VC S11167#00ff002.jpg,downhere/VC S11167#00ff00/VC S11167#00ff003.jpg', ''),
(37, 'Vincent Chase Polarized', 'VC S11075', 'Sunglasses', '#0000ff', 1599, 'Male', 'Full Rim', 'Aviator', 'Stainless Steel', 'downhere/VC S11075#0000ff/VC S11075#0000ff1.jpg,downhere/VC S11075#0000ff/VC S11075#0000ff2.jpg,downhere/VC S11075#0000ff/VC S11075#0000ff3.jpg', ''),
(38, 'Lenskart STUDIO', 'LK E15208', 'Eyeglasses', '#ffd700', 2700, 'Female', 'Half Rim', 'Cat Eye', 'Stainless Steel', 'downhere/LK E15208#ffd700/LK E15208#ffd7001.jpg,downhere/LK E15208#ffd700/LK E15208#ffd7002.jpg,downhere/LK E15208#ffd700/LK E15208#ffd7003.jpg', ''),
(39, 'Lenskart Air', 'LA E15395', 'Eyeglasses', '#30d5c8', 1500, 'Male', 'Full Rim', 'Hexagonal', 'TR90', 'downhere/LA E15395#30d5c8/LA E15395#30d5c81.jpg,downhere/LA E15395#30d5c8/LA E15395#30d5c82.jpg,downhere/LA E15395#30d5c8/LA E15395#30d5c83.jpg', ''),
(40, 'Vincent Chase Online', 'VC E14885', 'Eyeglasses', '#800000', 2700, 'Male', 'Rimless', 'Geometric', 'Stainless Steel', 'downhere/VC E14885#800000/VC E14885#8000001.jpg,downhere/VC E14885#800000/VC E14885#8000002.jpg,downhere/VC E14885#800000/VC E14885#8000003.jpg', ''),
(41, 'John Jacobs', 'VC E14885', 'Eyeglasses', '#f6bb22', 4200, 'Male', 'Full Rim', 'Clubmaster', 'Italian Acetate', 'downhere/VC E14885#f6bb22/VC E14885#f6bb221.jpg,downhere/VC E14885#f6bb22/VC E14885#f6bb222.jpg,downhere/VC E14885#f6bb22/VC E14885#f6bb223.jpg', ''),
(42, 'John Jacobs', 'JJ E13729', 'Eyeglasses', '#ffd700', 3200, 'Male', 'Full Rim', 'Oval', 'Stainless Steel', 'downhere/JJ E13729#ffd700/JJ E13729#ffd7001.jpg,downhere/JJ E13729#ffd700/JJ E13729#ffd7002.jpg,downhere/JJ E13729#ffd700/JJ E13729#ffd7003.jpg', ''),
(43, 'John Jacobs', 'JJ E15296', 'Eyeglasses', '#ffd700', 5200, 'Male', 'Rimless', 'Oval', 'Stainless Steel', 'downhere/JJ E15296#ffd700/JJ E15296#ffd7001.jpg,downhere/JJ E15296#ffd700/JJ E15296#ffd7002.jpg,downhere/JJ E15296#ffd700/JJ E15296#ffd7003.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE `product_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `brand_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`brand_id`, `brand_name`, `brand_description`) VALUES
(2, 'John Jacobs', 'description1'),
(3, 'Vincent Chase', 'description2'),
(4, 'Lenskart Air', 'description3'),
(5, 'Vincent Chase Polarized', 'description4'),
(7, 'Hooper', 'description5'),
(8, 'Vincent Chase Online', 'description6'),
(9, 'Lenskart Blu', 'description7'),
(10, 'Lenskart Air Online', 'description8'),
(11, 'Hooper Computer Glasses', 'description9'),
(12, 'OJOS', 'description10'),
(14, 'Lenskart STUDIO', 'description11');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`color_id`, `color_name`, `color`) VALUES
(32, 'Black', '#000001'),
(33, 'Red', '#ff0000'),
(35, 'Navy Blue', '#0400ff'),
(78, 'Pink', '#ffb8da'),
(94, 'Beige', '#e5d7d7'),
(131, 'White', '#ffffff'),
(134, 'Green', '#00ff00'),
(135, 'Brown', '#964b00'),
(136, 'Blue', '#0000ff'),
(137, 'Purple', '#a0a0f0'),
(138, 'Gold', '#ffd700'),
(139, 'Turquoise', '#30d5c8'),
(140, 'Maroon', '#800000'),
(141, 'Silver Yellow', '#f6bb22');

-- --------------------------------------------------------

--
-- Table structure for table `product_material`
--

CREATE TABLE `product_material` (
  `material_id` int(11) NOT NULL,
  `material_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_material`
--

INSERT INTO `product_material` (`material_id`, `material_name`) VALUES
(2, 'Stainless Steel'),
(3, 'Italian Acetate'),
(4, 'Titanium'),
(5, 'TR90'),
(6, 'Hand-polished Acetate'),
(7, 'Memory Metal'),
(8, 'Aluminium'),
(9, 'Acetate & Stainless Steel'),
(20, 'Polycarbonate'),
(21, 'Cellulose Acetate'),
(22, 'Ultem');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `prescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `name`, `email`, `number`, `password`, `address`, `prescription`) VALUES
(1, 'user1', 'amardeep1@gmail.com', '7894561230', '1234', 'address 1', '-2 -2'),
(2, 'user2', 'amardeep2@gmail.com', '9876543210', '1234', 'address 2', '-3 -3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `product_material`
--
ALTER TABLE `product_material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `product_material`
--
ALTER TABLE `product_material`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
