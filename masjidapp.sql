-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.26-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for mesjid
CREATE DATABASE IF NOT EXISTS `mesjid` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mesjid`;

-- Dumping structure for table mesjid.artikel
CREATE TABLE IF NOT EXISTS `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul_artikel` varchar(191) NOT NULL,
  `slug_url` varchar(191) NOT NULL,
  `konten` longtext NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_url` (`slug_url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mesjid.artikel: ~0 rows (approximately)
DELETE FROM `artikel`;
/*!40000 ALTER TABLE `artikel` DISABLE KEYS */;
/*!40000 ALTER TABLE `artikel` ENABLE KEYS */;

-- Dumping structure for table mesjid.bulletin_jumat
CREATE TABLE IF NOT EXISTS `bulletin_jumat` (
  `id_jumat` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul_khotbah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_khotbah` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `khatib` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bulletin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imam_jumat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_jumat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mesjid.bulletin_jumat: ~0 rows (approximately)
DELETE FROM `bulletin_jumat`;
/*!40000 ALTER TABLE `bulletin_jumat` DISABLE KEYS */;
/*!40000 ALTER TABLE `bulletin_jumat` ENABLE KEYS */;

-- Dumping structure for table mesjid.events
CREATE TABLE IF NOT EXISTS `events` (
  `id_event` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_event` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_event` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mesjid.events: ~0 rows (approximately)
DELETE FROM `events`;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- Dumping structure for table mesjid.files
CREATE TABLE IF NOT EXISTS `files` (
  `id_files` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_files`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mesjid.files: ~0 rows (approximately)
DELETE FROM `files`;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
/*!40000 ALTER TABLE `files` ENABLE KEYS */;

-- Dumping structure for table mesjid.home
CREATE TABLE IF NOT EXISTS `home` (
  `id` int(11) NOT NULL,
  `pict_banner` text NOT NULL,
  `title_banner` varchar(191) NOT NULL,
  `desc_title` varchar(191) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mesjid.home: ~0 rows (approximately)
DELETE FROM `home`;
/*!40000 ALTER TABLE `home` DISABLE KEYS */;
INSERT INTO `home` (`id`, `pict_banner`, `title_banner`, `desc_title`, `updated_at`, `created_at`) VALUES
	(1, 'assets/img/mesjid/mesjid-1-overlay.jpg', 'Al-Magfiroh', 'Specialising in customer experiences brand development, we combine digital craftsmanship.', NULL, NULL);
/*!40000 ALTER TABLE `home` ENABLE KEYS */;

-- Dumping structure for table mesjid.kontak
CREATE TABLE IF NOT EXISTS `kontak` (
  `id_kontak` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longlat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mesjid.kontak: ~0 rows (approximately)
DELETE FROM `kontak`;
/*!40000 ALTER TABLE `kontak` DISABLE KEYS */;
/*!40000 ALTER TABLE `kontak` ENABLE KEYS */;

-- Dumping structure for table mesjid.kontak1
CREATE TABLE IF NOT EXISTS `kontak1` (
  `id` int(11) NOT NULL,
  `telepon1` text,
  `telepon2` text,
  `alamat` text,
  `longlat` text,
  `email` varchar(191) DEFAULT NULL,
  `fb_link` varchar(191) DEFAULT NULL,
  `twitter_link` varchar(191) DEFAULT NULL,
  `instagram_link` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mesjid.kontak1: ~0 rows (approximately)
DELETE FROM `kontak1`;
/*!40000 ALTER TABLE `kontak1` DISABLE KEYS */;
INSERT INTO `kontak1` (`id`, `telepon1`, `telepon2`, `alamat`, `longlat`, `email`, `fb_link`, `twitter_link`, `instagram_link`, `created_at`, `updated_at`) VALUES
	(1, NULL, NULL, 'Jl. Argapura, Cimandala, Sukaraja, Bogor, Jawa Barat 16710', '-6.532039, 106.825812', NULL, NULL, NULL, NULL, '2018-04-09 22:41:13', '2018-04-09 22:41:19');
/*!40000 ALTER TABLE `kontak1` ENABLE KEYS */;

-- Dumping structure for table mesjid.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mesjid.migrations: ~8 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_01_18_050850_bulletin_jumat', 1),
	(4, '2018_01_18_070354_kontak', 1),
	(5, '2018_01_18_072048_profil', 1),
	(6, '2018_01_18_072124_pengurus', 1),
	(7, '2018_01_18_115900_files', 1),
	(8, '2018_01_19_154653_events', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table mesjid.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mesjid.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('urz7.pontakun@gmail.com', '$2y$10$JTwCtrxErvTL6VrIGYpwCec2BLFNBObG/uI1UQJNEUE.ZxPJe94RS', '2018-03-10 11:14:58');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table mesjid.pengurus
CREATE TABLE IF NOT EXISTS `pengurus` (
  `id_pengurus` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_pengurus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengurus`),
  UNIQUE KEY `pengurus_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mesjid.pengurus: ~3 rows (approximately)
DELETE FROM `pengurus`;
/*!40000 ALTER TABLE `pengurus` DISABLE KEYS */;
INSERT INTO `pengurus` (`id_pengurus`, `nama_pengurus`, `email`, `foto`, `phone`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 'arbalestt', 'urz7.pontakun@gmail.com', 'img/pengurus/09200a46625b8c1b51397ff5fe7f89b4.jpg', '', 0, '2018-01-21 17:01:19', '2018-04-04 11:05:37'),
	(2, 'diiiii', 'urz7.pontakun1@gmail.com', 'img/pengurus/default-avatar.png', '', 0, '2018-01-21 17:01:19', '2018-04-10 03:36:32'),
	(3, 'farhan', 'farhan@farhan.com', NULL, '', 1, '2018-04-10 06:20:42', '2018-04-10 13:00:38'),
	(4, 'asdasd', 'asdasd@asdasd.ca', 'img/pengurus/default-avatar.png', '', 0, '2018-04-10 12:50:18', '2018-04-10 13:06:10');
/*!40000 ALTER TABLE `pengurus` ENABLE KEYS */;

-- Dumping structure for table mesjid.profil
CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `isi_profil` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mesjid.profil: ~0 rows (approximately)
DELETE FROM `profil`;
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;

-- Dumping structure for table mesjid.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table mesjid.role: ~3 rows (approximately)
DELETE FROM `role`;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
	(1, 'superadmin', '2018-04-11 11:20:56', '2018-04-11 04:35:32'),
	(2, 'admin', '2018-04-11 11:21:00', '2018-04-11 11:21:01'),
	(3, 'member', '2018-04-11 04:24:06', '2018-04-11 04:24:06');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table mesjid.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `role_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mesjid.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `name`, `email`, `password`, `remember_token`, `is_deleted`, `role_id`, `created_at`, `updated_at`) VALUES
	(1, 'arbalest', 'urz7.pontakun@gmail.com', '$2y$10$I4yjhDsnHC119hzk.0GxEuMjerkYtJoBHEA8x.HXGMcFQdAIGK176', 'ogCiumxem8pgvlYxpOg1e0xn7A3Z3kyOuaQ7cX1F77puP2iOamO36pp1vQlL', 0, 1, '2018-01-21 17:01:19', '2018-04-12 08:09:16'),
	(2, 'farhan', 'urz7.pontakun22@gmail.com', '$2y$10$9crTm0XGdJt/SCJQZ9asZ.M7W50Zwks2itxl08imw2mFSfdKna09m', 'AgMHDEJdVTOtNRxtaUIyMDKWj0qi9SeDt9iOUjV4ulKFBlNdM7pV2LgSAQnn', 1, 3, '2018-04-12 14:51:22', '2018-04-12 16:55:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
