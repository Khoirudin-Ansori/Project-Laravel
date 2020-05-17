-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2020 pada 02.31
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailorder`
--

CREATE TABLE `detailorder` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mobil` bigint(20) UNSIGNED NOT NULL,
  `jumlah_beli` bigint(20) NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detailorder`
--

INSERT INTO `detailorder` (`id`, `nomor_pesanan`, `id_mobil`, `jumlah_beli`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 'TRXC5001', 1, 1, 500000000, '2020-05-07 04:13:27', '2020-05-07 04:13:27'),
(2, 'TRXC5002', 9, 1, 200000000, '2020-05-07 05:16:56', '2020-05-07 05:16:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2020_03_13_123054_create_mobil_table', 3),
(5, '2020_04_09_040158_category_table', 4),
(6, '2020_04_09_053106_create_tb_mobil_table', 5),
(7, '2020_04_30_045450_add_stock', 6),
(8, '2020_04_30_052038_create_order_table', 7),
(9, '2020_04_30_054948_create_order_table', 8),
(10, '2020_04_30_055524_create_detailorder_table', 9),
(11, '2020_05_07_060026_create_table_transaction', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_merk` int(255) DEFAULT NULL,
  `warna_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_mobil` decimal(12,2) NOT NULL,
  `tahun_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id`, `nama_mobil`, `merk_mobil`, `id_merk`, `warna_mobil`, `harga_mobil`, `tahun_mobil`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fortuner', 'Toyota', 1, 'Hitam', '500000000.00', '2020', NULL, NULL, NULL),
(5, 'Pajero Sport', 'Mitsubishi', 6, 'Hitam', '750000000.00', '2019', '2020-03-14 03:21:49', '2020-03-14 03:21:49', NULL),
(6, 'Jazz', 'Honda', 3, 'Merah', '120000000.00', '2020', '2020-03-14 03:58:33', '2020-03-14 03:58:33', NULL),
(7, 'Ertiga', 'Suzuki', 4, 'Silver', '250000000.00', '2018', '2020-03-14 04:08:51', '2020-03-15 06:01:02', '2020-03-15 06:01:02'),
(8, 'Brio', 'Honda', 3, 'Merah', '120000000.00', '2020', '2020-03-15 04:50:27', '2020-03-15 04:50:27', NULL),
(9, 'Avanza', 'Toyota', 1, 'Hitam', '200000000.00', '2019', '2020-03-16 03:58:40', '2020-03-16 03:58:40', NULL),
(10, 'Xenia', 'Daihatsu', 5, 'Putih', '500000000.00', '2020', '2020-03-16 05:50:49', '2020-03-16 05:50:49', NULL),
(11, 'Wagon R', 'Suzuki', 4, 'Biru', '800000000.00', '2018', '2020-04-08 21:54:13', '2020-04-08 21:54:13', NULL),
(12, 'Captiva', 'Suzuki', NULL, 'Putih', '800000000.00', '2018', '2020-04-29 22:27:21', '2020-04-29 22:27:35', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `bayar` bigint(20) NOT NULL,
  `kembali` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id`, `nomor_pesanan`, `pembeli`, `total_harga`, `bayar`, `kembali`, `created_at`, `updated_at`) VALUES
(1, 'TRXC5001', 'irul', 0, 1, 1, '2020-05-06 21:06:06', '2020-05-06 21:06:06'),
(2, 'TRXC5002', 'irul', 200000000, 200000000, 0, '2020-05-06 22:26:17', '2020-05-06 22:26:17'),
(3, 'TRXC5003', 'we', 0, 900000, 900000, '2020-05-06 22:28:32', '2020-05-06 22:28:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('khoirudin.ans3@gmail.com', '$2y$10$L3JaXKLUvf5Lzk/l9NEZ..t4icdrEteHjjz.JdrTjy3AAYb/KQv.O', '2020-03-12 04:55:28'),
('khoirudin@gmail.com', '$2y$10$Lu/N2DqPhIXat6/jQLI6KOfG8n.BWbNNMYpb1w85mVbRrzz59SE8G', '2020-03-12 07:06:18'),
('irul@gmail.com', '$2y$10$wycmiNUu0Eh.izo/vZgBduZCiELuTCGsg1ZAVxsrGgpx5F.9L.Gt.', '2020-03-17 22:01:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_transaction`
--

CREATE TABLE `table_transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mobil` bigint(20) UNSIGNED NOT NULL,
  `jumlah_beli` bigint(20) NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `pembeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `bayar` bigint(20) NOT NULL,
  `kembali` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `table_transaction`
--

INSERT INTO `table_transaction` (`id`, `nomor_pesanan`, `id_mobil`, `jumlah_beli`, `subtotal`, `pembeli`, `total_harga`, `bayar`, `kembali`, `created_at`, `updated_at`) VALUES
(1, 'TRXC5001', 1, 1, 500000000, 'irul', 500000000, 500000000, 0, '2020-05-06 23:45:05', '2020-05-06 23:45:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_merk`
--

CREATE TABLE `tb_merk` (
  `id` int(255) NOT NULL,
  `merk_mobil` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_merk`
--

INSERT INTO `tb_merk` (`id`, `merk_mobil`, `created_at`, `updated_at`) VALUES
(1, 'Toyota', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Honda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Suzuki', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Daihatsu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Mitsubishi', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk_id` int(255) NOT NULL,
  `warna_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_mobil` decimal(15,2) NOT NULL,
  `tahun_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stok` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_mobil`
--

INSERT INTO `tb_mobil` (`id`, `nama_mobil`, `merk_id`, `warna_mobil`, `harga_mobil`, `tahun_mobil`, `deleted_at`, `created_at`, `updated_at`, `stok`) VALUES
(1, 'Avanza', 1, 'Putih', '800000000.00', '2018', NULL, NULL, '2020-04-08 23:19:40', 2),
(2, 'Xenia', 5, 'Hitam', '780000000.00', '2019', '2020-04-09 06:21:02', '2020-04-08 23:09:43', '2020-04-08 23:21:02', 2),
(3, 'X-Pander', 6, 'Merah', '970000000.00', '2019', NULL, '2020-04-08 23:23:44', '2020-04-08 23:23:44', 2),
(4, 'Fortuner', 1, 'Silver', '1200000000.00', '2020', NULL, '2020-04-08 23:24:21', '2020-04-08 23:24:21', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'iye', 'khoirudin.ans3@gmail.com', NULL, '$2y$10$PxlZM6J5rEDkpUbPB.d.SuxKEqNU/fiMDb2ypi.Tk6JK4OjKkr65S', NULL, '2020-03-12 04:23:19', '2020-03-12 04:23:19'),
(2, 'irul', 'irul@gmail.com', NULL, '$2y$10$hlSwG3egXrO69nrv7iwHa.NMAWEDcAYMGGc6w1p6.EgLOQNkcnfyG', NULL, '2020-03-12 04:57:16', '2020-03-16 05:58:07'),
(3, 'khoirudin', 'khoirudin@gmail.com', NULL, '$2y$10$LsaajIDP8g.67kkyWqjBUe6ryeTgFyCXiWrs1D841kfsjyVj2y/qW', NULL, '2020-03-12 06:52:05', '2020-03-12 06:52:05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detailorder_id_mobil_foreign` (`id_mobil`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `table_transaction`
--
ALTER TABLE `table_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_transaction_id_mobil_foreign` (`id_mobil`);

--
-- Indeks untuk tabel `tb_merk`
--
ALTER TABLE `tb_merk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `table_transaction`
--
ALTER TABLE `table_transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_merk`
--
ALTER TABLE `tb_merk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_mobil`
--
ALTER TABLE `tb_mobil`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD CONSTRAINT `detailorder_id_mobil_foreign` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id`);

--
-- Ketidakleluasaan untuk tabel `table_transaction`
--
ALTER TABLE `table_transaction`
  ADD CONSTRAINT `table_transaction_id_mobil_foreign` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
