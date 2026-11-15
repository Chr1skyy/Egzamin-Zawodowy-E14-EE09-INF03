<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Dane o zwierzętach</title>
	<link rel="stylesheet" href="styl3.css" />
</head>

<body>
	<header>
		<h1>ATLAS ZWIERZĄT</h1>
	</header>
	<section id="formularz">
		<h2>Gromady:</h2>
		<ol>
			<li>Ryby</li>
			<li>Płazy</li>
			<li>Gady</li>
			<li>Ptaki</li>
			<li>Ssaki</li>
		</ol>
		<form action="index.php" method="post">
			<label>Wybierz gromadę:
				<input type="number" name="nr" />
			</label>
			<button type="submit" name="submit">Wyświetl</button>
		</form>
	</section>
	<main>
		<section id="lewy">
			<img src="zwierzeta.jpg" alt="dzikie zwierzeta" />
		</section>
		<section id="srodkowy">
			<?php
			// Skrypt 1
			$polaczenie = mysqli_connect('localhost', 'root', '', 'baza');
			if (isset($_POST['submit'])) {
				$nr = $_POST['nr'];
				if (!empty($nr)) {
					$wybor = "";
					if ($nr == 1) {
						$wybor = "RYBY";
					} else if ($nr == 2) {
						$wybor = "PŁAZY";
					} else if ($nr == 3) {
						$wybor = "GADY";
					} else if ($nr == 4) {
						$wybor = "PTAKI";
					} else if ($nr == 5) {
						$wybor = "SSAKI";
					}
					$zapytanie1 = "SELECT gatunek, wystepowanie FROM zwierzeta WHERE Gromady_id = $nr;";
					$wynik1 = mysqli_query($polaczenie, $zapytanie1);
					echo "<h2>$wybor</h2>";
					while ($wiersz = mysqli_fetch_array($wynik1)) {
						echo "{$wiersz['gatunek']}, {$wiersz['wystepowanie']}<br/>";
					}
				}
			}
			?>
		</section>
		<section id="prawy">
			<h2>Wszystkie zwierzęta w bazie</h2>
			<?php
			// Skrypt 2
			$zapytanie2 = "SELECT zwierzeta.id, zwierzeta.gatunek, gromady.nazwa FROM zwierzeta JOIN gromady ON zwierzeta.Gromady_id = gromady.id;";
			$wynik2 = mysqli_query($polaczenie, $zapytanie2);
			while ($wiersz = mysqli_fetch_array($wynik2)) {
				echo "{$wiersz['id']}. {$wiersz['gatunek']}, {$wiersz['nazwa']}<br/>";
			}
			mysqli_close($polaczenie);
			?>
		</section>
	</main>
	<footer>
		<a href="http://altas-zwierzat.pl" target="_blank">Poznaj inne strony o zwierzętach</a>
		autor Atlasu zwierząt: Chr1skyy
	</footer>
</body>

</html>