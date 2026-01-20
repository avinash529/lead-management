-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 20, 2026 at 05:49 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lead_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
CREATE TABLE IF NOT EXISTS `leads` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('New','In Progress','Closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'New',
  `date_added` datetime DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `leads_email_unique` (`email`),
  KEY `leads_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `user_id`, `name`, `email`, `phone`, `status`, `date_added`, `last_updated`, `created_at`, `updated_at`) VALUES
(13, 1, 'Vaishnav', 'vaishnavkunnathel213@gmail.com', '9899556453', 'New', '2025-12-29 09:41:42', '2025-12-29 09:41:42', '2025-12-29 04:11:42', '2025-12-29 04:11:42'),
(12, 1, 'Bilal', 'bilalb@gmail.com', '9988776655', 'Closed', '2025-12-29 09:41:42', '2025-12-29 09:41:42', '2025-12-29 04:11:42', '2025-12-29 04:11:42'),
(11, 1, 'Arjun', 'arjun@gamil.com', '1122334455', 'In Progress', '2025-12-29 09:41:42', '2025-12-29 09:41:42', '2025-12-29 04:11:42', '2025-12-29 04:11:42'),
(10, 1, 'Jane', 'jane@test.com', '987654321', 'Closed', '2025-12-29 09:41:42', '2025-12-29 09:41:42', '2025-12-29 04:11:42', '2025-12-29 04:11:42'),
(9, 1, 'John', 'john@test.com', '1234567890', 'In Progress', '2025-12-29 09:41:42', '2025-12-29 09:41:42', '2025-12-29 04:11:42', '2025-12-29 04:11:42'),
(8, 1, 'Avinash l R', 'avinashraju815@gmail.com', '7025523228', 'In Progress', '2025-12-29 09:41:42', '2025-12-29 09:41:42', '2025-12-29 04:11:42', '2025-12-29 04:11:42'),
(14, 1, 'Test User 1', 'testuser1@example.com', '9274238109', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(15, 1, 'Test User 2', 'testuser2@example.com', '9906166929', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(16, 1, 'Test User 3', 'testuser3@example.com', '9360561216', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(17, 1, 'Test User 4', 'testuser4@example.com', '9931882108', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(18, 1, 'Test User 5', 'testuser5@example.com', '9585954947', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(19, 1, 'Test User 6', 'testuser6@example.com', '9455929048', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(20, 1, 'Test User 7', 'testuser7@example.com', '9772952362', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(21, 1, 'Test User 8', 'testuser8@example.com', '9264374488', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(22, 1, 'Test User 9', 'testuser9@example.com', '9190366263', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(23, 1, 'Test User 10', 'testuser10@example.com', '9928266581', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(24, 1, 'Test User 11', 'testuser11@example.com', '9993757979', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(25, 1, 'Test User 12', 'testuser12@example.com', '9729227344', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(26, 1, 'Test User 13', 'testuser13@example.com', '9181377906', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(27, 1, 'Test User 14', 'testuser14@example.com', '9414190179', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(28, 1, 'Test User 15', 'testuser15@example.com', '9860299752', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(29, 1, 'Test User 16', 'testuser16@example.com', '9164965102', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(30, 1, 'Test User 17', 'testuser17@example.com', '9940671764', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(31, 1, 'Test User 18', 'testuser18@example.com', '9402506457', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(32, 1, 'Test User 19', 'testuser19@example.com', '9366290974', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(33, 1, 'Test User 20', 'testuser20@example.com', '9152683503', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(34, 1, 'Test User 21', 'testuser21@example.com', '9639300399', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(35, 1, 'Test User 22', 'testuser22@example.com', '9718367371', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(36, 1, 'Test User 23', 'testuser23@example.com', '9425861485', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(37, 1, 'Test User 24', 'testuser24@example.com', '9758312136', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(38, 1, 'Test User 25', 'testuser25@example.com', '9327604316', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(39, 1, 'Test User 26', 'testuser26@example.com', '9785724219', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(40, 1, 'Test User 27', 'testuser27@example.com', '9956478225', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(41, 1, 'Test User 28', 'testuser28@example.com', '9171724046', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(42, 1, 'Test User 29', 'testuser29@example.com', '9175213879', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(43, 1, 'Test User 30', 'testuser30@example.com', '9855327273', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(44, 1, 'Test User 31', 'testuser31@example.com', '9655418428', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(45, 1, 'Test User 32', 'testuser32@example.com', '9418715760', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(46, 1, 'Test User 33', 'testuser33@example.com', '9982581742', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(47, 1, 'Test User 34', 'testuser34@example.com', '9768240879', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(48, 1, 'Test User 35', 'testuser35@example.com', '9752474524', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(49, 1, 'Test User 36', 'testuser36@example.com', '9330021093', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(50, 1, 'Test User 37', 'testuser37@example.com', '9837994296', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(51, 1, 'Test User 38', 'testuser38@example.com', '9467608502', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(52, 1, 'Test User 39', 'testuser39@example.com', '9897770345', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(53, 1, 'Test User 40', 'testuser40@example.com', '9920379100', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(54, 1, 'Test User 41', 'testuser41@example.com', '9459351938', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(55, 1, 'Test User 42', 'testuser42@example.com', '9258219478', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(56, 1, 'Test User 43', 'testuser43@example.com', '9855595570', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(57, 1, 'Test User 44', 'testuser44@example.com', '9234671058', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(58, 1, 'Test User 45', 'testuser45@example.com', '9847779626', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(59, 1, 'Test User 46', 'testuser46@example.com', '9170715716', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(60, 1, 'Test User 47', 'testuser47@example.com', '9266062448', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(61, 1, 'Test User 48', 'testuser48@example.com', '9561841026', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(62, 1, 'Test User 49', 'testuser49@example.com', '9546380835', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(63, 1, 'Test User 50', 'testuser50@example.com', '9307752846', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(64, 1, 'Test User 51', 'testuser51@example.com', '9627135944', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(65, 1, 'Test User 52', 'testuser52@example.com', '9471641154', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(66, 1, 'Test User 53', 'testuser53@example.com', '9280185667', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(67, 1, 'Test User 54', 'testuser54@example.com', '9238398007', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(68, 1, 'Test User 55', 'testuser55@example.com', '9151796622', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(69, 1, 'Test User 56', 'testuser56@example.com', '9298549756', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(70, 1, 'Test User 57', 'testuser57@example.com', '9857056053', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(71, 1, 'Test User 58', 'testuser58@example.com', '9108823785', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(72, 1, 'Test User 59', 'testuser59@example.com', '9859871363', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(73, 1, 'Test User 60', 'testuser60@example.com', '9667713902', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(74, 1, 'Test User 61', 'testuser61@example.com', '9456238093', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(75, 1, 'Test User 62', 'testuser62@example.com', '9769036705', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(76, 1, 'Test User 63', 'testuser63@example.com', '9638351761', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(77, 1, 'Test User 64', 'testuser64@example.com', '9593841423', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(78, 1, 'Test User 65', 'testuser65@example.com', '9365359943', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(79, 1, 'Test User 66', 'testuser66@example.com', '9649682331', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(80, 1, 'Test User 67', 'testuser67@example.com', '9169935259', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(81, 1, 'Test User 68', 'testuser68@example.com', '9174212580', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(82, 1, 'Test User 69', 'testuser69@example.com', '9258903568', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(83, 1, 'Test User 70', 'testuser70@example.com', '9802827872', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(115, 1, 'Bilal K K Kuruvnal K K', 'aviz5290@gmail.com', '07025523228', 'New', '2026-01-16 09:53:33', '2026-01-16 09:53:33', '2026-01-16 04:23:33', '2026-01-16 04:23:33'),
(114, 1, 'lead 1', 'avinashraju888@gmail.com', '1234567890', 'In Progress', '2026-01-10 09:19:51', '2026-01-16 06:39:01', '2026-01-10 03:49:51', '2026-01-16 01:09:01'),
(94, 1, 'Test User 81', 'testuser81@example.com', '9453495023', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(95, 1, 'Test User 82', 'testuser82@example.com', '9969390298', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(96, 1, 'Test User 83', 'testuser83@example.com', '9959785497', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(97, 1, 'Test User 84', 'testuser84@example.com', '9993937854', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(98, 1, 'Test User 85', 'testuser85@example.com', '9999803345', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(99, 1, 'Test User 86', 'testuser86@example.com', '9442542947', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(100, 1, 'Test User 87', 'testuser87@example.com', '9595983733', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(101, 1, 'Test User 88', 'testuser88@example.com', '9473057641', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(102, 1, 'Test User 89', 'testuser89@example.com', '9173646516', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(103, 1, 'Test User 90', 'testuser90@example.com', '9191213541', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(104, 1, 'Test User 91', 'testuser91@example.com', '9738348559', 'In Progress', '2025-12-29 13:15:49', '2026-01-05 10:32:03', '2025-12-29 07:45:49', '2026-01-05 05:02:03'),
(105, 1, 'Test User 92', 'testuser92@example.com', '9488382751', 'Closed', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(106, 1, 'Test User 93', 'testuser93@example.com', '9492829280', 'New', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(107, 1, 'Test User 94', 'testuser94@example.com', '9210980980', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(108, 1, 'Test User 95', 'testuser95@example.com', '9948222345', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(109, 1, 'Test User 96', 'testuser96@example.com', '9312095110', 'In Progress', '2025-12-29 13:15:49', '2026-01-05 10:31:26', '2025-12-29 07:45:49', '2026-01-05 05:01:26'),
(110, 1, 'Test User 97', 'testuser97@example.com', '9225332811', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(111, 1, 'Test User 98', 'testuser98@example.com', '9432844966', 'In Progress', '2025-12-29 13:15:49', '2025-12-29 13:15:49', '2025-12-29 07:45:49', '2025-12-29 07:45:49'),
(112, 1, 'Test User 99', 'testuser99@example.com', '9214892514', 'In Progress', '2025-12-29 13:15:49', '2026-01-16 09:49:34', '2025-12-29 07:45:49', '2026-01-16 04:19:34'),
(113, 1, 'Test User 100', 'testuser100@example.com', '9656211803', 'In Progress', '2025-12-29 13:15:49', '2026-01-08 10:41:10', '2025-12-29 07:45:49', '2026-01-08 05:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `lead_histories`
--

DROP TABLE IF EXISTS `lead_histories`;
CREATE TABLE IF NOT EXISTS `lead_histories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `lead_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `old_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `changed_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lead_histories_lead_id_foreign` (`lead_id`),
  KEY `lead_histories_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_histories`
--

INSERT INTO `lead_histories` (`id`, `lead_id`, `user_id`, `old_status`, `new_status`, `changed_at`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'New', 'In Progress', '2025-12-29 02:30:03', '2025-12-29 02:30:03', '2025-12-29 02:30:03'),
(2, 7, 1, 'In Progress', 'New', '2025-12-29 02:39:35', '2025-12-29 02:39:35', '2025-12-29 02:39:35'),
(3, 1, 1, 'New', 'In Progress', '2025-12-29 02:42:59', '2025-12-29 02:42:59', '2025-12-29 02:42:59'),
(4, 109, 1, 'New', 'In Progress', '2026-01-05 05:01:26', '2026-01-05 05:01:26', '2026-01-05 05:01:26'),
(5, 104, 1, 'New', 'In Progress', '2026-01-05 05:02:03', '2026-01-05 05:02:03', '2026-01-05 05:02:03'),
(6, 113, 1, 'Closed', 'In Progress', '2026-01-08 05:11:10', '2026-01-08 05:11:10', '2026-01-08 05:11:10'),
(7, 112, 1, 'In Progress', 'Closed', '2026-01-08 05:11:32', '2026-01-08 05:11:32', '2026-01-08 05:11:32'),
(8, 114, 1, 'New', 'In Progress', '2026-01-16 01:09:02', '2026-01-16 01:09:02', '2026-01-16 01:09:02'),
(9, 112, 1, 'Closed', 'In Progress', '2026-01-16 04:19:34', '2026-01-16 04:19:34', '2026-01-16 04:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_29_050023_create_leads_table', 2),
(5, '2025_12_29_063856_add_role_to_users_table', 3),
(6, '2025_12_29_064011_add_user_id_to_leads_table', 4),
(7, '2025_12_29_075451_create_lead_histories_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('avinashraju815@gmail.com', '$2y$12$iMcAqnMg5wpj7OsAnebNiODKf0M19/CUjyPbLKOF.0AN1MTLU.hYe', '2026-01-02 04:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('qbmAKthnDdk0KhcNJrUpcdEijZcyiXrIlgCRy6pa', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1VONzlzaTV0eXk4SHpPUEhSbHVDeG9ibmU0dE14UFBhdFYxZ1BIViI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9sZWFkLnRlc3QvbG9naW4iO3M6NToicm91dGUiO3M6NToibG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1767608772);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Avinash R', 'aviz.raju@gamil.com', 'admin', NULL, '$2y$12$0CyPU3HurJllkv0WxQvOAOtEOBulBwMdp7vEfjF7ybKT0TNmtysX.', NULL, '2025-12-29 01:33:17', '2025-12-29 01:33:17'),
(2, 'user.test', 'avinashraju815@gmail.com', 'user', NULL, '$2y$12$HujdKy8rha2ALPwtN8BFiewsuw8DRGK9ji.8CK5j9LBeDCo6az5Hm', NULL, '2025-12-29 02:00:40', '2025-12-29 02:00:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
