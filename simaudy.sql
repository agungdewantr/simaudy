-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 04:11 AM
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
(1, 'Express', 12000, '2020-11-06 09:54:40', NULL, 'Max 1 Hari + Seterika'),
(2, 'Biasa', 8000, '2020-11-06 09:55:27', NULL, 'Max 3 Hari + Seterika');

-- --------------------------------------------------------

--
-- Table structure for table `lemari`
--

CREATE TABLE `lemari` (
  `idlemari` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Terpakai','Tersedia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lemari`
--

INSERT INTO `lemari` (`idlemari`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Terpakai', '2020-11-20 02:34:22', '2020-11-20 05:36:17'),
(2, 'Tersedia', '2020-11-20 02:34:22', '2020-11-22 22:04:20'),
(3, 'Terpakai', '2020-11-20 05:37:39', '2020-11-20 06:04:03'),
(4, 'Tersedia', '2020-11-19 20:58:27', '2020-11-21 20:19:54'),
(5, 'Tersedia', '2020-11-22 22:08:05', NULL),
(6, 'Terpakai', '2020-11-22 22:08:11', '2020-11-22 22:08:45'),
(7, 'Terpakai', '2020-11-22 22:08:18', '2020-11-22 22:41:16'),
(8, 'Tersedia', '2020-11-22 22:41:31', NULL),
(9, 'Tersedia', '2020-11-22 22:41:37', NULL),
(10, 'Terpakai', '2020-11-22 22:41:43', '2020-11-23 19:28:46'),
(11, 'Tersedia', '2020-11-22 22:41:51', NULL);

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
(37, '2020_11_09_005448_add_alamat_to_transaksi', 2),
(40, '2020_11_09_095905_add_keterangan_to_jenis_paket', 3),
(41, '2020_11_17_115818_create_lemari_table', 3),
(42, '2020_11_20_015417_create_tempat_laundry_table', 4),
(43, '2020_11_20_020108_create_penilaian_laundry_table', 5);

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
-- Table structure for table `tempat_laundry`
--

CREATE TABLE `tempat_laundry` (
  `id_tempat_laundry` bigint(20) UNSIGNED NOT NULL,
  `nama_tempat_laundry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_operasional` enum('Tutup','Buka') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tempat_laundry`
--

INSERT INTO `tempat_laundry` (`id_tempat_laundry`, `nama_tempat_laundry`, `status_operasional`, `created_at`, `updated_at`) VALUES
(1, 'Maju Jaya Laundry', 'Tutup', '2020-11-20 02:36:00', '2020-11-21 21:09:29');

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
  `jenistransaksi` enum('offline','online') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Terverifikasi','Belum terverifikasi','Ditolak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idlemari` bigint(20) UNSIGNED NOT NULL,
  `id_tempat_laundry` bigint(20) UNSIGNED NOT NULL,
  `status_pengantaran` enum('Akan Diantar','Dalam Perjalanan','Pakaian telah diterima/diambil') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `deskripsi_penilaian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_users`, `id_paket`, `berat_pakaian`, `jumlah_pembayaran`, `created_at`, `updated_at`, `jenistransaksi`, `status`, `alamat`, `idlemari`, `id_tempat_laundry`, `status_pengantaran`, `rating`, `deskripsi_penilaian`) VALUES
(130, 10, 1, 1, 12000, '2020-11-20 05:36:17', '2020-11-21 20:12:04', 'offline', NULL, NULL, 1, 1, 'Dalam Perjalanan', 3, 'Lumayan'),
(131, 10, 1, 0, 0, '2020-11-20 05:40:40', '2020-11-21 19:53:16', 'online', 'Ditolak', 'Jl. Bengawan Solo', 2, 1, 'Akan Diantar', 5, 'sangat bagus'),
(132, 10, 1, 1, 12000, '2020-11-20 05:49:53', '2020-11-21 19:20:13', 'online', 'Terverifikasi', 'Jl. Bengawan Solo 78', 3, 1, 'Akan Diantar', 2, 'uwuwu sekali'),
(133, 10, 1, 1, 12000, '2020-11-21 18:43:20', '2020-11-22 22:12:24', 'online', 'Terverifikasi', 'Jl. Mastrip 90 a', 4, 1, '', 4, 'cepet banget proses laundrynya'),
(134, 10, 1, 8, 96000, '2020-11-21 20:15:21', '2020-11-22 22:07:06', 'online', 'Terverifikasi', 'Jl. Patrang', 2, 1, '', NULL, NULL),
(135, 10, 2, 99, 792000, '2020-11-21 20:18:42', '2020-11-22 22:04:34', 'online', 'Terverifikasi', 'Jl. Uji coba', 4, 1, 'Pakaian telah diterima/diambil', NULL, NULL),
(136, 16, 1, 1, 12000, '2020-11-22 22:08:45', '2020-11-22 22:08:45', 'offline', NULL, NULL, 6, 1, 'Akan Diantar', NULL, NULL),
(138, 16, 2, 1, 8000, '2020-11-22 22:41:16', '2020-11-22 23:06:32', 'offline', NULL, NULL, 7, 1, 'Pakaian telah diterima/diambil', NULL, NULL),
(139, 17, 1, 1, 12000, '2020-11-23 19:28:46', '2020-11-23 19:28:46', 'offline', NULL, NULL, 10, 1, NULL, NULL, NULL);

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
(12, 2, 'Pemilik', 'pemilik@gmail.com', '$2y$10$B6P1npL6fY7PA4OrfB6BH.UUnPEbyZfYdS7WjmhMFUldeaxrk/27u', '0888888888', 'Jl Jember', NULL, NULL, '2020-11-10 02:03:19', '2020-11-10 02:03:19'),
(13, 4, 'Jono', 'jono@gmail.com', '$2y$10$JnLRGZ4TEZQDgnwwoc03yu2mcajxZt48toG7Ju6A5Hsc6c.8NOeBC', '081372837191', 'Jl Jawa 6', NULL, NULL, '2020-11-16 03:17:57', '2020-11-16 03:17:57'),
(14, 4, '11Tes', 'a@a.a', '$2y$10$ZXHBtvlhqu2/dIQTBaXHj.oa3B/mvJzxBWuymkzUTEJRtRJSF6QCq', '081271', 'a', NULL, NULL, '2020-11-16 03:28:36', '2020-11-16 03:28:36'),
(15, 4, 'a', 'a@a.aa', '$2y$10$xRczytEf8prlshp6HjQvK.JaT/9Y5/4xcT6j1e.7k6ANyXCkdV0Wq', 'a', 'a', NULL, NULL, '2020-11-16 03:30:03', '2020-11-16 03:30:03'),
(16, 4, 'a', 'agung@gmail.coma', '$2y$10$rX3OXLFLacIBi1p8XFzdDujpBoxox/JLYaG/F1G/42KSuEbHL3iYG', 'a', 'a', NULL, NULL, '2020-11-16 03:36:24', '2020-11-16 03:36:24'),
(17, 4, 'Bukan Pelanggan', 'anonym@gmail.com', '$2y$10$GLt3TWQIZSgJ/9TfkkrwGOn1LV7vFtwbGDVuykZNRPb49b3ISsW4C', '-', '-', NULL, NULL, '2020-11-23 19:26:17', '2020-11-23 19:26:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_paket`
--
ALTER TABLE `jenis_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `lemari`
--
ALTER TABLE `lemari`
  ADD PRIMARY KEY (`idlemari`);

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
-- Indexes for table `tempat_laundry`
--
ALTER TABLE `tempat_laundry`
  ADD PRIMARY KEY (`id_tempat_laundry`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_id_users_foreign` (`id_users`),
  ADD KEY `transaksi_id_paket_foreign` (`id_paket`),
  ADD KEY `transaksi_idlemari_foreign` (`idlemari`),
  ADD KEY `transaksi_idtempatlaundry_foreign` (`id_tempat_laundry`);

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
-- AUTO_INCREMENT for table `lemari`
--
ALTER TABLE `lemari`
  MODIFY `idlemari` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tempat_laundry`
--
ALTER TABLE `tempat_laundry`
  MODIFY `id_tempat_laundry` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_id_paket_foreign` FOREIGN KEY (`id_paket`) REFERENCES `jenis_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_idlemari_foreign` FOREIGN KEY (`idlemari`) REFERENCES `lemari` (`idlemari`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_idtempatlaundry_foreign` FOREIGN KEY (`id_tempat_laundry`) REFERENCES `tempat_laundry` (`id_tempat_laundry`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
