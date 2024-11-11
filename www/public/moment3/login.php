<?php
require_once('../moment2/Person.php');
session_start();
mb_internal_encoding("UTF-8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        header('Location: login.php');
        exit();
    }
// htmlspecialchars=Skyddar mot XSS attack, exempel script tagget. Striplashes= Ta bort \, förhindra injenktioner. trim=Ta bort whitespace (t.e.x mellanslag)

    $username = trim(stripslashes(htmlspecialchars($_POST['username'])));
    $password = trim(stripslashes(htmlspecialchars($_POST['password'])));
// Kollar efter UTF-8 format.

    if (!mb_check_encoding($username) || !mb_check_encoding($password)) {
        header('Location: login.php');
        exit();
    }

    $file = "../../users.dat";

    if (file_exists($file)) {
        $users = unserialize(file_get_contents($file));
        foreach ($users as $user) {
            if ($user->getUsername() === $username && $user->getPassword() === $password) {
                $_SESSION['user'] = $user;
                header('Location: index.php');
                exit();
            }
        }
    }
    $error = "Felaktigt användarnamn eller lösenord";
}
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="./css/styleSheet.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">
    <header>
        <?php include("inc/header.php"); ?>
    </header>
    
    <main>
        <h2>Logga in</h2>
        <?php if(isset($error)) echo "<p style='color: red'>$error</p>"; ?>
        <form action="login.php" method="post">
            <div>
                <label for="username">Användarnamn:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Lösenord:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" value="Logga in">
        </form>
        <p><a href="register.php">Registrera ny användare</a></p>
    </main>
</div>
</body>
</html>