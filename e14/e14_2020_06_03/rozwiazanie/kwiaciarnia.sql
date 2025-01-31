-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Gru 2022, 16:22
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kwiaciarnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kwiaciarnie`
--

CREATE TABLE `kwiaciarnie` (
  `id_kwiaciarni` int(11) NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_bin NOT NULL,
  `miasto` varchar(255) COLLATE utf8_bin NOT NULL,
  `ulica` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `kwiaciarnie`
--

INSERT INTO `kwiaciarnie` (`id_kwiaciarni`, `nazwa`, `miasto`, `ulica`) VALUES
(1, 'Astra', 'Warszawa', 'Sobieskiego'),
(2, 'Melisa', 'Malbork', 'Konopnickiej');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zam` int(11) NOT NULL,
  `id_kwiaciarni` int(11) NOT NULL,
  `data` date NOT NULL,
  `kwiaty` varchar(255) COLLATE utf8_bin NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`id_zam`, `id_kwiaciarni`, `data`, `kwiaty`, `cena`) VALUES
(1, 1, '2017-01-16', 'róża', 250),
(2, 1, '2017-01-10', 'gerbera', 120),
(3, 2, '2017-01-06', 'róża', 200),
(4, 2, '2017-01-09', 'goździk', 170),
(5, 1, '2017-01-07', 'róża', 125),
(6, 1, '2017-01-11', 'róża', 75);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kwiaciarnie`
--
ALTER TABLE `kwiaciarnie`
  ADD PRIMARY KEY (`id_kwiaciarni`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_zam`),
  ADD KEY `id_kwiaciarni` (`id_kwiaciarni`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `kwiaciarnie`
--
ALTER TABLE `kwiaciarnie`
  MODIFY `id_kwiaciarni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id_zam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`id_kwiaciarni`) REFERENCES `kwiaciarnie` (`id_kwiaciarni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
