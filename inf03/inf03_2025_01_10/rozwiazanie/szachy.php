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
                $connect = mysqli_connect('localhost', 'root', '', 'szachy');
                $query = "SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 ORDER BY ranking DESC;";
                $result = mysqli_query($connect, $query);
                $i = 1;
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>
                        <td>$i</td>
                        <td>{$row['pseudonim']}</td>
                        <td>{$row['tytul']}</td>
                        <td>{$row['ranking']}</td>
                        <td>{$row['klasa']}</td>
                    </tr>";
                    $i++;
                }
                ?>
            </table>
            <form method="POST" action="szachy.php">
                <button name="submit">Losuj nową parę graczy</button>
            </form>
            <?php
            if (isset($_POST["submit"])) {
                $query = "SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2;";
                $result = mysqli_query($connect, $query);
                $player1 = mysqli_fetch_array($result);
                $player2 = mysqli_fetch_array($result);
                echo "<h4>{$player1['pseudonim']} {$player1['klasa']} {$player2['pseudonim']} {$player2['klasa']}</h4>";
            }
            mysqli_close($connect);
            ?>
            <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>