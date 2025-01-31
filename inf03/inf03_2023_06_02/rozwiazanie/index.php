<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl.css">
    <title>Hurtownia szkolna</title>
</head>

<body>
    <header>
        <h1>Hurtownia z najlepszymi cenami</h1>
    </header>
    <main>
        <section class="left">
            <h2>Nasze ceny</h2>
            <table>
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'sklep');
                $q = 'SELECT nazwa, cena FROM towary LIMIT 4;';
                $result = mysqli_query($con, $q);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr><td>$row[0]</td></tr>";
                }
                ?>
            </table>
        </section>
        <section class="mid">
            <h2>Koszt zakupów</h2>
            <form action="index.php" method="post">
                wybierz artykuł:
                <select name="list">
                    <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
                    <option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
                    <option value="Cyrkiel">Cyrkiel</option>
                    <option value="Linijka 30 cm">Linijka 30 cm</option>
                </select>
                <br />
                liczba sztuk: <input type="number" name="ilosc"><br />
                <button type="submit" name="submit">OBLICZ</button>
            </form>
            <p class="result">
                <?php
                if (isset($_POST['submit'])) {
                    $produkt = $_POST['list'];
                    $ilosc = $_POST['ilosc'];
                    $q = "SELECT cena FROM towary WHERE nazwa = '$produkt';";
                    $res = mysqli_query($con, $q);
                    while ($row = mysqli_fetch_array($res)) {
                        $cena = $row[0] * $ilosc;
                        echo "wartość zakupów: $cena";
                    }
                }
                mysqli_close($con);
                ?>
            </p>
        </section>
        <section class="right">
            <h2>Kontakt</h2>
            <p>e-mail: <a href="mailto:hurt@poczta2.pl">hurt@poczta2.pl</a></p>
            <img src="zakupy.png" alt="hurtownia">
        </section>
    </main>
    <footer>
        <h4>Witrynę wykonał: Chriskyy</h4>
    </footer>
</body>

</html>