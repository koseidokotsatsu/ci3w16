-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jan 2024 pada 23.19
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
  `phone` varchar(125) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `name`, `gender`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(5, 'Muhammad Hanif Nur A.', 'L', '(+62) 812-2671-8705', 'Gelang Keling, Jepara', '2023-12-19 13:24:54', '2024-01-23 04:17:37');

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
(13, 'Obat Bebas', '2023-12-19 13:25:46', NULL),
(14, 'Obat Keras', '2023-12-19 13:25:50', NULL),
(15, 'Obat Wajib Apotek (OWA)', '2023-12-19 13:25:55', NULL),
(16, 'Obat Golongan Narkotika', '2023-12-19 13:26:02', NULL),
(17, 'Obat Psikotropika', '2023-12-19 13:26:12', NULL),
(18, 'Obat Herbal', '2023-12-19 13:26:16', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_general_name`
--

CREATE TABLE `p_general_name` (
  `id_general_name` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `p_general_name`
--

INSERT INTO `p_general_name` (`id_general_name`, `name`, `created_at`, `update_at`) VALUES
(1, 'Paracetamol', '2023-12-19 14:01:26', NULL),
(2, 'Asam Mefenamat', '2023-12-19 14:01:38', NULL),
(3, 'Sertraline', '2023-12-19 14:01:48', NULL),
(4, 'Ibuprofen', '2023-12-19 14:01:56', NULL),
(5, 'Amoksisilin', '2023-12-19 14:02:06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_item`
--

CREATE TABLE `p_item` (
  `id_item` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `id_general_name` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_category` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `image` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `p_item`
--

INSERT INTO `p_item` (`id_item`, `barcode`, `id_general_name`, `name`, `id_category`, `id_type`, `id_unit`, `price`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(27, 'P00001', 1, 'Panadol 500mg', 13, 1, 11, 12500, 88, 'item-231219-30b2d8f30e.png', '2023-12-19 17:50:00', '2024-01-22 05:55:00'),
(29, 'P00002', 2, 'Ponstan 500 mg 10 Tablet', 14, 2, 13, 38000, 154, 'item-231219-5d3466bfe1.jpg', '2023-12-19 21:54:20', '2023-12-19 15:54:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_type`
--

CREATE TABLE `p_type` (
  `id_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `p_type`
--

INSERT INTO `p_type` (`id_type`, `name`, `created_at`, `update_at`) VALUES
(1, 'Obat cair', '2023-12-19 13:47:43', NULL),
(2, 'Tablet', '2023-12-19 13:47:48', NULL),
(3, 'Kapsul', '2023-12-19 13:47:53', NULL),
(4, 'Obat oles', '2023-12-19 13:47:58', NULL),
(5, 'Supositoria', '2023-12-19 13:48:03', NULL),
(6, 'Obat tetes', '2023-12-19 13:48:08', NULL),
(7, 'Inhaler', '2023-12-19 13:48:13', NULL),
(8, 'Obat suntik', '2023-12-19 13:48:18', NULL),
(9, 'Implan atau obat tempel', '2023-12-19 13:48:23', NULL),
(10, 'Tablet bukal atau sublingual', '2023-12-19 13:48:32', NULL),
(11, 'Analgesik', '2023-12-19 13:48:46', NULL),
(12, 'Antasida', '2023-12-19 13:48:52', NULL),
(13, 'Anticemas', '2023-12-19 13:48:57', NULL),
(14, 'Anti-aritmia', '2023-12-19 13:49:02', NULL),
(15, 'Antibiotik', '2023-12-19 13:49:07', NULL),
(16, 'Antikoagulan dan trombolitik', '2023-12-19 13:49:12', NULL),
(17, 'Antikonvulsan', '2023-12-19 13:49:20', NULL),
(18, 'Antidepresan', '2023-12-19 13:49:24', NULL),
(19, 'Antidiare', '2023-12-19 13:49:28', NULL),
(20, 'Anti-emetik', '2023-12-19 13:49:33', NULL),
(21, 'Antijamur', '2023-12-19 13:49:37', NULL),
(22, 'Antihistamin', '2023-12-19 13:49:43', NULL),
(23, 'Antihipertensi', '2023-12-19 13:49:55', NULL),
(24, 'Anti-inflamasi', '2023-12-19 13:50:00', NULL),
(25, 'Antineoplastik', '2023-12-19 13:50:10', NULL),
(26, 'Antipsikotik', '2023-12-19 13:50:16', NULL),
(27, 'Beta-blocker', '2023-12-19 13:50:23', NULL),
(28, 'Bronkodilator', '2023-12-19 13:50:28', NULL),
(29, 'Kortikosteroid', '2023-12-19 13:50:33', NULL),
(30, 'Sitotoksik', '2023-12-19 13:50:38', NULL),
(31, 'Dekongestan', '2023-12-19 13:50:45', NULL),
(32, 'Ekspektoran', '2023-12-19 13:50:49', NULL),
(33, 'Obat tidur', '2023-12-19 13:50:54', NULL);

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
(11, 'PCS', '2023-12-19 13:30:55', NULL),
(12, 'BOTOL', '2023-12-19 13:30:59', NULL),
(13, 'UNIT', '2023-12-19 13:31:05', NULL);

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
(9, 'PT First Medipharma', '(+62) 31-896381', 'Jl. Raya Sumorame No.41, Sumotuwo, Sumorame, Kec. Candi, Kabupaten Sidoarjo, Jawa Timur 61271', NULL, '2023-12-19 13:18:21', NULL),
(10, 'PT IFARS Pharmaceutical', '(0271) 668616', 'Jl. Raya Solo-Sragen KM 14,9 KEBAKKRAMAT, SOLO 55762 ', '- Solid (tablet, caplet and capsule)\r\n- Liquid (syrup, etc)\r\n- Semi-solid (cream, gel and ointment)', '2023-12-19 13:20:59', NULL),
(11, 'PT BERLICO Mulia Farma', '(0274) 4986829', 'Jl. Raya Solo - Yogyakarta No.KM.10, RW.6, Cupuwatu I, Purwomartani, Kec. Kalasan, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55571', 'Amoxicillin Kaplet\r\nBerlimox Kaplet\r\nDolo-licobion', '2023-12-19 13:22:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_payment`
--

CREATE TABLE `t_payment` (
  `id_transaction` int(11) NOT NULL,
  `id_sale` int(5) NOT NULL,
  `id_item` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `sub_total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_payment`
--

INSERT INTO `t_payment` (`id_transaction`, `id_sale`, `id_item`, `qty`, `price`, `sub_total`) VALUES
(3, 50, 16, 3, 4500, 13500),
(4, 51, 27, 96, 12240, 12240),
(5, 52, 27, 96, 12240, 12240),
(6, 53, 27, 96, 12240, 12240),
(7, 54, 27, 96, 12240, 12240),
(8, 57, 27, 96, 12240, 24480),
(9, 59, 27, 96, 12240, 12240),
(10, 60, 27, 96, 12240, 12240),
(11, 61, 27, 96, 12240, 36720),
(12, 62, 27, 4, 12240, 48960),
(13, 64, 27, 4, 12240, 48960),
(14, 65, 27, 3, 12500, 37500),
(15, 66, 29, 12, 38000, 456000),
(20, 70, 27, 1, 12500, 12500),
(21, 70, 29, 1, 38000, 38000),
(22, 71, 29, 6, 38000, 228000),
(23, 72, 29, 5, 38000, 190000),
(24, 74, 29, 5, 38000, 190000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sale`
--

CREATE TABLE `t_sale` (
  `id_sale` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `customer_name` varchar(35) NOT NULL,
  `total_early` bigint(20) NOT NULL,
  `total_final` bigint(20) NOT NULL,
  `discount` bigint(20) NOT NULL,
  `cash` bigint(20) NOT NULL,
  `remain` bigint(20) NOT NULL,
  `note` varchar(100) DEFAULT NULL,
  `date_tf` date NOT NULL,
  `hour_tf` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_sale`
--

INSERT INTO `t_sale` (`id_sale`, `invoice`, `customer_name`, `total_early`, `total_final`, `discount`, `cash`, `remain`, `note`, `date_tf`, `hour_tf`) VALUES
(70, 'MP2401170001', 'Umum', 50500, 49000, 1500, 50000, 1000, 'Sassy Baka', '2024-01-17', '13:44:47'),
(71, 'MP2401220001', 'Umum', 228000, 220000, 8000, 220000, 0, '', '2024-01-22', '04:06:03'),
(72, 'MP2401220002', 'Umum', 190000, 189000, 1000, 200000, 11000, '', '2024-01-22', '05:56:58'),
(73, 'MP2401220003', 'Umum', 190000, 185000, 5000, 200000, 15000, '', '2024-01-22', '07:32:43'),
(74, 'MP2401220004', 'Umum', 190000, 175000, 15000, 175000, 0, '', '2024-01-22', '07:33:34');

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
(8, 27, 'in', 'Supply', 11, 100, '2023-12-19', '2023-12-19 20:21:59', 6),
(9, 29, 'in', 'Supply', 10, 200, '2023-12-19', '2023-12-19 21:58:59', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1:admin,2:staff',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `img`, `level`, `created_at`) VALUES
(1, 'admin', '8cb2237d0679ca88db6464eac60da96345513964', 'admin', 'default.jpg', 1, '2023-10-09 09:30:25'),
(6, 'raesoxee', '8cb2237d0679ca88db6464eac60da96345513964', 'Ranggita Putri Alya', '2_21.gif', 1, '2023-12-18 09:58:05'),
(7, 'radityaabib', '8cb2237d0679ca88db6464eac60da96345513964', 'Raditya Abib', '1_21.gif', 1, '2023-12-19 13:08:42'),
(8, 'qoqon', '8cb2237d0679ca88db6464eac60da96345513964', 'Muhammad Furqon ', 'Screenshot_3712.png', 2, '2023-12-19 13:10:43'),
(10, 'tested', '8cb2237d0679ca88db6464eac60da96345513964', 'Tested', 'aea72c4777a405dde87b7741b8a8552a1.gif', 2, '2024-01-31 08:06:26');

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
-- Indeks untuk tabel `p_general_name`
--
ALTER TABLE `p_general_name`
  ADD PRIMARY KEY (`id_general_name`);

--
-- Indeks untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`id_item`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `p_type`
--
ALTER TABLE `p_type`
  ADD PRIMARY KEY (`id_type`);

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
-- Indeks untuk tabel `t_payment`
--
ALTER TABLE `t_payment`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indeks untuk tabel `t_sale`
--
ALTER TABLE `t_sale`
  ADD PRIMARY KEY (`id_sale`);

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
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `p_category`
--
ALTER TABLE `p_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `p_general_name`
--
ALTER TABLE `p_general_name`
  MODIFY `id_general_name` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `p_item`
--
ALTER TABLE `p_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `p_type`
--
ALTER TABLE `p_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `t_payment`
--
ALTER TABLE `t_payment`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `t_sale`
--
ALTER TABLE `t_sale`
  MODIFY `id_sale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
