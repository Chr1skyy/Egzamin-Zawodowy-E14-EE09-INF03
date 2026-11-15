<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Restauracja Kulinaria.pl</title>
	<link rel="stylesheet" href="styl4.css" />
</head>

<body>
	<header>
		<h2>Restauracja Kulinaria.pl Zaprasza!</h2>
	</header>
	<main>
		<section id="lewy">
			<p>Dania mięsne zamówiesz już od
				<?php
				// Skrypt 1
				$polaczenie = mysqli_connect('localhost', 'root', '', 'baza');
				$zapytanie3 = "SELECT MIN(cena) AS MinCena FROM dania WHERE typ = 2";
				$wynik3 = mysqli_query($polaczenie, $zapytanie3);
				$wiersz = mysqli_fetch_array($wynik3);
				echo $wiersz['MinCena'];
				?>
				złotych
			</p>
			<img src="menu.jpg" alt="Pyszne spaghetti" />
			<br />
			<a href="menu.jpg">Pobierz obraz</a>
		</section>
		<section id="srodkowy">
			<h3>Przekąski</h3>
			<?php
			// Skrypt 2
			$zapytanie2 = "SELECT id, nazwa, cena FROM dania WHERE typ = 3";
			$wynik2 = mysqli_query($polaczenie, $zapytanie2);
			while ($wiersz = mysqli_fetch_array($wynik2)) {
				echo "<p>{$wiersz['id']} {$wiersz['nazwa']} {$wiersz['cena']}</p>";
			}
			?>
		</section>
		<section id="prawy">
			<h3>Napoje</h3>
			<?php
			// Skrypt 3
			$zapytanie2 = "SELECT id, nazwa, cena FROM dania WHERE typ = 4";
			$wynik2 = mysqli_query($polaczenie, $zapytanie2);
			while ($wiersz = mysqli_fetch_array($wynik2)) {
				echo "<p>{$wiersz['id']} {$wiersz['nazwa']} {$wiersz['cena']}</p>";
			}
			mysqli_close($polaczenie);
			?>
		</section>
	</main>
	<footer>
		Stronę internetową opracował: <i>Chr1skyy</i>
	</footer>
</body>

</html>