<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<title>Sklep</title>
	<link rel="stylesheet" href="styl.css" />
</head>

<body>
	<header>
		<h1>Ozdoby - sklep</h1>
	</header>
	<main>
		<section id="lewy">
			<h2>OZDOBY</h2>
			<a href="galeria.html">Galeria</a><br />
			<a href="zamowienie.php">Zamówienie</a>
		</section>
		<section id="srodkowy">
			<p>Dodaj użytkownika</p>
			<form action="zamowienie.php" method="post">
				<label>
					Imię:
					<input type="text" name="imie" /><br />
				</label>
				<label>
					Nazwisko:
					<input type="text" name="nazwisko" /><br />
				</label>
				<label>
					e-mail:
					<input type="email" name="email" /><br />
				</label>
				<button name="submit">WYŚLIJ</button>
			</form>
			<?php
			$connect = mysqli_connect('localhost', 'root', '', 'sklep');
			if (isset($_POST['submit'])) {
				$imie = $_POST['imie'];
				$nazwisko = $_POST['nazwisko'];
				$email = $_POST['email'];
				$query = "INSERT INTO zamowienia(imie, nazwisko, adres_email) VALUES ('$imie', '$nazwisko', '$email')";
				mysqli_query($connect, $query);
			}
			mysqli_close($connect);
			?>
		</section>
		<section id="prawy">
			<img src="animacja.gif" />
		</section>
	</main>
	<footer>
		<h3>Autor strony: Chr1skyy</h3>
	</footer>
</body>

</html>