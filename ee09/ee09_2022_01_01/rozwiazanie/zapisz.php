<?php
$polaczenie = mysqli_connect('localhost', 'root', '', 'wedkowanie');
if (!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['adres'])) {
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$adres = $_POST['adres'];
	$zapytanie = "INSERT INTO karty_wedkarskie VALUES (NULL, '$imie', '$nazwisko', '$adres', NULL, NULL);";
	mysqli_query($polaczenie, $zapytanie);
}
mysqli_close($polaczenie);
?>