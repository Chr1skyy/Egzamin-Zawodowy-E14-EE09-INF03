<?php
$con = mysqli_connect('localhost', 'root', '', 'wedkowanie');
if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['adres'])) {
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$adres = $_POST['adres'];
	$kw = "INSERT INTO karty_wedkarskie VALUES (NULL, '$imie', '$nazwisko', '$adres', 'NULL', NULL);";
	mysqli_query($con, $kw);
}
mysqli_close($con);
?>