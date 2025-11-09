<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Przychodnia Medica</title>
    <link rel="shortcut icon" href="obraz2.png" type="image/x-icon">
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Abonamenty w przychodni Medica</h1>
    </header>
    <article>
        <?php
        $connect = mysqli_connect("localhost", "root", "", "medica");
        $query1 = "SELECT nazwa, cena, opis FROM abonamenty;";
        $result = mysqli_query($connect, $query1);
        while ($row = mysqli_fetch_array($result)) {
            echo "<h3>Pakiet {$row['nazwa']} - cena {$row['cena']} zł</h3>";
            echo "<p>{$row['opis']}</p>";
        }
        ?>
        <a href="opis.html">Dowiedz się więcej</a>
    </article>
    <main>
        <section>
            <h2>Standardowy</h2>
            <ul>
                <?php
                $query3_1 = "SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = Abonamenty_id JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 1;";
                $result3 = mysqli_query($connect, $query3_1);
                while ($row3 = mysqli_fetch_array($result3)) {
                    echo "<li>{$row3['cecha']}</li>";
                }
                ?>
            </ul>
        </section>
        <section>
            <h2>Premium</h2>
            <ul>
                <?php
                $query3_2 = "SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = Abonamenty_id JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 2;";
                $result3 = mysqli_query($connect, $query3_2);
                while ($row3 = mysqli_fetch_array($result3)) {
                    echo "<li>{$row3['cecha']}</li>";
                }
                ?>
            </ul>
        </section>
        <section>
            <h2>Dziecko</h2>
            <ul>
                <?php
                $query3_3 = "SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = Abonamenty_id JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 3;";
                $result3 = mysqli_query($connect, $query3_3);
                while ($row3 = mysqli_fetch_array($result3)) {
                    echo "<li>{$row3['cecha']}</li>";
                }
                mysqli_close($connect);
                ?>
            </ul>
        </section>
    </main>
    <footer>
        <p><img src="obraz2.png" alt="przychodnia">Stronę przygotował: Chr1skyy</p>
    </footer>
</body>

</html>