-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Lut 2020, 12:05
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `kolor` text NOT NULL,
  `cena` int(11) NOT NULL,
  `pojemnosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `farby`
--

INSERT INTO `farby` (`id_farby`, `kolor`, `cena`, `pojemnosc`) VALUES
(1, 'bialy', 20, 5),
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
  `id_farby` int(11) DEFAULT NULL,
  `liczba_puszek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`id_pomieszczenia`,`id_sciany`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
