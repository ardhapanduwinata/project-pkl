-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 10:07 AM
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

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `divisi`) VALUES
(1, 'TLN');

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
  `perihal` varchar(120) NOT NULL,
  `jenis` enum('Magang','Wawancara/Penelitian','PKL') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_magang`
--

INSERT INTO `form_magang` (`id_form`, `id_mhs`, `nim_mhs2`, `nim_mhs3`, `nim_mhs4`, `nim_mhs5`, `nama_mhs2`, `nama_mhs3`, `nama_mhs4`, `nama_mhs5`, `tgl_mulai`, `tgl_selesai`, `no_surat`, `tgl_mohon_surat`, `file`, `perihal`, `jenis`) VALUES
(1, 1, '15416299201', NULL, NULL, NULL, 'Lala Land', NULL, NULL, NULL, '2019-01-11', '2019-02-11', '12122/1212/12TKB', '2019-01-10', 'my-account-login-icon1.png', 'Yuhuu', 'Magang'),
(2, 1, '15416299201', '15416299212', '1641720020', '1641720010', 'Lala Land', 'Yahaaa', 'Vindes', 'Siska', '2019-01-15', '2019-01-23', '122/1212/12TKB', '2018-12-31', 'yuhu1.png', 'yhhh', 'PKL'),
(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-17', '2019-02-18', '01322/1212/12TKB', '2019-01-23', 'SQLiteDatabase1.zip', 'ssasa', 'Magang'),
(4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-10', '2019-01-10', '122/1212/12TKB', '2019-01-16', 'ci_chart.zip', 'xaxa', 'Magang'),
(5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-09', '2019-01-24', '122/1212/12TKB', '2019-01-08', 'ci_chart1.zip', 'yhhh', 'Magang'),
(6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-09', '2019-01-24', '122/1212/12TKB', '2019-01-08', 'ci_chart2.zip', 'yhhh', 'Magang'),
(7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-11', '2019-01-24', '122/1212/12TKB', '2019-01-22', 'ci_chart3.zip', 'iji', 'PKL'),
(8, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-10', '2019-01-18', '12122/1212/12TKB', '2019-01-23', 'jQuery-File-Upload-9_28_0.zip', 'ssasa', 'PKL'),
(9, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-10', '2019-01-18', '12122/1212/12TKB', '2019-01-23', 'jQuery-File-Upload-9_28_01.zip', 'ssasa', 'PKL'),
(10, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-11', '2019-01-25', '01322/1212/12TKB', '2019-01-17', 'jQuery-File-Upload-9_28_02.zip', 'xaxa', 'Magang'),
(12, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-03', '2019-01-24', '122/1212/12TKB', '2019-01-16', 'ci_chart.zip', 'uiy9we', 'Magang');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Teknik Informatika'),
(2, 'Teknik Elektro');

-- --------------------------------------------------------

--
-- Table structure for table `kamus`
--

CREATE TABLE `kamus` (
  `id_kamus` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamus`
--

INSERT INTO `kamus` (`id_kamus`, `id_jurusan`, `id_divisi`) VALUES
(1, 1, 1);

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
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id_mhs`, `nim`, `nama_mhs`, `id_jurusan`, `univ`, `alamat`, `email`, `id_user`) VALUES
(1, '1641720029', 'Millenia Rusbandi', 1, 'Politeknik Negeri Malang', 'Jl. Bumiku No.10', 'rmillenia96@gmail.com', 2),
(5, '2346776543', 'Arwi', 1, 'Politeknik Negeri Malang', 'Malang', 'rmillenia96@gmail.com', 6),
(6, '1234567890', 'ardhanarisvari', 1, 'Politeknik Negeri Malang', 'Malang', 'rmillenia96@gmail.com', 7),
(7, '1726622635', 'siapasiapa', 1, 'Politeknik Negeri Malang', 'Politeknik Negeri Malang', 'rmillenia96@gmail.com', 8),
(9, '1624162', 'Malak', 1, 'Politeknik Negeri Malang', 'Malang', 'rmillenia96@gmail.com', 11),
(11, '5768686873', 'lala', 1, 'Politeknik Negeri Malang', 'Malang', 'rmillenia96@gmail.com', 13);

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
  `no_surat` varchar(120) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `id_form` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `status` enum('Diproses','Diterima','Ditolak') NOT NULL,
  `perihal` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_konfirm`
--

INSERT INTO `surat_konfirm` (`id_srtkonfirm`, `no_surat`, `tgl_keluar`, `id_form`, `id_mhs`, `status`, `perihal`) VALUES
(1, NULL, NULL, 10, 1, 'Diproses', NULL),
(3, NULL, NULL, 12, 1, 'Diproses', NULL);

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
(1, 0, 'admin polinema', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'default.png', 'Sudah'),
(2, 1, 'Millenia Rusbandi', 'rmillenia', '030764a56bfc24ba9bfe02b95eb5a6fd', 'yuhu.png', 'Sudah'),
(6, 1, 'Arwi', 'arwi', '0a41f6b4b90e30c0806615e7e1667acc', 'default.png', 'Sudah'),
(7, 1, 'ardhanarisvari', 'ardha', '7c95913f67e976f0ccdb1530bebdfa17', 'default.png', 'Sudah'),
(8, 1, 'siapasiapa', 'siapa', '2128e15b849bb3d5b1fa88cc18d494fe', 'default.png', 'Sudah'),
(11, 1, 'Malak', 'malak', '72ea813a17bcff1b9f07b286c5ff7de4', 'default.png', 'Sudah'),
(13, 1, 'lala', 'lala', '2e3817293fc275dbee74bd71ce6eb056', 'default.png', 'Sudah');

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
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_magang`
--
ALTER TABLE `form_magang`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kamus`
--
ALTER TABLE `kamus`
  MODIFY `id_kamus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nota_dinas`
--
ALTER TABLE `nota_dinas`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_konfirm`
--
ALTER TABLE `surat_konfirm`
  MODIFY `id_srtkonfirm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_magang`
--
ALTER TABLE `form_magang`
  ADD CONSTRAINT `form_magang_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `mhs` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `mhs_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mhs_iufk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas`
--
ALTER TABLE `nota_dinas`
  ADD CONSTRAINT `nota_dinas_ibfk_1` FOREIGN KEY (`id_form`) REFERENCES `form_magang` (`id_form`);

--
-- Constraints for table `surat_konfirm`
--
ALTER TABLE `surat_konfirm`
  ADD CONSTRAINT `surat_konfirm_ibfk_1` FOREIGN KEY (`id_form`) REFERENCES `form_magang` (`id_form`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_konfirm_ibfk_2` FOREIGN KEY (`id_mhs`) REFERENCES `mhs` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
