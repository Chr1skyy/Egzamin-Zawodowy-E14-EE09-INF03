<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Przychodnia Medica</title>
    <link rel="shortcut icon" href="img/obraz2.png" type="image/x-icon">
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Abonamenty w przychodni Medica</h1>
    </header>
    <article>
        <?php
        // Skrypt 1
        $polaczenie = mysqli_connect("localhost", "root", "", "medica");
        $zapytanie1 = "SELECT nazwa, cena, opis FROM abonamenty;";
        $wynik1 = mysqli_query($polaczenie, $zapytanie1);
        while ($wiersz = mysqli_fetch_array($wynik1)) {
            echo "<h3>Pakiet {$wiersz['nazwa']} - cena {$wiersz['cena']} zł</h3>";
            echo "<p>{$wiersz['opis']}</p>";
        }
        ?>
        <a href="opis.html">Dowiedz się więcej</a>
    </article>
    <main>
        <section>
            <h2>Standardowy</h2>
            <ul>
                <?php
                // Skrypt 2
                $zapytanie3 = "SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = Abonamenty_id JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 1;";
                $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                while ($wiersz = mysqli_fetch_array($wynik3)) {
                    echo "<li>{$wiersz['cecha']}</li>";
                }
                ?>
            </ul>
        </section>
        <section>
            <h2>Premium</h2>
            <ul>
                <?php
                // Skrypt 2 dla abonamentu 2
                $zapytanie3 = "SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = Abonamenty_id JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 2;";
                $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                while ($wiersz = mysqli_fetch_array($wynik3)) {
                    echo "<li>{$wiersz['cecha']}</li>";
                }
                ?>
            </ul>
        </section>
        <section>
            <h2>Dziecko</h2>
            <ul>
                <?php
                // Skrypt 2 dla abonamentu 3
                $zapytanie3 = "SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = Abonamenty_id JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 3;";
                $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                while ($wiersz = mysqli_fetch_array($wynik3)) {
                    echo "<li>{$wiersz['cecha']}</li>";
                }
                mysqli_close($polaczenie);
                ?>
            </ul>
        </section>
    </main>
    <footer>
        <p><img src="img/obraz2.png" alt="przychodnia">Stronę przygotował: Chr1skyy</p>
    </footer>
</body>

</html>