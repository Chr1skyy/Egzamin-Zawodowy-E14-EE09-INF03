<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Informacje o aktorze | KinoTEKA</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <div id="container-row">
        <header id="left">
            <h2><a href="index.php">KinoTEKA</a></h2>
        </header>
        <header id="right">
            <p><em>W naszej bazie znajdują się najlepsi aktorzy</em></p>
        </header>
    </div>
    <main>
        <div id="allActors">
        <?php
        $connect = mysqli_connect("localhost", "root", "", "kino");
        $id = $_GET['id'];
        $query2 = "SELECT imie, nazwisko, plik_awatara FROM aktorzy WHERE id_aktora = $id;";
        $result2 = mysqli_query($connect, $query2);
        $row2 = mysqli_fetch_array($result2);
        echo "<div class='actor'>
                <img src='{$row2['plik_awatara']}' alt='{$row2['imie']} {$row2['nazwisko']}' title='{$row2['imie']} {$row2['nazwisko']}'>
                <h1>{$row2['imie']} {$row2['nazwisko']}</h1>
            </div>";
        ?>
        </div>
        <?php
        $query4 = "SELECT filmy.id_filmu, filmy.tytul, filmy.rok_produkcji FROM filmy JOIN filmy_aktorzy ON filmy.id_filmu = filmy_aktorzy.id_filmu WHERE filmy_aktorzy.id_aktora = $id;";
        $result = mysqli_query($connect, $query4);
        if (mysqli_num_rows($result) == 0) {
            echo "{$row2['imie']} nie znajduje się na listach obsady znanych nam produkcji";
        } else {
            $count = mysqli_num_rows($result);
            echo "{$row2['imie']} znajduje się na listach obsady $count znanych nam produkcji";
        }
        mysqli_close($connect);
        ?>
    </main>
    <footer>
        <p>Autor: <strong>Chr1skyy</strong></p>
    </footer>
</body>

</html>