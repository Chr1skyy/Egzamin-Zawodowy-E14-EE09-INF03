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
            <img src="img/slonce.png" alt="Słonecznie">
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
                // Skrypt 1
                $polaczenie = mysqli_connect("localhost", "root", "", "pogoda");
                $zapytanie3 = "SELECT miejscowosc.nazwa, miejscowosc.kraj, pomiary.temperatura FROM miejscowosc JOIN pomiary ON miejscowosc.id = pomiary.id_miejscowosc WHERE pomiary.id_miesiac = 7;";
                $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                while ($wiersz = mysqli_fetch_array($wynik3)) {
                    if ($wiersz['temperatura'] > 30) {
                        $obrazPogody = "<img src='img/slonce.png'>";
                    } else if ($wiersz['temperatura'] < 26) {
                        $obrazPogody = "<img src='img/deszcz.png'>";
                    } else {
                        $obrazPogody = "<img src='img/chmury.png'>";
                    }
                    echo "<tr>
                            <td>{$wiersz['nazwa']}</td>
                            <td>{$wiersz['kraj']}</td>
                            <td>{$wiersz['temperatura']}</td>
                            <td>$obrazPogody</td>
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
            // Skrypt 2
            if (isset($_GET['id_miesiac'])) {
                $idMiesiaca = $_GET['id_miesiac'];
                $zapytanie1 = "SELECT ROUND(AVG(temperatura),2) FROM pomiary WHERE id_miesiac = $idMiesiaca;";
                $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                $wiersz = mysqli_fetch_array($wynik1);
                echo "<h3>{$wiersz[0]} stopni</h3>";
            }
            ?>
        </section>
    </main>
    <footer>
        <p>Numer zdającego: Chr1skyy</p>
    </footer>
    <?php mysqli_close($polaczenie); ?>
</body>

</html>