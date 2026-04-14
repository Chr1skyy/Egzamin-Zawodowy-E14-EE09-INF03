<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wykaz chorób</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Informacja o chorobach w Polsce</h1>
    </header>
    <nav>
        <a href="https://szpitale.pl/" target="_blank">Szpitale</a>
        <a href="https://www.przychodnie.pl/" target="_blank">Przychodnie</a>
        <a href="https://www.nfz.gov.pl/" target="_blank">NFZ</a>
    </nav>
    <main>
        <section id="left">
            <h2>Choroby zakaźne</h2>
            <ol>
                <?php
                $connect = mysqli_connect("localhost", "root", "", "choroby");
                $query1 = "SELECT nazwa FROM choroby WHERE zakazna = 'T' ORDER BY nazwa;";
                $result = mysqli_query($connect, $query1);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<li>{$row['nazwa']}</li>";
                }
                ?>
            </ol>
        </section>
        <section id="right">
            <h2>Objawy chorób</h2>
            <form action="zdrowie.php" method="POST">
                <select name="choroba">
                    <?php
                    $query2 = "SELECT id, nazwa FROM choroby;";
                    $result = mysqli_query($connect, $query2);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='{$row['id']}'>{$row['nazwa']}</option>";
                    }
                    ?>
                </select>
                <button type="submit" name="submit">Sprawdź</button>
            </form>
            <div id="result">
                <?php
                if (isset($_POST['submit'])) {
                    $id = $_POST['choroba'];
                    $query3 = "SELECT objawy.nazwa FROM objawy JOIN choroby_objawy ON objawy.id = choroby_objawy.id_objawy WHERE choroby_objawy.id_choroby = $id;";
                    $result = mysqli_query($connect, $query3);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<span>{$row['nazwa']} </span>";
                    }
                }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <p>Stronę opracował: Chr1skyy</p>
    </footer>
    <img src="zdrowia.png" alt="Życzymy zdrowia!">
    <?php mysqli_close($connect); ?>
</body>

</html>