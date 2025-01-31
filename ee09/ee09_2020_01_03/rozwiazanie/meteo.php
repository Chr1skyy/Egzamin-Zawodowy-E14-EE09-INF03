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
			$con = mysqli_connect('localhost', 'root', '', 'prognoza');
			$kw = "SELECT * FROM pogoda WHERE miasta_id = 2 ORDER BY data_prognozy DESC;";
			$res = mysqli_query($con, $kw);
			while($tab = mysqli_fetch_row($res)) {
				echo "<tr><td>$tab[0]</td><td>$tab[2]</td><td>$tab[3]</td><td>$tab[4]</td><td>$tab[5]</td><td>$tab[6]</td></tr>";
			}
			mysqli_close($con);
			?>
		</table>
	</div>
	<div id="stopka">
		<p>Stronę wykonał: Chriskyy#0181</p>
	</div>
</body>
</html>