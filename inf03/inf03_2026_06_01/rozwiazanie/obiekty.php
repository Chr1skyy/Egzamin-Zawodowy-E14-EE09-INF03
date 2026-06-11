<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Islandia</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1><a href="islandia.php">Zwiedzaj Islandię</a></h1>
    </header>
    <aside>
        <h3>Do zwiedzania</h3>
        <ul>
            <li>Wodospady:
                <ol>
                    <?php
                    $connect = mysqli_connect('localhost', 'root', '', 'islandia');
                    $query3 = "SELECT plik, nazwa, nazwaCechy, wartoscCechy, opis, rodzaj FROM obiekty JOIN rodzaje USING (idRodzaj) WHERE idObiekt = 46";
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
                    $query3modified = "SELECT plik, nazwa, nazwaCechy, wartoscCechy, opis, rodzaj FROM obiekty JOIN rodzaje USING (idRodzaj) WHERE idRodzaj = 14";
                    $result = mysqli_query($connect, $query3modified);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<li>{$row['nazwa']}</li>";
                    }
                    ?>
                </ol>
            </li>
        </ul>
    </aside>
    <main>
        <h2>Opis miejsca</h2>
        <section>
            <?php
            if (isset($_GET['idObiekt'])) {
                $idObiekt = $_GET['idObiekt'];
                $query2modified = "SELECT plik, nazwa, nazwaCechy, wartoscCechy, opis, rodzaj FROM obiekty JOIN rodzaje USING (idRodzaj) WHERE idObiekt = $idObiekt;";
                $result = mysqli_query($connect, $query2modified);
                $row = mysqli_fetch_array($result);
                echo "<img src='{$row['plik']}' alt='{$row['nazwa']}'>";
                echo "<h2>{$row['nazwa']}</h2>";
                echo "<h3>{$row['rodzaj']}</h3>";
                echo "<p>{$row['nazwaCechy']}: {$row['wartoscCechy']}</p>";
                echo "<p>{$row['opis']}</p>";
            }


            ?>
        </section>
    </main>
    <footer>
        <hr>
        <p>Autor: Chr1skyy</p>
    </footer>
    <?php mysqli_close($connect); ?>
</body>

</html>