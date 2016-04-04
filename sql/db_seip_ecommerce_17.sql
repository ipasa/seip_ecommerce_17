-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2016 at 01:26 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_seip_ecommerce_17`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(256) NOT NULL,
  `category_desc` text NOT NULL,
  `publicationStatus` tinyint(1) NOT NULL,
  `deletionStatus` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`, `publicationStatus`, `deletionStatus`) VALUES
(1, 'sports', '<strong style="font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify; background-color: rgb(255, 255, 255);">Lorem Ipsum</strong><span style="font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify; background-color: rgb(255, 255, 255);">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the.</span>', 1, 1),
(2, 'Computer', '<span style="color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: small; line-height: 18.2px; background-color: rgb(255, 255, 255);">In publishing and graphic design,&nbsp;</span><span style="font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; font-size: small; line-height: 18.2px; background-color: rgb(255, 255, 255);">lorem ipsum</span><span style="color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: small; line-height: 18.2px; background-color: rgb(255, 255, 255);">&nbsp;is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation.</span>', 1, 1),
(4, 'Test category 1', '<font face="Arial, Verdana"><span style="font-size: 13.3333px;">Test category 1</span></font>', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `access_level` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `email_address`, `password`, `access_level`, `deletion_status`) VALUES
(1, 'ipasha', 'pasha@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
