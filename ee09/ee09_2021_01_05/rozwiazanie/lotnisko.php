<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Port Lotniczy</title>
	<link rel="stylesheet" href="styl5.css" />
</head>
<body>
	<div id="baner1">
		<img src="zad5.png" alt="logo lotnisko" />
	</div>
	<div id="baner2">
		<h1>Przyloty</h1>
	</div>
	<div id="baner3">
		<h3>przydatne linki</h3>
		<a href="kwerendy.txt" target="_blank">Pobierz...</a>
	</div>
	<div id="glowny">
		<table>
			<tr>
				<th>czas</th>
				<th>kierunek</th>
				<th>numer rejsu</th>
				<th>status</th>
			</tr>
			<?php
			$con = mysqli_connect('localhost', 'root', '', 'egzamin');
			$kw1 = "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC;";
			$res1 = mysqli_query($con, $kw1);
			while($tab = mysqli_fetch_row($res1)) {
				echo "<tr><td>$tab[0]</td><td>$tab[1]</td><td>$tab[2]</td><td>$tab[3]</td></tr>";
			}
			mysqli_close($con);
			?>
		</table>
	</div>
	<div id="stopka1">
	<?php
	if(isset($_COOKIE['ciasteczko'])) {
		echo "<p><i>Witaj ponownie na stronie lotniska</i></p>";
	} else {
		setcookie("ciasteczko", 1, TIME() + 7200);
		echo "<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>";
	}
	?>
	</div>
	<div id="stopka2">
		Autor: Chriskyy#0181
	</div>
</body>
</html>