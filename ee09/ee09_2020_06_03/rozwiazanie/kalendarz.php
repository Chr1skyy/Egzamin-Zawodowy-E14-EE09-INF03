<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Organizer</title>
    <link rel="stylesheet" href="./styl5.css">
</head>

<body>
    <header>
        <section id="bannerOne">
            <img src="./logo1.png" alt="Mój kalendarz">
        </section>
        <section id="bannerTwo">
            <h1>KALENDARZ</h1>
            <?php
            // Skrypt 1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin5');
            $zapytanie1 = "SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-07-01';";
            $wynik1 = mysqli_query($polaczenie, $zapytanie1);
            while ($wiersz = mysqli_fetch_array($wynik1)) {
                echo "<h3>miesiąc: {$wiersz['miesiac']}, rok: {$wiersz['rok']}</h3>";
            }
            ?>
        </section>
    </header>
    <main>
        <?php
        // Skrypt 2
        $zapytanie2 = "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'lipiec';";
        $wynik2 = mysqli_query($polaczenie, $zapytanie2);
        while ($wiersz = mysqli_fetch_array($wynik2)) {
            echo "<div class='dzien'>
                    <h5>{$wiersz['dataZadania']}</h5>
                    <p>{$wiersz['wpis']}</p>
                </div>";
        }
        ?>
    </main>
    <footer>
        <form action="./kalendarz.php" method="POST">
            <label>dodaj wpis:
                <input type="text" name="wpis">
            </label>
            <button name="wyslij">DODAJ</button>
        </form>
        <?php
        // skrypt obsługujący formularz
        if (isset($_POST['wyslij'])) {
            $wpis = $_POST['wpis'];
            $zapytanie4 = "UPDATE zadania SET wpis = '$wpis' WHERE dataZadania = '2020-07-13';";
            mysqli_query($polaczenie, $zapytanie4);
        }
        mysqli_close($polaczenie);
        ?>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>