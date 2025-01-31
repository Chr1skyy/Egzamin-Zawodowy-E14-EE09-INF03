<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Odloty samolotów</title>
	<link rel="stylesheet" href="styl6.css" />
</head>
<body>
	<div id="baner1">
		<h2>Odloty z lotniska</h2>
	</div>
	<div id="baner2">
		<img src="zad6.png" alt="logotyp" />
	</div>
	<div id="glowny">
		<h4>tavela odlotów</h4>
		<table>
			<tr>
				<th>lp.</th>
				<th>numer rejsu</th>
				<th>czas</th>
				<th>kierunek</th>
				<th>status</th>
			</tr>
			<?php
			$con = mysqli_connect('localhost', 'root', '', 'egzamin');
			$kw1 = "SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty ORDER BY czas DESC;";
			$res1 = mysqli_query($con, $kw1);
			while($tab = mysqli_fetch_row($res1)) {
				echo "<tr><td>$tab[0]</td><td>$tab[1]</td><td>$tab[2]</td><td>$tab[3]</td><td>$tab[4]</td></tr>";
			}
			mysqli_close($con);
			?>
		</table>
	</div>
	<div id="stopka1">
		<a href="kw.jpg" target="_blank">Pobierz obraz</a>
	</div>
	<div id="stopka2">
	<?php
	if(isset($_COOKIE['ciasteczko'])) {
		echo "<p><b>Miło nam, że nas znowu odwiedziłeś</b></p>";
	} else {
		setcookie("ciasteczko", 1, TIME() + 3600);
		echo "<p><i>Dzień dobry! Sprawdź regulamin naszej strony</i></p>";
	}
	?>
	</div>
	<div id="stopka3">
		Autor: Chriskyy#0181
	</div>
</body>
</html>