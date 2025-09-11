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
        <form action="zamow.php" method="POST">
            <label for="model">Model:</label>
            <select class="kontrolki" name="model" id="model">
                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'obuwie');
                $query1 = "SELECT model FROM produkt;";
                $result1 = mysqli_query($connect, $query1);
                while ($row = mysqli_fetch_array($result1)) {
                    echo "<option>{$row['model']}</option>";
                }
                ?>
            </select>
            <label for="rozmiar">Rozmiar:</label>
            <select class="kontrolki" name="rozmiar" id="rozmiar">
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
            </select>
            <label for="pary">Liczba par:</label><input class="kontrolki" type="number" name="pary" id="pary">
            <button class="kontrolki" name="przycisk">Zamów</button>
        </form>
        <?php
        $query2 = "SELECT buty.model, buty.nazwa, buty.cena, produkt.nazwa_pliku FROM buty JOIN produkt ON buty.model = produkt.model;";
        $result2 = mysqli_query($connect, $query2);
        while ($row = mysqli_fetch_array($result2)) {
            echo "<div class='buty'><img src='{$row['nazwa_pliku']}' alt='but męski'><h2>{$row['nazwa']}</h2><h5>Model: {$row['model']}</h5><h4>Cena: {$row['cena']}</h4></div>";
        }
        mysqli_close($connect);
        ?>
    </main>
    <footer>
        <p>Autor strony: Chr1skyy</p>
    </footer>
</body>

</html>