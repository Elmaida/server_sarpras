-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Sep 2021 pada 11.42
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sarpras`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `stok` int(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `id_kategori`, `nama`, `stok`, `harga`, `tanggal`, `create_date`) VALUES
(2, 1, 'Monitor', 5, 7500000, '2021-09-07', '2021-09-17 05:45:25'),
(3, 1, 'Kabel Panjang', 20, 50000, '2021-09-06', '2021-09-19 02:13:43'),
(4, 1, 'handphone', 1, 2000, '2021-09-17', '2021-09-17 08:28:20'),
(5, 5, 'Monitor Samsung', 10, 2000000, '2021-09-17', '2021-09-17 10:06:30'),
(6, 1, 'Keyboard Logitec', 6, 380000, '2021-01-26', '2021-09-21 05:13:43'),
(7, 1, 'Mouse Logitec', 6, 120000, '2021-09-15', '2021-09-21 04:12:06'),
(8, 4, 'Bolpoin', 7, 5000, '2021-09-17', '2021-09-21 04:53:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(20) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Barang Elektronik'),
(2, 'Property'),
(3, 'ATK'),
(4, 'Transportasi'),
(5, 'Mebel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_pinjam` int(20) NOT NULL,
  `id_barang` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `tanggal_pinjam` datetime(6) NOT NULL,
  `tanggal_kembali` datetime(6) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `status_transaksi` tinytext NOT NULL,
  `status_pengajuan` tinytext NOT NULL,
  `id_kategori` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_pinjam`, `id_barang`, `id_user`, `tanggal_pinjam`, `tanggal_kembali`, `jumlah`, `status_transaksi`, `status_pengajuan`, `id_kategori`) VALUES
(1, 1, 1, '2021-09-20 00:00:00.000000', '2021-09-21 00:00:00.000000', 2, '0', '0', 1),
(2, 1, 1, '2021-09-18 12:34:39.000000', '0000-00-00 00:00:00.000000', 3, '', '', 1),
(3, 1, 2, '2021-09-21 06:43:36.000000', '2021-09-24 00:00:00.000000', 2, '1', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `token` varchar(15) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nim`, `nama_user`, `jurusan`, `alamat`, `no_hp`, `token`, `role`) VALUES
(1, '201869040030', 'Siti', 'Teknik Informatika', 'Purwosari', '085745526763', '', 'user'),
(2, '201869040005', 'Ainun', 'Teknik Pangan', 'Pasuruan', '081000888556', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_barang` (`id_barang`,`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_pinjam` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
