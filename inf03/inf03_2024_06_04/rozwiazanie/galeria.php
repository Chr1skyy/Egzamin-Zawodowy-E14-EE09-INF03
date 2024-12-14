<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Galeria</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Zdjęcia</h1>
    </header>
    <main>
        <section id="lewy">
            <h2>Tematy zdjęć</h2>
            <ol>
                <li>Zwierzęta</li>
                <li>Krajobrazy</li>
                <li>Miasta</li>
                <li>Przyroda</li>
                <li>Samochody</li>
            </ol>
        </section>
        <section id="srodkowy">
            <?php
            $connect = mysqli_connect('localhost', 'root', '', 'galeria');
            $query1 = "SELECT plik, tytul, polubienia, imie, nazwisko FROM zdjecia JOIN autorzy ON zdjecia.autorzy_id = autorzy.id ORDER BY nazwisko;";
            $result1 = mysqli_query($connect, $query1);
            while ($row = mysqli_fetch_array($result1)) {
                echo "<div class='blok'>";
                echo "<img src='$row[0]' alt='zdjęcie'>";
                echo "<h3>$row[1]</h3>";
                if ($row['polubienia'] > 40) {
                    echo "<p>Autor: $row[3] $row[4].</br>Wiele osób polubiło ten obraz.</p>";
                } else {
                    echo "<p>Autor: $row[3] $row[4].</p>";
                }
                echo "<a href='$row[0]' download>Pobierz</a>";
                echo "</div>";
            }
            ?>
        </section>
        <section id="prawy">
            <h2>Najbardziej lubiane</h2>
            <?php
            $query2 = "SELECT tytul, plik FROM zdjecia WHERE polubienia >= 100";
            $result2 = mysqli_query($connect, $query2);
            while ($row = mysqli_fetch_array($result2)) {
                echo "<img src='$row[1]' alt='$row[0]'>";
            }

            mysqli_close($connect);
            ?>
            <strong>Zobacz wszystkie nasze zdjęcia</strong>
        </section>
    </main>
    <footer>
        <h5>Stronę wykonał: Chriskyy</h5>
    </footer>
</body>

</html>