<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>piłka nożna</title>
	<link rel="stylesheet" href="styl2.css" />
</head>
<body>
	<div id="baner">
		<h3>Reprezentacja polski w piłce nożnej</h3>
		<img src="obraz1.jpg" alt="reprezentacja" />
	</div>
	<div id="lewy">
		<form action="liga.php" method="post">
			<select name="pozycje">
				<option value="1">Bramkarze</option>
				<option value="2">Obrońcy</option>
				<option value="3">Pomocnicy</option>
				<option value="4">Napastnicy</option>
			</select>
			<button>Zobacz</button>
		</form>
		<img src="zad2.png" alt="piłka" />
		<p>Autor: Chr1skyy</p>
	</div>
	<div id="prawy">
		<ol>
		<?php
		// Skrypt 1
		$polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin');
		if (!empty($_POST['pozycje'])) {
			$pozycja = $_POST['pozycje'];
			$zapytanie1 = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $pozycja;";
			$wynik1 = mysqli_query($polaczenie, $zapytanie1);
			while($wiersz = mysqli_fetch_array($wynik1)) {
				echo "<li><p>{$wiersz['imie']} {$wiersz['nazwisko']}</p></li>";
			}
		}
		?>
		</ol>
	</div>
	<div id="glowny">
		<h3>Liga mistrzów</h3>
	</div>
	<div id="liga">
	<?php
	// Skrypt 2
	$zapytanie2 = "SELECT zespol, punkty, grupa FROM liga ORDER BY punkty DESC;";
	$wynik2 = mysqli_query($polaczenie, $zapytanie2);
	while($wiersz = mysqli_fetch_array($wynik2)) {
		echo "<div class='blok'>
		<h2>{$wiersz['zespol']}</h2>
		<h1>{$wiersz['punkty']}</h1>
		<p>grupa: {$wiersz['grupa']}</p>
		</div>";
	}
	mysqli_close($polaczenie);
	?>
	</div>
</body>
</html>