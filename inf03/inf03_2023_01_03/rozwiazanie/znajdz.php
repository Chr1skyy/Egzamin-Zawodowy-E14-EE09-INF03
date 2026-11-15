<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Kwiaty</title>
    <link rel="stylesheet" href="styl3.css">
</head>

<body>
    <header>
        <h1>Grupa Polskich Kwiaciarnii</h1>
    </header>
    <main>
        <nav>
            <h2>Menu</h2>
            <ol>
                <li><a href="index.html">Strona główna</a></li>
                <li><a href="https://www.kwiaty.pl/" target="_blank">Rozpoznaj kwiaty</a></li>
                <li>
                    <a href="znajdz.php">Znajdź kwiaciarnię</a>
                    <ul>
                        <li>w Warszawie</li>
                        <li>w Malborku</li>
                        <li>w Poznaniu</li>
                    </ul>
                </li>
            </ol>
        </nav>
        <section id="panelPrawy">
            <h2>Znajdź kwiaciarnię</h2>
            <form action="znajdz.php" method="post">
                <label>Podaj nazwę miejscowości
                    <input type="text" name="miasto">
                </label>
                <button type="submit" name="wyslij">SPRAWDŹ</button>
            </form>
            <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'kwiaciarnia');
            if (isset($_POST['wyslij'])) {
                $miasto = $_POST['miasto'];
                $zapytanie = "SELECT nazwa, ulica FROM kwiaciarnie WHERE miasto = '$miasto';";
                $wynik = mysqli_query($polaczenie, $zapytanie);
                while ($wiersz = mysqli_fetch_array($wynik)) {
                    echo "<h3>{$wiersz['nazwa']}, {$wiersz['ulica']}</h3>";
                }
            }
            mysqli_close($polaczenie);
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę opracował: Chr1skyy</p>
    </footer>
</body>

</html>