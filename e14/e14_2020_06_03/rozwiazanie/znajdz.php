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
            <img src="./gozdzik.jpg" alt="Goździk">
        </section>
        <section id="panelPrawy">
            <img src="./gerbera.jpg" alt="gerbera">
            <img src="./gozdzik.jpg" alt="goździk">
            <img src="./roza.jpg" alt="róża">
            <p>Podaj miejscowość, w której poszukujesz kwiaciarni:</p>
            <form action="znajdz.php" method="POST">
                <input type="text" name="miasto">
                <button name="wyslij">SPRAWDŹ</button>
            </form>
            <?php
            if (isset($_POST['wyslij'])) {
                $miasto = $_POST['miasto'];
                $connect = mysqli_connect('localhost', 'root', '', 'kwiaciarnia');
                $query = "SELECT nazwa, ulica FROM kwiaciarnie WHERE miasto = '$miasto';";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo "{$row['nazwa']}, {$row['ulica']}";
                }
            }
            ?>
        </section>
    </main>
    <footer>
        <h3>Stronę opracował: Chriskyy#0181</h3>
    </footer>
</body>

</html>