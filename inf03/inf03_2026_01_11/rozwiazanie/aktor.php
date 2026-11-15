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
            // Skrypt 2
            $polaczenie = mysqli_connect("localhost", "root", "", "kino");
            $id = $_GET['id'];
            $zapytanie2 = "SELECT imie, nazwisko, plik_awatara FROM aktorzy WHERE id_aktora = $id;";
            $wynik2 = mysqli_query($polaczenie, $zapytanie2);
            $aktor = mysqli_fetch_array($wynik2);
            echo "<div class='actor'>
                <img src='img/{$aktor['plik_awatara']}' alt='{$aktor['imie']} {$aktor['nazwisko']}' title='{$aktor['imie']} {$aktor['nazwisko']}'>
                <h1>{$aktor['imie']} {$aktor['nazwisko']}</h1>
            </div>";
            ?>
        </div>
        <?php
        // Skrypt 3
        $zapytanie4 = "SELECT filmy.id_filmu, filmy.tytul, filmy.rok_produkcji FROM filmy JOIN filmy_aktorzy ON filmy.id_filmu = filmy_aktorzy.id_filmu WHERE filmy_aktorzy.id_aktora = $id;";
        $wynik4 = mysqli_query($polaczenie, $zapytanie4);
        $liczbaFilmow = mysqli_num_rows($wynik4);
        if ($liczbaFilmow == 0) {
            echo "{$aktor['imie']} nie znajduje się na listach obsady znanych nam produkcji";
        } else {
            echo "{$aktor['imie']} znajduje się na listach obsady $liczbaFilmow znanych nam produkcji";
        }
        ?>
    </main>
    <footer>
        <p>Autor: <strong>Chr1skyy</strong></p>
    </footer>
    <?php mysqli_close($polaczenie); ?>
</body>

</html>