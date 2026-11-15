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
        // Skrypt 1
        $polaczenie = mysqli_connect('localhost', 'root', '', 'firma');
        $nr = 1;
        if (isset($_POST['nr'])) {
            $nr = $_POST['nr'];
        }
        $zapytanie1 = "SELECT id, imie, nazwisko, adres, miasto FROM pracownicy WHERE id = $nr";
        $wynik1 = mysqli_query($polaczenie, $zapytanie1);
        while ($wiersz = mysqli_fetch_array($wynik1)) {
            echo "<img src='img/{$wiersz['id']}.jpg' alt='pracownik'/>
                <h2>{$wiersz['imie']} {$wiersz['nazwisko']}</h2>
                <h4>Adres:</h4>
                <p>{$wiersz['adres']}, {$wiersz['miasto']}</p>";
        }
        ?>
    </main>
    <footer>
        <section id="lewy">
            <img src="img/obraz.jpg" alt="pracownicy firmy" />
        </section>
        <section id="srodkowy">
            <p>Autorem wizytownika jest: Chr1skyy</p>
            <a href="http://agencjareklamowa543.pl/" target="_blank">Zobacz nasze realizacje</a>
        </section>
        <section id="prawy">
            <p>Osoby proszone o podpisanie dokumentu RODO.</p>
            <ol>
                <?php
                // Skrypt 2
                $zapytanie2 = "SELECT imie, nazwisko FROM pracownicy WHERE czyRODO = 0";
                $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                while ($wiersz = mysqli_fetch_array($wynik2)) {
                    echo "<li>{$wiersz['imie']} {$wiersz['nazwisko']}</li>";
                }
                mysqli_close($polaczenie);
                ?>
            </ol>
        </section>
    </footer>
</body>

</html>