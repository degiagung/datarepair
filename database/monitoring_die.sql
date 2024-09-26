-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Sep 2024 pada 15.22
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
-- Database: `monitoring_die`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoringuniquedie`
--

CREATE TABLE `monitoringuniquedie` (
  `id` int(11) NOT NULL,
  `nama_die` varchar(50) DEFAULT NULL,
  `A1N` int(11) DEFAULT NULL,
  `B1N` int(11) DEFAULT NULL,
  `C1N` int(11) DEFAULT NULL,
  `C2N` int(11) DEFAULT NULL,
  `C3N` int(11) DEFAULT NULL,
  `C4N` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `monitoringuniquedie`
--

INSERT INTO `monitoringuniquedie` (`id`, `nama_die`, `A1N`, `B1N`, `C1N`, `C2N`, `C3N`, `C4N`) VALUES
(1, 'Unique Die N1', 19, 1, 3, 2, 6, 40),
(2, 'Unique Die N2', 2, 3, 1, 2, 8, 3),
(3, 'Unique Die N3', 4, 1, 6, 4, 7, 3),
(4, 'Unique Die N4', 50, 7, 2, 1, 4, 5),
(5, 'Unique Die N5', 9, 1, 3, 6, 2, 7),
(6, 'Unique Die N6', 5, 6, 5, 4, 3, 2),
(7, 'Unique Die N7', 9, 10, 10, 2, 1, 5),
(8, 'Unique Die N8', 9, 1, 8, 10, 1, 9),
(9, 'Unique Die N9', 2, 6, 5, 5, 9, 10),
(10, 'Unique Die N10', 10, 1, 1, 8, 1, 8),
(11, 'Unique Die NH 1', 1, 1, 1, 1, 1, 1),
(12, 'Unique Die NH 2', 2, 2, 2, 2, 2, 2),
(13, 'Unique Die NH 3', 20, 3, 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unique_die_shots`
--

CREATE TABLE `unique_die_shots` (
  `id` int(11) NOT NULL,
  `shift` varchar(50) DEFAULT NULL,
  `mesin_dc` varchar(50) DEFAULT NULL,
  `general_die` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `unique_die` varchar(50) DEFAULT NULL,
  `value_die` varchar(100) DEFAULT NULL,
  `total_shot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `unique_die_shots`
--

INSERT INTO `unique_die_shots` (`id`, `shift`, `mesin_dc`, `general_die`, `tanggal`, `unique_die`, `value_die`, `total_shot`) VALUES
(72, 'data1', '1', '2', '2024-09-18', 'UDN1', 'A1N', 12),
(73, 'data1', '1', '2', '2024-09-18', 'UDN1', 'B1N', 12),
(74, 'data1', '1', '2', '2024-09-18', 'UDN1', 'C1N', 12),
(75, 'data1', '1', '2', '2024-09-18', 'UDN1', 'C2N', 12),
(76, 'data1', '1', '2', '2024-09-18', 'UDN1', 'C3N', 12),
(77, 'data1', '1', '2', '2024-09-18', 'UDN1', 'C4N', 12),
(78, 'data2', '1', '2', '2024-09-17', 'UDN2', 'A1N', 0),
(79, 'data2', '1', '2', '2024-09-17', 'UDN2', 'B1N', 0),
(80, 'data2', '1', '2', '2024-09-17', 'UDN2', 'C1N', 0),
(81, 'data2', '1', '2', '2024-09-17', 'UDN2', 'C2N', 0),
(82, 'data2', '1', '2', '2024-09-17', 'UDN2', 'C3N', 0),
(83, 'data2', '1', '2', '2024-09-17', 'UDN2', 'C4N', 0),
(84, 'data3', '1', '2', '2024-09-18', 'UDN3', 'A1N', 0),
(85, 'data3', '1', '2', '2024-09-18', 'UDN3', 'B1N', 0),
(86, 'data3', '1', '2', '2024-09-18', 'UDN3', 'C1N', 0),
(87, 'data3', '1', '2', '2024-09-18', 'UDN3', 'C2N', 0),
(88, 'data3', '1', '2', '2024-09-18', 'UDN3', 'C3N', 0),
(89, 'data3', '1', '2', '2024-09-18', 'UDN3', 'C4N', 0),
(90, 'data4', '1', '2', '2024-09-18', 'UDN4', 'A1N', 0),
(91, 'data4', '1', '2', '2024-09-18', 'UDN4', 'B1N', 0),
(92, 'data4', '1', '2', '2024-09-18', 'UDN4', 'C1N', 0),
(93, 'data4', '1', '2', '2024-09-18', 'UDN4', 'C2N', 0),
(94, 'data4', '1', '2', '2024-09-18', 'UDN4', 'C3N', 0),
(95, 'data4', '1', '2', '2024-09-18', 'UDN4', 'C4N', 0),
(96, 'data5', '1', '2', '2024-09-18', 'UDN5', 'A1N', 0),
(97, 'data5', '1', '2', '2024-09-18', 'UDN5', 'B1N', 0),
(98, 'data5', '1', '2', '2024-09-18', 'UDN5', 'C1N', 0),
(99, 'data5', '1', '2', '2024-09-18', 'UDN5', 'C2N', 0),
(100, 'data5', '1', '2', '2024-09-18', 'UDN5', 'C3N', 0),
(101, 'data5', '1', '2', '2024-09-18', 'UDN5', 'C4N', 0),
(102, 'data6', '1', '2', '2024-09-18', 'UDN1', 'A1N', 0),
(103, 'data6', '1', '2', '2024-09-18', 'UDN1', 'B1N', 0),
(104, 'data6', '1', '2', '2024-09-18', 'UDN1', 'C1N', 0),
(105, 'data6', '1', '2', '2024-09-18', 'UDN1', 'C2N', 0),
(106, 'data6', '1', '2', '2024-09-18', 'UDN1', 'C3N', 0),
(107, 'data6', '1', '2', '2024-09-18', 'UDN1', 'C4N', 0),
(108, 'data7', '1', '2', '2024-09-18', 'UDN1', 'A1N', 0),
(109, 'data7', '1', '2', '2024-09-18', 'UDN1', 'B1N', 0),
(110, 'data7', '1', '2', '2024-09-18', 'UDN1', 'C1N', 0),
(111, 'data7', '1', '2', '2024-09-18', 'UDN1', 'C2N', 0),
(112, 'data7', '1', '2', '2024-09-18', 'UDN1', 'C3N', 0),
(113, 'data7', '1', '2', '2024-09-18', 'UDN1', 'C4N', 0),
(120, 'data6', '23', '89', '2024-09-18', 'UDN6', 'A1N', 0),
(121, 'data6', '23', '89', '2024-09-18', 'UDN6', 'B1N', 0),
(122, 'data6', '23', '89', '2024-09-18', 'UDN6', 'C1N', 0),
(123, 'data6', '23', '89', '2024-09-18', 'UDN6', 'C2N', 0),
(124, 'data6', '23', '89', '2024-09-18', 'UDN6', 'C3N', 0),
(125, 'data6', '23', '89', '2024-09-18', 'UDN6', 'C4N', 0),
(126, 'data7', '0', '0', '2024-09-18', 'UDN7', 'A1N', 0),
(127, 'data7', '0', '0', '2024-09-18', 'UDN7', 'B1N', 0),
(128, 'data7', '0', '0', '2024-09-18', 'UDN7', 'C1N', 0),
(129, 'data7', '0', '0', '2024-09-18', 'UDN7', 'C2N', 0),
(130, 'data7', '0', '0', '2024-09-18', 'UDN7', 'C3N', 0),
(131, 'data7', '0', '0', '2024-09-18', 'UDN7', 'C4N', 0),
(132, '0', '0', '0', '0000-00-00', 'UDN8', 'A1N', 0),
(133, '0', '0', '0', '0000-00-00', 'UDN8', 'B1N', 0),
(134, '0', '0', '0', '0000-00-00', 'UDN8', 'C1N', 0),
(135, '0', '0', '0', '0000-00-00', 'UDN8', 'C2N', 0),
(136, '0', '0', '0', '0000-00-00', 'UDN8', 'C3N', 0),
(137, '0', '0', '0', '0000-00-00', 'UDN8', 'C4N', 0),
(138, '0', '0', '0', '0000-00-00', 'UDN9', 'A1N', 0),
(139, '0', '0', '0', '0000-00-00', 'UDN9', 'B1N', 0),
(140, '0', '0', '0', '0000-00-00', 'UDN9', 'C1N', 0),
(141, '0', '0', '0', '0000-00-00', 'UDN9', 'C2N', 0),
(142, '0', '0', '0', '0000-00-00', 'UDN9', 'C3N', 0),
(143, '0', '0', '0', '0000-00-00', 'UDN9', 'C4N', 0),
(144, '0', '0', '0', '0000-00-00', 'UDN10', 'A1N', 0),
(145, '0', '0', '0', '0000-00-00', 'UDN10', 'B1N', 0),
(146, '0', '0', '0', '0000-00-00', 'UDN10', 'C1N', 0),
(147, '0', '0', '0', '0000-00-00', 'UDN10', 'C2N', 0),
(148, '0', '0', '0', '0000-00-00', 'UDN10', 'C3N', 0),
(149, '0', '0', '0', '0000-00-00', 'UDN10', 'C4N', 0),
(150, '0', '0', '0', '0000-00-00', 'UDNH1', 'A1N', 0),
(151, '0', '0', '0', '0000-00-00', 'UDNH1', 'B1N', 0),
(152, '0', '0', '0', '0000-00-00', 'UDNH1', 'C1N', 0),
(153, '0', '0', '0', '0000-00-00', 'UDNH1', 'C2N', 0),
(154, '0', '0', '0', '0000-00-00', 'UDNH1', 'C3N', 0),
(155, '0', '0', '0', '0000-00-00', 'UDNH1', 'C4N', 0),
(156, '0', '0', '0', '0000-00-00', 'UDNH2', 'A1N', 0),
(157, '0', '0', '0', '0000-00-00', 'UDNH2', 'B1N', 0),
(158, '0', '0', '0', '0000-00-00', 'UDNH2', 'C1N', 0),
(159, '0', '0', '0', '0000-00-00', 'UDNH2', 'C2N', 0),
(160, '0', '0', '0', '0000-00-00', 'UDNH2', 'C3N', 0),
(161, '0', '0', '0', '0000-00-00', 'UDNH2', 'C4N', 0),
(162, '0', '0', '0', '0000-00-00', 'UDNH3', 'A1N', 0),
(163, '0', '0', '0', '0000-00-00', 'UDNH3', 'B1N', 0),
(164, '0', '0', '0', '0000-00-00', 'UDNH3', 'C1N', 0),
(165, '0', '0', '0', '0000-00-00', 'UDNH3', 'C2N', 0),
(166, '0', '0', '0', '0000-00-00', 'UDNH3', 'C3N', 0),
(167, '0', '0', '0', '0000-00-00', 'UDNH3', 'C4N', 0),
(168, 'joko', '21', '67', '0000-00-00', 'UDN2', 'A1N', 200),
(169, 'joko', '21', '67', '0000-00-00', 'UDN2', 'B1N', 200),
(170, 'joko', '21', '67', '0000-00-00', 'UDN2', 'C1N', 200),
(171, 'joko', '21', '67', '0000-00-00', 'UDN2', 'C2N', 200),
(172, 'joko', '21', '67', '0000-00-00', 'UDN2', 'C3N', 200),
(173, 'joko', '21', '67', '0000-00-00', 'UDN2', 'C4N', 200),
(174, 'data4', '21', '67', '2024-09-10', 'UDN4', 'A1N', 200),
(175, 'data4', '21', '67', '2024-09-10', 'UDN4', 'B1N', 200),
(176, 'data4', '21', '67', '2024-09-10', 'UDN4', 'C1N', 200),
(177, 'data4', '21', '67', '2024-09-10', 'UDN4', 'C2N', 200),
(178, 'data4', '21', '67', '2024-09-10', 'UDN4', 'C3N', 200),
(179, 'data4', '21', '67', '2024-09-10', 'UDN4', 'C4N', 200);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `monitoringuniquedie`
--
ALTER TABLE `monitoringuniquedie`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `unique_die_shots`
--
ALTER TABLE `unique_die_shots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `monitoringuniquedie`
--
ALTER TABLE `monitoringuniquedie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `unique_die_shots`
--
ALTER TABLE `unique_die_shots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
