<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
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
                // Skrypt 1
                $polaczenie = mysqli_connect('localhost', 'root', '', 'biblioteka');
                $zapytanie1 = "SELECT imie, nazwisko FROM autorzy ORDER BY nazwisko;";
                $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                while ($wiersz = mysqli_fetch_array($wynik1)) {
                    echo "<li>{$wiersz['imie']} {$wiersz['nazwisko']}</li>";
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
                <form action="biblioteka.php" method="post">
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
                // Skrypt 2
                if (isset($_POST["submit"])) {
                    $imie = $_POST['imie'];
                    $nazwisko = $_POST['nazwisko'];
                    $symbol = $_POST['symbol'];
                    $zapytanie2 = "INSERT INTO czytelnicy(imie, nazwisko, kod) VALUES ('$imie', '$nazwisko', '$symbol');";
                    mysqli_query($polaczenie, $zapytanie2);
                    echo "Czytelnik $imie $nazwisko został(a) dodany do bazy danych";
                }
                mysqli_close($polaczenie);
                ?>
            </section>
        </section>

    </main>
    <footer>
        <p>Projekt strony: Chriskyy
    </footer>
</body>

</html>