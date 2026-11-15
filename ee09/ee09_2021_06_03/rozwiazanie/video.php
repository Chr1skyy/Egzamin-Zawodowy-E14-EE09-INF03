<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<title>Video On Demand</title>
	<link rel="stylesheet" href="styl3.css" />
</head>

<body>
	<div id="baner1">
		<h1>Internetowa wypożyczalnia filmów</h1>
	</div>
	<div id="baner2">
		<table>
			<tr>
				<td>Kryminał</td>
				<td>Horror</td>
				<td>Przygodowy</td>
			</tr>
			<tr>
				<td>20</td>
				<td>30</td>
				<td>20</td>
			</tr>
		</table>
	</div>
	<div id="lista1">
		<h3>Polecamy</h3>
		<?php
		// Skrypt 1
		$polaczenie = mysqli_connect('localhost', 'root', '', 'dane3');
		$zapytanie1 = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN (18, 22, 23, 25);";
		$wynik1 = mysqli_query($polaczenie, $zapytanie1);
		while ($wiersz = mysqli_fetch_array($wynik1)) {
			echo "<div class='film'>
			<h4>{$wiersz['id']}. {$wiersz['nazwa']}</h4>
			<img src='img/{$wiersz['zdjecie']}' alt='film' />
			<p>{$wiersz['opis']}</p>
			</div>";
		}
		?>
	</div>
	<div id="lista2">
		<h3>Filmy fantastyczne</h3>
		<?php
		// Skrypt 2
		$zapytanie2 = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12;";
		$wynik2 = mysqli_query($polaczenie, $zapytanie2);
		while ($wiersz = mysqli_fetch_array($wynik2)) {
			echo "<div class='film'>
			<h4>{$wiersz['id']}. {$wiersz['nazwa']}</h4>
			<img src='img/{$wiersz['zdjecie']}' alt='film' />
			<p>{$wiersz['opis']}</p>
			</div>";
		}
		?>
	</div>
	<div id="stopka">
		<form action="video.php" method="post">
			<label>
				Usuń film nr.:
				<input type="number" name="nr" />
			</label>
			<button>Usuń film</button>
		</form>
		<?php
		// Skrypt 3
		if (!empty($_POST['nr'])) {
			$nr = $_POST['nr'];
			$zapytanie4 = "DELETE FROM produkty WHERE id = $nr;";
			mysqli_query($polaczenie, $zapytanie4);
		}
		mysqli_close($polaczenie);
		?>
		Stronę wykonał: <a href="mailto:ja@poczta.com">Chr1skyy</a>
	</div>
</body>

</html>