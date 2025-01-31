<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wycieczki i urlopy</title>
    <link rel="stylesheet" href="styl3.css">
</head>

<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <main>
        <section id="lewy">
            <h2>KONTAKT</h2>
            <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
            <p>telefon: 555666777</p>
        </section>
        <section id="srodkowy">
            <h2>GALERIA</h2>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'egzamin3');
            $q = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis ASC;";
            $res = mysqli_query($con, $q);
            while ($row = mysqli_fetch_array($res)) {
                echo "<img src='$row[0]' alt='$row[1]' />";
            }
            ?>
        </section>
        <section id="prawy">
            <h2>PROMOCJE</h2>
            <table>
                <tr>
                    <td>Jesień</td>
                    <td>Grupa 4+</td>
                    <td>Grupa 10+</td>
                </tr>
                <tr>
                    <td>5%</td>
                    <td>10%</td>
                    <td>15%</td>
                </tr>
            </table>
        </section>
    </main>
    <section id="dane">
        <h2>LISTA WYCIECZEK</h2>
        <?php
        $q = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna = TRUE;";
        $res = mysqli_query($con, $q);
        while ($row = mysqli_fetch_array($res)) {
            echo "$row[0]. $row[1], $row[2], cena: $row[3]<br/>";
        }
        mysqli_close($con);
        ?>
    </section>
    <footer>
        <p>Stronę wykonał: Chriskyy#0181</p>
    </footer>
</body>

</html>