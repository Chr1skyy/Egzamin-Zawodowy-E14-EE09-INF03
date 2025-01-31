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
			$connect = mysqli_connect('localhost', 'root', '', 'baza');
			if (isset($_POST['submit'])) {
				$nr = $_POST['nr'];
				if (!empty($nr)) {
					$wybor = "";
					if ($nr == 1)
						$wybor = "RYBY";
					if ($nr == 2)
						$wybor = "PŁAZY";
					if ($nr == 3)
						$wybor = "GADY";
					if ($nr == 4)
						$wybor = "PTAKI";
					if ($nr == 5)
						$wybor = "SSAKI";
					$query1 = "SELECT gatunek, wystepowanie FROM zwierzeta JOIN gromady ON zwierzeta.Gromady_id = gromady.id WHERE gromady.id = $nr;";
					$result1 = mysqli_query($connect, $query1);
					echo "<h2>$wybor</h2>";
					while ($row = mysqli_fetch_array($result1)) {
						echo "{$row['gatunek']}, {$row['wystepowanie']}<br/>";
					}
				}
			}
			?>
		</section>
		<section id="prawy">
			<h2>Wszystkie zwierzęta w bazie</h2>
			<?php
			$query2 = "SELECT zwierzeta.id, zwierzeta.gatunek, gromady.nazwa FROM zwierzeta JOIN gromady ON zwierzeta.Gromady_id = gromady.id;";
			$result2 = mysqli_query($connect, $query2);
			while ($row = mysqli_fetch_array($result2)) {
				echo "{$row['id']}. {$row['gatunek']}, {$row['nazwa']}<br/>";
			}
			mysqli_close($connect);
			?>
		</section>
	</main>
	<footer>
		<a href="http://altas-zwierzat.pl" target="_blank">Poznaj inne strony o zwierzętach</a>
		autor Atlasu zwierząt: Chr1skyy
	</footer>
</body>

</html>