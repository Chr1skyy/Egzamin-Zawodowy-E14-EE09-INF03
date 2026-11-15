<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Grzybobranie</title>
	<link rel="stylesheet" href="styl5.css" />
</head>

<body>
	<header>
		<section id="miniatura">
			<a href="img/borowik.jpg"><img src="img/borowik-miniatura.jpg" alt="Grzybobranie" /></a>
		</section>
		<section id="tytulowy">
			<h1>Idziemy na grzyby!</h1>
		</section>
	</header>
	<main>
		<section id="lewy">
			<?php
			// Skrypt 1
			$polaczenie = mysqli_connect('localhost', 'root', '', 'dane2');
			$zapytanie3 = "SELECT nazwa_pliku, potoczna FROM grzyby;";
			$wynik3 = mysqli_query($polaczenie, $zapytanie3);
			while ($wiersz = mysqli_fetch_array($wynik3)) {
				echo "<img src='img/{$wiersz['nazwa_pliku']}' title='{$wiersz['potoczna']}' />";
			}
			?>
		</section>
		<section id="prawy">
			<h2>Grzyby jadalne</h2>
			<?php
			// Skrypt 2
			$zapytanie1 = "SELECT nazwa, potoczna FROM grzyby WHERE jadalny = 1;";
			$wynik1 = mysqli_query($polaczenie, $zapytanie1);
			while ($wiersz = mysqli_fetch_array($wynik1)) {
				echo "<p>{$wiersz['nazwa']} ({$wiersz['potoczna']})</p>";
			}
			?>
			<h2>Polecamy do sosów</h2>
			<ol>
				<?php
				// Skrypt 3
				$zapytanie2 = "SELECT grzyby.nazwa, grzyby.potoczna, rodzina.nazwa FROM grzyby JOIN rodzina ON grzyby.rodzina_id = rodzina.id WHERE potrawy_id = 1;";
				$wynik2 = mysqli_query($polaczenie, $zapytanie2);
				// dwie kolumny nazywają się nazwa, dlatego numer kolumny
				while ($wiersz = mysqli_fetch_array($wynik2)) {
					echo "<li>{$wiersz[0]} ({$wiersz[1]}), rodzina: {$wiersz[2]}</li>";
				}
				mysqli_close($polaczenie);
				?>
			</ol>
		</section>
	</main>
	<footer>
		<p>Autor: Chr1skyy</p>
	</footer>
</body>

</html>