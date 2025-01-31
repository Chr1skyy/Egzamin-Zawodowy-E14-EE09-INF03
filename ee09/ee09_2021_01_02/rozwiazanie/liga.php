<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>piłka nożna</title>
	<link rel="stylesheet" href="styl2.css" />
</head>
<body>
	<div id="baner">
		<h3>Reprezentacja polski w piłce nożnej</h3>
		<img src="obraz1.jpg" alt="reprezentacja" />
	</div>
	<div id="lewy">
		<form action="liga.php" method="post">
			<select name="pozycje">
				<option value="1">Bramkarze</option>
				<option value="2">Obrońcy</option>
				<option value="3">Pomocnicy</option>
				<option value="4">Napastnicy</option>
			</select>
			<button>Zobacz</button>
		</form>
		<img src="zad2.png" alt="piłka" />
		<p>Autor: Chriskyy#0181</p>
	</div>
	<div id="prawy">
		<ol>
		<?php
		$con = mysqli_connect('localhost', 'root', '', 'egzamin');
		if(!empty($_POST['pozycje'])) {
			$pozycja = $_POST['pozycje'];
			$kw1 = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $pozycja;";
			$res1 = mysqli_query($con, $kw1);
			while($tab = mysqli_fetch_row($res1)) {
				echo "<li><p>$tab[0] $tab[1]</p></li>";
			}
		}
		?>
		</ol>
	</div>
	<div id="glowny">
		<h3>Liga mistrzów</h3>
	</div>
	<div id="liga">
	<?php
	$kw2 = "SELECT zespol, punkty, grupa FROM liga ORDER BY punkty DESC;";
	$res2 = mysqli_query($con, $kw2);
	while($tab = mysqli_fetch_row($res2)) {
		echo "<div class='blok'>
		<h2>$tab[0]</h2>
		<h1>$tab[1]</h1>
		<p>grupa: $tab[2]</p>
		</div>";
	}
	mysqli_close($con);
	?>
	</div>
</body>
</html>