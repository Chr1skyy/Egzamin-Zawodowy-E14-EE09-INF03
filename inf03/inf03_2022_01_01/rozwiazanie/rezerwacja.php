<?php
$con = mysqli_connect('localhost', 'root', '', 'baza');
if(isset($_POST['rezerwuj'])) {
	$data = $_POST['data'];
	$ilosc = $_POST['ilosc'];
	$telefon = $_POST['telefon'];
	$kw = "INSERT INTO rezerwacje VALUES (NULL, NULL, '$data', $ilosc, '$telefon');";
	mysqli_query($con, $kw);
	echo "Dodano rezerwcje do bazy";
}
mysqli_close($con);
?>