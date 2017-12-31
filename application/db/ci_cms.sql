-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2017 at 09:23 AM
-- Server version: 5.6.26
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `last_login` varchar(15) NOT NULL,
  `added_on` varchar(15) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `role`, `last_login`, `added_on`, `status`) VALUES
(1, 'Dheeraj thedijje', 'thedijje.ic@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 1, '1495436914', '1465850211', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE IF NOT EXISTS `blog_post` (
  `post_id` int(10) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_url` varchar(100) NOT NULL,
  `post_meta_detail` varchar(200) NOT NULL,
  `post_meta_keyword` varchar(200) NOT NULL,
  `post_content` text NOT NULL,
  `post_by` int(5) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_featured_image` varchar(200) NOT NULL,
  `post_view` int(10) NOT NULL,
  `post_status` tinyint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`post_id`, `post_title`, `post_url`, `post_meta_detail`, `post_meta_keyword`, `post_content`, `post_by`, `created_on`, `updated_on`, `post_featured_image`, `post_view`, `post_status`) VALUES
(1, 'Man must explore, and this is exploration at its greatest', 'my-first-post', 'Man must explore, and this is exploration at its greatest', 'first,blog,post', 'Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Pellentesque in ipsum id orci porta dapibus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla quis lorem ut libero malesuada feugiat. Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus suscipit tortor eget felis porttitor volutpat. Sed porttitor lectus nibh.\r\n\r\nPraesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Cras ultricies ligula sed magna dictum porta. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nSed porttitor lectus nibh. Sed porttitor lectus nibh. Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus nibh. Curabitur aliquet quam id dui posuere blandit. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.', 1, '2017-04-28 12:51:24', '0000-00-00 00:00:00', '#', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(10) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'site',
  `name` varchar(100) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 COMMENT='configuration settings of site';

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `type`, `name`, `value`) VALUES
(1, 'site', 'sitename', 'Dheeraj thedijje'),
(2, 'site', 'home_title', 'Dheeraj thedijje'),
(29, 'site', 'author', 'Dheeraj thedijje'),
(3, 'site', 'logo', 'static/front/img/logo/app_logo.png'),
(4, 'site', 'meta_detail', 'RCMS Website'),
(5, 'site', 'phone', '8826810280'),
(7, 'site', 'email', 'Dheeraj@thedijje.com'),
(8, 'site', 'home_text', 'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla porttitor accumsan ti'),
(10, 'site', 'sending_email', 'no-replay@thedijje.com'),
(9, 'site', 'date_format', 'd M Y'),
(11, 'site', 'sending_email_name', 'BusinessToday'),
(15, 'site', 'slider_w', '1450'),
(16, 'site', 'slider_h', '460'),
(19, 'site', 'address', ''),
(20, 'site', 'fax', ''),
(32, 'site', 'github', 'thedijje'),
(22, 'site', 'device_auth_key', 'Y_DEVICE_AUTH'),
(23, 'site', 'free_sub_days', '30'),
(24, 'site', 'paypal_payment_email', 'thedijje.ic@gmail.com'),
(31, 'site', 'facebook', 'thedijje'),
(30, 'site', 'twitter', 'thedijje');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `contact_id` int(10) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `contact_phone` varchar(15) NOT NULL,
  `contact_message` text NOT NULL,
  `contact_sent_on` varchar(15) NOT NULL,
  `contact_seen_on` varchar(15) NOT NULL,
  `contact_ip_address` varchar(15) NOT NULL,
  `contact_status` tinyint(1) NOT NULL DEFAULT '2'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_message`, `contact_sent_on`, `contact_seen_on`, `contact_ip_address`, `contact_status`) VALUES
(8, 'Dheeraj', 'dheeraj@thedijje.com', '8826810280', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur aliquet quam id dui posuere blandit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Proin eget tortor risus. Nulla porttitor accumsan tincidunt. Nulla quis lorem ut libero malesuada feugiat.', '1475176497', '1475176510', '182.68.172.40', 1),
(9, 'Naveen', 'Naveen223@gmail.com', '6556898097786', 'Donec sollicitudin molestie malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim.', '1475176750', '1475254261', '182.68.172.40', 1),
(10, 'Dheeraj', 'thedijje.ic@gmail.com', '56878675', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur aliquet quam id dui posuere blandit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.', '1475851976', '', '182.68.220.30', 3),
(11, 'Dheeraj', 'nmxdheeraj@gmail.com', '123123', 'Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec sollicitudin molestie malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Nulla porttitor accumsan tincidunt. Vivamus suscipit tortor eget felis porttitor volutpat.', '1476310487', '', '182.68.179.80', 3),
(12, 'Dheeraj', 'nmxdheeraj@gmail.com', '123123123', 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla porttitor accumsan tincidunt. Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur aliquet quam id dui posuere blandit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus nibh.', '1476310570', '', '182.68.179.80', 3),
(13, 'Dheeraj', 'nmxdheeraj@gmail.com', '657890876', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Nulla quis lorem ut libero malesuada feugiat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec sollicitudin molestie malesuada. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus. Sed porttitor lectus nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur aliquet quam id dui posuere blandit. Nulla porttitor accumsan tincidunt.', '1476310716', '1483046304', '182.68.179.80', 1),
(14, 'Dheeraj', 'nmxdheeraj@gmail.com', '767908-89765', 'jhjkhlkh', '1476310931', '1483046329', '182.68.179.80', 1),
(15, 'Dheeraj', 'nmxdheeraj@gmail.com', '0987654345678', 'Donec rutrum congue leo eget malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla porttitor accumsan tincidunt. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla quis lorem ut libero malesuada feugiat.', '1476311017', '1483046356', '182.68.179.80', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `module_id` int(10) NOT NULL,
  `module_name` varchar(30) NOT NULL,
  `module_slug` varchar(50) NOT NULL,
  `module_content` text NOT NULL,
  `module_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(10) NOT NULL,
  `page_title` varchar(150) NOT NULL,
  `page_url` varchar(150) NOT NULL,
  `page_head_image` varchar(250) NOT NULL,
  `page_content` text NOT NULL,
  `page_added_on` varchar(15) NOT NULL,
  `page_visit` int(10) NOT NULL,
  `page_meta_keyword` varchar(250) NOT NULL,
  `page_meta_description` text NOT NULL,
  `page_status` tinyint(1) NOT NULL DEFAULT '4'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`, `page_url`, `page_head_image`, `page_content`, `page_added_on`, `page_visit`, `page_meta_keyword`, `page_meta_description`, `page_status`) VALUES
(1, 'About us', 'about-us', '', '<div>\r\n	Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla porttitor accumsan tincidunt. Donec sollicitudin molestie malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sollicitudin molestie malesuada. Proin eget tortor risus.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur aliquet quam id dui posuere blandit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec rutrum congue leo eget malesuada. Donec sollicitudin molestie malesuada. Proin eget tortor risus. Sed porttitor lectus nibh. Sed porttitor lectus nibh. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</div>\r\n', '1472370460', 0, 'About jugni TV', 'About jugni TV', 1),
(2, 'Privacy policies of JugniTv', 'privacy-policies', '', '<div>\r\n	<img alt="laugh" height="20" src="http://thedijje.com/area51/jugniTV/static/ckeditor/plugins/smiley/images/teeth_smile.gif" title="laugh" width="20" />Vivamus <em>magna just</em>o, lacinia eget consectetur sed, convallis at tellus. Nulla porttitor accumsan tincidunt. Sed porttitor lectus nibh. Pellentesque in ipsum id orci porta dapibus. Pellentesque in ipsum id orci porta dapibus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Pellentesque in ipsum id orci porta dapibus. Donec rutrum congue leo eget malesuada. Nulla quis lorem ut libero malesuada feugiat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Nulla quis lorem ut libero malesuada feugiat. Nulla porttitor accumsan tincidunt. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla quis lorem ut libero malesuada feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Pellentesque in ipsum id orci porta dapibus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec sollicitudin molestie malesuada. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>\r\n', '1472370827', 0, 'Privacy policy of jugniTV', 'Privacy policy of jugniTV', 1),
(3, 'Terms and conditions', 'terms-and-conditions', '', '<div>\r\n	Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Sed porttitor lectus nibh. Vivamus suscipit tortor eget felis porttitor volutpat. Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Nulla quis lorem ut libero malesuada feugiat.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed magna dictum porta. Donec sollicitudin molestie malesuada. Sed porttitor lectus nibh. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus. Nulla porttitor accumsan tincidunt.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Donec rutrum congue leo eget malesuada. Donec rutrum congue leo eget malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus suscipit tortor eget felis porttitor volutpat. Cras ultricies ligula sed magna dictum porta. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta.</div>\r\n', '1472370878', 0, 'Terms and conditions', 'Terms and conditions', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE IF NOT EXISTS `slides` (
  `slide_id` int(10) NOT NULL,
  `slide_image` varchar(250) NOT NULL,
  `slide_big_text` varchar(100) NOT NULL,
  `sm_txt` varchar(100) NOT NULL,
  `slide_order` int(5) NOT NULL,
  `link_url` varchar(200) NOT NULL,
  `slide_status` tinyint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slide_id`, `slide_image`, `slide_big_text`, `sm_txt`, `slide_order`, `link_url`, `slide_status`) VALUES
(6, 'static/images/slider/71e19ab9e5856f009756c0f74ea86222_3.jpg', 'The Dark knight', 'The Dark knight', 4, ' MjM=', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(10) NOT NULL,
  `status_name` varchar(50) NOT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`, `enable`) VALUES
(1, 'Active', 1),
(2, 'Inactive', 1),
(3, 'Pending', 1),
(4, 'Rejected', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`),
  ADD UNIQUE KEY `url` (`page_url`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
