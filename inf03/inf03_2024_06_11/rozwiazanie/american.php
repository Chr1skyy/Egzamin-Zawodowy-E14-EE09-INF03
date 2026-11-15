<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>
    <main>
        <nav>
            <a href="peruwianka.php">Rasa Peruwianka</a>
            <a href="american.php">Rasa American</a>
            <a href="crested.php">Rasa Crested</a>
        </nav>
        <aside>
            <h3>Poznaj wszystkie rasy świnek morskich</h3>
            <ol>
                <?php
                // Skrypt 1
                $polaczenie = mysqli_connect('localhost', 'root', '', 'hodowla');
                $zapytanie4 = "SELECT rasa FROM rasy";
                $wynik4 = mysqli_query($polaczenie, $zapytanie4);
                while ($wiersz = mysqli_fetch_array($wynik4)) {
                    echo "<li>{$wiersz['rasa']}</li>";
                }
                ?>
            </ol>
        </aside>
        <section>
            <img src="img/peruwianka.jpg" alt="Świnka morska rasy peruwianka">
            <?php
            // Skrypt 2
            $zapytanie2 = "SELECT DISTINCT data_ur, miot, rasa FROM swinki JOIN rasy ON swinki.rasy_id = rasy.id WHERE rasy_id = 6";
            $wynik2 = mysqli_query($polaczenie, $zapytanie2);
            while ($wiersz = mysqli_fetch_array($wynik2)) {
                echo "<h2>Rasa: {$wiersz['rasa']}</h2>";
                echo "<p>Data urodzenia: {$wiersz['data_ur']}</p>";
                echo "<p>Oznaczenie miotu: {$wiersz['miot']}</p>";
            }
            ?>
            <hr>
            <h2>Świnki w tym miocie</h2>
            <?php
            // Skrypt 3
            $zapytanie3 = "SELECT imie, cena, opis FROM swinki WHERE rasy_id = 6";
            $wynik3 = mysqli_query($polaczenie, $zapytanie3);
            while ($wiersz = mysqli_fetch_array($wynik3)) {
                echo "<h3>{$wiersz['imie']} - {$wiersz['cena']} zł</h3>";
                echo "<p>{$wiersz['opis']}</p>";
            }
            mysqli_close($polaczenie);
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chriskyy</p>
    </footer>
</body>

</html>