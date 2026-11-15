<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Sprzedaż antyków</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Najlepsze antyki w mieście</h1>
    </header>
    <main>
        <section>
            <h2>- Sofy -</h2>
            <?php
            // Skrypt 1a
            $polaczenie = mysqli_connect('localhost', 'root', '', 'antyki');
            $zapytanie1 = "SELECT idMeble, nazwa, plik, styl, cena, opis FROM meble WHERE kategoria = 1;";
            $wynik1 = mysqli_query($polaczenie, $zapytanie1);
            while ($wiersz = mysqli_fetch_array($wynik1)) {
                echo "<div class='mebel'>
                        <div class='obraz'>
                            <img src='img/sofy/{$wiersz['plik']}' alt='mebel'>
                        </div>
                        <div class='informacje'>
                            <h3>{$wiersz['nazwa']}</h3>
                            <h4>styl {$wiersz['styl']}</h4>
                            <h3>CENA: {$wiersz['cena']} zł</h3>
                            <form action='index.php' method='post'>
                            <button type='submit' name='submit' value='{$wiersz['idMeble']}'>KUP</button>
                            </form>
                        </div>
                        <div class='opis'>
                            {$wiersz['opis']}
                        </div>
                    </div>";
            }
            ?>
            <h2>- Fotele -</h2>
            <?php
            // Skrypt 1b
            $zapytanie1 = "SELECT idMeble, nazwa, plik, styl, cena, opis FROM meble WHERE kategoria = 2;";
            $wynik1 = mysqli_query($polaczenie, $zapytanie1);
            while ($wiersz = mysqli_fetch_array($wynik1)) {
                echo "<div class='mebel'>
                        <div class='obraz'>
                            <img src='img/fotele/{$wiersz['plik']}' alt='mebel'>
                        </div>
                        <div class='informacje'>
                            <h3>{$wiersz['nazwa']}</h3>
                            <h4>styl {$wiersz['styl']}</h4>
                            <h3>CENA: {$wiersz['cena']} zł</h3>
                            <form action='index.php' method='post'>
                            <button type='submit' name='submit' value='{$wiersz['idMeble']}'>KUP</button>
                            </form>
                        </div>
                        <div class='opis'>
                            {$wiersz['opis']}
                        </div>
                    </div>";
            }
            ?>
            <h2>- Komody -</h2>
            <?php
            // Skrypt 1c
            $zapytanie1 = "SELECT idMeble, nazwa, plik, styl, cena, opis FROM meble WHERE kategoria = 3;";
            $wynik1 = mysqli_query($polaczenie, $zapytanie1);
            while ($wiersz = mysqli_fetch_array($wynik1)) {
                echo "<div class='mebel'>
                        <div class='obraz'>
                            <img src='img/komody/{$wiersz['plik']}' alt='mebel'>
                        </div>
                        <div class='informacje'>
                            <h3>{$wiersz['nazwa']}</h3>
                            <h4>styl {$wiersz['styl']}</h4>
                            <h3>CENA: {$wiersz['cena']} zł</h3>
                            <form action='index.php' method='post'>
                            <button type='submit' name='submit' value='{$wiersz['idMeble']}'>KUP</button>
                            </form>
                        </div>
                        <div class='opis'>
                            {$wiersz['opis']}
                        </div>
                    </div>";
            }
            ?>
            <?php
            // Skrypt 2
            if (isset($_POST['submit'])) {
                $idMebla = $_POST['submit'];
                $zapytanie2 = "INSERT INTO zakupy VALUES (NULL, 1, $idMebla, 1);";
                mysqli_query($polaczenie, $zapytanie2);
            }
            ?>
        </section>
        <aside>
            <h2>Kontakt</h2>
            <p>Zalogowano: Anna Kowalska</p>
            <?php
            // Skrypt 3
            $zapytanie3 = "SELECT nazwa, cena FROM meble JOIN zakupy USING (idMeble) WHERE idKlienci = 1;";
            $wynik3 = mysqli_query($polaczenie, $zapytanie3);
            $kosztKoszyka = 0;
            echo "<ol>";
            while ($wiersz = mysqli_fetch_array($wynik3)) {
                $kosztKoszyka = $kosztKoszyka + $wiersz['cena'];
                echo "<li>{$wiersz['nazwa']}, cena: {$wiersz['cena']}</li>";
            }
            echo "</ol>";
            echo "Koszt całkowity: $kosztKoszyka";
            ?>
        </aside>
    </main>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
    <?php mysqli_close($polaczenie); ?>
</body>

</html>