-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Apr 2024 pada 03.45
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `DetailId` int(11) NOT NULL,
  `PenjualanId` int(11) NOT NULL,
  `ProdukId` int(11) NOT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `SubTotal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detailpenjualan`
--

INSERT INTO `detailpenjualan` (`DetailId`, `PenjualanId`, `ProdukId`, `JumlahProduk`, `SubTotal`) VALUES
(1, 1, 1, 1, '12000'),
(2, 2, 1, 2, '24000'),
(3, 3, 1, 3, '36000'),
(4, 4, 1, 1, '12000'),
(5, 5, 1, 4, '48000'),
(6, 6, 2, 1, '170000'),
(7, 7, 2, 1, '170000'),
(8, 8, 1, 2, '24000'),
(9, 9, 1, 2, '24000'),
(10, 10, 1, 3, '36000'),
(11, 11, 1, 1, '12000'),
(12, 12, 1, 1, '12000'),
(13, 13, 1, 1, '12000'),
(14, 14, 1, 1, '12000'),
(15, 15, 1, 1, '12000'),
(16, 16, 1, 1, '12000'),
(17, 17, 1, 1, '12000'),
(18, 18, 1, 2, '24000'),
(19, 19, 1, 1, '12000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `LoginId` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`LoginId`, `Username`, `Password`) VALUES
(1, 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `PelangganId` int(11) NOT NULL,
  `NamaPelanggan` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `NomorTelepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`PelangganId`, `NamaPelanggan`, `Alamat`, `NomorTelepon`) VALUES
(5, 'Wasil Anshory', 'pamekasan', '082326713220');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `PenjualanId` int(11) NOT NULL,
  `TanggalPenjualan` date NOT NULL,
  `TotalHarga` decimal(10,0) NOT NULL,
  `Pembayaran` decimal(10,0) NOT NULL,
  `PelangganId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`PenjualanId`, `TanggalPenjualan`, `TotalHarga`, `Pembayaran`, `PelangganId`) VALUES
(9, '2024-02-01', '24000', '24000', 5),
(10, '2024-02-01', '36000', '100000', 5),
(11, '2024-02-06', '12000', '15000', 5),
(12, '2024-02-12', '12000', '15000', 5),
(13, '2024-02-12', '12000', '15000', 5),
(14, '2024-02-12', '12000', '20000', 5),
(15, '2024-02-12', '12000', '20000', 5),
(16, '2024-02-12', '12000', '15000', 5),
(17, '2024-02-12', '12000', '15000', 5),
(18, '2024-02-13', '24000', '25000', 5),
(19, '2024-02-19', '12000', '12000', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `ProdukId` int(11) NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `Harga` decimal(10,0) NOT NULL,
  `Stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`ProdukId`, `NamaProduk`, `Harga`, `Stok`) VALUES
(1, 'Teh Gelas', '12000', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`DetailId`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LoginId`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`PelangganId`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`PenjualanId`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ProdukId`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `DetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `LoginId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `PelangganId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `PenjualanId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `ProdukId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
