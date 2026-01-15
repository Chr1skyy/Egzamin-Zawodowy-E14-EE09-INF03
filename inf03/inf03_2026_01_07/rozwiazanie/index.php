<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Pogoda</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <div id="header-row">
        <header id="left">
            <img src="slonce.png" alt="Słonecznie">
        </header>
        <header id="right">
            <h1>Pogoda w Europie</h1>
        </header>
    </div>
    <main>
        <section id="left">
            <h2>Temperatury w lipcu</h2>
            <table>
                <tr>
                    <th>Miasto</th>
                    <th>Kraj</th>
                    <th>Temperatura</th>
                    <th>Pogoda</th>
                </tr>
                <?php
                $connect = mysqli_connect("localhost", "root", "", "pogoda");
                $query3 = "SELECT miejscowosc.nazwa, miejscowosc.kraj, pomiary.temperatura FROM miejscowosc JOIN pomiary ON miejscowosc.id = pomiary.id_miejscowosc WHERE pomiary.id_miesiac = 7;";
                $result = mysqli_query($connect, $query3);
                while ($row = mysqli_fetch_array($result)) {
                    $weatherImage = "";
                    if ($row['temperatura'] > 30) {
                        $weatherImage = "<img src='slonce.png'>";
                    } elseif ($row['temperatura'] < 26) {
                        $weatherImage = "<img src='deszcz.png'>";
                    } else {
                        $weatherImage = "<img src='chmury.png'>";
                    }
                    echo "<tr>
                            <td>{$row['nazwa']}</td>
                            <td>{$row['kraj']}</td>
                            <td>{$row['temperatura']}</td>
                            <td>$weatherImage</td>
                          </tr>";
                }
                ?>
            </table>
        </section>
        <section id="right">
            <h2>Średnie temperatury w roku</h2>
            <a href="index.php?id_miesiac=1">Styczeń</a>
            <a href="index.php?id_miesiac=2">Luty</a>
            <a href="index.php?id_miesiac=3">Marzec</a>
            <a href="index.php?id_miesiac=4">Kwiecień</a>
            <a href="index.php?id_miesiac=5">Maj</a>
            <a href="index.php?id_miesiac=6">Czerwiec</a>
            <a href="index.php?id_miesiac=7">Lipiec</a>
            <a href="index.php?id_miesiac=8">Sierpień</a>
            <a href="index.php?id_miesiac=9">Wrzesień</a>
            <a href="index.php?id_miesiac=10">Październik</a>
            <a href="index.php?id_miesiac=11">Listopad</a>
            <a href="index.php?id_miesiac=12">Grudzień</a>
            <p>Średnia temperatura dla wybranego miesiąca wynosi:</p>
            <?php
            if (isset($_GET['id_miesiac'])) {
                $id_miesiac = $_GET['id_miesiac'];
                $query1 = "SELECT ROUND(AVG(temperatura),2) FROM pomiary WHERE id_miesiac = $id_miesiac;";
                $result = mysqli_query($connect, $query1);
                $row = mysqli_fetch_array($result);
                echo "<h3>{$row[0]} stopni</h3>";
            }
            mysqli_close($connect);
            ?>
        </section>
    </main>
    <footer>
        <p>Numer zdającego: Chr1skyy</p>
    </footer>
</body>

</html>