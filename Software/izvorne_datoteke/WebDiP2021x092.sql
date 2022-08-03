-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2022 at 11:27 AM
-- Server version: 5.5.62-0+deb8u1
-- PHP Version: 7.2.25-1+0~20191128.32+debian8~1.gbp108445

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebDiP2021x092`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivnost`
--

CREATE TABLE `aktivnost` (
  `aktivnost_id` int(11) NOT NULL,
  `naziv` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dnevnik_rada`
--

CREATE TABLE `dnevnik_rada` (
  `aktivnost_aktivnost_id` int(11) NOT NULL,
  `korisnik_korisnik_id` int(11) NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `opis` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drzava`
--

CREATE TABLE `drzava` (
  `drzava_id` int(11) NOT NULL,
  `naziv` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `oznaka` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `kontinent` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drzava`
--

INSERT INTO `drzava` (`drzava_id`, `naziv`, `oznaka`, `kontinent`) VALUES
(1, 'Hrvatska', 'HRV', 'Europa'),
(2, 'Slovenija', 'SLO', 'Europa'),
(3, 'Njemačka', 'DEU', 'Europa'),
(4, 'Kina', 'CHI', 'Azija'),
(5, 'Crna Gora', 'CG', 'Europa'),
(6, 'Španjolska', 'ESP', 'Europa'),
(7, 'Sjedinjene Američke Države', 'SAD', 'Sj. Amerika'),
(8, 'Kanada', 'CAD', 'Sj. Amerika'),
(9, 'Brazil', 'BRA', 'J. Amerika'),
(10, 'Mađarska', 'HUN', 'Europa');

-- --------------------------------------------------------

--
-- Table structure for table `etapa`
--

CREATE TABLE `etapa` (
  `etapa_id` int(11) NOT NULL,
  `naziv` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `vrijeme_pocetka` datetime NOT NULL,
  `zavrsena` tinyint(4) NOT NULL,
  `utrka_utrka_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `etapa`
--

INSERT INTO `etapa` (`etapa_id`, `naziv`, `vrijeme_pocetka`, `zavrsena`, `utrka_utrka_id`) VALUES
(1, 'Etapa 5km', '2022-09-19 08:00:00', 0, 1),
(2, 'Etapa 10km', '2022-09-21 09:00:00', 0, 1),
(3, 'Etapa 20km', '2022-06-21 11:00:00', 0, 4),
(4, 'Etapa 10km', '2022-08-03 11:00:00', 1, 10),
(5, 'Etapa 20km', '2022-08-06 10:00:00', 1, 10),
(6, 'Etapa 30km', '2022-08-08 08:00:00', 0, 10),
(7, 'Etapa 5km', '2022-06-13 09:00:00', 0, 2),
(8, 'Etapa 50km', '2022-07-08 07:00:00', 0, 5),
(9, 'Etapa 30km', '2022-07-12 09:00:00', 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnik_id` int(11) NOT NULL,
  `ime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `korisnicko_ime` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka_sha256` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `sol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `broj_neuspjesnih_prijava` int(11) NOT NULL DEFAULT '0',
  `datum_registracije` datetime NOT NULL,
  `aktiviran` tinyint(4) NOT NULL DEFAULT '0',
  `blokiran` tinyint(4) NOT NULL DEFAULT '0',
  `uvjeti_koristenja` tinyint(4) NOT NULL,
  `aktivacijski_kod` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tip_korisnika_tip_korisnika_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `ime`, `prezime`, `korisnicko_ime`, `email`, `lozinka`, `lozinka_sha256`, `sol`, `broj_neuspjesnih_prijava`, `datum_registracije`, `aktiviran`, `blokiran`, `uvjeti_koristenja`, `aktivacijski_kod`, `tip_korisnika_tip_korisnika_id`) VALUES
(1, 'Alan', 'Rogina', 'arogina', 'arogina@email.com', 'Alan!09?', '3aa06db4c89960ca483b7b3744341d06d256ebe5fa2de465b7d4ab5f8b50d36d', 'eaff917e02', 0, '0000-00-00 00:00:00', 0, 0, 1, '4548ca4a', 3),
(2, 'Pero', 'Perić', 'pperic', 'pperic@mail.com', 'Peric!!99?', '71ff7b75eb302857c2c8763b02755d7576f8e1552c26ef6e3f97bff5a6497cd6', '0cb8f3411b', 0, '0000-00-00 00:00:00', 0, 0, 1, '53f64503', 2),
(3, 'Ana', 'Anić', 'aanic', 'aanic@mail.com', 'Anic!09?', '833206471fcb208ae909d1739018ca122ba81bfc2e53124f54bd56598c9f3e46', 'fc3cf2978d', 0, '0000-00-00 00:00:00', 0, 0, 0, '3251d094', 1),
(4, 'Matko', 'Matić', 'mmatic', 'mmatic@mail.com', 'Matic!09?', '779e336f36f575b2b49f9c4d4a00033e542e12407ddeebf8cf174f6cf0b8a6b3', 'f92a086e1f', 0, '0000-00-00 00:00:00', 0, 0, 1, 'd3ba265d', 1),
(5, 'Marko', 'Marić', 'mmaric', 'mmaric@mail.com', 'Maric!09?', '245352eea85ca9dfa69b7cc75c37c36c401d3871ecb4ac2f6a42721beb7d6e40', 'c58b741c8c', 0, '0000-00-00 00:00:00', 0, 0, 0, 'c672d08c', 1),
(6, 'Bilbo', 'Baggins', 'bbaggins', 'bbaggins@mail.com', 'Baggins!09?', '0bb0ae8ec92fa1ff24857e05fd96e53d6de024970b0a1f0d975f9539680686a0', 'bf690592fa', 0, '0000-00-00 00:00:00', 0, 0, 1, '0da07f1f', 2),
(7, 'Jon', 'Snow', 'jsnow', 'jsnow@mail.com', 'Snow!09?', '0b6b7357e913158da9ab1400f365ed9af25abd8b60522996f7ca85cf1f20ad34', 'a9a769a5a0', 0, '0000-00-00 00:00:00', 0, 0, 1, '808ee4e0', 2),
(8, 'Frane', 'Franić', 'ffranic', 'ffranic@mail.com', 'Franic!09?', '2de3fe8a13706d68aa12a56d5dab40f1080aced12ddc9e747e0813175a2718f4', '72ced9619a', 0, '0000-00-00 00:00:00', 0, 0, 1, 'cae1035f', 1),
(9, 'Janja', 'Janić', 'jjanic', 'jjanic@mail.com', 'Janic!09?', '3b7995cddd63c241e2a593a08c26908f66aec25761a2ce4010d421cd1cbdf7b2', '9382964b92', 0, '0000-00-00 00:00:00', 0, 0, 0, 'ed2eb798', 1),
(10, 'Barbara', 'Barić', 'bbaric', 'bbaric@mail.com', 'Baric!09?', 'd7d16ef7df6393fdba1d5ee1947c1f85399e43cb63808e0fd7787d01f3725d98', '3491dc19e1', 0, '0000-00-00 00:00:00', 0, 0, 0, '716f272d', 1);

-- --------------------------------------------------------

--
-- Table structure for table `moderira`
--

CREATE TABLE `moderira` (
  `korisnik_korisnik_id` int(11) NOT NULL,
  `drzava_drzava_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `moderira`
--

INSERT INTO `moderira` (`korisnik_korisnik_id`, `drzava_drzava_id`) VALUES
(2, 1),
(6, 1),
(2, 2),
(2, 3),
(6, 4),
(7, 5),
(7, 6),
(6, 7),
(7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `prijavio`
--

CREATE TABLE `prijavio` (
  `korisnik_korisnik_id` int(11) NOT NULL,
  `utrka_utrka_id` int(11) NOT NULL,
  `datum_prijave` date NOT NULL,
  `godina_rodenja` int(11) NOT NULL,
  `slika` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prijavio`
--

INSERT INTO `prijavio` (`korisnik_korisnik_id`, `utrka_utrka_id`, `datum_prijave`, `godina_rodenja`, `slika`) VALUES
(1, 2, '2022-06-09', 1999, 'slike/1.jpg'),
(1, 3, '2022-06-09', 1999, 'slike/1.jpg'),
(1, 6, '2022-06-09', 1999, 'slike/1.jpg'),
(1, 10, '2022-06-09', 1999, 'slike/1.jpg'),
(2, 2, '2022-06-09', 2002, 'slike/2.jpg'),
(4, 2, '2022-06-09', 1999, 'slike/4.jpg'),
(4, 5, '2022-06-09', 1999, 'slike/4.jpg'),
(4, 10, '2022-06-09', 1999, 'slike/4.jpg'),
(5, 1, '2022-06-09', 1998, 'slike/5.jpg'),
(5, 2, '2022-06-09', 1998, 'slike/5.jpg'),
(6, 3, '2022-06-09', 1989, 'slike/6.jpg'),
(6, 5, '2022-06-09', 1989, 'slike/6.jpg'),
(6, 10, '2022-06-09', 1989, 'slike/6.jpg'),
(7, 2, '2022-06-09', 1992, 'slike/7.jpg'),
(7, 10, '2022-06-09', 1992, 'slike/7.jpg'),
(8, 2, '2022-06-09', 1995, 'slike/8.jpg'),
(8, 3, '2022-06-09', 1995, 'slike/8.jpg'),
(8, 10, '2022-06-09', 1995, 'slike/8.jpg'),
(9, 3, '2022-06-09', 1990, 'slike/9.jpg'),
(9, 6, '2022-06-09', 1990, 'slike/9.jpg'),
(10, 1, '2022-06-09', 1997, 'slike/10.jpg'),
(10, 5, '2022-06-09', 1997, 'slike/10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rezultat`
--

CREATE TABLE `rezultat` (
  `korisnik_korisnik_id` int(11) NOT NULL,
  `etapa_etapa_id` int(11) NOT NULL,
  `vrijeme` time NOT NULL,
  `bodovi` int(11) NOT NULL DEFAULT '0',
  `zavrsio` tinyint(4) NOT NULL DEFAULT '0',
  `pobjednik` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rezultat`
--

INSERT INTO `rezultat` (`korisnik_korisnik_id`, `etapa_etapa_id`, `vrijeme`, `bodovi`, `zavrsio`, `pobjednik`) VALUES
(1, 4, '01:21:11', 10, 1, 0),
(1, 5, '01:32:12', 0, 1, 0),
(1, 6, '02:10:11', 0, 1, 0),
(1, 7, '00:12:30', 0, 1, 0),
(2, 7, '00:13:15', 0, 1, 0),
(4, 4, '00:00:00', 0, 0, 0),
(4, 5, '01:40:23', 0, 1, 0),
(4, 6, '02:05:12', 0, 1, 0),
(5, 7, '00:11:02', 0, 1, 0),
(6, 4, '01:14:22', 100, 1, 1),
(6, 5, '01:25:30', 10, 1, 0),
(6, 6, '02:07:34', 0, 1, 0),
(7, 4, '01:25:10', 0, 1, 0),
(7, 5, '01:22:45', 100, 1, 1),
(7, 6, '02:11:23', 0, 1, 0),
(7, 7, '00:00:00', 0, 0, 0),
(8, 4, '01:14:40', 50, 1, 0),
(8, 5, '01:23:04', 50, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tip_korisnika`
--

CREATE TABLE `tip_korisnika` (
  `tip_korisnika_id` int(11) NOT NULL,
  `naziv` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`tip_korisnika_id`, `naziv`) VALUES
(1, 'Običan korisnik'),
(2, 'Moderator'),
(3, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tip_utrke`
--

CREATE TABLE `tip_utrke` (
  `tip_utrke_id` int(11) NOT NULL,
  `naziv` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `kratica` char(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tip_utrke`
--

INSERT INTO `tip_utrke` (`tip_utrke_id`, `naziv`, `kratica`) VALUES
(1, 'Maraton', 'MAR'),
(2, 'Polumaraton', 'PMAR'),
(3, 'Cross', 'CR'),
(4, 'Hodanje', 'HOD');

-- --------------------------------------------------------

--
-- Table structure for table `utrka`
--

CREATE TABLE `utrka` (
  `utrka_id` int(11) NOT NULL,
  `naziv` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `rok_prijave` date NOT NULL,
  `zavrsena` tinyint(4) NOT NULL,
  `tip_utrke_tip_utrke_id` int(11) NOT NULL,
  `drzava_drzava_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `utrka`
--

INSERT INTO `utrka` (`utrka_id`, `naziv`, `rok_prijave`, `zavrsena`, `tip_utrke_tip_utrke_id`, `drzava_drzava_id`) VALUES
(1, 'Jesenski maraton 2022', '2022-09-17', 0, 1, 1),
(2, 'Lipanjski Cross 2022', '2022-06-11', 0, 3, 2),
(3, 'Ljetni Cross 2022', '2022-06-26', 0, 3, 5),
(4, 'Ljetni polumaraton 2022', '2022-06-18', 0, 2, 1),
(5, 'Humanitarni maraton 2022', '2022-07-01', 0, 1, 3),
(6, 'Humanitarni polumaraton 2022', '2022-07-09', 0, 1, 6),
(7, 'Dječje hodanje 2022', '2022-06-26', 0, 4, 10),
(8, 'Godišnji ciklus hodanja 2022', '2022-07-23', 0, 4, 8),
(9, 'Srpanjski maraton 2022', '2022-07-10', 0, 1, 2),
(10, 'Morski maraton - Split 2022', '2022-08-01', 0, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivnost`
--
ALTER TABLE `aktivnost`
  ADD PRIMARY KEY (`aktivnost_id`);

--
-- Indexes for table `dnevnik_rada`
--
ALTER TABLE `dnevnik_rada`
  ADD PRIMARY KEY (`aktivnost_aktivnost_id`,`korisnik_korisnik_id`),
  ADD KEY `fk_aktivnost_has_korisnik_korisnik1_idx` (`korisnik_korisnik_id`),
  ADD KEY `fk_aktivnost_has_korisnik_aktivnost1_idx` (`aktivnost_aktivnost_id`);

--
-- Indexes for table `drzava`
--
ALTER TABLE `drzava`
  ADD PRIMARY KEY (`drzava_id`);

--
-- Indexes for table `etapa`
--
ALTER TABLE `etapa`
  ADD PRIMARY KEY (`etapa_id`),
  ADD KEY `fk_etapa_utrka1_idx` (`utrka_utrka_id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnik_id`),
  ADD UNIQUE KEY `lozinka_sha256_UNIQUE` (`lozinka_sha256`),
  ADD UNIQUE KEY `lozinka_UNIQUE` (`lozinka`),
  ADD KEY `fk_korisnik_tip_korisnika_idx` (`tip_korisnika_tip_korisnika_id`);

--
-- Indexes for table `moderira`
--
ALTER TABLE `moderira`
  ADD PRIMARY KEY (`korisnik_korisnik_id`,`drzava_drzava_id`),
  ADD KEY `fk_korisnik_has_drzava_drzava1_idx` (`drzava_drzava_id`),
  ADD KEY `fk_korisnik_has_drzava_korisnik1_idx` (`korisnik_korisnik_id`);

--
-- Indexes for table `prijavio`
--
ALTER TABLE `prijavio`
  ADD PRIMARY KEY (`korisnik_korisnik_id`,`utrka_utrka_id`),
  ADD KEY `fk_korisnik_has_utrka_utrka1_idx` (`utrka_utrka_id`),
  ADD KEY `fk_korisnik_has_utrka_korisnik1_idx` (`korisnik_korisnik_id`);

--
-- Indexes for table `rezultat`
--
ALTER TABLE `rezultat`
  ADD PRIMARY KEY (`korisnik_korisnik_id`,`etapa_etapa_id`),
  ADD KEY `fk_korisnik_has_etapa_etapa1_idx` (`etapa_etapa_id`),
  ADD KEY `fk_korisnik_has_etapa_korisnik1_idx` (`korisnik_korisnik_id`);

--
-- Indexes for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  ADD PRIMARY KEY (`tip_korisnika_id`);

--
-- Indexes for table `tip_utrke`
--
ALTER TABLE `tip_utrke`
  ADD PRIMARY KEY (`tip_utrke_id`);

--
-- Indexes for table `utrka`
--
ALTER TABLE `utrka`
  ADD PRIMARY KEY (`utrka_id`),
  ADD KEY `fk_utrka_tip_utrke1_idx` (`tip_utrke_tip_utrke_id`),
  ADD KEY `fk_utrka_drzava1_idx` (`drzava_drzava_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivnost`
--
ALTER TABLE `aktivnost`
  MODIFY `aktivnost_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drzava`
--
ALTER TABLE `drzava`
  MODIFY `drzava_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `etapa`
--
ALTER TABLE `etapa`
  MODIFY `etapa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  MODIFY `tip_korisnika_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tip_utrke`
--
ALTER TABLE `tip_utrke`
  MODIFY `tip_utrke_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `utrka`
--
ALTER TABLE `utrka`
  MODIFY `utrka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dnevnik_rada`
--
ALTER TABLE `dnevnik_rada`
  ADD CONSTRAINT `fk_aktivnost_has_korisnik_aktivnost1` FOREIGN KEY (`aktivnost_aktivnost_id`) REFERENCES `aktivnost` (`aktivnost_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aktivnost_has_korisnik_korisnik1` FOREIGN KEY (`korisnik_korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `etapa`
--
ALTER TABLE `etapa`
  ADD CONSTRAINT `fk_etapa_utrka1` FOREIGN KEY (`utrka_utrka_id`) REFERENCES `utrka` (`utrka_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_korisnik_tip_korisnika` FOREIGN KEY (`tip_korisnika_tip_korisnika_id`) REFERENCES `tip_korisnika` (`tip_korisnika_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `moderira`
--
ALTER TABLE `moderira`
  ADD CONSTRAINT `fk_korisnik_has_drzava_korisnik1` FOREIGN KEY (`korisnik_korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_has_drzava_drzava1` FOREIGN KEY (`drzava_drzava_id`) REFERENCES `drzava` (`drzava_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prijavio`
--
ALTER TABLE `prijavio`
  ADD CONSTRAINT `fk_korisnik_has_utrka_korisnik1` FOREIGN KEY (`korisnik_korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_has_utrka_utrka1` FOREIGN KEY (`utrka_utrka_id`) REFERENCES `utrka` (`utrka_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rezultat`
--
ALTER TABLE `rezultat`
  ADD CONSTRAINT `fk_korisnik_has_etapa_korisnik1` FOREIGN KEY (`korisnik_korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_has_etapa_etapa1` FOREIGN KEY (`etapa_etapa_id`) REFERENCES `etapa` (`etapa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `utrka`
--
ALTER TABLE `utrka`
  ADD CONSTRAINT `fk_utrka_tip_utrke1` FOREIGN KEY (`tip_utrke_tip_utrke_id`) REFERENCES `tip_utrke` (`tip_utrke_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utrka_drzava1` FOREIGN KEY (`drzava_drzava_id`) REFERENCES `drzava` (`drzava_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
