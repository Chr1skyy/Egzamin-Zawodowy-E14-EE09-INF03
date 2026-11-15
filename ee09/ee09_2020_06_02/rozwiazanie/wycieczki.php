<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wycieczki i urlopy</title>
    <link rel="stylesheet" href="styl3.css">
</head>

<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <main>
        <section id="lewy">
            <h2>KONTAKT</h2>
            <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
            <p>telefon: 555666777</p>
        </section>
        <section id="srodkowy">
            <h2>GALERIA</h2>
            <?php
            // Skrypt 1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin3');
            $zapytanie2 = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis ASC;";
            $wynik2 = mysqli_query($polaczenie, $zapytanie2);
            while ($wiersz = mysqli_fetch_array($wynik2)) {
                echo "<img src='img/{$wiersz['nazwaPliku']}' alt='{$wiersz['podpis']}' />";
            }
            ?>
        </section>
        <section id="prawy">
            <h2>PROMOCJE</h2>
            <table>
                <tr>
                    <td>Jesień</td>
                    <td>Grupa 4+</td>
                    <td>Grupa 10+</td>
                </tr>
                <tr>
                    <td>5%</td>
                    <td>10%</td>
                    <td>15%</td>
                </tr>
            </table>
        </section>
    </main>
    <section id="dane">
        <h2>LISTA WYCIECZEK</h2>
        <?php
        // Skrypt 2
        $zapytanie1 = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna = TRUE;";
        $wynik1 = mysqli_query($polaczenie, $zapytanie1);
        while ($wiersz = mysqli_fetch_array($wynik1)) {
            echo "{$wiersz['id']}. {$wiersz['dataWyjazdu']}, {$wiersz['cel']}, cena: {$wiersz['cena']}<br/>";
        }
        mysqli_close($polaczenie);
        ?>
    </section>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>