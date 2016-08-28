-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2016 at 03:47 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bca`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `idCabang` int(11) NOT NULL,
  `kodeCabang` varchar(11) NOT NULL,
  `namaCabang` varchar(50) NOT NULL,
  `kontak` varchar(25) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`idCabang`, `kodeCabang`, `namaCabang`, `kontak`, `alamat`) VALUES
(1, '8570', 'A. Rivai', '0218767854', 'jl. A. Rivai Kav 12-13, Jak-Pus'),
(2, '0059', 'A. Yani', '0218767854', 'jl. A. Rivai Kav 12-13, Jak-Pus'),
(3, '0429', 'Kuningan ', '0218767854', 'jl. A. Rivai Kav 12-13, Jak-Pus'),
(4, '0437', 'Salemba Raya', '02111114', 'jl. A. Rivai Kav 12-13, Jak-Pus');

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `idDep` int(11) NOT NULL,
  `dep` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`idDep`, `dep`) VALUES
(1, 'Front Office'),
(2, 'Human Resources'),
(3, 'DPC');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_rek`
--

CREATE TABLE `jenis_rek` (
  `idJenis` int(11) NOT NULL,
  `jenisRek` varchar(50) NOT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_rek`
--

INSERT INTO `jenis_rek` (`idJenis`, `jenisRek`, `ket`) VALUES
(1, '$', NULL),
(2, 'Tapress', NULL),
(3, 'Giro', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `idKaryawan` int(11) NOT NULL,
  `posID` int(11) NOT NULL,
  `namaDepan` varchar(50) NOT NULL,
  `namaBelakang` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kontak` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `statusAktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idKaryawan`, `posID`, `namaDepan`, `namaBelakang`, `email`, `password`, `kontak`, `alamat`, `statusAktif`) VALUES
(1, 1, 'Yandi', 'Kusuma', 'yandi@bca.co.id', '1232', '08671212342', 'Dimana Hayooo???', 1),
(2, 3, 'Gatot', 'Kaca', 'gatot@bca.co.id', '1232', '08671212342', 'Dimana Hayooo???', 1),
(3, 2, 'Jaka', 'Ardiola', 'jack@bca.co.id', '1232', '08671212342', 'Dimana Hayooo???', 1),
(4, 4, 'Abdul', 'Aziz', 'az@bca.co.id', '1232', '08671212342', 'Dimana Hayooo???', 1);

-- --------------------------------------------------------

--
-- Table structure for table `komplain`
--

CREATE TABLE `komplain` (
  `idKomplain` int(11) NOT NULL,
  `cabangID` int(11) NOT NULL,
  `nasabahID` int(11) NOT NULL,
  `komplainKatID` int(11) NOT NULL,
  `jenisRekID` int(11) NOT NULL,
  `karyawanID` int(11) NOT NULL,
  `namaPemohon` varchar(50) NOT NULL,
  `periode` varchar(30) DEFAULT NULL,
  `jmlHal` int(7) DEFAULT NULL,
  `alasan` varchar(50) NOT NULL,
  `tglTurunData` date DEFAULT NULL,
  `tglKirim` date DEFAULT NULL,
  `noResi` varchar(25) DEFAULT NULL,
  `tglBuat` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `konfirmasi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komplain`
--

INSERT INTO `komplain` (`idKomplain`, `cabangID`, `nasabahID`, `komplainKatID`, `jenisRekID`, `karyawanID`, `namaPemohon`, `periode`, `jmlHal`, `alasan`, `tglTurunData`, `tglKirim`, `noResi`, `tglBuat`, `status`, `konfirmasi`) VALUES
(1, 1, 1, 1, 3, 3, 'danielo pernando', '6 July, 2016/1 July, 2016', 90, 'Tidak Terima', '2016-07-11', '2016-07-11', '9990', '2016-07-08', 'Update', 'Belum'),
(2, 3, 2, 3, 2, 3, 'Fajrul md', '19 July, 2016/30 July, 2016', NULL, 'No Print', NULL, NULL, NULL, '2016-07-08', 'Pending', 'Belum'),
(3, 4, 2, 4, 3, 3, 'Naufal', '1 July, 2016/28 July, 2016', NULL, 'Fisik Tidak Lengkap', NULL, NULL, NULL, '2016-07-11', 'Pending', 'Belum'),
(4, 4, 2, 7, 2, 3, 'Abdul Aziz ', '3 July, 2016/7 July, 2016', NULL, 'No Print', NULL, NULL, NULL, '2016-07-11', 'Pending', 'Belum'),
(5, 2, 2, 6, 2, 3, 'danielo pernando', '1 May, 2016/1 July, 2016', NULL, 'Tidak Terima', NULL, NULL, NULL, '2016-07-11', 'Pending', 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `komplain_kat`
--

CREATE TABLE `komplain_kat` (
  `idKomplainKat` int(11) NOT NULL,
  `katKomplain` varchar(50) NOT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komplain_kat`
--

INSERT INTO `komplain_kat` (`idKomplainKat`, `katKomplain`, `ket`) VALUES
(1, 'No print ', NULL),
(2, 'Permohonan CU Nasabah ', NULL),
(3, 'Arsip ', NULL),
(4, 'Halaman Yang Diterima  Tidak Lengkap', NULL),
(5, 'Kesalahan Pengiriman RK', NULL),
(6, 'RK Tidak  Diterima ', NULL),
(7, 'RK Hilang ', NULL),
(8, 'Retur', NULL),
(9, 'Terdestroy ', NULL),
(10, 'Mutasi Rekening Koran ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `idNasabah` int(11) NOT NULL,
  `namaDepan` varchar(50) NOT NULL,
  `namaBelakang` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noRek` varchar(25) NOT NULL,
  `jenisRek` int(11) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `noIdetitas` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `statusAktif` int(11) NOT NULL,
  `tglReg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`idNasabah`, `namaDepan`, `namaBelakang`, `email`, `noRek`, `jenisRek`, `kontak`, `dob`, `noIdetitas`, `alamat`, `statusAktif`, `tglReg`) VALUES
(1, 'Daniel', 'Febryanto', 'dann@gmail.com', '124578986532', 3, '085457878', '1995-07-11', '1995454578212', 'jl. saya lupa blok A No 13 Jakarta Timur', 1, '2016-07-06'),
(2, 'Nina', 'Zatulini', 'nina@gmail.com', '21254785651654', 2, '021545457', '2000-07-18', '5465454454', 'jl. saya lupa blok A No 13 Jakarta Timur', 1, '2016-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `idPos` int(11) NOT NULL,
  `depID` int(11) NOT NULL,
  `posisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`idPos`, `depID`, `posisi`) VALUES
(1, 3, 'Admin User'),
(2, 3, 'Kepala Bagian'),
(3, 3, 'Kepala Bidang'),
(4, 1, 'Teller');

-- --------------------------------------------------------

--
-- Table structure for table `status_aktif`
--

CREATE TABLE `status_aktif` (
  `id_stat` int(2) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_aktif`
--

INSERT INTO `status_aktif` (`id_stat`, `status`) VALUES
(1, 'Aktif'),
(2, 'Non - Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`idCabang`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`idDep`);

--
-- Indexes for table `jenis_rek`
--
ALTER TABLE `jenis_rek`
  ADD PRIMARY KEY (`idJenis`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idKaryawan`),
  ADD KEY `fk_karyawan_statusAktif` (`statusAktif`),
  ADD KEY `fk_karyawan_posisi` (`posID`);

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`idKomplain`),
  ADD KEY `fk_komplain_cabang` (`cabangID`),
  ADD KEY `fk_komplain_nasabah` (`nasabahID`),
  ADD KEY `fk_komplain_komplainKat` (`komplainKatID`),
  ADD KEY `fk_komplain_jenisRek` (`jenisRekID`),
  ADD KEY `fk_komplain_karyawan` (`karyawanID`);

--
-- Indexes for table `komplain_kat`
--
ALTER TABLE `komplain_kat`
  ADD PRIMARY KEY (`idKomplainKat`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`idNasabah`),
  ADD KEY `fk_nasabah_jenisRek` (`jenisRek`),
  ADD KEY `fk_nasabah_statusAktif` (`statusAktif`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`idPos`),
  ADD KEY `fk_posisi_departement` (`depID`);

--
-- Indexes for table `status_aktif`
--
ALTER TABLE `status_aktif`
  ADD PRIMARY KEY (`id_stat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `idCabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `idDep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_rek`
--
ALTER TABLE `jenis_rek`
  MODIFY `idJenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idKaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `komplain`
--
ALTER TABLE `komplain`
  MODIFY `idKomplain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `komplain_kat`
--
ALTER TABLE `komplain_kat`
  MODIFY `idKomplainKat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `idNasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `idPos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `status_aktif`
--
ALTER TABLE `status_aktif`
  MODIFY `id_stat` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `fk_karyawan_posisi` FOREIGN KEY (`posID`) REFERENCES `posisi` (`idPos`),
  ADD CONSTRAINT `fk_karyawan_statusAktif` FOREIGN KEY (`statusAktif`) REFERENCES `status_aktif` (`id_stat`);

--
-- Constraints for table `komplain`
--
ALTER TABLE `komplain`
  ADD CONSTRAINT `fk_komplain_cabang` FOREIGN KEY (`cabangID`) REFERENCES `cabang` (`idCabang`),
  ADD CONSTRAINT `fk_komplain_jenisRek` FOREIGN KEY (`jenisRekID`) REFERENCES `jenis_rek` (`idJenis`),
  ADD CONSTRAINT `fk_komplain_karyawan` FOREIGN KEY (`karyawanID`) REFERENCES `karyawan` (`idKaryawan`),
  ADD CONSTRAINT `fk_komplain_komplainKat` FOREIGN KEY (`komplainKatID`) REFERENCES `komplain_kat` (`idKomplainKat`),
  ADD CONSTRAINT `fk_komplain_nasabah` FOREIGN KEY (`nasabahID`) REFERENCES `nasabah` (`idNasabah`);

--
-- Constraints for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD CONSTRAINT `fk_nasabah_jenisRek` FOREIGN KEY (`jenisRek`) REFERENCES `jenis_rek` (`idJenis`),
  ADD CONSTRAINT `fk_nasabah_statusAktif` FOREIGN KEY (`statusAktif`) REFERENCES `status_aktif` (`id_stat`);

--
-- Constraints for table `posisi`
--
ALTER TABLE `posisi`
  ADD CONSTRAINT `fk_posisi_departement` FOREIGN KEY (`depID`) REFERENCES `departement` (`idDep`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
