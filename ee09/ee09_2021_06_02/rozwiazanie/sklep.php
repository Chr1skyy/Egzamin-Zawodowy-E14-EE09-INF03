<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<title>Warzywniak</title>
	<link rel="stylesheet" href="styl2.css" />
</head>

<body>
	<div id="baner1">
		<h1>Internetowy sklep z eko-warzywami</h1>
	</div>
	<div id="baner2">
		<ol>
			<li>warzywa</li>
			<li>owoce</li>
			<li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
		</ol>
	</div>
	<div id="glowny">
		<?php
		// Skrypt 1
		$polaczenie = mysqli_connect('localhost', 'root', '', 'dane2');
		$zapytanie1 = "SELECT nazwa, ilosc, opis, cena, zdjecie FROM produkty WHERE Rodzaje_id IN (1, 2);";
		$wynik1 = mysqli_query($polaczenie, $zapytanie1);
		while ($wiersz = mysqli_fetch_array($wynik1)) {
			echo "<div class='produkt'>
		<img src='img/{$wiersz['zdjecie']}' alt='warzywniak' />
		<h5>{$wiersz['nazwa']}</h5>
		<p>opis: {$wiersz['opis']}</p>
		<p>na stanie: {$wiersz['ilosc']}</p>
		<h2>{$wiersz['cena']} zł</h2>
		</div>";
		}
		?>
	</div>
	<div id="stopka">
		<form action="sklep.php" method="post">
			<label>
				Nazwa:
				<input type="text" name="nazwa" />
			</label>
			<label>
				Cena:
				<input type="number" name="cena" />
			</label>
			<button>Dodaj produkt</button>
		</form>
		<?php
		// Skrypt 2
		if (!empty($_POST['nazwa']) && !empty($_POST['cena'])) {
			$nazwa = $_POST['nazwa'];
			$cena = $_POST['cena'];
			$zapytanie4 = "INSERT INTO produkty VALUES (NULL, 1, 4, '$nazwa', 10, '', $cena, 'owoce.jpg');";
			mysqli_query($polaczenie, $zapytanie4);
		}
		mysqli_close($polaczenie);
		?>
		Stronę wykonał: Chr1skyy
	</div>
</body>

</html>