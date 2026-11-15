<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
</head>

<?php
// Skrypt 3: odświeżanie trzeba wysłać, zanim strona wyśle jakikolwiek HTML
header("refresh: 10;");
?>

<body>
    <header>
        <section id="banner1">
            <h1>Ważenie pojazdów we Wrocławiu</h1>
        </section>
        <section id="banner2">
            <img src="obraz1.png" alt="waga">
        </section>
    </header>
    <main>
        <section id="lewy">
            <h2>Lokalizacje wag</h2>
            <ol>
                <?php
                // Skrypt 1
                $polaczenie = mysqli_connect("localhost", "root", "", "wazenietirow");
                $zapytanie2 = "SELECT ulica FROM lokalizacje";
                $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                while ($wiersz = mysqli_fetch_array($wynik2)) {
                    echo "<li>ulica {$wiersz['ulica']}</li>";
                }
                ?>
            </ol>
            <h2>Kontakt</h2>
            <a href="mailto:wazenie@wroclaw.pl">napisz</a>
        </section>
        <section id="srodkowy">
            <h2>Alerty</h2>
            <table>
                <tr>
                    <th>rejestracja</th>
                    <th>ulica</th>
                    <th>waga</th>
                    <th>dzień</th>
                    <th>czas</th>
                </tr>
                <?php
                // Skrypt 2
                $zapytanie4 = "SELECT rejestracja, ulica, waga, dzien, czas FROM wagi JOIN lokalizacje ON wagi.lokalizacje_id = lokalizacje.id WHERE waga > 5";
                $wynik4 = mysqli_query($polaczenie, $zapytanie4);
                while ($wiersz = mysqli_fetch_array($wynik4)) {
                    echo "<tr>
                                <td>{$wiersz['rejestracja']}</td>
                                <td>{$wiersz['ulica']}</td>
                                <td>{$wiersz['waga']}</td>
                                <td>{$wiersz['dzien']}</td>
                                <td>{$wiersz['czas']}</td>
                            </tr>";
                }
                ?>
            </table>
            <?php
            // Skrypt 3
            $zapytanie3 = "INSERT INTO wagi(lokalizacje_id, waga, rejestracja, dzien, czas) VALUES ('5', FLOOR(RAND()*10+1), 'DW12345', CURRENT_DATE, CURRENT_TIME)";
            mysqli_query($polaczenie, $zapytanie3);
            mysqli_close($polaczenie);
            ?>
        </section>
        <section id="prawy">
            <img src="obraz2.jpg" alt="tir">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chriskyy</p>
    </footer>
</body>

</html>