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
            $connect = mysqli_connect("localhost", "root", "", "samochody");
            $query3 = "SELECT pojazdy.marka, pojazdy.model, pojazdy.cena, kolory.nazwa, kolory.doplata FROM pojazdy JOIN kolory ON pojazdy.kolor = kolory.id LIMIT 15;";
            $result = mysqli_query($connect, $query3);
            while ($row = mysqli_fetch_array($result)) {
                $fullPrice = $row['cena'] + $row['doplata'];
                echo "<tr>
                    <td>{$row['marka']}</td>
                    <td>{$row['model']}</td>
                    <td>{$row['nazwa']}</td>
                    <td>{$fullPrice}</td>
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
                <tr>
                    <td colspan="3"><img src="a1.jpg" alt="Konfiguracja 1"></td>
                </tr>
                <?php
                $query4 = "SELECT marka, model, cena FROM pojazdy ORDER BY RAND() LIMIT 2;";
                $result = mysqli_query($connect, $query4);
                $vehicle1 = mysqli_fetch_array($result);
                echo "<tr>
                        <td>{$vehicle1['marka']}</td>
                        <td>{$vehicle1['model']}</td>
                        <td rowspan='2'>{$vehicle1['cena']}</td>
                    </tr>";
                echo "<tr>
                        <td>{$vehicle1['marka']}</td>
                        <td>{$vehicle1['model']}</td>
                    </tr>";
                ?>
                <tr>
                    <td colspan="3"><img src="a2.jpg" alt="Konfiguracja 2"></td>
                </tr>
                <tr>
                <?php
                $vehicle2 = mysqli_fetch_array($result);
                echo "<tr>
                        <td>{$vehicle2['marka']}</td>
                        <td>{$vehicle2['model']}</td>
                        <td rowspan='2'>{$vehicle2['cena']}</td>
                    </tr>";
                echo "<tr>
                        <td>{$vehicle2['marka']}</td>
                        <td>{$vehicle2['model']}</td>
                    </tr>";
                mysqli_close($connect);
                ?>
            </table>
        </section>
        <section id="right">
            <h3>111 222 444</h3>
            <img src="a3.png" alt="Samochód">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>