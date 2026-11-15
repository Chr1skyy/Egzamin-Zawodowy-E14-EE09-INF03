<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Matura</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>System informacji dla maturzystów</h1>
    </header>
    <div id="container-row">
        <aside>
            <img src="img/ma.jpg" alt="Matura"><br>
            <img src="img/tu.jpg" alt="Matura"><br>
            <img src="img/ra.jpg" alt="Matura">
        </aside>
        <div id="container-column">
            <section>
                <?php
                // Skrypt 3
                $imie = $_GET['imie'];
                $nazwisko = $_GET['nazwisko'];
                $id = $_GET['id'];
                echo "<h2>$imie $nazwisko</h2>";
                $polaczenie = mysqli_connect('localhost', 'root', '', 'matura');
                $zapytanie5 = "SELECT arkusz.rok, arkusz.sesja, arkusz.przedmiot, wynik.punkty FROM arkusz JOIN wynik ON arkusz.symbol = wynik.symbol WHERE wynik.maturzysta_id = $id;";
                $wynik5 = mysqli_query($polaczenie, $zapytanie5);
                while ($wiersz = mysqli_fetch_array($wynik5)) {
                    echo "<h3>{$wiersz['rok']} {$wiersz['sesja']}</h3>";
                    echo "<p>{$wiersz['przedmiot']}: {$wiersz['punkty']}%</p>";
                }
                ?>
            </section>
            <section>
                <div class='block'>
                    <h4>Przedmioty</h4>
                    <?php
                    // Skrypt 1, blok Przedmioty
                    $zapytanie2 = "SELECT DISTINCT przedmiot FROM arkusz;";
                    $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                    while ($wiersz = mysqli_fetch_array($wynik2)) {
                        echo "{$wiersz['przedmiot']}<br>";
                    }
                    ?>
                </div>
                <div class='block'>
                    <h4>Lata</h4>
                    <?php
                    // Skrypt 1, blok Lata
                    $zapytanie3 = "SELECT MIN(rok), MAX(rok) FROM arkusz;";
                    $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                    while ($wiersz = mysqli_fetch_array($wynik3)) {
                        echo "{$wiersz[0]} - {$wiersz[1]}";
                    }
                    ?>
                </div>
                <div class='block'>
                    <h4>Najlepszy wynik</h4>
                    <?php
                    // Skrypt 1, blok Najlepszy wynik
                    $zapytanie4 = "SELECT maturzysta_id, AVG(punkty) AS 'Wynik' FROM wynik GROUP BY maturzysta_id ORDER BY Wynik DESC LIMIT 1;";
                    $wynik4 = mysqli_query($polaczenie, $zapytanie4);
                    $wiersz = mysqli_fetch_array($wynik4);
                    echo "{$wiersz['Wynik']}%";
                    ?>
                </div>
                <div class='block'>
                    <h4>Najgorszy wynik</h4>
                    <?php
                    // Skrypt 1, blok Najgorszy wynik
                    $zapytanie4 = "SELECT maturzysta_id, AVG(punkty) AS 'Wynik' FROM wynik GROUP BY maturzysta_id ORDER BY Wynik ASC LIMIT 1;";
                    $wynik4 = mysqli_query($polaczenie, $zapytanie4);
                    $wiersz = mysqli_fetch_array($wynik4);
                    echo "{$wiersz['Wynik']}%";
                    mysqli_close($polaczenie);
                    ?>
                </div>
            </section>
        </div>
    </div>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>