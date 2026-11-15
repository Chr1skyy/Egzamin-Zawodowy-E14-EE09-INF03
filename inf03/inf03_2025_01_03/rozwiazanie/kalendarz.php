<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Dni, miesiące, lata...</h1>
    </header>
    <section id="napis">
        <?php
        // Skrypt 1
        $polaczenie = mysqli_connect('localhost', 'root', '', 'kalendarz');
        $data = date('m-d');
        $dataPelna = date('d-m-Y');
        // date('w') zwraca numer dnia tygodnia: 0 to niedziela
        $dniTygodnia = ["niedziela", "poniedziałek", "wtorek", "środa", "czwartek", "piątek", "sobota"];
        $dzienTygodnia = $dniTygodnia[date('w')];
        $zapytanie2 = "SELECT imiona FROM imieniny WHERE data = '$data';";
        $wynik2 = mysqli_query($polaczenie, $zapytanie2);
        $wiersz = mysqli_fetch_array($wynik2);
        echo "<p>Dzisiaj jest {$dzienTygodnia}, {$dataPelna}, imieniny: {$wiersz['imiona']}</p>";
        ?>
    </section>
    <main>
        <section id="lewy">
            <table>
                <tr>
                    <th>liczba dni</th>
                    <th>miesiąc</th>
                </tr>
                <tr>
                    <td rowspan="7">31</td>
                    <td>styczeń</td>
                </tr>
                <tr>
                    <td>marzec</td>
                </tr>
                <tr>
                    <td>maj</td>
                </tr>
                <tr>
                    <td>lipiec</td>
                </tr>
                <tr>
                    <td>sierpień</td>
                </tr>
                <tr>
                    <td>październik</td>
                </tr>
                <tr>
                    <td>grudzień</td>
                </tr>
                <tr>
                    <td rowspan="4">30</td>
                    <td>kwiecień</td>
                </tr>
                <tr>
                    <td>czerwiec</td>
                </tr>
                <tr>
                    <td>wrzesień</td>
                </tr>
                <tr>
                    <td>listopad</td>
                </tr>
                <tr>
                    <td>28 lub 29</td>
                    <td>luty</td>
                </tr>
            </table>
        </section>
        <section id="srodek">
            <h2>Sprawdź kto ma urodziny</h2>
            <form action="kalendarz.php" method="POST">
                <input type="date" name="date" min="2024-01-01" max="2024-12-31" required>
                <button name="submit">wyślij</button>
            </form>
            <?php
            // Skrypt 2
            if (isset($_POST["submit"])) {
                $dzien = $_POST["date"];
                $dataDoZapytania = date('m-d', strtotime($dzien));
                $zapytanie2 = "SELECT imiona FROM imieniny WHERE data = '$dataDoZapytania';";
                $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                $wiersz = mysqli_fetch_array($wynik2);
                echo "Dnia {$dzien} są imieniny: {$wiersz['imiona']}";
            }
            mysqli_close($polaczenie);
            ?>
        </section>
        <section id="prawy">
            <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów" target="_blank"><img src="kalendarz.gif"
                    alt="Kalendarz Majów"></a>
            <h2>Rodzaje kalendarzy</h2>
            <ol>
                <li>słoneczny
                    <ul>
                        <li>kalendarz Majów</li>
                        <li>juliański</li>
                        <li>gregoriański</li>
                    </ul>
                </li>
                <li>księżycowy</li>
                <ul>
                    <li>starogrecki</li>
                    <li>babiloński</li>
                </ul>
            </ol>
        </section>
    </main>

    <footer>
        <p>Stronę opracował(a): Chr1skyy</p>
    </footer>
</body>

</html>