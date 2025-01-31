<?php
$connect = mysqli_connect('localhost', 'root', '', 'baza');
if (isset($_POST["submit"])) {
	$data = $_POST['data'];
	$liczba_osob = $_POST['osob'];
	$telefon = $_POST['telefon'];
	if (empty($data) || empty($liczba_osob) || empty($telefon)) {
		echo "Wykryto puste pola";
	} else {
		$query = "INSERT INTO rezerwacje(id, data_rez, liczba_osob, telefon) VALUES (NULL, '$data', $liczba_osob, '$telefon')";
		mysqli_query($connect, $query);
		echo "Dodano rezerwacje do bazy";
	}
}
mysqli_close($connect);
?>