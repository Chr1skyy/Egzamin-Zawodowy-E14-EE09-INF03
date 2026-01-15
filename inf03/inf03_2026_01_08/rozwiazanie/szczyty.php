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
            <img src="logo.png" alt="Logo">
        </header>
        <header class="right">
            <h1>Korona Gór Polskich</h1>
        </header>
    </div>
    <main>
        <?php
        $connect = mysqli_connect('localhost', 'root', '', 'korona');
        $id = $_GET['id'];
        $query3 = " SELECT szczyty.plik, szczyty.nazwa, szczyty.wysokosc, szczyty.pasmo, opis.opis FROM szczyty JOIN opis ON szczyty.id = opis.szczyty_id WHERE szczyty.id = $id;";
        $result = mysqli_query($connect, $query3);
        while ($row = mysqli_fetch_array($result)) {
            echo "<img src='{$row['plik']}' alt='{$row['nazwa']}'>";
            echo "<h2>{$row['nazwa']}</h2>";
            echo "<h3>wysokość: {$row['wysokosc']} metrów  n.p.m.</h3>";
            echo "<h3>pasmo górskie: {$row['pasmo']}</h3>";
            echo "<p>{$row['opis']}</p>";
        }
        ?>
    </main>
    <section>
        <?php
        $query2 = "SELECT nazwa, plik FROM szczyty LIMIT 10";
        $result = mysqli_query($connect, $query2);
        while ($row = mysqli_fetch_array($result)) {
            echo "<img class='miniatura' src='{$row['plik']}' alt='{$row['nazwa']}'>";
        }
        mysqli_close($connect);
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
</body>

</html>