-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 09:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lokalabltcoba`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_alls`
--

CREATE TABLE `alternatif_alls` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `name_warga` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif_alls`
--

INSERT INTO `alternatif_alls` (`id`, `id_kriteria`, `id_subkriteria`, `name_warga`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'erik', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(2, 2, 5, 'erik', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(3, 3, 10, 'erik', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(4, 4, 12, 'erik', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(5, 5, 16, 'erik', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(6, 1, 3, 'nana', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(7, 2, 6, 'nana', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(8, 3, 9, 'nana', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(9, 4, 11, 'nana', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(10, 5, 16, 'nana', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(11, 1, 3, 'Yola', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(12, 2, 4, 'Yola', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(13, 3, 10, 'Yola', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(14, 4, 13, 'Yola', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(15, 5, 16, 'Yola', '2023-07-24 09:32:56', '2023-07-24 09:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` int(10) UNSIGNED NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `bobot_kriteria` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `kriteria`, `bobot_kriteria`, `created_at`, `updated_at`) VALUES
(1, 'Pekerjaan', 4, '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(2, 'Penghasilan', 5, '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(3, 'Kepemilikan Rumah', 5, '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(4, 'Tanggungan', 4, '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(5, 'Domisili', 3, '2023-07-24 09:32:56', '2023-07-24 09:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_16_202055_create_tasks_table', 1),
(6, '2023_07_18_095134_add_mark_to_tasks_table', 1),
(7, '2023_07_22_155756_create_criterias_table', 1),
(8, '2023_07_22_193430_create_posts_table', 1),
(9, '2023_07_23_105643_create_sub_criterias_table', 1),
(10, '2023_07_23_110543_create_alternatif_alls_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 2, 'Sunt vel voluptas quam quam non et explicabo quae.', 'Deserunt ut cupiditate odit veritatis debitis.', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(2, 2, 'Pariatur voluptates rerum possimus.', 'Esse iste et quisquam placeat repudiandae odio ratione placeat.', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(3, 2, 'Quod facilis et ea eos tempora sint.', 'Qui consequatur asperiores id autem officiis non.', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(4, 2, 'Vel minus ipsum architecto libero ut.', 'Atque quasi nostrum dolores est dolorem.', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(5, 2, 'Nesciunt iste labore enim suscipit cupiditate ex ipsam dolorum.', 'Reprehenderit est voluptas expedita consequuntur.', '2023-07-24 09:32:56', '2023-07-24 09:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `sub_criterias`
--

CREATE TABLE `sub_criterias` (
  `id` int(10) UNSIGNED NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `sub_kriteria` varchar(255) NOT NULL,
  `nilai_skala` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_criterias`
--

INSERT INTO `sub_criterias` (`id`, `kriteria_id`, `sub_kriteria`, `nilai_skala`, `created_at`, `updated_at`) VALUES
(1, 1, 'Serabutan', 3, NULL, NULL),
(2, 1, 'PHK', 2, NULL, NULL),
(3, 1, 'Wirausaha', 1, NULL, NULL),
(4, 2, '< Rp .1.000.000 ', 4, NULL, NULL),
(5, 2, 'Rp .1.000.000 - 2.000.000', 3, NULL, NULL),
(6, 2, 'Rp .2.000.000 - 2.500.000', 2, NULL, NULL),
(7, 2, '> Rp. 2.500.000', 1, NULL, NULL),
(8, 3, 'Milik sendiri ', 1, NULL, NULL),
(9, 3, 'Mengintrak', 2, NULL, NULL),
(10, 3, 'menumpang keluarga ( pisah kk )', 3, NULL, NULL),
(11, 4, '1 Tangggungan', 1, NULL, NULL),
(12, 4, '2 Tangggungan', 2, NULL, NULL),
(13, 4, '3 Tangggungan ', 3, NULL, NULL),
(14, 4, '4 Tangggungan', 4, NULL, NULL),
(15, 5, 'Kel.Kendal', 1, NULL, NULL),
(16, 5, 'Luar Kel.Kendal', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `list` varchar(191) NOT NULL,
  `mark` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `list`, `mark`, `created_at`, `updated_at`) VALUES
(1, 'Odio debitis nam sed ab ut sit excepturi nesciunt.', 1, '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(2, 'Est magni labore eaque quia sed est.', 1, '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(3, 'Corporis esse officia eos sunt consequatur sed praesentium.', 1, '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(4, 'Minus dolores asperiores ut et et ducimus.', 0, '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(5, 'Tempore qui sed quas nulla.', 0, '2023-07-24 09:32:56', '2023-07-24 09:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Madilyn Effertz', 'lexus46', 'isai.smith@example.com', '2023-07-24 09:32:55', '$2y$10$rQDZMQgDkClVbm8PBgBsS.N/SNLkDRNO8D7cj9qpenVII0ZA.vQZG', 'KL9bxYK0IK', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(2, 'Reymundo Armstrong V', 'lance.batz', 'dshields@example.org', '2023-07-24 09:32:55', '$2y$10$Euzurcihj2Xozf145usRUu2KAQlTBPyIQUwqL1Mkedbbm6GI7iU8m', 'HKX23nAYoh', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(3, 'Prof. Micah Turner IV', 'shanie50', 'trevion.beatty@example.net', '2023-07-24 09:32:55', '$2y$10$sDvyvmjAvwYjNo8uTnLuKeq8p/5yOrOJpStLbG0gYjXuIyLQgJsUi', 'c8oF8VTFKL', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(4, 'Cierra Goodwin', 'strosin.cletus', 'sarai.kunde@example.com', '2023-07-24 09:32:55', '$2y$10$Z2pwZvk3WYSfGdlB7rGEL.XuHJ0BPDe0BZVas.asZeH/88Jv2n1Ni', 'Sybl04kRSC', '2023-07-24 09:32:56', '2023-07-24 09:32:56'),
(5, 'Gisselle Stroman', 'powlowski.ruben', 'tremblay.domenic@example.org', '2023-07-24 09:32:55', '$2y$10$58cHvhZqD2nkb2U/y0f2ZecWLZt6f0aMI3j/RfYdTeSllqmpeAyhm', 'cf1bHiTTEO', '2023-07-24 09:32:56', '2023-07-24 09:32:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif_alls`
--
ALTER TABLE `alternatif_alls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `sub_criterias`
--
ALTER TABLE `sub_criterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif_alls`
--
ALTER TABLE `alternatif_alls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_criterias`
--
ALTER TABLE `sub_criterias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
