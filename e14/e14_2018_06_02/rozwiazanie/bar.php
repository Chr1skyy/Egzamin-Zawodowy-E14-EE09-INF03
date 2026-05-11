<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Bar Smaczne Jadło</title>
    <link rel="stylesheet" href="styl2.css">
</head>

<body>
    <header>
        <h2>Bar Smaczne Jadło zaprasza serdecznie</h2>
    </header>
    <main>
        <div id="container-row">
            <section id="lewy">
                <h2>Przykładowe menu</h2>
                <table>
                    <tr>
                        <td>Zupa Gazpacho</td>
                        <td>cena: 20 zł</td>
                    </tr>
                    <tr>
                        <td>Kurczak pieczony</td>
                        <td>cena: 40 zł</td>
                    </tr>
                </table>

            </section>
            <section id="prawy">
                <img src="menu.jpg" alt="Smaczne">
            </section>
        </div>
        <section id="dol">
            <h3>Chcesz z nami pracować?</h3>
            <form method="post" action="bar.php">
                <label for="imie">Imię:</label>
                <input type="text" name="imie" id="imie">
                <br>
                <label for="nazwisko">Nazwisko:</label>
                <input type="text" name="nazwisko" id="nazwisko">
                <br>
                <label for="stanowisko">Stanowisko:</label>
                <input type="number" name="stanowisko" id="stanowisko">(1 – kucharz, 2 – pomoc, 3 –
                kelner, 4 – barman)
                <br>
                <button name="reset" value="WYCZYŚĆ">WYCZYŚĆ</button>
                <button name="submit">REKRUTUJ</button>
            </form>
            <?php
            $connect = mysqli_connect('localhost', 'root', '', 'baza');
            if (isset($_POST["submit"])) {
                $imie = $_POST["imie"];
                $nazwisko = $_POST["nazwisko"];
                $stanowisko = $_POST["stanowisko"];
                $query = "INSERT INTO pracownicy VALUES (NULL, '$imie', '$nazwisko', $stanowisko);";
                mysqli_query($connect, $query);
                echo "Dodano dane rekrutacyjne do bazy";
            }
            ?>
        </section>
    </main>
    <footer>Stronę internetową opracował: <b>Chr1skyy</b></footer>
    <?php mysqli_close($connect); ?>
</body>

</html>