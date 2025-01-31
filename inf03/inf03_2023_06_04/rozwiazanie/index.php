<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl.css">
    <title>Biblioteka publiczna</title>
</head>

<body>
    <header>
        <h1>Biblioteka w Książkowicach Wielkich</h1>
    </header>
    <main>
        <section class="left">
            <h3>Polecamy dzieła autorów:</h3>
            <ol>
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'biblioteka');
                $q = 'SELECT imie, nazwisko FROM autorzy ORDER BY nazwisko;';
                $result = mysqli_query($con, $q);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<li>$row[0] $row[1]</li>";
                }
                ?>
            </ol>
        </section>
        <section class="mid">
            <h3>ul. Czytelnicza 25, Książkowice&nbsp;Wielkie</h3>
            <p><a href="mailto:sekretariat@biblioteka.pl">Napisz do nas</a></p>
            <img src="biblioteka.png" alt="książki">
        </section>
        <section class="right">
            <section class="right_top">
                <h3>Dodaj czytelnika</h3>
                <form action="index.php" method="post">
                    <label>imie:
                        <input type="text" name="imie"><br />
                    </label>
                    <label>nazwisko:
                        <input type="text" name="nazwisko"><br />
                    </label>
                    <label>symbol:
                        <input type="number" name="symbol"><br />
                    </label>
                    <button name="submit">DODAJ</button>
            </section>
            <section class="right_bottom">
                <?php
                if (isset($_POST["submit"])) {
                    $imie = $_POST['imie'];
                    $nazwisko = $_POST['nazwisko'];
                    $symbol = $_POST['symbol'];
                    $q = "INSERT INTO czytelnicy(imie, nazwisko, kod) VALUES ('$imie',
                    '$nazwisko', '$symbol');";
                    mysqli_query($con, $q);
                    echo "Czytelnik: $imie $nazwisko został(a) dodany do bazy danych";
                }
                mysqli_close($con);
                ?>
            </section>
        </section>

    </main>
    <footer>
        <p>Projekt strony: Chriskyy
    </footer>
</body>

</html>