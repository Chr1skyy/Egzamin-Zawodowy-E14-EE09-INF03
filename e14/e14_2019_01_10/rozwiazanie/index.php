<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Odżywianie zwierząt</title>
	<link rel="stylesheet" href="styl4.css" />
</head>

<body>
	<header>
		<h2>DRAPIEŻNIKI I INNE</h2>
	</header>
	<section id="formularz">
		<h3>Wybierz styl życia:</h2>
			<form action="index.php" method="post">
				<select name="lista">
					<option value="1">Drapieżniki</option>
					<option value="2">Roślinożerne</option>
					<option value="3">Padlinożerne</option>
					<option value="4">Wszystkożerne</option>
				</select>
				<button type="submit" name="submit">Zobacz</button>
			</form>
	</section>
	<main>
		<section id="lewy">
			<h3>Lista zwierząt</h3>
			<ul>
				<?php
				// Skrypt 1
				$polaczenie = mysqli_connect('localhost', 'root', '', 'baza');
				$zapytanie2 = "SELECT zwierzeta.gatunek, odzywianie.rodzaj FROM zwierzeta JOIN odzywianie ON zwierzeta.Odzywianie_id = odzywianie.id;";
				$wynik2 = mysqli_query($polaczenie, $zapytanie2);
				while ($wiersz = mysqli_fetch_array($wynik2)) {
					echo "<li>{$wiersz['gatunek']} -> {$wiersz['rodzaj']}</li>";
				}
				?>
			</ul>
		</section>
		<section id="srodkowy">
			<?php
			// Skrypt 2
			if (isset($_POST['submit'])) {
				$nr = $_POST['lista'];
				if (!empty($nr)) {
					$wybor = "";
					if ($nr == 1) {
						$wybor = "Drapieżniki";
					} else if ($nr == 2) {
						$wybor = "Roślinożerne";
					} else if ($nr == 3) {
						$wybor = "Padlinożerne";
					} else if ($nr == 4) {
						$wybor = "Wszystkożerne";
					}
					$zapytanie1 = "SELECT id, gatunek, wystepowanie FROM zwierzeta WHERE Odzywianie_id = $nr;";
					echo "<h3>$wybor</h3>";
					$wynik1 = mysqli_query($polaczenie, $zapytanie1);
					while ($wiersz = mysqli_fetch_array($wynik1)) {
						echo "{$wiersz['id']}. {$wiersz['gatunek']}, {$wiersz['wystepowanie']}<br/>";
					}
				}
			}
			mysqli_close($polaczenie);
			?>
		</section>
		<section id="prawy">
			<img src="drapieznik.jpg" alt="Wilki" />
		</section>
	</main>
	<footer>
		<a href="http://pl.wikipedia.org" target="_blank">Poczytaj o zwierzętach na WIkipedii</a>,
		autor strony: Chr1skyy
	</footer>
</body>

</html>