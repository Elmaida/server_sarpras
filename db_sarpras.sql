-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Sep 2021 pada 10.11
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
(1, 1, 'Monitor ', 12, 10000000, '2021-09-01', '2021-09-24 07:53:52'),
(2, 1, 'Kabel Panjang', 10, 50000, '2021-09-23', '2021-09-24 07:54:56'),
(3, 1, 'Handphone', 50, 3500000, '2021-01-01', '2021-09-24 08:00:15'),
(4, 1, 'Monitor Samsung ', 20, 5000000, '2021-02-02', '2021-09-24 08:00:15'),
(5, 1, 'Keyboard', 5, 500000, '2021-03-22', '2021-09-24 08:00:15'),
(6, 1, 'Mouse ', 25, 750000, '2021-09-01', '2021-09-24 08:00:16'),
(7, 3, 'Bolpoin ', 50, 1200, '2020-11-01', '2021-09-24 08:00:16'),
(8, 3, 'Penghapus', 12, 500000, '2020-09-08', '2021-09-24 08:00:16'),
(9, 4, 'Sepeda Gunung', 10, 3500000, '2021-09-24', '2021-09-24 08:00:16'),
(10, 5, 'Kursi', 6, 2500000, '2020-01-28', '2021-09-24 08:00:16');

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
  `tanggal_kembali_barang` date NOT NULL,
  `jumlah` int(15) NOT NULL,
  `status_transaksi` tinytext NOT NULL,
  `id_kategori` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_pinjam`, `id_barang`, `id_user`, `tanggal_pinjam`, `tanggal_kembali`, `tanggal_kembali_barang`, `jumlah`, `status_transaksi`, `id_kategori`) VALUES
(1, 2, 1, '2021-09-24 15:05:05.000000', '0000-00-00 00:00:00.000000', '0000-00-00', 3, '', 1);

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
  `email` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nim`, `nama_user`, `jurusan`, `alamat`, `email`, `password`, `no_hp`, `role`) VALUES
(1, '201869040030', 'fida', 'Teknik Informatika', 'Purwosari', 'tul123@gmail.com', '$2y$11$ojWPRQsqSdrJgrWB5g3Pt.zTNjcVr/ME9y9QTMQDRdNGI0QRX8NKe', '081234678098', 'User');

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
  MODIFY `id_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_pinjam` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
