<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Mieszalnia farb</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="fav.png">
</head>

<body>
    <header>
        <img src="baner.png" alt="Mieszalnia farb">
    </header>
    <section id="formularz">
        <form method="POST" action="index.php">
            <label>
                Data odbioru od:<input type="date" name="dataOd">
            </label>
            <label>
                do:<input type="date" name="dataDo">
            </label>
            <button name="submit">Wyszukaj</button>
        </form>
    </section>
    <main>
        <table>
            <tr>
                <th>Nr zamówienia</th>
                <th>Nazwisko</th>
                <th>Imię</th>
                <th>Kolor</th>
                <th>Pojemność [ml]</th>
                <th>Data odbioru</th>
            </tr>
            <?php
            $connect = mysqli_connect('localhost', 'root', '', 'mieszalnia');
            if (!empty($_POST["dataOd"]) && !empty($_POST["dataDo"])) {
                $dataOd = $_POST["dataOd"];
                $dataDo = $_POST["dataDo"];
                $query = "SELECT nazwisko, imie, zamowienia.id, kod_koloru, pojemnosc, data_odbioru FROM klienci JOIN zamowienia ON klienci.id = id_klienta WHERE data_odbioru >= '$dataOd' AND data_odbioru <= '$dataDo' ORDER BY data_odbioru ASC;";
                $result = mysqli_query($connect, $query);
            } else {
                $query = "SELECT nazwisko, imie, zamowienia.id, kod_koloru, pojemnosc, data_odbioru FROM klienci JOIN zamowienia ON klienci.id = zamowienia.id_klienta ORDER BY data_odbioru;";
                $result = mysqli_query($connect, $query);
            }
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>
                            <td>{$row[2]}</td>
                            <td>{$row['nazwisko']}</td>
                            <td>{$row['imie']}</td>
                            <td style='background-color: #{$row['kod_koloru']}'>{$row['kod_koloru']}</td>
                            <td>{$row['pojemnosc']}</td>
                            <td>{$row['data_odbioru']}</td>
                        </tr>";
            }
            mysqli_close($connect);
            ?>
        </table>
    </main>
    <footer>
        <h3>Egzamin INF.03</h3>
        <p>Autor: Chr1skyy</p>
    </footer>
</body>

</html>