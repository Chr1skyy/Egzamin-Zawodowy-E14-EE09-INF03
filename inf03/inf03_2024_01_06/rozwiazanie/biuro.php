<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Poznaj Europę</title>
    <link rel="stylesheet" href="styl9.css">
</head>

<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <main>
        <section id="left">
            <h2>Promocje</h2>
				<table>
					<tr>
						<td>Warszawa</td>
						<td>od 600 zł</td>
					</tr>
					<tr>
						<td>Wenecja</td>
						<td>od 1200 zł</td>
					</tr>
					<tr>
						<td>Paryż</td>
						<td>od 1200 zł</td>
					</tr>
				</table>
        </section>
        <section id="mid">
            <h2>W tym roku jedziemy do...</h2>
            <?php
            // Skrypt 1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'podroze');
            $zapytanie1 = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis ASC;";
            $wynik1 = mysqli_query($polaczenie, $zapytanie1);
            while ($wiersz = mysqli_fetch_array($wynik1)) {
                echo "<img src='img/{$wiersz['nazwaPliku']}' alt='{$wiersz['podpis']}' title='{$wiersz['podpis']}'>";
            }
            ?>
        </section>
        <section id="right">
            <h2>Kontakt</h2>
            <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
            <p>telefon: 444555666</p>
        </section>
    </main>
    <section id="dane">
        <h3>W poprzednich latach byliśmy...</h3>
        <ol>
            <?php
            // Skrypt 2
            $zapytanie2 = "SELECT cel, dataWyjazdu FROM wycieczki WHERE dostepna = 0;";
            $wynik2 = mysqli_query($polaczenie, $zapytanie2);
            while ($wiersz = mysqli_fetch_array($wynik2)) {
                echo "<li>Dnia {$wiersz['dataWyjazdu']} pojechaliśmy do {$wiersz['cel']}</li>";
            }
            mysqli_close($polaczenie);
            ?>
        </ol>
    </section>
    <footer>
        <p>Stronę wykonał: Chriskyy</p>
    </footer>
</body>

</html>
