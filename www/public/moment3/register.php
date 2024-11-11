<?php
require_once('../moment2/Person.php');
session_start();
mb_internal_encoding("UTF-8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['firstName']) || !isset($_POST['lastName']) || 
        !isset($_POST['username']) || !isset($_POST['password'])) {
        header('Location: register.php');
        exit();
    }

    $firstName = trim(stripslashes(htmlspecialchars($_POST['firstName'])));
    $lastName = trim(stripslashes(htmlspecialchars($_POST['lastName'])));
    $username = trim(stripslashes(htmlspecialchars($_POST['username'])));
    $password = trim(stripslashes(htmlspecialchars($_POST['password'])));

    if (!mb_check_encoding($firstName) || !mb_check_encoding($lastName) || 
        !mb_check_encoding($username) || !mb_check_encoding($password)) {
        header('Location: register.php');
        exit();
    }

    $file = "../../users.dat";
    $users = array();

    if (file_exists($file)) {
        $users = unserialize(file_get_contents($file));
        
        foreach ($users as $user) {
            if ($user->getUsername() === $username) {
                $error = "Användarnamnet finns redan";
                break;
            }
        }
    }

    if (!isset($error)) {
        $newUser = new Person($firstName, $lastName, $username, $password);
        $users[] = $newUser;
        file_put_contents($file, serialize($users));
        header('Location: login.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Registrera ny användare</title>
    <link href="css/styleSheet.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">
    <header>
        <?php include("inc/header.php"); ?>
    </header>
    
    <main>
        <h2>Registrera ny användare</h2>
        <?php if(isset($error)) echo "<p style='color: red'>$error</p>"; ?>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="firstName">Förnamn:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Efternamn:</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            <div class="form-group">
                <label for="username">Användarnamn:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Lösenord:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" value="Registrera">
        </form>
        <p><a href="login.php">Tillbaka till login</a></p>
    </main>
</div>
</body>
</html>