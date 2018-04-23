-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 Apr 2018 pada 16.23
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback_infos`
--

CREATE TABLE `feedback_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `info_id` int(10) UNSIGNED NOT NULL,
  `status_feed` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `feedback_infos`
--

INSERT INTO `feedback_infos` (`id`, `info_id`, `status_feed`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 2, '2018-04-22 20:49:37', '2018-04-22 21:30:47', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `infos`
--

CREATE TABLE `infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perkara_id` int(10) UNSIGNED NOT NULL,
  `status_verifikasi` int(11) NOT NULL,
  `file_foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `narasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `infos`
--

INSERT INTO `infos` (`id`, `judul`, `perkara_id`, `status_verifikasi`, `file_foto`, `narasi`, `lat`, `long`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Info Satu', 1, 0, 'info/info1.jpg', 'ini informasi perama terkait pencurian yang terjadi di sebuah kota', '100', '100', 2, '2018-04-22 11:24:00', NULL, NULL),
(2, 'input pertama', 1, 0, 'info/default.jpg', 'saas fsdg fg sf asda sd asd saas fsdg fg sf asda sd asd saas fsdg fg sf asda sd asd saas fsdg fg sf asda sd asd', '-0.9155429', '100.46083999999999', 2, '2018-04-22 03:59:01', '2018-04-22 03:59:01', NULL),
(3, 'Laptop Anti Maling', 1, 0, 'info/anonymous_carl-heyerdahl-181868-unsplash.jpg', 'Jadi saya ada pengalaman hampir kecurian sebuah laptop, namun karena saya menggunakan aplikasi track dan alarm anti maling, ketika laptop saya akan diambil, Laptop saya berdering keras', '-0.9525457544584006', '100.36022081523515', 3, '2018-04-23 07:02:20', '2018-04-23 07:02:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_infos`
--

CREATE TABLE `komentar_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `info_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `komentar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `komentar_infos`
--

INSERT INTO `komentar_infos` (`id`, `info_id`, `user_id`, `komentar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 'komentar pertama oleh ridho', '2018-04-22 05:10:44', '2018-04-22 05:10:44', NULL),
(2, 2, 2, 'komentar ridho di pencurian lagi excel', '2018-04-22 05:15:14', '2018-04-22 05:15:14', NULL),
(3, 1, 3, 'komentar oleh dara', '2018-04-22 21:58:27', '2018-04-22 21:58:27', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporans`
--

CREATE TABLE `laporans` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `waktu_lapor` date NOT NULL,
  `perkara_id` int(10) UNSIGNED NOT NULL,
  `waktu_kejadian` date NOT NULL,
  `tempat_kejadian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `korban` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_korban` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kerugian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelapor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian_kejadian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `saksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pasal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_laporan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_surat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `alasan` text COLLATE utf8mb4_unicode_ci,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_18_022853_create_perkaras_table', 1),
(4, '2018_04_18_071353_create_infos_table', 1),
(5, '2018_04_18_071917_create_profiles_table', 1),
(6, '2018_04_18_072615_create_feedback_infos_table', 1),
(7, '2018_04_18_073034_create_komentar_infos_table', 1),
(8, '2018_04_18_090509_create_laporans_table', 1),
(9, '2018_04_18_090854_create_perkembangan_laps_table', 1),
(13, '2018_04_21_031133_add_role_to_users', 2),
(15, '2018_04_21_033831_add_tempat_lahir_to_profile', 3),
(16, '2018_04_21_092955_add_primary_to_profiles', 4),
(17, '2018_04_21_121037_add_long_to_infos', 5),
(18, '2018_04_21_104846_add_tanggal_to_laporans', 6),
(20, '2018_04_21_110344_add_alasan_to_laporans', 7),
(21, '2018_04_22_043737_add_user_id_to_infos', 8),
(22, '2018_04_22_030005_add_ket_to_perkembangan', 9),
(23, '2018_04_22_065048_change_laporan', 10),
(24, '2018_04_23_022557_add_user_id_to_feedback_infos', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkaras`
--

CREATE TABLE `perkaras` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perkaras`
--

INSERT INTO `perkaras` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pencurian', '2018-04-21 10:26:00', NULL, NULL),
(2, 'Pembunuhan', '2018-04-22 23:31:49', NULL, NULL),
(3, 'Pemalsuan', '2018-04-23 07:23:03', '2018-04-23 07:23:03', NULL),
(4, 'Penghinaan', '2018-04-23 07:23:10', '2018-04-23 07:23:10', NULL),
(5, 'Penganiayaan', '2018-04-23 07:23:19', '2018-04-23 07:23:19', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkembangan_laps`
--

CREATE TABLE `perkembangan_laps` (
  `id` int(10) UNSIGNED NOT NULL,
  `laporan_id` int(10) UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profiles`
--

CREATE TABLE `profiles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `jekel` int(11) NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_ktp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_identitas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profiles`
--

INSERT INTO `profiles` (`user_id`, `jekel`, `username`, `pekerjaan`, `alamat`, `no_hp`, `file_ktp`, `tempat_lahir`, `tanggal_lahir`, `no_identitas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 0, 'Ridho Darman', 'Mahasiswa', 'RUmah', '085805462401', 'file_ktp/Ridho Darman_bekraf.jpg', 'Padang', '1999-09-09', '1371109041997001', '2018-04-21 23:38:30', '2018-04-21 23:38:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `status_verifikasi` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status_verifikasi`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vedo Alfarizi', 'vedoalfarizi@gmail.com', '$2y$10$/qWdyXG0IqAZoLvhJYIc7.LPGs0B9FoijmTrHdQjwhjDwPyMy78NO', 0, NULL, 'EiVz6d6kwKQ8Mx1Wct9OIR1YodMFGVNiajvd2UzOz6IxDfgZzWA8p04YiZgd', '2018-04-21 22:18:13', '2018-04-21 22:18:13'),
(2, 'Ridho Darman', 'ridhodarman@gmail.com', '$2y$10$cn8WalKrkvT8aYPw1DSy.uXxHfclMg8z52SHvvHbhcAWlK6/1NdeO', 1, NULL, 'SK4W4KnccNCJjQnMKzbDRIgLILH0OLDfSfwDLPOEwzbzT8KuDw5u6e8XD4Ry', '2018-04-21 22:18:58', '2018-04-21 22:18:58'),
(3, 'anonymous', 'dartikadara@gmail.com', '$2y$10$zl3TYdJBkTx77tVhp7PumuKFogJrfnBW2533Ua7AYLbFb9NWL5bKS', 1, NULL, 'zqO51R6B1N2jP5C3BPuwUM1Virg11SwOZafMPtEEWFa7fKE8j6vWN24bbBWo', '2018-04-22 20:17:26', '2018-04-22 20:17:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback_infos`
--
ALTER TABLE `feedback_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_infos_info_id_foreign` (`info_id`),
  ADD KEY `feedback_infos_user_id_index` (`user_id`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infos_perkara_id_foreign` (`perkara_id`),
  ADD KEY `infos_user_id_index` (`user_id`);

--
-- Indexes for table `komentar_infos`
--
ALTER TABLE `komentar_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentar_infos_info_id_foreign` (`info_id`),
  ADD KEY `komentar_infos_user_id_foreign` (`user_id`);

--
-- Indexes for table `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporans_user_id_foreign` (`user_id`),
  ADD KEY `laporans_perkara_id_foreign` (`perkara_id`);

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
-- Indexes for table `perkaras`
--
ALTER TABLE `perkaras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perkembangan_laps`
--
ALTER TABLE `perkembangan_laps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perkembangan_laps_laporan_id_foreign` (`laporan_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT for table `feedback_infos`
--
ALTER TABLE `feedback_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `komentar_infos`
--
ALTER TABLE `komentar_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `perkaras`
--
ALTER TABLE `perkaras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `perkembangan_laps`
--
ALTER TABLE `perkembangan_laps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `feedback_infos`
--
ALTER TABLE `feedback_infos`
  ADD CONSTRAINT `feedback_infos_info_id_foreign` FOREIGN KEY (`info_id`) REFERENCES `infos` (`id`),
  ADD CONSTRAINT `feedback_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `infos`
--
ALTER TABLE `infos`
  ADD CONSTRAINT `infos_perkara_id_foreign` FOREIGN KEY (`perkara_id`) REFERENCES `perkaras` (`id`),
  ADD CONSTRAINT `infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar_infos`
--
ALTER TABLE `komentar_infos`
  ADD CONSTRAINT `komentar_infos_info_id_foreign` FOREIGN KEY (`info_id`) REFERENCES `infos` (`id`),
  ADD CONSTRAINT `komentar_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `laporans`
--
ALTER TABLE `laporans`
  ADD CONSTRAINT `laporans_perkara_id_foreign` FOREIGN KEY (`perkara_id`) REFERENCES `perkaras` (`id`),
  ADD CONSTRAINT `laporans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `perkembangan_laps`
--
ALTER TABLE `perkembangan_laps`
  ADD CONSTRAINT `perkembangan_laps_laporan_id_foreign` FOREIGN KEY (`laporan_id`) REFERENCES `laporans` (`id`);

--
-- Ketidakleluasaan untuk tabel `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
