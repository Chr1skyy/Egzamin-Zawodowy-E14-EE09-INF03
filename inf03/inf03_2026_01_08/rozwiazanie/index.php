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
        $query1 = "SELECT id, nazwa FROM szczyty ORDER BY wysokosc DESC";
        $result = mysqli_query($connect, $query1);
        while ($row = mysqli_fetch_array($result)) {
            echo "<span><a href='szczyty.php?id={$row['id']}'>{$row['nazwa']}</a></span>";
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