<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wynajem pokoi</title>
    <link rel="stylesheet" href="styl2.css">
</head>

<body>
    <header>
        <h1>Pensjonat pod dobrym humorem</h1>
    </header>
    <main>
        <section id="panelLewy">
            <a href="index.html">GŁÓWNA</a>
            <img src="img/1.jpg" alt="pokoje" />
        </section>
        <section id="panelSrodkowy">
            <a href="cennik.php">CENNIK</a>
            <table>
                <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'wynajem');
                $zapytanie = "SELECT * FROM pokoje;";
                $wynik = mysqli_query($polaczenie, $zapytanie);
                while ($wiersz = mysqli_fetch_array($wynik)) {
                    echo "<tr>
                            <td>{$wiersz['id']}</td>
                            <td>{$wiersz['nazwa']}</td>
                            <td>{$wiersz['cena']}</td>
                        </tr>";
                }
                mysqli_close($polaczenie);
                ?>
            </table>
        </section>
        <section id="panelPrawy">
            <a href="kalkulator.html">KALKULATOR</a>
            <img src="img/3.jpg" alt="pokoje" /></section>
    </main>
    <footer>
        <p>Stronę opracował: Chr1skyy</p>
    </footer>
</body>

</html>