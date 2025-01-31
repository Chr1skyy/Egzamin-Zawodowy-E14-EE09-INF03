<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Pokoje</title>
    <link rel="stylesheet" href="./styl.css">
</head>

<body>
    <header>
        <h2>WYNAJEM POKOI</h2>
    </header>
    <nav>
        <section id="menuOne">
            <a href="./index.html">POKOJE</a>
        </section>
        <section id="menuTwo">
            <a href="./cennik.php">CENNIK</a>
        </section>
        <section id="menuThree">
            <a href="./kalkulator.html">KALKULATOR</a>
        </section>
    </nav>
    <section id="bannerTwo"></section>
    <main>
        <section id="panelLewy">
        </section>
        <section id="panelSrodkowy">
            <h1>Cennik</h1>
            <table>
                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'wynajem');
                $query = "SELECT * FROM pokoje";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nazwa']}</td>
                            <td>{$row['cena']}</td>
                        </tr>";
                }
                mysqli_close($connect);
                ?>
            </table>
        </section>
        <section id="panelPrawy">
        </section>
    </main>
    <footer>
        <p>Stronę opracował: Chr1skyy</p>
    </footer>
</body>

</html>