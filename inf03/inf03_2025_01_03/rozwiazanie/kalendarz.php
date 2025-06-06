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
        $connect = mysqli_connect('localhost', 'root', '', 'kalendarz');
        $today = date('m-d');
        $query = mysqli_query($connect, "SELECT imiona FROM imieniny WHERE data = '$today';");
        $day = date('w');
        if ($day == 0) {
            $weekDay = "niedziela";
        }
        if ($day == 1) {
            $weekDay = "poniedziałek";
        }
        if ($day == 2) {
            $weekDay = "wtorek";
        }
        if ($day == 3) {
            $weekDay = "środa";
        }
        if ($day == 4) {
            $weekDay = "czwartek";
        }
        if ($day == 5) {
            $weekDay = "piątek";
        }
        if ($day == 6) {
            $weekDay = "sobota";
        }
        $result = mysqli_fetch_array($query);
        $fullDate = date('d-m-Y');
        echo "<p>Dzisiaj jest {$weekDay}, {$fullDate}, imieniny: {$result['imiona']}</p>";
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
            if (isset($_POST["submit"])) {
                $date = $_POST["date"];
                $monthAndDay = date('m-d', strtotime($date));
                $query2 = mysqli_query($connect, "SELECT imiona FROM imieniny WHERE data = '$monthAndDay';");
                $result2 = mysqli_fetch_array($query2);
                echo "Dnia {$date} są imieniny: {$result2['imiona']}";
            }
            mysqli_close($connect);
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