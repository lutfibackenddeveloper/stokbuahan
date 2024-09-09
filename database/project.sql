-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2024 pada 16.34
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`) VALUES
(1, 'luthfi@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bkeluar`
--

CREATE TABLE `bkeluar` (
  `id_keluar` int(11) NOT NULL,
  `nama` varchar(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `id_buah` int(11) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bkeluar`
--

INSERT INTO `bkeluar` (`id_keluar`, `nama`, `tgl_keluar`, `id_buah`, `jumlah_keluar`) VALUES
(2, 'mangga', '2024-07-27', 1, 20),
(3, 'jeruk', '2024-07-27', 4, 30),
(4, 'anggur', '2024-07-27', 3, 20),
(5, 'apel', '2024-07-27', 2, 20);

--
-- Trigger `bkeluar`
--
DELIMITER $$
CREATE TRIGGER `kurangi` AFTER INSERT ON `bkeluar` FOR EACH ROW BEGIN

UPDATE stok SET stok =stok - NEW.jumlah_keluar WHERE id_buah = NEW.id_buah;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bmasuk`
--

CREATE TABLE `bmasuk` (
  `id_masuk` int(11) NOT NULL,
  `nama` varchar(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_buah` int(11) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bmasuk`
--

INSERT INTO `bmasuk` (`id_masuk`, `nama`, `tgl_masuk`, `id_buah`, `jumlah_masuk`) VALUES
(7, 'mangga', '2024-07-27', 1, 20),
(8, 'mangga', '2024-07-27', 1, 40),
(9, 'apel', '2024-07-27', 2, 50),
(10, 'anggur', '2024-07-27', 3, 50),
(11, 'jeruk', '2024-07-27', 4, 60);

--
-- Trigger `bmasuk`
--
DELIMITER $$
CREATE TRIGGER `tambah` AFTER INSERT ON `bmasuk` FOR EACH ROW BEGIN
    INSERT INTO stok (id_buah, stok)
    VALUES (NEW.id_buah, NEW.jumlah_masuk)
    ON DUPLICATE KEY UPDATE stok = stok + NEW.jumlah_masuk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id_buah` int(11) NOT NULL,
  `kode_buah` varchar(10) NOT NULL,
  `nama` varchar(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id_buah`, `kode_buah`, `nama`, `satuan`, `stok`) VALUES
(1, 'K001', 'mangga', 'kg', 40),
(2, 'K002', 'apel', 'kg', 30),
(3, 'K003', 'anggur', 'kg', 30),
(4, 'K004', 'jeruk', 'kg', 30),
(5, 'K005', 'semangka', 'kg', 0),
(6, 'K006', 'pepaya', 'kg', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bkeluar`
--
ALTER TABLE `bkeluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id_buah` (`id_buah`);

--
-- Indeks untuk tabel `bmasuk`
--
ALTER TABLE `bmasuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `id_buah` (`id_buah`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_buah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bkeluar`
--
ALTER TABLE `bkeluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `bmasuk`
--
ALTER TABLE `bmasuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id_buah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bkeluar`
--
ALTER TABLE `bkeluar`
  ADD CONSTRAINT `bkeluar_ibfk_1` FOREIGN KEY (`id_buah`) REFERENCES `stok` (`id_buah`);

--
-- Ketidakleluasaan untuk tabel `bmasuk`
--
ALTER TABLE `bmasuk`
  ADD CONSTRAINT `bmasuk_ibfk_1` FOREIGN KEY (`id_buah`) REFERENCES `stok` (`id_buah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
