-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 Jul 2018 pada 06.34
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xiliari`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `division`
--

CREATE TABLE `division` (
  `division_id` int(11) NOT NULL,
  `div_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `division`
--

INSERT INTO `division` (`division_id`, `div_name`) VALUES
(1, 'System Admin'),
(2, 'Developer'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_admin`
--

CREATE TABLE `level_admin` (
  `level_admin_id` int(11) NOT NULL,
  `level_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level_admin`
--

INSERT INTO `level_admin` (`level_admin_id`, `level_name`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'guest');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_activity`
--

CREATE TABLE `list_activity` (
  `activity_id` int(11) NOT NULL,
  `act_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_activity`
--

INSERT INTO `list_activity` (`activity_id`, `act_name`) VALUES
(1, 'login'),
(2, 'logout');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_admin`
--

CREATE TABLE `list_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `admin_name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level_admin_id` int(11) DEFAULT NULL,
  `last_login` text,
  `status_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `login` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_admin`
--

INSERT INTO `list_admin` (`admin_id`, `username`, `admin_name`, `email`, `password`, `level_admin_id`, `last_login`, `status_id`, `division_id`, `photo_id`, `login`) VALUES
(1, 'farhan20', 'Farhan rahmadi', 'huntzrahmadi@gmail.com', '$2y$10$F9yRKYMK/4mNud.ePjqsne0H7vKNdD.Tq9XBa2/cdGgSJHk17Jify', 3, '2018-07-05 11:32:43', 1, NULL, NULL, 0),
(2, 'huntz20', '', 'huntzrahmadi@gmail.com', '$2y$10$78NXFtVoWY2KwtqXQJZksu3HFYhm6o/KCr6bgME6.lfQZ79Mf8Z8e', 3, '2018-03-05 21:04:05', 4, NULL, NULL, 0),
(34, 'huntz', '', 'huntzrahmadi@gmail.com', '$2y$10$.rnqN2F9akk0r/L3L6vuiuqz88NJBv1KYAo8OVI7/AWfkW5pE3OSS', 3, NULL, 5, NULL, NULL, 0),
(35, 'tuaaa', '', 'huntzrahmadi@gmail.com', '$2y$10$EV53ybY1NnOcrASs4.tXHOoT45Vkf5MiisUN0aDZACYHk8.HiET0.', 3, NULL, 5, NULL, NULL, 0),
(36, 'irfan', '', 'irfanfadhli5@gmail.com', '$2y$10$Yxnu9sj/6ggX04D9AIrg9enFgUv/jbrwGiy0xwXwIp/JGwQzHaEc.', 3, NULL, 5, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_activity`
--

CREATE TABLE `log_activity` (
  `action_id` int(11) NOT NULL,
  `time_excution` varchar(100) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `link_target` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `photo`
--

CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL,
  `path_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `stat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`status_id`, `stat_name`) VALUES
(1, 'Active'),
(2, 'Inactive'),
(3, 'Suspend'),
(4, 'Waiting Corfirmation'),
(5, 'Waiting Accept ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `level_admin`
--
ALTER TABLE `level_admin`
  ADD PRIMARY KEY (`level_admin_id`);

--
-- Indexes for table `list_activity`
--
ALTER TABLE `list_activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `list_admin`
--
ALTER TABLE `list_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `level_admin_id` (`level_admin_id`),
  ADD KEY `division_id` (`division_id`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level_admin`
--
ALTER TABLE `level_admin`
  MODIFY `level_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `list_activity`
--
ALTER TABLE `list_activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `list_admin`
--
ALTER TABLE `list_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `list_admin`
--
ALTER TABLE `list_admin`
  ADD CONSTRAINT `list_admin_ibfk_1` FOREIGN KEY (`level_admin_id`) REFERENCES `level_admin` (`level_admin_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `list_admin_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `list_admin_ibfk_3` FOREIGN KEY (`level_admin_id`) REFERENCES `level_admin` (`level_admin_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `list_admin_ibfk_4` FOREIGN KEY (`division_id`) REFERENCES `division` (`division_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `list_admin_ibfk_5` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`photo_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log_activity`
--
ALTER TABLE `log_activity`
  ADD CONSTRAINT `log_activity_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `list_admin` (`admin_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `log_activity_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `list_activity` (`activity_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
