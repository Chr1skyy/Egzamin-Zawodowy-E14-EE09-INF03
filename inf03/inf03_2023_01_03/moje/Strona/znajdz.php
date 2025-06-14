<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwiaty</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <section class="baner">
        <h1>Grupa Polskich Kwiaciarni</h1>
    </section>

    <section class="lewy">
        <h2>Menu</h2>
        <ol>
            <li>
                <a href="index.html">Strona główna</a>
            </li>
            <li>
                <a href="https://www.kwiaty.pl/" target="_blank">Rozpoznaj kwiaty</a>
            </li>
            <li>
                <a href="znajdz.php">Znajdź kwiaciarnię</a>
                <ul>
                    <li>W Warszawie</li>
                    <li>w Malborku</li>
                    <li>w Poznaniu</li>
                </ul>
            </li>
        </ol>
    </section>
    <section class="prawy">
        <h2>Znajdź kwiaciarnię</h2>
        <form method="POST" action="znajdz.php">

            <label for="pole">Podaj nazwę miasta:</label>
            <input type="text" name="pole">

            <button type="submit">SPRAWDŹ</button>
            
                <?php

                    $conn = mysqli_connect("localhost","root","","kwiaciarnia");

                    $pole = $_POST["pole"] ?? "";

                    $sql = "SELECT k.nazwa, k.ulica
                    FROM kwiaciarnie as k
                    WHERE k.miasto ="."'".$pole."' LIMIT 1;";

                    $wynik_zapytania = $conn->query($sql);

                    $row = $wynik_zapytania -> fetch_assoc();
                    echo "<h3>".$row["nazwa"].", ".$row["ulica"]."</h3>";

                    mysqli_close($conn);

                ?>
            

        </form>
        
    </section>

    <section class="stopka">
        <p>Stronę opracował: Jan Stelmach</p>
    </section>
    
</body>
</html>