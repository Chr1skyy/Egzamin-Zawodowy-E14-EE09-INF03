<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Smoki</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h2>Poznaj smoki!</h2>
    </header>
    <div id="container">
        <nav>
            <div id="blokBaza" onclick="zmienSekcje('blokBaza', 'baza')">Baza</div>
            <div id="blokOpisy" onclick="zmienSekcje('blokOpisy', 'opisy')">Opisy</div>
            <div id="blokGaleria" onclick="zmienSekcje('blokGaleria', 'galeria')">Galeria</div>
        </nav>
        <main>
            <section id="baza">
                <h3>Baza Smoków</h3>
                <form action="smoki.php" method="POST">
                    <select name="pochodzenie">
                        <?php
                        // Skrypt 1
                        $polaczenie = mysqli_connect("localhost", "root", "", "smoki");
                        $zapytanie2 = "SELECT DISTINCT pochodzenie FROM smok ORDER BY pochodzenie ASC;";
                        $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                        while ($wiersz = mysqli_fetch_array($wynik2)) {
                            echo "<option value='{$wiersz['pochodzenie']}'>{$wiersz['pochodzenie']}</option>";
                        }
                        ?>
                    </select>
                    <button name="submit">Szukaj</button>
                </form>
                <table>
                    <tr>
                        <th>Nazwa</th>
                        <th>Długość</th>
                        <th>Szerokość</th>
                    </tr>
                    <?php
                    // Skrypt 2
                    if (isset($_POST["submit"])) {
                        $pochodzenie = $_POST["pochodzenie"];
                        $zapytanie1 = "SELECT nazwa, dlugosc, szerokosc FROM smok WHERE pochodzenie ='$pochodzenie';";
                        $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                        while ($wiersz = mysqli_fetch_array($wynik1)) {
                            echo "<tr>
                                <td>{$wiersz['nazwa']}</td>
                                <td>{$wiersz['dlugosc']}</td>
                                <td>{$wiersz['szerokosc']}</td>
                            </tr>";
                        }
                    }
                    mysqli_close($polaczenie);
                    ?>
                </table>
            </section>
            <section id="opisy">
                <h3>Opisy smoków</h3>
                <dl>
                    <dt>Smok czerwony</dt>
                    <dd>Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach
                        wschodnich do wyrabiania lekarstw. Jest dziki i groźny.</dd>
                    <dt>Smok zielony</dt>
                    <dd>Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze
                        zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.</dd>
                    <dt>Smok niebieski</dt>
                    <dd>Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych
                        malarzy. Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak
                        próżny i nie lubi się przepracowywać.</dd>
                </dl>
            </section>
            <section id="galeria">
                <h3>Galeria</h3>
                <img src="img/smok1.JPG" alt="Smok czerwony">
                <img src="img/smok2.JPG" alt="Smok wielki">
                <img src="img/smok3.JPG" alt="Skrzydlaty łaciaty">
            </section>
        </main>
    </div>
    <footer>
        <p>Stronę opracował: Chr1skyy</p>
    </footer>
    <script src="main.js"></script>
</body>

</html>