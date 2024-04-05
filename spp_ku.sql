-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 04:41 AM
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
-- Database: `spp_ku`
--

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
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `kompetensi_keahlian` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `kompetensi_keahlian`, `created_at`, `updated_at`) VALUES
(2, '12 ANM 2', 'Animasi', '2024-03-14 20:12:10', '2024-03-14 20:12:10'),
(3, '12 ANM 3', 'Animasi', '2024-03-14 20:12:16', '2024-03-14 20:12:16'),
(4, '12 ANM 4', 'Animasi', '2024-03-14 20:12:28', '2024-03-14 20:12:28'),
(5, '12 ANM 5', 'Animasi', '2024-03-14 20:12:46', '2024-03-14 20:12:46'),
(6, '12 ANM 6', 'Animasi', '2024-03-14 20:12:54', '2024-03-14 20:12:54');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_15_003913_create_kelas_table', 1),
(7, '2024_03_15_024815_create_spps_table', 1),
(8, '2024_03_15_031844_create_siswas_table', 2),
(9, '2024_03_15_061635_create_pembayarans_table', 3),
(10, '2024_03_20_025538_add_total_bayar_to_pembayarans_table', 4);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$12$TTzj0qYCQQb/RLD4yG3DcuXQlfh.dVryC31nh7CVQ19/8xwbKjq4u', '2024-03-24 22:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `spp_id` bigint(20) UNSIGNED NOT NULL,
  `nama_penginput` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_bayar` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `siswa_id`, `tanggal_bayar`, `bulan`, `spp_id`, `nama_penginput`, `created_at`, `updated_at`, `total_bayar`) VALUES
(1, 2, '2024-03-15', 'Februari', 1, 'Alt', '2024-03-15 00:15:36', '2024-03-15 00:15:36', 0),
(2, 2, '2024-03-21', 'Februari', 1, 'Alt', '2024-03-15 00:16:14', '2024-03-15 00:16:14', 0),
(3, 3, '2024-03-15', 'Maret', 1, 'Alt', '2024-03-15 00:35:49', '2024-03-15 00:35:49', 0),
(4, 2, '2024-03-20', 'Februari', 1, 'qwer', '2024-03-19 20:05:36', '2024-03-19 20:05:36', 50000),
(5, 6, '2024-03-22', 'Januari', 1, 'qwer', '2024-03-21 19:53:17', '2024-03-21 19:53:17', 20000),
(6, 2, '2024-03-27', 'Februari', 1, 'assa', '2024-03-26 21:21:49', '2024-03-26 21:21:49', 100000);

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
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nisn` bigint(20) NOT NULL,
  `nis` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `spp_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nisn`, `nis`, `nama`, `kelas_id`, `alamat`, `no_hp`, `spp_id`, `created_at`, `updated_at`, `email`, `password`) VALUES
(2, 4321, 1234, 'Peter', 3, 'London Gg. 1', '081234567891', 1, '2024-03-14 23:13:30', '2024-03-19 22:24:02', 'peter@gmail.com', '$2y$12$uX81nvcBRtM9fQ8SqM9vWO2BJKtSsPXixdpSHySpI/0hfOPRoMzUa'),
(3, 1234, 4312, 'Shigeo', 4, 'Paris Gg. 5', '08123456789', 1, '2024-03-15 00:32:02', '2024-03-15 00:32:02', 'shi@gmail.com', '$2y$12$XVYGyBOHYx/y/o5AXQWP3ukOAkx4GVflPPhQZC4SaLRFfCvNiwAnm'),
(5, 5432, 2345, 'rew', 5, 'asd', '081234567890', 1, '2024-03-19 20:55:40', '2024-03-19 21:01:08', 'rew@gmail.com', '$2y$12$b3BOPAgGRocUF04LYZ5ZG.PNBtyNhE5wvqpEKdz85Ds/bGzKmGFze'),
(6, 12, 123, 'tes', 2, 'sd', '221312', 1, '2024-03-19 22:03:20', '2024-03-21 19:49:53', 'tes@gmail.com', '$2y$12$y4bqCRYAg8GzeQ/VIWQj/.wbVoqO9oboJi4YEYhKXNj2eN0LPCmP.'),
(7, 123123, 12323, 'blabla', 3, 'asda', '2131', 1, '2024-03-20 00:07:34', '2024-03-20 00:07:34', 'bla@gmail.com', '$2y$12$eRGpGyU7PWfhXkVkYRGMaOCYWoAOdN3uUKtf9NFSV7FjtvepIAH9G');

-- --------------------------------------------------------

--
-- Table structure for table `spps`
--

CREATE TABLE `spps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` bigint(20) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spps`
--

INSERT INTO `spps` (`id`, `tahun`, `nominal`, `created_at`, `updated_at`) VALUES
(1, 2024, 200000, '2024-03-14 20:13:14', '2024-03-14 20:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` bigint(20) NOT NULL DEFAULT 3,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'qwer', 'admin@gmail.com', NULL, '$2y$12$XVYGyBOHYx/y/o5AXQWP3ukOAkx4GVflPPhQZC4SaLRFfCvNiwAnm', 1, NULL, '2024-03-19 17:27:36', '2024-03-19 17:27:36'),
(3, 'adi', 'adi@gmail.com', NULL, '$2y$12$EIMlcxNYrJK7VfLSj.9ZGubpRBW7gzPXiHluRyQN8WwYIAW14JveG', 2, NULL, '2024-03-19 17:27:36', '2024-03-19 17:27:36'),
(4, 'sir', 'sir@gmail.com', NULL, '$2y$12$Y4ibQGGLP5gdszQcKVNp6u6s9tOUN80ptVtb/XNXCD5sn8Ae7viZa', 3, NULL, '2024-03-19 17:27:36', '2024-03-19 17:27:36'),
(7, 'assa', 'as@gmail.com', NULL, '$2y$12$ytc.hnvhDPJKlaMGrdSu7eMyC43VI7iLwo2WARPg8Jn9k3KfdM0lG', 2, NULL, '2024-03-26 20:33:16', '2024-03-26 20:33:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayarans_siswa_id_foreign` (`siswa_id`),
  ADD KEY `pembayarans_spp_id_foreign` (`spp_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_kelas_id_foreign` (`kelas_id`),
  ADD KEY `siswas_spp_id_foreign` (`spp_id`);

--
-- Indexes for table `spps`
--
ALTER TABLE `spps`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `spps`
--
ALTER TABLE `spps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`),
  ADD CONSTRAINT `pembayarans_spp_id_foreign` FOREIGN KEY (`spp_id`) REFERENCES `spps` (`id`);

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `siswas_spp_id_foreign` FOREIGN KEY (`spp_id`) REFERENCES `spps` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
