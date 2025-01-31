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
			<a href="borowik.jpg"><img src="borowik-miniatura.jpg" alt="Grzybobranie" /></a>
		</section>
		<section id="tytulowy">
			<h1>Idziemy na grzyby</h1>
		</section>
	</header>
	<main>
		<section id="lewy">
			<?php
			$connect = mysqli_connect('localhost', 'root', '', 'dane2');
			$query1 = "SELECT nazwa_pliku, potoczna FROM grzyby;";
			$result1 = mysqli_query($connect, $query1);
			while ($row = mysqli_fetch_array($result1)) {
				echo "<img src='{$row['nazwa_pliku']}' title='{$row['potoczna']}' />";
			}
			?>
		</section>
		<section id="prawy">
			<h2>Grzyby jadalne</h2>
			<?php
			$query2 = "SELECT nazwa, potoczna FROM grzyby WHERE jadalny = 1;";
			$result2 = mysqli_query($connect, $query2);
			while ($row = mysqli_fetch_array($result2)) {
				echo "<p>{$row['nazwa']} ({$row['potoczna']})</p>";
			}
			?>
			<h2>Polecamy do sosów</h2>
			<ol>
				<?php
				$query3 = "SELECT grzyby.nazwa, grzyby.potoczna, rodzina.nazwa AS rodzina FROM grzyby JOIN rodzina ON grzyby.rodzina_id = rodzina.id JOIN potrawy ON grzyby.potrawy_id = potrawy.id WHERE potrawy.nazwa = 'sos';";
				$result3 = mysqli_query($connect, $query3);
				while ($row = mysqli_fetch_array($result3)) {
					echo "<li>{$row['nazwa']} ({$row['potoczna']}), rodzina: {$row['rodzina']}</li>";
				}
				mysqli_close($connect);
				?>
			</ol>
		</section>
	</main>
	<footer>
		<p>Autor: Chr1skyy</p>
	</footer>
</body>

</html>