-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 03:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wikifoot`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Spain', '2020-07-27 12:12:23', '2020-07-27 12:12:23'),
(2, 'England', '2020-07-27 12:14:36', '2020-07-27 12:14:36'),
(3, 'Germany', '2020-07-27 12:14:52', '2020-07-27 12:14:52'),
(4, 'Italy', '2020-07-27 12:15:14', '2020-07-27 12:15:14'),
(5, 'France', '2020-07-27 12:15:27', '2020-07-27 12:15:27'),
(6, 'Portugal', '2020-07-21 19:06:14', '2020-07-21 19:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(10) UNSIGNED NOT NULL,
  `club_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`, `body`, `category_id`, `created_at`, `updated_at`, `user_id`, `logo`) VALUES
(1, 'FC Porto', 'The best portuguese club, and most successfull portuguese club in european trophies, with 7 titles (2 UEFA Champions League, 2 UEFA Europa League, 2 Intercontinental Cup and 1 UEFA Super Cup). Holds the record for more consecutive league titles in the portuguese league, 5 in a row (1994-1995/1998-1999)', '6', '2020-07-14 21:26:39', '2020-07-27 12:30:09', 1, 'fcporto_1594765598.png'),
(2, 'Juventus FC', 'Best italian club, and it\'s where, at the time this is being posted, the best player in the World plays, Cristiano Ronaldo.', '4', '2020-07-14 21:27:52', '2020-07-14 21:27:52', 1, 'juve_1594765672.png'),
(3, 'Arsenal FC', 'The best team in England, there\'s nothing else to say.', '2', '2020-07-14 21:28:40', '2020-07-14 21:28:40', 1, 'arsenal_1594765720.png'),
(4, 'FC Famalicão', 'The sensational team in the portuguese league. Recently promoted, they\'re only a couple games to secure a place in UEFA Europa League next season.', '6', '2020-07-14 21:29:57', '2020-07-14 21:29:57', 1, 'famalicao_1594765797.png'),
(5, 'Real Madrid', 'The best team in the spanish league, and one of the best teams in the world. Holds the record for the most consecutive UEFA European Cup (former UEFA Champions League), 5 times in a row, and also a record in UEFA Champions League, winning 3 times in a row.', '1', '2020-07-14 21:35:00', '2020-07-14 21:35:00', 1, 'realmadrid_1594766100.png'),
(6, 'AS Monaco FC', 'One of the best teams in french football. Having 7 Ligue 1 titles, the last one being in 2017/2018, their first league title in 17 years, with the portuguese manager Leonardo Jardim at the front.', '5', '2020-07-14 21:39:11', '2020-07-14 21:39:11', 1, 'asmonaco_1594766351.png'),
(7, 'FC Barcelona', 'One of the best teams in spanish football, and one of the most successfull clubs in Europe. It\'s where the second best player in the world plays, Lionel Messi.', '1', '2020-07-14 21:43:43', '2020-07-14 21:43:43', 1, 'fcbarça_1594766623.png'),
(8, 'SL Benfica', 'Nothing to say really', '6', '2020-07-14 21:52:01', '2020-07-14 21:52:01', 1, 'slbosta_1594767121.png'),
(9, 'RB Leipzig', 'RasenBallsport Leipzig e.V., commonly known as RB Leipzig, is a German professional football club based in Leipzig, Saxony. The club was founded in 2009. They dominated the inferiors divisions, and on 8 May 2016, RB Leipzig ensured promotion to the Bundesliga for the 2016–17 season with a 2–0 win over Karlsruher SC. One year later, RB Leipzig captured a place in the 2017–18 UEFA Champions League by finishing as runners-up in the Bundesliga.', '3', '2020-07-27 12:01:13', '2020-07-27 12:01:13', 1, 'RB_Leipzig_2020_Logo_1595854873.png'),
(11, 'FC Bayern Munchen', 'Fußball-Club Bayern München e.V., commonly known as FC Bayern München, FCB, Bayern Munich, or FC Bayern, is a German professional sports club based in Munich, Bavaria. It is best known for its professional football team, which plays in the Bundesliga, the top tier of the German football league system, and is the most successful club in German football history, having won a record 30 national titles including 8 on the bounce since 2013 and 20 national cups, along with numerous European honours.', '3', '2020-07-27 14:33:58', '2020-07-27 14:34:13', 1, 'fcbayern_1595864053.png'),
(12, 'Borussia Dortmund', 'Is one of the best clubs in Germany, having 8 Bundesliga titles, 4 DFB-Pokals (German cup), 6 DFL-Supercups, 1 UEFA Champions League, 1 Intercontinental Cup and 1 Cup Winners\' Cup, in 1966, making them the first German team to win an european trophy.', '3', '2020-08-04 19:28:47', '2020-08-04 19:28:47', 1, 'borussiadortmund_1596572926.png');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2020_05_17_171503_create_clubs_table', 1),
(12, '2020_05_31_180650_add_user_id_to_clubs', 1),
(13, '2020_07_11_003547_add_logo_to_clubs', 1),
(14, '2020_07_14_025209_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.com', NULL, '$2y$10$1LTPKjRDVdQr98Zgh/XGhuhW4pgNazS/YzG3egCoElXWs9R6c5TnG', NULL, '2020-07-14 21:25:06', '2020-07-14 21:25:06'),
(2, 'dasd', 'dasd@mail.com', NULL, '$2y$10$aCg41VBCUTzF5IGwL5g2t..dS4RatrmuPwt0boGs8xI/VTXRg346G', NULL, '2020-07-27 12:13:29', '2020-07-27 12:13:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
