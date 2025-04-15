-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Cze 2022, 09:42
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
-- Baza danych: `kadra`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id` int(10) UNSIGNED NOT NULL,
  `stanowiska_id` int(10) UNSIGNED NOT NULL,
  `imie` varchar(20) DEFAULT NULL,
  `nazwisko` varchar(30) DEFAULT NULL,
  `pensja` int(10) UNSIGNED DEFAULT NULL,
  `staz` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id`, `stanowiska_id`, `imie`, `nazwisko`, `pensja`, `staz`) VALUES
(1, 1, 'Krzysztof', 'Dobromilski', 8000, 30),
(2, 3, 'Ewa', 'Nowak', 5000, 20),
(3, 2, 'Joanna', 'Trojanowska', 6000, 15),
(4, 4, 'Jan', 'Nowacki', 5050, 10),
(5, 4, 'Ewelina', 'Kowal', 5000, 5),
(6, 4, 'Grzegorz', 'Kowalski', 5000, 5),
(7, 4, 'Janusz', 'Kos', 4700, 1),
(8, 4, 'Andżelika', 'Lawendowska', 4700, 2),
(9, 2, 'Konrad', 'Grzegorzewski', 6000, 13),
(10, 5, 'Jolanta', 'Trębosz', 4000, 10),
(11, 5, 'Michał', 'Tyniec', 4000, 9),
(12, 5, 'Joachim', 'Teterycz', 4000, 8),
(13, 5, 'Krzysztof', 'Gołębiowski', 3800, 5),
(14, 5, 'Adam', 'Sośnicki', 3800, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stanowiska`
--

CREATE TABLE `stanowiska` (
  `id` int(10) UNSIGNED NOT NULL,
  `nazwa` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `stanowiska`
--

INSERT INTO `stanowiska` (`id`, `nazwa`) VALUES
(1, 'Dyrektor'),
(2, 'Kierownik'),
(3, 'Kadrowa'),
(4, 'Logistyk'),
(5, 'Operator');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `stanowiska`
--
ALTER TABLE `stanowiska`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `stanowiska`
--
ALTER TABLE `stanowiska`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
