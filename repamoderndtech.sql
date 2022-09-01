-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 03, 2022 at 09:06 PM
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
-- Database: `repamoderndtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product`, `price`, `quantity`, `user`, `status`, `date`) VALUES
(14, '2', 100, 3, 2, 0, '27/Mar/2022 03:03:33am'),
(15, '3', 123, 1, 2, 0, '27/Mar/2022 02:03:17pm'),
(16, '3', 123, 1, 2, 0, '27/Mar/2022 10:03:16pm'),
(17, '3', 123, 1, 2, 0, '29/Mar/2022 12:03:05am'),
(18, '3', 123, 5, 2, 0, '29/Mar/2022 01:03:39am'),
(19, '2', 100, 4, 2, 0, '29/Mar/2022 01:03:54am'),
(20, '3', 123, 1, 2, 0, '29/Mar/2022 01:03:43am'),
(21, '3', 123, 1, 2, 0, '29/Mar/2022 01:03:48am'),
(22, '3', 123, 50, 2, 1, '29/Mar/2022 01:03:20am');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `image`, `description`, `date`) VALUES
(1, 'Cameras', 'cameras.png', 'asdfghjkl\r\n', '24 Mar 2022 @ 12:03:35'),
(2, 'Accessories', 'accessories.png', 'wefghjk', '24 Mar 2022 @ 12:03:21'),
(3, 'Lenses & Optics', 'lense-optics.png', '', '24 Mar 2022 @ 12:03:05'),
(4, 'Lighting & Studio', 'STUDIOLIGHT.jpg', '', '24 Mar 2022 @ 12:03:39'),
(5, 'Pro Audio & Pro Video', 'pro-video.png', '', '24 Mar 2022 @ 12:03:13'),
(6, 'Laptops', '86085_1639648201.jpg', '', '24 Mar 2022 @ 12:03:11'),
(7, 'Drones', 'shopping.png', '', '24 Mar 2022 @ 12:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(10) NOT NULL,
  `media` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `media`, `link`) VALUES
(1, 'Phone Number', '+88678776788'),
(2, 'facebook', 'Repa211'),
(3, 'twitter', 'twitter.com'),
(4, 'email', 'repa@gmail.com'),
(5, 'instagram', 'instagram.com'),
(6, 'youtube', 'www.youtube.com/'),
(7, 'Website Name', 'Repamoderntech.com');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `content`, `date`) VALUES
(1, 'contact us', '<p>lorem Ipsum ....</p>\r\n<ul>\r\n<li>Acrylic painting&nbsp;on&nbsp;Canvas</li>\r\n<li>Size:&nbsp;19.69 x 27.56 x 1.57\" (unframed) / 19.69 x 27.56\" (actual image size)</li>\r\n<li>Ready to hang</li>\r\n<li>Style:&nbsp;Impressionistic</li>\r\n<li>Subject:&nbsp;Animals and birds</li>\r\n</ul>', 'Tue 29 Mar 2022'),
(2, 'about us', '<p>user pc nt</p>\r\n<ul>\r\n<li>Acrylic painting&nbsp;on&nbsp;Canvas</li>\r\n<li>Size:&nbsp;19.69 x 27.56 x 1.57\" (unframed) / 19.69 x 27.56\" (actual image size)</li>\r\n<li>Ready to hang</li>\r\n<li>Style:&nbsp;Impressionistic</li>\r\n<li>Subject:&nbsp;Animals and birds</li>\r\n</ul>', 'Tue 29 Mar 2022'),
(3, 'privacy', '<p>localhost&nbsp;</p>\r\n<p>&nbsp;</p>', 'Thu 23 Dec 2021'),
(4, 'terms', '<p>localhost _ localhost _ leo_db _ pages _ phpMyAdmin 5.0.2</p>', 'Thu 23 Dec 2021');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `old_price` int(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product`, `category`, `description`, `image`, `price`, `old_price`, `status`, `date`) VALUES
(2, 'Camera', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, <b>sunt</b> in culpa qui officia deserunt mollit anim id est laborum.', 'cameras.png', 100, 0, 1, '24/Mar/2022 @ 02:03:28'),
(3, 'Drones SA112', 7, '<p>Highlights Highest Field of View (120&deg;) in the market today Wide 42 mm lenses for maximum field of immersion Unique...</p>', 'download.png', 123, 141, 1, '24/Mar/2022 @ 06:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(10) NOT NULL,
  `head` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `head`, `text`, `date`) VALUES
(1, 'logo', 'avatar5.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `level`, `date`) VALUES
(3, 'Admin', 'Admin', 'password1234', 'admin@repa.com', 1, '2022-03-29 03:03am'),
(4, 'Repa', 'Admin', 'admin1234', 'repa@admin.com', 1, '2022-03-29 03:03am');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `times` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `date`, `times`) VALUES
(1, '27/Feb/2021', 21),
(2, '28/Feb/2021', 173),
(3, '01/Mar/2021', 15),
(4, '02/Mar/2021', 12),
(5, '03/Mar/2021', 295),
(6, '04/Mar/2021', 185),
(7, '05/Mar/2021', 2),
(8, '08/Mar/2021', 43),
(9, '09/Mar/2021', 325),
(10, '11/Mar/2021', 52),
(11, '11/Mar/2021', 52),
(12, '12/Mar/2021', 155),
(13, '18/Mar/2021', 65),
(14, '19/Mar/2021', 133),
(15, '20/Mar/2021', 71),
(16, '21/Mar/2021', 8),
(17, '22/Mar/2021', 37),
(18, '23/Mar/2021', 1),
(19, '24/Mar/2021', 36),
(20, '25/Mar/2021', 151),
(21, '27/Mar/2021', 6),
(22, '29/Mar/2021', 439),
(23, '30/Mar/2021', 393),
(24, '31/Mar/2021', 481),
(25, '01/Apr/2021', 8),
(26, '05/Apr/2021', 5),
(27, '08/Apr/2021', 10),
(28, '09/Apr/2021', 3),
(29, '22/Apr/2021', 18),
(30, '24/Apr/2021', 78),
(31, '25/Apr/2021', 1),
(32, '26/Apr/2021', 9),
(33, '27/Apr/2021', 1),
(34, '30/Apr/2021', 40),
(35, '01/May/2021', 13),
(36, '02/May/2021', 3),
(37, '03/May/2021', 32),
(38, '04/May/2021', 1),
(39, '06/May/2021', 29),
(40, '09/May/2021', 5),
(41, '17/May/2021', 300),
(42, '18/May/2021', 134),
(43, '20/May/2021', 16),
(44, '21/May/2021', 37),
(45, '23/May/2021', 1),
(46, '24/May/2021', 72),
(47, '25/May/2021', 14),
(48, '26/May/2021', 6),
(49, '27/May/2021', 2),
(50, '31/May/2021', 57),
(51, '01/Jun/2021', 4),
(52, '03/Jun/2021', 23),
(53, '07/Jun/2021', 35),
(54, '08/Jun/2021', 78),
(55, '10/Jun/2021', 25),
(56, '11/Jun/2021', 3),
(57, '12/Jun/2021', 11),
(58, '13/Jun/2021', 9),
(59, '16/Jun/2021', 5),
(60, '18/Jun/2021', 83),
(61, '21/Jun/2021', 59),
(62, '21/Jun/2021', 59),
(63, '22/Jun/2021', 76),
(64, '24/Jun/2021', 114),
(65, '28/Jun/2021', 48),
(66, '29/Jun/2021', 13),
(67, '30/Jun/2021', 12),
(68, '01/Jul/2021', 8),
(69, '02/Jul/2021', 298),
(70, '02/Jul/2021', 298),
(71, '02/Jul/2021', 298),
(72, '02/Jul/2021', 298),
(73, '02/Jul/2021', 298),
(74, '03/Jul/2021', 1),
(75, '25/Jul/2021', 1),
(76, '26/Jul/2021', 156),
(77, '27/Jul/2021', 2),
(78, '28/Jul/2021', 52),
(79, '29/Jul/2021', 372),
(80, '01/Aug/2021', 10),
(81, '02/Aug/2021', 172),
(82, '03/Aug/2021', 1),
(83, '04/Aug/2021', 1),
(84, '05/Aug/2021', 3),
(85, '08/Aug/2021', 1),
(86, '09/Aug/2021', 20),
(87, '10/Aug/2021', 11),
(88, '11/Aug/2021', 484),
(89, '12/Aug/2021', 24),
(90, '15/Aug/2021', 1),
(91, '16/Aug/2021', 41),
(92, '17/Aug/2021', 2),
(93, '24/Aug/2021', 6),
(94, '25/Aug/2021', 18),
(95, '26/Aug/2021', 1),
(96, '27/Aug/2021', 1),
(97, '30/Aug/2021', 1),
(98, '02/Sep/2021', 2),
(99, '03/Sep/2021', 5),
(100, '04/Sep/2021', 3),
(101, '05/Sep/2021', 1),
(102, '09/Sep/2021', 3),
(103, '11/Sep/2021', 1),
(104, '13/Sep/2021', 1),
(105, '15/Sep/2021', 1),
(106, '27/Sep/2021', 8),
(107, '01/Oct/2021', 3),
(108, '04/Oct/2021', 2),
(109, '11/Oct/2021', 3),
(110, '22/Oct/2021', 1),
(111, '05/Nov/2021', 2),
(112, '11/Dec/2021', 1),
(113, '02/Jan/2022', 1),
(114, '14/Jan/2022', 9),
(115, '15/Jan/2022', 1),
(116, '20/Jan/2022', 6),
(117, '25/Jan/2022', 131),
(118, '26/Jan/2022', 2),
(119, '28/Jan/2022', 3),
(120, '29/Jan/2022', 69),
(121, '01/Feb/2022', 1),
(122, '22/Feb/2022', 2),
(123, '01/Mar/2022', 11),
(124, '09/Mar/2022', 6),
(125, '11/Mar/2022', 1),
(126, '16/Mar/2022', 2),
(127, '17/Mar/2022', 2),
(128, '20/Mar/2022', 1),
(129, '21/Mar/2022', 16),
(130, '25/Mar/2022', 3),
(131, '26/Mar/2022', 5),
(132, '27/Mar/2022', 433),
(133, '28/Mar/2022', 1054),
(134, '29/Mar/2022', 624),
(135, '30/Mar/2022', 357),
(136, '31/Mar/2022', 32),
(137, '01/Apr/2022', 36),
(138, '02/Apr/2022', 473),
(139, '03/Apr/2022', 413);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
