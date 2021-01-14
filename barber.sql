-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2021 at 03:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barber`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `gambar_menu` varchar(255) DEFAULT NULL,
  `stock_menu` enum('Tersedia','Tidak') NOT NULL,
  `kategori` enum('Services','Styles') NOT NULL,
  `harga_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `gambar_menu`, `stock_menu`, `kategori`, `harga_menu`) VALUES
(35, 'Potongan rambut keren bangets', '08-00.jpg', 'Tersedia', 'Styles', 1200000),
(36, 'Rambut keren keknya ini kalo diptong gni', 'Anime-Girl-Blush-Transparent-Background.png', 'Tersedia', 'Styles', 9999),
(37, 'potong uad', 'uad.jpg', 'Tersedia', 'Services', 122131),
(38, 'potong potong aja', 'potong.png', 'Tersedia', 'Styles', 9292929),
(39, 'pijit nambha pegel', 'massage.png', 'Tersedia', 'Services', 999),
(40, 'keramas pake sampo metal', 'hairwash.png', 'Tersedia', 'Services', 121212),
(42, 'tesss', '08-00.jpg', 'Tersedia', 'Services', 21212);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `tambahan_pesanan` text NOT NULL,
  `waktu_pesanan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama_pemesan`, `no_meja`, `tambahan_pesanan`, `waktu_pesanan`) VALUES
(12, 'Fir', 3, '', '2020-08-03 05:16:17'),
(13, 'Roe', 8, '', '2020-08-03 05:16:28'),
(14, 'Fikry', 1, 'ta', '2020-08-05 15:54:51'),
(15, 'Aceng', 2, '', '2020-08-05 17:12:00'),
(16, 'Aceng', 5, 'A', '2020-08-06 07:01:54'),
(17, 'Budi', 2, '', '2020-08-06 07:26:10'),
(18, 'coba', 2, '', '2020-08-06 08:16:58'),
(19, 'tes', 123123123, '', '2021-01-13 15:55:04'),
(20, 'fifah jelek', 887277, '', '2021-01-13 16:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `pesanan_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `status` enum('Proses','Selesai','Batal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `pesanan_id`, `menu_id`, `jumlah_pesanan`, `status`) VALUES
(3, 10, 15, 2, 'Proses'),
(4, 11, 2, 3, 'Proses'),
(5, 12, 15, 3, 'Selesai'),
(6, 13, 1, 2, 'Selesai'),
(7, 14, 15, 1, 'Selesai'),
(8, 14, 25, 2, 'Batal'),
(9, 15, 25, 1, 'Selesai'),
(10, 15, 15, 1, 'Selesai'),
(11, 16, 28, 1, 'Selesai'),
(12, 17, 31, 1, 'Selesai'),
(13, 17, 15, 1, 'Selesai'),
(14, 17, 34, 1, 'Selesai'),
(15, 18, 31, 1, 'Batal'),
(16, 19, 1, 1, 'Batal'),
(17, 20, 39, 1, 'Selesai'),
(18, 20, 35, 1, 'Batal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Yoni', 'User', '6ad14ba9986e3615423dfca256d04e3f', '1'),
(2, 'aceng', 'aceng', '4297f44b13955235245b2497399d7a93', '0'),
(3, 'acenggg', 'acenggg', '6ad14ba9986e3615423dfca256d04e3f', '0'),
(4, 'acenggg', 'acenggg', '6ad14ba9986e3615423dfca256d04e3f', '0'),
(5, 'Rusy', 'Dan', '67e8689e152b85802b16ee1a23c8dbc0', '0'),
(6, 'F', 'Fik', 'efe6398127928f1b2e9ef3207fb82663', '0'),
(7, 'Wisnu', 'wisnu', '67340a8acc49d521d7fdd25db913bf9d', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
