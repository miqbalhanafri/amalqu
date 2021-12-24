-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2021 at 09:04 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u6421687_amalqu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$YojDMmLTPL1Th/AmhJZ7z.eBexjB7YCVauvs53qouw7znKLVls//q');

-- --------------------------------------------------------

--
-- Table structure for table `info_admin`
--

CREATE TABLE `info_admin` (
  `id` int(11) NOT NULL,
  `informasi` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_admin`
--

INSERT INTO `info_admin` (`id`, `informasi`) VALUES
(1, 'Ayoo, raih poin terbaikmu ya sahabat...!!'),
(2, 'Target poin bulan ini 7000 points ya sahabat, untuk mendapatkan badge 5 bintang.');

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `id` int(11) NOT NULL,
  `jobdesk` varchar(1000) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`id`, `jobdesk`, `points`) VALUES
(1, 'Membaca Al Qur\'an 1 Juz (target 7/mgg)', 200),
(2, 'Membaca Al Qur\'an 1/2 Juz', 100),
(3, 'Membaca Al Qur\'an kurang 1/2 Juz', 50),
(4, 'Sholat Tahajud / Qiyamul Lail (target 3/mgg)', 500),
(5, 'Sholat Dhuha (target 7/mgg)', 250),
(6, 'Melaksanakan Puasa (target 2/mgg)', 600),
(7, 'Melakukan Infak Sedekah (target 3/mgg)', 100),
(8, 'Dzikir Al Ma\'tsurat Pagi (target 7/mgg)', 70),
(9, 'Dzikir Al Ma\'tsurat Petang (target 7/mgg)', 80),
(10, 'Membina Halaqah (target 1/mgg)', 800),
(11, 'Murajaah Hafalan', 140),
(12, 'Sholat Berjamaah 5 kali', 300),
(13, 'Sholat Berjamaah 4 kali', 240),
(14, 'Sholat Berjamaah 3 kali', 180),
(15, 'Sholat Berjamaah < 3 kali', 120),
(16, 'Membaca Buku Ke-Islaman', 220),
(24, 'Membaca Berita Islami', 40),
(25, 'Belajar Bahasa Arab', 110),
(26, 'Mendengarkan Ceramah Agama ', 130);

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(11) NOT NULL,
  `opsi` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `keterangan` varchar(10000) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `opsi`, `user`, `keterangan`, `tanggal`) VALUES
(30, 10, 7, 'Mengajar mengaji', '2020-11-23'),
(31, 9, 6, 'Alhamdulillah', '2020-11-23'),
(32, 16, 6, 'Bulughul Maram terkait azan hingga hal  93', '2020-11-23'),
(33, 1, 6, 'Juz 28', '2020-11-23'),
(34, 12, 6, 'Alhamdulillah', '2020-11-23'),
(35, 1, 6, 'Juz 29', '2020-11-24'),
(36, 8, 6, 'Alhamdulillah', '2020-11-24'),
(37, 9, 6, 'Alhamdulillah', '2020-11-24'),
(38, 13, 6, 'Alhamdulillah', '2020-11-24'),
(40, 16, 6, 'Bulughul Maram tentang Azan hingga hal 97. Selanjutnya bab Syarat2 Sholat.', '2020-11-24'),
(41, 24, 6, 'Berita : \r\n- Rudal Pemberontak Syiah al-Houthi Hantam Kilang Minyak Saudi di Jeddah.\r\n- Mendadak! Pemerintah Indonesia Buka Visa Calling untuk â€˜Israelâ€™.', '2020-11-24'),
(42, 8, 6, 'Alhamdulillah', '2020-11-25'),
(43, 1, 6, 'Juz 30', '2020-11-25'),
(44, 16, 6, 'Sirah Sahabat : Abdullah Bin Mas\'ud. Seorang ulama yang zuhud, selalu disamping Rasul, orang ke-6 masuk Islam, berjiwa agung.', '2020-11-25'),
(45, 9, 6, 'Alhamdulillah', '2020-11-25'),
(46, 24, 6, 'Membaca Peta Hubungan Iran, Hamas dan Saudi, by Hidayatullah', '2020-11-25'),
(47, 12, 6, 'Alhamdulillah', '2020-11-25'),
(48, 1, 6, 'Alhamdulillah, Juz 1', '2020-11-26'),
(49, 13, 6, 'Alhamdulillah', '2020-11-26'),
(50, 24, 6, 'Berita : UEA Ancam Jatuhi Aljazair Sanksi karena Bekerja Sama dengan Turki, Inilah â€˜Calonâ€™ Ketua Umum MUI yang Mencuat', '2020-11-26'),
(51, 8, 6, 'Alhamdulillah', '2020-11-27'),
(52, 5, 6, 'Alhamdulillah', '2020-11-27'),
(53, 1, 6, 'Juz 2', '2020-11-27'),
(54, 13, 6, 'Alhamdulillah', '2020-11-27'),
(55, 24, 6, 'Terkait struktur MUI terbaru', '2020-11-27'),
(56, 1, 6, 'Juz 3', '2020-11-28'),
(57, 9, 6, 'Alhamdulillah', '2020-11-28'),
(58, 5, 6, 'Alhamdulillah', '2020-11-28'),
(59, 12, 6, 'Alhamdulillah', '2020-11-28'),
(60, 11, 6, 'Al Muthaffifin : 30 & 31', '2020-11-28'),
(61, 24, 6, 'Pengadilan Israel Perintahkan Penggusuran 87 warga Palestina dari lingkungan Yerusalem Timur', '2020-11-28'),
(62, 1, 6, 'Juz 4', '2020-11-29'),
(63, 8, 6, 'Alhamdulillah', '2020-11-29'),
(64, 4, 6, 'Alhamdulillah', '2020-11-29'),
(65, 5, 6, 'Alhamdulillah', '2020-11-29'),
(66, 11, 6, 'Al Muthaffifin ayat 32', '2020-11-29'),
(67, 14, 6, 'Alhamdulillah', '2020-11-29'),
(68, 1, 6, 'Alhamdulillah, juz 5', '2020-11-30'),
(69, 12, 6, 'Alhamdulillah', '2020-11-30'),
(70, 1, 6, 'Juz 6', '2020-12-01'),
(71, 12, 6, 'Alhamdulillah', '2020-12-01'),
(72, 2, 6, 'Alhamdulillah', '2020-12-02'),
(73, 13, 6, 'Alhamdulillah', '2020-12-02'),
(74, 12, 6, 'Alhamdulillah', '2020-12-03'),
(75, 1, 6, 'Alhamdulillah juz 7', '2020-12-07'),
(76, 12, 6, 'Alhamdulillah', '2020-12-07'),
(77, 24, 6, '- Berita Pembunuhan Laskar FPI oleh Kepolisian\r\n- Berita Demo di Perancis terkait rancangan UU', '2020-12-07'),
(78, 8, 6, 'Alhamdulillah', '2020-12-10'),
(79, 4, 6, 'Alhamdulillah', '2020-12-10'),
(80, 24, 6, 'Pentingkah Menghafal dalam Pendidikan? Tengok, siapa karib kita? Gejolak Separatis di Papua dan Habib Rizieq', '2020-12-10'),
(81, 8, 6, 'Alhamdulillah', '2020-12-26'),
(82, 5, 6, 'Alhamdulillah', '2020-12-26'),
(83, 26, 6, 'Cara terlepas dari kesulitan (Ust. Adi Hidayat) : Sholat, Dawamkan Qiyamul Lail, Bershodaqoh, dan Membaca / Menghafal Al Qur\'an.', '2020-12-26'),
(84, 1, 6, 'Alhamdulillah, Juz 15', '2020-12-26'),
(85, 9, 6, 'Alhamdulillah', '2020-12-26'),
(86, 7, 6, 'Alhamdulillah', '2020-12-26'),
(87, 8, 6, 'Alhamdulillah', '2020-12-29'),
(88, 5, 6, 'Alhamdulillah', '2020-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `uploadfoto`
--

CREATE TABLE `uploadfoto` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `motivasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploadfoto`
--

INSERT INTO `uploadfoto` (`id`, `user`, `gambar`, `motivasi`) VALUES
(14, '6', '5fbaaff143fa4.jpg', 'Man jadda wa jada, Innallaaha ma\'ana'),
(15, '7', '5fbb4356d7b39.jpg', 'Jangan pernah berputus asa dari rahmat Allah Swt..tetap semangat!!');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(6, 'abi', '$2y$10$VfG0q7.9eHUTgwJnWpUjoerG.3Uo1vcqfdq.e7cfxOSD3rYvWFVQK'),
(7, 'umma', '$2y$10$XVVKYpgG1LygEsRcma6aL.c2TnxILoMdrDtm8EpZZyIsCszCWL0Bi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_admin`
--
ALTER TABLE `info_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadfoto`
--
ALTER TABLE `uploadfoto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `info_admin`
--
ALTER TABLE `info_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `uploadfoto`
--
ALTER TABLE `uploadfoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
