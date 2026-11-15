<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Twoje BMI</title>
	<link rel="stylesheet" href="styl3.css" />
</head>
<body>
	<div id="logo">
		<img src="wzor.png" alt="wzór BMI" />
	</div>
	<div id="baner">
		<h1>Oblicz swoje BMI</h1>
	</div>
	<div id="glowny">
		<table>
			<tr>
				<th>Interpretacja BMI</th>
				<th>Wartość minimalna</th>
				<th>Wartość maksymalna</th>
			</tr>
			<?php
			// Skrypt 1
			$polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin');
			$zapytanie1 = "SELECT informacja, wart_min, wart_max FROM bmi;";
			$wynik1 = mysqli_query($polaczenie, $zapytanie1);
			while($wiersz = mysqli_fetch_array($wynik1)) {
				echo "<tr><td>{$wiersz['informacja']}</td><td>{$wiersz['wart_min']}</td><td>{$wiersz['wart_max']}</td></tr>";
			}
			?>
		</table>
	</div>
	<div id="lewy">
		<h2>Podaj wagę i wzrost</h2>
		<form action="bmi.php" method="post">
			<label>
				Waga:
				<input type="number" name="waga" min="1" /><br/>
			</label>
			<label>
				Wzrost w cm:
				<input type="number" name="wzrost" min="1" /><br/>
			</label>
			<button>Oblicz i zapamiętaj wynik</button>
		</form>
		<?php
		// Skrypt 2
		if (!empty($_POST['waga']) && !empty($_POST['wzrost'])) {
			$waga = $_POST['waga'];
			$wzrost = $_POST['wzrost'];
			$bmi = $waga / ($wzrost * $wzrost) * 10000;
			echo "Twoja waga: $waga, Twój wzrost: $wzrost<br/>BMI wynosi: $bmi";
			if ($bmi < 19) {
				$przedzial = 1;
			} else if ($bmi < 26) {
				$przedzial = 2;
			} else if ($bmi < 31) {
				$przedzial = 3;
			} else {
				$przedzial = 4;
			}
			$data = date('Y-m-d');
			$zapytanie2 = "INSERT INTO wynik VALUES (NULL, $przedzial, '$data', $bmi);";
			mysqli_query($polaczenie, $zapytanie2);
		}
		mysqli_close($polaczenie);
		?>
	</div>
	<div id="prawy">
		<img src="rys1.png" alt="ćwiczenia" />
	</div>
	<div id="stopka">
		Autor: Chr1skyy 
		<a href="kwerendy.txt">Zobacz kwerendy</a>
	</div>
</body>
</html>