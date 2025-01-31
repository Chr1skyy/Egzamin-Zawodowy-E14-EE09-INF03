<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wycieczki krajoznawcze</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <header>
        <h1>WITAMY W BIURZE PODRÓŻY</h1>
    </header>
    <section id="dane">
        <h3>ARCHIWUM WYCIECZEK</h3>
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'egzamin4');
        $q = "SELECT id, cel, cena FROM wycieczki WHERE dostepna = 0;";
        $res = mysqli_query($con, $q);
        while ($row = mysqli_fetch_array($res)) {
            echo "$row[0]. $row[1], cena: $row[2]<br/>";
        }
        ?>
    </section>
    <main>
        <section id="lewy">
            <h3>NAJTANIEJ</h3>
            <table>
                <tr>
                    <td>Włochy</td>
                    <td>od 1200 zł</td>
                </tr>
                <tr>
                    <td>Francja</td>
                    <td>od 1200 zł</td>
                </tr>
                <tr>
                    <td>Hiszpania</td>
                    <td>od 1400 zł</td>
                </tr>
            </table>
        </section>
        <section id="srodkowy">
            <h3>TU BYLIŚMY</h3>
            <?php
            $q = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis DESC;";
            $res = mysqli_query($con, $q);
            while ($row = mysqli_fetch_array($res)) {
                echo "<img src='$row[0]' alt='$row[1]' />";
            }
            mysqli_close($con);
            ?>
        </section>
        <section id="prawy">
            <h3>SKONTAKTUJ SIĘ</h3>
            <a href="mailto:wycieczki@wycieczki.pl">napisz do nas</a>
            <p>telefon: 555666777</p>
        </section>
    </main>

    <footer>
        <p>Stronę wykonał: Chriskyy#0181</p>
    </footer>
</body>

</html>