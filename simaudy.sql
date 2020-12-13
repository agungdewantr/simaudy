-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 04:48 PM
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
(1, 'Tersedia', '2020-11-20 02:34:22', '2020-12-06 01:23:16'),
(2, 'Terpakai', '2020-11-20 02:34:22', '2020-12-06 02:06:01'),
(3, 'Tersedia', '2020-11-20 05:37:39', '2020-12-06 00:54:06'),
(4, 'Terpakai', '2020-11-19 20:58:27', '2020-12-06 02:20:00'),
(5, 'Tersedia', '2020-11-22 22:08:05', '2020-12-06 01:13:51'),
(6, 'Terpakai', '2020-11-22 22:08:11', '2020-12-06 02:19:51'),
(7, 'Tersedia', '2020-11-22 22:08:18', '2020-12-06 02:01:14'),
(8, 'Terpakai', '2020-11-22 22:41:31', '2020-12-06 02:19:40'),
(9, 'Tersedia', '2020-11-22 22:41:37', '2020-12-06 01:11:47'),
(10, 'Tersedia', '2020-11-22 22:41:43', '2020-12-06 01:27:12'),
(11, 'Tersedia', '2020-11-22 22:41:51', '2020-12-06 01:09:01'),
(12, 'Tersedia', '2020-11-24 01:11:06', '2020-12-06 02:04:37');

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
  `alamat_laundry` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_terbentuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tempat_laundry`
--

INSERT INTO `tempat_laundry` (`id_tempat_laundry`, `nama_tempat_laundry`, `status_operasional`, `alamat_laundry`, `tanggal_terbentuk`, `created_at`, `updated_at`) VALUES
(12, 'Maju jaya', 'Buka', 'Jl Kalimantan 11', '2020-12-27', '2020-12-12 05:05:34', '2020-12-12 05:05:51'),
(13, 'Tidak Gratis', 'Tutup', 'Jl Jawa 6 a', '2020-12-29', '2020-12-12 05:56:53', '2020-12-12 05:57:48');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `id_tempat_laundry` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `scan_KTP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Verifikasi','Tidak Verifikasi','Null','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_role`, `id_tempat_laundry`, `name`, `email`, `password`, `no_telp`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `scan_KTP`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(38, 4, NULL, 'Pelanggan', 'pelanggan@gmail.com', '$2y$10$WHkNAjU4hFlMNpYxfrZp6OMRbpm7wSxjQlQ9PQ0Tyla0irjnA.6Da', '000000000', 'Jl Jawa', 'bondowoso', '2020-12-25', 'Laki-laki', '2020-12-09-02-11-57WhatsApp Image 2020-11-29 at 22.13.23.jpeg', 'Null', NULL, '2020-12-04 21:22:30', '2020-12-08 19:28:14'),
(46, 1, NULL, 'Admin Simaudy', 'admin@gmail.com', '$2y$10$xW/RgOHDDbhGOv4oPEKBO.z2n04dyOyjrw7fjRkyHf0jrgfIc52BK', '087757660989', 'Jl. Simaudy', 'Secret', '2020-12-23', 'Laki-laki', '2020-12-09-02-11-57WhatsApp Image 2020-11-29 at 22.13.23.jpeg', NULL, NULL, '2020-12-06 01:45:34', '2020-12-07 20:17:29'),
(54, 2, 12, 'Pemilik', 'pemilik@gmail.com', '$2y$10$2LReVk6wOsj2P6n0QGEoc.Oq1vsGmpbyAW8nRwAbFL6RibV9LfN/a', '909090', 'Jl Jawa', 'Bwi', '2020-12-01', 'Laki-laki', '2020-12-12-12-05-34Capture.PNG', 'Null', NULL, '2020-12-12 05:05:34', NULL),
(55, 3, 12, 'Karyawan', 'karyawan@gmail.com', '$2y$10$9.NLD7CUwxoOw1fo7KjgXeXj8e0G09sA5d4YL2CGjgualmG/c9r1.', '818181', 'Jl Jawa 9', 'bws', '2021-01-05', 'Perempuan', '2020-12-12-12-07-08—Pngtree—happy eid al-adha mubarak muslim_5432010.png', NULL, NULL, '2020-12-12 05:07:08', NULL),
(57, 3, 12, 'andika', 'andika@gmail.com', '$2y$10$gDvtaF3emG7UiPYrFh8SeeBbmv02SIQwu1964mFuPN5FGzg0mxenW', '1111', 'jl kalimantan', 'bws', '2020-12-29', 'Laki-laki', '2020-12-12-12-53-59Capture.PNG', NULL, NULL, '2020-12-12 05:53:59', NULL),
(58, 2, 13, 'Pemilik 2', 'pemilik2@gmail.com', '$2y$10$hxdBAyyyfjM03nLVmS424uLB.V21lT.tyOe2l/yoWr0qTlTgAOjai', '1112', 'Jl Mana Aja', 'bws', '2020-12-31', 'Laki-laki', '2020-12-12-12-56-53erd_SIMAUDY_SPRINT3.PNG', 'Null', NULL, '2020-12-12 05:56:53', NULL),
(59, 3, 13, 'Aini', 'aini@gmail.com', '$2y$10$/o4Uj9VILjnF86//ZpiAu.03M6KkN3md1uki.RfK/FTglCRcPQ.sW', '777', 'Jl Kal 1', 'jbr', '2021-01-06', 'Laki-laki', '2020-12-12-12-59-08erd_SIMAUDY_SPRINT3.PNG', NULL, NULL, '2020-12-12 05:59:08', NULL);

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
  ADD KEY `users_id_role_foreign` (`id_role`),
  ADD KEY `users_id_tempatlolaundry_foreign` (`id_tempat_laundry`);

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
  MODIFY `idlemari` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id_tempat_laundry` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

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
