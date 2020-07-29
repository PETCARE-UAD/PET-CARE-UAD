-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2020 pada 03.34
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petcare_data_hewan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_hewan`
--

CREATE TABLE `data_hewan` (
  `id_data_hewan` int(11) NOT NULL,
  `animal_name` varchar(128) NOT NULL,
  `animal_age` int(11) NOT NULL,
  `animal_type` enum('Anjing','Hamster','Kelinci','Kucing') NOT NULL,
  `keterangan` longtext NOT NULL,
  `jk` enum('Male','Female','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_hewan`
--

INSERT INTO `data_hewan` (`id_data_hewan`, `animal_name`, `animal_age`, `animal_type`, `keterangan`, `jk`) VALUES
(1, 'kety', 2, 'Kucing', 'bulu putih abu-abu', 'Female'),
(2, 'Salsa', 4, 'Kelinci', 'bulu hitam', 'Female'),
(3, 'Boy', 4, 'Anjing', 'bulu hitam', 'Male'),
(9, 'Cimoy', 5, 'Anjing', 'berbulu coklat', 'Female'),
(10, 'Lili', 3, 'Hamster', 'Berbulu putih', 'Female'),
(11, 'Mbull', 4, 'Kelinci', 'berbulu putih coklat', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_hewan`
--
ALTER TABLE `data_hewan`
  ADD PRIMARY KEY (`id_data_hewan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_hewan`
--
ALTER TABLE `data_hewan`
  MODIFY `id_data_hewan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
