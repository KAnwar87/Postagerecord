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


-- Dumping database structure for postage_records
CREATE DATABASE IF NOT EXISTS `postage_records` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `postage_records`;

-- Dumping structure for table postage_records.citylink
CREATE TABLE IF NOT EXISTS `citylink` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date DEFAULT NULL,
  `tracking_number` varchar(15) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `user_name` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `user_email` varchar(100) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `billing_month` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `payment_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_usage_user_name` (`user_name`),
  KEY `FK_usage_user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- Dumping data for table postage_records.citylink: ~41 rows (approximately)
/*!40000 ALTER TABLE `citylink` DISABLE KEYS */;
INSERT INTO `citylink` (`id`, `created_at`, `date`, `tracking_number`, `user_name`, `user_email`, `billing_month`, `payment_status`) VALUES
	(1, '2021-04-06 17:10:46', '2021-04-05', '60301673116781', 'Azmah', 'sitinorazmahazmi@gmail.com', NULL, NULL),
	(2, '2021-04-06 17:10:47', '2021-04-05', '60301673116780', 'Azmah', 'sitinorazmahazmi@gmail.com', NULL, NULL),
	(3, '2021-04-06 17:10:48', '2021-03-31', '60301673116779', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(4, '2021-04-06 17:10:48', '2021-03-31', '60301673116778', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(5, '2021-04-06 17:10:49', '2021-03-31', '60301673116777', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(6, '2021-04-06 17:10:49', '2021-03-31', '60301673116776', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(7, '2021-04-06 17:10:54', '2021-03-31', '60301673116775', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(8, '2021-04-06 17:10:54', '2021-03-31', '60301673116774', 'Elly', 'elly@ukhwah.com.my', NULL, NULL),
	(9, '2021-04-06 17:10:55', '2021-03-30', '60301673116770', 'Azmah', 'sitinorazmahazmi@gmail.com', NULL, NULL),
	(10, '2021-04-06 17:10:55', '2021-03-25', '60301670111940', 'Aida', 'noraidah@ukhwah.com.my', NULL, NULL),
	(11, '2021-04-06 17:10:56', '2021-03-24', '60301670111938', 'Elly', 'elly@ukhwah.com.my', NULL, NULL),
	(12, '2021-04-06 17:10:57', '2021-03-24', '60301670111937', 'Syida', 'rosyidah.saad@ukhwah.com.my', NULL, NULL),
	(13, '2021-04-06 17:10:57', '2021-03-24', '60301670111936', 'Azmah', 'sitinorazmahazmi@gmail.com', NULL, NULL),
	(14, '2021-04-06 17:10:58', '2021-03-22', '60301670111935', 'Noraidah', 'noraidah@ukhwah.com.my', NULL, NULL),
	(15, '2021-04-06 17:10:58', '2021-03-22', '60301670111934', 'Syaz', 'syazwani@ukhwah.com.my', NULL, NULL),
	(16, '2021-04-06 17:10:59', '2021-03-17', '60301673116768', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(17, '2021-04-06 17:11:00', '2021-03-17', '60301673116767', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(18, '2021-04-06 17:11:00', '2021-03-17', '60301673116766', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(19, '2021-04-06 17:11:01', '2021-03-17', '60301673116765', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(20, '2021-04-06 17:11:02', '2021-03-17', '60301673116764', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(21, '2021-04-06 17:11:02', '2021-03-16', '60301670111932', 'Azmah', 'sitinorazmahazmi@gmail.com', NULL, NULL),
	(22, '2021-04-06 17:10:52', '2021-03-09', '60301670111973', 'Azmah', 'nor.azmah@ukhwah.com.my', NULL, NULL),
	(23, '2021-04-06 17:11:05', '2021-03-09', '60301670111972', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(24, '2021-04-06 17:11:06', '2021-03-09', '60301670111971', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(25, '2021-04-06 17:11:06', '2021-03-09', '60301670111970', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(26, '2021-04-06 17:11:10', '2021-03-05', '60301670111967', 'Syaz', 'syazwani@ukhwah.com.my', NULL, NULL),
	(27, '2021-04-06 17:11:10', '2021-03-02', '60301670111966', 'Azmah', 'sitinorazmahazmi@gmail.com', NULL, NULL),
	(28, '2021-04-06 17:11:11', '2021-03-01', '60301670111965', 'Azmah', 'nor.azmah@ukhwah.com.my', NULL, NULL),
	(29, '2021-04-06 17:11:11', '2021-02-25', '60301670111964', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(30, '2021-04-06 17:11:12', '2021-02-24', '60301670111963', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(31, '2021-04-06 17:11:13', '2021-02-15', '60301670111959', 'Azmah', 'nor.azmah@ukhwah.com.my', NULL, NULL),
	(32, '2021-04-06 17:11:13', '2021-02-15', '60301670111958', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(33, '2021-04-06 17:11:14', '2021-02-10', '60301670111957', 'Azmah', 'nor.azmah@ukhwah.com.my', NULL, NULL),
	(34, '2021-04-06 17:11:14', '2021-02-10', '60301670111956', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(35, '2021-04-06 17:11:15', '2021-02-08', '60301670111954', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(36, '2021-04-06 17:11:15', '2021-02-08', '60301670111954', 'Rini', 'rini@ukhwah.com.my', NULL, NULL),
	(37, '2021-04-29 20:55:06', '2021-04-29', '111', 'test', NULL, NULL, NULL),
	(38, '2021-04-29 20:56:08', '2021-04-29', '222', 'test', NULL, NULL, NULL),
	(39, '2021-04-29 20:56:21', '2021-04-29', '111333', 'test user', NULL, '', b'0'),
	(41, '2021-05-01 20:22:37', '2021-05-01', '444', 'test', NULL, NULL, NULL),
	(42, '2021-05-01 21:49:55', '2021-05-01', '555', 'minah', NULL, NULL, NULL);
/*!40000 ALTER TABLE `citylink` ENABLE KEYS */;

-- Dumping structure for table postage_records.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `user_roles` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT 'user',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`username`),
  KEY `user_email` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- Dumping data for table postage_records.users: ~8 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `user_roles`, `created_at`) VALUES
	(1, 'Rini', 'rini@ukhwah.com.my', 'user', '2021-05-01 11:01:58'),
	(2, 'Azmah', 'sitinorazmahazmi@gmail.com', 'user', '2021-05-01 11:01:58'),
	(3, 'Syaz', 'syazwani@ukhwah.com.my', 'user', '2021-05-01 11:01:58'),
	(4, 'Aida', 'noraidah@ukhwah.com.my', 'user', '2021-05-01 11:01:58'),
	(5, 'Shida', 'rosyidah.saad@ukhwah.com.my', 'user', '2021-05-01 11:01:58'),
	(6, 'Elly', 'elly@ukhwah.com.my', 'user', '2021-05-01 11:01:58'),
	(8, 'testuser', '$2y$10$dgGnbp.Yr4Hb3RRimrIaWeXeyrOTiV19SlDpNUXr3CNElecekrIE6', 'user', '2021-05-01 11:36:37'),
	(9, 'KhairulAnwar', '$2y$10$xfwuaktG.8tF1r60Gfw/4.qWoiJ3nz/xlBvul2FNR8Dqa/CYxqf/m', 'user', '2021-05-02 00:28:16');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
