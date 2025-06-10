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
                $connect = mysqli_connect("localhost", "root", "", "gry");
                $query = "SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5;";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<li>{$row['nazwa']} <span class='punkty'>{$row['punkty']}</span></li>";
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
            $query = "SELECT id, nazwa, zdjecie FROM gry;";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo "<div>
                        <img src='{$row['zdjecie']}' alt='{$row['nazwa']}' title='{$row['id']}'>
                        <p>{$row['nazwa']}</p>
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
            <?php
            if (isset($_POST["dodaj"]) && !empty($_POST["nazwa"])) {
                $nazwa = $_POST["nazwa"];
                $opis = $_POST["opis"];
                $cena = $_POST["cena"];
                $zdjecie = $_POST["zdjecie"];
                $query = "INSERT INTO gry VALUES (NULL, '$nazwa', '$opis', 0, $cena, '$zdjecie');";
                mysqli_query($connect, $query);
                header("location: gry.php");
            }
            ?>
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
        if (isset($_POST["pokaz"]) && !empty($_POST["id"])) {
            $query = "SELECT nazwa, LEFT(opis, 100) AS opis, punkty, cena FROM gry WHERE id = {$_POST['id']};";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo "<h2>{$row['nazwa']}, {$row['punkty']} punktów, {$row['cena']} zł</h2>
                <p>{$row['opis']}</p>";
            }
        }
        mysqli_close($connect);
        ?>
        <h2></h2>
    </footer>
</body>

</html>