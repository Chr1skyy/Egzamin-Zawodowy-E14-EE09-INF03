<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Organizer</title>
    <link rel="stylesheet" href="./styl5.css">
</head>

<body>
    <header>
        <section id="bannerOne">
            <img src="./logo1.png" alt="Mój kalendarz">
        </section>
        <section id="bannerTwo">
            <h2>KALENDARZ</h2>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'egzamin5');
            $q = "SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-07-01';";
            $res = mysqli_query($con, $q);
            while ($row = mysqli_fetch_array($res)) {
                echo "<h1>miesiąc: $row[0], rok: $row[1]</h1>";
            }
            ?>
        </section>
    </header>
    <main>
        <?php
        $q = "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'lipiec';";
        $res = mysqli_query($con, $q);
        while ($row = mysqli_fetch_array($res)) {
            echo "<div class='dzien'>
                    <h5>$row[0]</h5>
                    <p>$row[1]</p>
                </div>";
        }
        ?>
    </main>
    <footer>
        <form action="./kalendarz.php" method="POST">
            <label>dodaj wpis:
                <input type="text" name="wpis">
            </label>
            <button name="wyslij">DODAJ</button>
        </form>
        <?php
        if (isset($_POST['wyslij'])) {
            $wpis = $_POST['wpis'];
            $con = mysqli_connect('localhost', 'root', '', 'egzamin5');
            $q = "UPDATE zadania SET wpis = '$wpis' WHERE dataZadania = '2020-07-13';";
            mysqli_query($con, $q);
        }
        mysqli_close($con);
        ?>
        <p>Stronę wykonał: Chriskyy#0181</p>
    </footer>
</body>

</html>