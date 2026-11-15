<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Zadania na lipiec</title>
    <link rel="stylesheet" href="styl6.css">
</head>

<body>
    <header>
        <section id="header1">
            <img src="logo1.png" alt="lipiec">
        </section>
        <section id="header2">
            <h1>TERMINARZ</h1>
            <p>najbliższe zadania:
                <?php
                // Skrypt 1
                $polaczenie = mysqli_connect('localhost', 'root', '', 'terminarz');
                $zapytanie1 = "SELECT DISTINCT wpis FROM zadania WHERE dataZadania BETWEEN '2020-07-01' AND '2020-07-07' AND wpis != '';";
                $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                while ($wiersz = mysqli_fetch_array($wynik1)) {
                    echo "{$wiersz['wpis']}; ";
                }
                ?>
            </p>
        </section>
    </header>
    <main>
        <?php
        // Skrypt 2
        $zapytanie2 = "SELECT dataZadania, wpis FROM zadania WHERE MONTH(dataZadania) = 7;";
        $wynik2 = mysqli_query($polaczenie, $zapytanie2);
        while ($wiersz = mysqli_fetch_array($wynik2)) {
            echo "<section class='kalendarz'>
                <h6>{$wiersz['dataZadania']}</h6>
                <p>{$wiersz['wpis']}</p>
                </section>";
        }
        mysqli_close($polaczenie);
        ?>
    </main>
    <footer>
        <a href="sierpien.html">Terminarz na sierpień</a>
        <p>Stronę wykonał: Chriskyy</p>
    </footer>
</body>

</html>