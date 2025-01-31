<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <section id="baner1">
            <img src="obraz1.png" alt="Mapa Polski">
        </section>
        <section id="baner2">
            <h1>Rzeki w województwie dolnośląskim</h1>
        </section>
    </header>
    <nav>
        <form action="poziomRzek.php" method="post">
            <label class="opcje">
                <input type="radio" name="poziom" value="wszystkie" checked>
                Wszystkie
            </label>
            <label class="opcje">
                <input type="radio" name="poziom" value="ostrzegawczy">
                Ponad stan ostrzegawczy
            </label>
            <label class="opcje">
                <input type="radio" name="poziom" value="alarmowy">
                Ponad stan alarmowy
            </label>
            <button type="submit" name="pokaz">Pokaż</button>
        </form>
    </nav>
    <main>
        <section id="lewy">
            <h3>Stany na dzień 2022-05-05</h3>
            <table>
                <tr>
                    <th>Wodomierz</th>
                    <th>Rzeka</th>
                    <th>Ostrzegawczy</th>
                    <th>Alarmowy</th>
                    <th>Aktualny</th>
                </tr>
                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'rzeki');

                if (!isset($_POST['pokaz'])) {
                    $query = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE dataPomiaru='2022-05-05'";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td>$row[3]</td>";
                        echo "<td>$row[4]</td>";
                        echo "</tr>";
                    }
                } else {
                    switch ($_POST['poziom']) {
                        case 'ostrzegawczy':
                            $query = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE dataPomiaru='2022-05-05' AND stanWody > stanOstrzegawczy;";
                            break;
                        case 'alarmowy':
                            $query = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE dataPomiaru='2022-05-05' AND stanWody > stanAlarmowy";
                            break;
                        default:
                            $query = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE dataPomiaru='2022-05-05'";
                            break;
                    }
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td>$row[3]</td>";
                        echo "<td>$row[4]</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </section>

        <section id="prawy">
            <h3>Informacje</h3>
            <ul>
                <li>Brak ostrzeżeń o burzach z gradem</li>
                <li>Smog w mieście Wrocław</li>
                <li>Silny wiatr w Karkonoszach</li>
            </ul>
            <h3>Średnie stany wód</h3>
            <p>
                <?php
                $query2 = "SELECT dataPomiaru, AVG(stanWody) AS srednia FROM pomiary GROUP BY dataPomiaru";
                $result2 = mysqli_query($connect, $query2);
                while ($row = mysqli_fetch_array($result2)) {
                    echo "<p>$row[0]: $row[1]</p>";
                }

                mysqli_close($connect);
                ?>
            </p>
            <a href="https://komunikaty.pl">Dowiedz się więcej</a>
            <br>
            <img src="obraz2.jpg" alt="rzeka">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chriskyy</p>
    </footer>
</body>

</html>