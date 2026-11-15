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
                // Skrypt 1
                $polaczenie = mysqli_connect('localhost', 'root', '', 'piekarnia');
                $zapytanie2 = "SELECT DISTINCT Rodzaj FROM wyroby ORDER BY Rodzaj DESC;";
                $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                while ($wiersz = mysqli_fetch_array($wynik2)) {
                    echo "<option>{$wiersz['Rodzaj']}</option>";
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
            // Skrypt 2
            if (isset($_POST["submit"])) {
                $rodzaj = $_POST["rodzaj"];
                $zapytanie1 = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj = '$rodzaj';";
                $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                while ($wiersz = mysqli_fetch_array($wynik1)) {
                    echo "<tr>
                            <td>{$wiersz['Rodzaj']}</td>
                            <td>{$wiersz['Nazwa']}</td>
                            <td>{$wiersz['Gramatura']}</td>
                            <td>{$wiersz['Cena']}</td>
                        </tr>";
                }
            }
            mysqli_close($polaczenie);
            ?>
        </table>
    </main>
    <footer>
        <p>AUTOR Chr1skyy</p>
        <p>Data: 16.01.2025 r.</p>
    </footer>
</body>

</html>