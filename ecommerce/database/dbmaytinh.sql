-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
<<<<<<< HEAD
-- Thời gian đã tạo: Th5 15, 2024 lúc 03:32 PM
=======
-- Thời gian đã tạo: Th4 29, 2024 lúc 12:30 AM
>>>>>>> 8dfbeef6a2cbe9943adcd93eec2ccbc305549413
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbmaytinh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `Product` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imgUrl` text NOT NULL,
<<<<<<< HEAD
  `Price` double NOT NULL,
=======
  `Price` decimal(10,2) NOT NULL,
>>>>>>> 8dfbeef6a2cbe9943adcd93eec2ccbc305549413
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`ID`, `customer_id`, `Product`, `imgUrl`, `Price`, `Quantity`) VALUES
(85, 13, 'Mac Mini', '', 699.99, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(24, 'Iphone'),
(25, 'Ipad'),
(26, 'Watch'),
(27, 'Phụ kiện'),
(28, 'Máy cũ'),
(30, 'Mac');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
<<<<<<< HEAD
  `address2` varchar(30) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `cususer` varchar(30) NOT NULL,
  `cuspass` varchar(32) DEFAULT NULL
=======
  `phone_number` varchar(15) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `cususer` varchar(30) NOT NULL,
  `cuspass` varchar(50) NOT NULL
>>>>>>> 8dfbeef6a2cbe9943adcd93eec2ccbc305549413
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

<<<<<<< HEAD
INSERT INTO `customer` (`customer_id`, `name`, `address`, `address2`, `phone_number`, `birthdate`, `cususer`, `cuspass`) VALUES
(7, 'tue', 'aa', '', '0901231131', '2024-04-11', 'tue', NULL),
(12, 'Nguyễn Tuệ', '772 Kim Giang', '', '0382122539', '2024-04-17', 'tuenguỷen', NULL),
(21, 'aaa', 'aaaa', '', '967575435', '2002-12-13', 'poi', '7cdf363e74c31ad7e2697af70356c251'),
(22, 'aaa', 'aaaa', '', 'ấdasd', '0342-02-09', 'noiu', 'ec6a6536ca304edf844d1d248a4f08dc'),
(23, 'aaaa', 'aaaa', '', '060a', '1311-03-12', 'ewq', 'e10adc3949ba59abbe56e057f20f883e'),
(24, 'Nguyễn Tuệ ', '66 trường chinh ', '', '0828427851', '2002-03-12', 'tueng', '7e7576bde8baa58874dc2a8a752ee3dc'),
(25, 'a', 'a', '', 'a', '1211-01-31', 'tueaaaa', 'e10adc3949ba59abbe56e057f20f883e');
=======
INSERT INTO `customer` (`customer_id`, `name`, `address`, `phone_number`, `birthdate`, `cususer`, `cuspass`) VALUES
(7, 'tue', 'aa', '0901231131', '2024-04-11', 'tue', 'ebbe2769ec44e15f1abbc94e20709456'),
(12, 'Nguyễn Tuệ', '772 Kim Giang', '0382122539', '2024-04-17', 'tuenguỷen', '123456'),
(13, 'Ngọc Ánh', '123', '95754744', '2024-04-11', 'tuee123', '7e7576bde8baa58874dc2a8a752ee3dc');
>>>>>>> 8dfbeef6a2cbe9943adcd93eec2ccbc305549413

--
-- Bẫy `customer`
--
DELIMITER $$
CREATE TRIGGER `encrypt_cuspass` BEFORE INSERT ON `customer` FOR EACH ROW BEGIN
    SET NEW.cuspass = MD5(NEW.cuspass);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imgUrl` text NOT NULL,
  `amount` int(100) NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateOrdered` varchar(100) NOT NULL,
  `dateDelivered` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `customer_id`, `name`, `contact`, `address`, `item`, `imgUrl`, `amount`, `status`, `dateOrdered`, `dateDelivered`) VALUES
<<<<<<< HEAD
(63, 23, 'aaaa', '060a', 'aaaa', '(1) MacBook Pro 2024, ', '14-pro-max.jpg', 5747500, 'confirmed', '05/13/24 04:40:30 AM', '05/15/24 04:59:41 AM'),
(64, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh', '(1) MacBook Pro 2023, ', '14-pro-max.jpg', 5749750, 'canceled', '05/13/24 04:58:53 AM', '05/14/24 05:18:42 AM'),
(65, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh', '(1) iPhone 15pro max, (1) Iphone 15, ', 'iphone-15-pro-max-.jpg', 29975000, 'canceled', '05/13/24 04:59:12 AM', '05/14/24 10:08:20 AM'),
(66, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh', '(1) Iphone 15, ', 'iphone_15_didongviet.jpg', 2500000, 'canceled', '05/14/24 02:21:12 AM', '05/14/24 04:34:12 AM'),
(67, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh', '(1) Iphone 14, ', '14-pro-max.jpg', 22500000, 'canceled', '05/14/24 02:21:29 AM', '05/14/24 04:33:55 AM'),
(68, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) iPhone X , ', '???ng_d?n_?nh_9', 749975, 'canceled', '05/14/24 03:46:08 AM', '05/14/24 04:31:36 AM'),
(69, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) Iphone 15, ', 'iphone_15_didongviet.jpg', 25225000, 'canceled', '05/14/24 05:19:03 AM', '05/14/24 05:19:07 AM'),
(70, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) iPhone X , ', '???ng_d?n_?nh_9', 749975, 'canceled', '05/14/24 05:22:18 AM', '05/14/24 05:22:23 AM'),
(71, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) iPhone X , ', '???ng_d?n_?nh_9', 749975, 'canceled', '05/14/24 05:28:37 AM', '05/14/24 05:33:29 AM'),
(72, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) iPhone X , ', '???ng_d?n_?nh_9', 749975, 'canceled', '05/14/24 09:02:10 AM', '05/14/24 09:37:41 AM'),
(73, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) Iphone 15, ', 'iphone_15_didongviet.jpg', 25225000, 'canceled', '05/14/24 09:03:01 AM', '05/14/24 09:31:37 AM'),
(74, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) iPhone X , ', '???ng_d?n_?nh_9', 749975, 'canceled', '05/14/24 09:39:30 AM', '05/14/24 11:32:10 AM'),
(75, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) iPhone X , ', '???ng_d?n_?nh_9', 749975, 'canceled', '05/14/24 11:26:01 AM', '05/14/24 11:31:55 AM'),
(76, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) Iphone 14, (1) Mac Mini, ', '406702210_171165589393411_5062149761622021044_n.jpg', 24249975, 'canceled', '05/14/24 11:33:16 AM', '05/14/24 11:33:44 AM'),
(77, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) iPhone 15pro max, (1) Iphone 15, ', 'iphone-15-pro-max-.jpg', 52700000, 'canceled', '05/14/24 11:33:34 AM', '05/14/24 11:33:39 AM'),
(78, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 'iphone-15-pro-max-.jpg', 27475000, 'confirmed', '05/14/24 04:01:09 PM', '05/14/24 04:08:30 PM'),
(79, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 'iphone_15_didongviet.jpg', 79174975, 'unconfirmed', '05/15/24 12:52:49 PM', ''),
(80, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(2) , (1) iPhone 15pro max, (1) Iphone 15, ', '', 79174975, 'unconfirmed', '05/15/24 01:03:16 PM', ''),
(81, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Mac Mini, ', '???ng_d?n_?nh_6', 79174975, 'unconfirmed', '05/15/24 01:07:45 PM', ''),
(82, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, (1) Iphone 15, ', 'iphone-15-pro-max-.jpg', 79174975, 'unconfirmed', '05/15/24 01:13:52 PM', ''),
(83, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 'iphone_15_didongviet.jpg', 79174975, 'unconfirmed', '05/15/24 01:21:25 PM', ''),
(84, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 'iphone_15_didongviet.jpg', 79174975, 'canceled', '05/15/24 01:22:49 PM', '05/15/24 01:24:20 PM'),
(85, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(2) iPhone 15pro max, ', 'iphone-15-pro-max-.jpg', 79174975, 'unconfirmed', '05/15/24 01:26:22 PM', ''),
(86, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) HomePod Mini, ', '???ng_d?n_?nh_8', 79174975, 'unconfirmed', '05/15/24 01:28:44 PM', ''),
(87, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 'iphone-15-pro-max-.jpg', 79174975, 'unconfirmed', '05/15/24 01:31:58 PM', ''),
(88, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 'iphone-15-pro-max-.jpg', 79174975, 'unconfirmed', '05/15/24 01:33:05 PM', ''),
(89, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone X , ', '???ng_d?n_?nh_9', 79174975, 'unconfirmed', '05/15/24 01:35:46 PM', ''),
(90, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) MacBook Pro 2023, ', '14-pro-max.jpg', 79174975, 'unconfirmed', '05/15/24 01:36:37 PM', ''),
(91, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 'iphone_15_didongviet.jpg', 79174975, 'unconfirmed', '05/15/24 01:37:26 PM', ''),
(92, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 'iphone_15_didongviet.jpg', 79174975, 'unconfirmed', '05/15/24 01:38:09 PM', ''),
(93, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 'iphone-15-pro-max-.jpg', 79174975, 'unconfirmed', '05/15/24 01:38:53 PM', ''),
(94, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Magic Keyboard, ', '???ng_d?n_?nh_9', 79174975, 'unconfirmed', '05/15/24 01:40:04 PM', ''),
(95, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 'iphone-15-pro-max-.jpg', 79174975, 'canceled', '05/15/24 01:41:31 PM', '05/15/24 02:14:29 PM'),
(96, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPad Pro 2024, ', 'ipad-pro.jpg', 79174975, 'canceled', '05/15/24 01:41:48 PM', '05/15/24 02:14:16 PM'),
(97, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPad Pro 2024, ', 'ipad-pro.jpg', 79174975, 'canceled', '05/15/24 01:42:18 PM', '05/15/24 01:43:00 PM'),
(98, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 'iphone_15_didongviet.jpg', 79174975, 'unconfirmed', '05/15/24 02:15:03 PM', ''),
(99, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 'iphone-15-pro-max-.jpg', 79174975, 'unconfirmed', '05/15/24 02:16:44 PM', ''),
(100, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 'iphone-15-pro-max-.jpg', 79174975, 'unconfirmed', '05/15/24 02:17:16 PM', ''),
(101, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) AirPods Pro, (1) Apple Watch Series 8, ', '???ng_d?n_?nh_5', 0, 'unconfirmed', '05/15/24 02:24:03 PM', ''),
(102, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 'iphone_15_didongviet.jpg', 25225000, 'unconfirmed', '05/15/24 02:30:28 PM', ''),
(103, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 'iphone-15-pro-max-.jpg', 27475000, 'unconfirmed', '05/15/24 02:30:50 PM', ''),
(104, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 14, ', '406702210_171165589393411_5062149761622021044_n.jpg', 45000000, 'canceled', '05/15/24 02:33:34 PM', '05/15/24 02:33:43 PM'),
(105, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Apple Watch Series 8, ', 'asusx512.jpg', 2499950, 'unconfirmed', '05/15/24 02:34:13 PM', ''),
(106, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 14, (1) Apple Watch Series 8, ', '406702210_171165589393411_5062149761622021044_n.jpg', 2499950, 'unconfirmed', '05/15/24 02:34:52 PM', ''),
(107, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone X , ', '???ng_d?n_?nh_9', 1499950, 'unconfirmed', '05/15/24 02:35:22 PM', ''),
(108, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 'iphone_15_didongviet.jpg', 25225000, 'unconfirmed', '05/15/24 02:36:23 PM', ''),
(109, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 'iphone_15_didongviet.jpg', 0, 'unconfirmed', '05/15/24 02:45:53 PM', ''),
(110, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 'iphone-15-pro-max-.jpg', 0, 'unconfirmed', '05/15/24 08:20:23 PM', ''),
(111, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 'iphone-15-pro-max-.jpg', 27475000, 'unconfirmed', '05/15/24 08:21:53 PM', ''),
(112, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Apple Watch Series 8, ', 'asusx512.jpg', 1249975, 'unconfirmed', '05/15/24 08:24:12 PM', '');
=======
(12, NULL, 'tuệ Nguyễn', '222', 'hh', '(2) test, ', '', 0, 'confirmed', '02/28/24 05:18:42 PM', '02/28/24 05:32:51 PM'),
(13, NULL, 'ngọc ánh', '0961912697', '55 trường chinh', '(1) Laptop ASUS X512 I3-1315u, ', '', 0, 'unconfirmed', '02/29/24 12:48:54 AM', ''),
(14, NULL, 'tuệ Nguyễn', '0961912697', '55 trường chinh', '', '', 0, 'delivered', '02/29/24 12:52:25 AM', '04/03/24 10:27:13 PM'),
(15, NULL, 'tuệ Nguyễn', '0961912697', '55 trường chinh', '', '', 0, 'confirmed', '02/29/24 12:54:51 AM', '02/29/24 12:55:31 AM'),
(16, NULL, 'ad ad', '0961912697', 'ad', '(1) Logitech G502 Hero Gaming Mouse, ', '', 0, 'unconfirmed', '02/29/24 12:57:30 AM', ''),
(17, NULL, 'ad Nguyễn', '0961912697', 'hh', '(1) Laptop ASUS X512 I3-1315u, ', '', 0, 'confirmed', '02/29/24 12:59:34 AM', '03/01/24 03:37:37 PM'),
(18, NULL, 'tuệ Nguyễn', '0961912697', 'hh', '', '', 0, 'unconfirmed', '02/29/24 01:00:28 AM', ''),
(19, NULL, 'ad ánh', '0961912697', '55 trường chinh', '', '', 0, 'delivered', '02/29/24 01:01:11 AM', '03/01/24 07:18:54 PM'),
(20, NULL, 'tuệ ad', '222', '55 trường chinh', '(1) Logitech G Pro Mechanical Keyboard, ', '', 0, 'unconfirmed', '02/29/24 01:01:55 AM', ''),
(21, NULL, 'ad ad', 'a', '55 trường chinh', '(1) Logitech G Pro Mechanical Keyboard, ', '', 0, 'unconfirmed', '02/29/24 01:02:15 AM', ''),
(22, NULL, 'ad ad', 'a', '55 trường chinh', '', '', 0, 'unconfirmed', '02/29/24 01:02:31 AM', ''),
(23, NULL, 'ad ad', 'a', '55 trường chinh', '', '', 0, 'unconfirmed', '02/29/24 01:04:03 AM', ''),
(24, NULL, 'ngọc Nguyễn', '0961912697', 'hh', '', '', 0, 'unconfirmed', '02/29/24 01:04:21 AM', ''),
(25, NULL, 'tuệ Nguyễn', '0961912697', '55 trường chinh', '(1) HyperX Cloud II Gaming Headset, (1) Laptop ASUS X512 I3-1315u, ', '', 0, 'delivered', '03/01/24 03:44:33 PM', '03/01/24 09:10:58 PM'),
(26, NULL, 'â d', 'a', 'a', '', '', 0, 'unconfirmed', '04/15/24 10:59:43 PM', ''),
(42, 13, 'Ngọc Ánh aaa', '0961912697', 'aaa', '(2) iPhone X (Đã qua sử dụng), ', '???ng_d?n_?nh_9', 0, 'unconfirmed', '04/29/24 03:40:58 AM', ''),
(43, 13, 'Ngọc Ánh', '95754744', '123', '', '', 0, 'unconfirmed', '04/29/24 03:58:29 AM', ''),
(44, 13, '', 'a', 'aaa', '(1) iPhone X (Đã qua sử dụng), ', '???ng_d?n_?nh_9', 0, 'unconfirmed', '04/29/24 04:05:38 AM', ''),
(45, 13, 'Ngọc Ánh', '95754744', '123', '(1) MacBook Pro 2024, ', 'Annotation 2023-11-24 132733.png', 0, 'unconfirmed', '04/29/24 04:09:58 AM', ''),
(46, 13, 'Ngọc Ánh', '95754744', '123', '(1) Iphone 15 512g, ', 'iphone_15_didongviet.jpg', 0, 'unconfirmed', '04/29/24 04:10:59 AM', ''),
(47, 13, 'Ngọc Ánh', '95754744', '123', '(1) iPhone 8 (Đã qua sử dụng), ', '???ng_d?n_?nh_10', 0, 'unconfirmed', '04/29/24 04:11:25 AM', ''),
(48, 13, 'Ngọc Ánh', '95754744', '123', '(1) MacBook Pro 2023, ', '???ng_d?n_?nh_3', 0, 'unconfirmed', '04/29/24 04:14:40 AM', ''),
(49, 13, 'Ngọc Ánh', '95754744', '123', '(1) HomePod Mini, ', '???ng_d?n_?nh_8', 0, 'unconfirmed', '04/29/24 04:15:31 AM', ''),
(50, 13, 'Ngọc Ánh', '95754744', '123', '(1) iPhone X (Đã qua sử dụng), ', '???ng_d?n_?nh_9', 0, 'unconfirmed', '04/29/24 04:16:47 AM', ''),
(51, 13, '', '', '', '(1) MacBook Pro 2023, ', '???ng_d?n_?nh_3', 0, 'unconfirmed', '04/29/24 04:22:11 AM', ''),
(52, 13, 'Ngọc Ánh', '95754744', '123', '(1) MacBook Pro 2023, ', '???ng_d?n_?nh_3', 0, 'unconfirmed', '04/29/24 04:36:00 AM', ''),
(53, 13, 'Ngọc Ánh', '95754744', '123', '(1) iPhone X (Đã qua sử dụng), ', '???ng_d?n_?nh_9', 0, 'unconfirmed', '04/29/24 04:38:30 AM', ''),
(54, 13, 'Ngọc Ánh', '95754744', '123', '(1) MacBook Pro 2023, ', '???ng_d?n_?nh_3', 0, 'unconfirmed', '04/29/24 04:52:57 AM', ''),
(55, 13, 'Ngọc Ánh', '95754744', '123', '(1) HomePod Mini, ', '???ng_d?n_?nh_8', 0, 'unconfirmed', '04/29/24 04:55:09 AM', '');
>>>>>>> 8dfbeef6a2cbe9943adcd93eec2ccbc305549413

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `Product_ID` int(11) NOT NULL,
  `imgUrl` text NOT NULL,
  `Product` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Price` double NOT NULL,
  `Category` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `discount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

<<<<<<< HEAD
INSERT INTO `products` (`Product_ID`, `imgUrl`, `Product`, `Description`, `Price`, `Category`, `discount`) VALUES
(123, '406702210_171165589393411_5062149761622021044_n.jpg', 'Iphone 14', 'được xem là mẫu smartphone bùng nổ của nhà táo trong năm 2022, ấn tượng với ngoại hình trẻ trung, màn hình chất lượng đi kèm với những cải tiến về hệ điều hành và thuật toán xử lý hình ảnh, giúp máy trở thành cái tên thu hút được đông đảo người dùng quan tâm tại thời điểm ra mắt.', 900, 'Iphone', 20),
(126, 'iphone_15_didongviet.jpg', 'Iphone 15', 'được xem là mẫu smartphone bùng nổ của nhà táo trong năm 2022, ấn tượng với ngoại hình trẻ trung, màn hình chất lượng đi kèm với những cải tiến về hệ điều hành và thuật toán xử lý hình ảnh, giúp máy trở thành cái tên thu hút được đông đảo người dùng quan tâm tại thời điểm ra mắt.', 1009, 'Iphone', 20),
(127, 'iphone-15-pro-max-.jpg', 'iPhone 15pro max', 'Sản phẩm mới nhất của Apple, với nhiều tính năng tiên tiến và thiết kế đẹp mắt.', 1099, 'Iphone', 22),
(128, 'ipad-pro.jpg', 'iPad Pro 2024', 'Bản cập nhật mới của dòng iPad Pro với màn hình lớn và hiệu suất mạnh mẽ.', 129.999, 'Iphone', 23),
(129, '14-pro-max.jpg', 'MacBook Pro 2024', 'Laptop cao cấp của Apple với chip M2 và màn hình Retina chất lượng cao.', 229.9, 'Mac', 16),
(131, 'ipad-pro.jpg', 'iPad Pro 2024', 'Bản cập nhật mới của dòng iPad Pro với màn hình lớn và hiệu suất mạnh mẽ.', 129.999, 'Iphone', 24),
(132, '14-pro-max.jpg', 'MacBook Pro 2023', 'Laptop cao cấp của Apple với chip M2 và màn hình Retina chất lượng cao.', 229.99, 'Mac', 0),
(133, 'asusx512.jpg', 'Apple Watch Series 8', 'Đồng hồ thông minh tiên tiến với nhiều tính năng sức khỏe và liên lạc.', 49.999, 'Watch', 28),
(134, '???ng_d?n_?nh_5', 'AirPods Pro', 'Tai nghe không dây cao cấp với chế độ chống ồn và chất âm tuyệt vời.', 24.999, 'Phụ kiện', 34),
(135, '???ng_d?n_?nh_6', 'Mac Mini', 'Máy tính để bàn nhỏ gọn với hiệu suất mạnh mẽ và khả năng mở rộng linh hoạt.', 69.999, 'mac', 0),
(136, '???ng_d?n_?nh_7', 'iMac 27-inch', 'Máy tính All-in-One với màn hình lớn và hiệu suất đa nhiệm tốt.', 179.999, 'mac', 0),
(137, '???ng_d?n_?nh_8', 'HomePod Mini', 'Loa thông minh với âm thanh chất lượng cao và tính năng trợ lý ảo Siri tích hợp.', 9.999, 'Phụ kiện', 0),
(138, '???ng_d?n_?nh_9', 'Magic Keyboard', 'Bàn phím không dây với thiết kế mỏng nhẹ và cảm biến cảm ứng.', 12.999, 'Phụ kiện', 0),
(139, '???ng_d?n_?nh_10', 'Apple Pencil (2nd Generation)', 'Bút cảm ứng cho iPad với khả năng nhận biết áp lực và góc nghiêng.', 12.999, 'accessories', 0),
(140, '???ng_d?n_?nh_6', 'Mac Mini', 'Máy tính để bàn nhỏ gọn với hiệu suất mạnh mẽ và khả năng mở rộng linh hoạt.', 69.999, 'mac', 0),
(141, '???ng_d?n_?nh_7', 'iMac 27-inch', 'Máy tính All-in-One với màn hình lớn và hiệu suất đa nhiệm tốt.', 179.999, 'Mac', 14),
(142, '???ng_d?n_?nh_8', 'HomePod Mini', 'Loa thông minh với âm thanh chất lượng cao và tính năng trợ lý ảo Siri tích hợp.', 9.999, 'Phụ kiện', 0),
(143, '???ng_d?n_?nh_9', 'Magic Keyboard', 'Bàn phím không dây với thiết kế mỏng nhẹ và cảm biến cảm ứng.', 12.999, 'Phụ kiện', 0),
(144, '???ng_d?n_?nh_10', 'Apple Pencil (2nd Generation)', 'Bút cảm ứng cho iPad với khả năng nhận biết áp lực và góc nghiêng.', 12.999, 'Phụ kiện', 0),
(145, '???ng_d?n_?nh_8', 'iPhone 11 ', 'iPhone 11 đã qua sử dụng, có thể có một số vết trầy xước nhẹ hoặc dấu hiệu về sử dụng.', 39.999, 'Máy cũ', 2),
(146, '???ng_d?n_?nh_9', 'iPhone X ', 'iPhone X đã qua sử dụng, có thể có một số vết trầy xước nhỏ hoặc dấu hiệu về sử dụng.', 29.999, 'Máy cũ', 12),
(149, '14-pro-max.jpg', 'Iphone 14 pro max', 'được xem là mẫu smartphone bùng nổ của nhà táo trong năm 2022, ấn tượng với ngoại hình trẻ trung, màn hình chất lượng đi kèm với những cải tiến về hệ điều hành và thuật toán xử lý hình ảnh, giúp máy trở thành cái tên thu hút được đông đảo người dùng quan tâm tại thời điểm ra mắt', 1019.9, 'Iphone', 0),
(157, 'Annotation 2023-11-24 132733.png', 'â', 'â', 849.99, 'Iphone', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
=======
INSERT INTO `products` (`Product_ID`, `imgUrl`, `Product`, `Description`, `Price`, `Category`) VALUES
(123, 'iphone-14-128gb-mau-xanh-didongviet.jpg', 'Iphone 14 128g', 'được xem là mẫu smartphone bùng nổ của nhà táo trong năm 2022, ấn tượng với ngoại hình trẻ trung, màn hình chất lượng đi kèm với những cải tiến về hệ điều hành và thuật toán xử lý hình ảnh, giúp máy trở thành cái tên thu hút được đông đảo người dùng quan tâm tại thời điểm ra mắt.', 7999, 'Iphone'),
(126, 'iphone_15_didongviet.jpg', 'Iphone 15 512g', 'được xem là mẫu smartphone bùng nổ của nhà táo trong năm 2022, ấn tượng với ngoại hình trẻ trung, màn hình chất lượng đi kèm với những cải tiến về hệ điều hành và thuật toán xử lý hình ảnh, giúp máy trở thành cái tên thu hút được đông đảo người dùng quan tâm tại thời điểm ra mắt.', 9999, 'Iphone'),
(127, 'iphone-15-pro-max-.jpg', 'iPhone 15pro max', 'Sản phẩm mới nhất của Apple, với nhiều tính năng tiên tiến và thiết kế đẹp mắt.', 10999.99, 'Iphone'),
(128, 'ipad-pro.jpg', 'iPad Pro 2024', 'Bản cập nhật mới của dòng iPad Pro với màn hình lớn và hiệu suất mạnh mẽ.', 1299.99, 'ipad'),
(129, 'Annotation 2023-11-24 132733.png', 'MacBook Pro 2024', 'Laptop cao cấp của Apple với chip M2 và màn hình Retina chất lượng cao.', 2299.99, 'Mac'),
(131, '???ng_d?n_?nh_2', 'iPad Pro 2024', 'Bản cập nhật mới của dòng iPad Pro với màn hình lớn và hiệu suất mạnh mẽ.', 1299.99, 'Iphone'),
(132, '???ng_d?n_?nh_3', 'MacBook Pro 2023', 'Laptop cao cấp của Apple với chip M2 và màn hình Retina chất lượng cao.', 2299.99, 'Mac'),
(133, '???ng_d?n_?nh_4', 'Apple Watch Series 8', 'Đồng hồ thông minh tiên tiến với nhiều tính năng sức khỏe và liên lạc.', 499.99, 'Watch'),
(134, '???ng_d?n_?nh_5', 'AirPods Pro', 'Tai nghe không dây cao cấp với chế độ chống ồn và chất âm tuyệt vời.', 249.99, 'Phụ kiện'),
(135, '???ng_d?n_?nh_6', 'Mac Mini', 'Máy tính để bàn nhỏ gọn với hiệu suất mạnh mẽ và khả năng mở rộng linh hoạt.', 699.99, 'mac'),
(136, '???ng_d?n_?nh_7', 'iMac 27-inch', 'Máy tính All-in-One với màn hình lớn và hiệu suất đa nhiệm tốt.', 1799.99, 'mac'),
(137, '???ng_d?n_?nh_8', 'HomePod Mini', 'Loa thông minh với âm thanh chất lượng cao và tính năng trợ lý ảo Siri tích hợp.', 99.99, 'Phụ kiện'),
(138, '???ng_d?n_?nh_9', 'Magic Keyboard', 'Bàn phím không dây với thiết kế mỏng nhẹ và cảm biến cảm ứng.', 129.99, 'Phụ kiện'),
(139, '???ng_d?n_?nh_10', 'Apple Pencil (2nd Generation)', 'Bút cảm ứng cho iPad với khả năng nhận biết áp lực và góc nghiêng.', 129.99, 'accessories'),
(140, '???ng_d?n_?nh_6', 'Mac Mini', 'Máy tính để bàn nhỏ gọn với hiệu suất mạnh mẽ và khả năng mở rộng linh hoạt.', 699.99, 'mac'),
(141, '???ng_d?n_?nh_7', 'iMac 27-inch', 'Máy tính All-in-One với màn hình lớn và hiệu suất đa nhiệm tốt.', 1799.99, 'mac'),
(142, '???ng_d?n_?nh_8', 'HomePod Mini', 'Loa thông minh với âm thanh chất lượng cao và tính năng trợ lý ảo Siri tích hợp.', 99.99, 'Phụ kiện'),
(143, '???ng_d?n_?nh_9', 'Magic Keyboard', 'Bàn phím không dây với thiết kế mỏng nhẹ và cảm biến cảm ứng.', 129.99, 'Phụ kiện'),
(144, '???ng_d?n_?nh_10', 'Apple Pencil (2nd Generation)', 'Bút cảm ứng cho iPad với khả năng nhận biết áp lực và góc nghiêng.', 129.99, 'Phụ kiện'),
(145, '???ng_d?n_?nh_8', 'iPhone 11 (Đã qua sử dụng)', 'iPhone 11 đã qua sử dụng, có thể có một số vết trầy xước nhẹ hoặc dấu hiệu về sử dụng.', 399.99, 'Máy cũ'),
(146, '???ng_d?n_?nh_9', 'iPhone X (Đã qua sử dụng)', 'iPhone X đã qua sử dụng, có thể có một số vết trầy xước nhỏ hoặc dấu hiệu về sử dụng.', 299.99, 'Máy cũ'),
(147, '???ng_d?n_?nh_10', 'iPhone 8 (Đã qua sử dụng)', 'iPhone 8 đã qua sử dụng, có thể có một số vết trầy xước nhỏ hoặc dấu hiệu về sử dụng.', 199.99, 'Máy cũ'),
(148, '???ng_d?n_?nh_11', 'iPhone SE (Đã qua sử dụng)', 'iPhone SE đã qua sử dụng, có thể có một số vết trầy xước nhẹ hoặc dấu hiệu về sử dụng.', 149.99, 'Máy cũ'),
(149, '14-pro-max.jpg', 'Iphone 14 pro max', 'được xem là mẫu smartphone bùng nổ của nhà táo trong năm 2022, ấn tượng với ngoại hình trẻ trung, màn hình chất lượng đi kèm với những cải tiến về hệ điều hành và thuật toán xử lý hình ảnh, giúp máy trở thành cái tên thu hút được đông đảo người dùng quan tâm tại thời điểm ra mắt', 10199, 'Iphone');
>>>>>>> 8dfbeef6a2cbe9943adcd93eec2ccbc305549413

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'administrator', 'bobby'),
(2, 'admin', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_customer` (`customer_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);
<<<<<<< HEAD

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `Product_ID` (`Product_ID`);
=======
>>>>>>> 8dfbeef6a2cbe9943adcd93eec2ccbc305549413

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
<<<<<<< HEAD
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;
=======
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
>>>>>>> 8dfbeef6a2cbe9943adcd93eec2ccbc305549413

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
>>>>>>> 8dfbeef6a2cbe9943adcd93eec2ccbc305549413

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
<<<<<<< HEAD
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
=======
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
>>>>>>> 8dfbeef6a2cbe9943adcd93eec2ccbc305549413

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
>>>>>>> 8dfbeef6a2cbe9943adcd93eec2ccbc305549413

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
<<<<<<< HEAD
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;
=======
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
>>>>>>> 8dfbeef6a2cbe9943adcd93eec2ccbc305549413

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
<<<<<<< HEAD

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
=======
>>>>>>> 8dfbeef6a2cbe9943adcd93eec2ccbc305549413
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
