-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2017 at 06:33 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_sma_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` enum('admin','kepsek') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_anggota`
--

CREATE TABLE `t_anggota` (
  `id_anggota` int(11) NOT NULL,
  `no_anggota` varchar(10) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan` varchar(12) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_buku`
--

CREATE TABLE `t_buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `stok` int(11) NOT NULL,
  `eksemplar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_ebook`
--

CREATE TABLE `t_ebook` (
  `id_ebook` int(11) NOT NULL,
  `nama_ebook` varchar(255) NOT NULL,
  `tempat_ebook` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_kategori`
--

CREATE TABLE `t_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `deskripsi_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_konstanta`
--

CREATE TABLE `t_konstanta` (
  `id_konstanta` int(11) NOT NULL,
  `denda_per_hari` int(11) NOT NULL,
  `max_lama_pinjam` int(11) NOT NULL,
  `max_buku_pinjam` int(11) NOT NULL,
  `tanggal_simpan` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_peminjaman`
--

CREATE TABLE `t_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) DEFAULT '0',
  `id_anggota` int(11) DEFAULT '0',
  `tanggal_pinjam` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_pengembalian`
--

CREATE TABLE `t_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) DEFAULT '0',
  `tanggal_pengembalian` date DEFAULT NULL,
  `denda` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_rak`
--

CREATE TABLE `t_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(20) NOT NULL,
  `deskripsi_rak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_buku`
--
CREATE TABLE `v_buku` (
`id_buku` int(11)
,`judul_buku` varchar(50)
,`id_kategori` int(11)
,`nama_kategori` varchar(50)
,`deskripsi_kategori` text
,`id_rak` int(11)
,`nama_rak` varchar(20)
,`deskripsi_rak` text
,`tahun` year(4)
,`stok` int(11)
,`eksemplar` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_peminjaman_belum_dikembalikan`
--
CREATE TABLE `v_peminjaman_belum_dikembalikan` (
`id_peminjaman` int(11)
,`id_buku` int(11)
,`judul_buku` varchar(50)
,`id_kategori` int(11)
,`nama_kategori` varchar(50)
,`deskripsi_kategori` text
,`id_rak` int(11)
,`nama_rak` varchar(20)
,`deskripsi_rak` text
,`tahun` year(4)
,`stok` int(11)
,`eksemplar` int(11)
,`id_anggota` int(11)
,`no_anggota` varchar(10)
,`nama` varchar(50)
,`kelas` varchar(5)
,`jurusan` varchar(12)
,`jenis_kelamin` enum('Laki-laki','Perempuan')
,`tanggal_pinjam` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_peminjaman_semua`
--
CREATE TABLE `v_peminjaman_semua` (
`id_peminjaman` int(11)
,`id_buku` int(11)
,`judul_buku` varchar(50)
,`id_kategori` int(11)
,`nama_kategori` varchar(50)
,`deskripsi_kategori` text
,`id_rak` int(11)
,`nama_rak` varchar(20)
,`deskripsi_rak` text
,`tahun` year(4)
,`stok` int(11)
,`eksemplar` int(11)
,`id_anggota` int(11)
,`no_anggota` varchar(10)
,`nama` varchar(50)
,`kelas` varchar(5)
,`jurusan` varchar(12)
,`jenis_kelamin` enum('Laki-laki','Perempuan')
,`tanggal_pinjam` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_peminjaman_sudah_dikembalikan`
--
CREATE TABLE `v_peminjaman_sudah_dikembalikan` (
`id_peminjaman` int(11)
,`id_buku` int(11)
,`judul_buku` varchar(50)
,`id_kategori` int(11)
,`nama_kategori` varchar(50)
,`deskripsi_kategori` text
,`id_rak` int(11)
,`nama_rak` varchar(20)
,`deskripsi_rak` text
,`tahun` year(4)
,`stok` int(11)
,`eksemplar` int(11)
,`id_anggota` int(11)
,`no_anggota` varchar(10)
,`nama` varchar(50)
,`kelas` varchar(5)
,`jurusan` varchar(12)
,`jenis_kelamin` enum('Laki-laki','Perempuan')
,`tanggal_pinjam` date
,`id_pengembalian` int(11)
,`tanggal_pengembalian` date
,`denda` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi`
--
CREATE TABLE `v_transaksi` (
`id_peminjaman` int(11)
,`id_buku` int(11)
,`judul_buku` varchar(50)
,`id_kategori` int(11)
,`nama_kategori` varchar(50)
,`deskripsi_kategori` text
,`id_rak` int(11)
,`nama_rak` varchar(20)
,`deskripsi_rak` text
,`tahun` year(4)
,`stok` int(11)
,`eksemplar` int(11)
,`id_anggota` int(11)
,`no_anggota` varchar(10)
,`nama` varchar(50)
,`kelas` varchar(5)
,`jurusan` varchar(12)
,`jenis_kelamin` enum('Laki-laki','Perempuan')
,`tanggal_pinjam` date
,`id_pengembalian` int(11)
,`tanggal_pengembalian` date
,`denda` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v_buku`
--
DROP TABLE IF EXISTS `v_buku`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_buku`  AS  select `t_buku`.`id_buku` AS `id_buku`,`t_buku`.`judul_buku` AS `judul_buku`,`t_buku`.`id_kategori` AS `id_kategori`,`t_kategori`.`nama_kategori` AS `nama_kategori`,`t_kategori`.`deskripsi_kategori` AS `deskripsi_kategori`,`t_buku`.`id_rak` AS `id_rak`,`t_rak`.`nama_rak` AS `nama_rak`,`t_rak`.`deskripsi_rak` AS `deskripsi_rak`,`t_buku`.`tahun` AS `tahun`,`t_buku`.`stok` AS `stok`,`t_buku`.`eksemplar` AS `eksemplar` from ((`t_buku` join `t_kategori` on((`t_buku`.`id_kategori` = `t_kategori`.`id_kategori`))) join `t_rak` on((`t_buku`.`id_rak` = `t_rak`.`id_rak`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_peminjaman_belum_dikembalikan`
--
DROP TABLE IF EXISTS `v_peminjaman_belum_dikembalikan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_peminjaman_belum_dikembalikan`  AS  select `t_peminjaman`.`id_peminjaman` AS `id_peminjaman`,`t_peminjaman`.`id_buku` AS `id_buku`,`t_buku`.`judul_buku` AS `judul_buku`,`t_buku`.`id_kategori` AS `id_kategori`,`t_kategori`.`nama_kategori` AS `nama_kategori`,`t_kategori`.`deskripsi_kategori` AS `deskripsi_kategori`,`t_buku`.`id_rak` AS `id_rak`,`t_rak`.`nama_rak` AS `nama_rak`,`t_rak`.`deskripsi_rak` AS `deskripsi_rak`,`t_buku`.`tahun` AS `tahun`,`t_buku`.`stok` AS `stok`,`t_buku`.`eksemplar` AS `eksemplar`,`t_peminjaman`.`id_anggota` AS `id_anggota`,`t_anggota`.`no_anggota` AS `no_anggota`,`t_anggota`.`nama` AS `nama`,`t_anggota`.`kelas` AS `kelas`,`t_anggota`.`jurusan` AS `jurusan`,`t_anggota`.`jenis_kelamin` AS `jenis_kelamin`,`t_peminjaman`.`tanggal_pinjam` AS `tanggal_pinjam` from ((((`t_peminjaman` join `t_buku` on((`t_peminjaman`.`id_buku` = `t_buku`.`id_buku`))) join `t_kategori` on((`t_buku`.`id_kategori` = `t_kategori`.`id_kategori`))) join `t_rak` on((`t_buku`.`id_rak` = `t_rak`.`id_rak`))) join `t_anggota` on((`t_peminjaman`.`id_anggota` = `t_anggota`.`id_anggota`))) where (not(`t_peminjaman`.`id_peminjaman` in (select `t_pengembalian`.`id_peminjaman` from `t_pengembalian`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_peminjaman_semua`
--
DROP TABLE IF EXISTS `v_peminjaman_semua`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_peminjaman_semua`  AS  select `t_peminjaman`.`id_peminjaman` AS `id_peminjaman`,`t_peminjaman`.`id_buku` AS `id_buku`,`t_buku`.`judul_buku` AS `judul_buku`,`t_buku`.`id_kategori` AS `id_kategori`,`t_kategori`.`nama_kategori` AS `nama_kategori`,`t_kategori`.`deskripsi_kategori` AS `deskripsi_kategori`,`t_buku`.`id_rak` AS `id_rak`,`t_rak`.`nama_rak` AS `nama_rak`,`t_rak`.`deskripsi_rak` AS `deskripsi_rak`,`t_buku`.`tahun` AS `tahun`,`t_buku`.`stok` AS `stok`,`t_buku`.`eksemplar` AS `eksemplar`,`t_peminjaman`.`id_anggota` AS `id_anggota`,`t_anggota`.`no_anggota` AS `no_anggota`,`t_anggota`.`nama` AS `nama`,`t_anggota`.`kelas` AS `kelas`,`t_anggota`.`jurusan` AS `jurusan`,`t_anggota`.`jenis_kelamin` AS `jenis_kelamin`,`t_peminjaman`.`tanggal_pinjam` AS `tanggal_pinjam` from ((((`t_peminjaman` join `t_buku` on((`t_peminjaman`.`id_buku` = `t_buku`.`id_buku`))) join `t_kategori` on((`t_buku`.`id_kategori` = `t_kategori`.`id_kategori`))) join `t_rak` on((`t_buku`.`id_rak` = `t_rak`.`id_rak`))) join `t_anggota` on((`t_peminjaman`.`id_anggota` = `t_anggota`.`id_anggota`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_peminjaman_sudah_dikembalikan`
--
DROP TABLE IF EXISTS `v_peminjaman_sudah_dikembalikan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_peminjaman_sudah_dikembalikan`  AS  select `t_peminjaman`.`id_peminjaman` AS `id_peminjaman`,`t_peminjaman`.`id_buku` AS `id_buku`,`t_buku`.`judul_buku` AS `judul_buku`,`t_buku`.`id_kategori` AS `id_kategori`,`t_kategori`.`nama_kategori` AS `nama_kategori`,`t_kategori`.`deskripsi_kategori` AS `deskripsi_kategori`,`t_buku`.`id_rak` AS `id_rak`,`t_rak`.`nama_rak` AS `nama_rak`,`t_rak`.`deskripsi_rak` AS `deskripsi_rak`,`t_buku`.`tahun` AS `tahun`,`t_buku`.`stok` AS `stok`,`t_buku`.`eksemplar` AS `eksemplar`,`t_peminjaman`.`id_anggota` AS `id_anggota`,`t_anggota`.`no_anggota` AS `no_anggota`,`t_anggota`.`nama` AS `nama`,`t_anggota`.`kelas` AS `kelas`,`t_anggota`.`jurusan` AS `jurusan`,`t_anggota`.`jenis_kelamin` AS `jenis_kelamin`,`t_peminjaman`.`tanggal_pinjam` AS `tanggal_pinjam`,`t_pengembalian`.`id_pengembalian` AS `id_pengembalian`,`t_pengembalian`.`tanggal_pengembalian` AS `tanggal_pengembalian`,`t_pengembalian`.`denda` AS `denda` from (((((`t_peminjaman` join `t_buku` on((`t_peminjaman`.`id_buku` = `t_buku`.`id_buku`))) join `t_kategori` on((`t_buku`.`id_kategori` = `t_kategori`.`id_kategori`))) join `t_rak` on((`t_buku`.`id_rak` = `t_rak`.`id_rak`))) join `t_anggota` on((`t_peminjaman`.`id_anggota` = `t_anggota`.`id_anggota`))) join `t_pengembalian` on((`t_pengembalian`.`id_peminjaman` = `t_peminjaman`.`id_peminjaman`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi`
--
DROP TABLE IF EXISTS `v_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi`  AS  select `t_peminjaman`.`id_peminjaman` AS `id_peminjaman`,`t_peminjaman`.`id_buku` AS `id_buku`,`t_buku`.`judul_buku` AS `judul_buku`,`t_buku`.`id_kategori` AS `id_kategori`,`t_kategori`.`nama_kategori` AS `nama_kategori`,`t_kategori`.`deskripsi_kategori` AS `deskripsi_kategori`,`t_buku`.`id_rak` AS `id_rak`,`t_rak`.`nama_rak` AS `nama_rak`,`t_rak`.`deskripsi_rak` AS `deskripsi_rak`,`t_buku`.`tahun` AS `tahun`,`t_buku`.`stok` AS `stok`,`t_buku`.`eksemplar` AS `eksemplar`,`t_peminjaman`.`id_anggota` AS `id_anggota`,`t_anggota`.`no_anggota` AS `no_anggota`,`t_anggota`.`nama` AS `nama`,`t_anggota`.`kelas` AS `kelas`,`t_anggota`.`jurusan` AS `jurusan`,`t_anggota`.`jenis_kelamin` AS `jenis_kelamin`,`t_peminjaman`.`tanggal_pinjam` AS `tanggal_pinjam`,`t_pengembalian`.`id_pengembalian` AS `id_pengembalian`,`t_pengembalian`.`tanggal_pengembalian` AS `tanggal_pengembalian`,`t_pengembalian`.`denda` AS `denda` from (((((`t_peminjaman` join `t_buku` on((`t_peminjaman`.`id_buku` = `t_buku`.`id_buku`))) join `t_kategori` on((`t_buku`.`id_kategori` = `t_kategori`.`id_kategori`))) join `t_rak` on((`t_buku`.`id_rak` = `t_rak`.`id_rak`))) join `t_anggota` on((`t_peminjaman`.`id_anggota` = `t_anggota`.`id_anggota`))) left join `t_pengembalian` on((`t_pengembalian`.`id_peminjaman` = `t_peminjaman`.`id_peminjaman`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `t_anggota`
--
ALTER TABLE `t_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `FK_t_buku_t_kategori` (`id_kategori`),
  ADD KEY `FK_t_buku_t_rak` (`id_rak`);

--
-- Indexes for table `t_ebook`
--
ALTER TABLE `t_ebook`
  ADD PRIMARY KEY (`id_ebook`);

--
-- Indexes for table `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `t_konstanta`
--
ALTER TABLE `t_konstanta`
  ADD PRIMARY KEY (`id_konstanta`);

--
-- Indexes for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `FK_t_peminjaman_t_buku` (`id_buku`),
  ADD KEY `FK_t_peminjaman_t_anggota` (`id_anggota`);

--
-- Indexes for table `t_pengembalian`
--
ALTER TABLE `t_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `FK_t_pengembalian_t_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `t_rak`
--
ALTER TABLE `t_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_anggota`
--
ALTER TABLE `t_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_buku`
--
ALTER TABLE `t_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_ebook`
--
ALTER TABLE `t_ebook`
  MODIFY `id_ebook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_konstanta`
--
ALTER TABLE `t_konstanta`
  MODIFY `id_konstanta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `t_pengembalian`
--
ALTER TABLE `t_pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_rak`
--
ALTER TABLE `t_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD CONSTRAINT `FK_t_buku_t_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `t_kategori` (`id_kategori`),
  ADD CONSTRAINT `FK_t_buku_t_rak` FOREIGN KEY (`id_rak`) REFERENCES `t_rak` (`id_rak`);

--
-- Constraints for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD CONSTRAINT `FK_t_peminjaman_t_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `t_anggota` (`id_anggota`),
  ADD CONSTRAINT `FK_t_peminjaman_t_buku` FOREIGN KEY (`id_buku`) REFERENCES `t_buku` (`id_buku`);

--
-- Constraints for table `t_pengembalian`
--
ALTER TABLE `t_pengembalian`
  ADD CONSTRAINT `FK_t_pengembalian_t_peminjaman` FOREIGN KEY (`id_peminjaman`) REFERENCES `t_peminjaman` (`id_peminjaman`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
