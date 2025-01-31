<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Biblioteka miejska</title>
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<header>
		<h2>Miejska Biblioteka Publiczna w Książkowicach</h2>
	</header>
	<main>
		<section id="lewy">
			<h3>W naszych zbiorach znajdziesz dzieła następujących autorów:</h3>
			<ul>
				<?php
				$connect = mysqli_connect('localhost', 'root', '', 'biblioteka');
				$query1 = "SELECT imie, nazwisko FROM autorzy;";
				$result1 = mysqli_query($connect, $query1);
				while ($row = mysqli_fetch_array($result1)) {
					echo "<li>{$row['imie']} {$row['nazwisko']}</li>";
				}
				?>
			</ul>
		</section>
		<section id="srodkowy">
			<h3>Dodaj nowego czytelnika</h3>
			<form action="biblioteka.php" method="post">
				<label>
					imię:
					<input type="text" name="imie" /><br />
				</label>
				<label>
					nazwisko:
					<input type="text" name="nazwisko" /><br />
				</label>
				<label>
					rok urodzenia:
					<input type="number" name="rok" /><br />
				</label>
				<button type="submit" name="submit">DODAJ</button>
			</form>
			<?php
			if (isset($_POST['submit'])) {
				$imie = $_POST['imie'];
				$nazwisko = $_POST['nazwisko'];
				$rok = $_POST['rok'];
				if (!empty($imie) && !empty($nazwisko) && !empty($rok)) {
					$kod = "{$imie[0]}{$imie[1]}{$nazwisko[0]}{$nazwisko[1]}";
					$kod = strtoupper($kod);
					$kod = "{$kod}{$rok[-2]}{$rok[-1]}";
					$query2 = "INSERT INTO czytelnicy VALUES (NULL, '$imie', '$nazwisko', '$kod');";
					mysqli_query($connect, $query2);
					echo "Czytelnik: $imie $nazwisko został dodany do bazy danych";
				}
			}
			mysqli_close($connect);
			?>
		</section>
		<section id="prawy">
			<img src="biblioteka.png" alt="książki" />
			<h4>ul. Czytelnicza 25<br />
				12-120 Książkowice<br />
				tel.: 123123123<br />
				e-mail: <a href="mailto:biuro@biblioteka.pl">biuro@biblioteka.pl</a>
			</h4>
		</section>
	</main>
	<footer>
		<p>Projekt strony: Chr1skyy</p>
	</footer>
</body>

</html>