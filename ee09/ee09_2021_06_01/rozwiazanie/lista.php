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
		$con = mysqli_connect('localhost', 'root', '', 'dane');
		$kw = "SELECT imie, nazwisko, opis, zdjecie FROM osoby WHERE Hobby_id IN (1, 2 ,6);";
		$res = mysqli_query($con, $kw);
		while($tab = mysqli_fetch_row($res)) {
			echo "<div class='zdjecie'>
			<img src='$tab[3]' alt='przyjaciel' />
			</div>
			<div class='opis'>
			<h3>$tab[0] $tab[1]</h3>
			<p>Ostani wpis: $tab[2]</p>
			</div>
			<div class='linia'>
			<hr/>
			</div>";
		}
		mysqli_close($con);
		?>
	</div>
	<div id="stopka1">
		Stronę wykonał: Chriskyy#0181
	</div>
	<div id="stopka2">
		<a href="mailto:ja@portal.pl">napisz do mnie</a>
	</div>
</body>
</html>