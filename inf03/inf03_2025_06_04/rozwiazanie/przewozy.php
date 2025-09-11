<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Firma przewozowa</title>
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
                $connect = mysqli_connect("localhost", "root", "", "przewozy");
                $query = "SELECT id_zadania, zadanie, data FROM zadania;";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>
                            <td>{$row['zadanie']}</td>
                            <td>{$row['data']}</td>
                            <td><a href='przewozy.php?id_zadania={$row['id_zadania']}'>Usuń</a></td>
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
            <?php
            if (isset($_GET["id_zadania"])) {
                $id_zadania = $_GET["id_zadania"];
                $query = "DELETE FROM zadania WHERE id_zadania = $id_zadania;";
                mysqli_query($connect, $query);
                header("location: przewozy.php");
            }
            if (isset($_POST["submit"])) {
                $zadanie = $_POST["zadanie"];
                $data = $_POST["data"];
                $query = "INSERT INTO zadania VALUES (NULL, '$zadanie', '$data', 1);";
                mysqli_query($connect, $query);
                header("location: przewozy.php");
            }
            mysqli_close($connect);
            ?>
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