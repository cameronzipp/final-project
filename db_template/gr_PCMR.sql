-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 14, 2021 at 10:16 PM
-- Server version: 10.3.23-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahlquist_PCMR`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `user_id` int(11) NOT NULL,
  `cart_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `CartItem`
--

CREATE TABLE `CartItem` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `Added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `id` int(11) NOT NULL,
  `tableName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeLabel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping DO NOT LEAK PLS for table `Category`
--

INSERT INTO `Category` (`id`, `tableName`, `typeLabel`) VALUES
(1, 'CPUProduct', 'Processors'),
(2, 'GPUProduct', 'Graphics Cards');

-- --------------------------------------------------------

--
-- Table structure for table `CPUProduct`
--

CREATE TABLE `CPUProduct` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cores` int(11) NOT NULL,
  `tdp` int(11) NOT NULL,
  `socket` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `freq_ghz` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping DO NOT LEAK PLS for table `CPUProduct`
--

INSERT INTO `CPUProduct` (`id`, `product_id`, `cores`, `tdp`, `socket`, `manufacturer`, `freq_ghz`) VALUES
(1, 1, 8, 105, 'AM4', 'AMD', 4.7);

-- --------------------------------------------------------

--
-- Table structure for table `GPUProduct`
--

CREATE TABLE `GPUProduct` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `manufacturer` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chipBrand` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tdp` int(11) NOT NULL,
  `vmem_mb` int(11) NOT NULL,
  `freq` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping DO NOT LEAK PLS for table `GPUProduct`
--

INSERT INTO `GPUProduct` (`id`, `product_id`, `manufacturer`, `chipBrand`, `tdp`, `vmem_mb`, `freq`) VALUES
(1, 2, 'ASUS', 'NVIDIA', 200, 8000, 1770);

-- --------------------------------------------------------

--
-- Table structure for table `ItemOrder`
--

CREATE TABLE `ItemOrder` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_item` int(11) NOT NULL,
  `trackingNumber` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 1,
  `quanityLimit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping DO NOT LEAK PLS for table `Product`
--

INSERT INTO `Product` (`id`, `name`, `description`, `thumb`, `price`, `stock`, `quanityLimit`) VALUES
(1, 'AMD Ryzen 7 5800x', 'test', 'ryzen7-5700x.jpg', 500, 100, 1),
(2, 'RTX 3070 Ti', 'The GeForce RTX 3070 Ti will be a high-end graphics card by NVIDIA, that is expected to launch on May 31st, 2021. Built on the 8 nm process, and based on the GA104 graphics processor, in its GA104-400-A1 variant, the card supports DirectX 12 Ultimate. This ensures that all modern games will run on GeForce RTX 3070 Ti. Additionally, the DirectX 12 Ultimate capability guarantees support for hardware-raytracing, variable-rate shading and more, in upcoming video games. The GA104 graphics processor is a large chip with a die area of 392 mm² and 17,400 million transistors. It features 6144 shading units, 192 texture mapping units, and 96 ROPs. Also included are 192 tensor cores which help improve the speed of machine learning applications. The card also has 48 raytracing acceleration cores. NVIDIA has paired 8 GB GDDR6X memory with the GeForce RTX 3070 Ti, which are connected using a 256-bit memory interface. The GPU is operating at a frequency of 1575 MHz, which can be boosted up to 1770 MHz, memory is running at 1188 MHz (19 Gbps effective).\r\nBeing a dual-slot card, the NVIDIA GeForce RTX 3070 Ti draws power from 1x 12-pin power connector, with power draw rated at 200 W maximum. Display outputs include: 1x HDMI, 3x DisplayPort. GeForce RTX 3070 Ti is connected to the rest of the system using a PCI-Express 4.0 x16 interface. The card measures 242 mm in length, 112 mm in width, and features a dual-slot cooling solution. Its price at launch will be 599 US Dollars.', 'rtx-3080-founders.jpg', 600, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cart`
--
ALTER TABLE `Cart`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cart_item` (`cart_item`);

--
-- Indexes for table `CartItem`
--
ALTER TABLE `CartItem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CPUProduct`
--
ALTER TABLE `CPUProduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Product` (`product_id`);

--
-- Indexes for table `GPUProduct`
--
ALTER TABLE `GPUProduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `ItemOrder`
--
ALTER TABLE `ItemOrder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cart_item` (`cart_item`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CartItem`
--
ALTER TABLE `CartItem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `CPUProduct`
--
ALTER TABLE `CPUProduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `GPUProduct`
--
ALTER TABLE `GPUProduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ItemOrder`
--
ALTER TABLE `ItemOrder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `Cart_ibfk_1` FOREIGN KEY (`cart_item`) REFERENCES `CartItem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CartItem`
--
ALTER TABLE `CartItem`
  ADD CONSTRAINT `CartItem_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CPUProduct`
--
ALTER TABLE `CPUProduct`
  ADD CONSTRAINT `Product` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `GPUProduct`
--
ALTER TABLE `GPUProduct`
  ADD CONSTRAINT `GPUProduct_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ItemOrder`
--
ALTER TABLE `ItemOrder`
  ADD CONSTRAINT `ItemOrder_ibfk_1` FOREIGN KEY (`cart_item`) REFERENCES `CartItem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ItemOrder_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
