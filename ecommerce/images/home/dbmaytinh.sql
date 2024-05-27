-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 22, 2024 lúc 02:33 PM
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
  `Product` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `cususer` varchar(30) NOT NULL,
  `cuspass` varchar(30) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`name`, `address`, `cususer`, `cuspass`, `age`) VALUES
('anh', 'aaa', 'custest@gmail.com', '123456', 50),
('anh', 'aaa', 'custest@gmail.com', '123456', 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `item` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount` varchar(100) NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateOrdered` varchar(100) NOT NULL,
  `dateDelivered` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `name`, `contact`, `address`, `email`, `item`, `amount`, `status`, `dateOrdered`, `dateDelivered`) VALUES
(12, 'tuệ Nguyễn', '222', 'hh', '', '(2) test, ', '0', 'confirmed', '02/28/24 05:18:42 PM', '02/28/24 05:32:51 PM'),
(13, 'ngọc ánh', '0961912697', '55 trường chinh', '', '(1) Laptop ASUS X512 I3-1315u, ', '0', 'unconfirmed', '02/29/24 12:48:54 AM', ''),
(14, 'tuệ Nguyễn', '0961912697', '55 trường chinh', 'dungx@gmail.com', '', '0', 'delivered', '02/29/24 12:52:25 AM', '04/03/24 10:27:13 PM'),
(15, 'tuệ Nguyễn', '0961912697', '55 trường chinh', 'dungx@gmail.com', '', '0', 'confirmed', '02/29/24 12:54:51 AM', '02/29/24 12:55:31 AM'),
(16, 'ad ad', '0961912697', 'ad', 'tuenguyenn2706@gmail.com', '(1) Logitech G502 Hero Gaming Mouse, ', '0', 'unconfirmed', '02/29/24 12:57:30 AM', ''),
(17, 'ad Nguyễn', '0961912697', 'hh', '', '(1) Laptop ASUS X512 I3-1315u, ', '0', 'confirmed', '02/29/24 12:59:34 AM', '03/01/24 03:37:37 PM'),
(18, 'tuệ Nguyễn', '0961912697', 'hh', 'tuenguyenn2706@gmail.com', '', '0', 'unconfirmed', '02/29/24 01:00:28 AM', ''),
(19, 'ad ánh', '0961912697', '55 trường chinh', '', '', '0', 'delivered', '02/29/24 01:01:11 AM', '03/01/24 07:18:54 PM'),
(20, 'tuệ ad', '222', '55 trường chinh', 'dungx@gmail.com', '(1) Logitech G Pro Mechanical Keyboard, ', '0', 'unconfirmed', '02/29/24 01:01:55 AM', ''),
(21, 'ad ad', 'a', '55 trường chinh', 'dungx@gmail.com', '(1) Logitech G Pro Mechanical Keyboard, ', '0', 'unconfirmed', '02/29/24 01:02:15 AM', ''),
(22, 'ad ad', 'a', '55 trường chinh', 'dungx@gmail.com', '', '0', 'unconfirmed', '02/29/24 01:02:31 AM', ''),
(23, 'ad ad', 'a', '55 trường chinh', 'dungx@gmail.com', '', '0', 'unconfirmed', '02/29/24 01:04:03 AM', ''),
(24, 'ngọc Nguyễn', '0961912697', 'hh', 'dungx@gmail.com', '', '0', 'unconfirmed', '02/29/24 01:04:21 AM', ''),
(25, 'tuệ Nguyễn', '0961912697', '55 trường chinh', 'dungx@gmail.com', '(1) HyperX Cloud II Gaming Headset, (1) Laptop ASUS X512 I3-1315u, ', '0', 'delivered', '03/01/24 03:44:33 PM', '03/01/24 09:10:58 PM'),
(26, 'â d', 'a', 'a', 'a@gm', '', '0', 'unconfirmed', '04/15/24 10:59:43 PM', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `imgUrl` text NOT NULL,
  `Product` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Price` double NOT NULL,
  `Category` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ID`, `imgUrl`, `Product`, `Description`, `Price`, `Category`) VALUES
(123, 'iphone-14-128gb-mau-xanh-didongviet.jpg', 'Iphone 14 128g', 'được xem là mẫu smartphone bùng nổ của nhà táo trong năm 2022, ấn tượng với ngoại hình trẻ trung, màn hình chất lượng đi kèm với những cải tiến về hệ điều hành và thuật toán xử lý hình ảnh, giúp máy trở thành cái tên thu hút được đông đảo người dùng quan tâm tại thời điểm ra mắt.', 7999, 'Iphone'),
(126, 'iphone_15_didongviet.jpg', 'Iphone 15 512g', 'được xem là mẫu smartphone bùng nổ của nhà táo trong năm 2022, ấn tượng với ngoại hình trẻ trung, màn hình chất lượng đi kèm với những cải tiến về hệ điều hành và thuật toán xử lý hình ảnh, giúp máy trở thành cái tên thu hút được đông đảo người dùng quan tâm tại thời điểm ra mắt.', 9999, 'Iphone'),
(127, 'iphone-15-pro-max-.jpg', 'iPhone 15pro max', 'Sản phẩm mới nhất của Apple, với nhiều tính năng tiên tiến và thiết kế đẹp mắt.', 10999.99, 'Iphone'),
(128, '???ng_d?n_?nh_2', 'iPad Pro 2024', 'Bản cập nhật mới của dòng iPad Pro với màn hình lớn và hiệu suất mạnh mẽ.', 1299.99, 'ipad'),
(129, '???ng_d?n_?nh_3', 'MacBook Pro 2024', 'Laptop cao cấp của Apple với chip M2 và màn hình Retina chất lượng cao.', 2299.99, 'macbook'),
(130, '???ng_d?n_?nh_1', 'iPhone 16', 'Sản phẩm mới nhất của Apple, với nhiều tính năng tiên tiến và thiết kế đẹp mắt.', 10999.99, 'Iphone'),
(131, '???ng_d?n_?nh_2', 'iPad Pro 2024', 'Bản cập nhật mới của dòng iPad Pro với màn hình lớn và hiệu suất mạnh mẽ.', 1299.99, 'ipad'),
(132, '???ng_d?n_?nh_3', 'MacBook Pro 2024', 'Laptop cao cấp của Apple với chip M2 và màn hình Retina chất lượng cao.', 2299.99, 'Mac'),
(133, '???ng_d?n_?nh_4', 'Apple Watch Series 8', 'Đồng hồ thông minh tiên tiến với nhiều tính năng sức khỏe và liên lạc.', 499.99, 'Watch'),
(134, '???ng_d?n_?nh_5', 'AirPods Pro', 'Tai nghe không dây cao cấp với chế độ chống ồn và chất âm tuyệt vời.', 249.99, 'phụ kiện'),
(135, '???ng_d?n_?nh_6', 'Mac Mini', 'Máy tính để bàn nhỏ gọn với hiệu suất mạnh mẽ và khả năng mở rộng linh hoạt.', 699.99, 'mac'),
(136, '???ng_d?n_?nh_7', 'iMac 27-inch', 'Máy tính All-in-One với màn hình lớn và hiệu suất đa nhiệm tốt.', 1799.99, 'mac'),
(137, '???ng_d?n_?nh_8', 'HomePod Mini', 'Loa thông minh với âm thanh chất lượng cao và tính năng trợ lý ảo Siri tích hợp.', 99.99, 'accessories'),
(138, '???ng_d?n_?nh_9', 'Magic Keyboard', 'Bàn phím không dây với thiết kế mỏng nhẹ và cảm biến cảm ứng.', 129.99, 'accessories'),
(139, '???ng_d?n_?nh_10', 'Apple Pencil (2nd Generation)', 'Bút cảm ứng cho iPad với khả năng nhận biết áp lực và góc nghiêng.', 129.99, 'accessories'),
(140, '???ng_d?n_?nh_6', 'Mac Mini', 'Máy tính để bàn nhỏ gọn với hiệu suất mạnh mẽ và khả năng mở rộng linh hoạt.', 699.99, 'mac'),
(141, '???ng_d?n_?nh_7', 'iMac 27-inch', 'Máy tính All-in-One với màn hình lớn và hiệu suất đa nhiệm tốt.', 1799.99, 'mac'),
(142, '???ng_d?n_?nh_8', 'HomePod Mini', 'Loa thông minh với âm thanh chất lượng cao và tính năng trợ lý ảo Siri tích hợp.', 99.99, 'accessories'),
(143, '???ng_d?n_?nh_9', 'Magic Keyboard', 'Bàn phím không dây với thiết kế mỏng nhẹ và cảm biến cảm ứng.', 129.99, 'accessories'),
(144, '???ng_d?n_?nh_10', 'Apple Pencil (2nd Generation)', 'Bút cảm ứng cho iPad với khả năng nhận biết áp lực và góc nghiêng.', 129.99, 'accessories'),
(145, '???ng_d?n_?nh_8', 'iPhone 11 (Đã qua sử dụng)', 'iPhone 11 đã qua sử dụng, có thể có một số vết trầy xước nhẹ hoặc dấu hiệu về sử dụng.', 399.99, 'iPhone'),
(146, '???ng_d?n_?nh_9', 'iPhone X (Đã qua sử dụng)', 'iPhone X đã qua sử dụng, có thể có một số vết trầy xước nhỏ hoặc dấu hiệu về sử dụng.', 299.99, 'iPhone'),
(147, '???ng_d?n_?nh_10', 'iPhone 8 (Đã qua sử dụng)', 'iPhone 8 đã qua sử dụng, có thể có một số vết trầy xước nhỏ hoặc dấu hiệu về sử dụng.', 199.99, 'iPhone'),
(148, '???ng_d?n_?nh_11', 'iPhone SE (Đã qua sử dụng)', 'iPhone SE đã qua sử dụng, có thể có một số vết trầy xước nhẹ hoặc dấu hiệu về sử dụng.', 149.99, 'iPhone');

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
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
