<?php
// Skrypt 4: formularz jest obsługiwany przed wypisaniem strony, żeby nowa gra od razu była na liście
$polaczenie = mysqli_connect("localhost", "root", "", "gry");
if (isset($_POST["dodaj"]) && !empty($_POST["nazwa"])) {
    $nazwa = $_POST["nazwa"];
    $opis = $_POST["opis"];
    $cena = $_POST["cena"];
    $zdjecie = $_POST["zdjecie"];
    $zapytanie4 = "INSERT INTO gry VALUES (NULL, '$nazwa', '$opis', 0, $cena, '$zdjecie');";
    mysqli_query($polaczenie, $zapytanie4);
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>
    <main>
        <section id="lewy">
            <h3>Top 5 gier w tym miesiącu</h3>
            <ul>
                <?php
                // Skrypt 1
                $zapytanie3 = "SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5;";
                $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                while ($wiersz = mysqli_fetch_array($wynik3)) {
                    echo "<li>{$wiersz['nazwa']} <span class='punkty'>{$wiersz['punkty']}</span></li>";
                }
                ?>
            </ul>
            <h3>Nasz sklep</h3>
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Stronę wykonał</h3>
            <p>Chr1skyy</p>
        </section>
        <section id="srodkowy">
            <?php
            // Skrypt 2
            $zapytanie1 = "SELECT id, nazwa, zdjecie FROM gry;";
            $wynik1 = mysqli_query($polaczenie, $zapytanie1);
            while ($wiersz = mysqli_fetch_array($wynik1)) {
                echo "<div class='gra'>
                        <img src='img/{$wiersz['zdjecie']}' alt='{$wiersz['nazwa']}' title='{$wiersz['id']}'>
                        <p>{$wiersz['nazwa']}</p>
                    </div>";
            }
            ?>
        </section>
        <section id="prawy">
            <h3>Dodaj nową grę</h3>
            <form action="gry.php" method="POST">
                <label>
                    nazwa<br>
                    <input type="text" name="nazwa"><br>
                </label>
                <label>
                    opis<br>
                    <input type="text" name="opis"><br>
                </label>
                <label>
                    cena<br>
                    <input type="text" name="cena"><br>
                </label>
                <label>
                    zdjecie<br>
                    <input type="text" name="zdjecie"><br>
                </label>
                <button type="submit" name="dodaj">DODAJ</button>
            </form>
        </section>
    </main>
    <footer>
        <form action="gry.php" method="POST">
            <label>
                nazwa<input type="text" name="id">
            </label>
            <button type="submit" name="pokaz">Pokaż opis</button>
        </form>
        <?php
        // Skrypt 3
        if (isset($_POST["pokaz"]) && !empty($_POST["id"])) {
            $id = $_POST["id"];
            $zapytanie2 = "SELECT nazwa, LEFT(opis, 100) AS opis, punkty, cena FROM gry WHERE id = $id;";
            $wynik2 = mysqli_query($polaczenie, $zapytanie2);
            while ($wiersz = mysqli_fetch_array($wynik2)) {
                echo "<h2>{$wiersz['nazwa']}, {$wiersz['punkty']} punktów, {$wiersz['cena']} zł</h2>
                <p>{$wiersz['opis']}</p>";
            }
        }
        mysqli_close($polaczenie);
        ?>
        <h2></h2>
    </footer>
</body>

</html>