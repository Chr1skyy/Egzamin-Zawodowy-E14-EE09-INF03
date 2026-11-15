<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Konfigurator samochodów</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Serwis konfiguracji samochodów</h1>
    </header>
    <nav>
        <h2>Samochody</h2>
        <h2>Konfigurator</h2>
        <h2>Kontakt</h2>
    </nav>
    <main>
        <section id="left">
            <table>
                <?php
                // Skrypt 1
                $polaczenie = mysqli_connect("localhost", "root", "", "samochody");
                $zapytanie3 = "SELECT pojazdy.marka, pojazdy.model, pojazdy.cena, kolory.nazwa, kolory.doplata FROM pojazdy JOIN kolory ON pojazdy.kolor = kolory.id WHERE pojazdy.model = 'alfa';";
                $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                while ($wiersz = mysqli_fetch_array($wynik3)) {
                    $cenaCalkowita = $wiersz['cena'] + $wiersz['doplata'];
                    echo "<tr>
                    <td>{$wiersz['marka']}</td>
                    <td>{$wiersz['model']}</td>
                    <td>{$wiersz['nazwa']}</td>
                    <td>{$cenaCalkowita}</td>
                </tr>
                ";
                }
                ?>
            </table>
        </section>
        <section id="middle">
            <table>
                <tr>
                    <th colspan="2">Konfiguracja</th>
                    <th>Cena</th>
                </tr>
                <?php
                // Skrypt 2
                $zapytanie4 = "SELECT marka, model, cena FROM pojazdy ORDER BY RAND() LIMIT 2;";
                $wynik4 = mysqli_query($polaczenie, $zapytanie4);
                $pojazd1 = mysqli_fetch_array($wynik4);
                $pojazd2 = mysqli_fetch_array($wynik4);
                ?>
                <tr>
                    <td colspan="3"><img src="img/a1.jpg" alt="Konfiguracja 1"></td>
                </tr>
                <tr>
                    <td>Marka</td>
                    <td><?php echo $pojazd1['marka']; ?></td>
                    <td rowspan="2"><?php echo $pojazd1['cena']; ?></td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td><?php echo $pojazd1['model']; ?></td>
                </tr>
                <tr>
                    <td colspan="3"><img src="img/a2.jpg" alt="Konfiguracja 2"></td>
                </tr>
                <tr>
                    <td>Marka</td>
                    <td><?php echo $pojazd2['marka']; ?></td>
                    <td rowspan="2"><?php echo $pojazd2['cena']; ?></td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td><?php echo $pojazd2['model']; ?></td>
                </tr>
            </table>
        </section>
        <section id="right">
            <h3>111 222 444</h3>
            <img src="img/a3.png" alt="Samochód">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
    <?php mysqli_close($polaczenie); ?>
</body>

</html>