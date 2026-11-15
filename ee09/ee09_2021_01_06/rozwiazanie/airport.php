<?php
// Skrypt 2
if (isset($_COOKIE['ciasteczko'])) {
	$komunikat = "<p><b>Miło nam, że nas znowu odwiedziłeś</b></p>";
} else {
	setcookie("ciasteczko", 1, time() + 3600);
	$komunikat = "<p><i>Dzień dobry! Sprawdź regulamin naszej strony</i></p>";
}
?>
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
		<h4>tabela odlotów</h4>
		<table>
			<tr>
				<th>lp.</th>
				<th>numer rejsu</th>
				<th>czas</th>
				<th>kierunek</th>
				<th>status</th>
			</tr>
			<?php
			// Skrypt 1
			$polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin');
			$zapytanie = "SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty ORDER BY czas DESC;";
			$wynik = mysqli_query($polaczenie, $zapytanie);
			while ($wiersz = mysqli_fetch_array($wynik)) {
				echo "<tr><td>{$wiersz['id']}</td><td>{$wiersz['nr_rejsu']}</td><td>{$wiersz['czas']}</td><td>{$wiersz['kierunek']}</td><td>{$wiersz['status_lotu']}</td></tr>";
			}
			mysqli_close($polaczenie);
			?>
		</table>
	</div>
	<div id="stopka1">
		<a href="kw.jpg" target="_blank">Pobierz obraz</a>
	</div>
	<div id="stopka2">
	<?php echo $komunikat; ?>
	</div>
	<div id="stopka3">
		Autor: Chr1skyy
	</div>
</body>
</html>