-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Lut 2022, 12:25
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `klienci`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adresy`
--

CREATE TABLE `adresy` (
  `id` int(10) UNSIGNED NOT NULL,
  `Osoby_id` int(10) UNSIGNED NOT NULL,
  `ulica` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `numer` int(10) UNSIGNED DEFAULT NULL,
  `miasto` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `adresy`
--

INSERT INTO `adresy` (`id`, `Osoby_id`, `ulica`, `numer`, `miasto`) VALUES
(1, 1, 'Mickiewicza', 54, 'Poznań'),
(2, 1, 'Sienkiewicza', 124, 'Poznań'),
(3, 2, 'Zielona', 14, 'Kraków'),
(4, 3, 'Swobodna', 134, 'Wrocław'),
(5, 4, 'Traugutta', 14, 'Warszawa'),
(6, 4, 'Olimpijska', 124, 'Warszawa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osoby`
--

CREATE TABLE `osoby` (
  `id` int(10) UNSIGNED NOT NULL,
  `imie` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `nazwisko` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `dataUr` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `osoby`
--

INSERT INTO `osoby` (`id`, `imie`, `nazwisko`, `dataUr`) VALUES
(1, 'Anna', 'Kowalewska', '2002-11-02'),
(2, 'Ewa', 'Kowalska', '2002-06-02'),
(3, 'Andrzej', 'Nowak', '2001-03-02'),
(4, 'Grzegorz', 'Wojciechowski', '1975-11-02'),
(5, 'Joanna', 'Nowakowska', '1986-02-02'),
(6, 'Anna', 'Nowak', '1974-11-02'),
(7, 'Piotr', 'Wiśniewski', '1975-01-02');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `telefony`
--

CREATE TABLE `telefony` (
  `id` int(10) UNSIGNED NOT NULL,
  `Osoby_id` int(10) UNSIGNED NOT NULL,
  `numer` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `telefony`
--

INSERT INTO `telefony` (`id`, `Osoby_id`, `numer`) VALUES
(1, 1, '111222333'),
(2, 1, '223344556'),
(3, 3, '222333444'),
(4, 2, '333444555'),
(5, 4, '444555666'),
(6, 5, '666665555'),
(7, 6, '223344555'),
(8, 6, '123456789'),
(9, 7, '987654321');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adresy`
--
ALTER TABLE `adresy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Adresy_FKIndex1` (`Osoby_id`);

--
-- Indeksy dla tabeli `osoby`
--
ALTER TABLE `osoby`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `telefony`
--
ALTER TABLE `telefony`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Telefony_FKIndex1` (`Osoby_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `adresy`
--
ALTER TABLE `adresy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `osoby`
--
ALTER TABLE `osoby`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `telefony`
--
ALTER TABLE `telefony`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
