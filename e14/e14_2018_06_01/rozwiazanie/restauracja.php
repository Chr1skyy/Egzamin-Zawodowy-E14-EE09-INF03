<?php
$polaczenie = mysqli_connect('localhost', 'root', '', 'baza');
if (isset($_POST["submit"])) {
	$data = $_POST['data'];
	$liczbaOsob = $_POST['osob'];
	$telefon = $_POST['telefon'];
	if (empty($data) || empty($liczbaOsob) || empty($telefon)) {
		echo "Wykryto puste pola";
	} else {
		$zapytanie = "INSERT INTO rezerwacje(id, data_rez, liczba_osob, telefon) VALUES (NULL, '$data', $liczbaOsob, '$telefon')";
		mysqli_query($polaczenie, $zapytanie);
		echo "Dodano rezerwację do bazy";
	}
}
mysqli_close($polaczenie);
?>