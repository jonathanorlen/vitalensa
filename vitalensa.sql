-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Apr 2019 pada 04.59
-- Versi Server: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vitalensa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE IF NOT EXISTS `content` (
`id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(7) DEFAULT NULL,
  `judul` varchar(40) NOT NULL,
  `display` varchar(200) NOT NULL,
  `text` longtext,
  `foto` varchar(40) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `content`
--

INSERT INTO `content` (`id`, `date`, `time`, `judul`, `display`, `text`, `foto`, `category`, `view`) VALUES
(1, '2019-03-19', NULL, 'orlen dsjkfsjdfhjsdh', 'ashdjahsdjashdashdjashjkdhasjhasdhja', '<p>adwdssdasdasdasdasdsadasd</p>', 'foto19032019112359.png', 'renungan', 0),
(2, '2019-03-19', NULL, 'asdsasdasdasdasdasdasd', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', '<p>asdasdsadsd</p>', 'foto19032019122305.png', 'renungan', 0),
(5, '2019-03-19', NULL, 'asdasdasdasdasdasd', 'asdasdasdasdasdasdasdasdasdasdasdasd', '<p>asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd<br></p>', 'foto19032019010918.jpg', 'renungan', 0),
(6, '2019-03-19', NULL, 'asdasdasdasdasdasda', 'sdasdasdasdasdsadasdsdfdsfsdfsdf', '<p>sdfsdfsdfsdfsdfsdfsdfsdfsdf</p>', 'foto19032019011120.jpg', 'renungan', 0),
(7, '2019-03-19', NULL, 'ashipa ganti ini judul', 'Coba ganti apakah bisa atau tidak walalalal', '<p>sadfasfasdfsdafadsfsadfasfasdfsdafadsfsadfasfasdfsdafadsfsadfasfasdfsdafadsf<br></p>', 'foto19032019011642.jpg', 'renungan', 0),
(27, '2019-03-31', '18:07', 'asdasdasdasasdasdasdasasdasdasdasasdasda', 'asdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasa', '<p>asdasdasdasdddddddddddddddddddddddddddddddddddddddddddddddddddddddd</p>', 'foto31032019060750.jpg', 'aktivitas', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galery`
--

CREATE TABLE IF NOT EXISTS `galery` (
`id` int(11) NOT NULL,
  `judul` varchar(35) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `galery`
--

INSERT INTO `galery` (`id`, `judul`, `foto`) VALUES
(8, 'asdasdasd', 'galery22032019024805.jpg'),
(11, 'orlen', 'galery22032019034720.jpg'),
(12, 'sanji', 'galery31032019060537.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `home`
--

CREATE TABLE IF NOT EXISTS `home` (
  `id` int(11) NOT NULL,
  `id_content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `home`
--

INSERT INTO `home` (`id`, `id_content`) VALUES
(1, '7'),
(2, '7'),
(3, '7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `status` varchar(7) NOT NULL,
  `control` varchar(45) NOT NULL,
  `login` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `username`, `status`, `control`, `login`, `foto`) VALUES
(1, 'Jonathan Orlen', '12345', 'orlen', 'aktif', '', 0, ''),
(2, 'orlen', '12345', 'orlen', '', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galery`
--
ALTER TABLE `galery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
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
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `galery`
--
ALTER TABLE `galery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
