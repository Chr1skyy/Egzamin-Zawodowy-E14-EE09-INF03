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
		$con = mysqli_connect('localhost', 'root', '', 'hurtownia');
		$q = "SELECT klienci.zdjecie, klienci.imie, opinie.opinia FROM klienci, opinie, typy WHERE klienci.id = opinie.klienci_id AND typy.id = klienci.typy_id AND typy.id IN (2,3);";
		$res = mysqli_query($con, $q);
		while($row = mysqli_fetch_array($res)) {
			echo "<div class='opinia'>
					<img src='$row[0]' alt='klient' />
					<blockquote>$row[2]</blockquote>
					<h4>$row[1]</h4>
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
				$q = "SELECT imie, nazwisko, punkty FROM klienci ORDER BY punkty DESC LIMIT 3;";
				$res = mysqli_query($con, $q);
				while($row = mysqli_fetch_array($res)) {
					echo "<li>$row[0] $row[1], $row[2]</li>";
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
	mysqli_close($con);
	?>
</body>
</html>