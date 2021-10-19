

CREATE TABLE `lekarze` (
  `Imie` text COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `Specjalizacja` text COLLATE utf8_polish_ci NOT NULL,
  `Adres_zamieszkania` text COLLATE utf8_polish_ci NOT NULL,
  `Pesel` varchar(64) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;


INSERT INTO `lekarze` (`Imie`, `Nazwisko`, `Specjalizacja`, `Adres_zamieszkania`, `Pesel`) VALUES
('Andrzej', 'Cieslak', 'ginekolog', '90-987 Wawa, Piekna 3', '65120302014'),
('Maciej', 'Piękny', 'chirurg', '90-200 Piła, Zenona 43', '65883748599'),
('Anna', 'Gawrońska', 'internista', '91-283 Łódzka, Mala 34', '72837438427'),
('Angelika', 'Męska', 'internista', '23-456 Wawa, Macewicza 2', '74038274893'),
('Michał', 'Lasota', 'chirurg', '78-483 Piła, Śmiałą 8', '880472985006');

ALTER TABLE `lekarze`
  ADD PRIMARY KEY (`Pesel`);
