<?php
$connect = mysqli_connect('localhost', 'root', '', 'baza');
if (isset($_POST["submit"])) {
	$tytul = $_POST['tytul'];
	$gatunek = $_POST['gatunek'];
	$rok = $_POST['rok'];
	$ocena = $_POST['ocena'];
	if (empty($tytul) || empty($gatunek) || empty($rok) || empty($ocena)) {
		echo "Wykryto puste pola";
	} else {
		$query = "INSERT INTO filmy(gatunki_id, tytul, rok, ocena) VALUES ($gatunek, '$tytul', $rok, $ocena);";
		mysqli_query($connect, $query);
		echo "Film $tytul został dodany do bazy";
	}
}
mysqli_close($connect);
?>