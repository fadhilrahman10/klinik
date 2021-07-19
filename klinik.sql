-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2021 pada 11.44
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(3) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `email`, `image`, `password`, `date_created`) VALUES
('A01', 'Raihan Murtadha Ramadhan', 'raihanrmdn7@gmail.com', '20190416_124413-01-min.jpeg', '$2y$10$5wr70JYQN3vQ42yKmZwtD.emjh593enGi85WD8r4Vt3/O3oKPt4O6', '2021-06-03'),
('A02', 'Afrina Putri Pratama', 'afrinaputri21@gmail.com', 'cropped-msglow-jogja-logo.png', '$2y$10$2ucSYju0lao3kpmWZzR0Mutds2SH1cUXSooZIJw3wCn9PShMXZWBe', '2021-06-04'),
('A03', 'admin', 'admin@gmail.com', 'default.jpg', '$2y$10$63SjCEpbylpQ/9oSfMDz2O9SQmgaeZHoeAFI5gHOSoc//WgIN7rzm', '2021-07-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `medical`
--

CREATE TABLE `medical` (
  `id` int(11) UNSIGNED NOT NULL,
  `medical_record_number` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dokter` varchar(25) NOT NULL,
  `anamnesa` text NOT NULL,
  `diagnosa` text NOT NULL,
  `theraphy` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `medical`
--

INSERT INTO `medical` (`id`, `medical_record_number`, `date`, `dokter`, `anamnesa`, `diagnosa`, `theraphy`) VALUES
(7, 'MRN-000002', '2021-07-16 01:48:16', 'Dr. Annajmi', '<p>asdasdasdasd</p>\r\n', '<p>asdasdasd</p>\r\n', '<p>asdasdasd</p>\r\n'),
(9, 'MRN-000003', '2021-07-16 09:32:57', 'Dr. Ria', '<p>Putus Cinta</p>\r\n', '<p>Di tinggal mantan</p>\r\n', '<p>Cari Aktivitas</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `patient`
--

CREATE TABLE `patient` (
  `medical_record_number` varchar(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `place_of_birth` varchar(25) NOT NULL,
  `date_of_birth` date NOT NULL,
  `religion` varchar(25) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `profession` varchar(25) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varbinary(50) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `patient`
--

INSERT INTO `patient` (`medical_record_number`, `name`, `place_of_birth`, `date_of_birth`, `religion`, `gender`, `profession`, `phone_number`, `address`, `date_registered`) VALUES
('MRN-000002', 'Zulfitrida', 'Duri', '1212-12-12', 'Islam', 'Perempuan', 'Pelajar', '082268720234', 0x4a6c204b7574696c616e672053616b7469, '2021-07-16'),
('MRN-000003', 'Otong', 'Lapau Tuak', '2021-07-17', 'Islam', 'Laki-laki', 'Pro Player', '0894334334433', 0x4a6c2e204a616c616e, '2021-07-16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`medical_record_number`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `medical`
--
ALTER TABLE `medical`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
