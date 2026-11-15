<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Islandia</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <div id="container-row">
        <div id="container-column">
            <header>
                <h1><a href="islandia.php">Zwiedzaj Islandię</a></h1>
            </header>
            <main>
                <h2>Opis miejsca</h2>
                <section>
                    <?php
                    // Skrypt 4
                    $polaczenie = mysqli_connect('localhost', 'root', '', 'islandia');
                    if (isset($_GET['idObiekt'])) {
                        $idObiekt = $_GET['idObiekt'];
                        $zapytanie2 = "SELECT plik, nazwa, nazwaCechy, wartoscCechy, opis, rodzaj FROM obiekty JOIN rodzaje USING(idRodzaj) WHERE idObiekt = $idObiekt;";
                        $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                        $wiersz = mysqli_fetch_array($wynik2);
                        echo "<img src='img/{$wiersz['plik']}' alt='{$wiersz['nazwa']}'>";
                        echo "<h2>{$wiersz['nazwa']}</h2>";
                        echo "<h3>{$wiersz['rodzaj']}</h3>";
                        echo "<p>{$wiersz['nazwaCechy']}: {$wiersz['wartoscCechy']}</p>";
                        echo "<p>{$wiersz['opis']}</p>";
                    }
                    ?>
                </section>
            </main>
        </div>
        <aside>
            <h3>Do zwiedzania</h3>
            <ul>
                <li>Wodospady:
                    <ol>
                        <?php
                        // Skrypt 1
                        $zapytanie3 = "SELECT nazwa FROM obiekty WHERE panstwo = 'Islandia' AND idRodzaj = 10";
                        $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                        while ($wiersz = mysqli_fetch_array($wynik3)) {
                            echo "<li>{$wiersz['nazwa']}</li>";
                        }
                        ?>

                    </ol>
                </li>
                <li>Siedliska zwierząt:
                    <ol>
                        <?php
                        // Skrypt 2
                        $zapytanie3 = "SELECT nazwa FROM obiekty WHERE panstwo = 'Islandia' AND idRodzaj = 14";
                        $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                        while ($wiersz = mysqli_fetch_array($wynik3)) {
                            echo "<li>{$wiersz['nazwa']}</li>";
                        }
                        ?>
                    </ol>
                </li>
            </ul>
        </aside>
    </div>
    <footer>
        <hr>
        <p>Autor: Chr1skyy</p>
    </footer>
    <?php mysqli_close($polaczenie); ?>
</body>

</html>