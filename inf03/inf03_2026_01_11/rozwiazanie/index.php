<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Lista aktorów | KinoTEKA</title>
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
        <h1>Najlepsi aktorzy tylko w naszym kinie</h1>
        <div id="allActors">
            <?php
            // Skrypt 1
            $polaczenie = mysqli_connect("localhost", "root", "", "kino");
            $zapytanie3 = "SELECT * FROM aktorzy ORDER BY nazwisko, imie ASC";
            $wynik3 = mysqli_query($polaczenie, $zapytanie3);
            while ($wiersz = mysqli_fetch_array($wynik3)) {
                echo "<a href='aktor.php?id={$wiersz['id_aktora']}'>
                        <div class='actor-index'>
                            <img src='img/{$wiersz['plik_awatara']}' alt='{$wiersz['imie']} {$wiersz['nazwisko']}' title='{$wiersz['imie']} {$wiersz['nazwisko']}'>
                            <p>{$wiersz['imie']} {$wiersz['nazwisko']}</p>
                        </div>
                    </a>";
            }
            ?>
        </div>
    </main>
    <footer>
        <p>Autor: <strong>Chr1skyy</strong></p>
    </footer>
    <?php mysqli_close($polaczenie); ?>
</body>

</html>