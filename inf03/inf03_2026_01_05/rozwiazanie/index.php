<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>ZGŁOSZENIA</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Zgłoszenia wydarzeń</h1>
    </header>
    <main>
        <section id="left">
            <h2>Personel</h2>
            <?php
            $status = 'policjant';
            if (isset($_POST['status'])) {
                $status = $_POST['status'];
            }
            ?>
            <form action="index.php" method="POST">
                <input type="radio" name="status" value="policjant" id="policjant" <?php if ($status == 'policjant') { echo 'checked'; } ?>>
                <label for="policjant">Policjant</label>
                <input type="radio" name="status" value="ratownik" id="ratownik" <?php if ($status == 'ratownik') { echo 'checked'; } ?>>
                <label for="ratownik">Ratownik</label>
                <button>Pokaż</button>
            </form>
            <?php
            echo "<h3>Wybrano opcję: $status</h3>";
            ?>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                </tr>
                <?php
                // Skrypt 1
                $polaczenie = mysqli_connect('localhost', 'root', '', 'zgloszenia');
                $zapytanie1 = "SELECT id, imie, nazwisko FROM personel WHERE status = '$status'";
                $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                while ($wiersz = mysqli_fetch_array($wynik1)) {
                    echo "<tr>
                            <td>{$wiersz['id']}</td>
                            <td>{$wiersz['imie']}</td>
                            <td>{$wiersz['nazwisko']}</td>
                          </tr>";
                }
                ?>
            </table>
        </section>
        <section id="right">
            <h2>Nowe zgłoszenie</h2>
            <ol>
                <?php
                // Skrypt 2
                $zapytanie3 = "SELECT personel.id, personel.nazwisko FROM personel LEFT JOIN rejestr ON personel.id = rejestr.id_personel WHERE id_personel IS NULL";
                $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                while ($wiersz = mysqli_fetch_array($wynik3)) {
                    echo "<li>{$wiersz['id']} {$wiersz['nazwisko']}</li>";
                }
                ?>
            </ol>
            <form action="index.php" method="POST">
                <label for="id_personel">Wybierz id osoby z listy:</label>
                <input type="number" name="id_personel" id="id_personel">
                <button name="submit">Dodaj zgłoszenie</button>
            </form>
            <?php
            // Skrypt 3
            if (isset($_POST['submit'])) {
                $idPersonelu = $_POST['id_personel'];
                $zapytanie4 = "INSERT INTO rejestr VALUES (NULL, CURDATE(), $idPersonelu, 14)";
                mysqli_query($polaczenie, $zapytanie4);
            }
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
    <?php mysqli_close($polaczenie); ?>
</body>

</html>