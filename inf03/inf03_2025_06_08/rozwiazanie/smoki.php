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
            <div id="blokBaza" onclick="changeSection('baza')">Baza</div>
            <div id="blokOpisy" onclick="changeSection('opisy')">Opisy</div>
            <div id="blokGaleria" onclick="changeSection('galeria')">Galeria</div>
        </nav>
        <main>
            <section id="baza">
                <h3>Baza smoków</h3>
                <form action="smoki.php" method="POST">
                    <select name="pochodzenie">
                        <?php
                        $connect = mysqli_connect("localhost", "root", "", "smoki");
                        $query = "SELECT DISTINCT pochodzenie FROM smok ORDER BY pochodzenie ASC;";
                        $result = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option name='{$row['pochodzenie']}'>{$row['pochodzenie']}</option>";
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
                    if (isset($_POST["submit"])) {
                        $pochodzenie = $_POST["pochodzenie"];
                        $query = "SELECT nazwa, dlugosc, szerokosc FROM smok WHERE pochodzenie ='$pochodzenie';";
                        $result = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>
                                <td>{$row['nazwa']}</td>
                                <td>{$row['dlugosc']}</td>
                                <td>{$row['szerokosc']}</td>
                            </tr>";
                        }
                    }
                    mysqli_close($connect);
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
                <img src="smok1.jpg" alt="Smok czerwony">
                <img src="smok2.jpg" alt="Smok wielki">
                <img src="smok3.jpg" alt="Skrzydlaty łaciaty">
            </section>
        </main>
    </div>
    <footer>
        <p>Stronę opracował: Chr1skyy</p>
    </footer>
    <script src="main.js"></script>
</body>

</html>