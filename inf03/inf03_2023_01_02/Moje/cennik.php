<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynajem pokoi</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <section class="baner">
        <h1>Pensjonat pod dobrym humorem</h1>
    </section>
    <section class="b_lewy">
        <a href="index.html">GŁÓWNA</a>
        <img src="dane/1.jpeg" alt="pokoje">
    </section>
    <section class="b_srod">
        <a href="cennik.php">CENNIK</a>
        <table>
            <?php
                $db = mysqli_connect("localhost", "root","", "wynajem");
                $sql = "Select * from pokoje";
                $result = $db->query($sql);
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["nazwa"]."</td>
                        <td>".$row["cena"]."</td>
                    </tr>";
                }
                mysqli_close($db);
            ?>
        </table>
    </section>
    <section class="b_prawy">
        <a href="kalkulator.html">KALKULATOR</a>
        <img src="dane/3.jpeg" alt="pokoje">
    </section>
    <section class="stopka">
        <p>Stronę opracował: Jan Stelmach</p>
    </section>
    
</body>
</html>