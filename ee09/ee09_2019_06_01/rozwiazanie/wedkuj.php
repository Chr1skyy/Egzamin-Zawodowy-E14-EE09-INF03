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
		$con = mysqli_connect('localhost', 'root', '', 'wedkowanie');
		$kw = "SELECT nazwa, wystepowanie FROM Ryby WHERE styl_zycia = 1;";
		$res = mysqli_query($con, $kw);
		while($tab = mysqli_fetch_row($res)) {
			echo "<li>$tab[0], występowanie: $tab[1]</li>";
		}
		?>
		</ul>
	</div>
	<div id="prawy">
		<img src="ryba1.jpg" alt="Sum" /><br/>
		<a href="kwerendy.txt">Pobierz kwerendy</a>
	</div>
	<div id="stopka">
		<p>Stronę wykonał: Chriskyy#0181</p>
	</div>
</body>
</html>