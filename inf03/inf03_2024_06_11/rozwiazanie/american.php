<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>
    <main>
        <nav>
            <a href="peruwianka.php">Rasa Peruwianka</a>
            <a href="american.php">Rasa American</a>
            <a href="crested.php">Rasa Crested</a>
        </nav>
        <aside>
            <h3>Poznaj wszystkie rasy świnek morskich</h3>
            <ol>
                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'hodowla');
                $query1 = "SELECT rasa FROM rasy";
                $result1 = mysqli_query($connect, $query1);
                while ($row = mysqli_fetch_array($result1)) {
                    echo "<li>$row[0]</li>";
                }
                ?>
            </ol>
        </aside>
        <section>
            <img src="peruwianka.jpg" alt="Świnka morska rasy peruwianka">
            <?php
            $query2 = "SELECT DISTINCT data_ur, miot, rasa FROM swinki JOIN rasy ON swinki.rasy_id = rasy.id WHERE rasy_id = 6";
            $result2 = mysqli_query($connect, $query2);
            while ($row = mysqli_fetch_array($result2)) {
                echo "<h2>Rasa: $row[2]</h2>";
                echo "<p>Data urodzenia: $row[0]</p>";
                echo "<p>Oznaczenie miotu: $row[1]</p>";
            }
            ?>
            <hr>
            <h2>Świnki w tym miocie</h2>
            <?php
            $query3 = "SELECT imie, cena, opis FROM swinki WHERE rasy_id = 6";
            $result3 = mysqli_query($connect, $query3);
            while ($row = mysqli_fetch_array($result3)) {
                echo "<h3>$row[0] - $row[1] zł</h3>";
                echo "<p>$row[2]</p>";
            }
            mysqli_close($connect);
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Chriskyy</p>
    </footer>
</body>

</html>