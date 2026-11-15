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
                <h2>Galeria</h2>
                <section>
                    <?php
                    // Skrypt 3
                    $polaczenie = mysqli_connect('localhost', 'root', '', 'islandia');
                    $zapytanie1 = "SELECT idObiekt, plik, nazwa FROM obiekty WHERE panstwo = 'Islandia';";
                    $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                    while ($wiersz = mysqli_fetch_array($wynik1)) {
                        echo "<a href='obiekty.php?idObiekt={$wiersz['idObiekt']}'><img class='miniatury' src='img/{$wiersz['plik']}' alt='{$wiersz['nazwa']}' title='{$wiersz['nazwa']}'></a>";
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
                        $zapytanie3 = "SELECT nazwa FROM obiekty WHERE panstwo = 'Islandia' AND idRodzaj = 10;";
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
                        $zapytanie3 = "SELECT nazwa FROM obiekty WHERE panstwo = 'Islandia' AND idRodzaj = 14;";
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