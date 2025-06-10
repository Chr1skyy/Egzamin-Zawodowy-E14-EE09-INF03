<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <?php
        for ($i = 0; $i < 20; $i++) {
            echo "<img src='obraz.png'>";
        }
        ?>
    </header>
    <div id="container">
        <section id="sekcjaPierwsza">
            <h2>Liryka</h2>
            <form action="biblioteka.php" method="POST">
                <select name="liryka">
                    <?php
                    $connect = mysqli_connect("localhost", "root", "", "biblioteka");
                    $query1 = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'liryka';";
                    $result1 = mysqli_query($connect, $query1);
                    while ($row = mysqli_fetch_array($result1)) {
                        echo "<option value='{$row['id']}'>{$row['tytul']}</option>";
                    }
                    ?>
                </select>
            </form>
            <button name="rezerwujLiryka">Rezerwuj</button>
            <?php
            if (isset($_POST["rezerwujLiryka"])) {
                $id = $_POST["liryka"];
                $query2 = "SELECT tytul FROM ksiazka WHERE id = $id;";
                $result2 = mysqli_query($connect, $query2);
                $row = mysqli_fetch_array($result2);
                echo "<p>Książka {$row['tytul']} została zarezerwowana</p>";
                $query3 = "UPDATE ksiazka SET rezerwacja = 1 WHERE id = $id;";
                mysqli_query($connect, $query3);
            }
            ?>
        </section>
        <section id="sekcjaDruga">
            <h2>Epika</h2>
            <form action="biblioteka.php" method="POST">
                <select name="epika">
                    <?php
                    $query3 = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'epika';";
                    $result3 = mysqli_query($connect, $query3);
                    while ($row = mysqli_fetch_array($result3)) {
                        echo "<option value='{$row['id']}'>{$row['tytul']}</option>";
                    }
                    ?>
                </select>
                <button name="rezerwujEpika">Rezerwuj</button>
            </form>
            <?php
            if (isset($_POST["rezerwujEpika"])) {
                $id = $_POST["epika"];
                $query4 = "SELECT tytul FROM ksiazka WHERE id = $id;";
                $result4 = mysqli_query($connect, $query4);
                $row = mysqli_fetch_array($result4);
                echo "<p>Książka {$row['tytul']} została zarezerwowana</p>";
                $query5 = "UPDATE ksiazka SET rezerwacja = 1 WHERE id = $id;";
                mysqli_query($connect, $query5);
            }
            ?>
        </section>
        <section id="sekcjaTrzecia">
            <h2>Dramat</h2>
            <form action="biblioteka.php" method="POST">
                <select name="dramat">
                    <?php
                    $query6 = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'dramat';";
                    $result6 = mysqli_query($connect, $query6);
                    while ($row = mysqli_fetch_array($result6)) {
                        echo "<option value='{$row['id']}'>{$row['tytul']}</option>";
                    }
                    ?>
                </select>
                <button name="rezerwujDramat">Rezerwuj</button>
            </form>
            <?php
            if (isset($_POST["rezerwujDramat"])) {
                $id = $_POST["dramat"];
                $query7 = "SELECT tytul FROM ksiazka WHERE id = $id;";
                $result7 = mysqli_query($connect, $query7);
                $row = mysqli_fetch_array($result7);
                echo "<p>Książka {$row['tytul']} została zarezerwowana</p>";
                $query8 = "UPDATE ksiazka SET rezerwacja = 1 WHERE id = $id;";
                mysqli_query($connect, $query8);
            }
            ?>
        </section>
        <section id="sekcjaCzwarta">
            <h2>Zaległe książki</h2>
            <ul>
                <?php
                $query9 = "SELECT tytul, id_cz, data_odd FROM ksiazka JOIN wypozyczenia ON ksiazka.id = wypozyczenia.id_ks ORDER BY data_odd ASC LIMIT 15;";
                $result9 = mysqli_query($connect, $query9);
                while ($row = mysqli_fetch_array($result9)) {
                    echo "<li>{$row['tytul']} {$row['id_cz']} {$row['data_odd']}</li>";
                }
                mysqli_close($connect);
                ?>
            </ul>
        </section>
    </div>
    <footer>
        <p><strong>Autor: Chr1skyy</strong></p>
    </footer>
</body>

</html>
