<?php

    $conn = new mysqli("localhost", "root", "", "baza2021czerwiec");

    $data = $_POST['data'];
    $ile_os = $_POST['ile_os'];
    $nr_tel = $_POST['nr_tel'];

    $sql = "INSERT INTO rezerwacje (nr_stolika ,data_rez , liczba_osob, telefon) VALUES (NULL,'$data','$ile_os','$nr_tel');";
    $conn->query($sql);

    $conn->close();
?>
<!DOCTYPE html>
<html>
    <body>
        Dodano rezerwację do bazy
    </body>
</html>