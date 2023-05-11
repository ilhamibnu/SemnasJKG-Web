-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 02:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_semnas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_presensi`
--

CREATE TABLE `tb_detail_presensi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_presensi` int(11) NOT NULL,
  `status` enum('sudah','belum','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_detail_presensi`
--

INSERT INTO `tb_detail_presensi` (`id`, `id_user`, `id_presensi`, `status`) VALUES
(26, 25, 1, 'belum'),
(27, 25, 2, 'sudah'),
(28, 25, 3, 'belum'),
(29, 25, 4, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `tb_domisili`
--

CREATE TABLE `tb_domisili` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_domisili`
--

INSERT INTO `tb_domisili` (`id`, `nama`) VALUES
(1, 'Jawa Timur'),
(2, 'Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_harga`
--

CREATE TABLE `tb_harga` (
  `id` int(11) NOT NULL,
  `harga` varchar(12) NOT NULL
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
  `id` int(11) NOT NULL,
  `id_seminar` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_item_paket`
--

INSERT INTO `tb_item_paket` (`id`, `id_seminar`, `id_paket`) VALUES
(1, 6, 2),
(2, 6, 1),
(3, 6, 3),
(4, 7, 6),
(5, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_item_presensi`
--

CREATE TABLE `tb_item_presensi` (
  `id` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_presensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_item_presensi`
--

INSERT INTO `tb_item_presensi` (`id`, `id_paket`, `id_presensi`) VALUES
(3, 1, 1),
(4, 1, 2),
(5, 1, 3),
(6, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_peserta`
--

CREATE TABLE `tb_jenis_peserta` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
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
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_jenis_peserta` int(11) NOT NULL,
  `id_domisili` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kampus`
--

INSERT INTO `tb_kampus` (`id`, `nama`, `id_jenis_peserta`, `id_domisili`) VALUES
(12, 'JKG Poltekkes Surabaya', 1, 1),
(13, 'JKG Poltekkes Bandung', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `id_jenis_peserta` int(11) NOT NULL,
  `id_sertifikat` int(11) NOT NULL,
  `id_item_presensi` int(11) DEFAULT NULL,
  `id_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id`, `nama`, `id_jenis_peserta`, `id_sertifikat`, `id_item_presensi`, `id_harga`) VALUES
(1, 'Semnas JKG 2 Hari', 1, 1, NULL, 1),
(2, 'Semnas JKG 1 Hari', 2, 2, NULL, 2),
(3, 'Semnas JKG 2 Hari', 2, 1, NULL, 3),
(5, 'Workshop JKG 2 Hari', 1, 1, NULL, 1),
(6, 'Workshop JKG 1 Hari', 2, 2, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_seminar` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `status` enum('lunas','belum_bayar','','') DEFAULT NULL,
  `status_sertifikat` enum('aktif','tidak_aktif','','') NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id`, `id_user`, `id_seminar`, `id_paket`, `status`, `status_sertifikat`, `tanggal`) VALUES
(111, 25, 6, 1, 'lunas', 'aktif', '2023-04-14 16:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_presensi`
--

CREATE TABLE `tb_presensi` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
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
(4, 'Presensi 4 (Semnas JKG 2 Hari)', '2023-04-15 13:00:00', '2023-04-15 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `nama` varchar(10) NOT NULL
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
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `deskripsi` text NOT NULL,
  `group_wa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_seminar`
--

INSERT INTO `tb_seminar` (`id`, `nama`, `deskripsi`, `group_wa`) VALUES
(6, 'Semnas JKG Poltekkes Surabaya', 'Sosialisasi dalam rangka memberikan wawasan mengenai pentingnya menjaga kesehatan gigi ditengah-tengah lingkungan masyarakat untuk menerapkan betapa pentingnya menjaga kesehatan gigi.', 'fisay.me'),
(7, 'Workshop JKG Poltekkes Surabaya', 'Kami memberikan kegiatan workshop dalam rangka mengenalkan Jurusan Keperawatan Gigi Poltekkes Surabaya bertujuan supaya masyarakat dapat mengenal lebih jauh apa itu jurusan keperawatan gigi.', 'fisay.me');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sertifikat`
--

CREATE TABLE `tb_sertifikat` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `url` text NOT NULL,
  `status` enum('aktif','tidak_aktif','','') NOT NULL
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
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `code` text DEFAULT NULL,
  `id_kampus` int(11) DEFAULT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `username`, `password`, `code`, `id_kampus`, `id_role`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin#23', 'admin#23', '', NULL, 1),
(25, 'Ilham Ibnu Ahmad', 'ilhamibnuahmad@gmail.com', 'ilham', '1', NULL, 12, 2),
(26, 'Maulana Ibnu Fauzi', 'maulanaibnufauzi@gmail.com', 'lana', '1', NULL, 13, 2),
(27, 'Daffa Fauzi Rahman', 'daffafauzi@gmail.com', 'daffa', '1', NULL, 13, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_domisili`
--
ALTER TABLE `tb_domisili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_harga`
--
ALTER TABLE `tb_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_item_paket`
--
ALTER TABLE `tb_item_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_item_presensi`
--
ALTER TABLE `tb_item_presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_jenis_peserta`
--
ALTER TABLE `tb_jenis_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kampus`
--
ALTER TABLE `tb_kampus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tb_presensi`
--
ALTER TABLE `tb_presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_seminar`
--
ALTER TABLE `tb_seminar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_sertifikat`
--
ALTER TABLE `tb_sertifikat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
