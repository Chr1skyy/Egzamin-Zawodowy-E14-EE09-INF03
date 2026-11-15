<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Szkolenia i kursy</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>SZKOLENIA</h1>
    </header>
    <main>
        <section id="lewa">
            <table>
                <tr>
                    <th>Kurs</th>
                    <th>Nazwa</th>
                    <th>Cena</th>
                </tr>
                <?php
                // Skrypt 1
                $polaczenie = mysqli_connect("localhost", "root", "", "szkolenia");
                $zapytanie1 = "SELECT kod, nazwa, cena FROM kursy ORDER BY cena ASC;";
                $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                while ($wiersz = mysqli_fetch_array($wynik1)) {
                    echo "<tr>
                            <td><img src='img/{$wiersz['kod']}.jpg' alt='kurs'></td>
                            <td>{$wiersz['nazwa']}</td>
                            <td>{$wiersz['cena']}</td>
                        </tr>";
                }
                ?>
            </table>
        </section>
        <section id="prawa">
            <h2>Zapisy na kursy</h2>
            <form action="index.php" method="POST">
                <label for="imie">Imię</label>
                <br>
                <input type="text" id="imie" name="imie">
                <br>
                <label for="nazwisko">Nazwisko</label>
                <br>
                <input type="text" id="nazwisko" name="nazwisko">
                <br>
                <label for="wiek">Wiek</label>
                <br>
                <input type="number" id="wiek" name="wiek">
                <br>
                <label for="rodzajKursu">Rodzaj kursu</label>
                <br>
                <select id="rodzajKursu" name="rodzajKursu">
                    <?php
                    // Skrypt 2
                    $zapytanie2 = "SELECT nazwa FROM kursy;";
                    $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                    while ($wiersz = mysqli_fetch_array($wynik2)) {
                        echo "<option value='{$wiersz['nazwa']}'>{$wiersz['nazwa']}</option>";
                    }
                    ?>
                </select>
                <button name="submit">Dodaj dane</button>
            </form>
            <?php
            // Skrypt 3
            if (isset($_POST["submit"])) {
                if (!empty($_POST["imie"]) && !empty($_POST["nazwisko"]) && !empty($_POST["wiek"])) {
                    $imie = $_POST["imie"];
                    $nazwisko = $_POST["nazwisko"];
                    $wiek = $_POST["wiek"];
                    $zapytanie3 = "INSERT INTO uczestnicy VALUES (NULL, '$imie', '$nazwisko', $wiek);";
                    mysqli_query($polaczenie, $zapytanie3);
                    echo "<p>Dane uczestnika $imie $nazwisko zostały dodane</p>";
                } else {
                    echo "<p>Wprowadź wszystkie dane</p>";
                }
            }
            mysqli_close($polaczenie);
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>