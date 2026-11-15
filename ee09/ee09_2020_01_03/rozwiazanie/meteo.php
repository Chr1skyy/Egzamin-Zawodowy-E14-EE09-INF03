<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Prognoza pogody Poznań</title>
	<link rel="stylesheet" href="styl4.css" />
</head>
<body>
	<div id="baner1">
		<p>maj, 2019 r.</p>
	</div>
	<div id="baner2">
		<h2>Prognoza dla Poznania</h2>
	</div>
	<div id="baner3">
		<img src="logo.png" alt="prognoza" />
	</div>
	<div id="lewy">
		<a href="kwerendy.txt">Kwerendy</a>
	</div>
	<div id="prawy">
		<img src="obraz.jpg" alt="Polska, Poznań" />
	</div>
	<div id="glowny">
		<table>
			<tr>
				<th>Lp.</th>
				<th>DATA</th>
				<th>NOC - TEMPERATURA</th>
				<th>DZIEŃ - TEMPERATURA</th>
				<th>OPADY [mm/h]</th>
				<th>CIŚNIENIE [hPa]</th>
			</tr>
			<?php
			$polaczenie = mysqli_connect('localhost', 'root', '', 'prognoza');
			$zapytanie = "SELECT * FROM pogoda WHERE miasta_id = 2 ORDER BY data_prognozy DESC;";
			$wynik = mysqli_query($polaczenie, $zapytanie);
			$lp = 1;
			while ($wiersz = mysqli_fetch_array($wynik)) {
				echo "<tr><td>$lp</td><td>{$wiersz['data_prognozy']}</td><td>{$wiersz['temperatura_noc']}</td><td>{$wiersz['temperatura_dzien']}</td><td>{$wiersz['opady']}</td><td>{$wiersz['cisnienie']}</td></tr>";
				$lp++;
			}
			mysqli_close($polaczenie);
			?>
		</table>
	</div>
	<div id="stopka">
		<p>Stronę wykonał: Chr1skyy</p>
	</div>
</body>
</html>