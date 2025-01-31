<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Zadania na lipiec</title>
    <link rel="stylesheet" href="styl6.css">
</head>

<body>
    <header>
        <section id="header1">
            <img src="logo1.png" alt="lipiec">
        </section>
        <section id="header2">
            <h1>TERMINARZ</h1>
            <p>najbliższe zadania:
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'terminarz');
                $q = "SELECT DISTINCT wpis FROM zadania WHERE dataZadania BETWEEN '2020-07-01' AND '2020-07-07' AND wpis != '';";
                $res = mysqli_query($con, $q);
                while ($row = mysqli_fetch_array($res)) {
                    echo "$row[0]; ";
                }
                ?>
            </p>
        </section>
    </header>
    <main>
        <?php
        $q = "SELECT dataZadania, wpis FROM zadania WHERE MONTH(dataZadania) = 7;";
        $res = mysqli_query($con, $q);
        while ($row = mysqli_fetch_array($res)) {
            echo "<section class='kalendarz'>
                <h6>$row[0]</h6>
                <p>$row[1]</p>
                </section>";
        }
        mysqli_close($con);
        ?>
    </main>
    <footer>
        <a href="sierpien.html">Terminarz na sierpień</a>
        <p>Stronę wykonał: Chriskyy</p>
    </footer>
</body>

</html>