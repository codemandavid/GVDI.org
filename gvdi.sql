-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2019 at 02:25 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gvdi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_clwo`
--

CREATE TABLE `admin_clwo` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_clwo`
--

INSERT INTO `admin_clwo` (`id`, `username`, `password`) VALUES
(1, 'username', 'a4f0a041c1fc548034f5892e8cbc90ac');

-- --------------------------------------------------------

--
-- Table structure for table `blog_gallery`
--

CREATE TABLE `blog_gallery` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_gallery`
--

INSERT INTO `blog_gallery` (`id`, `image`) VALUES
(29, '_MG_9766.jpg'),
(30, 'were.jpg'),
(31, 'FB_IMG_1531205035179.jpg'),
(32, 'IMG_20181114_102538.jpg'),
(33, '56881363_2439918369354078_6614260424797847552_n.jpg'),
(34, 'best-african-natural-afro-hairstyle-1.jpg'),
(35, 'bh6.png'),
(36, 'bh6.png'),
(37, 'images (9).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog_table`
--

CREATE TABLE `blog_table` (
  `id` int(11) NOT NULL,
  `blog_title` text NOT NULL,
  `blog_details` text NOT NULL,
  `blog_img` varchar(500) NOT NULL,
  `date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_table`
--

INSERT INTO `blog_table` (`id`, `blog_title`, `blog_details`, `blog_img`, `date`) VALUES
(7, ' THE BOOK LAUNCHING ', 'at the begining of the year, we promised that everything will be dynamic', 'FB_IMG_1515260262512.jpg', '05 Mar 2019'),
(8, 'DAVID HAS GRADUATED', 'One of the&nbsp;<br>Best student who graduated recently has said that he will be gradually decided to go as aaf nhivjrnjnjrf jfk krjfb kjfbe as it would benrv j jrbfvhjbe hwdb jwjj hjwje hbe jjej jwek kjwe jwrb kbsbbk hekw kweehbeb ', 'FB_IMG_1514216680741.jpg', '05 Mar 2019'),
(9, 'LIFE ABROAD', 'We all know how lifw can be hard abroad and we determine what it means to do so like that', 'FB_IMG_1515432530670.jpg', '05 Mar 2019'),
(10, 'Love the little ones', 'Children&nbsp;are beautiful lovable humans with so much innocence and love in their hearts.Treat them right.<br>', 'IMG_20180328_111000.jpg', '07 Mar 2019'),
(13, 'BOLD AND BEAUTIFUL', 'Look at this couple, they are looking beautiful together', 'FB_IMG_1515283511524.jpg', '12 Mar 2019'),
(15, 'THIS IS THE NEWS', 'we have been aware tat there&nbsp; is a lot of disturbances when it gets to city life in the life of corp members who just moved from the village to the cities', 'city-89197_960_720.jpg', '20 May 2019');

-- --------------------------------------------------------

--
-- Table structure for table `comment_table`
--

CREATE TABLE `comment_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `blog_id` varchar(255) NOT NULL,
  `email` varchar(500) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_table`
--

INSERT INTO `comment_table` (`id`, `name`, `blog_id`, `email`, `comment`, `date`) VALUES
(7, 'micheal', '8', 'mike@gmail.com', 'this is a nice work ahead', ''),
(8, 'david chijioke', '9', 'davidchijioke11@gmail.com', 'this is beautiful as it looks', ''),
(9, 'david chijioke', '7', 'davidchijioke11@gmail.com', 'i want to buy a copy of the book', ''),
(10, 'david chijioke', '10', 'davidchijioke11@gmail.com', 'i love this project. well-done GVDI', '24 05 2019');

-- --------------------------------------------------------

--
-- Table structure for table `project_comment_table`
--

CREATE TABLE `project_comment_table` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `date` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_table`
--

CREATE TABLE `project_table` (
  `id` int(11) NOT NULL,
  `proj_title` varchar(1000) NOT NULL,
  `proj_details` varchar(5000) NOT NULL,
  `proj_img` varchar(1000) NOT NULL,
  `date` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_table`
--

INSERT INTO `project_table` (`id`, `proj_title`, `proj_details`, `proj_img`, `date`) VALUES
(2, ' THE FEED ALL PROJECT  ', 'the feed all project was a project aimed at feeding street kids so much as to making sure that none of these kids remained in town and is hungry. we are very concerned about all other almajiri boys on the street and all other forms of activities which is based on how we conduct ourselves', 'slider12.jpg', '25 May 2019'),
(3, 'WOMEN CANCER CONFERENCE', 'women cancer conference was held in the council of intrested businessmen who are concerned about the welfare of the people of carlifornia as at that time', 'slider4.jpg', '25 May 2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_clwo`
--
ALTER TABLE `admin_clwo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_gallery`
--
ALTER TABLE `blog_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_table`
--
ALTER TABLE `blog_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_comment_table`
--
ALTER TABLE `project_comment_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_table`
--
ALTER TABLE `project_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_clwo`
--
ALTER TABLE `admin_clwo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog_gallery`
--
ALTER TABLE `blog_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `blog_table`
--
ALTER TABLE `blog_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `project_comment_table`
--
ALTER TABLE `project_comment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_table`
--
ALTER TABLE `project_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
