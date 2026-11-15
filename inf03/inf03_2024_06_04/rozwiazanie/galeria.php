<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Galeria</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Zdjęcia</h1>
    </header>
    <main>
        <section id="lewy">
            <h2>Tematy zdjęć</h2>
            <ol>
                <li>Zwierzęta</li>
                <li>Krajobrazy</li>
                <li>Miasta</li>
                <li>Przyroda</li>
                <li>Samochody</li>
            </ol>
        </section>
        <section id="srodkowy">
            <?php
            // Skrypt 1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'galeria');
            $zapytanie2 = "SELECT plik, tytul, polubienia, imie, nazwisko FROM zdjecia JOIN autorzy ON zdjecia.autorzy_id = autorzy.id ORDER BY nazwisko;";
            $wynik2 = mysqli_query($polaczenie, $zapytanie2);
            while ($wiersz = mysqli_fetch_array($wynik2)) {
                echo "<div class='blok'>";
                echo "<img src='img/{$wiersz['plik']}' alt='zdjęcie'>";
                echo "<h3>{$wiersz['tytul']}</h3>";
                if ($wiersz['polubienia'] > 40) {
                    echo "<p>Autor: {$wiersz['imie']} {$wiersz['nazwisko']}.<br>Wiele osób polubiło ten obraz.</p>";
                } else {
                    echo "<p>Autor: {$wiersz['imie']} {$wiersz['nazwisko']}.</p>";
                }
                echo "<a href='img/{$wiersz['plik']}' download>Pobierz</a>";
                echo "</div>";
            }
            ?>
        </section>
        <section id="prawy">
            <h2>Najbardziej lubiane</h2>
            <?php
            // Skrypt 2
            $zapytanie1 = "SELECT tytul, plik FROM zdjecia WHERE polubienia >= 100";
            $wynik1 = mysqli_query($polaczenie, $zapytanie1);
            while ($wiersz = mysqli_fetch_array($wynik1)) {
                echo "<img src='img/{$wiersz['plik']}' alt='{$wiersz['tytul']}'>";
            }
            mysqli_close($polaczenie);
            ?>
            <strong>Zobacz wszystkie nasze zdjęcia</strong>
        </section>
    </main>
    <footer>
        <h5>Stronę wykonał: Chriskyy</h5>
    </footer>
</body>

</html>