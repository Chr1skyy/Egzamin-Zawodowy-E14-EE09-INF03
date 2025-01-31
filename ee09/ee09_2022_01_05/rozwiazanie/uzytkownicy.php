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
	$con = mysqli_connect('localhost', 'root', '', 'portal');
	$kw = "SELECT COUNT(*) FROM dane;";
	$res = mysqli_query($con, $kw);
	while($tab = mysqli_fetch_row($res)) {
		echo "<h5>Liczba użytkowników portalu: $tab[0]";
	}
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
		if(!empty($_POST['login']) && !empty($_POST['haslo'])) {
			$login = $_POST['login'];
			$haslo = $_POST['haslo'];
			
			$kw = "SELECT login FROM uzytkownicy WHERE login = '$login';";
			$res = mysqli_query($con, $kw);
			if(mysqli_num_rows($res) == 1) {
				$kw = "SELECT haslo FROM uzytkownicy WHERE login = '$login';";
				$res = mysqli_query($con, $kw);
				while($tab = mysqli_fetch_row($res)) {
					$szyfr = sha1($haslo);
					if($szyfr == $tab[0]) {
						$kw = "SELECT u.login, d.rok_urodz, d.przyjaciol, d.hobby, d.zdjecie FROM uzytkownicy u INNER JOIN dane d ON u.id = d.id WHERE u.login = '$login';";
						$res = mysqli_query($con, $kw);
						while($tab = mysqli_fetch_row($res)) {
							echo "<div class='wizytowka'>";
							echo "<img src='$tab[4]' alt='osoba' />";
							$wiek = DATE("Y") - $tab[1];
							echo "<h4>$tab[0] ($wiek)</h4>";
							echo "<p>hobby: $tab[3]</p>";
							echo "<h1><img src='icon-on.png' /> $tab[2]</h1>";
							echo "<a href='dane.html'><button type='button'>Więcej informacji</button></a>";
							echo "</div>";
						}
					} else echo "hasło nieprawidłowe";
				}
				
			} else echo "login nie istnieje";
		}
		mysqli_close($con);
		?>
	</div>
	<div id="stopka">
		Stronę wykonał: Chriskyy#0181
	</div>
</body>
</html>