<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Biuro turystyczne</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="wczasy.html">Wczasy</a></li>
            <li><a href="wycieczki.html">Wycieczki</a></li>
            <li><a href="allinclusive.html">All inclusive</a></li>
        </ul>
    </nav>
    <main>
        <aside>
            <h3>Twój cel wyprawy</h3>
            <form action="index.php" method="POST">
                <label>
                    Miejsce wycieczki:<br>
                    <select name="miejsceWycieczki">
                        <?php
                        $connect = mysqli_connect("localhost", "root", "", "wyprawy");
                        $query = "SELECT nazwa FROM miejsca ORDER BY nazwa ASC;";
                        $result = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value='{$row['nazwa']}'>{$row['nazwa']}</option>";
                        }
                        ?>
                    </select>
                </label>
                <br>
                <label>
                    Ile dorosłych?<br>
                    <input type="number" name="ileDoroslych">
                </label>
                <br>
                <label>
                    Ile dzieci?<br>
                    <input type="number" name="ileDzieci">
                </label>
                <br>
                <label>
                    Termin<br>
                    <input type="date" name="termin">
                </label>
                <br>
                <button name="submit">Symulacja ceny</button>
            </form>
            <h4>Koszt wycieczki</h4>
            <?php
            if (isset($_POST["submit"])) {
                $miejsceWycieczki = $_POST["miejsceWycieczki"];
                $ileDoroslych = $_POST["ileDoroslych"];
                $ileDzieci = $_POST["ileDzieci"];
                $termin = $_POST["termin"];
                $query = "SELECT cena FROM miejsca WHERE nazwa = '$miejsceWycieczki';";
                $result = mysqli_query($connect, $query);
                $row = mysqli_fetch_array($result);
                $cena = $row["cena"] * ($ileDoroslych + ($ileDzieci / 2));
                echo "<p>W dniu $termin</p>
                    <p>$cena złotych</p>";
            }
            ?>
        </aside>
        <section>
            <h3>Wyczieczki</h3>
            <?php
            $query = "SELECT nazwa, cena, link_obraz FROM miejsca WHERE link_obraz LIKE '0%';";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo "<div class='wycieczka'>
                        <img src='{$row['link_obraz']}' alt='zdjęcie z wycieczki'>
                        <h2>{$row['nazwa']}</h2>
                        <p>{$row['cena']}</p>
                    </div>";
            }
            mysqli_close($connect);
            ?>
        </section>
    </main>
    <footer>
        <p>Autor: Chr1skyy</p>
    </footer>
</body>

</html>