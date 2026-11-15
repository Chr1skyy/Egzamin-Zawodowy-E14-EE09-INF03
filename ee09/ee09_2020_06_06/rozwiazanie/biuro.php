<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wycieczki krajoznawcze</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <header>
        <h1>WITAMY W BIURZE PODRÓŻY</h1>
    </header>
    <section id="dane">
        <h3>ARCHIWUM WYCIECZEK</h3>
        <?php
        // Skrypt 1
        $polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin4');
        $zapytanie1 = "SELECT id, cel, cena FROM wycieczki WHERE dostepna = 0;";
        $wynik1 = mysqli_query($polaczenie, $zapytanie1);
        while ($wiersz = mysqli_fetch_array($wynik1)) {
            echo "{$wiersz['id']}. {$wiersz['cel']}, cena: {$wiersz['cena']}<br/>";
        }
        ?>
    </section>
    <main>
        <section id="lewy">
            <h3>NAJTANIEJ</h3>
            <table>
                <tr>
                    <td>Włochy</td>
                    <td>od 1200 zł</td>
                </tr>
                <tr>
                    <td>Francja</td>
                    <td>od 1200 zł</td>
                </tr>
                <tr>
                    <td>Hiszpania</td>
                    <td>od 1400 zł</td>
                </tr>
            </table>
        </section>
        <section id="srodkowy">
            <h3>TU BYLIŚMY</h3>
            <?php
            // Skrypt 2
            $zapytanie2 = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis DESC;";
            $wynik2 = mysqli_query($polaczenie, $zapytanie2);
            while ($wiersz = mysqli_fetch_array($wynik2)) {
                echo "<img src='img/{$wiersz['nazwaPliku']}' alt='{$wiersz['podpis']}' />";
            }
            mysqli_close($polaczenie);
            ?>
        </section>
        <section id="prawy">
            <h3>SKONTAKTUJ SIĘ</h3>
            <a href="mailto:wycieczki@wycieczki.pl">napisz do nas</a>
            <p>telefon: 555666777</p>
        </section>
    </main>

    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>