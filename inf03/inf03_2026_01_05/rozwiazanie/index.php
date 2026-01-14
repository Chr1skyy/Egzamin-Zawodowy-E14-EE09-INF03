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
            if(isset($_POST['status'])) {
                $status = $_POST['status'];
            } else {
                $status = 'policjant';
            }
            ?>
            <form action="index.php" method="POST">
                <input type="radio" name="status" value="policjant" id="policjant" <?php echo ($status == 'policjant') ? 'checked' : ''; ?>>
                <label for="policjant">Policjant</label>
                <input type="radio" name="status" value="ratownik" id="ratownik" <?php echo ($status == 'ratownik') ? 'checked' : ''; ?>>
                <label for="ratownik">Ratownik</label>
                <button>Pokaż</button>
            </form>
            <?php
            echo "<h3>Wybrano opcję: $status</h3>";
            ?>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Imie</th>
                    <th>Nazwisko</th>
                </tr>
                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'zgloszenia');
                $query1 = "SELECT id, imie, nazwisko FROM personel WHERE status = '$status'";
                $result = mysqli_query($connect, $query1);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['imie']}</td>
                            <td>{$row['nazwisko']}</td>
                          </tr>";
                }
                ?>
            </table>
        </section>
        <section id="right">
            <h2>Nowe zgłoszenia</h2>
            <ol>
                <?php
                $query3 = "SELECT personel.id, personel.nazwisko FROM personel LEFT JOIN rejestr ON personel.id = rejestr.id_personel WHERE id_personel IS NULL";
                $result = mysqli_query($connect, $query3);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<li>{$row['id']} {$row['nazwisko']}</li>";
                }
                ?>
            </ol>
            <form action="index.php" method="POST">
                <label for="id_personel">Wybierz id osoby z listy:</label>
                <input type="number" name="id_personel" id="id_personel">
                <button name="submit">Dodaj zgłoszenie</button>
            </form>
            <?php
            if (isset($_POST['submit'])) {
                $id_personel = $_POST['id_personel'];
                $query4 = "INSERT INTO rejestr VALUES (NULL, CURDATE(), $id_personel, 14)";
                mysqli_query($connect, $query4);
            }
            mysqli_close($connect);
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>