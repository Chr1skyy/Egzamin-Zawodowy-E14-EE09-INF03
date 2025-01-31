<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wycieczki po Europie</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <header>
        <h1>BIURO TURYSTYCZNE</h1>
    </header>
    <section id="dane">
        <h3>Wycieczki, na które są wolne miejsca</h3>
        <ul>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'biuro');
            $q = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna = 1;";
            $res = mysqli_query($con, $q);
            while ($row = mysqli_fetch_array($res)) {
                echo "<li>$row[0]. dnia $row[1] jedziemy do $row[2], cena: $row[3]</li>";
            }
            ?>
        </ul>
    </section>
    <main>
        <section id="lewy">
            <h2>Bestselery</h2>
            <table>
                <tr>
                    <td>Wenecja</td>
                    <td>kwiecień</td>
                </tr>
                <tr>
                    <td>Londyn</td>
                    <td>lipiec</td>
                </tr>
                <tr>
                    <td>Rzym</td>
                    <td>wrzesień</td>
                </tr>
            </table>
        </section>
        <section id="srodkowy">
            <h2>Nasze zdjęcia</h2>
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
            <h2>Skontaktuj się</h2>
            <a href="mailto:turysta@wycieczki.pl">napisz do nas</a>
            <p>telefon: 111222333</p>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chriskyy#0181</p>
    </footer>
</body>

</html>