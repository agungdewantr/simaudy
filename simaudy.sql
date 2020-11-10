-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 10:07 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simaudy`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_paket`
--

CREATE TABLE `jenis_paket` (
  `id_paket` bigint(20) UNSIGNED NOT NULL,
  `nama_paket` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_paket`
--

INSERT INTO `jenis_paket` (`id_paket`, `nama_paket`, `harga`, `created_at`, `updated_at`, `keterangan`) VALUES
(1, 'Express', 12000, '2020-11-06 09:54:40', NULL, 'MAX 1 Hari + Setrika'),
(2, 'Biasa', 8000, '2020-11-06 09:55:27', NULL, 'MAX 3 Hari + Setrika');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(29, '2014_10_12_100000_create_password_resets_table', 1),
(30, '2020_11_05_090549_create_role_table', 1),
(31, '2020_11_05_093530_create_users_table', 1),
(32, '2020_11_05_093756_create_jenis_paket_table', 1),
(33, '2020_11_05_094007_create_transaksi_table', 1),
(34, '2020_11_09_005448_add_alamat_to_transaksi', 2),
(35, '2020_11_09_091224_add_kolom_to_transaksi', 3),
(36, '2020_11_09_095905_add_keterangan_to_jenis_paket', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `role` enum('admin','pemilik_laundry','karyawan','pelanggan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'pemilik_laundry', NULL, NULL),
(3, 'karyawan', NULL, NULL),
(4, 'pelanggan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `id_paket` bigint(20) UNSIGNED NOT NULL,
  `berat_pakaian` bigint(20) NOT NULL,
  `jumlah_pembayaran` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenistransaksi` enum('offline','online') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Terverifikasi','Belum terverifikasi') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_users`, `id_paket`, `berat_pakaian`, `jumlah_pembayaran`, `created_at`, `updated_at`, `alamat`, `jenistransaksi`, `status`) VALUES
(1, 2, 1, 2, 24000, '2020-11-08 06:31:25', '2020-11-08 06:31:25', 'jl kalimantan', 'offline', NULL),
(15, 1, 1, 1, 12000, '2020-11-04 06:58:09', '2020-11-09 09:32:32', 'Jl. Sumetera', 'online', 'Terverifikasi'),
(69, 1, 2, 1, 8000, '2020-11-09 23:13:16', '2020-11-09 23:13:16', NULL, 'offline', NULL),
(70, 1, 2, 1, 8000, '2020-11-09 23:14:59', '2020-11-09 23:14:59', NULL, 'offline', NULL),
(71, 1, 2, 1, 8000, '2020-11-09 23:15:32', '2020-11-09 23:15:32', NULL, 'offline', NULL),
(81, 1, 2, 1, 8000, '2020-11-09 23:25:01', '2020-11-09 23:25:01', NULL, 'offline', NULL),
(82, 1, 2, 1, 8000, '2020-11-09 23:26:30', '2020-11-09 23:26:30', NULL, 'offline', NULL),
(83, 1, 1, 1, 12000, '2020-11-09 23:27:36', '2020-11-09 23:27:36', NULL, 'offline', NULL),
(84, 1, 1, 1, 12000, '2020-11-09 23:28:19', '2020-11-09 23:28:19', NULL, 'offline', NULL),
(100, 1, 1, 1, 12000, '2020-11-10 01:07:30', '2020-11-10 01:14:47', 'a', 'online', 'Terverifikasi'),
(101, 1, 1, 0, 0, '2020-11-10 01:07:46', '2020-11-10 01:07:46', 'a', 'online', 'Belum terverifikasi'),
(102, 1, 1, 1, 12000, '2020-11-10 01:08:42', '2020-11-10 01:19:16', 'a', 'online', 'Terverifikasi'),
(103, 1, 1, 0, 0, '2020-11-10 01:08:55', '2020-11-10 01:08:55', 'a', 'online', 'Belum terverifikasi'),
(104, 1, 1, 0, 0, '2020-11-10 01:10:02', '2020-11-10 01:10:02', 'a', 'online', 'Belum terverifikasi'),
(105, 1, 1, 0, 0, '2020-11-10 01:11:27', '2020-11-10 01:11:27', 'a', 'online', 'Belum terverifikasi'),
(106, 1, 1, 0, 0, '2020-11-10 01:13:18', '2020-11-10 01:13:18', 'a', 'online', 'Belum terverifikasi'),
(107, 1, 2, 0, 0, '2020-11-10 01:13:39', '2020-11-10 01:13:39', 'Jl Jawa', 'online', 'Belum terverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_role`, `name`, `email`, `password`, `no_telp`, `alamat`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 4, 'a', 'a@gmail.com', '$2y$10$X7hrdnC4NivG76/hc/ChKubqvJdsIEQhdEv5o82XZ7l7YzFfPpkjC', 'a', 'a', NULL, NULL, '2020-11-05 05:02:31', '2020-11-05 05:02:31'),
(2, 3, 'Agung', 'agung@gmail.com', '$2y$10$/Cjpupi.mFuWdy5vTKfvCOA8Lpu8U9qVfdKwLEttMbSmvafze6aMS', '111111', 'a', NULL, NULL, '2020-11-05 05:09:06', '2020-11-05 05:09:06'),
(3, 2, 'Ngenes Laundry', 'ngeneslaundr@gmail.com', '$2y$10$gTqKBPGrsC5ZTAjMbMAdVeJ64EvfOrxHUYunMdgQShrl/z9GsWHbu', '087757660909', 'Jl. Dimana2', NULL, NULL, '2020-11-05 05:10:48', '2020-11-05 05:10:48'),
(4, 1, 'Laundry', 'laundry@gmail.com', '$2y$10$.ZsGCWoFcA8Sx1FDZElvA.B7plA/XKzC1BynyoRyNmobcdWhlIo2u', '0877777777777', 'Jl Kalimantan', NULL, NULL, '2020-11-05 18:11:09', '2020-11-05 18:11:09'),
(5, 1, 'a', 'aa@a.c', '$2y$10$1j7hICAzBMrx0OE4YljZHuqjLp0KLz/98tuJCPqCJy3Z.imKVqJ8u', 'a', 'a', NULL, NULL, '2020-11-05 18:15:42', '2020-11-05 18:15:42'),
(6, 1, 'b', 'b@b.c', '$2y$10$AcGie5Lz1F3NqOu1Sro7jeYKRpqWspevDBEeb2vBpmBljnqFR.zg6', 'b', 'b', NULL, NULL, '2020-11-05 18:21:17', '2020-11-05 18:21:17'),
(7, 1, 'm', 'm@m.m', '$2y$10$ITXRS0CEiYJ74whDuOetlufXzzVWi78jPgtiRUJ8Zd1O4FcUv1lE6', 'm', 'm', NULL, NULL, '2020-11-05 18:22:33', '2020-11-05 18:22:33'),
(8, 1, 'k', 'k@k.c', '$2y$10$1gk/ElNf1eIjB1ob4wZtP.6FzrBxXg7pnMuYHPzAq4F/AQ4kmsFcG', 'k', 'k', NULL, NULL, '2020-11-05 18:24:18', '2020-11-05 18:24:18'),
(9, 1, 'z', 'z@g.a', '$2y$10$Xe/hCnYeb6q/ajDKSStRQOAKEJ.KBzduVRRI2G3ZcFh.oa34CH/ea', 'z', 'z', NULL, NULL, '2020-11-05 18:34:01', '2020-11-05 18:34:01'),
(10, 4, 'pelanggan', 'pelanggan@gmail.com', '$2y$10$tyW1O49iTWGpcT5jJUY5pOct5.eJ7IS5uaEkB5s61Hu0KtubwuxtO', '087757115809', 'Jl. Bengawan Solo', NULL, NULL, '2020-11-10 02:01:34', '2020-11-10 02:01:34'),
(11, 3, 'karyawan', 'karyawan@gmail.com', '$2y$10$uQX.XHQejXdykD2Vp38MO.ysuL7KscDUamICcAILp9fDuBUqxgROq', '0877777777', 'jember', NULL, NULL, '2020-11-10 02:02:34', '2020-11-10 02:02:34'),
(12, 2, 'Pemilik', 'pemilik@gmail.com', '$2y$10$B6P1npL6fY7PA4OrfB6BH.UUnPEbyZfYdS7WjmhMFUldeaxrk/27u', '0888888888', 'Jl Jember', NULL, NULL, '2020-11-10 02:03:19', '2020-11-10 02:03:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_paket`
--
ALTER TABLE `jenis_paket`
  ADD PRIMARY KEY (`id_paket`);

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
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_id_users_foreign` (`id_users`),
  ADD KEY `transaksi_id_paket_foreign` (`id_paket`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_foreign` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_paket`
--
ALTER TABLE `jenis_paket`
  MODIFY `id_paket` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_id_paket_foreign` FOREIGN KEY (`id_paket`) REFERENCES `jenis_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
