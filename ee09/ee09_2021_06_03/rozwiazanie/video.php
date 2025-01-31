<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Video On Demand</title>
	<link rel="stylesheet" href="styl3.css" />
</head>
<body>
	<div id="baner1">
		<h1>Internetowa wypożyczalnia filmów</h1>
	</div>
	<div id="baner2">
		<table>
			<tr>
				<td>Kryminał</td>
				<td>Horror</td>
				<td>Przygodowy</td>
			</tr>
			<tr>
				<td>20</td>
				<td>30</td>
				<td>20</td>
			</tr>
		</table>
	</div>
	<div id="lista1">
		<h3>Polecamy</h3>
		<?php
		$con = mysqli_connect('localhost', 'root', '', 'dane3');
		$kw1 = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN (18, 22, 23, 25);";
		$res1 = mysqli_query($con, $kw1);
		while($tab = mysqli_fetch_row($res1)) {
			echo "<div class='film'>
			<h4>$tab[0]. $tab[1]</h4>
			<img src='$tab[3]' alt='film' />
			<p>$tab[2]</p>
			</div>";
		}
		?>
	</div>
	<div id="lista2">
		<h3>Filmy fantastyczne</h3>
		<?php
		$kw2 = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12;";
		$res2 = mysqli_query($con, $kw2);
		while($tab = mysqli_fetch_row($res2)) {
			echo "<div class='film'>
			<h4>$tab[0]. $tab[1]</h4>
			<img src='$tab[3]' alt='film' />
			<p>$tab[2]</p>
			</div>";
		}
		?>
	</div>
	<div id="stopka">
		<form action="video.php" method="post">
			<label>
				Usuń film nr.:
				<input type="number" name="nr" />
			</label>
			<button>Usuń film</button>
		</form>
		<?php
		if(!empty($_POST['nr'])) {
			$nr = $_POST['nr'];
			$kw3 = "DELETE FROM produkty WHERE id = $nr;";
			mysqli_query($con, $kw3);
		}
		mysqli_close($con);
		?>
		Stronę wykonał: <a href="mailto:ja@poczta.com">Chriskyy#0181</a>
	</div>
</body>
</html>