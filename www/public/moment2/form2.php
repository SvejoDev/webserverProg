<?php
function cleanData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = cleanData($_POST['firstname']);
    $lastname = cleanData($_POST['lastname']);
    $username = cleanData($_POST['username']);
    $password = cleanData($_POST['password']);
}
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Formulär med Självhantering</title>
</head>
<body>
     <form method="post">
        <label for="firstname">Förnamn:</label>
        <input type="text" name="firstname" required><br>
        <label for="lastname">Efternamn:</label>
        <input type="text" name="lastname" required><br>
        <label for="username">Användarnamn:</label>
        <input type="text" name="username" required><br>
        <label for="password">Lösenord:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Skicka</button>
    </form>
</body>
</html>