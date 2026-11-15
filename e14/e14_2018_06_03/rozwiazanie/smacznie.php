<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Bar Smacznie i Miło</title>
	<link rel="stylesheet" href="styl3.css" />
</head>

<body>
	<header>
		<img src="menu.jpg">
		<h1>Bar Smacznie i Miło juz otwarty!</h1>
		<img src="menu.jpg">
	</header>
	<main>
		<section id="lewy">
			<h2>Dania mięsne</h2>
			<?php
			// Skrypt 1
			$polaczenie = mysqli_connect('localhost', 'root', '', 'baza');
			$zapytanie2 = "SELECT nazwa, cena FROM dania WHERE typ = 2";
			$wynik2 = mysqli_query($polaczenie, $zapytanie2);
			while ($wiersz = mysqli_fetch_array($wynik2)) {
				echo "<p>{$wiersz['nazwa']} {$wiersz['cena']} zł</p>";
			}
			?>
		</section>
		<section id="srodkowy">
			<h2>Zupy</h2>
			<?php
			// Skrypt 2
			$zapytanie2 = "SELECT nazwa, cena FROM dania WHERE typ = 1";
			$wynik2 = mysqli_query($polaczenie, $zapytanie2);
			while ($wiersz = mysqli_fetch_array($wynik2)) {
				echo "<p>{$wiersz['nazwa']} {$wiersz['cena']} zł</p>";
			}
			?>
		</section>
		<section id="prawy">
			<?php
			// Skrypt 3
			$zapytanie3 = "SELECT AVG(cena) AS AvgCena FROM dania WHERE typ = 1";
			$wynik3 = mysqli_query($polaczenie, $zapytanie3);
			$wiersz = mysqli_fetch_array($wynik3);
			?>
			<p>Średnia cena naszej zupy to <?php echo $wiersz['AvgCena']; ?> zł</p>
			<ol>
				<li>Obiady od 40 zł</li>
				<li>Przekąski od 10 zł</li>
				<li>Kolacje od 20 zł</li>
			</ol>
		</section>
	</main>
	<footer>
		Stronę internetową opracował: <b>Chr1skyy</b>
	</footer>
	<?php mysqli_close($polaczenie); ?>
</body>

</html>