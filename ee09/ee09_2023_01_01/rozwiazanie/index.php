<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Sekretariat</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <div id="lewy">
        <h1>Akta Pracownicze</h1>
        <?php
        // Skrypt 1
        $polaczenie = mysqli_connect('localhost', 'root', '', 'firma');
        $zapytanie1 = "SELECT imie, nazwisko, adres, miasto, czyRODO, czyBadania FROM pracownicy WHERE id = 2;";
        $wynik1 = mysqli_query($polaczenie, $zapytanie1);
        while ($wiersz = mysqli_fetch_array($wynik1)) {
            if ($wiersz['czyRODO'] == 1) {
                $rodo = 'podpisano';
            } else {
                $rodo = 'niepodpisano';
            }

            if ($wiersz['czyBadania'] == 1) {
                $badania = 'aktualne';
            } else {
                $badania = 'nieaktualne';
            }

            echo "
            <h3>dane</h3>
            <p>{$wiersz['imie']} {$wiersz['nazwisko']}</p>
        <hr/>
        <h3>adres</h3>
        <p>{$wiersz['adres']}</p>
        <p>{$wiersz['miasto']}</p>
        <hr/>
        <p>RODO: $rodo</p>
        <p>Badania: $badania</p>";
        }
        ?>
        <hr/>
        <h3>Dokumenty pracownika</h3>
        <a href="cv.txt">Pobierz</a>
        <h1>Liczba zatrudnionych pracowników</h1>
        <?php
        // Skrypt 2
        $zapytanie2 = "SELECT COUNT(*) FROM pracownicy";
        $wynik2 = mysqli_query($polaczenie, $zapytanie2);
        $wiersz = mysqli_fetch_array($wynik2);
        echo "<p>{$wiersz[0]}</p>";
        ?>
    </div>
    <div id="prawy">
        <?php
        // Skrypt 3
        $zapytanie3 = "SELECT id, imie, nazwisko FROM pracownicy WHERE id = 2;";
        $wynik3 = mysqli_query($polaczenie, $zapytanie3);
        while ($wiersz = mysqli_fetch_array($wynik3)) {
            echo "<img src='{$wiersz['id']}.jpg' alt='pracownik'>
            <h2>{$wiersz['imie']} {$wiersz['nazwisko']}</h2>";
        }
        $zapytanie4 = "SELECT pracownicy.id, stanowiska.nazwa, stanowiska.opis FROM pracownicy JOIN stanowiska ON pracownicy.stanowiska_id = stanowiska.id WHERE pracownicy.id = 2;";
        $wynik4 = mysqli_query($polaczenie, $zapytanie4);
        while ($wiersz = mysqli_fetch_array($wynik4)) {
            echo "<h4>{$wiersz['nazwa']}</h4>
            <h5>{$wiersz['opis']}</h5>";
        }
        mysqli_close($polaczenie);
        ?>
    </div>
    <div id="stopka">
        Autorem aplikacji jest:0000000000
        <ul>
            <li> Skontaktuj się</li>
            <li> Poznaj naszą firmę</li>
        </ul>
    </div>
</body>

</html>