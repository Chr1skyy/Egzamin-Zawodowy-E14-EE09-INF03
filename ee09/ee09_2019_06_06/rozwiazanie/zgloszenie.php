<?php
$polaczenie = mysqli_connect('localhost', 'root', '', 'ratownictwo');
if (!empty($_POST['zespol']) && !empty($_POST['dyspozytor']) && !empty($_POST['adres'])) {
	$zespol = $_POST['zespol'];
	$dyspozytor = $_POST['dyspozytor'];
	$adres = $_POST['adres'];
	$zapytanie = "INSERT INTO zgloszenia VALUES (NULL, $zespol, $dyspozytor, '$adres', 0, NOW());";
	mysqli_query($polaczenie, $zapytanie);
}
mysqli_close($polaczenie);
?>