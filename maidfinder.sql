-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2016 at 07:15 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maidfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE IF NOT EXISTS `ad` (
  `adid` int(10) unsigned NOT NULL,
  `empid` int(11) DEFAULT NULL,
  `regionid` int(11) DEFAULT NULL,
  `startdate` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `pitch` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dayof` int(11) DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `yearexp` int(11) DEFAULT '0',
  `edlevel` int(11) DEFAULT NULL,
  `jobtypeid` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `salaryid` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0.0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int(10) unsigned NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usertype` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`, `fname`, `lname`, `usertype`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'rexus', 'hahahehe', 'Lourence Rex', 'Traya', 'admin', '2016-09-12 21:06:56', '2016-09-12 21:06:56', NULL),
(2, 'rexus', 'hahahehe', 'Lourence Rex', 'Traya', 'adminstaff', '2016-09-12 21:06:56', '2016-09-12 21:06:56', NULL),
(3, 'jolly', 'hahahehe', 'Jolly Ann', 'Dolloso', 'adminstaff', '2016-09-13 00:14:34', '2016-09-13 00:14:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ad_desc`
--

CREATE TABLE IF NOT EXISTS `ad_desc` (
  `ad_descid` int(10) unsigned NOT NULL,
  `adid` int(11) NOT NULL,
  `desc` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ad_req`
--

CREATE TABLE IF NOT EXISTS `ad_req` (
  `ad_reqid` int(10) unsigned NOT NULL,
  `adid` int(11) NOT NULL,
  `barangay` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `police` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nbi` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nso` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE IF NOT EXISTS `applicant` (
  `appid` int(10) unsigned NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth` varchar(20) COLLATE utf8_unicode_ci DEFAULT '2016-0-1',
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `civilstatus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nbi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profilepic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `backgroundpic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactno` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isVerified` tinyint(1) DEFAULT NULL,
  `ishiring` tinyint(1) DEFAULT NULL,
  `preferedSched` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empType` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expectedSalary` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accountStatus` tinyint(1) DEFAULT NULL,
  `empStatus` tinyint(1) DEFAULT NULL,
  `pitch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regionid` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `lats` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longs` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`appid`, `email`, `password`, `fname`, `lname`, `province`, `address`, `birth`, `gender`, `nationality`, `religion`, `civilstatus`, `nbi`, `profilepic`, `backgroundpic`, `contactno`, `isVerified`, `ishiring`, `preferedSched`, `empType`, `expectedSalary`, `accountStatus`, `empStatus`, `pitch`, `regionid`, `created_at`, `updated_at`, `deleted_at`, `lats`, `longs`, `about`) VALUES
(1, 'leo@gmail.com', 'hahahehe', 'Leo', 'Lastimosas', NULL, NULL, '1998-9-13', 'Male', '2', NULL, '0', NULL, 'leo@gmail.com13700021_1754141688132934_1686246729266795426_n.jpg', NULL, '55552332', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-12 21:13:30', '2016-09-23 07:10:51', NULL, '10.3788215', '123.7062068', NULL),
(2, 'c.kelly@gmail.com', 'hahahehe', 'Kelly', 'Clarkson', NULL, 'Tabonok Talisay', '1999-9-17', 'Male', '1', '2', '2', NULL, 'c.kelly@gmail.comWIN_20150911_12_24_56_Pro.jpg', NULL, '09226663075', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, '2016-09-12 21:21:55', '2016-09-12 21:23:35', NULL, '10.3788215', '123.7062068', NULL),
(3, 'johan.everly@gmail.com', 'hahahehe', 'Everly', 'Johanesen', NULL, 'Don Pedro Cui Street', '2007-8-9', 'Female', '3', '3', '1', 'johan.everly@gmail.com544945_1551656221714816_4117949326822551353_n.jpg', 'johan.everly@gmail.com544945_1551656221714816_4117949326822551353_n.jpg', NULL, '09326748901', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, '2016-09-12 21:24:10', '2016-09-20 01:59:43', NULL, '10.2768737', '123.7428323', NULL),
(4, 'chanel_martinez@gmail.com', 'hahahehe', 'Chanel', 'Martinez', NULL, 'Tacloban province', '1999-11-15', 'Male', '4', '4', '1', NULL, 'chanel_martinez@gmail.comWIN_20150911_12_24_56_Pro.jpg', NULL, '09326748901', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2016-09-12 21:26:47', '2016-09-12 21:27:42', NULL, '10.2394135', '123.6562182', NULL),
(5, 'kimberly12@gmail.com', 'hahahehe', 'Kimberly Lane', 'Diaz', NULL, 'Teguis, Poro, Camotes, Cebu', '2004-3-13', 'Female', '4', '3', '2', NULL, 'kimberly12@gmail.comWIN_20150911_12_24_56_Pro.jpg', NULL, '09326748901', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, '2016-09-12 21:28:38', '2016-09-12 21:31:03', NULL, '10.2722902', '123.5539701', NULL),
(6, 'ephraim23@gmail.com', 'hahahehe', 'Ephraim', 'Cabadsan', NULL, 'Teguis, Poro, Camotes', '2003-8-12', 'Male', '2', '3', '1', NULL, 'ephraim23@gmail.comWIN_20160902_12_33_03_Pro.jpg', NULL, '09326748901', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2016-09-12 21:43:05', '2016-09-12 21:43:50', NULL, '10.3077593', '123.6604001', NULL),
(7, 'j.alce@yahoo.com', 'hahahehe', 'Jossie', 'Alce', NULL, 'Guadalupe Hillws', '2009-9-9', 'Male', '3', '2', '1', NULL, 'j.alce@yahoo.comWIN_20160902_12_24_07_Pro.jpg', NULL, '09326748901', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, '2016-09-12 21:45:59', '2016-09-12 21:46:50', NULL, '10.2609094', '123.9328609', NULL),
(8, 'felixthevirgin@yahoo.com', 'hahahehe', 'Felix', 'Custodio', NULL, 'Tabok St. Pier III', '1985-8-15', 'Male', '1', '3', '2', NULL, 'felixthevirgin@yahoo.com20150915_130725.jpg', NULL, '09089726379', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, '2016-09-12 21:47:01', '2016-09-12 21:47:42', NULL, '10.2481595', '123.9395786', NULL),
(9, 'tecson.al@gmail.com', 'hahahehe', 'Algem', 'Tecson', NULL, '09226663075', '2001-9-14', 'Male', '3', '3', '2', NULL, 'tecson.al@gmail.comWIN_20150911_12_24_56_Pro.jpg', NULL, '09326748901', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, '2016-09-12 21:48:48', '2016-09-12 21:49:27', NULL, '10.3219489', '123.9634287', NULL),
(10, 'legaliseweed@yahoo.com', 'hahahehe', 'Dookie', 'Matthew', NULL, 'Gorabels St. Korak', '2005-9-17', 'Male', '1', '2', '1', NULL, 'legaliseweed@yahoo.com20160720_111521.jpg', NULL, '090232344231', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-09-12 21:49:17', '2016-09-12 21:49:55', NULL, '10.4129131', '123.8910112', NULL),
(11, 'bryan@gmail.com', 'hahahehe', 'Bryan', 'Tabanao', NULL, 'Highway N. Bacalso', '1985-10-17', 'Male', '1', '2', '0', NULL, 'bryan@gmail.comScreenshotColoringGradients.jpg', NULL, '471323452', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-09-12 23:25:24', '2016-09-12 23:26:11', NULL, '10.5297191', '123.8769033', NULL),
(12, 'kilawin23@yahoo.com', 'hahahehe', 'Mariolito', 'Sacar', NULL, 'Eskena Japan', '1999-11-13', 'Male', '1', '2', '1', NULL, 'kilawin23@yahoo.com20150918_022906.jpg', NULL, '0934838870', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-09-12 23:39:36', '2016-09-12 23:40:26', NULL, '10.8525783', '123.8761961', NULL),
(13, 'henrylhuiler@yahoo.com', 'hahahehe', 'Henry', 'Dein', NULL, 'Jhon Kell', '1998-9-16', 'Male', '1', '2', '0', NULL, 'henrylhuiler@yahoo.com20160725_115949.jpg', NULL, '009843347839', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2016-09-12 23:48:51', '2016-09-12 23:49:22', NULL, '11.0278687', '123.9289637', NULL),
(14, 'chelaine23@gmail.com', 'hahahehe', 'Chelaine', 'Dagohoy', NULL, 'Kilawon Tika', '1982-9-1', 'Female', '1', '2', '0', NULL, 'chelaine23@gmail.comedit.jpg', NULL, '0903483747887', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2016-09-12 23:54:33', '2016-09-12 23:55:18', NULL, NULL, NULL, NULL),
(15, 'celVal23@yahoo.com', 'hahahehe', 'Celroni', 'Vallarta', NULL, 'Escario Ext.', '1999-9-18', 'Male', '1', '2', '1', NULL, 'celVal23@yahoo.comview.png', NULL, '09023299492', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2016-09-13 00:01:15', '2016-09-13 00:01:59', NULL, NULL, NULL, NULL),
(16, 'hellonmyface@yahoo.com', 'hahahehe', 'Cinderella', 'Shoes', NULL, 'Highway Colon 138 Mall', '1978-11-15', 'Male', '1', '3', '1', NULL, 'hellonmyface@yahoo.com20160720_112343.jpg', NULL, '47148293894', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, '2016-09-13 00:06:51', '2016-09-13 00:07:22', NULL, NULL, NULL, NULL),
(17, 'laksdj@yahoo.com', 'hahahehe', 'asdasd', 'asdasd', NULL, 'asdasd', '1970-8-14', 'Female', '2', '1', '2', 'laksdj@yahoo.comprogramming-languages.jpg', 'laksdj@yahoo.comprogramming-languages.jpg', NULL, '23123', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, '2016-09-15 09:43:52', '2016-09-19 01:19:52', NULL, NULL, NULL, NULL),
(18, 'leonardo@gmail.com', 'hahahehe', 'Leonardo', 'Traya', NULL, 'Calumpit, Bulacan', '1973-5-14', 'Male', '3', '2', '0', NULL, 'leonardo@gmail.comr0064LynW1GvuVJ8eUdhKsD_XTJtWgAxtDwOBnmlC5E.jpg', NULL, '09226663075', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, '2016-09-16 20:39:08', '2016-09-16 20:40:04', NULL, NULL, NULL, NULL),
(19, 'kilabot23@yahoo.com', 'hahahehe', 'Winsie', 'Gabrielle', NULL, 'St, Kilat', '1976-5-8', 'Male', '1', '5', '1', NULL, 'kilabot23@yahoo.comClassical Girl=wangshiyong.jpg', NULL, '09077678672', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2016-09-17 15:29:29', '2016-09-17 15:30:19', NULL, NULL, NULL, NULL),
(20, 'ftw23@yahoo.com', 'hahahehe', 'John ', 'Magbatog', NULL, '923. F. Ramos Ext.', '1969-7-30', 'Male', '1', '1', '0', NULL, 'ftw23@yahoo.com20150918_022906.jpg', NULL, '0900342323', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2016-09-17 15:33:51', '2016-09-20 03:17:19', NULL, NULL, NULL, NULL),
(21, 'tayong@yahoo.com', 'hahahehe', 'Rusel', 'Tayong', NULL, 'Kinsay Jhon', '1971-9-27', 'Male', '1', '1', '3', NULL, 'tayong@yahoo.comprogramming-languages.jpg', NULL, '09432324552', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2016-09-17 15:36:22', '2016-09-17 15:37:07', NULL, NULL, NULL, NULL),
(22, 'mark23@yahoo.com', 'hahahehe', 'Mark Anthony', 'Mamogay', NULL, 'Pob. East ', '1995-8-25', 'Male', '1', '3', '0', 'mark23@yahoo.com21.jpg', 'mark23@yahoo.com20150918_023811.jpg', NULL, '0932442323', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2016-09-17 15:38:21', '2016-09-20 12:12:03', NULL, NULL, NULL, NULL),
(23, 'estardo23@yahoo.com', 'hahahehe', 'Darwin', 'Estardo', NULL, 'Guadaluper', '1970-4-30', 'Male', '1', '5', '2', NULL, 'estardo23@yahoo.com20160720_111823.jpg', NULL, '0993434232', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2016-09-17 15:40:02', '2016-09-17 15:40:35', NULL, NULL, NULL, NULL),
(24, 'ianeron23@yahoo.com', 'hahahehe', 'Ian', 'Manugas', NULL, 'Highway Junquera', '1972-9-26', 'Male', '1', '4', '2', NULL, 'ianeron23@yahoo.comview.png', NULL, '0923424', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2016-09-17 15:45:46', '2016-09-17 15:46:25', NULL, NULL, NULL, NULL),
(25, 'jukil32@yahoo.com', 'hahahehe', 'Jolly Joe', 'Dagaton', NULL, 'Labangon Tikang St.', '1987-7-26', 'Male', '1', '3', '3', NULL, 'jukil32@yahoo.comReal-Leather-Office-Chair-Wonderful-In-Inspiration-Interior-Home-Design-Ideas-with-Real-Leather-Office-Chair-Design-Inspiration.jpg', NULL, '0902302033', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2016-09-17 15:48:00', '2016-09-17 15:48:38', NULL, NULL, NULL, NULL),
(26, 'mamogay@gmail.com', 'hahahehe', 'Mark', 'Mamogay', NULL, NULL, '2016-0-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-09-19 03:39:59', '2016-09-19 03:39:59', NULL, NULL, NULL, NULL),
(27, 'renween@yahoo.com', 'hahahehe', 'Renween Joyce', 'Reyes', NULL, 'Adia Bitaog, Gumaca,', '1998-3-30', 'Female', '6', '5', '0', 'renween@yahoo.com20160803_153012.jpg', 'renween@yahoo.com2015-04-29 13.59.28-1.jpg', NULL, '0902393232', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2016-09-19 20:28:09', '2016-09-19 20:30:29', NULL, NULL, NULL, NULL),
(28, 'NICOLEAMBErGUIBONE@gmail.com', 'hahahehe', 'NICOLE AMBER GUIBONE', 'Abad', NULL, 'Adiangao, San Jose, Camarines ', '1972-7-17', 'Female', '1', '2', '0', NULL, 'NICOLEAMBErGUIBONE@gmail.com20160720_112351.jpg', NULL, '0923234232', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, '2016-09-19 20:36:50', '2016-09-19 20:37:27', NULL, NULL, NULL, NULL),
(29, 'lili@yahoo.com', 'haha', 'Lilibeth Mabini', 'Abalayan', NULL, 'Adlas, Silang, Cavite, Philippines', '1970-4-19', 'Male', '1', '3', '2', NULL, 'lili@yahoo.com20160720_112351.jpg', NULL, '009928383233', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, '2016-09-19 20:47:39', '2016-09-19 20:48:20', NULL, NULL, NULL, NULL),
(30, 'nurhaniya@yahoo.com', 'haha', 'Nurhaniya', 'Benito', NULL, 'Elysian Subd, Marulas, Valenzuela City', '1988-2-2', 'Female', '1', '2', '0', NULL, 'nurhaniya@yahoo.com20160720_112805.jpg', NULL, '093294922', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2016-09-19 20:53:37', '2016-09-19 20:54:10', NULL, NULL, NULL, NULL),
(31, 'jamesmarquez@yahoo.com', 'haha', 'James Marquez', 'Bergado', NULL, '111 A.LAKE St. San Juan Metro Manila', '1969-11-3', 'Female', '1', '1', '2', NULL, 'jamesmarquez@yahoo.comemployeeeer.png', NULL, '0998383828', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, '2016-09-19 21:02:21', '2016-09-19 21:03:06', NULL, NULL, NULL, NULL),
(32, 'joebeth@yahoo.com', 'haha', 'Joebeth Cotto', 'Bergado', NULL, '4822 c mahogany st. old sta mesa mla', '1968-1-17', 'Male', '1', '3', '1', NULL, 'joebeth@yahoo.com20160725_115949.jpg', NULL, '09932329423', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2016-09-19 21:09:18', '2016-09-19 21:09:45', NULL, NULL, NULL, NULL),
(33, 'test@applicant.com', '1234', 'ian aaron', 'manugas', NULL, '40-f pelaez ext. cebu city', '2013-4-17', 'Female', '3', '2', '2', NULL, 'test@applicant.comr0064LynW1GvuVJ8eUdhKsD_XTJtWgAxtDwOBnmlC5E.jpg', NULL, '09923455234', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, '2016-09-20 07:07:42', '2016-09-20 07:08:47', NULL, NULL, NULL, NULL),
(34, 'rexuslourence@gmail.com', 'hahahehe', 'Lourence', 'Rexus', NULL, 'Teguis, Poro, Camotes, Cebu', '1994-8-6', 'Male', '2', '2', '2', NULL, 'rexuslourence@gmail.comClassical Girl=wangshiyong.jpg', NULL, '09226663075', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, '2016-09-20 18:42:18', '2016-09-20 21:29:59', NULL, NULL, NULL, NULL),
(35, 'mamogs@yahoo.com', 'hahahehe', 'Rafael', 'Mamogay', NULL, 'Moalboal Cebu', '1995-8-25', 'Male', '1', '1', '0', NULL, 'mamogs@yahoo.com13592202_1236796259665262_2025049178557103954_n.jpg', NULL, '09322478476', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-09-20 21:23:57', '2016-09-20 21:24:35', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_msg`
--

CREATE TABLE IF NOT EXISTS `applicant_msg` (
  `id` int(10) unsigned NOT NULL,
  `appid` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_skill`
--

CREATE TABLE IF NOT EXISTS `applicant_skill` (
  `skillid` int(10) unsigned NOT NULL,
  `applicationid` int(11) NOT NULL,
  `dutyid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `applicationid` int(10) unsigned NOT NULL,
  `appid` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `salaryid` int(11) DEFAULT NULL,
  `jobtypeid` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `dayof` int(11) DEFAULT NULL,
  `yearexp` int(11) DEFAULT NULL,
  `edlevel` int(11) DEFAULT NULL,
  `regionid` int(11) DEFAULT NULL,
  `pitch` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`applicationid`, `appid`, `position`, `salaryid`, `jobtypeid`, `capacity`, `dayof`, `yearexp`, `edlevel`, `regionid`, `pitch`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 35, NULL, 3, 1, 1, 4, 2, 1, 1, 'sdfh', '2016-09-26 04:46:37', '2016-09-26 04:46:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `apply_ad`
--

CREATE TABLE IF NOT EXISTS `apply_ad` (
  `id` int(10) unsigned NOT NULL,
  `empid` int(11) DEFAULT NULL,
  `adid` int(11) DEFAULT NULL,
  `appid` int(11) DEFAULT NULL,
  `isSeen` tinyint(1) DEFAULT NULL,
  `message` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `emp_del` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_rating`
--

CREATE TABLE IF NOT EXISTS `app_rating` (
  `id` int(10) unsigned NOT NULL,
  `empid` int(11) NOT NULL,
  `appid` int(11) NOT NULL,
  `partialrating` double(10,2) NOT NULL,
  `feedback` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_shortlist`
--

CREATE TABLE IF NOT EXISTS `app_shortlist` (
  `listid` int(10) unsigned NOT NULL,
  `appid` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `database`
--

CREATE TABLE IF NOT EXISTS `database` (
  `dbid` int(10) unsigned NOT NULL,
  `dbname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dbconn` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `duty`
--

CREATE TABLE IF NOT EXISTS `duty` (
  `duties` int(10) unsigned NOT NULL,
  `jobtypeid` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `duty`
--

INSERT INTO `duty` (`duties`, `jobtypeid`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(126, 15, 'Laundry and ironing', '2016-09-26 08:32:04', '2016-09-26 08:32:04', NULL),
(127, 15, 'Take out grabage', '2016-09-26 08:32:04', '2016-09-26 08:32:04', NULL),
(128, 15, 'Run errands', '2016-09-26 08:32:04', '2016-09-26 08:32:04', NULL),
(129, 15, 'Do house tasks', '2016-09-26 08:32:04', '2016-09-26 08:32:04', NULL),
(130, 15, 'Companionship', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(131, 15, 'Plan and budget money', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(132, 15, 'Engage in activities', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(133, 15, 'Monitor food expiration dates and make future males', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(134, 15, 'Plan and prepare meals, followed by clear-up', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(135, 15, 'Looking after the children and minding theme', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(136, 15, 'Accompanny children in going and after school', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(137, 15, 'Guading and watching the house', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(138, 15, 'Laundry', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(139, 15, 'Grocery', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(140, 16, 'Baby bath', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(141, 16, 'Baby care', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(142, 16, 'Baby feeding', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(143, 16, 'Performing light housekeeping', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(144, 16, 'Doing laundry', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(145, 16, 'Changing diapers', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(146, 16, 'Preparing milk bottles', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(147, 16, 'Transporting kids (school, playground', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(148, 16, 'Making snacks', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(149, 16, 'Getting kids ready for bed', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(150, 16, 'Playtime/lessons', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(151, 16, 'Plan and prepare meals', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(152, 17, 'Adult care', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(153, 17, 'Adult bathing', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(154, 17, 'Assist with walking and light excercise', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(155, 17, 'Plan and prepare meals', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(156, 17, 'Baby laundry', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(157, 17, 'Make beds and change linens', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(158, 17, 'Light housekeeping', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(159, 17, 'Assist with bathing and dressing', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(160, 17, 'Engage in physical and mental exercises', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(161, 17, 'Provide medication reminders', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(162, 17, 'Engage in adult appointments', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(163, 19, 'Taking care of pets', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(164, 19, 'Pet feeding', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(165, 19, 'Pet walking', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(166, 20, 'Gardening', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(167, 20, 'Laundry', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(168, 20, 'Grocery', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(169, 20, 'Cleaning', '2016-09-26 08:32:05', '2016-09-26 08:32:05', NULL),
(170, 20, 'Cooking', '2016-09-26 08:32:06', '2016-09-26 08:32:06', NULL),
(171, 20, 'Prepare meals (breakfast , launch, snacks, and dinner', '2016-09-26 08:32:06', '2016-09-26 08:32:06', NULL),
(172, 20, 'Taking care of pets', '2016-09-26 08:32:06', '2016-09-26 08:32:06', NULL),
(173, 20, 'Watching and guarding the house', '2016-09-26 08:32:06', '2016-09-26 08:32:06', NULL),
(174, 20, 'Cleaning the house', '2016-09-26 08:32:06', '2016-09-26 08:32:06', NULL),
(175, 20, 'Taking care of children', '2016-09-26 08:32:06', '2016-09-26 08:32:06', NULL),
(176, 20, 'Throwing garbage', '2016-09-26 08:32:06', '2016-09-26 08:32:06', NULL),
(177, 21, 'School Guiding', '2016-09-26 08:32:06', '2016-09-26 08:32:06', NULL),
(178, 21, 'Math teaching', '2016-09-26 08:32:06', '2016-09-26 08:32:06', NULL),
(179, 21, 'English teaching', '2016-09-26 08:32:06', '2016-09-26 08:32:06', NULL),
(180, 21, 'Science teaching', '2016-09-26 08:32:06', '2016-09-26 08:32:06', NULL),
(181, 21, 'Filipino teaching', '2016-09-26 08:32:06', '2016-09-26 08:32:06', NULL),
(182, 21, 'Assist in reading and development', '2016-09-26 08:32:06', '2016-09-26 08:32:06', NULL),
(183, 21, 'Assist in academic activities', '2016-09-26 08:32:06', '2016-09-26 08:32:06', NULL),
(184, 21, 'Helping with homework', '2016-09-26 08:32:06', '2016-09-26 08:32:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE IF NOT EXISTS `employer` (
  `empid` int(10) unsigned NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bdate` varchar(20) COLLATE utf8_unicode_ci DEFAULT '2016-0-1',
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `civilstatus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nbi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profilepic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `backgroundpic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactno` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isVerified` tinyint(1) DEFAULT NULL,
  `ishiring` tinyint(1) DEFAULT NULL,
  `subscribe` tinyint(1) DEFAULT '0',
  `regionid` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `lats` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longs` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`empid`, `email`, `password`, `fname`, `lname`, `province`, `address`, `bdate`, `gender`, `nationality`, `religion`, `civilstatus`, `nbi`, `profilepic`, `backgroundpic`, `contactno`, `isVerified`, `ishiring`, `subscribe`, `regionid`, `created_at`, `updated_at`, `deleted_at`, `lats`, `longs`, `about`) VALUES
(1, 'christine@gmail.com', 'hahahehe', 'Christine', 'Andagan', NULL, 'Pob. East', '2000-8-18', 'Female', '1', '2', '1', NULL, 'xheartless23@yahoo.comClassical Girl=wangshiyong.jpg', NULL, '09322478476', 1, NULL, 0, 1, '2016-09-12 21:11:30', '2016-09-18 20:01:30', NULL, '10.3788215', '123.7062068', NULL),
(2, 'lean@gmail.com', 'hahahehe', 'Leaan', 'Magutog', NULL, 'Santa Ferolino', '1972-5-10', 'Female', '1', '4', '2', NULL, 'jugjug21@yahoo.com20150918_023532.jpg', NULL, '0904433443', 1, NULL, 0, 1, '2016-09-12 21:15:03', '2016-09-20 12:07:14', NULL, '10.3788215', '123.7062068', NULL),
(3, 'libatobuta@yahoo.com', 'hahahehe', 'Andrew', 'Libato', NULL, 'Kilat. St', '1982-9-17', 'Male', '1', '2', '0', NULL, 'libatobuta@yahoo.com20160720_111409.jpg', NULL, '0906622433', 1, NULL, 0, 1, '2016-09-12 21:19:53', '2016-09-12 21:20:25', NULL, '10.2768737', '123.7428323', NULL),
(4, 'askal150@gmail.com', 'hahahehe', 'Racalito', 'Rusi', NULL, 'Junquera St.', '1978-5-5', 'Male', '1', '3', '3', NULL, 'askal150@gmail.com20150918_023907.jpg', NULL, '0934432', 1, NULL, 0, 1, '2016-09-12 21:23:35', '2016-09-20 11:20:18', NULL, '10.2394135', '123.6562182', NULL),
(5, 'miguelitoaktwalnapagpatay@yahoo.com', 'hahahehe', 'Miguel', 'Suspetsado', NULL, 'Santa Ferolino', '1989-8-19', 'Female', '1', '2', '1', NULL, 'miguelitoaktwalnapagpatay@yahoo.com20160720_111750.jpg', NULL, '4725343', 1, NULL, 0, 2, '2016-09-12 21:25:31', '2016-09-12 21:26:08', NULL, '10.2722902', '123.5539701', NULL),
(6, 'dragme@yahoo.com', 'hahahehe', 'Clyde', 'Bradley', NULL, 'Santa Ferolino', '2001-9-13', 'Male', '1', '3', '1', NULL, 'dragme@yahoo.com20160720_111727.jpg', NULL, '09226663075', 1, NULL, 0, 3, '2016-09-12 21:28:08', '2016-09-19 18:00:15', NULL, '10.3077593', '123.6604001', NULL),
(7, 'clecle12@yahoo.com', 'hahahehe', 'Clester', 'Dio', NULL, 'Kilat. St eskina R. Landon', '1971-4-9', 'Female', '1', '2', '1', NULL, 'clecle12@yahoo.com20160720_111344.jpg', NULL, '09226663075', 1, NULL, 0, 3, '2016-09-12 21:30:55', '2016-09-19 19:56:25', NULL, '10.2609094', '123.9328609', NULL),
(8, 'creselyml@yahoo.com', 'hahahehe', 'Creselyn', 'Mole', NULL, 'Pob. East', '1986-11-11', 'Female', '1', '2', '1', NULL, 'creselyml@yahoo.com20160720_111823.jpg', NULL, '09425645161', 1, NULL, 0, 1, '2016-09-12 21:37:32', '2016-09-17 23:53:25', NULL, '10.2481595', '123.9395786', NULL),
(9, 'cristalising@gmail.com', 'hahahehe', 'Darwin', 'Stardo', NULL, 'Juan Luna St.', '1994-8-25', 'Female', '1', '2', '2', NULL, 'cristalising@gmail.com20160722_205851.jpg', NULL, '09425645161', 1, NULL, 0, 1, '2016-09-12 21:40:56', '2016-09-17 23:50:25', NULL, '10.3219489', '123.9634287', NULL),
(10, 'dragonslayer23@gmail.com', 'hahahehe', 'Cris Arnold', 'Cubcuban', NULL, 'Alcantara, ', '2002-8-11', 'Male', '1', '4', '3', NULL, 'dragonslayer23@gmail.com20160725_115925.jpg', NULL, '09072312392', 1, NULL, 0, 1, '2016-09-12 21:44:08', '2016-09-12 21:44:59', NULL, '10.4129131', '123.8910112', NULL),
(11, 'roxsane23@gmail.com', 'hahahehe', 'Roxane', 'Benimirito', NULL, 'Escario St.', '1998-2-19', 'Female', '1', '2', '2', NULL, 'roxsane23@gmail.com20150918_023518.jpg', NULL, '09343234252', 1, NULL, 0, 1, '2016-09-12 23:16:54', '2016-09-12 23:17:50', NULL, '10.5297191', '123.8769033', NULL),
(12, 'brisey@gmail.com', 'hahahehe', 'Brise', 'Gallosa', NULL, 'Hagubbiyaw', '1998-11-19', 'Male', '1', '2', '1', NULL, 'brisey@gmail.comClassical Girl=wangshiyong.jpg', NULL, '090723323244', 1, NULL, 0, 3, '2016-09-12 23:21:28', '2016-09-20 02:07:31', NULL, '10.8525783', '123.8761961', NULL),
(13, 'carlos23@yahoo.com', 'hahahehe', 'Carlos', 'Victor', NULL, 'Talisayon', '2000-7-18', 'Male', '2', '1', '2', NULL, 'carlos23@yahoo.com544945_1551656221714816_4117949326822551353_n.jpg', NULL, '093245353', 1, NULL, 0, 3, '2016-09-12 23:36:00', '2016-09-12 23:36:35', NULL, '11.0278687', '123.9289637', NULL),
(14, 'julieto@gmail.com', 'hahahehe', 'Julieto', 'Magarlito', NULL, 'Eskena Eskaryu', '1999-8-16', 'Male', '1', '2', '0', NULL, 'julieto@gmail.com20150918_023532.jpg', NULL, '09226663075', 1, NULL, 0, 4, '2016-09-12 23:43:29', '2016-09-17 15:43:26', NULL, '11.1391827', '123.9182022', NULL),
(15, 'jukingkito23@gmail.com', 'hahahehe', 'Nilo', 'But-ay', NULL, 'Juan Kilat', '1999-3-15', 'Male', '1', '2', '1', NULL, 'jukingkito23@gmail.com20160720_111344.jpg', NULL, '09322478476', 1, NULL, 0, 2, '2016-09-12 23:50:46', '2016-09-18 23:56:31', NULL, NULL, NULL, NULL),
(16, 'christianlovemeslowly23@yahoo.com', 'hahahehe', 'Christian Jake', 'Tabacon', NULL, 'Tabuilan', '1977-10-18', 'Male', '1', '3', '1', NULL, 'christianlovemeslowly23@yahoo.comr0064LynW1GvuVJ8eUdhKsD_XTJtWgAxtDwOBnmlC5E.jpg', NULL, '090232453423', 1, NULL, 0, 1, '2016-09-12 23:57:07', '2016-09-12 23:58:49', NULL, NULL, NULL, NULL),
(17, 'ch.pardreguinos1995@gmail.com', 'hahahehe', 'Chestrezel', ' Padreguinos', NULL, 'Kilat Ext.', '1979-9-29', 'Female', '1', '2', '1', NULL, 'ch.pardreguinos1995@gmail.com20150918_023823.jpg', NULL, '09929302032', 1, NULL, 0, 8, '2016-09-13 00:04:06', '2016-09-13 00:04:51', NULL, NULL, NULL, NULL),
(18, 'rexustraya@gmail.com', 'hahahehe', 'lora', 'bohol', NULL, 'Highway N. Bacalso', '2001-8-17', 'Female', '2', '2', '1', NULL, 'rexustraya@gmail.comClassical Girl=wangshiyong.jpg', NULL, '0943322322', 1, NULL, 0, 5, '2016-09-13 01:29:31', '2016-09-24 00:09:57', NULL, NULL, NULL, NULL),
(19, 'hahahehe@yahoo.com', 'hahahehe', 'Makiling', 'Mamogay', NULL, 'Kilat. St', '1982-8-13', 'Male', '1', '1', '0', NULL, 'hahahehe@yahoo.com13700021_1754141688132934_1686246729266795426_n.jpg', NULL, '09934', 1, NULL, 0, 2, '2016-09-15 09:28:52', '2016-09-20 11:19:08', NULL, NULL, NULL, NULL),
(20, 'kabulakan@yahoo.com', 'hahahehe', 'Berla', 'Kamiguin', NULL, 'Junquera St.', '1971-8-3', 'Female', '1', '2', '2', NULL, 'kabulakan@yahoo.comroute-param.png', NULL, '09023784842', 1, NULL, 0, 5, '2016-09-17 15:50:03', '2016-09-17 15:50:28', NULL, NULL, NULL, NULL),
(21, 'bentong23@gmail.com', 'hahahehe', 'Ben', 'Kisses', NULL, 'Hagubbiyaw', '1984-10-13', 'Male', '1', '3', '2', NULL, 'bentong23@gmail.comScreenshotColoringGradients.jpg', NULL, '0992387484829', 1, NULL, 0, 5, '2016-09-17 15:52:08', '2016-09-19 03:56:43', NULL, NULL, NULL, NULL),
(22, 'ruselyo@yahoo.com', 'hahahehe', 'Roger', 'Dat', NULL, 'Mandatori', '1973-6-16', 'Female', '1', '4', '1', NULL, 'ruselyo@yahoo.comts.png', NULL, '0993882829', 1, NULL, 0, 5, '2016-09-17 15:53:44', '2016-09-19 01:11:37', NULL, NULL, NULL, NULL),
(23, 'magalso16@yahoo.com', 'hahahehe', 'Virginia', 'Di Na', NULL, 'Jacinto St.', '1998-7-11', 'Female', '1', '4', '2', NULL, 'magalso16@yahoo.comMoney Remittance 2.png', NULL, '099736458878', 1, NULL, 0, 2, '2016-09-17 15:55:44', '2016-09-17 15:56:15', NULL, NULL, NULL, NULL),
(24, 'jamica23419@yahoo.com', 'hahahehe', 'Jamaica', 'Wanawtakh', NULL, 'Maneeres St.', '1970-10-8', 'Female', '2', '3', '1', NULL, 'jamica23419@yahoo.com20150917_001235.jpg', NULL, '09322442323', 1, NULL, 0, 2, '2016-09-17 15:57:24', '2016-09-17 15:58:29', NULL, NULL, NULL, NULL),
(25, 'hikapontikaaygsaba@gmail.com', 'hahahehe', 'Michael', 'Hilabot', NULL, 'Juan Luna . Bacalso', '1971-9-16', 'Male', '1', '3', '2', NULL, 'hikapontikaaygsaba@gmail.com20150918_023518.jpg', NULL, '093435533343', 1, NULL, 0, 2, '2016-09-17 16:00:19', '2016-09-20 14:54:05', NULL, NULL, NULL, NULL),
(26, 'jeremy@gmail.com', 'hahahehe', 'Jeremy', 'Traya', NULL, 'Teguis, Poro, Camotes', '1998-8-17', 'Male', '3', '2', '1', NULL, 'jeremy@gmail.com20150918_023518.jpg', NULL, '09226663075', 1, NULL, 0, 8, '2016-09-17 23:58:33', '2016-09-18 00:00:36', NULL, NULL, NULL, NULL),
(27, 'maria23@yahoo.com', 'hahahehe', 'Maria Angelica', 'Gatus', NULL, 'Pob. Remedyos', '1982-8-23', 'Female', '1', '1', '0', NULL, 'maria23@yahoo.comr0064LynW1GvuVJ8eUdhKsD_XTJtWgAxtDwOBnmlC5E.jpg', NULL, '0983827837', 1, NULL, 0, 2, '2016-09-19 20:19:16', '2016-09-19 20:23:36', NULL, NULL, NULL, NULL),
(28, 'glenjaypasinabo@yahoo.com', 'hahahehe', 'Glen Jay', 'Pasinabo', NULL, 'Adia, Agoncillo, Batangas,', '1969-2-18', 'Male', '1', '3', '0', NULL, 'glenjaypasinabo@yahoo.com20160720_112805.jpg', NULL, '099349439349', 1, NULL, 0, 10, '2016-09-19 20:31:18', '2016-09-19 20:32:11', NULL, NULL, NULL, NULL),
(29, 'MICHELLEEVANGELISTA@gmail.com', 'hahahehe', 'MICHELLE EVANGELISTA', 'Abad', NULL, 'Adia, Santa Maria, Laguna, ', '1983-10-14', 'Female', '1', '1', '1', NULL, 'MICHELLEEVANGELISTA@gmail.com20160725_115949.jpg', NULL, '0932324242323', 1, NULL, 0, 10, '2016-09-19 20:34:02', '2016-09-19 20:35:08', NULL, NULL, NULL, NULL),
(30, 'shimre@yahoo.com', 'hahahehe', 'Shimre Rose', 'Lobiano', NULL, 'Adjid, Indanan, Sulu, ', '1973-2-7', 'Female', '1', '4', '0', NULL, 'shimre@yahoo.comimg4.png', NULL, '0932942323', 1, NULL, 0, 8, '2016-09-19 20:39:01', '2016-09-19 20:39:45', NULL, NULL, NULL, NULL),
(31, 'venussapon@yahoo.com', 'hahahehe', 'Venus', 'Sapon', NULL, 'Adlas, Silang, Cavite, ', '1984-11-19', 'Female', '1', '1', '0', NULL, 'venussapon@yahoo.comapplicant.png', NULL, '0943434232', 1, NULL, 0, 8, '2016-09-19 20:42:44', '2016-09-19 20:43:31', NULL, NULL, NULL, NULL),
(32, 'mariavirginia@yahoo.com', 'haha', 'Maria Virginia', 'Abad', NULL, 'Adlawan, Roxas City, Capiz, Philippines', '1998-10-18', 'Female', '1', '2', '2', NULL, 'mariavirginia@yahoo.com544945_1551656221714816_4117949326822551353_n.jpg', NULL, '0983747474823', 1, NULL, 0, 9, '2016-09-19 20:45:13', '2016-09-19 20:45:52', NULL, NULL, NULL, NULL),
(33, 'janinecipres@yahoo.com', 'haha', 'Janine Cipres', 'Benito', NULL, 'Brgy. Ugong, Valenzuela', '1969-9-23', 'Female', '1', '3', '1', NULL, 'janinecipres@yahoo.com20160720_112037.jpg', NULL, '09323252', 1, NULL, 0, 8, '2016-09-19 20:50:23', '2016-09-19 20:51:41', NULL, NULL, NULL, NULL),
(34, 'lexce@yahoo.com', 'haha', 'Alexe', 'Beredo', NULL, '34 fortune Street, Zone 5, Plasan', '1969-8-4', 'Female', '1', '4', '0', NULL, 'lexce@yahoo.com20160720_111515.jpg', NULL, '0992939392', 1, NULL, 0, 7, '2016-09-19 20:55:22', '2016-09-19 20:55:59', NULL, NULL, NULL, NULL),
(35, 'diane@yahoo.com', 'haha', 'Dianne Kristine', 'Berin', NULL, 'F.ROMAN ST. BRGY.BALONG-BATO AURORABLVD', '1969-10-18', 'Female', '2', '4', '2', NULL, 'diane@yahoo.comimg7.png', NULL, '090384847', 1, NULL, 0, 7, '2016-09-19 20:57:32', '2016-09-19 20:58:03', NULL, NULL, NULL, NULL),
(36, 'JACKYMARQUEZ@yahoo.com', 'haha', 'Jacky Marques', 'Bergado', NULL, 'VILLA SAN JUAN 151 UNIT-O F.MANALO ST. SAN JUAN', '1995-3-5', 'Female', '1', '2', '0', NULL, 'JACKYMARQUEZ@yahoo.comimg8.png', NULL, '093222323', 1, NULL, 0, 8, '2016-09-19 20:59:52', '2016-09-20 14:57:20', NULL, NULL, NULL, NULL),
(37, 'sdfsdfsdfsd@yahoo.com', 'haha', 'Christian Rondon', 'Bermudez', NULL, 'Golden Meadows Subdivision RIZAL', '1971-10-18', 'Male', '1', '4', '2', NULL, 'sdfsdfsdfsd@yahoo.comimg5.jpg', NULL, '09213912932', 1, NULL, 0, 6, '2016-09-19 21:15:51', '2016-09-20 07:39:41', NULL, NULL, NULL, NULL),
(38, 'luiscabig@yahoo.com', 'haha', 'Luis Cabig', 'Bernabe', NULL, 'SAN JUAN - #222 AF Atanacio St.', '1969-5-17', 'Male', '1', '2', '1', NULL, 'luiscabig@yahoo.com20160725_115949.jpg', NULL, '09984882838', 1, NULL, 0, 8, '2016-09-19 21:44:24', '2016-09-19 21:44:48', NULL, NULL, NULL, NULL),
(39, 'ryan@yahoo.com', 'haha', 'Ryan James ', 'Gallardo', NULL, 'SAN JUAN - 4822 c mahogany st. old sta mesa mla', '1976-4-17', 'Male', '1', '3', '1', NULL, 'ryan@yahoo.com20160823_211640.jpg', NULL, '0993498388', 1, NULL, 0, 8, '2016-09-19 21:48:19', '2016-09-20 07:30:24', NULL, NULL, NULL, NULL),
(40, 'sakerpans@yahoo.com', 'hahahehe', 'Markii', 'Helorno', NULL, 'Baguio City', '1984-3-4', 'Male', '1', '1', '0', NULL, 'sakerpans@yahoo.com20160720_111515.jpg', NULL, '09923883838', 1, NULL, 0, 4, '2016-09-20 17:06:32', '2016-09-20 17:16:12', NULL, NULL, NULL, NULL),
(41, 'russel@yahoo.com', 'hahahehe', 'Russel', 'Tayong', NULL, 'Maugikay', '1988-2-2', 'Male', '1', '1', '0', NULL, 'russel@yahoo.com7.png', NULL, '09322478476', 0, NULL, 0, 1, '2016-09-20 21:22:05', '2016-09-20 21:22:47', NULL, NULL, NULL, NULL),
(42, 'jollyann@gmail.com', 'hahahehe', 'Jolly', 'Doloso', NULL, 'Teguis, Poro, Camotes, Cebu', '2004-8-16', 'Male', '3', '4', '0', NULL, 'jollyann@gmail.com544945_1551656221714816_4117949326822551353_n.jpg', NULL, '09226663075', 0, NULL, 0, 6, '2016-09-20 21:51:24', '2016-09-20 21:52:18', NULL, NULL, NULL, NULL),
(43, 'yabomongos@gmail.com', 'hahahehe', 'Yabo', 'Mongos', NULL, 'Teguis, Poro, Camotes, Cebu', '2011-2-14', 'Female', '6', '5', '1', NULL, 'yabomongos@gmail.com544945_1551656221714816_4117949326822551353_n.jpg', NULL, '09226663075', 0, NULL, 0, 5, '2016-09-21 18:39:43', '2016-09-21 18:42:16', NULL, NULL, NULL, NULL),
(44, 'hello@yahoo.com', 'hahahehe', 'masmsmf', 'msdfksdjf', NULL, NULL, '2016-0-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2016-09-23 07:11:39', '2016-09-23 07:11:39', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employer_duties`
--

CREATE TABLE IF NOT EXISTS `employer_duties` (
  `emp_duties_id` int(10) unsigned NOT NULL,
  `appid` int(11) DEFAULT '0',
  `dutyid` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employer_msg`
--

CREATE TABLE IF NOT EXISTS `employer_msg` (
  `id` int(10) unsigned NOT NULL,
  `empid` int(11) NOT NULL,
  `appid` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp_rating`
--

CREATE TABLE IF NOT EXISTS `emp_rating` (
  `id` int(10) unsigned NOT NULL,
  `appid` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `partialrating` double(100,2) NOT NULL,
  `feedback` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp_shortlist`
--

CREATE TABLE IF NOT EXISTS `emp_shortlist` (
  `listid` int(10) unsigned NOT NULL,
  `empid` int(11) NOT NULL,
  `appid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exp_duty`
--

CREATE TABLE IF NOT EXISTS `exp_duty` (
  `id` int(10) unsigned NOT NULL,
  `adid` int(11) NOT NULL,
  `duties` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hirelist`
--

CREATE TABLE IF NOT EXISTS `hirelist` (
  `id` int(10) unsigned NOT NULL,
  `empid` int(11) NOT NULL,
  `appid` int(11) NOT NULL,
  `message` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `accepted` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobtype`
--

CREATE TABLE IF NOT EXISTS `jobtype` (
  `jobtypeid` int(10) unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobtype`
--

INSERT INTO `jobtype` (`jobtypeid`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 'Nanny', '2016-09-26 06:04:53', '2016-09-26 06:04:53', NULL),
(16, 'Baby Sitter', '2016-09-26 06:04:53', '2016-09-26 06:04:53', NULL),
(17, 'Adsult Sitter', '2016-09-26 06:04:53', '2016-09-26 06:04:53', NULL),
(19, 'Pet Sitter', '2016-09-26 06:04:53', '2016-09-26 06:04:53', NULL),
(20, 'AU Pair', '2016-09-26 06:04:53', '2016-09-26 06:04:53', NULL),
(21, 'Tutor', '2016-09-26 06:04:53', '2016-09-26 06:04:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_07_19_034509_applicant', 1),
('2016_07_19_034800_employer', 1),
('2016_07_28_073256_job', 1),
('2016_07_30_080518_jobtype', 1),
('2016_07_30_083705_region', 1),
('2016_08_12_160552_applicant_shortlist', 1),
('2016_08_12_164912_emp_shortlist', 1),
('2016_08_12_205036_employer_duties', 1),
('2016_08_14_060227_salary', 1),
('2016_08_20_121055_subscription', 1),
('2016_08_24_140920_duty', 1),
('2016_08_24_142758_languages', 1),
('2016_08_24_163300_ad', 1),
('2016_08_25_194052_skill', 1),
('2016_08_25_195640_application', 1),
('2016_08_27_134647_ad_requirement', 1),
('2016_08_27_150958_job_desc', 1),
('2016_08_28_082002_plan_description', 1),
('2016_08_29_161728_plan', 1),
('2016_08_31_070608_apply_ad', 1),
('2016_09_01_022521_applicant_msg', 1),
('2016_09_01_023631_employer_msg', 1),
('2016_09_07_124628_admin', 1),
('2016_09_10_105809_nationality', 1),
('2016_09_10_110544_religion', 1),
('2016_09_12_160138_hirelist', 1),
('2016_09_13_042611_recomend', 1),
('2016_09_13_061927_hirelist', 2),
('2016_09_13_065034_hirelist', 3),
('2016_09_16_215842_emp_shortlist', 4),
('2016_09_16_220204_app_shortlist', 5),
('2016_09_20_172426_emp_rating', 6),
('2016_09_20_172820_app_rating', 6),
('2016_09_20_180524_app_rating', 7),
('2016_09_22_022412_database', 8),
('2016_09_26_135816_duties', 9),
('2016_09_26_143238_duty', 10),
('2016_09_27_080538_exp_duties', 11),
('2016_09_27_081528_exp_duty', 12);

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE IF NOT EXISTS `nationality` (
  `id` int(10) unsigned NOT NULL,
  `nationality` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`id`, `nationality`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Filipino', '2016-09-12 21:08:47', '2016-09-12 21:08:47', NULL),
(2, 'Japanese', '2016-09-12 21:08:47', '2016-09-12 21:08:47', NULL),
(3, 'American', '2016-09-12 21:08:47', '2016-09-12 21:08:47', NULL),
(4, 'British', '2016-09-12 21:08:47', '2016-09-12 21:08:47', NULL),
(5, 'Taiwanese', '2016-09-12 21:08:47', '2016-09-12 21:08:47', NULL),
(6, 'Chinise', '2016-09-12 21:08:47', '2016-09-12 21:08:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `planid` int(10) unsigned NOT NULL,
  `plan_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month_expyr` int(11) DEFAULT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_description`
--

CREATE TABLE IF NOT EXISTS `plan_description` (
  `id` int(10) unsigned NOT NULL,
  `planid` int(11) DEFAULT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recomend`
--

CREATE TABLE IF NOT EXISTS `recomend` (
  `id` int(10) unsigned NOT NULL,
  `empid` int(11) NOT NULL,
  `emp_recomend` int(11) NOT NULL,
  `appid` int(11) NOT NULL,
  `message` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `accepted` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `regionid` int(10) unsigned NOT NULL,
  `location` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`regionid`, `location`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cebu City', '2016-09-12 21:09:11', '2016-09-12 21:09:11', NULL),
(2, 'Davao city', '2016-09-12 21:09:11', '2016-09-12 21:09:11', NULL),
(3, 'Zaboanga Del Sur', '2016-09-12 21:09:11', '2016-09-12 21:09:11', NULL),
(4, 'Zamboanga Del Norte', '2016-09-12 21:09:11', '2016-09-12 21:09:11', NULL),
(5, 'Mandaue City', '2016-09-12 21:09:11', '2016-09-12 21:09:11', NULL),
(6, 'Danao City', '2016-09-12 21:09:11', '2016-09-12 21:09:11', NULL),
(7, 'Consocalcion City', '2016-09-12 21:09:11', '2016-09-12 21:09:11', NULL),
(8, 'Lilion City', '2016-09-12 21:09:11', '2016-09-12 21:09:11', NULL),
(9, 'Talisay City', '2016-09-12 21:09:11', '2016-09-12 21:09:11', NULL),
(10, 'Lapu-Lapu City', '2016-09-12 21:09:11', '2016-09-12 21:09:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE IF NOT EXISTS `religion` (
  `id` int(10) unsigned NOT NULL,
  `religion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`id`, `religion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Roman Catholic', '2016-09-12 21:09:36', '2016-09-12 21:09:36', NULL),
(2, 'Muslim', '2016-09-12 21:09:36', '2016-09-12 21:09:36', NULL),
(3, 'Christian', '2016-09-12 21:09:36', '2016-09-12 21:09:36', NULL),
(4, 'Buddhist', '2016-09-12 21:09:36', '2016-09-12 21:09:36', NULL),
(5, 'Hindu', '2016-09-12 21:09:36', '2016-09-12 21:09:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `salaryid` int(10) unsigned NOT NULL,
  `amount_range` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salaryid`, `amount_range`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1000', '2016-09-12 21:09:51', '2016-09-12 21:09:51', NULL),
(2, '1500 - 2000', '2016-09-12 21:09:51', '2016-09-12 21:09:51', NULL),
(3, '2000', '2016-09-12 21:09:51', '2016-09-12 21:09:51', NULL),
(4, '2500 - 3000', '2016-09-12 21:09:51', '2016-09-12 21:09:51', NULL),
(5, '3000', '2016-09-12 21:09:51', '2016-09-12 21:09:51', NULL),
(6, '3500 - 4000', '2016-09-12 21:09:51', '2016-09-12 21:09:51', NULL),
(7, '4000', '2016-09-12 21:09:51', '2016-09-12 21:09:51', NULL),
(8, '4500 - 5000', '2016-09-12 21:09:51', '2016-09-12 21:09:51', NULL),
(9, '5500 - 6000', '2016-09-12 21:09:51', '2016-09-12 21:09:51', NULL),
(10, '6000', '2016-09-12 21:09:51', '2016-09-12 21:09:51', NULL),
(11, '6500 - 7000', '2016-09-12 21:09:51', '2016-09-12 21:09:51', NULL),
(12, '8000', '2016-09-12 21:09:51', '2016-09-12 21:09:51', NULL),
(13, '8500 - 9000', '2016-09-12 21:09:51', '2016-09-12 21:09:51', NULL),
(14, '9500 - 10,000', '2016-09-12 21:09:51', '2016-09-12 21:09:51', NULL),
(15, '10,000 +', '2016-09-12 21:09:51', '2016-09-12 21:09:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `subscription_id` int(10) unsigned NOT NULL,
  `planid` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`adid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `ad_desc`
--
ALTER TABLE `ad_desc`
  ADD PRIMARY KEY (`ad_descid`);

--
-- Indexes for table `ad_req`
--
ALTER TABLE `ad_req`
  ADD PRIMARY KEY (`ad_reqid`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`appid`);

--
-- Indexes for table `applicant_msg`
--
ALTER TABLE `applicant_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_skill`
--
ALTER TABLE `applicant_skill`
  ADD PRIMARY KEY (`skillid`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`applicationid`);

--
-- Indexes for table `apply_ad`
--
ALTER TABLE `apply_ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_rating`
--
ALTER TABLE `app_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_shortlist`
--
ALTER TABLE `app_shortlist`
  ADD PRIMARY KEY (`listid`);

--
-- Indexes for table `database`
--
ALTER TABLE `database`
  ADD PRIMARY KEY (`dbid`);

--
-- Indexes for table `duty`
--
ALTER TABLE `duty`
  ADD PRIMARY KEY (`duties`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `employer_duties`
--
ALTER TABLE `employer_duties`
  ADD PRIMARY KEY (`emp_duties_id`);

--
-- Indexes for table `employer_msg`
--
ALTER TABLE `employer_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_rating`
--
ALTER TABLE `emp_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_shortlist`
--
ALTER TABLE `emp_shortlist`
  ADD PRIMARY KEY (`listid`);

--
-- Indexes for table `exp_duty`
--
ALTER TABLE `exp_duty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hirelist`
--
ALTER TABLE `hirelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobtype`
--
ALTER TABLE `jobtype`
  ADD PRIMARY KEY (`jobtypeid`);

--
-- Indexes for table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`planid`);

--
-- Indexes for table `plan_description`
--
ALTER TABLE `plan_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recomend`
--
ALTER TABLE `recomend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`regionid`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salaryid`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `adid` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ad_desc`
--
ALTER TABLE `ad_desc`
  MODIFY `ad_descid` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ad_req`
--
ALTER TABLE `ad_req`
  MODIFY `ad_reqid` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `appid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `applicant_msg`
--
ALTER TABLE `applicant_msg`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `applicant_skill`
--
ALTER TABLE `applicant_skill`
  MODIFY `skillid` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `applicationid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `apply_ad`
--
ALTER TABLE `apply_ad`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app_rating`
--
ALTER TABLE `app_rating`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app_shortlist`
--
ALTER TABLE `app_shortlist`
  MODIFY `listid` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `database`
--
ALTER TABLE `database`
  MODIFY `dbid` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `duty`
--
ALTER TABLE `duty`
  MODIFY `duties` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `empid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `employer_duties`
--
ALTER TABLE `employer_duties`
  MODIFY `emp_duties_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employer_msg`
--
ALTER TABLE `employer_msg`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emp_rating`
--
ALTER TABLE `emp_rating`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emp_shortlist`
--
ALTER TABLE `emp_shortlist`
  MODIFY `listid` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exp_duty`
--
ALTER TABLE `exp_duty`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hirelist`
--
ALTER TABLE `hirelist`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobtype`
--
ALTER TABLE `jobtype`
  MODIFY `jobtypeid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `nationality`
--
ALTER TABLE `nationality`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `planid` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plan_description`
--
ALTER TABLE `plan_description`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recomend`
--
ALTER TABLE `recomend`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `regionid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salaryid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscription_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
