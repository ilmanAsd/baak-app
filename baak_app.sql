-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 05, 2026 at 03:47 AM
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
-- Database: `baak_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_atmospheres`
--

DROP TABLE IF EXISTS `academic_atmospheres`;
CREATE TABLE IF NOT EXISTS `academic_atmospheres` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci,
  `spreadsheet_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_atmospheres`
--

INSERT INTO `academic_atmospheres` (`id`, `description`, `spreadsheet_url`, `is_active`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Data Suasana Akademik', 'https://docs.google.com/spreadsheets/d/1A49MPm03lo0wbOCYPffMOZ0TaufBciKs4-RxSGtbyOM/edit?usp=sharing', 1, 0, '2026-02-03 17:37:46', '2026-02-03 17:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `academic_calendar_events`
--

DROP TABLE IF EXISTS `academic_calendar_events`;
CREATE TABLE IF NOT EXISTS `academic_calendar_events` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` enum('Mahasiswa','Fakultas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Mahasiswa',
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `academic_documents`
--

DROP TABLE IF EXISTS `academic_documents`;
CREATE TABLE IF NOT EXISTS `academic_documents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `document_category_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int DEFAULT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `academic_documents_document_category_id_foreign` (`document_category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `achievement_items`
--

DROP TABLE IF EXISTS `achievement_items`;
CREATE TABLE IF NOT EXISTS `achievement_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benefits` json DEFAULT NULL,
  `tab` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `activities_slug_unique` (`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archives`
--

DROP TABLE IF EXISTS `archives`;
CREATE TABLE IF NOT EXISTS `archives` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `archives_section_id_foreign` (`section_id`),
  KEY `archives_category_id_foreign` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive_categories`
--

DROP TABLE IF EXISTS `archive_categories`;
CREATE TABLE IF NOT EXISTS `archive_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `archive_categories_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archive_categories`
--

INSERT INTO `archive_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Surat Masuk Internal', 'surat-masuk-internal', '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(2, 'Surat Masuk Eksternal', 'surat-masuk-eksternal', '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(3, 'Surat Keluar', 'surat-keluar', '2026-02-03 00:59:25', '2026-02-03 00:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `archive_sections`
--

DROP TABLE IF EXISTS `archive_sections`;
CREATE TABLE IF NOT EXISTS `archive_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `archive_sections_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archive_sections`
--

INSERT INTO `archive_sections` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Akademik', 'akademik', '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(2, 'Pembelajaran', 'pembelajaran', '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(3, 'Kemahasiswaan', 'kemahasiswaan', '2026-02-03 00:59:25', '2026-02-03 00:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `archive_settings`
--

DROP TABLE IF EXISTS `archive_settings`;
CREATE TABLE IF NOT EXISTS `archive_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `baak_programs`
--

DROP TABLE IF EXISTS `baak_programs`;
CREATE TABLE IF NOT EXISTS `baak_programs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `baak_programs`
--

INSERT INTO `baak_programs` (`id`, `title`, `description`, `image`, `url`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Kampus Berdampak', 'Memfasilitasi mahasiswa belajar dan pengalaman baru di luar kampus.', 'baak-programs/01KGKBC7NAB547HGRVR8WJJ50W.jpg', NULL, 1, 1, '2026-02-03 00:59:25', '2026-02-03 20:33:15'),
(2, 'Prestasi Mahasiswa', 'Kegiatan pembinaan prestasi bagi mahasiswa Universitas Kadiri.', 'baak-programs/01KGKBCXCT2MBNDNZ48W5TEAX4.jpg', NULL, 2, 1, '2026-02-03 00:59:25', '2026-02-03 20:33:37'),
(3, 'SPADA UNIK', 'Mendukung pembelajaran daring dengan konten dan evaluasi lengkap.', 'baak-programs/01KGKBDZY1DVF190PVGZ2XEFYY.jpg', NULL, 3, 1, '2026-02-03 00:59:25', '2026-02-03 20:34:13'),
(4, 'RPL', 'Pengakuan capaian belajar dari pendidikan formal, nonformal, pengalaman kerja.', 'baak-programs/01KGKBEMTET2QRQRHQ13X6A9QC.png', NULL, 4, 1, '2026-02-03 00:59:25', '2026-02-03 20:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('baak-universitas-kadiri-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1770164695;', 1770164695),
('baak-universitas-kadiri-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1770164695),
('baak-universitas-kadiri-cache-da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1770176131;', 1770176131),
('baak-universitas-kadiri-cache-da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:1;', 1770176131);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counseling_requests`
--

DROP TABLE IF EXISTS `counseling_requests`;
CREATE TABLE IF NOT EXISTS `counseling_requests` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `counselor_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('pending','approved','completed','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `counseling_requests_counselor_id_foreign` (`counselor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counseling_schedules`
--

DROP TABLE IF EXISTS `counseling_schedules`;
CREATE TABLE IF NOT EXISTS `counseling_schedules` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `counselor_id` bigint UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `counseling_schedules_counselor_id_foreign` (`counselor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counselors`
--

DROP TABLE IF EXISTS `counselors`;
CREATE TABLE IF NOT EXISTS `counselors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counselors`
--

INSERT INTO `counselors` (`id`, `name`, `title`, `specialty`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Siti Aminah, SST., Bd., S.Pd., M.Kes', 'Konselor Senior', 'Spesialis dalam bidang konseling kesehatan dan penyesuaian diri mahasiswa. Berpengalaman lebih dari 10 tahun dalam pendampingan mahasiswa.', NULL, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(2, 'Siswi Wulandari, SST., Bd., S.Pd., M.Kes', 'Konselor Akademik', 'Ahli dalam bidang konseling akademik, stres ujian, dan perencanaan karir. Membantu mahasiswa mengembangkan strategi belajar yang efektif.', NULL, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(3, 'Weni Tri P, SST., Bd., S.Pd., M.Kes', 'Konselor Karir & Perencanaan Masa Depan', 'Spesialis dalam perencanaan karir, pengembangan profesional, dan transisi dari kampus ke dunia kerja. Pendekatan yang hangat dan supportif.', NULL, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(4, 'Dhita Kris P, SST., Bd., S.Pd., M.Kes', 'Konselor Psikologis & Kemahasiswaan', 'Ahli dalam bidang bimbingan psikologis, manajemen stres, dan kesehatan mental. Membantu mahasiswa mengatasi masalah emosional.', NULL, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(5, 'Bdn. Galuh Pradia Y, SST., S.Pd., M.Kes', 'Konselor Adaptasi & Kesehatan', 'Spesialis dalam bidang adaptasi mahasiswa baru, kesehatan reproduksi, dan kesejahteraan fisik. Pendekatan yang empatik dan personal.', NULL, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(6, 'Drs. Talkah, M.Pd', 'Konselor Pendidikan & Pengembangan Diri', 'Ahli dalam pengembangan diri, motivasi belajar, dan bimbingan pendidikan. Pendekatan yang mendalam dan berorientasi pada solusi.', NULL, '2026-02-03 00:59:25', '2026-02-03 00:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_buttons`
--

DROP TABLE IF EXISTS `dashboard_buttons`;
CREATE TABLE IF NOT EXISTS `dashboard_buttons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'primary',
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `open_in_new_tab` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dashboard_buttons`
--

INSERT INTO `dashboard_buttons` (`id`, `label`, `url`, `icon`, `color`, `sort_order`, `is_active`, `open_in_new_tab`, `created_at`, `updated_at`) VALUES
(1, 'Kelola Staff/Dosen', '/admin/staff', 'heroicon-o-users', 'primary', 1, 1, 1, '2026-02-03 00:59:25', '2026-02-03 20:34:52'),
(2, 'Posting Berita', '/admin/posts', 'heroicon-o-newspaper', 'success', 2, 1, 1, '2026-02-03 00:59:25', '2026-02-03 20:34:54'),
(3, 'Dokumen Akademik', '/admin/academic-documents', 'heroicon-o-document-text', 'warning', 3, 1, 1, '2026-02-03 00:59:25', '2026-02-03 20:34:56'),
(4, 'Website Utama', '/', 'heroicon-o-globe-alt', 'info', 4, 1, 1, '2026-02-03 00:59:25', '2026-02-03 00:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `document_categories`
--

DROP TABLE IF EXISTS `document_categories`;
CREATE TABLE IF NOT EXISTS `document_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `link_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_categories`
--

INSERT INTO `document_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `description`, `link_url`) VALUES
(1, 'Dokumen Administrasi Perkuliahan', 'dokumen-administrasi-perkuliahan', '2026-02-03 00:59:25', '2026-02-03 00:59:25', 'Kumpulan dokumen administrasi perkuliahan seperti Form Jadwal Kuliah, Form Daftar Hadir, Silabus, Jurnal Mengajar RPS, RTS.', 'https://baak.unik-kediri.ac.id/dok-adm-perkuliahan/'),
(2, 'Dokumen Eksternal Akademik', 'dokumen-eksternal-akademik', '2026-02-03 00:59:25', '2026-02-03 00:59:25', 'Kumpulan dokumen Kebijakan Menteri, Peraturan KEMENDIKBUD, Standar PerguruanTinggi, dll.', 'https://baak.unik-kediri.ac.id/dok-eks-akademik/'),
(3, 'Dokumen Internal Akademik', 'dokumen-internal-akademik', '2026-02-03 00:59:25', '2026-02-03 00:59:25', 'Kumpulan dokumen yang telah diterbitkan oleh akadmik seperti Panduan, Pedoman dan lain-lain.', 'https://baak.unik-kediri.ac.id/dok-int-akademik/'),
(4, 'Dokumen SOP Akademik', 'dokumen-sop-akademik', '2026-02-03 00:59:25', '2026-02-03 00:59:25', 'Kumpulan Standar Operasional Prosedur yang telah disahkan.', 'https://baak.unik-kediri.ac.id/sop-akad/');

-- --------------------------------------------------------

--
-- Table structure for table `education_levels`
--

DROP TABLE IF EXISTS `education_levels`;
CREATE TABLE IF NOT EXISTS `education_levels` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education_levels`
--

INSERT INTO `education_levels` (`id`, `name`, `slug`, `description`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Program Diploma 3', 'program-diploma-3', '<p>Deskripsi untuk Program Diploma 3</p>', 1, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(2, 'Program Diploma IV & Sarjana (S1)', 'program-diploma-iv-sarjana-s1', '<p>Deskripsi untuk Program Diploma IV & Sarjana (S1)</p>', 2, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(3, 'Program Profesi', 'program-profesi', '<p>Deskripsi untuk Program Profesi</p>', 3, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(4, 'Program Magister', 'program-magister', '<p>Deskripsi untuk Program Magister</p>', 4, '2026-02-03 00:59:25', '2026-02-03 00:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `external_documents`
--

DROP TABLE IF EXISTS `external_documents`;
CREATE TABLE IF NOT EXISTS `external_documents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Berlaku','Tidak Berlaku') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Berlaku',
  `category` enum('Akademik','Pembelajaran','Kemahasiswaan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

DROP TABLE IF EXISTS `faculties`;
CREATE TABLE IF NOT EXISTS `faculties` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hero_sections`
--

DROP TABLE IF EXISTS `hero_sections`;
CREATE TABLE IF NOT EXISTS `hero_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `background_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_images` json DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_card_foreground` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_card_background` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_sections`
--

INSERT INTO `hero_sections` (`id`, `title`, `description`, `background_image`, `slider_images`, `is_active`, `created_at`, `updated_at`, `image_card_foreground`, `image_card_background`) VALUES
(1, 'Biro Administrasi Akademik dan Kemahasiswaan', 'Melayani Administrasi Akademik Pembelajaran dan Kemahasiswaan dengan Prima, Responsif, dan Akuntabel.', 'hero/01KGK11T1J7K13EA0TSWDV5E9F.png', '[]', 1, '2026-02-03 01:04:27', '2026-02-03 17:32:48', 'hero/cards/01KGK11T1SW2DG5E06486GVNTP.jpg', 'hero/cards/01KGK11T1P5FX4YF2TZ9Q59PBK.png');

-- --------------------------------------------------------

--
-- Table structure for table `information_categories`
--

DROP TABLE IF EXISTS `information_categories`;
CREATE TABLE IF NOT EXISTS `information_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `information_categories_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information_categories`
--

INSERT INTO `information_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Umum', 'umum', '2026-02-03 01:04:30', '2026-02-03 01:04:30'),
(2, 'Akademik', 'akademik', '2026-02-03 01:04:30', '2026-02-03 01:04:30'),
(3, 'Kemahasiswaan', 'kemahasiswaan', '2026-02-03 01:04:30', '2026-02-03 01:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `information_posts`
--

DROP TABLE IF EXISTS `information_posts`;
CREATE TABLE IF NOT EXISTS `information_posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `information_category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `information_posts_slug_unique` (`slug`),
  KEY `information_posts_information_category_id_foreign` (`information_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information_posts`
--

INSERT INTO `information_posts` (`id`, `information_category_id`, `title`, `slug`, `content`, `image`, `attachment`, `attachment_name`, `is_published`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Jadwal KRS Semester Genap 2025/2026', 'jadwal-krs-semester-genap-20252026', 'Berikut adalah jadwal pengisian Kartu Rencana Studi (KRS) untuk semester genap tahun ajaran 2025/2026. Mahasiswa diharapkan mengisi tepat waktu.', NULL, NULL, NULL, 1, '2026-02-03 08:04:30', '2026-02-03 01:04:30', '2026-02-03 01:04:30'),
(2, 3, 'Pendaftaran Beasiswa Prestasi Dibuka', 'pendaftaran-beasiswa-prestasi-dibuka', 'Pendaftaran beasiswa prestasi untuk mahasiswa aktif kini telah dibuka. Silakan cek persyaratan di menu Kemahasiswaan.', NULL, NULL, NULL, 1, '2026-02-01 08:04:30', '2026-02-03 01:04:30', '2026-02-03 01:04:30'),
(3, 1, 'Pengumuman Wisuda Periode I Tahun 2026', 'pengumuman-wisuda-periode-i-tahun-2026', 'Wisuda Periode I Tahun 2026 akan dilaksanakan pada bulan Mei. Informasi lebih lanjut akan disampaikan segera.', NULL, NULL, NULL, 1, '2026-01-29 08:04:30', '2026-02-03 01:04:30', '2026-02-03 01:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kemahasiswaan_settings`
--

DROP TABLE IF EXISTS `kemahasiswaan_settings`;
CREATE TABLE IF NOT EXISTS `kemahasiswaan_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `rector_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rector_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kustanto, SH., MS.',
  `rector_greeting_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Sambutan Wakil Rektor III',
  `rector_greeting_content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `about_description` text COLLATE utf8mb4_unicode_ci,
  `stat_staff` int NOT NULL DEFAULT '0',
  `stat_ormawa` int NOT NULL DEFAULT '0',
  `stat_ukm` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kemahasiswaan_settings`
--

INSERT INTO `kemahasiswaan_settings` (`id`, `banner_image`, `title`, `description`, `rector_image`, `rector_name`, `rector_greeting_title`, `rector_greeting_content`, `created_at`, `updated_at`, `about_description`, `stat_staff`, `stat_ormawa`, `stat_ukm`) VALUES
(1, 'settings/kemahasiswaan/01KGK344Z6VB90EXVVZ5DYDNQM.png', 'Laman Kemahasiswaan', 'Website Bidang Kemahasiswaan Universitas Kadiri. Memberikan informasi dan bimbingan minat bakat terkait mahasiswa', 'settings/kemahasiswaan/01KGK344Z97DBA6K2KFHE8Q6EX.jpeg', 'Kustanto, SH., MS.', 'Wakil Rektor Bidang Kemahasiswaan', '<p>Selamat datang di website Bidang Kemahasiswaan. Kami berkomitmen untuk menyediakan lingkungan yang mendukung pengembangan akademik, soft skills, dan karakter mahasiswa.</p><p>Melalui berbagai program dan kegiatan, kami berusaha memfasilitasi mahasiswa untuk mencapai prestasi terbaik, baik di tingkat nasional maupun internasional.</p><p>Mari bersama-sama membangun generasi yang unggul, berkarakter, dan siap menghadapi tantangan masa depan.</p>', '2026-02-03 18:09:02', '2026-02-03 18:09:02', NULL, 3, 10, 20);

-- --------------------------------------------------------

--
-- Table structure for table `krs_settings`
--

DROP TABLE IF EXISTS `krs_settings`;
CREATE TABLE IF NOT EXISTS `krs_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `procedures` json DEFAULT NULL,
  `provisions` json DEFAULT NULL,
  `flow` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learning_document_categories`
--

DROP TABLE IF EXISTS `learning_document_categories`;
CREATE TABLE IF NOT EXISTS `learning_document_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `learning_document_categories_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learning_document_categories`
--

INSERT INTO `learning_document_categories` (`id`, `name`, `slug`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Pedoman', 'pedoman', 0, 1, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(2, 'Panduan', 'panduan', 1, 1, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(3, 'SOP', 'sop', 2, 1, '2026-02-03 00:59:25', '2026-02-03 00:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `learning_resources`
--

DROP TABLE IF EXISTS `learning_resources`;
CREATE TABLE IF NOT EXISTS `learning_resources` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Program',
  `description` text COLLATE utf8mb4_unicode_ci,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `faculty_id` bigint UNSIGNED DEFAULT NULL,
  `study_program_id` bigint UNSIGNED DEFAULT NULL,
  `student_category_id` bigint UNSIGNED DEFAULT NULL,
  `learning_category_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `learning_resources_faculty_id_foreign` (`faculty_id`),
  KEY `learning_resources_study_program_id_foreign` (`study_program_id`),
  KEY `learning_resources_student_category_id_foreign` (`student_category_id`),
  KEY `learning_resources_learning_category_id_foreign` (`learning_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learning_resources`
--

INSERT INTO `learning_resources` (`id`, `title`, `category`, `year`, `type`, `description`, `file_path`, `url`, `video_url`, `is_active`, `order`, `created_at`, `updated_at`, `faculty_id`, `study_program_id`, `student_category_id`, `learning_category_id`) VALUES
(1, 'Pancasilaa', 'MKWU', NULL, 'Program', '<p>Mata Kuliah Pancasila berisi dasar-dasar pancasila</p>', NULL, 'https://drive.google.com/file/d/1Adn2H8l424uV-VrKFn6Xrk4yk0Hhpje5/view?usp=sharing', NULL, 1, 0, '2026-02-03 17:43:04', '2026-02-03 17:43:04', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `learning_settings`
--

DROP TABLE IF EXISTS `learning_settings`;
CREATE TABLE IF NOT EXISTS `learning_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Portal Pembelajaran',
  `description` text COLLATE utf8mb4_unicode_ci,
  `video_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spada_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://spada1.unik-kediri.ac.id',
  `curriculum_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learning_settings`
--

INSERT INTO `learning_settings` (`id`, `banner_image`, `title`, `description`, `video_url`, `spada_url`, `curriculum_password`, `created_at`, `updated_at`) VALUES
(1, 'learning/settings/01KGK2VS71FVHY91SRN5FXQTYR.png', 'Lingkup Pembelajaran', 'Universitas Kadiri menyediakan layanan pembelajaran terpadu untuk mendukung proses belajar mengajar bagi mahasiswa, dosen, dan staf.', NULL, 'https://spada1.unik-kediri.ac.id', 'baak2026', '2026-02-03 18:04:27', '2026-02-03 18:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_asing_facilities`
--

DROP TABLE IF EXISTS `mahasiswa_asing_facilities`;
CREATE TABLE IF NOT EXISTS `mahasiswa_asing_facilities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `mahasiswa_asing_page_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mahasiswa_asing_facilities_mahasiswa_asing_page_id_foreign` (`mahasiswa_asing_page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_asing_pages`
--

DROP TABLE IF EXISTS `mahasiswa_asing_pages`;
CREATE TABLE IF NOT EXISTS `mahasiswa_asing_pages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `total_students` int NOT NULL DEFAULT '0',
  `study_programs` json DEFAULT NULL,
  `sop_document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mbkm_settings`
--

DROP TABLE IF EXISTS `mbkm_settings`;
CREATE TABLE IF NOT EXISTS `mbkm_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `hero_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_description` text COLLATE utf8mb4_unicode_ci,
  `impact_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mbkm_settings`
--

INSERT INTO `mbkm_settings` (`id`, `hero_title`, `hero_description`, `impact_image`, `created_at`, `updated_at`) VALUES
(1, 'KAMPUS BERDAMPAK', 'Program persiapan karier yang komprehensif untuk mempersiapkan generasi terbaik Indonesia melalui pengalaman belajar di luar kampus.', 'settings/mbkm/01KGK25CYTMGGXMRAB30Y7MYQJ.png', '2026-02-03 17:52:14', '2026-02-03 17:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_agendas`
--

DROP TABLE IF EXISTS `meeting_agendas`;
CREATE TABLE IF NOT EXISTS `meeting_agendas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `meeting_agendas_slug_unique` (`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_settings`
--

DROP TABLE IF EXISTS `meeting_settings`;
CREATE TABLE IF NOT EXISTS `meeting_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dropdown',
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_parent_id_foreign` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `type`, `parent_id`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Beranda', '/', 'dropdown', NULL, 1, 1, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(2, 'Profil', '#', 'dropdown', NULL, 2, 1, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(3, 'Akademik', '#', 'dropdown', NULL, 3, 1, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(4, 'Pembelajaran', '#', 'dropdown', NULL, 4, 1, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(5, 'Kemahasiswaan', '#', 'dropdown', NULL, 5, 1, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(34, 'Layanan', '#', 'mega', NULL, 6, 1, '2026-02-03 01:30:00', '2026-02-03 01:30:00'),
(7, 'Informasi', '#', 'dropdown', NULL, 7, 1, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(8, 'Laman Kemahasiswaan', '/kemahasiswaan', 'dropdown', 5, 1, 1, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(9, 'Dokumen Pembelajaran', '/pembelajaran/dok-pembelajaran', 'dropdown', 4, 5, 1, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(10, 'MKWU', '/pembelajaran/mkwu', 'dropdown', 4, 4, 1, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(11, 'Prestasi Mahasiswa', '/kemahasiswaan/prestasi', 'dropdown', 5, 2, 1, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(12, 'Dokumen Kemahasiswaan', '/kemahasiswaan/dokumen', 'dropdown', 5, 3, 1, '2026-02-03 00:59:26', '2026-02-03 00:59:26'),
(13, 'Profil BAAK', '/profil', 'dropdown', 2, 1, 1, '2026-02-03 01:04:25', '2026-02-03 01:04:25'),
(14, 'Visi & Misi', '/visimisi', 'dropdown', 2, 2, 1, '2026-02-03 01:04:25', '2026-02-03 01:04:25'),
(46, 'MBKM', '/mbkm', 'dropdown', 4, 1, 1, '2026-02-03 17:44:59', '2026-02-03 17:44:59'),
(47, 'Kurikulum', 'curriculum', 'dropdown', 4, 3, 1, '2026-02-03 17:54:13', '2026-02-03 17:54:13'),
(17, 'Portal Akademik', '/portal-akademik', 'dropdown', 3, 1, 1, '2026-02-03 01:04:25', '2026-02-03 01:04:25'),
(18, 'Kalender Akademik', '/portal-akademik/kalender', 'dropdown', 3, 2, 1, '2026-02-03 01:04:25', '2026-02-03 01:04:25'),
(19, 'Rekap Suasana Akademik', '/suasana-akademik', 'dropdown', 3, 3, 1, '2026-02-03 01:04:25', '2026-02-03 17:35:04'),
(20, 'Rekap Dokumen Prodi', '/rekap-dok-prodi', 'dropdown', 7, 5, 1, '2026-02-03 01:04:25', '2026-02-03 17:35:51'),
(21, 'Legalisir & Terbit Ijazah', '/terbit-ijazah', 'dropdown', 6, 1, 1, '2026-02-03 01:04:25', '2026-02-03 01:04:25'),
(22, 'Layanan KRS', '/krs', 'dropdown', 6, 2, 1, '2026-02-03 01:04:25', '2026-02-03 01:04:25'),
(24, 'SKPI', '/skpi', 'dropdown', 6, 4, 1, '2026-02-03 01:04:25', '2026-02-03 01:04:25'),
(49, 'Pengajuan Link ZOOM', 'https://bit.ly/ZOOMSpadaUNIK', 'dropdown', 44, 2, 1, '2026-02-03 18:30:38', '2026-02-03 18:30:38'),
(26, 'Beasiswa', '/beasiswa', 'dropdown', 6, 6, 1, '2026-02-03 01:04:25', '2026-02-03 01:04:25'),
(27, 'Layanan Konseling', '/konseling', 'dropdown', 6, 7, 1, '2026-02-03 01:04:25', '2026-02-03 01:04:25'),
(28, 'Mahasiswa Asing', '/mhsasing', 'dropdown', 6, 8, 1, '2026-02-03 01:04:25', '2026-02-03 01:04:25'),
(29, 'Berita Terkini', '/information', 'dropdown', 7, 1, 1, '2026-02-03 01:04:25', '2026-02-03 01:04:25'),
(30, 'Kegiatan BAAK', '/kegiatan', 'dropdown', 2, 2, 1, '2026-02-03 01:04:25', '2026-02-03 18:52:08'),
(31, 'Agenda Rapat', '/rapat', 'dropdown', 7, 3, 1, '2026-02-03 01:04:25', '2026-02-03 01:04:25'),
(32, 'Arsip Digital', '/arsip-baak', 'dropdown', 7, 4, 1, '2026-02-03 01:04:25', '2026-02-03 01:04:25'),
(33, 'Pusat Tanya Jawab', '/tanya-jawab', 'dropdown', 7, 5, 1, '2026-02-03 01:04:25', '2026-02-03 01:04:25'),
(35, 'Layanan Akademik', '#', 'dropdown', 34, 1, 1, '2026-02-03 01:30:00', '2026-02-03 01:30:00'),
(36, 'Legalisir & Terbit Ijazah', '/terbit-ijazah', 'dropdown', 35, 1, 1, '2026-02-03 01:30:00', '2026-02-03 01:30:00'),
(37, 'Kartu Rencana Studi (KRS)', '/krs', 'dropdown', 35, 2, 1, '2026-02-03 01:30:00', '2026-02-03 18:32:51'),
(38, 'Informasi Wisuda', '/wsd', 'dropdown', 35, 3, 1, '2026-02-03 01:30:00', '2026-02-03 18:34:51'),
(39, 'Surat Keterangan Pendaming Ijazah (SKPI)', '/skpi', 'dropdown', 35, 4, 1, '2026-02-03 01:30:00', '2026-02-03 18:35:09'),
(40, 'Layanan Kemahasiswaan', '#', 'dropdown', 34, 3, 1, '2026-02-03 01:30:00', '2026-02-03 18:26:22'),
(41, 'Beasiswa', '/beasiswa', 'dropdown', 40, 1, 1, '2026-02-03 01:30:00', '2026-02-03 01:30:00'),
(42, 'Layanan Konseling', '/konseling', 'dropdown', 40, 2, 1, '2026-02-03 01:30:00', '2026-02-03 01:30:00'),
(43, 'Mahasiswa Asing', '/mhsasing', 'dropdown', 40, 3, 1, '2026-02-03 01:30:00', '2026-02-03 01:30:00'),
(44, 'Layanan Pembelajaran', '#', 'dropdown', 34, 2, 1, '2026-02-03 01:30:00', '2026-02-03 18:25:56'),
(45, 'Peminjaman Ruang SPADA (A2-11)', '/pinjam-ruang', 'dropdown', 44, 1, 1, '2026-02-03 01:30:00', '2026-02-03 18:27:40'),
(48, 'Lingkup Pembelajaran', '/pembelajaran', 'dropdown', 4, 0, 1, '2026-02-03 17:59:00', '2026-02-03 17:59:00'),
(50, 'Minat & Bakat', '/minatbakat', 'dropdown', 40, 1, 1, '2026-02-03 20:02:13', '2026-02-03 20:02:13'),
(51, 'Dokumen Eksternal BAAK', '/dok-eks', 'dropdown', 7, 3, 0, '2026-02-03 20:19:02', '2026-02-03 20:27:45');

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
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2026_02_03_000002_create_translations_table', 1),
(2, '0001_01_01_000000_create_users_table', 2),
(3, '0001_01_01_000001_create_cache_table', 2),
(4, '0001_01_01_000002_create_jobs_table', 2),
(5, '2026_01_15_012827_create_posts_table', 2),
(6, '2026_01_15_012827_create_sliders_table', 2),
(7, '2026_01_15_042413_create_menus_table', 2),
(8, '2026_01_15_042413_create_site_settings_table', 2),
(9, '2026_01_15_070308_create_staff_table', 2),
(10, '2026_01_15_072258_create_profile_contents_table', 2),
(11, '2026_01_15_073804_create_activities_table', 2),
(12, '2026_01_17_010052_create_faculties_table', 2),
(13, '2026_01_17_010053_create_document_categories_table', 2),
(14, '2026_01_17_010053_create_study_programs_table', 2),
(15, '2026_01_17_010054_create_academic_documents_table', 2),
(16, '2026_01_17_010054_create_education_levels_table', 2),
(17, '2026_01_17_010055_create_academic_calendar_events_table', 2),
(18, '2026_01_17_011607_create_portal_settings_table', 2),
(19, '2026_01_17_012634_add_description_to_document_categories_table', 2),
(20, '2026_01_17_020010_add_year_and_category_to_academic_calendar_events_table', 2),
(21, '2026_01_17_020731_add_calendar_pdf_to_portal_settings_table', 2),
(22, '2026_01_17_021833_create_academic_atmospheres_table', 2),
(23, '2026_01_17_025614_remove_academic_year_from_academic_atmospheres_table', 2),
(24, '2026_01_17_034518_create_learning_resources_table', 2),
(25, '2026_01_17_040245_create_learning_settings_table', 2),
(26, '2026_01_17_042140_add_faculty_id_to_learning_resources_table', 2),
(27, '2026_01_17_044645_add_type_and_video_url_to_learning_resources_table', 2),
(28, '2026_01_17_050221_create_mbkm_settings_table', 2),
(29, '2026_01_17_060145_add_year_to_learning_resources_table', 2),
(30, '2026_01_21_012742_create_kemahasiswaan_settings_table', 2),
(31, '2026_01_21_012742_create_student_achievements_table', 2),
(32, '2026_01_21_015020_add_about_and_stats_to_kemahasiswaan_settings_table', 2),
(33, '2026_01_21_021214_create_prestasi_settings_table', 2),
(34, '2026_01_21_021216_create_achievement_items_table', 2),
(35, '2026_01_21_031403_create_student_document_categories_table', 2),
(36, '2026_01_21_031407_add_student_category_id_to_learning_resources_table', 2),
(37, '2026_01_21_031840_create_learning_document_categories_table', 2),
(38, '2026_01_21_031841_add_learning_category_id_to_learning_resources_table', 2),
(39, '2026_01_21_033733_add_year_to_academic_documents_table', 2),
(40, '2026_01_21_034636_add_type_to_menus_table', 2),
(41, '2026_01_21_043339_create_krs_settings_table', 2),
(42, '2026_01_22_010000_create_wisuda_schedules_table', 2),
(43, '2026_01_22_034204_create_ukms_table', 2),
(44, '2026_01_22_041528_create_counselors_table', 2),
(45, '2026_01_22_041530_create_counseling_schedules_table', 2),
(46, '2026_01_22_041533_create_counseling_requests_table', 2),
(47, '2026_01_23_000000_create_information_tables', 2),
(48, '2026_01_23_000000_create_mahasiswa_asing_tables', 2),
(49, '2026_01_26_011010_add_attachment_to_information_posts_table', 2),
(50, '2026_01_26_031904_create_external_documents_table', 2),
(51, '2026_01_26_032912_add_curriculum_password_to_learning_settings_table', 2),
(52, '2026_01_26_035114_create_meeting_agendas_table', 2),
(53, '2026_01_26_035116_create_meeting_settings_table', 2),
(54, '2026_01_28_011502_create_archive_categories_table', 2),
(55, '2026_01_28_011502_create_archive_sections_table', 2),
(56, '2026_01_28_011503_create_archives_table', 2),
(57, '2026_01_28_011504_create_archive_settings_table', 2),
(58, '2026_01_28_012817_add_link_and_nullable_attachment_to_archives_table', 2),
(59, '2026_01_28_024916_create_study_program_document_settings_table', 2),
(60, '2026_01_28_064838_create_hero_sections_table', 2),
(61, '2026_01_28_070147_add_card_images_to_hero_sections_table', 2),
(62, '2026_01_28_075632_create_question_answers_table', 2),
(63, '2026_01_29_020810_create_page_sections_table', 2),
(64, '2026_01_29_020810_create_pages_table', 2),
(65, '2026_01_29_044500_create_page_passwords_table', 2),
(66, '2026_02_03_000000_create_dashboard_buttons_table', 2),
(67, '2026_02_03_000001_create_baak_programs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_passwords`
--

DROP TABLE IF EXISTS `page_passwords`;
CREATE TABLE IF NOT EXISTS `page_passwords` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `target_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_id` bigint UNSIGNED NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_passwords_target_type_target_id_index` (`target_type`,`target_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_sections`
--

DROP TABLE IF EXISTS `page_sections`;
CREATE TABLE IF NOT EXISTS `page_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `page_id` bigint UNSIGNED NOT NULL,
  `section_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` json DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_sections_page_id_foreign` (`page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `portal_settings`
--

DROP TABLE IF EXISTS `portal_settings`;
CREATE TABLE IF NOT EXISTS `portal_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Selamat Datang di Portal Akademik',
  `description` text COLLATE utf8mb4_unicode_ci,
  `button_1_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Login Mahasiswa',
  `button_1_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'https://siam.unik-kediri.ac.id/Login',
  `button_2_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Login Dosen',
  `button_2_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'https://simpeg.unik-kediri.ac.id/welcome',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `calendar_pdf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portal_settings`
--

INSERT INTO `portal_settings` (`id`, `banner_image`, `title`, `description`, `button_1_text`, `button_1_url`, `button_2_text`, `button_2_url`, `created_at`, `updated_at`, `calendar_pdf`) VALUES
(1, 'portal-banner/01KGK1G1RHGPQRSJ7DGP4VDAMV.png', 'Selamat Datang di Portal Akademik', 'Universitas Kadiri menyediakan layanan akademik terpadu untuk mendukung proses pembelajaran dan administratif bagi mahasiswa, dosen, dan staf.', 'Login Mahasiswa', 'https://siam.unik-kediri.ac.id/Login', 'Login Dosen', 'https://simpeg.unik-kediri.ac.id/welcome', '2026-02-03 00:59:25', '2026-02-03 17:40:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Informasi',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prestasi_settings`
--

DROP TABLE IF EXISTS `prestasi_settings`;
CREATE TABLE IF NOT EXISTS `prestasi_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `hero_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_contents`
--

DROP TABLE IF EXISTS `profile_contents`;
CREATE TABLE IF NOT EXISTS `profile_contents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `about_us` text COLLATE utf8mb4_unicode_ci,
  `structure_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vision` text COLLATE utf8mb4_unicode_ci,
  `mission` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_contents`
--

INSERT INTO `profile_contents` (`id`, `about_us`, `structure_image`, `vision`, `mission`, `created_at`, `updated_at`) VALUES
(1, 'Biro Administrasi Akademik dan Kemahasiswaan merupakan unsur pelaksana di bidang administrasi akademik, kemahasiswaan dan alumni sebagai unit kerja di bawah dan bertanggungjawab langsung kepada Rektor dengan pembinaan sehari-hari berada dibawah Wakil Rektor 1 Bidang Akademik dan Wakil Rektor 3 Bidang Kemahasiswaan.', NULL, '<p>Menjadi Biro yang unggul dalam pelayanan administrasi akademik dan kemahasiswaan berbasis teknologi informasi.</p>', '<ul><li>Memberikan pelayanan prima kepada mahasiswa dan dosen.</li><li>Mengembangkan sistem informasi akademik yang terintegrasi.</li><li>Meningkatkan kesejahteraan dan prestasi mahasiswa.</li></ul>', '2026-02-03 00:59:25', '2026-02-03 00:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `question_answers`
--

DROP TABLE IF EXISTS `question_answers`;
CREATE TABLE IF NOT EXISTS `question_answers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('MOOPq6ipbjgec6JXEs5rCrguvgUl67MllO6gXdJy', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YToxMDp7czo2OiJfdG9rZW4iO3M6NDA6IlRXRmduWFNqYkV2UWtvWXk0ZWhDVENpNUpIYXlQR203bDJxUzROOWUiO3M6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjMyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vdWttcyI7czo1OiJyb3V0ZSI7czozNToiZmlsYW1lbnQuYWRtaW4ucmVzb3VyY2VzLnVrbXMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2NDoiODQ5M2VlNDk3NjBmYjE2OGExOGZkMzY3ZWZlMTUwZjA4MDRmMmQyZWMwZDlmYzcxMGY5ZjNhNGY3ZjdiOTg5YyI7czo4OiJmaWxhbWVudCI7YTowOnt9czo2OiJ0YWJsZXMiO2E6MTp7czo0MToiMTA2ZTU3NzkzOTBiYWVlMjM5N2NkMTNlZGQ3ODczMDBfcGVyX3BhZ2UiO3M6MzoiYWxsIjt9czoyNzoiY3VycmljdWx1bV9hdXRoZW50aWNhdGVkX2F0IjtPOjI1OiJJbGx1bWluYXRlXFN1cHBvcnRcQ2FyYm9uIjozOntzOjQ6ImRhdGUiO3M6MjY6IjIwMjYtMDItMDQgMDE6MDU6MDIuMDk1NDcyIjtzOjEzOiJ0aW1lem9uZV90eXBlIjtpOjM7czo4OiJ0aW1lem9uZSI7czozOiJVVEMiO31zOjY6ImxvY2FsZSI7czoyOiJpZCI7fQ==', 1770190490);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BAAK Universitas Kadiri',
  `header_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `header_logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'BAAK - Biro Administrasi Akademik dan Kemahasiswaan Universitas Kadiri', 'settings/01KGK0X0C1MQABE64Y0FS8VP4S.png', 'settings/01KGK0X0C5FC73YGC1TYC7H7N5.png', '2026-02-03 00:59:25', '2026-02-03 17:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_head` tinyint(1) NOT NULL DEFAULT '0',
  `bio` text COLLATE utf8mb4_unicode_ci,
  `duties` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `staff_category_index` (`category`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `position`, `image`, `category`, `is_head`, `bio`, `duties`, `facebook`, `instagram`, `twitter`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Drs. Budi Santoso, M.Pd.', 'Kepala Biro', NULL, 'kepala_biro', 1, 'Berpengalaman lebih dari 20 tahun dalam administrasi akademik...', 'Memimpin dan mengkoordinasikan seluruh kegiatan administrasi akademik dan kemahasiswaan.', NULL, NULL, NULL, 0, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(2, 'Siti Aminah, S.Kom.', 'Kabag Akademik', NULL, 'akademik', 1, 'Ahli dalam sistem informasi manajemen perguruan tinggi...', 'Mengelola registrasi ulang, KRS, dan data akademik mahasiswa.', NULL, NULL, NULL, 0, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(3, 'Budi Utomo, S.E.', 'Staf Administrasi Akademik', NULL, 'akademik', 0, NULL, NULL, NULL, NULL, NULL, 0, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(4, 'Ani Lestari, A.Md.', 'Staf Pelayanan Akademik', NULL, 'akademik', 0, NULL, NULL, NULL, NULL, NULL, 0, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(5, 'Dr. Rina Wati, M.Pd.', 'Kabag Pembelajaran', NULL, 'pembelajaran', 1, 'Fokus pada pengembangan kurikulum dan metode pembelajaran...', 'Mengkoordinasikan pelaksanaan perkuliahan dan evaluasi pembelajaran.', NULL, NULL, NULL, 0, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(6, 'Dewi Sartika, S.Pd.', 'Staf Kurikulum', NULL, 'pembelajaran', 0, NULL, NULL, NULL, NULL, NULL, 0, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(7, 'Ahmad Rizki, S.T.', 'Kabag Kemahasiswaan', NULL, 'kemahasiswaan', 1, 'Aktif dalam pembinaan organisasi mahasiswa sejak 2015...', 'Mengelola beasiswa, prestasi, dan kegiatan ormawa.', NULL, NULL, NULL, 0, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(8, 'Eko Prasetyo, S.Sos.', 'Staf Beasiswa', NULL, 'kemahasiswaan', 0, NULL, NULL, NULL, NULL, NULL, 0, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(9, 'Fifi Nuraini, S.Psi.', 'Staf Konseling', NULL, 'kemahasiswaan', 0, NULL, NULL, NULL, NULL, NULL, 0, '2026-02-03 00:59:25', '2026-02-03 00:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `student_achievements`
--

DROP TABLE IF EXISTS `student_achievements`;
CREATE TABLE IF NOT EXISTS `student_achievements` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_mahasiswa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_studi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kompetisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prestasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_document_categories`
--

DROP TABLE IF EXISTS `student_document_categories`;
CREATE TABLE IF NOT EXISTS `student_document_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_document_categories_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_document_categories`
--

INSERT INTO `student_document_categories` (`id`, `name`, `slug`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Pedoman', 'pedoman', 0, 1, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(2, 'Panduan', 'panduan', 1, 1, '2026-02-03 00:59:26', '2026-02-03 00:59:26'),
(3, 'SOP', 'sop', 2, 1, '2026-02-03 00:59:26', '2026-02-03 00:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `study_programs`
--

DROP TABLE IF EXISTS `study_programs`;
CREATE TABLE IF NOT EXISTS `study_programs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `faculty_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `study_programs_faculty_id_foreign` (`faculty_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `study_program_document_settings`
--

DROP TABLE IF EXISTS `study_program_document_settings`;
CREATE TABLE IF NOT EXISTS `study_program_document_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `spreadsheet_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `study_program_document_settings`
--

INSERT INTO `study_program_document_settings` (`id`, `spreadsheet_url`, `password`, `created_at`, `updated_at`) VALUES
(1, 'https://docs.google.com/spreadsheets/d/1T1VouLGG1MDgxo1lhsaNhdFZqknMbvhSt58Amq8kz9Y/edit?usp=sharing', NULL, '2026-02-03 17:24:58', '2026-02-03 17:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `ukms`
--

DROP TABLE IF EXISTS `ukms`;
CREATE TABLE IF NOT EXISTS `ukms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ukms`
--

INSERT INTO `ukms` (`id`, `name`, `description`, `category`, `instagram_link`, `image`, `created_at`, `updated_at`) VALUES
(1, 'UKM Seni', 'Tempat di mana imajinasi menjadi nyata. Di UKM Seni, mahasiswa bebas mengekspresikan kreativitas lewat karya, pentas, dan kolaborasi seni yang penuh warna.', 'Seni', 'https://www.instagram.com/ukmseni_asmarakala/?utm_source=ig_web_button_share_sheet', NULL, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(2, 'UKM Olahraga', 'Bagi jiwa-jiwa penuh energi! UKM Olahraga adalah ruang untuk mengasah bakat, meningkatkan performa, dan menaklukkan tantangan di setiap arena.', 'Olahraga', 'https://www.instagram.com/ukmolahraga.unik?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==', NULL, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(3, 'UKM PIK R-KSR', 'Lebih dari sekadar berbagi informasi, UKM PIK-R KSR hadir untuk menginspirasi hidup sehat, peduli sesama, dan mencetak relawan tangguh untuk masa depan.', 'Kesehatan', 'https://www.instagram.com/ukm_pikksrunik?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==', NULL, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(4, 'UKM Mapala Mauna Kea', 'Panggilan untuk para petualang sejati! UKM MAPALA adalah tempat berkumpulnya para pecinta alam yang siap menaklukkan gunung, hutan, dan segala tantangan alam raya.', 'Alam', 'https://www.instagram.com/mpa_maunakea?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==', NULL, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(5, 'UKM Resimen Mahasiswa', 'Wadah bagi mahasiswa yang tertarik pada bela negara dan kedisiplinan. UKM ini aktif dalam pelatihan ketahanan fisik, kepemimpinan, dan kegiatan pengamanan.', 'Kepemimpinan', '#', NULL, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(6, 'UKM PSHT', 'Wadah bagi mahasiswa yang ingin mengembangkan diri melalui seni bela diri Persaudaraan Setia Hati Terate.', 'Olahraga', 'https://www.instagram.com/ukmpshtuniv.kadiri?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==', NULL, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(7, 'UKM Kerohanian Islam AN-Nur', 'Wadah bagi mahasiswa muslim untuk memperdalam nilai keislaman. UKM ini aktif dalam kajian rutin, pelatihan dakwah, dan kegiatan sosial keagamaan.', 'Keagamaan', 'https://www.instagram.com/ukki_an_nur?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==', NULL, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(8, 'UKM Kristen Katolik', 'Bersama membangun iman yang kuat dan kasih yang luas. UKM Kerohanian Kristen Katolik menghadirkan ruang bertumbuh, beribadah, dan berbagi berkat kepada sesama.', 'Keagamaan', 'https://www.instagram.com/ukmkk.unik?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==', NULL, '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(9, 'UKM Komunikasi Lentera', 'Wadah bagi mahasiswa yang berminat di bidang jurnalistik, media, dan komunikasi. UKM ini aktif menerbitkan buletin, membuat konten kreatif, dan mengadakan pelatihan komunikasi.', 'Akademik', 'https://www.instagram.com/komunikasi.lenteraunik?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==', NULL, '2026-02-03 00:59:25', '2026-02-03 00:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin BAAK', 'admin@baak.unik-kediri.ac.id', '2026-02-03 00:59:25', '$2y$12$VuJsIzjX0ydAaUuRx6jYO.mERhU6iGOQHqG1A8RuZvh7Z90eO59X6', 'gHGBfiX8Wl', '2026-02-03 00:59:25', '2026-02-03 00:59:25'),
(2, 'Admin', 'admin@admin.com', NULL, '$2y$12$1dyTbCw70ybqDzHrz1I5kuQRe6npZ.GibWiDE2eba.Cu8e5R4tq4O', NULL, '2026-02-03 01:01:01', '2026-02-03 01:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `wisuda_schedules`
--

DROP TABLE IF EXISTS `wisuda_schedules`;
CREATE TABLE IF NOT EXISTS `wisuda_schedules` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_genap_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schedule_ganjil_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_genap_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_ganjil_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
