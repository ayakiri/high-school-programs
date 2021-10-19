-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Lis 2020, 18:02
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `shop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klienci` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id_klienci`, `login`, `haslo`, `email`) VALUES
(1, 'Aya', 'qwertyuiop', 'tak@gmail.com'),
(2, 'adam', 'asdfghjkl', 'adam@wp.pl'),
(3, 'Bob', '1234', 'bobby@wp.pl'),
(4, 'Dean', 'qwerty123', 'castiel@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produktu` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `dostepna_ilosc` int(11) NOT NULL,
  `zdjecie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id_produktu`, `nazwa`, `cena`, `dostepna_ilosc`, `zdjecie`) VALUES
(1, 'Eel', 25, 40, 1),
(2, 'Pumpkin', 100, 5, 2),
(3, 'Corn', 50, 7, 3),
(4, 'Leek', 10, 16, 4),
(5, 'Grapes', 30, 8, 5),
(6, 'Mushroom', 6, 58, 6),
(7, 'Plum', 5, 49, 7),
(8, 'Hazelenut', 8, 75, 8),
(9, 'Oyster', 35, 12, 9),
(10, 'Coconut', 19, 4, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int(11) NOT NULL,
  `klient_login` text COLLATE utf8_polish_ci NOT NULL,
  `wartosc` int(11) NOT NULL,
  `zawartosc` text COLLATE utf8_polish_ci NOT NULL,
  `data_zamowienia` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`id_zamowienia`, `klient_login`, `wartosc`, `zawartosc`, `data_zamowienia`) VALUES
(4, '0', 0, '$zawartosc', '0000-00-00'),
(5, '0', 0, '$zawartosc', '0000-00-00'),
(6, '2', 0, 'Eel  Pumpkin  Corn  Leek  Grapes  Mushroom  Plum  Hazelnut  Oyster  Coconut ', '0000-00-00'),
(7, '2', 75, 'Eel 3 Pumpkin  Corn  Leek  Grapes  Mushroom  Plum  Hazelnut  Oyster  Coconut ', '0000-00-00'),
(8, '2', 76, 'Eel  Pumpkin  Corn  Leek  Grapes  Mushroom  Plum  Hazelnut  Oyster  Coconut 4', '0000-00-00'),
(9, '2', 88, 'Eel 2 Pumpkin  Corn  Leek  Grapes  Mushroom  Plum  Hazelnut  Oyster  Coconut 2', '1997'),
(10, '2', 118, 'Eel  Pumpkin  Corn 2 Leek  Grapes  Mushroom 3 Plum  Hazelnut  Oyster  Coconut ', '1997'),
(11, '2', 20, 'Eel  Pumpkin  Corn  Leek 2 Grapes  Mushroom 0 Plum  Hazelnut  Oyster  Coconut ', '1997'),
(12, '2', 50, 'Eel 2 Pumpkin  Corn  Leek  Grapes  Mushroom  Plum  Hazelnut  Oyster  Coconut ', '1997'),
(13, '2', 100, 'Eel 4 Pumpkin  Corn  Leek  Grapes  Mushroom  Plum  Hazelnut  Oyster  Coconut ', '1997'),
(14, '2', 38, 'Eel  Pumpkin  Corn  Leek  Grapes  Mushroom  Plum  Hazelnut  Oyster  Coconut 2', '2020-11-12'),
(15, '4', 105, 'Eel  Pumpkin  Corn  Leek  Grapes  Mushroom  Plum  Hazelnut  Oyster 3 Coconut ', '2020-11-12'),
(16, '2', 0, 'Eel  Pumpkin  Corn  Leek  Grapes  Mushroom  Plum  Hazelnut  Oyster  Coconut ', '2020-11-12');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienci`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produktu`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD KEY `klient_id` (`klient_login`(1024));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
