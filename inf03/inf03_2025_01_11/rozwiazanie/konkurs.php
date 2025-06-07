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
                $connect = mysqli_connect('localhost', 'root', '', 'konkurs');
                $query = "SELECT nazwa, opis, cena FROM nagrody ORDER BY RAND() LIMIT 5;";
                $result = mysqli_query($connect, $query);
                $i = 1;
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>
                            <td>$i</td>
                            <td>{$row['nazwa']}</td>
                            <td>{$row['opis']}</td>
                            <td>{$row['cena']}</td>
                        <tr/>";
                    $i++;
                }
                mysqli_close($connect);
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