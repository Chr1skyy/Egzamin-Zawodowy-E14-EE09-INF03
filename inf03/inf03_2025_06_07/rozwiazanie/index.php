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
                        // Skrypt 1
                        $polaczenie = mysqli_connect("localhost", "root", "", "wyprawy");
                        $zapytanie1 = "SELECT nazwa FROM miejsca ORDER BY nazwa ASC;";
                        $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                        while ($wiersz = mysqli_fetch_array($wynik1)) {
                            echo "<option value='{$wiersz['nazwa']}'>{$wiersz['nazwa']}</option>";
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
            // Skrypt 2
            if (isset($_POST["submit"])) {
                $miejsceWycieczki = $_POST["miejsceWycieczki"];
                $ileDoroslych = $_POST["ileDoroslych"];
                $ileDzieci = $_POST["ileDzieci"];
                $termin = $_POST["termin"];
                $zapytanie2 = "SELECT cena FROM miejsca WHERE nazwa = '$miejsceWycieczki';";
                $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                $wiersz = mysqli_fetch_array($wynik2);
                $cena = $wiersz["cena"] * ($ileDoroslych + ($ileDzieci / 2));
                echo "<p>W dniu $termin</p>
                    <p>$cena złotych</p>";
            }
            ?>
        </aside>
        <section>
            <h3>Wyczieczki</h3>
            <?php
            // Skrypt 3
            $zapytanie3 = "SELECT nazwa, cena, link_obraz FROM miejsca WHERE link_obraz LIKE '0%';";
            $wynik3 = mysqli_query($polaczenie, $zapytanie3);
            while ($wiersz = mysqli_fetch_array($wynik3)) {
                echo "<div class='wycieczka'>
                        <img src='img/{$wiersz['link_obraz']}' alt='zdjęcie z wycieczki'>
                        <h2>{$wiersz['nazwa']}</h2>
                        <p>{$wiersz['cena']}</p>
                    </div>";
            }
            mysqli_close($polaczenie);
            ?>
        </section>
    </main>
    <footer>
        <p>Autor: Chr1skyy</p>
    </footer>
</body>

</html>