-- phpMyAdmin SQL Dump
-- version 5.1.4-dev+20220420.d842c89d5c
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2022 pada 09.22
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `harga` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `gambar`, `jenis`, `jumlah`, `harga`) VALUES
(1, '1_-Single-Room-sumber-gambar-Pixabay.jpg', 'Single Room', '10', '250000'),
(2, '2_-Superior-Room-sumber-gambar-Pixabay.jpg', 'Superior Room', '17', '400000'),
(3, '1_-standard-room-sumber-gambar-Pixabay.jpg', 'Standard Room', '20', '300000'),
(5, '3_-Double-Room-sumber-gambar-Pixabay.jpg', 'Double Room', '5', '500000'),
(6, '4_-Family-room-sumber-gambar-newsaphirhotel.jpg', 'Family Room', '6', '600000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no` varchar(15) NOT NULL,
  `akses` enum('Admin','User') NOT NULL DEFAULT 'User',
  `gambar` varchar(100) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `no`, `akses`, `gambar`) VALUES
(1, 'Rian', 'rianandri@gmail.com', '12345678', 'Admin', 'wallhaven-1krqpv_1920x1080.png'),
(3, 'tes', 'tes@gmail.com', '123', 'User', 'default.png'),
(4, 'Rian Andri Waskito', 'rian@gmail.com', '12345678', 'User', 'default.png'),
(5, 'Rian Andri Waskito', 'aaaa@gmail.com', '12345678', 'User', 'default.png'),
(6, 'Putu', 'ary@gmail.com', '12345678', 'User', 'emojione_hotel.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tgl_in` varchar(20) NOT NULL,
  `tgl_out` varchar(20) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no` varchar(15) NOT NULL,
  `status` enum('Confirm','Pending') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `tgl_in`, `tgl_out`, `jumlah`, `jenis`, `nama`, `email`, `no`, `status`) VALUES
(25, '26-May-2022', '26-May-2022', 2, 'Twin Room', 'Putu', 'ary@gmail.com', '12345678', 'Confirm');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
