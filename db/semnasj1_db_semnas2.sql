-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2023 at 11:54 AM
-- Server version: 8.0.31-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `semnasj1_db_semnas2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_presensi`
--

CREATE TABLE `tb_detail_presensi` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_presensi` int NOT NULL,
  `status` enum('sudah','belum','','') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_domisili`
--

CREATE TABLE `tb_domisili` (
  `id` int NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_domisili`
--

INSERT INTO `tb_domisili` (`id`, `nama`) VALUES
(1, 'Jawa Timur'),
(2, 'Jawa Barat'),
(3, 'Jawa Tengah'),
(4, 'Bali'),
(5, 'Aceh'),
(6, 'Sumatra Selatan'),
(7, 'DKI Jakarta'),
(8, 'Sulawesi Selatan'),
(9, 'Kalimantan Barat'),
(10, 'Kalimantan Selatan'),
(11, 'Nusa Tenggara Timur'),
(12, 'Lampung'),
(13, 'Jambi'),
(14, 'Sumatra Barat'),
(15, 'Sumatra Utara'),
(16, 'Sulawesi Utara'),
(17, 'Yogjakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_group`
--

CREATE TABLE `tb_group` (
  `id` int NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `link` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('tersedia','penuh') COLLATE utf8mb4_general_ci NOT NULL,
  `id_seminar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_group`
--

INSERT INTO `tb_group` (`id`, `nama`, `link`, `status`, `id_seminar`) VALUES
(6, 'Group Wa Semnas 1', 'https://fisay.me/', 'tersedia', 8),
(7, 'Group Wa Semnas 2', 'https://jokidong.site/', 'tersedia', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_harga`
--

CREATE TABLE `tb_harga` (
  `id` int NOT NULL,
  `harga` varchar(12) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_harga`
--

INSERT INTO `tb_harga` (`id`, `harga`) VALUES
(1, '54000'),
(2, '64000'),
(3, '84000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_item_paket`
--

CREATE TABLE `tb_item_paket` (
  `id` int NOT NULL,
  `id_seminar` int NOT NULL,
  `id_paket` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_item_paket`
--

INSERT INTO `tb_item_paket` (`id`, `id_seminar`, `id_paket`) VALUES
(6, 8, 8),
(7, 8, 7),
(8, 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_item_presensi`
--

CREATE TABLE `tb_item_presensi` (
  `id` int NOT NULL,
  `id_paket` int NOT NULL,
  `id_presensi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_item_presensi`
--

INSERT INTO `tb_item_presensi` (`id`, `id_paket`, `id_presensi`) VALUES
(7, 7, 1),
(8, 7, 2),
(9, 7, 3),
(10, 7, 4),
(11, 8, 5),
(12, 8, 6),
(13, 9, 1),
(14, 9, 2),
(15, 9, 3),
(16, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_peserta`
--

CREATE TABLE `tb_jenis_peserta` (
  `id` int NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jenis_peserta`
--

INSERT INTO `tb_jenis_peserta` (`id`, `nama`) VALUES
(1, 'Kampus Surabaya'),
(2, 'Kampus Luar Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kampus`
--

CREATE TABLE `tb_kampus` (
  `id` int NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_jenis_peserta` int NOT NULL,
  `id_domisili` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kampus`
--

INSERT INTO `tb_kampus` (`id`, `nama`, `id_jenis_peserta`, `id_domisili`) VALUES
(12, 'Poltekkes Kemenkes Surabaya', 1, 1),
(13, 'Poltekkes Kemenkes Bandung', 2, 2),
(14, 'Poltekkes Kemenkes Semarang', 2, 3),
(15, 'Poltekkes Kemenkes Denpasar', 2, 4),
(16, 'Poltekkes Kemenkes Aceh', 2, 5),
(17, 'Poltekkes Kemenkes Palembang', 2, 6),
(18, 'Poltekkes Kemenkes Jakarta 1', 2, 7),
(19, 'Poltekkes Kemenkes Yogyakarta', 2, 17),
(20, 'Poltekkes Kemenkes Makassar', 2, 8),
(21, 'Poltekkes Kemenkes Pontianak', 2, 9),
(22, 'Poltekkes Kemenkes Banjarmasin', 2, 10),
(23, 'Poltekkes Kemenkes Kupang', 2, 11),
(24, 'Poltekkes Kemenkes Tanjung Karang', 2, 12),
(25, 'Poltekkes Kemenkes Jambi', 2, 13),
(26, 'Poltekkes Kemenkes Tasikmalaya', 2, 2),
(27, 'Poltekkes Kemenkes Padang', 2, 14),
(28, 'Poltekkes Kemenkes Medan', 2, 15),
(29, 'Poltekkes Kemenkes Manado', 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id` int NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `id_jenis_peserta` int NOT NULL,
  `id_sertifikat` int NOT NULL,
  `id_item_presensi` int DEFAULT NULL,
  `id_harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id`, `nama`, `id_jenis_peserta`, `id_sertifikat`, `id_item_presensi`, `id_harga`) VALUES
(7, 'Semnas JKG 2 Hari', 1, 1, NULL, 1),
(8, 'Semnas JKG 1 Hari', 2, 2, NULL, 2),
(9, 'Semnas JKG 2 Hari', 2, 1, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_seminar` int NOT NULL,
  `id_paket` int NOT NULL,
  `status` enum('lunas','belum_bayar','','') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_sertifikat` enum('aktif','tidak_aktif','','') COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_presensi`
--

CREATE TABLE `tb_presensi` (
  `id` int NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_habis` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_presensi`
--

INSERT INTO `tb_presensi` (`id`, `nama`, `waktu_mulai`, `waktu_habis`) VALUES
(1, 'Presensi 1 (Semnas JKG 2 Hari)', '2023-04-14 08:00:00', '2023-04-14 12:00:00'),
(2, 'Presensi 2 (Semnas JKG 2 Hari)', '2023-04-14 13:00:00', '2023-04-14 17:00:00'),
(3, 'Presensi 3 (Semnas JKG 2 Hari)', '2023-04-15 08:00:00', '2023-04-15 12:00:00'),
(4, 'Presensi 4 (Semnas JKG 2 Hari)', '2023-04-15 13:00:00', '2023-04-15 17:00:00'),
(5, 'Presensi 1 (Semnas JKG 1 Hari)', '2023-05-31 03:20:00', '2023-05-31 03:23:00'),
(6, 'Presensi 2 (Semnas JKG 1 Hari)', '2023-05-31 03:25:00', '2023-05-31 03:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int NOT NULL,
  `nama` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `nama`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_seminar`
--

CREATE TABLE `tb_seminar` (
  `id` int NOT NULL,
  `nama` text COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_seminar`
--

INSERT INTO `tb_seminar` (`id`, `nama`, `deskripsi`) VALUES
(8, 'Semnas JKG Poltekkes Surabaya', 'Sosialisasi dalam rangka memberikan wawasan mengenai pentingnya menjaga kesehatan gigi ditengah-tengah lingkungan masyarakat untuk menerapkan betapa pentingnya menjaga kesehatan gigi.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sertifikat`
--

CREATE TABLE `tb_sertifikat` (
  `id` int NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `url` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('aktif','tidak_aktif','','') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_sertifikat`
--

INSERT INTO `tb_sertifikat` (`id`, `nama`, `url`, `status`) VALUES
(1, 'Sertifikat 1', 'https://script.google.com/macros/s/AKfycbx8j4THxfplFIL5tQfRl6yub7o2xOQPoGupaMwYlOenu8yVFsk3QGhMdizPohcpwJV0Wg/exec', 'aktif'),
(2, 'Sertifikat 2', 'https://script.google.com/macros/s/AKfycbxQ7Yt6llqv7Hnyl1CnITYR_d5oxPGnGBMrWNTJ8qhrQZw5Tm21J79Jko28lONpXPkL2A/exec', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `nama` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `username` text COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `code` text COLLATE utf8mb4_general_ci,
  `id_kampus` int DEFAULT NULL,
  `id_role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `username`, `password`, `code`, `id_kampus`, `id_role`) VALUES
(28, 'Ilham Ibnu Ahmad', 'ilhamibnuahmad@gmail.com', 'ilhamibnu', '1', 'n3f06wxLNU', 13, 2),
(29, 'Sugeng Budisaputra', 'sugengbudi@gmail.com', 'sugeng', '1', NULL, 16, 2),
(30, 'Rijal Khoirul Anam', 'rrizalkaa@gmail.com', 'rijal', '1', 'nHZsQpWLtV', 26, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_presensi`
--
ALTER TABLE `tb_detail_presensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_presensi` (`id_presensi`);

--
-- Indexes for table `tb_domisili`
--
ALTER TABLE `tb_domisili`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_group`
--
ALTER TABLE `tb_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_seminar` (`id_seminar`);

--
-- Indexes for table `tb_harga`
--
ALTER TABLE `tb_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_item_paket`
--
ALTER TABLE `tb_item_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_seminar` (`id_seminar`);

--
-- Indexes for table `tb_item_presensi`
--
ALTER TABLE `tb_item_presensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_presensi` (`id_presensi`);

--
-- Indexes for table `tb_jenis_peserta`
--
ALTER TABLE `tb_jenis_peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kampus`
--
ALTER TABLE `tb_kampus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis_peserta` (`id_jenis_peserta`),
  ADD KEY `id_domisili` (`id_domisili`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_harga` (`id_harga`),
  ADD KEY `id_sertifikat` (`id_sertifikat`),
  ADD KEY `id_jenis_peserta` (`id_jenis_peserta`),
  ADD KEY `id_item_presensi` (`id_item_presensi`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_seminar` (`id_seminar`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_seminar`
--
ALTER TABLE `tb_seminar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sertifikat`
--
ALTER TABLE `tb_sertifikat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_kampus` (`id_kampus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_presensi`
--
ALTER TABLE `tb_detail_presensi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tb_domisili`
--
ALTER TABLE `tb_domisili`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_group`
--
ALTER TABLE `tb_group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_harga`
--
ALTER TABLE `tb_harga`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_item_paket`
--
ALTER TABLE `tb_item_paket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_item_presensi`
--
ALTER TABLE `tb_item_presensi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_jenis_peserta`
--
ALTER TABLE `tb_jenis_peserta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kampus`
--
ALTER TABLE `tb_kampus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `tb_presensi`
--
ALTER TABLE `tb_presensi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_seminar`
--
ALTER TABLE `tb_seminar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_sertifikat`
--
ALTER TABLE `tb_sertifikat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_presensi`
--
ALTER TABLE `tb_detail_presensi`
  ADD CONSTRAINT `tb_detail_presensi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`),
  ADD CONSTRAINT `tb_detail_presensi_ibfk_2` FOREIGN KEY (`id_presensi`) REFERENCES `tb_presensi` (`id`);

--
-- Constraints for table `tb_group`
--
ALTER TABLE `tb_group`
  ADD CONSTRAINT `tb_group_ibfk_1` FOREIGN KEY (`id_seminar`) REFERENCES `tb_seminar` (`id`);

--
-- Constraints for table `tb_item_paket`
--
ALTER TABLE `tb_item_paket`
  ADD CONSTRAINT `tb_item_paket_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id`),
  ADD CONSTRAINT `tb_item_paket_ibfk_2` FOREIGN KEY (`id_seminar`) REFERENCES `tb_seminar` (`id`);

--
-- Constraints for table `tb_item_presensi`
--
ALTER TABLE `tb_item_presensi`
  ADD CONSTRAINT `tb_item_presensi_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id`),
  ADD CONSTRAINT `tb_item_presensi_ibfk_2` FOREIGN KEY (`id_presensi`) REFERENCES `tb_presensi` (`id`);

--
-- Constraints for table `tb_kampus`
--
ALTER TABLE `tb_kampus`
  ADD CONSTRAINT `tb_kampus_ibfk_1` FOREIGN KEY (`id_domisili`) REFERENCES `tb_domisili` (`id`),
  ADD CONSTRAINT `tb_kampus_ibfk_2` FOREIGN KEY (`id_jenis_peserta`) REFERENCES `tb_jenis_peserta` (`id`);

--
-- Constraints for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `tb_paket_ibfk_1` FOREIGN KEY (`id_harga`) REFERENCES `tb_harga` (`id`),
  ADD CONSTRAINT `tb_paket_ibfk_2` FOREIGN KEY (`id_sertifikat`) REFERENCES `tb_sertifikat` (`id`),
  ADD CONSTRAINT `tb_paket_ibfk_3` FOREIGN KEY (`id_jenis_peserta`) REFERENCES `tb_jenis_peserta` (`id`);

--
-- Constraints for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD CONSTRAINT `tb_pendaftaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`),
  ADD CONSTRAINT `tb_pendaftaran_ibfk_2` FOREIGN KEY (`id_seminar`) REFERENCES `tb_seminar` (`id`),
  ADD CONSTRAINT `tb_pendaftaran_ibfk_3` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`id`),
  ADD CONSTRAINT `tb_user_ibfk_2` FOREIGN KEY (`id_kampus`) REFERENCES `tb_kampus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
