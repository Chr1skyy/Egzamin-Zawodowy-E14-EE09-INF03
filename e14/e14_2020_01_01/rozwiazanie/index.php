<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Nasz sklep komputerowy</title>
	<link rel="stylesheet" href="styl8.css" />
</head>

<body>
	<section id="kontener">
		<nav>
			<a href="index.php">Główna</a>
			<a href="procesory.html">Procesory</a>
			<a href="ram.html">RAM</a>
			<a href="grafika.html">Grafika</a>
		</nav>
		<header>
			<h2>Podzespoły komputerowe</h2>
		</header>
	</section>
	<main>
		<h1>Dzisiejsze promocje</h1>
		<table>
			<tr>
				<th>NUMER</th>
				<th>NAZWA PODZESPOŁU</th>
				<th>OPIS</th>
				<th>CENA</th>
			</tr>
			<?php
			$polaczenie = mysqli_connect('localhost', 'root', '', 'sklep');
			$zapytanie = "SELECT id, nazwa, opis, cena FROM podzespoly WHERE cena < 1000;";
			$wynik = mysqli_query($polaczenie, $zapytanie);
			while ($wiersz = mysqli_fetch_array($wynik)) {
				echo "<tr>
						<td>{$wiersz['id']}</td>
						<td>{$wiersz['nazwa']}</td>
						<td>{$wiersz['opis']}</td>
						<td>{$wiersz['cena']}</td>
					</tr>";
			}
			mysqli_close($polaczenie);
			?>
		</table>
	</main>
	<footer>
		<section>
			<img src="scalak.jpg" alt="promocje na procesory" />
		</section>
		<section>
			<h4>Nasz Sklep Komputerowy</h4>
			<p>Współpracujemy z hurtownią <a href="http://www.edata.pl/" target="_blank">edata</a></p>
		</section>
		<section>
			<p>zadzwoń: 601 602 603</p>
		</section>
		<section>
			<p>Stronę wykonał: Chr1skyy</p>
		</section>
	</footer>
</body>

</html>