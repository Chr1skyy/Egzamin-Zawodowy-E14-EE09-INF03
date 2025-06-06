<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Obuwie męskie</h1>
    </header>
    <main>
        <h2>Zamówienie</h2>
        <?php
        if (isset($_POST["przycisk"]) && !empty($_POST['pary'])) {
            $connect = mysqli_connect('localhost', 'root', '', 'obuwie');
            $model = $_POST["model"];
            $rozmiar = $_POST["rozmiar"];
            $pary = $_POST["pary"];
            $query = "SELECT buty.nazwa, buty.cena, produkt.kolor, produkt.kod_produktu, produkt.material, produkt.nazwa_pliku FROM buty JOIN produkt ON buty.model = produkt.model WHERE buty.model = '{$model}';";
            $result = mysqli_query($connect, $query);
            $row = mysqli_fetch_array($result);
            echo "<img src='{$row['nazwa_pliku']}' alt='but męski'>";
            echo "<h2>{$row['nazwa']}</h2>";
            $wartosc = $pary * $row['cena'];
            echo "<p>cena za {$pary} par: {$wartosc} zł</p>";
            echo "<p>Szczegóły produktu: {$row['kolor']}, {$row['material']}</p>";
            echo "<p>Rozmiar: {$rozmiar}</p>";
            mysqli_close($connect);
        }
        ?>
        <a href="index.php">Strona główna</a>
    </main>
    <footer>
        <p>Autor strony: Chr1skyy</p>
    </footer>
</body>

</html>