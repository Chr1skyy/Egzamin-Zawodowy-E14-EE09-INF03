-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 22, 2024 at 11:05 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `przepisy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `alergeny`
--

CREATE TABLE `alergeny` (
  `idAlergeny` int(10) UNSIGNED NOT NULL,
  `alergen` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `alergeny`
--

INSERT INTO `alergeny` (`idAlergeny`, `alergen`) VALUES
(1, 'gluten'),
(2, 'laktoza'),
(3, 'czekolada'),
(4, 'orzechy'),
(5, 'truskawki'),
(6, 'seler');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lista_alergenow`
--

CREATE TABLE `lista_alergenow` (
  `idLista` int(10) UNSIGNED NOT NULL,
  `idAlergeny` int(10) UNSIGNED NOT NULL,
  `idPotrawy` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `lista_alergenow`
--

INSERT INTO `lista_alergenow` (`idLista`, `idAlergeny`, `idPotrawy`) VALUES
(18, 1, 1),
(19, 2, 1),
(20, 5, 2),
(21, 6, 7),
(22, 1, 3),
(23, 2, 4),
(24, 4, 4),
(25, 1, 5),
(26, 1, 6),
(27, 2, 6),
(28, 4, 6),
(29, 1, 8),
(30, 1, 9),
(31, 2, 9),
(32, 1, 10),
(33, 2, 10),
(34, 4, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `potrawy`
--

CREATE TABLE `potrawy` (
  `idPotrawy` int(10) UNSIGNED NOT NULL,
  `idRodzaje` int(10) UNSIGNED NOT NULL,
  `nazwa` varchar(50) DEFAULT NULL,
  `plik` varchar(50) DEFAULT NULL,
  `trudnosc` tinyint(3) UNSIGNED DEFAULT NULL,
  `kalorie` int(10) UNSIGNED DEFAULT NULL,
  `przepis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `potrawy`
--

INSERT INTO `potrawy` (`idPotrawy`, `idRodzaje`, `nazwa`, `plik`, `trudnosc`, `kalorie`, `przepis`) VALUES
(1, 1, 'Sernik z brzoskwiniami', 'sernik.jpg', 2, 295, 'Miękkie masło ubijamy z cukrem pudrem, aż powstanie puszysta masa. Po chwili dodajemy po jednym żółtku cały czas mieszając. Następnie dodajemy twaróg sernikowy i nadal mieszamy. Do powstałej masy dodajemy cukier waniliowy, mąkę ziemniaczaną oraz śmietankę. Cały czas mieszamy, aż do połączenia się składników. Białka ubijamy na sztywną pianę. Dodajemy do masy serowej. Delikatnie mieszamy, nie za długo, aby masa się nie napowietrzyła. Formę na sernik wykładamy papierem do pieczenia. Powstałą masę przelewamy do formy i wyrównujemy wierzch. Pieczemy ok 55 min w temperaturze ok 170 C. Studzimy przy uchylonych drzwiczkach. Przed podaniem posypujemy cukrem pudrem.'),
(2, 5, 'Prosta sałatka', 'salatka.jpg', 1, 134, 'Awokado i czerwoną cebulę pokrój w plastry, pomidorki koktajlowe przekrój na pół, posiekaj natkę kolendry. Fasolę i kukurydzę wypłucz w zimnej wodzie, wyciśnij sok z limonki. Cebulę, kolendrę, pomidorki, fasolę, awokado i kukurydzę delikatnie wymieszaj z porwanymi liśćmi sałaty. Średniej wielkości dojrzałe pomidory zetrzyj na tarce, połącz z oliwą, sokiem z limonki, łyżeczką cukru, szczyptą soli oraz z ulubioną przyprawą. Gotowym dressingiem polej sałatkę. Podawaj z chipsami.'),
(3, 3, 'Amerykańskie pankejki', 'pankejki.jpg', 1, 214, 'Angielskie pancakes, po polsku placuszki. Można podać na deser lub na słodkie śniadanie. To kolejny łatwy deser, cała filozofia w dokładnym wymieszaniu składników ciasta. Obie mąki połącz z cukrem i wiórkami. Jajko roztrzep z mlekiem, wlej do suchych składników i dobrze wymieszaj. Na koniec wsyp skórkę z limonki i wymieszaj jeszcze raz. Nabieraj łyżka porcje ciasta i smaż je (po 2 minuty z każdej strony) na rozgrzanym oleju. Podawaj z syropem klonowym, miodem lub świeżymi owocami.'),
(4, 2, 'Nugetsy z kurczaka', 'nugetsy.jpg', 2, 321, 'Piersi z kurczaka pokroiłam w paseczki. Posoliłam, popieprzyłam dodałam czosnku i słodkiej papryki, polałam oliwką i odstawiłam do lodówki. Wyłożyłam je na blachę wyłożoną papierem do pieczenia do rozgrzanego piekarnika. Lekko skropiłam oliwką i piekłam około 30 minut. Można też usmażyć nugetsy na rozgrzanym oleju. Do nugetsów można zrobić różne sosy w zależności od smaków. Spróbuj je z miodem. Smacznego!'),
(5, 2, 'Łosoś zapiekany', 'losos.jpg', 2, 251, 'Filety łososia skrop oliwą, posyp otartą skórką z cytryny i oprósz pieprzem. Następnie ułóż na blasze wyłożonej pergaminem i upiecz w nagrzanym do 180 °C piekarniku – czas pieczenia ok. 8-10 minut. W rondelku przesmaż posiekaną cebulę, dodaj imbir. Wlej sok pomarańczowy, dodaj miód oraz Sos do pieczeni. Całość zagotuj. Zmniejsz ogień i gotuj sos 3 minuty. Upieczone filety nałóż na talerze i polej przygotowanym sosem. Podawaj z ryżem i chrupiącą sałatą.'),
(6, 2, 'Gorący kociołek', 'kociolek.jpg', 3, 234, 'Mięso pokrój w grubą kostkę ok. 2 x 2 cm. Oprósz delikatnie przyprawą i odłóż na bok. Kiełbasę pokrój w grube plastry, selera, marchew, cebulę, paprykę, ogórki i ziemniaki pokrój w dużą kostkę podobnej wielkości - 2 x 2 cm. Mięso tuz przed smażeniem obtocz w mące. Do garnka z grubym dnem wrzuć kiełbasę chorizo, smaż powoli, aż wytopi się z niej tłuszcz. Dodaj mięso i smaż, aż się zarumieni. Dodaj selera, cebulę, ziemniaki, marchew, paprykę. Warzywa smaż dłuższą chwilę do zarumienienia. Dodaj dwie szklanki wody i całość duś pod przykryciem ok. 15 minut, aż ziemniaki zrobią się miękkie. Dodaj wtedy puszkę pomidorów, ogórki, ciecierzycę oraz łyżkę pasty chili. Jeśli uznasz to za konieczne, dodaj jeszcze odrobinę wody. Gulasz duś pod przykryciem, aż mięso zrobi się zupełnie miękkie, ok. 30 minut.'),
(7, 2, 'Jagnięcina', 'jagniecina.jpg', 3, 225, 'Mięso oczyść z błon i pokrój na mniejsze kotleciki tak, aby każdy był z kostką. Czosnek, liście mięty oraz igiełki rozmarynu drobno posiekaj. Ziarno jałowca rozgnieć nożem. Wrzuć wszystko do miski. Dodaj olej, musztardę oraz przyprawę. Starannie wymieszaj składniki marynaty. Zamarynuj mięso i odstaw na co najmniej 2 godziny. Kotleciki smaż na grillu po kilka minut z każdej strony. Powinny pozostać lekko różowe w środku.'),
(8, 2, 'Hamburgery kraftowe', 'hamburger.jpg', 3, 208, 'Cebulę oraz boczek pokrój w drobną kostkę – przesmaż razem na rozgrzanej oliwie. Pestki upraż na suchej rozgrzanej patelni. Mięso z indyka zmiel w maszynce. Do mielonego mięsa dodaj przyprawę, boczek z cebulą oraz uprażone pestki i posiekaną natkę. Z mięsnej masy uformuj 4 płaski burgery a następnie smaż je na rozgrzanym grillu ok. 10 minut przewracając co jakiś czas. Na chwilę przed końcem smażenia połóż na każdej porcji plaster sera. W tym sam czasie opiecz przekrojone na połówki bułki i posmaruj każdą z nich sosem majonezowym. Następnie na każdej bułce połóż burgera oraz przygotowane dodatki. Wierzch przykryj pozostałą bułką. Hamburgery zepnij długą wykałaczką lub szpadką i podawaj.'),
(9, 1, 'Eklerki', 'eklerki.jpg', 3, 314, 'Masło roztopić w garnku, dodać wodę i zagotować. Wsypać mąkę i przez chwilę ucierać drewnianą łyżką aż powstanie gęsta i gładka masa odchodząca od brzegów garnka. Przełożyć do miski, ostudzić. Dodawać po jednym jajku mieszając drewnianą łyżką lub miksując mikserem na wolnych obrotach, aż uzyskamy gładką masę, pod koniec dodać proszek do pieczenia i dokładnie zmiksować. Piekarnik nagrzać do 200 stopni C. Blachę do pieczenia wyłożyć papierem. Ciasto włożyć do rękawa cukierniczego z dużą końcówką 2 cm. Można też ciasto rozsmarować za pomocą łyżki. Wycisnąć ok. 7 - 8 cm paski masy z rękawa zachowując kilkucentymetrowe odstępy (ciasto urośnie podczas pieczenia) i wstawić do piekarnika. Piec przez ok. 22 minuty na złoty kolor. Podczas pieczenia nie otwierać drzwiczek piekarnika bo ciasto opadnie. Upieczone eklerki zdjąć z blaszki i ostudzić, upiec kolejną porcję ciasta. Eklerki przekroić wzdłuż, na dolną część nałożyć bitą śmietanę lub krem (np. za pomocą szprycy i rękawa cukierniczego), przykryć górną częścią i posypać cukrem pudrem lub polać polewą.'),
(10, 1, 'Hiszpańskie churros', 'churros.jpg', 2, 334, 'W rondelku z wodą rozpuść prawdziwe masło. Do ciepłej wody dodaj mąkę pszenną i bardzo dokładnie wymieszaj wszystkie składniki, do momentu, w którym powstanie gęsta i jednolita masa. Odstaw gęstą masę do przestudzenia. Do przestudzonej masy jajecznej dodaj kurze jaja i zmiksuj na gładką masę. Tak powstałe ciasto jest gotowe do smażenia. Do głębokiej patelni lub szerokiego garnka wlej olej i dobrze rozgrzej tłuszcz. Następnie za pomocą rękawa cukierniczego wyciskaj churros bezpośrednio na olej i smaż w głębokim tłuszczu, aż hiszpańskie ciasteczka z obu stron ładnie się zarumienią. Czynność powtarzaj do wyczerpania ciasta. Usmażone ciasteczka churros wyławiaj z oleju za pomocą łyżki cedzakowej z dziurkami i przekładaj na talerz wyłożony warstwą ręcznika papierowego, który wchłonie nadmiar tłuszczu. Gotowe churros serwuj posypane cukrem pudrem.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rodzaje`
--

CREATE TABLE `rodzaje` (
  `idRodzaje` int(10) UNSIGNED NOT NULL,
  `rodzaj` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `rodzaje`
--

INSERT INTO `rodzaje` (`idRodzaje`, `rodzaj`) VALUES
(1, 'ciasta'),
(2, 'dania mięsne'),
(3, 'dania jarskie'),
(4, 'zupy'),
(5, 'sałatki');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `alergeny`
--
ALTER TABLE `alergeny`
  ADD PRIMARY KEY (`idAlergeny`);

--
-- Indeksy dla tabeli `lista_alergenow`
--
ALTER TABLE `lista_alergenow`
  ADD PRIMARY KEY (`idLista`),
  ADD KEY `idPotrawy` (`idPotrawy`),
  ADD KEY `idAlergeny` (`idAlergeny`);

--
-- Indeksy dla tabeli `potrawy`
--
ALTER TABLE `potrawy`
  ADD PRIMARY KEY (`idPotrawy`),
  ADD KEY `idRodzaje` (`idRodzaje`);

--
-- Indeksy dla tabeli `rodzaje`
--
ALTER TABLE `rodzaje`
  ADD PRIMARY KEY (`idRodzaje`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alergeny`
--
ALTER TABLE `alergeny`
  MODIFY `idAlergeny` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lista_alergenow`
--
ALTER TABLE `lista_alergenow`
  MODIFY `idLista` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `potrawy`
--
ALTER TABLE `potrawy`
  MODIFY `idPotrawy` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rodzaje`
--
ALTER TABLE `rodzaje`
  MODIFY `idRodzaje` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lista_alergenow`
--
ALTER TABLE `lista_alergenow`
  ADD CONSTRAINT `lista_alergenow_ibfk_1` FOREIGN KEY (`idPotrawy`) REFERENCES `potrawy` (`idPotrawy`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lista_alergenow_ibfk_2` FOREIGN KEY (`idAlergeny`) REFERENCES `alergeny` (`idAlergeny`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `potrawy`
--
ALTER TABLE `potrawy`
  ADD CONSTRAINT `potrawy_ibfk_1` FOREIGN KEY (`idRodzaje`) REFERENCES `rodzaje` (`idRodzaje`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
