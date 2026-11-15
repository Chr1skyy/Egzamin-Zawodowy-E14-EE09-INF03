<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Korona gór polskich</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <div class="container-row">
        <header class="left">
            <img src="img/logo.png" alt="Logo">
        </header>
        <header class="right">
            <h1>Korona Gór Polskich</h1>
        </header>
    </div>
    <main>
        <?php
        // Skrypt 1
        $polaczenie = mysqli_connect('localhost', 'root', '', 'korona');
        $zapytanie1 = "SELECT id, nazwa FROM szczyty ORDER BY wysokosc DESC";
        $wynik1 = mysqli_query($polaczenie, $zapytanie1);
        while ($wiersz = mysqli_fetch_array($wynik1)) {
            echo "<span><a href='szczyty.php?id={$wiersz['id']}'>{$wiersz['nazwa']}</a></span>";
        }
        ?>
    </main>
    <section>
        <?php
        // Skrypt 2
        $zapytanie2 = "SELECT nazwa, plik FROM szczyty LIMIT 10";
        $wynik2 = mysqli_query($polaczenie, $zapytanie2);
        while ($wiersz = mysqli_fetch_array($wynik2)) {
            echo "<img class='miniatura' src='img/{$wiersz['plik']}' alt='{$wiersz['nazwa']}'>";
        }
        ?>
    </section>
    <div class="container-row">
        <footer class="left">
            <h3>Kontakt</h3>
            <ul>
                <li>Zadzwoń do nas: 111 222 333</li>
                <li><a href="mailto:korona@gory.pl">Napisz do nas</a></li>
            </ul>
        </footer>
        <footer class="right">
            <h3>&copy Wykonane przez: Chr1skyy</h3>
        </footer>
    </div>
    <?php mysqli_close($polaczenie); ?>
</body>

</html>