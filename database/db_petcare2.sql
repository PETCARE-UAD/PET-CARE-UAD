-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2020 pada 16.14
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_petcare2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilage` enum('admin','pengguna') NOT NULL,
  `privilage_transaksi` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `nama`, `email`, `password`, `privilage`, `privilage_transaksi`) VALUES
(1, 'Restu Fauziah Handayani', 'fauziahrestu@gmail.com', '123456', 'admin', 'false'),
(2, 'Eka Meliyani Putri', 'ekameliyaniputri@gmail.com', '312400', 'admin', 'false');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hewan`
--

CREATE TABLE `tb_hewan` (
  `id_hewan` int(11) NOT NULL,
  `jenis_hewan` enum('anjing','hamster','kelinci','kucing') NOT NULL,
  `ras_hewan` varchar(255) NOT NULL,
  `ciri_khusus` varchar(255) NOT NULL,
  `jk` enum('jantan','betina') NOT NULL,
  `id_pemilik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_hewan`
--

INSERT INTO `tb_hewan` (`id_hewan`, `jenis_hewan`, `ras_hewan`, `ciri_khusus`, `jk`, `id_pemilik`) VALUES
(1, 'kucing', 'Anggora', 'bulu orange putih', 'betina', 1),
(2, 'hamster', 'eropa', 'bulu putih', 'jantan', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemilikhewan`
--

CREATE TABLE `tb_pemilikhewan` (
  `id_pemilik` int(11) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pemilikhewan`
--

INSERT INTO `tb_pemilikhewan` (`id_pemilik`, `nama_pemilik`, `alamat`, `nohp`, `email`, `image`, `id_akun`) VALUES
(1, 'Restu Fauziah Handayani', 'Jogja', '082133567890', 'fauziahrestu@gmail.com', 'restu.jpg', 1),
(2, 'Eka Meliyani Putri', 'Lampung', '089677210928', 'ekameliyaniputri@gmail.com', 'eka.jpg', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penitipan`
--

CREATE TABLE `tb_penitipan` (
  `id_penitipan` int(11) NOT NULL,
  `nama_hewan` varchar(255) NOT NULL,
  `jenis_hewan` enum('anjing','hamster','kelinci','kucing') NOT NULL,
  `ciri_khusus` varchar(255) NOT NULL,
  `lama_penitipan` int(11) NOT NULL,
  `fasilitas` enum('antar jemput','perawatan','antar jemput dan perawatan') NOT NULL,
  `catatan_khusus` varchar(255) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `id_hewan` int(11) NOT NULL,
  `id_prtcare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penitipan`
--

INSERT INTO `tb_penitipan` (`id_penitipan`, `nama_hewan`, `jenis_hewan`, `ciri_khusus`, `lama_penitipan`, `fasilitas`, `catatan_khusus`, `id_pemilik`, `id_hewan`, `id_prtcare`) VALUES
(1, 'Si Mbull', 'kucing', 'Bulu orange putih', 3, 'antar jemput', 'alergi makanan kucing', 1, 1, 6),
(2, 'Rosiana', 'hamster', 'bulu putih', 2, 'perawatan', 'tidak usah dimandikan.', 2, 2, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penitipan_dan_reservasi`
--

CREATE TABLE `tb_penitipan_dan_reservasi` (
  `id_penitipan_dan_reservasi` int(11) NOT NULL,
  `nama_hewan` varchar(255) NOT NULL,
  `jenis_hewan` enum('anjing','kucing','kelinci','hamster') NOT NULL,
  `usia` int(11) NOT NULL,
  `ciri_khusus` varchar(255) NOT NULL,
  `jk` enum('jantan','betina') NOT NULL,
  `fasilitas` enum('antar jemput','perawatan','antar jemput dan perawatan') NOT NULL,
  `catatan_khusus` varchar(255) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `lama_penitipan` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `id_petcare` int(11) NOT NULL,
  `id_hewan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penitipan_dan_reservasi`
--

INSERT INTO `tb_penitipan_dan_reservasi` (`id_penitipan_dan_reservasi`, `nama_hewan`, `jenis_hewan`, `usia`, `ciri_khusus`, `jk`, `fasilitas`, `catatan_khusus`, `keluhan`, `lama_penitipan`, `id_pemilik`, `id_petcare`, `id_hewan`) VALUES
(1, 'Boy', 'anjing', 5, 'Bulu hitam', 'jantan', 'antar jemput', 'Alergi daging', 'kaki sakit akibat kecelakaan', 3, 1, 7, 1),
(2, 'Sarah', 'kelinci', 3, 'berbulu cokelat', 'betina', 'perawatan', 'mandikan setiap hari sekali', 'makan kurang lahap', 2, 2, 7, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petcare`
--

CREATE TABLE `tb_petcare` (
  `id_petcare` int(11) NOT NULL,
  `jenis_petcare` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_petcare`
--

INSERT INTO `tb_petcare` (`id_petcare`, `jenis_petcare`, `harga`) VALUES
(5, 'Reservasi Pengobatan', 70000),
(6, 'Penitipan', 90000),
(7, 'Penitipan dan Pengobatan', 155000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_reservasi`
--

CREATE TABLE `tb_reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `nama_hewan` varchar(255) NOT NULL,
  `usia` int(11) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `fasilitas` enum('antar jemput') NOT NULL,
  `jk` enum('jantan','betina') NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `id_hewan` int(11) NOT NULL,
  `id_petcare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_reservasi`
--

INSERT INTO `tb_reservasi` (`id_reservasi`, `nama_hewan`, `usia`, `keluhan`, `fasilitas`, `jk`, `id_pemilik`, `id_hewan`, `id_petcare`) VALUES
(1, 'Si Mbul', 3, 'bulu rontok', 'antar jemput', 'betina', 1, 1, 5),
(2, 'Rosiana', 3, 'Mengeluarkan tinja berair', '', 'betina', 2, 2, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `tgl_pembayaran` datetime NOT NULL,
  `jenis_petcare` enum('reservasi pengobatan','penitipan','penitipan dan pengobatan') NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `status_pembayaran` enum('cash','debit') NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `id_hewan` int(11) NOT NULL,
  `id_reservasi` int(11) NOT NULL,
  `id_penitipan` int(11) NOT NULL,
  `id_penitipan_dan_reservasi` int(11) NOT NULL,
  `id_petcare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `penerima`, `tgl_pembayaran`, `jenis_petcare`, `total_pembayaran`, `status_pembayaran`, `id_pemilik`, `id_hewan`, `id_reservasi`, `id_penitipan`, `id_penitipan_dan_reservasi`, `id_petcare`) VALUES
(1, 'Meilin Budiarti', '2020-07-28 21:08:57', 'reservasi pengobatan', 70000, 'cash', 2, 2, 2, 2, 2, 5),
(2, 'Hamim Arsy', '2020-07-27 21:06:58', 'penitipan', 90000, 'cash', 1, 1, 1, 1, 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `tb_hewan`
--
ALTER TABLE `tb_hewan`
  ADD PRIMARY KEY (`id_hewan`),
  ADD KEY `id_pemilik` (`id_pemilik`),
  ADD KEY `id_pemilik_2` (`id_pemilik`),
  ADD KEY `id_pemilik_3` (`id_pemilik`);

--
-- Indeks untuk tabel `tb_pemilikhewan`
--
ALTER TABLE `tb_pemilikhewan`
  ADD PRIMARY KEY (`id_pemilik`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `tb_penitipan`
--
ALTER TABLE `tb_penitipan`
  ADD PRIMARY KEY (`id_penitipan`),
  ADD KEY `id_pemilik` (`id_pemilik`),
  ADD KEY `id_hewan` (`id_hewan`),
  ADD KEY `id_prtcare` (`id_prtcare`);

--
-- Indeks untuk tabel `tb_penitipan_dan_reservasi`
--
ALTER TABLE `tb_penitipan_dan_reservasi`
  ADD PRIMARY KEY (`id_penitipan_dan_reservasi`),
  ADD KEY `id_pemilik` (`id_pemilik`),
  ADD KEY `id_petcare` (`id_petcare`),
  ADD KEY `id_hewan` (`id_hewan`);

--
-- Indeks untuk tabel `tb_petcare`
--
ALTER TABLE `tb_petcare`
  ADD PRIMARY KEY (`id_petcare`);

--
-- Indeks untuk tabel `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_pemilik` (`id_pemilik`),
  ADD KEY `id_petcare` (`id_petcare`),
  ADD KEY `id_hewan` (`id_hewan`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pemilik` (`id_pemilik`),
  ADD KEY `id_hewan` (`id_hewan`),
  ADD KEY `id_reservasi` (`id_reservasi`),
  ADD KEY `id_penitipan` (`id_penitipan`),
  ADD KEY `id_penitipan_dan_reservasi` (`id_penitipan_dan_reservasi`),
  ADD KEY `id_petcare` (`id_petcare`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_hewan`
--
ALTER TABLE `tb_hewan`
  MODIFY `id_hewan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pemilikhewan`
--
ALTER TABLE `tb_pemilikhewan`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_penitipan`
--
ALTER TABLE `tb_penitipan`
  MODIFY `id_penitipan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_penitipan_dan_reservasi`
--
ALTER TABLE `tb_penitipan_dan_reservasi`
  MODIFY `id_penitipan_dan_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_petcare`
--
ALTER TABLE `tb_petcare`
  MODIFY `id_petcare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_hewan`
--
ALTER TABLE `tb_hewan`
  ADD CONSTRAINT `tb_hewan_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `tb_pemilikhewan` (`id_pemilik`);

--
-- Ketidakleluasaan untuk tabel `tb_pemilikhewan`
--
ALTER TABLE `tb_pemilikhewan`
  ADD CONSTRAINT `tb_pemilikhewan_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun` (`id_akun`);

--
-- Ketidakleluasaan untuk tabel `tb_penitipan`
--
ALTER TABLE `tb_penitipan`
  ADD CONSTRAINT `tb_penitipan_ibfk_1` FOREIGN KEY (`id_prtcare`) REFERENCES `tb_petcare` (`id_petcare`),
  ADD CONSTRAINT `tb_penitipan_ibfk_2` FOREIGN KEY (`id_pemilik`) REFERENCES `tb_pemilikhewan` (`id_pemilik`),
  ADD CONSTRAINT `tb_penitipan_ibfk_3` FOREIGN KEY (`id_hewan`) REFERENCES `tb_hewan` (`id_hewan`);

--
-- Ketidakleluasaan untuk tabel `tb_penitipan_dan_reservasi`
--
ALTER TABLE `tb_penitipan_dan_reservasi`
  ADD CONSTRAINT `tb_penitipan_dan_reservasi_ibfk_1` FOREIGN KEY (`id_petcare`) REFERENCES `tb_petcare` (`id_petcare`),
  ADD CONSTRAINT `tb_penitipan_dan_reservasi_ibfk_2` FOREIGN KEY (`id_pemilik`) REFERENCES `tb_pemilikhewan` (`id_pemilik`),
  ADD CONSTRAINT `tb_penitipan_dan_reservasi_ibfk_3` FOREIGN KEY (`id_hewan`) REFERENCES `tb_hewan` (`id_hewan`);

--
-- Ketidakleluasaan untuk tabel `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD CONSTRAINT `tb_reservasi_ibfk_1` FOREIGN KEY (`id_petcare`) REFERENCES `tb_petcare` (`id_petcare`),
  ADD CONSTRAINT `tb_reservasi_ibfk_2` FOREIGN KEY (`id_pemilik`) REFERENCES `tb_pemilikhewan` (`id_pemilik`),
  ADD CONSTRAINT `tb_reservasi_ibfk_3` FOREIGN KEY (`id_hewan`) REFERENCES `tb_hewan` (`id_hewan`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_petcare`) REFERENCES `tb_petcare` (`id_petcare`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_penitipan_dan_reservasi`) REFERENCES `tb_penitipan_dan_reservasi` (`id_penitipan_dan_reservasi`),
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_reservasi`) REFERENCES `tb_reservasi` (`id_reservasi`),
  ADD CONSTRAINT `tb_transaksi_ibfk_4` FOREIGN KEY (`id_hewan`) REFERENCES `tb_hewan` (`id_hewan`),
  ADD CONSTRAINT `tb_transaksi_ibfk_5` FOREIGN KEY (`id_penitipan`) REFERENCES `tb_penitipan` (`id_penitipan`),
  ADD CONSTRAINT `tb_transaksi_ibfk_6` FOREIGN KEY (`id_pemilik`) REFERENCES `tb_pemilikhewan` (`id_pemilik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
