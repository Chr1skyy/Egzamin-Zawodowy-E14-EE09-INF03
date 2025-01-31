<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wynajem pokoi</title>
    <link rel="stylesheet" href="styl2.css">
</head>

<body>
    <header>
        <h1>Pensjonat pod dobrym humorem</h1>
    </header>
    <main>
        <section id="panelLewy">
            <a href="index.html">GŁÓWNA</a>
            <img src="1.jpg" alt="pokoje" />
        </section>
        <section id="panelSrodkowy">
            <a href="cennik.php">CENNIK</a>
            <table>
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'wynajem');
                $q = "SELECT * FROM pokoje;";
                $res = mysqli_query($con, $q);
                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>
                            <td>$row[0]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                        </tr>";
                }
                mysqli_close($con);
                ?>
            </table>
        </section>
        <section id="panelPrawy">
            <a href="kalkulator.html">KALKULATOR</a>
            <img src="3.jpg" alt="pokoje" /></section>
    </main>
    <footer>
        <p>Stronę opracował: Chriskyy#0181</p>
    </footer>
</body>

</html>