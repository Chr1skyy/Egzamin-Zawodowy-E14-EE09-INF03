<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Restauracja Kulinaria.pl</title>
	<link rel="stylesheet" href="styl4.css" />
</head>

<body>
	<header>
		<h2>Restauracja Kulinaria.pl Zaprasza!</h2>
	</header>
	<main>
		<section id="lewy">
			<p>Dania mięsne zamówiesz już od
				<?php
				$connect = mysqli_connect('localhost', 'root', '', 'baza');
				$query1 = "SELECT MIN(cena) AS MinCena FROM dania WHERE typ = 2";
				$result1 = mysqli_query($connect, $query1);
				while ($row = mysqli_fetch_array($result1))
					echo $row['MinCena'];
				?>
				złotych
			</p>
			<img src="menu.jpg" alt="Pyszne spaghetti" />
			<br />
			<a href="menu.jpg">Pobierz obraz</a>
		</section>
		<section id="srodkowy">
			<h3>Przekąski</h3>
			<?php
			$query2 = "SELECT id, nazwa, cena FROM dania WHERE typ = 3";
			$result2 = mysqli_query($connect, $query2);
			while ($row = mysqli_fetch_array($result2)) {
				echo "<p>{$row['id']} {$row['nazwa']} {$row['cena']}</p>";
			}
			?>
		</section>
		<section id="prawy">
			<h3>Napoje</h3>
			<?php
			$query3 = "SELECT id, nazwa, cena FROM dania WHERE typ = 4";
			$result3 = mysqli_query($connect, $query3);
			while ($row = mysqli_fetch_array($result3)) {
				echo "<p>{$row['id']} {$row['nazwa']} {$row['cena']}</p>";
			}
			mysqli_close($connect);
			?>
		</section>
	</main>
	<footer>
		Stronę internetową opracował: <i>Chr1skyy</i>
	</footer>
</body>

</html>