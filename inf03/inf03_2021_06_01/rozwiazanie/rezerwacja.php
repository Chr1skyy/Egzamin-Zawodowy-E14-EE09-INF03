<?php
$polaczenie = mysqli_connect('localhost', 'root', '', 'baza');
if (isset($_POST['rezerwuj'])) {
	$data = $_POST['data'];
	$ilosc = $_POST['ilosc'];
	$telefon = $_POST['telefon'];
	$zapytanie = "INSERT INTO rezerwacje VALUES (NULL, NULL, '$data', $ilosc, '$telefon');";
	mysqli_query($polaczenie, $zapytanie);
	echo "Dodano rezerwację do bazy";
}
mysqli_close($polaczenie);
?>