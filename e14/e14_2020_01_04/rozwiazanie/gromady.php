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
			$connect = mysqli_connect('localhost', 'root', '', 'baza');
			$query1 = "SELECT id, Gromady_id, gatunek, wystepowanie FROM zwierzeta WHERE Gromady_id IN (4, 5);";
			$result1 = mysqli_query($connect, $query1);
			while ($row = mysqli_fetch_array($result1)) {
				if ($row['Gromady_id'] == 4)
					$gromada = "ptaki";
				if ($row['Gromady_id'] == 5)
					$gromada = "ssaki";
				echo "<p>{$row['id']}. {$row['gatunek']}</p>";
				echo "<p>Występowanie: {$row['wystepowanie']}, gromada $gromada</p>";
				echo "<hr/>";
			}
			?>
		</section>
		<section id="prawy">
			<h1>PTAKI</h1>
			<ol>
				<?php
				$query2 = "SELECT gatunek, obraz FROM zwierzeta WHERE Gromady_id = 4;";
				$result2 = mysqli_query($connect, $query2);
				while ($row = mysqli_fetch_array($result2)) {
					echo "<li><a href='{$row['obraz']}'>{$row['gatunek']}</a></li>";
				}
				mysqli_close($connect);
				?>
			</ol>
			<img src="sroka.jpg" alt="Sroka zwyczajna, gromada ptaki" />
		</section>
	</main>
	<footer>
		Stronę o kręgowcach przygotował: Chr1skyy
	</footer>
</body>

</html>