-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th7 12, 2020 lúc 03:44 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `manage_user`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`, `email`, `isAdmin`) VALUES
(18, 'p2879465', 123, 'dinhthanhtai.xz@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recovery`
--

DROP TABLE IF EXISTS `recovery`;
CREATE TABLE IF NOT EXISTS `recovery` (
  `MaRC` int(11) DEFAULT NULL,
  `MaAd` int(11) NOT NULL,
  `Code` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ykien`
--

DROP TABLE IF EXISTS `ykien`;
CREATE TABLE IF NOT EXISTS `ykien` (
  `MaYK` int(11) NOT NULL AUTO_INCREMENT,
  `TenNYK` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `NdYK` varchar(255) NOT NULL,
  PRIMARY KEY (`MaYK`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
