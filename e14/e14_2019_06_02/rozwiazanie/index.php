<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Hurtownia papeirnicza</title>
	<link rel="stylesheet" href="styl.css" />
</head>

<body>
	<header>
		<h1>W naszej hurtowni kupisz najtaniej</h1>
	</header>
	<main>
		<section id="lewy">
			<h3>Ceny wybranych artykułów w hurtowni:</h3>
			<table>
				<?php
				$connect = mysqli_connect('localhost', 'root', '', 'sklep');
				$query1 = "SELECT nazwa, cena FROM towary LIMIT 4;";
				$result1 = mysqli_query($connect, $query1);
				while ($row = mysqli_fetch_array($result1)) {
					echo "<tr><td>{$row['nazwa']}</td><td>{$row['cena']} zł</td></tr>";
				}
				?>
			</table>
		</section>
		<section id="srodkowy">
			<h3>Ile będą kosztować Twoje zakupy?</h3>
			<form action="index.php" method="post">
				<label>
					wybierz artykuł
					<select name="lista">
						<option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
						<option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
						<option value="Cyrkiel">Cyrkiel</option>
						<option value="Linijka 30 cm">Linijka 30 cm</option>
						<option value="Ekierka">Ekierka</option>
						<option value="Linijka 50 cm">Linijka 50 cm</option>
					</select><br />
				</label>
				<label>
					liczba sztuk:
					<input type="number" name="liczba" value="1" />
				</label>
				<br />
				<button type="submit" name="submit">OBLICZ</button>
			</form>
			<?php
			if (isset($_POST['submit'])) {
				$produkt = $_POST['lista'];
				$liczba = $_POST['liczba'];
				if (!empty($produkt) && !empty($liczba)) {
					$query2 = "SELECT cena FROM towary WHERE nazwa = '$produkt';";
					$result2 = mysqli_query($connect, $query2);
					$row = mysqli_fetch_array($result2);
					$cena = ROUND($row['cena'] * $liczba, 1);
					echo $cena;
				}
			}
			mysqli_close($connect);
			?>
		</section>
		<section id="prawy">
			<img src="zakupy2.png" alt="hurtownia" />
			<h3>Kontakt</h3>
			<p>telefon: <br />111222333<br />e-mail: <br /><a href="mailto:hurt@wp.pl">hurt@wp.pl</a></p>
		</section>
	</main>
	<footer>
		<h4>Witrynę wykonał Chr1skyy</h4>
	</footer>
</body>

</html>