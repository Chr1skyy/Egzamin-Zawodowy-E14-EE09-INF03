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
                // skrypt skojarzony z formularzem
                $polaczenie = mysqli_connect('localhost', 'root', '', 'rzeki');
                $poziom = "wszystkie";
                if (isset($_POST['poziom'])) {
                    $poziom = $_POST['poziom'];
                }
                // zapytanie 3 dla stanu ostrzegawczego, zmienione zapytanie 3 dla alarmowego, zapytanie 2 dla wszystkich
                if ($poziom == 'ostrzegawczy') {
                    $zapytanie = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE dataPomiaru='2022-05-05' AND stanWody > stanOstrzegawczy;";
                } else if ($poziom == 'alarmowy') {
                    $zapytanie = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE dataPomiaru='2022-05-05' AND stanWody > stanAlarmowy";
                } else {
                    $zapytanie = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE dataPomiaru='2022-05-05'";
                }
                $wynik = mysqli_query($polaczenie, $zapytanie);
                while ($wiersz = mysqli_fetch_array($wynik)) {
                    echo "<tr>";
                    echo "<td>{$wiersz['nazwa']}</td>";
                    echo "<td>{$wiersz['rzeka']}</td>";
                    echo "<td>{$wiersz['stanOstrzegawczy']}</td>";
                    echo "<td>{$wiersz['stanAlarmowy']}</td>";
                    echo "<td>{$wiersz['stanWody']}</td>";
                    echo "</tr>";
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
                // Skrypt 2
                $zapytanie4 = "SELECT dataPomiaru, AVG(stanWody) AS srednia FROM pomiary GROUP BY dataPomiaru";
                $wynik4 = mysqli_query($polaczenie, $zapytanie4);
                while ($wiersz = mysqli_fetch_array($wynik4)) {
                    echo "<p>{$wiersz['dataPomiaru']}: {$wiersz['srednia']}</p>";
                }
                mysqli_close($polaczenie);
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