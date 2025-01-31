<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
</head>

<?php
header("refresh: 10;");
?>

<body>
    <header>
        <section id="banner1">
            <h1>Ważenie pojazdów we Wrocławiu</h1>
        </section>
        <section id="banner2">
            <img src="obraz1.png" alt="waga">
        </section>
    </header>
    <main>
        <section id="lewy">
            <h2>Lokalizacje wag</h2>
            <ol>
                <?php
                $connect = mysqli_connect("localhost", "root", "", "wazenietirow");
                $query1 = "SELECT ulica FROM lokalizacje";
                $result1 = mysqli_query($connect, $query1);
                while ($row = mysqli_fetch_array($result1)) {
                    echo "<li>ulica $row[0]</li>";
                }
                ?>
            </ol>
            <h2>Kontakt</h2>
            <a href="mailto:wazenie@wroclaw.pl">napisz</a>
        </section>
        <section id="srodkowy">
            <h2>Alerty</h2>
            <table>
                <tr>
                    <th>rejestracja</th>
                    <th>ulica</th>
                    <th>waga</th>
                    <th>dzień</th>
                    <th>czas</th>
                </tr>
                <?php
                $query2 = "SELECT rejestracja, ulica, waga, dzien, czas FROM wagi JOIN lokalizacje ON wagi.lokalizacje_id = lokalizacje.id WHERE waga > 5";
                $result2 = mysqli_query($connect, $query2);
                while ($row = mysqli_fetch_array($result2)) {
                    echo "<tr>
                                <td>$row[0]</td>
                                <td>$row[1]</td>
                                <td>$row[2]</td>
                                <td>$row[3]</td>
                                <td>$row[4]</td>
                            </tr>";
                }
                ?>
            </table>
            <?php
            $query3 = "INSERT INTO wagi(lokalizacje_id, waga, rejestracja, dzien, czas) VALUES ('5', FLOOR(RAND()*10+1), 'DW12345', CURRENT_DATE, CURRENT_TIME)";
            mysqli_query($connect, $query3);
            mysqli_close($connect);
            ?>
        </section>
        <section id="prawy">
            <img src="obraz2.jpg" alt="tir">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chriskyy</p>
    </footer>
</body>

</html>