-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2024 at 06:21 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date_time` datetime NOT NULL,
  `bidder_id` int NOT NULL,
  `auction_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `amount`, `date_time`, `bidder_id`, `auction_id`) VALUES
(2, '200.00', '2024-03-20 10:40:09', 2, 2),
(3, '239.00', '2024-03-20 10:40:24', 2, 2),
(4, '300.00', '2024-03-20 10:43:07', 3, 3),
(5, '888.00', '2024-03-20 10:46:46', 2, 2),
(6, '903.00', '2024-03-23 11:20:13', 3, 1),
(7, '907.00', '2024-03-23 11:21:21', 3, 1),
(8, '1000.00', '2024-03-23 11:21:33', 3, 1),
(9, '1400.00', '2024-03-25 09:30:37', 4, 4),
(10, '500.00', '2024-04-16 16:56:56', 5, 7),
(11, '890.00', '2024-04-20 22:48:13', 4, 8),
(12, '800.00', '2024-04-20 01:29:36', 4, 9),
(13, '980.00', '2024-04-20 01:33:13', 4, 9),
(14, '9000.00', '2024-04-20 02:10:47', 4, 8),
(15, '4.00', '2024-04-20 02:12:59', 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`) VALUES
(1, 'Fashion', NULL),
(2, 'Kitchen', NULL),
(3, 'Art', NULL),
(4, 'Sport', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int NOT NULL,
  `message` text,
  `dateTime` datetime DEFAULT NULL,
  `sender_id` int DEFAULT NULL,
  `receiver_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `message`, `dateTime`, `sender_id`, `receiver_id`) VALUES
(1, 'hi gg', '2024-03-20 09:07:40', 3, 2),
(4, 'how are u???', '2024-03-20 09:12:39', 2, 3),
(5, 'efgerg', '2024-03-20 09:18:52', 3, 2),
(6, 'rtgrtgtrg', '2024-03-20 09:19:01', 3, 2),
(7, 'f4f34f', '2024-03-20 09:21:48', 3, 3),
(8, '34f4f', '2024-03-20 09:21:53', 3, 3),
(9, 'qwdqw', '2024-03-20 11:38:56', 3, 3),
(10, 'erthethfghdfgh', '2024-03-23 11:17:19', 3, 3),
(11, 'hi hajer', '2024-03-23 11:51:29', 3, 3),
(12, 'hi seller', '2024-03-25 09:55:41', 1, 3),
(13, 'hi hajer, i want to sell u oroduct', '2024-03-25 10:33:26', 4, 3),
(15, 'ok, please start bidding with website', '2024-03-25 10:47:10', 3, 4),
(16, 'dfg', '2024-04-16 16:57:05', 5, 3),
(17, 'dfgdfg', '2024-04-16 16:57:38', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `message` text,
  `user_id` int DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `type`, `message`, `user_id`, `dateTime`) VALUES
(9, 'Payment issue', 'i have make payment and still not got the product', 3, '2024-03-23 11:17:36'),
(10, 'Payment issue', 'payment not working', 3, '2024-03-25 07:31:04'),
(11, 'Payment issue', 'tyty', 5, '2024-04-16 16:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `comment` text,
  `rate` varchar(100) NOT NULL DEFAULT '0',
  `user_id` int DEFAULT NULL,
  `auction_id` int DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `comment`, `rate`, `user_id`, `auction_id`, `dateTime`) VALUES
(1, 'egwerg', '2', 3, 1, '2024-03-20 07:43:32'),
(2, 'sdfsdf', '2', 3, 1, '2024-03-20 08:03:42'),
(3, 'werwer', '4', 3, 1, '2024-03-20 08:03:52'),
(4, 'nicce nice', '3', 3, 1, '2024-03-20 09:20:56'),
(5, 'rgrg', '3', 3, 2, '2024-03-20 10:41:48'),
(6, 'sfg', '2', 3, 3, '2024-03-20 10:43:15'),
(7, 'nice', '3', 3, 3, '2024-03-23 11:17:08'),
(8, 'nice seller', '3', 4, 4, '2024-03-25 09:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `auction_id` int DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `transaction_number` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `auction_id`, `amount`, `payment_method`, `transaction_number`, `status`, `dateTime`) VALUES
(1, 3, 3, '300.00', 'visa', '94b48299-5778-447c-9896-85f85657e833', 'paid', '2024-03-25 09:04:29'),
(2, 5, 7, '500.00', 'visa', '3b937ba9-d2ef-49d8-8b7d-742f2a44240e', 'paid', '2024-04-16 16:58:46'),
(3, 4, 9, '980.00', 'visa', 'ac3b516e-bf97-4286-bea4-2ef1dab62792', 'paid', '2024-04-20 01:40:28'),
(4, 4, 8, '9000.00', 'visa', 'df3f2174-76da-4ead-a225-9ce89c675b30', 'paid', '2024-04-20 02:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `products_auctions`
--

CREATE TABLE `products_auctions` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `starting_price` decimal(10,2) NOT NULL,
  `check_price` decimal(10,2) NOT NULL,
  `current_bid` decimal(10,2) DEFAULT '0.00',
  `seller_id` int NOT NULL,
  `category_id` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT ' 1 = active & 0 = inactive',
  `winner_id` int DEFAULT NULL,
  `type` varchar(100) DEFAULT 'New',
  `win_dateTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products_auctions`
--

INSERT INTO `products_auctions` (`id`, `title`, `image`, `description`, `start_date`, `end_date`, `starting_price`, `check_price`, `current_bid`, `seller_id`, `category_id`, `status`, `winner_id`, `type`, `win_dateTime`) VALUES
(1, 'Enim dolore sit et', 'auctions-2024-03-10-65eda6ccca161.jpg', '<p data-sourcepos=\"3:1-3:43\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; white-space-collapse: preserve; word-break: break-word; color: rgb(31, 31, 31); font-family: &quot;Google Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Up for Auction: Lightly Used Smartphone</span></p><p data-sourcepos=\"5:1-9:174\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; white-space-collapse: preserve; word-break: break-word; color: rgb(31, 31, 31); font-family: &quot;Google Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Brand:</span> [Insert Brand Name Here (e.g., Apple, Samsung, etc.)]\r\n<span style=\"font-weight: 700;\">Model:</span> [Insert Model Name Here (e.g., iPhone 14, Galaxy S23, etc.)]\r\n<span style=\"font-weight: 700;\">Storage Capacity:</span> [Insert Storage Capacity Here (e.g., 128GB, 256GB, etc.)]\r\n<span style=\"font-weight: 700;\">Carrier:</span> [Insert Carrier Name Here (e.g., Unlocked, Verizon, AT&amp;T, etc.)]\r\n<span style=\"font-weight: 700;\">Condition:</span> [Describe Condition Here (e.g., Excellent condition with minor scratches on the screen protector.  Battery life holds a full charge for a day of typical use.)]</p><p data-sourcepos=\"11:1-11:178\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; white-space-collapse: preserve; word-break: break-word; color: rgb(31, 31, 31); font-family: &quot;Google Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">This auction is for a gently used [phone brand and model].  The phone is in excellent condition and comes with [list any included accessories (e.g., original charger, case)].</span></p><p data-sourcepos=\"13:1-13:167\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; white-space-collapse: preserve; word-break: break-word; color: rgb(31, 31, 31); font-family: &quot;Google Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Please note:</span> [Mention any important details about the phone (e.g., It is the US version of the phone, minor crack on the back that does not affect functionality)].</p><p data-sourcepos=\"15:1-15:57\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; white-space-collapse: preserve; word-break: break-word; color: rgb(31, 31, 31); font-family: &quot;Google Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Starting Bid:</span> [Insert Starting Bid Here (e.g., $100)]</p><p data-sourcepos=\"17:1-17:45\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; white-space-collapse: preserve; word-break: break-word; color: rgb(31, 31, 31); font-family: &quot;Google Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Auction Ends:</span> [Insert Date and Time Here]</p><p data-sourcepos=\"19:1-19:85\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; white-space-collapse: preserve; word-break: break-word; color: rgb(31, 31, 31); font-family: &quot;Google Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Don\'t miss your chance to win this great phone at a fraction of the retail price!</span></p><p data-sourcepos=\"21:1-21:77\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; white-space-collapse: preserve; word-break: break-word; color: rgb(31, 31, 31); font-family: &quot;Google Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Be sure to review the auction details and photos before placing your bid.</span></p><p data-sourcepos=\"23:1-23:18\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; white-space-collapse: preserve; word-break: break-word; color: rgb(31, 31, 31); font-family: &quot;Google Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Happy Bidding!</span></p>', '2024-03-10 00:00:00', '2024-03-30 00:00:00', '901.00', '380.00', '1000.00', 3, 1, 0, 3, 'New', NULL),
(2, 'Iure quisquam facere', 'auctions-2024-03-10-65edc6f64f756.jpg', '<p>asdfasdf</p>', '2024-03-10 00:00:00', '2024-03-27 00:00:00', '167.00', '683.00', '888.00', 3, 4, 0, 2, 'Old', NULL),
(3, 'Blanditiis maxime et', 'auctions-2024-03-10-65eda6e312d39.jpg', NULL, '2024-03-10 00:00:00', '2024-04-05 00:00:00', '286.00', '635.00', '300.00', 3, 2, 0, 3, 'New', NULL),
(4, 'new auction', 'auctions-2024-03-25-66013ffb48d66.jpg', '<p>description here here here</p>', '2024-03-26 00:00:00', '2024-05-23 00:00:00', '1000.00', '1500.00', '1400.00', 3, 2, 1, 3, 'New', NULL),
(5, 'old auction', 'auctions-2024-03-25-66015df343bb1.png', '<p>&nbsp;<span style=\"font-family: var(--bs-font-sans-serif); font-size: 1rem;\">des&nbsp;</span><span style=\"font-family: var(--bs-font-sans-serif); font-size: 1rem;\">des&nbsp;</span><span style=\"font-family: var(--bs-font-sans-serif); font-size: 1rem;\">des</span></p>', '2024-03-25 00:00:00', '2024-05-09 00:00:00', '1000.00', '2000.00', '0.00', 3, 2, 1, 3, 'Old', NULL),
(6, 'صثقفقف', 'auctions-2024-04-13-661b15a75df3a.png', '<p>ثقفصثقف</p>', '2024-04-14 00:00:00', '2024-04-26 00:00:00', '345.00', '45345.00', '0.00', 3, 2, 1, 3, 'Old', NULL),
(7, 'test auction', 'auctions-2024-04-16-661ead14184e8.png', '<p>des</p>', '2024-04-16 00:00:00', '2024-04-17 00:00:00', '100.00', '600.00', '500.00', 3, 3, 1, 5, 'Old', NULL),
(8, 'test', 'auctions-2024-04-19-6622f4069d721.jpg', '<p>rerer</p>', '2024-04-20 00:00:00', '2024-04-29 00:00:00', '400.00', '900.00', '9000.00', 3, 1, 0, 4, 'Old', '2024-04-20 02:10:47'),
(9, 'bag', 'auctions-2024-04-20-66231a6feef3f.jpg', '<p>fdf</p>', '2024-04-20 00:00:00', '2024-05-07 00:00:00', '500.00', '900.00', '980.00', 3, 1, 0, 4, 'New', '2024-04-20 04:05:09'),
(10, 'erwer', 'auctions-2024-04-20-6623249e1cc4d.png', '<p>weded</p>', '2024-04-20 00:00:00', '2024-04-30 00:00:00', '4.00', '444.00', '4.00', 3, 2, 1, 0, 'New', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_info`
--

CREATE TABLE `shipping_info` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `neighbourhood_name` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shipping_info`
--

INSERT INTO `shipping_info` (`id`, `user_id`, `name`, `email`, `phone_number`, `city`, `region`, `neighbourhood_name`, `street_address`) VALUES
(2, 3, 'hajer', 'hajer123@test.com', '576378393', 'صثبصثب', 'صثبصثب', 'صثب', 'صثب'),
(3, 5, 'lama', 'lama@user.com', '590898989', 'dfgf', 'gfdgfdg', 'dfgsdfg', 'dfgdfg'),
(4, 4, 'najaw', 'najaw@gmail.com', '966512345678', 'w4tw', 'rtrwt', 'wertw', 'ewrt');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text,
  `phone_number` varchar(20) DEFAULT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'user',
  `blocked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `username`, `email`, `password`, `address`, `phone_number`, `role`, `blocked`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '$2y$12$9V6UeR3/XxvZC02V5n06..VeUNlf2nzIqvKqBBeaNoUDFQVPNQMo2', 'sfefef', '+966512345688', 'admin', 0),
(2, 'Amity Acosta', 'wynah', 'sofilan@mailinator.com', '$2y$12$Vy7MXg/LPma5S8OVr9.8DuJGVJfHWN1hy0PVXzihnIeUfRFmQnnD6', 'Eius cupiditate anim', '567676767', 'user', 0),
(3, 'hajer', 'hajer1232', 'hajer123@test.com', '$2y$12$toTMOL3vrvM134ezOJN.TeA2ceuDwmUYvDyk73jo8YnZz3JYtE1O2', 'dfg', '576378393', 'user', 0),
(4, 'najaw', 'najaw123', 'najaw@gmail.com', '$2y$12$9V6UeR3/XxvZC02V5n06..VeUNlf2nzIqvKqBBeaNoUDFQVPNQMo2', 'test test', '966512345678', 'user', 0),
(5, 'lama', 'lama', 'lama@user.com', '$2y$12$EDg8Nw/hgvOxV58XniWhJe9tgEyaZZ11beSJpep5fytkMQaaNv82m', 'sdfsdf', '590898989', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bidder_id` (`bidder_id`),
  ADD KEY `auction_id` (`auction_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `auction_id` (`auction_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `auction_id` (`auction_id`);

--
-- Indexes for table `products_auctions`
--
ALTER TABLE `products_auctions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `shipping_info`
--
ALTER TABLE `shipping_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products_auctions`
--
ALTER TABLE `products_auctions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shipping_info`
--
ALTER TABLE `shipping_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`bidder_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`auction_id`) REFERENCES `products_auctions` (`id`);

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`auction_id`) REFERENCES `products_auctions` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`auction_id`) REFERENCES `products_auctions` (`id`);

--
-- Constraints for table `products_auctions`
--
ALTER TABLE `products_auctions`
  ADD CONSTRAINT `products_auctions_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `products_auctions_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `shipping_info`
--
ALTER TABLE `shipping_info`
  ADD CONSTRAINT `shipping_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
