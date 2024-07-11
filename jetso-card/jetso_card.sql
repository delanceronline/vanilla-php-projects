-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2013 at 04:48 PM
-- Server version: 5.5.22-0ubuntu1
-- PHP Version: 5.3.10-1ubuntu3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jetso_card`
--
CREATE DATABASE `jetso_card` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jetso_card`;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE IF NOT EXISTS `campaigns` (
  `owner` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon` varchar(256) DEFAULT NULL COMMENT 'coupon image''s URL',
  `cn_offset` int(11) NOT NULL DEFAULT '0' COMMENT 'coupon number offset',
  `cn_prefix` varchar(6) NOT NULL COMMENT 'coupon number prefix',
  `cc` int(11) NOT NULL COMMENT 'number of coupons available',
  `cr` int(11) NOT NULL COMMENT 'number of coupons released',
  `pt` text NOT NULL COMMENT 'promotion title',
  `pd` text NOT NULL COMMENT 'Promotion description',
  `pi` varchar(256) DEFAULT NULL COMMENT 'Promotion image''s URL',
  `terms` text NOT NULL,
  `ti` varchar(256) NOT NULL COMMENT 'terms image',
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1 --- active 0--- inactive',
  `creation_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`owner`, `id`, `coupon`, `cn_offset`, `cn_prefix`, `cc`, `cr`, `pt`, `pd`, `pi`, `terms`, `ti`, `start_date`, `start_time`, `end_date`, `end_time`, `status`, `creation_date`, `modified_date`) VALUES
(1, 1, 'Sunset-20110613-095324.jpg', 1000, '', 100, 0, 'Promotion 1', '', 'Blue hills-20110613-095322.jpg', '', '', '2011-06-13', '00:00:00', '2011-06-13', '00:00:00', 1, '2011-06-13 09:54:53', '2011-06-13 09:54:53'),
(1, 2, 'Water lilies-20110613-131150.jpg', 1000, '', 100, 0, 'Promotion 2', 'Good~~~~', '', '', '', '2011-06-13', '00:00:00', '2011-06-14', '00:00:00', 1, '2011-06-13 13:13:16', '2011-06-13 13:13:16'),
(11, 3, '', 1000, 'S', 100, 0, '剪髮9折優惠', '~剪髮9折優惠~', '', '1. 不可跟其他優惠一拼使用\r\n2. 不可在星期日使用\r\n3. 不可換現金\r\n4. 不可重複使用\r\n1. 不可跟其他優惠一拼使用\r\n2. 不可在星期日使用\r\n3. 不可換現金\r\n4. 不可重複使用\r\n1. 不可跟其他優惠一拼使用\r\n2. 不可在星期日使用\r\n3. 不可換現金\r\n4. 不可重複使用\r\n1. 不可跟其他優惠一拼使用\r\n2. 不可在星期日使用\r\n3. 不可換現金\r\n4. 不可重複使用\r\n', '', '2011-06-13', '00:00:00', '2011-06-30', '00:00:00', 1, '2011-06-13 15:15:07', '2011-06-13 15:15:07'),
(11, 4, '', 1000, 'A', 50, 0, '染髮9折優惠', '~染髮9折優惠~', '', '1. 不可跟其他優惠一拼使用\r\n2. 不可在星期日使用\r\n3. 不可換現金\r\n4. 不可重複使用', '', '2011-06-13', '00:00:00', '2011-06-13', '00:00:00', 1, '2011-06-13 15:16:43', '2011-06-13 15:16:43'),
(10, 5, '', 100, '', 1000, 0, '汽油9折', '~汽油9折~', 'Screen shot 2011-06-13 at 3.18.10 PM-20110613-151830.png', '1. 不可跟其他優惠一拼使用\r\n2. 不可在星期日使用\r\n3. 不可換現金\r\n4. 不可重複使用', '', '2011-06-13', '00:00:00', '2011-06-27', '00:00:00', 1, '2011-06-13 15:20:17', '2011-06-13 15:20:17'),
(9, 6, '', 2000, 'FF', 100, 1, 'Facial八折', '~Facial八折~', '', '', '', '2011-06-13', '00:00:00', '2011-06-30', '00:00:00', 1, '2011-06-13 15:22:44', '2011-06-13 15:22:44'),
(8, 7, '', 200, '', 100, 1, '車仔Noodle 半價', '～車仔Noodle 半價～', '', '', 'Screen shot 2011-06-13 at 3.22.51 PM-20110613-152307.png', '2011-06-13', '00:00:00', '2011-06-30', '00:00:00', 1, '2011-06-13 15:24:39', '2011-06-13 15:24:39'),
(7, 8, '', 1000, '', 1000, 0, '《Transformer之黑狗回歸》$30元', '～《Transformer之黑狗回歸》$30元～', '', '1. 不可跟其他優惠一拼使用\r\n2. 不可在星期日使用\r\n3. 不可換現金\r\n4. 不可重複使用', '', '2011-06-13', '00:00:00', '2011-06-26', '00:00:00', 1, '2011-06-13 15:26:38', '2011-06-13 15:28:05'),
(7, 9, '', 1000, '', 200, 0, '《Time Is Up》$30元', '~《Time Is Up》$30元~', '', '', '', '2011-06-03', '00:00:00', '2011-06-30', '00:00:00', 1, '2011-06-13 15:27:50', '2011-06-13 15:27:50'),
(7, 10, '', 1000, 'AA', 1000, 0, '《Endless Love》$40元', '~《Endless Love》$40元~', '', '', '', '2011-06-13', '00:00:00', '2011-06-29', '00:00:00', 1, '2011-06-13 15:29:35', '2011-06-13 15:29:35'),
(6, 11, '', 100, 'W', 60, 0, '送喜力一支', '～送喜力一支～', '', '', '', '2011-06-10', '00:00:00', '2011-06-20', '00:00:00', 1, '2011-06-13 15:31:06', '2011-06-13 15:31:06'),
(12, 12, '', 100, '', 100, 0, 'Promotion today', '90% Off', '', '', '', '2011-06-18', '08:30:00', '2011-06-30', '06:30:00', 1, '2011-06-18 18:44:47', '2011-06-18 18:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `logo` varchar(256) NOT NULL COMMENT 'logo image',
  `sn` varchar(256) NOT NULL COMMENT 'shop name',
  `cp` varchar(64) NOT NULL COMMENT 'contact person',
  `tn` varchar(32) NOT NULL COMMENT 'telephone number',
  `fb_page` text NOT NULL COMMENT 'Facebook page''s URL',
  `fb_page_id` varchar(64) NOT NULL COMMENT 'Facebook page''s ID',
  `industry` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 --- inactive, 1 --- active',
  `added_by` varchar(16) NOT NULL,
  `group` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 --- standard client, 1 --- operator client, 2 --- super client',
  `creation_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `display_order` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `password`, `email`, `logo`, `sn`, `cp`, `tn`, `fb_page`, `fb_page_id`, `industry`, `status`, `added_by`, `group`, `creation_date`, `modified_date`, `display_order`) VALUES
(3, 'horry', 'adminpass', 'horry@soldgood.com', '4df5b61539238.png', 'Admin', 'Admin', '', '', '', 100, 1, '', 2, '0000-00-00 00:00:00', '2011-06-13 15:02:45', 0),
(4, 'operator', 'adminpass', 'info@soldgood.com', '4df5b61e565d0.png', 'Operator', 'Mr. Operator', '', '', '', 100, 1, 'horry', 1, '0000-00-00 00:00:00', '2011-06-13 15:02:54', 0),
(5, 'terence', 'adminpass', 'terence@soldgood.com', '4df5b62520ca2.png', 'Terence', 'Admin', '', '', '', 100, 1, 'horry', 2, '0000-00-00 00:00:00', '2011-06-13 15:03:01', 0),
(6, '157427524313119', 'password', '', '4df5b62e7b152.png', '熊貓吧', '熊貓吧', '', 'http://www.facebook.com/pages/熊貓吧/157427524313119', '157427524313119', 4, 1, 'horry', 0, '0000-00-00 00:00:00', '2011-06-13 15:03:10', 1),
(7, '182484618459910', 'password', '', '4df5b63747f69.png', '凱都戲院', '凱都戲院', '', 'http://www.facebook.com/pages/凱都戲院/182484618459910', '182484618459910', 4, 1, 'horry', 0, '0000-00-00 00:00:00', '2011-06-13 15:03:19', 2),
(8, '194938650519371', 'password', '', '4df5b642e1a50.png', '小蜜蜂車仔麵', '小蜜蜂車仔麵', '', 'http://www.facebook.com/pages/小蜜蜂車仔麵/194938650519371', '194938650519371', 1, 1, 'horry', 0, '0000-00-00 00:00:00', '2011-06-13 15:03:30', 0),
(9, '132072563524534', 'password', '', '4df5b648ce153.png', '海倫美容減肥中心', '海倫美容減肥中心', '', 'http://www.facebook.com/pages/\\u0025E6\\u0025B5\\u0025B7\\u0025E5\\u002580\\u0025AB\\u0025E7\\u0025BE\\u00258E\\u0025E5\\u0025AE\\u0025B9\\u0025E6\\u0025B8\\u00259B\\u0025E8\\u002582\\u0025A5\\u0025E4\\u0025B8\\u0025AD\\u0025E5\\u0025BF\\u002583/132072563524534', '132072563524534', 100, 1, 'horry', 0, '0000-00-00 00:00:00', '2011-06-13 15:03:36', 0),
(10, '190460634333432', 'password', '', 'Screen shot 2011-06-13 at 3.19.16 PM-20110613-151932.png', 'Shell-油站', 'Shell-油站', '', 'http://www.facebook.com/pages/Shell-油站/190460634333432', '190460634333432', 3, 1, 'horry', 0, '0000-00-00 00:00:00', '2011-06-13 15:20:46', 0),
(11, '146964052032255', 'password', '', '4df5b655458f2.png', 'Barber Salon 執髮者', 'Barber Salon 執髮者', '', 'http://www.facebook.com/pages/Barber-Salon-執髮者/146964052032255', '146964052032255', 2, 1, 'horry', 0, '0000-00-00 00:00:00', '2011-06-13 15:03:49', 0),
(12, 'LKF', 'password', '', '4dfc7f56a950c.png', 'LKF', 'LKF', '', 'http://www.facebook.com/pages/Lan-Kwai-Fong/162141867150653', '162141867150653', 3, 1, 'operator', 0, '0000-00-00 00:00:00', '2011-06-18 18:35:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupons_released`
--

CREATE TABLE IF NOT EXISTS `coupons_released` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL COMMENT 'offer id',
  `coupon_id` int(11) NOT NULL,
  `fb_uid` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `coupons_released`
--

INSERT INTO `coupons_released` (`id`, `oid`, `coupon_id`, `fb_uid`) VALUES
(118, 6, 1, '1344241462'),
(119, 7, 1, '1344241462');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE IF NOT EXISTS `industries` (
  `id` int(11) NOT NULL,
  `language` varchar(32) NOT NULL,
  `symbol` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `language`, `symbol`) VALUES
(1, 'English', 'Catering'),
(2, 'English', 'Hair Styling'),
(3, 'English', 'Retail'),
(4, 'English', 'Entertainment'),
(1, 'Chinese (Hong Kong S.A.R.)', '飲食'),
(2, 'Chinese (Hong Kong S.A.R.)', '髮型'),
(3, 'Chinese (Hong Kong S.A.R.)', '零售'),
(4, 'Chinese (Hong Kong S.A.R.)', '娛樂'),
(100, 'English', 'Others'),
(100, 'Chinese (Hong Kong S.A.R.)', '其他');

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE IF NOT EXISTS `operators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `login` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(128) NOT NULL,
  `group` int(2) NOT NULL COMMENT '0 --- standard operator, 1 --- super operator',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`id`, `name`, `login`, `password`, `email`, `group`, `status`) VALUES
(1, 'Horry Chan', 'horry', 'adminpass', 'horry@soldgood.com', 1, 1),
(2, 'Standard Operator', 'operator', 'password', 'info@soldgood.com', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL,
  `language` varchar(32) NOT NULL,
  `symbol` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `language`, `symbol`) VALUES
(0, 'English', 'Inactive'),
(0, 'Chinese (Hong Kong S.A.R.)', '無效的'),
(1, 'English', 'Active'),
(1, 'Chinese (Hong Kong S.A.R.)', '有效的');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(128) NOT NULL,
  `email` varchar(256) CHARACTER SET ucs2 NOT NULL,
  `fb_uid` varchar(64) NOT NULL,
  `dt` varchar(64) NOT NULL,
  `dui` varchar(64) NOT NULL,
  `gender` varchar(16) NOT NULL,
  PRIMARY KEY (`fb_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
