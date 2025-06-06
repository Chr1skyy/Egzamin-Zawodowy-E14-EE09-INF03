<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Firma szkoleniowa</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <section id="kontener">
        <header>
            <img src="baner.jpg" alt="Szkolenia" />
        </header>
        <section id="kontener2">
            <nav>
                <ul>
                    <li><a href="index.html">Strona główna</a></li>
                    <li><a href="szkolenia.php">Szkolenia</a></li>
                </ul>
            </nav>
            <main>
                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'firma');
                $query = "SELECT Data, Temat FROM szkolenia ORDER BY Data ASC;";
                $result = mysqli_query($connect, $query);
                $plik = fopen('harmonogram.txt', 'w');
                while ($row = mysqli_fetch_array($result)) {
                    echo "<p>{$row['Data']} {$row['Temat']}</p>";
                    fwrite($plik, "{$row['Data']} {$row['Temat']}\n");
                }
                fclose($plik);
                mysqli_close($connect);
                ?>
            </main>
        </section>
        <footer>
            <h2>Firma szkoleniowa, ul. Główna 1, 23-456 Warszawa</h2>
            <p>Autor: Chr1skyy</p>
        </footer>
    </section>
</body>

</html>