-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 04:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doc_db`
--
CREATE DATABASE IF NOT EXISTS `doc_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `doc_db`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`d_id`, `d_name`) VALUES
(1, 'เทคโนโลยีสารสนเทศ'),
(2, 'บริหารงาน'),
(3, 'การเงิน'),
(4, 'การตลาด');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doc_file`
--

CREATE TABLE `tbl_doc_file` (
  `f_id` int(11) NOT NULL,
  `fileID` varchar(100) NOT NULL,
  `filename` varchar(200) NOT NULL COMMENT 'ชื่อเอกสาร',
  `t_id` int(11) NOT NULL COMMENT 'ประเภทเอกสาร',
  `doc_file` varchar(200) NOT NULL COMMENT 'ไฟล์เอกสาร',
  `date_get` date NOT NULL COMMENT 'วันที่พิมพ์',
  `date_up` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่อัพเอกสาร',
  `m_username` varchar(20) NOT NULL COMMENT 'ส่งให้ผู้ใช้',
  `d_id` int(11) NOT NULL COMMENT 'ส่งให้แผนก',
  `qty` int(11) NOT NULL COMMENT 'จำนวนการโหลด',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_doc_file`
--

INSERT INTO `tbl_doc_file` (`f_id`, `fileID`, `filename`, `t_id`, `doc_file`, `date_get`, `date_up`, `m_username`, `d_id`, `qty`, `status`) VALUES
(1, 'กข001', 'เอกสารการอบรม', 5, '78695795820220625_230313.pdf', '2022-06-26', '2022-06-25 18:32:51', 'member', 1, 4704, 0),
(2, 'อส.01', 'เอกสารฝึกงาน', 3, '89716169120220625_230325.pdf', '2022-06-26', '2022-06-25 18:33:46', 'member', 2, 25004, 1),
(3, 'อส.02', 'เอกสารสำคัญ', 5, '53222416320220625_230332.pdf', '2022-06-25', '2022-06-25 18:34:23', 'boss', 4, 2502, 0),
(4, 'อส.03', 'เอกสารคำสั่ง', 4, '108574586120220625_230344.pdf', '2022-06-26', '2022-06-25 18:34:41', 'member', 3, 7002, 1),
(5, 'อส.04', 'เอกสารการอบรม2', 2, '111590228320220625_230338.pdf', '2022-06-24', '2022-06-25 18:47:42', 'member', 1, 3501, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `m_id` int(11) NOT NULL COMMENT 'PK',
  `m_username` varchar(100) NOT NULL COMMENT 'ไอดีผู้ใช้',
  `m_password` varchar(100) NOT NULL COMMENT 'รหัสผ่าน',
  `m_name` varchar(100) NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `d_id` varchar(100) NOT NULL COMMENT 'FK tbl_department',
  `m_level` varchar(100) NOT NULL COMMENT 'สถานะ',
  `m_img` varchar(250) NOT NULL COMMENT 'รูปภาพ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`m_id`, `m_username`, `m_password`, `m_name`, `d_id`, `m_level`, `m_img`) VALUES
(1, 'admin', 'admin', 'admin', '1', 'admin', '32324716720220625_164251.png'),
(2, 'member', 'member', 'member', '1', 'member', '56545308920220626_042233.png'),
(3, 'member1', 'member', 'member01', '1', 'member', '178072269320220626_042239.png'),
(4, 'boss', 'boss', 'boss_boss', '2', 'boss', '165557995920220626_042246.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`t_id`, `t_name`) VALUES
(1, 'หนังสือภายใน'),
(2, 'หนังสือภายนอก'),
(3, 'หนังสือประทับตา'),
(4, 'หนังสือสั่งการ'),
(5, 'หนังสือหลักฐานทางราชการ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tbl_doc_file`
--
ALTER TABLE `tbl_doc_file`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_doc_file`
--
ALTER TABLE `tbl_doc_file`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
