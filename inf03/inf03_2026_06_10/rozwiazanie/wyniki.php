<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Przeglądaj wyniki</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Portal laboratorium</h1>
        <p>
            <?php
            echo "Witaj, <strong>{$_SESSION['username']}</strong>";
            ?>
        </p>
        <p><a href="wyloguj.php">Wyloguj</a></p>
    </header>
    <main>
        <h2>Wyniki pacjentów</h2>
        <div>
            <table>
                <tr>
                    <th>Imię pacjenta</th>
                    <th>Nazwisko pacjenta</th>
                    <th>PESEL</th>
                    <th>Data zlecenia</th>
                    <th>Data wykonania</th>
                    <th>Wynik</th>
                </tr>
                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'laboratorium');
                $query4 = "SELECT imie, nazwisko, pesel, Zlecenie.data, Wynik.data, plik FROM Pacjent JOIN Zlecenie ON Zlecenie.idPacjenta = Pacjent.id LEFT JOIN Wynik ON Zlecenie.id = Wynik.idZlecenia;";
                $result = mysqli_query($connect, $query4);
                while ($row = mysqli_fetch_array($result)) {
                    $wynik = '';
                    if (!empty($row['plik'])) {
                        $wynik = "<a href='{$row['plik']}' target='_blank'>wynik</a>";
                    }
                    echo "<tr>
                            <td>{$row['imie']}</td>
                            <td>{$row['nazwisko']}</td>
                            <td>{$row['pesel']}</td>
                            <td>{$row[3]}</td>
                            <td>{$row[4]}</td>
                            <td>$wynik</td>
                        </tr>";
                }
                ?>
            </table>
        </div>
    </main>
    <footer>Wykonał: Chr1skyy</footer>
</body>

</html>