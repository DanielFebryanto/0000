-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Sep 2016 pada 18.12
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eprop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `proposal_ID` int(11) NOT NULL,
  `sponsor_ID` int(11) NOT NULL,
  `member_ID` int(11) DEFAULT NULL,
  `tgl_buat` date NOT NULL,
  `pesan_sponsor` text NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `proposal_ID`, `sponsor_ID`, `member_ID`, `tgl_buat`, `pesan_sponsor`, `status`) VALUES
(1, 4, 1, 1, '2016-08-25', 'keren coiii kapan bisa ketemu', 'Accept'),
(2, 9, 1, 2, '2016-09-17', 'Dear nin  diharapkan kehadiran ny di kantor pagpug hari senin, 30 september 2016. mohon dipersiapkan semua hal yang berjkaitan dengan presentasi.\r\nregards', 'Accept');

-- --------------------------------------------------------

--
-- Struktur dari tabel `industri`
--

CREATE TABLE `industri` (
  `id_si` int(11) NOT NULL,
  `nama_si` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `industri`
--

INSERT INTO `industri` (`id_si`, `nama_si`) VALUES
(111, 'Retail'),
(222, 'Entertain'),
(333, 'Komunitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_event`
--

CREATE TABLE `kategori_event` (
  `id_ke` int(11) NOT NULL,
  `nama_ke` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kategori_event`
--

INSERT INTO `kategori_event` (`id_ke`, `nama_ke`) VALUES
(11, 'Konser Musik'),
(22, 'Amal'),
(33, 'Bazar'),
(44, 'Olahraga'),
(55, 'dll');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `about_member` text,
  `email` varchar(50) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `website` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `tgl_gabung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `about_member`, `email`, `phone`, `website`, `alamat`, `username`, `password`, `tgl_gabung`) VALUES
(1, 'Gumilang Hidayat', 'pencari bakat', 'gilang@gg.com', '05241645', 'www.gilang.com', 'jl. kali deres selatan no 13', 'Gums', '1232', '2016-08-02'),
(2, 'Nina Zatulini', 'http://www.pagpug.com', 'nina@gmail.com', '08561212589', 'http://www.pagpug.com', 'jl. wew selatan no 14', 'ninabobo', '1232', '2016-08-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` int(11) NOT NULL,
  `member_ID` int(11) NOT NULL,
  `ke_ID` int(11) NOT NULL,
  `industri_ID` int(11) NOT NULL,
  `judul_proposal` varchar(45) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `doc` varchar(100) NOT NULL,
  `project_manajer` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `proposal`
--

INSERT INTO `proposal` (`id_proposal`, `member_ID`, `ke_ID`, `industri_ID`, `judul_proposal`, `deskripsi`, `tgl_mulai`, `tgl_selesai`, `doc`, `project_manajer`, `status`) VALUES
(1, 1, 11, 111, 'Pencanangan Kanal barat', 'Ditujukan untuk menanggulangi banjir d jakarta barat kami hadir menghidupkan suasana..', '2019-01-01', '2019-01-02', 'ddd', 'Abiyasa', 'Open'),
(2, 1, 22, 222, 'Teknologi Bermasyarakat', 'Bazar, Cerdas Cermat, Siraman Rohani, Dll', '2016-12-29', '2016-12-30', 'as.pptx', 'Nina Zatulini', 'Open'),
(4, 1, 44, 111, 'Event tahunan Sma negri 54', 'yang dateng peterpan, cherry bell dan masih banyak lagi', '2016-10-29', '2016-10-29', 'as.pptx', 'Naufal Said', 'Negoisasi'),
(5, 1, 33, 333, 'Bazar Standar SNI', 'Bazar Barang Bekas', '2016-09-29', '2016-09-30', 'Contoh Pengisian FORM.pdf', 'Setya Budi', 'Open'),
(8, 2, 11, 111, 'Prompt Night', 'Perpisahan anak anak Yai', '2016-08-31', '2016-08-31', 'Proposal Brand PT.CBAM.docx', 'Yandi Nurahman', 'Open'),
(9, 2, 22, 333, 'Seminar Menghadapi Sidang Skripsi', 'Seminar yang menggungkap kan tips dan trik dalam manghadapi sidang skripsi,', '2016-10-30', '2016-10-30', 'as.pptx', 'Nina Zatulini', 'Negoisasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sponsor`
--

CREATE TABLE `sponsor` (
  `idsponsor` int(11) NOT NULL,
  `nama_sponsor` varchar(45) NOT NULL,
  `about_sponsor` text,
  `industri_ID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(45) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tgl_gabung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sponsor`
--

INSERT INTO `sponsor` (`idsponsor`, `nama_sponsor`, `about_sponsor`, `industri_ID`, `email`, `website`, `username`, `password`, `tgl_gabung`) VALUES
(1, 'PT. Pagpug tbk', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 333, 'services@pagpug.com', 'http://pagpug.com', 'pagpug', '1232', '2016-08-01'),
(4, 'PT. Djarum tbk', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 111, 'djarum.coklat@gg.com', 'http://www.pagpug.com', 'djarum', '1232', '2016-08-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `event_proposal_idx` (`proposal_ID`),
  ADD KEY `event_sponsor_idx` (`sponsor_ID`),
  ADD KEY `event_member_idx` (`member_ID`);

--
-- Indexes for table `industri`
--
ALTER TABLE `industri`
  ADD PRIMARY KEY (`id_si`);

--
-- Indexes for table `kategori_event`
--
ALTER TABLE `kategori_event`
  ADD PRIMARY KEY (`id_ke`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`),
  ADD KEY `proposal_member_idx` (`member_ID`),
  ADD KEY `proposal_kategori_idx` (`ke_ID`),
  ADD KEY `proposal_industri_idx` (`industri_ID`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`idsponsor`),
  ADD KEY `sponsor_industri_idx` (`industri_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `industri`
--
ALTER TABLE `industri`
  MODIFY `id_si` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;
--
-- AUTO_INCREMENT for table `kategori_event`
--
ALTER TABLE `kategori_event`
  MODIFY `id_ke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `idsponsor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_member` FOREIGN KEY (`member_ID`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `event_proposal` FOREIGN KEY (`proposal_ID`) REFERENCES `proposal` (`id_proposal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `event_sponsor` FOREIGN KEY (`sponsor_ID`) REFERENCES `sponsor` (`idsponsor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_indutri` FOREIGN KEY (`industri_ID`) REFERENCES `industri` (`id_si`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `proposal_kategori` FOREIGN KEY (`ke_ID`) REFERENCES `kategori_event` (`id_ke`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `proposal_member` FOREIGN KEY (`member_ID`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `sponsor`
--
ALTER TABLE `sponsor`
  ADD CONSTRAINT `sponsor_industri` FOREIGN KEY (`industri_ID`) REFERENCES `industri` (`id_si`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
