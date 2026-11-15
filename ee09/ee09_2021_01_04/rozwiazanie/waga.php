<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Twój wskaźnik BMI</title>
	<link rel="stylesheet" href="styl4.css" />
</head>
<body>
	<div id="baner">
		<h2>Oblicz wskaźnik BMI</h2>
	</div>
	<div id="logo">
		<img src="wzor.png" alt="liczymy BMI" />
	</div>
	<div id="lewy">
		<img src="rys1.png" alt="zrzuć kalorie!" />
	</div>
	<div id="prawy">
		<h1>Podaj dane</h1>
		<form action="waga.php" method="post">
			<label>
				Waga:
				<input type="number" name="waga" /><br/>
			</label>
			<label>
				Wzrost [cm]:
				<input type="number" name="wzrost" /><br/>
			</label>
			<button>Licz BMI i zapisz wynik</button>
		</form>
		<?php
		// Skrypt 1
		$polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin');
		if (!empty($_POST['waga']) && !empty($_POST['wzrost'])) {
			$waga = $_POST['waga'];
			$wzrost = $_POST['wzrost'];
			$bmi = $waga / ($wzrost * $wzrost) * 10000;
			if ($bmi < 19) {
				$przedzial = 1;
			} else if ($bmi < 26) {
				$przedzial = 2;
			} else if ($bmi < 31) {
				$przedzial = 3;
			} else {
				$przedzial = 4;
			}
			echo "Twoja waga: $waga, Twój wzrost: $wzrost<br/>BMI wynosi: $bmi";
			$data = date("Y-m-d");
			$zapytanie1 = "INSERT INTO wynik VALUES (NULL, $przedzial, '$data', $bmi);";
			mysqli_query($polaczenie, $zapytanie1);
		}
		?>
	</div>
	<div id="glowny">
		<table>
			<tr>
				<th>lp.</th>
				<th>Interpretacja</th>
				<th>zaczyna się od...</th>
			</tr>
			<?php
			// Skrypt 2
			$zapytanie2 = "SELECT id, informacja, wart_min FROM bmi;";
			$wynik2 = mysqli_query($polaczenie, $zapytanie2);
			while($wiersz = mysqli_fetch_array($wynik2)) {
				echo "<tr><td>{$wiersz['id']}</td><td>{$wiersz['informacja']}</td><td>{$wiersz['wart_min']}</td></tr>";
			}
			mysqli_close($polaczenie);
			?>
		</table>
	</div>
	<div id="stopka">
		Autor: Chr1skyy
		<a href="kw2.jpg">Wynik działania kwerendy 2</a>
	</div>
</body>
</html>