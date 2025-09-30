<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>BIBLIOTEKA SZKOLNA</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h2>STRONA BIBLIOTEKI SZKOLNEJ WIEDZAMIN</h2>
    </header>
    <section>
        <h3>Nasze dzisiejsze propozycje:</h3>
        <table>
            <tr>
                <th>Autor</th>
                <th>Tytuł</th>
                <th>Katalog</th>
            </tr>
            <?php
            $connect = mysqli_connect("localhost", "root", "", "biblioteka");
            $query = "SELECT autor, tytul, kod FROM ksiazki ORDER BY RAND() LIMIT 5;";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>
                        <td>{$row['autor']}</td>
                        <td>{$row['tytul']}</td>
                        <td>{$row['kod']}</td>
                </tr>";
            }
            mysqli_close($connect);
            ?>
        </table>
    </section>
    <main>
        <article>
            <img src="ksiazka1.jpg" alt="okładka książki">
            <p>Według różnych podań najpaskudniejsza ropucha nosi w głowie piękny, cenny klejnot.</p>
        </article>
        <article>
            <img src="ksiazka2.jpg" alt="okładka książki">
            <p>Panna Stefcia i Maryla nie są to zbyt grzeczne damy, nawet nie słuchają mamy...</p>
        </article>
        <article>
            <img src="ksiazka3.jpg" alt="okładka książki">
            <p>Ratuj mnie, przyjacielu, w ostatniej potrzebie: Kocham piękną Irenę. Rodzice i ona...</p>
        </article>
    </main>
    <footer>Stronę wykonał: Chr1skyy</footer>
</body>

</html>