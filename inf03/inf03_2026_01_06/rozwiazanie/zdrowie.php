<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wykaz chorób</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Informacja o chorobach w Polsce</h1>
    </header>
    <nav>
        <a href="https://szpitale.pl/" target="_blank">Szpitale</a>
        <a href="https://www.przychodnie.pl/" target="_blank">Przychodnie</a>
        <a href="https://www.nfz.gov.pl/" target="_blank">NFZ</a>
    </nav>
    <main>
        <section id="left">
            <h2>Choroby zakaźne</h2>
            <ol>
                <?php
                // Skrypt 1
                $polaczenie = mysqli_connect("localhost", "root", "", "choroby");
                $zapytanie1 = "SELECT nazwa FROM choroby WHERE zakazna = 'T' ORDER BY nazwa;";
                $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                while ($wiersz = mysqli_fetch_array($wynik1)) {
                    echo "<li>{$wiersz['nazwa']}</li>";
                }
                ?>
            </ol>
        </section>
        <section id="right">
            <h2>Objawy chorób</h2>
            <form action="zdrowie.php" method="POST">
                <select name="choroba">
                    <?php
                    // Skrypt 2
                    $zapytanie2 = "SELECT id, nazwa FROM choroby;";
                    $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                    while ($wiersz = mysqli_fetch_array($wynik2)) {
                        echo "<option value='{$wiersz['id']}'>{$wiersz['nazwa']}</option>";
                    }
                    ?>
                </select>
                <button type="submit" name="submit">Sprawdź</button>
            </form>
            <div id="result">
                <?php
                // Skrypt 3
                if (isset($_POST['submit'])) {
                    $id = $_POST['choroba'];
                    $zapytanie3 = "SELECT objawy.nazwa FROM objawy JOIN choroby_objawy ON objawy.id = choroby_objawy.id_objawy WHERE choroby_objawy.id_choroby = $id;";
                    $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                    while ($wiersz = mysqli_fetch_array($wynik3)) {
                        echo "<span>{$wiersz['nazwa']} </span>";
                    }
                }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <p>Stronę opracował: Chr1skyy</p>
    </footer>
    <img src="zdrowia.png" alt="Życzymy zdrowia!">
    <?php mysqli_close($polaczenie); ?>
</body>

</html>