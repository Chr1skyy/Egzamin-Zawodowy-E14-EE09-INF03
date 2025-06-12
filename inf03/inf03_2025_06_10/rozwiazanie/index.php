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
                // $connect = mysqli_connect("localhost", "root", "", "szkolenia");
                // $query = "SELECT kod, nazwa, cena FROM kursy ORDER BY cena ASC;";
                // $result = mysqli_query($connect, $query);
                // while ($row = mysqli_fetch_array($result)) {
                //     echo "<tr>
                //             <td><img src='{$row['kod']}.jpg' alt='kurs'</td>
                //             <td>{$row['nazwa']}</td>
                //             <td>{$row['cena']}</td>
                //         </tr>";
                // }
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
                    // $query = "SELECT nazwa FROM kursy;";
                    // $result = mysqli_query($connect, $query);
                    // while ($row = mysqli_fetch_array($result)) {
                    //     echo "<option value='{$row['nazwa']}>{$row['nazwa']}</option>";
                    // }
                    ?>
                </select>
                <button name="submit">Dodaj dane</button>
            </form>
            <?php
            if (isset($_POST["submit"])) {
                if (!empty($_POST["imie"]) && !empty($_POST["nazwisko"]) && !empty($_POST["wiek"])) {
                    $imie = $_POST["imie"];
                    $nazwisko = $_POST["nazwisko"];
                    $wiek = $_POST["wiek"];
                    $query = "INSERT INTO uczestnicy VALUES (NULL, '$imie', '$nazwisko', $wiek);";
                    mysqli_query($connect, $query);
                    echo "<p>Dane uczestnika $imie $nazwisko zostały dodane<p>";
                }
                echo "<p>Wprowadź wszystkie dane<p>";
            }
            // mysqli_close($connect);
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>