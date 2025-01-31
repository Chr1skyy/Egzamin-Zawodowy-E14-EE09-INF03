<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Kwiaty</title>
    <link rel="stylesheet" href="styl3.css">
</head>

<body>
    <header>
        <h1>Grupa Polskich Kwiaciarnii</h1>
    </header>
    <main>
        <nav>
            <h2>Menu</h2>
            <ol>
                <li><a href="index.html">Strona główna</a></li>
                <li><a href="https://www.kwiaty.pl/" target="_blank">Rozpoznaj kwiaty</a></li>
                <li>
                    <a href="znajdz.php">Znajdź kwiaciarnię</a>
                    <ul>
                        <li>w Warszawie</li>
                        <li>w Malborku</li>
                        <li>w Poznaniu</li>
                    </ul>
                </li>
            </ol>
        </nav>
        <section id="panelPrawy">
            <h2>Znajdź kwiaciarnię</h2>
            <form action="znajdz.php" method="post">
                <label>Podaj nazwę miejscowości
                    <input type="text" name="miasto">
                </label>
                <button type="submit" name="wyslij">SPRAWDŹ</button>
            </form>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'kwiaciarnia');
            if (isset($_POST['wyslij'])) {
                $miasto = $_POST['miasto'];
                $q = "SELECT nazwa, ulica FROM kwiaciarnie WHERE miasto = '$miasto';";
                $res = mysqli_query($con, $q);
                while ($row = mysqli_fetch_array($res)) {
                    echo "<h3>$row[0], $row[1]</h3>";
                }
            }
            mysqli_close($con)
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę opracował: Chriskyy#0181</p>
    </footer>
</body>

</html>