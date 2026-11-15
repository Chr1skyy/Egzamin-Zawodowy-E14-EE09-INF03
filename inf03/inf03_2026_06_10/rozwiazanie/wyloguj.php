<?php
// Skrypt 4
session_start();
if (isset($_SESSION['username'])) {
    session_destroy();
    header('location: login.php');
    exit();
}
?>