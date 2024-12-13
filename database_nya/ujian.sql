-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2024 pada 14.10
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin123', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `mata_pelajaran_id` bigint(20) UNSIGNED NOT NULL,
  `mata_pelajaran` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`mata_pelajaran_id`, `mata_pelajaran`, `created_at`, `updated_at`) VALUES
(1, 'Bahasa Indonesia', '2024-10-29 06:03:21', '2024-10-29 06:03:21'),
(2, 'Informatika', '2024-10-29 06:03:21', '2024-10-29 06:03:21'),
(3, 'Pendidikan Pancasila', '2024-10-29 06:05:30', '2024-10-29 06:05:30');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_22_052750_create_siswa_table', 1),
(5, '2024_10_22_052751_create_admin_table', 1),
(6, '2024_10_22_052751_create_mata_pelajaran_table', 1),
(7, '2024_10_22_052752_create_soal_table', 1),
(8, '2024_10_29_060034_create_mata_pelajaran_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('WRVcyWh965XBDCv3Df5LGgg6963FeXgQh95ZxWzM', 21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiNkQ2bTZEU3BhRzJIUWJJUkg0NTF6eFJTQUxRTFp5VjZPaUdVaVR1YiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yZWdpc3RlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6ODoiaWRfc2lzd2EiO2k6MjE7czoxMDoibmFtYV9zaXN3YSI7czo3OiJTeWFmaXJhIjtzOjU6ImtlbGFzIjtzOjI6IjExIjtzOjc6Imp1cnVzYW4iO3M6NDoiVEpLVCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjE7fQ==', 1734080592);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nilai_bahasa_indonesia` decimal(5,2) DEFAULT NULL,
  `nilai_informatika` decimal(5,2) DEFAULT NULL,
  `nilai_pendidikan_pancasila` decimal(5,2) DEFAULT NULL,
  `nilai_rata_rata` decimal(5,2) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `kelas`, `jurusan`, `email`, `nilai_bahasa_indonesia`, `nilai_informatika`, `nilai_pendidikan_pancasila`, `nilai_rata_rata`, `password`, `created_at`, `updated_at`) VALUES
(19, 'mahrani', '12', 'to', 'mahrani@gmail.com', 70.00, 47.00, 20.00, NULL, '$2y$12$mEvmf9SfEwHKpLoCQ0FP7uNZm6M6XEmZMcb1ThYCcYiYLSsb0LLWa', '2024-11-14 00:48:13', '2024-12-13 01:08:38'),
(21, 'Syafira', '11', 'TJKT', 'syafira@gmail.com', NULL, NULL, NULL, NULL, '$2y$12$baUJE5tR1UWCk4V4NvWSI.VB3rKh7C/wp9B5T6qAhBuX1.lBTf5Qq', '2024-11-17 02:27:46', '2024-11-17 02:27:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `soal` varchar(255) NOT NULL,
  `mata_pelajaran_id` varchar(9) DEFAULT NULL,
  `soal_a` varchar(255) NOT NULL,
  `soal_b` varchar(255) NOT NULL,
  `soal_c` varchar(255) NOT NULL,
  `soal_d` varchar(255) NOT NULL,
  `kunci_jawaban` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id`, `soal`, `mata_pelajaran_id`, `soal_a`, `soal_b`, `soal_c`, `soal_d`, `kunci_jawaban`, `created_at`, `updated_at`) VALUES
(3, 'Apa dasar negara Indonesia yang menjadi panduan dalam kehidupan berbangsa dan bernegara?', '3', 'Proklamasi', 'Pancasila', 'Undang-Undang', 'Bhinneka Tunggal Ika', 'B', '2024-10-30 21:11:33', '2024-10-30 21:11:33'),
(5, 'Hai', NULL, 'Halo', 'Hai Juga', 'Hanya Teman Saja', 'Hayya', 'B', '2024-11-04 22:35:05', '2024-11-04 22:35:05'),
(6, 'hh', NULL, 'A. Naskah Proklamasi', 'Pembukaan UUD 1945', 'Sumpah Pemuda', 'Bhinneka Tunggal Ika', 'B', '2024-11-04 22:38:06', '2024-11-04 22:38:06'),
(7, 'apa ?', NULL, 'A', 'B', 'C', 'D', 'A', '2024-11-04 22:39:09', '2024-11-04 22:39:09'),
(8, 'hhh', NULL, '1', '2', '3', '4', 'B', '2024-11-04 22:41:06', '2024-11-04 22:41:06'),
(11, 'Apa yang dapat kita temukan di perpustakaan sekolah?', '1', 'Mainan', 'Makanan', 'Berbagai jenis buku', 'Hewan peliharaan Danil', 'c', '2024-11-04 22:48:29', '2024-11-07 01:41:26'),
(19, 'Pancasila sebagai dasar negara Indonesia berfungsi untuk…', '3', 'Menjaga ketertiban umum', 'Menentukan arah kebijakan negara', 'Menyatukan wilayah Indonesia', 'Memperkuat pertahanan negara', 'B', '2024-11-12 00:02:28', '2024-11-12 00:02:28'),
(20, 'Nilai-nilai Pancasila yang terdapat pada sila ketiga, \"Persatuan Indonesia\", bertujuan untuk...', '3', 'Mengutamakan kepentingan pribadi', 'Menjaga keutuhan bangsa', 'Memberikan kebebasan pada warga negara', 'Membentuk masyarakat individualis', 'B', '2024-11-12 00:16:42', '2024-11-12 00:16:42'),
(21, 'Sila keempat Pancasila mengajarkan kita untuk…', '3', 'Mementingkan kepentingan pribadi di atas segalanya', 'Mengutamakan musyawarah dalam pengambilan keputusan', 'Mengandalkan kekuasaan mayoritas', 'Menghindari perbedaan pendapat', 'B', '2024-11-12 00:18:38', '2024-11-12 00:18:38'),
(22, 'Berikut ini yang merupakan contoh pengamalan sila kedua Pancasila adalah…', '3', 'Menghargai pendapat orang lain', 'Membantu teman yang sedang kesulitan', 'Ikut serta dalam pemilu', 'Menjaga kelestarian lingkungan', 'B', '2024-11-12 00:19:39', '2024-11-12 00:19:39'),
(23, 'Pancasila pertama kali disahkan sebagai dasar negara pada tanggal…', '3', '1 Juni 1945', '18 Agustus 1945', '17 Agustus 1945', '28 Oktober 1928', 'B', '2024-11-12 00:22:07', '2024-11-12 00:22:07'),
(24, 'Pengamalan nilai Ketuhanan yang Maha Esa tercermin dalam sikap…', '3', 'Menghormati agama dan kepercayaan orang lain', 'Mengutamakan kekuasaan', 'Menyebarkan kebencian terhadap agama tertentu', 'Berusaha mencari keuntungan pribadi', 'A', '2024-11-12 00:23:26', '2024-11-12 00:23:26'),
(25, 'Berikut ini yang bukan merupakan lambang dari sila-sila Pancasila adalah…', '3', 'Bintang', 'Rantai', 'Padi dan Kapas', 'Garuda', 'D', '2024-11-12 00:24:24', '2024-11-12 00:24:24'),
(26, 'Sila kelima Pancasila menekankan pada…', '3', 'Kesejahteraan sosial bagi seluruh rakyat', 'Keadilan dalam bidang ekonomi saja', 'Penghargaan terhadap kebebasan individu', 'Pengutamaan hak-hak kaum elite', 'A', '2024-11-12 00:25:09', '2024-11-12 00:25:09'),
(27, 'Kalimat berikut yang merupakan kalimat aktif adalah...', '1', 'Bunga itu dipetik oleh Dina.', 'Dina memetik bunga itu.', 'Bunga itu diberikan kepada Dina.', 'Bunga itu disukai oleh Dina.', 'B', '2024-11-12 00:26:45', '2024-11-12 00:26:45'),
(28, 'Makna kata “amfibi” dalam kalimat \"Katak adalah hewan amfibi\" adalah..', '1', 'Hidup di darat saja', 'Hidup di air saja', 'Hidup di darat dan air', 'Hidup di lingkungan basah', 'c', '2024-11-12 00:27:51', '2024-11-12 00:27:51'),
(29, 'Kalimat berikut yang berstruktur kalimat kompleks adalah...', '1', 'Aku menyukai buku ini.', 'Dina dan Rani pergi ke pasar.', 'Dia belajar dengan rajin agar lulus ujian.', 'Mereka berangkat pagi-pagi.', 'c', '2024-11-12 00:30:01', '2024-11-12 00:30:01'),
(30, 'Kata baku dari “aktifitas” adalah...', '1', 'Aktivitas', 'Aktifitas', 'Aktif', 'Aktifivitas', 'A', '2024-11-12 00:32:12', '2024-11-12 00:32:12'),
(31, 'Teks yang berisi langkah-langkah atau prosedur untuk melakukan sesuatu disebut..', '1', 'Teks deskripsi', 'Teks narasi', 'Teks eksposisi', 'Teks prosedur', 'D', '2024-11-12 00:47:14', '2024-11-12 00:47:14'),
(32, 'Sinonim dari kata “abstrak” adalah...', '1', 'Konkret', 'Nyata', 'Tak jelas', 'Khusus', 'C', '2024-11-12 00:48:33', '2024-11-12 00:48:33'),
(33, 'Dalam struktur teks argumentasi, bagian yang berisi pernyataan pendapat atau klaim disebut...', '1', 'Argumentasi', 'Pengenalan isu', 'Kesimpulan', 'Rekomendasi', 'B', '2024-11-12 01:03:02', '2024-11-12 01:03:02'),
(34, 'Kalimat berikut yang menggunakan majas personifikasi adalah...', '1', 'Angin berbisik di malam sunyi.', 'Ia bagaikan pahlawan di mataku.', 'Angin berbisik di malam sunyi.', 'Kau adalah pelita hidupku.', 'C', '2024-11-12 01:05:05', '2024-11-12 01:05:05'),
(35, 'Peribahasa \"Bagai air di daun talas\" memiliki arti...', '1', 'Perasaan yang tidak menentu', 'Hidup penuh kebahagiaan', 'Hidup rukun dan damai', 'Selalu bersama-sama', 'A', '2024-11-12 01:06:10', '2024-11-12 01:06:10'),
(36, 'Komponen utama dari sebuah komputer yang berfungsi sebagai otak komputer untuk memproses data adalah...', '2', 'Harddisk', 'RAM', 'CPU', 'Monitor', 'C', '2024-11-12 01:16:48', '2024-11-12 01:16:48'),
(37, 'Manakah di bawah ini yang termasuk perangkat lunak sistem?', '2', 'Microsoft Word', 'Windows', 'Adobe Photoshop', 'CorelDRAW', 'B', '2024-11-12 01:18:04', '2024-11-12 01:18:04'),
(38, 'Urutan tahapan dalam metodologi pengembangan perangkat lunak yang benar adalah...', '2', 'Analisis, Desain, Implementasi, Pemeliharaan', 'Desain, Implementasi, Analisis, Pemeliharaan', 'Implementasi, Analisis, Pemeliharaan, Desain', 'Pemeliharaan, Desain, Implementasi, Analisis', 'A', '2024-11-12 01:19:15', '2024-11-12 01:19:15'),
(39, 'Jenis jaringan komputer yang mencakup wilayah antar negara bahkan antar benua adalah...', '2', 'LAN', 'MAN', 'WAN', 'WLAN', 'C', '2024-11-12 01:20:56', '2024-11-12 01:20:56'),
(40, 'Apa yang dimaksud dengan algoritma?', '2', 'Kumpulan perangkat keras yang saling terhubung', 'Urutan langkah-langkah yang logis untuk menyelesaikan masalah', 'Program komputer yang kompleks', 'Data yang disimpan di dalam komputer', 'B', '2024-11-12 01:21:49', '2024-11-12 01:21:49'),
(41, 'Protokol yang digunakan untuk mengirim data dalam bentuk halaman web adalah...', '2', 'FTP', 'HTTP', 'SMTP', 'POP3', 'B', '2024-11-12 01:22:48', '2024-11-12 01:22:48'),
(42, 'Bagian dari CPU yang bertugas untuk melakukan perhitungan aritmatika dan logika adalah...', '2', 'CU (Control Unit)', 'ALU (Arithmetic Logic Unit)', 'RAM', 'ROM', 'B', '2024-11-12 01:23:35', '2024-11-12 01:23:35'),
(43, 'Penyimpanan data yang bersifat non-volatile, artinya data tidak hilang meskipun komputer dimatikan, adalah...', '2', 'RAM', 'Cache', 'Harddisk', 'Register', 'C', '2024-11-12 01:24:19', '2024-11-12 01:24:19'),
(44, 'Istilah yang digunakan untuk menggambarkan kerentanan keamanan yang memungkinkan pengguna yang tidak sah mengakses sistem komputer adalah...', '2', 'Firewall', 'Bug', 'Backdoor', 'Patch', 'C', '2024-11-12 01:25:19', '2024-11-12 01:25:19'),
(45, 'ewfwe', '0', 'wfwf', 'fwfw', 'wfwf', 'wfw', 'a', '2024-11-18 00:57:58', '2024-11-18 00:57:58'),
(49, 'tgtrg', '0', 'greg', 'regr', 'reg', 'eg', 'a', '2024-11-18 21:22:16', '2024-11-18 21:22:16'),
(51, '\"Untuk menghindari salah paham, guru harus memberikan penjelasan secara terperinci kepada siswa.\"\r\n\r\nKata terperinci dalam kalimat di atas memiliki arti ...', '3', 'Singkat', 'Mendalam', 'Rinci', 'Lua', 'A', '2024-11-27 21:35:18', '2024-12-13 01:03:22'),
(52, 'Dalam dunia teknologi informasi, perangkat yang digunakan untuk menghubungkan beberapa komputer dalam satu jaringan disebut?', '0', 'Router', 'Switch', 'Modem', 'Printer', 'b', '2024-12-10 00:56:59', '2024-12-10 00:56:59'),
(53, 'Dalam dunia teknologi informasi, perangkat yang digunakan untuk menghubungkan beberapa komputer dalam satu jaringan disebut?', '2', 'Router', 'Switch', 'Modem', 'Printer', 'b', '2024-12-10 00:57:44', '2024-12-10 00:57:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_nama_unique` (`nama`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`mata_pelajaran_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
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
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `mata_pelajaran_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
