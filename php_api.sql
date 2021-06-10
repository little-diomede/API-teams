-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 10 jun 2021 om 10:29
-- Serverversie: 5.7.31
-- PHP-versie: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_api`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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
-- Tabelstructuur voor tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_01_074741_create_teams_table', 1),
(5, '2021_06_01_075042_create_players_table', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `playernumber` double NOT NULL,
  `starter` tinyint(1) NOT NULL,
  `joined` date NOT NULL,
  `name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `players_team_id_foreign` (`team_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `players`
--

INSERT INTO `players` (`id`, `username`, `playernumber`, `starter`, `joined`, `name`, `href`, `team_id`, `created_at`, `updated_at`) VALUES
(1, 'super', 1, 0, '2021-06-10', 'Matthew Delisi', 'Super.png', 1, '2021-06-10 06:42:44', '2021-06-10 06:42:44'),
(2, 'nero', 6, 1, '2021-06-10', 'Charlie Zwarg', 'nero.png', 1, '2021-06-10 06:43:30', '2021-06-10 06:43:30'),
(3, 'smurf', 5, 1, '2021-06-10', 'MYEONG HWAN YOO', 'smurf.png', 1, '2021-06-10 06:44:13', '2021-06-10 06:44:13'),
(4, 'twilight', 98, 0, '2021-06-10', 'JUSEOK LEE', 'twilight.png', 1, '2021-06-10 06:44:48', '2021-06-10 06:44:48'),
(5, 'fdgod', 27, 1, '2021-06-10', 'BRICE MONSCAVOIR', 'fdgod.png', 1, '2021-06-10 06:45:26', '2021-06-10 06:45:26'),
(6, 'striker', 7, 1, '2021-06-10', 'NAMJU GWON', 'striker.png', 1, '2021-06-10 06:46:00', '2021-06-10 06:46:00'),
(7, 'choihyobin', 11, 1, '2021-06-10', 'HYOBIN CHOI', 'choi.png', 1, '2021-06-10 06:46:34', '2021-06-10 06:46:34'),
(8, 'viol2t', 17, 1, '2021-06-10', 'MINKI PARK', 'viol2t.png', 1, '2021-06-10 06:47:11', '2021-06-10 06:47:11'),
(9, 'glister', 21, 0, '2021-06-10', 'GILSEONG LIM', 'glister.png', 1, '2021-06-10 06:47:34', '2021-06-10 06:47:34'),
(10, 'ta1yo', 47, 0, '2021-06-10', 'SEAN TAIYO HENDERSON', 'tay1o.png', 1, '2021-06-10 06:48:07', '2021-06-10 06:48:07'),
(11, 'pine', 21, 0, '2021-06-10', 'DO HYEON KIM', 'pine.png', 2, '2021-06-10 06:49:29', '2021-06-10 06:49:29'),
(12, 'jecse', 21, 1, '2021-06-10', 'SEUNGSOO LEE', 'jecse.png', 2, '2021-06-10 06:49:58', '2021-06-10 06:49:58'),
(13, 'sp9rk1e', 1, 1, '2021-06-10', 'YEONGHAN KIM', 'sparkle.png', 2, '2021-06-10 06:50:26', '2021-06-10 06:50:26'),
(14, 'hanbin', 11, 1, '2021-06-10', 'HANBEEN CHOI', 'hanbin.png', 2, '2021-06-10 06:50:55', '2021-06-10 06:50:55'),
(15, 'fielder', 31, 1, '2021-06-10', 'JUN KWON', 'fielder.png', 2, '2021-06-10 06:51:17', '2021-06-10 06:51:17'),
(16, 'fearless', 8, 1, '2021-06-10', 'EUISEOK LEE', 'fearless.png', 2, '2021-06-10 06:51:36', '2021-06-10 06:51:36'),
(17, 'rapel', 7, 0, '2021-06-10', 'JUN KEUN KIM', 'rapel.png', 2, '2021-06-10 06:52:01', '2021-06-10 06:57:24'),
(18, 'doha', 20, 1, '2021-06-10', 'DONGHA KIM', 'doha.png', 2, '2021-06-10 06:52:20', '2021-06-10 06:52:20');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `winrate` int(11) NOT NULL,
  `href` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `teams`
--

INSERT INTO `teams` (`id`, `name`, `winrate`, `href`, `created_at`, `updated_at`) VALUES
(1, 'SanFransiscoShock', 80, 'shock.jpg', '2021-06-10 06:41:27', '2021-06-10 06:41:27'),
(2, 'DallasFuel', 90, 'Dallas.png', '2021-06-10 06:48:23', '2021-06-10 06:48:23');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
