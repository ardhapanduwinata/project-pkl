-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2019 at 10:11 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `divisi` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_magang`
--

CREATE TABLE `form_magang` (
  `id_form` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `nim_mhs2` varchar(120) DEFAULT NULL,
  `nim_mhs3` varchar(120) DEFAULT NULL,
  `nim_mhs4` varchar(120) DEFAULT NULL,
  `nim_mhs5` varchar(120) DEFAULT NULL,
  `nama_mhs2` varchar(120) DEFAULT NULL,
  `nama_mhs3` varchar(120) DEFAULT NULL,
  `nama_mhs4` varchar(120) DEFAULT NULL,
  `nama_mhs5` varchar(120) DEFAULT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `no_surat` varchar(120) NOT NULL,
  `tgl_mohon_surat` date NOT NULL,
  `file` varchar(120) NOT NULL,
  `judul` mediumtext NOT NULL,
  `jenis` enum('Magang','Penelitian/Wawancara') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kamus`
--

CREATE TABLE `kamus` (
  `id_kamus` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(120) NOT NULL,
  `nama_mhs` varchar(120) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `univ` varchar(120) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas`
--

CREATE TABLE `nota_dinas` (
  `id_nota` int(11) NOT NULL,
  `no_nota` varchar(120) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `id_form` int(11) NOT NULL,
  `perihal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_konfirm`
--

CREATE TABLE `surat_konfirm` (
  `id_srtkonfirm` int(11) NOT NULL,
  `no_konfirm` varchar(120) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `id_form` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `status` enum('Diproses','Diterima','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `nama_user` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `foto` varchar(120) NOT NULL,
  `aktif` enum('Belum','Sudah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `role`, `nama_user`, `username`, `password`, `foto`, `aktif`) VALUES
(1, 0, 'admin polinema', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'default.png', 'Sudah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `form_magang`
--
ALTER TABLE `form_magang`
  ADD PRIMARY KEY (`id_form`),
  ADD KEY `id_mhs` (`id_mhs`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kamus`
--
ALTER TABLE `kamus`
  ADD PRIMARY KEY (`id_kamus`),
  ADD KEY `id_divisi` (`id_divisi`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `user_fk` (`id_user`);

--
-- Indexes for table `nota_dinas`
--
ALTER TABLE `nota_dinas`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_form` (`id_form`);

--
-- Indexes for table `surat_konfirm`
--
ALTER TABLE `surat_konfirm`
  ADD PRIMARY KEY (`id_srtkonfirm`),
  ADD KEY `id_form` (`id_form`),
  ADD KEY `id_mhs` (`id_mhs`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form_magang`
--
ALTER TABLE `form_magang`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kamus`
--
ALTER TABLE `kamus`
  MODIFY `id_kamus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nota_dinas`
--
ALTER TABLE `nota_dinas`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_konfirm`
--
ALTER TABLE `surat_konfirm`
  MODIFY `id_srtkonfirm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_magang`
--
ALTER TABLE `form_magang`
  ADD CONSTRAINT `form_magang_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `mhs` (`id_mhs`);

--
-- Constraints for table `kamus`
--
ALTER TABLE `kamus`
  ADD CONSTRAINT `kamus_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`),
  ADD CONSTRAINT `kamus_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `mhs`
--
ALTER TABLE `mhs`
  ADD CONSTRAINT `mhs_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `nota_dinas`
--
ALTER TABLE `nota_dinas`
  ADD CONSTRAINT `nota_dinas_ibfk_1` FOREIGN KEY (`id_form`) REFERENCES `form_magang` (`id_form`);

--
-- Constraints for table `surat_konfirm`
--
ALTER TABLE `surat_konfirm`
  ADD CONSTRAINT `surat_konfirm_ibfk_1` FOREIGN KEY (`id_form`) REFERENCES `form_magang` (`id_form`),
  ADD CONSTRAINT `surat_konfirm_ibfk_2` FOREIGN KEY (`id_mhs`) REFERENCES `mhs` (`id_mhs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
