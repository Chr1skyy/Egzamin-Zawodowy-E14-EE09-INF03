<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <?php
        // Skrypt 1
        for ($i = 0; $i < 20; $i++) {
            echo "<img src='obraz.png'>";
        }
        ?>
    </header>
    <div id="container">
        <section id="sekcjaPierwsza">
            <h2>Liryka</h2>
            <form action="biblioteka.php" method="POST">
                <select name="liryka">
                    <?php
                    // Skrypt 2, liryka
                    $polaczenie = mysqli_connect("localhost", "root", "", "biblioteka");
                    $zapytanie1 = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'liryka';";
                    $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                    while ($wiersz = mysqli_fetch_array($wynik1)) {
                        echo "<option value='{$wiersz['id']}'>{$wiersz['tytul']}</option>";
                    }
                    ?>
                </select>
                <button name="rezerwujLiryka">Rezerwuj</button>
            </form>
            <?php
            // Skrypt 3, liryka
            if (isset($_POST["rezerwujLiryka"])) {
                $id = $_POST["liryka"];
                $zapytanie5 = "SELECT tytul FROM ksiazka WHERE id = $id;";
                $wynik5 = mysqli_query($polaczenie, $zapytanie5);
                $wiersz = mysqli_fetch_array($wynik5);
                echo "<p>Książka {$wiersz['tytul']} została zarezerwowana</p>";
                $zapytanie4 = "UPDATE ksiazka SET rezerwacja = 1 WHERE id = $id;";
                mysqli_query($polaczenie, $zapytanie4);
            }
            ?>
        </section>
        <section id="sekcjaDruga">
            <h2>Epika</h2>
            <form action="biblioteka.php" method="POST">
                <select name="epika">
                    <?php
                    // Skrypt 2, epika
                    $zapytanie1 = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'epika';";
                    $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                    while ($wiersz = mysqli_fetch_array($wynik1)) {
                        echo "<option value='{$wiersz['id']}'>{$wiersz['tytul']}</option>";
                    }
                    ?>
                </select>
                <button name="rezerwujEpika">Rezerwuj</button>
            </form>
            <?php
            // Skrypt 3, epika
            if (isset($_POST["rezerwujEpika"])) {
                $id = $_POST["epika"];
                $zapytanie5 = "SELECT tytul FROM ksiazka WHERE id = $id;";
                $wynik5 = mysqli_query($polaczenie, $zapytanie5);
                $wiersz = mysqli_fetch_array($wynik5);
                echo "<p>Książka {$wiersz['tytul']} została zarezerwowana</p>";
                $zapytanie4 = "UPDATE ksiazka SET rezerwacja = 1 WHERE id = $id;";
                mysqli_query($polaczenie, $zapytanie4);
            }
            ?>
        </section>
        <section id="sekcjaTrzecia">
            <h2>Dramat</h2>
            <form action="biblioteka.php" method="POST">
                <select name="dramat">
                    <?php
                    // Skrypt 2, dramat
                    $zapytanie1 = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'dramat';";
                    $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                    while ($wiersz = mysqli_fetch_array($wynik1)) {
                        echo "<option value='{$wiersz['id']}'>{$wiersz['tytul']}</option>";
                    }
                    ?>
                </select>
                <button name="rezerwujDramat">Rezerwuj</button>
            </form>
            <?php
            // Skrypt 3, dramat
            if (isset($_POST["rezerwujDramat"])) {
                $id = $_POST["dramat"];
                $zapytanie5 = "SELECT tytul FROM ksiazka WHERE id = $id;";
                $wynik5 = mysqli_query($polaczenie, $zapytanie5);
                $wiersz = mysqli_fetch_array($wynik5);
                echo "<p>Książka {$wiersz['tytul']} została zarezerwowana</p>";
                $zapytanie4 = "UPDATE ksiazka SET rezerwacja = 1 WHERE id = $id;";
                mysqli_query($polaczenie, $zapytanie4);
            }
            ?>
        </section>
        <section id="sekcjaCzwarta">
            <h2>Zaległe książki</h2>
            <ul>
                <?php
                // Skrypt 4
                $zapytanie2 = "SELECT tytul, id_cz, data_odd FROM ksiazka JOIN wypozyczenia ON ksiazka.id = wypozyczenia.id_ks ORDER BY data_odd ASC LIMIT 15;";
                $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                while ($wiersz = mysqli_fetch_array($wynik2)) {
                    echo "<li>{$wiersz['tytul']} {$wiersz['id_cz']} {$wiersz['data_odd']}</li>";
                }
                mysqli_close($polaczenie);
                ?>
            </ul>
        </section>
    </div>
    <footer>
        <p><strong>Autor: Chr1skyy</strong></p>
    </footer>
</body>

</html>