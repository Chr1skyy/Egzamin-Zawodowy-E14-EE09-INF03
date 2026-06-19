<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Filmoteka</title>
	<link rel="stylesheet" href="styl3.css" />
</head>

<body>
	<header>
		<section>
			<img src="klaps.png" alt="Nasze filmy" />
		</section>
		<section>
			<h1>BAZA FILMÓW</h1>
		</section>
		<section>
			<form action="index.php" method="post">
				<select name="wybor">
					<option value="1">Sci-Fi</option>
					<option value="2">animacja</option>
					<option value="3">dramat</option>
					<option value="4">horror</option>
					<option value="5">komedia</option>
				</select>
				<button type="submit" name="submit">Filmy</button>
			</form>
		</section>
		<section>
			<img src="gwiezdneWojny.jpg" alt="szturmowcy" />
		</section>
	</header>
	<main>
		<section>
			<h2>Wybrano filmy:</h2>
			<?php
			$connect = mysqli_connect('localhost', 'root', '', 'dane');
			if (isset($_POST['submit'])) {
				$wybor = $_POST['wybor'];
				$query1 = "SELECT tytul, rok, ocena FROM filmy WHERE gatunki_id = $wybor";
				$result1 = mysqli_query($connect, $query1);
				while ($row = mysqli_fetch_array($result1)) {
					echo "<p>Tytuł: {$row['tytul']}, Rok produkcji: {$row['rok']}, Ocena: {$row['ocena']}</p>";
				}
			}
			?>
		</section>
		<section>
			<h2>Wybrano filmy:</h2>
			<?php
			$query2 = "SELECT filmy.id, tytul, imie, nazwisko FROM filmy JOIN rezyserzy ON filmy.rezyserzy_id = rezyserzy.id;";
			$result2 = mysqli_query($connect, $query2);
			while ($row = mysqli_fetch_array($result2)) {
				echo "<p>{$row['id']}.{$row['tytul']}, reżyseria: {$row['imie']} {$row['nazwisko']}</p>";
			}
			mysqli_close($connect);
			?>
		</section>
	</main>
	<footer>
		<p>Autor: Chr1skyy</p>
		<a href="kwerendy.txt">Zapytania do bazy</a>
		<a href="http://filmy.pl">Przejdź do filmy.pl</a>
	</footer>
</body>

</html>