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
		$con = mysqli_connect('localhost', 'root', '', 'psy');
		
		if(isset($_POST['login']) && isset($_POST['haslo']) && isset($_POST['powhaslo'])) {
			$login = $_POST['login'];
			$haslo = $_POST['haslo'];
			$powhaslo = $_POST['powhaslo'];
			
			$blad = FALSE;
			
			if($login == '' || $haslo == '' || $powhaslo == '') {
				echo "<p>wypełnij wszystkie pola</p>";
				$blad = TRUE;
			}
			
			$kw = "SELECT login FROM uzytkownicy;";
			$res = mysqli_query($con, $kw);
			while($tab = mysqli_fetch_row($res)) {
				if($login == $tab[0]) {
					echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";
					$blad = TRUE;
					break;
				}
			} 
			
			if($haslo != $powhaslo) {
				echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
				$blad = TRUE;
			}
			
			if($blad == FALSE) {
				$szyfr = sha1($haslo);
				$kw = "INSERT INTO uzytkownicy VALUES (NULL, '$login', '$szyfr');";
				mysqli_query($con, $kw);
				echo "<p>Konto zostało dodane</p>";
			}
		}
		mysqli_close($con);
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
		Stronę wykonał: Chriskyy#0181
	</div>
</body>
</html>