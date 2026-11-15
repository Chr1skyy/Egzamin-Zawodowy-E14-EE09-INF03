<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h2>Koło szachowe <em>gambit piona</em></h2>
    </header>
    <main>
        <section id="lewy">
            <h4>Polecane linki</h4>
            <ul>
                <li><a href="kw1.PNG">kwerenda1</a></li>
                <li><a href="kw2.PNG">kwerenda2</a></li>
                <li><a href="kw3.PNG">kwerenda3</a></li>
                <li><a href="kw4.PNG">kwerenda4</a></li>
            </ul>
            <img src="logo.png" alt="Logo koła">
        </section>
        <section id="prawy">
            <h3>Najlepsi gracze naszego koła</h3>
            <table>
                <tr>
                    <th>Pozycja</th>
                    <th>Pseudonim</th>
                    <th>Tytuł</th>
                    <th>Ranking</th>
                    <th>Klasa</th>
                </tr>
                <?php
                // Skrypt 1
                $polaczenie = mysqli_connect('localhost', 'root', '', 'szachy');
                $zapytanie1 = "SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 ORDER BY ranking DESC;";
                $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                $lp = 1;
                while ($wiersz = mysqli_fetch_array($wynik1)) {
                    echo "<tr>
                        <td>$lp</td>
                        <td>{$wiersz['pseudonim']}</td>
                        <td>{$wiersz['tytul']}</td>
                        <td>{$wiersz['ranking']}</td>
                        <td>{$wiersz['klasa']}</td>
                    </tr>";
                    $lp++;
                }
                ?>
            </table>
            <form method="POST" action="szachy.php">
                <button name="submit">Losuj nową parę graczy</button>
            </form>
            <?php
            // Skrypt 2
            if (isset($_POST["submit"])) {
                $zapytanie2 = "SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2;";
                $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                $gracz1 = mysqli_fetch_array($wynik2);
                $gracz2 = mysqli_fetch_array($wynik2);
                echo "<h4>{$gracz1['pseudonim']} {$gracz1['klasa']} {$gracz2['pseudonim']} {$gracz2['klasa']}</h4>";
            }
            mysqli_close($polaczenie);
            ?>
            <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>