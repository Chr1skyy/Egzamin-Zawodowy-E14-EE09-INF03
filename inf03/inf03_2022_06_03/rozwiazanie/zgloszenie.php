<?php
$con = mysqli_connect('localhost', 'root', '', 'wedkarstwo');

if(isset($_POST['dodaj'])) {
	$lowisko = $_POST['lowisko'];
	$data = $_POST['data'];
	$sedzia = $_POST['sedzia'];
	
	$q = "INSERT INTO zawody_wedkarskie VALUES (NULL, 0, $lowisko, '$data', '$sedzia');";
	mysqli_query($con, $q);
}
mysqli_close($con);
?>