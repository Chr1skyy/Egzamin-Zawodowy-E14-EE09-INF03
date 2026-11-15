<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wycieczki po Europie</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <header>
        <h1>BIURO TURYSTYCZNE</h1>
    </header>
    <section id="dane">
        <h3>Wycieczki, na które są wolne miejsca</h3>
        <ul>
            <?php
            // Skrypt 1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'biuro');
            $zapytanie1 = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna = 1;";
            $wynik1 = mysqli_query($polaczenie, $zapytanie1);
            while ($wiersz = mysqli_fetch_array($wynik1)) {
                echo "<li>{$wiersz['id']}. dnia {$wiersz['dataWyjazdu']} jedziemy do {$wiersz['cel']}, cena: {$wiersz['cena']}</li>";
            }
            ?>
        </ul>
    </section>
    <main>
        <section id="lewy">
            <h2>Bestselery</h2>
            <table>
                <tr>
                    <td>Wenecja</td>
                    <td>kwiecień</td>
                </tr>
                <tr>
                    <td>Londyn</td>
                    <td>lipiec</td>
                </tr>
                <tr>
                    <td>Rzym</td>
                    <td>wrzesień</td>
                </tr>
            </table>
        </section>
        <section id="srodkowy">
            <h2>Nasze zdjęcia</h2>
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
            <h2>Skontaktuj się</h2>
            <a href="mailto:turysta@wycieczki.pl">napisz do nas</a>
            <p>telefon: 111222333</p>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>