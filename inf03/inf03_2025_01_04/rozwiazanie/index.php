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
        <form action="zamow.php" method="POST">
            <label for="model">Model:</label>
            <select class="kontrolki" name="model" id="model">
                <?php
                // Skrypt 1
                $polaczenie = mysqli_connect('localhost', 'root', '', 'obuwie');
                $zapytanie1 = "SELECT model FROM produkt;";
                $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                while ($wiersz = mysqli_fetch_array($wynik1)) {
                    echo "<option>{$wiersz['model']}</option>";
                }
                ?>
            </select>
            <label for="rozmiar">Rozmiar:</label>
            <select class="kontrolki" name="rozmiar" id="rozmiar">
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
            </select>
            <label for="pary">Liczba par:</label><input class="kontrolki" type="number" name="pary" id="pary">
            <button class="kontrolki" name="przycisk">Zamów</button>
        </form>
        <?php
        // Skrypt 2
        $zapytanie2 = "SELECT buty.model, buty.nazwa, buty.cena, produkt.nazwa_pliku FROM buty JOIN produkt ON buty.model = produkt.model;";
        $wynik2 = mysqli_query($polaczenie, $zapytanie2);
        while ($wiersz = mysqli_fetch_array($wynik2)) {
            echo "<div class='buty'><img src='img/{$wiersz['nazwa_pliku']}' alt='but męski'><h2>{$wiersz['nazwa']}</h2><h5>Model: {$wiersz['model']}</h5><h4>Cena: {$wiersz['cena']}</h4></div>";
        }
        mysqli_close($polaczenie);
        ?>
    </main>
    <footer>
        <p>Autor strony: Chr1skyy</p>
    </footer>
</body>

</html>