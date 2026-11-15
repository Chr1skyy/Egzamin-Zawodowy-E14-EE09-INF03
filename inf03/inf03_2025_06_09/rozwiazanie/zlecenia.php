<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Remonty</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>

    <header>
        <h1>Malowanie i gipsowanie</h1>
    </header>
    <main>
        <div id="container">
            <nav>
                <a href="kontakt.html">Kontakt</a>
                <a href="https://remonty.pl/" target="_blank">Partnerzy</a>
            </nav>
            <div id="container-sections">
                <section id="lewa">
                    <h2>Dla klientów</h2>
                    <form action="zlecenia.php" method="POST">
                        <label for="ilosc_pracownikow">Ilu co najmniej pracowników potrzebujesz?</label>
                        <input type="number" id="ilosc_pracownikow" name="ilosc_pracownikow">
                        <button name="szukaj_firm">Szukaj firm</button>
                    </form>
                    <?php
                    // Skrypt 1
                    $polaczenie = mysqli_connect("localhost", "root", "", "remonty");
                    if (isset($_POST['szukaj_firm'])) {
                        $liczbaPracownikow = $_POST['ilosc_pracownikow'];
                        $zapytanie2 = "SELECT nazwa_firmy, liczba_pracownikow FROM wykonawcy WHERE liczba_pracownikow >= $liczbaPracownikow";
                        $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                        while ($wiersz = mysqli_fetch_array($wynik2)) {
                            echo "<p>{$wiersz['nazwa_firmy']}, {$wiersz['liczba_pracownikow']} pracowników</p>";
                        }
                    }
                    ?>
                </section>
                <section id="srodkowa">
                    <h2>Dla wykonawców</h2>
                    <form action="zlecenia.php" method="POST">
                        <select name="miasto">
                            <?php
                            // Skrypt 2
                            $zapytanie3 = "SELECT DISTINCT miasto FROM klienci ORDER BY miasto;";
                            $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                            while ($wiersz = mysqli_fetch_array($wynik3)) {
                                echo "<option value='{$wiersz['miasto']}'>{$wiersz['miasto']}</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <input type="radio" id="malowanie" name="usluga" value="malowanie" checked>
                        <label for="malowanie">malowanie</label>
                        <br>
                        <input type="radio" id="gipsowanie" name="usluga" value="gipsowanie">
                        <label for="gipsowanie">gipsowanie</label>
                        <br>
                        <button name="szukaj_klientow">Szukaj klientów</button>
                    </form>
                    <?php
                    // Skrypt 3
                    if (isset($_POST['szukaj_klientow'])) {
                        $usluga = $_POST['usluga'];
                        $miasto = $_POST['miasto'];
                        $zapytanie4 = "SELECT imie, cena FROM klienci JOIN zlecenia ON klienci.id_klienta = zlecenia.id_klienta WHERE miasto = '$miasto' AND rodzaj = '$usluga';";
                        $wynik4 = mysqli_query($polaczenie, $zapytanie4);
                        echo "<ul>";
                        while ($wiersz = mysqli_fetch_array($wynik4)) {
                            echo "<li>{$wiersz['imie']} - {$wiersz['cena']}</li>";
                        }
                        echo "</ul>";
                    }
                    mysqli_close($polaczenie);
                        ?>
                </section>
            </div>
        </div>
        <aside>
            <img src="img/tapeta_lewa.png" alt="usługi">
            <img src="img/tapeta_prawa.png" alt="usługi">
            <img src="img/tapeta_lewa.png" alt="usługi">
        </aside>
    </main>
    <footer>
        <p><strong>Stronę wykonał: Chr1skyy</strong></p>
    </footer>
</body>

</html>