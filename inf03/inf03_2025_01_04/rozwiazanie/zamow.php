<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Obuwie męskie</h1>
    </header>
    <main>
        <h2>Zamówienie</h2>
        <?php
        // Skrypt 3
        if (isset($_POST["przycisk"]) && !empty($_POST['pary'])) {
            $polaczenie = mysqli_connect('localhost', 'root', '', 'obuwie');
            $model = $_POST["model"];
            $rozmiar = $_POST["rozmiar"];
            $pary = $_POST["pary"];
            $zapytanie = "SELECT buty.nazwa, buty.cena, produkt.kolor, produkt.kod_produktu, produkt.material, produkt.nazwa_pliku FROM buty JOIN produkt ON buty.model = produkt.model WHERE buty.model = '{$model}';";
            $wynik = mysqli_query($polaczenie, $zapytanie);
            $wiersz = mysqli_fetch_array($wynik);
            echo "<img src='img/{$wiersz['nazwa_pliku']}' alt='but męski'>";
            echo "<h2>{$wiersz['nazwa']}</h2>";
            $wartosc = $pary * $wiersz['cena'];
            echo "<p>cena za {$pary} par: {$wartosc} zł</p>";
            echo "<p>Szczegóły produktu: {$wiersz['kolor']}, {$wiersz['material']}</p>";
            echo "<p>Rozmiar: {$rozmiar}</p>";
            mysqli_close($polaczenie);
        }
        ?>
        <a href="index.php">Strona główna</a>
    </main>
    <footer>
        <p>Autor strony: Chr1skyy</p>
    </footer>
</body>

</html>