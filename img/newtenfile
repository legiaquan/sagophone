-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2019 at 02:47 PM
-- Server version: 10.3.13-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id7508704_dbsago`
--
CREATE DATABASE IF NOT EXISTS `id7508704_dbsago` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id7508704_dbsago`;

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE `tbadmin` (
  `id_admin` varchar(255) CHARACTER SET utf8 NOT NULL,
  `hoten` varchar(255) CHARACTER SET utf8 NOT NULL,
  `matkhau` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`id_admin`, `hoten`, `matkhau`) VALUES
('hai123', 'Hải', 'e10adc3949ba59abbe56e057f20f883e'),
('quan', 'Quân', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbchitiethoadon`
--

CREATE TABLE `tbchitiethoadon` (
  `id_hoadon` varchar(255) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `gia` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbchitiethoadon`
--

INSERT INTO `tbchitiethoadon` (`id_hoadon`, `id_sanpham`, `soluong`, `gia`) VALUES
('1543859322_quanle', 7, 1, 16110000),
('1543897121_vqk123', 2, 1, 21850000),
('1543897121_vqk123', 8, 1, 4275000),
('1543914285_quan', 2, 1, 21850000),
('1543914285_quan', 7, 1, 16110000),
('1543998397_quan', 0, 2, 26497000),
('1543998397_quan', 2, 1, 21850000),
('1543998448_quan', 2, 1, 21850000),
('1543998448_quan', 7, 1, 16110000),
('1543998892_quan', 7, 1, 16110000),
('1544021237_khanh12', 0, 2, 26497000),
('1544021237_khanh12', 1, 1, 15400000),
('1544030951_khanh12', 1, 1, 15400000),
('1544030951_khanh12', 7, 2, 16110000),
('1544034742_khanh12', 0, 1, 26497000),
('1544242085_loipham300', 0, 1, 26497000),
('1544242085_loipham300', 1, 1, 15400000),
('1544242085_loipham300', 2, 1, 21850000),
('1544334563_quan', 2, 3, 21850000),
('1544335358_quan', 1, 1, 15400000),
('1544335358_quan', 2, 1, 21850000),
('1544335358_quan', 7, 1, 16110000),
('1544863658_khanh12', 1, 3, 15400000),
('1544863658_khanh12', 2, 2, 21850000),
('1544863884_khanh12', 0, 1, 26497000),
('1544863884_khanh12', 1, 1, 15400000),
('1544867821_khanh12', 0, 1, 26497000),
('1544867821_khanh12', 1, 1, 15400000),
('1544867821_khanh12', 2, 2, 21850000),
('1544867821_khanh12', 7, 3, 16110000),
('1544867821_khanh12', 11, 1, 6555000),
('1545103679_quan', 7, 1, 16110000),
('1545237427_phamthanhloi1', 1, 1, 15400000),
('1545237427_phamthanhloi1', 2, 1, 21850000),
('1545377814_phamthanhloi30', 2, 1, 21850000),
('1545378524_phamthanhloi30', 1, 2, 15400000),
('1545394519_loipham2030@gmail.com', 2, 3, 21850000),
('1545394519_loipham2030@gmail.com', 10, 1, 33250000);

-- --------------------------------------------------------

--
-- Table structure for table `tbhangdt`
--

CREATE TABLE `tbhangdt` (
  `id_hangdt` int(11) NOT NULL,
  `tenhang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbhangdt`
--

INSERT INTO `tbhangdt` (`id_hangdt`, `tenhang`) VALUES
(0, 'Apple'),
(1, 'Samsung'),
(2, 'Sony'),
(3, 'Nokia');

-- --------------------------------------------------------

--
-- Table structure for table `tbhoadon`
--

CREATE TABLE `tbhoadon` (
  `id_hoadon` varchar(255) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `ngaydat` date NOT NULL,
  `tennguoinhan` varchar(50) NOT NULL,
  `diachinguoinhan` varchar(100) NOT NULL,
  `sdtnguoinhan` int(11) NOT NULL,
  `tinhtrang` text DEFAULT NULL,
  `ghichu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbhoadon`
--

INSERT INTO `tbhoadon` (`id_hoadon`, `id_user`, `ngaydat`, `tennguoinhan`, `diachinguoinhan`, `sdtnguoinhan`, `tinhtrang`, `ghichu`) VALUES
('1543859322_quanle', 'quanle', '2018-12-03', 'quanle', '45/59 đâsda', 56565656, 'damua', 'ghichu'),
('1543897121_vqk123', 'vqk123', '2018-12-04', 'vqk', 'sdfsfdsf', 1321321, 'cancel', 'ghichu'),
('1543914285_quan', 'quan', '2018-12-04', 'Quân', '284 cao lỗ ', 937951896, 'cancel', 'ghichu'),
('1543998397_quan', 'quan', '2018-12-05', 'Quân', '284 cao lỗ ', 937951896, 'complete', 'ghichu'),
('1543998448_quan', 'quan', '2018-12-05', 'Quân', '284 cao lỗ ', 937951896, 'cancel', 'ghichu'),
('1543998892_quan', 'quan', '2018-12-05', 'Quân', '180 cao lỗ', 937951896, 'cancel', 'ghichu'),
('1544021237_khanh12', 'khanh12', '2018-12-05', 'khanh12', '180 cao lo', 948844629, 'complete', 'ghichu'),
('1544030951_khanh12', 'khanh12', '2018-12-05', 'khanh12', '180 cao lo', 948844629, 'complete', 'ghichu'),
('1544034742_khanh12', 'khanh12', '2018-12-05', 'khanh12', '180 cao lo', 948844629, 'complete', 'ghichu'),
('1544242085_loipham300', 'loipham300', '2018-12-08', 'loi', 'ádsa', 969031507, 'complete', 'ghichu'),
('1544334563_quan', 'quan', '2018-12-09', 'Quân', '180 cao lỗ', 937951896, 'complete', ''),
('1544335358_quan', 'quan', '2018-12-09', 'Quân', '180 cao lỗ', 937951896, 'complete', 'Chạy vào hẻm hỏi nhà anh Quân ở đâu là người ta chỉ nha shop!'),
('1544863658_khanh12', 'khanh12', '2018-12-15', 'khanh12', '180 cao lo', 948844629, 'pending', ''),
('1544863884_khanh12', 'khanh12', '2018-12-15', 'khanh12', '180 cao lo', 948844629, 'pending', ''),
('1544867821_khanh12', 'khanh12', '2018-12-15', 'khanh12', '180 cao lo', 948844629, 'pending', ''),
('1545103679_quan', 'quan', '2018-12-18', 'Quân', '180 cao lỗ', 937951896, 'pending', ''),
('1545237427_phamthanhloi1', 'phamthanhloi1', '2018-12-19', 'loi', 'nha cua loi', 969031507, 'pending', ''),
('1545377814_phamthanhloi30', 'phamthanhloi30', '2018-12-21', 'loipham30', 'nha cua loi', 969031507, 'complete', ''),
('1545378524_phamthanhloi30', 'phamthanhloi30', '2018-12-21', 'loipham30', 'nha cua loi', 969031507, 'pending', ''),
('1545394519_loipham2030@gmail.com', 'loipham2030@gmail.com', '2018-12-21', 'loipham30', 'nha cua loi', 1234567890, 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblienhe`
--

CREATE TABLE `tblienhe` (
  `id_lienhe` int(11) NOT NULL,
  `hoten` text NOT NULL,
  `cty` text NOT NULL,
  `email` text NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` text NOT NULL,
  `noidung` text NOT NULL,
  `ngaylienhe` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tblienhe`
--

INSERT INTO `tblienhe` (`id_lienhe`, `hoten`, `cty`, `email`, `sdt`, `diachi`, `noidung`, `ngaylienhe`) VALUES
(14, 'Lê Gia Quân', 'SAGOPHONE', 'quanle51297@gmail.com', 328248594, 'đà nẵng', 'Đề nghị nhân viên phục vụ có thái độ tốt hơn đối với khách hàng', '2013-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbnhomsanpham`
--

CREATE TABLE `tbnhomsanpham` (
  `id_nhom` int(11) NOT NULL,
  `tennhom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbnhomsanpham`
--

INSERT INTO `tbnhomsanpham` (`id_nhom`, `tennhom`) VALUES
(0, 'Điện thoại'),
(1, 'Phụ kiện');

-- --------------------------------------------------------

--
-- Table structure for table `tbsanpham`
--

CREATE TABLE `tbsanpham` (
  `id_sanpham` int(11) NOT NULL,
  `id_hangdt` int(11) NOT NULL,
  `id_nhom` int(11) NOT NULL,
  `tensp` text NOT NULL,
  `mota` text NOT NULL,
  `hinhsp` text NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `khuyenmai` int(11) NOT NULL,
  `new` int(11) NOT NULL,
  `seo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbsanpham`
--

INSERT INTO `tbsanpham` (`id_sanpham`, `id_hangdt`, `id_nhom`, `tensp`, `mota`, `hinhsp`, `gia`, `soluong`, `khuyenmai`, `new`, `seo`) VALUES
(0, 0, 0, 'Iphone X', 'cảm giac thoải mái khi sử dụng', '0.jpg', 26497000, 1, 0, 1, 1),
(1, 1, 0, 'Samsung Galaxy Note 9', '1', '1.jpg', 22000000, 1, 30, 1, 1),
(2, 0, 0, 'Iphone 8 Plus', '1', '2.jpg', 23000000, 1, 5, 1, 1),
(5, 0, 0, 'Iphone 6', '1', '5.jpg', 6800000, 1, 15, 0, 0),
(6, 0, 1, 'Iphone 7', '1', '6.jpg', 14900000, 1, 20, 0, 0),
(7, 1, 1, 'Samsung Galaxy S9', '1', '7.jpg', 17900000, 1, 10, 1, 1),
(8, 3, 1, 'Nokia 5', '1', '8.jpg', 4500000, 1, 5, 1, 0),
(10, 0, 1, 'Iphone Xs Max', '1', '10.jpg', 35000000, 1, 5, 1, 1),
(11, 3, 1, 'Nokia 8', '1', '11.jpg', 6900000, 1, 5, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbthanhvien`
--

CREATE TABLE `tbthanhvien` (
  `hoten` varchar(50) NOT NULL,
  `diachi` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `hieuluc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbthanhvien`
--

INSERT INTO `tbthanhvien` (`hoten`, `diachi`, `email`, `sdt`, `id_user`, `pass`, `hieuluc`) VALUES
('Hải', 'Bình Thuận', 'hai123@gmail.com', 1212121212, 'hai123', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-05'),
('khanh12', '180 cao lo', 'color@gmail.com', 948844629, 'khanh12', '202cb962ac59075b964b07152d234b70', '2018-12-05'),
('loipham30', 'nha cua loi', 'loipham3060@gmail.com', 1234567890, 'loipham2030@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-21'),
('loi', 'ádsa', 'haidang3105s@yahoo.com.vn', 969031507, 'loipham300', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-08'),
('loipham7', 'nha cua loi', 'loipham2030@gmail.com', 969031507, 'loipham7', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-17'),
('loipham30', 'nha cua loi', 'loipham3060@gmail.com', 969031507, 'loiphamhhhhhhhh', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-21'),
('loi', 'nha cua loi', 'loipham3060@gmail.com', 969031507, 'phamthanhloi1', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-19'),
('loipham30', 'nha cua loi', 'haidang3105s@yahoo.com.vn', 969031507, 'phamthanhloi30', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-10'),
('loipham30', 'nha cua loi', 'haidang3105@yahoo.com.vn', 969031507, 'phamthanhloi300', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-10'),
('Quân', '180 cao lỗ', 'quanle51297@gmail.com', 937951896, 'quan', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-04'),
('quanle', '45/59 đâsda', 'fnkphanhrom@gmail.com', 328248594, 'quanle', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-03'),
('vqk', 'sdfsfdsf', 'sdss@gmail.com', 1321321, 'vqk123', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbchitiethoadon`
--
ALTER TABLE `tbchitiethoadon`
  ADD PRIMARY KEY (`id_hoadon`,`id_sanpham`) USING BTREE,
  ADD KEY `tbchitiethoadon_ibfk_2` (`id_sanpham`) USING BTREE;

--
-- Indexes for table `tbhangdt`
--
ALTER TABLE `tbhangdt`
  ADD PRIMARY KEY (`id_hangdt`) USING BTREE;

--
-- Indexes for table `tbhoadon`
--
ALTER TABLE `tbhoadon`
  ADD PRIMARY KEY (`id_hoadon`) USING BTREE,
  ADD KEY `tbhoadon_ibfk_2` (`id_user`) USING BTREE;

--
-- Indexes for table `tblienhe`
--
ALTER TABLE `tblienhe`
  ADD PRIMARY KEY (`id_lienhe`) USING BTREE;

--
-- Indexes for table `tbnhomsanpham`
--
ALTER TABLE `tbnhomsanpham`
  ADD PRIMARY KEY (`id_nhom`) USING BTREE;

--
-- Indexes for table `tbsanpham`
--
ALTER TABLE `tbsanpham`
  ADD PRIMARY KEY (`id_sanpham`) USING BTREE,
  ADD KEY `tbsanpham_ibfk_2` (`id_nhom`) USING BTREE,
  ADD KEY `tbsanpham_ibfk_5` (`id_hangdt`) USING BTREE;

--
-- Indexes for table `tbthanhvien`
--
ALTER TABLE `tbthanhvien`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbchitiethoadon`
--
ALTER TABLE `tbchitiethoadon`
  ADD CONSTRAINT `tbchitiethoadon_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `tbsanpham` (`id_sanpham`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbchitiethoadon_ibfk_2` FOREIGN KEY (`id_hoadon`) REFERENCES `tbhoadon` (`id_hoadon`) ON UPDATE CASCADE;

--
-- Constraints for table `tbhoadon`
--
ALTER TABLE `tbhoadon`
  ADD CONSTRAINT `tbhoadon_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbthanhvien` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `tbsanpham`
--
ALTER TABLE `tbsanpham`
  ADD CONSTRAINT `tbsanpham_ibfk_2` FOREIGN KEY (`id_nhom`) REFERENCES `tbnhomsanpham` (`id_nhom`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbsanpham_ibfk_5` FOREIGN KEY (`id_hangdt`) REFERENCES `tbhangdt` (`id_hangdt`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
