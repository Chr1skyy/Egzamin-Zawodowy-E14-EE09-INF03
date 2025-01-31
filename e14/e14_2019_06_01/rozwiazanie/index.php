<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Sklep papierniczy</title>
	<link rel="stylesheet" href="styl.css" />
</head>

<body>
	<header>
		<h1>W naszym sklepie internetowym kupisz najtaniej</h1>
	</header>
	<main>
		<section id="lewy">
			<h3>Promocja 15% obejmuje artykuły</h3>
			<ul>
				<?php
				$connect = mysqli_connect('localhost', 'root', '', 'sklep');
				$query1 = "SELECT nazwa FROM towary WHERE promocja = 1;";
				$result1 = mysqli_query($connect, $query1);
				while ($row = mysqli_fetch_array($result1)) {
					echo "<li>{$row['nazwa']}</li>";
				}
				?>
			</ul>
		</section>
		<section id="srodkowy">
			<h3>Cena wybranego artykułu w promocji</h3>
			<form action="index.php" method="post">
				<select name="lista">
					<option value="Gumka do mazania">Gumka do mazania</option>
					<option value="Cienkopis">Cienkopis</option>
					<option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
					<option value="Markery 4 szt.">Markery 4 szt.</option>
				</select>
				<button type="submit" name="submit">WYBIERZ</button>
			</form>
			<?php
			if (isset($_POST['submit'])) {
				$produkt = $_POST['lista'];
				if (!empty($produkt)) {
					$query2 = "SELECT cena FROM towary WHERE nazwa = '$produkt';";
					$result2 = mysqli_query($connect, $query2);
					while ($row = mysqli_fetch_array($result2)) {
						$cena = ROUND($row['cena'] * 0.85, 2);
						echo $cena;
					}
				}
			}
			mysqli_close($connect);
			?>
		</section>
		<section id="prawy">
			<h3>Kontakt</h3>
			<p>telefon:123123123<br />e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
			<img src="promocja2.png" alt="promocja" />
		</section>
	</main>
	<footer>
		<h4>Autor strony Chr1skyy</h4>
	</footer>
</body>

</html>