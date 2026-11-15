<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Biblioteka publiczna</title>
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<header>
		<h3>Miejska Biblioteka Publiczna w Książkowicach</h2>
	</header>
	<main>
		<section id="lewy">
			<h2>Dodaj czytelnika</h2>
			<form action="biblioteka.php" method="post">
				<label>imię:
					<input type="text" name="imie" /><br />
				</label>
				<label>nazwisko:
					<input type="text" name="nazwisko" /><br />
				</label>
				<label>rok urodzenia:
					<input type="number" name="rok" /><br />
				</label>
				<button type="submit" name="submit">DODAJ</button>
			</form>
			<?php
			// Skrypt 1
			$polaczenie = mysqli_connect('localhost', 'root', '', 'biblioteka');
			if (isset($_POST['submit'])) {
				$imie = $_POST['imie'];
				$nazwisko = $_POST['nazwisko'];
				$rok = $_POST['rok'];
				if (!empty($imie) && !empty($nazwisko) && !empty($rok)) {
					$literyImienia = substr($imie, 0, 2);
					$cyfryRoku = substr($rok, -2);
					$literyNazwiska = substr($nazwisko, 0, 2);
					$kod = strtolower("{$literyImienia}{$cyfryRoku}{$literyNazwiska}");
					$zapytanie1 = "INSERT INTO czytelnicy VALUES (NULL, '$imie', '$nazwisko', '$kod');";
					mysqli_query($polaczenie, $zapytanie1);
					echo "Czytelnik: $nazwisko został dodany do bazy danych";
				}
			}
			?>
		</section>
		<section id="srodkowy">
			<img src="biblioteka.png" alt="biblioteka" />
			<h4>
				ul. Czytelnicza 25<br />
				12-120 Książkowice<br />
				tel.: 123123123<br />
				e-mail: <a href="mailto:biuro@bib.pl">biuro@bib.pl</a>
			</h4>
		</section>
		<section id="prawy">
			<h3>Nasi czytelnicy</h3>
			<ul>
				<?php
				// Skrypt 2
				$zapytanie2 = "SELECT imie, nazwisko FROM czytelnicy;";
				$wynik2 = mysqli_query($polaczenie, $zapytanie2);
				while ($wiersz = mysqli_fetch_array($wynik2)) {
					echo "<li>{$wiersz['imie']} {$wiersz['nazwisko']}</li>";
				}
				mysqli_close($polaczenie);
				?>
			</ul>
		</section>
	</main>
	<footer>
		<p>Projekt witryny: Chr1skyy</p>
	</footer>
</body>

</html>