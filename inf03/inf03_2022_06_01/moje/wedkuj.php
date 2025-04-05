<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<?php
    $conn = mysqli_connect("localhost","root","","wedkowanie");

    function skrypt1($conn) {

        $sql = 'SELECT r.nazwa, l.akwen, l.wojewodztwo FROM `ryby` r JOIN lowisko l ON l.Ryby_id = r.id WHERE r.wystepowanie LIKE "%rzeki%";';
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result))
        {
            $nazwa_gatunku = $row['nazwa'];
            $nazwa_akwenu = $row['akwen'];
            $wojewodztwo = $row['wojewodztwo'];

            echo "<li>". $nazwa_gatunku . " pływa w rzece ". $nazwa_akwenu . ", " . $wojewodztwo ."</li>";
        }
    }
    
    function skrypt2($conn) {

        $sql = 'SELECT id, nazwa, wystepowanie FROM `ryby` WHERE styl_zycia = 1;';
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result))
        {
            $id = $row['id'];
            $nazwa = $row['nazwa'];
            $wystepowanie = $row['wystepowanie'];

            echo "<tr><td>". $id . "</td><td>" . $nazwa . "</td><td>" . $wystepowanie . "</td></tr>";
        }
    }
?>
<body>
    <section class="baner">
        <h1>Portal dla wędkarzy</h1>
    </section>
        <section class="upper_left">
            <h3>Ryby zamieszkujące rzeki</h3>
            <ol>
                <?php
                    skrypt1($conn);
                ?>
            </ol>
        </section>
        <section class="right">
            <img src="ryba1.jpg" alt="Sum"><br>
            <a href="kwerendy.txt">Pobierz kwerendy</a>
        </section>
        <section class="lower_left">
            <h3>Ryby drapieżne naszych wód</h3>
            <table>
                <tr>
                    <th>L.p.</th>
                    <th>Gatunek</th>
                    <th>Występowanie</th>
                </tr>
                <?php
                    skrypt2($conn);
                ?>
            </table>
        </section>
    <section class="footer">
        <p>Stronę wykonał: Maksym Knasiecki</p>
    </section>
</body>
</html>