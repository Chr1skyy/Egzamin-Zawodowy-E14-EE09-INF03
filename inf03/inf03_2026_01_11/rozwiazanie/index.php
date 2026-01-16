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
        $connect = mysqli_connect("localhost", "root", "", "kino");
        $query3 = "SELECT * FROM aktorzy ORDER BY nazwisko, imie ASC";
        $result = mysqli_query($connect, $query3);
        while ($row = mysqli_fetch_array($result)) {
            echo "<div class='actor-index'>
                    <img src='{$row['plik_awatara']}' alt='{$row['imie']} {$row['nazwisko']}' title='{$row['imie']} {$row['nazwisko']}'>
                    <p><a href='aktor.php?id={$row['id_aktora']}'>{$row['imie']} {$row['nazwisko']}</a></p>
                </div>";
        }
        mysqli_close($connect);
        ?>
        </div>
    </main>
    <footer>
        <p>Autor: <strong>Chr1skyy</strong></p>
    </footer>
</body>

</html>