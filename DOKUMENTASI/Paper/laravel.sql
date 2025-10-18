-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20250703.aa083f168f
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 10, 2025 at 02:39 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `id_attribut` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama_alternatif`, `id_attribut`) VALUES
(1, '1', 1),
(2, '2', 1),
(3, '3', 1),
(4, '4', 1),
(5, '5', 1),
(6, '6', 1),
(7, '7', 1),
(8, '8', 1),
(9, '9', 1),
(10, '10', 1),
(11, '11', 1),
(12, '12', 1),
(13, '13', 1),
(14, '14', 1),
(15, '15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_kriteria`
--

CREATE TABLE `alternatif_kriteria` (
  `id` bigint UNSIGNED NOT NULL,
  `id_alternatif` bigint UNSIGNED NOT NULL,
  `id_kriteria` bigint UNSIGNED NOT NULL,
  `bobot_alternatif` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `alternatif_kriteria`
--

INSERT INTO `alternatif_kriteria` (`id`, `id_alternatif`, `id_kriteria`, `bobot_alternatif`) VALUES
(78, 1, 1, 6.00),
(79, 1, 2, 2.00),
(80, 1, 3, 3.00),
(81, 1, 4, 3.00),
(82, 2, 1, 5.00),
(83, 2, 2, 3.00),
(84, 2, 3, 3.00),
(85, 2, 4, 4.00),
(86, 3, 1, 6.00),
(87, 3, 2, 2.00),
(88, 3, 3, 3.00),
(89, 3, 4, 2.00),
(94, 5, 1, 5.00),
(95, 5, 2, 2.00),
(96, 5, 3, 3.00),
(97, 5, 4, 5.00),
(106, 8, 1, 4.00),
(107, 8, 2, 3.00),
(108, 8, 3, 4.00),
(109, 8, 4, 3.00),
(110, 9, 1, 6.00),
(111, 9, 2, 2.00),
(112, 9, 3, 2.00),
(113, 9, 4, 2.00),
(118, 11, 1, 5.00),
(119, 11, 2, 3.00),
(120, 11, 3, 4.00),
(121, 11, 4, 6.00),
(126, 13, 1, 6.00),
(127, 13, 2, 2.00),
(128, 13, 3, 3.00),
(129, 13, 4, 2.00),
(134, 15, 1, 5.00),
(135, 15, 2, 2.00),
(136, 15, 3, 2.00),
(137, 15, 4, 6.00),
(138, 7, 1, 3.00),
(139, 7, 2, 4.00),
(140, 7, 3, 3.00),
(141, 7, 4, 2.00),
(142, 10, 1, 2.00),
(143, 10, 2, 4.00),
(144, 10, 3, 4.00),
(145, 10, 4, 2.00),
(146, 12, 1, 2.00),
(147, 12, 2, 4.00),
(148, 12, 3, 4.00),
(149, 12, 4, 3.00),
(150, 14, 1, 2.00),
(151, 14, 2, 4.00),
(152, 14, 3, 3.00),
(153, 14, 4, 5.00),
(154, 4, 1, 5.00),
(155, 4, 2, 4.00),
(156, 4, 3, 2.00),
(157, 4, 4, 4.00),
(158, 6, 1, 6.00),
(159, 6, 2, 4.00),
(160, 6, 3, 3.00),
(161, 6, 4, 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `attribut`
--

CREATE TABLE `attribut` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_attribut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attribut`
--

INSERT INTO `attribut` (`id`, `nama_attribut`) VALUES
(1, 'Alpha');

-- --------------------------------------------------------

--
-- Table structure for table `hobis`
--

CREATE TABLE `hobis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hobi_profile`
--

CREATE TABLE `hobi_profile` (
  `id` bigint UNSIGNED NOT NULL,
  `profile_id` bigint UNSIGNED NOT NULL,
  `hobi_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `tipe_kriteria` enum('benefit','cost') NOT NULL,
  `bobot_kriteria` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama_kriteria`, `tipe_kriteria`, `bobot_kriteria`) VALUES
(1, 'Nama Produk', 'cost', 2.00),
(2, 'Jenis Kulit', 'cost', 3.00),
(3, 'Usia', 'cost', 3.00),
(4, 'Harga', 'cost', 4.00);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_07_04_163024_create_attribut_table', 1),
(2, '2025_07_04_163157_create_alternatif_table', 1),
(3, '2025_07_04_163216_create_kriteria_table', 1),
(4, '2025_07_04_163217_create_alternatif_kriteria_table', 1),
(5, '2025_07_04_163308_create_subkriteria_table', 1),
(6, '2025_07_04_163321_create_roles_table', 1),
(7, '2025_07_04_163322_create_users_table', 1),
(8, '2025_07_04_163623_create_profiles_table', 1),
(9, '2025_07_04_163642_create_hobis_table', 1),
(10, '2025_07_04_163643_create_hobi_profile_table', 1),
(11, '2025_07_06_074725_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `gender` enum('laki-laki','perempuan') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `alamat` text,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama_role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rVv3tSHDHO0fFNICPzAYO0mooGWRBiX9Bpgy4VFM', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVEY5VDNGQ0JwVUVyTjJKdW1zczBRUndTTXRQeXdWYzd6TWcxeGRGZiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FsdGVybmF0aWYta3JpdGVyaWEiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3BlcmhpdHVuZ2FuL3dhc3BhcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1752101813),
('U3uMYrBisRodSQGPpOMNffOxxpZc5SJm3iKKfYKa', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ0FmbXBzaDNWWmQ4blhkR0h6Nm85Y1Y0Y2drMm5KSEFlNTFsaWpNVSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FsdGVybmF0aWYta3JpdGVyaWEiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FsdGVybmF0aWYta3JpdGVyaWEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1752115117);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_subkriteria` varchar(255) NOT NULL,
  `bobot_subkriteria` decimal(10,2) NOT NULL,
  `id_kriteria` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id`, `nama_subkriteria`, `bobot_subkriteria`, `id_kriteria`) VALUES
(1, 'Ratu Arab', 2.00, 1),
(2, 'BB Glowing', 3.00, 1),
(3, 'Handbody dosting', 4.00, 1),
(4, 'Sunscreen', 5.00, 1),
(5, 'Facial Wash', 6.00, 1),
(6, 'Kombinasi', 2.00, 2),
(7, 'Berminyak', 3.00, 2),
(8, '36 - 45', 2.00, 3),
(9, '26 - 35', 3.00, 3),
(10, '16 - 25', 4.00, 3),
(11, '50.000 - 99.000', 2.00, 4),
(12, '100.000 - 199.000', 3.00, 4),
(13, '200.000 - 299.000', 4.00, 4),
(14, '300.000 - 399.000', 5.00, 4),
(15, '400.000 - 500.000', 6.00, 4),
(16, 'Kering', 4.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2025-07-09 09:44:47', '$2y$12$3hD8QRj/mf0KJW8Y2VyTyOInfLoojjNRunOrcmmHIdBrr2GEPHRKW', 1, NULL, '2025-07-09 09:44:47', '2025-07-09 09:44:47'),
(2, 'user', 'user@gmail.com', '2025-07-09 09:44:47', '$2y$12$Fs.vp2bDsWDBDwEMMw7TIu5WC0eG5HrEMXxGaYs5QZGawYaDrYPYC', 2, NULL, '2025-07-09 09:44:48', '2025-07-09 09:44:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif_id_attribut_foreign` (`id_attribut`);

--
-- Indexes for table `alternatif_kriteria`
--
ALTER TABLE `alternatif_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alternatif_kriteria_id_alternatif_id_kriteria_unique` (`id_alternatif`,`id_kriteria`),
  ADD KEY `alternatif_kriteria_id_kriteria_foreign` (`id_kriteria`);

--
-- Indexes for table `attribut`
--
ALTER TABLE `attribut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobis`
--
ALTER TABLE `hobis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobi_profile`
--
ALTER TABLE `hobi_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hobi_profile_profile_id_hobi_id_unique` (`profile_id`,`hobi_id`),
  ADD KEY `hobi_profile_hobi_id_foreign` (`hobi_id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_nama_role_unique` (`nama_role`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subkriteria_id_kriteria_foreign` (`id_kriteria`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `alternatif_kriteria`
--
ALTER TABLE `alternatif_kriteria`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `attribut`
--
ALTER TABLE `attribut`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hobis`
--
ALTER TABLE `hobis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hobi_profile`
--
ALTER TABLE `hobi_profile`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_id_attribut_foreign` FOREIGN KEY (`id_attribut`) REFERENCES `attribut` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `alternatif_kriteria`
--
ALTER TABLE `alternatif_kriteria`
  ADD CONSTRAINT `alternatif_kriteria_id_alternatif_foreign` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alternatif_kriteria_id_kriteria_foreign` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hobi_profile`
--
ALTER TABLE `hobi_profile`
  ADD CONSTRAINT `hobi_profile_hobi_id_foreign` FOREIGN KEY (`hobi_id`) REFERENCES `hobis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hobi_profile_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_id_kriteria_foreign` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
