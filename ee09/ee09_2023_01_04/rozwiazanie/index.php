<!DOCTYPE html>
<html lang="plp">

<head>
    <meta charset="UTF-8">
    <title>Wizytówki</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <header>
        <h1>Wizytówki pracowników</h1>
        <form action="index.php" method="post">
            <input type="number" min="0" max="9" name="nr" />
            <button name="submit">WYŚWIETL</button>
        </form>
    </header>
    <main>
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'firma');
        $nr = $_POST['nr'] ?? 1;
        $q = "SELECT id, imie, nazwisko, adres, miasto FROM pracownicy WHERE id = $nr";
        $res = mysqli_query($con, $q);
        while ($row = mysqli_fetch_array($res)) {
            echo "<img src='$row[0].jpg' alt='pracownik'/>
                <h2>$row[1] $row[2]</h2>
                <h4>Adres:</h4>
                <p>$row[3], $row[4]</p>";
        }
        ?>
    </main>
    <footer>
        <section id="lewy">
            <img src="obraz.jpg" alt="pracownicy firmy" />
        </section>
        <section id="srodkowy">
            <p>Autorem wizytownika jest: Chriskyy#0181</p>
            <a href="http://agencjareklamowa543.pl/" target="_blank">Zobacz nasze realizacje</a>
        </section>
        <section id="prawy">
            <p>Osoby proszone o podpisanie dokumentu RODO.</p>
            <ol>
                <?php
                $q = "SELECT imie, nazwisko FROM pracownicy WHERE czyRODO = 0";
                $res = mysqli_query($con, $q);
                while ($row = mysqli_fetch_array($res)) {
                    echo "<li>$row[0] $row[1]";
                }
                mysqli_close($con);
                ?>
            </ol>
        </section>
    </footer>
</body>

</html>