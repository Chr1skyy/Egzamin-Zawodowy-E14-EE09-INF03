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
        $connect = mysqli_connect('localhost', 'root', '', 'przepisy');
        $query2 = "SELECT potrawy.nazwa, rodzaje.rodzaj FROM potrawy JOIN rodzaje ON potrawy.idRodzaje = rodzaje.idRodzaje WHERE potrawy.idPotrawy = $id;";
        $result = mysqli_query($connect, $query2);
        $row = mysqli_fetch_array($result);
        ?>
        <h1><?php echo $row['rodzaj']; ?></h1>
        <?php
        $query1 = "SELECT nazwa, trudnosc, kalorie FROM potrawy WHERE idPotrawy = $id;";
        $result = mysqli_query($connect, $query1);
        $row = mysqli_fetch_array($result);
        echo "<h2>{$row['nazwa']}</h2>";
        if ($row['trudnosc'] == 1) $row['trudnosc'] = 'łatwe';
        if ($row['trudnosc'] == 2) $row['trudnosc'] = 'średnie';
        if ($row['trudnosc'] == 3) $row['trudnosc'] = 'trudne';
        echo "<p>Trudność: {$row['trudnosc']}, Kalorie: {$row['kalorie']}</p>";
        ?>
        <img src="separator.png" alt="przepis">
        <p>Alergeny:
            <?php
            $query3 = "SELECT potrawy.nazwa, alergeny.alergen FROM potrawy JOIN lista_alergenow ON potrawy.idPotrawy = lista_alergenow.idPotrawy JOIN alergeny ON lista_alergenow.idAlergeny = alergeny.idAlergeny WHERE potrawy.idPotrawy = $id;";
            $result = mysqli_query($connect, $query3);
            while ($row = mysqli_fetch_array($result)) {
                echo "{$row['alergen']} ";
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
        <p>
            <?php
            $query4 = "SELECT przepis, plik FROM potrawy WHERE idPotrawy = $id;";
            $result = mysqli_query($connect, $query4);
            $row = mysqli_fetch_array($result);
            echo $row['przepis'];
            ?>
        </p>
    </main>
    <section style="background-image: url('<?= $row['plik'] ?>')">
        <h1>Blog kulinarny</h1>
    </section>
</body>

</html>