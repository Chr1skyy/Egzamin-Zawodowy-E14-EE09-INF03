<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl.css">
    <title>Sklep dla uczniów</title>
</head>

<body>
    <header>
        <h1>Dziesiejsze promocje naszego sklepu</h1>
    </header>
    <main>
        <section class="left">
            <h2>Taniej o 30%</h2>
            <ol>
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'sklep');
                $q = 'SELECT nazwa FROM towary WHERE promocja = 1;';
                $result = mysqli_query($con, $q);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<li>$row[0]</li>";
                }
                ?>
            </ol>
        </section>
        <section class="mid">
            <h2>Sprawdź cenę</h2>
            <form action="index.php" method="post">
                <select name="list">
                    <option value="Gumka do mazania">Gumka do mazania</option>
                    <option value="Cienkopis">Cienkopis</option>
                    <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                    <option value="Markery 4 szt.">Markery 4 szt.</option>
                </select>
                <button type="submit" name="submit">WYBIERZ</button>
            </form>
            <section class="result">
                <?php
                if (isset($_POST['submit'])) {
                    $produkt = $_POST['list'];
                    $q = "SELECT cena FROM towary WHERE nazwa = '$produkt';";
                    $res = mysqli_query($con, $q);
                    while ($row = mysqli_fetch_array($res)) {
                        echo "cena regularna: $row[0]</br>";
                        $cena = ROUND($row[0] * 0.7, 2);
                        echo "cena w promocji 30%: $cena";
                    }
                }
                mysqli_close($con);
                ?>
            </section>

        </section>
        <section class="right">
            <h2>Kontakt</h2>
            <p>e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
            <img src="promocja.png" alt="promocja">
        </section>
    </main>
    <footer>
        <h4>Autor strony: Chriskyy</h4>
    </footer>
</body>

</html>