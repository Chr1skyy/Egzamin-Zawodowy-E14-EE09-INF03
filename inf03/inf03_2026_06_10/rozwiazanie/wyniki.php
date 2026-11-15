<?php
// Skrypt 2
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
                // Skrypt 3
                $polaczenie = mysqli_connect('localhost', 'root', '', 'laboratorium');
                $zapytanie4 = "SELECT imie, nazwisko, pesel, Zlecenie.data, Wynik.data, plik FROM Pacjent JOIN Zlecenie ON Zlecenie.idPacjenta = Pacjent.id LEFT JOIN Wynik ON Zlecenie.id = Wynik.idZlecenia;";
                $wynik4 = mysqli_query($polaczenie, $zapytanie4);
                while ($wiersz = mysqli_fetch_array($wynik4)) {
                    $odnosnik = '';
                    if (!empty($wiersz['plik'])) {
                        $odnosnik = "<a href='files/{$wiersz['plik']}' target='_blank'>wynik</a>";
                    }
                    echo "<tr>
                            <td>{$wiersz['imie']}</td>
                            <td>{$wiersz['nazwisko']}</td>
                            <td>{$wiersz['pesel']}</td>
                            <td>{$wiersz[3]}</td>
                            <td>{$wiersz[4]}</td>
                            <td>$odnosnik</td>
                        </tr>";
                }
                mysqli_close($polaczenie);
                ?>
            </table>
        </div>
    </main>
    <footer>Wykonał: Chr1skyy</footer>
</body>

</html>