<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wyszukiwarka miast</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/fav.png">
</head>

<body>
    <section id="kontener">
        <header>
            <img src="img/baner.jpg" alt="Polska" />
        </header>
        <main>
            <section id="lewy">
                <section id="lewyGora">
                    <h4>Podaj początek nazwy miasta</h4>
                    <form method="POST" action="index.php">
                        <input type="text" name="filtr">
                        <button name="submit">Szukaj</button>
                    </form>
                </section>
                <section id="lewyDol">
                    <p>Egzamin INF.03</p>
                    <p>Autor: Chr1skyy</p>
                </section>
            </section>
            <section id="prawy">
                <h1>Wyniki wyszukiwania miast z uwzględnieniem filtra:</h1>
                <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'wykaz');
                if (isset($_POST["submit"])) {
                    $filtr = $_POST["filtr"];
                    echo "<p>$filtr</p>";
                    echo "<table>
                                <tr>
                                    <th>Miasto</th>
                                    <th>Województwo</th>
                                </tr>";
                    $zapytanie = "SELECT miasta.nazwa, wojewodztwa.nazwa FROM miasta JOIN wojewodztwa ON miasta.id_wojewodztwa = wojewodztwa.id WHERE miasta.nazwa LIKE '$filtr%' ORDER BY miasta.nazwa;";
                    $wynik = mysqli_query($polaczenie, $zapytanie);
                    while ($wiersz = mysqli_fetch_array($wynik)) {
                        echo "<tr>
                            <td>{$wiersz[0]}</td>
                            <td>{$wiersz[1]}</td>
                        </tr>";
                    }
                    echo "</table>";
                }
                mysqli_close($polaczenie);
                ?>
            </section>
        </main>
    </section>
</body>

</html>