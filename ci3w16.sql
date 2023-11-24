-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2023 pada 02.15
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
-- Database: `ci3w6-2`
--
CREATE DATABASE IF NOT EXISTS `ci3w6-2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ci3w6-2`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_menu`
--

CREATE TABLE `access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `access_menu`
--

INSERT INTO `access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(10, 1, 3),
(11, 1, 5),
(12, 1, 6),
(15, 2, 7),
(16, 1, 7),
(17, 2, 2),
(18, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `create_generic_name`
--

CREATE TABLE `create_generic_name` (
  `generic_id` int(11) NOT NULL,
  `generic` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `create_generic_name`
--

INSERT INTO `create_generic_name` (`generic_id`, `generic`) VALUES
(1, 'Paracetamol'),
(3, 'Amoxicillin'),
(4, 'Omeprazole'),
(5, 'Dimenhidrinat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `create_meds_name`
--

CREATE TABLE `create_meds_name` (
  `meds_name_id` int(11) NOT NULL,
  `meds_name` varchar(50) NOT NULL,
  `generic_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `create_meds_name`
--

INSERT INTO `create_meds_name` (`meds_name_id`, `meds_name`, `generic_name`) VALUES
(1, 'Paracetamol', 'Paracetamol'),
(3, 'Dramamine', 'Dimenhidrinat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `create_meds_presentation`
--

CREATE TABLE `create_meds_presentation` (
  `meds_presentation_id` int(11) NOT NULL,
  `meds_presentation` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `create_meds_presentation`
--

INSERT INTO `create_meds_presentation` (`meds_presentation_id`, `meds_presentation`) VALUES
(1, 'Capsule'),
(2, 'Tablet'),
(3, 'Liquid / Syrup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `create_supplier`
--

CREATE TABLE `create_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(250) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `previous_due` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `create_supplier`
--

INSERT INTO `create_supplier` (`supplier_id`, `supplier_name`, `mobile`, `address`, `previous_due`) VALUES
(2, 'Beximco Pharmaceuticals Ltd.', '025861100', 'North America', 490);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(6, 'Create'),
(7, 'Invent');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_info`
--

CREATE TABLE `purchase_info` (
  `purchase_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `particulars` varchar(255) DEFAULT NULL,
  `meds_name_id` int(11) DEFAULT NULL,
  `meds_name` varchar(100) DEFAULT NULL,
  `generic_id` int(11) DEFAULT NULL,
  `generic` varchar(100) DEFAULT NULL,
  `meds_presentation_id` int(11) DEFAULT NULL,
  `meds_presentation` varchar(100) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `qty` float DEFAULT NULL,
  `purchase_price` float DEFAULT NULL,
  `unit_sales_price` float DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `purchase_paid` float DEFAULT NULL,
  `purchase_due` float DEFAULT NULL,
  `expiredate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `purchase_info`
--

INSERT INTO `purchase_info` (`purchase_id`, `date`, `particulars`, `meds_name_id`, `meds_name`, `generic_id`, `generic`, `meds_presentation_id`, `meds_presentation`, `supplier_id`, `supplier`, `unit_price`, `qty`, `purchase_price`, `unit_sales_price`, `unit`, `purchase_paid`, `purchase_due`, `expiredate`) VALUES
(1, '2023-09-01', 'Purchase Medicine', NULL, 'Panadol', NULL, 'Paracetamol', NULL, 'Tablet', NULL, 'Kimia Farma', NULL, NULL, 900, NULL, 'Pcs', 800, 100, '2024-09-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Sales'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'ti ti-home-2', 1),
(2, 2, 'My Profile', 'user', 'ti ti-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'ti ti-user-edit', 1),
(4, 3, 'Menu', 'menu', 'ti ti-folder', 1),
(5, 3, 'SubMenu', 'menu/submenu', 'ti ti-folder-open', 1),
(16, 1, 'Access', 'admin/role', 'ti ti-lock-access', 1),
(18, 6, 'Medicine Presentation', 'create/meds_presentation', 'ti ti-pill', 1),
(19, 6, 'Generic Name', 'create/generic_name', 'ti ti-medical-cross-circle', 1),
(20, 6, 'Medicine Name', 'create/meds_name', 'ti ti-pills', 1),
(21, 6, 'Supplier', 'create/supplier', 'ti ti-truck', 1),
(22, 1, 'User', 'admin/user', 'ti ti-users', 1),
(23, 7, 'Insert Medicine Info.', 'invent/meds_purchase_info', 'ti ti-pills', 1),
(24, 7, 'Purchase Statement', 'invent/purchase_statement', 'ti ti-circle-plus', 1),
(25, 7, 'Supplier Payment', 'invent/supplier_payment', 'ti ti-pill', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `date_created`) VALUES
(1, 'raesoxee', 'ranggitaalya@gmail.com', 'blox.jpg', '$2y$10$yWNc0v.H6VEjMRTPNsJJ4u79gj35LBVjntf1IYOpChM//0VZbUpGa', 1, 1692029789),
(3, 'Raditya Abib Shanau', 'abibgamer30@gmail.com', 'shock_nigga.jpg', '$2y$10$UBrlDNIHgyAtWy/XG.7Hee.Jf9AfJVaMp16AV7bRxMBbTPQqMdLa2', 2, 1692678659);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `access_menu`
--
ALTER TABLE `access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `create_generic_name`
--
ALTER TABLE `create_generic_name`
  ADD PRIMARY KEY (`generic_id`);

--
-- Indeks untuk tabel `create_meds_name`
--
ALTER TABLE `create_meds_name`
  ADD PRIMARY KEY (`meds_name_id`);

--
-- Indeks untuk tabel `create_meds_presentation`
--
ALTER TABLE `create_meds_presentation`
  ADD PRIMARY KEY (`meds_presentation_id`);

--
-- Indeks untuk tabel `create_supplier`
--
ALTER TABLE `create_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `purchase_info`
--
ALTER TABLE `purchase_info`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `access_menu`
--
ALTER TABLE `access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `create_generic_name`
--
ALTER TABLE `create_generic_name`
  MODIFY `generic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `create_meds_name`
--
ALTER TABLE `create_meds_name`
  MODIFY `meds_name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `create_meds_presentation`
--
ALTER TABLE `create_meds_presentation`
  MODIFY `meds_presentation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `create_supplier`
--
ALTER TABLE `create_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `purchase_info`
--
ALTER TABLE `purchase_info`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `ci3w8`
--
CREATE DATABASE IF NOT EXISTS `ci3w8` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ci3w8`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `level` int(11) NOT NULL COMMENT '1:admin, 2:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Ranggita Putri Alya Pradini', 'Jetis, Bantul, Yogyakarta', 1),
(2, 'kasir', '8691e4fc53b99da544ce86e22acba62d13352eff', 'Raditya Abib Shanau', 'Keling, Jepara, Jawa Tengah', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `ci3w10`
--
CREATE DATABASE IF NOT EXISTS `ci3w10` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ci3w10`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role_id`) VALUES
(2, 'raesoxee', '$2y$10$XsSbFWpsLoAe.cYmW.4ge.4Z1516jfZBL0t6s3ISAqg6eKAUlrxjG', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `ci3w16`
--
CREATE DATABASE IF NOT EXISTS `ci3w16` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ci3w16`;

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
(16, 'A002', 'Bodrex', 11, 2, 4500, 9, 'item-231115-13f54d7b77.png', 2147483647, NULL),
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
-- Struktur dari tabel `t_sale`
--

CREATE TABLE `t_sale` (
  `id_sale` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_sale`
--

INSERT INTO `t_sale` (`id_sale`, `invoice`, `id_customer`, `total_price`, `discount`, `final_price`, `cash`, `remaining`, `note`, `date`, `id_user`, `created_at`) VALUES
(1, 'MP2311230001', NULL, 10000, 0, 10000, 20000, 10000, 'fucek', '2023-11-24', 4, '2023-11-23 19:08:55');

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
(5, 16, 'in', 'kulakan', 6, 10, '2023-11-23', '2023-11-23 19:47:24', 1),
(6, 16, 'out', 'rusak', NULL, 1, '2023-11-23', '2023-11-23 19:47:52', 1);

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
-- AUTO_INCREMENT untuk tabel `t_sale`
--
ALTER TABLE `t_sale`
  MODIFY `id_sale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
--
-- Database: `pharmacigt`
--
CREATE DATABASE IF NOT EXISTS `pharmacigt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pharmacigt`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'D00F5D5217896FB7FD601412CB890830');

-- --------------------------------------------------------

--
-- Struktur dari tabel `create_generic_name`
--

CREATE TABLE `create_generic_name` (
  `generic_id` int(100) NOT NULL,
  `generic_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `create_generic_name`
--

INSERT INTO `create_generic_name` (`generic_id`, `generic_name`) VALUES
(1, 'Antiviral'),
(7, 'Paracetamol'),
(8, 'Amlodipine'),
(9, 'Latanoprost Solution'),
(10, 'Levocetirizine Dihydrochloride'),
(11, 'Meloxicam'),
(12, 'Acyclovir Capsule'),
(13, 'Simvastatin Tablets');

-- --------------------------------------------------------

--
-- Struktur dari tabel `create_medicine_name`
--

CREATE TABLE `create_medicine_name` (
  `medicine_name_id` int(20) NOT NULL,
  `medicine_name` varchar(50) DEFAULT NULL,
  `generic_id` int(20) DEFAULT NULL,
  `generic_name` varchar(50) DEFAULT NULL,
  `medicine_presentation_id` int(15) DEFAULT NULL,
  `medicine_presentation_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `create_medicine_name`
--

INSERT INTO `create_medicine_name` (`medicine_name_id`, `medicine_name`, `generic_id`, `generic_name`, `medicine_presentation_id`, `medicine_presentation_name`) VALUES
(1, 'Antiva®', NULL, 'Antiviral', NULL, NULL),
(2, 'Napa Extra', NULL, 'Paracetamol', NULL, NULL),
(3, 'Ace Plus', NULL, 'Paracetamol', NULL, NULL),
(6, 'Amdocal 10', NULL, 'Amlodipine', NULL, NULL),
(7, 'Amdocal 5', NULL, 'Amlodipine', NULL, NULL),
(8, 'Notem Plus', NULL, 'Paracetamol', NULL, NULL),
(9, 'Niko', NULL, 'Paracetamol', NULL, NULL),
(10, 'Xalatan', NULL, 'Latanoprost Solution', NULL, NULL),
(11, 'Xyzal', NULL, 'Levocetirizine Dihydrochloride', NULL, NULL),
(12, 'Mobic', NULL, 'Meloxicam', NULL, NULL),
(13, 'Zovirax', NULL, 'Acyclovir Capsule', NULL, NULL),
(14, 'Zocor', NULL, 'Simvastatin Tablets', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `create_medicine_presentation`
--

CREATE TABLE `create_medicine_presentation` (
  `medicine_presentation_id` int(20) NOT NULL,
  `medicine_presentation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `create_medicine_presentation`
--

INSERT INTO `create_medicine_presentation` (`medicine_presentation_id`, `medicine_presentation`) VALUES
(1, 'Capsule'),
(2, 'Tablet'),
(4, 'Liquid / Syrup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `create_product_category`
--

CREATE TABLE `create_product_category` (
  `record_id` int(100) NOT NULL,
  `product_category` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `create_product_category`
--

INSERT INTO `create_product_category` (`record_id`, `product_category`) VALUES
(1, 'Surgical Product'),
(3, 'Savlon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `create_product_name`
--

CREATE TABLE `create_product_name` (
  `record_id` int(100) NOT NULL,
  `product_category` varchar(250) NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `create_product_name`
--

INSERT INTO `create_product_name` (`record_id`, `product_category`, `product_name`) VALUES
(1, 'Surgical Product', 'Sterile Surgical Gloves');

-- --------------------------------------------------------

--
-- Struktur dari tabel `create_supplier`
--

CREATE TABLE `create_supplier` (
  `supplier_id` int(100) NOT NULL,
  `supplier_name` varchar(250) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `previous_due` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `create_supplier`
--

INSERT INTO `create_supplier` (`supplier_id`, `supplier_name`, `mobile`, `address`, `previous_due`) VALUES
(1, 'Unilever Bangladesh Limited', ' +880 2 988 8452  ', 'ZN Tower, Plot# 02  \r\nRoad # 08, Gulshan - 1  \r\nDhaka - 1212.  ', 0),
(2, 'ACI Pharmaceuticals', '(+8802) 8878603', '89 Gulshan Ave, Dhaka 1212', 0),
(3, 'Square Pharmaceuticals', '+88-02-8833047-56', '48, Mohakhali C/A Dhaka 1212', 0),
(4, 'Beximco Pharmaceuticals Ltd.', '02-58611001', 'Dhaka', 0),
(5, 'XYZ Pharmaceuticals Ltd', '7850125690', 'Allace Avenue', 2699),
(6, 'Acezm Pharmaceuticals', '7410256900', '2610 Courtright Street', 9666),
(7, 'Ademez Pharmaceuticals', '7890240010', '3667 Jerome Avenue', 990);

-- --------------------------------------------------------

--
-- Struktur dari tabel `insert_purchase_info`
--

CREATE TABLE `insert_purchase_info` (
  `purchase_id` int(20) NOT NULL,
  `date` date DEFAULT NULL,
  `invoice_id` int(20) DEFAULT NULL,
  `particulars` varchar(50) DEFAULT NULL,
  `medicine_presentation_id` int(20) DEFAULT NULL,
  `medicine_presentation` varchar(50) DEFAULT NULL,
  `medicine_name_id` int(20) DEFAULT NULL,
  `medicine_name` varchar(50) DEFAULT NULL,
  `generic_id` int(20) DEFAULT NULL,
  `generic_name` varchar(50) DEFAULT NULL,
  `supplier_id` int(20) DEFAULT NULL,
  `supplier_name` varchar(50) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `qty` float DEFAULT NULL,
  `purchase_price` float DEFAULT NULL,
  `unit_sales_price` float DEFAULT NULL,
  `unit` varchar(11) NOT NULL,
  `purchase_paid` float DEFAULT NULL,
  `purchase_due` float DEFAULT NULL,
  `expiredate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `insert_purchase_info`
--

INSERT INTO `insert_purchase_info` (`purchase_id`, `date`, `invoice_id`, `particulars`, `medicine_presentation_id`, `medicine_presentation`, `medicine_name_id`, `medicine_name`, `generic_id`, `generic_name`, `supplier_id`, `supplier_name`, `unit_price`, `qty`, `purchase_price`, `unit_sales_price`, `unit`, `purchase_paid`, `purchase_due`, `expiredate`) VALUES
(10, '2019-03-29', NULL, 'Purchase Medicine', 2, 'Tablet', 3, 'Ace Plus', 7, 'Paracetamol', 5, 'Square Pharmaceuticals Ltd.', 2.52, 185, 504, 3, 'Pcs', 350, 154, '2021-01-01'),
(12, '2019-03-30', NULL, 'Purchase Medicine', 2, 'Tablet', 2, 'Napa Extra', 7, 'Paracetamol', 4, 'Beximco Pharmaceuticals Ltd.', 2.5, 200, 500, 3, 'Pcs', 300, 200, '2020-01-01'),
(13, '2019-04-05', NULL, 'Purchase Medicine', NULL, 'Tablet', NULL, 'Amdocal 10', NULL, 'Amlodipine', NULL, 'Beximco Pharmaceuticals Ltd.', 6, 60, 360, 7, 'Pcs', 300, 60, '2019-04-01'),
(19, '2019-04-06', NULL, 'Payment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Beximco Pharmaceuticals Ltd.', NULL, NULL, 0, NULL, '', 5, 255, NULL),
(20, '2019-04-06', NULL, 'Updated Purchase', NULL, 'Tablet', NULL, 'Amdocal 5', NULL, 'Amlodipine', NULL, 'Beximco Pharmaceuticals Ltd.', 4, 200, 800, 4.5, '5 gm', 500, 300, '2019-04-30'),
(21, '2021-08-03', NULL, 'Purchase Medicine', 2, 'Tablet', 9, 'Niko', 7, 'Paracetamol', 2, 'ACI Pharmaceuticals', 1, 4936, 5000, 2, '1000', 5000, 0, '2022-05-18'),
(22, '2021-08-17', NULL, 'Purchase Medicine', 4, 'Liquid / Syrup', 10, 'Xalatan', 9, 'Latanoprost Solution', 5, 'XYZ Pharmaceuticals Ltd', 89, 2100, 186900, 97, '2', 186900, 0, '2024-03-19'),
(23, '2021-08-17', NULL, 'Purchase Medicine', 2, 'Tablet', 11, 'Xyzal', 10, 'Levocetirizine Dihydrochloride', 7, 'Ademez Pharmaceuticals', 0.3, 1804, 555, 0.55, '2.5 mg/5 mL', 555, 0, '2025-10-15'),
(24, '2021-08-17', NULL, 'Purchase Medicine', 1, 'Capsule', 13, 'Zovirax', 12, 'Acyclovir Capsule', 5, 'XYZ Pharmaceuticals Ltd', 4.99, 1566, 7814.34, 5.45, '30 grams', 7814, 0.34, '2024-12-26'),
(25, '2021-08-17', NULL, 'Purchase Medicine', 2, 'Tablet', 14, 'Zocor', 13, 'Simvastatin Tablets', 6, 'Acezm Pharmaceuticals', 6, 1800, 10800, 7.55, '30', 5210, 5590, '2025-10-16'),
(26, '2023-08-24', NULL, 'Purchase Medicine', 1, 'Capsule', 10, 'Xalatan', 7, 'Paracetamol', 5, 'XYZ Pharmaceuticals Ltd', 20, 500, 720, 7, 'Pcs', 620, 100, '2024-07-19'),
(27, '2023-09-21', NULL, 'Purchase Medicine', 2, 'Tablet', 9, 'Niko', 9, 'Latanoprost Solution', 6, 'Acezm Pharmaceuticals', 3, 300, 900, 1, 'Pcs', 900, 900, '2024-09-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_product`
--

CREATE TABLE `sales_product` (
  `sales_id` int(20) NOT NULL,
  `date` date DEFAULT NULL,
  `invoice` int(20) DEFAULT NULL,
  `particular` varchar(50) DEFAULT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(11) NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `medicine_presentation_id` int(20) DEFAULT NULL,
  `medicine_presentation` varchar(50) DEFAULT NULL,
  `medicine_name_id` int(20) DEFAULT NULL,
  `medicine_name` varchar(50) DEFAULT NULL,
  `generic_id` int(20) DEFAULT NULL,
  `generic_name` varchar(50) DEFAULT NULL,
  `qty` int(20) DEFAULT NULL,
  `unit_sales_price` float DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `total_discount` float DEFAULT NULL,
  `discount_price` float DEFAULT NULL,
  `sales_paid` float DEFAULT NULL,
  `sales_due` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sales_product`
--

INSERT INTO `sales_product` (`sales_id`, `date`, `invoice`, `particular`, `customer_id`, `customer_name`, `mobile`, `customer_email`, `medicine_presentation_id`, `medicine_presentation`, `medicine_name_id`, `medicine_name`, `generic_id`, `generic_name`, `qty`, `unit_sales_price`, `total_price`, `total_amount`, `total_discount`, `discount_price`, `sales_paid`, `sales_due`) VALUES
(1, '2019-04-06', 1, 'Sales Medicine', NULL, NULL, '', 'bmmahmud@gmail.com', NULL, 'Tablet', 3, 'Ace Plus', NULL, 'Paracetamol', 10, 3, 30, 120, 5, 115, 115, NULL),
(2, '2019-04-06', 1, 'Sales Medicine', NULL, NULL, '', 'bmmahmud@gmail.com', NULL, 'Tablet', 2, 'Napa Extra', NULL, 'Paracetamol', 30, 3, 90, 120, 5, 115, 115, NULL),
(3, '2019-03-31', 2, 'Sales Medicine', NULL, NULL, '', 'bmmahmud@gmail.com', NULL, 'Tablet', 0, 'Amdocal 10', NULL, 'Amlodipine', 10, 7, 70, 70, 0, 70, 70, NULL),
(4, '2021-08-03', 3, 'Sales Medicine', NULL, NULL, '', 'bmmahmud@gmail.com', NULL, 'Tablet', 9, 'Niko', NULL, 'Paracetamol', 47, 2, 94, 94, 2, 92, 94, NULL),
(5, '2021-08-17', 4, 'Sales Medicine', NULL, NULL, '', 'testacc@gmail.com', NULL, 'Tablet', 9, 'Niko', NULL, 'Paracetamol', 17, 2, 34, 34, 0, 34, 34, NULL),
(6, '2021-08-17', 5, 'Sales Medicine', NULL, NULL, '', 'test22@gmail.com', NULL, 'Tablet', 0, 'Amdocal 5', NULL, 'Amlodipine', 66, 4.5, 297, 297, 2, 295, 295, NULL),
(7, '2021-08-17', 6, 'Sales Medicine', NULL, NULL, '', 'jamesr@gmail.com', NULL, 'Tablet', 11, 'Xyzal', NULL, 'Levocetirizine Dihydrochloride', 46, 0.55, 25.3, 25.3, 0, 25.3, 25.3, NULL),
(8, '2023-09-21', 7, 'Sales Medicine', NULL, NULL, '', 'dsadsa@sdsa.co.id', NULL, 'Tablet', 3, 'Ace Plus', NULL, 'Paracetamol', 6, 3, 18, 18, 1, 17, 30, NULL),
(9, '2023-09-21', 8, 'Sales Medicine', NULL, NULL, '', '', NULL, 'Tablet', 3, 'Ace Plus', NULL, 'Paracetamol', 3, 3, 9, 9, 0, 9, 9, NULL),
(10, '2023-09-21', 9, 'Sales Medicine', NULL, NULL, '', '', NULL, 'Tablet', 3, 'Ace Plus', NULL, 'Paracetamol', 3, 3, 9, 9, 0, 9, 9, NULL),
(11, '2023-09-21', 10, 'Sales Medicine', NULL, NULL, '', '', NULL, 'Tablet', 3, 'Ace Plus', NULL, 'Paracetamol', 3, 3, 9, 9, 0, 9, 9, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `identity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`, `identity`) VALUES
(2, 'johnny', '5f4dcc3b5aa765d61d8327deb882cf99', 'Staff'),
(3, 'staff', '1a1dc91c907325c69271ddf0c944bc72', 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `create_generic_name`
--
ALTER TABLE `create_generic_name`
  ADD PRIMARY KEY (`generic_id`);

--
-- Indeks untuk tabel `create_medicine_name`
--
ALTER TABLE `create_medicine_name`
  ADD PRIMARY KEY (`medicine_name_id`),
  ADD KEY `FK` (`generic_id`,`medicine_presentation_id`);

--
-- Indeks untuk tabel `create_medicine_presentation`
--
ALTER TABLE `create_medicine_presentation`
  ADD PRIMARY KEY (`medicine_presentation_id`);

--
-- Indeks untuk tabel `create_product_category`
--
ALTER TABLE `create_product_category`
  ADD PRIMARY KEY (`record_id`);

--
-- Indeks untuk tabel `create_product_name`
--
ALTER TABLE `create_product_name`
  ADD PRIMARY KEY (`record_id`);

--
-- Indeks untuk tabel `create_supplier`
--
ALTER TABLE `create_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `insert_purchase_info`
--
ALTER TABLE `insert_purchase_info`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `FK` (`medicine_presentation_id`,`medicine_name_id`,`generic_id`,`supplier_id`);

--
-- Indeks untuk tabel `sales_product`
--
ALTER TABLE `sales_product`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `FK` (`customer_id`,`medicine_presentation_id`,`medicine_name_id`,`generic_id`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `create_generic_name`
--
ALTER TABLE `create_generic_name`
  MODIFY `generic_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `create_medicine_name`
--
ALTER TABLE `create_medicine_name`
  MODIFY `medicine_name_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `create_medicine_presentation`
--
ALTER TABLE `create_medicine_presentation`
  MODIFY `medicine_presentation_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `create_product_category`
--
ALTER TABLE `create_product_category`
  MODIFY `record_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `create_product_name`
--
ALTER TABLE `create_product_name`
  MODIFY `record_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `create_supplier`
--
ALTER TABLE `create_supplier`
  MODIFY `supplier_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `insert_purchase_info`
--
ALTER TABLE `insert_purchase_info`
  MODIFY `purchase_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `sales_product`
--
ALTER TABLE `sales_product`
  MODIFY `sales_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__bookmark`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__bookmark: #1932 - Table &#039;phpmyadmin.pma__bookmark&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__bookmark: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__bookmark`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__central_columns`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__central_columns: #1932 - Table &#039;phpmyadmin.pma__central_columns&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__central_columns: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__central_columns`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__column_info`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__column_info: #1932 - Table &#039;phpmyadmin.pma__column_info&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__column_info: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__column_info`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__designer_settings`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__designer_settings: #1932 - Table &#039;phpmyadmin.pma__designer_settings&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__designer_settings: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__designer_settings`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__export_templates`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__export_templates: #1932 - Table &#039;phpmyadmin.pma__export_templates&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__export_templates: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__export_templates`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__favorite`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__favorite: #1932 - Table &#039;phpmyadmin.pma__favorite&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__favorite: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__favorite`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__history`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__history: #1932 - Table &#039;phpmyadmin.pma__history&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__history: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__history`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__navigationhiding`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__navigationhiding: #1932 - Table &#039;phpmyadmin.pma__navigationhiding&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__navigationhiding: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__navigationhiding`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__pdf_pages`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__pdf_pages: #1932 - Table &#039;phpmyadmin.pma__pdf_pages&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__pdf_pages: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__pdf_pages`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__recent`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__recent: #1932 - Table &#039;phpmyadmin.pma__recent&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__recent: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__recent`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__relation`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__relation: #1932 - Table &#039;phpmyadmin.pma__relation&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__relation: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__relation`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__savedsearches`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__savedsearches: #1932 - Table &#039;phpmyadmin.pma__savedsearches&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__savedsearches: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__savedsearches`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_coords`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__table_coords: #1932 - Table &#039;phpmyadmin.pma__table_coords&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__table_coords: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__table_coords`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_info`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__table_info: #1932 - Table &#039;phpmyadmin.pma__table_info&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__table_info: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__table_info`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_uiprefs`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__table_uiprefs: #1932 - Table &#039;phpmyadmin.pma__table_uiprefs&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__table_uiprefs: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__table_uiprefs`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__tracking`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__tracking: #1932 - Table &#039;phpmyadmin.pma__tracking&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__tracking: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__tracking`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__userconfig`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__userconfig: #1932 - Table &#039;phpmyadmin.pma__userconfig&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__userconfig: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__userconfig`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__usergroups`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__usergroups: #1932 - Table &#039;phpmyadmin.pma__usergroups&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__usergroups: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__usergroups`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__users`
--
-- Kesalahan membaca struktur untuk tabel phpmyadmin.pma__users: #1932 - Table &#039;phpmyadmin.pma__users&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel phpmyadmin.pma__users: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__users`&#039; at line 1
--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `nama_akses` varchar(25) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id_akses`, `nama_akses`, `deskripsi`) VALUES
(1, 'administrator', 'sebagai  pengelola kendali penuh pada sistem aplikasi'),
(2, 'Asisten admin', 'sebagai pengelola sistem stok barang, penjualan dan laporan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `nama_bank` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id`, `nama_bank`) VALUES
(1, 'MANDIRI'),
(2, 'BNI'),
(3, 'BCA'),
(4, 'BRI'),
(5, 'CIMB Niaga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `ukuran` varchar(5) NOT NULL,
  `harga` int(20) NOT NULL,
  `foto` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `ukuran`, `harga`, `foto`) VALUES
(60, 'corporate putih', 1, ' 1', 130000, '50a05ae4c648ae9f156baa2d2eccbf3d.jpg'),
(61, 'Kemeja Abu', 1, ' 1', 120000, 'ac5e9655751e25e040d62b34da48ca1c.jpg'),
(62, 'maron batik', 13, ' 1', 135000, '8af2182ab96e03ecd51d1a0d3bac8ad2.jpg'),
(63, 'pouch', 18, ' 6', 750000, 'd2c7b9f96c9f4d5be63b71d5b101c2e6.jpg'),
(64, 'net tv maron', 13, ' 1', 130000, 'cb32365e88d8bc26f45c1d20778a66b8.jpg'),
(65, 'hitam polet', 1, ' 1', 125000, 'e42b0852f75a46a76f334ca5aeb2119b.jpg'),
(66, 'lanyard biru', 4, ' 6', 90000, '87f697b2d661bd8e2459881005575df7.jpg'),
(67, 'jaket corporate ', 16, ' 1', 185000, '1efd34720f6cd9ddca2669621d304b2b.jpg'),
(68, 'pink batik', 1, '1', 135000, 'd09855212d1391c91617afd1f69dfe5b.jpg'),
(69, 'kaos agen', 20, ' 1', 65000, '0f5abf1175fb30473a143d3b3fed97f3.jpg'),
(70, 'celana pdh', 14, ' 6', 199000, '09f0aed4d156644951cf74b0e5f3b981.jpg'),
(71, 'brico', 17, ' 6', 99000, 'fdf26e9e34cce566aaf365f36f31d88a.jpg'),
(72, 'jaket biru', 11, ' 3', 90000, '32c1bb22ba2c6c1ac9424d4dc5946266.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `no_trf` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(35) NOT NULL,
  `totalpure` bigint(20) NOT NULL,
  `grand_total` bigint(20) NOT NULL,
  `diskon` int(3) NOT NULL,
  `bayar` bigint(20) NOT NULL,
  `kembalian` bigint(20) NOT NULL,
  `catatan` varchar(50) NOT NULL,
  `tgl_trf` date NOT NULL,
  `jam_trf` time NOT NULL,
  `id_pembayaran` int(2) NOT NULL,
  `no_rek` int(18) DEFAULT NULL,
  `atas_nama` varchar(35) NOT NULL,
  `id_bank` int(2) DEFAULT NULL,
  `operator` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `no_trf`, `nama_pelanggan`, `totalpure`, `grand_total`, `diskon`, `bayar`, `kembalian`, `catatan`, `tgl_trf`, `jam_trf`, `id_pembayaran`, `no_rek`, `atas_nama`, `id_bank`, `operator`) VALUES
(3, 'C20190803001', 'qerqerqwer', 1135000, 1100950, 3, 9000000, 7899050, 'qerqerqer', '2019-08-03', '02:01:12', 1, 0, '', NULL, 'admin'),
(4, 'C20190803003', 'wdsfsdgsfgf', 385000, 377300, 2, 45454545, 45077245, 'twertwetwet', '2019-08-03', '05:42:58', 1, 0, '', 0, 'admin'),
(5, 'C20190804004', 'wewewerwer', 250000, 242500, 3, 34343334, 34100834, 'asdsfasdfasdffa', '2019-08-04', '05:45:16', 1, 0, '', NULL, 'admin'),
(6, 'T20190901005', 'adwqrr', 505000, 489850, 3, 3000000, 2510150, 'asdfasdf', '2019-09-01', '19:38:54', 2, 2147483647, 'qrqerqr', 4, 'admin'),
(7, 'T20190810006', 'ljkjlkj', 1875000, 1762500, 6, 900000000, 898237500, 'hjkhkj', '2019-08-10', '23:55:13', 2, 2147483647, 'GHJHJGH', 3, 'admin'),
(8, 'C20191001007', 'qerqwer', 250000, 247500, 1, 900000, 652500, 'qqrqrqwerqer', '2019-10-01', '19:23:26', 1, 0, '', NULL, 'admin'),
(9, 'T20190813008', 'faklsdfjkaldf', 440000, 435600, 1, 9000000, 8564400, 'alsdjfkalsdjf', '2019-08-13', '17:54:04', 2, 90909090, 'QERPQOER', 2, 'admin'),
(10, 'T20190816009', 'kljkjlkjkj', 250000, 250000, 0, 40000, -210000, 'hghghghgh', '2019-08-16', '18:53:16', 2, 2147483647, 'icih', 3, 'admin'),
(11, 'T20190817010', 'sddasd', 565000, 548050, 3, 9000000, 8451950, 'asdfasdfasdf', '2019-08-17', '10:28:03', 2, 545645456, 'asdfasdfasdf', 3, 'admin'),
(12, 'C20231123011', 'Darwin Nunez', 130000, 130000, 0, 2000000, 1870000, 'Lunas', '2023-11-23', '20:29:21', 1, 0, '', NULL, 'admin'),
(13, 'C20231123012', 'Darwin Nunez', 120000, 120000, 0, 200000, 80000, 'assadad', '2023-11-23', '20:58:25', 1, 0, '', NULL, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, ' Kemeja pendek'),
(4, ' Nametag '),
(5, ' Kttp '),
(11, '   Celana pendek '),
(13, ' Kemeja panjang '),
(14, ' Celana panjang '),
(15, ' Rompi '),
(16, 'Jaket'),
(17, 'Topi'),
(18, ' Dompet '),
(20, 'Kaos');

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(11) NOT NULL,
  `nama_operator` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_akses` int(3) NOT NULL,
  `last_login` date NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id_operator`, `nama_operator`, `username`, `password`, `id_akses`, `last_login`, `foto`) VALUES
(9, 'Cicih Fitria Ningsih', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2023-11-23', 'avatar3.png'),
(10, 'jeff', 'jeff', '166ee015c0e0934a8781e0c86a197c6e', 1, '0000-00-00', '13005384ce54754b3a763180f2a6c83e.png'),
(13, 'jefri', 'jefri', 'c710857e9b674843afc9b54b7ae2032d', 2, '2019-08-14', 'b0be2fdc90a3b7a0900a81ed8e466af5.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_byr` int(2) NOT NULL,
  `metode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_byr`, `metode`) VALUES
(1, 'Cash'),
(2, 'Transfer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_transaksi` int(11) NOT NULL,
  `id_dtlpen` int(5) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `harga_barang` bigint(20) NOT NULL,
  `sub_total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_transaksi`, `id_dtlpen`, `id_barang`, `jumlah_stok`, `harga_barang`, `sub_total`) VALUES
(18, 3, 60, 1, 130000, 130000),
(19, 3, 61, 1, 120000, 120000),
(20, 3, 62, 1, 135000, 135000),
(21, 3, 63, 1, 750000, 750000),
(22, 4, 61, 1, 120000, 120000),
(23, 4, 62, 1, 135000, 135000),
(24, 4, 60, 1, 130000, 130000),
(25, 5, 60, 1, 130000, 130000),
(26, 5, 61, 1, 120000, 120000),
(27, 6, 61, 2, 120000, 240000),
(28, 6, 60, 1, 130000, 130000),
(29, 6, 62, 1, 135000, 135000),
(30, 7, 60, 6, 130000, 780000),
(31, 7, 61, 1, 120000, 120000),
(32, 7, 62, 1, 135000, 135000),
(33, 7, 63, 1, 750000, 750000),
(34, 7, 66, 1, 90000, 90000),
(35, 8, 60, 1, 130000, 130000),
(36, 8, 61, 1, 120000, 120000),
(37, 9, 64, 1, 130000, 130000),
(38, 9, 65, 1, 125000, 125000),
(39, 9, 67, 1, 185000, 185000),
(40, 10, 60, 1, 130000, 130000),
(41, 10, 61, 1, 120000, 120000),
(42, 11, 60, 1, 130000, 130000),
(43, 11, 61, 1, 120000, 120000),
(44, 11, 62, 1, 135000, 135000),
(45, 11, 66, 1, 90000, 90000),
(46, 11, 72, 1, 90000, 90000),
(47, 12, 60, 1, 130000, 130000),
(48, 13, 61, 1, 120000, 120000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `tanggal_stok` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id_stok`, `id_barang`, `stok_barang`, `tanggal_stok`) VALUES
(43, 60, 87, '2023-11-23'),
(44, 61, 93, '2023-11-23'),
(45, 62, 95, '2019-08-17'),
(46, 63, 98, '2019-08-10'),
(47, 64, 99, '2019-08-13'),
(48, 65, 99, '2019-08-13'),
(49, 66, 98, '2019-08-17'),
(50, 67, 99, '2019-08-13'),
(51, 68, 100, '2019-08-02'),
(52, 69, 100, '2019-08-02'),
(53, 70, 90, '2019-08-03'),
(54, 71, 100, '2019-08-02'),
(55, 72, 54, '2019-08-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `nama_ukuran` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `nama_ukuran`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL'),
(6, 'No Size');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_byr`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indeks untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_byr` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
