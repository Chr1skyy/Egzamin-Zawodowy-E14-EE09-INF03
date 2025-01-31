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
			$con = mysqli_connect('localhost', 'root', '', 'prognoza');
			$kw = "SELECT * FROM pogoda WHERE miasta_id = 1 ORDER BY data_prognozy ASC;";
			$res = mysqli_query($con, $kw);
			while($tab = mysqli_fetch_row($res)) {
				echo "<tr><td>$tab[2]</td><td>$tab[3]</td><td>$tab[4]</td><td>$tab[5]</td><td>$tab[6]</td></tr>";
			}
			mysqli_close($con);
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
		<p>Stronę wykonał: Chriskyy#0181</p>
	</div>
</body>
</html>