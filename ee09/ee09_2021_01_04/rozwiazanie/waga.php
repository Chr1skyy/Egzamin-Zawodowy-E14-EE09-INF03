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
		<img src="wzor.png" alt="liczymi BMI" />
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
		$con = mysqli_connect('localhost', 'root', '', 'egzamin');
		if(!empty($_POST['waga']) && !empty($_POST['wzrost'])) {
			$waga = $_POST['waga'];
			$wzrost = $_POST['wzrost'];
			$bmi = $waga / ($wzrost * $wzrost) * 10000;
			if($bmi > 0 && $bmi < 19) $przedzial = 1;
			if($bmi > 19 && $bmi < 26) $przedzial = 2;
			if($bmi > 26 && $bmi < 31) $przedzial = 3;
			if($bmi > 31 && $bmi < 100) $przedzial = 4;
			echo "Twoja waga: $waga, Twój wzrost: $wzrost<br/>BMI wynosi: $bmi";
			$data = DATE("Y-m-d");
			$kw1 = "INSERT INTO wynik VALUES (NULL, $przedzial, '$data', $bmi);";
			mysqli_query($con, $kw1);
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
			$kw2 = "SELECT id, informacja, wart_min FROM bmi;";
			$res2 = mysqli_query($con, $kw2);
			while($tab = mysqli_fetch_row($res2)) {
				echo "<tr><td>$tab[0]</td><td>$tab[1]</td><td>$tab[2]</td></tr>";
			}
			mysqli_close($con);
			?>
		</table>
	</div>
	<div id="stopka">
		Autor: Chriskyy#0181
		<a href="kw2.jpg">Wynik działania kwerendy 2</a>
	</div>
</body>
</html>