-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2023 pada 18.13
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_akhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lamaran`
--

CREATE TABLE `lamaran` (
  `lamaranid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `lowonganid` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lamaran`
--

INSERT INTO `lamaran` (`lamaranid`, `username`, `lowonganid`, `deskripsi`, `foto`) VALUES
(126, 'user2', 1, 'MGV5d0RvZytHUzg1aWVLNnBMaHdnUT09OjqMby0dl+yydfwSLUG/12KU', 'cv_encrypted/encrypted_lowongan2.1.jpeg'),
(131, 'user', 32, 'VTFFcGdKWFpuVFRLUUhNNXpwVHBPQT09OjoDyaI5w9hN/o8GY1V8nTL+', 'cv_encrypted/encrypted_berotak2.png'),
(132, 'user', 1, 'dTJnUmJuTXVOUnhqdGlkUFZwZVVOdEpQZW1pOExEeVFZZHJnVlYvV3ZyYz06OlcDdOZNkh+x3BQCqhUrHd0=', 'cv_encrypted/encrypted_gedhang.png'),
(133, 'user5', 32, 'VnhkUGNNaTA4LzRTN3FtejZneVBhN25GcFVDSEhzQzNHWjQwVlJyeDN4VT06OstV29RQizLsJ6EQNFLqdHg=', 'cv_encrypted/encrypted_fto.png'),
(134, 'user5', 33, 'b2Y5VDltWUtRc1ZvVVd1WW5OakE3eHYyNFNsRm1QZ1FLd0lPdURjdVpwTT06OilIN1YQ0TuKTWtbDGAnZIY=', 'cv_encrypted/encrypted_Adter_021_Faris Dani R.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan`
--

CREATE TABLE `lowongan` (
  `lowonganid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `lulusan` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lowongan`
--

INSERT INTO `lowongan` (`lowonganid`, `name`, `lulusan`, `foto`) VALUES
(1, '3D Artist', 'Minimal Sarjana (S1)', '3d_artist.jpeg'),
(31, 'IT Infrastructure', 'Minimal Sarjana (S1)', 'infrastruktur.jpeg'),
(32, 'Penerjemah Bahasa Arab', 'Minimal SMA/SMK', 'penerjemah.jpeg'),
(33, 'Dokter Umum', 'Minimal Sarjana (S1)', 'dokter.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `telp` text NOT NULL,
  `email` text NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `telp`, `email`, `level`) VALUES
('admin5', '$argon2id$v=19$m=65536,t=4,p=1$bGRlb3JqcnBkVkc1d1FxcQ$KPECiArqsZmTbJNirL+z/uA4Z4454yl8XQlhN2xpl3I', '321', '5@gmail', 'admin'),
('user', 'user', '82131414', 'jepara, jawa tengah', ''),
('user2', '$2y$10$3IPrMU07haxbQ', '0', '', ''),
('user3', '$argon2id$v=19$m=655', '0', '', ''),
('user4', '$argon2id$v=19$m=65536,t=4,p=1$NGdkbkhPRUExdzdwVC9kWQ$tw3ONAbXIHjCC/u1ZEpb1TZAkOIgGWcsD1hcS6ZZSdY', '', '', ''),
('user5', '$argon2id$v=19$m=65536,t=4,p=1$OWFrcmlNMU1IN2NsWkMyQw$6tTBTH6aNIPWV4JqTmZKFHacPmCGTMUMVpfME5WzWJ4', '123', '@gmail', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`lamaranid`),
  ADD KEY `username` (`username`),
  ADD KEY `productid` (`lowonganid`);

--
-- Indeks untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`lowonganid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `lamaranid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `lowonganid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lamaran`
--
ALTER TABLE `lamaran`
  ADD CONSTRAINT `lamaran_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `lamaran_ibfk_3` FOREIGN KEY (`lowonganid`) REFERENCES `lowongan` (`lowonganid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
