<?php
$con = mysqli_connect('localhost', 'root', '', 'wedkarstwo');
if(!empty($_POST['lowisko']) && !empty($_POST['data']) && !empty($_POST['sedzia'])) {
	$lowisko = $_POST['lowisko'];
	$data = $_POST['data'];
	$sedzia = $_POST['sedzia'];
	$kw = "INSERT INTO zawody_wedkarskie VALUES (NULL, 0, $lowisko, '$data', '$sedzia');";
	mysqli_query($con, $kw);
}

mysqli_close($con);
?>