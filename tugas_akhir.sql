-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2025 at 09:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` varchar(10) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `deskripsi`) VALUES
('G001', 'Fobia pada hal yang spesifik atau ketakutan akan suatu benda tertentu'),
('G002', 'Mengalami kecemasan yang berlebihan dalam setiap situasi'),
('G003', 'Nyeri otot'),
('G004', 'Sering merasa terkucilkan hingga berpikiran hal buruk akan terjadi'),
('G005', 'Sulit tidur'),
('G006', 'Rasa takut dan bersalah yang hebat'),
('G007', 'Mengompol di kasur pada malam hari'),
('G008', 'Tidak peduli terhadap kebersihan diri dan penampilan'),
('G009', 'Lebih memilih diam di rumah daripada bersosialisasi'),
('G010', 'Berbicara, mendengar, dan melihat hal-hal yang tidak ada'),
('G011', 'Ekspresi wajah tidak sesuai dengan perasaan'),
('G012', 'Tidak bisa membedakan dunia nyata dan khayalan'),
('G013', 'Cenderung mengasingkan diri dari orang lain'),
('G014', 'Terlalu lelah atau terlalu berenergi'),
('G015', 'Terlalu sering tidur atau tidak butuh tidur'),
('G016', 'Perilaku tidak sesuai usia, mudah marah/agresif'),
('G017', 'Sering sakit kepala/perut, mudah lelah'),
('G018', 'Merasa hampa, sedih, atau cemas terus-menerus'),
('G019', 'Sulit bersosialisasi'),
('G020', 'Kesulitan membaca, menulis, bicara, atau memahami isyarat'),
('G021', 'Kurang simpati dan emosi terhadap lingkungan'),
('G022', 'Tubuh sering terluka'),
('G023', 'Melukai diri sendiri seperti membentur kepala'),
('G024', 'Tidak bisa fokus'),
('G025', 'Tidak menyelesaikan tugas/pekerjaan'),
('G026', 'Berbicara terus-menerus dan mengganggu orang lain'),
('G027', 'Berbicara sendiri berulang kali'),
('G028', 'Menjawab sebelum pertanyaan selesai');

-- --------------------------------------------------------

--
-- Table structure for table `gejala_penyakit`
--

CREATE TABLE `gejala_penyakit` (
  `kode_gejala_penyakit` int(11) NOT NULL,
  `kode_penyakit` varchar(10) DEFAULT NULL,
  `kode_gejala` varchar(10) DEFAULT NULL,
  `mb` float DEFAULT NULL,
  `md` float DEFAULT NULL,
  `cf` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gejala_penyakit`
--

INSERT INTO `gejala_penyakit` (`kode_gejala_penyakit`, `kode_penyakit`, `kode_gejala`, `mb`, `md`, `cf`) VALUES
(1, 'P001', 'G001', 0.8, 0.2, 0.6),
(2, 'P001', 'G002', 0.9, 0.1, 0.8),
(3, 'P001', 'G003', 0.7, 0.3, 0.4),
(4, 'P001', 'G004', 0.8, 0.2, 0.6),
(5, 'P001', 'G005', 0.85, 0.1, 0.75),
(6, 'P001', 'G006', 0.75, 0.2, 0.55),
(7, 'P001', 'G007', 0.6, 0.3, 0.3),
(8, 'P002', 'G008', 0.85, 0.1, 0.75),
(9, 'P002', 'G009', 0.8, 0.2, 0.6),
(10, 'P002', 'G010', 0.9, 0.1, 0.8),
(11, 'P002', 'G011', 0.75, 0.15, 0.6),
(12, 'P002', 'G012', 0.85, 0.1, 0.75),
(13, 'P002', 'G013', 0.8, 0.2, 0.6),
(14, 'P003', 'G014', 0.75, 0.1, 0.65),
(15, 'P003', 'G015', 0.85, 0.05, 0.8),
(16, 'P003', 'G016', 0.9, 0.1, 0.8),
(17, 'P003', 'G017', 0.7, 0.2, 0.5),
(18, 'P003', 'G018', 0.8, 0.2, 0.6),
(19, 'P004', 'G019', 0.8, 0.1, 0.7),
(20, 'P004', 'G020', 0.85, 0.05, 0.8),
(21, 'P004', 'G021', 0.9, 0.05, 0.85),
(22, 'P004', 'G022', 0.6, 0.3, 0.3),
(23, 'P005', 'G023', 0.85, 0.1, 0.75),
(24, 'P005', 'G024', 0.9, 0.05, 0.85),
(25, 'P005', 'G025', 0.8, 0.2, 0.6),
(26, 'P005', 'G026', 0.7, 0.3, 0.4),
(27, 'P005', 'G027', 0.75, 0.2, 0.55),
(28, 'P005', 'G028', 0.7, 0.2, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_diagnosa`
--

CREATE TABLE `hasil_diagnosa` (
  `kode_diagnosa` int(11) NOT NULL,
  `kode_pengguna` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `hasil_penyakit` varchar(100) DEFAULT NULL,
  `presentase_cf` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `kode_histori` int(11) NOT NULL,
  `kode_diagnosa` int(11) DEFAULT NULL,
  `kode_gejala` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `kode_pengguna` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kode_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `nama_penyakit`, `deskripsi`) VALUES
('P001', 'Gangguan Kecemasan Umum (GAD)', 'Kecemasan berlebihan dalam berbagai situasi.'),
('P002', 'Skizofrenia', 'Gangguan jiwa kronis yang memengaruhi pikiran dan perilaku.'),
('P003', 'Bipolar', 'Gangguan suasana hati ekstrem antara mania dan depresi.'),
('P004', 'Autisme', 'Gangguan perkembangan saraf yang memengaruhi interaksi sosial dan komunikasi.'),
('P005', 'ADHD', 'Gangguan perhatian dan hiperaktivitas.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `gejala_penyakit`
--
ALTER TABLE `gejala_penyakit`
  ADD PRIMARY KEY (`kode_gejala_penyakit`),
  ADD KEY `kode_penyakit` (`kode_penyakit`),
  ADD KEY `kode_gejala` (`kode_gejala`);

--
-- Indexes for table `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD PRIMARY KEY (`kode_diagnosa`),
  ADD KEY `fk_pengguna` (`kode_pengguna`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`kode_histori`),
  ADD KEY `kode_diagnosa` (`kode_diagnosa`),
  ADD KEY `kode_gejala` (`kode_gejala`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`kode_pengguna`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala_penyakit`
--
ALTER TABLE `gejala_penyakit`
  MODIFY `kode_gejala_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  MODIFY `kode_diagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `kode_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `kode_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gejala_penyakit`
--
ALTER TABLE `gejala_penyakit`
  ADD CONSTRAINT `gejala_penyakit_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `penyakit` (`kode_penyakit`),
  ADD CONSTRAINT `gejala_penyakit_ibfk_2` FOREIGN KEY (`kode_gejala`) REFERENCES `gejala` (`kode_gejala`);

--
-- Constraints for table `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD CONSTRAINT `fk_pengguna` FOREIGN KEY (`kode_pengguna`) REFERENCES `pengguna` (`kode_pengguna`);

--
-- Constraints for table `histori`
--
ALTER TABLE `histori`
  ADD CONSTRAINT `histori_ibfk_1` FOREIGN KEY (`kode_diagnosa`) REFERENCES `hasil_diagnosa` (`kode_diagnosa`),
  ADD CONSTRAINT `histori_ibfk_2` FOREIGN KEY (`kode_gejala`) REFERENCES `gejala` (`kode_gejala`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
