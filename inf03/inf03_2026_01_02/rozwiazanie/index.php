<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Zdrowy bazarek</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Zdrowy bazarek</h1>
    </header>
    <nav>
        <?php
        // Skrypt 1
        $polaczenie = mysqli_connect("localhost", "root", "", "bazar");
        $zapytanie1 = "SELECT nazwa, plik FROM towar LIMIT 10;";
        $wynik1 = mysqli_query($polaczenie, $zapytanie1);
        while ($wiersz = mysqli_fetch_array($wynik1)) {
            echo "<img src='img/{$wiersz['plik']}' alt='{$wiersz['nazwa']}'>";
        }
        ?>
    </nav>
    <main>
        <aside>
            <img src="img/market.png" alt="bazarek">
        </aside>
        <section>
            <p>Wybierz owoc lub warzywo i podaj jego wagę:</p>
            <form action="index.php" method="POST">
                <select name="towar">
                    <?php
                    // Skrypt 2
                    $zapytanie2 = "SELECT id, nazwa FROM towar;";
                    $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                    while ($wiersz = mysqli_fetch_array($wynik2)) {
                        echo "<option value='{$wiersz['id']}'>{$wiersz['nazwa']}</option>";
                    }
                    ?>
                </select>
                <input type="number" step="1" name="waga">
                <button name="submit">Zamów</button>
            </form>
            <?php
            // Skrypt 3
            if (isset($_POST['submit']) && !empty($_POST['waga'])) {
                $idTowaru = $_POST['towar'];
                $waga = $_POST['waga'];
                $zapytanie3 = "SELECT rodzaj, nazwa, cena FROM towar WHERE id = $idTowaru;";
                $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                $wiersz = mysqli_fetch_array($wynik3);
                $wartosc = $waga * $wiersz['cena'];
                echo "<p>{$wiersz['rodzaj']} {$wiersz['nazwa']} wartość: $wartosc zł</p>";
                $zapytanie4 = "INSERT INTO zamowienie VALUES (NULL, $idTowaru, 2, $waga);";
                mysqli_query($polaczenie, $zapytanie4);
            }
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę opracował: Chr1skyy</p>
    </footer>
    <?php mysqli_close($polaczenie); ?>
</body>

</html>