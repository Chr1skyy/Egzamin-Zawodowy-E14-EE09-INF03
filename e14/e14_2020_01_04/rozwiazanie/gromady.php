<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Gromady kręgowców</title>
	<link rel="stylesheet" href="style12.css" />
</head>

<body>
	<section id="kontener">
		<nav>
			<a href="gromada-ryby.html">gromada ryb</a>
			<a href="gromada-ptaki.html">gromada ptaków</a>
			<a href="gromada-ssaki.html">gromada ssaków</a>
		</nav>
		<header>
			<h2>GROMADY KRĘGOWCÓW</h2>
		</header>
	</section>
	<main>
		<section id="lewy">
			<?php
			// Skrypt 1
			$polaczenie = mysqli_connect('localhost', 'root', '', 'baza');
			$zapytanie2 = "SELECT id, Gromady_id, gatunek, wystepowanie FROM zwierzeta WHERE Gromady_id IN (4, 5);";
			$wynik2 = mysqli_query($polaczenie, $zapytanie2);
			while ($wiersz = mysqli_fetch_array($wynik2)) {
				if ($wiersz['Gromady_id'] == 4) {
					$gromada = "ptaki";
				} else {
					$gromada = "ssaki";
				}
				echo "<p>{$wiersz['id']}. {$wiersz['gatunek']}</p>";
				echo "<p>Występowanie: {$wiersz['wystepowanie']}, gromada $gromada</p>";
				echo "<hr/>";
			}
			?>
		</section>
		<section id="prawy">
			<h1>PTAKI</h1>
			<ol>
				<?php
				// Skrypt 2
				$zapytanie1 = "SELECT gatunek, obraz FROM zwierzeta WHERE Gromady_id = 4;";
				$wynik1 = mysqli_query($polaczenie, $zapytanie1);
				while ($wiersz = mysqli_fetch_array($wynik1)) {
					echo "<li><a href='img/{$wiersz['obraz']}'>{$wiersz['gatunek']}</a></li>";
				}
				mysqli_close($polaczenie);
				?>
			</ol>
			<img src="img/sroka.jpg" alt="Sroka zwyczajna, gromada ptaki" />
		</section>
	</main>
	<footer>
		Stronę o kręgowcach przygotował: Chr1skyy
	</footer>
</body>

</html>