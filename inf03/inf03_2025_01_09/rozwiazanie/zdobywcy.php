<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>ZDOBYWCY GÓR</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Klub zdobywców gór polskich</h1>
    </header>
    <nav>
        <a href="kw1.PNG">kwerenda1</a>
        <a href="kw2.PNG">kwerenda2</a>
        <a href="kw3.PNG">kwerenda3</a>
        <a href="kw4.PNG">kwerenda4</a>
    </nav>
    <main>
        <section id="lewy">
            <img src="logo.png" alt="logo zdobywcy">
            <h3>razem z nami:</h3>
            <ul>
                <li>wyjazdy</li>
                <li>szkolenia</li>
                <li>reakcja</li>
                <li>wypocznyek</li>
                <li>wyzwania</li>
            </ul>
        </section>
        <section id="prawy">
            <h2>Dołącz do naszego zespołu</h2>
            <p>Wpisz swoje dane do formularza</p>
            <form method="POST" action="zdobywcy.php">
                <label for="nazwisko">Nazwisko:</label>
                <input type="text" name="nazwisko" id="nazwisko">
                <label for="imie">Imie:</label>
                <input type="text" name="imie" id="imie">
                <label for="funkcja">Funkcja:</label>
                <select name="funkcja" id="funkcja">
                    <option value="uczestnik">uczestnik</option>
                    <option value="przewodnik">przewodnik</option>
                    <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
                    <option value="organizator">organizator</option>
                    <option value="ratownik">ratownik</option>
                </select>
                <label>
                    Email:<input type="email" name="email">
                </label>
                <button name="submit">Dodaj</button>
                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'zdobywcy');
                if (isset($_POST["submit"]) && !empty($_POST["nazwisko"]) && !empty($_POST["imie"]) && !empty($_POST["funkcja"]) && !empty($_POST["email"])) {
                    $nazwisko = $_POST["nazwisko"];
                    $imie = $_POST["imie"];
                    $funkcja = $_POST["funkcja"];
                    $email = $_POST["email"];
                    $query = "INSERT INTO osoby VALUES (NULL, '$nazwisko', '$imie', '$funkcja', '$email');";
                    mysqli_query($connect, $query);
                }
                ?>
                <table>
                    <tr>
                        <th>Nazwisko</th>
                        <th>Imię</th>
                        <th>Funkcja</th>
                        <th>Email</th>
                    </tr>
                    <?php
                    $query = "SELECT nazwisko, imie, funkcja, email FROM osoby;";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>
                        <td>{$row['nazwisko']}</td>
                        <td>{$row['imie']}</td>
                        <td>{$row['funkcja']}</td>
                        <td>{$row['email']}</td>
                    </tr>";
                    }
                    mysqli_close($connect);
                    ?>
                </table>
            </form>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>