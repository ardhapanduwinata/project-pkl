-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 08:12 AM
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
(1, 'Talenta'),
(2, 'Pengembangan Karir'),
(3, 'Water Treatment'),
(4, 'Pengolahan Data Kantor'),
(5, 'Pengolahan Data Pegawai'),
(6, 'Teknisi'),
(7, 'Pengembangan Bakat Pegawai'),
(8, 'Pengembangan Informasi'),
(9, 'Kepala Cabang'),
(10, 'Scanning :v'),
(11, 'Pengelolaan Data Pegawai');

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
  `jenis` enum('Magang','Penelitian/Wawancara') NOT NULL,
  `tgl_pengajuan_form` date NOT NULL,
  `id_kamus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_magang`
--

INSERT INTO `form_magang` (`id_form`, `id_mhs`, `nim_mhs2`, `nim_mhs3`, `nim_mhs4`, `nim_mhs5`, `nama_mhs2`, `nama_mhs3`, `nama_mhs4`, `nama_mhs5`, `tgl_mulai`, `tgl_selesai`, `no_surat`, `tgl_mohon_surat`, `file`, `judul`, `jenis`, `tgl_pengajuan_form`, `id_kamus`) VALUES
(4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-08', '2019-02-13', '122/1212/12TKB', '2019-01-10', 'autocomplete_ci-master1.zip', 'Perbandingab EOS Canonsss', 'Magang', '2019-01-28', 4);

-- --------------------------------------------------------

--
-- Table structure for table `header_home`
--

CREATE TABLE `header_home` (
  `id_header` int(11) NOT NULL,
  `header` varchar(1000) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_home`
--

INSERT INTO `header_home` (`id_header`, `header`, `deskripsi`) VALUES
(1, NULL, NULL),
(2, 'ini adalah judul PKL saya', 'Halo semua. Ucapkan selamat datang padaku dalam mimpi burukmu, aku akan mnemanimu berpetualang melewati dunia yang tidak pernah kau lalui sebelumnya di dunia nyata. Mungkin akan ada banyak hal yang tidak kau percaya, tetapi ada satu hal yang bisa kau percaya dengan sepenuh hatimu. Yaitu aku.');

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
(1, 'Teknik Kimia'),
(2, 'Management Bisnis'),
(3, 'Teknik Elektronika'),
(4, 'Teknik Informatika'),
(5, 'Teknik Listrik'),
(6, 'Akutansi'),
(7, 'Teknik Sipil'),
(8, 'Management Informatika'),
(9, 'Sistem Informasi'),
(10, 'Teknik Mesin'),
(11, 'Teknik Kimia Industri');

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
(1, 1, 3),
(2, 2, 2),
(3, 3, 6),
(4, 4, 10),
(5, 5, 9),
(6, 6, 11),
(7, 7, 8),
(8, 10, 11),
(9, 11, 3),
(11, 8, 10),
(12, 9, 11),
(13, 1, 10),
(14, 3, 10),
(15, 4, 3),
(16, 4, 5),
(17, 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `alamat` varchar(1000) DEFAULT NULL,
  `notelp` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `alamat`, `notelp`, `email`) VALUES
(1, 'Jalan Trunojoyo Blok M-I No.135, RT.6/RW.2, Melawai, Kby. Baru, Kota Jakarta Selatan.', '085755123456', 'pln123@pln.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id_konten` int(11) NOT NULL,
  `judul_konten` varchar(120) DEFAULT NULL,
  `isi_konten` varchar(1000) DEFAULT NULL,
  `gambar_konten` varchar(120) DEFAULT NULL,
  `nama_konten` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id_konten`, `judul_konten`, `isi_konten`, `gambar_konten`, `nama_konten`) VALUES
(1, 'Step Pertama', 'Step yang pertama adalah kamu harus membuat akun baru melalui halaman register yang telah disediakan oleh website.', '1.jpg', NULL),
(2, 'Step Kedua', 'Pada step ini adalah lorem ipsum dolor sit amet bla daku juga aku gak mau jika satu sakit penyakit itu wabah datang.', '2.jpg', NULL),
(3, 'Step Ketiga', 'JIka memang sayang aku juga jangan pergi dari satu ke yang lain dan juga jika memang sakit aku mau pergi dari hidup dan juga teman jika memang itu yang terbaik.', '3.jpg', NULL),
(10, NULL, NULL, '3.jpg', 'intro'),
(11, NULL, NULL, '4.jpg', 'intro'),
(12, NULL, NULL, '21.jpg', 'intro'),
(13, NULL, NULL, '1(1).jpg', 'intro'),
(18, NULL, NULL, '05e7f25eecd47222304727990d64e4ba.jpg', 'intro');

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

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id_mhs`, `nim`, `nama_mhs`, `id_jurusan`, `univ`, `alamat`, `email`, `id_user`) VALUES
(3, '1641720029', 'Millenia Rusbandi', 4, 'Politeknik Negeri Malang', 'Malang', 'rmillenia96@gmail.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas`
--

CREATE TABLE `nota_dinas` (
  `id_nota` int(11) NOT NULL,
  `no_nota` varchar(120) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `id_form` int(11) NOT NULL,
  `file_nd` varchar(120) DEFAULT NULL,
  `perihal` varchar(120) DEFAULT NULL,
  `download_nd` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas`
--

INSERT INTO `nota_dinas` (`id_nota`, `no_nota`, `tgl_keluar`, `id_form`, `file_nd`, `perihal`, `download_nd`) VALUES
(2, '12121212', '2019-01-28', 4, '11.docx', 'Permohonan Bantuan Memfasilitasi Pelaksanaan Magang/Wawancara/Penelitian Mahasiswa', '1');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id_notif` int(11) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `penerima` int(11) NOT NULL,
  `pesan` varchar(1000) NOT NULL,
  `status_notif` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id_notif`, `url`, `penerima`, `pesan`, `status_notif`) VALUES
(9, 'admin/manageData/permohonan/', 1, 'Millenia Rusbandi Mengajukan Form Penelitian/Wawancara', '1'),
(10, 'admin/manageData/permohonan/', 7, 'Millenia Rusbandi Mengajukan Form Penelitian/Wawancara', '1'),
(11, 'admin/manageData/permohonan/', 6, 'Millenia Rusbandi Mengajukan Form Penelitian/Wawancara', '1'),
(12, 'admin/manageData/permohonan/', 8, 'Millenia Rusbandi Mengajukan Form Penelitian/Wawancara', '0'),
(13, 'admin/manageData/permohonan/', 6, 'Millenia Rusbandi Mengajukan Form Penelitian/Wawancara', '0'),
(14, 'user/magangUser/konfirmasi/', 4, 'Form Magang Anda Telah Dikonfirmasi', '0');

-- --------------------------------------------------------

--
-- Table structure for table `surat_konfirm`
--

CREATE TABLE `surat_konfirm` (
  `id_srtkonfirm` int(11) NOT NULL,
  `no_konfirm` varchar(120) DEFAULT NULL,
  `tgl_keluar_sk` date NOT NULL,
  `id_form` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `status` enum('Diproses','Diterima','Ditolak') NOT NULL,
  `download_sk` enum('0','1') NOT NULL,
  `perihal_sk` varchar(120) DEFAULT NULL,
  `file_sk` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_konfirm`
--

INSERT INTO `surat_konfirm` (`id_srtkonfirm`, `no_konfirm`, `tgl_keluar_sk`, `id_form`, `id_mhs`, `status`, `download_sk`, `perihal_sk`, `file_sk`) VALUES
(2, 'e23232', '2019-01-16', 4, 3, 'Diterima', '1', 'Konfirmasi Permohonan Pelaksanaan Magang/Wawancara/Penelitian Mahasiswa', '111.docx');

-- --------------------------------------------------------

--
-- Table structure for table `univ`
--

CREATE TABLE `univ` (
  `id` int(11) NOT NULL,
  `nama_univ` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `univ`
--

INSERT INTO `univ` (`id`, `nama_univ`) VALUES
(0, 'Politeknik Negeri Malang, Malang'),
(1, 'Universitas Syiah Kuala, Banda Aceh\r\n'),
(2, 'Universitas Malikussaleh, Lhokseumawe\r\n'),
(3, 'Politeknik Negeri Lhokseumawe, Lhokseumawe\r\n'),
(4, 'Politeknik Negeri Aceh, Banda Aceh\r\n'),
(5, 'Universitas Samudra, Langsa\r\n'),
(6, 'Universitas Teuku Umar, Meulaboh\r\n'),
(7, 'Politeknik Aceh, Banda Aceh\r\n'),
(8, 'UIN Ar-Raniry, Banda Aceh\r\n'),
(9, 'STAIN Malikussaleh, Lhokseumawe\r\n'),
(10, 'STAIN Zawiyah Cot Kala, Langsa\r\n'),
(11, 'Akademi Komunitas Negeri (AKN) Aceh Barat Daya\r\n'),
(12, 'STAIN Gajah Putih Takengon\r\n'),
(13, 'IAIN Langsa, Langsa\r\n'),
(14, 'STAIN Malikussaleh, Lhokseumawe\r\n'),
(15, 'STAIN Gajah Putih Takengon, Takengon\r\n'),
(16, 'STAIN Teungku Dirundeng, Melabuh\r\n'),
(17, 'Politeknik Kesehatan Banda Aceh\r\n'),
(18, 'Universitas Serambi Mekkah\r\n'),
(19, 'Universitas Sumatera Utara, Medan\r\n'),
(20, 'Universitas Negeri Medan, Medan\r\n'),
(21, 'Politeknik Negeri Medan, Medan\r\n'),
(22, 'Politeknik Negeri Media Kreatif, Medan\r\n'),
(23, 'Institut Agama Islam Negeri Sumatera utara, Medan\r\n'),
(24, 'Poltekes Depkes Medan, Medan\r\n'),
(25, 'STAIN Padang Sidempuan, Padang Sidempuan\r\n'),
(26, 'UIN Sumatera Utara, Medan\r\n'),
(27, 'IAIN Padang Sidempuan, Tapanuli Selatan\r\n'),
(28, 'Akademi Teknik Keselamatan Penerbangan (ATKP) Medan\r\n'),
(29, 'Sekolah Tinggi Agama Kristen Protestan Negeri Tarutung\r\n'),
(30, 'Sekolah Tinggi Penyuluhan Pertanian (STTP) Medan\r\n'),
(31, 'Politeknik Negeri Medan\r\n'),
(32, 'kademi Tek. Kes. Penerbangan (ATKP), Medan\r\n'),
(33, 'Sekolah Tinggi Penyuluhan Pertanian Medan \r\n'),
(34, 'Universitas Andalas, Padang\r\n'),
(35, 'Universitas Negeri Padang, Padang\r\n'),
(36, 'Politeknik Negeri Padang, Padang\r\n'),
(37, 'Politeknik Pertanian, Payakumbuh\r\n'),
(38, 'STSI (Sekolah Tinggi Seni Indonesia Padang Panjang), Padang Panjang\r\n'),
(39, 'IAIN Imam Bonjol, Padang\r\n'),
(40, 'STAIN Batusangkar\r\n'),
(41, 'STAIN Bukittinggi\r\n'),
(42, 'ISI Padang Panjang\r\n'),
(43, 'IAIN Imam Bonjol, Padang\r\n'),
(44, 'STAIN Sjech M. Djamil Djambek , Bukittinggi\r\n'),
(45, 'Politeknik Negeri Sriwijaya\r\n'),
(46, 'Universitas Riau, Pekanbaru\r\n'),
(47, 'UIN Sultan Syarif Kasim (SUSKA), Pekanbaru\r\n'),
(48, 'Politeknik Negeri Bengkalis\r\n'),
(49, 'Universitas Maritim Raja Ali Haji\r\n'),
(50, 'Politeknik Negeri Batam\r\n'),
(51, 'UIN Sultan Syarif Kasim, Riau\r\n'),
(52, 'STAIN Bengkalis, Riau (Riau)\r\n'),
(53, 'Universitas Jambi, Jambi\r\n'),
(54, 'STAIN Kerinci\r\n'),
(55, 'IAIN Sultan Thaha Saifuddin\r\n'),
(56, 'Politeknik Kesehatan Jambi\r\n'),
(57, 'Universitas Bengkulu, Bengkulu\r\n'),
(58, 'IAIN Bengkulu\r\n'),
(59, 'STAIN CURUP\r\n'),
(60, 'Poltekkes Kemenkes Bengkulu\r\n'),
(61, 'STAIN Curup, Rejang Lebong\r\n'),
(62, 'Universitas Sriwijaya, Palembang\r\n'),
(63, 'Politeknik Negeri Sriwijaya, Palembang\r\n'),
(64, 'Poltekkes depkes Palembang, Palembang\r\n'),
(65, 'Akademi Komunitas Negeri Prabumulih, Prabumulih\r\n'),
(66, 'IAIN Raden Fatah\r\n'),
(67, 'Universitas Lampung, Bandar Lampung\r\n'),
(68, 'Politeknik Negeri Lampung, Bandar Lampung\r\n'),
(69, 'Poltekkes Kemenkes Tanjungkarang, Bandar Lampung\r\n'),
(70, 'STIM (Sekolah Tinggi Olahraga Metro), Kota Metro\r\n'),
(71, 'Institut Agama Islam Negeri Raden Intan, Bandar Lampung\r\n'),
(72, 'STAIN Jurai Siwo Metro\r\n'),
(73, 'IAIN Raden Intan, Bandar Lampung\r\n'),
(74, 'Universitas Bangka Belitung, Bangka Belitung\r\n'),
(75, 'Politeknik Manufaktur, Bangka Belitung\r\n'),
(76, 'Poltekkes Kemenkes Pangkal Pinang, Bangka Belitung\r\n'),
(77, 'STAIN Syekh Abdurrahman Siddik, Bangka Belitung\r\n'),
(78, 'Universitas Sultan Ageng Tirtayasa, Serang\r\n'),
(79, 'Perguruan Tinggi Buddhi, Karawaci\r\n'),
(80, 'IAIN Sultan Maulana Hasanuddin\r\n'),
(81, 'Universitas Pendidikan Indonesia, Kampus Daerah Serang\r\n'),
(82, 'Universitas Terbuka Pondok Cabe\r\n'),
(83, 'Sekolah Tinggi Agama Buddha Negeri Sriwijaya Tangerang\r\n'),
(84, 'Akademi Meteorologi dan Geofisika (AMG) Tangerang\r\n'),
(85, 'Institut Agama Islam Banten (IAIB)\r\n'),
(86, 'Universitas Indonesia\r\n'),
(87, 'Universitas Pertahanan Indonesia (UNHAN)\r\n'),
(88, 'Universitas Negeri Jakarta\r\n'),
(89, 'Universitas Terbuka\r\n'),
(90, 'Politeknik Negeri Jakarta\r\n'),
(91, 'Politeknik Negeri Media Kreatif, Jakarta\r\n'),
(92, 'UIN Syarif Hidayatullah Jakartaâ€Ž\r\n'),
(93, 'Sekolah Tinggi Ilmu Pelayaran Jakarta\r\n'),
(94, 'Sekolah Tinggi Manajemen Industri Indonesia\r\n'),
(95, 'Akademi Pimpinan Perusahaan (APP), Jakarta\r\n'),
(96, 'Institut Ilmu Pemerintahan, IIP, Jakarta\r\n'),
(97, 'Sekolah Tinggi Akuntansi Negara, STAN\r\n'),
(98, 'Sekolah Tinggi Hukum Militer, STHM\r\n'),
(99, 'Sekolah Tinggi Ilmu Administrasi, LAN Jakarta\r\n'),
(100, 'Sekolah Tinggi Ilmu Kepolisian (PTIK), Jakarta\r\n'),
(101, 'Sekolah Tinggi Ilmu Pelayaran (STIP), Jakarta\r\n'),
(102, 'Sekolah Tinggi Ilmu Statistik (STIS), Jakarta\r\n'),
(103, 'Sekolah Tinggi Manajemen Industri(STMI), Jakarta\r\n'),
(104, 'Sekolah Tinggi Penerbangan Indonesia (PI), Jakarta\r\n'),
(105, 'Sekolah Tinggi Perikanan (STP), Jakarta\r\n'),
(106, 'Politeknik Kesehatan Jakarta I   \r\n'),
(107, 'Politeknik Kesehatan Jakarta II\r\n'),
(108, 'Politeknik Negeri Jakarta\r\n'),
(109, 'Politeknik Manufaktur Negeri Bandung, Bandung\r\n'),
(110, 'Universitas Pendidikan Indonesia, Bandung\r\n'),
(111, 'Universitas Padjadjaran, Bandung\r\n'),
(112, 'Universitas Jenderal Achmad Yani, Bandung\r\n'),
(113, 'Institut Pertanian Bogor, Bogor\r\n'),
(114, 'Institut Teknologi Bandung, Bandung\r\n'),
(115, 'Politeknik Negeri Bandung, Bandung\r\n'),
(116, 'Politeknik Indramayu, Indramayu\r\n'),
(117, 'Universitas Siliwangi (UNSIL), Tasikmalaya\r\n'),
(118, 'niversitas Singaperbangsa (UNSIKA), Kampus Daerah Karawang\r\n'),
(119, 'Universitas Swadaya Gunung Jati (Unswagati) di Kota Cirebon\r\n'),
(120, 'Universitas Pendidikan Indonesia, Kampus Daerah Cibiru\r\n'),
(121, 'Universitas Pendidikan Indonesia, Kampus Daerah Tasikmalaya\r\n'),
(122, 'Universitas Pendidikan Indonesia, Kampus Daerah Sumedang\r\n'),
(123, 'Universitas Pendidikan Indonesia, Kampus Daerah Purwakarta\r\n'),
(124, 'Akademi Ilmu Pemasyarakatan (AKIP), Depok\r\n'),
(125, 'Akademi Imigrasi (AIM) Depok\r\n'),
(126, 'Akademi Kimia Analis (AKA) Bogor\r\n'),
(127, 'Sekolah Tinggi Ilmu Administrasi, Bandung\r\n'),
(128, 'Sekolah Tinggi Sandi Negara (STSN), Bogor\r\n'),
(129, 'Sekolah Tinggi Seni Indonesia (STSI), Bandung\r\n'),
(130, 'Sekolah Tinggi Transportasi Darat (STTD), Bekasi\r\n'),
(131, 'Sekolah Tinggi Kesejahteraan Sosial (STKS), Bandung\r\n'),
(132, 'Sekolah Tinggi Pemerintahan Dalam Negeri (STPDN), Sumedang\r\n'),
(133, 'Sekolah Tinggi Penyuluhan Pertanian (STTP) Bogor\r\n'),
(134, 'STAIN Cirebon\r\n'),
(135, 'Politeknik Kesehatan Bandung\r\n'),
(136, 'Politeknik Manufaktur Bandung\r\n'),
(137, 'Politeknik Negeri Bali, Badung\r\n'),
(138, 'Universitas Diponegoro, Semarang\r\n'),
(139, 'Universitas Negeri Semarang, Semarang\r\n'),
(140, 'Universitas Jenderal Soedirman, Purwokerto\r\n'),
(141, 'Universitas Negeri Surakarta Sebelas Maret, Surakarta\r\n'),
(142, 'Politeknik Negeri Semarang, Semarang \r\n'),
(143, 'Politeknik Maritim Negeri Indonesia, Semarang\r\n'),
(144, 'Institut Seni Indonesia Surakarta, Surakarta (ISI Solo, dahulu STSI)\r\n'),
(145, 'Universitas Tidar Magelang, Magelang\r\n'),
(146, 'UIN Walisongo, Semarang\r\n'),
(147, 'IAIN Surakarta, Surakarta\r\n'),
(148, 'STAIN Kudus, Kudus\r\n'),
(149, 'STAIN Pekalongan, Pekalongan\r\n'),
(150, 'IAIN Salatiga, Salatiga\r\n'),
(151, 'IAIN Purwokerto, Purwokerto\r\n'),
(152, 'Akademi Kepolisian (AKPOL),Semarang\r\n'),
(153, 'Akademi Militer (AKMIL) TNI AD, Magelang\r\n'),
(154, 'Akademi Minyak dan Gas Bumi (AKAMIGAS), Blora\r\n'),
(155, 'Akademi Sanitasi dan Kesehatan Lingkungan (ASKK), Purwokerto\r\n'),
(156, 'Sekolah Tinggi Seni Indonesia (STSI), Surakarta\r\n'),
(157, 'Sekolah Tinggi Penyuluhan Pertanian (STTP) Magelang\r\n'),
(158, 'Politeknik Ilmu Pelayaran Semarang\r\n'),
(159, 'Politeknik Kesehatan Semarang\r\n'),
(160, 'Politeknik Kesehatan Surakarta\r\n'),
(161, 'Universitas Gadjah Mada\r\n'),
(162, 'Universitas Negeri Yogyakarta\r\n'),
(163, 'Institut Seni Indonesia Yogyakarta\r\n'),
(164, 'Universita Terbuka  UPBJJ Yogyakarta\r\n'),
(165, 'Akademi Teknologi Kulit Yogyakarta (ATK)\r\n'),
(166, 'Universitas Pembangunan Nasional Veteran (UPN), Yogyakarta\r\n'),
(167, 'UIN Sunan Kalijaga\r\n'),
(168, 'Akademi Angkatan Udara (AAU), Yogyakarta\r\n'),
(169, 'Sekolah Tinggi Pertanahan Nasional (STPN), Yogyakarta\r\n'),
(170, 'Sekolah Tinggi Teknologi Nuklir (STTN), Yogyakarta\r\n'),
(171, 'Politeknik Kesehatan Yogyakarta\r\n'),
(172, 'Universitas Airlangga, Surabaya\r\n'),
(173, 'Universitas Negeri Surabaya, Surabaya\r\n'),
(174, 'Universitas Brawijaya, Malang\r\n'),
(175, 'Universitas Negeri Malang, Malang\r\n'),
(176, 'Universitas Jember, Jember\r\n'),
(177, 'Universitas Trunojoyo, Bangkalan\r\n'),
(178, 'Politeknik Elektronika Negeri Surabaya, Surabaya\r\n'),
(179, 'Politeknik Perkapalan Negeri Surabaya, Surabaya\r\n'),
(180, 'Politeknik Negeri Madura, Sampang\r\n'),
(181, 'Politeknik Negeri Malang, Malang\r\n'),
(182, 'Politeknik Negeri Madiun, Madiun\r\n'),
(183, 'Politeknik Negeri Jember, Jember\r\n'),
(184, 'Institut Teknologi Sepuluh Nopember, Surabaya\r\n'),
(185, 'Akademi Komunitas Negeri, Bojonegoro\r\n'),
(186, 'Akademi Komunitas Negeri, Pacitan\r\n'),
(187, 'Universitas Pembangunan Nasional Veteran (UPN), Surabaya\r\n'),
(188, 'Politeknik Negeri Banyuwangi, Banyuwangi\r\n'),
(189, 'Akademi Komunitas Negeri Lamongan, Lamongan\r\n'),
(190, 'Akademi Komunitas Negeri Sumenep. Sumenep\r\n'),
(191, 'Akademi Komunitas Negeri Bojonegoro, Bojonegoro\r\n'),
(192, 'Universitas Islam Negeri Maulana Malik Ibrahim, Malang\r\n'),
(193, 'STAIN Kediri\r\n'),
(194, 'STAIN Ponorogo\r\n'),
(195, 'UIN Sunan Ampel\r\n'),
(196, 'IAIN Tulungagung\r\n'),
(197, 'UIN Maulana Malik Ibrahim, Malang\r\n'),
(198, 'STAIN Pamekasan, Pamekasan\r\n'),
(199, 'Akademi Angkatan Laut (AAL), Surabaya\r\n'),
(200, 'Teknik Keselamatan Penerbangan (ATKP) Surabaya\r\n'),
(201, 'Sekolah Tinggi Penyuluhan Pertanian (STTP) Malang\r\n'),
(202, 'IAIN Jember, Jember\r\n'),
(203, 'Politeknik Elektronika Negeri Surabaya\r\n'),
(204, 'Politeknik Kesehatan Malang\r\n'),
(205, 'Politeknik Kesehatan Surabaya\r\n'),
(206, 'Politeknik Pertanian Negeri Jember\r\n'),
(207, 'Akademi TKP â€“ Surabaya \r\n'),
(208, 'Universitas Mataram, Mataram\r\n'),
(209, 'IAIN Mataram, Lombok\r\n'),
(210, 'Sekolah Tinggi Agama Hindu Negeri (STAHN) Gde Puja, Mataram\r\n'),
(211, 'Universitas Nusa Cendana, Kupang\r\n'),
(212, 'Politeknik Negeri Kupang, Kupang\r\n'),
(213, 'Politeknik Pertanian Negeri Kupang, Kupang\r\n'),
(214, 'Universitas Udayana, Denpasar\r\n'),
(215, 'Universitas Pendidikan Ganesha, Singaraja\r\n'),
(216, 'Politeknik Negeri Bali, Kuta-Badung\r\n'),
(217, 'Institut Seni Indonesia Denpasar, Denpasar\r\n'),
(218, 'Politeknik Negeri Tanah Lot\r\n'),
(219, 'Institut Hindu Dharma Negeri (IHDN) Denpasar\r\n'),
(220, 'Akademi Kebidanan Pemprov Bali singaraja\r\n'),
(221, 'Sekolah Tinggi Pariwisata Bali\r\n'),
(222, 'Sekolah Tinggi Agama Kristen Negeri (STAKN) Denpasar\r\n'),
(223, 'Politeknik Kesehatan Denpasar\r\n'),
(224, 'Universitas Tanjungpura, Pontianak\r\n'),
(225, 'Politeknik Negeri Pontianak, Pontianak\r\n'),
(226, 'Politeknik Kesehatan Kementerian Kesehatan, Pontianak\r\n'),
(227, 'Politeknik Terpikat Sambas\r\n'),
(228, 'Politeknik Tonggak Equator\r\n'),
(229, 'Politeknik Ketapang\r\n'),
(230, 'Politeknik Tunas Bangsa\r\n'),
(231, 'IAIN Pontianak sebelumnya STAIN Pontianak\r\n'),
(232, 'Universitas Palangka Raya, Palangka Raya\r\n'),
(233, 'IAIN Palangkaraya, Palangkaraya\r\n'),
(234, 'Sekolah Tinggi Agama Hindu Negeri Tampung Peyang, Palangka Raya\r\n'),
(235, 'Sekolah Tinggi Agama Kristen Negeri (STAKN) Palangkaraya\r\n'),
(236, 'Universitas Lambung Mangkurat, Banjarmasin\r\n'),
(237, 'Politeknik Negeri Banjarmasin, Banjarmasin\r\n'),
(238, 'IAIN ANTASARI, Banjarmasin\r\n'),
(239, 'Poltekkes Banjarmasin\r\n'),
(240, 'Ooliteknik Pertanian Negeri Samarinda\r\n'),
(241, 'Universitas Mulawarman, Samarinda\r\n'),
(242, 'Politeknik Negeri Samarinda, Samarinda\r\n'),
(243, 'Politeknik Pertanian Negeri Samarinda, Samarinda\r\n'),
(244, 'Universitas Borneo Tarakan, Tarakan\r\n'),
(245, 'Politeknik Balikpapan, Balikpapan\r\n'),
(246, 'IAIN Samarinda, Samarinda\r\n'),
(247, 'Universitas Borneo Tarakan\r\n'),
(248, 'Universitas Sam Ratulangi, Manado\r\n'),
(249, 'Universitas Negeri Manado, Manado\r\n'),
(250, 'Politeknik Negeri Manado, Manado\r\n'),
(251, 'Politeknik Negeri Nusa Utara, Tahuna\r\n'),
(252, 'IAIN Manado, Manado (Sulawesi Utara)\r\n'),
(253, 'Politeknik Kesehatan Manado\r\n'),
(254, 'Politeknik Negeri Manado\r\n'),
(255, 'Universitas Negeri Gorontalo, Gorontalo\r\n'),
(256, 'IAIN Sultan Amai, Gorontalo\r\n'),
(257, 'Universitas Tadulako, Palu\r\n'),
(258, 'Sekolah Tinggi Ilmu Ekonomi (YPP Mujahidin), Tolitoli\r\n'),
(259, 'IAIN Dato Karamau, Palu\r\n'),
(260, 'STAIN Datokarama, Palu\r\n'),
(261, 'Politeknik Kesehatan Kemenkes Makassar, Makassar\r\n'),
(262, 'Universitas Hasanuddin, Makassar\r\n'),
(263, 'Universitas Negeri Makassar\r\n'),
(264, 'Politeknik Pertanian Negeri Pangkajene Kepulauan, Pangkajene Kepulauan\r\n'),
(265, 'Politeknik Negeri Ujung pandang, Makassar\r\n'),
(266, 'Universitas Maiwa Enrekang\r\n'),
(267, 'Politeknik Negeri Media Kreatif, Makassar\r\n'),
(268, 'Universitas Islam Negeri Makassar\r\n'),
(269, 'UIN Alauddin, Makassar\r\n'),
(270, 'STAIN Watampone, Bone\r\n'),
(271, 'STAIN Parepare, Parepare\r\n'),
(272, 'IAIN Palopo, Palopo\r\n'),
(273, 'Akademi Teknik Keselamatan Penerbangan (ATKP) Makasar\r\n'),
(274, 'Sekolah Tinggi Ilmu Adm, Ujung Pandang\r\n'),
(275, 'Sekolah Tinggi Seni Indonesia, Padang Panjang\r\n'),
(276, 'Sekolah Tinggi Agama Kristen Negeri (STAKN) Toraja\r\n'),
(277, 'Sekolah Tinggi Penyuluhan Pertanian (STTP) Gowa\r\n'),
(278, 'Akademi Teknik Keselamatan Penerbangan Makasar\r\n'),
(279, 'Universitas Haluoleo, Kendari\r\n'),
(280, 'Sekolah Tinggi Pertanian (STIP) Muna Kampus Baru, Muna\r\n'),
(281, 'STAIN Kendari\r\n'),
(282, 'Universitas 19 November Kolaka\r\n'),
(283, 'Universitas Muhammadiyah Kendari\r\n'),
(284, 'Universitas Lakidende\r\n'),
(285, 'Universitas Dayanu Iksanudin\r\n'),
(286, 'Universitas Muhammadiyah Buton\r\n'),
(287, 'Universitas Sulawesi Tenggara\r\n'),
(288, 'IAIN Kendari, Palu\r\n'),
(289, 'Universitas Negeri Sulawesi Barat\r\n'),
(290, 'Universitas Pattimura, Ambon\r\n'),
(291, 'Universitas Darussalam, Ambon\r\n'),
(292, 'Politeknik Negeri Ambon, Ambon\r\n'),
(293, 'Politeknik Perikanan Negeri Tual, Tual\r\n'),
(294, 'STAKPN Ambon\r\n'),
(295, 'IAIN Ambon\r\n'),
(296, 'Sekolah Tinggi Agama Kristen Protestan Negeri Ambon\r\n'),
(297, 'STAIN Ambon\r\n'),
(298, 'Universitas Khairun, Ternate\r\n'),
(299, 'IAIN Ternate, Ternate\r\n'),
(300, 'Universitas Cendrawasih, Jayapura\r\n'),
(301, 'Universitas Musamus Merauke, Merauke\r\n'),
(302, 'STAIN Al-Fatah, Jayapura\r\n'),
(303, 'Sekolah Tinggi. Agama Kristen Negeri (STAKN) Jayapura\r\n'),
(304, 'Universitas Negeri Papua, Manokwari \r\n'),
(305, 'STAIN Sorong, Sorong\r\n'),
(306, 'Sekolah Tinggi Penyuluhan Pertanian (STTP) Manokwari');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `role` enum('1','0','2') NOT NULL,
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
(1, '0', 'SUPER DUPER ADMIN', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'default.png', 'Sudah'),
(4, '1', 'Millenia Rusbandi', 'meli', '315fef7b8d30f99d6964f489ee4c9828', 'default.png', 'Sudah'),
(5, '2', 'Talenta', 'tln', 'ef83d1e17235ac5d3ef6ca96cea6e314', 'default.jpg', 'Sudah'),
(6, '2', 'Scanning :v', 'scan', '53aefec08170b2ebed981a0a86d0dbe0', 'default.jpg', 'Sudah'),
(7, '2', 'Water Treatment', 'water', '9460370bb0ca1c98a779b1bcc6861c2c', 'default.jpg', 'Sudah'),
(8, '2', 'Kepala Cabang', 'kepala', '870f669e4bbbfa8a6fde65549826d1c4', 'default.jpg', 'Sudah');

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
  ADD KEY `id_mhs` (`id_mhs`),
  ADD KEY `id_kamus` (`id_kamus`);

--
-- Indexes for table `header_home`
--
ALTER TABLE `header_home`
  ADD PRIMARY KEY (`id_header`);

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
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `user_fk` (`id_user`),
  ADD KEY `id_univ` (`univ`);

--
-- Indexes for table `nota_dinas`
--
ALTER TABLE `nota_dinas`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_form` (`id_form`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id_notif`),
  ADD KEY `penerima` (`penerima`);

--
-- Indexes for table `surat_konfirm`
--
ALTER TABLE `surat_konfirm`
  ADD PRIMARY KEY (`id_srtkonfirm`),
  ADD KEY `id_form` (`id_form`),
  ADD KEY `id_mhs` (`id_mhs`);

--
-- Indexes for table `univ`
--
ALTER TABLE `univ`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `form_magang`
--
ALTER TABLE `form_magang`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `header_home`
--
ALTER TABLE `header_home`
  MODIFY `id_header` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kamus`
--
ALTER TABLE `kamus`
  MODIFY `id_kamus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nota_dinas`
--
ALTER TABLE `nota_dinas`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `surat_konfirm`
--
ALTER TABLE `surat_konfirm`
  MODIFY `id_srtkonfirm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_magang`
--
ALTER TABLE `form_magang`
  ADD CONSTRAINT `form_magang_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `mhs` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_magang_ibfk_2` FOREIGN KEY (`id_kamus`) REFERENCES `kamus` (`id_kamus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kamus`
--
ALTER TABLE `kamus`
  ADD CONSTRAINT `kamus_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kamus_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mhs`
--
ALTER TABLE `mhs`
  ADD CONSTRAINT `mhs_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas`
--
ALTER TABLE `nota_dinas`
  ADD CONSTRAINT `nota_dinas_ibfk_1` FOREIGN KEY (`id_form`) REFERENCES `form_magang` (`id_form`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notif`
--
ALTER TABLE `notif`
  ADD CONSTRAINT `notif_ibfk_1` FOREIGN KEY (`penerima`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_konfirm`
--
ALTER TABLE `surat_konfirm`
  ADD CONSTRAINT `surat_konfirm_ibfk_1` FOREIGN KEY (`id_form`) REFERENCES `form_magang` (`id_form`) ON DELETE CASCADE,
  ADD CONSTRAINT `surat_konfirm_ibfk_2` FOREIGN KEY (`id_mhs`) REFERENCES `mhs` (`id_mhs`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
