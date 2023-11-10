-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2023 pada 03.28
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3w16`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `name`, `gender`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Ignatiyus Sihotang', 'L', '08123456789', 'Bandung', '2023-11-10 08:14:01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_category`
--

CREATE TABLE `p_category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_category`
--

INSERT INTO `p_category` (`id_category`, `name`, `created_at`, `update_at`) VALUES
(1, 'Pills', '2023-11-10 09:26:52', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `name`, `phone`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 'PT Mandira Distra Abadi', '02129725200', 'Jl. Peta Barat No. 19, Kalideres, Jakarta 11830', NULL, '2023-10-13 11:35:01', NULL),
(2, 'Dunia Cakrawala Abadi', '02122684586', 'jl.Hayam Wuruk No.127 Lantai GF2 Blok A26 No.6-7, Jakarta Barat, DKI Jakarta, Indonesia', NULL, '2023-10-13 11:38:43', NULL),
(6, 'PT INDO TECHNO MEDIC', '099932323', 'Jln. Ring Road Selatan\r\n', 'somethin\' here\r\n', '2023-11-07 09:55:14', '2023-11-10 01:51:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `level` int(11) NOT NULL COMMENT '1:admin,2:staff',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `level`, `created_at`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 1, '2023-10-09 09:30:25'),
(2, 'kasir', '8691e4fc53b99da544ce86e22acba62d13352eff', NULL, 2, '2023-10-09 09:30:25'),
(3, 'raesoxee', '8cb2237d0679ca88db6464eac60da96345513964', 'Ranggita Alya', 1, '2023-10-10 10:54:32'),
(4, 'radit', '12345', NULL, 1, '2023-10-10 10:55:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `p_category`
--
ALTER TABLE `p_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
