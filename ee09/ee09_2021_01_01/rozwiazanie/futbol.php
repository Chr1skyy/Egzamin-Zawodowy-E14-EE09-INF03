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
	// Skrypt 1
	$polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin');
	$zapytanie1 = "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1 = 'EVG'";
	$wynik1 = mysqli_query($polaczenie, $zapytanie1);
	while($wiersz = mysqli_fetch_array($wynik1)) {
		echo "<div class='mecz'>
		<h3>{$wiersz['zespol1']} - {$wiersz['zespol2']}</h3>
		<h4>{$wiersz['wynik']}</h4>
		<p>w dniu: {$wiersz['data_rozgrywki']}</p>
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
		// Skrypt 2
		if (!empty($_POST['pozycja'])) {
			$pozycja = $_POST['pozycja'];
			$zapytanie2 = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $pozycja;";
			$wynik2 = mysqli_query($polaczenie, $zapytanie2);
			while($wiersz = mysqli_fetch_array($wynik2)) {
				echo "<li><p>{$wiersz['imie']} {$wiersz['nazwisko']}</p></li>";
			}
		}
		mysqli_close($polaczenie);
		?>
		</ul>
	</div>
	<div id="prawy">
		<img src="zad1.png" alt="piłkarz" />
		<p>Autor: Chr1skyy</p>
	</div>
</body>
</html>