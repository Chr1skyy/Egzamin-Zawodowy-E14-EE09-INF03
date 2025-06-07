<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>PIEKARNIA</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <img src="wypieki.png" alt="Produkty naszej piekarni">
    <nav>
        <a href="kw1.png">KWERENDA1</a>
        <a href="kw2.png">KWERENDA2</a>
        <a href="kw3.png">KWERENDA3</a>
        <a href="kw4.png">KWERENDA4</a>
    </nav>
    <header>
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie
            wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren
            pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
    </header>
    <main>
        <h4>Wybierz rodzaj wypieków</h4>
        <form method="POST">
            <select name="rodzaj">
                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'piekarnia');
                $query = "SELECT DISTINCT Rodzaj FROM wyroby ORDER BY Rodzaj DESC;";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option>{$row['Rodzaj']}</option>";
                }
                ?>
            </select>
            <button name="submit">Wybierz</button>
        </form>
        <table>
            <tr>
                <th>Rodzaj</th>
                <th>Nazwa</th>
                <th>Gramatura</th>
                <th>Cena</th>
            </tr>
            <?php
            if (isset($_POST["submit"])) {
                $rodzaj = $_POST["rodzaj"];
                $query = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj = '$rodzaj';";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>
                            <td>{$row[0]}</td>
                            <td>{$row[1]}</td>
                            <td>{$row[2]}</td>
                            <td>{$row[3]}</td>
                        </tr>";
                }
            }
            mysqli_close($connect);
            ?>
        </table>
    </main>
    <footer>
        <p>AUTOR Chr1skyy</p>
        <p>Data: 16.01.2025 r.</p>
    </footer>
</body>

</html>