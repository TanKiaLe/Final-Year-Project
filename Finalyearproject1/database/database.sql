-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for registration
CREATE DATABASE IF NOT EXISTS `registration` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `registration`;

-- Dumping structure for table registration.alarmdetails
CREATE TABLE IF NOT EXISTS `alarmdetails` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `buildingname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `floor` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`),
  UNIQUE KEY `buildingname` (`buildingname`),
  KEY `user_ID` (`user_id`),
  CONSTRAINT `user_ID` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table registration.alarmdetails: ~3 rows (approximately)
/*!40000 ALTER TABLE `alarmdetails` DISABLE KEYS */;
INSERT INTO `alarmdetails` (`aid`, `user_id`, `buildingname`, `floor`) VALUES
	(22, 13, 'Wow hall', 22),
	(23, 24, 'Main Hall', 5),
	(24, 24, 'Teaching Hall', 5);
/*!40000 ALTER TABLE `alarmdetails` ENABLE KEYS */;

-- Dumping structure for table registration.alarmstatus
CREATE TABLE IF NOT EXISTS `alarmstatus` (
  `statusID` int(11) NOT NULL AUTO_INCREMENT,
  `ID` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `floor1` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `room` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zonename` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zonestatus` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zonetime` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`statusID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table registration.alarmstatus: ~36 rows (approximately)
/*!40000 ALTER TABLE `alarmstatus` DISABLE KEYS */;
INSERT INTO `alarmstatus` (`statusID`, `ID`, `aid`, `floor1`, `room`, `zonename`, `zonestatus`, `zonetime`, `username`) VALUES
	(6, 180, 22, '3', '2323', 'zone66', 'BellSilence', '2021-11-18 12:30:00\n', 'eric'),
	(7, 180, 22, '3', '2323', 'zone66', 'Normal', '2021-11-18 12:30:47\n', 'eric'),
	(8, 180, 22, '3', '2323', 'zone66', 'Normal', '2021-11-18 12:31:10\n', 'eric'),
	(9, 174, 25, '2', '2323', 'zone 3332', 'Normal', '2021-11-21 23:44:18\n', 'hihihi'),
	(10, 174, 25, '2', '2323', 'zone 3332', 'BuzzerSilence', '2021-11-22 13:33:20\n', 'hihihi'),
	(11, 179, 25, '3', '3322', 'zone66', 'ZoneIsolate', '2021-11-22 13:33:41\n', 'hihihi'),
	(12, 178, 23, '3', '2323', 'dsdsa', 'BuzzerSilence', '2021-11-22 13:49:10\n', 'hihihi'),
	(13, 178, 23, '3', '2323', 'dsdsa', 'BellRing', '2021-12-27 00:33:05\n', 'hihihi'),
	(14, 178, 23, '3', '2323', 'dsdsa', 'Normal', '2021-12-27 00:35:05\n', 'hihihi'),
	(15, 178, 23, '3', '2323', 'dsdsa', 'BellRing', '2021-12-27 00:35:15\n', 'hihihi'),
	(16, 178, 23, '3', '2323', 'dsdsa', 'Normal', '2021-12-27 00:35:50\n', 'hihihi'),
	(17, 178, 23, '3', '2323', 'dsdsa', 'Normal', '2021-12-27 00:35:54\n', 'hihihi'),
	(18, 178, 23, '3', '2323', 'dsdsa', 'BellRing', '2021-12-27 00:35:57\n', 'hihihi'),
	(19, 178, 23, '3', '2323', 'dsdsa', 'Normal', '2021-12-27 00:38:43\n', 'hihihi'),
	(20, 178, 23, '3', '2323', 'dsdsa', 'BellRing', '2021-12-27 00:39:57\n', 'hihihi'),
	(21, 178, 23, '3', '2323', 'dsdsa', 'Normal', '2021-12-28 12:33:10\n', 'hihihi'),
	(22, 178, 23, '3', '2323', 'dsdsa', 'Normal', '2021-12-28 12:49:31\n', 'hihihi'),
	(23, 178, 23, '3', '2323', 'dsdsa', 'BellRing', '2021-12-28 12:49:34\n', 'hihihi'),
	(24, 178, 23, '3', '2323', 'dsdsa', 'Normal', '2021-12-28 12:52:10\n', 'hihihi'),
	(25, 178, 23, '3', '2323', 'dsdsa', 'BellRing', '2021-12-28 12:53:53\n', 'hihihi'),
	(26, 178, 23, '3', '2323', 'dsdsa', 'Normal', '2021-12-29 21:12:47\n', 'hihihi'),
	(27, 178, 23, '3', '2323', 'dsdsa', 'BellRing', '2021-12-29 21:12:52\n', 'hihihi'),
	(28, 174, 25, '2', '2323', 'zone 3332', 'BellRing', '2021-12-29 21:13:03\n', 'hihihi'),
	(29, 174, 25, '2', '2323', 'zone 3332', 'Normal', '2022-01-02 22:46:41\n', 'hihihi'),
	(30, 178, 23, '3', '2323', 'dsdsa', 'Normal', '2022-01-02 22:46:43\n', 'hihihi'),
	(31, 184, 23, '435345', '2323', 'dsdsa', 'Normal', '2022-01-02 22:46:46\n', 'hihihi'),
	(32, 184, 23, '435345', '2323', 'dsdsa', 'BellRing', '2022-01-02 22:56:14\n', 'hihihi'),
	(33, 184, 23, '435345', '2323', 'dsdsa', 'Normal', '2022-01-02 22:56:17\n', 'hihihi'),
	(34, 178, 23, '3', '2323', 'dsdsa', 'BellRing', '2022-01-03 12:52:41\n', 'hihihi'),
	(35, 178, 23, '3', '2323', 'dsdsa', 'Normal', '2022-01-07 16:56:24\n', 'hihihi'),
	(36, 174, 25, '2', '2323', 'zone 3332', 'BellRing', '2022-01-09 10:48:29\n', 'hihihi'),
	(37, 174, 25, '2', '2323', 'zone 3332', 'Normal', '2022-01-09 10:48:32\n', 'hihihi'),
	(38, 174, 23, '66', '2323', 'zone 3332', 'BellSilence', '2022-01-12 14:17:01\n', 'hihihi'),
	(39, 174, 23, '66', '2323', 'zone 3332', 'BellRing', '2022-01-12 14:17:06\n', 'hihihi'),
	(40, 174, 23, '66', '2323', 'zone 3332', 'Normal', '2022-01-12 14:18:06\n', 'hihihi'),
	(41, 174, 23, '66', '2323', 'zone 3332', 'Normal', '2022-01-13 11:08:55\n', 'hihihi');
/*!40000 ALTER TABLE `alarmstatus` ENABLE KEYS */;

-- Dumping structure for table registration.calendar
CREATE TABLE IF NOT EXISTS `calendar` (
  `calendarID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`calendarID`),
  KEY `iduser` (`user_id`),
  CONSTRAINT `iduser` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table registration.calendar: ~2 rows (approximately)
/*!40000 ALTER TABLE `calendar` DISABLE KEYS */;
INSERT INTO `calendar` (`calendarID`, `user_id`, `date`, `title`, `type`, `description`) VALUES
	(6, 24, 'January/3/2022', 'Bomba Inspection', 'Activity', 'Checking all school alarm'),
	(8, 24, 'January/23/2022', 'Checking Activity', 'event', 'Check every Floor alarm');
/*!40000 ALTER TABLE `calendar` ENABLE KEYS */;

-- Dumping structure for table registration.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `emergencyemail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CompanyName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ContactNumber` int(11) DEFAULT NULL,
  `Message` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Location` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DepartmentNumber` int(11) DEFAULT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table registration.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `username`, `email`, `emergencyemail`, `password`, `CompanyName`, `ContactNumber`, `Message`, `Location`, `DepartmentNumber`, `image`, `imagename`) VALUES
	(13, 'eric', 'kialetan123455@hotmail.com', '0', 'd0970714757783e6cf17b26fb8e2298f', NULL, NULL, NULL, NULL, NULL, 'eric - 2022.01.14 - 04.10.58am.jpg', NULL),
	(24, 'hihihi', 'hihi1234@hotmail.com', 'eric@sc.edu.my', '3b712de48137572f3849aabd5666a4e3', '7 eleven', 123456789, 'Pls Come to office, our factory has fire.', '10ï¼ŒJalan 3/4\r\nTaman pelangi indah', 987654321, 'hihihi - 2022.01.10 - 04.16.40am.jpg', 'hihihi');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table registration.zone
CREATE TABLE IF NOT EXISTS `zone` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL,
  `floor1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `zonename` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `zonetype` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zonestatus` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zonetime` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `aaa` (`aid`),
  CONSTRAINT `aaa` FOREIGN KEY (`aid`) REFERENCES `alarmdetails` (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table registration.zone: ~9 rows (approximately)
/*!40000 ALTER TABLE `zone` DISABLE KEYS */;
INSERT INTO `zone` (`ID`, `aid`, `floor1`, `room`, `zonename`, `zonetype`, `zonestatus`, `zonetime`) VALUES
	(180, 22, '3', '2323', 'zone66', 'breakglass,smokedetector', 'Normal', '2021-11-18 12:31:10\n'),
	(213, 23, '1', 'Room1', 'zone 1', 'Smoke_detector', 'Normal', NULL),
	(214, 23, '1', 'Room2', 'Zone 2', 'Breakglass,Smoke_detector', 'Normal', NULL),
	(215, 23, '1', 'Room 3', 'Zone 3', 'Heat_detector', 'Normal', NULL),
	(216, 23, '1', 'Room 4', 'Zone 4', 'Breakglass,Smoke_detector,Heat_detector', 'Normal', NULL),
	(217, 23, '2', 'Room 1', 'Zone 5', 'Breakglass,Smoke_detector', 'BellSilence', NULL),
	(218, 23, '2', 'Room 2', 'Zone 6', 'Breakglass,Smoke_detector', 'BuzzerSilence', NULL),
	(219, 23, '3', 'Room1', 'Zone 7', 'Heat_detector', 'Normal', NULL),
	(220, 22, '1', ' Meeting room', 'zone 2', 'Breakglass,Smoke_detector', 'Normal', NULL);
/*!40000 ALTER TABLE `zone` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
