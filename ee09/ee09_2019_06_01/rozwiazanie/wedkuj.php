<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Wędkujemy</title>
	<link rel="stylesheet" href="styl_1.css" />
</head>
<body>
	<div id="baner">
		<h1>Portal dla wędkarzy</h1>
	</div>
	<div id="lewy">
		<h2>Ryby drapieżne naszych wód</h2>
		<ul>
		<?php
		$polaczenie = mysqli_connect('localhost', 'root', '', 'wedkowanie');
		$zapytanie = "SELECT nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1;";
		$wynik = mysqli_query($polaczenie, $zapytanie);
		while ($wiersz = mysqli_fetch_array($wynik)) {
			echo "<li>{$wiersz['nazwa']}, występowanie: {$wiersz['wystepowanie']}</li>";
		}
		mysqli_close($polaczenie);
		?>
		</ul>
	</div>
	<div id="prawy">
		<img src="ryba1.jpg" alt="Sum" /><br/>
		<a href="kwerendy.txt">Pobierz kwerendy</a>
	</div>
	<div id="stopka">
		<p>Stronę wykonał: Chr1skyy</p>
	</div>
</body>
</html>