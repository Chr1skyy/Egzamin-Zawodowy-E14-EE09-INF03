<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Organizer</title>
    <link rel="stylesheet" href="./styl6.css">
</head>

<body>
    <header>
        <section id="bannerOne">
            <h2>MÓJ ORGANIZER</h2>
        </section>
        <section id="bannerTwo">
            <form action="./organizer.php" method="POST">
                <label>Wpis wydarzenia:
                    <input type="text" name="wpis">
                </label>
                <button name="wyslij">ZAPISZ</button>
            </form>
            <?php
            if (isset($_POST['wyslij'])) {
                $wpis = $_POST['wpis'];
                $con = mysqli_connect('localhost', 'root', '', 'egzamin6');
                $q = "UPDATE zadania SET wpis = '$wpis' WHERE dataZadania = '2020-08-27';";
                mysqli_query($con, $q);
            }
            ?>
        </section>
        <section id="bannerThree">
            <img src="./logo2.png" alt="Mój organizer">
        </section>
    </header>
    <main>
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'egzamin6');
        $q = "SELECT dataZadania, miesiac, wpis FROM zadania WHERE miesiac = 'sierpien';";
        $res = mysqli_query($con, $q);
        while ($row = mysqli_fetch_array($res)) {
            echo "<div class='dzien'>
                    <h6>$row[0], $row[1]</h6>
                    <p>$row[2]</p>
                </div>";
        }
        ?>
    </main>
    <footer>
        <?php
        $q = "SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-08-01';";
        $res = mysqli_query($con, $q);
        while ($row = mysqli_fetch_array($res)) {
            echo "<h1>miesiąc: $row[0], rok: $row[1]</h1>";
        }
        mysqli_close($con);
        ?>
        <p>Stronę wykonał: Chriskyy#0181</p>
    </footer>
</body>

</html>