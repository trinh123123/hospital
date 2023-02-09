-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2022 at 01:52 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkgd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `maadmin` int(11) NOT NULL AUTO_INCREMENT,
  `tenadmin` varchar(50) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `dienthoai` int(10) NOT NULL,
  `hinhanh` int(50) DEFAULT NULL,
  `mataikhoan` int(11) NOT NULL,
  PRIMARY KEY (`maadmin`),
  KEY `admin_ibfk_1` (`mataikhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`maadmin`, `tenadmin`, `diachi`, `dienthoai`, `hinhanh`, `mataikhoan`) VALUES
(1, 'Admin gia đình', 'HCM', 93555544, NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `bacsi`
--

DROP TABLE IF EXISTS `bacsi`;
CREATE TABLE IF NOT EXISTS `bacsi` (
  `hinhanh` varchar(50) DEFAULT 'NULL.jpg',
  `mabacsi` int(11) NOT NULL AUTO_INCREMENT,
  `tenbacsi` varchar(50) NOT NULL,
  `chuyenmon` varchar(20) NOT NULL,
  `mataikhoan` int(11) NOT NULL,
  `qrcode` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`mabacsi`),
  UNIQUE KEY `mabacsi` (`mabacsi`),
  KEY `bacsi_ibfk_1` (`mataikhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bacsi`
--

INSERT INTO `bacsi` (`hinhanh`, `mabacsi`, `tenbacsi`, `chuyenmon`, `mataikhoan`, `qrcode`) VALUES
('anh-bac-si-2.jpg', 1, 'Nguyễn Văn Ab', 'Tim Mạch', 1, ''),
('anh1.jpg', 2, 'Nguyễn Văn A', 'Tim Mạch', 2, ''),
('anh1.jpg', 3, 'Phạm Văn B', 'Thần Kinh', 4, ''),
('1339156726.png', 11, 'Huy Hoàng Ab', 'Tim Mạch', 31, '1670174533.png');

-- --------------------------------------------------------

--
-- Table structure for table `benhnhan`
--

DROP TABLE IF EXISTS `benhnhan`;
CREATE TABLE IF NOT EXISTS `benhnhan` (
  `tenbenhnhan` varchar(50) NOT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `sodienthoai` int(10) DEFAULT NULL,
  `hinhanh` varchar(200) DEFAULT 'NULL.jpg',
  `mahogiadinh` int(11) DEFAULT NULL,
  `mataikhoan` int(1) NOT NULL,
  `mabenhnhan` int(11) NOT NULL AUTO_INCREMENT,
  `qrcode` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`mabenhnhan`),
  KEY `mahogiadinh` (`mahogiadinh`),
  KEY `mataikhoan` (`mataikhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `benhnhan`
--

INSERT INTO `benhnhan` (`tenbenhnhan`, `diachi`, `sodienthoai`, `hinhanh`, `mahogiadinh`, `mataikhoan`, `mabenhnhan`, `qrcode`) VALUES
('Thanh Tri', 'HCM', 398318441, '550717684.jpg', 23, 0, 1, '1666540872.png'),
('ThanhTri 5', 'HCM', 398318441, 'NULL.jpg', 21, 7, 2, ''),
('Thanh Tri 1', 'HCM', 398318441, 'anh1.jpg', 23, 8, 3, ''),
('Huy Hoang 2', 'HCM', 398318441, 'anh1.jpg', 1, 9, 4, ''),
('Thanh Tri 2', '12 NVB', 398318551, 'anh1.jpg', 22, 13, 5, '1666540872.png'),
('Thanh Tri 3', '12 NVB', 398318551, 'client.jpg', NULL, 14, 6, ''),
('Hoàng Huy', NULL, NULL, 'https://lh3.googleusercontent.com/a/ALm5wu2bPXROEtAmBgDjxz3r-6hfRzJMiOvMngfJH-vT=s96-c', NULL, 20, 8, NULL),
('Huy Hoàng', NULL, NULL, 'http://graph.facebook.com/879002936841905/picture', NULL, 21, 9, NULL),
('Dương Nguyễn Huy Hoàng', '12 NVB', 913121415, 'NULL.jpg', NULL, 22, 10, '1670160403.png'),
('Huy Hoàng Ab', '12 NVB', 989034572, 'anh1.jpg', NULL, 23, 11, '1670165703.png');

-- --------------------------------------------------------

--
-- Table structure for table `cakham`
--

DROP TABLE IF EXISTS `cakham`;
CREATE TABLE IF NOT EXISTS `cakham` (
  `macakham` int(11) NOT NULL AUTO_INCREMENT,
  `thoigianbatdau` time NOT NULL,
  `thoigiankethuc` time NOT NULL,
  PRIMARY KEY (`macakham`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cakham`
--

INSERT INTO `cakham` (`macakham`, `thoigianbatdau`, `thoigiankethuc`) VALUES
(1, '07:00:00', '07:50:00'),
(2, '08:00:00', '08:50:00'),
(3, '09:00:00', '09:50:00'),
(4, '10:00:00', '10:50:00'),
(5, '13:00:00', '15:00:00'),
(6, '15:00:00', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `chatid` int(11) NOT NULL AUTO_INCREMENT,
  `sender_userid` int(11) NOT NULL,
  `reciever_userid` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`chatid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatid`, `sender_userid`, `reciever_userid`, `message`, `timestamp`, `status`) VALUES
(1, 3, 1, 'x', '2022-10-02 17:56:02', 0),
(2, 1, 3, 's', '2022-10-02 18:14:28', 0),
(3, 1, 2, '2', '2022-10-02 22:28:46', 1),
(4, 1, 2, '3', '2022-10-02 22:28:49', 1),
(5, 1, 2, '5', '2022-10-02 22:28:58', 1),
(6, 1, 2, '6', '2022-10-02 22:29:02', 1),
(7, 1, 2, '12', '2022-10-02 22:29:10', 1),
(8, 3, 1, 'uh', '2022-10-02 22:32:21', 1),
(9, 3, 2, 'hi', '2022-10-02 22:32:33', 0),
(10, 2, 3, 'oh', '2022-10-02 22:32:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat_login_details`
--

DROP TABLE IF EXISTS `chat_login_details`;
CREATE TABLE IF NOT EXISTS `chat_login_details` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_typing` enum('no','yes') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_login_details`
--

INSERT INTO `chat_login_details` (`id`, `userid`, `last_activity`, `is_typing`) VALUES
(0, 3, '2022-10-02 17:47:41', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `chat_users`
--

DROP TABLE IF EXISTS `chat_users`;
CREATE TABLE IF NOT EXISTS `chat_users` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `current_session` int(11) NOT NULL,
  `online` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_users`
--

INSERT INTO `chat_users` (`userid`, `username`, `password`, `avatar`, `current_session`, `online`) VALUES
(1, 'benhnhan', '123', 'user1.jpg', 2, 1),
(2, 'bacsi', '123', 'user2.jpg', 3, 1),
(3, 'bacsi1', '123', 'user3.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `donthuoc`
--

DROP TABLE IF EXISTS `donthuoc`;
CREATE TABLE IF NOT EXISTS `donthuoc` (
  `madonthuoc` int(11) NOT NULL AUTO_INCREMENT,
  `tendonthuoc` varchar(225) DEFAULT NULL,
  `ghichu` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`madonthuoc`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donthuoc`
--

INSERT INTO `donthuoc` (`madonthuoc`, `tendonthuoc`, `ghichu`) VALUES
(1, 'Sổ mũi', NULL),
(2, 'Ho', NULL),
(3, 'Nhứt đầu', NULL),
(4, 'Cảm ', NULL),
(5, 'Chống mặt', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donthuoc_thuoc`
--

DROP TABLE IF EXISTS `donthuoc_thuoc`;
CREATE TABLE IF NOT EXISTS `donthuoc_thuoc` (
  `madonthuoc` int(11) NOT NULL,
  `mathuoc` int(11) NOT NULL,
  `donvi` varchar(50) NOT NULL,
  `soluong` int(3) NOT NULL,
  `cachdung` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`madonthuoc`,`mathuoc`),
  KEY `mathuoc` (`mathuoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donthuoc_thuoc`
--

INSERT INTO `donthuoc_thuoc` (`madonthuoc`, `mathuoc`, `donvi`, `soluong`, `cachdung`) VALUES
(1, 1, 'Viên', 12, 'Ngày uống 12 viên'),
(1, 2, 'Viên', 12, 'Ngày uống 12 viên'),
(1, 3, 'Viên', 12, 'Ngày uống 12 viên');

-- --------------------------------------------------------

--
-- Table structure for table `hogiadinh`
--

DROP TABLE IF EXISTS `hogiadinh`;
CREATE TABLE IF NOT EXISTS `hogiadinh` (
  `mahogiadinh` int(11) NOT NULL AUTO_INCREMENT,
  `tenhogiadinh` varchar(50) NOT NULL,
  `diachi` varchar(150) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `quyenchuho` int(11) DEFAULT NULL,
  `mabacsi` int(11) NOT NULL,
  PRIMARY KEY (`mahogiadinh`),
  KEY `mabacsi` (`mabacsi`),
  KEY `hogiadinh_ibfk_2` (`quyenchuho`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hogiadinh`
--

INSERT INTO `hogiadinh` (`mahogiadinh`, `tenhogiadinh`, `diachi`, `trangthai`, `quyenchuho`, `mabacsi`) VALUES
(1, 'Phạm Văn A', 'Khu phố 8, thị trấn Bến Lức, Long An', 1, 4, 1),
(2, 'Nguyễn Văn A', 'Khu phố 9 , thị trấn Bến Lức, Long An', 0, NULL, 2),
(3, 'Đoàn Văn A', 'Khu phố 7 , thị trấn Bến Lức, Long An', 0, NULL, 3),
(4, 'Đoàn Văn B', 'Khu phố 7 , thị trấn Bến Lức, Long An', 0, NULL, 3),
(5, 'Dương Văn A', 'Khu phố 7, thị trấn bến lức', 0, NULL, 1),
(6, 'Phan Nguyễn', 'Bến Lức, Long An', 0, NULL, 1),
(21, 'Phan Nguyễn Aa', 'Bến Lức 1, Long An', 0, NULL, 1),
(22, 'Phan Nguyễn Aagf', 'Bến Lức 1, Long An', 0, NULL, 1),
(23, 'Phan Nguyễn Abffggggggggggg', 'Bến Lức 1, Long An', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hosokhambenh`
--

DROP TABLE IF EXISTS `hosokhambenh`;
CREATE TABLE IF NOT EXISTS `hosokhambenh` (
  `mahoso` int(11) NOT NULL AUTO_INCREMENT,
  `madonthuoc` int(11) DEFAULT NULL,
  `mabacsi` int(11) DEFAULT NULL,
  `mabenhnhan` int(11) DEFAULT NULL,
  `chandoan` varchar(150) DEFAULT NULL,
  `malichkham` int(11) DEFAULT NULL,
  PRIMARY KEY (`mahoso`),
  KEY `madonthuoc` (`madonthuoc`),
  KEY `mabacsi` (`mabacsi`),
  KEY `mabenhnhan` (`mabenhnhan`),
  KEY `hosokhambenh_ibfk_5` (`malichkham`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hosokhambenh`
--

INSERT INTO `hosokhambenh` (`mahoso`, `madonthuoc`, `mabacsi`, `mabenhnhan`, `chandoan`, `malichkham`) VALUES
(1, NULL, NULL, 1, NULL, 81),
(2, NULL, NULL, 9, NULL, NULL),
(3, NULL, NULL, 2, NULL, NULL),
(4, NULL, NULL, 8, NULL, NULL),
(5, NULL, NULL, 1, NULL, 88),
(6, NULL, NULL, 2, NULL, NULL),
(7, NULL, NULL, 9, NULL, NULL),
(8, NULL, NULL, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kehoachdieutri`
--

DROP TABLE IF EXISTS `kehoachdieutri`;
CREATE TABLE IF NOT EXISTS `kehoachdieutri` (
  `makehoach` int(11) NOT NULL AUTO_INCREMENT,
  `tenkehoach` varchar(50) NOT NULL,
  `thoigianbatdau` date NOT NULL,
  `thoigianketthuc` date NOT NULL,
  `ghichu` varchar(200) NOT NULL,
  `tinhtrangbandau` varchar(200) NOT NULL,
  `mucdichdatduoc` varchar(200) NOT NULL,
  `maloaiyeucau` int(11) NOT NULL,
  `tenbenh` varchar(50) DEFAULT NULL,
  `noidungthuchien` varchar(200) NOT NULL,
  `mahosokhamb` int(11) NOT NULL,
  PRIMARY KEY (`makehoach`),
  KEY `maloaiyeucau` (`maloaiyeucau`),
  KEY `mahosokhamb` (`mahosokhamb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ketquadieutri`
--

DROP TABLE IF EXISTS `ketquadieutri`;
CREATE TABLE IF NOT EXISTS `ketquadieutri` (
  `matiendo` int(11) NOT NULL AUTO_INCREMENT,
  `noidung` varchar(50) NOT NULL,
  `makehoachdieutri` int(11) NOT NULL,
  `giaidoan` varchar(50) NOT NULL,
  PRIMARY KEY (`matiendo`),
  KEY `makehoachdieutri` (`makehoachdieutri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lichkham`
--

DROP TABLE IF EXISTS `lichkham`;
CREATE TABLE IF NOT EXISTS `lichkham` (
  `malichkham` int(11) NOT NULL AUTO_INCREMENT,
  `ngaykham` date NOT NULL,
  `mabacsi` int(11) DEFAULT NULL,
  `mabenhnhan` int(11) DEFAULT NULL,
  `mahogiadinh` int(11) DEFAULT NULL,
  `chandoan` varchar(225) DEFAULT NULL,
  `madonthuoc` int(11) DEFAULT NULL,
  `macakham` int(11) NOT NULL,
  `manoikham` int(11) DEFAULT NULL,
  PRIMARY KEY (`malichkham`),
  KEY `mabacsi` (`mabacsi`),
  KEY `mabenhnhan` (`mabenhnhan`),
  KEY `mahogiadinh` (`mahogiadinh`),
  KEY `macakham` (`macakham`),
  KEY `manoikham` (`manoikham`),
  KEY `lichkham_ibfk_7` (`madonthuoc`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lichkham`
--

INSERT INTO `lichkham` (`malichkham`, `ngaykham`, `mabacsi`, `mabenhnhan`, `mahogiadinh`, `chandoan`, `madonthuoc`, `macakham`, `manoikham`) VALUES
(81, '2022-11-01', 1, 1, NULL, NULL, NULL, 2, 1),
(83, '2022-11-03', 1, 2, NULL, NULL, NULL, 2, 2),
(84, '2022-11-03', 1, 8, NULL, NULL, NULL, 3, NULL),
(86, '2022-11-02', 1, 9, NULL, NULL, NULL, 3, NULL),
(88, '2022-11-02', 1, 1, NULL, NULL, NULL, 1, 1),
(89, '2022-11-04', 1, 3, NULL, NULL, NULL, 1, 1),
(100, '2022-11-01', 1, 1, NULL, NULL, NULL, 1, 1),
(101, '2022-11-03', 1, NULL, NULL, NULL, NULL, 1, NULL),
(102, '2022-11-16', 1, 1, NULL, NULL, NULL, 3, 1),
(103, '2022-11-16', 1, 1, NULL, NULL, NULL, 2, 1),
(104, '2022-11-30', 1, 1, NULL, NULL, NULL, 1, 1),
(105, '2022-11-30', 1, 1, NULL, NULL, NULL, 2, 1),
(106, '2022-11-30', 1, NULL, NULL, NULL, NULL, 3, NULL),
(107, '2022-12-15', 1, NULL, NULL, NULL, NULL, 1, NULL),
(108, '2022-12-09', 1, NULL, NULL, NULL, NULL, 1, NULL),
(109, '2022-12-09', 1, NULL, NULL, NULL, NULL, 2, NULL),
(110, '2022-12-09', 2, 1, NULL, NULL, NULL, 1, 1),
(111, '2022-12-09', 2, NULL, NULL, NULL, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loaiyeucau`
--

DROP TABLE IF EXISTS `loaiyeucau`;
CREATE TABLE IF NOT EXISTS `loaiyeucau` (
  `maloaiyeucau` int(11) NOT NULL AUTO_INCREMENT,
  `tenyeucau` varchar(50) NOT NULL,
  PRIMARY KEY (`maloaiyeucau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `noikham`
--

DROP TABLE IF EXISTS `noikham`;
CREATE TABLE IF NOT EXISTS `noikham` (
  `manoikham` int(11) NOT NULL AUTO_INCREMENT,
  `diadiem` varchar(100) NOT NULL,
  PRIMARY KEY (`manoikham`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `noikham`
--

INSERT INTO `noikham` (`manoikham`, `diadiem`) VALUES
(1, 'A01'),
(2, 'A02'),
(3, 'B01'),
(4, 'B02'),
(5, 'B03');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `mataikhoan` int(11) NOT NULL AUTO_INCREMENT,
  `tendangnhap` varchar(20) NOT NULL,
  `matkhau` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `quyen` int(1) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `id_fb` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`mataikhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`mataikhoan`, `tendangnhap`, `matkhau`, `quyen`, `email`, `id_fb`) VALUES
(0, 'benhnhan22', '202cb962ac59075b964b07152d234b70', 0, 'huyhoangq13a4@gmail.com', NULL),
(1, 'bacsi', '202cb962ac59075b964b07152d234b70', 1, NULL, NULL),
(2, 'bacsi1', '827ccb0eea8a706c4c34a16891f84e7b', 1, NULL, NULL),
(3, 'bacsi2', '827ccb0eea8a706c4c34a16891f84e7b', 1, NULL, NULL),
(4, 'bacsi3', '827ccb0eea8a706c4c34a16891f84e7b', 1, NULL, NULL),
(5, 'bacsi4', '202cb962ac59075b964b07152d234b70', 1, NULL, NULL),
(6, 'benhnhan2567', '827ccb0eea8a706c4c34a16891f84e7b', 0, NULL, NULL),
(7, 'benhnhan1', '827ccb0eea8a706c4c34a16891f84e7b', 0, NULL, NULL),
(8, 'benhnhan3', '827ccb0eea8a706c4c34a16891f84e7b', 0, NULL, NULL),
(9, 'benhnhan4', '827ccb0eea8a706c4c34a16891f84e7b', 0, NULL, NULL),
(10, 'benhnhan5', '827ccb0eea8a706c4c34a16891f84e7b', 0, NULL, NULL),
(11, 'taikhoan1', '827ccb0eea8a706c4c34a16891f84e7b ', 0, NULL, NULL),
(12, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 2, NULL, NULL),
(13, 'benhnhan13', '827ccb0eea8a706c4c34a16891f84e7b', 0, NULL, NULL),
(14, 'benhnhan14', '827ccb0eea8a706c4c34a16891f84e7b', 0, NULL, NULL),
(20, 'Hoàng Huy', NULL, 0, 'huyhoanghuyhoang1309@gmail.com', NULL),
(21, 'Huy Hoàng', NULL, 0, NULL, '879002936841905'),
(22, 'huyhoang', '202cb962ac59075b964b07152d234b70', 0, 'huyhoang1@gmail.com', NULL),
(23, 'benhnhan23', '80f8bf07961590b8fe7d43a3a640f141', 0, 'phongkhamgiadinh123@gmail.com', NULL),
(31, 'bshoang', '80f8bf07961590b8fe7d43a3a640f141', 1, 'huyhoangq1z34@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thuoc`
--

DROP TABLE IF EXISTS `thuoc`;
CREATE TABLE IF NOT EXISTS `thuoc` (
  `mathuoc` int(11) NOT NULL AUTO_INCREMENT,
  `tenthuoc` varchar(50) NOT NULL,
  `thongtinthuoc` varchar(200) NOT NULL,
  PRIMARY KEY (`mathuoc`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuoc`
--

INSERT INTO `thuoc` (`mathuoc`, `tenthuoc`, `thongtinthuoc`) VALUES
(1, 'Memantine', ''),
(2, 'Levothyroxine', ''),
(3, 'Donepezil', ''),
(4, 'Zolpidem', ''),
(5, 'Tiotropium', '');

-- --------------------------------------------------------

--
-- Table structure for table `tuvan`
--

DROP TABLE IF EXISTS `tuvan`;
CREATE TABLE IF NOT EXISTS `tuvan` (
  `matuvan` int(11) NOT NULL AUTO_INCREMENT,
  `mabenhnhan` int(11) DEFAULT NULL,
  `mabacsi` int(11) DEFAULT NULL,
  `tieude` varchar(100) NOT NULL,
  `cauhoi` varchar(100) NOT NULL,
  `cautraloi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`matuvan`),
  KEY `mabenhnhan` (`mabenhnhan`),
  KEY `mabacsi` (`mabacsi`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tuvan`
--

INSERT INTO `tuvan` (`matuvan`, `mabenhnhan`, `mabacsi`, `tieude`, `cauhoi`, `cautraloi`) VALUES
(1, 2, 2, 'dffs', 'dsfsd', 'asv'),
(3, 5, NULL, 'aa', 'aa', ''),
(4, 5, NULL, 'ABC', 'ABCD', ''),
(14, 2, NULL, 'ád', 'ádas', ''),
(8, 2, NULL, 'xzczx', 'édf', ''),
(15, 3, NULL, 'benhnhan13', 'ABC', 'ttttt'),
(10, 3, 1, 'xzczx', 'ssssss', 'ádasddfdfwwwwwwwwww'),
(11, 4, 4, 'xzczx1', '123', 'dfdafsdfsdf'),
(12, 6, 1, '12345', 'Số', 'dfvf'),
(16, 6, 1, 'benhnhan14', 'ABC', 'sdsds'),
(17, 6, 1, 'ssssssssad', 'saaaaadas', 'adsfadf'),
(18, 7, NULL, 'xxxxxxxxxxxxxxxxxxxf', 'dedddddddd', NULL),
(19, 7, NULL, 'Alo', 'kokokokoko', NULL),
(27, 1, 1, 'wwwwwwwww', 'wwwwwwwww', 'ttt'),
(24, 1, NULL, 'ádas', 'ádasd', NULL),
(28, 1, 1, 'dddđ', 'dddđ', 'adad');

-- --------------------------------------------------------

--
-- Table structure for table `yeucautuvan`
--

DROP TABLE IF EXISTS `yeucautuvan`;
CREATE TABLE IF NOT EXISTS `yeucautuvan` (
  `mayeucau` int(11) NOT NULL AUTO_INCREMENT,
  `mabenhnhan` int(11) NOT NULL,
  `mabacsi` int(11) NOT NULL,
  `maloaiyeucau` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `noidung` int(11) NOT NULL,
  `mahogiadinh` int(11) DEFAULT NULL,
  `mahoso` int(11) NOT NULL,
  PRIMARY KEY (`mayeucau`),
  KEY `mabenhnhan` (`mabenhnhan`),
  KEY `loaiyeucau` (`maloaiyeucau`),
  KEY `mabacsi` (`mabacsi`),
  KEY `mahogiadinh` (`mahogiadinh`),
  KEY `mahoso` (`mahoso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bacsi`
--
ALTER TABLE `bacsi`
  ADD CONSTRAINT `bacsi_ibfk_1` FOREIGN KEY (`mataikhoan`) REFERENCES `taikhoan` (`mataikhoan`);

--
-- Constraints for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD CONSTRAINT `benhnhan_ibfk_2` FOREIGN KEY (`mahogiadinh`) REFERENCES `hogiadinh` (`mahogiadinh`),
  ADD CONSTRAINT `benhnhan_ibfk_4` FOREIGN KEY (`mataikhoan`) REFERENCES `taikhoan` (`mataikhoan`);

--
-- Constraints for table `donthuoc_thuoc`
--
ALTER TABLE `donthuoc_thuoc`
  ADD CONSTRAINT `donthuoc_thuoc_ibfk_1` FOREIGN KEY (`madonthuoc`) REFERENCES `donthuoc` (`madonthuoc`),
  ADD CONSTRAINT `donthuoc_thuoc_ibfk_2` FOREIGN KEY (`mathuoc`) REFERENCES `thuoc` (`mathuoc`);

--
-- Constraints for table `hogiadinh`
--
ALTER TABLE `hogiadinh`
  ADD CONSTRAINT `hogiadinh_ibfk_1` FOREIGN KEY (`mabacsi`) REFERENCES `bacsi` (`mabacsi`),
  ADD CONSTRAINT `hogiadinh_ibfk_2` FOREIGN KEY (`quyenchuho`) REFERENCES `benhnhan` (`mabenhnhan`);

--
-- Constraints for table `hosokhambenh`
--
ALTER TABLE `hosokhambenh`
  ADD CONSTRAINT `hosokhambenh_ibfk_2` FOREIGN KEY (`madonthuoc`) REFERENCES `donthuoc` (`madonthuoc`),
  ADD CONSTRAINT `hosokhambenh_ibfk_3` FOREIGN KEY (`mabacsi`) REFERENCES `bacsi` (`mabacsi`),
  ADD CONSTRAINT `hosokhambenh_ibfk_4` FOREIGN KEY (`mabenhnhan`) REFERENCES `benhnhan` (`mabenhnhan`),
  ADD CONSTRAINT `hosokhambenh_ibfk_5` FOREIGN KEY (`malichkham`) REFERENCES `lichkham` (`malichkham`);

--
-- Constraints for table `kehoachdieutri`
--
ALTER TABLE `kehoachdieutri`
  ADD CONSTRAINT `kehoachdieutri_ibfk_1` FOREIGN KEY (`maloaiyeucau`) REFERENCES `loaiyeucau` (`maloaiyeucau`),
  ADD CONSTRAINT `kehoachdieutri_ibfk_2` FOREIGN KEY (`mahosokhamb`) REFERENCES `hosokhambenh` (`mahoso`);

--
-- Constraints for table `ketquadieutri`
--
ALTER TABLE `ketquadieutri`
  ADD CONSTRAINT `ketquadieutri_ibfk_1` FOREIGN KEY (`makehoachdieutri`) REFERENCES `kehoachdieutri` (`makehoach`);

--
-- Constraints for table `lichkham`
--
ALTER TABLE `lichkham`
  ADD CONSTRAINT `lichkham_ibfk_1` FOREIGN KEY (`mabacsi`) REFERENCES `bacsi` (`mabacsi`),
  ADD CONSTRAINT `lichkham_ibfk_3` FOREIGN KEY (`mahogiadinh`) REFERENCES `hogiadinh` (`mahogiadinh`),
  ADD CONSTRAINT `lichkham_ibfk_4` FOREIGN KEY (`mabenhnhan`) REFERENCES `benhnhan` (`mabenhnhan`),
  ADD CONSTRAINT `lichkham_ibfk_5` FOREIGN KEY (`macakham`) REFERENCES `cakham` (`macakham`),
  ADD CONSTRAINT `lichkham_ibfk_6` FOREIGN KEY (`manoikham`) REFERENCES `noikham` (`manoikham`),
  ADD CONSTRAINT `lichkham_ibfk_7` FOREIGN KEY (`madonthuoc`) REFERENCES `donthuoc` (`madonthuoc`);

--
-- Constraints for table `yeucautuvan`
--
ALTER TABLE `yeucautuvan`
  ADD CONSTRAINT `yeucautuvan_ibfk_2` FOREIGN KEY (`mahogiadinh`) REFERENCES `hogiadinh` (`mahogiadinh`),
  ADD CONSTRAINT `yeucautuvan_ibfk_3` FOREIGN KEY (`maloaiyeucau`) REFERENCES `loaiyeucau` (`maloaiyeucau`),
  ADD CONSTRAINT `yeucautuvan_ibfk_4` FOREIGN KEY (`mabacsi`) REFERENCES `bacsi` (`mabacsi`),
  ADD CONSTRAINT `yeucautuvan_ibfk_5` FOREIGN KEY (`mahogiadinh`) REFERENCES `hogiadinh` (`mahogiadinh`),
  ADD CONSTRAINT `yeucautuvan_ibfk_6` FOREIGN KEY (`mahoso`) REFERENCES `hosokhambenh` (`mahoso`),
  ADD CONSTRAINT `yeucautuvan_ibfk_7` FOREIGN KEY (`mabenhnhan`) REFERENCES `benhnhan` (`mabenhnhan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
