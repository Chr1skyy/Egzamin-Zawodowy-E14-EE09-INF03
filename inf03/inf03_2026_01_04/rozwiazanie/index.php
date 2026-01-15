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
                <h3>Wybierz ucznia z listy</h3>
                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'matura');
                $query1 = "SELECT id, imie, nazwisko FROM maturzysta WHERE szkola = 'T3' ORDER BY nazwisko ASC;";
                $result = mysqli_query($connect, $query1);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<a href='wynik.php?id={$row["id"]}&imie={$row["imie"]}&nazwisko={$row["nazwisko"]}'>{$row['id']}. {$row['imie']} {$row['nazwisko']}</a><br>";
                }
                ?>
            </section>
            <section>
                <div class='block'>
                    <h4>Przedmioty</h4>
                    <?php
                    $query2 = "SELECT DISTINCT przedmiot FROM arkusz;";
                    $result = mysqli_query($connect, $query2);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "{$row['przedmiot']}<br>";
                    }
                    ?>
                </div>
                <div class='block'>
                    <h4>Lata</h4>
                    <?php
                    $query3 = "SELECT MIN(rok), MAX(rok) FROM arkusz;";
                    $result = mysqli_query($connect, $query3);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "{$row['MIN(rok)']} - {$row['MAX(rok)']}";
                    }
                    ?>
                </div>
                <div class='block'>
                    <h4>Najlepszy wynik</h4>
                    <?php
                    $query4 = "SELECT maturzysta_id, AVG(punkty) AS 'Wynik' FROM wynik GROUP BY maturzysta_id ORDER BY Wynik DESC LIMIT 1;";
                    $result = mysqli_query($connect, $query4);
                    $row = mysqli_fetch_array($result);
                    echo "{$row['Wynik']}%";
                    ?>
                </div>
                <div class='block'>
                    <h4>Najgorszy wynik</h4>
                    <?php
                    $query4 = "SELECT maturzysta_id, AVG(punkty) AS 'Wynik' FROM wynik GROUP BY maturzysta_id ORDER BY Wynik ASC LIMIT 1;";
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