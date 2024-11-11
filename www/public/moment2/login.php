<?php
require_once('../moment2/Person.php');
session_start();

// Om man redan är inloggan så redirecta till index.php
if(isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = trim(stripslashes(htmlspecialchars($_POST['username'])));
        $password = trim(stripslashes(htmlspecialchars($_POST['password'])));
        
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
}
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="css/styleSheet.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
        <header>
            <h1>Webbserverprogrammering 1</h1>
        </header>
        <main>
            <h2>Logga in</h2>
            <?php if(isset($error)) echo "<p style='color: red'>$error</p>"; ?>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Användarnamn:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Lösenord:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <input type="submit" value="Logga in">
            </form>
            <p><a href="../moment2/register.html">Registrera ny användare</a></p>
        </main>
    </div>
</body>
</html>