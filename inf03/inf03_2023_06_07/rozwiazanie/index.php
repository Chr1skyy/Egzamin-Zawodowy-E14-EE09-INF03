<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl.css">
    <title>Biblioteka</title>
</head>

<body>
    <header>
        <h1>Biblioteka w Książkowicach Małych</h1>
    </header>
    <main>
        <section class="left">
            <h4>Dodaj czytelnika</h4>
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
                <button name="submit">AKCEPTUJ</button><br />
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'biblioteka');
                if (isset($_POST["submit"])) {
                    $imie = $_POST['imie'];
                    $nazwisko = $_POST['nazwisko'];
                    $symbol = $_POST['symbol'];
                    $q = "INSERT INTO czytelnicy(imie, nazwisko, kod) VALUES ('$imie',
                    '$nazwisko', '$symbol');";
                    mysqli_query($con, $q);
                    echo "Dodano czytelnika $imie $nazwisko";
                }
                ?>
        </section>
        <section class="mid">
            <img src="biblioteka.png" alt="biblioteka">
            <h6>ul. Czytelnicza&nbsp;15, Książkowice Małe</h6>
            <p><a href="mailto:biuro@bib.pl">Czy masz jakieś uwagi?</a></p>
        </section>
        <section class="right">
            <h4>Nasi czytelnicy:</h4>
            <ol>
                <?php
                $q = 'SELECT imie, nazwisko FROM czytelnicy ORDER BY nazwisko;';
                $result = mysqli_query($con, $q);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<li>$row[0] $row[1]</li>";
                }
                mysqli_close($con);
                ?>
            </ol>
        </section>
    </main>
    <footer>
        <p>Projekt witryny: Chriskyy
    </footer>
</body>

</html>