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
            $connect = mysqli_connect("localhost", "root", "", "opony");
            $query1 = "SELECT * FROM opony ORDER BY cena ASC LIMIT 10;";
            $result1 = mysqli_query($connect, $query1);
            while ($row = mysqli_fetch_array($result1)) {
                $opona = '';
                if ($row['sezon'] == 'letnia') {
                    $obraz = 'lato.png';
                }
                if ($row['sezon'] == 'zimowa') {
                    $obraz = 'zima.png';
                }
                if ($row['sezon'] == 'uniwersalna') {
                    $obraz = 'uniwer.png';
                }
                echo "<div class='opona'>
                        <img src='$obraz'>
                        <h4>Opona: {$row['producent']} {$row['model']}</h4>
                        <h3>Cena: {$row['cena']}</h3>
                    </div>";
            }
            ?>
            <p><a href="https://opona.pl/">więcej ofert</a></p>
        </aside>
        <div id="container">
            <section id="gora">
                <img src="opona.png" alt="Opona">
                <h2>Opona dnia</h2>
                <?php
                $query2 = "SELECT producent, model, sezon, cena FROM opony WHERE nr_kat = 9;";
                $result2 = mysqli_query($connect, $query2);
                $row = mysqli_fetch_array($result2);
                echo "<h2>{$row['producent']} model {$row['model']}</h2>
                        <h2>Sezon: {$row['sezon']}</h2>
                        <h2>Tylko {$row['cena']} zł!</h2>";
                ?>
            </section>
            <section id="dol">
                <h2>Najnowsze zamówienia</h2>
                <?php
                $query3 = "SELECT id_zam, ilosc, model, cena FROM zamowienie JOIN opony ON zamowienie.nr_kat = opony.nr_kat ORDER BY RAND() LIMIT 1;";
                $result3 = mysqli_query($connect, $query3);
                $row = mysqli_fetch_array($result3);
                $wartosc = $row["ilosc"] * $row["cena"];
                echo "<h2>{$row['id_zam']} {$row['ilosc']} sztuk modelu {$row['model']}</h2>
                        <h2>Wartość zamówienia $wartosc zł</h2>";
                mysqli_close($connect);
                ?>
            </section>
        </div>
    </main>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>