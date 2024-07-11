-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2013 at 04:49 PM
-- Server version: 5.5.22-0ubuntu1
-- PHP Version: 5.3.10-1ubuntu3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sp`
--
CREATE DATABASE `sp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sp`;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(11) NOT NULL,
  `value` varchar(32) CHARACTER SET utf8 NOT NULL,
  `zone_id` int(11) NOT NULL,
  `language_type` varchar(64) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `value`, `zone_id`, `language_type`) VALUES
(1, '西貢', 1, 'Chinese (Hong Kong S.A.R.)'),
(2, '將軍澳', 1, 'Chinese (Hong Kong S.A.R.)'),
(3, '馬鞍山', 1, 'Chinese (Hong Kong S.A.R.)'),
(4, '沙田/大圍', 1, 'Chinese (Hong Kong S.A.R.)'),
(5, '大埔/太和', 1, 'Chinese (Hong Kong S.A.R.)'),
(6, '火炭', 1, 'Chinese (Hong Kong S.A.R.)'),
(7, '粉嶺', 1, 'Chinese (Hong Kong S.A.R.)'),
(8, '上水', 1, 'Chinese (Hong Kong S.A.R.)'),
(9, '元朗', 1, 'Chinese (Hong Kong S.A.R.)'),
(10, '天水圍', 1, 'Chinese (Hong Kong S.A.R.)'),
(11, '屯門', 1, 'Chinese (Hong Kong S.A.R.)'),
(12, '深井', 1, 'Chinese (Hong Kong S.A.R.)'),
(13, '馬灣', 1, 'Chinese (Hong Kong S.A.R.)'),
(14, '荃灣', 1, 'Chinese (Hong Kong S.A.R.)'),
(15, '葵涌', 1, 'Chinese (Hong Kong S.A.R.)'),
(16, '愉景灣', 1, 'Chinese (Hong Kong S.A.R.)'),
(17, '東涌', 1, 'Chinese (Hong Kong S.A.R.)'),
(18, '青衣', 1, 'Chinese (Hong Kong S.A.R.)'),
(19, '牛池灣', 2, 'Chinese (Hong Kong S.A.R.)'),
(20, '九龍灣', 2, 'Chinese (Hong Kong S.A.R.)'),
(21, '觀塘', 2, 'Chinese (Hong Kong S.A.R.)'),
(22, '藍田', 2, 'Chinese (Hong Kong S.A.R.)'),
(23, '油塘', 2, 'Chinese (Hong Kong S.A.R.)'),
(24, '新蒲崗', 2, 'Chinese (Hong Kong S.A.R.)'),
(25, '秀茂坪', 2, 'Chinese (Hong Kong S.A.R.)'),
(26, '樂富', 2, 'Chinese (Hong Kong S.A.R.)'),
(27, '黃大仙', 2, 'Chinese (Hong Kong S.A.R.)'),
(28, '鑽石山', 2, 'Chinese (Hong Kong S.A.R.)'),
(29, '紅磡', 2, 'Chinese (Hong Kong S.A.R.)'),
(30, '九龍城', 2, 'Chinese (Hong Kong S.A.R.)'),
(31, '土瓜灣', 2, 'Chinese (Hong Kong S.A.R.)'),
(32, '九龍塘', 2, 'Chinese (Hong Kong S.A.R.)'),
(33, '何文田', 2, 'Chinese (Hong Kong S.A.R.)'),
(34, '又一村', 2, 'Chinese (Hong Kong S.A.R.)'),
(35, '石硤尾', 2, 'Chinese (Hong Kong S.A.R.)'),
(36, '深水埗', 2, 'Chinese (Hong Kong S.A.R.)'),
(37, '長沙灣', 2, 'Chinese (Hong Kong S.A.R.)'),
(38, '荔枝角', 2, 'Chinese (Hong Kong S.A.R.)'),
(39, '美孚', 2, 'Chinese (Hong Kong S.A.R.)'),
(40, '大角咀', 2, 'Chinese (Hong Kong S.A.R.)'),
(41, '奧運', 2, 'Chinese (Hong Kong S.A.R.)'),
(42, '九龍站', 2, 'Chinese (Hong Kong S.A.R.)'),
(43, '油麻地', 2, 'Chinese (Hong Kong S.A.R.)'),
(44, '太子', 2, 'Chinese (Hong Kong S.A.R.)'),
(45, '旺角', 2, 'Chinese (Hong Kong S.A.R.)'),
(46, '佐敦', 2, 'Chinese (Hong Kong S.A.R.)'),
(47, '尖沙咀', 2, 'Chinese (Hong Kong S.A.R.)'),
(48, '大潭', 3, 'Chinese (Hong Kong S.A.R.)'),
(49, '赤柱', 3, 'Chinese (Hong Kong S.A.R.)'),
(50, '淺水灣', 3, 'Chinese (Hong Kong S.A.R.)'),
(51, '薄扶林', 3, 'Chinese (Hong Kong S.A.R.)'),
(52, '壽臣山', 3, 'Chinese (Hong Kong S.A.R.)'),
(53, '香港仔', 3, 'Chinese (Hong Kong S.A.R.)'),
(54, '南區', 3, 'Chinese (Hong Kong S.A.R.)'),
(55, '山頂', 3, 'Chinese (Hong Kong S.A.R.)'),
(56, '西半山', 3, 'Chinese (Hong Kong S.A.R.)'),
(57, '西區', 3, 'Chinese (Hong Kong S.A.R.)'),
(58, '堅尼地城', 3, 'Chinese (Hong Kong S.A.R.)'),
(59, '上環', 3, 'Chinese (Hong Kong S.A.R.)'),
(60, '西營盤', 3, 'Chinese (Hong Kong S.A.R.)'),
(61, '西環', 3, 'Chinese (Hong Kong S.A.R.)'),
(62, '中環', 3, 'Chinese (Hong Kong S.A.R.)'),
(63, '中半山', 3, 'Chinese (Hong Kong S.A.R.)'),
(64, '金鐘', 3, 'Chinese (Hong Kong S.A.R.)'),
(65, '灣仔', 3, 'Chinese (Hong Kong S.A.R.)'),
(66, '銅鑼灣', 3, 'Chinese (Hong Kong S.A.R.)'),
(67, '跑馬地', 3, 'Chinese (Hong Kong S.A.R.)'),
(68, '渣甸山', 3, 'Chinese (Hong Kong S.A.R.)'),
(69, '大坑', 3, 'Chinese (Hong Kong S.A.R.)'),
(70, '北角', 3, 'Chinese (Hong Kong S.A.R.)'),
(71, '北角半山', 3, 'Chinese (Hong Kong S.A.R.)'),
(72, '天后', 3, 'Chinese (Hong Kong S.A.R.)'),
(73, '西灣河', 3, 'Chinese (Hong Kong S.A.R.)'),
(74, '炮台山', 3, 'Chinese (Hong Kong S.A.R.)'),
(75, '鰂魚涌', 3, 'Chinese (Hong Kong S.A.R.)'),
(76, '筲箕灣', 3, 'Chinese (Hong Kong S.A.R.)'),
(77, '柴灣', 3, 'Chinese (Hong Kong S.A.R.)'),
(78, '愉景灣', 4, 'Chinese (Hong Kong S.A.R.)'),
(79, '東涌', 4, 'Chinese (Hong Kong S.A.R.)'),
(80, '南丫島', 4, 'Chinese (Hong Kong S.A.R.)'),
(81, '長洲', 4, 'Chinese (Hong Kong S.A.R.)'),
(82, '大嶼山', 4, 'Chinese (Hong Kong S.A.R.)'),
(1, '西貢', 1, 'English'),
(2, '將軍澳', 1, 'English'),
(3, '馬鞍山', 1, 'English'),
(4, '沙田/大圍', 1, 'English'),
(5, '大埔/太和', 1, 'English'),
(6, '火炭', 1, 'English'),
(7, 'Fanling', 1, 'English'),
(8, '上水', 1, 'English'),
(9, 'Yuen Long', 1, 'English'),
(10, '天水圍', 1, 'English'),
(11, 'Tuen Mun', 1, 'English'),
(12, '深井', 1, 'English'),
(13, '馬灣', 1, 'English'),
(14, 'Tsuen Wan', 1, 'English'),
(15, '葵涌', 1, 'English'),
(16, '愉景灣', 1, 'English'),
(17, '東涌', 1, 'English'),
(18, '青衣', 1, 'English'),
(19, '牛池灣', 2, 'English'),
(20, 'Kowloon Bay', 2, 'English'),
(21, '觀塘', 2, 'English'),
(22, '藍田', 2, 'English'),
(23, '油塘', 2, 'English'),
(24, '新蒲崗', 2, 'English'),
(25, '秀茂坪', 2, 'English'),
(26, '樂富', 2, 'English'),
(27, '黃大仙', 2, 'English'),
(28, 'Diamond Hill', 2, 'English'),
(29, '紅磡', 2, 'English'),
(30, '九龍城', 2, 'English'),
(31, '土瓜灣', 2, 'English'),
(32, 'Kowloon Tong', 2, 'English'),
(33, '何文田', 2, 'English'),
(34, '又一村', 2, 'English'),
(35, '石硤尾', 2, 'English'),
(36, '深水埗', 2, 'English'),
(37, '長沙灣', 2, 'English'),
(38, '荔枝角', 2, 'English'),
(39, '美孚', 2, 'English'),
(40, '大角咀', 2, 'English'),
(41, '奧運', 2, 'English'),
(42, '九龍站', 2, 'English'),
(43, '油麻地', 2, 'English'),
(44, '太子', 2, 'English'),
(45, '旺角', 2, 'English'),
(46, '佐敦', 2, 'English'),
(47, '尖沙咀', 2, 'English'),
(48, '大潭', 3, 'English'),
(49, '赤柱', 3, 'English'),
(50, '淺水灣', 3, 'English'),
(51, '薄扶林', 3, 'English'),
(52, '壽臣山', 3, 'English'),
(53, '香港仔', 3, 'English'),
(54, '南區', 3, 'English'),
(55, '山頂', 3, 'English'),
(56, '西半山', 3, 'English'),
(57, '西區', 3, 'English'),
(58, '堅尼地城', 3, 'English'),
(59, '上環', 3, 'English'),
(60, '西營盤', 3, 'English'),
(61, '西環', 3, 'English'),
(62, 'Central', 3, 'English'),
(63, '中半山', 3, 'English'),
(64, '金鐘', 3, 'English'),
(65, '灣仔', 3, 'English'),
(66, '銅鑼灣', 3, 'English'),
(67, '跑馬地', 3, 'English'),
(68, '渣甸山', 3, 'English'),
(69, '大坑', 3, 'English'),
(70, '北角', 3, 'English'),
(71, '北角半山', 3, 'English'),
(72, '天后', 3, 'English'),
(73, '西灣河', 3, 'English'),
(74, '炮台山', 3, 'English'),
(75, '鰂魚涌', 3, 'English'),
(76, '筲箕灣', 3, 'English'),
(77, '柴灣', 3, 'English'),
(78, '愉景灣', 4, 'English'),
(79, '東涌', 4, 'English'),
(80, '南丫島', 4, 'English'),
(81, '長洲', 4, 'English'),
(82, '大嶼山', 4, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `heights`
--

CREATE TABLE IF NOT EXISTS `heights` (
  `id` int(11) NOT NULL,
  `value` varchar(32) CHARACTER SET utf8 NOT NULL,
  `language_type` varchar(64) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `heights`
--

INSERT INTO `heights` (`id`, `value`, `language_type`) VALUES
(1, '高', 'Chinese (Hong Kong S.A.R.)'),
(2, '中', 'Chinese (Hong Kong S.A.R.)'),
(3, '低', 'Chinese (Hong Kong S.A.R.)'),
(1, 'High', 'English'),
(2, 'Middle', 'English'),
(3, 'Low', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `identity`
--

CREATE TABLE IF NOT EXISTS `identity` (
  `id` int(11) NOT NULL,
  `value` varchar(32) CHARACTER SET utf8 NOT NULL,
  `language_type` varchar(64) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identity`
--

INSERT INTO `identity` (`id`, `value`, `language_type`) VALUES
(1, '個人業主', 'Chinese (Hong Kong S.A.R.)'),
(2, '地產代理', 'Chinese (Hong Kong S.A.R.)'),
(1, 'Owner', 'English'),
(2, 'Agent', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `message_types`
--

CREATE TABLE IF NOT EXISTS `message_types` (
  `id` int(11) NOT NULL,
  `value` varchar(128) CHARACTER SET utf8 NOT NULL,
  `language_type` varchar(64) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_types`
--

INSERT INTO `message_types` (`id`, `value`, `language_type`) VALUES
(1, '電郵給放盤人', 'Chinese (Hong Kong S.A.R.)'),
(2, '只顯示於留言版上', 'Chinese (Hong Kong S.A.R.)'),
(3, '以上兩者皆是', 'Chinese (Hong Kong S.A.R.)'),
(1, 'Only sends an e-mail to the holder', 'English'),
(2, 'Only displays on the board', 'English'),
(3, 'Both of the above', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `cn` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT 'contact number',
  `type_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `property_states`
--

CREATE TABLE IF NOT EXISTS `property_states` (
  `id` int(11) NOT NULL,
  `value` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `language_type` varchar(64) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_states`
--

INSERT INTO `property_states` (`id`, `value`, `language_type`) VALUES
(1, '空置', 'Chinese (Hong Kong S.A.R.)'),
(2, '連租約', 'Chinese (Hong Kong S.A.R.)'),
(3, '已賣', 'Chinese (Hong Kong S.A.R.)'),
(1, 'Empty', 'English'),
(2, 'Rented', 'English'),
(3, 'Sold', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `seekers`
--

CREATE TABLE IF NOT EXISTS `seekers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `cn` varchar(32) CHARACTER SET utf8 DEFAULT NULL COMMENT 'contact number',
  `estate` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `remark` text CHARACTER SET utf8,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE IF NOT EXISTS `supplies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `supply_mode_id` int(11) DEFAULT NULL,
  `support_type_id` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `address` text CHARACTER SET utf8,
  `unit_price` int(11) DEFAULT NULL,
  `years` float DEFAULT NULL,
  `rc` int(11) DEFAULT NULL COMMENT 'room count',
  `hc` int(11) DEFAULT NULL COMMENT 'hall count',
  `sf` float DEFAULT NULL COMMENT 'security fee',
  `height_id` int(11) DEFAULT NULL,
  `ps_id` int(1) DEFAULT NULL COMMENT 'property state id',
  `feature` text CHARACTER SET utf8,
  `remark` text CHARACTER SET utf8,
  `icon` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `pic1` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `pic2` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `pic3` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `pic4` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `pic5` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `pic6` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `pic7` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `pic8` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `estate`, `zone_id`, `district_id`, `supply_mode_id`, `support_type_id`, `area`, `address`, `unit_price`, `years`, `rc`, `hc`, `sf`, `height_id`, `ps_id`, `feature`, `remark`, `icon`, `pic1`, `pic2`, `pic3`, `pic4`, `pic5`, `pic6`, `pic7`, `pic8`, `user_id`, `creation_date`, `modified_date`) VALUES
(1, '天X苑', 1, 10, 1, 3, 600, '', 1750000, NULL, NULL, NULL, NULL, 1, 1, '', '', 'Sunset-20110829-184149.jpg', 'Water lilies-20110829-184153.jpg', 'Screen shot 2012-01-18 at 8.23.51 PM-20120118-202419.png', '111-20120118-202800.png', '', '', '', '', '', 1, '2011-08-29 18:44:36', '2012-01-18 20:41:13'),
(2, '長沙灣 - 金碧閣', 2, 37, 1, 2, 372, '元州街482-492號', 2280000, NULL, 2, 1, 510, 3, 1, '', '', 's1-20111219-171534.png', 's1-20111219-170959.png', 's2-20111219-171003.png', '', '', '', '', '', '', 1, '2011-12-19 17:11:11', '2011-12-19 17:26:31'),
(3, '天X苑', 1, 10, 1, 3, 600, '', 1750000, NULL, NULL, NULL, NULL, 1, 1, '', '', 'Sunset-20110829-184149.jpg', 'Water lilies-20110829-184153.jpg', '', '', '', '', '', '', '', 1, '2011-08-29 18:44:36', '2011-08-30 16:36:13'),
(4, '長沙灣 - 金碧閣', 2, 37, 1, 2, 372, '元州街482-492號', 2280000, NULL, 2, 1, 510, 3, 1, '', '', 's1-20111219-171534.png', 's1-20111219-170959.png', 's2-20111219-171003.png', '', '', '', '', '', '', 1, '2011-12-19 17:11:11', '2011-12-19 17:26:31'),
(5, '天X苑', 1, 10, 1, 3, 600, '', 1750000, NULL, NULL, NULL, NULL, 1, 1, '', '', 'Sunset-20110829-184149.jpg', 'Water lilies-20110829-184153.jpg', '', '', '', '', '', '', '', 1, '2011-08-29 18:44:36', '2011-08-30 16:36:13'),
(6, '長沙灣 - 金碧閣', 2, 37, 1, 2, 372, '元州街482-492號', 2280000, NULL, 2, 1, 510, 3, 1, '', '', 's1-20111219-171534.png', 's1-20111219-170959.png', 's2-20111219-171003.png', '', '', '', '', '', '', 1, '2011-12-19 17:11:11', '2011-12-19 17:26:31'),
(7, '天X苑', 1, 10, 1, 3, 600, '', 1750000, NULL, NULL, NULL, NULL, 1, 1, '', '', 'Sunset-20110829-184149.jpg', 'Water lilies-20110829-184153.jpg', '', '', '', '', '', '', '', 1, '2011-08-29 18:44:36', '2011-08-30 16:36:13'),
(8, '長沙灣 - 金碧閣', 2, 37, 1, 2, 372, '元州街482-492號', 2280000, NULL, 2, 1, 510, 3, 1, '', '', 's1-20111219-171534.png', 's1-20111219-170959.png', 's2-20111219-171003.png', '', '', '', '', '', '', 1, '2011-12-19 17:11:11', '2011-12-19 17:26:31'),
(9, '天X苑', 1, 10, 1, 3, 600, '', 1750000, NULL, NULL, NULL, NULL, 1, 1, '', '', 'Sunset-20110829-184149.jpg', 'Water lilies-20110829-184153.jpg', '', '', '', '', '', '', '', 1, '2011-08-29 18:44:36', '2011-08-30 16:36:13'),
(10, '長沙灣 - 金碧閣', 2, 37, 1, 2, 372, '元州街482-492號', 2280000, NULL, 2, 1, 510, 3, 1, '', '', 's1-20111219-171534.png', 's1-20111219-170959.png', 's2-20111219-171003.png', '', '', '', '', '', '', 1, '2011-12-19 17:11:11', '2011-12-19 17:26:31'),
(11, '天X苑', 1, 10, 1, 3, 600, '', 1750000, NULL, NULL, NULL, NULL, 1, 1, '', '', 'Sunset-20110829-184149.jpg', 'Water lilies-20110829-184153.jpg', '', '', '', '', '', '', '', 1, '2011-08-29 18:44:36', '2011-08-30 16:36:13'),
(12, '長沙灣 - 金碧閣', 2, 37, 1, 2, 372, '元州街482-492號', 2280000, NULL, 2, 1, 510, 3, 1, '', '', 's1-20111219-171534.png', 's1-20111219-170959.png', 's2-20111219-171003.png', '', '', '', '', '', '', 1, '2011-12-19 17:11:11', '2011-12-19 17:26:31'),
(13, '天X苑', 1, 10, 1, 3, 600, '', 1750000, NULL, NULL, NULL, NULL, 1, 1, '', '', 'Sunset-20110829-184149.jpg', 'Water lilies-20110829-184153.jpg', '', '', '', '', '', '', '', 1, '2011-08-29 18:44:36', '2011-08-30 16:36:13'),
(14, '長沙灣 - 金碧閣', 2, 37, 1, 2, 372, '元州街482-492號', 2280000, NULL, 2, 1, 510, 3, 1, '', '', 's1-20111219-171534.png', 's1-20111219-170959.png', 's2-20111219-171003.png', '', '', '', '', '', '', 1, '2011-12-19 17:11:11', '2011-12-19 17:26:31'),
(15, '天X苑', 1, 10, 1, 3, 600, '', 1750000, NULL, NULL, NULL, NULL, 1, 1, '', '', 'Sunset-20110829-184149.jpg', 'Water lilies-20110829-184153.jpg', '', '', '', '', '', '', '', 1, '2011-08-29 18:44:36', '2011-08-30 16:36:13'),
(16, '長沙灣 - 金碧閣', 2, 37, 1, 2, 372, '元州街482-492號', 2280000, NULL, 2, 1, 510, 3, 1, '', '', 's1-20111219-171534.png', 's1-20111219-170959.png', 's2-20111219-171003.png', '', '', '', '', '', '', 1, '2011-12-19 17:11:11', '2011-12-19 17:26:31'),
(17, '天X苑', 1, 10, 1, 3, 600, '', 1750000, NULL, NULL, NULL, NULL, 1, 1, '', '', 'Sunset-20110829-184149.jpg', 'Water lilies-20110829-184153.jpg', '', '', '', '', '', '', '', 1, '2011-08-29 18:44:36', '2011-08-30 16:36:13'),
(18, '長沙灣 - 金碧閣', 2, 37, 1, 2, 372, '元州街482-492號', 2280000, NULL, 2, 1, 510, 3, 1, '', '', 's1-20111219-171534.png', 's1-20111219-170959.png', 's2-20111219-171003.png', '', '', '', '', '', '', 1, '2011-12-19 17:11:11', '2011-12-19 17:26:31'),
(19, '天X苑', 1, 10, 1, 3, 600, '', 1750000, NULL, NULL, NULL, NULL, 1, 1, '', '', 'Sunset-20110829-184149.jpg', 'Water lilies-20110829-184153.jpg', '', '', '', '', '', '', '', 1, '2011-08-29 18:44:36', '2011-08-30 16:36:13'),
(20, '長沙灣 - 金碧閣', 2, 37, 1, 2, 372, '元州街482-492號', 2280000, NULL, 2, 1, 510, 3, 1, '', '', 's1-20111219-171534.png', 's1-20111219-170959.png', 's2-20111219-171003.png', '', '', '', '', '', '', 1, '2011-12-19 17:11:11', '2011-12-19 17:26:31'),
(21, '天X苑', 1, 10, 1, 3, 600, '', 1750000, NULL, NULL, NULL, NULL, 1, 1, '', '', 'Sunset-20110829-184149.jpg', 'Water lilies-20110829-184153.jpg', '', '', '', '', '', '', '', 1, '2011-08-29 18:44:36', '2011-08-30 16:36:13'),
(22, '長沙灣 - 金碧閣', 2, 37, 1, 2, 372, '元州街482-492號', 2280000, NULL, 2, 1, 510, 3, 1, '', '', 's1-20111219-171534.png', 's1-20111219-170959.png', 's2-20111219-171003.png', '', '', '', '', '', '', 1, '2011-12-19 17:11:11', '2011-12-19 17:26:31'),
(23, '天X苑', 1, 10, 1, 3, 600, '', 1750000, NULL, NULL, NULL, NULL, 1, 1, '', '', 'Sunset-20110829-184149.jpg', 'Water lilies-20110829-184153.jpg', '', '', '', '', '', '', '', 1, '2011-08-29 18:44:36', '2011-08-30 16:36:13'),
(24, '長沙灣 - 金碧閣', 2, 37, 1, 2, 372, '元州街482-492號', 2280000, NULL, 2, 1, 510, 3, 1, '', '', 's1-20111219-171534.png', 's1-20111219-170959.png', 's2-20111219-171003.png', '', '', '', '', '', '', 1, '2011-12-19 17:11:11', '2011-12-19 17:26:31'),
(25, '天X苑', 1, 10, 1, 3, 600, '', 1750000, NULL, NULL, NULL, NULL, 1, 1, '', '', 'Sunset-20110829-184149.jpg', 'Water lilies-20110829-184153.jpg', '', '', '', '', '', '', '', 1, '2011-08-29 18:44:36', '2011-08-30 16:36:13'),
(26, '長沙灣 - 金碧閣', 2, 37, 1, 2, 372, '元州街482-492號', 2280000, NULL, 2, 1, 510, 3, 1, '', '', 's1-20111219-171534.png', 's1-20111219-170959.png', 's2-20111219-171003.png', '', '', '', '', '', '', 1, '2011-12-19 17:11:11', '2011-12-19 17:26:31'),
(27, '天X苑', 1, 10, 1, 3, 600, '', 1750000, NULL, NULL, NULL, NULL, 1, 1, '', '', 'Sunset-20110829-184149.jpg', 'Water lilies-20110829-184153.jpg', '', '', '', '', '', '', '', 1, '2011-08-29 18:44:36', '2011-08-30 16:36:13'),
(28, '長沙灣 - 金碧閣', 2, 37, 1, 2, 372, '元州街482-492號', 2280000, NULL, 2, 1, 510, 3, 1, '', '', 's1-20111219-171534.png', 's1-20111219-170959.png', 's2-20111219-171003.png', '', '', '', '', '', '', 1, '2011-12-19 17:11:11', '2011-12-19 17:26:31'),
(29, '天X苑', 1, 10, 1, 3, 600, '', 1750000, NULL, NULL, NULL, NULL, 1, 1, '', '', 'Sunset-20110829-184149.jpg', 'Water lilies-20110829-184153.jpg', '', '', '', '', '', '', '', 1, '2011-08-29 18:44:36', '2011-08-30 16:36:13'),
(30, '長沙灣 - 金碧閣', 2, 37, 1, 2, 372, '元州街482-492號', 2800, NULL, 2, 1, 510, 3, 1, '', '', 's1-20111219-171534.png', 's1-20111219-170959.png', 's2-20111219-171003.png', '', '', '', '', '', '', 1, '2011-12-19 17:11:11', '2011-12-24 17:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `supply_modes`
--

CREATE TABLE IF NOT EXISTS `supply_modes` (
  `id` int(11) NOT NULL,
  `value` varchar(32) CHARACTER SET utf8 NOT NULL,
  `language_type` varchar(64) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supply_modes`
--

INSERT INTO `supply_modes` (`id`, `value`, `language_type`) VALUES
(1, 'Sell', 'English'),
(2, 'Rent', 'English'),
(1, '賣出', 'Chinese (Hong Kong S.A.R.)'),
(2, '租出', 'Chinese (Hong Kong S.A.R.)');

-- --------------------------------------------------------

--
-- Table structure for table `supply_types`
--

CREATE TABLE IF NOT EXISTS `supply_types` (
  `id` int(11) NOT NULL,
  `value` varchar(32) CHARACTER SET utf8 NOT NULL,
  `language_type` varchar(64) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supply_types`
--

INSERT INTO `supply_types` (`id`, `value`, `language_type`) VALUES
(1, '新樓', 'Chinese (Hong Kong S.A.R.)'),
(2, '私人樓宇', 'Chinese (Hong Kong S.A.R.)'),
(3, '居屋', 'Chinese (Hong Kong S.A.R.)'),
(4, '村屋', 'Chinese (Hong Kong S.A.R.)'),
(5, '公屋', 'Chinese (Hong Kong S.A.R.)'),
(6, '廠廈', 'Chinese (Hong Kong S.A.R.)'),
(7, '商廈', 'Chinese (Hong Kong S.A.R.)'),
(8, '街舖', 'Chinese (Hong Kong S.A.R.)'),
(9, '樓上舖', 'Chinese (Hong Kong S.A.R.)'),
(10, '貨倉', 'Chinese (Hong Kong S.A.R.)'),
(1, 'First-hand Private Flat', 'English'),
(2, 'Second-hand Private Flat', 'English'),
(3, '居屋', 'English'),
(4, '村屋', 'English'),
(5, '公屋', 'English'),
(6, '廠廈', 'English'),
(7, '商廈', 'English'),
(8, '街舖', 'English'),
(9, '樓上舖', 'English'),
(10, '貨倉', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `cn` varchar(32) CHARACTER SET utf8 DEFAULT NULL COMMENT 'contact number',
  `email` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `login` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `icon` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `identity_id` int(11) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `cn`, `email`, `login`, `password`, `icon`, `identity_id`, `creation_date`, `active`) VALUES
(1, 'Horry Chan', '66811137', 'horrychan@gmail.com', 'horry', 'adminpass', '好-20120118-205715.png', 1, NULL, NULL),
(2, '', '', '', 'tester', 'adminpass', NULL, 1, NULL, 1),
(3, 'Horry Chan', '', 'horry@soldgood.com', 'horrychan', 'adminpass', 'Blue hills-20110829-183929.jpg', 2, '2011-08-29 18:40:43', 1),
(4, '陳大文', '', 'horry@soldgood.com', '您好', 'password', NULL, 1, '2011-12-24 22:13:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE IF NOT EXISTS `zones` (
  `id` int(11) NOT NULL,
  `value` varchar(32) CHARACTER SET utf8 NOT NULL,
  `language_type` varchar(64) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `value`, `language_type`) VALUES
(1, '新界', 'Chinese (Hong Kong S.A.R.)'),
(2, '九龍', 'Chinese (Hong Kong S.A.R.)'),
(3, '港島', 'Chinese (Hong Kong S.A.R.)'),
(4, '其他', 'Chinese (Hong Kong S.A.R.)'),
(1, 'N.T.', 'English'),
(2, 'Kowloon', 'English'),
(3, 'Hong Kong Island', 'English'),
(4, 'Other', 'English');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
