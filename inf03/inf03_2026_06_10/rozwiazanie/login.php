<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Zaloguj się</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Portal laboratorium</h1>
    </header>
    <main id="loginPage">
        <h2>Zaloguj się do systemu</h2>
        <form action="login.php" method="post">
            <label for="login">Login:</label>
            <input type="text" name="login" id="login">
            <br>
            <label for="haslo">Hasło:</label>
            <input type="password" name="haslo" id="haslo">
            <br>
            <button type="submit" name="submit">Zaloguj</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            if ($_POST['login'] == 'admin' && $_POST['haslo'] == 'TajneHaslo321*') {
                $_SESSION['username'] = 'admin';
                header('location: wyniki.php');
                exit();
            }
        }
        ?>
    </main>
    <footer>Wykonał: Chr1skyy</footer>
</body>

</html>