-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2023 pada 15.57
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewarung1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Rizki Bagus Pangestu', 'admin', '$2y$10$aKlpzcJUtXuuvMCrCqEIvexa5KINvIM.n4JVxznjqUPyxpgM5qjGC', '2023-07-03 11:55:52', '2023-07-03 11:55:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fotobarang` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `warung_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `fotobarang`, `nama`, `jumlah`, `harga`, `deskripsi`, `warung_id`, `created_at`, `updated_at`) VALUES
(1, '1688386844.jpg', 'Gula Pasir Rose Brand', '6', '18000', 'Gula Pasir dari Rose Brand 1 Kg', 1, '2023-07-03 12:20:44', '2023-07-03 12:20:44'),
(2, '1688386882.jpg', 'Tepung Terigu Segitiga Biru', '10', '12000', 'Tepung Terigu Segitiga Biru 1 Kg', 1, '2023-07-03 12:21:22', '2023-07-03 12:21:22'),
(3, '1688386926.jpg', 'Minyak Goreng Sania', '6', '39000', 'Minyak Goreng Sania 2 Liter', 1, '2023-07-03 12:22:06', '2023-07-03 12:22:06'),
(4, '1688386960.jpg', 'Gula Pasir Gulaku', '8', '18500', 'Gula Pasir Gulaku 1 Kg', 1, '2023-07-03 12:22:40', '2023-07-03 12:22:40'),
(5, '1688387002.jpg', 'Kecap Bango', '9', '12000', 'Kecap Bango 210ml', 1, '2023-07-03 12:23:22', '2023-07-03 12:23:22'),
(6, '1688387037.jpg', 'Minyak Goreng Bimoli', '8', '37000', 'Minyak Goreng Bimoli 2 Liter', 1, '2023-07-03 12:23:57', '2023-07-03 12:23:57'),
(7, '1688387129.jpg', 'Sabun Detol Batang', '5', '5000', 'Sabun Mandi Detol Batang aneka variant warna', 2, '2023-07-03 12:25:29', '2023-07-03 12:25:29'),
(8, '1688388170.jpg', 'Sabun Nuvo Batang', '10', '3500', 'Sabun Nuvo batang aneka variant warna', 2, '2023-07-03 12:42:50', '2023-07-03 12:42:50'),
(9, '1688388240.jpg', 'Sabun Giv Batang', '10', '3500', 'Sabun Giv batang aneka variant warna', 2, '2023-07-03 12:44:00', '2023-07-03 12:44:00'),
(10, '1688388377.jpg', 'Sabun Lifebuoy Cair', '4', '37000', 'Sabun Lifebuoy Cair aneka variant warna 900ml', 2, '2023-07-03 12:46:17', '2023-07-03 12:46:17'),
(11, '1688388614.jpg', 'Sabun Giv Cair', '3', '32000', 'Sabun Giv cair warna Ungu dan Putih 900ml', 2, '2023-07-03 12:50:14', '2023-07-03 12:50:14'),
(12, '1688388721.jpg', 'Mie Sedap Soto', '40', '3500', 'Mie Sedap Soto kuah', 3, '2023-07-03 12:52:01', '2023-07-03 12:52:01'),
(13, '1688388802.jpg', 'Mie Sedap Ayam Bawang', '40', '3500', 'Mie Sedap Ayam Bawang', 3, '2023-07-03 12:53:22', '2023-07-03 12:53:22'),
(14, '1688388840.jpg', 'Mie Sedap Goreng', '40', '4000', 'Mie Sedap Goreng', 3, '2023-07-03 12:54:00', '2023-07-03 12:54:00'),
(15, '1688388908.jpg', 'Vixal', '3', '30000', 'Vixal pembersih lantai 750ml', 4, '2023-07-03 12:55:08', '2023-07-03 12:55:08'),
(16, '1688388980.jpg', 'Soklin Softergent Bright Tech', '5', '14000', 'Soklin Softergent Bright Tech 770g', 4, '2023-07-03 12:56:20', '2023-07-03 12:56:20'),
(17, '1688389042.jpg', 'Soklin Softergent Lavender & Lily', '5', '15500', 'Soklin Softergent Lavender & Lily 770g', 4, '2023-07-03 12:57:22', '2023-07-03 12:57:22'),
(18, '1688389076.jpg', 'Soklin Softergent Peony & Rose', '5', '16000', 'Soklin Softergent Peony & Rose 770g', 4, '2023-07-03 12:57:56', '2023-07-03 12:57:56'),
(19, '1688389209.jpg', 'Tissu Tessa', '5', '11000', 'Tissu Tessa 250 Sheet', 5, '2023-07-03 13:00:09', '2023-07-03 13:00:09'),
(20, '1688389304.png', 'Saus Sambal Botol', '5', '8500', 'Saus Sambal Botol dari ABC 350ml', 6, '2023-07-03 13:01:44', '2023-07-03 13:01:44'),
(21, '1688389349.jpg', 'Saus Tomat Botol', '5', '8000', 'Saus Tomat Botol dari Indofood 350ml', 6, '2023-07-03 13:02:29', '2023-07-03 13:02:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_06_131750_create_profile_table', 1),
(6, '2023_05_26_135707_create_warung_table', 1),
(7, '2023_05_26_135831_create_barang_table', 1),
(8, '2023_05_30_071524_create_orders_table', 1),
(9, '2023_06_04_221318_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomerhp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rtrw` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kodepos` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `pembayaran` varchar(255) DEFAULT NULL,
  `infoproduk` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `total_barang` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `warung_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id`, `nama`, `username`, `email`, `nomerhp`, `alamat`, `rtrw`, `kecamatan`, `kota`, `kodepos`, `tanggal`, `pembayaran`, `infoproduk`, `status`, `total_barang`, `total_harga`, `users_id`, `warung_id`, `created_at`, `updated_at`) VALUES
(1, 'Rizki Bagus Pangestu', 'rizkibagg', 'rizkibagusp@gmail.com', '089657812918', 'Cerme, Panjatan, Kulon Progo', '035/018', 'Panjatan', 'Kulon Progo', '55655', '2023-07-03 20:05:22', NULL, 'Mie Sedap Goreng,Mie Sedap Soto,Saus Sambal Botol', 'Pending', '5,5,1', '47000', 7, '3,3,6', '2023-07-03 13:05:55', '2023-07-03 13:05:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomorhp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `biodata` text NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `nomorhp`, `alamat`, `pekerjaan`, `biodata`, `users_id`, `created_at`, `updated_at`) VALUES
(1, '-', '-', '-', '-', 1, '2023-07-03 12:02:02', '2023-07-03 12:02:02'),
(2, '-', '-', '-', '-', 2, '2023-07-03 12:05:58', '2023-07-03 12:05:58'),
(3, '-', '-', '-', '-', 3, '2023-07-03 12:08:07', '2023-07-03 12:08:07'),
(4, '-', '-', '-', '-', 4, '2023-07-03 12:12:27', '2023-07-03 12:12:27'),
(5, '-', '-', '-', '-', 5, '2023-07-03 12:14:24', '2023-07-03 12:14:24'),
(6, '-', '-', '-', '-', 6, '2023-07-03 12:16:49', '2023-07-03 12:16:49'),
(7, '-', '-', '-', '-', 7, '2023-07-03 13:02:59', '2023-07-03 13:02:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `kategori`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mulyati', 'mulyati', 'Penjual', 'mulyati@gmail.com', NULL, '$2y$10$SnEDgs3jyvcLlSWOlZCLKe25sGfqoUSuthzRvQByiHU7U1Qy9iXjW', NULL, '2023-07-03 12:02:02', '2023-07-03 12:02:02'),
(2, 'Santoso', 'santoso', 'Penjual', 'santoso@gmail.com', NULL, '$2y$10$.Ic3buvo.5ohmCOLKTKK7Oa2Fz3eadVA.q2lVh5CxOrHD3v4dP4q6', NULL, '2023-07-03 12:05:58', '2023-07-03 12:05:58'),
(3, 'Ratini', 'ratini', 'Penjual', 'ratini@gmail.com', NULL, '$2y$10$rwHaXIF47aOkKOa4pNLnJuM5b.q2AxpdaVviKMJWcRBntzzg2era2', NULL, '2023-07-03 12:08:07', '2023-07-03 12:08:07'),
(4, 'Barokah', 'barokah', 'Penjual', 'barokah@gmail.com', NULL, '$2y$10$8a5Ivx/fMgU4EQTwUpOgBejdQ5vcckvs9ogiykasosrNKuTmSN1UK', NULL, '2023-07-03 12:12:27', '2023-07-03 12:12:27'),
(5, 'Purnama', 'purnama', 'Penjual', 'purnama@gmail.com', NULL, '$2y$10$qYIwEESgaKZZ1.UvS047YOtuMD3jBDkC1H1n6FZD10HiT.qtQXJUW', NULL, '2023-07-03 12:14:24', '2023-07-03 12:14:24'),
(6, 'Bambang', 'bambang', 'Penjual', 'bambang@gmail.com', NULL, '$2y$10$9OXeEhxp4P7F/JGkhRx3FexqSXzQ6ra0IaEajUzswbRzkAW5.JuKy', NULL, '2023-07-03 12:16:49', '2023-07-03 12:16:49'),
(7, 'Rizki Bagus Pangestu', 'rizkibagg', 'Pembeli', 'rizkibagusp@gmail.com', NULL, '$2y$10$tsAXa591SkufgG5dhkKFfe2B7EOuBu1NMQUchtRxgNavp.zCilWIq', NULL, '2023-07-03 13:02:59', '2023-07-03 13:02:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warung`
--

CREATE TABLE `warung` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fotowarung` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomorhp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kodepos` varchar(255) NOT NULL,
  `biodata` text NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `warung`
--

INSERT INTO `warung` (`id`, `fotowarung`, `nama`, `nomorhp`, `alamat`, `kodepos`, `biodata`, `users_id`, `created_at`, `updated_at`) VALUES
(1, '1688385927.jpg', 'Warung Pojok', '087896768909', 'Jl. Pengasih-Panjatan, Pedukuhan IX Cerme, Panjatan, Kulon Progo', '55655', 'Warung Kelontong dekat SD N 1 Panjatan', 1, '2023-07-03 12:05:27', '2023-07-03 12:05:27'),
(2, '1688386038.jpg', 'Warung Sentosa', '089763526176', 'Jl. Pengasih-Panjatan, Dusun X, Cerme, Panjatan, Kulon Progo', '55655', 'Warung Kelontong Sentosa', 2, '2023-07-03 12:07:18', '2023-07-03 12:07:18'),
(3, '1688386318.jpg', 'Warung Ratini', '087125316728', 'Jl. Nagung-Brosot, Dusun IX, Cerme, Panjatan, Kulon Progo', '55655', 'Warung Kelontong depan Jembatan Batik', 3, '2023-07-03 12:11:58', '2023-07-03 12:11:58'),
(4, '1688386410.jpg', 'Warung Barokah', '085253674856', 'Jl. Cerme, Dusun X, Cerme, Kecamatan Panjatan, Kulon Progo', '55655', 'Warung Kelontong Barokah dekat perempatan Cerme', 4, '2023-07-03 12:13:30', '2023-07-03 12:13:30'),
(5, '1688386530.jpg', 'Warung Purnama', '086785975345', 'Jl. Desa No.2, Pedukuhan 2, Panjatan, Panjatan, Kulon Progo', '55655', 'Warung Kelontong belakang Puskesmas Panjatan', 5, '2023-07-03 12:15:30', '2023-07-03 12:15:30'),
(6, '1688386700.jpg', 'Warung Bambang', '087645234123', 'Pedukuhan IX RT 035/RW 018 Cerme, Panjatan, Kulon Progo', '55655', 'Warung Kelontong Bambang. Senggol Dong!', 6, '2023-07-03 12:18:20', '2023-07-03 12:18:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_warung_id_foreign` (`warung_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_users_id_foreign` (`users_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_users_id_foreign` (`users_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `warung`
--
ALTER TABLE `warung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warung_users_id_foreign` (`users_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `warung`
--
ALTER TABLE `warung`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_warung_id_foreign` FOREIGN KEY (`warung_id`) REFERENCES `warung` (`users_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `warung`
--
ALTER TABLE `warung`
  ADD CONSTRAINT `warung_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
