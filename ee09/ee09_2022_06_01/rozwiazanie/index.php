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
			$con = mysqli_connect('localhost', 'root', '', 'forumpsy');
			
			$q = "SELECT konta.nick, konta.postow, pytania.pytanie FROM konta, pytania WHERE konta.id = pytania.konta_id AND pytania.id = 1;";
			$res = mysqli_query($con, $q);
			while($row = mysqli_fetch_array($res)) {
				echo "<h4>Użytkownik: $row[0]</h4>
					<p>$row[1] postów na forum</p>
					<p>$row[2]</p>";
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
			if(!empty($_POST['odp'])) {
				$odp = $_POST['odp'];
				$q = "INSERT INTO odpowiedzi VALUES (NULL, 1, 5, '$odp');";
				mysqli_query($con, $q);
			}
			?>
			<h2>Odpowiedzi na pytanie</h2>
			<ol>
				<?php
				$q = "SELECT odpowiedzi.odpowiedz, konta.nick FROM odpowiedzi, konta WHERE odpowiedzi.konta_id = konta.id AND odpowiedzi.Pytania_id = 1;";
				$res = mysqli_query($con, $q);
				while($row = mysqli_fetch_array($res)) {
					echo "<li>$row[0] <em>$row[1]</em></li><hr/>";
				}
				?>
			</ol>
		</section>
	</main>
	<footer>
		Autor: Chriskyy#0181 <a href="http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a>
	</footer>
	<?php
	mysqli_close($con);
	?>
</body>
</html>