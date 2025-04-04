<?php

    $conn = mysqli_connect('localhost', 'root', "", 'wedkarstwo');

    $id_lowiska = $_POST['id_lowiska'];
    $data = $_POST['data'];
    $sedzia = $_POST['sedzia'];

    $sql = "INSERT INTO zawody_wedkarskie(karty_wedkarskie_id, Lowisko_id, data_zawodow, sedzia) VALUES (0, $id_lowiska, $data, $sedzia);";

    $conn->query($sql);

    $conn -> close();
?>