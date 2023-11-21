-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2023 pada 09.04
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
  `address` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `name`, `gender`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(3, 'Nunez', 'L', '0812335', 'Liverpool', '2023-11-13 13:10:17', NULL),
(4, 'Salah', 'L', '09871236', 'Egypt', '2023-11-13 13:10:40', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_category`
--

CREATE TABLE `p_category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `p_category`
--

INSERT INTO `p_category` (`id_category`, `name`, `created_at`, `update_at`) VALUES
(11, 'Obat', '2023-11-13 12:52:02', NULL),
(12, 'Makanan', '2023-11-13 14:30:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_item`
--

CREATE TABLE `p_item` (
  `id_item` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `id_category` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `image` varchar(100) DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT current_timestamp(),
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `p_item`
--

INSERT INTO `p_item` (`id_item`, `barcode`, `name`, `id_category`, `id_unit`, `price`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(14, 'A001', 'Paramex', 11, 2, 5000, 22, 'item-231114-e8cd559731.jpg', 2147483647, NULL),
(16, 'A002', 'Bodrex', 11, 2, 4500, 39, 'item-231115-13f54d7b77.png', 2147483647, NULL),
(17, 'A003', 'Ultraflu', 11, 2, 5000, 0, 'item-231115-5a22429cb0.png', 2147483647, NULL),
(18, 'A004', 'Paracetamol', 11, 2, 3000, 0, 'item-231115-00ba39322c.png', 2147483647, NULL),
(19, 'A005', 'Mylanta', 11, 2, 5000, 0, 'item-231115-f3a9d67f61.png', 2147483647, NULL),
(20, 'A006', 'Amoxilin', 11, 2, 5500, 0, 'item-231115-8ae92307e7.png', 2147483647, NULL),
(21, 'A007', 'Aspirin', 11, 2, 4500, 0, 'item-231115-d4f3eadc40.png', 2147483647, NULL),
(22, 'A008', 'Lambucid', 11, 2, 6000, 0, 'item-231115-14a9d7dd80.png', 2147483647, NULL),
(23, 'A009', 'Oskadon', 11, 2, 3500, 0, 'item-231115-508f6fb6d1.png', 2147483647, NULL),
(24, 'A010', 'Diapet', 11, 2, 10000, 0, 'item-231115-4f6fa35d41.png', 2147483647, NULL),
(25, 'B001', 'Entrostop', 11, 2, 6500, 0, 'item-231115-8fb7d5e114.png', 2147483647, NULL),
(26, 'B002', 'Apel', 12, 3, 7000, 0, 'item-231115-f681494207.png', 2147483647, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_unit`
--

CREATE TABLE `p_unit` (
  `id_unit` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `p_unit`
--

INSERT INTO `p_unit` (`id_unit`, `name`, `created_at`, `update_at`) VALUES
(2, 'Pcs', '2023-11-13 14:43:06', NULL),
(3, 'Buah', '2023-11-15 13:23:42', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `name`, `phone`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 'PT Mandira Distra Abadi', '02129725200', 'Jl. Peta Barat No. 19, Kalideres, Jakarta 11830', NULL, '2023-10-13 11:35:01', NULL),
(2, 'Dunia Cakrawala Abadi', '02122684586', 'jl.Hayam Wuruk No.127 Lantai GF2 Blok A26 No.6-7, Jakarta Barat, DKI Jakarta, Indonesia', NULL, '2023-10-13 11:38:43', NULL),
(6, 'PT INDO TECHNO MEDIC', '099932323', 'Jln. Ring Road Selatan\r\n', 'somethin\' here\r\n', '2023-11-07 09:55:14', '2023-11-10 01:51:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_stock`
--

CREATE TABLE `t_stock` (
  `id_stock` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(500) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_stock`
--

INSERT INTO `t_stock` (`id_stock`, `id_item`, `type`, `detail`, `id_supplier`, `qty`, `date`, `created_at`, `id_user`) VALUES
(1, 14, 'in', 'no', 1, 20, '2023-11-21', '2023-11-21 14:06:46', 1),
(2, 14, 'in', 'no', 1, 20, '2023-11-21', '2023-11-21 14:10:07', 1),
(3, 14, 'in', 'add', 1, 2, '2023-11-21', '2023-11-21 14:11:10', 1),
(4, 16, 'in', 'add', 6, 39, '2023-11-21', '2023-11-21 15:01:58', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indeks untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`id_item`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `p_category`
--
ALTER TABLE `p_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `p_item`
--
ALTER TABLE `p_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `p_category` (`id_category`),
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `p_unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `p_item` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
