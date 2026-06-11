<?php
$sekcja = isset($_GET['sekcja']) ? $_GET['sekcja'] : 'uczestnik';
$numerWycieczki = isset($_GET['numerWycieczki']) ? (int)$_GET['numerWycieczki'] : 0;

$wycieczki = [
    ["obraz" => "1.jpg", "miejsce" => "Barcelona"],
    ["obraz" => "2.jpg", "miejsce" => "Rzym"],
    ["obraz" => "3.jpg", "miejsce" => "Londyn"]
];

$aktualnaWycieczka = $wycieczki[$numerWycieczki];

$poprzednia = $numerWycieczki - 1;
if ($poprzednia < 0) {
    $poprzednia = 2;
}

$nastepna = $numerWycieczki + 1;
if ($nastepna > 2) {
    $nastepna = 0;
}

$kolorUczestnika = "skyblue";
$kolorRezerwacji = "skyblue";
$blokadaUczestnika = "disabled";
$blokadaRezerwacji = "disabled";

if ($sekcja == 'uczestnik') {
    $kolorUczestnika = "dodgerblue";
    $blokadaUczestnika = "";
} else {
    $kolorRezerwacji = "dodgerblue";
    $blokadaRezerwacji = "";
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Biuro turystyczne</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h2>Rezerwacje wycieczek</h2>
    </header>
    <main>
        <div class="container-row">
            <div id="container-column">
                <nav>
                    <form method="GET" action="rezerwacja.php" style="display: inline;">
                        <input type="hidden" name="numerWycieczki" value="<?= $numerWycieczki; ?>">
                        <button type="submit" name="sekcja" value="uczestnik" id="uczestnikBtn" style="background-color: <?= $kolorUczestnika; ?>;">Uczestnik</button>
                        <button type="submit" name="sekcja" value="rezerwacja" id="rezerwacjaBtn" style="background-color: <?= $kolorRezerwacji; ?>;">Rezerwacja</button>
                    </form>
                </nav>
                <div class="container-row">
                    <section>
                        <h2>Dane Klienta</h2>
                        <img src="osoba.png" alt="Klient">
                        <br>
                        <label for="imie">Imię</label>
                        <input type="text" id="imie" <?= $blokadaUczestnika; ?>>
                        <br>
                        <label for="nazwisko">Nazwisko</label>
                        <input type="text" id="nazwisko" <?= $blokadaUczestnika; ?>>
                        <p><a href="wycieczki.html">Do strony głównej</a></p>
                    </section>
                    <section>
                        <h2>Dane rezerwacji</h2>
                        <a href="rezerwacja.php?sekcja=<?= $sekcja; ?>&numerWycieczki=<?= $poprzednia; ?>" style="text-decoration: none; color: inherit;"><span>&laquo;</span></a>
                        <img src="<?= $aktualnaWycieczka['obraz']; ?>" alt="wycieczka" id="zdjecieMiejsca">
                        <a href="rezerwacja.php?sekcja=<?= $sekcja; ?>&numerWycieczki=<?= $nastepna; ?>" style="text-decoration: none; color: inherit;"><span>&raquo;</span></a>
                        <h4 id="miejsceWycieczki"><?= $aktualnaWycieczka['miejsce']; ?></h4>
                        <label for="liczbaOsob">Liczba osób:</label>
                        <input type="number" id="liczbaOsob" min="1" max="4" value="2" <?= $blokadaRezerwacji; ?>>
                        <br>
                        <label for="miejsceWylotu">Miejsce wylotu</label>
                        <select id="miejsceWylotu" <?= $blokadaRezerwacji; ?>>
                            <option value="Warszawa">Warszawa</option>
                            <option value="Kraków">Kraków</option>
                            <option value="Wrocław">Wrocław</option>
                        </select>
                        <br>
                        <input type="radio" name="wyzywienie" id="sniadania" <?= $blokadaRezerwacji; ?>>
                        <label for="sniadania">Śniadania</label>
                        <input type="radio" name="wyzywienie" id="sniadaniaObiadokolacje" <?= $blokadaRezerwacji; ?>>
                        <label for="sniadaniaObiadokolacje">Śniadania i obiadokolacje</label>
                        <input type="radio" name="wyzywienie" id="AllInclusive" <?= $blokadaRezerwacji; ?>>
                        <label for="wyzywienie">All inclusive</label>
                        <button type="button">Sprawdź cenę</button>
                    </section>
                </div>
            </div>
            <aside>
                <img src="1.jpg" alt="wycieczki">
                <img src="2.jpg" alt="wycieczki">
                <img src="3.jpg" alt="wycieczki">
                <img src="1.jpg" alt="wycieczki">
                <img src="2.jpg" alt="wycieczki">
                <img src="3.jpg" alt="wycieczki">
                <img src="1.jpg" alt="wycieczki">
                <img src="2.jpg" alt="wycieczki">
                <img src="3.jpg" alt="wycieczki">
            </aside>
        </div>
    </main>
    <footer>
        <p>Autor strony: Chr1skyy</p>
    </footer>
</body>

</html>