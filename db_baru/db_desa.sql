-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Jul 2017 pada 18.33
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdesa2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggarandesa`
--

CREATE TABLE `anggarandesa` (
  `id` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `anggaran` varchar(30) NOT NULL,
  `realisasi` int(15) NOT NULL,
  `total` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `anggarandesa`
--

INSERT INTO `anggarandesa` (`id`, `uraian`, `anggaran`, `realisasi`, `total`) VALUES
(1, 'Pendapatan Asli Desa', '103879000', 100, 38435000),
(2, 'Dana Desa', '717060182', 38435000, 0),
(3, 'Bagian Dari Hasil Pajak & Retribusi Daerah Kabupaten', '68435000', 0, 38435000),
(4, 'Bantuan Keuangan', '225000000', 2301023, 0),
(5, 'test', '220000500', 20000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(35) NOT NULL,
  `deskripsi_singkat` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `foto` text NOT NULL,
  `kategori_artikel_id` int(11) NOT NULL COMMENT '1(khasdesa), 2(sosbud), 3(eko), 4(wisata), 5(berita)',
  `aktif` char(1) NOT NULL DEFAULT '1' COMMENT '1 (aktif), 2 (tidak aktif)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `deskripsi_singkat`, `isi`, `foto`, `kategori_artikel_id`, `aktif`) VALUES
(2, 'Nasi Jamblang', 'Ini adalah nasi jamblang', 'Makanan Khas Cirebon', '20140528_092504.jpg', 1, '1'),
(4, 'HEHE', 'bbbb', 'sdssdf', '', 2, '1'),
(5, 'fff', 'mkjhhhh', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 'smk.jpeg', 5, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `foto` text NOT NULL,
  `alt` varchar(100) NOT NULL,
  `aktif` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`id`, `foto`, `alt`, `aktif`) VALUES
(2, 'banner-FB_IMG_1495210908203.jpg', 'coba', '1'),
(3, 'banner-Untitled-1.jpg', 'aaa', '1'),
(4, 'banner-934118.jpg', 'bb', '1'),
(5, 'banner-pascal.jpg', 'bbbzzz', '1'),
(6, 'banner-FB_IMG_1494689917169.jpg', 'bbbbbaaaa', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `alt` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  `aktif` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `alt`, `foto`, `aktif`) VALUES
(1, 'odong', 'gallery-Toefel.jpg', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `nama` varchar(10) NOT NULL,
  `aktif` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `nama`, `aktif`) VALUES
(1, 'admin', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id`, `nama`) VALUES
(1, 'Khas Desa'),
(2, 'Sosial dan Budaya'),
(3, 'Ekonomi'),
(4, 'Wisata'),
(5, 'Berita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `hak_akses_id` int(11) NOT NULL,
  `nama_panggilan` varchar(30) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `aktif` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `hak_akses_id`, `nama_panggilan`, `nama_lengkap`, `foto`, `aktif`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'ADMIN', 'ADMINISTRATOR', '', '1'),
(2, 'aripin', 'b41d59fbf6820910aa4d80e3657b9cd7', 1, 'Aripin', 'Ipin', '', '0'),
(3, 'coba', 'c3ec0f7b054e729c5a716c8125839829', 3, 'nama coba', 'nama lengkap nya coba e', '', '0'),
(5, 'kasir_ani', '65ba841e01d6db7733e90a5b7f9e6f80', 1, 'ani ajah', 'aaassddd', '', '0'),
(7, 'aaaaaa', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 1, 'sss', 'ddd', '', '1'),
(8, 'bbb', '08f8e0260c64418510cefb2b06eee5cd', 5, 'ccc', 'sasd', '', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perdes`
--

CREATE TABLE `perdes` (
  `id` int(11) NOT NULL,
  `aturan` text NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perdes`
--

INSERT INTO `perdes` (`id`, `aturan`, `status`) VALUES
(2, 'ddddddddddddddd', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `nama` varchar(35) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  `sambutan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`nama`, `jabatan`, `periode`, `foto`, `sambutan`) VALUES
('Pak Kades', 'Kepala Desa', '2010-2023', '3images.jpg', '  Melalui web site ini  Desa Ringintunggal Kecamatan Gayam Pemerintah Kabupaten Bojonegoro diharapkan dapat memberikan informasi dan komunikasi kepada semua pihak, yang nantinya dapat bermanfaatkan bagi masyarakat. Disamping itu diharapkan gambaran potensi Desa Ringintunggal Kecamatan Ngasem , dapat memberikan daya tarik bagi masyarakat Ringintunggal dan sekitarnya untuk menjalin hubungan baik sehingga tercapai cita-cita kita bersama untuk membangun Desa lebih baik dan lebih sejahtera.\r\n          Semoga informasi yang disajikan dalam ini bermanfaat dalam menunjang pelaksanaan pembangunan, sehingga dapat meningkatkan kesejahteraan masyarakat.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sambutan`
--

CREATE TABLE `sambutan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `isi_sambutan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sambutan`
--

INSERT INTO `sambutan` (`id`, `nama`, `isi_sambutan`) VALUES
(1, 'NAMA KADES', 'Assalamu\'alaikum Wr. Wb.\n \nPuji serta syukur kami panjatkan kehadirat Allah SWT, karena atas berkat rahmat dan hidayah-Nya kita semua masih diberikan banyak \nWassalamu\'alaikum Wr. Wb.\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sejarah`
--

CREATE TABLE `sejarah` (
  `judul` varchar(35) NOT NULL,
  `isi` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sejarah`
--

INSERT INTO `sejarah` (`judul`, `isi`, `foto`) VALUES
('gsgsdf', 'xcvxvxc', 'fasirkaliki.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sejarah_kades`
--

CREATE TABLE `sejarah_kades` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `masa_jabatan` varchar(25) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1' COMMENT '1(aktif), 0(tidak aktif)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur_desa`
--

CREATE TABLE `struktur_desa` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `struktur_desa`
--

INSERT INTO `struktur_desa` (`id`, `nama`, `jabatan`, `foto`) VALUES
(2, 'IPIN', 'Sekertaris', ''),
(3, 'HEHE', 'Anggota', 'photo.png'),
(4, 'Agus badrussalam', 'Bupati', 'fhoto.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggarandesa`
--
ALTER TABLE `anggarandesa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perdes`
--
ALTER TABLE `perdes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sambutan`
--
ALTER TABLE `sambutan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sejarah_kades`
--
ALTER TABLE `sejarah_kades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur_desa`
--
ALTER TABLE `struktur_desa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggarandesa`
--
ALTER TABLE `anggarandesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `perdes`
--
ALTER TABLE `perdes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sambutan`
--
ALTER TABLE `sambutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sejarah_kades`
--
ALTER TABLE `sejarah_kades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `struktur_desa`
--
ALTER TABLE `struktur_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
