-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 01:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biaya_denda`
--

CREATE TABLE `tbl_biaya_denda` (
  `id_biaya_denda` int(11) NOT NULL,
  `harga_denda` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `tgl_tetap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_biaya_denda`
--

INSERT INTO `tbl_biaya_denda` (`id_biaya_denda`, `harga_denda`, `stat`, `tgl_tetap`) VALUES
(9, '4000', 'Aktif', '2024-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `buku_id` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `thn_buku` varchar(255) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `tgl_masuk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `buku_id`, `id_kategori`, `id_rak`, `isbn`, `title`, `penerbit`, `pengarang`, `thn_buku`, `jml`, `tgl_masuk`) VALUES
(9, 'BK009', 3, 2, '978-0-13-407643-0', 'Pemrograman Python untuk Pemula', 'Pearson Education', 'John Doe', '2020', 5, '2024-06-15 14:40:11'),
(10, 'BK0010', 2, 1, '978-0-596-52068-7', 'Learning Python', 'O\'Reilly Media', 'Mark Lutz', '2013', 4, '2024-06-15 14:43:00'),
(11, 'BK0011', 3, 1, '6478911111111', 'web', 'csax', 'aasaa', '2020', 2, '2024-07-02 20:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_denda`
--

CREATE TABLE `tbl_denda` (
  `id_denda` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `denda` varchar(255) NOT NULL,
  `lama_waktu` int(11) NOT NULL,
  `tgl_denda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_denda`
--

INSERT INTO `tbl_denda` (`id_denda`, `pinjam_id`, `denda`, `lama_waktu`, `tgl_denda`) VALUES
(8, 'PJ0014', '0', 0, '2024-06-16'),
(11, 'PJ0020', '0', 0, '2024-06-25'),
(12, 'PJ0021', '0', 0, '2024-06-25'),
(15, 'PJ0022', '0', 0, '2024-06-29'),
(16, 'PJ0025', '0', 0, '2024-07-02'),
(17, 'PJ0026', '0', 0, '2024-07-02'),
(18, 'PJ0027', '0', 0, '2024-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Pemrograman'),
(3, 'Teknologi dan Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` varchar(255) NOT NULL,
  `jenkel` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_bergabung` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id_login`, `anggota_id`, `user`, `pass`, `level`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `alamat`, `telepon`, `email`, `tgl_bergabung`, `foto`) VALUES
(5, 'AG003', 'ifa', '202cb962ac59075b964b07152d234b70', 'Petugas', 'ifana', 'Magelang', '2024-06-05', 'Perempuan', 'Kaliangkrik', '085227244317', 'ifana@gmail.com', '2024-06-15', 'user_123456.png'),
(6, 'AG006', 'ozan', '202cb962ac59075b964b07152d234b70', 'Anggota', 'fauzan muhammad', 'yogyakarta', '2024-06-15', 'Laki-Laki', 'jogja', '083456278324', 'ozan@gmail.com', '2024-06-15', 'user_345.png'),
(9, 'AG008', 'bachtiar ', '202cb962ac59075b964b07152d234b70', 'Anggota', 'bachtiar ', 'Magelang', '2024-06-02', 'Laki-Laki', 'magelang', '086475324675242', 'bachtiar@gmail.com', '2024-06-25', ''),
(12, 'AG010', 'Urifatul', '202cb962ac59075b964b07152d234b70', 'Anggota', 'Urifatul', 'Merauke', '2024-06-05', 'Perempuan', 'Kaliangkrik', '085227244317', 'rifahlaili04@gmail.com', '2024-06-25', ''),
(13, 'AG0013', 'jok', '202cb962ac59075b964b07152d234b70', 'Anggota', 'joko', 'Magelang', '2024-06-05', 'Laki-Laki', 'jogja', '0813828614685127', 'jok@gmail.com', '2024-06-25', 'user_1.png'),
(16, 'AG011', 'rika', '202cb962ac59075b964b07152d234b70', 'Petugas', 'rika', 'yogyakarta', '2024-06-12', 'Perempuan', 'jogja', '0973489264716', 'rika@gmail.com', '2024-06-25', ''),
(19, 'AG013', 'paijo', '202cb962ac59075b964b07152d234b70', 'Petugas', 'paijo', 'jogja', '2024-07-02', 'Laki-Laki', 'jogja', '0831097821', 'paijo@gmail.com', '2024-07-02', ''),
(20, 'AG0020', 'as', '202cb962ac59075b964b07152d234b70', 'Anggota', 'asn', 'Magelang', '2024-07-02', 'Laki-Laki', 'ds', '01827631523', 'as@gmail.com', '2024-07-02', 'user_1.png'),
(21, 'AG014', 'rifa', '202cb962ac59075b964b07152d234b70', 'Petugas', 'Urifatul', 'Merauke', '2024-07-01', 'Perempuan', 'Kaliangkrik', '085227244317', 'urifatulhidayah71@gmail.com', '2024-07-02', 'user_1719929906.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `buku_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tgl_balik` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`id_pinjam`, `pinjam_id`, `anggota_id`, `buku_id`, `status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali`) VALUES
(20, 'PJ0020', 'AG006', 'BK0010', 'Di Kembalikan', '2024-06-25', 8, '2024-07-03', '2024-06-25'),
(21, 'PJ0021', 'AG006', 'BK009', 'Di Kembalikan', '2024-06-25', 8, '2024-07-03', '2024-06-25'),
(24, 'PJ0022', 'AG0013', 'BK0010', 'Di Kembalikan', '2024-06-29', 2, '2024-07-01', '2024-06-29'),
(25, 'PJ0025', 'AG006', 'BK009', 'Di Kembalikan', '2024-06-29', 5, '2024-07-04', '2024-07-02'),
(26, 'PJ0026', 'AG006', 'BK009', 'Di Kembalikan', '2024-07-02', 10, '2024-07-12', '2024-07-02'),
(27, 'PJ0027', 'AG006', 'BK0011', 'Di Kembalikan', '2024-07-03', 2, '2024-07-05', '2024-07-04'),
(28, 'PJ0028', 'AG006', 'BK009', 'Dipinjam', '2024-07-04', 3, '2024-07-07', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `nama_rak`) VALUES
(1, 'Rak Buku 1'),
(2, 'Rak Buku 2'),
(3, 'Rak Buku 3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  ADD PRIMARY KEY (`id_biaya_denda`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  MODIFY `id_biaya_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
