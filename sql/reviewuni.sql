-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 17, 2020 lúc 07:51 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `reviewuni`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctblbl`
--

CREATE TABLE `ctblbl` (
  `MaBLT` int(11) NOT NULL,
  `MaNBL` int(11) NOT NULL,
  `NdBL` varchar(1024) DEFAULT NULL,
  `MaBC` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ctblbl`
--

INSERT INTO `ctblbl` (`MaBLT`, `MaNBL`, `NdBL`, `MaBC`) VALUES
(42, 124, 'k', 1),
(52, 135, 's', 0),
(52, 136, 's', 0),
(52, 137, 's', 0),
(52, 138, 's', 0),
(53, 140, 'd', 0),
(60, 148, 'ádádsa', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctblt`
--

CREATE TABLE `ctblt` (
  `MaBLT` int(11) NOT NULL,
  `MaTr` varchar(50) NOT NULL,
  `MaNBL` int(11) NOT NULL,
  `NdBL` varchar(1024) DEFAULT NULL,
  `Sao` int(11) DEFAULT NULL,
  `ThoiGian` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ctblt`
--

INSERT INTO `ctblt` (`MaBLT`, `MaTr`, `MaNBL`, `NdBL`, `Sao`, `ThoiGian`) VALUES
(23, 'QSC', 104, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia sapiente minus temporibus, consequatur architecto quidem a, nihil numquam eum consequuntur facilis earum quo ipsum ratione totam blanditiis odio aliquam laborum.', 3, '2020-07-17'),
(22, 'QSC', 103, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia sapiente minus temporibus, consequatur architecto quidem a, nihil numquam eum consequuntur facilis earum quo ipsum ratione totam blanditiis odio aliquam laborum.', 3, '2020-07-17'),
(24, 'QSC', 105, 'ananh', 3, '2020-07-17'),
(25, 'SPK', 106, 'hay', 3, '2020-07-17'),
(26, 'SPK', 107, 'sdd', 3, '2020-07-17'),
(27, 'QSB', 108, 'ass', 5, '2020-07-17'),
(28, 'QSB', 109, 's', 5, '2020-07-17'),
(29, 'QST', 110, 's', 4, '2020-07-17'),
(30, 'QST', 111, 's', 2, '2020-07-17'),
(31, 'QST', 112, 'hay', 3, '2020-07-17'),
(32, 'QSC', 113, 'trường xinh', 5, '2020-07-17'),
(33, 'QSB', 114, 'ạkshđsad', 5, '2020-07-17'),
(34, 'QSB', 115, 'dss', 5, '2020-07-17'),
(35, 'QSC', 116, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia sapiente minus temporibus, consequatur architecto quidem a, nihil numquam eum consequuntur facilis earum quo ipsum ratione totam blanditiis odio aliquam laborum.', 4, '2020-07-17'),
(36, 'QST', 117, 'dd', 2, '2020-07-17'),
(37, 'QST', 118, 'dd', 2, '2020-07-17'),
(38, 'QSC', 119, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia sapiente minus temporibus, consequatur architecto quidem a, nihil numquam eum consequuntur facilis earum quo ipsum ratione totam blanditiis odio aliquam laborum.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia sapiente minus temporibus, consequatur architecto quidem a, nihil numquam eum consequuntur facilis earum quo ipsum ratione totam blanditiis odio aliquam laborum.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia sapiente minus temporibus, consequatur architecto quidem a, nihil numquam eum consequuntur facilis earum quo ipsum ratione totam blanditiis odio aliquam laborum.', 5, '2020-07-17'),
(39, 'QSB', 120, 'công nghệ', 3, '2020-07-17'),
(40, 'QSB', 121, 'công nghệ thông tin', 3, '2020-07-17'),
(41, 'QSC', 122, 'ds', 3, '2020-07-17'),
(42, 'QSC', 123, 'dsss', 3, '2020-07-17'),
(43, 'QSB', 125, 'd', 3, '2020-07-17'),
(44, 'QSB', 126, 'd', 3, '2020-07-17'),
(45, 'QSB', 127, 'd', 3, '2020-07-17'),
(46, 'QSB', 128, 'd', 3, '2020-07-17'),
(47, 'QSB', 129, 'd', 3, '2020-07-17'),
(48, 'QSB', 130, 'd', 3, '2020-07-17'),
(49, 'QSB', 131, 'as', 3, '2020-07-17'),
(50, 'QSB', 132, 's', 3, '2020-07-17'),
(51, 'QSB', 133, 'd', 3, '2020-07-17'),
(52, 'QSB', 134, 'ds', 3, '2020-07-17'),
(53, 'SPK', 139, 's', 3, '2020-07-17'),
(54, 'SPK', 141, 'dd', 2, '2020-07-17'),
(55, 'QSC', 142, 'hay', 5, '2020-07-17'),
(56, 'QST', 143, 'a', 1, '2020-07-17'),
(57, 'SPK', 144, 'q', 4, '2020-07-17'),
(58, 'SPK', 145, 'sđ', 1, '2020-07-17'),
(59, 'SPK', 146, 'dss', 1, '2020-07-17'),
(60, 'SPK', 147, 'áđá', 1, '2020-07-17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoibl`
--

CREATE TABLE `nguoibl` (
  `MaNBL` int(11) NOT NULL,
  `TenNBL` varchar(255) DEFAULT NULL,
  `ChucVu` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nguoibl`
--

INSERT INTO `nguoibl` (`MaNBL`, `TenNBL`, `ChucVu`) VALUES
(104, 'taidinh', 'member'),
(103, 'cuongdinh', 'member'),
(105, 'an', 'ana'),
(106, 'an', 'sv'),
(107, 'hgan', ''),
(108, 'as', 's'),
(109, 'sas', ''),
(110, 's', 'ás'),
(111, 's', 'a'),
(112, 'ana', 'sv'),
(113, 'hihi', 's'),
(114, 'an anh', 'sv'),
(115, 'an anh', 'sv'),
(116, 'an anh', ''),
(117, 'sc', 'sv'),
(118, 'sc', 'sv'),
(119, 's', 'sv'),
(120, '', ''),
(121, '', ''),
(122, '', ''),
(123, '', ''),
(124, '', 'nguoibl'),
(125, '', 'd'),
(126, '', 'd'),
(127, '', 'd'),
(128, '', 'd'),
(129, '', 'd'),
(130, '', 'd'),
(131, '', 'an'),
(132, 's', ''),
(133, 's', ''),
(134, 'd', 's'),
(135, '', 'nguoibl'),
(136, '', 'nguoibl'),
(137, '', 'nguoibl'),
(138, '', 'nguoibl'),
(139, '', ''),
(140, '', 'nguoibl'),
(141, '', 'ás'),
(142, 'a', 'sv'),
(143, '', ''),
(144, 'ư', 'ư'),
(145, 'sd', ''),
(146, '', ''),
(147, 'sađs', 'adsads'),
(148, '', 'nguoibl');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truong`
--

CREATE TABLE `truong` (
  `MaTr` varchar(50) NOT NULL,
  `TenTr` varchar(255) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `Logo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `truong`
--

INSERT INTO `truong` (`MaTr`, `TenTr`, `DiaChi`, `Logo`) VALUES
('QSB', 'Đại học Bách Khoa  - Đại học Quốc gia TP HCM', '268 Lý Thường Kiệt, Phường 14, Quận 10, Hồ Chí Minh', 'images/img7.png'),
('QSC', 'Đại học Công nghệ thông tin  - Đại học Quốc gia TP HCM', '227 Đ. Nguyễn Văn Cừ, Phường 4, Quận 5, Hồ Chí Minh', 'images/img8.png'),
('QST', 'Đại học Khoa Học Tự Nhiên - Đại học Quốc gia TP HCM', 'Khu phố 6, PhườngLinh Trung, Quận Thủ Đức, Hồ Chí Minh', 'images/img6.png'),
('SPK', 'Đại học Sư Phạm Kỹ Thuật TP HCM', '1 Võ Văn Ngân, Linh Chiểu, Thủ Đức, Hồ Chí Minh', 'images/img9.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ctblbl`
--
ALTER TABLE `ctblbl`
  ADD PRIMARY KEY (`MaBLT`,`MaNBL`);

--
-- Chỉ mục cho bảng `ctblt`
--
ALTER TABLE `ctblt`
  ADD PRIMARY KEY (`MaBLT`);

--
-- Chỉ mục cho bảng `nguoibl`
--
ALTER TABLE `nguoibl`
  ADD PRIMARY KEY (`MaNBL`);

--
-- Chỉ mục cho bảng `truong`
--
ALTER TABLE `truong`
  ADD PRIMARY KEY (`MaTr`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ctblt`
--
ALTER TABLE `ctblt`
  MODIFY `MaBLT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `nguoibl`
--
ALTER TABLE `nguoibl`
  MODIFY `MaNBL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
