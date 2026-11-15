<?php
$polaczenie = mysqli_connect('localhost', 'root', '', 'wedkarstwo');

if (isset($_POST['dodaj'])) {
	$lowisko = $_POST['lowisko'];
	$data = $_POST['data'];
	$sedzia = $_POST['sedzia'];
	
	$zapytanie = "INSERT INTO zawody_wedkarskie VALUES (NULL, 0, $lowisko, '$data', '$sedzia');";
	mysqli_query($polaczenie, $zapytanie);
}
mysqli_close($polaczenie);
?>