-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for stokopname_kominfo
-- CREATE DATABASE IF NOT EXISTS `stokopname_kominfo` /*!40100 DEFAULT CHARACTER SET latin1 */;
-- USE `stokopname_kominfo`;

-- Dumping structure for table stokopname_kominfo.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `barang_kategori_id_foreign` (`kategori_id`),
  CONSTRAINT `barang_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_barang` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.barang: ~8 rows (approximately)
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `kategori_id`, `created_at`, `updated_at`) VALUES
	(1, '1.3.2.05.01.04.002', 'Lemari Kayu', 5, '2025-08-15 14:28:04', '2025-08-15 14:28:04'),
	(2, '1.3.2.03.02.05.024', 'Toolkit Elektronik Set', 4, '2025-08-15 14:33:11', '2025-08-15 14:33:11'),
	(3, '1.3.2.05.1.04.002', 'Filing Cabrinet', 2, '2025-08-15 16:38:13', '2025-08-15 16:38:13'),
	(4, '1.3.2.05.02.01.002', 'Merja Kerja Kayu', 5, '2025-08-15 16:40:22', '2025-08-15 16:40:22'),
	(5, '1.3.2.05.02.01.052', 'Kursi Kerja', 5, '2025-08-15 16:41:17', '2025-08-15 16:41:17'),
	(6, '1.3.2.05.02.06.021', 'Kamera Vidio', 8, '2025-08-15 16:42:08', '2025-08-15 16:42:08'),
	(7, '1.3.2.05.02.02.002', 'Tablet PC', 9, '2025-08-15 16:43:27', '2025-08-15 16:43:27'),
	(8, '1.3.2.05.01.04.005', 'Filing Cabrinet Besi', 1, '2025-08-15 16:46:36', '2025-08-15 16:46:36');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- Dumping structure for table stokopname_kominfo.barang_keluar
CREATE TABLE IF NOT EXISTS `barang_keluar` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stokopname_id` bigint(20) unsigned NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` decimal(15,2) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `barang_keluar_stokopname_id_foreign` (`stokopname_id`),
  CONSTRAINT `barang_keluar_stokopname_id_foreign` FOREIGN KEY (`stokopname_id`) REFERENCES `stok_opnames` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.barang_keluar: ~7 rows (approximately)
/*!40000 ALTER TABLE `barang_keluar` DISABLE KEYS */;
INSERT INTO `barang_keluar` (`id`, `stokopname_id`, `jumlah`, `harga_satuan`, `total`, `created_at`, `updated_at`) VALUES
	(3, 4, 1, 69000.00, 69000.00, '2025-08-15 15:06:25', '2025-08-15 15:06:25'),
	(4, 7, 6, 10000.00, 60000.00, '2025-08-15 15:20:41', '2025-08-15 15:20:41'),
	(5, 6, 2, 49000.00, 98000.00, '2025-08-15 15:21:51', '2025-08-15 15:21:51'),
	(6, 3, 5714, 350.00, 1999900.00, '2025-08-15 15:22:45', '2025-08-15 15:22:45'),
	(10, 5, 5, 72000.00, 360000.00, '2025-08-15 17:01:29', '2025-08-15 17:01:29'),
	(11, 8, 11, 34000.00, 374000.00, '2025-08-15 17:02:18', '2025-08-15 17:02:18'),
	(12, 9, 2, 31000.00, 62000.00, '2025-08-15 17:02:58', '2025-08-15 17:02:58'),
	(14, 12, 2, 179000.00, 358000.00, '2025-10-07 00:29:46', '2025-10-07 00:29:46');
/*!40000 ALTER TABLE `barang_keluar` ENABLE KEYS */;

-- Dumping structure for table stokopname_kominfo.barang_masuk
CREATE TABLE IF NOT EXISTS `barang_masuk` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stokopname_id` bigint(20) unsigned NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` decimal(15,2) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `barang_masuk_stokopname_id_foreign` (`stokopname_id`),
  CONSTRAINT `barang_masuk_stokopname_id_foreign` FOREIGN KEY (`stokopname_id`) REFERENCES `stok_opnames` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.barang_masuk: ~6 rows (approximately)
/*!40000 ALTER TABLE `barang_masuk` DISABLE KEYS */;
INSERT INTO `barang_masuk` (`id`, `stokopname_id`, `jumlah`, `harga_satuan`, `total`, `created_at`, `updated_at`) VALUES
	(3, 3, 3811, 350.00, 1333850.00, '2025-08-15 15:02:13', '2025-08-15 15:02:13'),
	(4, 5, 5, 72000.00, 360000.00, '2025-08-15 15:03:01', '2025-08-15 15:03:01'),
	(5, 4, 1, 7000.00, 7000.00, '2025-08-15 15:05:20', '2025-08-15 15:05:20'),
	(6, 9, 2, 31000.00, 62000.00, '2025-08-15 15:28:22', '2025-08-15 15:28:22'),
	(10, 6, 2, 49000.00, 98000.00, '2025-08-15 16:57:06', '2025-08-15 16:57:06'),
	(11, 7, 6, 10000.00, 60000.00, '2025-08-15 16:58:08', '2025-08-15 16:58:08'),
	(13, 8, 11, 34000.00, 374000.00, '2025-10-06 23:57:49', '2025-10-06 23:57:49');
/*!40000 ALTER TABLE `barang_masuk` ENABLE KEYS */;

-- Dumping structure for table stokopname_kominfo.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.cache: ~0 rows (approximately)
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;

-- Dumping structure for table stokopname_kominfo.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.cache_locks: ~0 rows (approximately)
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;

-- Dumping structure for table stokopname_kominfo.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table stokopname_kominfo.inventaris
CREATE TABLE IF NOT EXISTS `inventaris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `barang_id` bigint(20) unsigned NOT NULL,
  `register` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merk_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_sertifikat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_sertifikat` text COLLATE utf8mb4_unicode_ci,
  `bahan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asal_perolehan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_perolehan` year(4) DEFAULT NULL,
  `ukuran` text COLLATE utf8mb4_unicode_ci,
  `jumlah` int(11) NOT NULL DEFAULT '1',
  `satuan_barang_id` bigint(20) unsigned DEFAULT NULL,
  `kondisi_barang_id` bigint(20) unsigned DEFAULT NULL,
  `harga` decimal(15,2) DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventaris_barang_id_foreign` (`barang_id`),
  KEY `inventaris_satuan_barang_id_foreign` (`satuan_barang_id`),
  KEY `inventaris_kondisi_barang_id_foreign` (`kondisi_barang_id`),
  CONSTRAINT `inventaris_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inventaris_kondisi_barang_id_foreign` FOREIGN KEY (`kondisi_barang_id`) REFERENCES `kondisi_barang` (`id`) ON DELETE SET NULL,
  CONSTRAINT `inventaris_satuan_barang_id_foreign` FOREIGN KEY (`satuan_barang_id`) REFERENCES `satuan_barang` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.inventaris: ~3 rows (approximately)
/*!40000 ALTER TABLE `inventaris` DISABLE KEYS */;
INSERT INTO `inventaris` (`id`, `barang_id`, `register`, `merk_type`, `jenis_sertifikat`, `no_sertifikat`, `bahan`, `asal_perolehan`, `tahun_perolehan`, `ukuran`, `jumlah`, `satuan_barang_id`, `kondisi_barang_id`, `harga`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 2, '0001', 'Tidak Diketahui', 'No. Mesin', 'Tidak Ada', 'Plastik/Kara', 'APBD', '2023', 'Kotak', 1, 1, 1, 800.00, 'ASDASD', '2025-08-15 15:15:49', '2025-08-15 16:30:10'),
	(3, 2, '0001', 'Tidak Diketahui', 'No. Mesin', 'Tidak Ada', 'Plastik/Kara', 'APBD', '2023', 'Kotak', 1, 1, 1, 180.00, NULL, '2025-08-15 16:49:53', '2025-08-15 16:49:53'),
	(4, 3, '0012', 'Tidak Diketahui', 'No. Sertifikat', 'Tidak Ada', 'Besi', 'APBD', '2023', 'Standard', 1, 1, 5, 190.00, NULL, '2025-08-15 16:52:58', '2025-08-15 16:52:58');
/*!40000 ALTER TABLE `inventaris` ENABLE KEYS */;

-- Dumping structure for table stokopname_kominfo.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

-- Dumping structure for table stokopname_kominfo.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.job_batches: ~0 rows (approximately)
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;

-- Dumping structure for table stokopname_kominfo.kategori_barang
CREATE TABLE IF NOT EXISTS `kategori_barang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.kategori_barang: ~8 rows (approximately)
/*!40000 ALTER TABLE `kategori_barang` DISABLE KEYS */;
INSERT INTO `kategori_barang` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
	(1, 'Peralatan Dan Mesin', '2025-08-15 13:33:33', '2025-08-15 13:33:33'),
	(2, 'Alat Kantor Dan Rumah Tangga', '2025-08-15 13:33:57', '2025-08-15 16:38:35'),
	(3, 'Alat Kantor', '2025-08-15 13:36:47', '2025-08-15 13:36:47'),
	(4, 'Alat Bengkel Tak Bermesin', '2025-08-15 13:37:18', '2025-08-15 13:37:18'),
	(5, 'Alat Rumah Tangga Lainnya', '2025-08-15 13:38:10', '2025-08-15 13:38:10'),
	(6, 'Alat Pendingin', '2025-08-15 13:38:46', '2025-08-15 13:38:46'),
	(7, 'Alat Penghancur Kertas', '2025-08-15 13:39:23', '2025-08-15 13:39:23'),
	(8, 'Alat Studio', '2025-08-15 13:39:38', '2025-08-15 13:39:38'),
	(9, 'Komputer', '2025-08-15 13:40:14', '2025-08-15 13:40:14');
/*!40000 ALTER TABLE `kategori_barang` ENABLE KEYS */;

-- Dumping structure for table stokopname_kominfo.kondisi_barang
CREATE TABLE IF NOT EXISTS `kondisi_barang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kondisi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.kondisi_barang: ~4 rows (approximately)
/*!40000 ALTER TABLE `kondisi_barang` DISABLE KEYS */;
INSERT INTO `kondisi_barang` (`id`, `nama_kondisi`, `created_at`, `updated_at`) VALUES
	(1, 'Baik', '2025-08-15 14:24:57', '2025-08-15 14:24:57'),
	(2, 'Kurang Baik', '2025-08-15 14:25:06', '2025-08-15 14:25:06'),
	(3, 'Rusak Berat', '2025-08-15 14:25:19', '2025-08-15 14:25:19'),
	(5, 'Rusak Ringan', '2025-08-15 14:26:02', '2025-08-15 14:26:02');
/*!40000 ALTER TABLE `kondisi_barang` ENABLE KEYS */;

-- Dumping structure for table stokopname_kominfo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.migrations: ~11 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_08_05_142230_create_kategori_barang_table', 1),
	(5, '2025_08_05_144531_create_satuan_barang_table', 1),
	(6, '2025_08_05_150132_create_kondisi_barang_table', 1),
	(7, '2025_08_05_152609_create_barang_table', 1),
	(8, '2025_08_05_153949_create_inventaris_table', 1),
	(9, '2025_08_10_054616_create_stok_opnames_table', 1),
	(10, '2025_08_10_093709_create_barang_masuk_table', 1),
	(11, '2025_08_10_093749_create_barang_keluar_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table stokopname_kominfo.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.password_reset_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table stokopname_kominfo.satuan_barang
CREATE TABLE IF NOT EXISTS `satuan_barang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.satuan_barang: ~4 rows (approximately)
/*!40000 ALTER TABLE `satuan_barang` DISABLE KEYS */;
INSERT INTO `satuan_barang` (`id`, `nama_satuan`, `created_at`, `updated_at`) VALUES
	(1, 'Unit', '2025-08-15 14:23:20', '2025-08-15 14:23:20'),
	(2, 'Meter', '2025-08-15 14:23:30', '2025-08-15 14:23:30'),
	(3, 'Set', '2025-08-15 14:23:42', '2025-08-15 14:23:42'),
	(4, 'Paket', '2025-08-15 14:24:12', '2025-08-15 14:24:12'),
	(5, 'Buah', '2025-08-15 14:24:23', '2025-08-15 14:24:23');
/*!40000 ALTER TABLE `satuan_barang` ENABLE KEYS */;

-- Dumping structure for table stokopname_kominfo.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_foreign` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`),
  CONSTRAINT `sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.sessions: ~1 rows (approximately)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('oVGy04pFbsNLcWFhnfqosDdina64lLRwUuVdXkds', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMkZ4WUlpQzViNWNnTjhhd1V5ZTBIUHVWcWR2RGpyMlN1NzlaV0xVYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rb25kaXNpX2JhcmFuZyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1761279187);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Dumping structure for table stokopname_kominfo.stok_opnames
CREATE TABLE IF NOT EXISTS `stok_opnames` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_satuan` decimal(15,2) NOT NULL,
  `stok_awal` int(11) NOT NULL DEFAULT '0',
  `sisa_stok` int(11) NOT NULL DEFAULT '0',
  `total_nilai_sisa` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pptk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.stok_opnames: ~8 rows (approximately)
/*!40000 ALTER TABLE `stok_opnames` DISABLE KEYS */;
INSERT INTO `stok_opnames` (`id`, `kode_barang`, `nama_barang`, `satuan`, `harga_satuan`, `stok_awal`, `sisa_stok`, `total_nilai_sisa`, `pptk`, `keterangan`, `created_at`, `updated_at`) VALUES
	(3, '1.2.3..01', 'Fotocopy Berkas', 'Lembar', 350.00, 5714, 5714, 1999900.00, 'Budi Hardiantika,S.Kom', NULL, '2025-08-15 14:52:40', '2025-08-15 14:52:40'),
	(4, '1.3.2.03', 'Map Kertas Biasa', 'Buah', 69000.00, 1, 1, 69000.00, 'Yusra Hayaty,S.Kom', NULL, '2025-08-15 14:55:49', '2025-08-15 14:55:49'),
	(5, '1.3.2.06', 'Kertas HVs : A4 70 Gsm', 'Rim', 72000.00, 5, 5, 360000.00, 'Budi Hardiantika,S.Kom', NULL, '2025-08-15 15:00:56', '2025-08-15 15:00:56'),
	(6, '1.2.3..05', 'Pena Pilot', 'Pak', 49000.00, 3, 3, 147000.00, 'Budi Hardiantika,S.Kom', NULL, '2025-08-15 15:10:42', '2025-08-15 15:10:42'),
	(7, '1.2.3..06', 'Fiting Duduk', 'Unit', 10000.00, 6, 6, 60000.00, 'Budi Hardiantika,S.Kom', NULL, '2025-08-15 15:12:29', '2025-08-15 15:12:29'),
	(8, '1.2.3..07', 'Box Arsip', 'Buah', 34000.00, 5, 5, 170000.00, 'Budi Hardiantika,S.Kom', NULL, '2025-08-15 15:25:34', '2025-08-15 15:25:34'),
	(9, '1.2.3..08', 'Buku Kwitansi Besar', 'Buku', 31000.00, 2, 2, 62000.00, 'Budi Hardiantika,S.Kom', NULL, '2025-08-15 15:27:02', '2025-08-15 15:27:02'),
	(12, '1.3.2.04', 'Tinta Printer Black', 'Botol', 179000.00, 2, 2, 358000.00, 'Yusra Hayaty,S.Kom', '-', '2025-10-07 00:28:57', '2025-10-07 00:28:57');
/*!40000 ALTER TABLE `stok_opnames` ENABLE KEYS */;

-- Dumping structure for table stokopname_kominfo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','operator') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'operator',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stokopname_kominfo.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `role`, `password`, `telepon`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Putri', 'putri@gmail.com', 'admin1', NULL, 'admin', '$2y$12$n5KLNr2vAaCOzG3GrRCZReAhLZetvEdNYrZtapUfIDPGLueLIVZ0a', '081234567890', NULL, '2025-08-15 13:24:29', '2025-08-15 13:24:29'),
	(2, 'Budi Hardiantika', 'operator@gmail.com', 'operator', NULL, 'operator', '$2y$12$Q4RV1mIC41p6IH/AD3SU.eVu1ENgfO/qrglkhGPn5bZvCc3928tx.', '08521254124', NULL, '2025-08-15 13:51:40', '2025-08-15 15:18:51');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
