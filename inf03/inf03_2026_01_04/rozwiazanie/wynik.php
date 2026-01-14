<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Matura</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>System informacji dla maturzystów</h1>
    </header>
    <div id="container-row">
        <aside>
            <img src="ma.jpg" alt="Matura">
            <img src="tu.jpg" alt="Matura">
            <img src="ra.jpg" alt="Matura">
        </aside>
        <div id="container-column">
            <section>
                <?php
                echo "<h2>{$_GET['imie']} {$_GET['nazwisko']}</h2>";
                $connect = mysqli_connect('localhost', 'root', '', 'matura');
                $query5 = "SELECT matura_arkusz.rok, matura_arkusz.sesja, matura_arkusz.przedmiot, matura_wynik.punkty FROM matura_arkusz JOIN matura_wynik ON matura_arkusz.symbol = matura_wynik.symbol WHERE matura_wynik.maturzysta_id = {$_GET['id']};";
                $result = mysqli_query($connect, $query5);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<h3>{$row['rok']} {$row['sesja']}</h3>";
                    echo "<p>{$row['przedmiot']}: {$row['punkty']}%</p>";
                }
                ?>
            </section>
            <section>
                <div class='block'>
                    <h4>Przedmioty</h4>
                    <?php
                    $query2 = "SELECT DISTINCT przedmiot FROM matura_arkusz;";
                    $result = mysqli_query($connect, $query2);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "{$row['przedmiot']}<br>";
                    }
                    ?>
                </div>
                <div class='block'>
                    <h4>Lata</h4>
                    <?php
                    $query3 = "SELECT MIN(rok), MAX(rok) FROM matura_arkusz;";
                    $result = mysqli_query($connect, $query3);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "{$row['MIN(rok)']} - {$row['MAX(rok)']}";
                    }
                    ?>
                </div>
                <div class='block'>
                    <h4>Najlepszy wynik</h4>
                    <?php
                    $query4 = "SELECT maturzysta_id, AVG(punkty) AS 'Wynik' FROM matura_wynik GROUP BY maturzysta_id ORDER BY Wynik DESC LIMIT 1;";
                    $result = mysqli_query($connect, $query4);
                    $row = mysqli_fetch_array($result);
                    echo "{$row['Wynik']}%";
                    ?>
                </div>
                <div class='block'>
                    <h4>Najgorszy wynik</h4>
                    <?php
                    $query4 = "SELECT maturzysta_id, AVG(punkty) AS 'Wynik' FROM matura_wynik GROUP BY maturzysta_id ORDER BY Wynik ASC LIMIT 1;";
                    $result = mysqli_query($connect, $query4);
                    $row = mysqli_fetch_array($result);
                    echo "{$row['Wynik']}%";
                    mysqli_close($connect);
                    ?>
                </div>
            </section>
        </div>
    </div>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>