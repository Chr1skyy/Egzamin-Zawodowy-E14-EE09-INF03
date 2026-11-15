<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Forum o psach</title>
	<link rel="stylesheet" href="styl4.css" />
</head>
<body>
	<div id="baner">
		<h1>Forum wielbicieli psów</h1>
	</div>
	<div id="lewy">
		<img src="obraz.jpg" alt="foksterier" />
	</div>
	<div id="prawy1">
		<h2>Zapisz się</h2>
		<form action="logowanie.php" method="post">
			<label>
				login:
				<input type="text" name="login" /><br/>
			</label>
			<label>
				hasło:
				<input type="password" name="haslo" /><br/>
			</label>
			<label>
				powtórz hasło:
				<input type="password" name="powhaslo" /><br/>
			</label>
			<button>Zapisz</button>
		</form>
		<?php
		$polaczenie = mysqli_connect('localhost', 'root', '', 'psy');
		
		if (isset($_POST['login'])) {
			$login = $_POST['login'];
			$haslo = $_POST['haslo'];
			$powtorzoneHaslo = $_POST['powhaslo'];
			
			$blad = false;
			
			if ($login == '' || $haslo == '' || $powtorzoneHaslo == '') {
				echo "<p>wypełnij wszystkie pola</p>";
				$blad = true;
			}
			
			$zapytanie3 = "SELECT login FROM uzytkownicy;";
			$wynik3 = mysqli_query($polaczenie, $zapytanie3);
			while ($wiersz = mysqli_fetch_array($wynik3)) {
				if ($login == $wiersz['login']) {
					echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";
					$blad = true;
					break;
				}
			}
			
			if ($haslo != $powtorzoneHaslo) {
				echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
				$blad = true;
			}
			
			if ($blad == false) {
				$zaszyfrowaneHaslo = sha1($haslo);
				$zapytanie2 = "INSERT INTO uzytkownicy VALUES (NULL, '$login', '$zaszyfrowaneHaslo');";
				mysqli_query($polaczenie, $zapytanie2);
				echo "<p>Konto zostało dodane</p>";
			}
		}
		mysqli_close($polaczenie);
		?>
	</div>
	<div id="prawy2">
		<h2>Zapraszamy wszystkich</h2>
		<ol>
			<li>właścicieli psów</li>
			<li>weterynarzy</li>
			<li>tych, co chcą kupić psa</li>
			<li>tych, co lubią psy</li>
		</ol>
		<a href="regulamin.html">Przeczytaj regulamin forum</a>
	</div>
	<div id="stopka">
		Stronę wykonał: Chr1skyy
	</div>
</body>
</html>