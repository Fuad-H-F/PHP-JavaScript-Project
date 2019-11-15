-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2019 at 07:23 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookabook_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_image`
--

CREATE TABLE `ad_image` (
  `ad_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path_1` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path_2` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path_3` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_ad`
--

CREATE TABLE `book_ad` (
  `id` int(11) NOT NULL,
  `owner` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookname` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edition` int(11) NOT NULL,
  `adtype` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitprice` double NOT NULL,
  `copy` int(11) NOT NULL,
  `totalprice` double NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `house` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `road` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subdistrict` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneno` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `timefrom` time DEFAULT NULL,
  `timeto` time DEFAULT NULL,
  `report` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_ad`
--

INSERT INTO `book_ad` (`id`, `owner`, `bookname`, `writer`, `edition`, `adtype`, `unitprice`, `copy`, `totalprice`, `details`, `house`, `road`, `area`, `subdistrict`, `district`, `postcode`, `phoneno`, `email`, `date`, `timefrom`, `timeto`, `report`) VALUES
(1, 'fuad@gmail.com', 'asd', 'asdc', 1234, 'sell', 6, 1, 6, 'asdfg', '12', '2', 'asd', 'asdd', 'asfdfd', 'asff', '01234567891', 'fuad@gmail.com', '2019-07-29', '00:00:00', '00:00:00', 0),
(2, 'fuad@gmail.com', 'wrq', 'qwe', 1, 'rent', 3, 1, 3, 'asf w ad', '12', '2', 'asd', 'asdd', 'asfdfd', 'asff', '01234567891', 'fuad@gmail.com', '2019-07-29', '00:00:00', '00:00:00', 0),
(3, 'fuad@gmail.com', 'asd', 'sad', 1, 'rent', 21, 2, 42, '21dsf asd ', '12', '2', 'asd', 'asdd', 'asfdfd', 'asff', '01234567891', 'fuad@gmail.com', '2019-07-29', '00:00:00', '00:00:00', 0),
(4, 'fuad@gmail.com', 'asd', 'asdc', 1, 'rent', 12, 3, 36, 'as swar ', '12', '2', 'asd', 'asdd', 'asfdfd', 'asff', '01234567891', 'fuad@gmail.com', '2019-07-29', '00:00:00', '00:00:00', 0),
(5, 'fuad@gmail.com', 'asd', 'asdc', 1, 'rent', 12, 3, 36, 'as swar ', '12', '2', 'asd', 'asdd', 'asfdfd', 'asff', '01234567891', 'fuad@gmail.com', '2019-07-29', '00:00:00', '00:00:00', 0),
(6, 'fuad@gmail.com', 'asd', 'qwe', 1234, 'sell', 4, 2, 8, 'dads', '12', '2', 'asd', 'asdd', 'asfdfd', 'asff', '01234567891', 'fuad@gmail.com', '2019-08-19', '00:00:00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `from_user` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_user` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`from_user`, `to_user`, `time`, `message`) VALUES
('asd@gmail.com', 'fuad@gmail.com', '2019-07-29 18:51:54', 'hi'),
('fuad@gmail.com', 'fuad@gmail.com', '2019-07-29 18:52:31', 'ghj');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `ID` int(11) NOT NULL,
  `book_title` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `author_name` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `book_edition` int(6) NOT NULL,
  `creator_email` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `forum_body` text COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`ID`, `book_title`, `author_name`, `book_edition`, `creator_email`, `forum_body`) VALUES
(0, 'new book', 'asdad', 4, 'fuad@gmail.com', 'asd  asd ssaas'),
(0, 'new book', 'asdad', 4, 'fuad@gmail.com', 'asd  asd ssaas');

-- --------------------------------------------------------

--
-- Table structure for table `forum_comment`
--

CREATE TABLE `forum_comment` (
  `forum_id` int(11) NOT NULL,
  `commentator_email` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `comment_body` text COLLATE utf32_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `forum_comment`
--

INSERT INTO `forum_comment` (`forum_id`, `commentator_email`, `comment_body`, `status`) VALUES
(0, 'asd@gmail.com', 'valo', '0'),
(0, 'fuad@gmail.com', 'ami bolam valo', '0');

-- --------------------------------------------------------

--
-- Table structure for table `forum_member`
--

CREATE TABLE `forum_member` (
  `forum_id` int(11) NOT NULL,
  `member_email` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `simple_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rate_ad`
--

CREATE TABLE `rate_ad` (
  `rate_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `voter` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tag_value` varchar(100) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag_forum`
--

CREATE TABLE `tag_forum` (
  `tag_val` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `forum_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `uemail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `road` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subdistrict` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondphoneno` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timefrom` time DEFAULT NULL,
  `timeto` time DEFAULT NULL,
  `picture` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`uemail`, `dob`, `gender`, `house`, `road`, `area`, `subdistrict`, `postcode`, `district`, `phoneno`, `secondphoneno`, `timefrom`, `timeto`, `picture`, `status`) VALUES
('asd@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT'),
('borno@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT'),
('fuad@gmail.com', '1998-06-16', 'male', '12', '2', 'asd', 'asdd', 'asff', 'asfdfd', '01234567891', NULL, NULL, NULL, 'profileimgs/fuad@gmail.com.jpg', 'done'),
('j@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT'),
('ja@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT'),
('md.aljubayer31@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT'),
('sa@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT'),
('sha@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`email`, `name`, `password`, `type`, `status`) VALUES
('asd@gmail.com', 'Romit Faizul', '1234', 'client', 0),
('borno@gmail.com', 'borno ', '1234', 'client', 0),
('fuad@gmail.com', 'Fuad Ahmed', '123', 'client', 0),
('j@gmail.com', 'Jubayer ahmed', '1234', 'client', 0),
('ja@gmail.com', 'Jubayer ahmed khan', '123', 'client', 0),
('kredoy416@gmail.com', 'Redoy Khan', '1234', 'client', 0),
('md.aljubayer31@gmail.com', 'Jubayer ahmed', '123', 'client', 0),
('romit@gmail.com', 'Romit Faizul', '1234', 'client', 0),
('romithh@gmail.com', 'Romit Faizul', '1234', 'client', 0),
('sa@gmail.com', 'Shahariar Ahmed', '123', 'client', 0),
('sha@gmail.com', 'Shariar ahmed', '1234', 'client', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `ad_id` int(11) NOT NULL,
  `user` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`ad_id`, `user`) VALUES
(5, 'asd@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_ad`
--
ALTER TABLE `book_ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_ad`
--
ALTER TABLE `rate_ad`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`uemail`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`ad_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_ad`
--
ALTER TABLE `book_ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rate_ad`
--
ALTER TABLE `rate_ad`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
