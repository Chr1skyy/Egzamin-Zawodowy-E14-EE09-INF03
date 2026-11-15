<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Blog kulinarny</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <aside>
        <a href="przepisy.php?id=1">Sernik</a><br>
        <a href="przepisy.php?id=2">Sałatka</a><br>
        <a href="przepisy.php?id=3">Pankejki</a><br>
        <a href="przepisy.php?id=4">Nugetsy</a><br>
        <a href="przepisy.php?id=5">Łosoś</a><br>
        <a href="przepisy.php?id=6">Kociołek</a><br>
        <a href="przepisy.php?id=7">Jagnięcina</a><br>
        <a href="przepisy.php?id=8">Hamburgery</a><br>
        <a href="przepisy.php?id=9">Eklerki</a><br>
        <a href="przepisy.php?id=10">Churros</a>
        <p>Autor: Chr1skyy</p>
    </aside>
    <main>
        <?php
        $id = 7;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $polaczenie = mysqli_connect('localhost', 'root', '', 'przepisy');

        // Skrypt 1
        $zapytanie2 = "SELECT potrawy.nazwa, rodzaje.rodzaj FROM potrawy JOIN rodzaje ON potrawy.idRodzaje = rodzaje.idRodzaje WHERE potrawy.idPotrawy = $id;";
        $wynik2 = mysqli_query($polaczenie, $zapytanie2);
        $wiersz = mysqli_fetch_array($wynik2);
        echo "<h1>{$wiersz['rodzaj']}</h1>";

        // Skrypt 2
        $zapytanie1 = "SELECT nazwa, trudnosc, kalorie FROM potrawy WHERE idPotrawy = $id;";
        $wynik1 = mysqli_query($polaczenie, $zapytanie1);
        $wiersz = mysqli_fetch_array($wynik1);
        echo "<h2>{$wiersz['nazwa']}</h2>";
        if ($wiersz['trudnosc'] == 1) {
            $trudnosc = 'łatwe';
        } else if ($wiersz['trudnosc'] == 2) {
            $trudnosc = 'średnie';
        } else {
            $trudnosc = 'trudne';
        }
        echo "<p>Trudność: $trudnosc, Kalorie: {$wiersz['kalorie']}</p>";
        ?>
        <img src="img/separator.png" alt="przepis">
        <p>Alergeny:
            <?php
            // Skrypt 3
            $zapytanie3 = "SELECT alergeny.alergen FROM potrawy JOIN lista_alergenow ON potrawy.idPotrawy = lista_alergenow.idPotrawy JOIN alergeny ON lista_alergenow.idAlergeny = alergeny.idAlergeny WHERE potrawy.idPotrawy = $id;";
            $wynik3 = mysqli_query($polaczenie, $zapytanie3);
            while ($wiersz = mysqli_fetch_array($wynik3)) {
                echo "{$wiersz['alergen']} ";
            }
            ?>
        </p>
        <h2>Składniki</h2>
        <ul>
            <li>Lorem 1 kg</li>
            <li>Ipsum 2 szt.</li>
            <li>Dolor 200 g</li>
            <li>Sit amet (szczypta)</li>
        </ul>
        <?php
        // Skrypt 4
        $zapytanie4 = "SELECT przepis, plik FROM potrawy WHERE idPotrawy = $id;";
        $wynik4 = mysqli_query($polaczenie, $zapytanie4);
        $wiersz = mysqli_fetch_array($wynik4);
        ?>
        <p><?php echo $wiersz['przepis']; ?></p>
    </main>
    <section style="background-image: url('img/<?php echo $wiersz['plik']; ?>')">
        <h1>Blog Kulinarny</h1>
    </section>
    <?php mysqli_close($polaczenie); ?>
</body>

</html>