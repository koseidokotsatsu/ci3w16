-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2024 pada 15.03
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.0

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
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `phone` varchar(125) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `pos_code` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `username`, `password`, `name`, `gender`, `phone`, `address`, `pos_code`, `created_at`, `updated_at`) VALUES
(5, 'ruci', '8cb2237d0679ca88db6464eac60da96345513964', 'Muhammad Ruci ', 'L', '028321412', 'Kelet, Keling, Jepara.', '51932', '2023-12-19 13:24:54', '2024-03-02 07:54:45'),
(6, 'igna', '8cb2237d0679ca88db6464eac60da96345513964', 'Ignatiyus Sihotang', 'L', '3214343324', 'Cimahi, Bandung', '59134', '2024-03-02 13:34:51', '2024-03-02 08:04:06'),
(7, 'pokemon', '8cb2237d0679ca88db6464eac60da96345513964', 'John Decoy', 'L', '+62 882 237 784', 'Pajajaran, Bandung', '40173', '2024-03-02 15:40:55', '2024-03-02 09:46:08'),
(8, 'radityaabib', '8cb2237d0679ca88db6464eac60da96345513964', 'Raditya Abib', 'L', '+62235468531', 'Jl. Ringroad Selatan, Menayu Lor', '551423', '2024-03-02 16:29:01', '2024-03-02 10:29:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `f_about_content`
--

CREATE TABLE `f_about_content` (
  `id_abtent` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(256) NOT NULL,
  `img` varchar(256) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `f_about_content`
--

INSERT INTO `f_about_content` (`id_abtent`, `title`, `description`, `link`, `img`, `created_at`, `updated_at`) VALUES
(2, 'Queen - Bohemian Rhapsody', '\"Bohemian Rhapsody\" adalah sebuah lagu oleh band rock asal Inggris, Queen. Lagu tersebut ditulis oleh Freddie Mercury untuk album A Night at the Opera (1975). Lagu ini berdurasi hampir enam menit,[1] yang terdiri dari beberapa bagian tanpa chorus: intro, segmen ballad, sebagian opera, sebagian rock, dan coda reflektif.[2] Lagu ini lebih sering dicatutkan dalam genre progresif rock ala 1970-an.', 'https://www.youtube.com/watch?v=N0dbGGvsjf8&ab_channel=Vander', 'aboutc-240302-19fb0495ef.jpg', '2024-03-02 10:40:44', '2024-03-04 03:27:09'),
(3, 'Queen - We Will Rock You', 'Buddy, you\'re a boy, make a big noise\r\nPlaying in the street, gonna be a big man someday\r\nYou got mud on your face, you big disgrace\r\nKicking your can all over the place, singin\'', 'https://www.youtube.com/watch?v=-tJYN-eG1zk&ab_channel=QueenOfficial', 'aboutc-240302-321ac1840e.jpg', '2024-03-02 11:19:13', '2024-03-02 10:12:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `f_contact`
--

CREATE TABLE `f_contact` (
  `id_contact` int(11) NOT NULL,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `readed` enum('0','1') NOT NULL COMMENT '''1 is yes'',''0 is no''',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `f_contact`
--

INSERT INTO `f_contact` (`id_contact`, `firstname`, `lastname`, `email`, `subject`, `message`, `readed`, `created_at`, `updated_at`) VALUES
(1, 'test', 'tested', 'test@yahoo.co.id', 'Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1', '2024-03-01 22:11:36', '2024-03-02 06:36:27'),
(2, 'frederick', 'mercury', 'fredickmercury@gmail.com', 'you had your time', 'All we hear is radio ga ga\r\nRadio goo goo\r\nRadio ga ga\r\nAll we hear is radio ga ga\r\nRadio blah blah\r\nRadio, what\'s new?\r\nRadio, someone still loves you', '1', '2024-03-01 22:15:28', '2024-03-02 06:37:32'),
(3, 'Raditya', 'Abib', 'abibgamer30@gmail.com', '123123231', '23123123', '1', '2024-03-01 23:45:34', '2024-03-02 06:37:32'),
(4, 'Raditya', 'Abib', 'abibgamer30@gmail.com', '12313412412', '32131232', '1', '2024-03-01 23:46:21', '2024-03-02 06:37:31'),
(5, 'Raditya', 'Abib', 'abibgamer30@gmail.com', '12313412412', '123456t7tfced576b6rfvd4b56rd567bcv', '1', '2024-03-02 13:44:33', '2024-03-02 07:44:50'),
(6, 'Raditya', 'Abib', 'abibgamer30@gmail.com', 'Pengiriman dan saya tertolong', 'saya memesan avamys pukul 2 siang dan pukul 3 pesanan sudah saya terima, saya berterimakasih atas layanannya, saya akan terus memilih OurPharmacy untuk kedepannya, terimakasih.', '1', '2024-03-02 16:16:11', '2024-03-02 10:16:54'),
(7, 'Raditya', 'Abib', 'abibgamer30@gmail.com', 'test', 'test', '1', '2024-03-03 18:08:37', '2024-03-03 12:08:42'),
(8, 'Raditya', 'Abib', 'abibgamer30@gmail.com', '123456789', '1234567890', '1', '2024-03-04 11:55:53', '2024-03-04 05:56:08');

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
(13, 'Obat Bebas', '2023-12-19 13:25:46', NULL),
(14, 'Obat Keras', '2023-12-19 13:25:50', NULL),
(15, 'Obat Wajib Apotek (OWA)', '2023-12-19 13:25:55', NULL),
(16, 'Obat Golongan Narkotika', '2023-12-19 13:26:02', NULL),
(17, 'Obat Psikotropika', '2023-12-19 13:26:12', NULL),
(18, 'Obat Herbal', '2023-12-19 13:26:16', NULL),
(19, 'Lainnya', '2024-02-15 11:04:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_general_name`
--

CREATE TABLE `p_general_name` (
  `id_general_name` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `p_general_name`
--

INSERT INTO `p_general_name` (`id_general_name`, `name`, `created_at`, `update_at`) VALUES
(1, 'Paracetamol', '2023-12-19 14:01:26', NULL),
(2, 'Asam Mefenamat', '2023-12-19 14:01:38', NULL),
(3, 'Sertraline', '2023-12-19 14:01:48', NULL),
(4, 'Ibuprofen', '2023-12-19 14:01:56', NULL),
(5, 'Amoksisilin', '2023-12-19 14:02:06', NULL),
(7, 'Ranitidine HCl', '2024-02-29 06:22:08', NULL),
(8, 'Salbutamol', '2024-02-29 11:45:31', '2024-02-29 05:45:35'),
(9, 'Lainnya', '2024-02-27 13:59:50', NULL),
(1001, 'Fluticasone furoate', '2024-03-02 16:00:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_item`
--

CREATE TABLE `p_item` (
  `id_item` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `id_general_name` varchar(256) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `id_category` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `image` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_item`
--

INSERT INTO `p_item` (`id_item`, `barcode`, `id_general_name`, `name`, `description`, `id_category`, `id_type`, `id_unit`, `price`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(29, 'P002', '2,9', 'Ponstan 500mg 10 Per Tablet', 'Ponstan adalah obat yang mengandung Asam Mefenamat digunakan sebagai pereda nyeri, dismenore, nyeri ringan khususnya ketika pasien juga mengalami peradangan, dan mengurangi gangguan inflamasi (peradangan) secara umum.', 14, 2, 13, 38000, 136, 'item-231219-5d3466bfe1.jpg', '2023-12-19 21:54:20', '2024-03-02 09:23:23'),
(32, 'A011', '1,9', 'Panadol Extra', 'Panadol meredakan sakit kepala, sakit gigi, sakit pada otot, nyeri yang mengganggu dan menurunkan demam secara cepat dan efektif. Baca aturan pakai, jika sakit berlanjut hubungi dokter.', 13, 2, 11, 1200, 50, 'item-240227-4d2107119f.png', '2024-02-27 23:53:39', '2024-03-02 09:21:22'),
(33, 'A012', '7', 'Ranitidine HCl', 'RANITIDINE  obat yang di gunakan untuk mengobati penyakit-penyakit yang di sebabkan oleh kelebihan produksi asam lambung, seperti sakit maag dan tukak lambung. Ranitidine termasuk golongan antagonis reseptor histamin H2 yang bekerja dengan cara menghambat secara kompetitif kerja reseptor histamin H2, yang sangat berperan dalam sekresi asam lambung. ', 14, 2, 11, 12000, 95, 'item-240302-53dd41be11.png', '2024-02-29 06:23:48', '2024-03-02 09:20:41'),
(34, 'S001', '8', 'Salbutamol Yarindo 2mg Tablet', 'Salbutamol Yarindo diproduksi oleh PT. Yarindo Farmatama- Indonesia dengan no.registrasi GKL9832707710A1 yang mengandung Salbutamol 2mg. Salbutamol merupakan obat saluran nafas yang digunakan untuk mencegah bronkospasme pada semua jenis asma bronkial. Salbutamol obat golongan bronkodilator yang dapat meredakan batuk, mengi, sesak napas, dan pernapasan yang terganggu dengan meningkatkan aliran udara melalui saluran bronkial. Salbutamol hanya dapat diperoleh dengan resep dokter.', 14, 2, 11, 213, 88, 'item-240229-1e82182cde.jpg', '2024-02-29 12:43:28', '2024-03-01 00:41:39'),
(35, 'G002', '1001', 'Avamys Nasal Spray 120ml', 'Avamys merupakan obat semprot hidung yang digunakan untuk melembabkan membran nasal (hidung) yang kering dan meradang karena pilek dan melegakan hidung tersumbat.', 14, 34, 11, 310000, 96, 'item-240302-c9e6942e31.png', '2024-03-02 16:03:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_type`
--

CREATE TABLE `p_type` (
  `id_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(33, 'Obat tidur', '2023-12-19 13:50:54', NULL),
(34, 'Lainnya', '2024-02-27 13:59:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_unit`
--

CREATE TABLE `p_unit` (
  `id_unit` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_unit`
--

INSERT INTO `p_unit` (`id_unit`, `name`, `created_at`, `update_at`) VALUES
(11, 'PCS', '2023-12-19 13:30:55', NULL),
(12, 'BOTOL', '2023-12-19 13:30:59', NULL),
(13, 'UNIT', '2023-12-19 13:31:05', NULL),
(14, 'Lainnya', '2024-02-27 13:59:56', '2024-02-27 08:00:02');

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
(9, 'PT First Medipharma', '(+62) 31-896381', 'Jl. Raya Sumorame No.41, Sumotuwo, Sumorame, Kec. Candi, Kabupaten Sidoarjo, Jawa Timur 61271', 'Ranitidhine HCl', '2023-12-19 13:18:21', '2024-02-29 18:39:21'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_payment`
--

INSERT INTO `t_payment` (`id_transaction`, `id_sale`, `id_item`, `qty`, `price`, `sub_total`) VALUES
(50, 104, 35, 1, 310000, 310000),
(51, 104, 33, 2, 12000, 24000),
(52, 105, 35, 1, 310000, 310000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sale`
--

CREATE TABLE `t_sale` (
  `id_sale` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(35) NOT NULL,
  `total_early` bigint(20) NOT NULL,
  `total_final` bigint(20) DEFAULT NULL,
  `discount` bigint(20) NOT NULL,
  `cash` bigint(20) DEFAULT NULL,
  `remain` bigint(20) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `delivery` enum('yes','no') NOT NULL,
  `no_resi` varchar(255) DEFAULT NULL,
  `expedition` varchar(255) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `receiver_phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `pos_code` varchar(125) DEFAULT NULL,
  `ongkos` int(50) DEFAULT NULL,
  `accepted` enum('yes','no') DEFAULT NULL,
  `date_tf` date NOT NULL,
  `hour_tf` time NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_sale`
--

INSERT INTO `t_sale` (`id_sale`, `invoice`, `customer_id`, `customer_name`, `total_early`, `total_final`, `discount`, `cash`, `remain`, `note`, `delivery`, `no_resi`, `expedition`, `receiver`, `receiver_phone`, `address`, `pos_code`, `ongkos`, `accepted`, `date_tf`, `hour_tf`, `updated_at`) VALUES
(104, 'MP2403030001', 8, 'Raditya Abib', 334000, 359000, 0, 359000, 0, '', 'yes', 'JB0033526964', 'J&T', 'Raditya Abib', '+62235468531', 'Jl. Ringroad Selatan, Menayu Lor', '551423', 25000, 'yes', '2024-03-03', '23:32:06', '2024-03-03 23:48:28'),
(105, 'MP2403040001', NULL, 'Umum', 310000, 300000, 10000, 300000, 0, 'Dipakai secara teratur, pagi dan malam dijam 6-8 pagi atau malam, 2 kali semprot.', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-04', '00:14:42', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_stock`
--

INSERT INTO `t_stock` (`id_stock`, `id_item`, `type`, `detail`, `id_supplier`, `qty`, `date`, `created_at`, `id_user`) VALUES
(9, 29, 'in', 'Supply', 10, 200, '2023-12-19', '2023-12-19 21:58:59', 6),
(10, 34, 'in', 'kulakan', 9, 100, '2024-03-02', '2024-03-02 13:45:52', 7),
(11, 32, 'in', 'kulakan', 10, 100, '2024-03-02', '2024-03-02 15:57:25', 7),
(12, 33, 'in', 'Supply', 10, 100, '2024-03-02', '2024-03-02 15:57:34', 7),
(13, 35, 'in', 'Kulakan', 11, 100, '2024-03-02', '2024-03-02 16:07:16', 7),
(14, 32, 'out', 'Kadaluasa', NULL, 10, '2024-03-02', '2024-03-02 16:08:04', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `pos_code` varchar(255) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1:admin,2:staff',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `address`, `pos_code`, `gender`, `img`, `level`, `created_at`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', NULL, NULL, NULL, 'default.jpg', 1, '2023-10-09 09:30:25'),
(6, 'raesoxee', '8cb2237d0679ca88db6464eac60da96345513964', 'Ranggita Putri Alya', NULL, NULL, NULL, '2_21.gif', 1, '2023-12-18 09:58:05'),
(7, 'radityaabib', '8cb2237d0679ca88db6464eac60da96345513964', 'Raditya Abib', NULL, NULL, NULL, '1_21.gif', 1, '2023-12-19 13:08:42'),
(8, 'qoqon', '8cb2237d0679ca88db6464eac60da96345513964', 'Muhammad Furqon ', 'Kelet, Keling, Jepara', '51123', 'L', '9b3329cf0e7a81130a97a9021a4797181.jpg', 2, '2023-12-19 13:10:43'),
(11, 'fredy', '8cb2237d0679ca88db6464eac60da96345513964', 'Frederick Mercury', NULL, NULL, NULL, 'fredikc1.jpg', 1, '2024-03-04 09:20:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `f_about_content`
--
ALTER TABLE `f_about_content`
  ADD PRIMARY KEY (`id_abtent`);

--
-- Indeks untuk tabel `f_contact`
--
ALTER TABLE `f_contact`
  ADD PRIMARY KEY (`id_contact`);

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
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `f_about_content`
--
ALTER TABLE `f_about_content`
  MODIFY `id_abtent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `f_contact`
--
ALTER TABLE `f_contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `p_category`
--
ALTER TABLE `p_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT untuk tabel `p_general_name`
--
ALTER TABLE `p_general_name`
  MODIFY `id_general_name` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT untuk tabel `p_item`
--
ALTER TABLE `p_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `p_type`
--
ALTER TABLE `p_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `t_payment`
--
ALTER TABLE `t_payment`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `t_sale`
--
ALTER TABLE `t_sale`
  MODIFY `id_sale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
