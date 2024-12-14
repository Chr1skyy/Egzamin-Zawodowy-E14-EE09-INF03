<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <img src="motor.png" alt="motocykl">
    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>
    <main>
        <section id="lewy">
            <h2>Gdzie pojechać?</h2>
            <dl>
                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'motory');
                $query1 = "SELECT nazwa, opis, poczatek, zrodlo FROM wycieczki JOIN zdjecia ON zdjecia_id = zdjecia.id";
                $result1 = mysqli_query($connect, $query1);
                while ($row = mysqli_fetch_array($result1)) {
                    echo "<dt>$row[0], rozpoczyna się w $row[2], ";
                    echo "<a href='$row[3].jpg'>zobacz zdjęcie</a></dt>";
                    echo "<dd>$row[1]</dd>";
                }
                ?>
            </dl>
        </section>
        <section id="prawy1">
            <h2>Co kupić?</h2>
            <ol>
                <li>Honda CBR125R</li>
                <li>Yamaha YBR125</li>
                <li>Honda VFR800i</li>
                <li>Honda CBR1100XX</li>
                <li>BMW R1200GS LC</li>
            </ol>
        </section>
        <section id="prawy2">
            <h2>Statystyki</h2>
            <p>Wpisanych wycieczek:
                <?php
                $query2 = "SELECT COUNT(*) as liczba_wycieczek FROM wycieczki";
                $result2 = mysqli_query($connect, $query2);
                $row = mysqli_fetch_array($result2);
                echo $row['liczba_wycieczek'];
				
				mysqli_close($connect);
                ?>
            </p>
            <p>Użytkowników forum: 200</p>
            <p>Przesłanych zdjęć: 1300</p>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chriskyy</p>
    </footer>
</body>

</html>