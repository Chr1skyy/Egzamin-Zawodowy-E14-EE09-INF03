<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <img src="img/motor.png" alt="motocykl">
    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>
    <main>
        <section id="lewy">
            <h2>Gdzie pojechać?</h2>
            <dl>
                <?php
                // Skrypt 1
                $polaczenie = mysqli_connect('localhost', 'root', '', 'motory');
                $zapytanie2 = "SELECT nazwa, opis, poczatek, zrodlo FROM wycieczki JOIN zdjecia ON zdjecia_id = zdjecia.id";
                $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                while ($wiersz = mysqli_fetch_array($wynik2)) {
                    echo "<dt>{$wiersz['nazwa']}, rozpoczyna się w {$wiersz['poczatek']}, ";
                    echo "<a href='{$wiersz['zrodlo']}.jpg'>zobacz zdjęcie</a></dt>";
                    echo "<dd>{$wiersz['opis']}</dd>";
                }
                ?>
            </dl>
        </section>
        <section id="prawy1">
            <h2>Co kupić?</h2>
            <ol>
                <li>Honda CBR125R</li>
                <li>Yamaha YBR125</li>
                <li>Honda VFR800i</li>
                <li>Honda CBR1100XX</li>
                <li>BMW R1200GS LC</li>
            </ol>
        </section>
        <section id="prawy2">
            <h2>Statystyki</h2>
            <p>Wpisanych wycieczek:
                <?php
                // Skrypt 2
                $zapytanie3 = "SELECT COUNT(*) AS liczba_wycieczek FROM wycieczki";
                $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                $wiersz = mysqli_fetch_array($wynik3);
                echo $wiersz['liczba_wycieczek'];
                mysqli_close($polaczenie);
                ?>
            </p>
            <p>Użytkowników forum: 200</p>
            <p>Przesłanych zdjęć: 1300</p>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chriskyy</p>
    </footer>
</body>

</html>