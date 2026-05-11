<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Bar Smacznie i Miło</title>
	<link rel="stylesheet" href="styl3.css" />
</head>

<body>
	<header>
		<img src="menu.jpg">
		<h1>Bar Smacznie i Miło juz otwarty!</h1>
		<img src="menu.jpg">
	</header>
	<main>
		<section id="lewy">
			<h2>Dania mięsne</h2>
			<?php
			$connect = mysqli_connect('localhost', 'root', '', 'baza');
			$query1 = "SELECT nazwa, cena FROM dania WHERE typ = 2";
			$result1 = mysqli_query($connect, $query1);
			while ($row = mysqli_fetch_array($result1)) {
				echo "<p>{$row['nazwa']} {$row['cena']} zł</p>";
			}
			?>
		</section>
		<section id="srodkowy">
			<h2>Zupy</h2>
			<?php
			$query2 = "SELECT nazwa, cena FROM dania WHERE typ = 1";
			$result2 = mysqli_query($connect, $query2);
			while ($row = mysqli_fetch_array($result2)) {
				echo "<p>{$row['nazwa']} {$row['cena']} zł</p>";
			}
			?>
		</section>
		<section id="prawy">
			<?php
			$query3 = "SELECT AVG(cena) AS AvgCena FROM dania WHERE typ = 1";
			$result3 = mysqli_query($connect, $query3);
			$row = mysqli_fetch_array($result3);
			?>
			<p>Średnia cena naszej zupy to <?php echo $row[0]; ?> zł</p>
			<ol>
				<li>Obiady od 40 zł</li>
				<li>Przekąski od 10 zł</li>
				<li>Kolacje od 20 zł</li>
			</ol>
		</section>
	</main>
	<footer>
		Stronę internetową opracował: <b>Chr1skyy</b>
	</footer>
	<?php mysqli_close($connect); ?>
</body>

</html>