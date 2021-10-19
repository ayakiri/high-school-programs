-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Wrz 2020, 10:55
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `SZKOLAA`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Uczniowie`
--

CREATE TABLE `uczniowie` (
  `id_ucz` int(11) NOT NULL,
  `Nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `Imię` text COLLATE utf8_polish_ci NOT NULL,
  `PESEL` text COLLATE utf8_polish_ci NOT NULL,
  `Adres_ul` text COLLATE utf8_polish_ci NOT NULL,
  `Adres_nr` text COLLATE utf8_polish_ci NOT NULL,
  `Miasto` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Uczniowie`
--

INSERT INTO `Uczniowie` (`id_ucz`, `Nazwisko`, `Imię`, `PESEL`, `Adres_ul`, `Adres_nr`, `Miasto`) VALUES
(1, 'Abacki', 'Jan', '95091202012', 'Nocna', '21a', 'Gniezno'),
(2, 'Babacki', 'Tomasz', '96100102013', 'Gwiezdna', '2', 'Gniezno'),
(3, 'Cabacki', 'Jerzy', '95110902056', 'Mierna', '13b', 'Kutno'),
(4, 'Dabacki', 'Tobiasz', '94010398345', 'Bierna', '3', 'Miastko'),
(5, 'Ebacki', 'Adrian', '95010198934', 'Marna', '456', 'Mielno');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `Uczniowie`
--
ALTER TABLE `Uczniowie`
  ADD PRIMARY KEY (`id_ucz`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Uczniowie`
--
ALTER TABLE `Uczniowie`
  MODIFY `id_ucz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
