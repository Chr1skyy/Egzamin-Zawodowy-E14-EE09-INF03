-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Lip 2022, 14:56
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
-- Baza danych: `malarz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `farby`
--

CREATE TABLE `farby` (
  `id_farby` int(11) NOT NULL,
  `kolor` text COLLATE utf8_bin NOT NULL,
  `cena` int(11) NOT NULL,
  `pojemnosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `farby`
--

INSERT INTO `farby` (`id_farby`, `kolor`, `cena`, `pojemnosc`) VALUES
(1, 'biały', 20, 5),
(2, 'czerwony', 30, 3),
(3, 'niebieski', 35, 3),
(4, 'żółty', 22, 4),
(5, 'zielony', 30, 4),
(6, 'czarny', 50, 2),
(7, 'fioletowy', 64, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `malowanie`
--

CREATE TABLE `malowanie` (
  `id_pomieszczenia` int(11) NOT NULL,
  `id_sciany` int(11) NOT NULL,
  `id_farby` int(11) NOT NULL,
  `liczba_puszek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `malowanie`
--

INSERT INTO `malowanie` (`id_pomieszczenia`, `id_sciany`, `id_farby`, `liczba_puszek`) VALUES
(1, 1, 1, 3),
(1, 2, 3, 2),
(1, 3, 1, 3),
(1, 4, 1, 2),
(2, 1, 7, 4),
(2, 2, 6, 3),
(2, 3, 5, 5),
(2, 4, 3, 2),
(3, 1, 5, 2),
(3, 2, 2, 2),
(4, 4, 5, 2),
(5, 1, 2, 2),
(5, 2, 6, 4);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `farby`
--
ALTER TABLE `farby`
  ADD PRIMARY KEY (`id_farby`);

--
-- Indeksy dla tabeli `malowanie`
--
ALTER TABLE `malowanie`
  ADD PRIMARY KEY (`id_pomieszczenia`,`id_sciany`),
  ADD KEY `id_farby` (`id_farby`) USING BTREE;

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `farby`
--
ALTER TABLE `farby`
  MODIFY `id_farby` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `malowanie`
--
ALTER TABLE `malowanie`
  ADD CONSTRAINT `malowanie_ibfk_1` FOREIGN KEY (`id_farby`) REFERENCES `farby` (`id_farby`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
