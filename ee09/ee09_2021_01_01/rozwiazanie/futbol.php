<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Rozgrywki futbolowe</title>
	<link rel="stylesheet" href="styl.css" />
</head>
<body>
	<div id="baner">
		<h2>Światowe rozgrywki piłkarskie</h2>
		<img src="obraz1.jpg" alt="boisko" />
	</div>
	<div id="mecze">
	<?php
	$con = mysqli_connect('localhost', 'root', '', 'egzamin');
	$kw1 = "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1 = 'EVG'";
	$res1 = mysqli_query($con, $kw1);
	while($tab = mysqli_fetch_row($res1)) {
		echo "<div class='mecz'>
		<h3>$tab[0] - $tab[1]</h3>
		<h4>$tab[2]</h4>
		<p>w dniu: $tab[3]</p>
		</div>";
	}
	?>
	</div>
	<div id="glowny">
		<h2>Reprezentacja Polski</h2>
	</div>
	<div id="lewy">
		<p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy).</p>
		<form action="futbol.php" method="post">
			<input type="number" name="pozycja" />
			<button>Sprawdź</button>
		</form>
		<ul>
		<?php
		if(!empty($_POST['pozycja'])) {
			$pozycja = $_POST['pozycja'];
			$kw2 = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $pozycja;";
			$res2 = mysqli_query($con, $kw2);
			while($tab = mysqli_fetch_row($res2)) {
				echo "<li><p>$tab[0] $tab[1]</p></li>";
			}
		}
		mysqli_close($con);
		?>
		</ul>
	</div>
	<div id="prawy">
		<img src="zad1.png" alt="piłkarz" />
		<p>Autor: Chriskyy#0181</p>
	</div>
</body>
</html>