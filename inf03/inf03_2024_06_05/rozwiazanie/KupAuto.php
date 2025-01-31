<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1><em>KupAuto!</em> Internetowy Komis Samochodowy</h1>
    </header>
    <main>
        <section id="baner">
            <?php
            $connect = mysqli_connect('localhost', 'root', '', 'kupauto');
            $query1 = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id=10";
            $result1 = mysqli_query($connect, $query1);
            while ($row = mysqli_fetch_array($result1)) {
                echo "<img src='$row[5]' alt='oferta dnia'>";
                echo "<h4>Oferta Dnia: Toyota $row[0]</h4>";
                echo "<p>Rocznik: $row[1], przebieg: $row[2], rodzaj paliwa: $row[3]</p>";
                echo "<h4>Cena: $row[4]</h4>";
            }
            ?>
        </section>
        <section id="oferty">
            <h2>Oferty wyróznione</h2>
            <?php
            $query2 = "SELECT nazwa, model, rocznik, cena, zdjecie FROM samochody JOIN marki ON samochody.marki_id = marki.id WHERE wyrozniony=1 LIMIT 4";
            $result2 = mysqli_query($connect, $query2);
            while ($row = mysqli_fetch_array($result2)) {
                echo "<div class='blok'>";
                echo "<img src='$row[4]' alt='$row[1]'>";
                echo "<h4>$row[0] $row[1]</h4>";
                echo "<p>Rocznik: $row[2]</p>";
                echo "<h4>Cena: $row[3]</h4>";
                echo "</div>";
            }
            ?>
        </section>
        <section id="marki">
            <h2>Wybierz markę</h2>
            <form action="KupAuto.php" method="post">
                <select name="marka">
                    <?php
                    $query3 = "SELECT nazwa FROM marki";
                    $result3 = mysqli_query($connect, $query3);
                    while ($row = mysqli_fetch_array($result3)) {
                        echo "<option value='$row[0]'>$row[0]</option>";
                    }
                    ?>
                </select>
                <button type="submit" name="wyszukaj">Wyszukaj</button>
            </form>
            <?php
            if (isset($_POST['wyszukaj'])) {
                $marka = $_POST['marka'];
                $query4 = "SELECT model, cena, zdjecie FROM samochody JOIN marki ON samochody.marki_id = marki.id WHERE nazwa = '$marka'";
                $result4 = mysqli_query($connect, $query4);
                while ($row = mysqli_fetch_array($result4)) {
                    echo "<div class='blok'>";
                    echo "<img src='$row[2]' alt='$row[0]'>";
                    echo "<h4>$marka $row[0]</h4>";
                    echo "<h4>Cena: $row[1]</h4>";
                    echo "</div>";
                }
            }
            mysqli_close($connect);
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chriskyy</p>
        <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
    </footer>
</body>

</html>