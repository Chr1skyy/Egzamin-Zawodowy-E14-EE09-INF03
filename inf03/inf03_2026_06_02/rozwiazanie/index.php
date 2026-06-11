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
            $connect = mysqli_connect('localhost', 'root', '', 'wodospady');
            $query1 = "SELECT idKontynent, nazwa FROM kontynenty";
            $result = mysqli_query($connect, $query1);
            while ($row = mysqli_fetch_array($result)) {
                echo "<a href='index.php?idKontynent={$row['idKontynent']}'> {$row['nazwa']}</a>";
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
                if(isset($_GET['idKontynent'])) {
                    $idKontynent = $_GET['idKontynent'];
                    $query3 = "SELECT idObiekt, panstwo, nazwa, wysokosc WHERE idKontynent = $idKontynent";
                    $result = mysqli_query($connect, $query3);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>
                                <td>{$row['idObiekt']}</td>
                                <td>{$row['panstwo']}</td>
                                <td>{$row['nazwa']}</td>
                                <td>{$row['wysokosc']}</td>
                            </tr>";
                    }
                }
                ?>
            </table>
            <h4>Wpisz osiągniecie do bazy</h4>
            <form action="index.php" method="post">
                <label for="idWodospad">identyfikator wodospadu</label>
                <input type="number" name="identyfikator" id="identyfikator">
                <label for="turysta">turysta</label>
                <select name="turysta" id="turysta">
                    <?php
                    $query5 = "SELECT idTurysta, nick FROM turysci";
                    $result = mysqli_query($connect, $query5);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='{$row['idTurysta']}'>{$row['nick']}</option>";
                    }
                    ?>
                </select>
                <button name="submit">Wpisz</button>
            </form>
            <?php
            if (isset($_POST['submit'])) {
                $idWodospad = $_POST['identyfikator'];
                $idTurysta = $_POST['turysta'];
                $query4 = "INSERT INTO osiagnienia VALUES (NULL, $idWodospad, $idTurysta);";
                mysqli_query($connect, $query4);
            }
            ?>
        </section>
    </main>
    <article>
        <h3>Wodospady w Polsce</h3>
    </article>
    <footer>
        <p>Autor: Chr1skyy</p>
    </footer>
    <?php mysqli_close($connect); ?>
</body>

</html>