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
				$connect = mysqli_connect('localhost', 'root', '', 'baza');
				$query1 = "SELECT zwierzeta.gatunek, odzywianie.rodzaj FROM zwierzeta JOIN odzywianie ON zwierzeta.Odzywianie_id = odzywianie.id;";
				$result1 = mysqli_query($connect, $query1);
				while ($row = mysqli_fetch_array($result1)) {
					echo "<li>{$row['gatunek']} -> {$row['rodzaj']}</li>";
				}
				?>
			</ul>
		</section>
		<section id="srodkowy">
			<?php
			if (isset($_POST['submit'])) {
				$nr = $_POST['lista'];
				if (!empty($nr)) {
					$wybor = "";
					if ($nr == 1)
						$wybor = "Drapieżniki";
					if ($nr == 2)
						$wybor = "Roślinożerne";
					if ($nr == 3)
						$wybor = "Padlinożerne";
					if ($nr == 4)
						$wybor = "Wszystkożerne";
					$query2 = "SELECT zwierzeta.id, zwierzeta.gatunek, zwierzeta.wystepowanie FROM zwierzeta JOIN odzywianie ON zwierzeta.Odzywianie_id = odzywianie.id WHERE odzywianie.id = $nr;";
					echo "<h3>$wybor</h3>";
					$result2 = mysqli_query($connect, $query2);
					while ($row = mysqli_fetch_array($result2)) {
						echo "{$row['id']}. {$row['gatunek']}, {$row['wystepowanie']}<br/>";
					}
				}
			}
			mysqli_close($connect);
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