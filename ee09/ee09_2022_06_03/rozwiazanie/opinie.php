<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="utf-8" />
	<title>Opinie klientów</title>
	<link rel="stylesheet" href="styl3.css" />
</head>
<body>
	<header>
		<h1>Hurtownia spożywcza</h1>
	</header>
	<main>
		<h2>Opinie naszych klientów</h2>
		<?php
		// Skrypt 1
		$polaczenie = mysqli_connect('localhost', 'root', '', 'hurtownia');
		$zapytanie3 = "SELECT klienci.zdjecie, klienci.imie, opinie.opinia FROM klienci JOIN opinie ON klienci.id = opinie.klienci_id AND Typy_id IN (2,3);";
		$wynik3 = mysqli_query($polaczenie, $zapytanie3);
		while ($wiersz = mysqli_fetch_array($wynik3)) {
			echo "<div class='opinia'>
					<img src='img/{$wiersz['zdjecie']}' alt='klient' />
					<blockquote>{$wiersz['opinia']}</blockquote>
					<h4>{$wiersz['imie']}</h4>
				</div>";
		}
		?>
	</main>
	<footer>
		<section id="one">
			<h3>Współpracują z nami</h3>
			<a href="http://sklep.pl/">Sklep 1</a>
		</section>
		<section id="two">
			<h3>Nasi top klienci</h3>
			<ol>
				<?php
				// Skrypt 2
				$zapytanie1 = "SELECT imie, nazwisko, punkty FROM klienci ORDER BY punkty DESC LIMIT 3;";
				$wynik1 = mysqli_query($polaczenie, $zapytanie1);
				while ($wiersz = mysqli_fetch_array($wynik1)) {
					echo "<li>{$wiersz['imie']} {$wiersz['nazwisko']}, {$wiersz['punkty']} pkt.</li>";
				}
				?>
			</ol>
		</section>
		<section id="three">
			<h3>Skontaktuj się</h3>
			<p>telefon: 111222333</p>
		</section>
		<section id="four">
			<h3>Autor: 01234567890</h3>
		</section>
	</footer>
	<?php
	mysqli_close($polaczenie);
	?>
</body>
</html>