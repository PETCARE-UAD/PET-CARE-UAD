-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Bulan Mei 2020 pada 16.47
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petcare1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `kontak_petcare` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `alamat`, `email`, `kontak_petcare`) VALUES
(221, 'Jl. Potronanggan No.88 Banguntapan, Bantul, Yogyakarta', 'eka@gmail.com', '082175883900'),
(222, 'Jl. Potronanggan No.88 Banguntapan, Bantul, Yogyakarta', 'hamim@gmail.com', '082175883900');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasus`
--

CREATE TABLE `kasus` (
  `id_kasus` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kasus`
--

INSERT INTO `kasus` (`id_kasus`, `id_fasilitas`, `id_pet`, `catatan`) VALUES
(123, 221, 111, 'Canine parvovirus, penyakit dengan gejala demam, lesu, muntah, diare, dehidrasi, dan penurunan berat badan.\r\n\r\nCacing pita bisa hidup di usus kecil kucing dan kadang tumbuh hingga 2 kaki. Gejala yang bisa dilihat pada kucing yang menderita cacingan adalah muntah dan terjadinya penurunan berat badan.'),
(213, 222, 112, 'Kudis (Scabiosis)\r\n\r\nPenyakit kudis disebabkan oleh kutu Sarcoptis scabiei yang menimbulkan gatal-gatal di kepala, hidung, kaki bahkan bisa menjalar ke seluruh tubuh.\r\n\r\ncute viral rhinopharyngitis, influenza, radang tenggorokan yang dipicu oleh bakteri Streptococcus dan lain sebagainya, jelas laman Caring Pets.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(250) NOT NULL,
  `id_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `id_unit`) VALUES
(11, 'Kandang', 1),
(12, 'Doketr', 2),
(13, 'Penjemputan Hewan', 3),
(14, 'Mandi Hewan Sesuai Jadwal', 4),
(15, 'Manicure dan pedicure', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_rencana`
--

CREATE TABLE `layanan_rencana` (
  `id_layanan_rencana` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `id_kasus` int(11) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan_rencana`
--

INSERT INTO `layanan_rencana` (`id_layanan_rencana`, `id_layanan`, `id_kasus`, `catatan`) VALUES
(12345, 11, 123, 'Membersihkan kandang s&k'),
(23451, 13, 213, 'Penjemputan hewan bisa dikantor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_tersedia`
--

CREATE TABLE `layanan_tersedia` (
  `id_layanan tersedia` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `id_kasus` int(11) NOT NULL,
  `harga` varchar(250) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan_tersedia`
--

INSERT INTO `layanan_tersedia` (`id_layanan tersedia`, `id_layanan`, `id_kasus`, `harga`, `catatan`) VALUES
(345, 12, 123, 'Rp. 250.000', 'NO'),
(435, 15, 213, 'Rp. 400.000', 'NO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `nama_depan` varchar(250) NOT NULL,
  `nama_belakang` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `nomor_handphone` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `nama_depan`, `nama_belakang`, `email`, `nomor_handphone`) VALUES
(1, 'hamim', 'arsy', 'hamim@gmail.com', '082175883900'),
(2, 'meilin', 'budiarti', 'meilin@gmail.com', '082175883900'),
(3, 'eka', 'meliyani putri', 'eka@gmail.com', '082175883900'),
(4, 'restu', 'fauziah handayani', 'restu@gmail.com', '082175883900');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_depan` varchar(250) NOT NULL,
  `nama_belakang` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `nomor_handphone` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `id_status terkini` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_kasus` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `id_layanan_rencana` int(11) NOT NULL,
  `id_layanan_tersedia` int(11) NOT NULL,
  `id_spesies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_depan`, `nama_belakang`, `email`, `nomor_handphone`, `alamat`, `id_layanan`, `id_pemilik`, `id_status terkini`, `id_unit`, `id_kasus`, `id_fasilitas`, `id_layanan_rencana`, `id_layanan_tersedia`, `id_spesies`) VALUES
(1, 'rakahayla', 'putri', 'rakaputri@gmail.com', 821474722, 'JL. Anggrek No.1 Perumahan CANSS Jakarta Selatan', 12, 1, 78, 1, 123, 221, 12345, 345, 22),
(2, 'inara', 'sakila', 'inarasakila@gmail.com', 852676710, 'Jl. Mawar No.110B Bandung', 15, 3, 87, 5, 213, 222, 23451, 435, 44);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pet`
--

CREATE TABLE `pet` (
  `id_pet` int(11) NOT NULL,
  `nama_pet` varchar(250) NOT NULL,
  `id_spesies` int(11) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pet`
--

INSERT INTO `pet` (`id_pet`, `nama_pet`, `id_spesies`, `catatan`) VALUES
(111, 'PET CARE UAD', 11, 'Merawat kucing dari berbagai jenis'),
(112, 'PET CARE UAD', 22, 'Merawat anjing dari berbagai jenis'),
(113, 'PET CARE UAD', 33, 'Merawat hamster dari berbagai jenis'),
(114, 'PET CARE UAD', 44, 'Merawat keklinci dari berbagai jenis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pet_pemilik`
--

CREATE TABLE `pet_pemilik` (
  `id_pet_pemilik` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pet_pemilik`
--

INSERT INTO `pet_pemilik` (`id_pet_pemilik`, `id_pet`, `id_pemilik`) VALUES
(10, 111, 1),
(100, 112, 2),
(1000, 113, 3),
(10000, 114, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spesies`
--

CREATE TABLE `spesies` (
  `id_spesies` int(11) NOT NULL,
  `nama_spesies` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `spesies`
--

INSERT INTO `spesies` (`id_spesies`, `nama_spesies`) VALUES
(11, 'Kucing'),
(22, 'Anjing'),
(33, 'Hamster'),
(44, 'Kelinci');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_terkini`
--

CREATE TABLE `status_terkini` (
  `id_kasus_terkini` int(11) NOT NULL,
  `id_kasus` int(11) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_terkini`
--

INSERT INTO `status_terkini` (`id_kasus_terkini`, `id_kasus`, `catatan`) VALUES
(78, 123, 'NO'),
(87, 213, 'NO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `nama_unit`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `kasus`
--
ALTER TABLE `kasus`
  ADD PRIMARY KEY (`id_kasus`),
  ADD KEY `id_fasilitas` (`id_fasilitas`,`id_pet`),
  ADD KEY `id_pet` (`id_pet`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `layanan_rencana`
--
ALTER TABLE `layanan_rencana`
  ADD PRIMARY KEY (`id_layanan_rencana`),
  ADD KEY `id_layanan` (`id_layanan`),
  ADD KEY `id_kasus` (`id_kasus`);

--
-- Indeks untuk tabel `layanan_tersedia`
--
ALTER TABLE `layanan_tersedia`
  ADD PRIMARY KEY (`id_layanan tersedia`),
  ADD KEY `id_layanan` (`id_layanan`),
  ADD KEY `id_kasus` (`id_kasus`);

--
-- Indeks untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_layanan` (`id_layanan`,`id_pemilik`,`id_status terkini`,`id_unit`,`id_kasus`,`id_fasilitas`,`id_layanan_rencana`,`id_layanan_tersedia`,`id_spesies`),
  ADD KEY `id_pemilik` (`id_pemilik`),
  ADD KEY `id_layanan_rencana` (`id_layanan_rencana`),
  ADD KEY `id_spesies` (`id_spesies`),
  ADD KEY `id_status terkini` (`id_status terkini`),
  ADD KEY `id_layanan_tersedia` (`id_layanan_tersedia`),
  ADD KEY `id_unit` (`id_unit`),
  ADD KEY `id_kasus` (`id_kasus`),
  ADD KEY `id_fasilitas` (`id_fasilitas`);

--
-- Indeks untuk tabel `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id_pet`),
  ADD KEY `id_spesies` (`id_spesies`);

--
-- Indeks untuk tabel `pet_pemilik`
--
ALTER TABLE `pet_pemilik`
  ADD PRIMARY KEY (`id_pet_pemilik`),
  ADD KEY `id_pet` (`id_pet`,`id_pemilik`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indeks untuk tabel `spesies`
--
ALTER TABLE `spesies`
  ADD PRIMARY KEY (`id_spesies`);

--
-- Indeks untuk tabel `status_terkini`
--
ALTER TABLE `status_terkini`
  ADD PRIMARY KEY (`id_kasus_terkini`),
  ADD KEY `id_kasus` (`id_kasus`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT untuk tabel `kasus`
--
ALTER TABLE `kasus`
  MODIFY `id_kasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `layanan_rencana`
--
ALTER TABLE `layanan_rencana`
  MODIFY `id_layanan_rencana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23452;

--
-- AUTO_INCREMENT untuk tabel `layanan_tersedia`
--
ALTER TABLE `layanan_tersedia`
  MODIFY `id_layanan tersedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=436;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pet`
--
ALTER TABLE `pet`
  MODIFY `id_pet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT untuk tabel `pet_pemilik`
--
ALTER TABLE `pet_pemilik`
  MODIFY `id_pet_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;

--
-- AUTO_INCREMENT untuk tabel `spesies`
--
ALTER TABLE `spesies`
  MODIFY `id_spesies` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `status_terkini`
--
ALTER TABLE `status_terkini`
  MODIFY `id_kasus_terkini` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kasus`
--
ALTER TABLE `kasus`
  ADD CONSTRAINT `kasus_ibfk_1` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`),
  ADD CONSTRAINT `kasus_ibfk_2` FOREIGN KEY (`id_pet`) REFERENCES `pet` (`id_pet`);

--
-- Ketidakleluasaan untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `layanan_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `layanan_rencana`
--
ALTER TABLE `layanan_rencana`
  ADD CONSTRAINT `layanan_rencana_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`),
  ADD CONSTRAINT `layanan_rencana_ibfk_2` FOREIGN KEY (`id_kasus`) REFERENCES `kasus` (`id_kasus`);

--
-- Ketidakleluasaan untuk tabel `layanan_tersedia`
--
ALTER TABLE `layanan_tersedia`
  ADD CONSTRAINT `layanan_tersedia_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`),
  ADD CONSTRAINT `layanan_tersedia_ibfk_2` FOREIGN KEY (`id_kasus`) REFERENCES `kasus` (`id_kasus`);

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik` (`id_pemilik`),
  ADD CONSTRAINT `pengguna_ibfk_2` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`),
  ADD CONSTRAINT `pengguna_ibfk_3` FOREIGN KEY (`id_layanan_rencana`) REFERENCES `layanan_rencana` (`id_layanan_rencana`),
  ADD CONSTRAINT `pengguna_ibfk_4` FOREIGN KEY (`id_spesies`) REFERENCES `spesies` (`id_spesies`),
  ADD CONSTRAINT `pengguna_ibfk_5` FOREIGN KEY (`id_status terkini`) REFERENCES `status_terkini` (`id_kasus_terkini`),
  ADD CONSTRAINT `pengguna_ibfk_6` FOREIGN KEY (`id_layanan_tersedia`) REFERENCES `layanan_tersedia` (`id_layanan tersedia`),
  ADD CONSTRAINT `pengguna_ibfk_7` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`),
  ADD CONSTRAINT `pengguna_ibfk_8` FOREIGN KEY (`id_kasus`) REFERENCES `kasus` (`id_kasus`),
  ADD CONSTRAINT `pengguna_ibfk_9` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`);

--
-- Ketidakleluasaan untuk tabel `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`id_spesies`) REFERENCES `spesies` (`id_spesies`);

--
-- Ketidakleluasaan untuk tabel `pet_pemilik`
--
ALTER TABLE `pet_pemilik`
  ADD CONSTRAINT `pet_pemilik_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik` (`id_pemilik`),
  ADD CONSTRAINT `pet_pemilik_ibfk_2` FOREIGN KEY (`id_pet`) REFERENCES `pet` (`id_pet`);

--
-- Ketidakleluasaan untuk tabel `status_terkini`
--
ALTER TABLE `status_terkini`
  ADD CONSTRAINT `status_terkini_ibfk_1` FOREIGN KEY (`id_kasus`) REFERENCES `kasus` (`id_kasus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
