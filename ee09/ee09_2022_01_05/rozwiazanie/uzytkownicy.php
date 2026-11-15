<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Portal społecznościowy</title>
	<link rel="stylesheet" href="styl5.css" />
</head>
<body>
	<div id="baner1">
		<h2>Nasze osiedle</h2>
	</div>
	<div id="baner2">
	<?php
	// Skrypt 1
	$polaczenie = mysqli_connect('localhost', 'root', '', 'portal');
	$zapytanie2 = "SELECT COUNT(*) FROM dane;";
	$wynik2 = mysqli_query($polaczenie, $zapytanie2);
	$wiersz = mysqli_fetch_array($wynik2);
	echo "<h5>Liczba użytkowników portalu: {$wiersz[0]}</h5>";
	?>
	</div>
	<div id="lewy">
		<h3>Logowanie</h3>
		<form action="uzytkownicy.php" method="post">
			<label>
				login:<br/>
				<input type="text" name="login" /><br/>
			</label>
			<label>
				hasło:<br/>
				<input type="password" name="haslo" /><br/>
			</label>
			<button>Zaloguj</button>
		</form>
	</div>
	<div id="prawy">
		<h3>Wizytówka</h3>
		<?php
		// Skrypt 2
		if (!empty($_POST['login']) && !empty($_POST['haslo'])) {
			$login = $_POST['login'];
			$haslo = $_POST['haslo'];
			$zapytanie1 = "SELECT haslo FROM uzytkownicy WHERE login = '$login';";
			$wynik1 = mysqli_query($polaczenie, $zapytanie1);
			if (mysqli_num_rows($wynik1) == 0) {
				echo "login nie istnieje";
			} else {
				$wiersz = mysqli_fetch_array($wynik1);
				if (sha1($haslo) != $wiersz['haslo']) {
					echo "hasło nieprawidłowe";
				} else {
					$zapytanie3 = "SELECT login, rok_urodz, przyjaciol, hobby, zdjecie FROM uzytkownicy INNER JOIN dane ON uzytkownicy.id = dane.id WHERE uzytkownicy.login = '$login';";
					$wynik3 = mysqli_query($polaczenie, $zapytanie3);
					$wiersz = mysqli_fetch_array($wynik3);
					$wiek = date("Y") - $wiersz['rok_urodz'];
					echo "<div class='wizytowka'>";
					echo "<img src='img/{$wiersz['zdjecie']}' alt='osoba' />";
					echo "<h4>{$wiersz['login']} ($wiek)</h4>";
					echo "<p>hobby: {$wiersz['hobby']}</p>";
					echo "<h1><img src='img/icon-on.png' /> {$wiersz['przyjaciol']}</h1>";
					echo "<a href='dane.html'><button type='button'>Więcej informacji</button></a>";
					echo "</div>";
				}
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