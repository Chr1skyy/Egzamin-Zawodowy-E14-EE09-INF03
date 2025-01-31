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
		$con = mysqli_connect('localhost', 'root', '', 'dane4');
		$kw1 = "SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30;";
		$res1 = mysqli_query($con, $kw1);
		while($tab = mysqli_fetch_row($res1)) {
			$wiek = DATE("Y") - $tab[3];
			echo "$tab[0]. $tab[1] $tab[2], $wiek<br/>";
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
		if(!empty($_POST['nr'])) {
			$nr = $_POST['nr'];
			$kw2 = "SELECT osoby.imie, osoby.nazwisko, osoby.rok_urodzenia, osoby.opis, osoby.zdjecie, hobby.nazwa FROM osoby INNER JOIN hobby ON osoby.Hobby_id = hobby.id WHERE osoby.id = $nr;";
			$res2 = mysqli_query($con, $kw2);
			while($tab = mysqli_fetch_row($res2)) {
				echo "<h2>$nr. $tab[0] $tab[1]</h2>
				<img src='$tab[4]' alt='$nr' />
				<p>Rok urodzenia: $tab[2]</p>
				<p>Opis: $tab[3]</p>
				<p>Hobby: $tab[5]</p>";
			}
		}
		mysqli_close($con);
		?>
	</div>
	<div id="stopka">
		Stronę wykonał: Chriskyy#0181
	</div>
</body>
</html>