<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>WOLONTARIAT SZKOLNY</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
    </header>
    <main>
        <section id="lewy">
            <h3>Konkursowe nagrody</h3>
            <form method="POST" action="konkurs.php">
                <button>Losuj nowe nagrody</button>
            </form>
            <table>
                <tr>
                    <th>Nr</th>
                    <th>Nazwa</th>
                    <th>Opis</th>
                    <th>Wartość</th>
                </tr>
                <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'konkurs');
                $zapytanie = "SELECT nazwa, opis, cena FROM nagrody ORDER BY RAND() LIMIT 5;";
                $wynik = mysqli_query($polaczenie, $zapytanie);
                $lp = 1;
                while ($wiersz = mysqli_fetch_array($wynik)) {
                    echo "<tr>
                            <td>$lp</td>
                            <td>{$wiersz['nazwa']}</td>
                            <td>{$wiersz['opis']}</td>
                            <td>{$wiersz['cena']}</td>
                        </tr>";
                    $lp++;
                }
                mysqli_close($polaczenie);
                ?>
            </table>
        </section>
        <section id="prawy">
            <img src="puchar.png" alt="Puchar dla wolontariusza">
            <h4>Polecane linki</h4>
            <ul>
                <li><a href="kw1.PNG">Kwerenda1</a></li>
                <li><a href="kw2.PNG">Kwerenda2</a></li>
                <li><a href="kw3.PNG">Kwerenda3</a></li>
                <li><a href="kw4.PNG">Kwerenda4</a></li>
            </ul>
        </section>
    </main>
    <footer>
        <p>Numer zdającego: Chr1skyy</p>
    </footer>
</body>

</html>