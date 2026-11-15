<?php
// Skrypt 2
if (isset($_COOKIE['ciasteczko'])) {
	$komunikat = "<p><i>Witaj ponownie na stronie lotniska</i></p>";
} else {
	setcookie("ciasteczko", 1, time() + 7200);
	$komunikat = "<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>";
}
?>
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
			// Skrypt 1
			$polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin');
			$zapytanie = "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC;";
			$wynik = mysqli_query($polaczenie, $zapytanie);
			while ($wiersz = mysqli_fetch_array($wynik)) {
				echo "<tr><td>{$wiersz['czas']}</td><td>{$wiersz['kierunek']}</td><td>{$wiersz['nr_rejsu']}</td><td>{$wiersz['status_lotu']}</td></tr>";
			}
			mysqli_close($polaczenie);
			?>
		</table>
	</div>
	<div id="stopka1">
	<?php echo $komunikat; ?>
	</div>
	<div id="stopka2">
		Autor: Chr1skyy
	</div>
</body>
</html>