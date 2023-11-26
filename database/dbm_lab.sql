-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2023 at 03:21 PM
-- Server version: 5.7.39
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbm_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `spesifikasi` varchar(150) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `fungsi` varchar(50) NOT NULL,
  `sumber` varchar(50) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `kondisi` int(11) NOT NULL,
  `penggunaan` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `nama`, `merk`, `spesifikasi`, `jumlah`, `fungsi`, `sumber`, `tahun`, `kondisi`, `penggunaan`, `keterangan`) VALUES
('D001', 'Monitor LCD 20', 'LG', '20 Inch', 15, 'Penunjang Praktikum', 'Dana Fakultas', '2015', 1, 1, '-'),
('D002', 'PC', 'Rakitan', 'intel Â® core â„¢ i3-4130 CPU @ 3.40 GHz 3.40 GHz', 15, 'Penunjang Praktikum', 'Dana Fakultas', '2015', 1, 1, '-'),
('D003', 'Keyboard', 'Logitech', '-', 15, 'Penunjang Praktikum', 'Dana Fakultas', '2015', 1, 1, '-'),
('D004', 'Mouse', 'Logitech', '-', 15, 'Penunjang Praktikum', 'Dana Fakultas', '2015', 1, 1, '-');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_lab`
--

CREATE TABLE `inventaris_lab` (
  `id` int(11) NOT NULL,
  `id_laboratorium` varchar(5) NOT NULL,
  `id_alat` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris_lab`
--

INSERT INTO `inventaris_lab` (`id`, `id_laboratorium`, `id_alat`, `jumlah`, `keterangan`) VALUES
(11, '001', 'D001', 15, '-'),
(12, '001', 'D001', 15, '-');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `penanggung_jawab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`id`, `nama`, `kapasitas`, `penanggung_jawab`) VALUES
('001', 'LABORATORIUM MULTIMEDIA', 15, 'Ir. Dadang Iskandar, S.T., M.Eng'),
('002', 'LABORATORIUM PEMROGRAMAN', 20, 'Bangun Wijayanto, S.T.,M.Cs'),
('003', 'LABORATORIUM JARINGAN', 20, 'Ir. Dadang Iskandar, S.T., M.Eng'),
('004', 'LABORATORIUM RISET', 15, 'Swahesti Puspita Rahayu , S.Kom.,M.T');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `ttd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nip`, `nama`, `jabatan`, `ttd`) VALUES
('198107052008012024', 'Swahesti Puspita Rahayu , S.Kom.,M.T', 'Kepala Laboratorium Riset', NULL),
('198306182006041002', 'Bangun Wijayanto, S.T.,M.Cs', 'Kepala Laboratorium Pemrograman', 'TTD Pak Bangun.png'),
('198312022015041001', 'Ir. Dadang Iskandar, S.T., M.Eng', 'Kepala Laboratorium Jaringan', 'TTD Pak Dadang.png'),
('198703022014041002', 'Gilang Dwi Ratmana, A.Md', 'Teknisi Laboratorium', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surat_bebas`
--

CREATE TABLE `surat_bebas` (
  `no_surat` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `judul` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_bebas`
--

INSERT INTO `surat_bebas` (`no_surat`, `nama`, `nim`, `judul`, `tanggal`) VALUES
('No : 001/LAB-TIF/PEN/06/2016', 'Safa Muazam', 'H1D017061', 'Rancang Bangun Sistem Computer Based Test (CBT) Dalam Proses Seleksi Penerimaan Prajurit Tahap Akademik Di TNI Angkatan Udara', '2023-10-31'),
('No : 002/LAB-TIF/PEN/06/2016', 'Nabilla Anggraini', 'H1D017045', 'Rancang Bangun Sistem Computer Based Test (CBT) Dalam Proses Seleksi Penerimaan Prajurit Tahap Akademik Di TNI Angkatan Udara', '2023-11-03'),
('No : 005/LAB-TIF/PEN/06/2016', 'Nabilla Anggraini', 'H1D017045', 'Rancang Bangun Sistem Computer Based Test (CBT) Dalam Proses Seleksi Penerimaan Prajurit Tahap Akademik Di TNI Angkatan Udara', '2023-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `surat_peminjaman`
--

CREATE TABLE `surat_peminjaman` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `noHp` varchar(15) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `pinjam` date DEFAULT NULL,
  `kembali` date DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `keperluan` varchar(255) DEFAULT NULL,
  `alat` json DEFAULT NULL,
  `jumlah` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_peminjaman`
--

INSERT INTO `surat_peminjaman` (`id`, `nama`, `nim`, `noHp`, `tanggal`, `pinjam`, `kembali`, `durasi`, `keperluan`, `alat`, `jumlah`) VALUES
(8, 'Safa Muazam', 'H1D017045', '6285258946706', '2023-11-09', '2023-11-09', '2023-11-09', 2, 'Ekskul', '[\"Node MCU\", \"Arduino\", \"Kabel\"]', '[\"3\", \"4\", \"13\"]'),
(9, 'Muhammad Ilham', 'H1D017045', '6285258946706', '2023-11-09', '2023-11-09', '2023-11-09', 2, 'Ekskul', '[\"Node MCU\", \"Arduino\", \"Breadboard\"]', '[\"3\", \"4\", \"1\"]'),
(10, 'fardan Maula', 'H1D020059', '6285258946706', '2023-11-09', '2023-11-14', '2023-11-25', 11, 'Ekskul Robotika', '[\"Arduino\", \"Ralley\", \"Kabel Jumper\"]', '[\"7\", \"2\", \"34\"]'),
(11, 'fardan Muazam', 'H1D020059', '6285258946706', '2023-11-09', '2023-11-14', '2023-11-25', 11, 'Ekskul Robotika', '[\"Arduino\", \"Ralley\", \"Kabel Jumper\"]', '[\"7\", \"2\", \"34\"]');

-- --------------------------------------------------------

--
-- Table structure for table `surat_penelitian`
--

CREATE TABLE `surat_penelitian` (
  `no_surat` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `judul` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL,
  `namaDospem` varchar(100) NOT NULL,
  `nipDospem` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_penelitian`
--

INSERT INTO `surat_penelitian` (`no_surat`, `nama`, `nim`, `judul`, `tanggal`, `namaDospem`, `nipDospem`) VALUES
('No : 001/LAB-TIF/PEN/06/2016', 'Nabilla Anggraini', 'H1D017045', 'Rancang Bangun Sistem Computer Based Test (CBT) Dalam Proses Seleksi Penerimaan Prajurit Tahap Akademik Di TNI Angkatan Udara', '2023-11-08', 'Safa Muazam', '12435432523431'),
('No : 003/LAB-TIF/PEN/06/2016', 'Nabilla Anggraini', 'H1D017045', 'Rancang Bangun Sistem Computer Based Test (CBT) Dalam Proses Seleksi Penerimaan Prajurit Tahap Akademik Di TNI Angkatan Udara', '2023-11-01', 'Safa Muazam azizi', '123456778');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris_lab`
--
ALTER TABLE `inventaris_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `surat_bebas`
--
ALTER TABLE `surat_bebas`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `surat_peminjaman`
--
ALTER TABLE `surat_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_penelitian`
--
ALTER TABLE `surat_penelitian`
  ADD PRIMARY KEY (`no_surat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventaris_lab`
--
ALTER TABLE `inventaris_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `surat_peminjaman`
--
ALTER TABLE `surat_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
