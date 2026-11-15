<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1><em>KupAuto!</em> Internetowy Komis Samochodowy</h1>
    </header>
    <main>
        <section id="baner">
            <?php
            // Skrypt 1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'kupauto');
            $zapytanie2 = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id=10";
            $wynik2 = mysqli_query($polaczenie, $zapytanie2);
            while ($wiersz = mysqli_fetch_array($wynik2)) {
                echo "<img src='img/{$wiersz['zdjecie']}' alt='oferta dnia'>";
                echo "<h4>Oferta Dnia: Toyota {$wiersz['model']}</h4>";
                echo "<p>Rocznik: {$wiersz['rocznik']}, przebieg: {$wiersz['przebieg']}, rodzaj paliwa: {$wiersz['paliwo']}</p>";
                echo "<h4>Cena: {$wiersz['cena']}</h4>";
            }
            ?>
        </section>
        <section id="oferty">
            <h2>Oferty Wyróżnione</h2>
            <?php
            // Skrypt 2
            $zapytanie3 = "SELECT nazwa, model, rocznik, cena, zdjecie FROM samochody JOIN marki ON samochody.marki_id = marki.id WHERE wyrozniony=1 LIMIT 4";
            $wynik3 = mysqli_query($polaczenie, $zapytanie3);
            while ($wiersz = mysqli_fetch_array($wynik3)) {
                echo "<div class='blok'>";
                echo "<img src='img/{$wiersz['zdjecie']}' alt='{$wiersz['model']}'>";
                echo "<h4>{$wiersz['nazwa']} {$wiersz['model']}</h4>";
                echo "<p>Rocznik: {$wiersz['rocznik']}</p>";
                echo "<h4>Cena: {$wiersz['cena']}</h4>";
                echo "</div>";
            }
            ?>
        </section>
        <section id="marki">
            <h2>Wybierz markę</h2>
            <form action="KupAuto.php" method="post">
                <select name="marka">
                    <?php
                    // Skrypt 3
                    $zapytanie1 = "SELECT nazwa FROM marki";
                    $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                    while ($wiersz = mysqli_fetch_array($wynik1)) {
                        echo "<option value='{$wiersz['nazwa']}'>{$wiersz['nazwa']}</option>";
                    }
                    ?>
                </select>
                <button type="submit" name="wyszukaj">Wyszukaj</button>
            </form>
            <?php
            // Skrypt 4
            if (isset($_POST['wyszukaj'])) {
                $marka = $_POST['marka'];
                $zapytanie4 = "SELECT model, cena, zdjecie FROM samochody JOIN marki ON samochody.marki_id = marki.id WHERE nazwa = '$marka'";
                $wynik4 = mysqli_query($polaczenie, $zapytanie4);
                while ($wiersz = mysqli_fetch_array($wynik4)) {
                    echo "<div class='blok'>";
                    echo "<img src='img/{$wiersz['zdjecie']}' alt='{$wiersz['model']}'>";
                    echo "<h4>$marka {$wiersz['model']}</h4>";
                    echo "<h4>Cena: {$wiersz['cena']}</h4>";
                    echo "</div>";
                }
            }
            mysqli_close($polaczenie);
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chriskyy</p>
        <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
    </footer>
</body>

</html>