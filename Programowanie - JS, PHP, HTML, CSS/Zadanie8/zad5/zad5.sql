-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Lip 2015, 13:09
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `meteo`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lokalizacja`
--

CREATE TABLE IF NOT EXISTS `lokalizacja` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nazwa` text,
  `Adres` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `lokalizacja`
--

INSERT INTO `lokalizacja` (`id`, `Nazwa`, `Adres`) VALUES
(1, 'WAW1', 'Warszawa, Koszykowa 75'),
(2, 'SZC1', 'Szczecin, Przestrzenna 10');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pogoda`
--

CREATE TABLE IF NOT EXISTS `pogoda` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `temperatura` int(11) DEFAULT NULL,
  `Opad` int(10) unsigned DEFAULT NULL,
  `Cisnienie` int(10) unsigned DEFAULT NULL,
  `PredkoscWiatru` int(10) unsigned DEFAULT NULL,
  `Wilgotnosc` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `pogoda`
--

INSERT INTO `pogoda` (`id`, `temperatura`, `Opad`, `Cisnienie`, `PredkoscWiatru`, `Wilgotnosc`) VALUES
(1, 23, 0, 1017, 4, 60),
(2, 21, 0, 1004, 40, 50),
(3, 18, 0, 990, 3, 55),
(4, 23, 0, 1000, 30, 30),
(5, 19, 0, 1000, 30, 30);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `prognoza`
--

CREATE TABLE IF NOT EXISTS `prognoza` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Lokalizacja_id` int(10) unsigned NOT NULL,
  `Pogoda_id` int(10) unsigned NOT NULL,
  `dataProg` date DEFAULT NULL,
  `godzina` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `prognoza`
--

INSERT INTO `prognoza` (`id`, `Lokalizacja_id`, `Pogoda_id`, `dataProg`, `godzina`) VALUES
(1, 1, 1, '2015-07-01', '17:00:00'),
(2, 2, 2, '2015-07-01', '17:00:00'),
(3, 1, 3, '2015-07-02', '17:00:00'),
(4, 2, 4, '2015-07-02', '17:00:00'),
(5, 1, 5, '2015-07-03', '17:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
