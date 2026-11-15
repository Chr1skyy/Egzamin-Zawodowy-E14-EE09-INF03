<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Klub wędkowania</title>
	<link rel="stylesheet" href="styl2.css" />
</head>
<body>
	<div id="baner">
		<h2>Wędkuj z nami!</h2>
	</div>
	<div id="lewy">
		<img src="ryba2.jpg" alt="Szczupak" />
	</div>
	<div id="prawy">
		<h3>Ryby spokojnego żeru (białe)</h3>
		<?php
		$polaczenie = mysqli_connect('localhost', 'root', '', 'wedkowanie');
		$zapytanie = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 2;";
		$wynik = mysqli_query($polaczenie, $zapytanie);
		while ($wiersz = mysqli_fetch_array($wynik)) {
			echo "{$wiersz['id']}. {$wiersz['nazwa']}, występuje w: {$wiersz['wystepowanie']}<br/>";
		}
		mysqli_close($polaczenie);
		?>
		<ol>
			<li><a href="https://wedkuje.pl/" target="_blank">Odwiedź także</a></li>
			<li><a href="https://www.pzw.org.pl/" target="_blank">Polski Związek Wędkarski</a></li>
		</ol>
	</div>
	<div id="stopka">
		<p>Stronę wykonał: Chr1skyy</p>
	</div>
</body>
</html>