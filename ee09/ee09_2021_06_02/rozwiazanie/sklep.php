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
	$con = mysqli_connect('localhost', 'root', '', 'dane2');
	$kw1 = "SELECT nazwa, ilosc, opis, cena, zdjecie FROM produkty WHERE Rodzaje_id IN (1, 2);";
	$res1 = mysqli_query($con, $kw1);
	while($tab = mysqli_fetch_row($res1)) {
		echo "<div class='produkt'>
		<img src='$tab[4]' alt='warzywniak' />
		<h5>$tab[0]</h5>
		<p>opis: $tab[2]</p>
		<p>na stanie: $tab[1]</p>
		<h2>$tab[3] zł</h2>
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
		if (!empty($_POST['nazwa']) && !empty($_POST['cena'])) {
			$nazwa = $_POST['nazwa'];
			$cena = $_POST['cena'];
			$kw2 = "INSERT INTO produkty VALUES (NULL, 1, 4, '$nazwa', 10, '', $cena, 'owoce.jpg');";
			mysqli_query($con, $kw2);
		}
		mysqli_close($con);
		?>
		Stronę wykonał: Chriskyy#0181
	</div>
</body>
</html>