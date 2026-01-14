<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Zdrowy bazarek</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Zdrowy bazarek</h1>
    </header>
    <nav>
    <?php
    $connect = mysqli_connect("localhost", "root", "", "bazar");
    $query1 = "SELECT nazwa, plik FROM towar LIMIT 10;";
    $result = mysqli_query($connect, $query1);
    while ($row = mysqli_fetch_array($result)) {
        echo "<img src='{$row['plik']}' alt='{$row['nazwa']}'>";
    }
    ?>
    </nav>
    <main>
        <aside>
            <img src="market.png" alt="bazarek">
        </aside>
        <section>
            <p>Wybierz owoc lub warzywo i podaj jego wagę</p>
            <form action="index.php" method="POST">
                <select name="towar">
                <?php
                $query2 = "SELECT id, nazwa FROM towar;";
                $result = mysqli_query($connect, $query2);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='{$row['id']}'>{$row['nazwa']}</option>";
                }
                ?>
                </select>
                <input type="number" step="1" name="waga">
                <button name="submit">Zamów</button>
            </form>
            <?php
            if (isset($_POST['submit'])) {
                $id_towaru = $_POST['towar'];
                $waga = $_POST['waga'];
                $query3 = "SELECT rodzaj, nazwa, cena FROM towar WHERE id = $id_towaru;";
                $result = mysqli_query($connect, $query3);
                $row = mysqli_fetch_array($result);
                $wartosc = $waga * intval($row['cena']);
                echo "<p>{$row['rodzaj']} {$row['nazwa']} wartość $wartosc zł</p>";
                $query4 = "INSERT INTO zamowienie VALUES (NULL, $id_towaru, 2, $waga);";
                mysqli_query($connect, $query4);
            }
            mysqli_close($connect);
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę opracował: Chr1skyy</p>
    </footer>
</body>

</html>