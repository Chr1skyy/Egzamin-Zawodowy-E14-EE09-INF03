<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Lista przyjaciół</title>
	<link rel="stylesheet" href="styl.css" />
</head>
<body>
	<div id="baner">
		<h1>Portal Społecznościowy - moje konto</h1>
	</div>
	<div id="glowny">
		<h2>Moje zainteresowania</h2>
		<ul>
			<li>muzyka</li>
			<li>film</li>
			<li>komputery</li>
		</ul>
		<h2>Moi znajomi</h2>
		<?php
		$polaczenie = mysqli_connect('localhost', 'root', '', 'dane');
		$zapytanie = "SELECT imie, nazwisko, opis, zdjecie FROM osoby WHERE Hobby_id IN (1, 2 ,6);";
		$wynik = mysqli_query($polaczenie, $zapytanie);
		while($wiersz = mysqli_fetch_array($wynik)) {
			echo "<div class='zdjecie'>
			<img src='img/{$wiersz['zdjecie']}' alt='przyjaciel' />
			</div>
			<div class='opis'>
			<h3>{$wiersz['imie']} {$wiersz['nazwisko']}</h3>
			<p>Ostatni wpis: {$wiersz['opis']}</p>
			</div>
			<div class='linia'>
			<hr/>
			</div>";
		}
		mysqli_close($polaczenie);
		?>
	</div>
	<div id="stopka1">
		Stronę wykonał: Chr1skyy
	</div>
	<div id="stopka2">
		<a href="mailto:ja@portal.pl">napisz do mnie</a>
	</div>
</body>
</html>