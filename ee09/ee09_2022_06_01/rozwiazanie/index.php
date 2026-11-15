<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="UTF-8" />
	<title>Forum o psach</title>
	<link rel="stylesheet" href="styl.css" />
</head>
<body>
	<header>
		<h1>Forum miłośników psów</h1>
	</header>
	<main>
		<section id="left">
			<img src="Avatar.png" alt="Użytkownik forum" />
			<?php
			// Skrypt 1
			$polaczenie = mysqli_connect('localhost', 'root', '', 'forumpsy');
			
			$zapytanie3 = "SELECT konta.nick, konta.postow, pytania.pytanie FROM konta, pytania WHERE konta.id = pytania.konta_id AND pytania.id = 1;";
			$wynik3 = mysqli_query($polaczenie, $zapytanie3);
			while ($wiersz = mysqli_fetch_array($wynik3)) {
				echo "<h4>Użytkownik: {$wiersz['nick']}</h4>
					<p>{$wiersz['postow']} postów na forum</p>
					<p>{$wiersz['pytanie']}</p>";
			}
			?>
			<video src="video.mp4" controls loop></video>
		</section>
		<section id="right">
			<form action="index.php" method="post">
				<textarea name="odp" rows="4" cols="40"></textarea><br/>
				<button>Dodaj odpowiedź</button>
			</form>
			<?php
			// Skrypt 2
			if (!empty($_POST['odp'])) {
				$odpowiedz = $_POST['odp'];
				$zapytanie1 = "INSERT INTO odpowiedzi VALUES (NULL, 1, 5, '$odpowiedz');";
				mysqli_query($polaczenie, $zapytanie1);
			}
			?>
			<h2>Odpowiedzi na pytanie</h2>
			<ol>
				<?php
				// Skrypt 3
				$zapytanie4 = "SELECT odpowiedzi.odpowiedz, konta.nick FROM odpowiedzi, konta WHERE odpowiedzi.konta_id = konta.id AND odpowiedzi.Pytania_id = 1;";
				$wynik4 = mysqli_query($polaczenie, $zapytanie4);
				while ($wiersz = mysqli_fetch_array($wynik4)) {
					echo "<li>{$wiersz['odpowiedz']} <em>{$wiersz['nick']}</em></li><hr/>";
				}
				?>
			</ol>
		</section>
	</main>
	<footer>
		Autor: Chr1skyy <a href="http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a>
	</footer>
	<?php
	mysqli_close($polaczenie);
	?>
</body>
</html>