<?php
// zmiany w bazie są wykonywane przed wypisaniem strony, żeby tabela od razu pokazywała aktualne zadania
$polaczenie = mysqli_connect("localhost", "root", "", "przewozy");
// Skrypt 1: odnośnik Usuń
if (isset($_GET["id_zadania"])) {
    $idZadania = $_GET["id_zadania"];
    $zapytanie3 = "DELETE FROM zadania WHERE id_zadania = $idZadania;";
    mysqli_query($polaczenie, $zapytanie3);
}
// Skrypt 2
if (isset($_POST["submit"])) {
    $zadanie = $_POST["zadanie"];
    $data = $_POST["data"];
    if (!empty($zadanie) && !empty($data)) {
        $zapytanie2 = "INSERT INTO zadania VALUES (NULL, '$zadanie', '$data', 1);";
        mysqli_query($polaczenie, $zapytanie2);
    }
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Firma Przewozowa</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Firma przewozowa Półdarmo</h1>
    </header>
    <nav>
        <a href="kw1.png">kwerenda1</a>
        <a href="kw2.png">kwerenda2</a>
        <a href="kw3.png">kwerenda3</a>
        <a href="kw4.png">kwerenda4</a>
    </nav>
    <main>
        <section id="lewa">
            <h2>Zadania do wykonania</h2>
            <table>
                <tr>
                    <th>Zadanie do wykonania</th>
                    <th>Data realizacji</th>
                    <th>Akcja</th>
                </tr>
                <?php
                // Skrypt 1
                $zapytanie1 = "SELECT id_zadania, zadanie, data FROM zadania;";
                $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                while ($wiersz = mysqli_fetch_array($wynik1)) {
                    echo "<tr>
                            <td>{$wiersz['zadanie']}</td>
                            <td>{$wiersz['data']}</td>
                            <td><a href='przewozy.php?id_zadania={$wiersz['id_zadania']}'>Usuń</a></td>
                        </tr>";
                }
                ?>
            </table>
            <form action="przewozy.php" method="POST">
                <label>
                    Zadanie do wykonania: <input type="text" name="zadanie">
                </label>
                <br>
                <label>
                    Data realizacji: <input type="date" name="data">
                </label>
                <br>
                <button name="submit">Dodaj</button>
            </form>
            <?php mysqli_close($polaczenie); ?>
        </section>
        <section id="prawa">
            <img src="auto.png" alt="auto firmowe">
            <h3>Nasza specjalność</h3>
            <ul>
                <li>Przeprowadzki</li>
                <li>Przewóz mebli</li>
                <li>Przesyłki gabarytowe</li>
                <li>Wynajem pojazdów</li>
                <li>Zakupy towarów</li>
            </ul>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>