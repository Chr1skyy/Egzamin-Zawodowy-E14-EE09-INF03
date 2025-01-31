<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Hutrtownia</title>
	<link rel="stylesheet" href="styl1.css" />
</head>

<body>
	<header>
		<section id="logo">
			<img src="komputer.png" alt="hurtownia komputerowa" />
		</section>
		<section id="lista">
			<ul>
				<li>Sprzęt
					<ol>
						<li>Procesory</li>
						<li>Pamięci RAM</li>
						<li>Monitory</li>
						<li>Obudowy</li>
						<li>Karty graficzne</li>
						<li>Dyski twarde</li>
					</ol>
				</li>
				<li>Oprogramowanie</li>
			</ul>
		</section>
		<section id="formularz">
			<h2>Hurtownia komputerowa</h2>
			<form action="sklep.php" method="post">
				<label>
					Wybierz kategorię sprzętu<br />
					<input type="number" name="kategoria" />
				</label>
				<button type="submit" name="submit">SPRAWDŹ</button>
			</form>
		</section>
	</header>
	<main>
		<h1>Podzespoły we wskazanej kategorii</h1>
		<?php
		$connect = mysqli_connect('localhost', 'root', '', 'sklep');
		if (isset($_POST['submit'])) {
			$kategoria = $_POST['kategoria'];
			if (!empty($kategoria)) {
				$query = "SELECT podzespoly.nazwa, podzespoly.opis, podzespoly.cena FROM podzespoly JOIN typy ON podzespoly.typy_id = typy.id WHERE typy.id = $kategoria;";
				$result = mysqli_query($connect, $query);
				while ($row = mysqli_fetch_array($result)) {
					echo "<p>{$row['nazwa']} {$row['opis']} CENA: {$row['cena']}</p>";
				}
			}
		}
		mysqli_close($connect);
		?>
	</main>
	<footer>
		<h3>Hurtownia działa od poniedziałku do soboty w godzinach 7<sup>00</sup>-16<sup>00</sup></h3>
		<a href="mailto:bok@hurtownia.pl">Napisz do nas</a>
		Partnerzy:
		<a href="http://intel.pl" target="_blank">Intel</a>
		<a href="http://amd.pl" target="_blank">AMD</a>
		<p>Stronę wykonał: Chr1skyy</p>
	</footer>
</body>

</html>