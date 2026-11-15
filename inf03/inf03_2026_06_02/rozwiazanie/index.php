<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wodospady</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h2>Łowcy wodospadów</h2>
    </header>
    <main>
        <aside>
            <?php
            // Skrypt 1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'wodospady');
            $zapytanie1 = "SELECT idKontynent, nazwa FROM kontynenty;";
            $wynik1 = mysqli_query($polaczenie, $zapytanie1);
            while ($wiersz = mysqli_fetch_array($wynik1)) {
                echo "<a href='index.php?idKontynent={$wiersz['idKontynent']}'> {$wiersz['nazwa']}</a>";
            }
            ?>
        </aside>
        <section>
            <table>
                <tr>
                    <th>Identyfikator</th>
                    <th>Państwo</th>
                    <th>Nazwa wodospadu</th>
                    <th>Wysokość</th>
                </tr>
                <?php
                // Skrypt 2
                $idKontynent = 6;
                if (isset($_GET['idKontynent'])) {
                    $idKontynent = $_GET['idKontynent'];
                }
                $zapytanie3 = "SELECT idObiekt, panstwo, nazwa, wartoscCechy FROM obiekty WHERE idRodzaj = 10 AND idKontynent = $idKontynent;";
                $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                while ($wiersz = mysqli_fetch_array($wynik3)) {
                    echo "<tr>
                            <td>{$wiersz['idObiekt']}</td>
                            <td>{$wiersz['panstwo']}</td>
                            <td>{$wiersz['nazwa']}</td>
                            <td>{$wiersz['wartoscCechy']}</td>
                        </tr>";
                }
                ?>
            </table>
            <h4>Wpisz osiągnięcie do bazy</h4>
            <form action="index.php" method="post">
                <label for="idWodospad">identyfikator wodospadu</label>
                <input type="number" name="identyfikator" id="identyfikator">
                <label for="turysta">turysta</label>
                <select name="turysta" id="turysta">
                    <?php
                    // Skrypt 3
                    $zapytanie5 = "SELECT idTurysta, nick FROM turysci";
                    $wynik5 = mysqli_query($polaczenie, $zapytanie5);
                    while ($wiersz = mysqli_fetch_array($wynik5)) {
                        echo "<option value='{$wiersz['idTurysta']}'>{$wiersz['nick']}</option>";
                    }
                    ?>
                </select>
                <button name="submit">Wpisz</button>
            </form>
            <?php
            // Skrypt 4
            if (isset($_POST['submit'])) {
                $idWodospad = $_POST['identyfikator'];
                $idTurysta = $_POST['turysta'];
                $zapytanie4 = "INSERT INTO osiagniecia VALUES (NULL, $idWodospad, $idTurysta);";
                mysqli_query($polaczenie, $zapytanie4);
            }
            ?>
        </section>
    </main>
    <article>
        <h3>Wodospady w Polsce</h3>
        <img src="img/kamienczyk.jpg" alt="wodospad">
        <img src="img/siklawica.jpg" alt="wodospad">
        <img src="img/siklawa.jpg" alt="wodospad">
        <img src="img/wilczki.jpg" alt="wodospad">
    </article>
    <footer>
        <p>Autor: Chr1skyy</p>
    </footer>
    <?php mysqli_close($polaczenie); ?>
</body>

</html>