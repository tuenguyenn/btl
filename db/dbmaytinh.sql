-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2024 lúc 08:25 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

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
  `Price` double NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`ID`, `customer_id`, `Product`, `imgUrl`, `Price`, `Quantity`) VALUES
(490, 24, 'iPhone 11 64GB', '11.jpg', 10125000, 1);

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
  `name2` varchar(255) DEFAULT NULL,
  `address` varchar(30) NOT NULL,
  `address2` varchar(30) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `phone_number2` varchar(20) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `cususer` varchar(30) NOT NULL,
  `cuspass` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `name2`, `address`, `address2`, `phone_number`, `phone_number2`, `birthdate`, `cususer`, `cuspass`) VALUES
(24, 'Nguyễn Tuệ ', 'anh', '66 trường chinh ', '11111', '08284278511', '31113', '2002-03-12', 'tueng', '7e7576bde8baa58874dc2a8a752ee3dc'),
(32, 'ad', NULL, 'ada', '', 'ads', NULL, '2024-08-13', 'a', '657cffbf3323cfa7604077147b5f7bb2'),
(33, 'a', NULL, 'a', '', '0912313111', NULL, '2024-08-08', 'aaaa', '6e9665ab37ca1887a7e0179c5fac0dc0'),
(34, 'tue', NULL, 'aaa', '', '1313211311', NULL, '2024-07-30', 'tue1231', '6e9665ab37ca1887a7e0179c5fac0dc0'),
(35, 'adadad', NULL, 'adadad', '', '1231313111', NULL, '2024-08-06', 'tue12345', '79afc1a0a97ed3429237998299bc2e47'),
(36, 'messi', NULL, 'Ha Noi', '', '1234567890', NULL, '2000-12-03', 'kohuTq6yMI', 'd9b1d7db4cd6e70935368a1efb10e377'),
(37, 'tueng', NULL, 'Hanoi', '', '0828427851', NULL, '2024-08-06', 'user', '0d8d5cd06832b29560745fe4e1b941cf'),
(38, 'adadadaa', NULL, 'ádadada', '', '0901111231', NULL, '2024-08-05', 'aaaaa', '594f803b380a41396ed63dca39503542'),
(39, 'messi', NULL, 'Ha Noi', '', '1234567890', NULL, '2000-12-03', 'zyxwyCS94E', '202cb962ac59075b964b07152d234b70'),
(40, 'messi', NULL, 'Ha Noi', '', '1234567891', NULL, '2000-12-03', 'DFL9xjJbx9', '202cb962ac59075b964b07152d234b70'),
(41, 'messi', NULL, 'Ha Noi', '', '1234567891', NULL, '2000-12-03', '0cHBpgDmqO', '202cb962ac59075b964b07152d234b70'),
(42, 'messi', NULL, 'Ha Noi', '', '0123456789', NULL, '2000-12-03', 'vG9DIcQMbS', '202cb962ac59075b964b07152d234b70'),
(43, 'messi', NULL, 'Ha Noi', '', '0123456789', NULL, '2000-12-03', 'Zzi2nh9aSM', '202cb962ac59075b964b07152d234b70'),
(44, 'messi', NULL, 'Ha Noi', '', '0123456789', NULL, '2000-12-03', 'SwIS5hp03y', '202cb962ac59075b964b07152d234b70'),
(45, 'messi', NULL, 'Ha Noi', '', '0123456789', NULL, '2000-12-03', 'BCt8Ry61Fg', '202cb962ac59075b964b07152d234b70'),
(46, 'messi', NULL, 'Ha Noi', '', '0123456789', NULL, '2000-12-03', '5l52IneXWf', '202cb962ac59075b964b07152d234b70'),
(47, 'messi', NULL, 'Ha Noi', '', '0123456789', NULL, '2000-12-03', 'JhfKieXA5V', '202cb962ac59075b964b07152d234b70'),
(48, 'messi', NULL, 'Ha Noi', '', '0123456789', NULL, '2000-12-03', 'R72tN61Nll', '202cb962ac59075b964b07152d234b70'),
(49, 'messi', NULL, 'Ha Noi', '', '0123456789', NULL, '2000-12-03', 'wA3uJGKypk', '202cb962ac59075b964b07152d234b70'),
(50, 'messi', NULL, 'Ha Noi', '', '0123456789', NULL, '2000-12-03', 'nthBEbqk49', '202cb962ac59075b964b07152d234b70'),
(51, 'messi', NULL, 'Ha Noi', '', '0123456789', NULL, '2000-12-03', 'pKGtiCsGi1', '202cb962ac59075b964b07152d234b70'),
(52, 'messi', NULL, 'Ha Noi', '', '0123456789', NULL, '2000-12-03', 's4ASMYgC1F', '202cb962ac59075b964b07152d234b70'),
(53, 'messi', NULL, 'Ha Noi', '', '0123456789', NULL, '2000-12-03', 'N3MTxzHbzK', '202cb962ac59075b964b07152d234b70'),
(54, 'messi', NULL, 'Ha Noi', '', '0123456789', NULL, '2000-12-03', 'oK36M0EInL', '202cb962ac59075b964b07152d234b70'),
(55, 'nguyen 3', 'Nguyen Van A', 'Đh thăng long 3', 'Ha noi', '0700214647', '0941293993', '2001-01-01', 'user1', '0d64650b5bfd512c272ebf5d4587de76'),
(56, 'messi', NULL, 'Ha Noi', '', '0440565128', NULL, '2000-12-03', 'BP6E0KA0n3', '71e41a17623713bb12ee0b3c3b9cd96c'),
(57, 'messi', NULL, 'Ha Noi', '', '0071110519', NULL, '2000-12-03', '3ZnOqiTij1', '71e41a17623713bb12ee0b3c3b9cd96c'),
(58, 'messi', NULL, 'Ha Noi', '', '0047994138', NULL, '2000-12-03', 'WyX3wiEoun', '71e41a17623713bb12ee0b3c3b9cd96c'),
(59, 'messi', NULL, 'Ha Noi', '', '0529282905', NULL, '2000-12-03', '1qGumv15ADZYizoxPHXJZ1qggsSBI0', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(60, 'messi', NULL, 'Ha Noi', '', '0397371867', NULL, '2000-12-03', 'zuwyQDLdmaaSVAtpGtNFQn5L6buOhk', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(61, 'messi', NULL, 'Ha Noi', '', '0013445304', NULL, '2000-12-03', '20JjUCszp3AGkUBdxddFV029ufuCCj', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(62, 'messi', NULL, 'Ha Noi', '', '0478615695', NULL, '2000-12-03', '5X9jZw4WrcfPdZHXoqhyoci40ZBapQ', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(63, 'messi', NULL, 'Ha Noi', '', '0405668225', NULL, '2000-12-03', 'UiV', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(64, 'messi', NULL, 'Ha Noi', '', '0934012298', NULL, '2000-12-03', 'iBZXhO5hmy', '71e41a17623713bb12ee0b3c3b9cd96c'),
(65, 'messi', NULL, 'Ha Noi', '', '0002380440', NULL, '2000-12-03', 'FBov4kjTFaXyOTWD6BysSEvhmfJPUO', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(66, 'messi', NULL, 'Ha Noi', '', '0100611844', NULL, '2000-12-03', 'mju', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(67, 'messi', NULL, 'Ha Noi', '', '0566435113', NULL, '2000-12-03', 'OPyaAeMrl9', '71e41a17623713bb12ee0b3c3b9cd96c'),
(68, 'messi', NULL, 'Ha Noi', '', '0893511208', NULL, '2000-12-03', 'UYtSvbi0hU1cyB2bVp0EKEuXVVyfLI', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(69, 'messi', NULL, 'Ha Noi', '', '0453849119', NULL, '2000-12-03', 'oQe', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(70, 'messi', NULL, 'Ha Noi', '', '0534471401', NULL, '2000-12-03', 'UuQIhBJA7d', '71e41a17623713bb12ee0b3c3b9cd96c'),
(71, 'messi', NULL, 'Ha Noi', '', '0268377366', NULL, '2000-12-03', 'Shq6TjTpvm', '71e41a17623713bb12ee0b3c3b9cd96c'),
(72, 'messi', NULL, 'Ha Noi', '', '0326630334', NULL, '2000-12-03', 'zZvSR311S3', '71e41a17623713bb12ee0b3c3b9cd96c'),
(73, 'messi', NULL, 'Ha Noi', '', '0883372268', NULL, '2000-12-03', '4rVIJI4fxQ', '71e41a17623713bb12ee0b3c3b9cd96c'),
(74, 'messi', NULL, 'Ha Noi', '', '0836304238', NULL, '2000-12-03', 'jzIitW6s7o', '71e41a17623713bb12ee0b3c3b9cd96c'),
(75, 'messi', NULL, 'Ha Noi', '', '0314080373', NULL, '2000-12-03', 'd180KR0tyTBTmzYZ38KDDAfkl7O53w', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(76, 'messi', NULL, 'Ha Noi', '', '0674857630', NULL, '2000-12-03', 'anU', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(77, 'messi', NULL, 'Ha Noi', '', '0287451721', NULL, '2000-12-03', 'fPntEbrHaN', '71e41a17623713bb12ee0b3c3b9cd96c'),
(78, 'messi', NULL, 'Ha Noi', '', '0649230888', NULL, '2000-12-03', 'x57NsnDTlbqLzCwMpWObSo98DFN2Gr', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(79, 'messi', NULL, 'Ha Noi', '', '0178047606', NULL, '2000-12-03', 'oXt', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(80, 'messi', NULL, 'Ha Noi', '', '0659530770', NULL, '2000-12-03', 'GO504gQNK1', '71e41a17623713bb12ee0b3c3b9cd96c'),
(81, 'messi', NULL, 'Ha Noi', '', '0901922390', NULL, '2000-12-03', 'DIo2cSICyhEVT4K1esaaM1YfGOoerh', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(82, 'messi', NULL, 'Ha Noi', '', '0784510083', NULL, '2000-12-03', 'yNA', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(83, 'messi', NULL, 'Ha Noi', '', '0905447341', NULL, '2000-12-03', 'WQLhIpjegN', '71e41a17623713bb12ee0b3c3b9cd96c');

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
-- Cấu trúc bảng cho bảng `hoithoai`
--

CREATE TABLE `hoithoai` (
  `ID_hoithoai` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `ID_nguoiban` int(11) DEFAULT NULL,
  `NoiDung` text DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoithoai`
--

INSERT INTO `hoithoai` (`ID_hoithoai`, `customer_id`, `ID_nguoiban`, `NoiDung`, `NgayTao`) VALUES
(1, NULL, 1, 'a', '2024-05-15 21:35:15'),
(2, NULL, 1, 'aa', '2024-05-15 21:36:33'),
(3, NULL, 1, 'aa', '2024-05-15 21:39:10'),
(4, 24, 1, 'a', '2024-05-15 21:41:15'),
(5, 24, 1, 'a', '2024-05-15 21:44:49'),
(6, 24, 1, 'a', '2024-05-15 21:50:25'),
(7, 24, 1, 'a', '2024-05-15 21:52:17'),
(8, 24, 1, 'a', '2024-05-15 21:52:22'),
(9, 24, 1, 'a', '2024-05-15 21:53:26'),
(10, 24, 1, NULL, '2024-05-16 08:38:13');

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
  `quantity` int(11) NOT NULL,
  `imgUrl` text NOT NULL,
  `amount` int(100) NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateOrdered` varchar(100) NOT NULL,
  `dateDelivered` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `customer_id`, `name`, `contact`, `address`, `item`, `quantity`, `imgUrl`, `amount`, `status`, `dateOrdered`, `dateDelivered`) VALUES
(64, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh', '(1) MacBook Pro 2023, ', 0, '14-pro-max.jpg', 5749750, 'canceled', '05/13/24 04:58:53 AM', '05/14/24 05:18:42 AM'),
(65, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh', '(1) iPhone 15pro max, (1) Iphone 15, ', 0, 'iphone-15-pro-max-.jpg', 29975000, 'canceled', '05/13/24 04:59:12 AM', '05/14/24 10:08:20 AM'),
(66, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh', '(1) Iphone 15, ', 0, 'iphone_15_didongviet.jpg', 2500000, 'canceled', '05/14/24 02:21:12 AM', '05/14/24 04:34:12 AM'),
(67, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh', '(1) Iphone 14, ', 0, '14-pro-max.jpg', 22500000, 'canceled', '05/14/24 02:21:29 AM', '05/14/24 04:33:55 AM'),
(68, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) iPhone X , ', 0, '???ng_d?n_?nh_9', 749975, 'canceled', '05/14/24 03:46:08 AM', '05/14/24 04:31:36 AM'),
(69, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) Iphone 15, ', 0, 'iphone_15_didongviet.jpg', 25225000, 'canceled', '05/14/24 05:19:03 AM', '05/14/24 05:19:07 AM'),
(70, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) iPhone X , ', 0, '???ng_d?n_?nh_9', 749975, 'canceled', '05/14/24 05:22:18 AM', '05/14/24 05:22:23 AM'),
(71, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) iPhone X , ', 0, '???ng_d?n_?nh_9', 749975, 'canceled', '05/14/24 05:28:37 AM', '05/14/24 05:33:29 AM'),
(72, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) iPhone X , ', 0, '???ng_d?n_?nh_9', 749975, 'canceled', '05/14/24 09:02:10 AM', '05/14/24 09:37:41 AM'),
(73, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) Iphone 15, ', 0, 'iphone_15_didongviet.jpg', 25225000, 'canceled', '05/14/24 09:03:01 AM', '05/14/24 09:31:37 AM'),
(74, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) iPhone X , ', 0, '???ng_d?n_?nh_9', 749975, 'canceled', '05/14/24 09:39:30 AM', '05/14/24 11:32:10 AM'),
(75, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) iPhone X , ', 0, '???ng_d?n_?nh_9', 749975, 'canceled', '05/14/24 11:26:01 AM', '05/14/24 11:31:55 AM'),
(76, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) Iphone 14, (1) Mac Mini, ', 0, '406702210_171165589393411_5062149761622021044_n.jpg', 24249975, 'canceled', '05/14/24 11:33:16 AM', '05/14/24 11:33:44 AM'),
(77, 24, 'Nguyễn Tuệ', '0828427851', '66 trường chinh haa', '(1) iPhone 15pro max, (1) Iphone 15, ', 0, 'iphone-15-pro-max-.jpg', 52700000, 'canceled', '05/14/24 11:33:34 AM', '05/14/24 11:33:39 AM'),
(78, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 0, 'iphone-15-pro-max-.jpg', 27475000, 'confirmed', '05/14/24 04:01:09 PM', '05/14/24 04:08:30 PM'),
(79, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 0, 'iphone_15_didongviet.jpg', 79174975, 'unconfirmed', '05/15/24 12:52:49 PM', ''),
(80, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(2) , (1) iPhone 15pro max, (1) Iphone 15, ', 0, '', 79174975, 'unconfirmed', '05/15/24 01:03:16 PM', ''),
(81, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Mac Mini, ', 0, '???ng_d?n_?nh_6', 79174975, 'unconfirmed', '05/15/24 01:07:45 PM', ''),
(82, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, (1) Iphone 15, ', 0, 'iphone-15-pro-max-.jpg', 79174975, 'unconfirmed', '05/15/24 01:13:52 PM', ''),
(83, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 0, 'iphone_15_didongviet.jpg', 79174975, 'unconfirmed', '05/15/24 01:21:25 PM', ''),
(84, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 0, 'iphone_15_didongviet.jpg', 79174975, 'canceled', '05/15/24 01:22:49 PM', '05/15/24 01:24:20 PM'),
(85, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(2) iPhone 15pro max, ', 0, 'iphone-15-pro-max-.jpg', 79174975, 'unconfirmed', '05/15/24 01:26:22 PM', ''),
(86, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) HomePod Mini, ', 0, '???ng_d?n_?nh_8', 79174975, 'unconfirmed', '05/15/24 01:28:44 PM', ''),
(87, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 0, 'iphone-15-pro-max-.jpg', 79174975, 'unconfirmed', '05/15/24 01:31:58 PM', ''),
(88, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 0, 'iphone-15-pro-max-.jpg', 79174975, 'unconfirmed', '05/15/24 01:33:05 PM', ''),
(89, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone X , ', 0, '???ng_d?n_?nh_9', 79174975, 'unconfirmed', '05/15/24 01:35:46 PM', ''),
(90, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) MacBook Pro 2023, ', 0, '14-pro-max.jpg', 79174975, 'unconfirmed', '05/15/24 01:36:37 PM', ''),
(91, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 0, 'iphone_15_didongviet.jpg', 79174975, 'unconfirmed', '05/15/24 01:37:26 PM', ''),
(92, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 0, 'iphone_15_didongviet.jpg', 79174975, 'unconfirmed', '05/15/24 01:38:09 PM', ''),
(93, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 0, 'iphone-15-pro-max-.jpg', 79174975, 'unconfirmed', '05/15/24 01:38:53 PM', ''),
(94, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Magic Keyboard, ', 0, '???ng_d?n_?nh_9', 79174975, 'unconfirmed', '05/15/24 01:40:04 PM', ''),
(95, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 0, 'iphone-15-pro-max-.jpg', 79174975, 'canceled', '05/15/24 01:41:31 PM', '05/15/24 02:14:29 PM'),
(96, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPad Pro 2024, ', 0, 'ipad-pro.jpg', 79174975, 'canceled', '05/15/24 01:41:48 PM', '05/15/24 02:14:16 PM'),
(97, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPad Pro 2024, ', 0, 'ipad-pro.jpg', 79174975, 'canceled', '05/15/24 01:42:18 PM', '05/15/24 01:43:00 PM'),
(98, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 0, 'iphone_15_didongviet.jpg', 79174975, 'unconfirmed', '05/15/24 02:15:03 PM', ''),
(99, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 0, 'iphone-15-pro-max-.jpg', 79174975, 'unconfirmed', '05/15/24 02:16:44 PM', ''),
(100, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 0, 'iphone-15-pro-max-.jpg', 79174975, 'unconfirmed', '05/15/24 02:17:16 PM', ''),
(101, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) AirPods Pro, (1) Apple Watch Series 8, ', 0, '???ng_d?n_?nh_5', 0, 'unconfirmed', '05/15/24 02:24:03 PM', ''),
(102, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 0, 'iphone_15_didongviet.jpg', 25225000, 'unconfirmed', '05/15/24 02:30:28 PM', ''),
(103, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 0, 'iphone-15-pro-max-.jpg', 27475000, 'unconfirmed', '05/15/24 02:30:50 PM', ''),
(104, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 14, ', 0, '406702210_171165589393411_5062149761622021044_n.jpg', 45000000, 'canceled', '05/15/24 02:33:34 PM', '05/15/24 02:33:43 PM'),
(105, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Apple Watch Series 8, ', 0, 'asusx512.jpg', 2499950, 'unconfirmed', '05/15/24 02:34:13 PM', ''),
(106, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 14, (1) Apple Watch Series 8, ', 0, '406702210_171165589393411_5062149761622021044_n.jpg', 2499950, 'canceled', '05/15/24 02:34:52 PM', '05/16/24 08:24:35 AM'),
(107, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone X , ', 0, '???ng_d?n_?nh_9', 1499950, 'canceled', '05/15/24 02:35:22 PM', '05/16/24 08:24:33 AM'),
(108, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 0, 'iphone_15_didongviet.jpg', 25225000, 'unconfirmed', '05/15/24 02:36:23 PM', ''),
(109, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Iphone 15, ', 0, 'iphone_15_didongviet.jpg', 0, 'canceled', '05/15/24 02:45:53 PM', '05/16/24 08:19:11 AM'),
(110, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 0, 'iphone-15-pro-max-.jpg', 0, 'canceled', '05/15/24 08:20:23 PM', '05/16/24 08:19:09 AM'),
(111, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 15pro max, ', 0, 'iphone-15-pro-max-.jpg', 27475000, 'unconfirmed', '05/15/24 08:21:53 PM', ''),
(112, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Apple Watch Series 8, ', 0, 'asusx512.jpg', 1249975, 'canceled', '05/15/24 08:24:12 PM', '05/16/24 08:17:21 AM'),
(113, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Magic Keyboard, ', 0, 'Magic Keyboard with Touch ID .jpg', 8500000, 'canceled', '05/16/24 07:49:50 AM', '05/16/24 08:16:15 AM'),
(114, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) Magic Keyboard, (1) iPhone 15pro max, ', 0, 'Magic Keyboard with Touch ID .jpg', 32975000, 'canceled', '05/16/24 07:50:12 AM', '05/16/24 08:14:09 AM'),
(115, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh ', '(1) iPhone 11 64GB, ', 0, '11.jpg', 6250000, 'canceled', '05/16/24 07:50:59 AM', '05/16/24 08:16:05 AM'),
(116, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh a', '(1) Iphone 15, ', 0, 'iphone15128.jpg', 25225000, 'unconfirmed', '05/16/24 09:27:08 AM', ''),
(117, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh a', '(1) Tai Nghe Marshall Minor IV, ', 0, 'Tai Nghe Marshall Minor IV.jpg', 3000000, 'unconfirmed', '05/23/24 02:56:41 PM', ''),
(118, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh a', '(1) iPhone 14, (1) Tai Nghe Marshall Minor IV, ', 0, 'iphone14.jpg', 3000000, 'canceled', '05/23/24 03:15:05 PM', '05/23/24 03:37:49 PM'),
(119, 24, 'Nguyễn Tuệ ', '0828427851', '66 trường chinh a', '(1) iPhone 11 64GB, ', 0, '11.jpg', 6250000, 'canceled', '05/23/24 04:20:50 PM', '05/23/24 04:21:01 PM'),
(120, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) Iphone 15, ', 0, 'iphone15128.jpg', 25225000, 'unconfirmed', '05/23/24 04:23:12 PM', ''),
(121, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) Iphone 15, ', 0, 'iphone15128.jpg', 25225000, 'unconfirmed', '05/23/24 04:28:48 PM', ''),
(122, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) iPhone 12 64GB, ', 0, 'iPhone 12 64GB.jpg', 12225000, 'unconfirmed', '05/23/24 04:40:34 PM', ''),
(123, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) Iphone 15, ', 0, 'iphone15128.jpg', 25225000, 'unconfirmed', '05/23/24 04:44:07 PM', ''),
(124, 24, 'a', 'aaa', 'a', '(1) Iphone 15, ', 0, 'iphone15128.jpg', 25225000, 'unconfirmed', '05/23/24 05:03:52 PM', ''),
(125, 24, 'a', 'aaa', 'a', '(1) Iphone 15, ', 0, 'iphone15128.jpg', 25225000, 'unconfirmed', '05/23/24 05:04:10 PM', ''),
(126, 24, 'a', 'aaa', 'a', '(1) iPhone 15pro max, ', 0, '15promax.jpg', 27475000, 'unconfirmed', '05/23/24 05:04:28 PM', ''),
(127, 24, 'a', 'aaa', 'a', '(1) iPhone 15pro max, ', 0, '15promax.jpg', 27475000, 'unconfirmed', '05/23/24 05:06:36 PM', ''),
(128, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) iPhone SE (2022), ', 0, 'iPhone SE (2022).jpg', 7500000, 'unconfirmed', '05/23/24 05:08:57 PM', ''),
(129, 24, 'a', 'aaa', 'a', '(1) iPhone 15pro max, ', 0, '15promax.jpg', 27475000, 'unconfirmed', '05/23/24 05:09:34 PM', ''),
(130, 24, 'a', 'aaa', 'a', '(1) iPhone 15pro max, ', 0, '15promax.jpg', 27475000, 'unconfirmed', '05/23/24 05:09:54 PM', ''),
(131, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) iPhone 12 64GB, ', 0, 'iPhone 12 64GB.jpg', 12225000, 'unconfirmed', '05/23/24 05:10:15 PM', ''),
(132, 24, 'a', 'aaa', 'a', '(1) iPhone 15pro max, ', 0, '15promax.jpg', 27475000, 'unconfirmed', '05/23/24 05:10:28 PM', ''),
(133, 24, 'aa', 'a', '11111', '(1) Iphone 15, ', 0, 'iphone15128.jpg', 25225000, 'canceled', '05/24/24 08:52:40 PM', '05/24/24 09:32:44 PM'),
(134, 24, '<br /><b>Warning</b>:  Trying to access array offset on value of type null in <b>C:xampphtdocstleco', '<br /><b>Warning</b>:  Trying to access array offset on value of type null in <b>C:xampphtdocstleco', '<br /><b>Warning</b>:  Trying to access array offset on value of type null in <b>C:xampphtdocstleco', '(1) Iphone 15, ', 0, 'iphone15128.jpg', 25225000, 'canceled', '05/24/24 08:58:12 PM', '05/24/24 09:32:37 PM'),
(135, 24, 'aa', 'a', '11111', '(1) Iphone 15, ', 0, 'iphone15128.jpg', 25225000, 'canceled', '05/24/24 09:01:47 PM', '05/24/24 09:32:35 PM'),
(136, 24, 'aa', 'a', '11111', '(1) Iphone 15, ', 0, 'iphone15128.jpg', 25225000, 'canceled', '05/24/24 09:15:03 PM', '05/24/24 09:32:24 PM'),
(137, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) Iphone 15, ', 0, 'iphone15128.jpg', 25225000, 'unconfirmed', '05/24/24 09:40:07 PM', ''),
(138, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) iPhone 15pro max, ', 0, '15promax.jpg', 27475000, 'unconfirmed', '05/24/24 09:41:56 PM', ''),
(139, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) iPhone 15pro max, ', 0, '15promax.jpg', 27475000, 'unconfirmed', '05/24/24 09:46:04 PM', ''),
(140, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) Iphone 15, ', 0, 'iphone15128.jpg', 25225000, 'unconfirmed', '05/24/24 09:53:56 PM', ''),
(141, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) iPhone 15pro max, ', 0, '15promax.jpg', 27475000, 'unconfirmed', '05/24/24 09:56:06 PM', ''),
(142, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) Iphone 15, ', 0, 'iphone15128.jpg', 25225000, 'unconfirmed', '05/24/24 09:59:00 PM', ''),
(143, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '', 0, '', 25225000, 'canceled', '05/27/24 12:29:47 PM', '05/27/24 12:30:39 PM'),
(144, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) iPhone 14, ', 0, 'iphone14.jpg', 22500000, 'unconfirmed', '05/27/24 12:30:03 PM', ''),
(145, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) iPhone 15pro max, ', 0, '15promax.jpg', 27475000, 'unconfirmed', '05/27/24 12:30:25 PM', ''),
(146, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(2) , (1) iPhone 15pro max, ', 0, '', 80175000, 'canceled', '05/29/24 01:43:17 PM', '05/29/24 01:43:33 PM'),
(147, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) iPhone 15pro max, (1) Iphone 15, ', 0, '15promax.jpg', 52700000, 'unconfirmed', '05/29/24 01:43:43 PM', ''),
(148, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) Iphone 15, (1) iPhone 11 64GB, ', 0, 'iphone15128.jpg', 31475000, 'unconfirmed', '05/29/24 01:44:00 PM', ''),
(149, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', 'iPhone 11 64GB', 0, '11.jpg', 6250000, 'unconfirmed', '05/29/24 02:40:07 PM', ''),
(150, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', 'iPhone 14 Plus 128GB', 0, 'iphone-14-plus-256gb.jpg', 22000000, 'unconfirmed', '05/29/24 02:40:29 PM', ''),
(151, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '', 0, '', 6000000, 'unconfirmed', '05/29/24 02:40:48 PM', ''),
(152, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '', 0, '', 54950000, 'unconfirmed', '05/29/24 02:41:30 PM', ''),
(153, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', 'iPhone 15pro max', 0, '15promax.jpg', 77925000, 'unconfirmed', '05/29/24 02:42:06 PM', ''),
(154, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', 'iPhone 15pro max', 0, '15promax.jpg', 52700000, 'unconfirmed', '05/29/24 02:42:28 PM', ''),
(155, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) iPad Pro M2 11 inch , (2)', 0, '', 52500000, 'unconfirmed', '05/29/24 02:43:49 PM', ''),
(156, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(2) Iphone 15', 0, 'iphone15128.jpg', 50450000, 'unconfirmed', '05/29/24 02:44:12 PM', ''),
(157, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) Apple Watch Series 9 , (1) iPhone 15pro max', 0, '15promax.jpg', 57475000, 'unconfirmed', '05/29/24 02:44:27 PM', ''),
(158, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', ' Tai Nghe Marshall Minor IV,  iPad Gen 10 th', 0, '', 16275000, 'canceled', '05/29/24 02:45:51 PM', '09/15/24 06:02:05 PM'),
(159, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', ' Iphone 15,  iPad Pro M2 11 inch', 0, '', 77725000, 'canceled', '05/29/24 02:46:28 PM', '05/29/24 02:48:57 PM'),
(160, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', ' iPhone 14', 0, 'iphone14.jpg', 22500000, 'canceled', '05/29/24 02:46:49 PM', '09/15/24 06:02:03 PM'),
(161, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', ' Iphone 15', 0, '', 50450000, 'canceled', '05/29/24 02:47:03 PM', '05/29/24 02:48:23 PM'),
(162, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(2) , (1) Iphone 15, ', 0, '', 50450000, 'canceled', '05/29/24 02:48:48 PM', '05/29/24 02:48:55 PM'),
(163, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) iPad Air 4, ', 0, 'ipadair4.jpg', 17500000, 'canceled', '05/29/24 02:49:07 PM', '09/15/24 06:02:01 PM'),
(164, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) iPad Pro M2 11 inch , (1) iPhone 14, ', 0, 'iPad Pro M2 11 inch WiFi Cellula.jpg', 48750000, 'delivered', '05/29/24 02:49:26 PM', '09/15/24 06:02:23 PM'),
(165, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(2) , (1) iPhone 15pro max, (1) Iphone 15, ', 0, '', 80175000, 'canceled', '05/29/24 02:49:45 PM', '09/15/24 06:01:58 PM'),
(166, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(2) , (1) iPad Pro M2 11 inch , (1) iPhone 14, ', 0, '', 75000000, 'canceled', '05/29/24 02:50:27 PM', '05/29/24 02:51:44 PM'),
(167, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(2) , (1) iPhone 15pro max, ', 0, '', 54950000, 'canceled', '05/29/24 02:51:54 PM', '09/15/24 06:01:56 PM'),
(168, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(2) , (1) Iphone 15, ', 0, '', 50450000, 'confirmed', '05/29/24 02:52:33 PM', '09/15/24 03:43:08 PM'),
(169, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(2) Iphone 15, ', 0, 'iphone15128.jpg', 50450000, 'delivered', '05/29/24 02:52:50 PM', '09/15/24 03:33:11 PM'),
(170, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(3) Iphone 15, ', 0, 'iphone15128.jpg', 75675000, 'delivered', '05/29/24 02:53:30 PM', '09/15/24 02:41:22 PM'),
(171, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) Iphone 15, (1) iPhone 15pro max, ', 0, 'iphone15128.jpg', 52700000, 'canceled', '05/29/24 02:53:45 PM', '05/29/24 09:12:16 PM'),
(172, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(2) , (1) iPhone 14, ', 0, '', 45000000, 'canceled', '05/29/24 09:22:13 PM', '09/15/24 06:01:52 PM'),
(173, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) Iphone 15, ', 0, 'iphone15128.jpg', 25225000, 'confirmed', '05/29/24 09:23:31 PM', '09/15/24 02:35:38 PM'),
(174, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', '(1) iPhone 12 64GB, (2) iPhone 15pro max, ', 0, 'iPhone 12 64GB.jpg', 67175000, 'confirmed', '05/29/24 09:29:41 PM', '09/15/24 02:30:09 PM'),
(175, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', 'iPhone 15pro max', 0, '15promax.jpg', 1099, 'confirmed', '05/29/24 09:34:14 PM', '09/15/24 02:19:28 PM'),
(176, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', 'MacBook Air M3 15 inch', 0, 'MacBook Air M3 15 inch.jpg', 1300, 'confirmed', '05/29/24 09:34:14 PM', '09/15/24 12:53:13 PM'),
(177, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', 'Iphone 15', 0, 'iphone15128.jpg', 25225000, 'confirmed', '05/29/24 09:35:32 PM', '09/15/24 12:46:51 PM'),
(178, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', 'iPad Gen 10 th', 0, '0023004_yellow_550.jpg', 10275000, 'confirmed', '05/29/24 09:35:32 PM', '09/15/24 02:18:03 PM'),
(179, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', 'Iphone 15', 1, 'iphone15128.jpg', 25225000, 'confirmed', '05/29/24 09:38:18 PM', '05/29/24 09:40:12 PM'),
(180, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', 'Apple Watch Series 7 ', 1, 'Apple Watch Series 7.jpg', 8750000, 'confirmed', '05/29/24 09:38:18 PM', '09/15/24 01:43:49 AM'),
(181, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', 'iPhone 15pro max', 2, '15promax.jpg', 54950000, 'confirmed', '05/29/24 09:38:38 PM', '05/29/24 09:40:15 PM'),
(182, 55, 'Tue Nn', '0342020111', 'Ha Noi', 'Magic Keyboard', 1, 'Magic Keyboard with Touch ID .jpg', 5500000, 'canceled', '09/15/24 01:33:49 AM', '09/15/24 01:37:37 AM'),
(183, 55, 'Tue Nn', '0342020111', 'Ha Noi', 'MacBook Air M3 15 inch', 1, 'MacBook Air M3 15 inch.jpg', 32500000, 'canceled', '09/15/24 01:37:24 AM', '09/15/24 01:37:35 AM'),
(184, 55, 'Nguyen Van A', '0941293993', 'Ha noi', 'iPad Pro M2 11 inch ', 1, 'iPad Pro M2 11 inch WiFi Cellula.jpg', 26250000, 'confirmed', '09/15/24 01:39:44 AM', '09/15/24 01:39:54 AM'),
(185, 55, 'nguyen 3', '0171968305', 'Đh thăng long 3', 'MacBook Air M3 15 inch', 1, 'MacBook Air M3 15 inch.jpg', 32500000, 'canceled', '09/15/24 01:41:12 AM', '09/15/24 01:41:23 AM'),
(186, 55, 'Nguyen Van A', '0941293993', 'Ha noi', 'Iphone 15', 1, 'iphone15128.jpg', 25225000, 'canceled', '09/15/24 01:42:27 AM', '09/15/24 01:51:54 AM'),
(187, 55, 'nguyen 3', '0180238573', 'Đh thăng long 3', 'MacBook Air M3 15 inch', 1, 'MacBook Air M3 15 inch.jpg', 32500000, 'canceled', '09/15/24 01:51:41 AM', '09/15/24 01:51:52 AM'),
(188, 55, 'nguyen 3', '0623964377', 'Đh thăng long 3', 'Iphone 15', 1, 'iphone15128.jpg', 25225000, 'canceled', '09/15/24 12:08:23 PM', '09/15/24 12:10:06 PM'),
(189, 55, 'nguyen 3', '0623964377', 'Đh thăng long 3', 'MacBook Air M3 15 inch', 1, 'MacBook Air M3 15 inch.jpg', 32500000, 'canceled', '09/15/24 12:08:23 PM', '09/15/24 12:50:07 PM'),
(190, 55, 'nguyen 3', '0623964377', 'Đh thăng long 3', 'MacBook Air M3 15 inch', 1, 'MacBook Air M3 15 inch.jpg', 32500000, 'canceled', '09/15/24 12:09:53 PM', '09/15/24 12:10:03 PM'),
(191, 55, 'nguyen 3', '0335798738', 'Đh thăng long 3', 'iPad Pro M2 11 inch ', 1, 'iPad Pro M2 11 inch WiFi Cellula.jpg', 26250000, 'canceled', '09/15/24 12:49:51 PM', '09/15/24 12:50:06 PM'),
(192, 55, 'nguyen 3', '0335798738', 'Đh thăng long 3', 'Apple Watch Series 9 ', 1, 'Apple Watch Series 9.jpg', 30000000, 'canceled', '09/15/24 12:49:59 PM', '09/15/24 12:50:04 PM'),
(193, 55, 'nguyen 3', '0335798738', 'Đh thăng long 3', 'Tai Nghe Marshall Minor IV', 1, 'Tai Nghe Marshall Minor IV.jpg', 3000000, 'canceled', '09/15/24 12:51:07 PM', '09/15/24 12:52:01 PM'),
(194, 55, 'nguyen 3', '0335798738', 'Đh thăng long 3', 'MacBook Air M2 2022', 1, 'MacBook Air M2 2022.jpg', 27525000, 'delivered', '09/15/24 01:07:46 PM', '09/15/24 02:18:00 PM'),
(195, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', 'Iphone 15', 1, 'iphone15128.jpg', 25225000, 'delivered', '09/15/24 01:57:42 PM', '09/15/24 02:38:43 PM'),
(196, 55, 'nguyen 3', '0335798738', 'Đh thăng long 3', 'Ốp lưng Tiger Magnetic ', 1, 'op.jpg', 300000, 'canceled', '09/15/24 02:44:15 PM', '09/15/24 02:44:19 PM'),
(197, 55, 'nguyen 3', '0335798738', 'Đh thăng long 3', 'iPhone 14 Plus 128GB', 1, 'iphone-14-plus-256gb.jpg', 22000000, 'canceled', '09/15/24 02:45:36 PM', '09/15/24 02:57:52 PM'),
(198, 55, 'nguyen 3', '0335798738', 'Đh thăng long 3', 'MacBook Air M3 15 inch', 1, 'MacBook Air M3 15 inch.jpg', 32500000, 'canceled', '09/15/24 02:57:39 PM', '09/15/24 02:57:50 PM'),
(199, 55, 'nguyen 3', '0865323981', 'Đh thăng long 3', 'MacBook Air M3 15 inch', 1, 'MacBook Air M3 15 inch.jpg', 32500000, 'canceled', '09/15/24 03:25:21 PM', '09/15/24 03:25:32 PM'),
(200, 55, 'nguyen 3', '0204696053', 'Đh thăng long 3', 'MacBook Pro M3 2023', 1, 'MacBook Pro 14 inch M3 2023.jpg', 45000000, 'delivered', '09/15/24 03:27:28 PM', '09/15/24 03:42:00 PM'),
(201, 55, 'nguyen ', '0204696053', 'Đh thăng long 3', 'MacBook Air M3 15 inch', 1, 'MacBook Air M3 15 inch.jpg', 32500000, 'canceled', '09/15/24 03:39:49 PM', '09/15/24 03:40:00 PM'),
(202, 55, 'nguyen 3', '0309026115', 'Đh thăng long 3', 'MacBook Air M2 2022', 1, 'MacBook Air M2 2022.jpg', 27525000, 'delivered', '09/15/24 03:40:36 PM', '09/15/24 03:42:04 PM'),
(203, 55, 'Nguyen Van A', '0941293993', 'Ha noi', 'iPhone 14 Plus 128GB', 1, 'iphone-14-plus-256gb.jpg', 22000000, 'canceled', '09/15/24 03:43:31 PM', '09/15/24 06:38:16 PM'),
(204, 24, 'Nguyễn Tuệ ', '08284278511', '66 trường chinh ', 'iPhone 14 Plus 128GB', 1, 'iphone-14-plus-256gb.jpg', 22000000, 'canceled', '09/15/24 06:01:37 PM', '09/15/24 06:01:54 PM'),
(205, 55, 'nguyen 3', '0309026115', 'Đh thăng long 3', 'MacBook Air M3 15 inch', 1, 'MacBook Air M3 15 inch.jpg', 32500000, 'canceled', '09/15/24 06:38:03 PM', '09/15/24 06:38:14 PM');

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

INSERT INTO `products` (`Product_ID`, `imgUrl`, `Product`, `Description`, `Price`, `Category`, `discount`) VALUES
(123, 'iphone14.jpg', 'iPhone 14', 'được xem là mẫu smartphone bùng nổ của nhà táo trong năm 2022, ấn tượng với ngoại hình trẻ trung, màn hình chất lượng đi kèm với những cải tiến về hệ điều hành và thuật toán xử lý hình ảnh, giúp máy trở thành cái tên thu hút được đông đảo người dùng quan tâm tại thời điểm ra mắt.', 900, 'Iphone', 0),
(126, 'iphone15128.jpg', 'Iphone 15', 'được xem là mẫu smartphone bùng nổ của nhà táo trong năm 2022, ấn tượng với ngoại hình trẻ trung, màn hình chất lượng đi kèm với những cải tiến về hệ điều hành và thuật toán xử lý hình ảnh, giúp máy trở thành cái tên thu hút được đông đảo người dùng quan tâm tại thời điểm ra mắt.', 1009, 'Iphone', 20),
(127, '15promax.jpg', 'iPhone 15pro max', 'Sản phẩm mới nhất của Apple, với nhiều tính năng tiên tiến và thiết kế đẹp mắt.', 1099, 'Iphone', 22),
(128, 'ipadair4.jpg', 'iPad Air 4', 'Bản cập nhật mới của dòng iPad Pro với màn hình lớn và hiệu suất mạnh mẽ.', 700, 'Ipad', 23),
(129, 'MacBook Pro 14 inch M3 2023.jpg', 'MacBook Pro M3 2023', 'Laptop cao cấp của Apple với chip M2 và màn hình Retina chất lượng cao.', 1800, 'Mac', 16),
(131, 'iPad Pro M2 11 inch WiFi Cellula.jpg', 'iPad Pro M2 11 inch ', 'Bản cập nhật mới của dòng iPad Pro với màn hình lớn và hiệu suất mạnh mẽ.', 1050, 'Ipad', 24),
(132, 'MacBook Air M2 2022.jpg', 'MacBook Air M2 2022', 'Laptop cao cấp của Apple với chip M2 và màn hình Retina chất lượng cao.', 1101, 'Mac', 12),
(133, 'Apple Watch Series 9 Nhôm.jpg', 'Apple Watch 9 Nhôm', 'Đồng hồ thông minh tiên tiến với nhiều tính năng sức khỏe và liên lạc.', 379, 'Watch', 28),
(134, 'AirPods 2.jpg', 'AirPods 2', 'Tai nghe không dây cao cấp với chế độ chống ồn và chất âm tuyệt vời.', 120, 'Phụ kiện', 21),
(135, 'MacBook Air M3 15 inch.jpg', 'MacBook Air M3 15 inch', 'Máy tính để bàn nhỏ gọn với hiệu suất mạnh mẽ và khả năng mở rộng linh hoạt.', 1300, 'Mac', 12),
(136, 'iPhone 12 64GB.jpg', 'iPhone 12 64GB', 'Máy tính All-in-One với màn hình lớn và hiệu suất đa nhiệm tốt.', 489, 'Iphone', 11),
(137, 'Tai Nghe Marshall Minor IV.jpg', 'Tai Nghe Marshall Minor IV', 'Loa thông minh với âm thanh chất lượng cao và tính năng trợ lý ảo Siri tích hợp.', 120, 'Phụ kiện', 20),
(138, 'Magic Keyboard with Touch ID .jpg', 'Magic Keyboard', 'Bàn phím không dây với thiết kế mỏng nhẹ và cảm biến cảm ứng.', 220, 'Phụ kiện', 15),
(139, 'Pencil 2.jpg', 'Apple Pencil 2', 'Bút cảm ứng cho iPad với khả năng nhận biết áp lực và góc nghiêng.', 111, 'Phụ kiện', 11),
(140, 'iMac M1 2021 24 inch.jpg', 'iMac M1 2021 24 inch', 'Máy tính để bàn nhỏ gọn với hiệu suất mạnh mẽ và khả năng mở rộng linh hoạt.', 1411, 'Mac', 14),
(141, 'Apple Watch Series 9.jpg', 'Apple Watch Series 9 ', 'Máy tính All-in-One với màn hình lớn và hiệu suất đa nhiệm tốt.', 1200, 'Watch', 14),
(142, 'sac.jpg', 'Cáp sạc USB-C to Lightning', 'Loa thông minh với âm thanh chất lượng cao và tính năng trợ lý ảo Siri tích hợp.', 220, 'Phụ kiện', 13),
(143, 'op.jpg', 'Ốp lưng Tiger Magnetic ', 'Bàn phím không dây với thiết kế mỏng nhẹ và cảm biến cảm ứng.', 12, 'Phụ kiện', 12),
(144, 'cuongluc.jpg', 'Cường lực Tiger HD ', 'Bút cảm ứng cho iPad với khả năng nhận biết áp lực và góc nghiêng.', 12.999, 'Phụ kiện', 13),
(145, 'iPhone SE (2022).jpg', 'iPhone SE (2022)', 'iPhone se đã qua sử dụng, có thể có một số vết trầy xước nhẹ hoặc dấu hiệu về sử dụng.', 300, 'Máy cũ', 21),
(146, '11.jpg', 'iPhone 11 64GB', 'iPhone X đã qua sử dụng, có thể có một số vết trầy xước nhỏ hoặc dấu hiệu về sử dụng.', 250, 'Máy cũ', 12),
(149, '13.jpg', 'Iphone 13', 'được xem là mẫu smartphone bùng nổ của nhà táo trong năm 2022, ấn tượng với ngoại hình trẻ trung, màn hình chất lượng đi kèm với những cải tiến về hệ điều hành và thuật toán xử lý hình ảnh, giúp máy trở thành cái tên thu hút được đông đảo người dùng quan tâm tại thời điểm ra mắt', 510, 'Iphone', 11),
(157, '14.jpg', 'iPhone 14 Pro Max 128GB', 'iPhone 14 Pro mang đến những trải nghiệm khác biệt. Dynamic Island giúp bạn dễ dàng truy cập thông tin và theo dõi các hoạt động. Camera 48MP cho độ chi tiết đáng kinh ngạc khi bạn chụp ảnh trong ProRAW. Pin ấn tượng kèm iOS 16, iPhone 14 Pro là ví dụ tốt nhất cho việc tích hợp phần cứng và phần mềm đẳng cấp thế giới của Apple.', 1500, 'Iphone', 5),
(158, 'iphone-14-plus-256gb.jpg', 'iPhone 14 Plus 128GB', 'Màn hình Super Retina XDR◊Tham khảo tuyên bố từ chối trách nhiệm pháp lý Công nghệ ProMotion Màn hình Luôn Bật', 880, 'Iphone', 0),
(159, 'iPhone164GB.jpg', 'iPhone 11 64GB', 'iPhone có thể có một số vết trầy xước nhẹ hoặc dấu hiệu về sử dụng.', 405, 'Iphone', 0),
(160, '0023004_yellow_550.jpg', 'iPad Gen 10 th', 'Màn hình Super Retina XDR◊Tham khảo tuyên bố từ chối trách nhiệm pháp lý Công nghệ ProMotion Màn hình Luôn Bật', 411, 'Ipad', 12),
(161, 'ipadm1.jpg', 'iPad Pro M1 12.9', 'Màn hình Super Retina XDR◊Tham khảo tuyên bố từ chối trách nhiệm pháp lý Công nghệ ProMotion Màn hình Luôn Bật', 1511, 'Ipad', 9),
(162, 'Apple Watch Series 7.jpg', 'Apple Watch Series 7 ', 'Màn hình Super Retina XDR◊Tham khảo tuyên bố từ chối trách nhiệm pháp lý Công nghệ ProMotion Màn hình Luôn Bật', 350, 'Watch', 12),
(163, 'AppleWatchSE2023.jpg', 'Apple Watch SE 2023 GPS', 'Màn hình Super Retina XDR◊Tham khảo tuyên bố từ chối trách nhiệm pháp lý Công nghệ ProMotion Màn hình Luôn Bật', 344, 'Watch', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `review_content` text NOT NULL,
  `rating` int(1) NOT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `created_at` datetime DEFAULT current_timestamp(),
  `has_rated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`review_id`, `product_id`, `customer_id`, `review_content`, `rating`, `created_at`, `has_rated`) VALUES
(3, 127, 24, 'aa', 3, '2024-05-29 21:40:33', 0),
(4, 127, 24, 'aa', 3, '2024-05-29 21:48:00', 0),
(5, 127, 24, 'a', 4, '2024-05-29 22:44:52', 0),
(6, 127, 24, 'a', 1, '2024-05-29 22:51:59', 0),
(7, 127, 24, 'a', 4, '2024-05-30 00:01:19', 0),
(8, 127, 24, 'a', 3, '2024-05-30 00:09:00', 0),
(9, 127, 24, 'a', 3, '2024-05-30 00:35:51', 0),
(10, 126, 24, 'a', 3, '2024-05-30 00:36:07', 0),
(11, 131, 55, 'Tốt', 4, '2024-09-15 01:41:34', 1),
(12, 131, 55, 'Tốt', 4, '2024-09-15 01:51:56', 1),
(13, 131, 55, 'Tốt', 4, '2024-09-15 12:10:12', 1),
(14, 131, 55, 'Tốt', 4, '2024-09-15 14:57:54', 1),
(15, 131, 55, 'Tốt', 4, '2024-09-15 15:25:43', 1),
(16, 131, 55, 'Tốt', 4, '2024-09-15 15:40:04', 1),
(17, 131, 55, 'Tốt', 4, '2024-09-15 18:38:17', 1);

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
-- Chỉ mục cho bảng `hoithoai`
--
ALTER TABLE `hoithoai`
  ADD PRIMARY KEY (`ID_hoithoai`);

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

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `fk_product_id` (`product_id`),
  ADD KEY `fk_customer_id` (`customer_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=497;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `hoithoai`
--
ALTER TABLE `hoithoai`
  MODIFY `ID_hoithoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_review_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_review_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`Product_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
