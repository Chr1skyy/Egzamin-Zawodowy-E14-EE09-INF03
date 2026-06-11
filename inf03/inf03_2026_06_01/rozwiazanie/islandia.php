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
                    $connect = mysqli_connect('localhost', 'root', '', 'islandia');
                    $query1 = "SELECT idObiekt, plik, nazwa FROM obiekty;";
                    $result = mysqli_query($connect, $query1);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<a href='obiekty.php?idObiekt={$row['idObiekt']}'><img class='miniatury' src='{$row['plik']}' alt='{$row['nazwa']}' title='{$row['nazwa']}'></a>";
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
                        $query3 = "SELECT plik, nazwa, nazwaCechy, wartoscCechy, opis, rodzaj FROM obiekty JOIN rodzaje USING (idRodzaj) WHERE idObiekt = 46;";
                        $result = mysqli_query($connect, $query3);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<li>{$row['nazwa']}</li>";
                        }
                        ?>
                    </ol>
                </li>
                <li>Siedliska zwierząt:
                    <ol>
                        <?php
                        $query3modified = "SELECT plik, nazwa, nazwaCechy, wartoscCechy, opis, rodzaj FROM obiekty JOIN rodzaje USING (idRodzaj) WHERE idRodzaj = 14;";
                        $result = mysqli_query($connect, $query3modified);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<li>{$row['nazwa']}</li>";
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
    <?php mysqli_close($connect); ?>
</body>

</html>