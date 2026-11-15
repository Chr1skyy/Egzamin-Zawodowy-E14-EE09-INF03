<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="utf-8" />
	<title>Wędkowanie</title>
	<link rel="stylesheet" href="styl_1.css" />
</head>
<body>
	<header>
		<h1>Portal dla wędkarzy</h1>
	</header>
	<main>
		<section id="lewy1">
			<h3>Ryby zamieszkujące rzeki</h3>
			<ol>
				<?php
				// Skrypt 1
				$polaczenie = mysqli_connect('localhost', 'root', '', 'wedkowanie');
				$zapytanie3 = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby INNER JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj = 3;";
				$wynik3 = mysqli_query($polaczenie, $zapytanie3);
				while ($wiersz = mysqli_fetch_array($wynik3)) {
					echo "<li>{$wiersz['nazwa']} pływa w rzece {$wiersz['akwen']}, {$wiersz['wojewodztwo']}</li>";
				}
				?>
			</ol>
		</section>
		<section id="prawy">
			<img src="ryba1.jpg" alt="Sum" /><br/>
			<a href="kwerendy.txt">Pobierz kwerendy</a>
		</section>
		<section id="lewy2">
			<h3>Ryby drapieżne naszych wód</h3>
			<table>
				<tr>
					<th>L.p.</th>
					<th>Gatunek</th>
					<th>Występowanie</th>
				</tr>
				<?php
				// Skrypt 2
				$zapytanie1 = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1;";
				$wynik1 = mysqli_query($polaczenie, $zapytanie1);
				while ($wiersz = mysqli_fetch_array($wynik1)) {
					echo "<tr><td>{$wiersz['id']}</td><td>{$wiersz['nazwa']}</td><td>{$wiersz['wystepowanie']}</td></tr>";
				}
				mysqli_close($polaczenie);
				?>
			</table>
		</section>
	</main>
	<footer>
		<p>Stronę wykonał: Chr1skyy
	</footer>
</body>
</html>