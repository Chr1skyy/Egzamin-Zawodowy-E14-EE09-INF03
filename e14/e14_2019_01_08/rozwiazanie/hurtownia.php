<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Hurtownia komputerowa</title>
	<link rel="stylesheet" href="styl2.css" />
</head>

<body>
	<header>
		<section id="lista">
			<ul>
				<li>Producenci
					<ol>
						<li>Intel</li>
						<li>AMD</li>
						<li>Motorola</li>
						<li>Corsair</li>
						<li>ADATA</li>
						<li>WD</li>
						<li>Kingstone</li>
						<li>Patriot</li>
						<li>Asus</li>
					</ol>
				</li>
			</ul>
		</section>
		<section id="formularz">
			<h1>Dystrybucja sprzętu komputerowego</h1>
			<form action="hurtownia.php" method="post">
				<label>
					Wybierz producenta<br />
					<input type="number" name="producent" />
				</label>
				<button type="submit" name="submit">WYŚWIETL</button>
			</form>
		</section>
		<section id="logo">
			<img src="sprzet.png" alt="Sprzedajemy komputery" />
		</section>
	</header>
	<main>
		<h2>Podzespoły wybranego producenta</h2>
		<?php
		$polaczenie = mysqli_connect('localhost', 'root', '', 'sklep');
		if (isset($_POST['submit'])) {
			$producent = $_POST['producent'];
			if (!empty($producent)) {
				$zapytanie = "SELECT nazwa, dostepnosc, cena FROM podzespoly WHERE producenci_id = $producent;";
				$wynik = mysqli_query($polaczenie, $zapytanie);
				while ($wiersz = mysqli_fetch_array($wynik)) {
					$dostepnosc = "NIEDOSTĘPNY";
					if ($wiersz['dostepnosc'] == '1') {
						$dostepnosc = "DOSTĘPNY";
					}
					echo "<p>{$wiersz['nazwa']} CENA: {$wiersz['cena']} $dostepnosc</p>";
				}
			}
		}
		mysqli_close($polaczenie);
		?>
	</main>
	<footer>
		<h4>Zapraszamy od poniedziałku do soboty w godzinach 7<sup>30</sup>-16<sup>30</sup></h4>
		Strony partnerów:
		<a href="http://adata.pl/" target="_blank">ADATA</a>
		<a href="http://patriot.pl/" target="_blank">Patriot</a>
		<a href="mailto:biuro@hurt.pl">Napisz</a>
		<p>Stronę wykonał: Chr1skyy</p>
	</footer>
</body>

</html>