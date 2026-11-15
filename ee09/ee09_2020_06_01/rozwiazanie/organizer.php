<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Organizer</title>
    <link rel="stylesheet" href="./styl6.css">
</head>

<body>
    <header>
        <section id="bannerOne">
            <h2>MÓJ ORGANIZER</h2>
        </section>
        <section id="bannerTwo">
            <form action="./organizer.php" method="POST">
                <label>Wpis wydarzenia:
                    <input type="text" name="wpis">
                </label>
                <button name="wyslij">ZAPISZ</button>
            </form>
            <?php
            // skrypt obsługujący formularz
            $polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin6');
            if (isset($_POST['wyslij'])) {
                $wpis = $_POST['wpis'];
                $zapytanie4 = "UPDATE zadania SET wpis = '$wpis' WHERE dataZadania = '2020-08-27';";
                mysqli_query($polaczenie, $zapytanie4);
            }
            ?>
        </section>
        <section id="bannerThree">
            <img src="./logo2.png" alt="Mój organizer">
        </section>
    </header>
    <main>
        <?php
        // Skrypt 1
        $zapytanie1 = "SELECT dataZadania, miesiac, wpis FROM zadania WHERE miesiac = 'sierpien';";
        $wynik1 = mysqli_query($polaczenie, $zapytanie1);
        while ($wiersz = mysqli_fetch_array($wynik1)) {
            echo "<div class='dzien'>
                    <h6>{$wiersz['dataZadania']}, {$wiersz['miesiac']}</h6>
                    <p>{$wiersz['wpis']}</p>
                </div>";
        }
        ?>
    </main>
    <footer>
        <?php
        // Skrypt 2
        $zapytanie2 = "SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-08-01';";
        $wynik2 = mysqli_query($polaczenie, $zapytanie2);
        while ($wiersz = mysqli_fetch_array($wynik2)) {
            echo "<h1>miesiąc: {$wiersz['miesiac']}, rok: {$wiersz['rok']}</h1>";
        }
        mysqli_close($polaczenie);
        ?>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>