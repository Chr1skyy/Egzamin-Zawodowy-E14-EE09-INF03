<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Sierpniowy kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>

<body>
    <header>
        <section id="baner_1">
            <h1>Organizer: SIERPIEŃ</h1>
        </section>
        <section id="baner_2">
            <form action="organizer.php" method="post">
                <label>Zapisz wydarzenie:
                    <input type="text" name="wpis" />
                </label>
                <button name="submit">OK</button>
            </form>
            <?php
            // skrypt obsługujący formularz
            $polaczenie = mysqli_connect('localhost', 'root', '', 'kalendarz');
            if (isset($_POST['submit'])) {
                $wpis = $_POST['wpis'];
                $zapytanie4 = "UPDATE zadania SET wpis = '$wpis' WHERE dataZadania = '2020-08-09'";
                mysqli_query($polaczenie, $zapytanie4);
            }
            ?>
        </section>
        <section id="baner_3">
            <img src="logo2.png" alt="sierpień" />
        </section>
    </header>
    <main>
        <?php
        // Skrypt 1
        $zapytanie1 = "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'sierpien'";
        $wynik1 = mysqli_query($polaczenie, $zapytanie1);
        while ($wiersz = mysqli_fetch_array($wynik1)) {
            echo "<section class='dzien'>
                    <h5>{$wiersz['dataZadania']}</h5>
                    <p>{$wiersz['wpis']}</p>
                </section>";
        }
        mysqli_close($polaczenie);
        ?>
    </main>
    <footer>
        <p>Stronę wykonał: Chr1skyy</p>
    </footer>
</body>

</html>