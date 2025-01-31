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
			$con = mysqli_connect('localhost', 'root', '', 'egzamin');
			$kw1 = "SELECT informacja, wart_min, wart_max FROM bmi;";
			$res1 = mysqli_query($con, $kw1);
			while($tab = mysqli_fetch_row($res1)) {
				echo "<tr><td>$tab[0]</td><td>$tab[1]</td><td>$tab[2]</td></tr>";
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
		if(!empty($_POST['waga']) && !empty($_POST['wzrost'])) {
			$waga = $_POST['waga'];
			$wzrost = $_POST['wzrost'];
			$bmi = $waga / ($wzrost * $wzrost) * 10000;
			echo "Twoja waga: $waga, Twój wzrost: $wzrost<br/>BMI wynosi: $bmi";
			if($bmi > 0 && $bmi < 19) $przedzial = 1;
			if($bmi > 19 && $bmi < 26) $przedzial = 2;
			if($bmi > 26 && $bmi < 31) $przedzial = 3;
			if($bmi > 31 && $bmi < 100) $przedzial = 4;
			$data = DATE('Y-m-d');
			$kw2 = "INSERT INTO wynik VALUES (NULL, $przedzial, '$data', $bmi);";
			mysqli_query($con, $kw2);
		}
		mysqli_close($con);
		?>
	</div>
	<div id="prawy">
		<img src="rys1.png" alt="ćwiczenia" />
	</div>
	<div id="stopka">
		Autor: Chriskyy#0181 
		<a href="kwerendy.txt">Zobacz kwerendy</a>
	</div>
</body>
</html>