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
        $con = mysqli_connect('localhost', 'root', '', 'firma');
        $q = "SELECT id,imie,nazwisko,adres,miasto,czyRODO,czyBadania FROM pracownicy WHERE id=2;";
        $res = mysqli_query($con, $q);
        while ($row = mysqli_fetch_array($res)) {
            if ($row[5] == 1) {
                $rodo = 'podpisano';
            } else
                $rodo = 'niepodpisano';

            if ($row[6] == 1) {
                $badania = 'aktualne';
            } else
                $badania = 'nieaktualne';

            echo "
            <h3>dane</h3>
            <p>$row[1] $row[2]</p>
        <hr/>
        <h3>adres</h3>
        <p>$row[3]</p>
        <p>$row[4]</p>
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
        $q = "SELECT COUNT(*) FROM pracownicy";
        $res = mysqli_query($con, $q);
        $row = mysqli_fetch_array($res);
        echo "<p>$row[0]</p>";
        ?>
    </div>
    <div id="prawy">
        <?php
        $q = "SELECT id,imie,nazwisko FROM pracownicy WHERE id=2;";
        $res = mysqli_query($con, $q);
        while ($row = mysqli_fetch_array($res)) {
            echo "<img src=$row[0].jpg alt='pracownik'>
            <h2>$row[1] $row[2]</h2>";
        }
        $q = "SELECT pracownicy.id, stanowiska.nazwa, stanowiska.opis FROM pracownicy, stanowiska WHERE pracownicy.stanowiska_id = stanowiska.id AND pracownicy.id = 2;";
        $res = mysqli_query($con, $q);
        while ($row = mysqli_fetch_array($res)) {
            echo "<h4>$row[1]</h4>
            <h5>$row[2]</h5>";
        }
        mysqli_close($con);
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