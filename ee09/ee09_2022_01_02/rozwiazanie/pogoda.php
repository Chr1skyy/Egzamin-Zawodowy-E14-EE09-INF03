<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Prognoza pogody Wrocław</title>
	<link rel="stylesheet" href="styl2.css" />
</head>
<body>
	<div id="baner1">
		<img src="logo.png" alt="meteo" />
	</div>
	<div id="baner2">
		<h1>Prognoza dla Wrocławia</h1>
	</div>
	<div id="baner3">
		<p>maj, 2019 r.</p>
	</div>
	<div id="glowny">
		<table>
			<tr>
				<th>DATA</th>
				<th>TEMPERATURA W NOCY</th>
				<th>TEMPERATURA W DZIEŃ</th>
				<th>OPADY [mm/h]</th>
				<th>CIŚNIENIE [hPa]</th>
			</tr>
			<?php
			$polaczenie = mysqli_connect('localhost', 'root', '', 'prognoza');
			$zapytanie = "SELECT * FROM pogoda WHERE miasta_id = 1 ORDER BY data_prognozy ASC;";
			$wynik = mysqli_query($polaczenie, $zapytanie);
			while ($wiersz = mysqli_fetch_array($wynik)) {
				echo "<tr><td>{$wiersz['data_prognozy']}</td><td>{$wiersz['temperatura_noc']}</td><td>{$wiersz['temperatura_dzien']}</td><td>{$wiersz['opady']}</td><td>{$wiersz['cisnienie']}</td></tr>";
			}
			mysqli_close($polaczenie);
			?>
		</table>
	</div>
	<div id="lewy">
		<img src="obraz.jpg" alt="Polska, Wrocław" />
	</div>
	<div id="prawy">
		<a href="kwerendy.txt">Pobierz kwerendy</a>
	</div>
	<div id="stopka">
		<p>Stronę wykonał: Chr1skyy</p>
	</div>
</body>
</html>