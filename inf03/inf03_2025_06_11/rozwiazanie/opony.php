<?php
header("refresh: 10;");
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>OPONY</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <main>
        <aside>
            <?php
            // Skrypt 1
            $polaczenie = mysqli_connect("localhost", "root", "", "opony");
            $zapytanie1 = "SELECT * FROM opony ORDER BY cena ASC LIMIT 10;";
            $wynik1 = mysqli_query($polaczenie, $zapytanie1);
            while ($wiersz = mysqli_fetch_array($wynik1)) {
                $obraz = '';
                if ($wiersz['sezon'] == 'letnia') {
                    $obraz = 'img/lato.png';
                } else if ($wiersz['sezon'] == 'zimowa') {
                    $obraz = 'img/zima.png';
                } else if ($wiersz['sezon'] == 'uniwersalna') {
                    $obraz = 'img/uniwer.png';
                }
                echo "<div class='opona'>
                        <img src='$obraz'>
                        <h4>Opona: {$wiersz['producent']} {$wiersz['model']}</h4>
                        <h3>Cena: {$wiersz['cena']}</h3>
                    </div>";
            }
            ?>
            <p><a href="https://opona.pl/">więcej ofert</a></p>
        </aside>
        <div id="container">
            <section id="gora">
                <img src="img/opona.png" alt="Opona">
                <h2>Opona dnia</h2>
                <?php
                // Skrypt 2
                $zapytanie2 = "SELECT producent, model, sezon, cena FROM opony WHERE nr_kat = 9;";
                $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                $wiersz = mysqli_fetch_array($wynik2);
                echo "<h2>{$wiersz['producent']} model {$wiersz['model']}</h2>
                        <h2>Sezon: {$wiersz['sezon']}</h2>
                        <h2>Tylko {$wiersz['cena']} zł!</h2>";
                ?>
            </section>
            <section id="dol">
                <h2>Najnowsze zamówienie</h2>
                <?php
                // Skrypt 3
                $zapytanie3 = "SELECT id_zam, ilosc, model, cena FROM zamowienie JOIN opony ON zamowienie.nr_kat = opony.nr_kat ORDER BY RAND() LIMIT 1;";
                $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                $wiersz = mysqli_fetch_array($wynik3);
                $wartosc = $wiersz["ilosc"] * $wiersz["cena"];
                echo "<h2>{$wiersz['id_zam']} {$wiersz['ilosc']} sztuki modelu {$wiersz['model']}</h2>
                        <h2>Wartość zamówienia $wartosc zł</h2>";
                mysqli_close($polaczenie);
                ?>
            </section>
        </div>
    </main>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>