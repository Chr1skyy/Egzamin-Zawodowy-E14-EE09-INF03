<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Kwiaty</title>
    <link rel="stylesheet" href="./styl.css">
</head>

<body>
    <header>
        <h1>Moje kwiaty</h1>
    </header>
    <main>
        <section id="panelLewy">
            <h3>Kwiaty dla Ciebie!</h3>
            <a href="https://www.swiatkwiatow.pl/">Rozpoznaj kwiaty</a>
            <br />
            <a href="./znajdz.php">Znajdź kwiaciarnię</a>
            <br />
            <img src="img/gozdzik.jpg" alt="Goździk">
        </section>
        <section id="panelPrawy">
            <img src="img/gerbera.jpg" alt="gerbera">
            <img src="img/gozdzik.jpg" alt="goździk">
            <img src="img/roza.jpg" alt="róża">
            <p>Podaj miejscowość, w której poszukujesz kwiaciarni:</p>
            <form action="znajdz.php" method="POST">
                <input type="text" name="miasto">
                <button name="wyslij">SPRAWDŹ</button>
            </form>
            <?php
            if (isset($_POST['wyslij'])) {
                $miasto = $_POST['miasto'];
                $polaczenie = mysqli_connect('localhost', 'root', '', 'kwiaciarnia');
                $zapytanie = "SELECT nazwa, ulica FROM kwiaciarnie WHERE miasto = '$miasto';";
                $wynik = mysqli_query($polaczenie, $zapytanie);
                while ($wiersz = mysqli_fetch_array($wynik)) {
                    echo "{$wiersz['nazwa']}, {$wiersz['ulica']}";
                }
                mysqli_close($polaczenie);
            }
            ?>
        </section>
    </main>
    <footer>
        <h3>Stronę opracował: Chriskyy#0181</h3>
    </footer>
</body>

</html>