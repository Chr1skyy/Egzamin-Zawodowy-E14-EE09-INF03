<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Panel administratora</title>
	<link rel="stylesheet" href="styl4.css" />
</head>
<body>
	<div id="baner">
		<h3>Portal Społecznościowy - panel administratora</h3>
	</div>
	<div id="lewy">
		<h4>Użytkownicy</h4>
		<?php
		// Skrypt 1
		$polaczenie = mysqli_connect('localhost', 'root', '', 'dane4');
		$zapytanie1 = "SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30;";
		$wynik1 = mysqli_query($polaczenie, $zapytanie1);
		while($wiersz = mysqli_fetch_array($wynik1)) {
			$wiek = date("Y") - $wiersz['rok_urodzenia'];
			echo "{$wiersz['id']}. {$wiersz['imie']} {$wiersz['nazwisko']}, $wiek<br/>";
		}
		?>
		<a href="settings.html">Inne ustawienia</a>
	</div>
	<div id="prawy">
		<h4>Podaj id użytkownika</h4>
		<form action="users.php" method="post">
			<input type="number" name="nr" />
			<button>ZOBACZ</button>
		</form>
		<hr/>
		<?php
		// Skrypt 2
		if (!empty($_POST['nr'])) {
			$nr = $_POST['nr'];
			$zapytanie2 = "SELECT osoby.imie, osoby.nazwisko, osoby.rok_urodzenia, osoby.opis, osoby.zdjecie, hobby.nazwa FROM osoby INNER JOIN hobby ON osoby.Hobby_id = hobby.id WHERE osoby.id = $nr;";
			$wynik2 = mysqli_query($polaczenie, $zapytanie2);
			while($wiersz = mysqli_fetch_array($wynik2)) {
				echo "<h2>$nr. {$wiersz['imie']} {$wiersz['nazwisko']}</h2>
				<img src='img/{$wiersz['zdjecie']}' alt='$nr' />
				<p>Rok urodzenia: {$wiersz['rok_urodzenia']}</p>
				<p>Opis: {$wiersz['opis']}</p>
				<p>Hobby: {$wiersz['nazwa']}</p>";
			}
		}
		mysqli_close($polaczenie);
		?>
	</div>
	<div id="stopka">
		Stronę wykonał: Chr1skyy
	</div>
</body>
</html>