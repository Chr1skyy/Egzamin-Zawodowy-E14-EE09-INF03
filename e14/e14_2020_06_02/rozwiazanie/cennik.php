<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Pokoje</title>
    <link rel="stylesheet" href="./styl.css">
</head>

<body>
    <header>
        <h2>WYNAJEM POKOI</h2>
    </header>
    <nav>
        <section id="menuOne">
            <a href="./index.html">POKOJE</a>
        </section>
        <section id="menuTwo">
            <a href="./cennik.php">CENNIK</a>
        </section>
        <section id="menuThree">
            <a href="./kalkulator.html">KALKULATOR</a>
        </section>
    </nav>
    <section id="bannerTwo"></section>
    <main>
        <section id="panelLewy">
        </section>
        <section id="panelSrodkowy">
            <h1>Cennik</h1>
            <table>
                <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'wynajem');
                $zapytanie = "SELECT * FROM pokoje";
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
        </section>
    </main>
    <footer>
        <p>Stronę opracował: Chr1skyy</p>
    </footer>
</body>

</html>