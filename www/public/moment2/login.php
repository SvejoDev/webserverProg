<?php
require_once('Person.php');
mb_internal_encoding("UTF-8");

//Kollar först om användarnamn är satta.
if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header('Location: index.html');
    exit();
}

// htmlspecialchars=Skyddar mot XSS attack, exempel script tagget. Striplashes= Ta bort \, förhindra injenktioner. trim=Ta bort whitespace (t.e.x mellanslag)
$username = trim(stripslashes(htmlspecialchars($_POST['username'])));
$password = trim(stripslashes(htmlspecialchars($_POST['password'])));

// Kollar efter UTF-8 format.
if (!mb_check_encoding($username) || !mb_check_encoding($password)) {
    header('Location: index.html');
    exit();
}

$file = "../../users.dat";  // Filväg till användarna

if (file_exists($file)) {
    $users = unserialize(file_get_contents($file));
    $found = false;

    foreach ($users as $user) {
        if ($user->getUsername() === $username && $user->getPassword() === $password) {
            $found = true;
            //Outputen för lyckad inloggning.
            header('Content-Type: text/html; charset=utf-8');
            echo '<!DOCTYPE html>
                <html lang="sv">
                <head>
                    <meta charset="UTF-8">
                    <title>Användarinformation</title>
                    <style>
                        body { font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; padding: 20px; }
                        .user-info { background: #f5f5f5; padding: 20px; border-radius: 5px; }
                    </style>
                </head>
                <body>
                    <div class="user-info">
                        <h2>Välkommen ' . htmlspecialchars($user->getFirstName()) . '!</h2>
                        <p><strong>Förnamn:</strong> ' . htmlspecialchars($user->getFirstName()) . '</p>
                        <p><strong>Efternamn:</strong> ' . htmlspecialchars($user->getLastName()) . '</p>
                        <p><strong>Användarnamn:</strong> ' . htmlspecialchars($user->getUsername()) . '</p>
                    </div>
                    <p><a href="index.html">Logga ut</a></p>
                </body>
                </html>';
            break;
        }
    }

    if (!$found) {
        header('Location: index.html');
        exit();
    }
} else {
    header('Location: index.html');
    exit();
}
?> 