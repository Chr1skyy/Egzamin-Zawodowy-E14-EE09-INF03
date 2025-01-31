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
			$connect = mysqli_connect('localhost', 'root', '', 'sklep');
			$query = "SELECT id, nazwa, opis, cena FROM podzespoly WHERE cena < 1000;";
			$result = mysqli_query($connect, $query);
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>
						<td>{$row['id']}</td>
						<td>{$row['nazwa']}</td>
						<td>{$row['opis']}</td>
						<td>{$row['cena']}</td>
					</tr>";
			}
			mysqli_close($connect);
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